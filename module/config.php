<?php

if (!session_id())
    session_start();
$prod = ($_SERVER["HTTP_HOST"] == "localhost") ? 0 : 1;


if ($prod == 1) {
    $URL_HOME = "http://www.avocatvla.fr/";
    $ROOT_IMG = __DIR__ . '../img/';
    $TMP_IMG = __DIR__ . '../tmp/upload/';
    $TMP_URL = $URL_HOME . 'tmp/upload/';
    $PARAM_nom_bd = 'vla-dev'; //Nom de la BDD en prod
    $PARAM_hote = 'localhost'; // le chemin vers le serveur
    $PARAM_port = '3306';
    // $PARAM_nom_bd='IVTEC-PROD'; // le nom de votre base de données
    $PARAM_utilisateur = 'root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe = ''; // mot de passe de l'utilisateur pour se connecter
}

if ($prod == 0) {
    $URL_HOME = "http://localhost/avocatvla/";
    $ROOT_IMG = __DIR__ . '/../img/';
    $ROOT_IMG_URL = $URL_HOME . '/img/';
    $TMP_IMG = __DIR__ . '/../tmp/upload/';
    $TMP_URL = $URL_HOME . 'tmp/upload/';
    $PARAM_nom_bd = 'vla-dev'; //Nom de la BDD en prod
    $PARAM_hote = 'localhost'; // le chemin vers le serveur
    $PARAM_port = '3306';
    // $PARAM_nom_bd='IVTEC-PROD'; // le nom de votre base de données
    $PARAM_utilisateur = 'root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe = ''; // mot de passe de l'utilisateur pour se connecter
}

$URL = "http://" . $_SERVER["HTTP_HOST"] . str_replace("//", "/", $_SERVER["SCRIPT_NAME"]);
$URL_CONNEXION = $URL_HOME . "index.php"; /* A modifier */

define("URL", $URL);
define("URL_HOME", $URL_HOME);
define("ROOT_IMG", $ROOT_IMG);
//define("ROOT_IMG_URL", $ROOT_IMG_URL);
define("TMP_IMG", $TMP_IMG);
define("TMP_URL", $TMP_URL);
define("PARAM_hote", $PARAM_hote);
define("PARAM_port", $PARAM_port);
define("PARAM_utilisateur", $PARAM_utilisateur);
define("PARAM_mot_passe", $PARAM_mot_passe);
define("PARAM_nom_bd", $PARAM_nom_bd);

require '/../0-class/class.php';
require 'fonction-user.php';
require 'fonction.php';

