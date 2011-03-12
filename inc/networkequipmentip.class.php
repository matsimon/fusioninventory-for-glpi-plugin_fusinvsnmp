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
// Purpose of file: modelisation of a networking switch ports
// ----------------------------------------------------------------------

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

/**
 * Class to use networking interface address
 **/
class PluginFusinvsnmpNetworkEquipmentIP extends PluginFusinvsnmpCommonDBTM {
	/**
	 * Constructor
	**/
   function __construct() {
      parent::__construct("glpi_plugin_fusinvsnmp_networkequipmentips");
   }

   /**
    * Add a new ip with the instance values
    *
    *@param $p_id Networking id
    *@return nothing
    **/
   function addDB($p_id) {
      if (count($this->ptcdUpdates)) {
         $this->ptcdUpdates['networkequipments_id']=$p_id;
         $this->add($this->ptcdUpdates);
      }
   }


   // Get all IP of the switch
   function getIP($items_id) {
      $a_ips = $this->find("`networkequipments_id`='".$items_id."'");
      $array = array();
      foreach ($a_ips as $ip) {
         $array[] = $ip['ip'];
      }
      return $array;
   }
}

?>