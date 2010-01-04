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
// Original Author of file: David DURIEUX
// Purpose of file:
// ----------------------------------------------------------------------

$title="Tracker";
$version="2.1.3";

$LANG['plugin_tracker']["title"][0]="$title";
$LANG['plugin_tracker']["title"][1]="Informations SNMP";
$LANG['plugin_tracker']["title"][2]="Historique de connexion";
$LANG['plugin_tracker']["title"][3]="[Trk] Erreurs";
$LANG['plugin_tracker']["title"][4]="[Trk] Cron";
$LANG['plugin_tracker']["title"][5]="Verrous Tracker";

$LANG['plugin_tracker']['config'][0] = "Fréquence des inventaires (en heures)";
$LANG['plugin_tracker']['config'][1] = "Modules";
$LANG['plugin_tracker']['config'][2] = "Snmp";
$LANG['plugin_tracker']['config'][3] = "Inventaire OCS";
$LANG['plugin_tracker']['config'][4] = "Découverte d'équipements";
$LANG['plugin_tracker']['config'][5] = "Controle de l'agent à partir de GLPI";

$LANG['plugin_tracker']["profile"][0]="Gestion des droits";
$LANG['plugin_tracker']["profile"][1]="$title"; //interface

$LANG['plugin_tracker']["profile"][10]="Listes des profils déjà configurés";
$LANG['plugin_tracker']["profile"][11]="Historique Ordinateurs";
$LANG['plugin_tracker']["profile"][12]="Historique Imprimantes";
$LANG['plugin_tracker']["profile"][13]="Infos Imprimantes";
$LANG['plugin_tracker']["profile"][14]="Infos Réseau";
$LANG['plugin_tracker']["profile"][15]="Erreurs courantes";

$LANG['plugin_tracker']["profile"][16]="SNMP Réseaux";
$LANG['plugin_tracker']["profile"][17]="SNMP Périphériques";
$LANG['plugin_tracker']["profile"][18]="SNMP Imprimantes";
$LANG['plugin_tracker']["profile"][19]="Modèles SNMP";
$LANG['plugin_tracker']["profile"][20]="Authentification SNMP";
$LANG['plugin_tracker']["profile"][21]="Infos scripts";
$LANG['plugin_tracker']["profile"][22]="Découverte réseau";
$LANG['plugin_tracker']["profile"][23]="Configuration générale";
$LANG['plugin_tracker']["profile"][24]="Modèle SNMP";
$LANG['plugin_tracker']["profile"][25]="Plages IP";
$LANG['plugin_tracker']["profile"][26]="Agents";
$LANG['plugin_tracker']["profile"][27]="Infos agent";
$LANG['plugin_tracker']["profile"][28]="Rapport";

$LANG['plugin_tracker']["setup"][2]="Merci de vous placer sur l'entité racine (voir tous)";
$LANG['plugin_tracker']["setup"][3]="Configuration du plugin ".$title;
$LANG['plugin_tracker']["setup"][4]="Installer le plugin $title $version";
$LANG['plugin_tracker']["setup"][5]="Mettre à jour le plugin $title vers la version $version";
$LANG['plugin_tracker']["setup"][6]="Désinstaller le plugin $title $version";
$LANG['plugin_tracker']["setup"][8]="Attention, la désinstallation du plugin est irréversible.<br> Vous perdrez toutes les données.";
$LANG['plugin_tracker']["setup"][11]="Mode d'emploi";
$LANG['plugin_tracker']["setup"][12]="FAQ";
$LANG['plugin_tracker']["setup"][13]="Vérification des modules PHP nécessaires";
$LANG['plugin_tracker']["setup"][14]="L'extension snmp de PHP n'est pas chargée";
$LANG['plugin_tracker']["setup"][15]="L'extension runkit de PHP/PECL n'est pas chargée";
$LANG['plugin_tracker']["setup"][16]="Documentation";

$LANG['plugin_tracker']["functionalities"][0]="Fonctionnalités";
$LANG['plugin_tracker']["functionalities"][1]="Ajout / Suppression de fonctionnalités";
$LANG['plugin_tracker']["functionalities"][2]="Configuration générale";
$LANG['plugin_tracker']["functionalities"][3]="SNMP";
$LANG['plugin_tracker']["functionalities"][4]="Connexion";
$LANG['plugin_tracker']["functionalities"][5]="Script serveur";
$LANG['plugin_tracker']["functionalities"][6]="Légende";
$LANG['plugin_tracker']["functionalities"][7]="Champs verrouillables";

