<?php 
	if (!function_exists('getallheaders')) 
	{ 
	    function getallheaders() 
	    { 
	       $headers = ''; 
	       foreach ($_SERVER as $name => $value) 
	       { 
	           if (substr($name, 0, 5) == 'HTTP_') 
	           { 
	               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
	           } 
	       } 
	       return $headers; 
	    } 
	} 
	
	function Extension($fichier){
		return(strrchr($fichier, "."));
	}

	function Retourne_Type_Mime($ext){
		$tab_type = array(
						'.jpg'  => 'image/jpeg',
						'.jpeg' => 'image/jpeg',
						'.png'  => 'image/png',
						'.gif'  => 'image/gif',
						'.tiff' => 'image/tiff',
						'.pdf'  => 'application/pdf',
						'.txt'  => 'text/plain',
						'.doc'  => 'application/msword',
						'.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
						'.xls'  => 'application/vnd.ms-excel',
						'.xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
						'.ppt'  => 'application/vnd.ms-powerpoint',
						'.xml'  => 'application/xml',
						'.zip'  => 'application/zip',
						'.csv'  => 'text/csv'
					);
		return($tab_type[$ext]);
	}
	
	function Retourne_Type_Mime_Drive($ext){
		$tab_type = array(
						'.jpg'  => 'image/jpeg',
						'.jpeg' => 'image/jpeg',
						'.png'  => 'image/png',
						'.gif'  => 'image/gif',
						'.tiff' => 'image/tiff',
						'.pdf'  => 'application/pdf',
						'.txt'  => 'text/plain',
						'.doc'  => 'application/msword',
						'.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
						'.xls'  => 'application/vnd.ms-excel',
						'.xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
						'.ppt'  => 'application/vnd.ms-powerpoint',
						'.xml'  => 'application/xml',
						'.zip'  => 'application/zip',
						'.csv'  => 'text/csv'
					);
		return($tab_type[$ext]);
	}

	function retourneLienIndex(){
		$lien = "";
		if(substr_count(URL,"1-modules") > 0){
			$lien = URL."/../../../";
		}else{
			$lien = URL."/../";
		}
		return ($lien);
	}

	function convDateTimeBdd($dateHeure){
		$date  = convDateBdd($dateHeure);
		$heure = strftime("%H",strtotime($dateHeure));
		$min   = strftime("%M",strtotime($dateHeure));
		$date .= " ".$heure.":".$min.":00";
		return $date;
	}

	function convDateTimeAffichage($dateHeure){
		$date  = convDateAffichage($dateHeure);
		$heure = strftime("%H",strtotime($dateHeure));
		$min   = strftime("%M",strtotime($dateHeure));
		$date .= " ".$heure.":".$min.":00";
		return $date;
	}

	function convDateRechMin($date){
		$date = convDateBdd($date);
		$date.= "T00:00:00.000Z";
		return($date);
	}

	function convDateRechMax($date){
		$date = convDateBdd($date);
		$date.= "T23:59:59.000Z";
		return($date);
	}

	function DiffDate($debut,$fin){
		// Date au format jj-mm-aaaa hh:mm
		$arg_list = func_get_args();
		$num_arg  = func_num_args();

		$debut = strtotime($debut);
		$fin   = strtotime($fin);
		$diff  = $fin - $debut;
		$res   = array();
		$res["s"] = $diff;
		$res["m"] = $diff / 60 ;
		$res["h"] = ($diff / 60) /60 ;
		$res["j"] = ($diff / 86400) ;

		if($num_arg == 3){
			return($res[$arg_list[2]]);
		}else{
			return $res;
		}
	}

	function DemainMinuit($date){
		$date_originale = $date;
		$date   = strtotime($date);
		$annee  = strftime("%Y" , $date);
		$mois   = strftime("%m" , $date);
		$jour   = strftime("%d" , $date);
		$date2  = date_create($annee."-".$mois."-".$jour);
		$date2  = date_add($date2, date_interval_create_from_date_string('1 days'));
		$minuit = date_format($date2, 'd-m-Y');
		return $minuit;
	}
	function DiffDateMinuit($date){
		// Date au format jj-mm-aaaa hh:mm
		$date_originale = $date;
		$date   = strtotime($date);
		$annee  = strftime("%Y" , $date);
		$mois   = strftime("%m" , $date);
		$jour   = strftime("%d" , $date);
		$date2  = date_create($annee."-".$mois."-".$jour);
		$date2  = date_add($date2, date_interval_create_from_date_string('1 days'));
		$minuit = date_format($date2, 'd-m-Y');
		return DiffDate($date_originale,$minuit);
	}

	function DiffMinuitDate($date){
		$date_originale = $date;
		$date   = strtotime($date);
		$annee  = strftime("%Y" , $date);
		$mois   = strftime("%m" , $date);
		$jour   = strftime("%d" , $date);
		$minuit = $jour."-".$mois."-".$annee." 00:00";
		return DiffDate($minuit,$date_originale);
	}
	function MemeJour($debut,$fin){
		$jdebut = strftime("%d",strtotime($debut));
		$jfin = strftime("%d",strtotime($fin));
		$res["debut"] = $jdebut;
		$res["fin"]   = $jfin;
		if($jdebut == $jfin) return true;
		if($jdebut != $jfin) return $res;
	}

	function DiffJours($date1, $date2){
		//Date 2 etant la date la plus elevée
		$date1 = convDateBdd($date1);
		$date2 = convDateBdd($date2);
		//On divise par 86400 car la difference est renvoyée en secondes
		$diff = (strtotime($date2) - strtotime($date1))/86400;
		return($diff);  
	}
	function RetourneMois($mois){
		// echo $mois;
		$tabMois["01"] = "Janvier";
		$tabMois["02"] = "Février";
		$tabMois["03"] = "Mars";
		$tabMois["04"] = "Avril";
		$tabMois["05"] = "Mai";
		$tabMois["06"] = "Juin";
		$tabMois["07"] = "Juillet";
		$tabMois["08"] = "Août";
		$tabMois["09"] = "Septembre";
		$tabMois["10"] = "Octobre";
		$tabMois["11"] = "Novembre";
		$tabMois["12"] = "Décembre";
		$tabMois["1"]  = "Janvier";
		$tabMois["2"]  = "Février";
		$tabMois["3"]  = "Mars";
		$tabMois["4"]  = "Avril";
		$tabMois["5"]  = "Mai";
		$tabMois["6"]  = "Juin";
		$tabMois["7"]  = "Juillet";
		$tabMois["8"]  = "Août";
		$tabMois["9"]  = "Septembre";
		return($tabMois[$mois]);
	}

	function RetourneMoisAbreg($mois){
		$tabMois["01"] = "Jan";
		$tabMois["02"] = "Fév";
		$tabMois["03"] = "Mars";
		$tabMois["04"] = "Avril";
		$tabMois["05"] = "Mai";
		$tabMois["06"] = "Juin";
		$tabMois["07"] = "Juil";
		$tabMois["08"] = "Août";
		$tabMois["09"] = "Sept";
		$tabMois["10"] = "Oct";
		$tabMois["11"] = "Nov";
		$tabMois["12"] = "Déc";
		$tabMois["1"]  = "Jan";
		$tabMois["2"]  = "Fév";
		$tabMois["3"]  = "Mars";
		$tabMois["4"]  = "Avril";
		$tabMois["5"]  = "Mai";
		$tabMois["6"]  = "Juin";
		$tabMois["7"]  = "Juil";
		$tabMois["8"]  = "Août";
		$tabMois["9"]  = "Sept";

		return($tabMois[$mois]);
	}

	function DiffMois($date1,$date2){
		$datetime1 = new DateTime($date1);
		$datetime2 = new DateTime($date2);
		$interval  = $datetime1->diff($datetime2);
		$result    = $interval->days/31;
		$result    = (is_int($result))? $result : intval($result + 1);
		return $result;
	}

	/********************************************************************/



	function convDateAffichage($date){
		// if($date != "0000-00-00"){
		// 	$annee = strftime("%Y",strtotime($date));
		// 	$mois = strftime("%m",strtotime($date));
		// 	$jour = strftime("%d",strtotime($date));
		// 	return($jour."-".$mois."-".$annee);
		// }else{return($date);}
		$date = trim($date);
		if(strlen($date) == 10){
			if($date != "0000-00-00"){
				$annee = strftime("%Y",strtotime($date));
				$mois = strftime("%m",strtotime($date));
				$jour = strftime("%d",strtotime($date));
				return($jour."/".$mois."/".$annee);
			 }else{return($date);}
		}

		if(strlen($date) == 19){
			if($date != "0000-00-00 00:00:00"){
				$annee = strftime("%Y",strtotime($date));
				$mois  = strftime("%m",strtotime($date));
				$jour  = strftime("%d",strtotime($date));

				$heure = strftime("%H",strtotime($date));
				$min   = strftime("%M",strtotime($date));
				$sec   = strftime("%S",strtotime($date));

				return($jour."-".$mois."-".$annee." ".$heure.":".$min.":".$sec);
			}else return($date);
		}
	}

	function convDateAffichage2($date){
		// if($date != "0000-00-00"){
			// $annee = strftime("%Y",strtotime($date));
			// $mois = strftime("%b",strtotime($date));
			// $jour = strftime("%d",strtotime($date));
			// return($jour." ".$mois." ".$annee);
		// }else{return($date);}

		$date = trim($date);
		if(strlen($date) == 10){
			if($date != "0000-00-00"){
				$annee = strftime("%Y",strtotime($date));
				$mois = strftime("%b",strtotime($date));
				$jour = strftime("%d",strtotime($date));
				return($jour."-".$mois."-".$annee);
			 }else{return($date);}
		}

		if(strlen($date) == 19){
			if($date != "0000-00-00 00:00:00"){
				$annee = strftime("%Y",strtotime($date));
				$mois  = strftime("%b",strtotime($date));
				$jour  = strftime("%d",strtotime($date));

				$heure = strftime("%H",strtotime($date));
				$min   = strftime("%M",strtotime($date));
				$sec   = strftime("%S",strtotime($date));

				return($jour." ".$mois." ".$annee." ".$heure."h ".$min."min ".$sec." sec");
			}else return($date);
		}
	}

	function convDateBdd($date){
		// if($date != "0000-00-00"){
			// $annee = strftime("%Y",strtotime($date));
			// $mois = strftime("%m",strtotime($date));
			// $jour = strftime("%d",strtotime($date));
			// return($annee."-".$mois."-".$jour);
		// }else{return($date);}
		$date = trim($date);
		if(strlen($date) == 10){
			if($date != "0000-00-00"){
				$annee = strftime("%Y",strtotime($date));
				$mois = strftime("%m",strtotime($date));
				$jour = strftime("%d",strtotime($date));
				return($annee."-".$mois."-".$jour);
			 }else{return($date);}
		}

		if(strlen($date) == 19){
			if($date != "0000-00-00 00:00:00"){
				$annee = strftime("%Y",strtotime($date));
				$mois  = strftime("%m",strtotime($date));
				$jour  = strftime("%d",strtotime($date));

				$heure = strftime("%H",strtotime($date));
				$min   = strftime("%M",strtotime($date));
				$sec   = strftime("%S",strtotime($date));

				return($annee."-".$mois."-".$jour." ".$heure.":".$min.":".$sec);
				
			}else return($date);
		}
	}

	function IsImg($img){
		$listeExtImg = array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG");
		$tabImg = explode(".", $img);
		$tabImg = array_reverse($tabImg);
		return $res = in_array($tabImg[0], $listeExtImg)? true : false;
	}

	function VerifExt($fichier,$ext){
		$decompFichier = explode(".",$fichier);
		$decompFichier = array_reverse($decompFichier);
		if($decompFichier[0] == $ext){ return true; }else{return false;}
	}

	function Cesure(){
		$arg_list = func_get_args();
		$num_arg  = func_num_args();
		$long = ($num_arg > 1)? $arg_list[1] : 200 ;
		$chaine = $arg_list[0];
		$chaine = strip_tags($chaine);
		if($long >= strlen($chaine)) return $chaine;
		$chaine = wordwrap($chaine, $long,"<br>");
		$pos = strpos($chaine, "<br>");
		$chaine = substr($chaine,0,$pos);
		if($pos !== false) $chaine .= "...";
		return $chaine;
	}

	function PageCourante(){
		$url = $_SERVER["PHP_SELF"];
		$tabUrl = explode("/", $url);
		$tabUrl = array_reverse($tabUrl);
		return $tabUrl[0];	
	}

	function Monnaie($montant){
		return number_format($montant, 2, ',', ' ');
	}

	function convTimeAffichage($time){
		$tab = explode(":",$time);
		$res = $tab[0]. " h ".$tab[1]. " min ";
		return $res;
	}

?>