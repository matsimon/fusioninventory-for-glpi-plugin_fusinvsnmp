<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 FusionInventory
 Coded by the FusionInventory Development Team.

 http://www.fusioninventory.org/   http://forge.fusioninventory.org/
 -------------------------------------------------------------------------

 LICENSE

 This file is part of FusionInventory plugins.

 FusionInventory is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 FusionInventory is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with FusionInventory; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: MAZZONI Vincent
// Purpose of file: management of communication with ocsinventoryng agents
// ----------------------------------------------------------------------
/**
 * The datas are XML encoded and compressed with Zlib.
 * XML rules :
 * - XML tags in uppercase
 **/

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

/**
 * Class to communicate with agents using XML
 **/
class PluginFusinvsnmpCommunicationSNMPQuery {
//   private $sxml, $deviceId, $ptd, $type='', $logFile;
   private $sxml, $ptd;

   /**
    * Add SNMPQUERY string to XML code
    *
    *@return nothing
    **/
   function addQuery($pxml, $task=0) {
      $ptmi    = new PluginFusioninventorySNMPModel;
      $ptsnmpa = new PluginFusinvsnmpConfigSecurity;
      $pta     = new PluginFusioninventoryAgent;
      $ptap    = new PluginFusioninventoryAgentProcess;
      $ptrip   = new PluginFusioninventoryIPRange;
      $ptt     = new PluginFusioninventoryTask;

      $agent = $pta->InfosByKey($pxml->DEVICEID);
      $count_range = $ptrip->Counter($agent["id"], "query");
      $count_range += $ptt->Counter($agent["id"], "SNMPQUERY");
      if ($task == "1") {
         $tasks = $ptt->ListTask($agent["id"], "SNMPQUERY");
         foreach ($tasks as $task_id=>$taskInfos) {
            file_put_contents(GLPI_PLUGIN_DOC_DIR."/fusioninventory/query.log".rand(), $agent["id"]);
            if ($tasks[$task_id]["param"] == 'PluginFusioninventoryAgent') {
               $task = "0";
            }
         }
         if ($task == "1") {
            $agent["core_query"] = 1;
            $agent["threads_query"] = 1;
         }
      }

      // Get total number of devices to query
      $ranges = $ptrip->ListRange($agent["id"], "query");
      $modelslistused = array();
      foreach ($ranges as $range_id=>$rangeInfos) {
         $modelslistused = $this->addDevice($sxml_option, 'networking', $ranges[$range_id]["ifaddr_start"],
                     $ranges[$range_id]["ifaddr_end"], $ranges[$range_id]["entities_id"], $modelslistused,0);
         $modelslistused = $this->addDevice($sxml_option, 'printer', $ranges[$range_id]["ifaddr_start"],
                     $ranges[$range_id]["ifaddr_end"], $ranges[$range_id]["entities_id"], $modelslistused,0);
      }


      if ((($count_range > 0) AND ($agent["lock"] == 0) AND (!empty($modelslistused))) OR ($task == "1")) {
         $a_input = array();
         if ($_SESSION['glpi_plugin_fusioninventory_addagentprocess'] == '0') {
            $this->addProcessNumber($ptap->addProcess($pxml));
            $_SESSION['glpi_plugin_fusioninventory_addagentprocess'] = '1';
         }
         $a_input['query_core'] = $agent["core_query"];
         $a_input['query_threads'] = $agent["threads_query"];
         $ptap->updateProcess($this->sxml->PROCESSNUMBER, $a_input);

         $sxml_option = $this->sxml->addChild('OPTION');
            $sxml_option->addChild('NAME', 'SNMPQUERY');
            $sxml_param = $sxml_option->addChild('PARAM');
               $sxml_param->addAttribute('CORE_QUERY', $agent["core_query"]);
               $sxml_param->addAttribute('THREADS_QUERY', $agent["threads_query"]);
               $sxml_param->addAttribute('PID', $this->sxml->PROCESSNUMBER);


               if ($task == "1") {
                  foreach ($tasks as $task_id=>$taskInfos) {
                     // TODO : envoyer une plage avec juste cette ip ***
                     switch ($tasks[$task_id]['itemtype']) {

                        case 'NetworkEquipment':
                           $modelslistused = $this->addDevice($sxml_option, 'networking', 0,
                                 0, "-1", $modelslistused, 1, $tasks[$task_id]['items_id']);
                           break;

                        case 'printer':
                           $modelslistused = $this->addDevice($sxml_option, 'printer', 0,
                                 0, "-1", $modelslistused, 1, $tasks[$task_id]['items_id']);
                           break;
                        
                     }


                     //
                     //
//                     $modelslistused = $this->addDevice($sxml_option, 'networking', $ranges[$range_id]["ifaddr_start"],
//                                 $ranges[$range_id]["ifaddr_end"], $ranges[$range_id]["entities_id"], $modelslistused);
                  }
               } else {
                  $ranges = $ptrip->ListRange($agent["id"], "query");
                  $modelslistused = array();
                  foreach ($ranges as $range_id=>$rangeInfos) {
                     $modelslistused = $this->addDevice($sxml_option, 'networking', $ranges[$range_id]["ifaddr_start"],
                                 $ranges[$range_id]["ifaddr_end"], $ranges[$range_id]["entities_id"], $modelslistused);
                     $modelslistused = $this->addDevice($sxml_option, 'printer', $ranges[$range_id]["ifaddr_start"],
                                 $ranges[$range_id]["ifaddr_end"], $ranges[$range_id]["entities_id"], $modelslistused);
                  }
               }

            $snmpauthlist=$ptsnmpa->find();
            if (count($snmpauthlist)){
               foreach ($snmpauthlist as $snmpauth){
                  $this->addAuth($sxml_option, $snmpauth['id']);
               }
            }

            $modelslist=$ptmi->find();
            if (count($modelslist)){
               foreach ($modelslist as $model){
                  if (isset($modelslistused[$model['id']])) {
                     $this->addModel($sxml_option, $model['id']);
                  }
               }
            }
      }
   }