$LANG['plugin_tracker']["functionalities"][10]="Activation de l'historique";
$LANG['plugin_tracker']["functionalities"][11]="Activation du module connexion";
$LANG['plugin_tracker']["functionalities"][12]="Activation du module SNMP réseaux";
$LANG['plugin_tracker']["functionalities"][13]="Activation du module SNMP périphériques";
$LANG['plugin_tracker']["functionalities"][14]="Activation du module SNMP téléphones";
$LANG['plugin_tracker']["functionalities"][15]="Activation du module SNMP imprimantes";
$LANG['plugin_tracker']["functionalities"][16]="Stockage de l'authentification SNMP";
$LANG['plugin_tracker']["functionalities"][17]="Base de données";
$LANG['plugin_tracker']["functionalities"][18]="Fichiers";
$LANG['plugin_tracker']["functionalities"][19]="Veuillez configurer le stockage de l'authentification SNMP dans la configuration du plugin";
$LANG['plugin_tracker']["functionalities"][20]="Statut du matériel actif";
$LANG['plugin_tracker']["functionalities"][21]="Rétention de l'historique d'interconnexions entre matériels en jours (0 = infini)";
$LANG['plugin_tracker']["functionalities"][22]="Rétention de l'historique de changement d'état des ports (0 = infini)";
$LANG['plugin_tracker']["functionalities"][23]="Rétention de l'historique des adresses MAC inconnues (0 = infini)";
$LANG['plugin_tracker']["functionalities"][24]="Rétention de l'historique des erreurs SNMP (0 = infini)";
$LANG['plugin_tracker']["functionalities"][25]="Rétention de l'historique des processes des scripts (0 = infini)";
$LANG['plugin_tracker']["functionalities"][26]="URL de GLPI pour l'agent";
$LANG['plugin_tracker']["functionalities"][27]="SSL seulement pour l'agent";
$LANG['plugin_tracker']["functionalities"][28]="Configuration de l'historique";
$LANG['plugin_tracker']["functionalities"][29]="Liste des champs à historiser";

$LANG['plugin_tracker']["functionalities"][30]="Statut du matériel actif";
$LANG['plugin_tracker']["functionalities"][31]="Gestion des cartouches et du stock";
$LANG['plugin_tracker']["functionalities"][32]="Effacer les informations des process agent après";
$LANG['plugin_tracker']["functionalities"][36]="Fréquence de relevé des compteurs";

$LANG['plugin_tracker']["functionalities"][40]="Configuration";
$LANG['plugin_tracker']["functionalities"][41]="Statut du matériel actif";
$LANG['plugin_tracker']["functionalities"][42]="Commutateur";
$LANG['plugin_tracker']["functionalities"][43]="Authentification SNMP";

$LANG['plugin_tracker']["functionalities"][50]="Nombre de process simultanés pour la découverte réseau";
$LANG['plugin_tracker']["functionalities"][51]="Nombre de process simultanés pour l'interrogation SNMP";
$LANG['plugin_tracker']["functionalities"][52]="Activation des journaux";
$LANG['plugin_tracker']["functionalities"][53]="Nombre de process simultanés pour le script serveur de post-traitement";

$LANG['plugin_tracker']["functionalities"][60]="Nettoyage de l'historique";

$LANG['plugin_tracker']["functionalities"][70]="Configuration des champs verrouillables";
$LANG['plugin_tracker']["functionalities"][71]="Champs non verrouillables";
$LANG['plugin_tracker']["functionalities"][72]="Table";
$LANG['plugin_tracker']["functionalities"][73]="Champs";
$LANG['plugin_tracker']["functionalities"][74]="Valeurs";
$LANG['plugin_tracker']["functionalities"][75]="Verrous";

$LANG['plugin_tracker']["snmp"][0]="Informations SNMP du matériel";
$LANG['plugin_tracker']["snmp"][1]="Général";
$LANG['plugin_tracker']["snmp"][2]="Cablâge";
$LANG['plugin_tracker']["snmp"][2]="Données SNMP";

$LANG['plugin_tracker']["snmp"][11]="Informations supplémentaires";
$LANG['plugin_tracker']["snmp"][12]="Uptime";
$LANG['plugin_tracker']["snmp"][13]="Utilisation du CPU (en %)";
$LANG['plugin_tracker']["snmp"][14]="Utilisation de la mémoire (en %)";

$LANG['plugin_tracker']["snmp"][31]="Impossible de récupérer les infos SNMP : Ce n'est pas un commutateur !";
$LANG['plugin_tracker']["snmp"][32]="Impossible de récupérer les infos SNMP : Matériel non actif !";
$LANG['plugin_tracker']["snmp"][33]="Impossible de récupérer les infos SNMP : IP non précisée dans la base !";
$LANG['plugin_tracker']["snmp"][34]="Le commutateur auquel est reliée la machine n'est pas renseigné !";

$LANG['plugin_tracker']["snmp"][40]="Tableau des ports";
$LANG['plugin_tracker']["snmp"][41]="Description du port";
$LANG['plugin_tracker']["snmp"][42]="MTU";
$LANG['plugin_tracker']["snmp"][43]="Vitesse";
$LANG['plugin_tracker']["snmp"][44]="Statut Interne";
$LANG['plugin_tracker']["snmp"][45]="Dernier changement";
$LANG['plugin_tracker']["snmp"][46]="Nb d'octets recus";
$LANG['plugin_tracker']["snmp"][47]="Nb d'erreurs en entrée";
$LANG['plugin_tracker']["snmp"][48]="Nb d'octets envoyés";
$LANG['plugin_tracker']["snmp"][49]="Nb d'erreurs en réception";
$LANG['plugin_tracker']["snmp"][50]="Connexion";
$LANG['plugin_tracker']["snmp"][51]="Duplex";
$LANG['plugin_tracker']["snmp"][52]="Date dernier inventaire TRACKER";
$LANG['plugin_tracker']["snmp"][53]="Dernier inventaire";

