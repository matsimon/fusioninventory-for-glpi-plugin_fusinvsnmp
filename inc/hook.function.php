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

function plugin_fusinvsnmp_task_methods() {
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


function plugin_fusinvsnmp_task_netdiscovery_iprange() {
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
function plugin_fusinvsnmp_task_action_snmpinventory() {
   $a_itemtype = array();
   $a_itemtype[] = PRINTER_TYPE;
   $a_itemtype[] = NETWORKING_TYPE;
   $a_itemtype[] = 'PluginFusinvsnmpIPRange';

   return $a_itemtype;
}


function plugin_fusinvsnmp_task_action_netdiscovery() {
   $a_itemtype = array();
   $a_itemtype[] = 'PluginFusinvsnmpIPRange';

   return $a_itemtype;
}

# Selection type for actions
function plugin_fusinvsnmp_task_selection_type_snmpinventory($itemtype) {
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


function plugin_fusinvsnmp_selection_type_netdiscovery($itemtype) {
   switch ($itemtype) {

      case 'PluginFusinvsnmpIPRange':
         $selection_type = 'iprange';
         break;

   }

   return $selection_type;
}


?>