   /**
    * Add MODEL string to XML node
    *
    *@param $p_sxml_node XML node to complete
    *@param $p_id Model id
    *@return nothing
    **/
   function addModel($p_sxml_node, $p_id) {
      $models = new PluginFusioninventorySNMPModel;
      $mib_networking = new PluginFusioninventorySNMPModelMib;

      $models->getFromDB($p_id);
      $sxml_model = $p_sxml_node->addChild('MODEL');
         $sxml_model->addAttribute('ID', $p_id);
         $sxml_model->addAttribute('NAME', $models->fields['name']);
         $mib_networking->oidList($sxml_model,$p_id);
   }

   /**
    * Add GET string to XML node
    *
    *@param $p_sxml_node XML node to complete
    *@param $p_object Value of OBJECT attribute
    *@param $p_oid Value of OID attribute
    *@param $p_link Value of LINK attribute
    *@param $p_vlan Value of VLAN attribute
    *@return nothing
    **/
   function addGet($p_sxml_node, $p_object, $p_oid, $p_link, $p_vlan) {
      $sxml_get = $p_sxml_node->addChild('GET');
         $sxml_get->addAttribute('OBJECT', $p_object);
         $sxml_get->addAttribute('OID', $p_oid);
         $sxml_get->addAttribute('VLAN', $p_vlan);
         $sxml_get->addAttribute('LINK', $p_link);
   }

   /**
    * Add WALK string to XML node
    *
    *@param $p_sxml_node XML node to complete
    *@param $p_object Value of OBJECT attribute
    *@param $p_oid Value of OID attribute
    *@param $p_link Value of LINK attribute
    *@param $p_vlan Value of VLAN attribute
    *@return nothing
    **/
   function addWalk($p_sxml_node, $p_object, $p_oid, $p_link, $p_vlan) {
      $sxml_walk = $p_sxml_node->addChild('WALK');
         $sxml_walk->addAttribute('OBJECT', $p_object);
         $sxml_walk->addAttribute('OID', $p_oid);
         $sxml_walk->addAttribute('VLAN', $p_vlan);
         $sxml_walk->addAttribute('LINK', $p_link);
   }

   /**
    * Add INFO string to XML node
    *
    *@param $p_sxml_node XML node to complete
    *@param $p_id Value of ID attribute
    *@param $p_ip Value of IP attribute
    *@param $p_authsnmp_id Value of AUTHSNMP_ID attribute
    *@param $p_model_id Value of MODELSNMP_ID attribute
    *@param $p_type device type
    *@return nothing
    **/
   function addInfo($p_sxml_node, $p_id, $p_ip, $p_authsnmp_id, $p_model_id, $p_type) {
      $sxml_device = $p_sxml_node->addChild('DEVICE');
         $sxml_device->addAttribute('TYPE', $p_type);
         $sxml_device->addAttribute('ID', $p_id);
         $sxml_device->addAttribute('IP', $p_ip);
         $sxml_device->addAttribute('AUTHSNMP_ID', $p_authsnmp_id);
         $sxml_device->addAttribute('MODELSNMP_ID', $p_model_id);
   }

   /**
    * Add DEVICE string to XML node
    *
    *@param $p_sxml_node XML node to complete
    *@param $p_type Type of device
    *@param $p_ipstart Start ip of range
    *@param $p_ipend End ip of range
    *@param $p_entity Entity of device
    *@return true (device added) / false (unknown type of device)
    **/
   function addDevice($p_sxml_node, $p_type, $p_ipstart, $p_ipend, $p_entity, $modelslistused, $addingdevice=1, $devide_id=0) {
      global $DB;

      $type='';
      switch ($p_type) {
         
         case "networking":
            $type='NETWORKING';
            $query = "SELECT `glpi_networkequipments`.`id` AS `gID`,
                             `glpi_networkequipments`.`ip` AS `gnifaddr`,
                             `plugin_fusioninventory_snmpauths_id`, `plugin_fusinvsnmp_models_id`
                      FROM `glpi_networkequipments`
                      LEFT JOIN `glpi_plugin_fusinvsnmp_networkequipments`
                           ON `networkequipments_id`=`glpi_networkequipments`.`id`
                      INNER join `glpi_plugin_fusinvsnmp_models`
                           ON `plugin_fusinvsnmp_models_id`=`glpi_plugin_fusinvsnmp_models`.`id`
                      WHERE `glpi_networkequipments`.`is_deleted`='0'
                           AND `plugin_fusinvsnmp_models_id`!='0'
                           AND `plugin_fusioninventory_snmpauths_id`!='0'";
             if ($p_entity != '-1') {
               $query .= "AND `glpi_networkequipments`.`entities_id`='".$p_entity."' ";
             }
             if ($p_ipstart == '0') {
               $query .= " AND `glpi_networkequipments`.`id`='".$devide_id."'";
             } else {
               $query .= " AND inet_aton(`ip`)
                               BETWEEN inet_aton('".$p_ipstart."')
                               AND inet_aton('".$p_ipend."') ";
             }

            break;
         
         case "printer":
            $type='PRINTER';
            $query = "SELECT `glpi_printers`.`id` AS `gID`,
                             `glpi_networkports`.`ip` AS `gnifaddr`,
                             `plugin_fusioninventory_snmpauths_id`, `plugin_fusinvsnmp_models_id`
                      FROM `glpi_printers`
                      LEFT JOIN `glpi_plugin_fusinvsnmp_printers`
                              ON `printers_id`=`glpi_printers`.`id`
                      LEFT JOIN `glpi_networkports`
                              ON `items_id`=`glpi_printers`.`id`
                                 AND `itemtype`='".PRINTER_TYPE."'
                      INNER join `glpi_plugin_fusinvsnmp_models`
                           ON `plugin_fusinvsnmp_models_id`=`glpi_plugin_fusinvsnmp_models`.`id`
                      WHERE `glpi_printers`.`is_deleted`=0
                            AND `plugin_fusinvsnmp_models_id`!='0'
                            AND `plugin_fusioninventory_snmpauths_id`!='0'";
             if ($p_entity != '-1') {
               $query .= "AND `glpi_printers`.`entities_id`='".$p_entity."' ";
             }
             if ($p_ipstart == '0') {
               $query .= " AND `glpi_printers`.`id`='".$devide_id."'";
             } else {
               $query .= " AND inet_aton(`ip`)
                               BETWEEN inet_aton('".$p_ipstart."')
                               AND inet_aton('".$p_ipend."') ";
             }


            break;
         
         default: // type non géré
            return $modelslistused;
      }
      $result=$DB->query($query);
      while ($data=$DB->fetch_array($result)) {
         if ($addingdevice == '1') {
            $this->addInfo($p_sxml_node,
                           $data['gID'],
                           $data['gnifaddr'],
                           $data['plugin_fusioninventory_snmpauths_id'],
                           $data['plugin_fusinvsnmp_models_id'],
                           $type);
         }
         $modelslistused[$data['plugin_fusinvsnmp_models_id']] = 1;
      }
      return $modelslistused;
   }