$LANG['plugin_tracker']["snmpauth"][1]="Communauté";
$LANG['plugin_tracker']["snmpauth"][2]="Utilisateur";
$LANG['plugin_tracker']["snmpauth"][3]="Schéma d'authentification";
$LANG['plugin_tracker']["snmpauth"][4]="Protocole de cryptage pour authentification ";
$LANG['plugin_tracker']["snmpauth"][5]="Mot de passe";
$LANG['plugin_tracker']["snmpauth"][6]="Protocole de cryptage pour les données (écriture)";
$LANG['plugin_tracker']["snmpauth"][7]="Mot de passe (écriture)";

$LANG['plugin_tracker']["cron"][0]="Relevé automatique du compteur";
$LANG['plugin_tracker']["cron"][1]="Activer le relevé";
$LANG['plugin_tracker']["cron"][2]="";
$LANG['plugin_tracker']["cron"][3]="Défaut";

$LANG['plugin_tracker']["errors"][0]="Erreurs";
$LANG['plugin_tracker']["errors"][1]="IP";
$LANG['plugin_tracker']["errors"][2]="Description";
$LANG['plugin_tracker']["errors"][3]="Date 1er pb";
$LANG['plugin_tracker']["errors"][4]="Date dernier pb";

$LANG['plugin_tracker']["errors"][10]="Incohérence avec la base GLPI";
$LANG['plugin_tracker']["errors"][11]="Poste inconnu";
$LANG['plugin_tracker']["errors"][12]="IP inconnue";

$LANG['plugin_tracker']["errors"][20]="Erreur SNMP";
$LANG['plugin_tracker']["errors"][21]="Impossible de récupérer les informations";
$LANG['plugin_tracker']["errors"][22]="Elément inattendu dans";

$LANG['plugin_tracker']["errors"][30]="Erreur Câblage";
$LANG['plugin_tracker']["errors"][31]="Problème de câblage";

$LANG['plugin_tracker']["errors"][50]="La version de GLPI n'est pas compatible, vous avez besoin de la version 0.72.1";

$LANG['plugin_tracker']["errors"][101]="Timeout";
$LANG['plugin_tracker']["errors"][102]="Modele SNMP non assigné";
$LANG['plugin_tracker']["errors"][103]="Authentification SNMP non assigné";
$LANG['plugin_tracker']["errors"][104]="Message d'erreur";

$LANG['plugin_tracker']["history"][0] = "Ancienne";
$LANG['plugin_tracker']["history"][1] = "Nouvelle";
$LANG['plugin_tracker']["history"][2] = "Déconnexion";
$LANG['plugin_tracker']["history"][3] = "Connexion";

$LANG['plugin_tracker']["prt_history"][0]="Historique et Statistiques des compteurs imprimante";

$LANG['plugin_tracker']["prt_history"][10]="Statistiques des compteurs imprimante sur";
$LANG['plugin_tracker']["prt_history"][11]="jour(s)";
$LANG['plugin_tracker']["prt_history"][12]="Pages imprimées totales";
$LANG['plugin_tracker']["prt_history"][13]="Pages / jour";

$LANG['plugin_tracker']["prt_history"][20]="Historique des compteurs imprimante";
$LANG['plugin_tracker']["prt_history"][21]="Date";
$LANG['plugin_tracker']["prt_history"][22]="Compteur";


$LANG['plugin_tracker']["cpt_history"][0]="Historique des sessions";
$LANG['plugin_tracker']["cpt_history"][1]="Contact";
$LANG['plugin_tracker']["cpt_history"][2]="Ordinateur";
$LANG['plugin_tracker']["cpt_history"][3]="Utilisateur";
$LANG['plugin_tracker']["cpt_history"][4]="Etat";
$LANG['plugin_tracker']["cpt_history"][5]="Date";


$LANG['plugin_tracker']["type"][1]="Ordinateur";
$LANG['plugin_tracker']["type"][2]="Commutateur";
$LANG['plugin_tracker']["type"][3]="Imprimante";

$LANG['plugin_tracker']["rules"][1]="Règles";

$LANG['plugin_tracker']["massiveaction"][1]="Assigner un modèle SNMP";
$LANG['plugin_tracker']["massiveaction"][2]="Assigner une authentification SNMP";

$LANG['plugin_tracker']["model_info"][1]="Informations SNMP";
$LANG['plugin_tracker']["model_info"][2]="Version SNMP";
$LANG['plugin_tracker']["model_info"][3]="Authentification SNMP";
$LANG['plugin_tracker']["model_info"][4]="Modèles SNMP";
$LANG['plugin_tracker']["model_info"][5]="Gestion des MIB";
$LANG['plugin_tracker']["model_info"][6]="Edition de modèle SNMP";
$LANG['plugin_tracker']["model_info"][7]="Création de modèle SNMP";
$LANG['plugin_tracker']["model_info"][8]="Modèle déjà existant : import non effectué";
$LANG['plugin_tracker']["model_info"][9]="Import effectué avec succès";
$LANG['plugin_tracker']["model_info"][10]="Importation de modèle";
$LANG['plugin_tracker']["model_info"][11]="Activation";
$LANG['plugin_tracker']["model_info"][12]="Clé modèle pour la découverte";
$LANG['plugin_tracker']["model_info"][13]="Charger le bon modèle";
$LANG['plugin_tracker']["model_info"][14]="Charger le bon modèle SNMP";

