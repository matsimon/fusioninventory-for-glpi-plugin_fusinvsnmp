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

//Options for GLPI 0.71 and newer : need slave db to access the report
$USEDBREPLICATE=1;
$DBCONNECTION_REQUIRED=0;

$NEEDED_ITEMS=array("search","computer","infocom","setup","networking","printer");

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT . "/inc/includes.php");

commonHeader($LANG['plugin_fusioninventory']["title"][0],$_SERVER['PHP_SELF'],"utils","report");

PluginFusioninventoryProfile::checkRight("fusinvsnmp","reportnetworkequipment","r");

$nbdays = 1;
if (isset($_GET["nbdays"])) {
	$nbdays = $_GET["nbdays"];
}
$state = '';
if (isset($_GET["state"])) {
   $state = $_GET["state"];
}

echo "<form action='".$_SERVER["PHP_SELF"]."' method='get'>";
echo "<table class='tab_cadre' cellpadding='5'>";

echo "<tr class='tab_bg_1' align='center'>";
echo "<td>";
echo $LANG['plugin_fusinvsnmp']["report"][0]." :&nbsp;";
echo "</td>";
echo "<td>";
Dropdown::showInteger("nbdays", $nbdays, 1, 365);
echo "</td>";
echo "</tr>";

echo "<tr class='tab_bg_1' align='center'>";
echo "<td>";
echo $LANG['state'][0];
echo "</td>";
echo "<td>";
Dropdown::show("State", array('name'=>'state', 'value'=>$state));
echo "</td>";
echo "</tr>";

echo "<tr class='tab_bg_2'>";
echo "<td align='center' colspan='2'>";
echo "<input type='submit' value='Valider' class='submit' />";
echo "</td>";
echo "</tr>";

echo "</table></form>";




if(isset($_GET["FK_networking_ports"])) {
   echo PluginFusinvsnmpNetworkPortLog::showHistory($_GET["FK_networking_ports"]);
}

echo "</form>";

$state_sql = "";
if (($state != "") AND ($state != "0")) {
   $state_sql = " AND `states_id` = '".$state."' ";
}

$query = "SELECT * FROM (
SELECT `name`, `last_fusioninventory_update`, `serial`, `otherserial`,
   `networkequipmentmodels_id`, `glpi_networkequipments`.`id` as `network_id`, 0 as `printer_id`,
   `plugin_fusinvsnmp_models_id`, `plugin_fusinvsnmp_configsecurities_id`, `ip` FROM `glpi_plugin_fusinvsnmp_networkequipments`
JOIN `glpi_networkequipments` on `networkequipments_id` = `glpi_networkequipments`.`id`
WHERE ((NOW() > ADDDATE(last_fusioninventory_update, INTERVAL ".$nbdays." DAY) OR last_fusioninventory_update IS NULL)
   ".$state_sql.")
UNION
SELECT `glpi_printers`.`name`, `last_fusioninventory_update`, `serial`, `otherserial`,
   `printermodels_id`, 0 as `network_id`, `glpi_printers`.`id` as `printer_id`,
   `plugin_fusinvsnmp_models_id`, `plugin_fusinvsnmp_configsecurities_id`, `ip`
   FROM `glpi_plugin_fusinvsnmp_printers`
JOIN `glpi_printers` on `printers_id` = `glpi_printers`.`id`
LEFT JOIN `glpi_networkports` on `glpi_networkports`.`items_id` = `glpi_printers`.`id`
WHERE (NOW() > ADDDATE(last_fusioninventory_update, INTERVAL ".$nbdays." DAY) OR last_fusioninventory_update IS NULL)
AND `glpi_networkports`.`items_id`='Printer' ".$state_sql.") as `table`

ORDER BY last_fusioninventory_update DESC";

echo "<table class='tab_cadre' cellpadding='5' width='950'>";
echo "<tr class='tab_bg_1'>";
echo "<th>".$LANG['common'][16]."</th>";
echo "<th>".$LANG['plugin_fusinvsnmp']['snmp'][53]."</th>";
echo "<th>".$LANG['state'][6]."</th>";
echo "<th>".$LANG['networking'][14]."</th>";
echo "<th>".$LANG['common'][19]."</th>";
echo "<th>".$LANG['common'][20]."</th>";
echo "<th>".$LANG['common'][22]."</th>";
echo "<th>".$LANG['plugin_fusinvsnmp']['model_info'][4]."</th>";
echo "<th>".$LANG['plugin_fusinvsnmp']['model_info'][3]."</th>";
echo "</tr>";

if ($result=$DB->query($query)) {
   while ($data=$DB->fetch_array($result)) {
      echo "<tr class='tab_bg_1'>";
      echo "<td>";
      if ($data['network_id'] > 0) {
         $class = new NetworkEquipment();
         $class->getFromDB($data['network_id']);
      } else if ($data['printer_id'] > 0) {
         $class = new Printer();
         $class->getFromDB($data['printer_id']);
      }
      echo $class->getLink(1);
      echo "</td>";
      echo "<td>".convDateTime($data['last_fusioninventory_update'])."</td>";
      echo "<td>";
      if ($data['network_id'] > 0) {
         echo $LANG['Menu'][1];
      } else if ($data['printer_id'] > 0) {
         echo $LANG['Menu'][2];
      }
      echo "</td>";
      echo "<td>".$data['ip']."</td>";
      echo "<td>".$data['serial']."</td>";
      echo "<td>".$data['otherserial']."</td>";
      if ($data['network_id'] > 0) {
         echo "<td>".Dropdown::getDropdownName("glpi_networkequipmentmodels", $data['networkequipmentmodels_id'])."</td>";
      } else if ($data['printer_id'] > 0) {
         echo "<td>".Dropdown::getDropdownName("glpi_printermodels", $data['printermodels_id'])."</td>";
      }
      echo "<td>";
      echo Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_models", $data['plugin_fusinvsnmp_models_id']);
      echo "</td>";
      echo "<td>";
      echo Dropdown::getDropdownName('glpi_plugin_fusinvsnmp_configsecurities', $data['plugin_fusinvsnmp_configsecurities_id']);
      echo "</td>";
      echo "</tr>";
   }
}
echo "</table>";

commonFooter();

?>