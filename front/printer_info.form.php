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

define('GLPI_ROOT', '../../..'); 

include (GLPI_ROOT."/inc/includes.php");

PluginFusioninventoryProfile::checkRight("fusinvsnmp", "printer","r");

if ((isset($_POST['update'])) && (isset($_POST['id']))) {
		PluginFusioninventoryProfile::checkRight("fusinvsnmp", "printer","w");
	
	$plugin_fusioninventory_printer = new PluginFusinvsnmpCommonDBTM("glpi_plugin_fusinvsnmp_printers");
	
	$_POST['printers_id'] = $_POST['id'];
	unset($_POST['id']);
	
	$query = "SELECT * 
             FROM `glpi_plugin_fusinvsnmp_printers`
             WHERE `printers_id`='".$_POST['printers_id']."' ";
	$result = $DB->query($query);

   if ($DB->numrows($result) == "0") {
      $queryInsert = "INSERT INTO `glpi_plugin_fusinvsnmp_printers`(`printers_id`)
                      VALUES('".$_POST['printers_id']."');";
      $DB->query($queryInsert);
      $query = "SELECT *
                FROM `glpi_plugin_fusinvsnmp_printers`
                WHERE `printers_id`='".$_POST['printers_id']."' ";
      $result = $DB->query($query);
   }

	$data = $DB->fetch_assoc($result);	
	$_POST['id'] = $data['id'];

	$plugin_fusioninventory_printer->update($_POST);
	
} else if ((isset($_POST["GetRightModel"])) && (isset($_POST['id']))) {
   $plugin_fusioninventory_model_infos = new PluginFusinvsnmpModel;
   $plugin_fusioninventory_model_infos->getrightmodel($_POST['id'], PRINTER_TYPE);
}

$arg = "";
for ($i=1 ; $i <= 5 ; $i++) {
   $value = '';
	switch ($i) {
		case 1:
			$value = "datetotalpages";
			break;

		case 2:
			$value = "dateblackpages";
			break;

		case 3:
			$value = "datecolorpages";
			break;

		case 4:
			$value = "daterectoversopages";
			break;

		case 5:
			$value = "datescannedpages";
			break;

	}
	if (isset($_POST[$value])) {
      $_SESSION[$value] = $_POST[$value];
	}
}

if (isset($_POST['graph_plugin_fusioninventory_printer_period'])) {
   $fields = array('graph_begin', 'graph_end', 'graph_timeUnit', 'graph_type');
   foreach ($fields as $field) {
      if (isset($_POST[$field])) {
         $_SESSION['glpi_plugin_fusioninventory_'.$field] = $_POST[$field];
      } else {
         unset($_SESSION['glpi_plugin_fusioninventory_'.$field]);
      }
   }
}

$field = 'graph_printerCompAdd';
if (isset($_POST['graph_plugin_fusioninventory_printer_add'])) {
   if (isset($_POST[$field])) {
      $_SESSION['glpi_plugin_fusioninventory_'.$field] = $_POST[$field];
   }
} else {
   unset($_SESSION['glpi_plugin_fusioninventory_'.$field]);
}

$field = 'graph_printerCompRemove';
if (isset($_POST['graph_plugin_fusioninventory_printer_remove'])) {
   if (isset($_POST[$field])) {
      $_SESSION['glpi_plugin_fusioninventory_'.$field] = $_POST[$field];
   }
} else {
   unset($_SESSION['glpi_plugin_fusioninventory_'.$field]);
}

glpi_header($_SERVER['HTTP_REFERER']);

?>