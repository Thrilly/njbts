<?php

if (!session_id())
    session_start();
$prod = ($_SERVER["HTTP_HOST"] == "localhost") ? 0 : 1;


if ($prod == 1) {
    $URL_HOME = "http://njts.ommli/mod";
    $ROOT_IMG = __DIR__ . '../img/';
    $TMP_IMG = __DIR__ . '../tmp/upload/';
    $TMP_URL = $URL_HOME . 'tmp/upload/';
    $PARAM_nom_bd = ''; //Nom de la BDD en prod
    $PARAM_hote = ''; // le chemin vers le serveur
    $PARAM_port = '3306';
    $PARAM_utilisateur = ''; // Nom d'utilisateur pour se connecter
    $PARAM_mot_passe = ''; // Mot de passe de l'utilisateur pour se connecter
}

if ($prod == 0) {
    $URL_HOME = "http://localhost/njts/module";
    $ROOT_IMG = __DIR__ . '/../img/';
    $TMP_IMG = __DIR__ . '/../tmp/upload/';
    $TMP_URL = $URL_HOME . 'tmp/upload/';
    $PARAM_nom_bd = 'njbts'; //Nom de la BDD en prod
    $PARAM_hote = 'localhost'; // Le chemin vers le serveur
    $PARAM_port = '3306';
    $PARAM_utilisateur = 'root'; // Nom d'utilisateur pour se connecter
    $PARAM_mot_passe = ''; // Mot de passe de l'utilisateur pour se connecter
}

$URL = "http://" . $_SERVER["HTTP_HOST"] . str_replace("//", "/", $_SERVER["SCRIPT_NAME"]);
$URL_CONNEXION = $URL_HOME . "index.php"; /* A modifier */

define("URL", $URL);
define("PROD",$prod);
define("URL_HOME", $URL_HOME);
define("ROOT_IMG", $ROOT_IMG);
define("TMP_IMG", $TMP_IMG);
define("TMP_URL", $TMP_URL);
define("PARAM_hote", $PARAM_hote);
define("PARAM_port", $PARAM_port);
define("PARAM_utilisateur", $PARAM_utilisateur);
define("PARAM_mot_passe", $PARAM_mot_passe);
define("PARAM_nom_bd", $PARAM_nom_bd);

include (__DIR__.'/code-affichage.php');
include (__DIR__ .'/../../1-class/fonctions.php');
include (__DIR__."/../../1-class/genos-complete.class.php");
include (__DIR__ .'/../../1-class/class.php');
include (__DIR__ .'/../1-fonction/fonction-user.php');
include (__DIR__ .'/../1-fonction/fonction.php');



