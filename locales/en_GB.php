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
   Co-authors of file: Mathieu SIMON
   Purpose of file:
   ----------------------------------------------------------------------
 */

$title="FusionInventory SNMP";
$version="2.3.0-1";

$LANG['plugin_fusinvsnmp']['title'][0]="$title";
$LANG['plugin_fusinvsnmp']['title'][1]="SNMP information";
$LANG['plugin_fusinvsnmp']['title'][2]="connections history";
$LANG['plugin_fusinvsnmp']['title'][5]="FusionInventory's locks";
$LANG['plugin_fusinvsnmp']['title'][6]="SNMP";

$LANG['plugin_fusinvsnmp']['config'][3] = "SNMP inventory";
$LANG['plugin_fusinvsnmp']['config'][4] = "Devices discovery";
$LANG['plugin_fusinvsnmp']['config'][8] = "Never";
$LANG['plugin_fusinvsnmp']['config'][9] = "Always";

$LANG['plugin_fusinvsnmp']['profile'][2]="Configuration";
$LANG['plugin_fusinvsnmp']['profile'][3]="SNMP authentication";
$LANG['plugin_fusinvsnmp']['profile'][4]="IP Range";
$LANG['plugin_fusinvsnmp']['profile'][5]="Network equipment SNMP";
$LANG['plugin_fusinvsnmp']['profile'][6]="Printer SNMP";
$LANG['plugin_fusinvsnmp']['profile'][7]="SNMP model";
$LANG['plugin_fusinvsnmp']['profile'][8]="Printers report";
$LANG['plugin_fusinvsnmp']['profile'][9]="Network report";

$LANG['plugin_fusinvsnmp']['setup'][17]="Plugin ".$title." needs FusionInventory plugin activated before activation.";
$LANG['plugin_fusinvsnmp']['setup'][18]="Plugin ".$title." needs FusionInventory plugin activated before uninstall.";
$LANG['plugin_fusinvsnmp']['setup'][19]="Converting history port";
$LANG['plugin_fusinvsnmp']['setup'][20]="Moving creation connections history";
$LANG['plugin_fusinvsnmp']['setup'][21]="Moving deleted connections history";

$LANG['plugin_fusinvsnmp']['functionalities'][3]="SNMP";
$LANG['plugin_fusinvsnmp']['functionalities'][43]="SNMP authentication";

$LANG['plugin_fusinvsnmp']['snmp'][4]="Sysdescr";
$LANG['plugin_fusinvsnmp']['snmp'][12]="Uptime";
$LANG['plugin_fusinvsnmp']['snmp'][13]="CPU usage (in %)";
$LANG['plugin_fusinvsnmp']['snmp'][14]="Memory usage (in %)";
$LANG['plugin_fusinvsnmp']['snmp'][40]="Ports array";
$LANG['plugin_fusinvsnmp']['snmp'][41]="Port description";
$LANG['plugin_fusinvsnmp']['snmp'][42]="MTU";
$LANG['plugin_fusinvsnmp']['snmp'][43]="Speed";
$LANG['plugin_fusinvsnmp']['snmp'][44]="Internal status";
$LANG['plugin_fusinvsnmp']['snmp'][45]="Last Change";
$LANG['plugin_fusinvsnmp']['snmp'][46]="Number of bytes received";
$LANG['plugin_fusinvsnmp']['snmp'][47]="Number of input errors";
$LANG['plugin_fusinvsnmp']['snmp'][48]="Number of bytes sent";
$LANG['plugin_fusinvsnmp']['snmp'][49]="Number of errors in reception";
$LANG['plugin_fusinvsnmp']['snmp'][50]="Connection";
$LANG['plugin_fusinvsnmp']['snmp'][51]="Duplex";
$LANG['plugin_fusinvsnmp']['snmp'][52]="Date of last FusionInventory inventory";
$LANG['plugin_fusinvsnmp']['snmp'][53]="Last inventory";
$LANG['plugin_fusinvsnmp']['snmp'][54]="Datas not available";

