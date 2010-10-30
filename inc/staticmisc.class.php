<?php

/*
   ----------------------------------------------------------------------
   GLPI - Gestionnaire Libre de Parc Informatique
   Copyright (C) 2003-2008 by the INDEPNET Development Team.

   http://indepnet.net/   http://glpi-project.org/
   ----------------------------------------------------------------------

   LICENSE

   This file is part of GLPI.

   GLPI is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   GLPI is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with GLPI; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
   ------------------------------------------------------------------------
 */

// Original Author of file: David DURIEUX
// Purpose of file:
// ----------------------------------------------------------------------

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

class PluginFusinvsnmpStaticmisc {
   static function task_methods() {
      global $LANG;

      $a_tasks = array();

      $a_tasks[] = array('module'         => 'fusinvsnmp',
                         'method'         => 'netdiscovery',
                         'selection_type' => 'iprange',
                         'selection_type_name' => $LANG['plugin_fusioninventory']["menu"][2]);
      $a_tasks[] = array('module'         => 'fusinvsnmp',
                         'method'         => 'netdiscovery',
                         'selection_type' => 'ipranges associated');
      $a_tasks[] = array('module'         => 'fusinvsnmp',
                         'method'         => 'snmpinventory',
                         'selection_type' => 'devices');
      $a_tasks[] = array('module'         => 'fusinvsnmp',
                         'method'         => 'snmpinventory',
                         'selection_type' => 'iprange',
                         'selection_type_name' => $LANG['plugin_fusioninventory']["menu"][2]);
      $a_tasks[] = array('module'         => 'fusinvsnmp',
                         'method'         => 'snmpinventory',
                         'selection_type' => 'ipranges associated');

      return $a_tasks;
   }


   static function task_netdiscovery_iprange() {
      global $LANG;

      $PluginFusinvsnmpIPRange = new PluginFusinvsnmpIPRange;

      $array = array();
      $a_rangeip = $PluginFusinvsnmpIPRange->find("", "name");
      foreach ($a_rangeip as $id=>$datas) {
         $array[$id] = $datas['name']." [".$datas['ip_start']." - ".$datas['ip_end']."]";
      }
      return $array;
   }

   # Actions with itemtype autorized
   static function task_action_snmpinventory() {
      $a_itemtype = array();
      $a_itemtype[] = PRINTER_TYPE;
      $a_itemtype[] = NETWORKING_TYPE;
      $a_itemtype[] = 'PluginFusinvsnmpIPRange';

      return $a_itemtype;
   }


   static function task_action_netdiscovery() {
      $a_itemtype = array();
      $a_itemtype[] = 'PluginFusinvsnmpIPRange';

      return $a_itemtype;
   }

   # Selection type for actions
   static function task_selection_type_snmpinventory($itemtype) {
      switch ($itemtype) {

         case 'PluginFusinvsnmpIPRange':
            $selection_type = 'iprange';
            break;

         case PRINTER_TYPE;
         case NETWORKING_TYPE;
            $selection_type = 'devices';
            break;

      }

      return $selection_type;
   }


   static function selection_type_netdiscovery($itemtype) {
      switch ($itemtype) {

         case 'PluginFusinvsnmpIPRange':
            $selection_type = 'iprange';
            break;

      }

      return $selection_type;
   }

   static function displayMenu() {
      global $LANG;

      $a_menu = array();
      if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "models", "r")) {
         $a_menu[0]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][4];
         $a_menu[0]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_models.png";
         $a_menu[0]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/model.php";
      }

      //if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configsecurity", "r")) {
         $a_menu[1]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][3];
         $a_menu[1]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_authentification.png";
         $a_menu[1]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/configsecurity.php";
      //}

      if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "iprange", "r")) {
         $a_menu[2]['name'] = $LANG['plugin_fusinvsnmp']["menu"][2];
         $a_menu[2]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_rangeip.png";
         $a_menu[2]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/iprange.php";
      }

      $a_menu[3]['name'] = $LANG['plugin_fusinvsnmp']["menu"][7];
      $a_menu[3]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_rules.png";
      $a_menu[3]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/rulediscovery.php";

      $a_menu[4]['name'] = $LANG['plugin_fusinvsnmp']["menu"][8];
      $a_menu[4]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_rules.png";
      $a_menu[4]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/ruleinventory.php";

      $a_menu[5]['name'] = "Etat des découverte";
      $a_menu[5]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_discovery_status.png";
      $a_menu[5]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/statediscovery.php";

      $a_menu[6]['name'] = "Etat des inventaires réseaux";
      $a_menu[6]['pic']  = GLPI_ROOT."/plugins/fusinvsnmp/pics/menu_inventory_status.png";
      $a_menu[6]['link'] = GLPI_ROOT."/plugins/fusinvsnmp/front/iprange.php";

      return $a_menu;
   }
}
?>