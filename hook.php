<?php

/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2010 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

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
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: DURIEUX David
// Purpose of file:
// ----------------------------------------------------------------------

function plugin_fusinvsnmp_getSearchOption() {
	global $LANG;
	$sopt = array ();

	$config = new PluginFusinvsnmpConfig;

	// Part header
	$sopt['PluginFusinvsnmpSNMPModel']['common'] = $LANG['plugin_fusinvsnmp']["profile"][19];

	$sopt['PluginFusinvsnmpSNMPModel'][1]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][1]['field'] = 'name';
	$sopt['PluginFusinvsnmpSNMPModel'][1]['linkfield'] = 'name';
	$sopt['PluginFusinvsnmpSNMPModel'][1]['name'] = $LANG["common"][16];
  $sopt['PluginFusinvsnmpSNMPModel'][1]['datatype']='itemlink';
  
	$sopt['PluginFusinvsnmpSNMPModel'][30]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][30]['field'] = 'id';
	$sopt['PluginFusinvsnmpSNMPModel'][30]['linkfield'] = '';
	$sopt['PluginFusinvsnmpSNMPModel'][30]['name'] = $LANG["common"][2];

	$sopt['PluginFusinvsnmpSNMPModel'][3]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][3]['field'] = 'itemtype';
	$sopt['PluginFusinvsnmpSNMPModel'][3]['linkfield'] = 'itemtype';
	$sopt['PluginFusinvsnmpSNMPModel'][3]['name'] = $LANG["common"][17];

	$sopt['PluginFusinvsnmpSNMPModel'][5]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][5]['field'] = 'id';
	$sopt['PluginFusinvsnmpSNMPModel'][5]['linkfield'] = '';
	$sopt['PluginFusinvsnmpSNMPModel'][5]['name'] = $LANG["buttons"][31];

	$sopt['PluginFusinvsnmpSNMPModel'][6]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][6]['field'] = 'activation';
	$sopt['PluginFusinvsnmpSNMPModel'][6]['linkfield'] = 'activation';
	$sopt['PluginFusinvsnmpSNMPModel'][6]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][11];
	$sopt['PluginFusinvsnmpSNMPModel'][6]['datatype']='bool';

	$sopt['PluginFusinvsnmpSNMPModel'][7]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][7]['field'] = 'discovery_key';
	$sopt['PluginFusinvsnmpSNMPModel'][7]['linkfield'] = 'discovery_key';
	$sopt['PluginFusinvsnmpSNMPModel'][7]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][12];

	$sopt['PluginFusinvsnmpSNMPModel'][8]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpSNMPModel'][8]['field'] = 'comment';
	$sopt['PluginFusinvsnmpSNMPModel'][8]['linkfield'] = 'comment';
	$sopt['PluginFusinvsnmpSNMPModel'][8]['name'] = $LANG['common'][25];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity']['common'] = $LANG['plugin_fusinvsnmp']["profile"][22];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][1]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][1]['field'] = 'name';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][1]['linkfield'] = 'name';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][1]['name'] = $LANG["common"][16];
  $sopt['PluginFusinvsnmpConfigSNMPSecurity'][1]['datatype']='itemlink';
  
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][30]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][30]['field'] = 'id';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][30]['linkfield'] = 'id';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][30]['name'] = $LANG["common"][2];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][3]['table'] = 'glpi_plugin_fusinvsnmp_snmpversions';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][3]['field'] = 'name';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][3]['linkfield'] = 'plugin_fusinvsnmp_snmpversions_id';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][3]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][2];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][4]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][4]['field'] = 'community';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][4]['linkfield'] = 'community';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][4]['name'] = $LANG['plugin_fusinvsnmp']["snmpauth"][1];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][5]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][5]['field'] = 'username';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][5]['linkfield'] = 'username';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][5]['name'] = $LANG['plugin_fusinvsnmp']["snmpauth"][2];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][7]['table'] = 'glpi_plugin_fusinvsnmp_snmpprotocolauths';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][7]['field'] = 'name';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][7]['linkfield'] = 'authentication';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][7]['name'] = $LANG['plugin_fusinvsnmp']["snmpauth"][4];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][8]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][8]['field'] = 'auth_passphrase';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][8]['linkfield'] = 'auth_passphrase';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][8]['name'] = $LANG['plugin_fusinvsnmp']["snmpauth"][5];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][9]['table'] = 'glpi_plugin_fusinvsnmp_snmpprotocolprivs';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][9]['field'] = 'name';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][9]['linkfield'] = 'encryption';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][9]['name'] = $LANG['plugin_fusinvsnmp']["snmpauth"][6];

	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][10]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][10]['field'] = 'priv_passphrase';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][10]['linkfield'] = 'priv_passphrase';
	$sopt['PluginFusinvsnmpConfigSNMPSecurity'][10]['name'] = $LANG['plugin_fusinvsnmp']["snmpauth"][7];

	$sopt['PluginFusinvsnmpUnknownDevice']['common'] = $LANG['plugin_fusinvsnmp']["menu"][4];

	$sopt['PluginFusinvsnmpUnknownDevice'][1]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][1]['field'] = 'name';
	$sopt['PluginFusinvsnmpUnknownDevice'][1]['linkfield'] = 'name';
	$sopt['PluginFusinvsnmpUnknownDevice'][1]['name'] = $LANG["common"][16];
   $sopt['PluginFusinvsnmpUnknownDevice'][1]['datatype']='itemlink';
   $sopt['PluginFusinvsnmpUnknownDevice'][1]['forcegroupby']='1';

	$sopt['PluginFusinvsnmpUnknownDevice'][2]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][2]['field'] = 'dnsname';
	$sopt['PluginFusinvsnmpUnknownDevice'][2]['linkfield'] = 'dnsname';
	$sopt['PluginFusinvsnmpUnknownDevice'][2]['name'] = $LANG['plugin_fusinvsnmp']["unknown"][0];

	$sopt['PluginFusinvsnmpUnknownDevice'][3]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][3]['field'] = 'date_mod';
	$sopt['PluginFusinvsnmpUnknownDevice'][3]['linkfield'] = '';
	$sopt['PluginFusinvsnmpUnknownDevice'][3]['name'] = $LANG["common"][26];
   $sopt['PluginFusinvsnmpUnknownDevice'][3]['datatype'] = 'datetime';

	$sopt['PluginFusinvsnmpUnknownDevice'][4]['table'] = 'glpi_entities';
	$sopt['PluginFusinvsnmpUnknownDevice'][4]['field'] = 'name';
	$sopt['PluginFusinvsnmpUnknownDevice'][4]['linkfield'] = 'entities_id';
	$sopt['PluginFusinvsnmpUnknownDevice'][4]['name'] = $LANG["entity"][0];

	$sopt['PluginFusinvsnmpUnknownDevice'][5]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][5]['field'] = 'serial';
	$sopt['PluginFusinvsnmpUnknownDevice'][5]['linkfield'] = 'serial';
	$sopt['PluginFusinvsnmpUnknownDevice'][5]['name'] = $LANG['common'][19];

	$sopt['PluginFusinvsnmpUnknownDevice'][6]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][6]['field'] = 'otherserial';
	$sopt['PluginFusinvsnmpUnknownDevice'][6]['linkfield'] = 'otherserial';
	$sopt['PluginFusinvsnmpUnknownDevice'][6]['name'] = $LANG['common'][20];

	$sopt['PluginFusinvsnmpUnknownDevice'][7]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][7]['field'] = 'contact';
	$sopt['PluginFusinvsnmpUnknownDevice'][7]['linkfield'] = 'contact';
	$sopt['PluginFusinvsnmpUnknownDevice'][7]['name'] = $LANG['common'][18];
 
	$sopt['PluginFusinvsnmpUnknownDevice'][8]['table'] = 'glpi_domains';
	$sopt['PluginFusinvsnmpUnknownDevice'][8]['field'] = 'name';
	$sopt['PluginFusinvsnmpUnknownDevice'][8]['linkfield'] = 'domain';
	$sopt['PluginFusinvsnmpUnknownDevice'][8]['name'] = $LANG["setup"][89];

	$sopt['PluginFusinvsnmpUnknownDevice'][9]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][9]['field'] = 'comment';
	$sopt['PluginFusinvsnmpUnknownDevice'][9]['linkfield'] = 'comment';
	$sopt['PluginFusinvsnmpUnknownDevice'][9]['name'] = $LANG['common'][25];

	$sopt['PluginFusinvsnmpUnknownDevice'][10]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][10]['field'] = 'type';
	$sopt['PluginFusinvsnmpUnknownDevice'][10]['linkfield'] = 'type';
	$sopt['PluginFusinvsnmpUnknownDevice'][10]['name'] = $LANG['common'][17];

	$sopt['PluginFusinvsnmpUnknownDevice'][11]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][11]['field'] = 'snmp';
	$sopt['PluginFusinvsnmpUnknownDevice'][11]['linkfield'] = 'snmp';
	$sopt['PluginFusinvsnmpUnknownDevice'][11]['name'] = $LANG['plugin_fusinvsnmp']["functionalities"][3];
   $sopt['PluginFusinvsnmpUnknownDevice'][11]['datatype']='bool';
   
	$sopt['PluginFusinvsnmpUnknownDevice'][12]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpUnknownDevice'][12]['field'] = 'name';
	$sopt['PluginFusinvsnmpUnknownDevice'][12]['linkfield'] = 'plugin_fusinvsnmp_snmpmodels_id';
	$sopt['PluginFusinvsnmpUnknownDevice'][12]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][4];

   $sopt['PluginFusinvsnmpUnknownDevice'][13]['table'] = 'glpi_plugin_fusinvsnmp_configsnmpsecurities';
   $sopt['PluginFusinvsnmpUnknownDevice'][13]['field'] = 'name';
   $sopt['PluginFusinvsnmpUnknownDevice'][13]['linkfield'] = 'plugin_fusinvsnmp_snmpauths_id';
   $sopt['PluginFusinvsnmpUnknownDevice'][13]['name'] = $LANG['plugin_fusinvsnmp']["model_info"][3];

   $sopt['PluginFusinvsnmpUnknownDevice'][14]['table'] = 'glpi_networkports';
   $sopt['PluginFusinvsnmpUnknownDevice'][14]['field'] = 'ip';
   $sopt['PluginFusinvsnmpUnknownDevice'][14]['linkfield'] = 'id';
   $sopt['PluginFusinvsnmpUnknownDevice'][14]['name'] = $LANG["networking"][14];
   $sopt['PluginFusinvsnmpUnknownDevice'][14]['forcegroupby']='1';

   $sopt['PluginFusinvsnmpUnknownDevice'][15]['table'] = 'glpi_networkports';
   $sopt['PluginFusinvsnmpUnknownDevice'][15]['field'] = 'mac';
   $sopt['PluginFusinvsnmpUnknownDevice'][15]['linkfield'] = 'id';
   $sopt['PluginFusinvsnmpUnknownDevice'][15]['name'] = $LANG["networking"][15];
   $sopt['PluginFusinvsnmpUnknownDevice'][15]['forcegroupby']='1';

   $sopt['PluginFusinvsnmpUnknownDevice'][16]['table'] = 'glpi_networkequipments';
   $sopt['PluginFusinvsnmpUnknownDevice'][16]['field'] = 'device';
   $sopt['PluginFusinvsnmpUnknownDevice'][16]['linkfield'] = 'device';
   $sopt['PluginFusinvsnmpUnknownDevice'][16]['name'] = $LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG["reports"][52];
   //$sopt['PluginFusinvsnmpUnknownDevice'][16]['forcegroupby'] = '1';

   $sopt['PluginFusinvsnmpUnknownDevice'][17]['table'] = 'glpi_plugin_fusinvsnmp_networkports';
   $sopt['PluginFusinvsnmpUnknownDevice'][17]['field'] = 'id';
   $sopt['PluginFusinvsnmpUnknownDevice'][17]['linkfield'] = 'id';
   $sopt['PluginFusinvsnmpUnknownDevice'][17]['name'] = $LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG["reports"][46];
   $sopt['PluginFusinvsnmpUnknownDevice'][17]['forcegroupby'] = '1';

	$sopt['PluginFusinvsnmpUnknownDevice'][18]['table'] = 'glpi_networkports';
	$sopt['PluginFusinvsnmpUnknownDevice'][18]['field'] = 'name';
	$sopt['PluginFusinvsnmpUnknownDevice'][18]['linkfield'] = 'id';
	$sopt['PluginFusinvsnmpUnknownDevice'][18]['name'] = $LANG['plugin_fusinvsnmp']["unknown"][1];
   $sopt['PluginFusinvsnmpUnknownDevice'][18]['forcegroupby']='1';

	$sopt['PluginFusinvsnmpUnknownDevice'][19]['table'] = 'glpi_plugin_fusinvsnmp_unknowndevices';
	$sopt['PluginFusinvsnmpUnknownDevice'][19]['field'] = 'accepted';
	$sopt['PluginFusinvsnmpUnknownDevice'][19]['linkfield'] = 'accepted';
	$sopt['PluginFusinvsnmpUnknownDevice'][19]['name'] = $LANG['plugin_fusinvsnmp']["unknown"][2];
   $sopt['PluginFusinvsnmpUnknownDevice'][19]['datatype']='bool';

	$sopt['PluginFusinvsnmpNetworkPort']['common'] = $LANG['plugin_fusinvsnmp']["errors"][0];

	$sopt['PluginFusinvsnmpNetworkPort'][1]['name'] = $LANG["common"][16];

	$sopt['PluginFusinvsnmpNetworkPort'][2]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][42];

	$sopt['PluginFusinvsnmpNetworkPort'][3]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][43];

	$sopt['PluginFusinvsnmpNetworkPort'][4]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][44];

	$sopt['PluginFusinvsnmpNetworkPort'][5]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][45];

	$sopt['PluginFusinvsnmpNetworkPort'][6]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][46];

	$sopt['PluginFusinvsnmpNetworkPort'][7]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][47];

	$sopt['PluginFusinvsnmpNetworkPort'][8]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][48];

	$sopt['PluginFusinvsnmpNetworkPort'][9]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][49];

	$sopt['PluginFusinvsnmpNetworkPort'][10]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][51];

	$sopt['PluginFusinvsnmpNetworkPort'][11]['name'] = $LANG['plugin_fusinvsnmp']["mapping"][115];

	$sopt['PluginFusinvsnmpNetworkPort'][12]['name'] = $LANG["networking"][17];

	$sopt['PluginFusinvsnmpNetworkPort'][13]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][50];

	$sopt['PluginFusinvsnmpNetworkPort'][14]['name'] = $LANG["networking"][56];

   $sopt['PluginFusinvsnmpNetworkPort'][15]['name'] = $LANG['plugin_fusinvsnmp']["snmp"][41];

	$sopt['PluginFusinvsnmpIPRange']['common'] = $LANG['plugin_fusinvsnmp']["profile"][25];

	$sopt['PluginFusinvsnmpIPRange'][1]['table'] = 'glpi_plugin_fusinvsnmp_ipranges';
	$sopt['PluginFusinvsnmpIPRange'][1]['field'] = 'name';
	$sopt['PluginFusinvsnmpIPRange'][1]['linkfield'] = 'name';
	$sopt['PluginFusinvsnmpIPRange'][1]['name'] = $LANG["common"][16];
   $sopt['PluginFusinvsnmpIPRange'][1]['datatype']='itemlink';
  
	$sopt['PluginFusinvsnmpIPRange'][2]['table'] = 'glpi_plugin_fusinvsnmp_ipranges';
	$sopt['PluginFusinvsnmpIPRange'][2]['field'] = 'ifaddr_start';
	$sopt['PluginFusinvsnmpIPRange'][2]['linkfield'] = 'ifaddr_start';
	$sopt['PluginFusinvsnmpIPRange'][2]['name'] = $LANG['plugin_fusinvsnmp']["iprange"][0];

	$sopt['PluginFusinvsnmpIPRange'][3]['table'] = 'glpi_plugin_fusinvsnmp_ipranges';
	$sopt['PluginFusinvsnmpIPRange'][3]['field'] = 'ifaddr_end';
	$sopt['PluginFusinvsnmpIPRange'][3]['linkfield'] = 'ifaddr_end';
	$sopt['PluginFusinvsnmpIPRange'][3]['name'] = $LANG['plugin_fusinvsnmp']["iprange"][1];

	$sopt['PluginFusinvsnmpIPRange'][30]['table'] = 'glpi_plugin_fusinvsnmp_ipranges';
	$sopt['PluginFusinvsnmpIPRange'][30]['field'] = 'id';
	$sopt['PluginFusinvsnmpIPRange'][30]['linkfield'] = '';
	$sopt['PluginFusinvsnmpIPRange'][30]['name'] = $LANG["common"][2];

	$sopt['PluginFusinvsnmpIPRange'][5]['table'] = 'glpi_plugin_fusinvsnmp_agents';
	$sopt['PluginFusinvsnmpIPRange'][5]['field'] = 'name';
	$sopt['PluginFusinvsnmpIPRange'][5]['linkfield'] = 'plugin_fusinvsnmp_agents_id_discover';
	$sopt['PluginFusinvsnmpIPRange'][5]['name'] = $LANG['plugin_fusinvsnmp']["agents"][12];
	$sopt['PluginFusinvsnmpIPRange'][5]['datatype']='itemlink';
	$sopt['PluginFusinvsnmpIPRange'][5]['itemlink_type']='PluginFusinvsnmpAgent';
   $sopt['PluginFusinvsnmpIPRange'][5]['forcegroupby']='1';
  
	$sopt['PluginFusinvsnmpIPRange'][6]['table'] = 'glpi_plugin_fusinvsnmp_ipranges';
	$sopt['PluginFusinvsnmpIPRange'][6]['field'] = 'discover';
	$sopt['PluginFusinvsnmpIPRange'][6]['linkfield'] = 'discover';
	$sopt['PluginFusinvsnmpIPRange'][6]['name'] = $LANG['plugin_fusinvsnmp']["discovery"][3];
   $sopt['PluginFusinvsnmpIPRange'][6]['datatype']='bool';
  
	$sopt['PluginFusinvsnmpIPRange'][7]['table'] = 'glpi_plugin_fusinvsnmp_ipranges';
	$sopt['PluginFusinvsnmpIPRange'][7]['field'] = 'query';
	$sopt['PluginFusinvsnmpIPRange'][7]['linkfield'] = 'query';
	$sopt['PluginFusinvsnmpIPRange'][7]['name'] = $LANG['plugin_fusinvsnmp']["iprange"][3];
   $sopt['PluginFusinvsnmpIPRange'][7]['datatype']='bool';
  
	$sopt['PluginFusinvsnmpIPRange'][8]['table'] = 'glpi_entities';
	$sopt['PluginFusinvsnmpIPRange'][8]['field'] = 'name';
	$sopt['PluginFusinvsnmpIPRange'][8]['linkfield'] = 'entities_id';
	$sopt['PluginFusinvsnmpIPRange'][8]['name'] = $LANG["entity"][0];

	$sopt['PluginFusinvsnmpIPRange'][9]['table'] = 'glpi_plugin_fusinvsnmp_agents';
	$sopt['PluginFusinvsnmpIPRange'][9]['field'] = 'name';
	$sopt['PluginFusinvsnmpIPRange'][9]['linkfield'] = 'plugin_fusinvsnmp_agents_id_query';
	$sopt['PluginFusinvsnmpIPRange'][9]['name'] = $LANG['plugin_fusinvsnmp']["agents"][13];
	$sopt['PluginFusinvsnmpIPRange'][9]['datatype']='itemlink';
	$sopt['PluginFusinvsnmpIPRange'][9]['itemlink_type']='PluginFusinvsnmpAgent';
   $sopt['PluginFusinvsnmpIPRange'][9]['forcegroupby']='1';

	$sopt['PluginFusinvsnmpNetworkPortLog']['common'] = $LANG['plugin_fusinvsnmp']["title"][2];

	$sopt['PluginFusinvsnmpNetworkPortLog'][1]['table'] = 'glpi_plugin_fusinvsnmp_networkportlogs';
	$sopt['PluginFusinvsnmpNetworkPortLog'][1]['field'] = 'id';
	$sopt['PluginFusinvsnmpNetworkPortLog'][1]['linkfield'] = '';
	$sopt['PluginFusinvsnmpNetworkPortLog'][1]['name'] = $LANG["common"][2];

	$sopt['PluginFusinvsnmpNetworkPortLog'][2]['table'] = 'glpi_networkports';
	$sopt['PluginFusinvsnmpNetworkPortLog'][2]['field'] = 'id';
	$sopt['PluginFusinvsnmpNetworkPortLog'][2]['linkfield'] = 'networkports_id';
	$sopt['PluginFusinvsnmpNetworkPortLog'][2]['name'] = $LANG["setup"][175];

	$sopt['PluginFusinvsnmpNetworkPortLog'][3]['table'] = 'glpi_plugin_fusinvsnmp_networkportlogs';
	$sopt['PluginFusinvsnmpNetworkPortLog'][3]['field'] = 'field';
	$sopt['PluginFusinvsnmpNetworkPortLog'][3]['linkfield'] = 'field';
	$sopt['PluginFusinvsnmpNetworkPortLog'][3]['name'] = $LANG["event"][18];

	$sopt['PluginFusinvsnmpNetworkPortLog'][4]['table'] = 'glpi_plugin_fusinvsnmp_networkportlogs';
	$sopt['PluginFusinvsnmpNetworkPortLog'][4]['field'] = 'old_value';
	$sopt['PluginFusinvsnmpNetworkPortLog'][4]['linkfield'] = 'old_value';
	$sopt['PluginFusinvsnmpNetworkPortLog'][4]['name'] = $LANG['plugin_fusinvsnmp']["history"][0];

	$sopt['PluginFusinvsnmpNetworkPortLog'][5]['table'] = 'glpi_plugin_fusinvsnmp_networkportlogs';
	$sopt['PluginFusinvsnmpNetworkPortLog'][5]['field'] = 'new_value';
	$sopt['PluginFusinvsnmpNetworkPortLog'][5]['linkfield'] = 'new_value';
	$sopt['PluginFusinvsnmpNetworkPortLog'][5]['name'] = $LANG['plugin_fusinvsnmp']["history"][1];

	$sopt['PluginFusinvsnmpNetworkPortLog'][6]['table'] = 'glpi_plugin_fusinvsnmp_networkportlogs';
	$sopt['PluginFusinvsnmpNetworkPortLog'][6]['field'] = 'date_mod';
	$sopt['PluginFusinvsnmpNetworkPortLog'][6]['linkfield'] = 'date_mod';
	$sopt['PluginFusinvsnmpNetworkPortLog'][6]['name'] = $LANG["common"][27];
	$sopt['PluginFusinvsnmpNetworkPortLog'][6]['datatype']='datetime';


	$sopt['PluginFusinvsnmpNetworkport2']['common'] = $LANG['plugin_fusinvsnmp']["profile"][28];

	$sopt['PluginFusinvsnmpNetworkport2'][30]['table'] = 'glpi_plugin_fusinvsnmp_networkports';
	$sopt['PluginFusinvsnmpNetworkport2'][30]['field'] = 'id';
	$sopt['PluginFusinvsnmpNetworkport2'][30]['linkfield'] = '';
	$sopt['PluginFusinvsnmpNetworkport2'][30]['name'] = $LANG["reports"][52];

	$sopt['PluginFusinvsnmpNetworkport2'][1]['table'] = 'glpi_plugin_fusinvsnmp_networkports';
	$sopt['PluginFusinvsnmpNetworkport2'][1]['field'] = 'networkports_id';
	$sopt['PluginFusinvsnmpNetworkport2'][1]['linkfield'] = 'networkports_id';
	$sopt['PluginFusinvsnmpNetworkport2'][1]['name'] = $LANG["setup"][175];

	$sopt['PluginFusinvsnmpNetworkport2'][2]['table'] = 'glpi_locations';
	$sopt['PluginFusinvsnmpNetworkport2'][2]['field'] = 'id';
	$sopt['PluginFusinvsnmpNetworkport2'][2]['linkfield'] = 'networkports_id';
	$sopt['PluginFusinvsnmpNetworkport2'][2]['name'] = $LANG["common"][15];

	$sopt['PluginFusinvsnmpNetworkport2'][3]['table'] = 'glpi_plugin_fusinvsnmp_networkports';
	$sopt['PluginFusinvsnmpNetworkport2'][3]['field'] = 'lastup';
	$sopt['PluginFusinvsnmpNetworkport2'][3]['linkfield'] = 'lastup';
	$sopt['PluginFusinvsnmpNetworkport2'][3]['name'] = $LANG["login"][0];


	$sopt[NETWORKING_TYPE][5190]['table']='glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt[NETWORKING_TYPE][5190]['field']='id';
	$sopt[NETWORKING_TYPE][5190]['linkfield']='id';
	$sopt[NETWORKING_TYPE][5190]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["profile"][19];

	if ($config->getValue("storagesnmpauth") == "file") {
		$sopt[NETWORKING_TYPE][5191]['table'] = 'glpi_plugin_fusinvsnmp_networkequipments';
		$sopt[NETWORKING_TYPE][5191]['field'] = 'plugin_fusinvsnmp_snmpauths_id';
		$sopt[NETWORKING_TYPE][5191]['linkfield'] = 'id';
		$sopt[NETWORKING_TYPE][5191]['name'] = $LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["profile"][20];
	} else {
		$sopt[NETWORKING_TYPE][5191]['table']='glpi_plugin_fusinvsnmp_configsnmpsecurities';
		$sopt[NETWORKING_TYPE][5191]['field']='name';
		$sopt[NETWORKING_TYPE][5191]['linkfield']='id';
		$sopt[NETWORKING_TYPE][5191]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["profile"][20];
	}

	$sopt[NETWORKING_TYPE][5194]['table']='glpi_plugin_fusinvsnmp_networkequipments';
	$sopt[NETWORKING_TYPE][5194]['field']='networkequipments_id';
	$sopt[NETWORKING_TYPE][5194]['linkfield']='id';
	$sopt[NETWORKING_TYPE][5194]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["snmp"][53];

	$sopt[NETWORKING_TYPE][5195]['table']='glpi_plugin_fusinvsnmp_networkequipments';
	$sopt[NETWORKING_TYPE][5195]['field']='cpu';
	$sopt[NETWORKING_TYPE][5195]['linkfield']='id';
	$sopt[NETWORKING_TYPE][5195]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["snmp"][13];


	$sopt[PRINTER_TYPE][5190]['table']='glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt[PRINTER_TYPE][5190]['field']='id';
	$sopt[PRINTER_TYPE][5190]['linkfield']='id';
	$sopt[PRINTER_TYPE][5190]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["profile"][19];

	if ($config->getValue("storagesnmpauth") == "file") {
		$sopt[PRINTER_TYPE][5191]['table'] = 'glpi_plugin_fusinvsnmp_printers';
		$sopt[PRINTER_TYPE][5191]['field'] = 'plugin_fusinvsnmp_snmpauths_id';
		$sopt[PRINTER_TYPE][5191]['linkfield'] = 'id';
		$sopt[PRINTER_TYPE][5191]['name'] = $LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["profile"][20];
	} else {
		$sopt[PRINTER_TYPE][5191]['table']='glpi_plugin_fusinvsnmp_configsnmpsecurities';
		$sopt[PRINTER_TYPE][5191]['field']='id';
		$sopt[PRINTER_TYPE][5191]['linkfield']='id';
		$sopt[PRINTER_TYPE][5191]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["profile"][20];
	}

	$sopt[PRINTER_TYPE][5194]['table']='glpi_plugin_fusinvsnmp_printers';
	$sopt[PRINTER_TYPE][5194]['field']='printers_id';
	$sopt[PRINTER_TYPE][5194]['linkfield']='id';
	$sopt[PRINTER_TYPE][5194]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG['plugin_fusinvsnmp']["snmp"][53];

	$sopt[PRINTER_TYPE][5196]['table']='glpi_plugin_fusinvsnmp_networkequipments';
	$sopt[PRINTER_TYPE][5196]['field']='id';
	$sopt[PRINTER_TYPE][5196]['linkfield']='id';
	$sopt[PRINTER_TYPE][5196]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG["reports"][52];
	$sopt[PRINTER_TYPE][5196]['forcegroupby']='1';

	$sopt[PRINTER_TYPE][5197]['table']='glpi_plugin_fusinvsnmp_networkports';
	$sopt[PRINTER_TYPE][5197]['field']='id';
	$sopt[PRINTER_TYPE][5197]['linkfield']='id';
	$sopt[PRINTER_TYPE][5197]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG["reports"][46];
	$sopt[PRINTER_TYPE][5197]['forcegroupby']='1';

	$sopt[COMPUTER_TYPE][5192]['table']='glpi_plugin_fusinvsnmp_networkequipments';
	$sopt[COMPUTER_TYPE][5192]['field']='id';
	$sopt[COMPUTER_TYPE][5192]['linkfield']='id';
	$sopt[COMPUTER_TYPE][5192]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG["reports"][52];
	$sopt[COMPUTER_TYPE][5192]['forcegroupby']='1';

	$sopt[COMPUTER_TYPE][5193]['table']='glpi_plugin_fusinvsnmp_networkports';
	$sopt[COMPUTER_TYPE][5193]['field']='id';
	$sopt[COMPUTER_TYPE][5193]['linkfield']='id';
	$sopt[COMPUTER_TYPE][5193]['name']=$LANG['plugin_fusinvsnmp']["title"][0]." - ".$LANG["reports"][46];
	$sopt[COMPUTER_TYPE][5193]['forcegroupby']='1';



	$sopt['PluginFusinvsnmpConstructDevices']['common'] = $LANG['plugin_fusinvsnmp']["constructdevice"][0];

	$sopt['PluginFusinvsnmpConstructDevices'][1]['table'] = 'glpi_plugin_fusinvsnmp_constructdevices';
	$sopt['PluginFusinvsnmpConstructDevices'][1]['field'] = 'id';
	$sopt['PluginFusinvsnmpConstructDevices'][1]['linkfield'] = 'id';
	$sopt['PluginFusinvsnmpConstructDevices'][1]['name'] = $LANG["common"][16];
   $sopt['PluginFusinvsnmpConstructDevices'][1]['datatype']='itemlink';

  	$sopt['PluginFusinvsnmpConstructDevices'][2]['table'] = 'glpi_manufacturers';
	$sopt['PluginFusinvsnmpConstructDevices'][2]['field'] = 'name';
	$sopt['PluginFusinvsnmpConstructDevices'][2]['linkfield'] = 'manufacturer';
	$sopt['PluginFusinvsnmpConstructDevices'][2]['name'] = $LANG['common'][5];

	$sopt['PluginFusinvsnmpConstructDevices'][3]['table'] = 'glpi_plugin_fusinvsnmp_constructdevices';
	$sopt['PluginFusinvsnmpConstructDevices'][3]['field'] = 'device';
	$sopt['PluginFusinvsnmpConstructDevices'][3]['linkfield'] = 'device';
	$sopt['PluginFusinvsnmpConstructDevices'][3]['name'] = $LANG['common'][1];
   $sopt['PluginFusinvsnmpConstructDevices'][3]['datatype']='text';

	$sopt['PluginFusinvsnmpConstructDevices'][4]['table'] = 'glpi_plugin_fusinvsnmp_constructdevices';
	$sopt['PluginFusinvsnmpConstructDevices'][4]['field'] = 'firmware';
	$sopt['PluginFusinvsnmpConstructDevices'][4]['linkfield'] = 'firmware';
	$sopt['PluginFusinvsnmpConstructDevices'][4]['name'] = $LANG['setup'][71];
   $sopt['PluginFusinvsnmpConstructDevices'][4]['datatype']='text';

	$sopt['PluginFusinvsnmpConstructDevices'][5]['table'] = 'glpi_plugin_fusinvsnmp_constructdevices';
	$sopt['PluginFusinvsnmpConstructDevices'][5]['field'] = 'sysdescr';
	$sopt['PluginFusinvsnmpConstructDevices'][5]['linkfield'] = 'sysdescr';
	$sopt['PluginFusinvsnmpConstructDevices'][5]['name'] = $LANG['common'][25];
   $sopt['PluginFusinvsnmpConstructDevices'][5]['datatype']='text';

	$sopt['PluginFusinvsnmpConstructDevices'][6]['table'] = 'glpi_plugin_fusinvsnmp_constructdevices';
	$sopt['PluginFusinvsnmpConstructDevices'][6]['field'] = 'type';
	$sopt['PluginFusinvsnmpConstructDevices'][6]['linkfield'] = 'type';
	$sopt['PluginFusinvsnmpConstructDevices'][6]['name'] = $LANG['common'][17];
   $sopt['PluginFusinvsnmpConstructDevices'][6]['datatype']='number';

	$sopt['PluginFusinvsnmpConstructDevices'][7]['table'] = 'glpi_plugin_fusinvsnmp_snmpmodels';
	$sopt['PluginFusinvsnmpConstructDevices'][7]['field'] = 'name';
	$sopt['PluginFusinvsnmpConstructDevices'][7]['linkfield'] = 'snmpmodel_id';
	$sopt['PluginFusinvsnmpConstructDevices'][7]['name'] = $LANG['plugin_fusinvsnmp']["profile"][24];
   $sopt['PluginFusinvsnmpConstructDevices'][7]['datatype']='itemptype';

   

	return $sopt;
}


