<?php
/*
 * @version $Id$
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copynetwork (C) 2003-2006 by the INDEPNET Development Team.

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
// Original Author of file: Nicolas SMOLYNIEC
// Purpose of file:
// ----------------------------------------------------------------------

if (!defined('GLPI_ROOT'))
	die("Sorry. You can't access directly to this file");


class plugin_tracker_importexport extends CommonDBTM
{

	function plugin_tracker_export($ID_model)
	{
		global $DB;
		
		plugin_tracker_checkRight("snmp_models","r");
		
		$query = "SELECT * 
					
		FROM glpi_plugin_tracker_model_infos
		
		WHERE ID='".$ID_model."' ";

		if ( $result=$DB->query($query) )
		{
			if ( $DB->numrows($result) != 0 )
			{
				$model_name = $DB->result($result, 0, "name");
				$type = $DB->result($result, 0, "device_type");
			}
			else
				exit();
		}
		
		
		
		// Construction of XML file
		$xml = "<model>\n";
		$xml .= "	<name><![CDATA[".$model_name."]]></name>\n";
		$xml .= "	<type>".$type."</type>\n";
		$xml .= "	<oidlist>\n";

		$query = "SELECT * 
					
		FROM glpi_plugin_tracker_mib_networking AS model_t

		WHERE FK_model_infos='".$ID_model."' ";
		
		if ( $result=$DB->query($query) )
		{
			while ( $data=$DB->fetch_array($result) )
			{
				$xml .= "		<oidobject>\n";
				$xml .= "			<object><![CDATA[".getDropdownName("glpi_dropdown_plugin_tracker_mib_object",$data["FK_mib_object"])."]]></object>\n";		
				$xml .= "			<oid><![CDATA[".getDropdownName("glpi_dropdown_plugin_tracker_mib_oid",$data["FK_mib_oid"])."]]></oid>\n";		
				$xml .= "			<portcounter>".$data["oid_port_counter"]."</portcounter>\n";
				$xml .= "			<dynamicport>".$data["oid_port_dyn"]."</dynamicport>\n";
				$xml .= "			<mapping_type>".$data["mapping_type"]."</mapping_type>\n";
				$xml .= " 			<mapping_name><![CDATA[".$data["mapping_name"]."]]></mapping_name>\n";
				$xml .= "		</oidobject>\n";
			}
		
		}
		
		$xml .= "	</oidlist>\n";
		$xml .= "</model>\n";
		
		return $xml;
	}
	
	
	
	function showForm($target)
	{
		GLOBAL $DB,$CFG_GLPI,$LANG,$LANGTRACKER;
		
		plugin_tracker_checkRight("snmp_models","r");
		
		echo "<form action='".$target."?add=1' method='post' enctype='multipart/form-data'>";
		
		echo "<br>";
		echo "<table class='tab_cadre' cellpadding='1' width='600'><tr><th colspan='2'>";
		echo $LANGTRACKER["model_info"][10]." :</th></tr>";
		
		echo "	<tr class='tab_bg_1'>";
		echo "		<td align='center'>";
		echo "<a href='http://glpi-project.org/wiki/doku.php?id=wiki:".substr($_SESSION["glpilanguage"],0,2).":plugins:tracker:models' target='_blank'>".$LANGTRACKER["profile"][19]."&nbsp;</a>";
		echo "</td>";
		echo "		<td align='center'>";
		echo "			<input type='file' name='importfile' value=''/>";
		echo "			<input type='submit' value='".$LANG["buttons"][37]."'/>";
		echo "		</td>";
		echo "	</tr>";
		echo "</table>";
		
		echo "</form>";
		
	}



	function import($file)
	{
		global $DB,$LANG,$LANGTRACKER;

		plugin_tracker_checkRight("snmp_models","w");

		$xml = simplexml_load_file($_FILES['importfile']['tmp_name']);	

		// Verify same model exist
		$query = "SELECT ID ".
				 "FROM glpi_plugin_tracker_model_infos ".
				 "WHERE name='".$xml->name[0]."';";
		$result = $DB->query($query);
		
		if ($DB->numrows($result) > 0)
		{
			$_SESSION["MESSAGE_AFTER_REDIRECT"] = $LANGTRACKER["model_info"][8];
			return false;
		}
		else
		{

//			echo $xml->name[0]."<br/>";
			
			
			$query = "INSERT INTO glpi_plugin_tracker_model_infos
			(name,device_type)
			VALUES('".$xml->name[0]."','".$xml->type[0]."')";
			
			$DB->query($query);
			$FK_model = $DB->insert_id();
			
			$i = -1;
			foreach($xml->oidlist[0] as $num){
				$i++;
				$j = 0;
				foreach($xml->oidlist->oidobject[$i] as $item){
					$j++;
					switch ($j)
					{
						case 1:
							$FK_mib_object = externalImportDropdown("glpi_dropdown_plugin_tracker_mib_object",$item);
							break;
						case 2:
							$FK_mib_oid = externalImportDropdown("glpi_dropdown_plugin_tracker_mib_oid",$item);
							break;
						case 3:
							$oid_port_counter = $item;
							break;
						case 4:
							$oid_port_dyn = $item;
							break;
						case 5:
							$mapping_type = $item;
							break;
						case 6:
							$mapping_name = $item;
							break;
					}
				   //echo $item."<br/>";
				}

				$query = "INSERT INTO glpi_plugin_tracker_mib_networking
				(FK_model_infos,FK_mib_oid,FK_mib_object,oid_port_counter,oid_port_dyn,mapping_type,mapping_name)
				VALUES('".$FK_model."','".$FK_mib_oid."','".$FK_mib_object."','".$oid_port_counter."', '".$oid_port_dyn."',
				 '".$mapping_type."', '".$mapping_name."')";
				
				$DB->query($query);
		

			}
			$_SESSION["MESSAGE_AFTER_REDIRECT"] = $LANGTRACKER["model_info"][9]." : <a href='plugin_tracker.models.form.php?ID=".$FK_model."'>".$xml->name[0]."</a>";
		}
	}



	function import_agentfile($file)
	{
		global $DB,$LANG,$LANGTRACKER;

		$xml = simplexml_load_file($file);
		$count_discovery_devices = 0;
		foreach($xml->discovery as $discovery){
			$count_discovery_devices++;	
		}
		$device_queried_networking = 0;
		$device_queried_printer = 0;
		foreach($xml->device as $device){
			if ($device->infos->type == NETWORKING_TYPE)
				$device_queried_networking++;
			else if ($device->infos->type == PRINTER_TYPE)
				$device_queried_printer++;
		}
		foreach($xml->agent as $agent){
			$agent_version = $agent->version;
			$agent_id = $agent->id;
			$query = "UPDATE glpi_plugin_tracker_agents 
			SET last_agent_update='".$agent->end_date."', tracker_agent_version='".$agent_version."'
			WHERE ID='".$agent_id."'";
			$DB->query($query);
			
			$query = "UPDATE glpi_plugin_tracker_agents_processes 
			SET end_time='".$agent->end_date."', status='3', 
				start_time_discovery='".$agent->start_time_discovery."', end_time_discovery='".$agent->end_time_discovery."',
				discovery_queries_total='".$agent->discovery_queries_total."',
				discovery_queries='".$count_discovery_devices."',
				networking_queries='".$device_queried_networking."',
				printers_queries='".$device_queried_printer."'
			WHERE process_number='".$agent->pid."'
				AND FK_agent='".$agent->id."'";
			$DB->query($query);			
		}
		foreach($xml->discovery as $discovery){
			if ($discovery->modelSNMP != "")
			{
				$query = "SELECT * FROM glpi_plugin_tracker_model_infos
				WHERE discovery_key='".$discovery->modelSNMP."'
				LIMIT 0,1";
				$result = $DB->query($query);		
				$data = $DB->fetch_assoc($result);
				$FK_model = $data['ID'];
			}
			else
			{
				$FK_model = 0;
			}
			$query_sel = "SELECT * FROM glpi_plugin_tracker_discovery
			WHERE ifaddr='".$discovery->ip."'
				AND name='".$discovery->name."'
				AND descr='".$discovery->description."'
				AND serialnumber='".$discovery->serial."' ";
			$result_sel = $DB->query($query_sel);
			if ($DB->numrows($result_sel) == "0")
			{
				$query = "INSERT INTO glpi_plugin_tracker_discovery
				(date,ifaddr,name,descr,serialnumber,type,FK_agents,FK_entities,FK_model_infos,FK_snmp_connection)
				VALUES('".$discovery->date."','".$discovery->ip."','".$discovery->name."','".$discovery->description."','".$discovery->serial."', '".$discovery->type."', '".$agent_id."', '".$discovery->entity."','".$FK_model."','".$discovery->authSNMP."')";
				$DB->query($query);
			}			
		}
	}



}

?>