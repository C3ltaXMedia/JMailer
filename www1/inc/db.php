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

//URL eingeben
$urlhoster = 'http://localhost/<JsonMailer - Ordner>';

//Datenbanken:
$mysql_hostname = "localhost";
$mysql_user 	= "your username";
$mysql_password = "your password";
$mysql_database = "your database";


################################ Ab hier nichts mehr ändern! ###################################################
//Datenbankverbuindung:
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
	  or die("
				Opps some thing went wrong
			");
//Tabellenverbindung:	
mysql_select_db($mysql_database, $bd)
or die("
		Opps some thing went wrong
	   ");
?>