function plugin_fusinvsnmp_giveItem($type,$id,$data,$num) {
	global $CFG_GLPI, $DB, $INFOFORM_PAGES, $LINK_ID_TABLE,$LANG,$SEARCH_OPTION,$FUSIONINVENTORY_MAPPING;

	$table=$SEARCH_OPTION[$type][$id]["table"];
	$field=$SEARCH_OPTION[$type][$id]["field"];

//	echo "GiveItem : ".$field."<br/>";
	switch ($type) {
		// * Computer List (front/computer.php)
		case COMPUTER_TYPE :
			switch ($table.'.'.$field) {

				// ** FusionInventory - switch
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
					$out = '';
					$NetworkPort = new NetworkPort;
               $list = explode("$$$$",$data["ITEM_$num"]);
               foreach ($list as $numtmp=>$vartmp) {
                  $NetworkPort->getDeviceData($vartmp,NETWORKING_TYPE);

                  $out .= "<a href=\"".$CFG_GLPI["root_doc"]."/".$INFOFORM_PAGES[NETWORKING_TYPE]."?id=".$vartmp."\">";
                  $out .=  $NetworkPort->device_name;
                  $out .= $vartmp;
                  if ($CFG_GLPI["view_ID"]) $out .= " (".$vartmp.")";
                  $out .=  "</a><br/>";
               }
					return "<center>".$out."</center>";
					break;

				// ** FusionInventory - switch port
				case "glpi_plugin_fusinvsnmp_networkports.id" :
					$out = '';
					if (!empty($data["ITEM_$num"])) {
                  $list = explode("$$$$",$data["ITEM_$num"]);
                  $np = new NetworkPort;
                  foreach ($list as $numtmp=>$vartmp) {
                     $np->getFromDB($vartmp);
                     $out .= "<a href='".GLPI_ROOT."/front/networkport.form.php?id=".$vartmp."'>".$np->fields["name"]."</a><br/>";
                  }
					}
					return "<center>".$out."</center>";
					break;
			}
			break;

		// * Networking List (front/networking.php)
		case NETWORKING_TYPE :
			switch ($table.'.'.$field) {

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_networkequipments.networkequipments_id" :
					$query = "SELECT *
                         FROM `glpi_plugin_fusinvsnmp_networkequipments`
                         WHERE `networkequipments_id` = '".$data["id"]."';";
					if ($result = $DB->query($query)) {
						$data2=$DB->fetch_array($result);
               }

					$last_date = "";
					if (isset($data2["last_fusinvsnmp_update"])) {
						$last_date = $data2["last_fusinvsnmp_update"];
               }
					$out = "<div align='center'>" .convDateTime($last_date) . "</div>";
					return $out;
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					$plugin_fusinvsnmp_snmp = new PluginFusinvsnmpSNMP;
					$FK_model_DB = $plugin_fusinvsnmp_snmp->GetSNMPModel($data["id"],$type);
					$out = "<a href=\"" . $CFG_GLPI["root_doc"] . "/plugins/fusinvsnmp/front/snmpmodel.form.php?id=" . $FK_model_DB . "\">";
					$out .= Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_snmpmodels", $FK_model_DB, 0);
					$out .= "</a>";
					return "<center>".$out."</center>";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.name" :
					$plugin_fusinvsnmp_snmp = new PluginFusinvsnmpConfigSNMPSecurity;
					$FK_auth_DB = $plugin_fusinvsnmp_snmp->GetSNMPAuth($data["id"],$type);
					$out = "<a href=\"" . $CFG_GLPI["root_doc"] . "/plugins/fusinvsnmp/front/configsnmpsecurity.form.php?id=" . $FK_auth_DB . "\">";
					$out .= Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_configsnmpsecurities", $FK_auth_DB, 0);
					$out .= "</a>";
					return "<center>".$out."</center>";
					break;
			}
			break;

		// * Printer List (front/printer.php)
		case PRINTER_TYPE :
			switch ($table.'.'.$field) {

				// ** FusionInventory - switch
            case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $out = '';
               $NetworkPort = new NetworkPort;
               $list = explode("$$$$",$data["ITEM_$num"]);
               foreach ($list as $numtmp=>$vartmp) {
                  $NetworkPort->getDeviceData($vartmp,NETWORKING_TYPE);

                  $out .= "<a href=\"".$CFG_GLPI["root_doc"]."/".$INFOFORM_PAGES[NETWORKING_TYPE]."?id=".$vartmp."\">";
                  $out .=  $NetworkPort->device_name;
                  if ($CFG_GLPI["view_ID"]) $out .= " (".$vartmp.")";
                  $out .=  "</a><br/>";
               }
               return "<center>".$out."</center>";
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               $out = '';
               if (!empty($data["ITEM_$num"])) {
                  $list = explode("$$$$",$data["ITEM_$num"]);
                  $np = new NetworkPort;
                  foreach ($list as $numtmp=>$vartmp) {
                     $np->getFromDB($vartmp);
                     $out .= "<a href='".GLPI_ROOT."/front/networkport.form.php?id=".$vartmp."'>".$np->fields["name"]."</a><br/>";
                  }
               }
               return "<center>".$out."</center>";
               break;

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_printers.printers_id" :
					$query = "SELECT *
                         FROM `glpi_plugin_fusinvsnmp_printers`
                         WHERE `printers_id` = '".$data["id"]."';";
					if ($result = $DB->query($query)) {
						$data2=$DB->fetch_array($result);
               }

					$last_date = "";
					if (isset($data2["last_fusinvsnmp_update"])) {
						$last_date = $data2["last_fusinvsnmp_update"];
               }
					$out = "<div align='center'>" .convDateTime($last_date) . "</div>";
					return $out;
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					$plugin_fusinvsnmp_snmp = new PluginFusinvsnmpSNMP;
					$FK_model_DB = $plugin_fusinvsnmp_snmp->GetSNMPModel($data["id"],$type);
					$out = "<a href=\"" . $CFG_GLPI["root_doc"] . "/plugins/fusinvsnmp/front/snmpmodel.form.php?id=" . $FK_model_DB . "\">";
					$out .= Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_snmpmodels", $FK_model_DB, 0);
					$out .= "</a>";
					return "<center>".$out."</center>";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.id" :
					$plugin_fusinvsnmp_snmp = new PluginFusinvsnmpConfigSNMPSecurity;
					$FK_auth_DB = $plugin_fusinvsnmp_snmp->GetSNMPAuth($data["id"],$type);
					$out = "<a href=\"" . $CFG_GLPI["root_doc"] . "/plugins/fusinvsnmp/front/configsnmpsecurity.form.php?id=" . $FK_auth_DB . "\">";
					$out .= Dropdown::getDropdownName("glpi_plugin_fusinvsnmp_configsnmpsecurities", $FK_auth_DB, 0);
					$out .= "</a>";
					return "<center>".$out."</center>";
					break;

			}
			break;

		// * Model List (plugins/fusinvsnmp/front/snmpmodel.php)
		case 'PluginFusinvsnmpSNMPModel' :
			switch ($table.'.'.$field) {

				// ** Name of type of model (network, printer...)
				case "glpi_plugin_fusinvsnmp_snmpmodels.itemtype" :
					$out = '<center> ';
					switch ($data["ITEM_$num"]) {
						case COMPUTER_TYPE:
							$out .= $LANG["Menu"][0];
							break;

						case NETWORKING_TYPE:
							$out .= $LANG["Menu"][1];
							break;

						case PRINTER_TYPE:
							$out .= $LANG["Menu"][2];
							break;

						case PERIPHERAL_TYPE:
							$out .= $LANG["Menu"][16];
							break;

						case PHONE_TYPE:
							$out .= $LANG["Menu"][34];
							break;
					}
					$out .= '</center>';
					return $out;
					break;

				// ** Display pic / link for exporting model
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					$out = "<div align='center'><form></form><form method='get' action='" . GLPI_ROOT . "/plugins/fusinvsnmp/front/models.export.php' target='_blank'>
						<input type='hidden' name='model' value='" . $data["id"] . "' />
						<input name='export' src='" . GLPI_ROOT . "/pics/right.png' title='Exporter' value='Exporter' type='image'>
						</form></div>";
					return "<center>".$out."</center>";
					break;

			}
			break;


		// * Authentification List (plugins/fusinvsnmp/front/configsnmpsecurity.php)
		case 'PluginFusinvsnmpConfigSNMPSecurity' :
			switch ($table.'.'.$field) {

				// ** Hidden auth passphrase (SNMP v3)
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.auth_passphrase" :
               $out = "";
					if (empty($data["ITEM_$num"])) {
						
               } else {
						$out = "********";
               }
					return $out;
					break;

				// ** Hidden priv passphrase (SNMP v3)
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.priv_passphrase" :
               $out = "";
					if (empty($data["ITEM_$num"])) {
						
               } else {
						$out = "********";
               }
					return $out;
					break;
			}
			break;

		// * Unknown mac addresses connectd on switch - report (plugins/fusinvsnmp/report/unknown_mac.php)
		case 'PluginFusinvsnmpUnknownDevice' :
			switch ($table.'.'.$field) {

				// ** FusionInventory - switch
            case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $out = '';
               $NetworkPort = new NetworkPort;
               $list = explode("$$$$",$data["ITEM_$num"]);
               foreach ($list as $numtmp=>$vartmp) {
                  $NetworkPort->getDeviceData($vartmp,'PluginFusinvsnmpUnknownDevice');

                  $out .= "<a href=\"".$CFG_GLPI["root_doc"]."/".$INFOFORM_PAGES['PluginFusinvsnmpUnknownDevice']."?id=".$vartmp."\">";
                  $out .=  $NetworkPort->device_name;
                  if ($CFG_GLPI["view_ID"]) $out .= " (".$vartmp.")";
                  $out .=  "</a><br/>";
               }
               return "<center>".$out."</center>";
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               $out = '';
               if (!empty($data["ITEM_$num"])) {
                  $list = explode("$$$$",$data["ITEM_$num"]);
                  $np = new NetworkPort;
                  foreach ($list as $numtmp=>$vartmp) {
                     $np->getFromDB($vartmp);
                     $out .= "<a href='".GLPI_ROOT."/front/networkport.form.php?id=".$vartmp."'>".$np->fields["name"]."</a><br/>";
                  }
               }
               return "<center>".$out."</center>";
               break;

            case "glpi_plugin_fusinvsnmp_unknowndevices.type" :
					$out = '<center> ';
					switch ($data["ITEM_$num"]) {
						case COMPUTER_TYPE:
							$out .= $LANG["Menu"][0];
							break;

						case NETWORKING_TYPE:
							$out .= $LANG["Menu"][1];
							break;

						case PRINTER_TYPE:
							$out .= $LANG["Menu"][2];
							break;

						case PERIPHERAL_TYPE:
							$out .= $LANG["Menu"][16];
							break;

						case PHONE_TYPE:
							$out .= $LANG["Menu"][34];
							break;
					}
					$out .= '</center>';
					return $out;
					break;


			}
			break;

		// *
		case 'PluginFusinvsnmpNetworkPort' :
			switch ($table.'.'.$field) {

			}
			break;

		// * Ports date connection - report (plugins/fusinvsnmp/report/ports_date_connections.php)
		case 'PluginFusinvsnmpNetworkport2' :
			switch ($table.'.'.$field) {

				// ** Name and link of networking device (switch)
				case "glpi_plugin_fusinvsnmp_networkports.id" :
					$query = "SELECT `glpi_networkequipments`.`name` AS `name`, `glpi_networkequipments`.`id` AS `id`
                         FROM `glpi_networkequipments`
                              LEFT JOIN `glpi_networkports`
                                        ON `items_id` = `glpi_networkequipments`.`id`
                              LEFT JOIN `glpi_plugin_fusinvsnmp_networkports`
                                        ON `glpi_networkports`.`id`=`networkports_id`
                         WHERE `glpi_plugin_fusinvsnmp_networkports`.`id`='".$data["ITEM_$num"]."'
                         LIMIT 0,1;";
					$result = $DB->query($query);
					$data2 = $DB->fetch_assoc($result);
					$out = "<a href='".GLPI_ROOT."/front/networking.form.php?id=".$data2["id"]."'>".$data2["name"]."</a>";
				return "<center>".$out."</center>";
				break;

				// ** Name and link of port of networking device (port of switch)
				case "glpi_plugin_fusinvsnmp_networkports.networkports_id" :
					$NetworkPort=new NetworkPort;
					$NetworkPort->getFromDB($data["ITEM_$num"]);
               $name = "";
               if (isset($NetworkPort->fields["name"])) {
                  $name = $NetworkPort->fields["name"];
               }
					$out = "<a href='".GLPI_ROOT."/front/networkport.form.php?id=".$data["ITEM_$num"]."'>".$name."</a>";
					return "<center>".$out."</center>";
					break;

				// ** Location of switch
				case "glpi_locations.id" :
					$out = Dropdown::getDropdownName("glpi_locations",$data["ITEM_$num"]);
					return "<center>".$out."</center>";
					break;

			}
			break;

		// * range IP list (plugins/fusinvsnmp/front/iprange.php)
		case 'PluginFusinvsnmpIPRange' :
			switch ($table.'.'.$field) {


				// ** Display entity name
				case "glpi_entities.name" :
					if ($data["ITEM_$num"] == '') {
						$out = Dropdown::getDropdownName("glpi_entities",$data["ITEM_$num"]);
						return "<center>".$out."</center>";
					}
					break;

			}
			break;

		// * Detail of ports history (plugins/fusinvsnmp/report/switch_ports.history.php)
		case 'PluginFusinvsnmpNetworkPortLog' :
			switch ($table.'.'.$field) {

				// ** Display switch and Port
				case "glpi_networkports.id" :
					$Array_device = PluginFusinvsnmpNetworkPort::getUniqueObjectfieldsByportID($data["ITEM_$num"]);
					$item = new $Array_device["itemtype"];
					$item->getFromDB($Array_device["items_id"]);
					$out = "<div align='center'>" . $item->getLink(1);

					$query = "SELECT *
                         FROM `glpi_networkports`
                         WHERE `id`='" . $data["ITEM_$num"] . "';";
					$result = $DB->query($query);

					if ($DB->numrows($result) != "0") {
						$out .= "<br/><a href='".GLPI_ROOT."/front/networkport.form.php?id=".$data["ITEM_$num"]."'>".$DB->result($result, 0, "name")."</a>";
               }
					$out .= "</td>";
					return $out;
					break;

				// ** Display GLPI field of device
				case "glpi_plugin_fusinvsnmp_networkportlogs.field" :
               $out = $FUSIONINVENTORY_MAPPING[NETWORKING_TYPE][$data["ITEM_$num"]]['name'];
               return $out;
					break;

				// ** Display Old Value (before changement of value)
				case "glpi_plugin_fusinvsnmp_networkportlogs.old_value" :
					// TODO ADD LINK TO DEVICE
					if ((substr_count($data["ITEM_$num"],":") == 5) AND (empty($data["ITEM_3"]))) {
						return "<center><b>".$data["ITEM_$num"]."</b></center>";
               }
					break;

				// ** Display New Value (new value modified)
				case "glpi_plugin_fusinvsnmp_networkportlogs.new_value" :
					if ((substr_count($data["ITEM_$num"],":") == 5) AND (empty($data["ITEM_3"]))) {
						return "<center><b>".$data["ITEM_$num"]."</b></center>";
               }
					break;

			}
			break;

	}

	return "";
}

