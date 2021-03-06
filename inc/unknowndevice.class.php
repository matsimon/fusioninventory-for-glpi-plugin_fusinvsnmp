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
   Original Author of file: Vincent MAZZONI
   Co-authors of file:
   Purpose of file:
   ----------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}


class PluginFusinvsnmpUnknownDevice extends CommonDBTM {

   static function getTypeName() {
      global $LANG;

      return "SNMP";
   }


   function canCreate() {
      return true;
   }

   function canView() {
      return true;
   }

   function canDelete() {
      return false;
   }



   function showForm($id, $options=array()) {
      global $DB,$CFG_GLPI,$LANG;

      $PluginFusioninventoryUnknownDevice = new PluginFusioninventoryUnknownDevice();
      $PluginFusioninventoryUnknownDevice->getFromDB($id);

      $a_devices = $this->find("`plugin_fusioninventory_unknowndevices_id`='".$id."'");
      if (count($a_devices) > 0) {
         foreach ($a_devices as $data) {
            $this->getFromDB($data['id']);
         }
      } else {
         $input = array();
         $input['plugin_fusioninventory_unknowndevices_id'] = $id;
         $device_id = $this->add($input);
         $this->getFromDB($device_id);
      }

      $this->showFormHeader($options);

      echo "<tr class='tab_bg_1'>";
      echo "<td align='center' rowspan='2'>";
      echo $LANG['plugin_fusinvsnmp']['snmp'][4]."&nbsp;:";
      echo "</td>";
		echo "<td rowspan='2'>";
		echo "<textarea name='sysdescr'  cols='45' rows='5' />".$this->fields["sysdescr"]."</textarea>";

		echo "<td align='center'>".$LANG['plugin_fusinvsnmp']['model_info'][4]."&nbsp;:</td>";
		echo "<td align='center'>";
      if (!empty($PluginFusioninventoryUnknownDevice->fields['itemtype'])) {
         Dropdown::show("PluginFusinvsnmpModel",
                     array('name'=>"plugin_fusinvsnmp_models_id",
                           'value'=>$this->fields['plugin_fusinvsnmp_models_id'],
                           'comment'=>1,
                           'condition'=>"`itemtype`='".$PluginFusioninventoryUnknownDevice->fields['itemtype']."'"));
      }
      echo "</td>";
      echo "</tr>";

      echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>".$LANG['plugin_fusinvsnmp']['functionalities'][43]."&nbsp;:</td>";
		echo "<td align='center'>";
		PluginFusinvsnmpSNMP::auth_dropdown($this->fields['plugin_fusinvsnmp_configsecurities_id']);
		echo "</td>";
      echo "</tr>";
      
      $this->showFormButtons($options);

      return true;
   }



   function loadAgentconfig($agents_id) {

      $a_agent = $this->find("`plugin_fusioninventory_agents_id`='".$agents_id."'");
      if (count($a_agent) > 0) {
         foreach ($a_agent as $data) {
            $this->getFromDB($data['id']);
            return;
         }
      }
      // If we are here, agentconfig has been not found
      $this->getEmpty();
      $this->fields['plugin_fusioninventory_agents_id'] = $agents_id;
      $this->fields['threads_netdiscovery'] = 1;
      $this->fields['threads_snmpquery'] = 1;
      unset($this->fields['id']);
      $this->add($this->fields);
   }



   function import($unknown_id, $items_id, $item_type) {
      global $DB;

      $PluginFusioninventoryUnknownDevice = new PluginFusioninventoryUnknownDevice();
      $PluginFusioninventoryUnknownDevice->getFromDB($unknown_id);

      $a_devices = $this->find("`plugin_fusioninventory_unknowndevices_id`='".$unknown_id."'");
      if (count($a_devices) == 0) {
         return;
      }
      $snmp_device = current($a_devices);
      $data = array();
      switch ($item_type) {

         case 'Printer':
            $PluginFusinvsnmpPrinter = new PluginFusinvsnmpCommonDBTM("glpi_plugin_fusinvsnmp_printers");

            $query = "SELECT *
                      FROM `glpi_plugin_fusinvsnmp_printers`
                      WHERE `printers_id`='".$items_id."' ";
            $result = $DB->query($query);
            if ($DB->numrows($result) > 0) {
               $data = $DB->fetch_assoc($result);
            }
               
            $data['sysdescr'] = $snmp_device['sysdescr'];
            $data['plugin_fusinvsnmp_models_id'] = $snmp_device['plugin_fusinvsnmp_models_id'];
            $data['plugin_fusinvsnmp_configsecurities_id'] = $snmp_device['plugin_fusinvsnmp_configsecurities_id'];

            if ($DB->numrows($result) == 0) {
               $data['printers_id'] = $items_id;
               $PluginFusinvsnmpPrinter->add($data);
            } else {
               $PluginFusinvsnmpPrinter->update($data);
            }
            $this->delete($snmp_device);
            break;
         
         case 'NetworkEquipment':
            $PluginFusinvsnmpNetworkEquipment = new PluginFusinvsnmpCommonDBTM("glpi_plugin_fusinvsnmp_networkequipments");

            $query = "SELECT *
                      FROM `glpi_plugin_fusinvsnmp_networkequipments`
                      WHERE `networkequipments_id`='".$items_id."' ";
            $result = $DB->query($query);
            if ($DB->numrows($result) > 0) {
               $data = $DB->fetch_assoc($result);
            }

            $data['sysdescr'] = $snmp_device['sysdescr'];
            $data['plugin_fusinvsnmp_models_id'] = $snmp_device['plugin_fusinvsnmp_models_id'];
            $data['plugin_fusinvsnmp_configsecurities_id'] = $snmp_device['plugin_fusinvsnmp_configsecurities_id'];

            if ($DB->numrows($result) == 0) {
               $data['networkequipments_id'] = $items_id;
               $PluginFusinvsnmpNetworkEquipment->add($data);
            } else {
               $PluginFusinvsnmpNetworkEquipment->update($data);
            }
            $this->delete($snmp_device);
            break;
         
      }      
   }
}

?>