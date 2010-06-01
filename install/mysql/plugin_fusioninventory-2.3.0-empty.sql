## obsolete tables
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_unknown_mac`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_computers`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_config_snmp_networking`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_connection_history`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_connection_stats`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_discovery`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_errors`;
DROP TABLE IF EXISTS `glpi_dropdown_plugin_fusioninventory_snmp_auth_auth_protocol`;
DROP TABLE IF EXISTS `glpi_dropdown_plugin_fusioninventory_snmp_auth_priv_protocol`;
DROP TABLE IF EXISTS `glpi_dropdown_plugin_fusioninventory_snmp_version`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_walks`;

## renamed tables
DROP TABLE IF EXISTS `glpi_dropdown_plugin_fusioninventory_mib_label`;
DROP TABLE IF EXISTS `glpi_dropdown_plugin_fusioninventory_mib_object`;
DROP TABLE IF EXISTS `glpi_dropdown_plugin_fusioninventory_mib_oid`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_agents_inventory_state`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_config`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_config_modules`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_config_snmp_history`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_construct_device`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_construct_walks`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_construct_mibs`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_lock`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_lockable`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_mib_networking`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_model_infos`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networking`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networking_ifaddr`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networking_ports`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_printers_history`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_rangeip`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_snmp_history_connections`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_snmp_connection`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_snmp_history`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_task`;
DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_unknown_device`;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_miblabels`;

CREATE TABLE `glpi_plugin_fusioninventory_miblabels` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `comment` text COLLATE utf8_unicode_ci,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_mibobjects`;

CREATE TABLE `glpi_plugin_fusioninventory_mibobjects` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `comment` text COLLATE utf8_unicode_ci,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_miboids`;