$LANG['plugin_fusinvsnmp']['snmpauth'][1]="Community";
$LANG['plugin_fusinvsnmp']['snmpauth'][2]="User";
$LANG['plugin_fusinvsnmp']['snmpauth'][3]="Authentication scheme";
$LANG['plugin_fusinvsnmp']['snmpauth'][4]="Encryption protocol for authentication ";
$LANG['plugin_fusinvsnmp']['snmpauth'][5]="Password";
$LANG['plugin_fusinvsnmp']['snmpauth'][6]="Encryption protocol for data (write)";
$LANG['plugin_fusinvsnmp']['snmpauth'][7]="Password (write)";

$LANG['plugin_fusinvsnmp']['errors'][50]="GLPI version not compatible, require 0.78";

$LANG['plugin_fusinvsnmp']['prt_history'][0]="History and statistics of printer counters";
$LANG['plugin_fusinvsnmp']['prt_history'][12]="Total printed pages";
$LANG['plugin_fusinvsnmp']['prt_history'][13]="Pages / day";
$LANG['plugin_fusinvsnmp']['prt_history'][20]="History meter printer";
$LANG['plugin_fusinvsnmp']['prt_history'][21]="Date";
$LANG['plugin_fusinvsnmp']['prt_history'][22]="Meter";
$LANG['plugin_fusinvsnmp']['prt_history'][31]="Time unit";
$LANG['plugin_fusinvsnmp']['prt_history'][32]="Add a printer";
$LANG['plugin_fusinvsnmp']['prt_history'][33]="Remove a printer";
$LANG['plugin_fusinvsnmp']['prt_history'][34]="day";
$LANG['plugin_fusinvsnmp']['prt_history'][35]="week";
$LANG['plugin_fusinvsnmp']['prt_history'][36]="month";
$LANG['plugin_fusinvsnmp']['prt_history'][37]="year";

$LANG['plugin_fusinvsnmp']['massiveaction'][1]="Assign SNMP model";
$LANG['plugin_fusinvsnmp']['massiveaction'][2]="Assign SNMP authentication";

$LANG['plugin_fusinvsnmp']['model_info'][2]="SNMP version";
$LANG['plugin_fusinvsnmp']['model_info'][3]="SNMP authentication";
$LANG['plugin_fusinvsnmp']['model_info'][4]="SNMP models";
$LANG['plugin_fusinvsnmp']['model_info'][6]="Edit SNMP model";
$LANG['plugin_fusinvsnmp']['model_info'][7]="Create SNMP model";
$LANG['plugin_fusinvsnmp']["model_info"][8]="Model already exists";
$LANG['plugin_fusinvsnmp']['model_info'][9]="Import completed successfully";
$LANG['plugin_fusinvsnmp']['model_info'][10]="SNMP model import";
$LANG['plugin_fusinvsnmp']['model_info'][11]="is_active";
$LANG['plugin_fusinvsnmp']['model_info'][12]="Key of model discovery";
$LANG['plugin_fusinvsnmp']['model_info'][13]="Load the correct model";
$LANG['plugin_fusinvsnmp']['model_info'][14]="Load the correct SNMP model";
$LANG['plugin_fusinvsnmp']['model_info'][15]="Mass import of models";
$LANG['plugin_fusinvsnmp']['model_info'][16]="Mass import of models in folder plugins/fusinvsnmp/models/";

$LANG['plugin_fusinvsnmp']['mib'][1]="MIB Label";
$LANG['plugin_fusinvsnmp']['mib'][2]="Object";
$LANG['plugin_fusinvsnmp']['mib'][3]="OID";
$LANG['plugin_fusinvsnmp']['mib'][4]="add an OID...";
$LANG['plugin_fusinvsnmp']['mib'][5]="OID list";
$LANG['plugin_fusinvsnmp']['mib'][6]="Port Counters";
$LANG['plugin_fusinvsnmp']['mib'][7]="Dynamic port (.x)";
$LANG['plugin_fusinvsnmp']['mib'][8]="Linked fields";
$LANG['plugin_fusinvsnmp']['mib'][9]="VLAN";