   /**
    * Import data
    *
    *@param $p_DEVICEID XML code to import
    *@param $p_CONTENT XML code to import
    *@return "" (import ok) / error string (import ko)
    **/
   function import($p_DEVICEID, $p_CONTENT, $p_xml) {
      global $LANG;

      $_SESSION['SOURCEXML'] = $p_xml;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->import().');
      $this->sxml = simplexml_load_string($p_xml,'SimpleXMLElement', LIBXML_NOCDATA);
      $errors = '';

      if (isset($p_CONTENT->PROCESSNUMBER)) {
         $_SESSION['glpi_plugin_fusioninventory_processnumber'] = $p_CONTENT->PROCESSNUMBER;
      }
      $errors.=$this->importContent($p_CONTENT);
      $result=true;
      if ($errors != '') {
         if (isset($_SESSION['glpi_plugin_fusioninventory_processnumber'])) {
            $result=true;
//            $ptap = new PluginFusioninventoryAgentProcess();
//            $ptap->updateProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
//                                 array('comment' => $errors));

         } else {
            // It's PROLOG
            $result=false;
         }
      }
      return $result;
   }

   /**
    * Import CONTENT
    *@param $p_content CONTENT code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importContent($p_content) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importContent().');
      //$ptap = new PluginFusioninventoryAgentProcess;
      $pta  = new PluginFusioninventoryAgent;
      
      $errors='';
      $nbDevices = 0;

      foreach ($p_content->children() as $child) {
         PluginFusioninventoryCommunication::addLog($child->getName());
         switch ($child->getName()) {
            case 'DEVICE' :
//               $errors.=$this->importDevice($child);
               $this->sendCriteria($this->sxml->DEVICEID, $child);
               $nbDevices++;
               break;

            case 'AGENT' :
               if (isset($this->sxml->CONTENT->AGENT->START)) {
//                  $ptap->updateProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
//                                       array('start_time_query' => date("Y-m-d H:i:s")));
               } else if (isset($this->sxml->CONTENT->AGENT->END)) {
//                  $ptap->updateProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
//                                       array('end_time_query' => date("Y-m-d H:i:s")));
               } else if (isset($this->sxml->CONTENT->AGENT->EXIT)) {
//                  $ptap->endProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
//                                       date("Y-m-d H:i:s"));
               }
               if (isset($this->sxml->CONTENT->AGENT->AGENTVERSION)) {
                  $agent = $pta->InfosByKey($this->sxml->DEVICEID);
                  $agent['fusioninventory_agent_version'] = $this->sxml->CONTENT->AGENT->AGENTVERSION;
                  $agent['last_agent_update'] = date("Y-m-d H:i:s");
                  //$p_xml = gzuncompress($GLOBALS["HTTP_RAW_POST_DATA"]);
                  $pta->update($agent);
               }
               break;

            case 'PROCESSNUMBER' :
               break;
            
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' CONTENT : '.$child->getName()."\n";
         }
      }
      return $errors;
   }

   /**
    * Import DEVICE
    *@param $p_device DEVICE code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importDevice($itemtype, $items_id) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importDevice().');
      //$ptae = new PluginFusioninventoryAgentProcessError;

      $p_xml = simplexml_load_string($_SESSION['SOURCE_XMLDEVICE'],'SimpleXMLElement', LIBXML_NOCDATA);

      // Write XML file
      if (isset($p_xml)) {
         $folder = substr($items_id,0,-1);
         if (empty($folder)) {
            $folder = '0';
         }
         if (!file_exists(GLPI_PLUGIN_DOC_DIR."/fusinvsnmp/".$itemtype."/".$folder)) {
            mkdir(GLPI_PLUGIN_DOC_DIR."/fusinvsnmp/".$itemtype."/".$folder, '0777', true);
         }
         $fileopen = fopen(GLPI_PLUGIN_DOC_DIR."/fusinvsnmp/".$itemtype."/".$folder."/".$items_id, 'w');
         fwrite($fileopen, $p_xml->asXML());
         fclose($fileopen);
       }

      $errors='';
      $this->deviceId=$items_id;
      switch ($itemtype) {
         case 'Printer':
            $this->type = 'Printer';
            break;
         case 'NetworkEquipment':
            $this->type = 'NetworkEquipment';
            break;
         default:
            $errors.=$LANG['plugin_fusioninventory']["errors"][22].' TYPE : '
                              .$p_xml->INFO->TYPE."\n";
      }
      if (isset($p_xml->ERROR)) {
//         $ptap->updateProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
//                              array('query_nb_error' => '1'));
         $a_input = array();
         $a_input['id'] = $p_xml->ERROR->ID;
         if ($p_xml->ERROR->TYPE=='NETWORKING') {
            $a_input['TYPE'] = 'NetworkEquipment';
         } elseif ($p_xml->ERROR->TYPE=='PRINTER') {
            $a_input['TYPE'] = 'Printer';
         }
         $a_input['MESSAGE'] = $p_xml->ERROR->MESSAGE;
         $a_input['agent_type'] = 'SNMPQUERY';
         //$ptae->addError($a_input);
      } else {
//         $ptap->updateProcess($this->sxml->CONTENT->PROCESSNUMBER, array('query_nb_query' => '1'));

         $errors.=$this->importInfo($itemtype, $items_id);

         if ($this->deviceId!='') {
            foreach ($p_xml->children() as $child) {
               switch ($child->getName()) {
                  case 'INFO' : // already managed
                     break;
                  case 'PORTS' :
                     $errors.=$this->importPorts($child);
                     break;
                  case 'CARTRIDGES' :
                     if ($this->type == 'Printer') {
                        $errors.=$this->importCartridges($child);
                        break;
                     }
                  case 'PAGECOUNTERS' :
                     if ($this->type == 'Printer') {
                        $errors.=$this->importPageCounters($child);
                        break;
                     }
                  default :
                     $errors.=$LANG['plugin_fusioninventory']["errors"][22].' DEVICE : '
                              .$child->getName()."\n";
               }
            }
            if ($errors=='') {
               $this->ptd->updateDB();
            } else {
               //$ptap->updateProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
               //      array('query_nb_error' => '1'));
               $a_input = array();
               $a_input['id'] = $p_xml->ERROR->ID;
               if ($p_xml->ERROR->TYPE=='NETWORKING') {
                  $a_input['TYPE'] = 'NetworkEquipment';
               } elseif ($p_xml->ERROR->TYPE=='PRINTER') {
                  $a_input['TYPE'] = 'Printer';
               }
               $a_input['MESSAGE'] = $errors;
               $a_input['agent_type'] = 'SNMPQUERY';
               //$ptae->addError($a_input);
            }
         } else {
            //$ptap->updateProcess($_SESSION['glpi_plugin_fusioninventory_processnumber'],
            //      array('query_nb_error' => '1'));
            $a_input = array();
            $a_input['id'] = $p_xml->ERROR->ID;
            if ($p_xml->ERROR->TYPE=='NETWORKING') {
               $a_input['TYPE'] = 'NetworkEquipment';
            } elseif ($p_xml->ERROR->TYPE=='PRINTER') {
               $a_input['TYPE'] = 'Printer';
            }
            $a_input['MESSAGE'] = $errors;
            $a_input['agent_type'] = 'SNMPQUERY';
            //$ptae->addError($a_input);
         }
      }

      return $errors;
   }

   /**
    * Import INFO
    *@param $p_info INFO code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importInfo($itemtype, $items_id) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importInfo().');
      $errors='';
      $xml = simplexml_load_string($_SESSION['SOURCE_XMLDEVICE'],'SimpleXMLElement', LIBXML_NOCDATA);
      $p_info = $xml->INF0;
      if ($itemtype == 'NetworkEquipment') {
         $errors.=$this->importInfoNetworking($xml->INFO);

      } elseif ($itemtype == 'Printer') {
         $errors.=$this->importInfoPrinter($xml->INFO);
//         //TODO Get MAC address in port
//         foreach ($xml->children() as $child) {
//            switch ($child->getName()) {
//               case 'PORTS' :
//                  foreach ($child->children() as $child_port) {
//                     switch ($child_port->getName()) {
//                        case 'PORT' :
//                           $criteria['macaddr'] = $child_port->MAC;
//                           if ($this->deviceId == '') {
//                              $this->deviceId = PluginFusinvsnmpDiscovery::criteria($criteria, 'Printer');
//                           }
//                           break;
//                     }
//                  }
//                  break;
//            }
//         }

         //$this->deviceId = PluginFusioninventoryDiscovery::criteria($criteria, PRINTER_TYPE);
      }
      if (!empty($errors)) {
         //$pfiae = new PluginFusioninventoryAgentProcessError;

         $a_input = array();
         $a_input['id'] = $xml->INFO->ID[0];
         if ($xml->INFO->TYPE=='NetworkEquipment') {
            $a_input['TYPE'] = 'NetworkEquipment';
         } elseif ($xml->INFO->TYPE=='Printer') {
            $a_input['TYPE'] = 'Printer';
         }
         $a_input['MESSAGE'] = $errors;
         $a_input['agent_type'] = 'SNMPQUERY';
         //$pfiae->addError($a_input);
      }

      return $errors;
   }

   /**
    * Import INFO:Networking
    *@param $p_info INFO code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importInfoNetworking($p_info) {
      global $LANG;
      
      $errors='';
      $this->ptd = new PluginFusinvsnmpNetworkEquipment();
      $this->ptd->load($this->deviceId);

      foreach ($p_info->children() as $child) {
         switch ($child->getName()) {
            case 'ID' : // already managed
               break;
            case 'TYPE' : // already managed
               break;
            case 'COMMENTS' :
               $this->ptd->setValue('sysdescr', $p_info->COMMENTS[0]);
               break;
            case 'CPU' :
               $this->ptd->setValue('cpu', $p_info->CPU[0]);
               break;
            case 'FIRMWARE' :
               $this->ptd->setValue('networkequipmentfirmwares_id', $p_info->FIRMWARE[0]);
               break;
            case 'MAC' :
               $this->ptd->setValue('mac', $p_info->MAC[0]);
               break;
            case 'MEMORY' :
               $this->ptd->setValue('memory', $p_info->MEMORY[0]);
               break;
            case 'MODEL' :
               $this->ptd->setValue('networkequipmentmodels_id', $p_info->MODEL[0]);
               break;
            case 'LOCATION' :
               $this->ptd->setValue('locations_id', $p_info->LOCATION[0]);
               break;
            case 'NAME' :
               $this->ptd->setValue('name', $p_info->NAME[0]);
               break;
            case 'RAM' :
               $this->ptd->setValue('ram', $p_info->RAM[0]);
               break;
            case 'SERIAL' :
               $this->ptd->setValue('serial', $p_info->SERIAL[0]);
               break;
            case 'UPTIME' :
               $this->ptd->setValue('uptime', $p_info->UPTIME[0]);
               break;
            case 'IPS' :
               $errors.=$this->importIps($child);
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' INFO : '.$child->getName()."\n";
         }
      }
      return $errors;
   }

   /**
    * Import INFO:Printer
    *@param $p_info INFO code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importInfoPrinter($p_info) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importInfoPrinter().');

      $errors='';
      $this->ptd = new PluginFusinvsnmpPrinter();
      $this->ptd->load($this->deviceId);
      foreach ($p_info->children() as $child) {
         switch ($child->getName()) {
            case 'ID' : // already managed
               break;
            case 'TYPE' : // already managed
               break;
            case 'COMMENTS' :
               $this->ptd->setValue('sysdescr', (string)$p_info->COMMENTS);
               break;
            case 'MEMORY' :
               $this->ptd->setValue('memory_size', (string)$p_info->MEMORY);
               break;
            case 'MODEL' :
               $PrinterModel = new PrinterModel();
               $this->ptd->setValue('printermodels_id', $PrinterModel->import(array('name' => (string)$p_info->MODEL)));
               break;
            case 'NAME' :
               $this->ptd->setValue('name', (string)$p_info->NAME);
               break;
            case 'SERIAL' :
               $this->ptd->setValue('serial', (string)$p_info->SERIAL);
               break;
            case 'OTHERSERIAL' :
               $this->ptd->setValue('otherserial', (string)$p_info->OTHERSERIAL);
               break;
            case 'LOCATION' :
               $Location = new Location();
               $this->ptd->setValue('locations_id', $Location->import(array('name' => (string)$p_info->LOCATION)));
               break;
            case 'CONTACT' :
               $this->ptd->setValue('contact', (string)$p_info->CONTACT);
               break;
            case 'MANUFACTURER' :
               $Manufacturer = new Manufacturer();
               $this->ptd->setValue('manufacturers_id', $Manufacturer->import(array('name' => (string)$p_info->MANUFACTURER)));
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' INFO : '.$child->getName()."\n";
         }
      }
      
      return $errors;
   }

   /**
    * Import IPS
    *@param $p_ips IPS code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importIps($p_ips) {
      global $LANG;

      $errors='';
      $pti = new PluginFusinvsnmpNetworkEquipmentIP();
      foreach ($p_ips->children() as $name=>$child) {
         switch ($child->getName()) {
            case 'IP' :
               if ($child != "127.0.0.1") {
                  $ifaddrIndex = $this->ptd->getIfaddrIndex($child);
                  if (is_int($ifaddrIndex)) {
                     $oldIfaddr = $this->ptd->getIfaddr($ifaddrIndex);
                     $pti->load($oldIfaddr->getValue('id'));
                  } else {
                     $pti->load();
                  }
                  $pti->setValue('ip', $child);
                  $this->ptd->addIfaddr(clone $pti, $ifaddrIndex);
               }
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' IPS : '.$child->getName()."\n";
         }
      }
      $this->ptd->saveIfaddrs();
      return $errors;
   }

   /**
    * Import PORTS
    *@param $p_ports PORTS code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importPorts($p_ports) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importPorts().');
      $errors='';
      foreach ($p_ports->children() as $name=>$child) {
         switch ($child->getName()) {
            case 'PORT' :
               if ($this->type == "Printer") {
                  $errors.=$this->importPortPrinter($child);
               } elseif ($this->type == "NetworkEquipment") {
                  $errors.=$this->importPortNetworking($child);
               }
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' PORTS : '.$child->getName()."\n";
         }
      }
      return $errors;
   }

   /**
    * Import PORT Networking
    *@param $p_port PORT code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importPortNetworking($p_port) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importPortNetworking().');
      $errors='';
//      $ptp = new PluginFusioninventoryNetworkPort(NETWORKING_TYPE);
      $ptp = new PluginFusinvsnmpNetworkPort("NetworkEquipment", $this->logFile);
      $ifType = $p_port->IFTYPE;
      if ( $ptp->isReal($ifType) ) { // not virtual port
         $portIndex = $this->ptd->getPortIndex($p_port->IFNUMBER, $this->getConnectionIP($p_port));
         if (is_int($portIndex)) {
            $oldPort = $this->ptd->getPort($portIndex);
            $ptp->load($oldPort->getValue('id'));
         } else {
            $ptp->addDB($this->deviceId, TRUE);
         }
         foreach ($p_port->children() as $name=>$child) {
            switch ($name) {
               case 'CONNECTIONS' :
                  $errors.=$this->importConnections($child, $ptp);
                  break;
               case 'VLANS' :
                  $errors.=$this->importVlans($child, $ptp);
                  break;
               case 'IFNAME' :
                  //PluginFusioninventoryNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('name', $child);
                  break;
               case 'MAC' :
                  //PluginFusioninventoryNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('mac', $child);
                  break;
               case 'IFNUMBER' :
                  //PluginFusioninventoryNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('logical_number', $child);
                  break;
               case 'IFTYPE' : // already managed
                  break;
               case 'TRUNK' :
                  if (!$ptp->getNoTrunk()) {
                     //PluginFusioninventoryNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                     $ptp->setValue('vlanTrunkPortDynamicStatus', $p_port->$name);
                  }
                  break;

               case 'IFDESCR' :
               case 'IFINERRORS' :
               case 'IFINOCTETS' :
               case 'IFINTERNALSTATUS' :
               case 'IFLASTCHANGE' :
               case 'IFMTU' :
               case 'IFOUTERRORS' :
               case 'IFOUTOCTETS' :
               case 'IFSPEED' :
               case 'IFSTATUS' :
                  //PluginFusioninventoryNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue(strtolower($name), $p_port->$name);
                  break;
               default :
                  $errors.=$LANG['plugin_fusioninventory']["errors"][22].' PORT : '.$name."\n";
            }
         }
         $this->ptd->addPort($ptp, $portIndex);
      } else { // virtual port : do not import but delete if exists
         if ( is_numeric($ptp->getValue('id')) ) $ptp->deleteDB();
      }
      return $errors;
   }

   /**
    * Import PORT Printer
    *@param $p_port PORT code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importPortPrinter($p_port) {
      global $LANG;

      $errors='';
      $ptp = new PluginFusinvsnmpNetworkPort('Printer');
      $ifType = $p_port->IFTYPE;
      if ( $ptp->isReal($ifType) ) { // not virtual port
         $portIndex = $this->ptd->getPortIndex($p_port->MAC, $p_port->IP);
         if (is_int($portIndex)) {
            $oldPort = $this->ptd->getPort($portIndex);
            $ptp->load($oldPort->getValue('id'));
         } else {
            $ptp->addDB($this->deviceId, TRUE);
         }
         foreach ($p_port->children() as $name=>$child) {
            switch ($name) {
               case 'IFNAME' :
                  PluginFusinvsnmpNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('name', $child);
                  break;
               case 'MAC' :
                  PluginFusinvsnmpNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('mac', $child);
                  break;
               case 'IP' :
                  PluginFusinvsnmpNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('ip', $child);
                  break;
               case 'IFNUMBER' :
                  PluginFusinvsnmpNetworkPortLog::networkport_addLog($ptp->getValue('id'), $child, strtolower($name));
                  $ptp->setValue('logical_number', $child);
                  break;
               case 'IFTYPE' : // already managed
                  break;
               default :
                  $errors.=$LANG['plugin_fusioninventory']["errors"][22].' PORT : '.$name."\n";
            }
         }
         $this->ptd->addPort($ptp, $portIndex);
      }
      return $errors;
   }

   /**
    * Import CARTRIDGES
    *@param $p_cartridges CARTRIDGES code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importCartridges($p_cartridges) {
      global $LANG;

      $errors='';
      foreach ($p_cartridges->children() as $name=>$child)
      {
         switch ($name) {
            case 'TONERBLACK' :
            case 'TONERBLACK2' :
            case 'TONERCYAN' :
            case 'TONERMAGENTA' :
            case 'TONERYELLOW' :
            case 'WASTETONER' :
            case 'CARTRIDGEBLACK' :
            case 'CARTRIDGEBLACKPHOTO' :
            case 'CARTRIDGECYAN' :
            case 'CARTRIDGECYANLIGHT' :
            case 'CARTRIDGEMAGENTA' :
            case 'CARTRIDGEMAGENTALIGHT' :
            case 'CARTRIDGEYELLOW' :
            case 'MAINTENANCEKIT' :
            case 'DRUMBLACK' :
            case 'DRUMCYAN' :
            case 'DRUMMAGENTA' :
            case 'DRUMYELLOW' :
               $ptc = new PluginFusinvsnmpPrinterCartridge();
               $cartridgeIndex = $this->ptd->getCartridgeIndex($name);
               if (is_int($cartridgeIndex)) {
                  $oldCartridge = $this->ptd->getCartridge($cartridgeIndex); //TODO ???
                  $ptc->load($oldCartridge->getValue('id'));
               } else {
                  $ptc->addCommon(TRUE); //TODO ???
                  $ptc->setValue('printers_id', $this->deviceId);
               }
               $ptc->setValue('object_name', $name);
               $ptc->setValue('state', $child, $ptc, 0);
               $this->ptd->addCartridge($ptc, $cartridgeIndex);
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' CARTRIDGES : '.$name."\n";
         }
      }
      return $errors;
   }

   /**
    * Import PAGECOUNTERS
    *@param $p_pagecounters PAGECOUNTERS code to import
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importPageCounters($p_pagecounters) {
      global $LANG;

      $errors='';
      foreach ($p_pagecounters->children() as $name=>$child)
      {
         switch ($child->getName()) {
            case 'TOTAL' :
               $errors.=$this->ptd->addPageCounter('pages_total', $child);
               break;
            case 'BLACK' :
               $errors.=$this->ptd->addPageCounter('pages_n_b', $child);
               break;
            case 'COLOR' :
               $errors.=$this->ptd->addPageCounter('pages_color', $child);
               break;
            case 'RECTOVERSO' :
               $errors.=$this->ptd->addPageCounter('pages_recto_verso', $child);
               break;
            case 'SCANNED' :
               $errors.=$this->ptd->addPageCounter('scanned', $child);
               break;
            case 'PRINTTOTAL' :
               $errors.=$this->ptd->addPageCounter('pages_total_print', $child);
               break;
            case 'PRINTBLACK' :
               $errors.=$this->ptd->addPageCounter('pages_n_b_print', $child);
               break;
            case 'PRINTCOLOR' :
               $errors.=$this->ptd->addPageCounter('pages_color_print', $child);
               break;
            case 'COPYTOTAL' :
               $errors.=$this->ptd->addPageCounter('pages_total_copy', $child);
               break;
            case 'COPYBLACK' :
               $errors.=$this->ptd->addPageCounter('pages_n_b_copy', $child);
               break;
            case 'COPYCOLOR' :
               $errors.=$this->ptd->addPageCounter('pages_color_copy', $child);
               break;
            case 'FAXTOTAL' :
               $errors.=$this->ptd->addPageCounter('pages_total_fax', $child);
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' PAGECOUNTERS : '.$name."\n";
         }
      }
      return $errors;
   }

   /**
    * Import CONNECTIONS
    *@param $p_connections CONNECTIONS code to import
    *@param $p_oPort Port object to connect
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importConnections($p_connections, $p_oPort) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importConnections().');
      $errors='';
      if (isset($p_connections->CDP)) {
         $cdp = $p_connections->CDP;
         if ($cdp==1) {
            $p_oPort->setCDP();
         } else {
            $errors.=$LANG['plugin_fusioninventory']["errors"][22].' CONNECTIONS : CDP='.$cdp."\n";
         }
      } else {
         $cdp = 0;
      }
      $count = 0;
      foreach ($p_connections->children() as $name=>$child) {
         switch ($child->getName()) {
            case 'CDP' : // already managed
               break;
            case 'CONNECTION' :
               $count++;
               $errors.=$this->importConnection($child, $p_oPort, $cdp);
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' CONNECTIONS : '
                        .$child->getName()."\n";
         }
      }
      if ($p_oPort->getValue('trunk')!=1) {
         if ($count > 1) { // MultipleMac
            $p_oPort->setNoTrunk();
            $pfiud = new PluginFusioninventoryUnknownDevice;
            $pfiud->hubNetwork($p_oPort);
         } else {
            if (!$p_oPort->getNoTrunk()) {
               $p_oPort->setValue('trunk', 0);
            }
         }
//      } else {
//         if ($p_oPort->getValue('trunk') == '-1') {
//            $p_oPort->setValue('trunk', '0');
//         }
      }
      return $errors;
   }

   /**
    * Import CONNECTION
    *@param $p_connection CONNECTION code to import
    *@param $p_oPort Port object to connect
    *@param $p_cdp CDP value (1 or <>1)
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function  importConnection($p_connection, $p_oPort, $p_cdp) {
      global $LANG;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->importConnection().');
      $errors='';
      $portID=''; $mac=''; $ip='';
      $ptsnmp= new PluginFusinvsnmpSNMP;
      if ($p_cdp==1) {
         $ifdescr='';
         foreach ($p_connection->children() as $name=>$child) {
            switch ($child->getName()) {
               case 'IP' :
                  $ip=$child;
                  $p_oPort->addIp($ip);
                  break;
               case 'IFDESCR' :
                  $ifdescr=$child;
                  break;
               default :
                  $errors.=$LANG['plugin_fusioninventory']["errors"][22].' CONNECTION (CDP='.$p_cdp.') : '
                           .$child->getName()."\n";
            }
         }
         $portID=$ptsnmp->getPortIDfromDeviceIP($ip, $ifdescr);
      } else {
         foreach ($p_connection->children() as $name=>$child) {
            switch ($child->getName()) {
               case 'MAC' :
                  $mac=strval($child);
                  $portID=$ptsnmp->getPortIDfromDeviceMAC($child, $p_oPort->getValue('id'));
                  $p_oPort->addMac($mac);
                  break;
               case 'IP' ://TODO : si ip ajouter une tache de decouverte sur l'ip pour recup autre info // utile seulement si mac inconnu dans glpi
                  $ip=strval($child);
                  $p_oPort->addIp($ip);
                  break;
               default :
                  $errors.=$LANG['plugin_fusioninventory']["errors"][22].' CONNECTION (CDP='.$p_cdp.') : '
                           .$child->getName()."\n";
            }
         }
      }
      if ($portID != '') {
         $p_oPort->addConnection($portID);
         if ($ip != '') $p_oPort->setValue('ip', $ip);
      } else {
         $p_oPort->addUnknownConnection($mac, $ip);
         //TODO : si ip ajouter une tache de decouverte sur l'ip pour recup autre info
      }
      return $errors;
   }

   /**
    * Import VLANS
    *@param $p_vlans VLANS code to import
    *@param $p_oPort Port object to connect
    *
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importVlans($p_vlans, $p_oPort) {
      global $LANG;

      $errors='';
      foreach ($p_vlans->children() as $name=>$child)
      {
         switch ($child->getName()) {
            case 'VLAN' :
               $errors.=$this->importVlan($child, $p_oPort);
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' VLANS : '.$child->getName()."\n";
         }
      }
      return $errors;
   }

   /**
    * Import VLAN
    *@param $p_vlan VLAN code to import
    *@param $p_oPort Port object to connect
    *@return errors string to be alimented if import ko / '' if ok
    **/
   function importVlan($p_vlan, $p_oPort) {
      global $LANG;

      $errors='';
      $number=''; $name='';
      foreach ($p_vlan->children() as $child) {
         switch ($child->getName()) {
            case 'NUMBER' :
               $number=$child;
               break;
            case 'NAME' :
               $name=$child;
               break;
            default :
               $errors.=$LANG['plugin_fusioninventory']["errors"][22].' VLAN : '.$child->getName()."\n";
         }
      }
      $p_oPort->addVlan($number, $name);
      return $errors;
   }

