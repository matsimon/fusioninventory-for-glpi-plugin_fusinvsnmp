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

$USEDBREPLICATE=1;
$DBCONNECTION_REQUIRED=0;

define('GLPI_ROOT', '../../..'); 
include (GLPI_ROOT . "/inc/includes.php"); 

commonHeader($LANG['plugin_fusioninventory']['title'][0],$_SERVER["PHP_SELF"],"plugins","fusioninventory","printerlog");

PluginFusioninventoryProfile::checkRight("fusinvsnmp","reportprinter","r");

if (isset($_POST['glpi_plugin_fusioninventory_date_start'])) {
   $_SESSION['glpi_plugin_fusioninventory_date_start'] = $_POST['glpi_plugin_fusioninventory_date_start'];
}
if (isset($_POST['glpi_plugin_fusioninventory_date_end'])) {
   $_SESSION['glpi_plugin_fusioninventory_date_end'] = $_POST['glpi_plugin_fusioninventory_date_end'];
}

if (isset($_POST['reset'])) {
   unset($_SESSION['glpi_plugin_fusioninventory_date_start']);
   unset($_SESSION['glpi_plugin_fusioninventory_date_end']);
}

if ((!isset($_SESSION['glpi_plugin_fusioninventory_date_start']))
       OR (empty($_SESSION['glpi_plugin_fusioninventory_date_start']))) {
   $_SESSION['glpi_plugin_fusioninventory_date_start'] = "1970-01-01";
}
if (!isset($_SESSION['glpi_plugin_fusioninventory_date_end'])) {
   $_SESSION['glpi_plugin_fusioninventory_date_end'] = date("Y-m-d");
}

displaySearchForm();

$_GET['target']="printer_counter.php";

Search::show('PluginFusinvsnmpPrinterLog');

function displaySearchForm() {
	global $_SERVER,$_GET,$LANG,$CFG_GLPI;

	echo "<form action='".$_SERVER["PHP_SELF"]."' method='post'>";
	echo "<table class='tab_cadre' cellpadding='5'>";
	echo "<tr class='tab_bg_1' align='center'>";
	echo "<td>";
	echo $LANG['plugin_fusinvsnmp']['state'][4]." :";
	echo "</td>";
   echo "<td width='120'>";
	showDateFormItem("glpi_plugin_fusioninventory_date_start",$_SESSION['glpi_plugin_fusioninventory_date_start']);
	echo "</td>";

	echo "<td>";
	echo $LANG['plugin_fusinvsnmp']['state'][5]." :";
	echo "</td>";
   echo "<td width='120'>";
	showDateFormItem("glpi_plugin_fusioninventory_date_end",$_SESSION['glpi_plugin_fusioninventory_date_end']);
	echo "</td>";

   echo "<td>";
	echo "<input type='submit' name='reset' value='reset' class='submit' />";
   echo "</td>";

	echo "<td>";
	echo "<input type='submit' value='Valider' class='submit' />";
	echo "</td>";

	echo "</tr>";
	echo "</table>";
	echo "</form>";
}

commonFooter(); 

?>