$LANG['plugin_fusinvsnmp']['processes'][37]="Total IPs";

$LANG['plugin_fusinvsnmp']['state'][4]="Starting date";
$LANG['plugin_fusinvsnmp']['state'][5]="Ending date";
$LANG['plugin_fusinvsnmp']['state'][6]="Total discovery devices";
$LANG['plugin_fusinvsnmp']['state'][7]="Total in error";

$LANG['plugin_fusinvsnmp']['mapping'][1]="networking > location";
$LANG['plugin_fusinvsnmp']['mapping'][2]="networking > firmware";
$LANG['plugin_fusinvsnmp']['mapping'][3]="networking > uptime";
$LANG['plugin_fusinvsnmp']['mapping'][4]="networking > port > mtu";
$LANG['plugin_fusinvsnmp']['mapping'][5]="networking > port > speed";
$LANG['plugin_fusinvsnmp']['mapping'][6]="networking > port > internal status";
$LANG['plugin_fusinvsnmp']['mapping'][7]="networking > ports > Last Change";
$LANG['plugin_fusinvsnmp']['mapping'][8]="networking > port > number of bytes entered";
$LANG['plugin_fusinvsnmp']['mapping'][9]="networking > port > number of bytes out";
$LANG['plugin_fusinvsnmp']['mapping'][10]="networking > port > number of input errors";
$LANG['plugin_fusinvsnmp']['mapping'][11]="networking > port > number of errors output";
$LANG['plugin_fusinvsnmp']['mapping'][12]="networking > CPU usage";
$LANG['plugin_fusinvsnmp']['mapping'][13]="networking > serial number";
$LANG['plugin_fusinvsnmp']['mapping'][14]="networking > port > connection status";
$LANG['plugin_fusinvsnmp']['mapping'][15]="networking > port > MAC address";
$LANG['plugin_fusinvsnmp']['mapping'][16]="networking > port > name";
$LANG['plugin_fusinvsnmp']['mapping'][17]="networking > model";
$LANG['plugin_fusinvsnmp']['mapping'][18]="networking > ports > type";
$LANG['plugin_fusinvsnmp']['mapping'][19]="networking > VLAN";
$LANG['plugin_fusinvsnmp']['mapping'][20]="networking > name";
$LANG['plugin_fusinvsnmp']['mapping'][21]="networking > total memory";
$LANG['plugin_fusinvsnmp']['mapping'][22]="networking > free memory";
$LANG['plugin_fusinvsnmp']['mapping'][23]="networking > port > port description";
$LANG['plugin_fusinvsnmp']['mapping'][24]="printer > name";
$LANG['plugin_fusinvsnmp']['mapping'][25]="printer > model";
$LANG['plugin_fusinvsnmp']['mapping'][26]="printer > total memory";
$LANG['plugin_fusinvsnmp']['mapping'][27]="printer > serial number";
$LANG['plugin_fusinvsnmp']['mapping'][28]="printer > meter > total number of printed pages";
$LANG['plugin_fusinvsnmp']['mapping'][29]="printer > meter > number of printed black and white pages";
$LANG['plugin_fusinvsnmp']['mapping'][30]="printer > meter > number of printed color pages";
$LANG['plugin_fusinvsnmp']['mapping'][31]="printer > meter > number of printed monochrome pages";
$LANG['plugin_fusinvsnmp']['mapping'][32]="printer > meter > number of printed color pages";
$LANG['plugin_fusinvsnmp']['mapping'][33]="networking > port > duplex type";
$LANG['plugin_fusinvsnmp']['mapping'][34]="printer > consumables > black cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][35]="printer > consumables > photo black cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][36]="printer > consumables > cyan cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][37]="printer > consumables > yellow cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][38]="printer > consumables > magenta cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][39]="printer > consumables > light cyan cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][40]="printer > consumables > light magenta cartridge (%)";
$LANG['plugin_fusinvsnmp']['mapping'][41]="printer > consumables > photoconductor (%)";
$LANG['plugin_fusinvsnmp']['mapping'][42]="printer > consumables > black photoconductor (%)";
$LANG['plugin_fusinvsnmp']['mapping'][43]="printer > consumables > color photoconductor (%)";
$LANG['plugin_fusinvsnmp']['mapping'][44]="printer > consumables > cyan photoconductor (%)";
$LANG['plugin_fusinvsnmp']['mapping'][45]="printer > consumables > yellow photoconductor (%)";
$LANG['plugin_fusinvsnmp']['mapping'][46]="printer > consumables > magenta photoconductor (%)";
$LANG['plugin_fusinvsnmp']['mapping'][47]="printer > consumables > black transfer unit (%)";
$LANG['plugin_fusinvsnmp']['mapping'][48]="printer > consumables > cyan transfer unit (%)";
$LANG['plugin_fusinvsnmp']['mapping'][49]="printer > consumables > yellow transfer unit (%)";
$LANG['plugin_fusinvsnmp']['mapping'][50]="printer > consumables > magenta transfer unit (%)";
$LANG['plugin_fusinvsnmp']['mapping'][51]="printer > consumables > waste bin (%)";
$LANG['plugin_fusinvsnmp']['mapping'][52]="printer > consumables > four (%)";
$LANG['plugin_fusinvsnmp']['mapping'][53]="printer > consumables > cleaning module (%)";
$LANG['plugin_fusinvsnmp']['mapping'][54]="printer > meter > number of printed duplex pages";
$LANG['plugin_fusinvsnmp']['mapping'][55]="printer > meter > nomber of scanned pages";
$LANG['plugin_fusinvsnmp']['mapping'][56]="printer > location";
$LANG['plugin_fusinvsnmp']['mapping'][57]="printer > port > name";
$LANG['plugin_fusinvsnmp']['mapping'][58]="printer > port > MAC address";
$LANG['plugin_fusinvsnmp']['mapping'][59]="printer > consumables > black cartridge (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][60]="printer > consumables > black cartridge (remaining ink )";
$LANG['plugin_fusinvsnmp']['mapping'][61]="printer > consumables > cyan cartridge (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][62]="printer > consumables > cyan cartridge (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][63]="printer > consumables > yellow cartridge (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][64]="printer > consumables > yellow cartridge (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][65]="printer > consumables > magenta cartridge (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][66]="printer > consumables > magenta cartridge (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][67]="printer > consumables > light cyan cartridge (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][68]="printer > consumables > light cyan cartridge (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][69]="printer > consumables > light magenta cartridge (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][70]="printer > consumables > light magenta cartridge (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][71]="printer > consumables > photoconductor (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][72]="printer > consumables > photoconductor (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][73]="printer > consumables > black photoconductor (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][74]="printer > consumables > black photoconductor (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][75]="printer > consumables > color photoconductor (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][76]="printer > consumables > color photoconductor (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][77]="printer > consumables > cyan photoconductor (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][78]="printer > consumables > cyan photoconductor (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][79]="printer > consumables > yellow photoconductor (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][80]="printer > consumables > yellow photoconductor (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][81]="printer > consumables > magenta photoconductor (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][82]="printer > consumables > magenta photoconductor (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][83]="printer > consumables > black transfer unit (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][84]="printer > consumables > black transfer unit (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][85]="printer > consumables > cyan transfer unit (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][86]="printer > consumables > cyan transfer unit (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][87]="printer > consumables > yellow transfer unit (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][88]="printer > consumables > yellow transfer unit (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][89]="printer > consumables > magenta transfer unit (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][90]="printer > consumables > magenta transfer unit (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][91]="printer > consumables > waste bin (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][92]="printer > consumables > waste bin (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][93]="printer > consumables > four (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][94]="printer > consumables > four (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][95]="printer > consumables > cleaning module (max ink)";
$LANG['plugin_fusinvsnmp']['mapping'][96]="printer > consumables > cleaning module (remaining ink)";
$LANG['plugin_fusinvsnmp']['mapping'][97]="printer > port > type";
$LANG['plugin_fusinvsnmp']['mapping'][98]="printer > consumables > Maintenance kit (max)";
$LANG['plugin_fusinvsnmp']['mapping'][99]="printer > consumables > Maintenance kit (remaining)";
$LANG['plugin_fusinvsnmp']['mapping'][400]="printer > consumables > Maintenance kit (%)";
$LANG['plugin_fusinvsnmp']['mapping'][401]="networking > CPU user";
$LANG['plugin_fusinvsnmp']['mapping'][402]="networking > CPU system";
$LANG['plugin_fusinvsnmp']['mapping'][403]="networking > contact";
$LANG['plugin_fusinvsnmp']['mapping'][404]="networking > comments";
$LANG['plugin_fusinvsnmp']['mapping'][405]="printer > contact";
$LANG['plugin_fusinvsnmp']['mapping'][406]="printer > comments";
$LANG['plugin_fusinvsnmp']['mapping'][407]="printer > port > IP address";
$LANG['plugin_fusinvsnmp']['mapping'][408]="networking > port > numÃ©ro index";
$LANG['plugin_fusinvsnmp']['mapping'][409]="networking > Adress CDP";
$LANG['plugin_fusinvsnmp']['mapping'][410]="networking > Port CDP";
$LANG['plugin_fusinvsnmp']['mapping'][411]="networking > port > trunk/tagged";
$LANG['plugin_fusinvsnmp']['mapping'][412]="networking > MAC address filters (dot1dTpFdbAddress)";
$LANG['plugin_fusinvsnmp']['mapping'][413]="networking > Physical addresses in memory (ipNetToMediaPhysAddress)";
$LANG['plugin_fusinvsnmp']['mapping'][414]="networking > instances de ports (dot1dTpFdbPort)";
$LANG['plugin_fusinvsnmp']['mapping'][415]="networking > numÃ©ro de ports associÃ© id du port (dot1dBasePortIfIndex)";
$LANG['plugin_fusinvsnmp']['mapping'][416]="printer > port > index number";
$LANG['plugin_fusinvsnmp']['mapping'][417]="networking > MAC address";
$LANG['plugin_fusinvsnmp']['mapping'][418]="printer > Inventory number";
$LANG['plugin_fusinvsnmp']['mapping'][419]="networking > Inventory number";
$LANG['plugin_fusinvsnmp']['mapping'][420]="printer > manufacturer";
$LANG['plugin_fusinvsnmp']['mapping'][421]="networking > IP addresses";
$LANG['plugin_fusinvsnmp']['mapping'][422]="networking > PVID (port VLAN ID)";
$LANG['plugin_fusinvsnmp']['mapping'][423]="printer > meter > total number of printed pages (print)";
$LANG['plugin_fusinvsnmp']['mapping'][424]="printer > meter > number of printed black and white pages (print)";
$LANG['plugin_fusinvsnmp']['mapping'][425]="printer > meter > number of printed color pages (print)";
$LANG['plugin_fusinvsnmp']['mapping'][426]="printer > meter > total number of printed pages (copy)";
$LANG['plugin_fusinvsnmp']['mapping'][427]="printer > meter > number of printed black and white pages (copy)";
$LANG['plugin_fusinvsnmp']['mapping'][428]="printer > meter > number of printed color pages (copy)";
$LANG['plugin_fusinvsnmp']['mapping'][429]="printer > meter > total number of printed pages (fax)";
$LANG['plugin_fusinvsnmp']['mapping'][430]="networking > port > vlan";


