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

if (!defined('GLPI_ROOT')){
	die("Sorry. You can't access directly to this file");
}
// Modification by David
// Remplacement de plugin_tracker_snmp en plugin_tracker_snmp2
abstract class plugin_tracker_snmp2 {
	
	// fields of the result of a MySQL request
	var $fields;
	
	// type of the device
	var $type;
	// MySQL table of the device type
	var $table;
	// ID of the device
	var $ID;
	// ID of the device or the switch port into the table "glpi_networking_ports"
	var $networking_ports_ID;
	// IP of the device
	var $ip;
	// community for snmpget()
	var $community;
	
	// SNMP info of the device
	var $snmp;
	
	// Right variables for glpi and Tracker
	var $glpi_right;
	var $tracker_right;

	// Init
	function plugin_tracker_snmp() {
		$this->fields = array();
		$this->type = "";
		$this->table = "";
		$this->ID = -1;
		$this->networking_ports_ID = -1;
		$this->ip = "";
		$this->community = "public";
		$this->snmp = array("name" => "", "contact" => "", "location" => "", "netmask" => "");
		$this->glpi_right = "";
		$this->tracker_right = "";
	}
	
	// to check if the device is working
	function isActive() {
		global $DB;
		
		$config = new plugin_tracker_config();
		
		// state number for an active device
		if ( !($active_device_state = $config->getValue("active_device_state")) )
			return false;
			
		// compare device status and active device status
		$query = "SELECT state ".
				 "FROM $this->table ".
				 "WHERE ID='".$this->ID."';";
		if ( $result = $DB->query($query) ) {
			if ( $fields = $DB->fetch_row($result) ) {
				if ( ($fields['0']) == $active_device_state )
					return true;
			}
		}
		return false;
	}
	
	/* to check if we can get info from SNMP (for instance : device connected)...  Returns false if possible */
	abstract function cantGetInfo();
	
	/* Writes messages errors from canGetInfo() and returns false if no error */
	abstract function getError();
	
	abstract function getIPfromID();
	
	/* to get an object from a snmpget result, without prefix like "STRING: " for instance */
	function snmpgetObject($object_id) {
		$result[0] = @snmpget($this->ip, $this->community, $object_id);
		if ($result[0] != false ) {
			$pos = strpos($result[0], " ");
			$result[1] = substr($result[0], $pos+1);
			// if "" into the string
			$result[2] = str_replace('"', '', $result[1]);
			return $result[2];
		}
		else
			return false;
	}
	
	function getName() {
		if ( !($this->snmp['name'] = $this->snmpgetObject(MIB_NAME)) ) {
			$this->snmp['name'] = "";
			return false;
		}
		return $this->snmp['name'];
	}
	
	function getContact() {
		if ( !($this->snmp['contact'] = $this->snmpgetObject(MIB_CONTACT)) ) {
			$this->snmp['contact'] = "";
			return false;
		}
		return $this->snmp['contact'];
	}
	
	function getLocation() {
		if ( !($this->snmp['location'] = $this->snmpgetObject(MIB_LOCATION)) ) {
			$this->snmp['location'] = "";
			return false;
		}
		return $this->snmp['location'];
	}
	
	function getNetmask() {
		$mib_netmask = MIB_NETMASK_PREFIX.".".$this->ip;
		if ( !($this->snmp['netmask'] = $this->snmpgetObject($mib_netmask)) ) {
			$this->snmp['netmask'] = "";
			return false;
		}
		return $this->snmp['netmask'];
	}
	
	/* Groups all of the information */
	abstract function getAll();
	
	/* Contents for info */
	abstract function showFormContents();
	
	// To update checked info
	abstract function update($input);
	