// Define Dropdown tables to be manage in GLPI :
function plugin_fusinvsnmp_getDropdown() {
	// Table => Name
	global $LANG;
	if (isset ($_SESSION["glpi_plugin_fusinvsnmp_installed"]) && $_SESSION["glpi_plugin_fusinvsnmp_installed"] == 1) {
		return array (
			"glpi_plugin_fusinvsnmp_snmpversions" => "SNMP version",
			"glpi_plugin_fusinvsnmp_miboids" => "OID MIB",
			"glpi_plugin_fusinvsnmp_mibobjects" => "Objet MIB",
			"glpi_plugin_fusinvsnmp_miblabels" => "Label MIB"
		);
   } else {
		return array ();
   }
}

/* Cron */
function cron_plugin_fusinvsnmp() {
   // TODO :Disable for the moment (may be check if functions is good or not
//	$ptud = new PluginFusinvsnmpUnknownDevice;
//   $ptud->CleanOrphelinsConnections();
//	$ptud->FusionUnknownKnownDevice();
//   #Clean server script processes history
   $pfisnmph = new PluginFusinvsnmpNetworkPortLog;
   $pfisnmph->cronCleanHistory();
   return 1;
}



function plugin_fusinvsnmp_install() {
	global $DB, $LANG, $CFG_GLPI;

   include (GLPI_ROOT . "/plugins/fusinvsnmp/install/install.php");
   pluginFusinvsnmpInstall();

   return true;
}