$LANG['plugin_fusinvsnmp']['mapping'][101]="";
$LANG['plugin_fusinvsnmp']['mapping'][102]="";
$LANG['plugin_fusinvsnmp']['mapping'][103]="";
$LANG['plugin_fusinvsnmp']['mapping'][104]="MTU";
$LANG['plugin_fusinvsnmp']['mapping'][105]="Speed";
$LANG['plugin_fusinvsnmp']['mapping'][106]="Internal status";
$LANG['plugin_fusinvsnmp']['mapping'][107]="Last Change";
$LANG['plugin_fusinvsnmp']['mapping'][108]="Number of received bytes";
$LANG['plugin_fusinvsnmp']['mapping'][109]="Number of outgoing bytes";
$LANG['plugin_fusinvsnmp']['mapping'][110]="Number of input errors";
$LANG['plugin_fusinvsnmp']['mapping'][111]="Number of output errors";
$LANG['plugin_fusinvsnmp']['mapping'][112]="CPU usage";
$LANG['plugin_fusinvsnmp']['mapping'][113]="";
$LANG['plugin_fusinvsnmp']['mapping'][114]="Connection";
$LANG['plugin_fusinvsnmp']['mapping'][115]="Internal MAC address";
$LANG['plugin_fusinvsnmp']['mapping'][116]="Name";
$LANG['plugin_fusinvsnmp']['mapping'][117]="Model";
$LANG['plugin_fusinvsnmp']['mapping'][118]="Type";
$LANG['plugin_fusinvsnmp']['mapping'][119]="VLAN";
$LANG['plugin_fusinvsnmp']['mapping'][128]="Total number of printed pages";
$LANG['plugin_fusinvsnmp']['mapping'][129]="Number of printed black and white pages";
$LANG['plugin_fusinvsnmp']['mapping'][130]="Number of printed color pages";
$LANG['plugin_fusinvsnmp']['mapping'][131]="Number of printed monochrome pages";
$LANG['plugin_fusinvsnmp']['mapping'][132]="Number of printed color pages";
$LANG['plugin_fusinvsnmp']['mapping'][134]="Black cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][135]="Photo black cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][136]="Cyan cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][137]="Yellow cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][138]="Magenta cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][139]="Light cyan cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][140]="Light magenta cartridge";
$LANG['plugin_fusinvsnmp']['mapping'][141]="Photoconductor";
$LANG['plugin_fusinvsnmp']['mapping'][142]="Black photoconductor";
$LANG['plugin_fusinvsnmp']['mapping'][143]="Color photoconductor";
$LANG['plugin_fusinvsnmp']['mapping'][144]="Cyan photoconductor";
$LANG['plugin_fusinvsnmp']['mapping'][145]="Yellow photoconductor";
$LANG['plugin_fusinvsnmp']['mapping'][146]="Magenta photoconductor";
$LANG['plugin_fusinvsnmp']['mapping'][147]="Black transfer unit";
$LANG['plugin_fusinvsnmp']['mapping'][148]="Cyan transfer unit";
$LANG['plugin_fusinvsnmp']['mapping'][149]="Yellow transfer unit";
$LANG['plugin_fusinvsnmp']['mapping'][150]="Magenta transfer unit";
$LANG['plugin_fusinvsnmp']['mapping'][151]="Waste bin";
$LANG['plugin_fusinvsnmp']['mapping'][152]="Four";
$LANG['plugin_fusinvsnmp']['mapping'][153]="Cleaning module";
$LANG['plugin_fusinvsnmp']['mapping'][154]="Number of pages printed duplex";
$LANG['plugin_fusinvsnmp']['mapping'][155]="Number of scanned pages";
$LANG['plugin_fusinvsnmp']['mapping'][156]="Maintenance kit";
$LANG['plugin_fusinvsnmp']['mapping'][157]="Black toner";
$LANG['plugin_fusinvsnmp']['mapping'][158]="Cyan toner";
$LANG['plugin_fusinvsnmp']['mapping'][159]="Magenta toner";
$LANG['plugin_fusinvsnmp']['mapping'][160]="Yellow toner";
$LANG['plugin_fusinvsnmp']['mapping'][161]="Black drum";
$LANG['plugin_fusinvsnmp']['mapping'][162]="Cyan drum";
$LANG['plugin_fusinvsnmp']['mapping'][163]="Magenta drum";
$LANG['plugin_fusinvsnmp']['mapping'][164]="Yellow drum";
$LANG['plugin_fusinvsnmp']['mapping'][165]="Many informations grouped";
$LANG['plugin_fusinvsnmp']['mapping'][166]="Black toner 2";
$LANG['plugin_fusinvsnmp']['mapping'][167]="Black toner Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][168]="Black toner Restant";
$LANG['plugin_fusinvsnmp']['mapping'][169]="Cyan toner Max";
$LANG['plugin_fusinvsnmp']['mapping'][170]="Cyan toner Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][171]="Cyan toner Restant";
$LANG['plugin_fusinvsnmp']['mapping'][172]="Magenta toner Max";
$LANG['plugin_fusinvsnmp']['mapping'][173]="Magenta toner Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][174]="Magenta toner Restant";
$LANG['plugin_fusinvsnmp']['mapping'][175]="Yellow toner Max";
$LANG['plugin_fusinvsnmp']['mapping'][176]="Yellow toner Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][177]="Yellow toner Restant";
$LANG['plugin_fusinvsnmp']['mapping'][178]="Black drum Max";
$LANG['plugin_fusinvsnmp']['mapping'][179]="Black drum Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][180]="Black drum Restant";
$LANG['plugin_fusinvsnmp']['mapping'][181]="Cyan drum Max";
$LANG['plugin_fusinvsnmp']['mapping'][182]="Cyan drum Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][183]="Cyan drumRestant";
$LANG['plugin_fusinvsnmp']['mapping'][184]="Magenta drum Max";
$LANG['plugin_fusinvsnmp']['mapping'][185]="Magenta drum Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][186]="Magenta drum Restant";
$LANG['plugin_fusinvsnmp']['mapping'][187]="Yellow drum Max";
$LANG['plugin_fusinvsnmp']['mapping'][188]="Yellow drum Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][189]="Yellow drum Restant";
$LANG['plugin_fusinvsnmp']['mapping'][190]="Waste bin Max";
$LANG['plugin_fusinvsnmp']['mapping'][191]="Waste bin Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][192]="Waste bin Restant";
$LANG['plugin_fusinvsnmp']['mapping'][193]="Maintenance kit Max";
$LANG['plugin_fusinvsnmp']['mapping'][194]="Maintenance kit Utilisé";
$LANG['plugin_fusinvsnmp']['mapping'][195]="Maintenance kit Restant";
$LANG['plugin_fusinvsnmp']['mapping'][196]="Grey ink cartridge";

