<?php 

function getMois($num=null){
	$tabMois = array(
		12 => 'Decembre',
		11 => 'Novembre',
		10 => 'Octobre',
		9 => 'Septembre',
		8 => 'Août',
		7 => 'Juillet',
		6 => 'Juin',
		5 => 'Mai',
		4 => 'Avril',
		3 => 'Mars',
		2 => 'Fevrier',
		1 => 'Janvier',
		0 => 'MOIS NON RENSEIGN&Eacute;',
		);

	if (is_null($num)){
		return $tabMois;
	}else{
		return $tabMois[num];
	}
	
}

function mailing(){
    // if ($_POST['name']==""){ //HoneyPot
        $to      = "joachi_n@etna-alternance.net";
        $subject = "Message NJBTS";
        $message = $_POST["msg"]."<br><br>".$_POST["pnom"]." ".$_POST["nom"]."<br>".$_POST["tel"]."<br><br>"."** Message reçu via le site internet NJBTS **";
        $headers = 'From: '.$_POST["pnom"]." ".$_POST["nom"].' <'.$_POST["email"].'>'.PHP_EOL;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
     	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        mail($to, $subject, $message, $headers);   
        
    // }
	
}