$LANG['plugin_tracker']["mib"][1]="Label MIB";
$LANG['plugin_tracker']["mib"][2]="Objet";
$LANG['plugin_tracker']["mib"][3]="oid";
$LANG['plugin_tracker']["mib"][4]="Ajouter un oid...";
$LANG['plugin_tracker']["mib"][5]="Liste des oid";
$LANG['plugin_tracker']["mib"][6]="Compteur de ports";
$LANG['plugin_tracker']["mib"][7]="Port dynamique (.x)";
$LANG['plugin_tracker']["mib"][8]="Liaison champs";
$LANG['plugin_tracker']["mib"][9]="vlan";

$LANG['plugin_tracker']["processes"][0]="Informations sur l'exécution du script serveur";
$LANG['plugin_tracker']["processes"][1]="PID";
$LANG['plugin_tracker']["processes"][2]="Statut";
$LANG['plugin_tracker']["processes"][3]="Nombre de process";
$LANG['plugin_tracker']["processes"][4]="Date de début";
$LANG['plugin_tracker']["processes"][5]="Date de fin";
$LANG['plugin_tracker']["processes"][6]="Equipements réseau traités";
$LANG['plugin_tracker']["processes"][7]="Imprimantes traitées";
$LANG['plugin_tracker']["processes"][8]="Ports réseau traités";
$LANG['plugin_tracker']["processes"][9]="Erreurs";
$LANG['plugin_tracker']["processes"][10]="Durée totale";
$LANG['plugin_tracker']["processes"][11]="Champs ajoutés";
$LANG['plugin_tracker']["processes"][12]="Erreurs SNMP";
$LANG['plugin_tracker']["processes"][13]="MAC inconnues";
$LANG['plugin_tracker']["processes"][14]="Liste des adresse MAC inconnues";
$LANG['plugin_tracker']["processes"][15]="Premier PID";
$LANG['plugin_tracker']["processes"][16]="Dernier PID";
$LANG['plugin_tracker']["processes"][17]="Date de la première détection";
$LANG['plugin_tracker']["processes"][18]="Date de la dernière détection";
$LANG['plugin_tracker']["processes"][19]="Informations sur l'exécution des agents";
$LANG['plugin_tracker']["processes"][20]="Rapports / statistiques";
$LANG['plugin_tracker']["processes"][21]="Equipements interrogés";
$LANG['plugin_tracker']["processes"][22]="Erreurs";
$LANG['plugin_tracker']["processes"][23]="Durée totale de la découverte";
$LANG['plugin_tracker']["processes"][24]="Durée totale de l'interrogation";
$LANG['plugin_tracker']["processes"][25]="Agent";
$LANG['plugin_tracker']["processes"][26]="Découverte";
$LANG['plugin_tracker']["processes"][27]="Interrogation";
$LANG['plugin_tracker']["processes"][28]="Core";
$LANG['plugin_tracker']["processes"][29]="Threads";
$LANG['plugin_tracker']["processes"][30]="Découvert";
$LANG['plugin_tracker']["processes"][31]="Existant";
$LANG['plugin_tracker']["processes"][32]="Importé";
$LANG['plugin_tracker']["processes"][33]="Interrogé";
$LANG['plugin_tracker']["processes"][34]="En erreur";
$LANG['plugin_tracker']["processes"][35]="Connexions créés";
$LANG['plugin_tracker']["processes"][36]="Connexions supprimées";
$LANG['plugin_tracker']["processes"][37]="Total IP";

$LANG['plugin_tracker']["state"][0]="Démarrage de l'ordinateur";
$LANG['plugin_tracker']["state"][1]="Arrêt de l'ordinateur";
$LANG['plugin_tracker']["state"][2]="Connexion de l'utilisateur";
$LANG['plugin_tracker']["state"][3]="Déconnexion de l'utilisateur";


