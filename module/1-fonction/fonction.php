


<?php
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function getOption($id){
	$o = new configuration();
	$res = "SELECT value FROM CONFIGURATION WHERE id = ".$id;
	$champs = array ("value");
	$res = $o->ListeStruct($res, $champs);
	return $res[0]['value'];
	
}

function updateOption(){
	$o = new configuration();
	$o->id = 1;
	$o->Charger();
	$o->value = $_POST['bg-select'];
	$o->Modifier();
	$o = null;

	$c = new configuration();
	$c->id = 2;
	$c->Charger();
	$c->value = $_POST['nbActu-select'];
	$c->Modifier();
	$c = null;

	$c = new configuration();
	$c->id = 3;
	$c->Charger();
	if (isset($_POST['mail'])){
		$c->value = $_POST['mail'];
	}
	
	$c->Modifier();
	$c = null;
}

function clearNews(){
	$g = new genos();
	//**************************
	$u = new upload();
	$req1 = "SELECT u.id, from UPLOAD u
			INNER JOIN NEWS n on u.id_news = n.id
			where n.suppr = 1";

	$champs = array("id");
	$lesUp = $u->ListeStruct($req1, $champs);
	foreach ($lesUp as $unUp) {
		$g->Sql("DELETE FROM UPLOAD WHERE id = ".$unUp['id']);
	}
	//**************************
	$a = new activite();
	$req2 = "SELECT na.id from NEWS_ACTIVITE na
			INNER JOIN NEWS n on na.id_news = n.id
			where n.suppr = 1";

	$champs = array("id");
	$lesA = $a->ListeStruct($req2, $champs);
	foreach ($lesA as $uneA) {
		$g->Sql("DELETE FROM NEWS_ACTIVITE WHERE id = ".$uneA['id']);
	}
	//**************************
	$t = new territoire();
	$req3 = "SELECT nt.id from NEWS_TERRITOIRE nt
			INNER JOIN NEWS n on nt.id_news = n.id
			where n.suppr = 1";

	$champs = array("id");
	$lesT = $t->ListeStruct($req3, $champs);
	foreach ($lesT as $unT) {
		$g->Sql("DELETE FROM NEWS_TERRITOIRE WHERE id = ".$unT['id']);
	}

	$g->Sql("DELETE FROM NEWS WHERE suppr = 1");
}

function clearData(){
	$g = new genos();
	$g->Sql("DELETE FROM TERRITOIRE_ACTIVITE WHERE suppr = 1");
	
	$tabImg = array();

	$up = new upload();
	$rq = 'SELECT * FROM UPLOAD';
	$lt = $up->ListeChamps();
	$ls = $up->ListeStruct($rq, $lt);
	foreach ($ls as $key => $unUp) {
		$tabImg[$unUp["file"]] = "f";
	}
	$n = new news();
	$rq2 = 'SELECT * FROM NEWS';
	$lt2 = $n->ListeChamps();
	$ls2 = $n->ListeStruct($rq2, $lt2);
	foreach ($ls2 as $key => $uneImg) {
		$tabImg[$uneImg["img"]] = "f";
	}

	if ($dossier = opendir('../upload')){
		while(false !== ($fichier = readdir($dossier))){
			if($fichier != '.' && $fichier != '..' && $fichier != 'logo_info.jpg'){
				if (!array_key_exists($fichier, $tabImg)){
					unlink( "../upload/".$fichier );
				}
			}
		}
	}
}

function countBgBackOfiice(){
	$i=0;
	if ($dossier = opendir('../img/back-office')){
		while(false !== ($fichier = readdir($dossier))){
			if($fichier != '.' && $fichier != '..'){
				$i++;
			}
		}
	}
	return $i;
}


?>