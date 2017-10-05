<?php 
	if(!session_id()) session_start();
	
	$prod = ($_SERVER["HTTP_HOST"] == "localhost") ? 0 : 1;	
	if($prod == 1) $URL_HOME = "http://njbts.000webhostapp.com/maintenance.php";
	if($prod == 0) $URL_HOME = "http://localhost/njbts/maintenance.php";
	
	// BDD GLOBALE
	include(__DIR__."/connexion.php");


	$URL = "http://".$_SERVER["HTTP_HOST"].str_replace("//", "/", $_SERVER["SCRIPT_NAME"]);
	$URL_CONNEXION = $URL_HOME."login.php";

	define("PROD",$prod);
	define("URL",$URL);
	define("URL_HOME",$URL_HOME);
	define("URL_CONNEXION",$URL_CONNEXION);

	include(__DIR__."/code-affichage.php");	
	include(__DIR__."/../1-class/genos-complete.class.php");
	include(__DIR__."/../2-data/fonctions.php");

?>