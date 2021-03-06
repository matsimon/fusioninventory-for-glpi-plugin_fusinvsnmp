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

//class PluginFusinvsnmpImportExport extends CommonDBTM {
class PluginFusinvsnmpImportExport extends CommonGLPI {

	function export($ID_model) {
		global $DB;

		PluginFusioninventoryProfile::checkRight("fusinvsnmp", "model","r");
		$query = "SELECT *
                FROM `glpi_plugin_fusinvsnmp_models`
                WHERE `id`='".$ID_model."';";

      $model_name = "";
      $type = "";
      $discovery_key = "";
      $comment = "";

		if ($result=$DB->query($query)) {
			if ($DB->numrows($result) != 0) {
				$model_name = $DB->result($result, 0, "name");
				$type = $DB->result($result, 0, "itemtype");
				$discovery_key = $DB->result($result, 0, "discovery_key");
            $comment = $DB->result($result, 0, "comment");
			} else {
				exit();
         }
		}

		// Construction of XML file
		$xml = "<model>\n";
		$xml .= "	<name><![CDATA[".$model_name."]]></name>\n";
		$xml .= "	<type>".$type."</type>\n";
		$xml .= "	<key>".$discovery_key."</key>\n";
      $xml .= "	<comments><![CDATA[".$comment."]]></comments>\n";
		$xml .= "	<oidlist>\n";

      $query = "SELECT `glpi_plugin_fusinvsnmp_modelmibs`.*,
         FROM `glpi_plugin_fusinvsnmp_modelmibs`
         WHERE `plugin_fusinvsnmp_models_id`='".$ID_model."';";

		if ($result=$DB->query($query)) {
			while ($data=$DB->fetch_array($result)) {
				$xml .= "		<oidobject>\n";
				$xml .= "			<object><![CDATA[".
               Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_mibobjects",$data["plugin_fusinvsnmp_mibobjects_id"]).
               "]]></object>\n";
				$xml .= "			<oid><![CDATA[".
               Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_miboids",$data["plugin_fusinvsnmp_miboids_id"])."]]></oid>\n";
				$xml .= "			<portcounter>".$data["oid_port_counter"]."</portcounter>\n";
				$xml .= "			<dynamicport>".$data["oid_port_dyn"]."</dynamicport>\n";
				$xml .= "			<mappings_id>".$data["plugin_fusioninventory_mappings_id"].
                                 "</mappings_id>\n";
				$xml .= "			<vlan>".$data["vlan"]."</vlan>\n";
				$xml .= "			<activation>".$data["is_active"]."</activation>\n";
				$xml .= "		</oidobject>\n";
			}
		}
		$xml .= "	</oidlist>\n";
		$xml .= "</model>\n";

		return $xml;
	}



	function showForm($id, $options=array()) {
		global $DB,$CFG_GLPI,$LANG;

		PluginFusioninventoryProfile::checkRight("fusinvsnmp", "model", "r");

      $target = GLPI_ROOT.'/plugins/fusinvsnmp/front/model.form.php';
		echo "<form action='".$target."?add=1' method='post' enctype='multipart/form-data'>";

		echo "<br>";
		echo "<table class='tab_cadre' cellpadding='1' width='600'><tr><th colspan='2'>";
		echo $LANG['plugin_fusinvsnmp']['model_info'][10]." :</th></tr>";

		echo "	<tr class='tab_bg_1'>";
		echo "		<td align='center'>";
		echo "</td>";
		echo "<td align='center'>";
		echo "<input type='file' name='importfile' value=''/>";

      if(PluginFusioninventoryProfile::haveRight("fusinvsnmp", "model","w")) {
         echo "&nbsp;<input type='submit' value='".$LANG["buttons"][37]."' class='submit'/>";
      }
		echo "</td>";
		echo "</tr>";
		echo "</table>";

		echo "</form>";
	}



   function showFormMassImport($target) {
		global $DB,$CFG_GLPI,$LANG;

      PluginFusioninventoryProfile::checkRight("fusinvsnmp", "model","r");

      echo "<form action='".$target."?add=1' method='post' enctype='multipart/form-data'>";

		echo "<table class='tab_cadre' cellpadding='1' width='600'><tr><th>";
		echo $LANG['plugin_fusinvsnmp']['model_info'][15]." :</th></tr>";

		echo "	<tr class='tab_bg_1'>";
		echo "<td align='center'>";
      echo $LANG['plugin_fusinvsnmp']['model_info'][16]."<br/>";
		echo "<input type='hidden' name='massimport' value='1'/>";
      if(PluginFusioninventoryProfile::haveRight("fusinvsnmp", "model","w")) {
         echo "&nbsp;<input type='submit' value='".$LANG["buttons"][37]."' class='submit'/>";
      }
		echo "</td>";
		echo "</tr>";
		echo "</table>";

		echo "</form>";
   }



	function import($file,$message=1,$installation=0) {
		global $DB,$LANG;

		if ($installation != 1) {
			PluginFusioninventoryProfile::checkRight("fusinvsnmp", "model","w");
      }

      $PluginFusioninventoryMapping = new PluginFusioninventoryMapping();

		$xml = simplexml_load_file($file,'SimpleXMLElement', LIBXML_NOCDATA);

		// Verify same model exist
		$query = "SELECT id
                FROM `glpi_plugin_fusinvsnmp_models`
                WHERE `name`='".(string)$xml->name."';";
		$result = $DB->query($query);

		if ($DB->numrows($result) > 0) {
			if ($message == '1') {
				$_SESSION["MESSAGE_AFTER_REDIRECT"] = $LANG['plugin_fusinvsnmp']['model_info'][8];
         }
			return false;
		} else {
         $type = (string)$xml->type;
         switch ($type) {

            case '1':
               $type = "Computer";
               break;

            case '2':
               $type = "NetworkEquipment";
               break;

            case '3':
               $type = "Printer";
               break;

         }

			$query = "INSERT INTO `glpi_plugin_fusinvsnmp_models`
                               (`name`,`itemtype`,`discovery_key`,`comment`)
                   VALUES('".(string)$xml->name."','".$type."','".(string)$xml->key."','".(string)$xml->comments."');";
			$DB->query($query);
			$plugin_fusinvsnmp_models_id = $DB->insert_id();

			$i = -1;
			foreach($xml->oidlist->oidobject as $child) {
            unset($plugin_fusinvsnmp_mibobjects_id);
            unset($plugin_fusinvsnmp_miboids_id);
            unset($oid_port_counter);
            unset($oid_port_dyn);
            unset($mapping_type);
            unset($mapping_name);
            unset($vlan);
            unset($is_active);
            $mappings_id = 0;

            if (isset($child->object)) {
               $plugin_fusinvsnmp_mibobjects_id = Dropdown::importExternal(
                                         "PluginFusinvsnmpMibObject",$child->object);
            }
            if (isset($child->oid)) {
               $plugin_fusinvsnmp_miboids_id = Dropdown::importExternal(
                                      "PluginFusinvsnmpMibOid",$child->oid);
            }
            if (isset($child->portcounter)) {
               $oid_port_counter = $child->portcounter;
            }
            if (isset($child->dynamicport)) {
               $oid_port_dyn = $child->dynamicport;
            }
            if (isset($child->mapping_type)) {
               switch($child->mapping_type) {

                  case '1':
                     $mapping_type = 'Computer';
                     break;

                  case '2':
                     $mapping_type = 'NetworkEquipment';
                     break;

                  case '3':
                     $mapping_type = 'Printer';
                     break;

               }
            }
            if (isset($child->mapping_name)) {
               $mapping_name = $child->mapping_name;
            }
            if (isset($child->vlan)) {
               $vlan = $child->vlan;
            }
            if (isset($child->activation)) {
               $is_active = $child->activation;
            }
            if (isset($mapping_type) AND isset($mapping_name)) {
               $a_mappings = $PluginFusioninventoryMapping->get($mapping_type, $mapping_name);
               $mappings_id = $a_mappings['id'];
            }
            if (!isset($mappings_id) OR empty($mappings_id)) {
               $mappings_id = '0';
            }


				$query = "INSERT INTO `glpi_plugin_fusinvsnmp_modelmibs`
                                  (`plugin_fusinvsnmp_models_id`,`plugin_fusinvsnmp_miboids_id`,`plugin_fusinvsnmp_mibobjects_id`,`oid_port_counter`,
                                   `oid_port_dyn`,`plugin_fusioninventory_mappings_id`,`vlan`,`is_active`)
                      VALUES('".$plugin_fusinvsnmp_models_id."','".$plugin_fusinvsnmp_miboids_id."','".$plugin_fusinvsnmp_mibobjects_id."',
                             '".$oid_port_counter."', '".$oid_port_dyn."', '".$mappings_id."',
                             '".$vlan."', '".$is_active."');";
				$DB->query($query);
			}
			if ($message == '1') {
				$_SESSION["MESSAGE_AFTER_REDIRECT"] = $LANG['plugin_fusinvsnmp']['model_info'][9].
               " : <a href='model.form.php?id=".$plugin_fusinvsnmp_models_id."'>".(string)$xml->name."</a>";
         }
		}
	}



   function importMass() {
      ini_set("max_execution_time", "0");
      foreach (glob(GLPI_ROOT.'/plugins/fusinvsnmp/models/*.xml') as $file) $this->import($file,0,1);
   }



	function import_netdiscovery($p_xml, $agentKey) {
		global $DB,$LANG;

      $ptap             = new PluginFusinvsnmpStateDiscovery();
      $pta              = new PluginFusioninventoryAgent();

      $agent = $pta->InfosByKey($agentKey);

      if (isset($p_xml->AGENT->START)) {
         $ptap->updateState($p_xml->PROCESSNUMBER, array('start_time' => date("Y-m-d H:i:s")), $agent['id']);
      } else if (isset($p_xml->AGENT->END)) {
         $ptap->updateState($p_xml->PROCESSNUMBER, array('end_time' => date("Y-m-d H:i:s")), $agent['id']);
      } else if (isset($p_xml->AGENT->EXIT)) {
         $ptap->endState($p_xml->PROCESSNUMBER, date("Y-m-d H:i:s"), $agent['id']);
      } else if (isset($p_xml->AGENT->NBIP)) {
         $ptap->updateState($p_xml->PROCESSNUMBER, array('nb_ip' => $p_xml->AGENT->NBIP), $agent['id']);
      }
      if (isset($p_xml->AGENT->AGENTVERSION)) {
         $agent['last_contact'] = date("Y-m-d H:i:s");
         $pta->update($agent);
      }
      $_SESSION['glpi_plugin_fusioninventory_agentid'] = $agent['id'];

		$count_discovery_devices = 0;
   	foreach($p_xml->DEVICE as $discovery) {
			$count_discovery_devices++;
  		}
      if ($count_discovery_devices != "0") {
         $ptap->updateState($_SESSION['glpi_plugin_fusioninventory_processnumber'], array('nb_found' => $count_discovery_devices), $agent['id']);
         foreach($p_xml->DEVICE as $discovery) {
            if (count($discovery) > 0) {
               $PluginFusinvsnmpCommunicationNetDiscovery = new PluginFusinvsnmpCommunicationNetDiscovery();
               $PluginFusinvsnmpCommunicationNetDiscovery->sendCriteria($discovery);
            }
         }
      }
	}
}

?>