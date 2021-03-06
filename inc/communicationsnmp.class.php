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
   Purpose of file: management of snmp communication with agents
   ----------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

class PluginFusinvsnmpCommunicationSNMP {
   private $sxml, $deviceId, $ptd;

   /**
    * Add AUTHENTICATION string to XML node
    *
    *@param $p_sxml_node XML node to authenticate
    *@param $p_id Authenticate id
    *@return nothing
    **/
   function addAuth($p_sxml_node, $p_id) {
      $PluginFusinvsnmpConfigSecurity = new PluginFusinvsnmpConfigSecurity();
      $PluginFusinvsnmpConfigSecurity->getFromDB($p_id);

      $sxml_authentication = $p_sxml_node->addChild('AUTHENTICATION');
         $sxml_authentication->addAttribute('ID', $p_id);
         $sxml_authentication->addAttribute('COMMUNITY', $PluginFusinvsnmpConfigSecurity->fields['community']);
         $sxml_authentication->addAttribute('VERSION',
                           $PluginFusinvsnmpConfigSecurity->getSNMPVersion($PluginFusinvsnmpConfigSecurity->fields['snmpversion']));
         $sxml_authentication->addAttribute('USERNAME', $PluginFusinvsnmpConfigSecurity->fields['username']);
         if ($PluginFusinvsnmpConfigSecurity->fields['authentication'] == '0') {
            $sxml_authentication->addAttribute('AUTHPROTOCOL', '');
         } else {
            $sxml_authentication->addAttribute('AUTHPROTOCOL',
                           $PluginFusinvsnmpConfigSecurity->getSNMPAuthProtocol($PluginFusinvsnmpConfigSecurity->fields['authentication']));
         }
         $sxml_authentication->addAttribute('AUTHPASSPHRASE', $PluginFusinvsnmpConfigSecurity->fields['auth_passphrase']);
         if ($PluginFusinvsnmpConfigSecurity->fields['encryption'] == '0') {
            $sxml_authentication->addAttribute('PRIVPROTOCOL', '');
         } else {
            $sxml_authentication->addAttribute('PRIVPROTOCOL',
                           $PluginFusinvsnmpConfigSecurity->getSNMPEncryption($PluginFusinvsnmpConfigSecurity->fields['encryption']));
         }
         $sxml_authentication->addAttribute('PRIVPASSPHRASE', $PluginFusinvsnmpConfigSecurity->fields['priv_passphrase']);
   }



   function addModel($p_sxml_node, $p_id) {
      $PluginFusinvsnmpModel = new PluginFusinvsnmpModel();
      $PluginFusinvsnmpModelMib = new PluginFusinvsnmpModelMib();

      $PluginFusinvsnmpModel->getFromDB($p_id);
      $sxml_model = $p_sxml_node->addChild('MODEL');
         $sxml_model->addAttribute('ID', $p_id);
         $sxml_model->addAttribute('NAME', $PluginFusinvsnmpModel->fields['name']);
         $PluginFusinvsnmpModelMib->oidList($sxml_model,$p_id);
   }


   function addGet($p_sxml_node, $p_object, $p_oid, $p_link, $p_vlan) {
      $sxml_get = $p_sxml_node->addChild('GET');
         $sxml_get->addAttribute('OBJECT', $p_object);
         $sxml_get->addAttribute('OID', $p_oid);
         $sxml_get->addAttribute('VLAN', $p_vlan);
         $sxml_get->addAttribute('LINK', $p_link);
   }


   function addWalk($p_sxml_node, $p_object, $p_oid, $p_link, $p_vlan) {
      $sxml_walk = $p_sxml_node->addChild('WALK');
         $sxml_walk->addAttribute('OBJECT', $p_object);
         $sxml_walk->addAttribute('OID', $p_oid);
         $sxml_walk->addAttribute('VLAN', $p_vlan);
         $sxml_walk->addAttribute('LINK', $p_link);
   }
}

?>