// Uninstall process for plugin : need to return true if succeeded
function plugin_fusinvsnmp_uninstall() {
   include (GLPI_ROOT . "/plugins/fusinvsnmp/install/install.php");
   pluginFusinvsnmpUninstall();
}

/**
* Check if FusionInventory need to be updated
*
* @param
*
* @return 0 (no need update) OR 1 (need update)
**/
function plugin_fusinvsnmp_needUpdate() {
   $version = "2.3.0";
   include (GLPI_ROOT . "/plugins/fusinvsnmp/install/update.php");
   $version_detected = pluginFusinvsnmpGetCurrentVersion($version);
   if ((isset($version_detected)) AND ($version_detected != $version)) {
      return 1;
   } else {
      return 0;
   }
}



// Define headings added by the plugin //
//function plugin_get_headings_fusinvsnmp($type,$id,$withtemplate) {
function plugin_get_headings_fusinvsnmp($item,$withtemplate) {
	global $LANG;
	$configModules = new PluginFusinvsnmpConfigModules;

	$type = get_Class($item);
   switch ($type) {
		case COMPUTER_TYPE :
			if ($withtemplate) { //?
				return array();
			// Non template case
         } else {
//				if ((PluginFusinvsnmpAuth::haveRight("snmp_networking", "r")) AND ($configModules->getValue("snmp") == "1")) {
				$array = array ();
            //return array(
            if (($configModules->isActivated('remotehttpagent')) AND(PluginFusinvsnmpAuth::haveRight("remotecontrol","w"))) {
               $array[1] = $LANG['plugin_fusinvsnmp']["title"][0];
            }
				//}
            $array[2] = $LANG['plugin_fusinvsnmp']["title"][5];

            return $array;
//				}
			}
			break;

		case MONITOR_TYPE :
			if ($withtemplate) { //?
				return array();
			// Non template case
         } else {
//				if ((PluginFusinvsnmpAuth::haveRight("snmp_networking", "r")) AND ($configModules->getValue("snmp") == "1")) {
					return array(
						1 => $LANG['plugin_fusinvsnmp']["title"][5]
					);
//				}
			}
			break;

		case NETWORKING_TYPE :
			if ($withtemplate) {
				return array();
			// Non template case
         } else {
            $array = array ();
				if ((PluginFusinvsnmpAuth::haveRight("snmp_networking", "r")) AND ($configModules->getValue("snmp") == "1")) {
					$array[1] = $LANG['plugin_fusinvsnmp']["title"][0];
				}
            $array[2] = $LANG['plugin_fusinvsnmp']["title"][5];
            return $array;
			}
			break;

		case PRINTER_TYPE :
			// template case
			if ($withtemplate) {
				return array();
			// Non template case
         } else {
            $array = array ();
				if ((PluginFusinvsnmpAuth::haveRight("snmp_printers", "r")) AND ($configModules->getValue("snmp") == "1")) {
					$array[1] = $LANG['plugin_fusinvsnmp']["title"][0];
				}
            $array[2] = $LANG['plugin_fusinvsnmp']["title"][5];
            return $array;
			}
			break;

		case PROFILE_TYPE :
			// template case
			if ($withtemplate) {
				return array();
			// Non template case
         } else {
				return array(
					1 => $LANG['plugin_fusinvsnmp']["title"][0],
					);
         }
			break;
	}
	return false;	
}