$LANG['plugin_tracker']["mapping"][1]="reseaux > lieu";
$LANG['plugin_tracker']["mapping"][2]="réseaux > firmware";
$LANG['plugin_tracker']["mapping"][3]="réseaux > uptime";
$LANG['plugin_tracker']["mapping"][4]="réseaux > port > mtu";
$LANG['plugin_tracker']["mapping"][5]="réseaux > port > vitesse";
$LANG['plugin_tracker']["mapping"][6]="réseaux > port > statut interne";
$LANG['plugin_tracker']["mapping"][7]="réseaux > port > Dernier changement";
$LANG['plugin_tracker']["mapping"][8]="réseaux > port > nombre d'octets entrés";
$LANG['plugin_tracker']["mapping"][9]="réseaux > port > nombre d'octets sortis";
$LANG['plugin_tracker']["mapping"][10]="réseaux > port > nombre d'erreurs entrées";
$LANG['plugin_tracker']["mapping"][11]="réseaux > port > nombre d'erreurs sorties";
$LANG['plugin_tracker']["mapping"][12]="réseaux > utilisation du CPU";
$LANG['plugin_tracker']["mapping"][13]="réseaux > numéro de série";
$LANG['plugin_tracker']["mapping"][14]="réseaux > port > statut de la connexion";
$LANG['plugin_tracker']["mapping"][15]="réseaux > port > adresse MAC";
$LANG['plugin_tracker']["mapping"][16]="réseaux > port > nom";
$LANG['plugin_tracker']["mapping"][17]="réseaux > modèle";
$LANG['plugin_tracker']["mapping"][18]="réseaux > port > type";
$LANG['plugin_tracker']["mapping"][19]="réseaux > VLAN";
$LANG['plugin_tracker']["mapping"][20]="réseaux > nom";
$LANG['plugin_tracker']["mapping"][21]="réseaux > mémoire totale";
$LANG['plugin_tracker']["mapping"][22]="réseaux > mémoire libre";
$LANG['plugin_tracker']["mapping"][23]="réseaux > port > description du port";
$LANG['plugin_tracker']["mapping"][24]="imprimante > nom";
$LANG['plugin_tracker']["mapping"][25]="imprimante > modèle";
$LANG['plugin_tracker']["mapping"][26]="imprimante > mémoire totale";
$LANG['plugin_tracker']["mapping"][27]="imprimante > numéro de série";
$LANG['plugin_tracker']["mapping"][28]="imprimante > compteur > nombre total de pages imprimées";
$LANG['plugin_tracker']["mapping"][29]="imprimante > compteur > nombre de pages noir et blanc imprimées";
$LANG['plugin_tracker']["mapping"][30]="imprimante > compteur > nombre de pages couleur imprimées";
$LANG['plugin_tracker']["mapping"][31]="imprimante > compteur > nombre de pages monochrome imprimées";
$LANG['plugin_tracker']["mapping"][32]="imprimante > compteur > nombre de pages bichromie imprimées";
$LANG['plugin_tracker']["mapping"][33]="réseaux > port > type de duplex";
$LANG['plugin_tracker']["mapping"][34]="imprimante > consommables > cartouche noir (%)";
$LANG['plugin_tracker']["mapping"][35]="imprimante > consommables > cartouche noir photo (%)";
$LANG['plugin_tracker']["mapping"][36]="imprimante > consommables > cartouche cyan (%)";
$LANG['plugin_tracker']["mapping"][37]="imprimante > consommables > cartouche jaune (%)";
$LANG['plugin_tracker']["mapping"][38]="imprimante > consommables > cartouche magenta (%)";
$LANG['plugin_tracker']["mapping"][39]="imprimante > consommables > cartouche cyan clair (%)";
$LANG['plugin_tracker']["mapping"][40]="imprimante > consommables > cartouche magenta clair (%)";
$LANG['plugin_tracker']["mapping"][41]="imprimante > consommables > photoconducteur (%)";
$LANG['plugin_tracker']["mapping"][42]="imprimante > consommables > photoconducteur noir (%)";
$LANG['plugin_tracker']["mapping"][43]="imprimante > consommables > photoconducteur couleur (%)";
$LANG['plugin_tracker']["mapping"][44]="imprimante > consommables > photoconducteur cyan (%)";
$LANG['plugin_tracker']["mapping"][45]="imprimante > consommables > photoconducteur jaune (%)";
$LANG['plugin_tracker']["mapping"][46]="imprimante > consommables > photoconducteur magenta (%)";
$LANG['plugin_tracker']["mapping"][47]="imprimante > consommables > unité de transfert noir (%)";
$LANG['plugin_tracker']["mapping"][48]="imprimante > consommables > unité de transfert cyan (%)";
$LANG['plugin_tracker']["mapping"][49]="imprimante > consommables > unité de transfert jaune (%)";
$LANG['plugin_tracker']["mapping"][50]="imprimante > consommables > unité de transfert magenta (%)";
$LANG['plugin_tracker']["mapping"][51]="imprimante > consommables > bac récupérateur de déchet (%)";
$LANG['plugin_tracker']["mapping"][52]="imprimante > consommables > four (%)";
$LANG['plugin_tracker']["mapping"][53]="imprimante > consommables > module de nettoyage (%)";
$LANG['plugin_tracker']["mapping"][54]="imprimante > compteur > nombre de pages recto/verso imprimées";
$LANG['plugin_tracker']["mapping"][55]="imprimante > compteur > nombre de pages scannées";
$LANG['plugin_tracker']["mapping"][56]="imprimante > lieu";
$LANG['plugin_tracker']["mapping"][57]="imprimante > port > nom";
$LANG['plugin_tracker']["mapping"][58]="imprimante > port > adresse MAC";
$LANG['plugin_tracker']["mapping"][59]="imprimante > consommables > cartouche noir (encre max)";
$LANG['plugin_tracker']["mapping"][60]="imprimante > consommables > cartouche noir (encre restant)";
$LANG['plugin_tracker']["mapping"][61]="imprimante > consommables > cartouche cyan (encre max)";
$LANG['plugin_tracker']["mapping"][62]="imprimante > consommables > cartouche cyan (encre restant)";
$LANG['plugin_tracker']["mapping"][63]="imprimante > consommables > cartouche jaune (encre max)";
$LANG['plugin_tracker']["mapping"][64]="imprimante > consommables > cartouche jaune (encre restant)";
$LANG['plugin_tracker']["mapping"][65]="imprimante > consommables > cartouche magenta (encre max)";
$LANG['plugin_tracker']["mapping"][66]="imprimante > consommables > cartouche magenta (encre restant)";
$LANG['plugin_tracker']["mapping"][67]="imprimante > consommables > cartouche cyan clair (encre max)";
$LANG['plugin_tracker']["mapping"][68]="imprimante > consommables > cartouche cyan clair (encre restant)";
$LANG['plugin_tracker']["mapping"][69]="imprimante > consommables > cartouche magenta clair (encre max)";
$LANG['plugin_tracker']["mapping"][70]="imprimante > consommables > cartouche magenta clair (encre restant)";
$LANG['plugin_tracker']["mapping"][71]="imprimante > consommables > photoconducteur (encre max)";
$LANG['plugin_tracker']["mapping"][72]="imprimante > consommables > photoconducteur (encre restant)";
$LANG['plugin_tracker']["mapping"][73]="imprimante > consommables > photoconducteur noir (encre max)";
$LANG['plugin_tracker']["mapping"][74]="imprimante > consommables > photoconducteur noir (encre restant)";
$LANG['plugin_tracker']["mapping"][75]="imprimante > consommables > photoconducteur couleur (encre max)";
$LANG['plugin_tracker']["mapping"][76]="imprimante > consommables > photoconducteur couleur (encre restant)";
$LANG['plugin_tracker']["mapping"][77]="imprimante > consommables > photoconducteur cyan (encre max)";
$LANG['plugin_tracker']["mapping"][78]="imprimante > consommables > photoconducteur cyan (encre restant)";
$LANG['plugin_tracker']["mapping"][79]="imprimante > consommables > photoconducteur jaune (encre max)";
$LANG['plugin_tracker']["mapping"][80]="imprimante > consommables > photoconducteur jaune (encre restant)";
$LANG['plugin_tracker']["mapping"][81]="imprimante > consommables > photoconducteur magenta (encre max)";
$LANG['plugin_tracker']["mapping"][82]="imprimante > consommables > photoconducteur magenta (encre restant)";
$LANG['plugin_tracker']["mapping"][83]="imprimante > consommables > unité de transfert noir (encre max)";
$LANG['plugin_tracker']["mapping"][84]="imprimante > consommables > unité de transfert noir (encre restant)";
$LANG['plugin_tracker']["mapping"][85]="imprimante > consommables > unité de transfert cyan (encre max)";
$LANG['plugin_tracker']["mapping"][86]="imprimante > consommables > unité de transfert cyan (encre restant)";
$LANG['plugin_tracker']["mapping"][87]="imprimante > consommables > unité de transfert jaune (encre max)";
$LANG['plugin_tracker']["mapping"][88]="imprimante > consommables > unité de transfert jaune (encre restant)";
$LANG['plugin_tracker']["mapping"][89]="imprimante > consommables > unité de transfert magenta (encre max)";
$LANG['plugin_tracker']["mapping"][90]="imprimante > consommables > unité de transfert magenta (encre restant)";
$LANG['plugin_tracker']["mapping"][91]="imprimante > consommables > bac récupérateur de déchet (encre max)";
$LANG['plugin_tracker']["mapping"][92]="imprimante > consommables > bac récupérateur de déchet (encre restant)";
$LANG['plugin_tracker']["mapping"][93]="imprimante > consommables > four (encre max)";
$LANG['plugin_tracker']["mapping"][94]="imprimante > consommables > four (encre restant)";
$LANG['plugin_tracker']["mapping"][95]="imprimante > consommables > module de nettoyage (encre max)";
$LANG['plugin_tracker']["mapping"][96]="imprimante > consommables > module de nettoyage (encre restant)";
$LANG['plugin_tracker']["mapping"][97]="imprimante > port > type";
$LANG['plugin_tracker']["mapping"][98]="imprimante > consommables > Kit de maintenance (max)";
$LANG['plugin_tracker']["mapping"][99]="imprimante > consommables > Kit de maintenance (restant)";
$LANG['plugin_tracker']["mapping"][400]="imprimante > consommables > Kit de maintenance (%)";
$LANG['plugin_tracker']["mapping"][401]="réseaux > CPU user";
$LANG['plugin_tracker']["mapping"][402]="réseaux > CPU système";
$LANG['plugin_tracker']["mapping"][403]="réseaux > contact";
$LANG['plugin_tracker']["mapping"][404]="réseaux > description";
$LANG['plugin_tracker']["mapping"][405]="imprimante > contact";
$LANG['plugin_tracker']["mapping"][406]="imprimante > description";
$LANG['plugin_tracker']["mapping"][407]="imprimante > port > adresse IP";
$LANG['plugin_tracker']["mapping"][408]="réseaux > port > numéro index";
$LANG['plugin_tracker']["mapping"][409]="réseaux > Adresse CDP";
$LANG['plugin_tracker']["mapping"][410]="réseaux > port CDP";
$LANG['plugin_tracker']["mapping"][411]="réseaux > statut port Trunk";
$LANG['plugin_tracker']["mapping"][412]="réseaux > Adresses mac filtrées (dot1dTpFdbAddress)";
$LANG['plugin_tracker']["mapping"][413]="réseaux > adresses physiques mémorisées (ipNetToMediaPhysAddress)";
$LANG['plugin_tracker']["mapping"][414]="réseaux > instances de ports (dot1dTpFdbPort)";
$LANG['plugin_tracker']["mapping"][415]="réseaux > numéro de ports associé ID du port (dot1dBasePortIfIndex)";
$LANG['plugin_tracker']["mapping"][416]="imprimante > port > numéro index";
$LANG['plugin_tracker']["mapping"][417]="réseaux > adresse MAC";
$LANG['plugin_tracker']["mapping"][418]="imprimante > numéro d'inventaire";
$LANG['plugin_tracker']["mapping"][419]="réseaux > numéro d'inventaire";
$LANG['plugin_tracker']["mapping"][420]="imprimante > fabricant";
$LANG['plugin_tracker']["mapping"][421]="réseaux > addresses IP";
$LANG['plugin_tracker']["mapping"][422]="réseaux > portVlanIndex";
$LANG['plugin_tracker']["mapping"][423]="imprimante > compteur > nombre total de pages imprimées (impression)";
$LANG['plugin_tracker']["mapping"][424]="imprimante > compteur > nombre de pages noir et blanc imprimées (impression)";
$LANG['plugin_tracker']["mapping"][425]="imprimante > compteur > nombre de pages couleur imprimées (impression)";
$LANG['plugin_tracker']["mapping"][426]="imprimante > compteur > nombre total de pages imprimées (copie)";
$LANG['plugin_tracker']["mapping"][427]="imprimante > compteur > nombre de pages noir et blanc imprimées (copie)";
$LANG['plugin_tracker']["mapping"][428]="imprimante > compteur > nombre de pages couleur imprimées (copie)";
$LANG['plugin_tracker']["mapping"][429]="imprimante > compteur > nombre total de pages imprimées (fax)";
$LANG['plugin_tracker']["mapping"][430]="réseaux > port > vlan";


