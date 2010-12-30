<?php
/*
 * @version $Id$
 ----------------------------------------------------------------------
 FusionInventory
 Coded by the FusionInventory Development Team.

 http://www.fusioninventory.org/   http://forge.fusioninventory.org//
 ----------------------------------------------------------------------

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
 ------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: David DURIEUX
// Purpose of file:
// ----------------------------------------------------------------------

$title="FusionInventory SNMP";
$version="2.3.0-1";

$LANG['plugin_fusinvsnmp']['title'][0]="$title";
$LANG['plugin_fusinvsnmp']['title'][1]="SNMP information";
$LANG['plugin_fusinvsnmp']['title'][2]="Verbindungs Historie";
$LANG['plugin_fusinvsnmp']['title'][3]="[Trk] Fehler";
$LANG['plugin_fusinvsnmp']['title'][4]="[Trk] Cron";
$LANG['plugin_fusinvsnmp']['title'][5]="FusionInventory's locks";

$LANG['plugin_fusinvsnmp']['config'][0] = "Inventory frequency (in hours)";
$LANG['plugin_fusinvsnmp']['config'][1] = "Modules";
$LANG['plugin_fusinvsnmp']['config'][2] = "Snmp";
$LANG['plugin_fusinvsnmp']['config'][3] = "Inventory";
$LANG['plugin_fusinvsnmp']['config'][4] = "Devices discovery";
$LANG['plugin_fusinvsnmp']['config'][5] = "Manage agent directly from GLPI";
$LANG['plugin_fusinvsnmp']['config'][6] = "Wake On Lan";
$LANG['plugin_fusinvsnmp']['config'][7] = "SNMP query";

$LANG['plugin_fusinvsnmp']['profile'][0]="Rechte Management";
$LANG['plugin_fusinvsnmp']['profile'][1]="$title"; //interface

$LANG['plugin_fusinvsnmp']['profile'][10]="Konfigurierte Profile";
$LANG['plugin_fusinvsnmp']['profile'][11]="Computer Historie";
$LANG['plugin_fusinvsnmp']['profile'][12]="Drucker Historie";
$LANG['plugin_fusinvsnmp']['profile'][13]="Drucker Information";
$LANG['plugin_fusinvsnmp']['profile'][14]="Netzwerk Information";
$LANG['plugin_fusinvsnmp']['profile'][15]="Fehler";

$LANG['plugin_fusinvsnmp']['profile'][16]="SNMP Netzwerk";
$LANG['plugin_fusinvsnmp']['profile'][17]="SNMP Geräte";
$LANG['plugin_fusinvsnmp']['profile'][18]="SNMP Drucker";
$LANG['plugin_fusinvsnmp']['profile'][19]="SNMP Modelle";
$LANG['plugin_fusinvsnmp']['profile'][20]="SNMP Authentifizierung";
$LANG['plugin_fusinvsnmp']['profile'][21]="Script Information";
$LANG['plugin_fusinvsnmp']['profile'][22]="Netzwerk Entdeckung";
$LANG['plugin_fusinvsnmp']['profile'][23]="Grundelegende Konfiguration";
$LANG['plugin_fusinvsnmp']['profile'][24]="SNMP Modell";
$LANG['plugin_fusinvsnmp']['profile'][25]="IP Bereich";
$LANG['plugin_fusinvsnmp']['profile'][26]="Agent";
$LANG['plugin_fusinvsnmp']['profile'][27]="Agent Information";
$LANG['plugin_fusinvsnmp']['profile'][28]="Bericht";
$LANG['plugin_fusinvsnmp']['profile'][29]="Remote control of agents";
$LANG['plugin_fusinvsnmp']['profile'][30]="Unknown devices";
$LANG['plugin_fusinvsnmp']['profile'][31]="device inventory FusionInventory";
$LANG['plugin_fusinvsnmp']['profile'][32]="SNMP query";
$LANG['plugin_fusinvsnmp']['profile'][33]="WakeOnLan";
$LANG['plugin_fusinvsnmp']['profile'][34]="Actions";

$LANG['plugin_fusinvsnmp']['setup'][2]="Danke das Sie alles in die Wurzel Entität gesteckt haben (alles sehen)";
$LANG['plugin_fusinvsnmp']['setup'][3]="Plugin Konfiguration".$title;
$LANG['plugin_fusinvsnmp']['setup'][4]="Install plugin $title $version";
$LANG['plugin_fusinvsnmp']['setup'][5]="Update plugin $title auf version $version";
$LANG['plugin_fusinvsnmp']['setup'][6]="Uninstall plugin $title $version";
$LANG['plugin_fusinvsnmp']['setup'][8]="Achtung, die deinstallation dieses Plugins ist entg&uuml;ltig.<br> Sie werden alle Daten verlieren.";
$LANG['plugin_fusinvsnmp']['setup'][11]="Anweisungen";
$LANG['plugin_fusinvsnmp']['setup'][12]="FAQ";
$LANG['plugin_fusinvsnmp']['setup'][13]="PHP Module &uuml;berpr&uuml;fen";
$LANG['plugin_fusinvsnmp']['setup'][14]="PHP SNMP Erweiterung nicht geladen";
$LANG['plugin_fusinvsnmp']['setup'][15]="PHP/PECL Laufzeiterweiterung nicht geladen";
$LANG['plugin_fusinvsnmp']['setup'][16]="Dokumentation";
$LANG['plugin_fusinvsnmp']['setup'][17]="Plugin ".$title." need plugin FusionInventory installed before install.";

$LANG['plugin_fusinvsnmp']['functionalities'][0]="Funktionen";
$LANG['plugin_fusinvsnmp']['functionalities'][1]="Funktionen Hinzuf&uuml;gen/L&ouml;schen";
$LANG['plugin_fusinvsnmp']['functionalities'][2]="Grundelegende Konfiguration";
$LANG['plugin_fusinvsnmp']['functionalities'][3]="SNMP";
$LANG['plugin_fusinvsnmp']['functionalities'][4]="Verbindung";
$LANG['plugin_fusinvsnmp']['functionalities'][5]="Server script";
$LANG['plugin_fusinvsnmp']['functionalities'][6]="Legende";
$LANG['plugin_fusinvsnmp']['functionalities'][7]="Lockable fields";

$LANG['plugin_fusinvsnmp']['functionalities'][9]="Retention in days";
$LANG['plugin_fusinvsnmp']['functionalities'][10]="Aktiviere Historie";
$LANG['plugin_fusinvsnmp']['functionalities'][11]="Aktiviere Verbindungsmodul";
$LANG['plugin_fusinvsnmp']['functionalities'][12]="Aktiviere SNMP Netzwerkmodul";
$LANG['plugin_fusinvsnmp']['functionalities'][13]="Aktiviere SNMP Ger&auml;temodul";
$LANG['plugin_fusinvsnmp']['functionalities'][14]="Aktiviere SNMP Telefonmodul";
$LANG['plugin_fusinvsnmp']['functionalities'][15]="Aktiviere SNMP Druckermodul";
$LANG['plugin_fusinvsnmp']['functionalities'][16]="SNMP Authentifizierung ";
$LANG['plugin_fusinvsnmp']['functionalities'][17]="Datenbank";
$LANG['plugin_fusinvsnmp']['functionalities'][18]="Dateien";
$LANG['plugin_fusinvsnmp']['functionalities'][19]="Bitte Konfigurieren Sie die SNMP Authentifizierung im Setup des Plugin";
$LANG['plugin_fusinvsnmp']['functionalities'][20]="Zustand des Aktiven Geräts";
$LANG['plugin_fusinvsnmp']['functionalities'][21]="Aufbewahrung von alten Verbindungsdaten zwischen den Ger&auml;ten in Tagen (0 = Endlos)";
$LANG['plugin_fusinvsnmp']['functionalities'][22]="Aufbewahrung von alten Status&auml;nderungen an Steckverbindungen in Tagen (0 = Endlos)";
$LANG['plugin_fusinvsnmp']['functionalities'][23]="Aubewahrung von alten unbekannten MAC Adressen int Tagen (0 = Endlos)";
$LANG['plugin_fusinvsnmp']['functionalities'][24]="Aufbewahrung von alten SNMP Fehlern in Tagen (0 = infinity))";
$LANG['plugin_fusinvsnmp']['functionalities'][25]="Aufbewahrung der alten Laufzeitinformationen der Scripte in Tagen (0 = Endlos)";
$LANG['plugin_fusinvsnmp']['functionalities'][26]="GLPI URL f&uuml;r den Agent";
$LANG['plugin_fusinvsnmp']['functionalities'][27]="Nur SSL f&uuml;r den Agent";
$LANG['plugin_fusinvsnmp']['functionalities'][28]="Konfiguration der Historie";
$LANG['plugin_fusinvsnmp']['functionalities'][29]="Liste der Felder f&uuml;r die Historie";

$LANG['plugin_fusinvsnmp']['functionalities'][30]="Status der aktiven Ger&auml;te";
$LANG['plugin_fusinvsnmp']['functionalities'][31]="Verwaltung von Patronen und Lagerbestand";
$LANG['plugin_fusinvsnmp']['functionalities'][32]="Delete agents informations processes after";
$LANG['plugin_fusinvsnmp']['functionalities'][36]="Frequency of meter reading";

$LANG['plugin_fusinvsnmp']['functionalities'][40]="Konfiguration";
$LANG['plugin_fusinvsnmp']['functionalities'][41]="Status der aktiven Ger&auml;te";
$LANG['plugin_fusinvsnmp']['functionalities'][42]="Switch";
$LANG['plugin_fusinvsnmp']['functionalities'][43]="SNMP Authentifizierung";

$LANG['plugin_fusinvsnmp']['functionalities'][50]="Anzahl der gleichzeitigen Prozesse f&uuml;r die Netzwerkentdeckung";
$LANG['plugin_fusinvsnmp']['functionalities'][51]="Anzahl der gleichzeitigen Prozesse f&uuml;r SNMP Anfragen";
$LANG['plugin_fusinvsnmp']['functionalities'][52]="Aktivierung der Log Dateien";
$LANG['plugin_fusinvsnmp']['functionalities'][53]="Anzahl der gelichzeitigen Prozesse des Server Scripts";

$LANG['plugin_fusinvsnmp']['functionalities'][60]="Lösche Historie";

$LANG['plugin_fusinvsnmp']['functionalities'][70]="Lockable fields configuration";
$LANG['plugin_fusinvsnmp']['functionalities'][71]="Unlockable fields";
$LANG['plugin_fusinvsnmp']['functionalities'][72]="Table";
$LANG['plugin_fusinvsnmp']['functionalities'][73]="Fields";
$LANG['plugin_fusinvsnmp']['functionalities'][74]="Values";
$LANG['plugin_fusinvsnmp']['functionalities'][75]="Locks";

$LANG['plugin_fusinvsnmp']['snmp'][0]="SNMP Informationen der Ger&auml;te";
$LANG['plugin_fusinvsnmp']['snmp'][1]="Grundlage";
$LANG['plugin_fusinvsnmp']['snmp'][2]="Verkabelung";
$LANG['plugin_fusinvsnmp']['snmp'][3]="SNMP Daten";

$LANG['plugin_fusinvsnmp']['snmp'][11]="Zus&auml;tzliche Informationen";
$LANG['plugin_fusinvsnmp']['snmp'][12]="Uptime";
$LANG['plugin_fusinvsnmp']['snmp'][13]="CPU Verwendung (in %)";
$LANG['plugin_fusinvsnmp']['snmp'][14]="Speicher Verwendung (in %)";

$LANG['plugin_fusinvsnmp']['snmp'][31]="Keine SNMP Informationen erhalten: Dies ist kein Switch";
$LANG['plugin_fusinvsnmp']['snmp'][32]="Keine SNMP Informationen erhalten: Hardware inaktiv";
$LANG['plugin_fusinvsnmp']['snmp'][33]="Keine SNMP Informationen erhalten: IP in der Basis nicht spezifiziert";
$LANG['plugin_fusinvsnmp']['snmp'][34]="Der Switch ist an einer Maschine angeschlossen welche nicht eingetragen ist";

$LANG['plugin_fusinvsnmp']['snmp'][40]="Anschlu&szlig; Aufstellung";
$LANG['plugin_fusinvsnmp']['snmp'][41]="";
$LANG['plugin_fusinvsnmp']['snmp'][42]="MTU";
$LANG['plugin_fusinvsnmp']['snmp'][43]="Geschwindigkeit";
$LANG['plugin_fusinvsnmp']['snmp'][44]="Interner Zustand";
$LANG['plugin_fusinvsnmp']['snmp'][45]="Letzte &Auml;nderung";
$LANG['plugin_fusinvsnmp']['snmp'][46]="Anzahl empfangener Bytes";
$LANG['plugin_fusinvsnmp']['snmp'][47]="Anzahl der Input Fehler";
$LANG['plugin_fusinvsnmp']['snmp'][48]="Anzahl gesendeter Bytes";
$LANG['plugin_fusinvsnmp']['snmp'][49]="Anzahl von Fehlern beim Empfang";
$LANG['plugin_fusinvsnmp']['snmp'][50]="Verbindung";
$LANG['plugin_fusinvsnmp']['snmp'][51]="Duplex";
$LANG['plugin_fusinvsnmp']['snmp'][52]="Datum des letzen FusionInventory Inventarisierung";
$LANG['plugin_fusinvsnmp']['snmp'][53]="Letzte Inventarisierung";
$LANG['plugin_fusinvsnmp']['snmp'][54]="Datas not available";

$LANG['plugin_fusinvsnmp']['snmpauth'][1]="Gemeinschaft";
$LANG['plugin_fusinvsnmp']['snmpauth'][2]="Benutzer";
$LANG['plugin_fusinvsnmp']['snmpauth'][3]="Authentifizierungsmodell";
$LANG['plugin_fusinvsnmp']['snmpauth'][4]="Verschl&uuml;sselungsprotokoll f&uuml;r die Authentifizierung ";
$LANG['plugin_fusinvsnmp']['snmpauth'][5]="Passwort";
$LANG['plugin_fusinvsnmp']['snmpauth'][6]="Verschl&uuml;sselungsprotokoll f&uuml;r Daten (schreiben)";
$LANG['plugin_fusinvsnmp']['snmpauth'][7]="Passwort (schreiben)";

$LANG['plugin_fusinvsnmp']['cron'][0]="Automatic reading meter";
$LANG['plugin_fusinvsnmp']['cron'][1]="Aktiviere Eintrag";
$LANG['plugin_fusinvsnmp']['cron'][2]="";
$LANG['plugin_fusinvsnmp']['cron'][3]="Standard";

$LANG['plugin_fusinvsnmp']['errors'][0]="Fehler";
$LANG['plugin_fusinvsnmp']['errors'][1]="IP";
$LANG['plugin_fusinvsnmp']['errors'][2]="Beschreibung";
$LANG['plugin_fusinvsnmp']['errors'][3]="Datum des ersten Fehlers";
$LANG['plugin_fusinvsnmp']['errors'][4]="Datum des letzten Fehlers";

$LANG['plugin_fusinvsnmp']['errors'][10]="Inconsistent with the basic GLPI";
$LANG['plugin_fusinvsnmp']['errors'][11]="Position unbekannt";
$LANG['plugin_fusinvsnmp']['errors'][12]="Unbekannte IP";

$LANG['plugin_fusinvsnmp']['errors'][20]="SNMP Fehler";
$LANG['plugin_fusinvsnmp']['errors'][21]="Keine SNMP Informationen erhalten";
$LANG['plugin_fusinvsnmp']['errors'][22]="Unattended element in";
$LANG['plugin_fusinvsnmp']['errors'][23]="Unable to identify device";

$LANG['plugin_fusinvsnmp']['errors'][30]="Verkabelungsfehler";
$LANG['plugin_fusinvsnmp']['errors'][31]="Verkabelungsproblem";

$LANG['plugin_fusinvsnmp']['errors'][50]="GLPI version not compatible need 0.78";

$LANG['plugin_fusinvsnmp']['errors'][101]="Timeout";
$LANG['plugin_fusinvsnmp']['errors'][102]="Kein SNMP Modell zugeordnet";
$LANG['plugin_fusinvsnmp']['errors'][103]="Keine SNMP Authentifzierung zugeordnet";
$LANG['plugin_fusinvsnmp']['errors'][104]="Error message";

$LANG['plugin_fusinvsnmp']['history'][0] = "Alt";
$LANG['plugin_fusinvsnmp']['history'][1] = "Neu";
$LANG['plugin_fusinvsnmp']['history'][2] = "Trennen";
$LANG['plugin_fusinvsnmp']['history'][3] = "Verbindung";

$LANG['plugin_fusinvsnmp']['prt_history'][0]="Historie und Statistik der Druckerzähler";

$LANG['plugin_fusinvsnmp']['prt_history'][10]="Druckerzähler Statistik";
$LANG['plugin_fusinvsnmp']['prt_history'][11]="Tag(e)";
$LANG['plugin_fusinvsnmp']['prt_history'][12]="Gedruckte Seiten gesamt";
$LANG['plugin_fusinvsnmp']['prt_history'][13]="Seiten / Tag";

$LANG['plugin_fusinvsnmp']['prt_history'][20]="History meter Drucker";
$LANG['plugin_fusinvsnmp']['prt_history'][21]="Datum";
$LANG['plugin_fusinvsnmp']['prt_history'][22]="Meter";

$LANG['plugin_fusinvsnmp']['prt_history'][30]="Display";
$LANG['plugin_fusinvsnmp']['prt_history'][31]="Time unit";
$LANG['plugin_fusinvsnmp']['prt_history'][32]="Add a printer";
$LANG['plugin_fusinvsnmp']['prt_history'][33]="Remove a printer";
$LANG['plugin_fusinvsnmp']['prt_history'][34]="day";
$LANG['plugin_fusinvsnmp']['prt_history'][35]="week";
$LANG['plugin_fusinvsnmp']['prt_history'][36]="month";
$LANG['plugin_fusinvsnmp']['prt_history'][37]="year";

$LANG['plugin_fusinvsnmp']['cpt_history'][0]="Historie Sitzungen";
$LANG['plugin_fusinvsnmp']['cpt_history'][1]="Kontakt";
$LANG['plugin_fusinvsnmp']['cpt_history'][2]="Computer";
$LANG['plugin_fusinvsnmp']['cpt_history'][3]="Benutzer";
$LANG['plugin_fusinvsnmp']['cpt_history'][4]="Zustand";
$LANG['plugin_fusinvsnmp']['cpt_history'][5]="Datum";

$LANG['plugin_fusinvsnmp']['type'][1]="Computer";
$LANG['plugin_fusinvsnmp']['type'][2]="Switch";
$LANG['plugin_fusinvsnmp']['type'][3]="Drucker";

$LANG['plugin_fusinvsnmp']['rules'][1]="Regeln";

$LANG['plugin_fusinvsnmp']['massiveaction'][1]="SNMP zuordnen";
$LANG['plugin_fusinvsnmp']['massiveaction'][2]="SNMP Authentifizierung zuordnen";

$LANG['plugin_fusinvsnmp']['model_info'][1]="SNMP Information";
$LANG['plugin_fusinvsnmp']['model_info'][2]="SNMP Version";
$LANG['plugin_fusinvsnmp']['model_info'][3]="SNMP Authentifizierung";
$LANG['plugin_fusinvsnmp']['model_info'][4]="SNMP Modelle";
$LANG['plugin_fusinvsnmp']['model_info'][5]="MIB Verwaltung";
$LANG['plugin_fusinvsnmp']['model_info'][6]="Bearbeite SNMP Modell";
$LANG['plugin_fusinvsnmp']['model_info'][7]="Erstelle SNMP Modell";
$LANG['plugin_fusinvsnmp']['model_info'][8]="Modell gibt es schon: Nicht importiert";
$LANG['plugin_fusinvsnmp']['model_info'][9]="Import vollst&auml;ndig Abgeschlossen";
$LANG['plugin_fusinvsnmp']['model_info'][10]="SNMP Modell Import";
$LANG['plugin_fusinvsnmp']['model_info'][11]="Aktivierung";
$LANG['plugin_fusinvsnmp']['model_info'][12]="Key for model discovery";
$LANG['plugin_fusinvsnmp']['model_info'][13]="Lade richtiges Modell";
$LANG['plugin_fusinvsnmp']['model_info'][14]="Lade richtiges SNMP Modell";
$LANG['plugin_fusinvsnmp']['model_info'][15]="Mass import of models";
$LANG['plugin_fusinvsnmp']['model_info'][16]="Mass import of models in folder plugins/fusioninventory/models/";

$LANG['plugin_fusinvsnmp']['mib'][1]="MIB Bezeichnung";
$LANG['plugin_fusinvsnmp']['mib'][2]="Objekt";
$LANG['plugin_fusinvsnmp']['mib'][3]="oid";
$LANG['plugin_fusinvsnmp']['mib'][4]="F&uuml;ge eine oid hinzu...";
$LANG['plugin_fusinvsnmp']['mib'][5]="oid Liste";
$LANG['plugin_fusinvsnmp']['mib'][6]="Port Counters";
$LANG['plugin_fusinvsnmp']['mib'][7]="Dynamische ports (.x)";
$LANG['plugin_fusinvsnmp']['mib'][8]="VerlTintete Felder";
$LANG['plugin_fusinvsnmp']['mib'][9]="Vlan";

$LANG['plugin_fusinvsnmp']['processes'][0]="Historie der Script ausf&uuml;hrung";
$LANG['plugin_fusinvsnmp']['processes'][1]="PID";
$LANG['plugin_fusinvsnmp']['processes'][2]="Status";
$LANG['plugin_fusinvsnmp']['processes'][3]="Anzahl der Prozesse";
$LANG['plugin_fusinvsnmp']['processes'][4]="Startdatum der Ausf&uuml;hrung";
$LANG['plugin_fusinvsnmp']['processes'][5]="Enddatum der Ausf&uuml;hrung";
$LANG['plugin_fusinvsnmp']['processes'][6]="Angefragte Netzwerkger&auml;te";
$LANG['plugin_fusinvsnmp']['processes'][7]="Angefragte Drucker";
$LANG['plugin_fusinvsnmp']['processes'][8]="Angefragte Anschl&uuml;&szlig;e";
$LANG['plugin_fusinvsnmp']['processes'][9]="Fehler";
$LANG['plugin_fusinvsnmp']['processes'][10]="Zeit Script";
$LANG['plugin_fusinvsnmp']['processes'][11]="hinzugef&uuml;gte Felder";
$LANG['plugin_fusinvsnmp']['processes'][12]="SNMP Fehler";
$LANG['plugin_fusinvsnmp']['processes'][13]="Unbekannte MAC";
$LANG['plugin_fusinvsnmp']['processes'][14]="Liste von unbekannten MAC Adressen";
$LANG['plugin_fusinvsnmp']['processes'][15]="Erste PID";
$LANG['plugin_fusinvsnmp']['processes'][16]="Letzte PID";
$LANG['plugin_fusinvsnmp']['processes'][17]="Datum der ersten Erkennung";
$LANG['plugin_fusinvsnmp']['processes'][18]="Datum der letzten Erkennung";
$LANG['plugin_fusinvsnmp']['processes'][19]="Historie der Angen ausf&uuml;hrungen";
$LANG['plugin_fusinvsnmp']['processes'][20]="Berichte und Statistiken";
$LANG['plugin_fusinvsnmp']['processes'][21]="Abgefragte Ger&auml;te";
$LANG['plugin_fusinvsnmp']['processes'][22]="Fehler";
$LANG['plugin_fusinvsnmp']['processes'][23]="Dauer der gesamten Erkennung";
$LANG['plugin_fusinvsnmp']['processes'][24]="Dauer der gesamten Anfrage";
$LANG['plugin_fusinvsnmp']['processes'][25]="Agent";
$LANG['plugin_fusinvsnmp']['processes'][26]="Discover";
$LANG['plugin_fusinvsnmp']['processes'][27]="Query";
$LANG['plugin_fusinvsnmp']['processes'][28]="Core";
$LANG['plugin_fusinvsnmp']['processes'][29]="Threads";
$LANG['plugin_fusinvsnmp']['processes'][30]="Discovered";
$LANG['plugin_fusinvsnmp']['processes'][31]="Existent";
$LANG['plugin_fusinvsnmp']['processes'][32]="Imported";
$LANG['plugin_fusinvsnmp']['processes'][33]="Queried";
$LANG['plugin_fusinvsnmp']['processes'][34]="In error";
$LANG['plugin_fusinvsnmp']['processes'][35]="Created connections";
$LANG['plugin_fusinvsnmp']['processes'][36]="Deleted connections";
$LANG['plugin_fusinvsnmp']['processes'][37]="IP total";

$LANG['plugin_fusinvsnmp']['state'][0]="Computer start";
$LANG['plugin_fusinvsnmp']['state'][1]="Computer stop";
$LANG['plugin_fusinvsnmp']['state'][2]="Benutzer Verbindung";
$LANG['plugin_fusinvsnmp']['state'][3]="Benutzer Trennung";

$LANG['plugin_fusinvsnmp']['mapping'][1]="Netzwerk > Standort";
$LANG['plugin_fusinvsnmp']['mapping'][2]="Netzwerk > Firmware";
$LANG['plugin_fusinvsnmp']['mapping'][3]="Netzwerk > Uptime";
$LANG['plugin_fusinvsnmp']['mapping'][4]="Netzwerk > Port > MTU";
$LANG['plugin_fusinvsnmp']['mapping'][5]="Netzwerk > Port > Geschwindigkeit";
$LANG['plugin_fusinvsnmp']['mapping'][6]="Netzwerk > Port > Interner Zustand";
$LANG['plugin_fusinvsnmp']['mapping'][7]="Netzwerk > Ports > Letzte &Auml;nderung";
$LANG['plugin_fusinvsnmp']['mapping'][8]="Netzwerk > Port > Anzahl eingegangene Bytes";
$LANG['plugin_fusinvsnmp']['mapping'][9]="Netzwerk > Port > Anzahl ausgehende Bytes";
$LANG['plugin_fusinvsnmp']['mapping'][10]="Netzwerk > Port > Anzahl Input Fehler";
$LANG['plugin_fusinvsnmp']['mapping'][11]="Netzwerk > Port > Anzahl Fehler Ausgehend";
$LANG['plugin_fusinvsnmp']['mapping'][12]="Netzwerk > CPU Auslastung";
$LANG['plugin_fusinvsnmp']['mapping'][13]="Netzwerk > Seriennummer";
$LANG['plugin_fusinvsnmp']['mapping'][14]="Netzwerk > Port > Verbingungszustand";
$LANG['plugin_fusinvsnmp']['mapping'][15]="Netzwerk > Port > MAC Adresse";
$LANG['plugin_fusinvsnmp']['mapping'][16]="Netzwerk > Port > Name";
$LANG['plugin_fusinvsnmp']['mapping'][17]="Netzwerk > Modell";
$LANG['plugin_fusinvsnmp']['mapping'][18]="Netzwerk > Ports > Typ";
$LANG['plugin_fusinvsnmp']['mapping'][19]="Netzwerk > VLAN";
$LANG['plugin_fusinvsnmp']['mapping'][20]="Netzwerk > Name";
$LANG['plugin_fusinvsnmp']['mapping'][21]="Netzwerk > Gesamter Speicher";
$LANG['plugin_fusinvsnmp']['mapping'][22]="Netzwerk > Freier Speicher";
$LANG['plugin_fusinvsnmp']['mapping'][23]="Netzwerk > Port > Port Bezeichnung";
$LANG['plugin_fusinvsnmp']['mapping'][24]="Drucker > Name";
$LANG['plugin_fusinvsnmp']['mapping'][25]="Drucker > Modell";
$LANG['plugin_fusinvsnmp']['mapping'][26]="Drucker > Gesamter Speicher";
$LANG['plugin_fusinvsnmp']['mapping'][27]="Drucker > Seriennummer";
$LANG['plugin_fusinvsnmp']['mapping'][28]="Drucker > Messung > Gesamtanzahl gedruckter Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][29]="Drucker > Messung > Gesamtanzahl gedrucker Schwarz/Wei&szlig; Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][30]="Drucker > Messung > Gesamtanzahl gedruckter Farbseiten";
$LANG['plugin_fusinvsnmp']['mapping'][31]="Drucker > Messung > Anzahl gedruckter Schwarz/Wei&szlig; Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][32]="Drucker > Messung > Anzahl gedruckter Farbseiten";
$LANG['plugin_fusinvsnmp']['mapping'][33]="Netzwerk > Port > Duplex Typ";
$LANG['plugin_fusinvsnmp']['mapping'][34]="Drucker > Verbrauchsmaterial > Schwarze Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][35]="Drucker > Verbrauchsmaterial > Schwarze Photo Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][36]="Drucker > Verbrauchsmaterial > Cyan Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][37]="Drucker > Verbrauchsmaterial > Gelbe Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][38]="Drucker > Verbrauchsmaterial > Magenta Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][39]="Drucker > Verbrauchsmaterial > Leicht Cyan Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][40]="Drucker > Verbrauchsmaterial > Leicht Magenta Kartusche (%)";
$LANG['plugin_fusinvsnmp']['mapping'][41]="Drucker > Verbrauchsmaterial > Photoleiter (%)";
$LANG['plugin_fusinvsnmp']['mapping'][42]="Drucker > Verbrauchsmaterial > Photoleiter Schwarz (%)";
$LANG['plugin_fusinvsnmp']['mapping'][43]="Drucker > Verbrauchsmaterial > Photoleiter Farbe (%)";
$LANG['plugin_fusinvsnmp']['mapping'][44]="Drucker > Verbrauchsmaterial > Photoleiter Cyan (%)";
$LANG['plugin_fusinvsnmp']['mapping'][45]="Drucker > Verbrauchsmaterial > Photoleiter Gelb (%)";
$LANG['plugin_fusinvsnmp']['mapping'][46]="Drucker > Verbrauchsmaterial > Photoleiter Magenta (%)";
$LANG['plugin_fusinvsnmp']['mapping'][47]="Drucker > Verbrauchsmaterial > Fixiereinheit Schwarz (%)";
$LANG['plugin_fusinvsnmp']['mapping'][48]="Drucker > Verbrauchsmaterial > Fixiereinheit Cyan (%)";
$LANG['plugin_fusinvsnmp']['mapping'][49]="Drucker > Verbrauchsmaterial > Fixiereinheit Gelb (%)";
$LANG['plugin_fusinvsnmp']['mapping'][50]="Drucker > Verbrauchsmaterial > Fixiereinheit Magenta (%)";
$LANG['plugin_fusinvsnmp']['mapping'][51]="Drucker > Verbrauchsmaterial > Abfalleimer (%)";
$LANG['plugin_fusinvsnmp']['mapping'][52]="Drucker > Verbrauchsmaterial > vier (%)";
$LANG['plugin_fusinvsnmp']['mapping'][53]="Drucker > Verbrauchsmaterial > Reinigungsmodul (%)";
$LANG['plugin_fusinvsnmp']['mapping'][54]="Drucker > Messung > Anzahl der gedruckten Duplex Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][55]="Drucker > Messung > Anzahl der gescannten Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][56]="Drucker > Standort";
$LANG['plugin_fusinvsnmp']['mapping'][57]="Drucker > Port > Name";
$LANG['plugin_fusinvsnmp']['mapping'][58]="Drucker > Port > MAC Adresse";
$LANG['plugin_fusinvsnmp']['mapping'][59]="Drucker > Verbrauchsmaterial > Schwarze Kartusche (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][60]="Drucker > Verbrauchsmaterial > Schwarze Kartusche (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][61]="Drucker > Verbrauchsmaterial > Cyan Kartusche (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][62]="Drucker > Verbrauchsmaterial > Cyan Kartusche (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][63]="Drucker > Verbrauchsmaterial > Gelbe Kartusche (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][64]="Drucker > Verbrauchsmaterial > Gelbe Kartusche (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][65]="Drucker > Verbrauchsmaterial > Aagenta Kartusche (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][66]="Drucker > Verbrauchsmaterial > Aagenta Kartusche (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][67]="Drucker > Verbrauchsmaterial > Leichtes Cyan Kartusche (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][68]="Drucker > Verbrauchsmaterial > Leichtes Cyan Kartusche (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][69]="Drucker > Verbrauchsmaterial > Leichtes Magenta Kartusche (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][70]="Drucker > Verbrauchsmaterial > Leichtes Magenta Kartusche (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][71]="Drucker > Verbrauchsmaterial > Photoleiter (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][72]="Drucker > Verbrauchsmaterial > Photoleiter (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][73]="Drucker > Verbrauchsmaterial > Schwarzer Photoleiter (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][74]="Drucker > Verbrauchsmaterial > Schwarzer Photoleiter (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][75]="Drucker > Verbrauchsmaterial > Farbiger Photoleiter (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][76]="Drucker > Verbrauchsmaterial > Farbiger Photoleiter (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][77]="Drucker > Verbrauchsmaterial > Cyan Photoleiter (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][78]="Drucker > Verbrauchsmaterial > Cyan Photoleiter (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][79]="Drucker > Verbrauchsmaterial > Gelber Photoleiter (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][80]="Drucker > Verbrauchsmaterial > Gelber Photoleiter (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][81]="Drucker > Verbrauchsmaterial > Magenta Photoleiter (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][82]="Drucker > Verbrauchsmaterial > Magenta Photoleiter (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][83]="Drucker > Verbrauchsmaterial > Schwarze Fixiereinheit (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][84]="Drucker > Verbrauchsmaterial > Schwarze Fixiereinheit (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][85]="Drucker > Verbrauchsmaterial > Cyan Fixiereinheit (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][86]="Drucker > Verbrauchsmaterial > Cyan Fixiereinheit (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][87]="Drucker > Verbrauchsmaterial > Gelbe Fixiereinheit (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][88]="Drucker > Verbrauchsmaterial > Gelbe Fixiereinheit (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][89]="Drucker > Verbrauchsmaterial > Magenta Fixiereinheit (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][90]="Drucker > Verbrauchsmaterial > Magenta Fixiereinheit (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][91]="Drucker > Verbrauchsmaterial > Abfalleimer (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][92]="Drucker > Verbrauchsmaterial > Abfalleimer (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][93]="Drucker > Verbrauchsmaterial > vier (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][94]="Drucker > Verbrauchsmaterial > vier (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][95]="Drucker > Verbrauchsmaterial > Reinigungsmodul (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][96]="Drucker > Verbrauchsmaterial > Reinigungsmodul (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][97]="Drucker > port > Typ";
$LANG['plugin_fusinvsnmp']['mapping'][98]="Drucker > Verbrauchsmaterial > Wartungsmodul (Maximal)";
$LANG['plugin_fusinvsnmp']['mapping'][99]="Drucker > Verbrauchsmaterial > Wartungsmodul (Verbleibend)";
$LANG['plugin_fusinvsnmp']['mapping'][400]="Drucker > Verbrauchsmaterial > Wartungsmodul (%)";
$LANG['plugin_fusinvsnmp']['mapping'][401]="Netzwerk > CPU Benutzer";
$LANG['plugin_fusinvsnmp']['mapping'][402]="Netzwerk > CPU System";
$LANG['plugin_fusinvsnmp']['mapping'][403]="Netzwerk > Kontakt";
$LANG['plugin_fusinvsnmp']['mapping'][404]="Netzwerk > Kommentar";
$LANG['plugin_fusinvsnmp']['mapping'][405]="Drucker > Kontakt";
$LANG['plugin_fusinvsnmp']['mapping'][406]="Drucker > Kommentar";
$LANG['plugin_fusinvsnmp']['mapping'][407]="Drucker > Port > IP Adresse";
$LANG['plugin_fusinvsnmp']['mapping'][408]="Netzwerk > Port > Nummerischer Index";
$LANG['plugin_fusinvsnmp']['mapping'][409]="Netzwerk > Adresse CDP";
$LANG['plugin_fusinvsnmp']['mapping'][410]="Netzwerk > Port CDP";
$LANG['plugin_fusinvsnmp']['mapping'][411]="Netzwerk > Port > trunk/tagged";
$LANG['plugin_fusinvsnmp']['mapping'][412]="Netzwerk > MAC Adressen Filter (dot1dTpFdbAddress)";
$LANG['plugin_fusinvsnmp']['mapping'][413]="Netzwerk > Physikalische Adressen im Speicher (ipNetToMediaPhysAddress)";
$LANG['plugin_fusinvsnmp']['mapping'][414]="Netzwerk > Instanzen des Ports (dot1dTpFdbPort)";
$LANG['plugin_fusinvsnmp']['mapping'][415]="Netzwerk > Verkn&uuml;pfung der Portnummerierung mit der id des Ports (dot1dBasePortIfIndex)";
$LANG['plugin_fusinvsnmp']['mapping'][416]="Drucker > Port > Indexnummer";
$LANG['plugin_fusinvsnmp']['mapping'][417]="Netzwerk > MAC Adresse";
$LANG['plugin_fusinvsnmp']['mapping'][418]="Drucker > Inventarnummer";
$LANG['plugin_fusinvsnmp']['mapping'][419]="Netzwerk > Inventarnummer";
$LANG['plugin_fusinvsnmp']['mapping'][420]="Drucker > Hersteller";
$LANG['plugin_fusinvsnmp']['mapping'][421]="Netzwerk > IP Adressen";
$LANG['plugin_fusinvsnmp']['mapping'][422]="Netzwerk > portVlanIndex";
$LANG['plugin_fusinvsnmp']['mapping'][423]="Drucker > Messung > Gesamtanzahl gedruckter Seiten (Druck)";
$LANG['plugin_fusinvsnmp']['mapping'][424]="Drucker > Messung > Gesamtanzahl gedruckter Schwarz/Wei&szlig; Seiten (Druck)";
$LANG['plugin_fusinvsnmp']['mapping'][425]="Drucker > Messung > Gesamtanzahl farbig gedruckter Seiten (Druck)";
$LANG['plugin_fusinvsnmp']['mapping'][426]="Drucker > Messung > Gesamtanzahl gedruckter Seiten (Kopie)";
$LANG['plugin_fusinvsnmp']['mapping'][427]="Drucker > Messung > Gesamtanzahl gedruckter Schwarz/Wei&szlig; Seite (Kopie)";
$LANG['plugin_fusinvsnmp']['mapping'][428]="Drucker > Messung > Gesamtanzahl farbig gedruckter Seiten (Kopie)";
$LANG['plugin_fusinvsnmp']['mapping'][429]="Drucker > Messung > Gesamtanzahl gedruckter Seiten (Fax)";
$LANG['plugin_fusinvsnmp']['mapping'][430]="networking > port > vlan";


$LANG['plugin_fusinvsnmp']['mapping'][101]="";
$LANG['plugin_fusinvsnmp']['mapping'][102]="";
$LANG['plugin_fusinvsnmp']['mapping'][103]="";
$LANG['plugin_fusinvsnmp']['mapping'][104]="MTU";
$LANG['plugin_fusinvsnmp']['mapping'][105]="Geschwindigkeit";
$LANG['plugin_fusinvsnmp']['mapping'][106]="Interer Status";
$LANG['plugin_fusinvsnmp']['mapping'][107]="Letze &Auml;nderung";
$LANG['plugin_fusinvsnmp']['mapping'][108]="Anzahl empfangener Bytes";
$LANG['plugin_fusinvsnmp']['mapping'][109]="Anzahl ausgehender Bytes";
$LANG['plugin_fusinvsnmp']['mapping'][110]="Anzahl input Fehler";
$LANG['plugin_fusinvsnmp']['mapping'][111]="Anzahl output Fehler";
$LANG['plugin_fusinvsnmp']['mapping'][112]="CPU Verwendung";
$LANG['plugin_fusinvsnmp']['mapping'][113]="";
$LANG['plugin_fusinvsnmp']['mapping'][114]="Verbindung";
$LANG['plugin_fusinvsnmp']['mapping'][115]="Interne MAC Adresse";
$LANG['plugin_fusinvsnmp']['mapping'][116]="Name";
$LANG['plugin_fusinvsnmp']['mapping'][117]="Model";
$LANG['plugin_fusinvsnmp']['mapping'][118]="Typ";
$LANG['plugin_fusinvsnmp']['mapping'][119]="VLAN";
$LANG['plugin_fusinvsnmp']['mapping'][128]="Gesamtanzahl gedruckte Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][129]="Anzahl gedruckter Schwarz/Wei&szlig; Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][130]="Anzahl gedruckter Farbeseiten";
$LANG['plugin_fusinvsnmp']['mapping'][131]="Anzahl gedruckter Graustufenseiten";
$LANG['plugin_fusinvsnmp']['mapping'][132]="Anzahl gedruckter Farbseiten";
$LANG['plugin_fusinvsnmp']['mapping'][134]="Schwarze Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][135]="Photoschwarz Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][136]="Cyan Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][137]="Gelbe Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][138]="Magenta Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][139]="Leichtes Cyan Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][140]="Leichtes Magenta Kartusche";
$LANG['plugin_fusinvsnmp']['mapping'][141]="Photoleiter";
$LANG['plugin_fusinvsnmp']['mapping'][142]="Black Photoleiter";
$LANG['plugin_fusinvsnmp']['mapping'][143]="Farbiger Photoleiter";
$LANG['plugin_fusinvsnmp']['mapping'][144]="Cyan Photoleiter";
$LANG['plugin_fusinvsnmp']['mapping'][145]="Gelber Photoleiter";
$LANG['plugin_fusinvsnmp']['mapping'][146]="Magenta Photoleiter";
$LANG['plugin_fusinvsnmp']['mapping'][147]="Schwarze Fixiereinheit";
$LANG['plugin_fusinvsnmp']['mapping'][148]="Cyan Fixiereinheit";
$LANG['plugin_fusinvsnmp']['mapping'][149]="Gelbe Fixiereinheit";
$LANG['plugin_fusinvsnmp']['mapping'][150]="Magenta Fixiereinheit";
$LANG['plugin_fusinvsnmp']['mapping'][151]="Abfalleimer";
$LANG['plugin_fusinvsnmp']['mapping'][152]="Vier";
$LANG['plugin_fusinvsnmp']['mapping'][153]="Reinigungsmodul";
$LANG['plugin_fusinvsnmp']['mapping'][154]="Anzahl gedruckter Duplexseiten";
$LANG['plugin_fusinvsnmp']['mapping'][155]="Anzahl gescannter Seiten";
$LANG['plugin_fusinvsnmp']['mapping'][156]="Wartungsmodul";
$LANG['plugin_fusinvsnmp']['mapping'][157]="Black toner";
$LANG['plugin_fusinvsnmp']['mapping'][158]="Cyan toner";
$LANG['plugin_fusinvsnmp']['mapping'][159]="Magenta toner";
$LANG['plugin_fusinvsnmp']['mapping'][160]="Yellow toner";
$LANG['plugin_fusinvsnmp']['mapping'][161]="Black drum";
$LANG['plugin_fusinvsnmp']['mapping'][162]="Cyan drum";
$LANG['plugin_fusinvsnmp']['mapping'][163]="Magenta drum";
$LANG['plugin_fusinvsnmp']['mapping'][164]="Yellow drum";
$LANG['plugin_fusinvsnmp']['mapping'][165]="Many informations grouped";
$LANG['plugin_fusinvsnmp']['mapping'][1423]="Gesamtanzahl gedruckter Seiten (Druck)";
$LANG['plugin_fusinvsnmp']['mapping'][1424]="Gesamtanzahl gedruckter Schwarz/Wei&szlig; Seiten (Druck)";
$LANG['plugin_fusinvsnmp']['mapping'][1425]="Gesamtanzahl farbig gedruckter Seiten (Druck)";
$LANG['plugin_fusinvsnmp']['mapping'][1426]="Gesamtanzahl gedruckter Seiten (Kopie)";
$LANG['plugin_fusinvsnmp']['mapping'][1427]="Gesamtanzahl gedruckter Schwarz/Wei&szlig; Seite (Kopie)";
$LANG['plugin_fusinvsnmp']['mapping'][1428]="Gesamtanzahl farbig gedruckter Seiten (Kopie)";
$LANG['plugin_fusinvsnmp']['mapping'][1429]="Gesamtanzahl gedruckter Seiten (Fax)";


$LANG['plugin_fusinvsnmp']['printer'][0]="Seiten";

$LANG['plugin_fusinvsnmp']['menu'][0]="Information about discovered devices";
$LANG['plugin_fusinvsnmp']['menu'][1]="Agent Konfiguration";
$LANG['plugin_fusinvsnmp']['menu'][2]="IP Bereich Konfiguration";
$LANG['plugin_fusinvsnmp']['menu'][3]="Menu";
$LANG['plugin_fusinvsnmp']['menu'][4]="Ubekanntes Ger&auml;t";
$LANG['plugin_fusinvsnmp']['menu'][5]="Switchs ports history";
$LANG['plugin_fusinvsnmp']['menu'][6]="Unused switchs ports";

$LANG['plugin_fusinvsnmp']['menu'][0]="Informationen &uuml;ber entdeckte Ger&auml;te";

$LANG['plugin_fusinvsnmp']['buttons'][0]="Entdecke";

$LANG['plugin_fusinvsnmp']['discovery'][0]="IP Bereich zum Scannen";
$LANG['plugin_fusinvsnmp']['discovery'][1]="Endeckte Ger&auml;te";
$LANG['plugin_fusinvsnmp']['discovery'][2]="is_active in the script automatically";
$LANG['plugin_fusinvsnmp']['discovery'][3]="Endecker";
$LANG['plugin_fusinvsnmp']['discovery'][4]="Serien Nummer";
$LANG['plugin_fusinvsnmp']['discovery'][5]="Anzahl importierter Ger&auml;te";
$LANG['plugin_fusinvsnmp']['discovery'][8]="Wenn ein Ger&auml;t ein leeres Feld bim ersten Kriterium bringt dann wird das zweite Benutzt.";
$LANG['plugin_fusinvsnmp']['discovery'][9]="Number of devices not imported because type non defined";

$LANG['plugin_fusinvsnmp']['iprange'][0]="Start des IP Bereichs";
$LANG['plugin_fusinvsnmp']['iprange'][1]="Ende des IP Bereichs";
$LANG['plugin_fusinvsnmp']['iprange'][2]="IP Bereiche";
$LANG['plugin_fusinvsnmp']['iprange'][3]="Abfrage";
$LANG['plugin_fusinvsnmp']['iprange'][4]="Incorrect IP address";
$LANG['plugin_fusinvsnmp']['iprange'][5]="Edit IP range";
$LANG['plugin_fusinvsnmp']['iprange'][6]="Create range IP";
$LANG['plugin_fusinvsnmp']['iprange'][7]="Bad IP";

$LANG['plugin_fusinvsnmp']['agents'][0]="SNMP Agent";
$LANG['plugin_fusinvsnmp']['agents'][2]="Number of threads used by core for querying devices";
$LANG['plugin_fusinvsnmp']['agents'][3]="Number of threads used by core for network discovery";
$LANG['plugin_fusinvsnmp']['agents'][4]="Last scan";
$LANG['plugin_fusinvsnmp']['agents'][5]="Agent version";
$LANG['plugin_fusinvsnmp']['agents'][6]="Lock";
$LANG['plugin_fusinvsnmp']['agents'][7]="Export agent configuration";
$LANG['plugin_fusinvsnmp']['agents'][9]="Advanced options";
$LANG['plugin_fusinvsnmp']['agents'][12]="Discovery Agent";
$LANG['plugin_fusinvsnmp']['agents'][13]="Query Agent";
$LANG['plugin_fusinvsnmp']['agents'][14]="Agent actions";
$LANG['plugin_fusinvsnmp']['agents'][15]="Agent state";
$LANG['plugin_fusinvsnmp']['agents'][16]="Initialized";
$LANG['plugin_fusinvsnmp']['agents'][17]="Agent is running";
$LANG['plugin_fusinvsnmp']['agents'][18]="Inventory has been received";
$LANG['plugin_fusinvsnmp']['agents'][19]="Inventory has been sended to OCS server";
$LANG['plugin_fusinvsnmp']['agents'][20]="Synchronisation between OCS and GLPI is running";
$LANG['plugin_fusinvsnmp']['agents'][21]="Inventory terminated";
$LANG['plugin_fusinvsnmp']['agents'][22]="Wait";
$LANG['plugin_fusinvsnmp']['agents'][23]="Computer link";
$LANG['plugin_fusinvsnmp']['agents'][24]="SNMP - Threads";
$LANG['plugin_fusinvsnmp']['agents'][25]="Agent(s)";

$LANG['plugin_fusinvsnmp']['task'][0]="Task";
$LANG['plugin_fusinvsnmp']['task'][1]="Task management";
$LANG['plugin_fusinvsnmp']['task'][2]="Action";
$LANG['plugin_fusinvsnmp']['task'][3]="Unit";
$LANG['plugin_fusinvsnmp']['task'][4]="Get now informations";
$LANG['plugin_fusinvsnmp']['task'][5]="Select OCS Agent";
$LANG['plugin_fusinvsnmp']['task'][6]="Get state";
$LANG['plugin_fusinvsnmp']['task'][7]="State";
$LANG['plugin_fusinvsnmp']['task'][8]="Ready";
$LANG['plugin_fusinvsnmp']['task'][9]="Not respond";
$LANG['plugin_fusinvsnmp']['task'][10]="Running... not available";
$LANG['plugin_fusinvsnmp']['task'][11]="Agent has been notified and begin running";
$LANG['plugin_fusinvsnmp']['task'][12]="Wake agent";
$LANG['plugin_fusinvsnmp']['task'][13]="Agent(s) unvailable";
$LANG['plugin_fusinvsnmp']['task'][14]="Planified on";
$LANG['plugin_fusinvsnmp']['task'][15]="Permanent task - Discovery";
$LANG['plugin_fusinvsnmp']['task'][16]="Permanent task - Inventory";

$LANG['plugin_fusinvsnmp']['constructdevice'][0]="Gestion des mib de matériel";
$LANG['plugin_fusinvsnmp']['constructdevice'][1]="Automatic creation of models";
$LANG['plugin_fusinvsnmp']['constructdevice'][2]="Generate discovery file";
$LANG['plugin_fusinvsnmp']['constructdevice'][3]="Delete models non used";
$LANG['plugin_fusinvsnmp']['constructdevice'][4]="Export all models";
$LANG['plugin_fusinvsnmp']['constructdevice'][5]="Re-create models comments";

$LANG['plugin_fusinvsnmp']['update'][0]="your history table have more than 300 000 entries, you must run this command to finish update : ";

$LANG['plugin_fusinvsnmp']['stats'][0]="Total counter";
$LANG['plugin_fusinvsnmp']['stats'][1]="pages per day";
$LANG['plugin_fusinvsnmp']['stats'][2]="Display";

?>