// Define headings actions added by the plugin	 
function plugin_headings_actions_fusinvsnmp($type) {

   $configModules = new PluginFusinvsnmpConfigModules;

	switch ($type) {
		case COMPUTER_TYPE :
			$array = array ();
         if (($configModules->isActivated('remotehttpagent')) AND (PluginFusinvsnmpAuth::haveRight("remotecontrol","w"))) {
             $array[1] = "plugin_headings_fusinvsnmp_computerInfo";
         }
			return $array;
			break;

		case MONITOR_TYPE :
			break;

      case PRINTER_TYPE :
			$array = array ();
			if (PluginFusinvsnmpAuth::haveRight("snmp_printers", "r")) {
				$array[1] = "plugin_headings_fusinvsnmp_printerInfo";
			}
			return $array;
			break;

		case NETWORKING_TYPE :
			if (PluginFusinvsnmpAuth::haveRight("snmp_networking", "r")) {
				$array[1] = "plugin_headings_fusinvsnmp_networkingInfo";
			}
			return $array;
			break;

		case PROFILE_TYPE :
			return array(
				1 => "plugin_headings_fusinvsnmp",
				);
			break;

	}
	return false;
}


function plugin_headings_fusinvsnmp_computerInfo($type, $id) {
   $pfit = new PluginFusinvsnmpTask;
   $pfit->RemoteStateAgent(GLPI_ROOT . '/plugins/fusinvsnmp/front/agents.state.php', $id, $type, array('INVENTORY' => 1, 'NETDISCOVERY' => 1, 'SNMPQUERY' => 1, 'WAKEONLAN' => 1));
}

function plugin_headings_fusinvsnmp_printerInfo($type, $id) {
	include_once(GLPI_ROOT."/inc/stat.function.php");
	$plugin_fusinvsnmp_printer = new PluginFusinvsnmpPrinter;
	$plugin_fusinvsnmp_printer->showFormPrinter($id,
               array('target'=>GLPI_ROOT.'/plugins/fusinvsnmp/front/printer_info.form.php'));
	echo '<div id="overDivYFix" STYLE="visibility:hidden">fusinvsnmp_1</div>';
   $plugin_fusinvsnmp_printer->showFormPrinter_graph($id,
               array('target'=>GLPI_ROOT . '/plugins/fusinvsnmp/front/printer_info.form.php'));
}

function plugin_headings_fusinvsnmp_printerHistory($type, $id) {
	$print_history = new PluginFusinvsnmpPrinterLog;
	$print_history->showForm($_GET["id"],
               array('target'=>GLPI_ROOT.'/plugins/fusinvsnmp/front/printer_history.form.php'));
}

function plugin_headings_fusinvsnmp_networkingInfo($type, $id) {
	$snmp = new PluginFusinvsnmpNetworkEquipment;
	$snmp->showForm($id, 
           array('target'=>GLPI_ROOT.'/plugins/fusinvsnmp/front/switch_info.form.php'));
}

function plugin_headings_fusinvsnmp($type,$id,$withtemplate=0) {
	global $CFG_GLPI;

	switch ($type) {
		case PROFILE_TYPE :
			$prof=new PluginFusinvsnmpProfile;
			if (!$prof->GetfromDB($id)) {
				PluginFusinvsnmpDb::createaccess($id);
         }
			$prof->showForm($id, 
              array('target'=>$CFG_GLPI["root_doc"]."/plugins/fusinvsnmp/front/profile.php"));
		break;
	}
}


function plugin_fusinvsnmp_MassiveActions($type) {
	global $LANG;
	switch ($type) {
		case NETWORKING_TYPE :
			return array (
            "plugin_fusinvsnmp_get_model" => $LANG['plugin_fusinvsnmp']["model_info"][14],
				"plugin_fusinvsnmp_assign_model" => $LANG['plugin_fusinvsnmp']["massiveaction"][1],
				"plugin_fusinvsnmp_assign_auth" => $LANG['plugin_fusinvsnmp']["massiveaction"][2]
			);
			break;

		case PRINTER_TYPE :
			return array (
            "plugin_fusinvsnmp_get_model" => $LANG['plugin_fusinvsnmp']["model_info"][14],
				"plugin_fusinvsnmp_assign_model" => $LANG['plugin_fusinvsnmp']["massiveaction"][1],
				"plugin_fusinvsnmp_assign_auth" => $LANG['plugin_fusinvsnmp']["massiveaction"][2]
			);
			break;

		case 'PluginFusinvsnmpUnknownDevice';
			return array (
				"plugin_fusinvsnmp_discovery_import" => $LANG["buttons"][37]
			);
	}
	return array ();
}

