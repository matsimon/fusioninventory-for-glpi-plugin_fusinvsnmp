<?php
/*
 * @version $Id$
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copynetwork (C) 2003-2010 by the INDEPNET Development Team.

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

// ----------------------------------------------------------------------
// Original Author of file: David DURIEUX
// Purpose of file:
// ----------------------------------------------------------------------

include_once ("includes.php");

// Init the hooks of fusinvsnmp
function plugin_init_fusinvsnmp() {
	global $PLUGIN_HOOKS,$CFG_GLPI,$LANG;

   $plugin = new Plugin;
   if (!$plugin->isActivated("fusioninventory") && $plugin->isActivated("fusinvsnmp")) {
      $plugin->getFromDBbyDir("fusinvsnmp");
      $plugin->unactivate($plugin->fields['id']);
      addMessageAfterRedirect($LANG['plugin_fusinvsnmp']["setup"][17]);
      return false;
   }
   Plugin::registerClass('PluginFusinvsnmpConstructDevice');
   Plugin::registerClass('PluginFusinvsnmpModel');
   Plugin::registerClass('PluginFusinvsnmpNetworkEquipment');
   Plugin::registerClass('PluginFusinvsnmpPrinter');
   Plugin::registerClass('PluginFusinvsnmpIPRange');
   Plugin::registerClass('PluginFusinvsnmpConfigSNMPSecurity');
   Plugin::registerClass('PluginFusinvsnmpNetworkPortLog');
   Plugin::registerClass('PluginFusinvsnmpUnknownDevice');
   Plugin::registerClass('PluginFusinvsnmpNetworkport',
                         array('classname'=>'glpi_networkports'));

	//array_push($CFG_GLPI["specif_entities_tables"],"glpi_plugin_fusinvsnmp_errors");

   $a_plugin = plugin_version_fusinvsnmp();

   $moduleId = PluginFusioninventoryModule::getModuleId($a_plugin['shortname']);
   $_SESSION["plugin_".$a_plugin['shortname']."_moduleid"] = $moduleId;

   $_SESSION['glpi_plugin_fusioninventory']['xmltags']['SNMPQUERY'] = 'PluginFusinvsnmpCommunicationSNMPQuery';
   $_SESSION['glpi_plugin_fusioninventory']['xmltags']['NETDISCOVERY'] = 'PluginFusinvsnmpCommunicationNetDiscovery';

   if (!isset($_SESSION['glpi_plugin_fusioninventory']['configuration']['moduletabforms']['fusinvsnmp']
                       [$LANG['plugin_fusinvsnmp']["title"][0]])) {
      $_SESSION['glpi_plugin_fusioninventory']['configuration']['moduletabforms']['fusinvsnmp']
               [$LANG['plugin_fusinvsnmp']["title"][0]] = array('class'=>'PluginFusinvSNMPConfig',
                                                                'submitbutton'=>'plugin_fusinvsnmp_config_set',
                                                                'submitmethod'=>'putForm');
   }
   if (!isset($_SESSION['glpi_plugin_fusioninventory']['configuration']['moduletabforms']['fusinvsnmp']
                       [$LANG['plugin_fusinvsnmp']["title"][5]])) {
      $_SESSION['glpi_plugin_fusioninventory']['configuration']['moduletabforms']['fusinvsnmp']
               [$LANG['plugin_fusinvsnmp']["title"][5]] = array('class'=>'PluginFusinvsnmpConfigLogField',
                                                                'submitbutton'=>'plugin_fusinvsnmp_configlogfield_set',
                                                                'submitmethod'=>'putForm');
   }

	//$PLUGIN_HOOKS['init_session']['fusioninventory'] = array('Profile', 'initSession');
   $PLUGIN_HOOKS['change_profile']['fusinvsnmp'] = PluginFusioninventoryProfile::changeprofile($moduleId,$a_plugin['shortname']);


	$PLUGIN_HOOKS['cron']['fusinvsnmp'] = 20*MINUTE_TIMESTAMP; // All 20 minutes

   $PLUGIN_HOOKS['add_javascript']['fusinvsnmp']="script.js";

	if (isset($_SESSION["glpiID"])) {

		if (haveRight("configuration", "r") || haveRight("profile", "w")) {// Config page
			$PLUGIN_HOOKS['config_page']['fusinvsnmp'] = '../fusioninventory/front/configuration.form.php';
      }

		// Define SQL table restriction of entity
		$CFG_GLPI["specif_entities_tables"][] = 'glpi_plugin_fusinvsnmp_discovery';
		$CFG_GLPI["specif_entities_tables"][] = 'glpi_plugin_fusinvsnmp_ipranges';
      $CFG_GLPI["specif_entities_tables"][] = 'glpi_plugin_fusinvsnmp_unknowndevices';

//		if(isset($_SESSION["glpi_plugin_fusinvsnmp_installed"]) && $_SESSION["glpi_plugin_fusinvsnmp_installed"]==1) {
      $plugin = new Plugin();
		if($plugin->isInstalled('fusinvsnmp')) {

			$PLUGIN_HOOKS['use_massive_action']['fusinvsnmp']=1;
         $PLUGIN_HOOKS['pre_item_delete']['fusinvsnmp'] = 'plugin_pre_item_delete_fusinvsnmp';
			$PLUGIN_HOOKS['pre_item_purge']['fusinvsnmp'] = 'plugin_pre_item_purge_fusinvsnmp';
			$PLUGIN_HOOKS['item_update']['fusinvsnmp'] = 'plugin_item_update_fusinvsnmp';
         $PLUGIN_HOOKS['item_add']['fusinvsnmp'] = 'plugin_item_add_fusinvsnmp';

			$report_list = array();
         $report_list["report/switch_ports.history.php"] = "Historique des ports de switchs";
         $report_list["report/ports_date_connections.php"] = "Ports de switchs non connectés depuis xx mois";
			$PLUGIN_HOOKS['reports']['fusinvsnmp'] = $report_list;

//			if (haveRight("models", "r") || haveRight("configsecurity", "r")) {
//			if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "models", "r")
//             || PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configsecurity", "r")) {
////				$PLUGIN_HOOKS['menu_entry']['fusinvsnmp'] = true;
//         }

         // Tabs for each type
         $PLUGIN_HOOKS['headings']['fusinvsnmp'] = 'plugin_get_headings_fusinvsnmp';
         $PLUGIN_HOOKS['headings_action']['fusinvsnmp'] = 'plugin_headings_actions_fusinvsnmp';

//         if (PluginFusinvsnmpAuth::haveRight("models","r")
         if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "models","r")
            OR PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configsecurity","r")
            OR PluginFusioninventoryProfile::haveRight("fusinvsnmp", "iprange","r")
            OR PluginFusioninventoryProfile::haveRight("fusinvsnmp", "agents","r")
            OR PluginFusioninventoryProfile::haveRight("fusinvsnmp", "agentsprocesses","r")
            OR PluginFusioninventoryProfile::haveRight("fusinvsnmp", "unknowndevices","r")
            OR PluginFusioninventoryProfile::haveRight("fusinvsnmp", "reports","r")
            ) {

//            $PLUGIN_HOOKS['menu_entry']['fusinvsnmp'] = true;
//            if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "models","w")) {
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['add']['models'] = 'front/model.form.php?add=1';
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['search']['models'] = 'front/model.php';
//            }
            if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configsecurity","w")) {
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['add']['snmp_auth'] = 'front/configsecurity.form.php?add=1';
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['search']['snmp_auth'] = 'front/configsecurity.php';
               $PLUGIN_HOOKS['submenu_entry']['fusioninventory']['add']['configsecurity'] = '../fusinvsnmp/front/configsecurity.form.php?add=1';
               $PLUGIN_HOOKS['submenu_entry']['fusioninventory']['search']['configsecurity'] = '../fusinvsnmp/front/configsecurity.php';
//$PLUGIN_HOOKS['submenu_entry']['fusioninventory']['options']['configsecurity']['links']['add']
//                                                      = '/plugins/fusinvsnmp/front/configsecurity.form.php';
            }
//            if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "agents","w")) {
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['add']['agents'] = 'front/agent.form.php?add=1';
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['search']['agents'] = 'front/agent.php';
//            }

            if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "iprange","w")) {
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['add']['iprange'] = 'front/iprange.form.php?add=1';
               $PLUGIN_HOOKS['submenu_entry']['fusioninventory']['add']['iprange'] = '../fusinvsnmp/front/iprange.form.php?add=1';
               $PLUGIN_HOOKS['submenu_entry']['fusioninventory']['search']['iprange'] = '../fusinvsnmp/front/iprange.php';
            }
//            $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['add']['constructdevice'] = 'front/construct_device.form.php?add=1';
//            $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['search']['constructdevice'] = 'front/construct_device.php';

//            if (PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configuration","r")) {
//               $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']['config'] = 'front/functionalities.form.php';
//            }
			}
//         $PLUGIN_HOOKS['submenu_entry']['fusinvsnmp']["<img  src='".GLPI_ROOT."/plugins/fusinvsnmp/pics/books.png' title='".$LANG['plugin_fusinvsnmp']["setup"][16]."' alt='".$LANG['plugin_fusinvsnmp']["setup"][16]."'>"] = 'front/documentation.php';
		}
	}
}

// Name and Version of the plugin
function plugin_version_fusinvsnmp() {
	return array('name'           => 'FusionInventory SNMP',
                'shortname'      => 'fusinvsnmp',
                'version'        => '2.3.0-1',
                'author'         =>'<a href="mailto:d.durieux@siprossii.com">David DURIEUX</a>
                                    & <a href="mailto:v.mazzoni@siprossii.com">Vincent MAZZONI</a>',
                'homepage'       =>'http://forge.fusioninventory.org/projects/pluginfusinvsnmp',
                'minGlpiVersion' => '0.78'// For compatibility / no install in version < 0.78
   );
}


// Optional : check prerequisites before install : may print errors or add to message after redirect
function plugin_fusinvsnmp_check_prerequisites() {
   global $LANG;
	if (GLPI_VERSION >= '0.78') {
		return true;
   } else {
		echo $LANG['plugin_fusinvsnmp']["errors"][50];
   }
}



function plugin_fusinvsnmp_check_config() {
	return true;
}



function plugin_fusinvsnmp_haveTypeRight($type,$right) {
	switch ($type) {
		case 'PluginFusinvsnmpConfigSecurity' :
//			return PluginFusinvsnmpAuth::haveRight("configsecurity",$right);
			return PluginFusioninventoryProfile::haveRight("fusinvsnmp", "configsecurity",$right);
			break;
	}
	return true;
}

?>