$LANG['plugin_fusinvsnmp']['mapping'][1423]="Total number of printed pages (print)";
$LANG['plugin_fusinvsnmp']['mapping'][1424]="Number of printed black and white pages (print)";
$LANG['plugin_fusinvsnmp']['mapping'][1425]="Number of printed color pages (print)";
$LANG['plugin_fusinvsnmp']['mapping'][1426]="Total number of printed pages (copy)";
$LANG['plugin_fusinvsnmp']['mapping'][1427]="Number of printed black and white pages (copy)";
$LANG['plugin_fusinvsnmp']['mapping'][1428]="Number of printed color pages (copy)";
$LANG['plugin_fusinvsnmp']['mapping'][1429]="Total number of printed pages (fax)";
$LANG['plugin_fusinvsnmp']['mapping'][1434]="Total number of large printed pages";

$LANG['plugin_fusinvsnmp']['menu'][2]="IP range configuration";
$LANG['plugin_fusinvsnmp']['menu'][5]="Switchs ports history";
$LANG['plugin_fusinvsnmp']['menu'][6]="Unused switchs ports";
$LANG['plugin_fusinvsnmp']['menu'][9]="Discovery status";
$LANG['plugin_fusinvsnmp']['menu'][10]="Network inventory status";

$LANG['plugin_fusinvsnmp']['discovery'][5]="Number of imported devices";
$LANG['plugin_fusinvsnmp']['discovery'][9]="Number of devices not imported because type non defined";