	function showForm($target,$ID) {
		
		global $DB,$CFG_GLPI,$LANG, $LANGTRACKER;	
		
		$history = new plugin_tracker_SNMP_history;
		
		if ( !plugin_tracker_haveRight("snmp_networking","r") )
			return false;
		if ( plugin_tracker_haveRight("snmp_networking","w") )
			$canedit = true;
		else
			$canedit = false;
		
		$this->ID = $ID;
		
		$nw=new Netwire;
		$processes = new Threads;
		$CommonItem = new CommonItem;
		
		$query = "SELECT * FROM glpi_plugin_tracker_networking
		WHERE FK_networking=".$ID." ";

		$result = $DB->query($query);		
		$data = $DB->fetch_assoc($result);
		
		// Add in database if not exist
		if ($DB->numrows($result) == "0")
		{
			$query_add = "INSERT INTO glpi_plugin_tracker_networking
			(FK_networking) VALUES('".$ID."') ";
			
			$DB->query($query_add);
		}
		
		// Form networking informations
		echo "<br>";
		echo "<div align='center'><form method='post' name='snmp_form' id='snmp_form'  action=\"".$target."\">";

		echo "<table class='tab_cadre' cellpadding='5' width='800'>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<th colspan='3'>";
		echo $LANGTRACKER["snmp"][11];
		echo "</th>";
		echo "</tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>".$LANGTRACKER["model_info"][4]."</td>";
		echo "<td align='center'>";
		dropdownValue("glpi_plugin_tracker_model_infos","model_infos",$data["FK_model_infos"],0);
		echo "</td>";
		echo "</tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>".$LANGTRACKER["functionalities"][43]."</td>";
		echo "<td align='center'>";
		plugin_tracker_snmp_auth_dropdown($data["FK_snmp_connection"]);
		echo "</td>";
		echo "</tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>".$LANGTRACKER["snmp"][13]."</td>";
		echo "<td align='center'>";
		plugin_tracker_Bar($data["cpu"]);
		echo "</td>";
		echo "</tr>";	

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>".$LANGTRACKER["snmp"][14]."</td>";
		echo "<td align='center'>";
		$query2 = "
		SELECT * 
		FROM glpi_networking
		WHERE ID=".$ID." ";
		$result2 = $DB->query($query2);		
		$data2 = $DB->fetch_assoc($result2);

		if (empty($data2["ram"])){
			$ram_pourcentage = 0;
		}else {
			$ram_pourcentage = ceil((100 * ($data2["ram"] - $data["memory"])) / $data2["ram"]);
		}
		plugin_tracker_Bar($ram_pourcentage," (".($data2["ram"] - $data["memory"])." Mo / ".$data2["ram"]." Mo)"); 
		echo "</td>";
		echo "</tr>";	

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>".$LANGTRACKER["snmp"][12]."</td>";
		echo "<td align='center'>";
		//echo "<input  type='text' name='uptime' value='".$data["uptime"]."' size='20'>";
		$sysUpTime = $data["uptime"];
		if (ereg("days",$sysUpTime))
		{
				sscanf($sysUpTime, "(%d) %d days, %d:%d:%d.%d",$uptime,$day,$hour,$minute,$sec,$ticks);
		}
		else if($sysUpTime == "0")
		{
			$day = 0;
			$hour = 0;
			$minute = 0;
			$sec = 0;
		}
		else
		{
			sscanf($sysUpTime, "(%d) %d:%d:%d.%d",$uptime,$hour,$minute,$sec,$ticks);
			$day = 0;
		}

//		$uptime = ceil($uptime / 100);
//		$day=86400;
//		$days=floor($uptime/$day);
		echo "<b>$day</b> ".$LANG["stats"][31]." ";
//		$utdelta=$uptime-($days*$day);
//		$hour=3600;
//		$hours=floor($utdelta/$hour);
		echo "<b>$hour</b> ".$LANG["job"][21]." ";
//		$utdelta-=$hours*$hour;
//		$minute=60;
//		$minutes=floor($utdelta/$minute);
		echo "<b>$minute</b> ".$LANG["job"][22]." ";
//		$utdelta-=round($minutes*$minute,2);
		echo " ".strtolower($LANG["rulesengine"][42])." <b>$sec</b> ".$LANG["stats"][34]." ";      
     
		echo "</td>";
		echo "</tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td colspan='2'>";
		echo "<div align='center'>";
		echo "<input type='hidden' name='ID' value='".$ID."'>";
		echo "<input type='submit' name='update' value=\"".$LANG["buttons"][7]."\" class='submit' >";
		echo "</td>";
		echo "</tr>";

		echo "</table></form>";
		
		
// **************************************************************************************************** //
// ***************************************** METTRE TABLEAU DES PORTS ********************************* //
// **************************************************************************************************** //	
		function ByteSize($bytes,$sizeoct=1024){
			$size = $bytes / $sizeoct;
			if($size < $sizeoct){
				$size = number_format($size, 0);
				$size .= ' K';
			}else {
				if($size / $sizeoct < $sizeoct) {
					$size = number_format($size / $sizeoct, 0);
					$size .= ' M';
				} else if($size / $sizeoct / $sizeoct < $sizeoct) {
					$size = number_format($size / $sizeoct / $sizeoct, 0);
					$size .= ' G';
				} else if($size / $sizeoct / $sizeoct / $sizeoct < $sizeoct) {
					$size = number_format($size / $sizeoct / $sizeoct / $sizeoct, 0);
					$size .= ' T';
				}
			}
			return $size;
		}
		
		
		$query = "
		SELECT *,glpi_plugin_tracker_networking_ports.ifmac as ifmacinternal
		
		FROM glpi_plugin_tracker_networking_ports

		LEFT JOIN glpi_networking_ports
		ON glpi_plugin_tracker_networking_ports.FK_networking_ports = glpi_networking_ports.ID 
		WHERE glpi_networking_ports.on_device='".$ID."'
		ORDER BY logical_number ";

		echo "<script  type='text/javascript'>
function close_array(id){
	document.getElementById('plusmoins'+id).innerHTML = '<img src=\'".GLPI_ROOT."/pics/collapse.gif\' onClick=\'Effect.Fade(\"viewfollowup'+id+'\");appear_array('+id+');\' />';
} 
function appear_array(id){
	document.getElementById('plusmoins'+id).innerHTML = '<img src=\'".GLPI_ROOT."/pics/expand.gif\' onClick=\'Effect.Appear(\"viewfollowup'+id+'\");close_array('+id+');\' />';
}		
		
		</script>";

		echo "<br>";
		echo "<div align='center'><!--<form method='post' name='snmp_form' id='snmp_form'  action=\"".$target."\">-->";
		echo "<table class='tab_cadre' cellpadding='5' width='1100'>";

		echo "<tr class='tab_bg_1'>";
		$query_array = "SELECT * FROM glpi_display
		WHERE type='5157'
			AND FK_users='0'
		ORDER BY rank";
		$result_array=$DB->query($query_array);
		echo "<th colspan='".(mysql_num_rows($result_array) + 2)."'>";
		echo "Tableau des ports";
		echo "</th>";
		echo "</tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo '<th><img alt="Sélectionnez les éléments à afficher par défaut" title="Sélectionnez les éléments à afficher par défaut" src="'.GLPI_ROOT.'/pics/options_search.png" class="pointer" onclick="var w = window.open(\''.GLPI_ROOT.'/front/popup.php?popup=search_config&type=5157\' ,\'glpipopup\', \'height=400, width=1000, top=100, left=100, scrollbars=yes\' ); w.focus();"></th>';
		echo "<th>".$LANG["common"][16]."</th>";
/*		echo "<th>".$LANGTRACKER["snmp"][42]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][43]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][44]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][45]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][46]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][47]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][48]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][49]."</th>";
		echo "<th>".$LANGTRACKER["mapping"][115]."</th>";
		echo "<th>".$LANG["networking"][17]."</th>";
		echo "<th>".$LANGTRACKER["snmp"][50]."</th>";
		*/
		$query_array = "SELECT * FROM glpi_display
		WHERE type='5157'
			AND FK_users='0'
		ORDER BY rank";
		$result_array=$DB->query($query_array);
		while ( $data_array=$DB->fetch_array($result_array) )
		{
			echo "<th>";
			switch ($data_array['num']) {
				case 2 :
					echo $LANGTRACKER["snmp"][42];
					break;
				case 3 :
					echo $LANGTRACKER["snmp"][43];
					break;
				case 4 :
					echo $LANGTRACKER["snmp"][44];
					break;
				case 5 :
					echo $LANGTRACKER["snmp"][45];
					break;
				case 6 :
					echo $LANGTRACKER["snmp"][46];
					break;
				case 7 :
					echo $LANGTRACKER["snmp"][47];
					break;
				case 8 : 
					echo $LANGTRACKER["snmp"][48];
					break;
				case 9 : 
					echo $LANGTRACKER["snmp"][49];
					break;
				case 10 : 
					echo $LANGTRACKER["snmp"][51];
					break;
				case 11 : 
					echo $LANGTRACKER["mapping"][115];
					break;
				case 12 :
					echo $LANG["networking"][17];
					break;
				case 13 :
					echo $LANGTRACKER["snmp"][50];
					break;
			}
			echo "</th>";
		}			
		echo "</tr>";
		// Fin de l'entête du tableau
		
		
		if ( $result=$DB->query($query) )
		{
			while ( $data=$DB->fetch_array($result) )
			{
				$background_img = "";
				if (($data["trunk"] == "1") AND (ereg("up",$data["ifstatus"]) OR ereg("1",$data["ifstatus"])))
				{
					$background_img = " style='background-image: url(\"".GLPI_ROOT."/plugins/tracker/pics/port_trunk.png\"); '";
				}
				else if (ereg("up",$data["ifstatus"]) OR ereg("1",$data["ifstatus"]))
				{
					$background_img = " style='background-image: url(\"".GLPI_ROOT."/plugins/tracker/pics/connected_trunk.png\"); '";
				}
				echo "<tr class='tab_bg_1' height='40'".$background_img.">";
				echo "<td align='center' id='plusmoins".$data["ID"]."'><img src='".GLPI_ROOT."/pics/expand.gif' onClick='Effect.Appear(\"viewfollowup".$data["ID"]."\");close_array(".$data["ID"].");' /></td>";
				echo "<td align='center'><a href='networking.port.php?ID=".$data["ID"]."'>".$data["name"]."</a></td>";
				
				$query_array = "SELECT * FROM glpi_display
				WHERE type='5157'
					AND FK_users='0'
				ORDER BY rank";
				$result_array=$DB->query($query_array);
				while ( $data_array=$DB->fetch_array($result_array) )
				{
					switch ($data_array['num']) {
						case 2 :
							echo "<td align='center'>".$data["ifmtu"]."</td>";
							break;
						case 3 :
							echo "<td align='center'>".ByteSize($data["ifspeed"],1000)."bps</td>";
							break;
						case 4 :
							echo "<td align='center'>";			
							if (ereg("up",$data["ifstatus"]) OR ereg("1",$data["ifinternalstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/pics/greenbutton.png'/>";
							}
							else if (ereg("down",$data["ifstatus"]) OR ereg("2",$data["ifinternalstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/pics/redbutton.png'/>";
							}
							else if (ereg("testing",$data["ifstatus"]) OR ereg("3",$data["ifinternalstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/plugins/tracker/pics/yellowbutton.png'/>";
							}
			
							echo "</td>";
							break;
						case 5 :
							echo "<td align='center'>".$data["iflastchange"]."</td>";
							break;
						case 6 :
							echo "<td align='center'>";
							if ($data["ifinoctets"] == "0")
							{
								echo "-";
							}
							else
							{
								echo ByteSize($data["ifinoctets"],1000)."o";
							}
							echo "</td>";
							break;
						case 7 :
							if ($data["ifinerrors"] == "0")
							{
								echo "<td align='center'>-";
							}
							else
							{		
								echo "<td align='center' class='tab_bg_1_2'>";
								echo $data["ifinerrors"];
							}
							echo "</td>";
							break;
						case 8 : 
							echo "<td align='center'>";
							if ($data["ifinoctets"] == "0")
							{
								echo "-";
							}
							else
							{		
								echo ByteSize($data["ifoutoctets"],1000)."o";
							}
							echo "</td>";
							break;
						case 9 : 
							if ($data["ifouterrors"] == "0")
							{
								echo "<td align='center'>-";
							}
							else
							{	
								echo "<td align='center' class='tab_bg_1_2'>";
								echo $data["ifouterrors"];
							}
							echo "</td>";
							break;
						case 10 : 
							echo "<td align='center'>".$data["portduplex"]."</td>";
							break;
						case 11 : 
							// ** internal mac
							echo "<td align='center'>".$data["ifmac"]."</td>";
							break;
						case 12 :
							// ** Mac address and link to device which are connected to this port
							$opposite_port = $nw->getOppositeContact($data["FK_networking_ports"]);
							if ($opposite_port != ""){
								$query_device = "
								SELECT * 
								FROM glpi_networking_ports
								WHERE ID=".$opposite_port." ";
				
								$result_device = $DB->query($query_device);		
								$data_device = $DB->fetch_assoc($result_device);				
								
								$CommonItem->getFromDB($data_device["device_type"],$data_device["on_device"]);
								$link1 = $CommonItem->getLink(1);
								$link = str_replace($CommonItem->getName(0), $data_device["ifmac"],$CommonItem->getLink());
								echo "<td align='center'>".$link1."<br/>".$link."</td>";
							}
							else
							{
								// Search in unknown mac address table
								$PID = $processes->lastProcess(NETWORKING_TYPE);
								$unknownMac = $processes->getUnknownMacFromPIDandPort($PID,$data["FK_networking_ports"]);
								if (empty($unknownMac))
								{
									echo "<td align='center'></td>";
								}
								else
								{
									echo "<td align='center' class='tab_bg_1_2'>".$unknownMac."</td>";
								}
							}
							break;
						case 13 :
							// ** Connection status
							echo "<td align='center'>";
							if (ereg("up",$data["ifstatus"]) OR ereg("1",$data["ifstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/pics/greenbutton.png'/>";
							}
							else if (ereg("down",$data["ifstatus"]) OR ereg("2",$data["ifstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/pics/redbutton.png'/>";
							}
							else if (ereg("testing",$data["ifstatus"]) OR ereg("3",$data["ifstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/plugins/tracker/pics/yellowbutton.png'/>";
							}
							else if (ereg("dormant",$data["ifstatus"]) OR ereg("5",$data["ifstatus"]))
							{
								echo "<img src='".GLPI_ROOT."/plugins/tracker/pics/orangebutton.png'/>";
							}
							
							echo "</td>";
							echo "</th>";
							break;
					}
				}

				echo "</tr>";
				
				
				// Historique
				
				echo "
				<tr style='display: none;' id='viewfollowup".$data["ID"]."'>
					<td colspan='12'>".tracker_snmp_showHistory($data["ID"])."</td>
				</tr>
				";
			}
		}
		echo "</table>";
	}
	
	

	/* Useful to get the ID of a device into the table "glpi_networking_ports */
	function getNetworkingPortsIDfromID() {
		global $DB;
		$query = "SELECT ID FROM glpi_networking_ports ".
				 "WHERE on_device='".$this->ID."' ".
				 "AND device_type='".$this->type."';";
		if ( $result=$DB->query($query) ) {
			$this->fields = $DB->fetch_row($result);
			// check if IP is in db
			if ( ($this->fields['0']) != NULL ) {
				$this->networking_ports_ID = $this->fields['0'];
				return $this->networking_ports_ID;
			}
			else
				return false;
		}
	}
	
	function getIDfromNetworkingPortsID() {
		global $DB;
		$query = "SELECT on_device FROM glpi_networking_ports ".
				 "WHERE ID='".$this->networking_ports_ID."' ".
				 "AND device_type='".$this->type."';";
		if ( $result=$DB->query($query) ) {
			$this->fields = $DB->fetch_row($result);
			// check if IP is in db
			if ( ($this->fields['0']) != NULL ) {
				$this->ID = $this->fields['0'];
				return $this->ID;
			}
			else
				return false;
		}
	}
}

class plugin_tracker_printer_snmp extends plugin_tracker_snmp {

	//var $cablage = array("switch", "etat", "port");
	
	function plugin_tracker_printer_snmp() {
		$this->plugin_tracker_snmp();
		$this->type = PRINTER_TYPE;
		$this->table ="glpi_printers";
		$this->snmp = array_merge( $this->snmp, array("model" => "", "serial" => "", "counter" => "", "ifmac" => "") );
		$this->glpi_right = "printer";
		$this->tracker_right = "printers_info";
	}
	
	function cantGetInfo() {
		if ($this->isActive()) {
			if ($this->getIPfromID())
				return false;
			else
				return 33;
		}
		else
			return 32;
	}
	
	function getError() {
		global $LANGTRACKER;
		
		if ( !($error = $this->cantGetInfo()) )
			return false; // no error
		else {
			switch($error) {
				case 32:
					echo "".$LANGTRACKER["snmp"][32]."";
					break;
				case 33:
					echo "".$LANGTRACKER["snmp"][33]."";
					break;	
			}
		return true;
		}
	}
	
	function getIPfromID() {
		global $DB;
		$query = "SELECT ifaddr FROM glpi_networking_ports ".
				 "WHERE on_device='".$this->ID."' ".
				 "AND device_type='".$this->type."';";
		if ( $result=$DB->query($query) ) {
			$this->fields = $DB->fetch_row($result);
			// check if IP is in db
			if ( ($this->fields['0']) != NULL ) {
				$this->ip = $this->fields['0'];
				return $this->ip;
			}
			else
				return false;
		}
	}
	
	function getModel() {
		if ( !($this->snmp['model'] = $this->snmpgetObject(MIB_PRINTER_MODEL)) ) {
			$this->snmp['model'] = "";
			return false;
		}
		return $this->snmp['model'];
	}
	
	function getSerial() {
		if ( !($this->snmp['serial'] = $this->snmpgetObject(MIB_PRINTER_SERIAL)) ) {
			$this->snmp['serial'] = "";
			return false;
		}
		return $this->snmp['serial'];
	}
	
	function getCounter() {
		if ( !($this->snmp['counter'] = $this->snmpgetObject(MIB_PRINTER_COUNTER)) ) {
			$this->snmp['counter'] = "";
			return false;
		}
		return $this->snmp['counter'];
	}
	
	function getIfmac() {
		$ifmac1 = $this->snmpgetObject(MIB_PRINTER_IFMAC_1);
		$ifmac2 = $this->snmpgetObject(MIB_PRINTER_IFMAC_2);
		if ( !$ifmac1 && !$ifmac2 ) {		
			$this->snmp['ifmac'] = "";
			return false;
		}

		if ( ($ifmac = plugin_tracker_stringToIfmac($ifmac1)) || ($ifmac = plugin_tracker_stringToIfmac($ifmac2)) )
			$this->snmp['ifmac'] = $ifmac;
		else
			$this->snmp['ifmac'] = "";
		return $this->snmp['ifmac'];
	}
		
	function getAll() {
		
		$error = new plugin_tracker_errors();
		
		if ( !($this->getName()) ) {
			$date = date("Y-m-d H:i:s");
			$input['ifaddr'] = $this->ip;
			$input['device_id'] = $this->ID;
			$error->writeError($this->type, 'snmp', $input, $date);
			return false;
		}
		$this->getContact();
		$this->getLocation();
		$this->getNetmask();
		$this->getModel();
		$this->getSerial();
		$this->getCounter();
		$this->getIfmac();
	}
	
	/* Will get all snmp info of printers whose functionnality is set to 1 */
	function cron($date) {
		
		$config = new glpi_plugin_tracker_printers_history_config();
		$history = new plugin_tracker_printers_history();
		$error = new plugin_tracker_errors();
		
		if ( !($printers = $config->getAllActivated()) )
			return false;
			
		for ($i=0; $i<$printers['number']; $i++) {
			$this->ID = $printers["$i"]['FK_printers'];
			if ( !($this->cantGetInfo()) ) {
				// if can't get counter => write error in DB
				if ( !($this->getCounter()) ) {
					$date = date("Y-m-d H:i:s");
					$input['ifaddr'] = $this->ip;
					$input['device_id'] = $this->ID;
					$error->writeError($this->type, 'snmp', $input, $date);
				}
				else {
					$this->updateCounter();
					
					// Set history
					$input['FK_printers'] = $this->ID;
					$input['date'] = $date;
					$input['pages'] = $this->snmp['counter'];
					$history->add($input);
				}
			}
		}
		return false;
	}
	
	function showFormContents() {
		
		global $LANG, $LANGTRACKER;
		
		echo "<tr class='tab_bg_1'><th colspan='3'>";
		echo $LANGTRACKER["snmp"][1]." :</th></tr>";
			
		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cname' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["common"][16]."</td>";
		echo "<td><input  type='text' name='name' value='".$this->snmp['name']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'>";
 		echo "<td>x</td>";
		echo "<td>".$LANG["common"][22]."</td>";
		echo "<td><input  type='text' name='model' value='".$this->snmp['model']."' size='20'>";
		echo " <img src='/glpi/pics/aide.png' alt=\"\" onmouseout=\"setdisplay(getElementById('model'),'none')\" onmouseover=\"setdisplay(getElementById('model'),'block')\"><span class='over_link' id='model'>".$this->snmp['model']."</span>";
		echo "</td></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cserial' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["common"][19]."</td>";
		echo "<td><input  type='text' name='serial' value='".$this->snmp['serial']."' size='20'></td></tr>";
				
		echo "<tr class='tab_bg_1'>";
		echo "<td>x</td>";
		echo "<td>".$LANG["device_iface"][2]."</td>";
		echo "<td><input  type='text' name='ifmac' value='".$this->snmp['ifmac']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td>x</td>";
		echo "<td>".$LANG["networking"][60]."</td>";
		echo "<td><input  type='text' name='netmask' value='".$this->snmp['netmask']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td>x</td>";
		echo "<td>".$LANG["common"][15]."</td>";
		echo "<td><input  type='text' name='location' value='".$this->snmp['location']."' size='20'></td></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='ccontact' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["common"][18]."</td>";
		echo "<td><input  type='text' name='contact' value='".$this->snmp['contact']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cinitial_pages' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["printers"][30]."</td>";
		echo "<td><input  type='text' name='initial_pages' value='".$this->snmp['counter']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'><th colspan='3'>";
		echo $LANGTRACKER["snmp"][2]." :</th></tr>";
		
	}
	
	/* useful for counters cron, works for one printer only */
	function updateCounter() {
		$print = new Printer();
		if ( $this->snmp['counter'] != "" ) {
			$input['ID'] = $this->ID;
			$input['initial_pages'] = $this->snmp['counter'];
			$print->update($input);
		}
	}
	
	function update($input) {
				
		// update in table : glpi_printers
		$print = new Printer();

		if ( !isset($input['ID']) )
			return false;
		$general['ID']=$input['ID'];
		if ( isset($input['name']) )
			$general['name']=$input['name'];
		if ( isset($input['serial']) )
			$general['serial']=$input['serial'];
		if ( isset($input['contact']) )
			$general['contact']=$input['contact'];
		if ( isset($input['initial_pages']) )
			$general['initial_pages']=$input['initial_pages'];
		
		$print->update($general);
		
		// update in table : glpi_networking_ports
		
	}
}


class plugin_tracker_switch_snmp extends plugin_tracker_snmp2 {
	
	// Number of switch ports
	var $num_ports = 0;

	function plugin_tracker_switch_snmp() {
		$this->plugin_tracker_snmp();
		$this->type = NETWORKING_TYPE;
		$this->table ="glpi_networking";
		$this->snmp = array_merge( $this->snmp, array("model" => "", "serial" => "", "firmware" => "", "ifmac" => "", "ciscoRam" => "") );
		$this->glpi_right = "networking";
		$this->tracker_right = "networking_info";	
		$this->num_ports = 0;
	}

	
	// to check if the networking device is a switch (not a hub, router,...)
	function isSwitch() {
		global $DB;
		
		$config = new plugin_tracker_config();
		
		// type number for a switch
		if ( !($networking_switch_type = $config->getValue("networking_switch_type")) )
			return false;
			
		// compare device type number and switch type number
		$query = "SELECT type ".
				 "FROM $this->table ".
				 "WHERE ID='".$this->ID."';";
		if ( $result = $DB->query($query) ) {
			if ( $fields = $DB->fetch_row($result) ) {
				if ( ($fields['0']) == $networking_switch_type )
					return true;
			}
		}
		return false;
	}
	
	function cantGetInfo() {
		if ( ($this->isSwitch()) ) {
			if ($this->isActive()) {
				if ($this->getIPfromID())
					return false;
				else
					return 33;
			}
			else
				return 32;
		}
		else
			return 31;
	}
	
	function getError() {
		global $LANGTRACKER;
		
		if ( !($error = $this->cantGetInfo()) )
			return false; // no error
		else {
			switch($error) {
				case 31:
					echo "".$LANGTRACKER["snmp"][31]."";
					break;
				case 32:
					echo "".$LANGTRACKER["snmp"][32]."";
					break;
				case 33:
					echo "".$LANGTRACKER["snmp"][33]."";
					break;	
			}
		return true;
		}
	}
	
	// to check if the device is from Cisco (useful for RAM displaying)
	function isCisco() {
		global $DB;
		$query = "SELECT glpi_dropdown_manufacturer.name ".
				 "FROM glpi_dropdown_manufacturer ".
				 "LEFT JOIN glpi_networking ".
				 "ON glpi_dropdown_manufacturer.ID = glpi_networking.FK_glpi_enterprise ".
				 "WHERE glpi_networking.ID='".$this->ID."';";
		if ( $result=$DB->query($query) ) {
			$fields = $DB->fetch_row($result);
			if ( ($fields['0']) != NULL ) {
				$manufacturer = strtolower($fields['0']); // lowercase
				// to check if the string contains "cisco"
				if ( strstr($manufacturer, 'cisco') )
					return true;
			}
			return false;
		}
	}
	
	function getIPfromID() {
		global $DB;
		$query = "SELECT ifaddr FROM glpi_networking WHERE ID='".$this->ID."';";
		if ( $result=$DB->query($query) ) {
			$this->fields = $DB->fetch_row($result);
			// check if IP is in db
			if ( ($this->fields['0']) != NULL ) {
				$this->ip = $this->fields['0'];
				return $this->ip;
			}
			else
				return false;
		}
	}
	
	function getNumberOfPorts() {
		global $DB;
		$query = "";
		if ( $result=$DB->query($query) ) {
			
		}
	}
	
	function getModel() {
		if ( !($this->snmp['model'] = $this->snmpgetObject(MIB_SWITCH_MODEL)) ) {
			$this->snmp['model'] = "";
			return false;
		}
		return $this->snmp['model'];
	}
	
	function getSerial() {
		if ( !($this->snmp['serial'] = $this->snmpgetObject(MIB_SWITCH_SERIAL)) ) {
			$this->snmp['serial'] = "";
			return false;
		}
		return $this->snmp['serial'];
	}
	
	function getFirmware() {
		if ( !($this->snmp['firmware'] = $this->snmpgetObject(MIB_SWITCH_FIRMWARE)) ) {
			$this->snmp['firmware'] = "";
			return false;
		}
		return $this->snmp['firmware'];
	}
	
	function getIfmac() {
		if ( !($ifmac = $this->snmpgetObject(MIB_SWITCH_IFMAC)) ) {
			$this->snmp['ifmac'] = "";
			return false;
		}
		$ifmac = plugin_tracker_stringToIfmac($ifmac);
		if ( $ifmac )
			$this->snmp['ifmac'] = $ifmac;
		else
			$this->snmp['ifmac'] = "";
		return $this->snmp['ifmac'];
	}
	
	function getCiscoRam() {
		if ( !($bytes = $this->snmpgetObject(MIB_CISCO_SWITCH_RAM)) ) {
			$this->snmp['ciscoRam'] = "";
			return false;
		}
		// convert bytes to kbytes
		$this->snmp['ciscoRam'] = number_format($bytes/1048576, 0, '.', '');
		return $this->snmp['ciscoRam'];
	}
	
	function getPortDescr() {
		return $portDescr;
	}
	
	function getAll() {
		
		$error = new plugin_tracker_errors();
		
		if ( !($this->getName()) ) {
			$date = date("Y-m-d H:i:s");
			$input['ifaddr'] = $this->ip;
			$input['device_id'] = $this->ID;
			$error->writeError($this->type, 'snmp', $input, $date);
			return false;
		}
		$this->getContact();
		$this->getLocation();
		$this->getModel();
		$this->getSerial();
		$this->getFirmware();
		$this->getIfmac();
		$this->getCiscoRam();
	}
	
	function showFormContents() {
		
		global $LANG, $LANGTRACKER;
			
		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cname' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["common"][16]."</td>";
		echo "<td><input  type='text' name='name' value='".$this->snmp['name']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'>";
		echo "<td>x</td>";

		echo "<td>".$LANG["common"][22]."</td>";
		echo "<td><input  type='text' name='model' value='".$this->snmp['model']."' size='20'>";
		echo " <img src='/glpi/pics/aide.png' alt=\"\" onmouseout=\"setdisplay(getElementById('model'),'none')\" onmouseover=\"setdisplay(getElementById('model'),'block')\"><span class='over_link' id='model'>".$this->snmp['model']."</span>";
		echo "</td></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cserial' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["common"][19]."</td>";
		echo "<td><input  type='text' name='serial' value='".$this->snmp['serial']."' size='20'>";
		
		echo "<tr class='tab_bg_1'>";
 		echo "<td>x</td>";

		echo "<td>".$LANG["networking"][49]."</td>";
		echo "<td><input  type='text' name='firmware' value='".$this->snmp['firmware']."' size='20'>";
		echo " <img src='/glpi/pics/aide.png' alt=\"\" onmouseout=\"setdisplay(getElementById('firmware'),'none')\" onmouseover=\"setdisplay(getElementById('firmware'),'block')\"><span class='over_link' id='firmware'>".$this->snmp['firmware']."</span>";
		echo "</td></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cifmac' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["device_iface"][2]."</td>";
		echo "<td><input  type='text' name='ifmac' value='".$this->snmp['ifmac']."' size='20'></td></tr>";
		
		echo "<tr class='tab_bg_1'>";
 		echo "<td>x</td>";

		echo "<td>".$LANG["common"][15]."</td>";
		echo "<td><input  type='text' name='location' value='".$this->snmp['location']."' size='20'></td></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='ccontact' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["common"][18]."</td>";
		echo "<td><input  type='text' name='contact' value='".$this->snmp['contact']."' size='20'></td></tr>";
		
		// to display RAM quantity of a Cisco Switch
		if ( $this->isCisco() ) {
		echo "<tr class='tab_bg_1'>";
		echo "<td align='center'>";
		echo "<input type='checkbox' name='cram' value='1'>";
		echo "</td>";
		echo "<td>".$LANG["networking"][5]."</td>";
		echo "<td><input  type='text' name='ram' value='".$this->snmp['ciscoRam']."' size='20'></td></tr>";
		}
		
	}
	
	function update($input) {
		
		// update in table : glpi_networking
		$netdevice=new Netdevice();

		if ( !isset($input['ID']) )
			return false;
		$general['ID']=$input['ID'];
		if ( isset($input['name']) )
			$general['name']=$input['name'];
		if ( isset($input['serial']) )
			$general['serial']=$input['serial'];
		if ( isset($input['ifmac']) )
			$general['ifmac']=$input['ifmac'];
		if ( isset($input['netmask']) )
			$general['netmask']=$input['netmask'];
		if ( isset($input['contact']) )
			$general['contact']=$input['contact'];
		if ( isset($input['ram']) )
			$general['ram']=$input['ram'];
			
		$netdevice->update($general);
			
	}
}










/*
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*****************************************************************************************************************
*/





// Modifications by David
// Class for tracker_fullsync.php
class plugin_tracker_snmp extends CommonDBTM
{

	/**
	 * Query OID by SNMP connection
	 *
	 * @param $ArrayOID List of Object and OID in an array to get values
	 * @param $IP IP of the materiel we query
	 * @param $version : version of SNMP (1, 2c, 3)
	 * @param $snmp_auth array of AUTH : 
	 * 		community community name for version 1 and 2c ('public' by default)
	 * 		sec_name for v3 : the "username" used for authentication to the system
	 * 		sec_level for v3 : the authentication scheme ('noAuthNoPriv', 'authNoPriv', or 'authPriv')
	 * 		auth_protocol for v3 : the encryption protocol used for authentication ('MD5' [default] or 'SHA')
	 * 		auth_passphrase for v3 : the encrypted key to use as the authentication challenge
	 * 		priv_protocol for v3 : the encryption protocol used for protecting the protocol data unit ('DES' [default], 'AES128', 'AES192', or 'AES256')
	 * 		priv_passphrase for v3 : the key to use for encrypting the protocol data unit
	 *
	 * @return array : array with object name and result of the query
	 *
	**/
	function SNMPQuery($ArrayOID,$IP,$version=1,$snmp_auth)
	{
		
		$ArraySNMP = array();
		
		foreach($ArrayOID as $object=>$oid)
		{
			$SNMPValue = "";
			if ($oid[strlen($oid)-1] != ".")
			{
				if ($version == "1")
				{
					if (defined($object))
					{
						runkit_constant_remove($object);
					}
					define($object,$oid);
					ob_start();
					$SNMPValue = snmpget($IP, $snmp_auth["community"],$oid,700000,1);
					ob_end_clean();
				}
				else if ($version == "2c")
				{
					ob_start();
					$SNMPValue = snmp2_get($IP, $snmp_auth["community"],$oid,700000,1);
					ob_end_clean();
				}
				else if ($version == "3")
				{
					ob_start();
					$SNMPValue = snmp3_get($IP, $snmp_auth["sec_name"],$snmp_auth["sec_level"],$snmp_auth["auth_protocol"],$snmp_auth["auth_passphrase"], $snmp_auth["priv_protocol"],$snmp_auth["priv_passphrase"],$oid,700000,1);
					ob_end_clean();
				}
				logInFile("tracker_snmp", "			SNMP QUERY : ".$object."(".$oid.") = ".$SNMPValue."\n\n");
				$ArraySNMPValues = explode(": ", $SNMPValue);
				if (!isset($ArraySNMPValues[1]))
					$ArraySNMPValues[1] = "";
				$ArraySNMPValues[1] = trim($ArraySNMPValues[1], '"');
				$ArraySNMP[$object] = $ArraySNMPValues[1];
			}
		}
		return $ArraySNMP;
	}
	
	

	/**
	 * Query walk to get OID and values by SNMP connection where an Object have multi-lines
	 *
	 * @param $ArrayOID List of Object and OID in an array to get values
	 * @param $IP IP of the materiel we query
	 * @param $version : version of SNMP (1, 2c, 3)
	 * @param $snmp_auth array of AUTH : 
	 * 		community community name for version 1 and 2c ('public' by default)
	 * 		sec_name for v3 : the "username" used for authentication to the system
	 * 		sec_level for v3 : the authentication scheme ('noAuthNoPriv', 'authNoPriv', or 'authPriv')
	 * 		auth_protocol for v3 : the encryption protocol used for authentication ('MD5' [default] or 'SHA')
	 * 		auth_passphrase for v3 : the encrypted key to use as the authentication challenge
	 * 		priv_protocol for v3 : the encryption protocol used for protecting the protocol data unit ('DES' [default], 'AES128', 'AES192', or 'AES256')
	 * 		priv_passphrase for v3 : the key to use for encrypting the protocol data unit
	 *
	 * @return array : array with OID name and result of the query
	 *
	**/	
	function SNMPQueryWalkAll($ArrayOID,$IP,$version=1,$snmp_auth)
	//$community="public",$sec_name,$sec_level,$auth_protocol="MD5",$auth_passphrase,$priv_protocol="DES",$priv_passphrase)
	{
		$ArraySNMP = array();
		
		foreach($ArrayOID as $object=>$oid)
		{
			if ($version == "1")
			{
				$SNMPValue = snmprealwalk($IP, $snmp_auth["community"],$oid,700000,1);
			}
			else if ($version == "2c")
			{
				$SNMPValue = snmp2_real_walk($IP, $snmp_auth["community"],$oid,700000,1);
			}
			else if ($version == "3")
			{
				$SNMPValue = snmp3_real_walk($IP, $snmp_auth["sec_name"],$snmp_auth["sec_level"],$snmp_auth["auth_protocol"],$snmp_auth["auth_passphrase"], $snmp_auth["priv_protocol"],$snmp_auth["priv_passphrase"],$oid,700000,1);
			}
			if (empty($SNMPValue))
			{
				break;
			}
			foreach($SNMPValue as $oidwalk=>$value)
			{
				$ArraySNMPValues = explode(": ", $value);
				$ArraySNMPValues[1] = trim($ArraySNMPValues[1], '"');
				$ArraySNMP[$oidwalk] = $ArraySNMPValues[1];
				logInFile("tracker_snmp", "			SNMP QUERY WALK : ".$object."(".$oid.") = ".$oidwalk."=>".$value."\n\n");
			}
		}
		return $ArraySNMP;
	}
	


	/**
	 * Get SNMP port name of the network materiel and assign it to logical port number
	 *
	 * @param $IP IP address of network materiel
	 * @param $snmp_version version of SNMP (1, 2c or 3)
	 * @param $snmp_auth array with authentification of SNMP
	 * @param $ArrayOID List whith just Object and OID values
	 *
	 * @return array with logical port number and port name 
	 *
	**/
	function GetPortsName($IP,$snmp_version,$snmp_auth,$ArrayOID)
	{
		$snmp_queries = new plugin_tracker_snmp;
		
		$Arrayportsnames = array();
		// logInFile("tracker_snmp", "						Function : GetPortsName(".$IP.",".$snmp_version.",".$snmp_auth.",".$ArrayOID.") \n\n");		
		foreach($ArrayOID as $object=>$oid)
		{
			$Arrayportsnames = $snmp_queries->SNMPQueryWalkAll(array($object=>$oid),$IP,$snmp_version,$snmp_auth);
		}
	
		$PortsName = array();
	
		foreach($Arrayportsnames as $object=>$value)
		{
			$PortsName[] = $value;
		}
		return $PortsName;
	}



	/**
	 * Get SNMP port number of the network materiel and assign it to logical port number
	 *
	 * @param $IP IP address of network materiel
	 * @param $snmp_version version of SNMP (1, 2c or 3)
	 * @param $snmp_auth array with authentification of SNMP
	 *
	 * @return array with logical port number and SNMP port number 
	 *
	**/
	function GetPortsSNMPNumber($IP,$snmp_version,$snmp_auth)
	{
		$snmp_queries = new plugin_tracker_snmp;
		
		$ArrayportsSNMPNumber = $snmp_queries->SNMPQueryWalkAll(array("IF-MIB::ifIndex"=>"1.3.6.1.2.1.2.2.1.1"),$IP,$snmp_version,$snmp_auth);
	
		$PortsName = array();
	
		foreach($ArrayportsSNMPNumber as $object=>$value)
		{
			$PortsSNMPNumber[] = $value;

		}
		return $PortsSNMPNumber;
	}



	/**
	 * Get port name and ID of the network materiel from DB
	 *
	 * @param $IDNetworking ID of the network materiel 
	 *
	 * @return array with port name and port ID 
	 *
	**/
	function GetPortsID($IDNetworking)
	{

		global $DB;	
	
		$PortsID = array();
		
		$query = "SELECT ID,name
			
		FROM glpi_networking_ports
		
		WHERE on_device='".$IDNetworking."'
		
		ORDER BY logical_number ";

		if ( $result=$DB->query($query) )
		{
			while ( $data=$DB->fetch_array($result) )
			{

				$PortsID[$data["name"]] = $data["ID"];
			
			}
		}
		return $PortsID;
	}
	
	
	
	/**
	 * Get OID list for the SNMP model 
	 *
	 * @param $IDModelInfos ID of the SNMP model
	 * @param $arg arg for where (ports, port_number or juste oid for device)
	 * @param $name_dyn put object dynamic
	 *
	 * @return array : array with object name and oid
	 *
	**/
	function GetOID($IDModelInfos,$arg,$name_dyn=0,$ArrayPortsSNMPNumber = "")
	{
		
		global $DB;
		
		$oidList = array();		
		
		$query = "SELECT glpi_dropdown_plugin_tracker_mib_oid.name AS oidname, 
			glpi_dropdown_plugin_tracker_mib_object.name AS objectname
		FROM glpi_plugin_tracker_mib_networking
		
		LEFT JOIN glpi_dropdown_plugin_tracker_mib_oid
			ON glpi_plugin_tracker_mib_networking.FK_mib_oid=glpi_dropdown_plugin_tracker_mib_oid.ID
		
		LEFT JOIN glpi_dropdown_plugin_tracker_mib_object
			ON glpi_plugin_tracker_mib_networking.FK_mib_object=glpi_dropdown_plugin_tracker_mib_object.ID
		
		WHERE FK_model_infos=".$IDModelInfos." 
			AND ".$arg." ";

		if ( $result=$DB->query($query) )
		{
			while ( $data=$DB->fetch_array($result) )
			{
				if ($name_dyn == "0")
				{
					$oidList[$data["objectname"]] = $data["oidname"];
				}
				else
				{
					for ($i=0;$i < count($ArrayPortsSNMPNumber); $i++)
					{
						if (isset($ArrayPortsSNMPNumber[$i]))
						{
							$oidList[$data["objectname"].".".$ArrayPortsSNMPNumber[$i]] = $data["oidname"].".".$ArrayPortsSNMPNumber[$i];
						}
					}
				}
			}
		}
		return $oidList;	
	}


	/**
	 * Get links between oid and fields 
	 *
	 * @param $ID_Model ID of the SNMP model
	 *
	 * @return array : array with object name and mapping_type||mapping_name
	 *
	**/
	function GetLinkOidToFields($ID_Model)
	{

		global $DB,$TRACKER_MAPPING;
		
		$ObjectLink = array();
		
		$query = "SELECT mapping_type, mapping_name, 
			glpi_dropdown_plugin_tracker_mib_object.name AS name
		FROM glpi_plugin_tracker_mib_networking
		
		LEFT JOIN glpi_dropdown_plugin_tracker_mib_object
			ON glpi_plugin_tracker_mib_networking.FK_mib_object=glpi_dropdown_plugin_tracker_mib_object.ID
		
		WHERE FK_model_infos=".$ID_Model." 
			AND oid_port_counter='0' ";
		
		if ( $result=$DB->query($query) )
		{
			while ( $data=$DB->fetch_array($result) )
			{
				//$ObjectLink[$data["name"]] = $data["FK_links_oid_fields"];
				$ObjectLink[$data["name"]] = $data["mapping_type"]."||".$data["mapping_name"];
			}
		}
		return $ObjectLink;
	}



	function MAC_Rewriting($macadresse)
	{
		// If MAC address without : (with space for separate)
		$macadresse = trim($macadresse);
		if ( substr_count($macadresse, ':') == "0"){
			$macexplode = explode(" ",$macadresse);
			$assembledmac = "";
			for($num = 0;$num < count($macexplode);$num++)
			{
				if ($num > 0)
				{
					$assembledmac .= ":";
				}			
				$assembledmac .= $macexplode[$num];
			}
			$macadresse = $assembledmac;
		}	

		// Rewrite
		$macexplode = explode(":",$macadresse);
		$assembledmac = "";
		for($num = 0;$num < count($macexplode);$num++)
		{
			if ($num > 0)
			{
				$assembledmac .= ":";
			}			
			switch (strlen($macexplode[$num])) {
			case 0:
			    $assembledmac .= "00";
			    break;
			case 1:
			    $assembledmac .= "0".$macexplode[$num];
			    break;
			case 2:
			    $assembledmac .= $macexplode[$num];
			    break;
			}
		
		}
		return $assembledmac;
	}



	function update_network_infos($ID, $FK_model_infos, $FK_snmp_connection)
	{
		global $DB;
		
		$query = "SELECT * FROM glpi_plugin_tracker_networking
		WHERE FK_networking='".$ID."' ";
		$result = $DB->query($query);
		if ($DB->numrows($result) == "0")
		{
			$queryInsert = "INSERT INTO glpi_plugin_tracker_networking
			(FK_networking)
			VALUES('".$ID."') ";

			$DB->query($queryInsert);
		}		
		if (empty($FK_snmp_connection))
			$FK_snmp_connection = 0;
		$query = "UPDATE glpi_plugin_tracker_networking
		SET FK_model_infos='".$FK_model_infos."',FK_snmp_connection='".$FK_snmp_connection."'
		WHERE FK_networking='".$ID."' ";
	
		$DB->query($query);
	}
	
	

	function update_printer_infos($ID, $FK_model_infos, $FK_snmp_connection)
	{
		global $DB;

		$query = "SELECT * FROM glpi_plugin_tracker_printers
		WHERE FK_printers='".$ID."' ";
		$result = $DB->query($query);
		if ($DB->numrows($result) == "0")
		{
			$queryInsert = "INSERT INTO glpi_plugin_tracker_printers
			(FK_printers)
			VALUES('".$ID."') ";

			$DB->query($queryInsert);
		}
		if (empty($FK_snmp_connection))
			$FK_snmp_connection = 0;
		$query = "UPDATE glpi_plugin_tracker_printers
		SET FK_model_infos='".$FK_model_infos."',FK_snmp_connection='".$FK_snmp_connection."'
		WHERE FK_printers='".$ID."' ";
	
		$DB->query($query);
	}
	
	
	
	function getPortIDfromDeviceIP($IP, $ifDescr)
	{
		global $DB;
	
		$query = "SELECT * FROM glpi_plugin_tracker_networking_ifaddr
		WHERE ifaddr='".$IP."' ";
		
		$result = $DB->query($query);		
		$data = $DB->fetch_assoc($result);
		
		$queryPort = "SELECT * FROM glpi_plugin_tracker_networking_ports
		LEFT JOIN glpi_networking_ports
		ON glpi_plugin_tracker_networking_ports.FK_networking_ports = glpi_networking_ports.ID
		WHERE ifdescr='".$ifDescr."' 
			AND glpi_networking_ports.on_device='".$data["FK_networking"]."'
			AND glpi_networking_ports.device_type='2' ";
		$resultPort = $DB->query($queryPort);		
		$dataPort = $DB->fetch_assoc($resultPort);

		return($dataPort["FK_networking_ports"]);
	}



	function PortsConnection($source_port, $destination_port,$FK_process)
	{
		global $DB;
		
		$netwire = new Netwire;
		
		$queryVerif = "SELECT *
		FROM glpi_networking_wire 
		WHERE end1 IN ('$source_port', '$destination_port')
			AND end2 IN ('$source_port', '$destination_port') ";

		if ($resultVerif=$DB->query($queryVerif))
		{
			if ( $DB->numrows($resultVerif) == "0" )
			{
//echo "QUERY :".$queryVerif."\n";
			
				//$netwire=new Netwire;
			//	if ($netwire->getOppositeContact($destination_port) != "")
			//	{
					addLogConnection("remove",$netwire->getOppositeContact($destination_port),$FK_process);
					addLogConnection("remove",$destination_port,$FK_process);
					removeConnector($destination_port);
//echo "REMOVE CONNECTOR :".$destination_port."\n";
					removeConnector($source_port);
//echo "REMOVE CONNECTOR :".$source_port."\n";
			//	}
			
				makeConnector($source_port,$destination_port);
//echo "MAKE CONNECTOR :".$source_port." - ".$destination_port."\n";
				addLogConnection("make",$destination_port,$FK_process);
				addLogConnection("make",$source_port,$FK_process);
				
				if ((isset($vlan)) AND (!empty($vlan)))
				{
					$ID_vlan = externalImportDropdown("glpi_dropdown_vlan",$vlan_name,0);
					
					// Insert into glpi_networking_vlan FK_port 	FK_vlan OR update
					// $vlan_name
				}
			}
		}
		// Remove all connections if it is
		if ($netwire->getOppositeContact($destination_port) != "")
		{
			$queryVerif2 = "SELECT *
			FROM glpi_networking_wire 
			WHERE end1='".$netwire->getOppositeContact($destination_port)."'
				AND end2!='$destination_port' ";
			
			$resultVerif2=$DB->query($queryVerif2);
			while ( $dataVerif2=$DB->fetch_array($resultVerif2) )
			{
				$query_del = "DELETE FROM glpi_networking_wire 
				WHERE ID='".$dataVerif2["ID"]."' ";
				$DB->query($query_del);
//echo "DELETE ".$dataVerif2["ID"]." - PORTS ".$end1." - ".$end2."\n";
			}
			$queryVerif2 = "SELECT *
			FROM glpi_networking_wire 
			WHERE end1='$destination_port'
				AND end2!='".$netwire->getOppositeContact($destination_port)."' ";
			
			$resultVerif2=$DB->query($queryVerif2);
			while ( $dataVerif2=$DB->fetch_array($resultVerif2) )
			{
				$query_del = "DELETE FROM glpi_networking_wire 
				WHERE ID='".$dataVerif2["ID"]."' ";
				$DB->query($query_del);
//echo "DELETE ".$dataVerif2["ID"]." - PORTS ".$end1." - ".$end2."\n";
			}
		}
	
	}



	/**
	 * Define a global var
	 *
	 * @param $ArrayOID Array with ObjectName and OID
	 *
	 * @return nothing
	 *
	**/
	function DefineObject($ArrayOID)
	{
		foreach($ArrayOID as $object=>$oid)
		{
			if (!ereg("IF-MIB::",$object))
			{
				if(defined($object))
				{
					runkit_constant_remove($object);
					define($object,$oid);
				}
				else
				{
					define($object,$oid);
				}
			}
		}
	}



	/**
	 * Get SNMP model of the device 
	 *
	 * @param $ID_Device ID of the device
	 * @param $type type of device (NETWORKING_TYPE, PRINTER_TYPE ...)
	 *
	 * @return ID of the SNMP model or nothing 
	 *
	**/
	function GetSNMPModel($ID_Device,$type)
	{
	
		global $DB;

		switch ($type)
		{
			case NETWORKING_TYPE :
				$query = "SELECT FK_model_infos
				FROM glpi_plugin_tracker_networking 
				WHERE FK_networking='".$ID_Device."' ";
				break;
			case PRINTER_TYPE :
				$query = "SELECT FK_model_infos
				FROM glpi_plugin_tracker_printers 
				WHERE FK_printers='".$ID_Device."' ";
				break;
		}
		
		if ( ($result = $DB->query($query)) )
		{
			if ( $DB->numrows($result) != 0 )
			{
				return $DB->result($result, 0, "FK_model_infos");
			}
		}	
	
	}
	
}
?>
