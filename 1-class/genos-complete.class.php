<?php 
	/********************************************************************************************/
	/*******							GENOS v1.0										*********/
	/********************************************************************************************/
	class bdd{
		public $connexion;
		function __construct(){				
			$this->connexion = new PDO('mysql:host='.PARAM_hote.';port='.PARAM_port.';dbname='.PARAM_nom_bd, PARAM_utilisateur, PARAM_mot_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}

		public function get(){
			return($this->connexion);
		}
		// Important les tables sont en majuscules sur les systemes UNIX !
		//Retourne un tableau contenant le noms des champs d'une table

		public function ListeChamps(){
			// On cherche a connaitre la class qui appelle la methode
			// sachant que class = table
			$table  = strtoupper(get_class($this));
			$req    = "SHOW COLUMNS FROM ".$table ;
			$result = $this->connexion->prepare($req);
			
			if($result->execute()){
				while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){ 
					$tabResult[]   = $ligneResult['Field'];
				}//Fin de While
				return $tabResult;
			} //Fin de if
		}

		public function ListeTypeChamps(){
			$table  = strtoupper(get_class($this));
			$req    = "SHOW COLUMNS FROM ".$table ;
			$result = $this->connexion->prepare($req);
			
			if($result->execute()){
				while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){ 
					$tabResult[]   = $ligneResult['Type'];
				}//Fin de While
				return $tabResult;
			} //Fin de if
		}

	}// Fin de class BDD

	class genos extends bdd{		
		public $id; 					//int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant',
		public $actif; 					//tinyint(1) NOT NULL,
		public $suppr; 					//tinyint(1) NOT NULL,
		// public $code; 					//varchar(20) NOT NULL COMMENT 'Code',
		// public $intitule; 				//varchar(50) NOT NULL COMMENT 'Intitulé',
		// public $date_enreg; 			//timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date d''enregistrement',
		// public $date_crea; 				//date NOT NULL COMMENT 'Date de création',
		// public $date_maj; 				//date NOT NULL COMMENT 'Date de mise à jour',
		// public $auteur_crea; 			//varchar(20) NOT NULL COMMENT 'Auteur de création',
		// public $auteur_maj; 			//varchar(20) NOT NULL COMMENT 'Auteur de modification',
		// public $commentaire; 			//text NOT NULL COMMENT 'Commentaire',

		function __construct(){	
			parent::__construct();
			
			$this->id = 0;
			$this->actif = 1;
			$this->suppr = 0;
			// $this->code = "";
			// $this->intitule = ""; 
			// $this->date_enreg = "";
			// $this->date_crea = date("Y-m-d");
			// $this->date_maj = "0000-00-00";
			// $this->auteur_crea = (isset($_SESSION["id_login"])) ? $_SESSION["id_login"] : "";
			// $this->auteur_maj = ""; 
			// $this->commentaire = "";

		
		}

		public function Charger(){
			try{
				$listeChamps 	 = $this->ListeChamps();
				$listeTypeChamps = $this->ListeTypeChamps();
				$class 		 	 = get_class($this);
				$table  	 	 = strtoupper(get_class($this));

				$req    	 	 = "SELECT * FROM ".$table." WHERE id = ".intval($this->id) ;
				$result 	 	 = $this->connexion->prepare($req);			
				if($result->execute()){
					$ligneResult = $result->fetch(PDO::FETCH_ASSOC);
					foreach ($listeChamps as $key => $champs) {
						if(property_exists($class, $champs)){
							$this->$champs = $ligneResult[$champs];
							if($listeTypeChamps[$key] == "date" || $listeTypeChamps[$key] == "datetime"){
								$this->$champs = convDateAffichage($ligneResult[$champs]);
							}

							// if($listeTypeChamps[$key] == "double"){
							// 	$this->$champs = str_replace(".", ",", $ligneResult[$champs]);
							// }
							
						}
					}//Fin foreach				
				}//Fin de Execute
			}
			catch(PDOException $e){
				$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
				exit($msg);
			}	
		}//Fin de la methode Charger

		public function Ajouter(){
			try{
				$listeChamps 	 = $this->ListeChamps();
				$listeTypeChamps = $this->ListeTypeChamps();
				$class 		 	 = get_class($this);
				$table  	 	 = strtoupper(get_class($this));
			
				$req2 = $req  = "INSERT INTO ".$table." (";
				
				foreach ($listeChamps as $key => $champs) {
					if(($champs != "id") && ($listeTypeChamps[$key] != "timestamp")){
						$req .= $champs.",";
						// $req2.=	$champs.",";				
					}
				}//Fin de foreach

				$req .= ") VALUES (";
				// $req2 .= ") VALUES (";
				foreach ($listeChamps as $key => $champs) {
					if(($champs != "id") && ($listeTypeChamps[$key] != "timestamp")){
						$req .= ":".$champs.",";
						// $req2 .= "'".$this->$champs."',";
						$tabBindage[$champs] = $this->$champs;
						if($listeTypeChamps[$key] == "date" || $listeTypeChamps[$key] == "datetime"){
							if($this->$champs == ""){
								$temp = new $class;
								$this->$champs = $temp->$champs;
							}
							$tabBindage[$champs] = convDateBdd($this->$champs);
						}
					}
				}//Fin de foreach
				$req .= ");";			
				$req  = str_replace(",)", ")", $req);	
				// $req2 .= ");";			
				// $req2  = str_replace(",)", ")", $req2);	
				
				echo $req;
				$req  = $this->connexion->prepare($req);
				var_dump($tabBindage);
				// $req->execute($tabBindage);
				if(!$req->execute($tabBindage)){
					echo "Désolé nous n'avons pas pu traité le formulaire";
					return false;
				}else{
					$this->id = $this->connexion->lastInsertId();
					return $this->id;
				}
			}
			catch(PDOException $e){
				$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
				exit($msg);
			}
		} // Fin methode Ajouter

		public function Modifier(){
			try{
				$listeChamps 	 = $this->ListeChamps();
				$listeTypeChamps = $this->ListeTypeChamps();
				$class 		 	 = get_class($this);
				$table  	 	 = strtoupper(get_class($this));

				$this->date_maj  = date("Y-m-d");
				$this->auteur_modif = (isset($_SESSION["id_login"])) ? $_SESSION["id_login"] : "";
				// $this->auteur_modif = $_SESSION["id"]." | ".$_SESSION["nom"]." ".$_SESSION["prenom"];

				$req  = "UPDATE ".$table." set ";
				foreach ($listeChamps as $key => $champs) {
					if(($champs != "id")){
						$req .= $champs . " = :".$champs." ,";
						$tabBindage[$champs] = $this->$champs;
						if($listeTypeChamps[$key] == "date" || $listeTypeChamps[$key] == "datetime"){
							if($this->$champs == ""){
								$temp = new $class;
								$this->$champs = $temp->$champs;
							}							
							$tabBindage[$champs] = convDateBdd($this->$champs);
						}
					}
				}//Fin de foreach

				$req .= "WHERE id = :id";
				$tabBindage["id"] = intval($this->id);

				$req = str_replace(",WHERE", " WHERE ", $req);
				$req  = $this->connexion->prepare($req);
				return ($req->execute($tabBindage)) ? true : false;
			}
			catch(PDOException $e){
				$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
				exit($msg);
			}
		}

		public function Supprimer(){
			$table = strtoupper(get_class($this));
			$req = "UPDATE ".$table." set suppr = 1 WHERE id = ".intval($this->id);
			$req  = $this->connexion->prepare($req);
			if(!$req->execute()) return false;
			else {
				$this->suppr = 1;
				return true;
			}
		}

		public function Activer(){
			$table = strtoupper(get_class($this));
			$req   = "UPDATE ".$table." set actif = 1 WHERE id = ".intval($this->id);
			$req   = $this->connexion->prepare($req);
			if(!$req->execute()) return false;
			else {
				$this->actif = 1;
				return true;
			}
		}

		public function Desactiver(){
			$table = strtoupper(get_class($this));
			$req   = "UPDATE ".$table." set actif = 0 WHERE id = ".intval($this->id);
			$req   = $this->connexion->prepare($req);
			if(!$req->execute()) return false;
			else {
				$this->actif = 0;
				return true;
			}
		}
		
		public function ChargerForm(){
			// si un argument alors c'est qu on prefixe les name du formulaire
			$nbArgs 		= func_num_args();
			$list_Args 		= func_get_args();
			$class 	  		= get_class($this);
			$table    		= strtoupper(get_class($this));
			$listeAttributs = array_keys(get_object_vars($this));
			

			if(empty($_POST)) echo "Désolé aucun formulaire n'a été soumis !";

			if(!empty($_POST)){
				if($nbArgs == 0){
					foreach ($_POST as $key => $value) {					
						if (in_array($key, $listeAttributs)) {
							$this->$key = $_POST[$key];
							if(gettype($_POST[$key]) == "double"){
								str_replace(",", ".", $this->$key);
							}
						}					
					}
				}

				if($nbArgs == 1){
					$prefixe = $liste_Args[0];
					foreach ($_POST as $key => $value) {
						$key = str_replace($prefixe, "", $key); //on enleve le prefixe					
						if (in_array($key, $listeAttributs)) {
							$this->$key = $_POST[$prefixe.$key];
							if(gettype($_POST[$prefixe.$key]) == "double"){
								str_replace(",", ".", $this->$key);
							}
						}					
					}
				}
			}			
		}

		public function ChargerTab($tab){
			/************************************************************/
			/*****   Charger un tableau de structure dans un obj    *****/
			/************************************************************/

			$class 	  		= get_class($this);
			$table    		= strtoupper(get_class($this));
			$listeAttributs = array_keys(get_object_vars($this));
			
			if(empty($tab)) echo "Désolé votre tableau est vide !";

			if(!empty($tab)){
				// var_dump($tab);
				foreach ($tab as $key => $value) {					
					if (in_array($key, $listeAttributs)) {
						$this->$key = $tab[$key];
						if(gettype($tab[$key]) == "double"){
							str_replace(",", ".", $this->$key);
						}
						
						if(strpos($key, "date") !== false){
							$this->$key = convDateAffichage($tab[$key]);
						}

						if(strpos($key, "datetime") !== false){
							$this->$key = convDateAffichage($tab[$key]);
						}
					}					
				}
			}			
		}
		
		public function ChargerObj($obj){
			//Charge les attributs de l'objet passé en commun
			//Si 2 parametres on copie les attributs du premier parametre dans le deuxieme
			$nbArgs = func_num_args();
			$list_Args = func_get_args();
			if($nbArgs == 1){
				foreach ($this as $key => $value) {
					if(isset($obj->$key)) $this->$key = $obj->$key;
				}
			}

			if($nbArgs == 2){
				$obj2 = $list_Args[1];
				foreach ($obj2 as $key => $value) {
					if(isset($obj->$key)) $obj2->$key = $obj->$key;
				}
				return $obj2;
			}

		}
		public function Sql($requete){
			$arg_list = func_get_args();
			$num_arg  = func_num_args();			

			$class 	  = get_class($this);
			$table    = strtoupper(get_class($this));
			$result   = $this->connexion->prepare($requete);

			if($num_arg > 1){
				foreach ($arg_list as $key => $value) {
					if($key != 0){
						if(is_array($value)){
							$tabBindage = $value;
						}else{
							$retour = $value;
						}
					}
				}
			}
			
			if((isset($tabBindage)) ? $result->execute($tabBindage) : $result->execute()){
				if(($num_arg > 1) && (isset($retour))){
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						$tabId[] = $ligneResult[$retour];
					}
					return ($tabId);
				}
			}//Fin de l execution
			
		}

		public function ListeId($requete){
			$arg_list = func_get_args();
			$num_arg  = func_num_args();

			if($num_arg == 2 && !is_array($arg_list[1])) return false;

			$class 	  = get_class($this);
			$table    = strtoupper(get_class($this));
			$result   = $this->connexion->prepare($requete);

			$tabId = array();
			if($num_arg == 2){ //Avec bindage
				if($result->execute($arg_list[1])){
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						$tabId[] = $ligneResult["id"];
					}
					return ($tabId);
				}//Fin de l execution
			}else{ //Sans bindage
				if($result->execute()){
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						$tabId[] = $ligneResult["id"];
					}
					return ($tabId);
				}//Fin de l execution
			}			
		}

		public function ListeChamps(){
			$class  = get_class($this);
			$table  = strtoupper(get_class($this));

			$req 	= "SHOW FIELDS FROM $table";
			$resReq = $this->ListeStruct($req,array("Field"));
			$res = array();
			foreach ($resReq as $key => $ligne) {
				$res[] = $ligne["Field"];
			}
			return $res;
		}

		public function ListeStruct($requete,$tab){
			// $tab correspond à tableau decrivant les champs que l'on souhaite recevoir
			// Si un des parametres a la valeur json on retourne le resultat en json
			// Si un des parametres optionnels est un tableau c est que c est un tableau de bindage
			$arg_list = func_get_args();
			$num_arg  = func_num_args();
			$json     = 0;
			if($num_arg > 4) return false;
			if($num_arg > 2){
				foreach ($arg_list as $key => $value) {
					if($key > 1) {
						if($value == "json") $json = 1;
						// var_dump($value);
						if(is_array($value)) $tabBindage = $value;
					}
				}
			}
			$class 	  = get_class($this);
			$table    = strtoupper(get_class($this));
			$result   = $this->connexion->prepare($requete);

			$listeStruct = array();
			if(isset($tabBindage)){
				if($result->execute($tabBindage)){
					// var_dump($result);
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						$struct      = array();
						// var_dump($ligneResult);
						foreach ($tab as $key => $value) {
							$struct[$value] = $ligneResult[$value]; 
						}
					
						$listeStruct[] = $struct;
						unset($struct);
					}
					// return ($listeStruct);
				}//Fin de l execution
			} else{
				if($result->execute()){
					// var_dump($result);
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						$struct      = array();
						// var_dump($ligneResult);
						foreach ($tab as $key => $value) {
							$struct[$value] = $ligneResult[$value]; 
						}
					
						$listeStruct[] = $struct;
						unset($struct);
					}
					// return ($listeStruct);
				}//Fin de l execution
			}
			return ($json == 0)? $listeStruct : json_encode($listeStruct);
			
		}

		/*********** A faire *******************************/
		public function ListeTab($tab){
			if(!is_array($tab)) return false;

		}
		/***************************************************/
		
		public function Liste(){
			/*********				READ ME 		***********/
				// Minimum 2 paramètres
			 	// Premier parametre = le nom du select qui sera dans le $_POST
				// Deuxieme paramètre = le champs dont on veut retourner la valeur
			    // Autres paramètres = Liste des champs à afficher dans la liste déroulante
			    // Si le dernier champs est un entier alors on préselectionne l'id
				// Faire un tableau pour gerer les order by
				// Si dans le tableau avec l'order by nous avons une cle sql c est une requete a executer
				// Si dans le tableau nous avons une cle bind c'est que le contenu est un tableau de bindage
				// Si dans le tableau nous avons une cle class 
				// Si dans le tableau nous avons une clé preselect ce sera le champs par defaut
				// Si dans le tableau nous avons une clé preselectVal la valeur par defaut du champs preselect
				// Si dans le tableau nous avons une clé attr il faut passer un tableau en valeur dont la clé sera le nom de l attribut.
			/*********			FIN DU READ ME 		***********/
			$arg_list  = func_get_args();
			$num_arg   = func_num_args();

			$class 	   = get_class($this);
			$table     = strtoupper(get_class($this));
			$listeAttr = "";
			if($num_arg < 2){
				echo "Vous manquez d'arguments";
				exit();
			} //Si il n y a pas d arguments

			if($num_arg == 2){
				$req    	 	 = "SELECT ".$arg_list[1]." FROM ".$table." WHERE actif = 1 AND suppr = 0 ;";
				// echo $req;
				$result 	 	 = $this->connexion->prepare($req);
				?>
				<select name="<?php echo $arg_list[0]; ?>" >
				<?php			
				if($result->execute()){
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						$var = $ligneResult[$arg_list[1]];
						echo '<option value="'.$var.'">'.$var.'</option> ';
					}
				}//Fin de l execution
				?>
				</select>
				<?php
			}// Fin de si 2 arguments

			if($num_arg > 2){
				$nom    = $arg_list[0];
				$valeur = $arg_list[1];
				$limite = $num_arg - 1;
				if(is_int($arg_list[($num_arg-1)])){ //On affiche en mode modification
					$preSelect = $arg_list[($num_arg-1)];
					$limite = $num_arg - 2;
				}

				$tabChampsAfficher = array();
				for($i = 2; $i <= $limite; $i++){
					if(is_array($arg_list[$i])){ // Si l'un des arguments passé est un tableau
						$tab = $tab2 = $arg_list[$i];
						if(isset($tab["sql"])) 			unset($tab2["sql"]);	
						if(isset($tab["bind"])) 		unset($tab2["bind"]);	
						if(isset($tab["class"])) 		unset($tab2["class"]);	
						if(isset($tab["preselect"])) 	unset($tab2["preselect"]);						
						if(isset($tab["preselectVal"])) unset($tab2["preselectVal"]);
						if(isset($tab["attr"])) 		unset($tab2["attr"]);
						if(!empty($tab2)){	// Verifie qu il y a bien un order by de demander					
							$order  = " ORDER BY ";
							$order .= implode(",",$tab2);
						}
					}else{
						$tabChampsAfficher[] = $arg_list[$i];
					} 
				}  
				$champsAfficher  = implode(",",$tabChampsAfficher);
				$req    	 	 = "SELECT id, ".$champsAfficher." FROM ".$table." WHERE actif = 1 AND suppr = 0";

				if(isset($tab["attr"]) && is_array($tab["attr"])){
					foreach ($tab["attr"] as $key => $value) {
						$listeAttr .= $key.'="'.$value.'" ';
					}
				}

				if(isset($order)) $req .= $order;
				// var_dump($arg_list);
				// echo $req;
				if(isset($tab)){
					if(isset($tab["sql"])) $req = $tab["sql"];
				}
				// echo $req;
				$result 	 	 = $this->connexion->prepare($req);
				$i = 0;
				
         		?>
				<select name="<?php echo $arg_list[0]; ?>" <?php echo $listeAttr ?> <?php if($class == "font") echo 'style="font-family: FontAwesome"'; ?> <?php if(isset($tab["class"])) echo 'class="'.$tab["class"].'"'; ?>>
				<?php 
				if(isset($tab["preselect"])){ ?>
					<option value="<?php echo $var = (isset($tab["preselectVal"]))? $tab["preselectVal"] : 0 ;  ?>" >
						<?php echo $tab["preselect"]; ?>
					</option>
				<?php }			
				if((isset($tab["bind"])? $result->execute($tab["bind"]) : $result->execute() )){
					while($ligneResult = $result->fetch(PDO::FETCH_ASSOC)){
						if($i == 0) $i = $ligneResult["id"];
						$var = "";
						foreach ($tabChampsAfficher as $key => $value) {
							$var .= $ligneResult[$value]." "; 
						}
						if(isset($preSelect)){
							if($ligneResult["id"] == $preSelect){
								echo '<option value="'.$ligneResult["id"].'" selected>'.$var.'</option>
								';		
							}else{
								echo '<option value="'.$ligneResult["id"].'">'.$var.'</option>
								';
							}
						}else{
							echo '<option value="'.$ligneResult["id"].'">'.$var.'</option>
							';
						}
						
					}

				}//Fin de l execution
				?>
				</select>
				<?php	
				if(isset($preselect)){return($preselect);}else{return($i);}
			}
		}//Fin de liste	

	}//Fin de class