$LANG['plugin_tracker']["mapping"][101]="";
$LANG['plugin_tracker']["mapping"][102]="";
$LANG['plugin_tracker']["mapping"][103]="";
$LANG['plugin_tracker']["mapping"][104]="MTU";
$LANG['plugin_tracker']["mapping"][105]="Vitesse";
$LANG['plugin_tracker']["mapping"][106]="Statut Interne";
$LANG['plugin_tracker']["mapping"][107]="Dernier changement";
$LANG['plugin_tracker']["mapping"][108]="Nb d'octets recus";
$LANG['plugin_tracker']["mapping"][109]="Nb d'octets envoyés";
$LANG['plugin_tracker']["mapping"][110]="Nb d'erreurs en entrée";
$LANG['plugin_tracker']["mapping"][111]="Nb d'erreurs en sortie";
$LANG['plugin_tracker']["mapping"][112]="Utilisation du CPU";
$LANG['plugin_tracker']["mapping"][113]="";
$LANG['plugin_tracker']["mapping"][114]="Connexion";
$LANG['plugin_tracker']["mapping"][115]="MAC interne";
$LANG['plugin_tracker']["mapping"][116]="Nom";
$LANG['plugin_tracker']["mapping"][117]="Modèle";
$LANG['plugin_tracker']["mapping"][118]="Type";
$LANG['plugin_tracker']["mapping"][119]="VLAN";
$LANG['plugin_tracker']["mapping"][128]="Nombre total de pages imprimées";
$LANG['plugin_tracker']["mapping"][129]="Nombre de pages noir et blanc imprimées";
$LANG['plugin_tracker']["mapping"][130]="Nombre de pages couleur imprimées";
$LANG['plugin_tracker']["mapping"][131]="Nombre de pages monochrome imprimées";
$LANG['plugin_tracker']["mapping"][132]="Nombre de pages bichromie imprimées";
$LANG['plugin_tracker']["mapping"][134]="Cartouche noir";
$LANG['plugin_tracker']["mapping"][135]="Cartouche noir photo";
$LANG['plugin_tracker']["mapping"][136]="Cartouche cyan";
$LANG['plugin_tracker']["mapping"][137]="Cartouche jaune";
$LANG['plugin_tracker']["mapping"][138]="Cartouche magenta";
$LANG['plugin_tracker']["mapping"][139]="Cartouche cyan clair";
$LANG['plugin_tracker']["mapping"][140]="Cartouche magenta clair";
$LANG['plugin_tracker']["mapping"][141]="Photoconducteur";
$LANG['plugin_tracker']["mapping"][142]="Photoconducteur noir";
$LANG['plugin_tracker']["mapping"][143]="Photoconducteur couleur";
$LANG['plugin_tracker']["mapping"][144]="Photoconducteur cyan";
$LANG['plugin_tracker']["mapping"][145]="Photoconducteur jaune";
$LANG['plugin_tracker']["mapping"][146]="Photoconducteur magenta";
$LANG['plugin_tracker']["mapping"][147]="Unité de transfert noir";
$LANG['plugin_tracker']["mapping"][148]="Unité de transfert cyan";
$LANG['plugin_tracker']["mapping"][149]="Unité de transfert jaune";
$LANG['plugin_tracker']["mapping"][150]="Unité de transfert magenta";
$LANG['plugin_tracker']["mapping"][151]="Bac récupérateur de déchet";
$LANG['plugin_tracker']["mapping"][152]="Four";
$LANG['plugin_tracker']["mapping"][153]="Module de nettoyage";
$LANG['plugin_tracker']["mapping"][154]="Nombre de pages recto/verso imprimées";
$LANG['plugin_tracker']["mapping"][155]="Nombre de pages scannées";
$LANG['plugin_tracker']["mapping"][156]="Kit de maintenance";
$LANG['plugin_tracker']["mapping"][1423]="Nombre total de pages imprimées (impression)";
$LANG['plugin_tracker']["mapping"][1424]="Nombre de pages noir et blanc imprimées (impression)";
$LANG['plugin_tracker']["mapping"][1425]="Nombre de pages couleur imprimées (impression)";
$LANG['plugin_tracker']["mapping"][1426]="Nombre total de pages imprimées (copie)";
$LANG['plugin_tracker']["mapping"][1427]="Nombre de pages noir et blanc imprimées (copie)";
$LANG['plugin_tracker']["mapping"][1428]="Nombre de pages couleur imprimées (copie)";
$LANG['plugin_tracker']["mapping"][1429]="Nombre total de pages imprimées (fax)";