$LANG['plugin_fusinvsnmp']['iprange'][0]="Start of IP range";
$LANG['plugin_fusinvsnmp']['iprange'][1]="End of IP range";
$LANG['plugin_fusinvsnmp']['iprange'][2]="IP Ranges";
$LANG['plugin_fusinvsnmp']['iprange'][3]="Query";
$LANG['plugin_fusinvsnmp']['iprange'][7]="Bad IP";

$LANG['plugin_fusinvsnmp']['agents'][24]="Threads number";
$LANG['plugin_fusinvsnmp']['agents'][25]="Agent(s)";
$LANG['plugin_fusinvsnmp']['agents'][26]="Netdiscovery module version";
$LANG['plugin_fusinvsnmp']['agents'][27]="Snmpquery module version";

$LANG['plugin_fusinvsnmp']['task'][15]="Permanent task - Discovery";
$LANG['plugin_fusinvsnmp']['task'][16]="Permanent task - Inventory";
$LANG['plugin_fusinvsnmp']['task'][17]="Communication type";
$LANG['plugin_fusinvsnmp']['task'][18]="Create task easily";

$LANG['plugin_fusinvsnmp']['constructdevice'][0]="Gestion des mib de matériel";
$LANG['plugin_fusinvsnmp']['constructdevice'][1]="Automatic creation of models";
$LANG['plugin_fusinvsnmp']['constructdevice'][2]="Generate discovery file";
$LANG['plugin_fusinvsnmp']['constructdevice'][3]="Delete models non used";
$LANG['plugin_fusinvsnmp']['constructdevice'][4]="Export all models";
$LANG['plugin_fusinvsnmp']['constructdevice'][5]="Re-create models comments";

