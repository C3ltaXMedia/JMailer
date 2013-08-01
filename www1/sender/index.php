<?php 
/** ####   ACHTUNG DIES IST EINE DEVELOPER SOFTWARE!!! ####
*
*  JsonMailer ist eine simple Software um Daten auszutaschen 
*  über mehrere Server, ohne Daten auf andere Server zu speichern.
*
*  Diese Software wurde entwickelt von Michael McCouman jr.
*
*	@file empfangen.php
*	@copyright Michael McCouman jr.
* 	@php 5.3
*	@produced wikibyte labs
*
*	@lizense Copyright (developer sessions free)
*	@usermail mccouman@wikibyte.org
*	@contactmail support@wikibyte.org
* 
*/

//INC DB
include('../inc/db.php');

//URL
if($_GET['url']) {
	
	//URL DB zum STRing
	$url=mysql_real_escape_string($_GET['url']);
	$url=$url.'';
	
	//DATENBANK:
	$sql=mysql_query("SELECT name, betreff, nachricht, von, an, datum, uhr, sendezustand FROM mailer WHERE url='$url'");
	$count=mysql_num_rows($sql);
	$row=mysql_fetch_array($sql);

	//TABELLEN:
	$senderbenutzer	=	$row['name'];
	$betreffzeile	=	$row['betreff'];
	$message		=	$row['nachricht'];
	$zuuser			=	$row['von'];
	$anuser			=	$row['an'];
	$date			=	$row['datum'];
	$time    		=	$row['uhr'];
	$zustand 		=	$row['sendezustand'];
	$hoster 		= 	'wikibyte.org';

############# ERRORMELDUNG DB: ############
	} else {
					
			echo '404 Not URL Available.';

	} 

############# INPUT: #######################
#
if($count) {


#Erstellen von Json:
$obj = new stdClass();
$obj->benutzer = $senderbenutzer;
$obj->massage = array($betreffzeile, $message);
$obj->sender = array($zuuser, $anuser, $date, $time, $hoster);
$obj->status = $zustand; // Sendestatus

//Ausgabe auf der Seite
$output = json_encode($obj);
echo ($output);

#
## INPUT: ##################################


## ERROR URL: ##############################
#
} else {
echo ($output);
} 
?>