CREATE TABLE `glpi_plugin_fusioninventory_miboids` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `comment` text COLLATE utf8_unicode_ci,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_agents`;

CREATE TABLE `glpi_plugin_fusioninventory_agents` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) DEFAULT NULL,
   `core_discovery` int(11) NOT NULL DEFAULT '1',
   `threads_discovery` int(11) NOT NULL DEFAULT '1',
   `core_query` int(11) NOT NULL DEFAULT '1',
   `threads_query` int(11) NOT NULL DEFAULT '1',
   `last_agent_update` datetime DEFAULT NULL,
   `fusioninventory_agent_version` varchar(255) DEFAULT NULL,
   `lock` int(1) NOT NULL DEFAULT '0',
   `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `items_id` int(11) NOT NULL DEFAULT '0',
   `itemtype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
   `token` varchar(255) COLLATE utf8_unicode_ci NULL,
   `module_inventory` INT( 1 ) NOT NULL DEFAULT '0',
   `module_netdiscovery` INT( 1 ) NOT NULL DEFAULT '0',
   `module_snmpquery` INT( 1 ) NOT NULL DEFAULT '0',
   `module_wakeonlan` INT( 1 ) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`),
   KEY `name` (`name`),
   KEY `key` (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_agents_errors`;

CREATE TABLE `glpi_plugin_fusioninventory_agentprocesserrors` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
   `plugin_fusioninventory_agentprocesses_id` VARCHAR( 255 )  COLLATE utf8_unicode_ci DEFAULT NULL,
   `items_id` INT( 11 ) NOT NULL DEFAULT '0',
   `itemtype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
   `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ,
   `plugin_fusioninventory_modules_id` INT( 11 ) NOT NULL DEFAULT '0',
   `error_message` text collate utf8_unicode_ci,
   PRIMARY KEY ( `id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_agentinventorystates`;

CREATE TABLE `glpi_plugin_fusioninventory_agentinventorystates` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
   `computers_id` INT( 11 ) NOT NULL DEFAULT '0',
   `state` INT( 1 ) NOT NULL DEFAULT '0',
   `date_mod` DATETIME NULL ,
   PRIMARY KEY ( `id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_agentprocesses`;

CREATE TABLE `glpi_plugin_fusioninventory_agentprocesses` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `process_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `plugin_fusioninventory_agents_id` int(11) NOT NULL DEFAULT '0',
   `status` int(1) NOT NULL DEFAULT '0',
   `start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `start_time_discovery` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `end_time_discovery` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `discovery_core` int(11) NOT NULL DEFAULT '0',
   `discovery_threads` int(11) NOT NULL DEFAULT '0',
   `discovery_nb_ip` INT( 11 ) NOT NULL DEFAULT '0',
   `discovery_nb_found` int(11) NOT NULL DEFAULT '0',
   `discovery_nb_error` INT( 11 ) NOT NULL DEFAULT '0',
   `discovery_nb_exists` int(11) NOT NULL DEFAULT '0',
   `discovery_nb_import` int(11) NOT NULL DEFAULT '0',
   `start_time_query` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `end_time_query` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `query_core` int(11) NOT NULL DEFAULT '0',
   `query_threads` int(11) NOT NULL DEFAULT '0',
   `query_nb_query` int(11) NOT NULL DEFAULT '0',
   `query_nb_error` int(11) NOT NULL DEFAULT '0',
   `query_nb_connections_created` int(11) NOT NULL DEFAULT '0',
   `query_nb_connections_deleted` int(11) NOT NULL DEFAULT '0',
   `comment` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
   PRIMARY KEY (`id`),
   KEY `process_number` (`process_number`,`plugin_fusioninventory_agents_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_configs`;

CREATE TABLE `glpi_plugin_fusioninventory_configs` (
   `id` int(1) NOT NULL AUTO_INCREMENT,
   `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
   `URL_agent_conf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `ssl_only` int(1) NOT NULL DEFAULT '0',
   `storagesnmpauth` varchar(255) NOT NULL,
   `inventory_frequence` INT( 11 ) NULL DEFAULT '24',
   `criteria1_ip` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria1_name` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria1_serial` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria1_macaddr` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria2_ip` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria2_name` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria2_serial` INT( 1 ) NOT NULL DEFAULT '0',
   `criteria2_macaddr` INT( 1 ) NOT NULL DEFAULT '0',
   `delete_agent_process` INT( 11 ) NOT NULL DEFAULT '24',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_configmodules`;

CREATE TABLE `glpi_plugin_fusioninventory_configmodules` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
   `snmp` INT( 1 ) NOT NULL DEFAULT '0',
   `inventoryocs` INT( 1 ) NOT NULL DEFAULT '0',
   `netdiscovery` INT( 1 ) NOT NULL DEFAULT '0',
   `remotehttpagent` INT( 1 ) NOT NULL DEFAULT '0',
   `wol` INT( 1 ) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_configlogfields`;

CREATE TABLE `glpi_plugin_fusioninventory_configlogfields` (
   `id` INT( 8 ) NOT NULL AUTO_INCREMENT ,
   `plugin_fusioninventory_mappings_id` int(11) NOT NULL DEFAULT '0',
   `days` int(255) NOT NULL DEFAULT '-1',
   PRIMARY KEY ( `id` ) ,
   INDEX ( `plugin_fusioninventory_mappings_id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_constructdevices`;

CREATE TABLE `glpi_plugin_fusioninventory_constructdevices` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `manufacturers_id` int(11) NOT NULL DEFAULT '0',
   `sysdescr` text,
   `itemtype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmpmodels_id` int(11) DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_constructdevicewalks`;

CREATE TABLE `glpi_plugin_fusioninventory_constructdevicewalks` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `plugin_fusioninventory_constructdevices_id` int(11) NOT NULL DEFAULT '0',
   `log` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_constructdevice_miboids`;

CREATE TABLE `glpi_plugin_fusioninventory_constructdevice_miboids` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `plugin_fusioninventory_miboids_id` int(11) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_constructdevices_id` int(11) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_mappings_id` int(11) NOT NULL DEFAULT '0',
   `oid_port_counter` int(1) NOT NULL DEFAULT '0',
   `oid_port_dyn` int(1) NOT NULL DEFAULT '0',
   `itemtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
   `vlan` int(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networkportconnectionlogs`;

CREATE TABLE `glpi_plugin_fusioninventory_networkportconnectionlogs` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
   `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   `creation` INT( 1 ) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_networkports_id_source` INT( 11 ) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_networkports_id_destination` INT( 11 ) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_agentprocesses_id` INT( 11 ) NOT NULL DEFAULT '0',
   PRIMARY KEY ( `id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_locks`;

CREATE TABLE `glpi_plugin_fusioninventory_locks` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
   `itemtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
   `items_id` INT( 11 ) NOT NULL ,
   `tablefields` TEXT ,
   PRIMARY KEY ( `id` ) ,
   KEY `itemtype` ( `itemtype` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_lockables`;

CREATE TABLE `glpi_plugin_fusioninventory_lockables` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
   `itemtype` VARCHAR( 100 ) COLLATE utf8_unicode_ci NOT NULL,
   `tablefields` TEXT ,
   `entities_id` int(11) NOT NULL DEFAULT '0',
   `is_recursive` TINYINT( 1 ) NOT NULL DEFAULT '0',
   PRIMARY KEY ( `id` ) ,
   KEY `itemtype` ( `itemtype` ),
   KEY `entities_id` ( `entities_id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_snmpmodelmibs`;

CREATE TABLE `glpi_plugin_fusioninventory_snmpmodelmibs` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `plugin_fusioninventory_snmpmodels_id` int(11) DEFAULT NULL,
   `plugin_fusioninventory_miblabels_id` int(11) DEFAULT NULL,
   `plugin_fusioninventory_miboids_id` int(11) DEFAULT NULL,
   `plugin_fusioninventory_mibobjects_id` int(11) DEFAULT NULL,
   `oid_port_counter` int(1) DEFAULT NULL,
   `oid_port_dyn` int(1) DEFAULT NULL,
   `plugin_fusioninventory_mappings_id` int(11) NOT NULL DEFAULT '0',
   `activation` int(1) NOT NULL DEFAULT '1',
   `vlan` int(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`),
   KEY `plugin_fusioninventory_snmpmodels_id` (`plugin_fusioninventory_snmpmodels_id`),
   KEY `plugin_fusioninventory_snmpmodels_id_2` (`plugin_fusioninventory_snmpmodels_id`,`oid_port_dyn`),
   KEY `plugin_fusioninventory_snmpmodels_id_3` (`plugin_fusioninventory_snmpmodels_id`,`oid_port_counter`,`plugin_fusioninventory_mappings_id`),
   KEY `plugin_fusioninventory_snmpmodels_id_4` (`plugin_fusioninventory_snmpmodels_id`,`plugin_fusioninventory_mappings_id`),
   KEY `oid_port_dyn` (`oid_port_dyn`),
   KEY `activation` (`activation`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_snmpmodels`;

CREATE TABLE `glpi_plugin_fusioninventory_snmpmodels` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
   `itemtype` VARCHAR( 100 ) COLLATE utf8_unicode_ci NOT NULL,
   `is_deleted` int(1) DEFAULT NULL,
   `entities_id` int(11) NOT NULL DEFAULT '0',
   `activation` int(1) NOT NULL DEFAULT '1',
   `discovery_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `comment` text COLLATE utf8_unicode_ci,
   PRIMARY KEY (`id`),
   KEY `name` (`name`),
   KEY `itemtype` (`itemtype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networkequipments`;

CREATE TABLE `glpi_plugin_fusioninventory_networkequipments` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `networkequipments_id` int(11) NOT NULL,
   `plugin_fusioninventory_snmpmodels_id` int(11) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_configsnmpsecurities_id` int(11) NOT NULL DEFAULT '0',
   `uptime` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
   `cpu` int(3) NOT NULL DEFAULT '0' COMMENT '%',
   `memory` int(11) NOT NULL DEFAULT '0',
   `last_fusioninventory_update` datetime DEFAULT NULL,
   `last_PID_update` int(11) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`),
   KEY `networkequipments_id` (`networkequipments_id`),
   KEY `plugin_fusioninventory_snmpmodels_id` (`plugin_fusioninventory_snmpmodels_id`,`plugin_fusioninventory_configsnmpsecurities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networkequipmentips`;

CREATE TABLE `glpi_plugin_fusioninventory_networkequipmentips` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `networkequipments_id` int(11) NOT NULL,
   `ip` varchar(255) NOT NULL,
   PRIMARY KEY (`id`),
   KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networkports`;

CREATE TABLE `glpi_plugin_fusioninventory_networkports` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `networkports_id` int(11) NOT NULL,
   `ifmtu` int(8) NOT NULL DEFAULT '0',
   `ifspeed` int(12) NOT NULL DEFAULT '0',
   `ifinternalstatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `ifconnectionstatus` int(8) NOT NULL DEFAULT '0',
   `iflastchange` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `ifinoctets` bigint(50) NOT NULL DEFAULT '0',
   `ifinerrors` bigint(50) NOT NULL DEFAULT '0',
   `ifoutoctets` bigint(50) NOT NULL DEFAULT '0',
   `ifouterrors` bigint(50) NOT NULL DEFAULT '0',
   `ifstatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `ifdescr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `portduplex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `trunk` int(1) NOT NULL DEFAULT '0',
   `lastup` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
   PRIMARY KEY (`id`),
   KEY `networkports_id` (`networkports_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_printerlogs`;

CREATE TABLE `glpi_plugin_fusioninventory_printerlogs` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `printers_id` int(11) NOT NULL DEFAULT '0',
   `date` datetime DEFAULT '0000-00-00 00:00:00',
   `pages_total` int(11) NOT NULL DEFAULT '0',
   `pages_n_b` int(11) NOT NULL DEFAULT '0',
   `pages_color` int(11) NOT NULL DEFAULT '0',
   `pages_recto_verso` int(11) NOT NULL DEFAULT '0',
   `scanned` int(11) NOT NULL DEFAULT '0',
   `pages_total_print` int(11) NOT NULL DEFAULT '0',
   `pages_n_b_print` int(11) NOT NULL DEFAULT '0',
   `pages_color_print` int(11) NOT NULL DEFAULT '0',
   `pages_total_copy` int(11) NOT NULL DEFAULT '0',
   `pages_n_b_copy` int(11) NOT NULL DEFAULT '0',
   `pages_color_copy` int(11) NOT NULL DEFAULT '0',
   `pages_total_fax` int(11) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_printers`;

CREATE TABLE `glpi_plugin_fusioninventory_printers` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `printers_id` int(11) NOT NULL,
   `plugin_fusioninventory_snmpmodels_id` int(11) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_configsnmpsecurities_id` int(11) NOT NULL DEFAULT '0',
   `frequence_days` int(5) NOT NULL DEFAULT '1',
   `last_fusioninventory_update` datetime DEFAULT NULL,
   PRIMARY KEY (`id`),
   UNIQUE KEY `unicity` (`printers_id`),
   KEY `plugin_fusioninventory_configsnmpsecurities_id` (`plugin_fusioninventory_configsnmpsecurities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_printercartridges`;

CREATE TABLE `glpi_plugin_fusioninventory_printercartridges` (
   `id` int(100) NOT NULL AUTO_INCREMENT,
   `printers_id` int(11) NOT NULL,
   `plugin_fusioninventory_mappings_id` int(11) NOT NULL DEFAULT '0',
   `cartridges_id` int(11) NOT NULL DEFAULT '0',
   `state` int(3) NOT NULL DEFAULT '100',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_tasks`;

CREATE TABLE `glpi_plugin_fusioninventory_tasks` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
   `date` DATETIME NOT NULL ,
   `plugin_fusioninventory_agents_id` INT( 11 ) NOT NULL,
   `plugin_fusioninventory_modules_id` INT( 11 ) NOT NULL,
   `param` varchar(255) NOT NULL,
   `items_id` INT( 11 ) NOT NULL ,
   `itemtype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
   `single` int(1) NOT NULL,
   PRIMARY KEY ( `id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8
COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_profiles`;

CREATE TABLE IF NOT EXISTS `glpi_plugin_fusioninventory_profiles` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `interface` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fusioninventory',
   `is_default` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmp_networking` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmp_printers` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmp_models` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmp_authentication` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `iprange` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `agents` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `remotecontrol` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `agentprocesses` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `unknowndevices` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `reports` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `deviceinventory` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `netdiscovery` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmp_query` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `wol` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   `configuration` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_ipranges`;

CREATE TABLE `glpi_plugin_fusioninventory_ipranges` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) DEFAULT NULL,
   `plugin_fusioninventory_agents_id_discover` int(11) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_agents_id_query` INT( 11 ) NOT NULL DEFAULT '0',
   `ip_start` varchar(255) DEFAULT NULL,
   `ip_end` varchar(255) DEFAULT NULL,
   `discover` int(1) NOT NULL DEFAULT '0',
   `query` int(1) NOT NULL DEFAULT '0',
   `entities_id` int(11) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_configsnmpsecurities`;

CREATE TABLE `glpi_plugin_fusioninventory_configsnmpsecurities` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
   `snmpversion` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
   `community` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `authentication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `auth_passphrase` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `encryption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `priv_passphrase` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   `is_deleted` int(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`),
   KEY `snmpversion` (`snmpversion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_networkportlogs`;

CREATE TABLE `glpi_plugin_fusioninventory_networkportlogs` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `plugin_fusioninventory_networkports_id` int(11) NOT NULL,
   `plugin_fusioninventory_mappings_id` int(11) NOT NULL DEFAULT '0',
   `date_mod` datetime DEFAULT NULL,
   `value_old` varchar(255) DEFAULT NULL,
   `value_new` varchar(255) DEFAULT NULL,
   `plugin_fusioninventory_agentprocesses_id` int(11) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`),
   KEY `plugin_fusioninventory_networkports_id` (`plugin_fusioninventory_networkports_id`,`date_mod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_unknowndevices`;

CREATE TABLE IF NOT EXISTS `glpi_plugin_fusioninventory_unknowndevices` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `dnsname` VARCHAR( 255 ) NULL DEFAULT NULL,
   `date_mod` datetime DEFAULT NULL,
   `entities_id` int(11) NOT NULL DEFAULT '0',
   `location` int(11) NOT NULL DEFAULT '0',
   `is_deleted` smallint(6) NOT NULL DEFAULT '0',
   `serial` VARCHAR( 255 ) NULL DEFAULT NULL,
   `otherserial` VARCHAR( 255 ) NULL DEFAULT NULL,
   `contact` VARCHAR( 255 ) NULL DEFAULT NULL,
   `domain` INT( 11 ) NOT NULL DEFAULT '0',
   `comment` TEXT NULL DEFAULT NULL,
   `type` INT( 11 ) NOT NULL DEFAULT '0',
   `snmp` INT( 1 ) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_snmpmodels_id` INT( 11 ) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_configsnmpsecurities_id` INT( 11 ) NOT NULL DEFAULT '0',
   `accepted` INT( 1 ) NOT NULL DEFAULT '0',
   `plugin_fusioninventory_agents_id` int(11) NOT NULL DEFAULT '0',
   `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `mac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `hub` int(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_modules`;

CREATE TABLE IF NOT EXISTS `glpi_plugin_fusioninventory_modules` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `locale` INT( 4 ) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `glpi_plugin_fusioninventory_mappings`;

CREATE TABLE IF NOT EXISTS `glpi_plugin_fusioninventory_mappings` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `itemtype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
   `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `table` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `tablefield` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
   `locale` INT( 4 ) NOT NULL,
   `shortlocale` INT( 4 ) DEFAULT NULL,
   PRIMARY KEY (`id`),
   KEY `name` (`name`),
   KEY `itemtype` (`itemtype`)
##   UNIQUE KEY `unicity` (`name`, `itemtype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


## INSERT
## glpi_plugin_fusioninventory_configsnmpsecurities
INSERT INTO `glpi_plugin_fusioninventory_configsnmpsecurities` 
      (`id`, `name`, `snmpversion`, `community`, `username`, `authentication`, `auth_passphrase`,
       `encryption`, `priv_passphrase`, `is_deleted`)
   VALUES (1, 'Communauté Public v1', '1', 'public', '', '0', '', '0', '', '0'),
          (2, 'Communauté Public v2c', '2', 'public', '', '0', '', '0', '', '0');


## glpi_displaypreferences
INSERT INTO `glpi_displaypreferences` (`id`, `itemtype`, `num`, `rank`, `users_id`) 
   VALUES (NULL, 'PluginFusioninventorySnmpModel', '3', '1', '0'),
          (NULL, 'PluginFusioninventorySnmpModel', '5', '2', '0');

INSERT INTO `glpi_displaypreferences` (`id`, `itemtype`, `num`, `rank`, `users_id`) 
   VALUES (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '3', '1', '0'),
          (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '4', '2', '0'),
          (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '5', '3', '0'),
          (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '7', '4', '0'),
          (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '8', '5', '0'),
          (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '9', '6', '0'),
          (NULL, 'PluginFusioninventoryConfigSnmpSecurity', '10', '7', '0'),

          (NULL, 'PluginFusioninventoryUnknownDevice', '2', '1', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '4', '2', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '3', '3', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '5', '4', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '7', '5', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '10', '6', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '11', '7', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '18', '8', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '14', '9', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '15', '10', '0'),
          (NULL, 'PluginFusioninventoryUnknownDevice', '9', '11', '0'),

##          (NULL,'PluginFusioninventoryNetworkPort', '2', '1', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '3', '2', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '4', '3', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '5', '4', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '6', '5', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '7', '6', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '8', '7', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '9', '8', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '10', '9', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '11', '10', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '14', '11', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '12', '12', '0'),
##          (NULL,'PluginFusioninventoryNetworkPort', '13', '13', '0'),

          (NULL,'PluginFusioninventoryAgent', '8', '1', '0'),
          (NULL,'PluginFusioninventoryAgent', '9', '2', '0'),
          (NULL,'PluginFusioninventoryAgent', '10', '3', '0'),
          (NULL,'PluginFusioninventoryAgent', '11', '4', '0'),
          (NULL,'PluginFusioninventoryAgent', '12', '5', '0'),
          (NULL,'PluginFusioninventoryAgent', '13', '6', '0'),
          (NULL,'PluginFusioninventoryAgent', '14', '7', '0'),
          (NULL,'PluginFusioninventoryIPRange', '2', '1', '0'),
          (NULL,'PluginFusioninventoryIPRange', '3', '2', '0'),
          (NULL,'PluginFusioninventoryIPRange', '5', '3', '0'),
          (NULL,'PluginFusioninventoryIPRange', '6', '4', '0'),
          (NULL,'PluginFusioninventoryIPRange', '9', '5', '0'),
          (NULL,'PluginFusioninventoryIPRange', '7', '6', '0'),
          (NULL,'PluginFusioninventoryIPRange', '8', '7', '0'),

          (NULL,'PluginFusioninventoryAgentProcess', '2', '1', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '3', '2', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '4', '3', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '5', '4', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '6', '5', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '7', '6', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '8', '7', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '9', '8', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '10', '9', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '11', '10', '0'),
          (NULL,'PluginFusioninventoryAgentProcess', '12', '11', '0'),

          (NULL,'PluginFusioninventoryNetworkPortLog', '2', '1', '0'),
          (NULL,'PluginFusioninventoryNetworkPortLog', '3', '2', '0'),
          (NULL,'PluginFusioninventoryNetworkPortLog', '4', '3', '0'),
          (NULL,'PluginFusioninventoryNetworkPortLog', '5', '4', '0'),
          (NULL,'PluginFusioninventoryNetworkPortLog', '6', '5', '0'),

          (NULL,'PluginFusioninventoryNetworkPort', '2', '1', '0'),
          (NULL,'PluginFusioninventoryNetworkPort', '3', '2', '0');


## glpi_plugin_fusioninventory_mappings
INSERT INTO `glpi_plugin_fusioninventory_mappings`
      (`id`, `itemtype`, `name`, `table`, `tablefield`, `locale`, `shortlocale`)
   VALUES (NULL,'NetworkEquipment','location','glpi_networkequipments','locations_id',1,NULL),
          (NULL,'NetworkEquipment','firmware','glpi_networkequipments',
             'networkequipmentfirmwares_id',2,NULL),
          (NULL,'NetworkEquipment','firmware1','','',2,NULL),
          (NULL,'NetworkEquipment','firmware2','','',2,NULL),
          (NULL,'NetworkEquipment','contact','glpi_networkequipments','contact',403,NULL),
          (NULL,'NetworkEquipment','comments','glpi_networkequipments','comment',404,NULL),
          (NULL,'NetworkEquipment','uptime','glpi_plugin_fusioninventory_networkequipments',
             'uptime',3,NULL),
          (NULL,'NetworkEquipment','cpu','glpi_plugin_fusioninventory_networkequipments',
             'cpu',12,NULL),
          (NULL,'NetworkEquipment','cpuuser','glpi_plugin_fusioninventory_networkequipments',
             'cpu',401,NULL),
          (NULL,'NetworkEquipment','cpusystem','glpi_plugin_fusioninventory_networkequipments',
             'cpu',402,NULL),
          (NULL,'NetworkEquipment','serial','glpi_networkequipments','serial',13,NULL),
          (NULL,'NetworkEquipment','otherserial','glpi_networkequipments','otherserial',419,NULL),
          (NULL,'NetworkEquipment','name','glpi_networkequipments','name',20,NULL),
          (NULL,'NetworkEquipment','ram','glpi_networkequipments','ram',21,NULL),
          (NULL,'NetworkEquipment','memory','glpi_plugin_fusioninventory_networkequipments',
             'memory',22,NULL),
          (NULL,'NetworkEquipment','vtpVlanName','','',19,NULL),
          (NULL,'NetworkEquipment','vmvlan','','',430,NULL),
          (NULL,'NetworkEquipment','entPhysicalModelName','glpi_networkequipments',
             'networkequipmentmodels_id',17,NULL),
          (NULL,'NetworkEquipment','macaddr','glpi_networkequipments','ip',417,NULL),
## Network CDP (Walk)
          (NULL,'NetworkEquipment','cdpCacheAddress','','',409,NULL),
          (NULL,'NetworkEquipment','cdpCacheDevicePort','','',410,NULL),
          (NULL,'NetworkEquipment','vlanTrunkPortDynamicStatus','','',411,NULL),
          (NULL,'NetworkEquipment','dot1dTpFdbAddress','','',412,NULL),
          (NULL,'NetworkEquipment','ipNetToMediaPhysAddress','','',413,NULL),
          (NULL,'NetworkEquipment','dot1dTpFdbPort','','',414,NULL),
          (NULL,'NetworkEquipment','dot1dBasePortIfIndex','','',415,NULL),
          (NULL,'NetworkEquipment','PortVlanIndex','','',422,NULL),
## NetworkPorts
          (NULL,'NetworkEquipment','ifIndex','','',408,NULL),
          (NULL,'NetworkEquipment','ifmtu','glpi_plugin_fusioninventory_networkports',
             'ifmtu',4,NULL),
          (NULL,'NetworkEquipment','ifspeed','glpi_plugin_fusioninventory_networkports',
             'ifspeed',5,NULL),
          (NULL,'NetworkEquipment','ifinternalstatus','glpi_plugin_fusioninventory_networkports',
             'ifinternalstatus',6,NULL),
          (NULL,'NetworkEquipment','iflastchange','glpi_plugin_fusioninventory_networkports',
             'iflastchange',7,NULL),
          (NULL,'NetworkEquipment','ifinoctets','glpi_plugin_fusioninventory_networkports',
             'ifinoctets',8,NULL),
          (NULL,'NetworkEquipment','ifoutoctets','glpi_plugin_fusioninventory_networkports',
             'ifoutoctets',9,NULL),
          (NULL,'NetworkEquipment','ifinerrors','glpi_plugin_fusioninventory_networkports',
             'ifinerrors',10,NULL),
          (NULL,'NetworkEquipment','ifouterrors','glpi_plugin_fusioninventory_networkports',
             'ifouterrors',11,NULL),
          (NULL,'NetworkEquipment','ifstatus','glpi_plugin_fusioninventory_networkports',
             'ifstatus',14,NULL),
          (NULL,'NetworkEquipment','ifPhysAddress','glpi_networkports','mac',15,NULL),
          (NULL,'NetworkEquipment','ifName','glpi_networkports','name',16,NULL),
          (NULL,'NetworkEquipment','ifName','glpi_networkports','name',16,NULL),
          (NULL,'NetworkEquipment','ifType','','',18,NULL),
          (NULL,'NetworkEquipment','ifdescr','glpi_plugin_fusioninventory_networkports',
             'ifdescr',23,NULL),
          (NULL,'NetworkEquipment','portDuplex','glpi_plugin_fusioninventory_networkports',
             'portduplex',33,NULL),
## Printers
          (NULL,'Printer','model','glpi_printers','printermodels_id',25,NULL),
          (NULL,'Printer','enterprise','glpi_printers','manufacturers_id',420,NULL),
          (NULL,'Printer','contact','glpi_printers','contact',405,NULL),
          (NULL,'Printer','comments','glpi_printers','comment',406,NULL),
          (NULL,'Printer','otherserial','glpi_printers','otherserial',418,NULL),
          (NULL,'Printer','memory','glpi_printers','memory_size',26,NULL),
          (NULL,'Printer','location','glpi_printers','locations_id',56,NULL),
          (NULL,'Printer','informations','','',165,165),
## Cartridges
          (NULL,'Printer','tonerblack','','',157,157),
          (NULL,'Printer','tonerblack2','','',166,166),
          (NULL,'Printer','tonercyan','','',158,158),
          (NULL,'Printer','tonermagenta','','',159,159),
          (NULL,'Printer','toneryellow','','',160,160),
          (NULL,'Printer','wastetoner','','',151,151),
          (NULL,'Printer','cartridgeblack','','',134,134),
          (NULL,'Printer','cartridgeblackphoto','','',135,135),
          (NULL,'Printer','cartridgecyan','','',136,136),
          (NULL,'Printer','cartridgecyanlight','','',139,139),
          (NULL,'Printer','cartridgemagenta','','',138,138),
          (NULL,'Printer','cartridgemagentalight','','',140,140),
          (NULL,'Printer','cartridgeyellow','','',137,137),
          (NULL,'Printer','maintenancekit','','',156,156),
          (NULL,'Printer','drumblack','','',161,161),
          (NULL,'Printer','drumcyan','','',162,162),
          (NULL,'Printer','drummagenta','','',163,163),
          (NULL,'Printer','drumyellow','','',164,164),
## Printers : Counter pages
          (NULL,'Printer','pagecountertotalpages','glpi_plugin_fusioninventory_printerlogs',
             'pages_total',28,128),
          (NULL,'Printer','pagecounterblackpages','glpi_plugin_fusioninventory_printerlogs',
             'pages_n_b',29,129),
          (NULL,'Printer','pagecountercolorpages','glpi_plugin_fusioninventory_printerlogs',
             'pages_color',30,130),
          (NULL,'Printer','pagecounterrectoversopages','glpi_plugin_fusioninventory_printerlogs',
             'pages_recto_verso',54,154),
          (NULL,'Printer','pagecounterscannedpages','glpi_plugin_fusioninventory_printerlogs',
             'scanned',55,155),
          (NULL,'Printer','pagecountertotalpages_print','glpi_plugin_fusioninventory_printerlogs',
             'pages_total_print',423,1423),
          (NULL,'Printer','pagecounterblackpages_print','glpi_plugin_fusioninventory_printerlogs',
             'pages_n_b_print',424,1424),
          (NULL,'Printer','pagecountercolorpages_print','glpi_plugin_fusioninventory_printerlogs',
             'pages_color_print',425,1425),
          (NULL,'Printer','pagecountertotalpages_copy','glpi_plugin_fusioninventory_printerlogs',
             'pages_total_copy',426,1426),
          (NULL,'Printer','pagecounterblackpages_copy','glpi_plugin_fusioninventory_printerlogs',
             'pages_n_b_copy',427,1427),
          (NULL,'Printer','pagecountercolorpages_copy','glpi_plugin_fusioninventory_printerlogs',
             'pages_color_copy',428,1428),
          (NULL,'Printer','pagecountertotalpages_fax','glpi_plugin_fusioninventory_printerlogs',
             'pages_total_fax',429,1429),
## Printers : NetworkPort
          (NULL,'Printer','ifPhysAddress','glpi_networkports','mac',58,NULL),
          (NULL,'Printer','ifName','glpi_networkports','name',57,NULL),
          (NULL,'Printer','ifaddr','glpi_networkports','ip',407,NULL),
          (NULL,'Printer','ifType','','',97,NULL),
          (NULL,'Printer','ifIndex','','',416,NULL),
## Computer
          (NULL,'Computer','serial','','serial',13,NULL),
          (NULL,'Computer','ifPhysAddress','','mac',15,NULL);