function plugin_fusinvsnmp_MassiveActionsDisplay($type, $action) {

	global $LANG, $CFG_GLPI, $DB;
	switch ($type) {
		case NETWORKING_TYPE :
			switch ($action) {

            case "plugin_fusinvsnmp_get_model" :
               if(PluginFusinvsnmpAuth::haveRight("snmp_models","w")) {
                   echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
               break;

				case "plugin_fusinvsnmp_assign_model" :
               if(PluginFusinvsnmpAuth::haveRight("snmp_models","w")) {
                  $query_models = "SELECT *
                                   FROM `glpi_plugin_fusinvsnmp_snmpmodels`
                                   WHERE `itemtype`!='2'
                                         AND `itemtype`!='0';";
                  $result_models=$DB->query($query_models);
                  $exclude_models = array();
                  while ($data_models=$DB->fetch_array($result_models)) {
                     $exclude_models[] = $data_models['id'];
                  }
                  Dropdown::show("PluginFusinvsnmpSNMPModel",
                                 array('name' => "snmp_model",
                                       'value' => "name",
                                       'comment' => false,
                                       'used' => $exclude_models));
                  echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
               break;

				case "plugin_fusinvsnmp_assign_auth" :
               if(PluginFusinvsnmpAuth::haveRight("snmp_authentication","w")) {
                  PluginFusinvsnmpSNMP::auth_dropdown();
                  echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
               break;

			}
			break;

		case PRINTER_TYPE :
			switch ($action) {

            case "plugin_fusinvsnmp_get_model" :
               if(PluginFusinvsnmpAuth::haveRight("snmp_models","w")) {
                   echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
               break;

				case "plugin_fusinvsnmp_assign_model" :
               if(PluginFusinvsnmpAuth::haveRight("snmp_models","w")) {
                  $query_models = "SELECT *
                                   FROM `glpi_plugin_fusinvsnmp_snmpmodels`
                                   WHERE `itemtype`!='3'
                                         AND `itemtype`!='0';";
                  $result_models=$DB->query($query_models);
                  $exclude_models = array();
                  while ($data_models=$DB->fetch_array($result_models)) {
                     $exclude_models[] = $data_models['id'];
                  }
                  Dropdown::show("PluginFusinvsnmpSNMPModel",
                                 array('name' => "snmp_model",
                                       'value' => "name",
                                       'comment' => false,
                                       'used' => $exclude_models));
                  echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
               break;

				case "plugin_fusinvsnmp_assign_auth" :
               if(PluginFusinvsnmpAuth::haveRight("snmp_authentication","w")) {
                  PluginFusinvsnmpSNMP::auth_dropdown();
                  echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
               break;

			}
			break;

		case 'PluginFusinvsnmpUnknownDevice';
			switch ($action) {
				case "plugin_fusinvsnmp_discovery_import" :
               if(PluginFusinvsnmpAuth::haveRight("unknowndevices","w")) {
                  echo "<input type=\"submit\" name=\"massiveaction\" class=\"submit\" value=\"" . $LANG["buttons"][2] . "\" >";
               }
					break;
			}
			break;
	}
	return "";
}

function plugin_fusinvsnmp_MassiveActionsProcess($data) {
	global $LANG;
	switch ($data['action']) {

      case "plugin_fusinvsnmp_get_model" :
         if ($data['itemtype'] == NETWORKING_TYPE) {
				foreach ($data['item'] as $key => $val) {
					if ($val == 1) {
                  $PluginFusinvsnmpSNMPModel = new PluginFusinvsnmpSNMPModel;
                  $PluginFusinvsnmpSNMPModel->getrightmodel($key, NETWORKING_TYPE);
					}
				}
         } else if($data['itemtype'] == PRINTER_TYPE) {
            foreach ($data['item'] as $key => $val) {
					if ($val == 1) {
                  $PluginFusinvsnmpSNMPModel = new PluginFusinvsnmpSNMPModel;
                  $PluginFusinvsnmpSNMPModel->getrightmodel($key, PRINTER_TYPE);
					}
				}
         }
         break;

		case "plugin_fusinvsnmp_assign_model" :
			if ($data['itemtype'] == NETWORKING_TYPE) {
				foreach ($data['item'] as $key => $val) {
					if ($val == 1) {
						PluginFusinvsnmpMassiveaction::assign($key, NETWORKING_TYPE, "model", $data["snmp_model"]);
					}
				}
			} else if($data['itemtype'] == PRINTER_TYPE) {
				foreach ($data['item'] as $key => $val) {
					if ($val == 1) {
						PluginFusinvsnmpMassiveaction::assign($key, PRINTER_TYPE, "model", $data["snmp_model"]);
					}
				}
			}
			break;
      
		case "plugin_fusinvsnmp_assign_auth" :
			if ($data['itemtype'] == NETWORKING_TYPE) {
				foreach ($data['item'] as $key => $val) {
					if ($val == 1) {
						PluginFusinvsnmpMassiveaction::assign($key, NETWORKING_TYPE, "auth", $data["plugin_fusinvsnmp_snmpauths_id"]);
					}
				}
			} else if($data['itemtype'] == PRINTER_TYPE) {
				foreach ($data['item'] as $key => $val) {
					if ($val == 1) {
						PluginFusinvsnmpMassiveaction::assign($key, PRINTER_TYPE, "auth", $data["plugin_fusinvsnmp_snmpauths_id"]);
					}
				}
			}
			break;

		case "plugin_fusinvsnmp_discovery_import" :
         if(PluginFusinvsnmpAuth::haveRight("unknowndevices","w")) {
            $Import = 0;
            $NoImport = 0;
            foreach ($data['item'] as $key => $val) {
               if ($val == 1) {
                  list($Import, $NoImport) = PluginFusinvsnmpDiscovery::import($key,$Import,$NoImport);
               }
            }
            addMessageAfterRedirect($LANG['plugin_fusinvsnmp']["discovery"][5]." : ".$Import);
            addMessageAfterRedirect($LANG['plugin_fusinvsnmp']["discovery"][9]." : ".$NoImport);
         }
			break;
	}
}

// How to display specific update fields ?
// Massive Action functions
function plugin_fusinvsnmp_MassiveActionsFieldsDisplay($type,$table,$field,$linkfield) {
	global $LINK_ID_TABLE,$LANG;
	// Table fields
	//echo $table.".".$field."<br/>";
	switch ($table.".".$field) {

		case 'glpi_plugin_fusinvsnmp_configsnmpsecurities.name':
			Dropdown::show("PluginFusinvsnmpConfigSNMPSecurity",
                        array('name' => $linkfield));
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_snmpmodels.name':
			Dropdown::show("PluginFusinvsnmpSNMPModel",
                        array('name' => $linkfield,
                              'comment' => false));
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_unknowndevices.type' :
         $type_list = array();
			$type_list[] = COMPUTER_TYPE;
			$type_list[] = NETWORKING_TYPE;
			$type_list[] = PRINTER_TYPE;
			$type_list[] = PERIPHERAL_TYPE;
			$type_list[] = PHONE_TYPE;
			Device::dropdownTypes('type',$linkfield,$type_list);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.id' :
			Dropdown::show("PluginFusinvsnmpAgent",
                        array('name' => $linkfield,
                              'comment' => false));
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.nb_process_query' :
			Dropdown::showInteger("nb_process_query", $linkfield,1,200);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.nb_process_discovery' :
			Dropdown::showInteger("nb_process_discovery", $linkfield,1,400);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.logs' :
			$ArrayValues[]= $LANG["choice"][0];
			$ArrayValues[]= $LANG["choice"][1];
			$ArrayValues[]= $LANG["setup"][137];
			Dropdown::showFromArray('logs', $ArrayValues,
                                 array('value'=>$linkfield));
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.core_discovery' :
			Dropdown::showInteger("core_discovery", $linkfield,1,32);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.core_query' :
			Dropdown::showInteger("core_query", $linkfield,1,32);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.threads_discovery' :
			Dropdown::showInteger("threads_discovery", $linkfield,1,400);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_agents.threads_query' :
			Dropdown::showInteger("threads_query", $linkfield,1,400);
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_discovery.plugin_fusinvsnmp_snmpauths_id' :
			$plugin_fusinvsnmp_snmp = new PluginFusinvsnmpConfigSNMPSecurity;
			echo $plugin_fusinvsnmp_snmp->selectbox();
			return true;
			break;

		case 'glpi_plugin_fusinvsnmp_snmpmodels.itemtype' :
         $type_list = array();
			$type_list[] = COMPUTER_TYPE;
			$type_list[] = NETWORKING_TYPE;
			$type_list[] = PRINTER_TYPE;
			$type_list[] = PERIPHERAL_TYPE;
			$type_list[] = PHONE_TYPE;
			Device::dropdownTypes('type',$linkfield,$type_list);
			return true;
			break;

      case 'glpi_entities.name' :
         if (isMultiEntitiesMode()) {
            Dropdown::show("Entities",
		                     array('name' => "entities_id",
                           'value' => $_SESSION["glpiactive_entity"]));
         }
         return true;
         break;
	}
	return false;
}



function plugin_fusinvsnmp_addSelect($type,$id,$num) {
	global $SEARCH_OPTION;

	$table=$SEARCH_OPTION[$type][$id]["table"];
	$field=$SEARCH_OPTION[$type][$id]["field"];

	switch ($type) {
		// * Computer List (front/computer.php)
		case COMPUTER_TYPE :
			switch ($table.".".$field) {

			// ** FusionInventory - switch
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
					return "GROUP_CONCAT( DISTINCT FUSIONINVENTORY_12.items_id SEPARATOR '$$$$') AS ITEM_$num, ";
					break;

				// ** FusionInventory - switch port
				case "glpi_plugin_fusinvsnmp_networkports.id" :
               return "GROUP_CONCAT( DISTINCT FUSIONINVENTORY_22.".$field." SEPARATOR '$$$$') AS ITEM_$num, ";
					break;
			}
			break;
		// * PRINTER List (front/printer.php)
      case PRINTER_TYPE :
         switch ($table.".".$field) {

         // ** FusionInventory - switch
            case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               return "GROUP_CONCAT( DISTINCT FUSIONINVENTORY_12.items_id SEPARATOR '$$$$') AS ITEM_$num, ";
               break;

				// ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               return "GROUP_CONCAT( DISTINCT FUSIONINVENTORY_22.".$field." SEPARATOR '$$$$') AS ITEM_$num, ";
               break;

         }
         break;

		case 'PluginFusinvsnmpUnknownDevice' :
			switch ($table.".".$field) {

				case "glpi_networkequipments.device" :
					return "GROUP_CONCAT( DISTINCT FUSIONINVENTORY_12.items_id SEPARATOR '$$$$') AS ITEM_$num, ";
					break;

				case "glpi_networkports.NetworkPort" :
					return "GROUP_CONCAT( DISTINCT FUSIONINVENTORY_22.".$field." SEPARATOR '$$$$') AS ITEM_$num, ";
					break;

			}
			break;

      case 'PluginFusinvsnmpIPRange' :
         switch ($table.".".$SEARCH_OPTION[$type][$id]["linkfield"]) {

            case "glpi_plugin_fusinvsnmp_agents.plugin_fusinvsnmp_agents_id_query" :
               return "GROUP_CONCAT( DISTINCT CONCAT(gpta.name,'$$' ,gpta.id) SEPARATOR '$$$$') AS ITEM_$num, ";
               break;

         }
	}
	return "";
}


function plugin_fusinvsnmp_forceGroupBy($type) {
   switch ($type) {
      case COMPUTER_TYPE :
         // ** FusionInventory - switch
         return "GROUP BY glpi_computers.id";
         break;

      case PRINTER_TYPE :
         // ** FusionInventory - switch
         return "GROUP BY glpi_printers.id";
         break;
    }
    return false;
}


// Search modification for plugin FusionInventory

function plugin_fusinvsnmp_addLeftJoin($type,$ref_table,$new_table,$linkfield,&$already_link_tables) {


//	echo "Left Join : ".$new_table.".".$linkfield."<br/>";
	switch ($type) {
		// * Computer List (front/computer.php)
		case COMPUTER_TYPE :
			switch ($new_table.".".$linkfield) {
				// ** FusionInventory - switch
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $table_networking_ports = 0;
               foreach ($already_link_tables AS $num=>$tmp_table) {
                  if ($tmp_table == "glpi_networkports.") {
                     $table_networking_ports = 1;
                  }
               }
               if ($table_networking_ports == "1") {
                  return " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_11 ON glpi_networkports.id = FUSIONINVENTORY_11.end1 OR glpi_networkports.id = FUSIONINVENTORY_11.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_12 ON FUSIONINVENTORY_12.id = CASE WHEN FUSIONINVENTORY_11.end1 = glpi_networkports.id THEN FUSIONINVENTORY_11.end2 ELSE FUSIONINVENTORY_11.end1 END
                     LEFT JOIN glpi_networkequipments AS FUSIONINVENTORY_13 ON FUSIONINVENTORY_12.items_id=FUSIONINVENTORY_13.id";

               } else {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_10 ON (FUSIONINVENTORY_10.items_id = glpi_computers.id AND FUSIONINVENTORY_10.itemtype='".COMPUTER_TYPE."') ".
                     " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_11 ON FUSIONINVENTORY_10.id = FUSIONINVENTORY_11.end1 OR FUSIONINVENTORY_10.id = FUSIONINVENTORY_11.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_12 ON FUSIONINVENTORY_12.id = CASE WHEN FUSIONINVENTORY_11.end1 = FUSIONINVENTORY_10.id THEN FUSIONINVENTORY_11.end2 ELSE FUSIONINVENTORY_11.end1 END
                     LEFT JOIN glpi_networkequipments AS FUSIONINVENTORY_13 ON FUSIONINVENTORY_12.items_id=FUSIONINVENTORY_13.id";
               }
               break;

				// ** FusionInventory - switch port
				case "glpi_plugin_fusinvsnmp_networkports.id" :
               $table_networking_ports = 0;
               $table_fusinvsnmp_networking = 0;
               foreach ($already_link_tables AS $num=>$tmp_table) {
                  if ($tmp_table == "glpi_networkports.") {
                     $table_networking_ports = 1;
                  }
                  if ($tmp_table == "glpi_plugin_fusinvsnmp_networkequipments.id") {
                     $table_fusinvsnmp_networking = 1;
                  }
               }
               if ($table_fusinvsnmp_networking == "1") {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id=FUSIONINVENTORY_12.id ";
               } else if ($table_networking_ports == "1") {
                  return " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_21 ON glpi_networkports.id = FUSIONINVENTORY_21.end1 OR glpi_networkports.id = FUSIONINVENTORY_21.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id = CASE WHEN FUSIONINVENTORY_21.end1 = glpi_networkports.id THEN FUSIONINVENTORY_21.end2 ELSE FUSIONINVENTORY_21.end1 END ";
               } else {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_20 ON (FUSIONINVENTORY_20.items_id = glpi_computers.id AND FUSIONINVENTORY_20.itemtype='".COMPUTER_TYPE."') ".
                     " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_21 ON FUSIONINVENTORY_20.id = FUSIONINVENTORY_21.end1 OR FUSIONINVENTORY_20.id = FUSIONINVENTORY_21.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id = CASE WHEN FUSIONINVENTORY_21.end1 = FUSIONINVENTORY_20.id THEN FUSIONINVENTORY_21.end2 ELSE FUSIONINVENTORY_21.end1 END ";

               }
					break;

			}
			break;

		// * Networking List (front/networking.php)
		case NETWORKING_TYPE :
			switch ($new_table.".".$linkfield) {

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_networkequipments ON (glpi_networkequipments.id = glpi_plugin_fusinvsnmp_networkequipments.networkequipments_id) ";
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_networkequipments AS gptn_model ON (glpi_networkequipments.id = gptn_model.networkequipments_id) ".
						" LEFT JOIN glpi_plugin_fusinvsnmp_snmpmodels ON (gptn_model.plugin_fusinvsnmp_snmpmodels_id = glpi_plugin_fusinvsnmp_snmpmodels.id) ";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.id" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_networkequipments AS gptn_auth ON glpi_networkequipments.id = gptn_auth.networkequipments_id ".
						" LEFT JOIN glpi_plugin_fusinvsnmp_configsnmpsecurities ON gptn_auth.plugin_fusinvsnmp_snmpauths_id = glpi_plugin_fusinvsnmp_configsnmpsecurities.id ";
					break;

			}
			break;

		// * Printer List (front/printer.php)
		case PRINTER_TYPE :
			switch ($new_table.".".$linkfield) {

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_printers.id" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_printers ON (glpi_printers.id = glpi_plugin_fusinvsnmp_printers.printers_id) ";
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_printers AS gptp_model ON (glpi_printers.id = gptp_model.printers_id) ".
						" LEFT JOIN glpi_plugin_fusinvsnmp_snmpmodels ON (gptp_model.plugin_fusinvsnmp_snmpmodels_id = glpi_plugin_fusinvsnmp_snmpmodels.id) ";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.id" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_printers AS gptp_auth ON glpi_printers.id = gptp_auth.printers_id ".
						" LEFT JOIN glpi_plugin_fusinvsnmp_configsnmpsecurities ON gptp_auth.plugin_fusinvsnmp_snmpauths_id = glpi_plugin_fusinvsnmp_configsnmpsecurities.id ";
					break;

				// ** FusionInventory - switch
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $table_networking_ports = 0;
               foreach ($already_link_tables AS $num=>$tmp_table) {
                  if ($tmp_table == "glpi_networkports.") {
                     $table_networking_ports = 1;
                  }
               }
               if ($table_networking_ports == "1") {
                  return " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_11 ON glpi_networkports.id = FUSIONINVENTORY_11.end1 OR glpi_networkports.id = FUSIONINVENTORY_11.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_12 ON FUSIONINVENTORY_12.id = CASE WHEN FUSIONINVENTORY_11.end1 = glpi_networkports.id THEN FUSIONINVENTORY_11.end2 ELSE FUSIONINVENTORY_11.end1 END
                     LEFT JOIN glpi_networkequipments AS FUSIONINVENTORY_13 ON FUSIONINVENTORY_12.items_id=FUSIONINVENTORY_13.id";

               } else {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_10 ON (glpi_printers.id = FUSIONINVENTORY_10.items_id AND FUSIONINVENTORY_10.itemtype='".PRINTER_TYPE."') ".
                     " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_11 ON FUSIONINVENTORY_10.id = FUSIONINVENTORY_11.end1 OR FUSIONINVENTORY_10.id = FUSIONINVENTORY_11.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_12 ON FUSIONINVENTORY_12.id = CASE WHEN FUSIONINVENTORY_11.end1 = FUSIONINVENTORY_10.id THEN FUSIONINVENTORY_11.end2 ELSE FUSIONINVENTORY_11.end1 END
                     LEFT JOIN glpi_networkequipments AS FUSIONINVENTORY_13 ON FUSIONINVENTORY_12.items_id=FUSIONINVENTORY_13.id";
               }
               break;

               // ** FusionInventory - switch port
               case "glpi_plugin_fusinvsnmp_networkports.id" :
                  $table_networking_ports = 0;
                  $table_fusinvsnmp_networking = 0;
                  foreach ($already_link_tables AS $num=>$tmp_table) {
                     if ($tmp_table == "glpi_networkports.") {
                        $table_networking_ports = 1;
                     }
                     if ($tmp_table == "glpi_plugin_fusinvsnmp_networkequipments.id") {
                        $table_fusinvsnmp_networking = 1;
                     }
                  }
                  if ($table_fusinvsnmp_networking == "1") {
                     return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id=FUSIONINVENTORY_12.id ";
                  } else if ($table_networking_ports == "1") {
                     return " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_21 ON glpi_networkports.id = FUSIONINVENTORY_21.end1 OR glpi_networkports.id = FUSIONINVENTORY_21.end2 ".
                        " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id = CASE WHEN FUSIONINVENTORY_21.end1 = glpi_networkports.id THEN FUSIONINVENTORY_21.end2 ELSE FUSIONINVENTORY_21.end1 END ";
                  } else {
                     return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_20 ON (FUSIONINVENTORY_20.items_id = glpi_computers.id AND FUSIONINVENTORY_20.itemtype='".PRINTER_TYPE."') ".
                      " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_21 ON FUSIONINVENTORY_20.id = FUSIONINVENTORY_21.end1 OR FUSIONINVENTORY_20.id = FUSIONINVENTORY_21.end2 ".
                        " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id = CASE WHEN FUSIONINVENTORY_21.end1 = FUSIONINVENTORY_20.id THEN FUSIONINVENTORY_21.end2 ELSE FUSIONINVENTORY_21.end1 END ";
                  }
                  break;

			}
			break;

		// * Unknown mac addresses connectd on switch - report (plugins/fusinvsnmp/report/unknown_mac.php)
		case 'PluginFusinvsnmpUnknownDevice' :
			switch ($new_table.".".$linkfield) {

				// ** FusionInventory - switch
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $table_networking_ports = 0;
               foreach ($already_link_tables AS $num=>$tmp_table) {
                  if ($tmp_table == "glpi_networkports.") {
                     $table_networking_ports = 1;
                  }
               }
               if ($table_networking_ports == "1") {
                  return " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_11 ON glpi_networkports.id = FUSIONINVENTORY_11.end1 OR glpi_networkports.id = FUSIONINVENTORY_11.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_12 ON FUSIONINVENTORY_12.id = CASE WHEN FUSIONINVENTORY_11.end1 = glpi_networkports.id THEN FUSIONINVENTORY_11.end2 ELSE FUSIONINVENTORY_11.end1 END
                     LEFT JOIN glpi_networkequipments AS FUSIONINVENTORY_13 ON FUSIONINVENTORY_12.items_id=FUSIONINVENTORY_13.id";

               } else {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_10 ON (glpi_printers.id = FUSIONINVENTORY_10.items_id AND FUSIONINVENTORY_10.itemtype='".PRINTER_TYPE."') ".
                     " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_11 ON FUSIONINVENTORY_10.id = FUSIONINVENTORY_11.end1 OR FUSIONINVENTORY_10.id = FUSIONINVENTORY_11.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_12 ON FUSIONINVENTORY_12.id = CASE WHEN FUSIONINVENTORY_11.end1 = FUSIONINVENTORY_10.id THEN FUSIONINVENTORY_11.end2 ELSE FUSIONINVENTORY_11.end1 END
                     LEFT JOIN glpi_networkequipments AS FUSIONINVENTORY_13 ON FUSIONINVENTORY_12.items_id=FUSIONINVENTORY_13.id";
               }
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               $table_networking_ports = 0;
               $table_fusinvsnmp_networking = 0;
               foreach ($already_link_tables AS $num=>$tmp_table) {
                  if ($tmp_table == "glpi_networkports.") {
                     $table_networking_ports = 1;
                  }
                  if ($tmp_table == "glpi_plugin_fusinvsnmp_networkequipments.id") {
                     $table_fusinvsnmp_networking = 1;
                  }
               }
               if ($table_fusinvsnmp_networking == "1") {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id=FUSIONINVENTORY_12.id ";
               } else if ($table_networking_ports == "1") {
                  return " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_21 ON glpi_networkports.id = FUSIONINVENTORY_21.end1 OR glpi_networkports.id = FUSIONINVENTORY_21.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id = CASE WHEN FUSIONINVENTORY_21.end1 = glpi_networkports.id THEN FUSIONINVENTORY_21.end2 ELSE FUSIONINVENTORY_21.end1 END ";
               } else {
                  return " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_20 ON (FUSIONINVENTORY_20.items_id = glpi_computers.id AND FUSIONINVENTORY_20.itemtype='".PRINTER_TYPE."') ".
                   " LEFT JOIN glpi_networkports_networkports AS FUSIONINVENTORY_21 ON FUSIONINVENTORY_20.id = FUSIONINVENTORY_21.end1 OR FUSIONINVENTORY_20.id = FUSIONINVENTORY_21.end2 ".
                     " LEFT JOIN glpi_networkports AS FUSIONINVENTORY_22 ON FUSIONINVENTORY_22.id = CASE WHEN FUSIONINVENTORY_21.end1 = FUSIONINVENTORY_20.id THEN FUSIONINVENTORY_21.end2 ELSE FUSIONINVENTORY_21.end1 END ";
               }
               break;

			}
			break;


		// * Ports date connection - report (plugins/fusinvsnmp/report/ports_date_connections.php)
		case 'PluginFusinvsnmpNetworkport2' :
			switch ($new_table.".".$linkfield) {

				// ** Location of switch
				case "glpi_locations.networkports_id" :
					return " LEFT JOIN glpi_networkports ON (glpi_plugin_fusinvsnmp_networkports.networkports_id = glpi_networkports.id) ".
						" LEFT JOIN glpi_networkequipments ON glpi_networkports.items_id = glpi_networkequipments.id".
						" LEFT JOIN glpi_locations ON glpi_locations.id = glpi_networkequipments.location";
					break;

			}
			break;

		// * range IP list (plugins/fusinvsnmp/front/iprange.php)
		case 'PluginFusinvsnmpIPRange' :
			switch ($new_table.".".$linkfield) {

				// ** Agent name associed to IP range and link to agent form
				case "glpi_plugin_fusinvsnmp_agents.plugin_fusinvsnmp_agents_id_discovery" :
					return " LEFT JOIN glpi_plugin_fusinvsnmp_agents ON (glpi_plugin_fusinvsnmp_agents.id = glpi_plugin_fusinvsnmp_ipranges.plugin_fusinvsnmp_agents_id_discovery) ";
					break;

            case "glpi_plugin_fusinvsnmp_agents.plugin_fusinvsnmp_agents_id_query" :
               return " LEFT JOIN glpi_plugin_fusinvsnmp_agents AS gpta ON (glpi_plugin_fusinvsnmp_ipranges.plugin_fusinvsnmp_agents_id_query = gpta.id) ";
               break;
            

			}
			break;

      // * ports updates list (report/switch_ports.history.php)
		case 'PluginFusinvsnmpNetworkPortLog' :
         return " LEFT JOIN `glpi_networkports` ON ( `glpi_networkports`.`id` = `glpi_plugin_fusinvsnmp_networkportlogs`.`networkports_id` ) ";
			break;
	}
	return "";
}



function plugin_fusinvsnmp_addOrderBy($type,$id,$order,$key=0) {
	global $SEARCH_OPTION;

	$table=$SEARCH_OPTION[$type][$id]["table"];
	$field=$SEARCH_OPTION[$type][$id]["field"];

//	echo "ORDER BY : ".$table.".".$field;

	switch ($type) {
		// * Computer List (front/computer.php)
		case COMPUTER_TYPE :
			switch ($table.".".$field) {

				// ** FusionInventory - switch
				case "glpi_networkequipments.device" :
					return " ORDER BY FUSIONINVENTORY_12.items_id $order ";
					break;

				// ** FusionInventory - switch port
				case "glpi_plugin_fusinvsnmp_networkports.id" :
					return " ORDER BY FUSIONINVENTORY_22.".$field." $order ";
					break;

			}
			break;

		// * Networking List (front/networking.php)
		case NETWORKING_TYPE :
			switch ($table.".".$field) {

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_networkequipments.networkequipments_id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_networkequipments.last_fusinvsnmp_update $order ";
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_snmpmodels.name $order ";
					break;

			}
			break;

		// * Printer List (front/printer.php)
		case PRINTER_TYPE :
			switch ($table.".".$field) {

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_printers.printers_id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_printers.last_fusinvsnmp_update $order ";
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_snmpmodels.name $order ";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_configsnmpsecurities.name $order ";
					break;

				// ** FusionInventory - switch
            case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               return " ORDER BY FUSIONINVENTORY_12.items_id $order ";
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               return " ORDER BY FUSIONINVENTORY_22.".$field." $order ";
               break;

			}
			break;

		// * Unknown mac addresses connectd on switch - report (plugins/fusinvsnmp/report/unknown_mac.php)
		case 'PluginFusinvsnmpUnknownDevice' :
			switch ($table.".".$field) {

				// ** FusionInventory - switch
            case "glpi_networkequipments.device" :
               return " ORDER BY FUSIONINVENTORY_12.items_id $order ";
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               return " ORDER BY FUSIONINVENTORY_22.".$field." $order ";
               break;

			}
			break;

		// * Ports date connection - report (plugins/fusinvsnmp/report/ports_date_connections.php)
		case 'PluginFusinvsnmpNetworkport2' :
			switch ($table.".".$field) {

				// ** Location of switch
				case "glpi_locations.id" :
					return " ORDER BY glpi_locations.name $order ";
					break;

			}
			break;

		// * range IP list (plugins/fusinvsnmp/front/iprange.php)
		case 'PluginFusinvsnmpIPRange' :
			switch ($table.".".$field) {
			
				// ** Agent name associed to IP range and link to agent form
				case "glpi_plugin_fusinvsnmp_agents.id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_agents.name $order ";
					break;

			}
			break;

		// * Detail of ports history (plugins/fusinvsnmp/report/switch_ports.history.php)
		case 'PluginFusinvsnmpNetworkPortLog' :
			switch ($table.".".$field) {

				// ** Display switch and Port
				case "glpi_plugin_fusinvsnmp_networkportlogs.id" :
					return " ORDER BY glpi_plugin_fusinvsnmp_networkportlogs.id $order ";
					break;
				case "glpi_networkports.id" :
					return " ORDER BY glpi_networkequipments.name,glpi_networkports.name $order ";
					break;

				// ** Display GLPI field of device
				case "glpi_plugin_fusinvsnmp_networkportlogs.field" :
					return " ORDER BY glpi_plugin_fusinvsnmp_networkportlogs.field $order ";
					break;

				// ** Display Old Value (before changement of value)
				case "glpi_plugin_fusinvsnmp_networkportlogs.old_value" :
					return " ORDER BY glpi_plugin_fusinvsnmp_networkportlogs.old_value $order ";
					break;

				// ** Display New Value (new value modified)
				case "glpi_plugin_fusinvsnmp_networkportlogs.new_value" :
					return " ORDER BY glpi_plugin_fusinvsnmp_networkportlogs.new_value $order ";
					break;

				case "glpi_plugin_fusinvsnmp_networkportlogs.date_mod" :
				return " ORDER BY glpi_plugin_fusinvsnmp_networkportlogs.date_mod $order ";
						break;

			}
	}
	return "";
}



function plugin_fusinvsnmp_addWhere($link,$nott,$type,$id,$val) {
	global $SEARCH_OPTION;

	$table=$SEARCH_OPTION[$type][$id]["table"];
	$field=$SEARCH_OPTION[$type][$id]["field"];

//	echo "add where : ".$table.".".$field."<br/>";
	$SEARCH=makeTextSearch($val,$nott);

	switch ($type) {
		// * Computer List (front/computer.php)
		case COMPUTER_TYPE :
			switch ($table.".".$field) {

				// ** FusionInventory - switch
				case "glpi_plugin_fusinvsnmp_networkequipments.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR FUSIONINVENTORY_12.items_id IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR FUSIONINVENTORY_12.items_id IS NOT NULL";
					}
					return $link." (FUSIONINVENTORY_13.name  LIKE '%".$val."%' $ADD ) ";
					break;

				// ** FusionInventory - switch port
				case "glpi_plugin_fusinvsnmp_networkports.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR FUSIONINVENTORY_22.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR FUSIONINVENTORY_22.name IS NOT NULL";
					}
					return $link." (FUSIONINVENTORY_22.name  LIKE '%".$val."%' $ADD ) ";
					break;

			}
			break;

		// * Networking List (front/networking.php)
		case NETWORKING_TYPE :
			switch ($table.".".$field) {

         // ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_networkequipments.networkequipments_id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.last_fusinvsnmp_update IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.last_fusinvsnmp_update IS NOT NULL";
					}
					return $link." ($table.last_fusinvsnmp_update  LIKE '%".$val."%' $ADD ) ";
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.name IS NOT NULL";
					}
					return $link." ($table.name  LIKE '%".$val."%' $ADD ) ";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_networkequipments.plugin_fusinvsnmp_snmpauths_id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR glpi_plugin_fusinvsnmp_configsnmpsecurities.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR glpi_plugin_fusinvsnmp_configsnmpsecurities.name IS NOT NULL";
					}
					return $link." (glpi_plugin_fusinvsnmp_configsnmpsecurities.name  LIKE '%".$val."%' $ADD ) ";
					break;

            // ** FusionInventory - CPU
            case "glpi_plugin_fusinvsnmp_networkequipments.cpu":

               break;

			}
			break;

		// * Printer List (front/printer.php)
		case PRINTER_TYPE :
			switch ($table.".".$field) {

				// ** FusionInventory - last inventory
				case "glpi_plugin_fusinvsnmp_printers.printers_id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.last_fusinvsnmp_update IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.last_fusinvsnmp_update IS NOT NULL";
					}
					return $link." ($table.last_fusinvsnmp_update  LIKE '%".$val."%' $ADD ) ";
					break;

				// ** FusionInventory - SNMP models
				case "glpi_plugin_fusinvsnmp_snmpmodels.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.name IS NOT NULL";
					}
					return $link." ($table.name  LIKE '%".$val."%' $ADD ) ";
					break;

				// ** FusionInventory - SNMP authentification
				case "glpi_plugin_fusinvsnmp_configsnmpsecurities.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.name IS NOT NULL";
					}
					return $link." ($table.name  LIKE '%".$val."%' $ADD ) ";
					break;

				// ** FusionInventory - switch
            case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $ADD = "";
               if ($nott=="0"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_12.items_id IS NULL";
               } else if ($nott=="1"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_12.items_id IS NOT NULL";
               }
               return $link." (FUSIONINVENTORY_13.name  LIKE '%".$val."%' $ADD ) ";
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               $ADD = "";
               if ($nott=="0"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_22.name IS NULL";
               } else if ($nott=="1"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_22.name IS NOT NULL";
               }
               return $link." (FUSIONINVENTORY_22.name  LIKE '%".$val."%' $ADD ) ";
               break;

			}
			break;

		// * Unknown mac addresses connectd on switch - report (plugins/fusinvsnmp/report/unknown_mac.php)
		case 'PluginFusinvsnmpUnknownDevice' :
			switch ($table.".".$field) {

				// ** FusionInventory - switch
            case "glpi_plugin_fusinvsnmp_networkequipments.id" :
               $ADD = "";
               if ($nott=="0"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_12.items_id IS NULL";
               } else if ($nott=="1"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_12.items_id IS NOT NULL";
               }
               return $link." (FUSIONINVENTORY_13.name  LIKE '%".$val."%' $ADD ) ";
               break;

            // ** FusionInventory - switch port
            case "glpi_plugin_fusinvsnmp_networkports.id" :
               $ADD = "";
               if ($nott=="0"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_22.name IS NULL";
               } else if ($nott=="1"&&$val=="NULL") {
                  $ADD=" OR FUSIONINVENTORY_22.name IS NOT NULL";
               }
               return $link." (FUSIONINVENTORY_22.name  LIKE '%".$val."%' $ADD ) ";
               break;
			}
			break;

		// * Ports date connection - report (plugins/fusinvsnmp/report/ports_date_connections.php)
		case 'PluginFusinvsnmpNetworkport2' :
			switch ($table.".".$field) {

				// ** Name and link of networking device (switch)
				case "glpi_plugin_fusinvsnmp_networkports.id" :
				break;

				// ** Name and link of port of networking device (port of switch)
				case "glpi_plugin_fusinvsnmp_networkports.networkports_id" :
					break;

				// ** Location of switch
				case "glpi_locations.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR glpi_networkequipments.location IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR glpi_networkequipments.location IS NOT NULL";
					}
					if ($val == "0") {
						return $link." (glpi_networkequipments.location >= -1 ) ";
               }
					return $link." (glpi_networkequipments.location = '".$val."' $ADD ) ";
					break;

				case "glpi_plugin_fusinvsnmp_networkports.lastup" :
					$ADD = "";
					//$val = str_replace("&lt;",">",$val);
					//$val = str_replace("\\","",$val);
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.$field IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.$field IS NOT NULL";
					}
					return $link." ($table.$field $val $ADD ) ";
					break;
			}
			break;

		// * range IP list (plugins/fusinvsnmp/front/iprange.php)
		case 'PluginFusinvsnmpIPRange' :
			switch ($table.".".$field) {

				// ** Name of range IP and link to form
				case "glpi_plugin_fusinvsnmp_ipranges.name" :
					break;

				// ** Agent name associed to IP range and link to agent form
				case "glpi_plugin_fusinvsnmp_agents.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.name IS NOT NULL";
					}
					return $link." ($table.name  LIKE '%".$val."%' $ADD ) ";
					break;

			}

         switch ($table.".".$SEARCH_OPTION[$type][$id]["linkfield"]) {

            case "glpi_plugin_fusinvsnmp_agents.plugin_fusinvsnmp_agents_id_query" :
               $ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.name IS NULL";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.name IS NOT NULL";
					}
               return $link." (gpta.name  LIKE '%".$val."%' $ADD ) ";
               break;

         }

			break;

		// * Detail of ports history (plugins/fusinvsnmp/report/switch_ports.history.php)
		case 'PluginFusinvsnmpNetworkPortLog' :
			switch ($table.".".$field) {

				// ** Display switch and Port
				case "glpi_networkports.id" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.id IS NULL ";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.id IS NOT NULL ";
					}
					return $link." ($table.id = '".$val."' $ADD ) ";
					break;

				// ** Display GLPI field of device
				case "glpi_plugin_fusinvsnmp_networkportlogs.field" :
					$ADD = "";
					if ($nott=="0"&&$val=="NULL") {
						$ADD=" OR $table.$field IS NULL ";
					} else if ($nott=="1"&&$val=="NULL") {
						$ADD=" OR $table.$field IS NOT NULL ";
					}
					if (!empty($val)) {
                  include (GLPI_ROOT . "/plugins/fusinvsnmp/inc_constants/snmp.mapping.constant.php");
						$val = $FUSIONINVENTORY_MAPPING[NETWORKING_TYPE][$val]['field'];
               }
					return $link." ($table.$field = '".addslashes($val)."' $ADD ) ";
					break;

			}
	}
	return "";
}