$LANG['plugin_fusinvsnmp']['stats'][0]="Total counter";
$LANG['plugin_fusinvsnmp']['stats'][1]="pages per day";
$LANG['plugin_fusinvsnmp']['stats'][2]="Display";

$LANG['plugin_fusinvsnmp']['report'][0]="Number of days since last inventory";
$LANG['plugin_fusinvsnmp']['report'][1]="Printed page counter";

$LANG['plugin_fusinvsnmp']['codetasklog'][1]="devices queried";
$LANG['plugin_fusinvsnmp']['codetasklog'][2]="devices found";
$LANG['plugin_fusinvsnmp']['codetasklog'][3]="Dico too old on agent, request posted by agent";
$LANG['plugin_fusinvsnmp']['codetasklog'][4]=$LANG['log'][20];
$LANG['plugin_fusinvsnmp']['codetasklog'][5]=$LANG['log'][21];
$LANG['plugin_fusinvsnmp']['codetasklog'][6]="Inventory started";

$LANG['plugin_fusinvsnmp']['legend'][0]="Connection with a switch or a server in trunk or tagged mode";
$LANG['plugin_fusinvsnmp']['legend'][1]="Other connections (with a computer, a printer...)";

$LANG['plugin_fusinvsnmp']['printhistory'][1]="Too datas to display";

$LANG['plugin_fusinvsnmp']["portlogs"][0]="History configuration";
$LANG['plugin_fusinvsnmp']["portlogs"][1]="List of fields for which to keep history";
$LANG['plugin_fusinvsnmp']["portlogs"][2]="Retention in days";

?>