   /**
    * Get connection IP
    *
    *@param $p_port PORT code to import
    *@return first connection IP or ''
    **/
   function getConnectionIP($p_port) {
      foreach ($p_port->children() as $connectionsName=>$connectionsChild) {
         switch ($connectionsName) {
            case 'CONNECTIONS' :
               foreach ($connectionsChild->children() as $connectionName=>$connectionChild) {
                  switch ($connectionName) {
                     case 'CONNECTION' :
                        foreach ($connectionChild->children() as $ipName=>$ipChild) {
                           switch ($ipName) {
                              case 'IP' :
                                 if ($ipChild != '') return $ipChild;
                           }
                        }
                  }
               }
         }
      }
      return '';
   }

//   /**
//    * Get printer MAC address
//    *
//    *@param $p_port PORT code to import
//    *@return first connection IP or ''
//    **/
//   function getPrinterMac() {
//      $ports = $this->sxml->CONTENT->DEVICE->PORTS;
//      foreach ($ports->children() as $portName=>$portChild) {
//         switch ($portName) {
//            case 'PORT' :
//               foreach ($portChild->children() as $macName=>$macChild) {
//                  switch ($macName) {
//                     case 'MAC' :
//                        if ($macChild != '') return $macChild;
//                  }
//               }
//         }
//      }
//      return '';
//   }