function plugin_pre_item_purge_fusinvsnmp($parm) {
	global $DB;

	if (isset($parm["_item_type_"])) {
		switch ($parm["_item_type_"]) {
			case NETWORKING_TYPE :
				// Delete all ports
				$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_networkequipments`
                             WHERE `networkequipments_id`='".$parm["id"]."';";
				$DB->query($query_delete);

				$query_select = "SELECT `glpi_plugin_fusinvsnmp_networkports`.`id`
                             FROM `glpi_plugin_fusinvsnmp_networkports`
                                  LEFT JOIN `glpi_networkports`
                                            ON `glpi_networkports`.`id` = `networkports_id`
                             WHERE `items_id`='".$parm["id"]."'
                                   AND `itemtype`='".NETWORKING_TYPE."';";
				$result=$DB->query($query_select);
				while ($data=$DB->fetch_array($result)) {
					$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_networkports`
                                WHERE `id`='".$data["id"]."';";
					$DB->query($query_delete);
				}

				$query_select = "SELECT `glpi_plugin_fusinvsnmp_networkequipmentips`.`id`
                             FROM `glpi_plugin_fusinvsnmp_networkequipmentips`
                                  LEFT JOIN `glpi_networkequipments`
                                            ON `glpi_networkequipments`.`id` = `networkequipments_id`
                             WHERE `networkequipments_id`='".$parm["id"]."';";
				$result=$DB->query($query_select);
				while ($data=$DB->fetch_array($result)) {
					$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_networkequipmentips`
                                WHERE `id`='".$data["id"]."';";
					$DB->query($query_delete);
				}
            break;

			case PRINTER_TYPE :
				$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_printers`
                             WHERE `printers_id`='".$parm["id"]."';";
				$DB->query($query_delete);
				$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_printercartridges`
                             WHERE `printers_id`='".$parm["id"]."';";
				$DB->query($query_delete);
				$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_printerlogs`
                             WHERE `printers_id`='".$parm["id"]."';";
				$DB->query($query_delete);
            break;

         case 'PluginFusinvsnmpUnknownDevice' :
            // Delete ports and connections if exists
            $np=new NetworkPort;
            $nn = new NetworkPort_NetworkPort();
            $query = "SELECT `id`
                      FROM `glpi_networkports`
                      WHERE `items_id` = '".$parm["id"]."'
                            AND `itemtype` = 'PluginFusinvsnmpUnknownDevice';";
            $result = $DB->query($query);
            while ($data = $DB->fetch_array($result)) {
               if ($nn->getFromDBForNetworkPort($data['id'])) {
                  $nn->delete($data);
               }
               $np->delete(array("id"=>$data["id"]));
            }
            break;

         case COMPUTER_TYPE :
            // Delete link between computer and agent fusion
            $query = "UPDATE `glpi_plugin_fusinvsnmp_agents`
                        SET `items_id` = '0'
                           AND `itemtype` = '0'
                        WHERE `items_id` = '".$parm["id"]."'
                           AND `itemtype` = '1' ";
            $DB->query($query);
            break;

		}
   }
	return $parm;
}



