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
   Original Author of file: David DURIEUX
   Co-authors of file:
   Purpose of file:
   ----------------------------------------------------------------------
 */

//Options for GLPI 0.71 and newer : need slave db to access the report
$USEDBREPLICATE=1;
$DBCONNECTION_REQUIRED=0;

define('GLPI_ROOT', '../../..'); 
include (GLPI_ROOT . "/inc/includes.php"); 

commonHeader($LANG['plugin_fusioninventory']['title'][0],$_SERVER['PHP_SELF'],"utils","report");

PluginFusioninventoryProfile::checkRight("fusinvsnmp","reportnetworkequipment","r");

if (isset($_GET["reset_search"])) {
	resetSearch();
}

if (!isset($_GET["start"])) {
	$_GET["start"] = 0;
}
$_GET=getValues($_GET,$_POST);
displaySearchForm();

if(isset($_POST["dropdown_calendar"]) && isset($_POST["dropdown_sup_inf"])) {
		
		$_GET["field"][0] = 3;
		$_GET["contains"][0] = getContainsArray($_POST);

		$_GET["field"][1] = 2;
		$_GET["contains"][1] = $_POST['location'];
		$_GET["link"][1] = "AND";

		$_SESSION["glpisearchcount"]['PluginFusioninventoryNetworkport2'] = 1;
//		showList('PluginFusioninventoryNetworkport2',$_GET);
} else {
//	showList('PluginFusioninventoryNetworkport2',$_GET);
}
commonFooter();



function displaySearchForm() {
	global $_SERVER,$_GET,$LANG,$CFG_GLPI;

	echo "<form action='".$_SERVER["PHP_SELF"]."' method='post'>";
	echo "<table class='tab_cadre' cellpadding='5'>";
	echo "<tr class='tab_bg_1' align='center'>";
	echo "<td>";
	echo $LANG["financial"][8]." :";
	
	$values=array();
	$values["sup"]=">";
	$values["inf"]="<";
	$values["equal"]="=";

	if (isset($_GET["contains"][1])) {
		if (strstr($_GET["contains"][1], "lt;")) {
			$_GET["dropdown_sup_inf"] = "inf";
			$_GET["dropdown_calendar"] = str_replace("lt;", "",$_GET["contains"][1]);
			$_GET["dropdown_calendar"] = str_replace("&", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("\\", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("'", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace(" 00:00:00", "",$_GET["dropdown_calendar"]);
			$_GET["contains"][1] = "<".$_GET["dropdown_calendar"];
		}
		if (strstr($_GET["contains"][1], "gt;")) {
			$_GET["dropdown_sup_inf"] = "sup";
			$_GET["dropdown_calendar"] = str_replace("gt;", "",$_GET["contains"][1]);
			$_GET["dropdown_calendar"] = str_replace("&", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("\\", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("'", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace(" 00:00:00", "",$_GET["dropdown_calendar"]);
			$_GET["contains"][1] = ">".$_GET["dropdown_calendar"];
		}
		if (strstr($_GET["contains"][1], "LIKE")) {
			$_GET["dropdown_sup_inf"] = "equal";
			$_GET["dropdown_calendar"] = str_replace("=", "",$_GET["contains"][1]);
			$_GET["dropdown_calendar"] = str_replace("&", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("\\", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("'", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("%", "",$_GET["dropdown_calendar"]);
			$_GET["dropdown_calendar"] = str_replace("LIKE ", "",$_GET["dropdown_calendar"]);
			$_GET["contains"][1] = "LIKE '".$_GET["dropdown_calendar"]."%'";
		}
	}
	Dropdown::showFromArray("dropdown_sup_inf", $values,
                           array('value'=>(isset($_GET["dropdown_sup_inf"])?$_GET["dropdown_sup_inf"]:"sup")));
	echo "</td>
		<td width='120'>";
	showDateFormItem("dropdown_calendar",(isset($_GET["dropdown_calendar"])?$_GET["dropdown_calendar"]:0));
	echo "</td>";

	echo "<td>".$LANG["common"][15]."</td>";
	echo "<td>";
	Dropdown::show("Location",
                  array('name' => "location",
                        'value' => (isset($_GET["location"])?$_GET["location"]:"")));
	echo "</td>";

	// Display Reset search
	echo "<td>";
	echo "<a href='".$CFG_GLPI["root_doc"]."/plugins/fusinvsnmp/report/ports_date_connections.php?reset_search=reset_search' ><img title=\"".$LANG["buttons"][16]."\" alt=\"".$LANG["buttons"][16]."\" src='".$CFG_GLPI["root_doc"]."/pics/reset.png' class='calendrier'></a>";
	echo "</td>";

	echo "<td>";
	//Add parameters to uri to be saved as bookmarks
	$_SERVER["REQUEST_URI"] = buildBookmarkUrl($_SERVER["REQUEST_URI"],$_GET);
	Bookmark::showSaveButton(BOOKMARK_SEARCH,'PluginFusioninventoryNetworkport2');
	echo "</td>";

	echo "<td>";
	echo "<input type='submit' value='Valider' class='submit' />";
	echo "</td>";
	
	echo "</tr>";
	echo "</table>";
	echo "</form>";
		
} 



function getContainsArray($get) {
	if (isset($get["dropdown_sup_inf"])) {
		switch ($get["dropdown_sup_inf"]) {
			case "sup":
				return ">'".$get["dropdown_calendar"]." 00:00:00'";

			case "equal":

				return "LIKE '".$get["dropdown_calendar"]."%'";
			case "inf":
            
				return "<'".$get["dropdown_calendar"]." 00:00:00'";
		}
	}
}



function buildBookmarkUrl($url,$get) {
	 return $url."?field[0]=3&contains[0]=".getContainsArray($get);
}



function getValues($get,$post) {
	$get=array_merge($get,$post);
	if (isset($get["field"])) {
		foreach ($get["field"] as $index => $value) {
         $get["contains"][$index] = stripslashes($get["contains"][$index]);
         $get["contains"][$index] = htmlspecialchars_decode($get["contains"][$index]);
			switch($value) {
				case 14:
					if (strpos( $get["contains"][$index],"=")==1) {
						$get["dropdown_sup_inf"]="equal";
               } else {
						if (strpos( $get["contains"][$index],"<")==1) {
							$get["dropdown_sup_inf"]="inf";
                  } else {
							$get["dropdown_sup_inf"]="sup";
                  }
               }
					break;
			}
			$get["dropdown_calendar"] = substr($get["contains"][$index],1);
		}
	}
	return $get;	
}



function resetSearch() {
	$_GET["start"]=0;
	$_GET["order"]="ASC";
	$_GET["is_deleted"]=0;
	$_GET["distinct"]="N";
	$_GET["link"]=array();
	$_GET["field"]=array(0=>"view");
	$_GET["contains"]=array(0=>"");
	$_GET["link2"]=array();
	$_GET["field2"]=array(0=>"view");
	$_GET["contains2"]=array(0=>"");
	$_GET["type2"]="";
	$_GET["sort"]=1;

	$_GET["dropdown_sup_inf"]="sup";
	$_GET["dropdown_calendar"]=date("Y-m-d H:i");
}

?>