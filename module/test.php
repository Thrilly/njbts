<?php 
include ('0-config/config.php');
	// $g = new genos();
	// //**************************
	// $u = new upload();
	// $req1 = "SELECT u.id from UPLOAD u
	// 		INNER JOIN NEWS n on u.id_news = n.id
	// 		where n.suppr = 1";

	// $champs = array("id");
	// $lesUp = $u->ListeStruct($req1, $champs);
	// foreach ($lesUp as $unUp) {
	// 	$g->Sql("DELETE FROM UPLOAD WHERE id = ".$unUp['id']);
	// }
	// //**************************
	// $a = new activite();
	// $req2 = "SELECT na.id from NEWS_ACTIVITE na
	// 		INNER JOIN NEWS n on na.id_news = n.id
	// 		where n.suppr = 1";

	// $champs = array("id");
	// $lesA = $a->ListeStruct($req2, $champs);
	// foreach ($lesA as $uneA) {
	// 	$g->Sql("DELETE FROM NEWS_ACTIVITE WHERE id = ".$uneA['id']);
	// }
	// //**************************
	// $t = new territoire();
	// $req3 = "SELECT nt.id from NEWS_TERRITOIRE nt
	// 		INNER JOIN NEWS n on nt.id_news = n.id
	// 		where n.suppr = 1";

	// $champs = array("id");
	// $lesT = $t->ListeStruct($req3, $champs);
	// foreach ($lesT as $unT) {
	// 	$g->Sql("DELETE FROM NEWS_TERRITOIRE WHERE id = ".$unT['id']);
	// }

	// $g->Sql("DELETE FROM NEWS WHERE suppr = 1");

// $g = new genos();
// $g->Sql("DELETE FROM TERRITOIRE_ACTIVITE WHERE suppr = 1");
// $tabImg = array();
// 	$up = new upload();
// 	$rq = 'SELECT * FROM UPLOAD';
// 	$lt = $up->ListeChamps();
// 	$ls = $up->ListeStruct($rq, $lt);
// 	foreach ($ls as $key => $unUp) {
// 		$tabImg[$unUp["file"]] = "f";
// 	}
// 	$n = new news();
// 	$rq2 = 'SELECT * FROM NEWS';
// 	$lt2 = $n->ListeChamps();
// 	$ls2 = $n->ListeStruct($rq2, $lt2);
// 	foreach ($ls2 as $key => $uneImg) {
// 		$tabImg[$uneImg["img"]] = "f";
// 	}
// 	if($dossier = opendir('../upload')){
// 		while(false !== ($fichier = readdir($dossier))){
// 			if($fichier != '.' && $fichier != '..' && $fichier != 'logo_info.jpg'){
// 				if (!array_key_exists($fichier, $tabImg)){
// 					unlink( "../upload/".$fichier );
// 				}
// 			}
// 		}
// 	}

// var_dump($tabImg);

function getIp(){
$ip = ($ip = getenv('HTTP_FORWARDED_FOR')) ? $ip :
($ip = getenv('HTTP_X_FORWARDED_FOR'))     ? $ip :
($ip = getenv('HTTP_X_COMING_FROM'))       ? $ip :
($ip = getenv('HTTP_VIA'))                 ? $ip :
($ip = getenv('HTTP_XROXY_CONNECTION'))    ? $ip :
($ip = getenv('HTTP_CLIENT_IP'))           ? $ip :
($ip = getenv('REMOTE_ADDR'))              ? $ip :
'0.0.0.0';
return $ip;
}

echo getIp();
 ?>