$LANG['plugin_tracker']["printer"][0]="pages";

$LANG['plugin_tracker']["menu"][0]="Découverte de matériel réseau";
$LANG['plugin_tracker']["menu"][1]="Gestion des agents";
$LANG['plugin_tracker']["menu"][2]="Plages IP";
$LANG['plugin_tracker']["menu"][3]="Menu";
$LANG['plugin_tracker']["menu"][4]="Matériel inconnu";
$LANG['plugin_tracker']["menu"][5]="Historique des ports de switchs";
$LANG['plugin_tracker']["menu"][6]="Ports de switchs inutilisés";

$LANG['plugin_tracker']["buttons"][0]="Découvrir";

$LANG['plugin_tracker']["discovery"][0]="Plage d'ip à scanner";
$LANG['plugin_tracker']["discovery"][1]="Liste du matériel découvert";
$LANG['plugin_tracker']["discovery"][2]="² dans le script en automatique";
$LANG['plugin_tracker']["discovery"][3]="Découverte";
$LANG['plugin_tracker']["discovery"][4]="Numéros de série";
$LANG['plugin_tracker']["discovery"][5]="Nombre de matériels importés";
$LANG['plugin_tracker']["discovery"][6]="Critères d'existence";
$LANG['plugin_tracker']["discovery"][7]="Critères d'existence secondaires";
$LANG['plugin_tracker']["discovery"][8]="Si tous les critères d'existence se confrontent à des champs vides, vous pouvez sélectionner des critères secondaires.";
$LANG['plugin_tracker']["discovery"][9]="Nombre de matériels non importés car type non défini";

