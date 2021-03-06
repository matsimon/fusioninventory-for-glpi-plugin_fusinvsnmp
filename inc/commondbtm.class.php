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
   Purpose of file: modelisation of multi-tables objects (switch, printer...)
   ----------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

/**
 * Class to manage generic multi-tables objects
 * Adds field management to core CommonDBTM class.
 **/
class PluginFusinvsnmpCommonDBTM extends CommonDBTM {
   private $ptcdFields=array();
   private $ptcdLockFields=array();
   protected $ptcdUpdates=array();
   protected $ptcdLinkedObjects=array();

	/**
	 * Constructor
	**/
   function __construct($p_table) {
      $this->table=$p_table;
   }

   /**
    * Load an existing item
    *
    *@return nothing
    **/
   function load($p_id='') {
      global $DB;

      if ($p_id!='') { // existing item : load old values
         $this->getFromDB($p_id);
         $this->ptcdFields=$this->fields;
         $itemtype=getItemTypeForTable($this->table);
         if ($itemtype) {
            $this->ptcdLockFields=PluginFusioninventoryLock::getLockFields($itemtype, $p_id);
         }
      } else { // new item : initialize all fields to NULL
         $query = "SHOW COLUMNS FROM `".$this->table."`";
         if ($result=$DB->query($query)) {
            while ($data=$DB->fetch_array($result)) {
               $this->ptcdFields[$data[0]]=NULL;
            }
         }
      }
   }

   /**
    * Add a new item with the instance values
    *
    *@param $p_force=FALSE Force add even if no updates where done
    *@return nothing
    **/
   function addCommon($p_force=FALSE) {
      if (count($this->ptcdUpdates) OR $p_force) {
         $itemID=parent::add($this->ptcdUpdates);
         $this->load($itemID);
      }
   }

   /**
    * Update an existing preloaded item with the instance values or add a new one
    *
    *@return nothing
    **/
   function updateDB() {
      if (count($this->ptcdUpdates)) {
         $this->ptcdUpdates['id'] = $this->getValue('id');
         if ($this->ptcdUpdates['id'] != '') {
            $this->update($this->ptcdUpdates);
         } else {
            unset($this->ptcdUpdates['id']);
            $this->add($this->ptcdUpdates);
         }
      }
   }

   /**
    * Delete a loaded item
    *
    *@param $p_id Item id
    *@return nothing
    **/
   function deleteDB() {
      $this->deleteFromDB($this->ptcdFields['id'], 1);
   }

   /**
    * Get all objetc vars and values
    *
    *@return Array of all class vars => values
    **/
   function getVars() {
      return get_object_vars($this);
   }

   /**
    * Get field value
    *
    *@param $p_field field
    *@param $p_object=NULL Object to update
    *@return field value / NULL if unknown field
    **/
   function getValue($p_field, $p_object=NULL) {
      if (is_null($p_object)) {
         $p_object=$this;
      }
      if (array_key_exists($p_field, $p_object->ptcdFields)) {
         return $p_object->ptcdFields[$p_field];
      } else {
         foreach ($p_object->ptcdLinkedObjects as $object) {
            $value = $object->getValue($p_field, $object);
            if (!is_null($value)) {
               return $value;
            }
         }
         return NULL;
      }
   }

   /**
    * Set field value
    *
    *@param $p_field field
    *@param $p_value Value
    *@param $p_object=NULL Object to update
    *@return true if value set / false if unknown field
    **/
   function setValue($p_field, $p_value, $p_object=NULL, $p_default='') {
      // TODO : replace $p_default by check default value in DB ?
      if (is_null($p_object)) {
         $p_object=$this;
      }
      if (array_key_exists($p_field, $p_object->ptcdFields)) {
         if (!in_array($p_field, $this->ptcdLockFields)) { // don't update if field is locked
            if ($p_object->ptcdFields[$p_field]!=$p_value) { // don't update if values are the same
               if (!($p_object->getValue($p_field)==$p_default AND $p_value=="")) { // don't update if both values are empty
                  $p_object->ptcdFields[$p_field] = $p_value;
                  $p_object->ptcdUpdates[$p_field] = $p_value;
               }
            }
         }
         return true;
      } else {
         foreach ($this->ptcdLinkedObjects as $object) {
            if ($object->setValue($p_field, $p_value)) {
               return true;
            }
         }
         return false;
      }
   }
}

?>