function plugin_pre_item_delete_fusinvsnmp($parm) {
	global $DB;

	if (isset($parm["_item_type_"])) {
		switch ($parm["_item_type_"]) {

         case NETWORKING_PORT_TYPE :
            	$query_delete = "DELETE FROM `glpi_plugin_fusinvsnmp_networkports`
                  WHERE `networkports_id`='".$parm["id"]."';";
					$DB->query($query_delete);
            break;

		}
   }
	return $parm;
}



function plugin_item_add_fusinvsnmp($parm) {
	global $DB;

	if (isset($parm["type"])) {
		switch ($parm["type"]) {

         case NETWORKING_PORT_TYPE :
            // Verify when add networking port on object (not unknown device) if port
            // of an unknown device exist.
            if ($parm["input"]["itemtype"] != 'PluginFusinvsnmpUnknownDevice') {
               // Search in DB
               $np = new NetworkPort;
               $nw = new NetworkPort_NetworkPort;
               $pfiud = new PluginFusinvsnmpUnknownDevice;
               $a_ports = $np->find("`mac`='".$parm["input"]["mac"]."' AND `itemtype`='PluginFusinvsnmpUnknownDevice' ");
               if (count($a_ports) == "1") {
                  foreach ($a_ports as $port_infos) {
                     // Get wire
                     $opposite_ID = $nw->getOppositeContact($port_infos['id']);
                     if (isset($opposite_ID)) {
                        // Modify wire
                        removeConnector($port_infos['id']);
                        makeConnector($parm['id'], $opposite_ID);
                     }
                     // Delete port
                     $np->deleteFromDB($port_infos['id']);
                     // Delete unknown device (if it has no port)
                     if (count($np->find("`items_id`='".$port_infos['items_id']."' AND `itemtype`='PluginFusinvsnmpUnknownDevice' ")) == "0") {
                        $pfiud->deleteFromDB($port_infos['items_id']);
                     }
                  }
               }
            }
            break;

      }
   }
}

?>