$LANG['plugin_tracker']["rangeip"][0]="Début de la plage IP";
$LANG['plugin_tracker']["rangeip"][1]="Fin de la plage IP";
$LANG['plugin_tracker']["rangeip"][2]="Plage IP";
$LANG['plugin_tracker']["rangeip"][3]="Interrogation";

$LANG['plugin_tracker']["agents"][0]="Agent SNMP";
$LANG['plugin_tracker']["agents"][2]="Threads interrogation (par coeur)";
$LANG['plugin_tracker']["agents"][3]="Threads découverte (par coeur)";
$LANG['plugin_tracker']["agents"][4]="Dernière remontée";
$LANG['plugin_tracker']["agents"][5]="Version de l'agent";
$LANG['plugin_tracker']["agents"][6]="Verrouillage";
$LANG['plugin_tracker']["agents"][7]="Export config agent";
$LANG['plugin_tracker']["agents"][8]="Fragments en Ko";
$LANG['plugin_tracker']["agents"][9]="Options avancées";
$LANG['plugin_tracker']["agents"][10]="Coeurs (CPU) interrogation";
$LANG['plugin_tracker']["agents"][11]="Coeurs (CPU) découverte";
$LANG['plugin_tracker']["agents"][12]="Agent découverte";
$LANG['plugin_tracker']["agents"][13]="Agent interrogation";

$LANG['plugin_tracker']["unknown"][0]="Nom DNS";
$LANG['plugin_tracker']["unknown"][1]="Nom port réseau";
$LANG['plugin_tracker']["unknown"][2]="Matériel approuvé";

$LANG['plugin_tracker']["task"][0]="Tâche";
$LANG['plugin_tracker']["task"][1]="Gestion des tâches";

?>