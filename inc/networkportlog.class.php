<?php

/*
   ----------------------------------------------------------------------
   FusionInventory
   Copyright (C) 2010-2011 by the FusionInventory Development Team.

   http://www.fusioninventory.org/   http://forge.fusioninventory.org/
   ----------------------------------------------------------------------

   LICENSE

   This file is part of FusionInventory.

   FusionInventory is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 2 of the License, or
   any later version.

   FusionInventory is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with FusionInventory.  If not, see <http://www.gnu.org/licenses/>.

   ------------------------------------------------------------------------
   Original Author of file: David DURIEUX
   Co-authors of file:
   Purpose of file:
   ----------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}


class PluginFusinvsnmpNetworkPortLog extends CommonDBTM {


	/**
	 * Insert port history with connection and disconnection
	 *
	 * @param $status status of port ('make' or 'remove')
	 * @param $array with values : $array["networkports_id"], $array["value"], $array["itemtype"] and $array["device_ID"]
	 *
	 * @return id of inserted line
	 *
	**/
	function insert_connection($status,$array,$plugin_fusioninventory_agentprocesses_id=0) {
		global $DB,$CFG_GLPI;

      $input = array();
      $input['date'] = date("Y-m-d H:i:s");
      $input['networkports_id'] = $array['networkports_id'];

      if ($status == "field") {

			$query = "INSERT INTO `glpi_plugin_fusinvsnmp_networkportlogs` (
                               `networkports_id`,`plugin_fusioninventory_mappings_id`,`value_old`,`value_new`,`date_mod`)
                   VALUES('".$array["networkports_id"]."','".$array["plugin_fusioninventory_mappings_id"]."',
                          '".$array["value_old"]."','".$array["value_new"]."',
                          '".date("Y-m-d H:i:s")."');";
         $DB->query($query);
		}
 	}

   

   function showForm($id, $options=array()) {
      global $LANG, $DB;

      $this->showTabs($options);
      $this->showFormHeader($options);

		echo "<tr class='tab_bg_1'>";
		echo "<td colspan='3'>";
		echo $LANG['plugin_fusioninventory']['functionalities'][29]." :";
		echo "</td>";
		echo "</tr>";

      echo "<tr class='tab_bg_1'>";

      $options="";

      $map = new PluginFusioninventoryMapping;
      $maps = $map->find();
      $listName = array();
      foreach ($maps as $mapfields) {
         $listName[$mapfields['itemtype']."-".$mapfields['name']]=
            $LANG['plugin_fusinvsnmp']['mapping'][$mapfields["locale"]];
      }

      if (!empty($listName)) {
         asort($listName);
      }

      // Get list of fields configured for history
      $query = "SELECT *
                FROM `glpi_plugin_fusinvsnmp_configlogfields`;";
      if ($result=$DB->query($query)) {
			while ($data=$DB->fetch_array($result)) {
            list($type,$name) = explode("-", $data['field']);
//            if (!isset($FUSIONINVENTORY_MAPPING[$type][$name]["name"])) {
            if (!isset($listName[$type."-".$name])) {
               $query_del = "DELETE FROM `glpi_plugin_fusinvsnmp_configlogfields`
                  WHERE id='".$data['id']."' ";
                  $DB->query($query_del);
            } else {
//               $options[$data['field']]=$FUSIONINVENTORY_MAPPING[$type][$name]["name"];
               $options[$data['field']]=$listName[$type."-".$name];
            }
            unset($listName[$data['field']]);
         }
      }
      if (!empty($options)) {
         asort($options);
      }
      echo "<td class='right' width='350'>";
      if (count($listName)) {
         echo "<select name='plugin_fusioninventory_extraction_to_add[]' multiple size='15'>";
         foreach ($listName as $key => $val) {
            //list ($item_type, $item) = explode("_", $key);
            echo "<option value='$key'>" . $val . "</option>\n";
         }
         echo "</select>";
      }

      echo "</td><td class='center'>";

      if (count($listName)) {
         if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configuration","w")) {
            echo "<input type='submit'  class=\"submit\" name='plugin_fusioninventory_extraction_add' value='" . $LANG["buttons"][8] . " >>'>";
         }
      }
      echo "<br /><br />";
      if (!empty($options)) {
         if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configuration","w")) {
            echo "<input type='submit'  class=\"submit\" name='plugin_fusioninventory_extraction_delete' value='<< " . $LANG["buttons"][6] . "'>";
         }
      }
      echo "</td><td class='left'>";
      if (!empty($options)) {
         echo "<select name='plugin_fusioninventory_extraction_to_delete[]' multiple size='15'>";
         foreach ($options as $key => $val) {
            //list ($item_type, $item) = explode("_", $key);
            echo "<option value='$key'>" . $val . "</option>\n";
         }
         echo "</select>";
      } else {
         echo "&nbsp;";
      }
      echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<th colspan='3'>";
		echo $LANG['plugin_fusioninventory']['functionalities'][60]." :";
		echo "</th>";
		echo "</tr>";

      echo "<tr class='tab_bg_1'>";
      echo "<td colspan='3' class='center'>";
      if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configuration","w")) {
         echo "<input type='submit' class=\"submit\" name='Clean_history' value='".$LANG['buttons'][53]."' >";
      }
      echo "</td>";
      echo "</tr>";

		echo "<tr>";
		echo "<th colspan='3'>";
      echo "&nbsp;";
		echo "</th>";
		echo "</tr>";

		$this->showFormButtons($options);

      echo "<div id='tabcontent'></div>";
      echo "<script type='text/javascript'>loadDefaultTab();</script>";

      return true;
   }

   
   
   static function cronCleannetworkportlogs() {
      global $DB;

      $PluginFusinvsnmpConfigLogField = new PluginFusinvsnmpConfigLogField();
      $PluginFusinvsnmpNetworkPortLog = new PluginFusinvsnmpNetworkPortLog();
      
      $a_list = $PluginFusinvsnmpConfigLogField->find();
      if (count($a_list)){
         foreach ($a_list as $data){

            $query_delete = "DELETE FROM `".$PluginFusinvsnmpNetworkPortLog->getTable()."`
               WHERE `plugin_fusioninventory_mappings_id`='".$data['plugin_fusioninventory_mappings_id']."' ";

            switch($data['days']) {

               case '-1';
                  $DB->query($query_delete);
                  break;

               case '0': // never delete
                  break;

               default:
                  $query_delete .= " AND `date_mod` < date_add(now(),interval -".
                                       $data['days']." day)";
                  $DB->query($query_delete);
                  break;

            }
         }
      }
   }


   
   static function addLog($port,$field,$value_old,$value_new,$mapping,$plugin_fusioninventory_agentprocesses_id=0) {
      global $DB,$CFG_GLPI;

      $PluginFusinvsnmpNetworkPortLog = new PluginFusinvsnmpNetworkPortLog();
      $doHistory = 1;
      if ($mapping != "") {
         $query = "SELECT *
                   FROM `glpi_plugin_fusinvsnmp_configlogfields`
                   WHERE `field`='".$mapping."';";
         $result = $DB->query($query);
         if ($DB->numrows($result) == 0) {
            $doHistory = 0;
         }
      }

      if ($doHistory == "1") {
         $array = array();
         $array["networkports_id"] = $port;
         $array["field"] = $field;
         $array["value_old"] = $value_old;
         $array["value_new"] = $value_new;

         // Ajouter en DB
         $PluginFusinvsnmpNetworkPortLog->insert_connection("field",$array,$plugin_fusioninventory_agentprocesses_id);
      }
   }

   

   static function networkport_addLog($port_id, $value_new, $field) {
      $ptp = new PluginFusinvsnmpNetworkPort;
      $PluginFusinvsnmpNetworkPortLog = new PluginFusinvsnmpNetworkPortLog();
      $PluginFusinvsnmpConfigLogField = new PluginFusinvsnmpConfigLogField();
      $PluginFusioninventoryMapping = new PluginFusioninventoryMapping();


      $db_field = $field;
      switch ($field) {
         case 'ifname':
            $db_field = 'name';
            $field = 'ifName';
            break;

         case 'mac':
            $db_field = 'mac';
            $field = 'macaddr';
            break;

         case 'ifnumber':
            $db_field = 'logical_number';
            $field = 'ifIndex';
            break;

         case 'trunk':
            $field = 'vlanTrunkPortDynamicStatus';
            break;

         case 'iftype':
            $field = 'ifType';
            break;

         case 'duplex':
            $field = 'portDuplex';
            break;

      }

      $ptp->load($port_id);
      //echo $ptp->getValue($db_field);
      if ($ptp->getValue($db_field) != $value_new) {
         $a_mapping = $PluginFusioninventoryMapping->get('NetworkEquipment', $field);

         $days = $PluginFusinvsnmpConfigLogField->getValue($a_mapping['id']);

         if ((isset($days)) AND ($days != '-1')) {
            $array = array();
            $array["networkports_id"] = $port_id;
            $array["plugin_fusioninventory_mappings_id"] = $a_mapping['id'];
            $array["value_old"] = $ptp->getValue($db_field);
            $array["value_new"] = $value_new;
            $PluginFusinvsnmpNetworkPortLog->insert_connection("field",$array,$_SESSION['glpi_plugin_fusioninventory_processnumber']);
         }
      }
   }


   
   // $status = connection or disconnection
   static function addLogConnection($status,$port,$plugin_fusioninventory_agentprocesses_id=0) {
      global $DB,$CFG_GLPI;

      $PluginFusinvsnmpNetworkPortConnectionLog = new PluginFusinvsnmpNetworkPortConnectionLog;
      $NetworkPort_NetworkPort=new NetworkPort_NetworkPort();

      $input = array();

      // Récupérer le port de la machine associé au port du switch

      // Récupérer le type de matériel
      $input["networkports_id_source"] = $port;
      $opposite_port = $NetworkPort_NetworkPort->getOppositeContact($port);
      if (!$opposite_port) {
         return;
      }
      $input['networkports_id_destination'] = $opposite_port;

      $input['date_mod'] = date("Y-m-d H:i:s");

      if ($status == 'remove') {
         $input['creation'] = 0;
      } else if ($status == 'make') {
         $input['creation'] = 1;
      }

      $PluginFusinvsnmpNetworkPortConnectionLog->add($input);
   }


   
   // List of history in networking display
   static function showHistory($ID_port) {
      global $DB,$LANG,$INFOFORM_PAGES,$CFG_GLPI;

      $np = new NetworkPort();

      $query = "
         SELECT * FROM(
            SELECT * FROM (
               SELECT `id`, `date_mod`, `plugin_fusioninventory_agentprocesses_id`,
                  `networkports_id_source`, `networkports_id_destination`,
                  `creation` as `field`, NULL as `value_old`, NULL as `value_new`
               FROM `glpi_plugin_fusinvsnmp_networkportconnectionlogs`
               WHERE `networkports_id_source`='".$ID_port."'
                  OR `networkports_id_destination`='".$ID_port."'
               ORDER BY `date_mod` DESC
               LIMIT 30
               )
            AS `DerivedTable1`
            UNION ALL
            SELECT * FROM (
               SELECT `glpi_plugin_fusinvsnmp_networkportlogs`.`id`,
                  `date_mod` as `date_mod`, `plugin_fusioninventory_agentprocesses_id`,
                  `networkports_id` AS `networkports_id_source`,
                  NULL as `networkports_id_destination`,
                  `name` AS `field`, `value_old`, `value_new`
               FROM `glpi_plugin_fusinvsnmp_networkportlogs`
                  LEFT JOIN `glpi_plugin_fusioninventory_mappings`
                     ON `glpi_plugin_fusinvsnmp_networkportlogs`.`plugin_fusioninventory_mappings_id` =
                        `glpi_plugin_fusioninventory_mappings`.`id`
               WHERE `networkports_id`='".$ID_port."'
               ORDER BY `date_mod` DESC
               LIMIT 30
               )
            AS `DerivedTable2`)
         AS `MainTable`
         ORDER BY `date_mod` DESC, `id` DESC
         LIMIT 30";

      $text = "<table class='tab_cadre' cellpadding='5' width='950'>";

      $text .= "<tr class='tab_bg_1'>";
      $text .= "<th colspan='8'>";
      $text .= "Historique";
      $text .= "</th>";
      $text .= "</tr>";

      $text .= "<tr class='tab_bg_1'>";
      $text .= "<th>".$LANG['plugin_fusinvsnmp']['snmp'][50]."</th>";
      $text .= "<th>".$LANG["common"][1]."</th>";
      $text .= "<th>".$LANG["event"][18]."</th>";
      $text .= "<th></th>";
      $text .= "<th></th>";
      $text .= "<th></th>";
      $text .= "<th>".$LANG["common"][27]."</th>";
      $text .= "</tr>";

      if ($result=$DB->query($query)) {
         while ($data=$DB->fetch_array($result)) {
            $text .= "<tr class='tab_bg_1'>";
            if (!empty($data["networkports_id_destination"])) {
               // Connections and disconnections
               if ($data['field'] == '1') {
                  $text .= "<td align='center'><img src='".GLPI_ROOT."/plugins/fusioninventory/pics/connection_ok.png'/></td>";
               } else {
                  $text .= "<td align='center'><img src='".GLPI_ROOT."/plugins/fusioninventory/pics/connection_notok.png'/></td>";
               }
               if ($ID_port == $data["networkports_id_source"]) {
                  $np->getFromDB($data["networkports_id_destination"]);
                  if (isset($np->fields["items_id"])) {
                     $item = new $np->fields["itemtype"];
                     $item->getFromDB($np->fields["items_id"]);
                     $link1 = $item->getLink(1);
                     $link = "<a href=\"" . $CFG_GLPI["root_doc"] . "/front/networkport.form.php?id=" . $np->fields["id"] . "\">";
                     if (rtrim($np->fields["name"]) != "")
                        $link .= $np->fields["name"];
                     else
                        $link .= $LANG['common'][0];
                     $link .= "</a>";
                     $text .= "<td align='center'>".$link." ".$LANG['networking'][25]." ".$link1."</td>";
                  } else {
                     $text .= "<td align='center'><font color='#ff0000'>".$LANG['common'][28]."</font></td>";
                  }

               } else if ($ID_port == $data["networkports_id_destination"]) {
                  $np->getFromDB($data["networkports_id_source"]);
                  if (isset($np->fields["items_id"])) {
                     $item = new $np->fields["itemtype"];
                     $item->getFromDB($np->fields["items_id"]);
                     $link1 = $item->getLink(1);
                     $link = "<a href=\"" . $CFG_GLPI["root_doc"] . "/front/networkport.form.php?id=" . $np->fields["id"] . "\">";
                     if (rtrim($np->fields["name"]) != "")
                        $link .= $np->fields["name"];
                     else
                        $link .= $LANG['common'][0];
                     $link .= "</a>";
                     $text .= "<td align='center'>".$link." ".$LANG['networking'][25]." ".$link1."</td>";
                  } else {
                     $text .= "<td align='center'><font color='#ff0000'>".$LANG['common'][28]."</font></td>";
                  }
               }
               $text .= "<td align='center' colspan='4'></td>";
               $text .= "<td align='center'>".convDateTime($data["date_mod"])."</td>";

            } else {
               // Changes values
               $text .= "<td align='center' colspan='2'></td>";
//               $text .= "<td align='center'>".$FUSIONINVENTORY_MAPPING[NETWORKING_TYPE][$data["field"]]['name']."</td>";
               $map = new PluginFusioninventoryMapping();
               $mapfields = $map->get('NetworkEquipment', $data["field"]);
               if ($mapfields != false) {
                  $text .= "<td align='center'>".
                     $LANG['plugin_fusinvsnmp']['mapping'][$mapfields["locale"]]."</td>";
               } else {
                  $text .= "<td align='center'></td>";
               }
               $text .= "<td align='center'>".$data["value_old"]."</td>";
               $text .= "<td align='center'>-></td>";
               $text .= "<td align='center'>".$data["value_new"]."</td>";
               $text .= "<td align='center'>".convDateTime($data["date_mod"])."</td>";
            }
            $text .= "</tr>";
         }
      }

      $text .= "<tr class='tab_bg_1'>";
      $text .= "<th colspan='8'>";
      $text .= "<a href='".GLPI_ROOT."/plugins/fusinvsnmp/report/switch_ports.history.php?networkports_id=".$ID_port."'>Voir l'historique complet</a>";
      $text .= "</th>";
      $text .= "</tr>";
      $text .= "</table>";
      return $text;
   }
}

?>