   function sendCriteria($p_DEVICEID, $p_CONTENT) {

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->sendCriteria().');

//      $PluginFusinvinventoryBlacklist = new PluginFusinvinventoryBlacklist();
//      $p_xml = $PluginFusinvinventoryBlacklist->cleanBlacklist($p_xml);

       $_SESSION['SOURCE_XMLDEVICE'] = $p_CONTENT->asXML();

       $input = array();

      // Global criterias

         if ((isset($p_CONTENT->INFO->SERIAL)) AND (!empty($p_CONTENT->INFO->SERIAL))) {
            $input['globalcriteria'][] = 1;
            $input['serialnumber'] = strval($p_CONTENT->INFO->SERIAL);
         }
         if ($p_CONTENT->INFO->TYPE=='NETWORKING') {
            if ((isset($p_CONTENT->INFO->MAC)) AND (!empty($p_CONTENT->INFO->MAC))) {
               $input['globalcriteria'][] = 2;
               $input['mac'] = strval($p_CONTENT->INFO->MAC);
            }
         } else if ($p_CONTENT->INFO->TYPE=='PRINTER') {
            if (isset($p_CONTENT->CONTENT->PORTS)) {
               foreach($p_CONTENT->CONTENT->PORTS as $port) {
                  if ((isset($port->MAC)) AND (!empty($port->MAC))) {
                     $input['globalcriteria'][] = 2;
                     $input['mac'][] = strval($port->MAC);
                  }
               }
            }
         }
         if ((isset($p_CONTENT->INFO->MODEL)) AND (!empty($p_CONTENT->INFO->MODEL))) {
            $input['globalcriteria'][] = 3;
            $input['model'] = strval($p_CONTENT->INFO->MODEL);
         }
         if ((isset($p_CONTENT->INFO->NAME)) AND (!empty($p_CONTENT->INFO->NAME))) {
            $input['globalcriteria'][] = 4;
            $input['name'] = strval($p_CONTENT->INFO->NAME);
         }
         logInFile('crit', print_r($input, true));
      define('DATACRITERIA', serialize($input));
      $rule = new PluginFusinvsnmpRuleInventoryCollection();
      $data = array ();
      $data = $rule->processAllRules($input, array());

   }


