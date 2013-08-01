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
* 	@sql 3.x
*	@produced wikibyte labs
*
*	@lizense Copyright (developer sessions free)
*	@usermail mccouman@wikibyte.org
*	@contactmail support@wikibyte.org
* 
*/

Installation:
-------------------------------

0.) entpacke in ein Verzeichnis auf deinem Server 

1.) install die DB mit PhpMyAdmin und der Dump Datei: mailer.sql

2.) gebe die Daten in die db.php ein (www1/inc/db.php)



DAS SZENARION:
--------------------------------
In diesem Szenarion werden Nachrichten von Nutzern geschrieben
die mittels JsonMailer nachrichten austauschen. Dabei wird angenommen,
das die Software auf 2 unterschiedlichen Servern läuft. 

Dabei sendet Nutzer 1(Hubert) auf Server1 (hier mit www1 benannt)
eine Nachricht mittels JsonE-Mail.

Der Empfänger (McCouman) erhält diese Nachricht jedoch aus Server2,
der in diesem Falle (in unserem Szenario) wir dastellen.

Wir werden die Nachrichten von (Hubert und Roland) lesen können, 
jedoch werden dabei, keinerlei Daten auf unserem Server abspeichert.
Wie das funktioniert soll dieses System in einer kurzen Einsicht zeigen.



Der Sender (Serversimulation):
--------------------------------
Zum Auslesen einer Nachricht, die auf einem anderen Server 
für den Benutzer (auf unserem Server) vorliegt, wirde die 
Datei "www1" genutzt, diese simuliert für uns in diesem Test
den Server1 auf dem wir keinen Zugriff haben und somit die 
Daten nicht auslesen können.

Die Daten wurden dabei auf der Datenbank des (www1) Servers 
gespeichert, nicht jedoch auf unserem Server oder gar versendet! 

* Daher ist ein auslesen der Daten nicht so erst einmal nicht möglich. 

######################################################################
** BITTE BEACHTE DAS WIR IN DIESER SOFTWARE NOCH KEINE VERSCHLÜSSELUNG
NUTZEN. SO SIND DIE DATEN MIT DER API OFFEN EINSEHBAR, UM ZU VERSTEHEN
WIE DAS SYSTEM FUNKTIONIERT!
######################################################################



Der Test und seine Anweisung:
--------------------------------

0.) 	Gebe die Url ein: 
	(zum Pfad deines Ordners in dem JsonMail liegt)

=> zB.: http://localhost/<WEBMAILER>/



1.) 	Sehe dir den Sender genauer an und gebe dafür die URL ein: 
	

=> zB.: http://localhost/<WEBMAILER>/www1/sender



2.)	Lies deine Nachrichten aus:
	(in diesem Szenario nehmen wir an, wir wissen das wir eine
	Nachricht von Hubert und Roland bekommen haben)


	2a.)	gehe dafür auf die URL des Senders! und gebe die Namen 
		in die	URL ein:

	=> zB.: http://localhost/<WEBMAILER>/empfangen/Hubert


	2b.)	um eine weitere Nachricht zu lesen gebe die URL 
		von Roland ein:

	=> zB.: http://localhost/<WEBMAILER>/empfangen/Roland



3.) 	Als test kannst du dies auch mit einem Formular versuchen:

=> zB.: http://localhost/<WEBMAILER>/empfangen/index(test).html
