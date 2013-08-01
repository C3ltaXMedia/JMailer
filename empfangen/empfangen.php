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
include('../www1/inc/db.php');

############# DATENBANKVERBINDUNG ##########################################
//URL
if($_GET['benutzername']) {
	
	//URL DB zum STRing
	$nameb=mysql_real_escape_string($_GET['benutzername']);
	$nameb=$nameb.'';
	
	//DATENBANK:
	$sql=mysql_query("SELECT url FROM mailer WHERE name='$nameb'");
	$count=mysql_num_rows($sql);
	$row=mysql_fetch_array($sql);

	//TABELLEN:
	$benutzerurl	=	$row['url'];
	#echo $_GET['benutzername'];

############# ERRORMELDUNG DB: #############################################
	} else {
					
			echo '404 Not URL Available.';

	} 
############# INPUT Test: #######################
#
if($count) {
#echo $benutzerurl;
} else {
echo 'fehler';
} 
#
#################################################


############### Json auslesen,umwandeln und ausgeben:
$jsonData = file_get_contents(.$urlhoster.'/www1/sender/index.php?url='.$benutzerurl.''); 
$suche1 = json_decode($jsonData, true);

############### Ausgabe: ###################################################################
//Variablen:
$a = $suche1["status"]; //0 (gelöcht),1 (kann man einsehen), 2(wurde gesehen)
$b = 1;

//kleiner als 1 (0) DANN => gelöscht!
if ( $a < $b ) { 
####################################### Wurde gelöscht ! ################################# ?>

<h1>Uoops : (  - Nachricht ist nicht mehr verfügbar! </h1>
<h3>Warscheinlich wurde sie vom Benutzer: <?php echo $suche1["sender"]["0"]; ?> entfernt oder gelöscht...</h3>

<?php 
//gleich 1 (1) DANN => Sendung!
} elseif ($a == $b) { 
####################################### Wird gesendet ! ################################# ?>
<h4>Sendezustand: </h4>
<?php echo 'Wird Empfangen'; ?>
<h4>Betref:</h4>  
<?php echo ''.$suche1["massage"]["0"]; echo '<br>'; ?>
<h4>Nachricht: </h4> 
<?php echo ''.$suche1["massage"]["1"]; echo '<br>'; ?>
<h4>Empfangen von:</h4> 
<?php echo ''.$suche1["sender"]["0"]; echo '<br>'; ?>
<h4>Wurde gesendet: </h4> <?php 
echo 'An Benutzer: '.$suche1["sender"]["1"]. ', <br>'; //Nutzername
echo 'Am: '.$suche1["sender"]["2"]. ' '; //Datum
echo 'um: '.$suche1["sender"]["3"]. 'Uhr'; //Uhrzeit
echo '<br>'; ?>

<?php
//größer 1 (2) DANN => Bitte löschen!
} elseif ($a > $b) { 
####################################### Wurde gesehen ! ################################# ?>

<h1>Nachricht Empfangen</h1>
<h2>Wurde durch Nutzer: <?php echo $suche1["sender"]["0"]; ?> eingesehen...</h2>
<p>Du kann diese Nachricht löschen wenn du diese nicht mehr benötigst!</p>


<hr />
<h1>Deine Nachricht war:</h1>
Betref:<br>
<input value="<?php echo ''.$suche1["massage"]["0"]; ?>" type="text" /><br>
Nachricht: <br>
<textarea><?php echo ''.$suche1["massage"]["1"]; ?></textarea><br>
Gesendet von:<br>
<input value="<?php echo ''.$suche1["sender"]["0"]; ?>" type="text" /><br>

Vom: <input value="<?php echo  $suche1["sender"]["2"]; ?>" type="text" />
Um: <input value="<?php echo $suche1["sender"]["3"]. 'Uhr'; ?>" type="text" />

<?php 
// Fehler in der Software
} else { 
####################################### Error ! ################################# 
?>
<h1>Es schein ein Problem mit dem Server zu geben!!</h1>
<?php } ?>