   // a_criteria : criteria to check
   function checkCriteria($a_criteria) {
      global $DB;

      PluginFusioninventoryCommunication::addLog(
              'Function PluginFusinvsnmpCommunicationSNMPQuery->checkCriteria().');

      $xml = simplexml_load_string($_SESSION['SOURCE_XMLDEVICE'],'SimpleXMLElement', LIBXML_NOCDATA);

      $datacriteria = unserialize(DATACRITERIA);

      if ($xml->INFO->TYPE == 'PRINTER') {
         $condition = "WHERE 1 ";
         $select = "id";
         $input = array();

         foreach ($a_criteria as $criteria) {
            switch ($criteria) {

              case 'serialnumber':
                  $condition .= "AND `serial`='".$datacriteria['serialnumber']."' ";
                  $select .= ", serial";
                  $input['serial'] = $datacriteria['serialnumber'];
                  break;

               case 'mac':
                  $condition .= "AND `glpi_networkports`.`mac`='".$datacriteria['mac']."' ";
                  $select .= ", `glpi_networkports`.`mac`";
                  break;

               case 'model':
                  $condition .= "AND `models_id`='".$datacriteria['model']."' ";
                  $select .= ", models_id";
                  break;

               case 'name':
                  $condition .= "AND `name`='".$datacriteria['name']."' ";
                  $select .= ", name";
                  $input['name'] = $datacriteria['name'];
                  break;
            }
         }

         $query = "SELECT ".$select." FROM `".getTableForItemType("Printer")."`
            ".$condition." ";
         $result = $DB->query($query);
         logInFile('result', "*".$query."* \n ".$DB->numrows($result));
         if ($DB->numrows($result)) {
            $this->importDevice('Printer', $DB->result($result,0,'id'));
         } else {
            // Creation of printer
            $Printer = new Printer();
            $id = $Printer->add($input);
            $this->importDevice('Printer', $id);
         }
      } else if ($xml->INFO->TYPE == 'NETWORKING') {
         $condition = "WHERE 1 ";
         $select = "id";
         $input = array();

         foreach ($a_criteria as $criteria) {
            switch ($criteria) {

              case 'serialnumber':
                  $condition .= "AND `serial`='".$datacriteria['serialnumber']."' ";
                  $select .= ", serial";
                  $input['serial'] = $datacriteria['serialnumber'];
                  break;

               case 'mac':
                  $condition .= "AND `mac`='".$datacriteria['mac']."' ";
                  $select .= ", mac";
                  break;

               case 'model':
                  $condition .= "AND `models_id`='".$datacriteria['model']."' ";
                  $select .= ", models_id";
                  break;

               case 'name':
                  $condition .= "AND `name`='".$datacriteria['name']."' ";
                  $select .= ", name";
                  $input['serial'] = $datacriteria['name'];
                  break;
            }
         }

         $query = "SELECT ".$select." FROM `".getTableForItemType("NetworkEquipment")."`
            ".$condition." ";
         $result=$DB->query($query);
         logInFile('query', $query);
         if ($DB->numrows($result) == "1") {
            $data = $DB->fetch_assoc($result);
            $this->importDevice('NetworkEquipment', $data['id']);
         } else {
            // Creation of printer
            $NetworkEquipment = new NetworkEquipment();
            $id = $NetworkEquipment->add($input);
            $this->importDevice('NetworkEquipment', $id);
         }
      }
   }
}

?>