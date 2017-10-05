<?php include ("0-config/config.php") ?>
<?php 
if (isset($_GET['mail'])){
	mailing();
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php Head("Nicolas JOACHIM"); ?>

  <body>
  	<?php modalContact() ?>

  	<div id="loading"><br><br>Un instant, je réfléchis ...<br><img class="img-load" src="img/gif/load.gif"></div>
  	<div class="body">
	    <?php Navbar(); ?>

	    <div class="container">
		    <section id="home-head">
		    	<div class="row text-center">
			    	<h2 id="home-title">Un parcours, des compétences</h2>
			    </div>
			    <div class="row text-center hidden-sm hidden-xs">
			    	<img class="scroll" src="img/gif/scrolldown.gif"><br>
			    </div>
		    </section>

		    <section id="name">
		    	<div class="row">
			    	<div class="col-md-5 hidden-sm hidden-xs">
		    			<p class="text-right">NICOLAS</p>
		    			<hr class="width-100">
		    		</div>
		    		<div class="col-sm-4 col-xs-4 hidden-md hidden-lg">&nbsp;</div>
		    		<div class=" col-sm-4 col-xs-4 col-md-2">
		    			<a href="img/nico.jpg"><img class="img-circle pics-nico" src="img/nico.jpg"></img></a>
		    		</div>
		    		<div class="col-md-5 hidden-sm hidden-xs">
		    			<p class="text-left">JOACHIM</p>
		    			<hr class="width-100">
		    		</div>
		    	</div>
		    	<div class="row hidden-md hidden-lg text-center">
		    	<br>
		    		<div class="col-md-12 ">Nicolas JOACHIM</div>
		    	</div>
		    </section>	

		    <section id="present">
			    <div class="row">
			    	<div class="s_container">
			    		<div class="row">
				    		<br>
				    		<div class="col-md-12 text-center row-head">
				    			<h4>Chers visiteurs, je vous souhaite la bienvenue sur mon portfolio</h4>
				    		</div>
				    		<br><br><hr><br>
				    	</div>
				    	
				    	<div class="row">
				    		<div class="hidden-sm hidden-xs col-md-4">
				    			<img class="img-responsive img-circle img-left" src="img/img-1.jpg"></img>
					    	</div>
					    	<div class="col-md-8">
					    		<p class="text-container left">Ce site web à été conçu dans le cadre de mon BTS Services Informatiques aux Organisations, afin d'y présenter tout mon parcours informatiques ainsi que mes compétences aquérits durant ce dernier.</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		
				    		<div class="col-md-8 text-right">
				    			<p class="text-container right">Je suis actuellement au sein de l'ETNA, école d'informatique en alternance, suivant un cycle d'ingénieurie d'architecte logiciel et de développeur d'application, suite à l'obtention de mon BTS SIO spécialisé dans le développement (SLAM - Solution Logiciel et Application Metier).<br> Mon projet actuel est de devenir développeur full-stack</p>
					    	</div>
					    	<div class="col-md-4 hidden-sm hidden-xs">
					    		<img class="img-responsive img-circle img-right" src="img/img-2.jpg"></img>
					    	</div>
					    	
				    	</div>
				    	<br>
				    </div>
				</div>
		    </section>

		    <section id="number">
			    <div class="row">
			    	<div class="col-md-12">
		    			<div class="s_container">
		    				<h4 class="text-center">Voici quelques chiffres reflétant mon expérience dans le développement</h4>
		    				<br>
		    				
		    			</div>
		    			<hr>
		    		</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-4 text-center">
			    		<h5>16</h5>
			    		<p>mois de formation<br> suivis</p>
			    	</div>
			    	<div class="col-md-4 text-center">
			    		<h5>7</h5>
			    		<p>Langages de programmation<br> pratiqués</p>
			    	</div>
			    	<div class="col-md-4 text-center">
			    		<h5>13</h5>
			    		<p>semaines d'experiences en<br>milieux professionnels</p>
			    	</div>
			    </div> 
			    <div class="row text-center hidden-sm hidden-xs">
			    	<br><br><br><br><hr class="hidden-sm hidden-xs"><br>
		    		<h4>Voici les languages de programmation que j'ai pu rencontrer<br> pendant mon parcours</h4>
		    	</div>
		    </section>
		    <section id="compet">
				
			    <div class="row hidden-sm hidden-xs" id="cont">
			    	<div class="col-md-12 box-center">
			    		<div class="competences img-1 text-center">
			    			<p class="op">HTML 5</p>
			    		</div>
			    		<div class="competences img-2 text-center">
			    			<p class="op">CCS 3</p>
			    		</div>
			    		<div class="competences img-3 text-center">
			    			<p class="op">JAVA</p>
			    		</div>
			    		<div class="competences img-4 text-center">
			    			<p class="op">JAVASCRIPT</p>
			    		</div>
			    		<div class="competences img-5 text-center">
			    			<p class="op">JQuery</p>
			    		</div>
			    		<div class="competences img-6 text-center">
			    			<p class="op">Bootstrap</p>
			    		</div>
			    		<div class="competences img-7 text-center">
			    			<p class="op">SQL</p>
			    		</div>
			    		<div class="competences img-8 text-center">
			    			<p class="op">PHP</p>
			    		</div>
			    		<div class="competences img-9 text-center">
			    			<p class="op">VueJS</p>
			    		</div>
			    		<div class="competences img-10 text-center">
			    			<p class="op">Zend Framework</p>
			    		</div>
			    		<div class="competences img-11 text-center">
			    			<p class="op">AJAX</p>
			    		</div>
			    		<div class="competences img-12 text-center">
			    			<p class="op">SASS</p>
			    		</div>
			    	</div>
			    </div>
		    </section>

		    <section id="project">
			    <div class="row text-center">
		    		<h4>Mes projets en cours de formation</h4>
		    		<hr>
		    	</div>
		    	<nav class="navbar navbar-default">
			      <div class="container text-center">
			        <div class="navbar-header ">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            Voir &nbsp;&nbsp;<i class="fa fa-sort-desc fa-2x" aria-hidden="true"></i>
			          </button>
			        </div>
			        <div id="navbar2" class="navbar-collapse collapse text-center">
			          <div class="col-md-12" id="navbarproject">
			            <ul class="nav navbar-nav" id="ulproject">
			              <li><a href="#" id="btn-onglet-1"><span class="onglet-link">Site Marchand</span></a></li>
			              <li><a href="#" id="btn-onglet-2"><span class="onglet-link">GSB (5)</span></a></li>
			              <li><a href="#" id="btn-onglet-5"><span class="onglet-link">AvocatVLA</span></a></li>
			              <li><a href="#" id="btn-onglet-6"><span class="onglet-link">Argos-Stats</span></a></li>
			              <li><a href="#" id="btn-onglet-7"><span class="onglet-link">Oïkos</span></a></li>
			              <li><a href="#" id="btn-onglet-8"><span class="onglet-link">Bioassays</span></a></li>
			              <li><a href="#" id="btn-onglet-9"><span class="onglet-link">Immobilier</span></a></li>
			              <li><a href="#" id="btn-onglet-a"><span class="onglet-link">GLPI</span></a></li>
			            </ul>
			          </div>
			        </div><!--/.nav-collapse -->
			      </div>
			    </nav>
			    <div class="row hidden-sm hidden-xs hidden-lg hidden-md" id="project-onglet-bar" >
			    	<div class="col-md-12 onglet-bar text-center">
			    	<a href="#" id="btn-onglet-1">
			    		<span class="onglet-link">
			    			Site Marchand
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-2">
			    		<span class="onglet-link">
			    			GSB 
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-5">
			    		<span class="onglet-link">
			    			AvocatVLA
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-6">
			    		<span class="onglet-link">
			    			Argos-Stats
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-7">
			    		<span class="onglet-link">
			    			Oïkos
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-8">
			    		<span class="onglet-link">
			    			Bioassays
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-9">
			    		<span class="onglet-link">
			    			Immobillier
			    		</span>
			    	</a>
			    	<a href="#" id="btn-onglet-a">
			    		<span class="onglet-link">
			    			GLPI
			    		</span>
			    	</a>
			    	</div>
			    </div>
			    <div class="row" id="project-container">
				    <div id="onglet-1">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/bmp.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>Site Marchand BEATMARKET PLACE</h3>
					    		<p class="sous-titre">Projet de site de commerce en PHP en première année de BTS</p>
					    	</div>
				    	</div>
				    	<br><br><br>
				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			C'est l'un des tout premier projet que j'ai du réaliser en PHP, et en solo. Le but était de se familiariser avec les variables d'environnement PHP, ainsi qu'avec la gestion de bases de données.
				    			Nous avions carte blanche sur le thème du site. Passioné par la compositon musicale numérique, j'ai donc conçu un site marchand d'équipements de studio de musique.<br><br>
				    			Requêtes SQL en cascade, variables stocké dans les données de session, authentification d'utilisateur,gestion d'articles et de panier ont été les principaux travaux à réaliser, tout en adoptant un affichage ergonomique.
				    		</div>
					    </div>
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bmp1.png');">
				    				<a href="img/project/screenproject/bmp1.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page d'accueil<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bmp2.png');">
				    				<a href="img/project/screenproject/bmp2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Vue d'un article<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bmp3.png');">
				    				<a href="img/project/screenproject/bmp3.png" target="_blank">
					    				<p class="op2 text-center">
						    				Liste d'article par catégories<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bmp4.png');">
				    				<a href="img/project/screenproject/bmp4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page du Panier<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
						<div class="row">
						<br><br><hr><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td>Lien du Site</td>
										<td><i>Non publié</i></td>
									</tr>
									<tr>
										<td>Languages et outils utilisés</td>
										<td class="blue">PHP, HTML, CSS</td>
									</tr>
								</table>
							</div>
						</div>

				    </div>
				    <div id="onglet-2">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/gsb.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>GSB (Divisé en 5 Projets)</h3>
					    		<p>Application Web de gestion de frais, 1ère année de BTS</p>
					    	</div>
				    	</div>
				    	<br><br><br>
				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Galaxy Swiss Bourdin (abrégé sous le nom de GSB), est un laboratoire pharmaceutique employant des visiteurs médicaux afin de faire de la publicité aux médecins sur les nouveaux médicaments et soins proposés par le laboratoire.  <br><br>
								Dans notre situation professionnelle il a été décidé de confier à une société de services informatiques la responsabilité de développer la partie destinée aux comptables de l’application, permettant la gestion des suivis des fiches de frais des visiteurs médicaux ainsi que la validation de ces fiches par les comptables de la société. 
 								<br>
				    			Ce contexte à été divisé en 5 projets au cours des 2 années :<br>
				    			<ul><br>
				    				<li><b class="blue">Développement en PHP</b> : Dès le lancement de l’application, une page d’authentification apparait pour entrer les informations de connexion (pour les comptables ou les visiteurs médicaux). Après s’être authentifié, les comptables ont la possibilité de vérifier et de valider les fiches de frais préalablement saisies par les visiteurs, et peuvent également refuser ou reporter des frais non compris dans le forfait. Les comptables disposent également d’un onglet pour suivre les fiches de frais déjà validées, et procéder ensuite à la validation du remboursement.<br>Pour ce faire, une partie du code ainsi que la base de donnée nous à été fourni.</li><br>
				    				<li><b class="blue">Développement en PHP MVC</b> : Les fonctionnalités sont les mêmes que le précédent, sauf que nous devions utiliser la méthode Modèle-Vue-COntrolleur (MVC)</li><br>
				    				<li><b class="blue">Développement en JAVA Web</b> : Cette fois-ci, pas de binôme. Le cahier des charges était relativement facile à respecter étant donné qu'il s'agissait seulement d'afficher la liste de medecins visiteurs, filtré par département, par nom ou par spécialité, issue d'une base de données fournie.</li><br>
				    				<li><b class="blue">Back-Office GSB avec Framework</b> : Toujours en solo, le but de ce projets était de gerer librement toutes les données de la base de données (Frais Forfait, Fiches des visiteurs...) via ce Back-Office. La base, ainsi qu'une partie du code (feuilles de style comprise) à été fourni. Nous avons utilisé le framework ZEND, pour traiter les données et pour la gestion d'affichage de l'application web.</li><br>
				    				<li><b class="blue">Développement en Android</b> : Dans cette situation professionnelle il a été décidé de confier à une société de services informatiques la responsabilité de développer une application permettant la consultation des médecins sur tous types de terminaux. Dès lors de son lancement, l'application affiche une liste de départements. A l’appui sur l’un des départements on est envoyé sur la liste des médecins du département choisi. Il nous est possible de filtrer en tapant le nom d'un médecin dans une barre de recherche filtrant sur le nom et le prénom. Le choix d'un médecin nous envoie directement vers une nouvelle fenêtre contenant 3 actions: appeler ce médecin, lui envoyer un SMS ou voir sa localisation sur Google Maps.</li><br>
				    			</ul>
				    		</div>
					    </div>
					    
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/gsbmvc1.png');">
				    				<a href="img/project/screenproject/gsbmvc1.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB MVC - Login<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/gsbmvc2.png');">
				    				<a href="img/project/screenproject/gsbmvc2.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB MVC - Validation des fiches<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/gsbmvc3.png');">
				    				<a href="img/project/screenproject/gsbmvc3.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB MVC - Selection d'une fiche à suivre pour le remboursement<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/gsbmvc4.png');">
				    				<a href="img/project/screenproject/gsbmvc4.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB MVC - Suivi d'une fiche de frais<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bogsb1.png');">
				    				<a href="img/project/screenproject/bogsb1.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office GSB - Datagrid Visiteurs<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bogsb2.png');">
				    				<a href="img/project/screenproject/bogsb2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office GSB - Datagrid Frais Forfait<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bogsb3.png');">
				    				<a href="img/project/screenproject/bogsb3.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office GSB - Statistiques Fiches de Frais<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bogsb4.png');">
				    				<a href="img/project/screenproject/bogsb4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office GSB - Statistiques Frais Forfait<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/and1.png');">
				    				<a href="img/project/screenproject/and1.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB Android - Accueil<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/and2.png');">
				    				<a href="img/project/screenproject/and2.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB Android - Liste medecins du département choisi<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/and3.png');">
				    				<a href="img/project/screenproject/and3.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB Android - Fiche d'un medecin<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/and4.png');">
				    				<a href="img/project/screenproject/and4.png" target="_blank">
					    				<p class="op2 text-center">
						    				GSB Android - Renvoi vers l'application Maps<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
						<div class="row">
						<br><br><hr><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td>Liens Applications Web</td>
										<td><i>Non publié</i></td>
									</tr>
									<tr>
										<td>Languages et outils utilisés</td>
										<td class="blue">PHP, HTML, CSS, SQL, ZendFramework, JAVA (Android), XML</td>
									</tr>
								</table>
							</div>
						</div>
				    </div>
				    <div id="onglet-5">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/avocatvla.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>AVOCAT VL&A</h3>
					    		<p>Projet réalisé durant le stage de 1ère année</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Voici l'un des plus gros projet réalisé depuis mon parcours.
				    			Avocat VL&A, comme sont nom l'indique, est le site d'un cabinet d'avocat installé dans Paris.<br><br>
				    			Ce projet à été réalisé dans le cadre de mon stage de 1ère année.<br>
				    			Le cahier des charges? Relooker l'ancien site internet et lui integrer un back-office en partant de 0.<br><br>
				    			Cette misson à duré au total 5 semaines, et à été l'une de mes missions les plus formatrice en PHP, Javascript, Bootstrap<br>
				    			J'ai du me familiariser avec le framework interne à l'entreprise appelé GENOS, outils similaire au PDO de PHP mais totalement revisité et optimisé pour d'épurer les lignes de codes. Ma principale préocupation était l'image du site, afin qu'un internaute lise conforatblement le contenu des pages. Les fonctionnalités du back-office était également un enjeux primordiale, étant donné qu'il fallait un maximum de sécurité pour evité toute intrusion frauduleuse, ou toute manipulation involontaire, et devait repondre à tous les besoins du client.
				    		</div>

					    </div>
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla1.png');">
				    				<a href="img/project/screenproject/avocatvla1.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page d'accueil<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla2.png');">
				    				<a href="img/project/screenproject/avocatvla2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office - Page d'accueil <br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla4.png');">
				    				<a href="img/project/screenproject/avocatvla4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page d'actualités<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla5.png');">
				    				<a href="img/project/screenproject/avocatvla5.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page de contac<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla6.png');">
				    				<a href="img/project/screenproject/avocatvla6.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office - Page de connexion <br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla7.png');">
				    				<a href="img/project/screenproject/avocatvla7.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office - Page d'ajout d'actualité<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div><div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla8.png');">
				    				<a href="img/project/screenproject/avocatvla8.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office - Liste des actualités<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/avocatvla9.png');">
				    				<a href="img/project/screenproject/avocatvla9.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office - Liste des Pays du secteur d'acitivté<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
						<div class="row">
						<br><br><hr><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td>Lien du Site</td>
										<td class="blue"><a href="http://avocatvla.fr">avocatvla.fr</a></td>
									</tr>
									<tr>
										<td>Languages et outils utilisés</td>
										<td class="blue">PHP, HTML, CSS, SQL, Jquery, Genos (Framework Interne), Bootstrap, PoEdit</td>
									</tr>
								</table>
							</div>
						</div>
				    </div>
				    <div id="onglet-6">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/argos.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>ARGOS-STATISTIQUE</h3>
					    		<p>Projet réalisé durant le stage de 2ème année</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Argos est un site de gestion d’interventions, concernant les équipements de sécurité dans un bâtiment (extincteurs, éclairages de secours, etc..). Il recense toutes les interventions, les techniciens, les lieux, et les équipements concerné dans une base de données.<br><br>
								Ma mission consistait à créer un back-office afin d’obtenir les statistiques des interventions dans le langage de mon choix. Ambitieux comme je suis, j’ai voulu le tenter en VueJS (bibliothèque de JavaScript, que m’as fait découvrir mon tuteur de stage) allié au HTML, mais je n’étais pas encore assez entrainé dans le langage. Je l’ai donc codé en HTML, CSS, PHP.
				    		</div>
					    </div>
					    <div class="row">
				    			<br><br><hr><br>
					    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
					    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/argos1.png');">
					    				<a href="img/project/screenproject/argos1.png" target="_blank">
						    				<p class="op2 text-center">
							    				Tableau de Stats 1<br><b>Cliquez Pour Voir</b>
						    				</p>
					    				</a>
					    			</div>
					    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/argos2.png');">
					    				<a href="img/project/screenproject/argos2.png" target="_blank">
						    				<p class="op2 text-center">
							    				Tableau de Stats 2<br><b>Cliquez Pour Voir</b>
						    				</p>
					    				</a>
					    			</div>
					    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/argos3.png');">
					    				<a href="img/project/screenproject/argos3.png" target="_blank">
						    				<p class="op2 text-center">
							    				Tableau de Stats 3<br><b>Cliquez Pour Voir</b>
						    				</p>
					    				</a>
					    			</div>
					    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/argos4.png');">
					    				<a href="img/project/screenproject/argos4.png" target="_blank">
						    				<p class="op2 text-center">
							    				Page d'accueil<br><b>Cliquez Pour Voir</b>
						    				</p>
					    				</a>
					    			</div>
					    		</div>

						    </div>
						    <div class="row">
								<br><br><hr><br>
									<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
										<table class="project-resume">
											<tr>
												<td>Lien de l'application Web</td>
												<td class="blue"><i>Non Publié (Application Privé)</i></td>
											</tr>
											<tr>
												<td>Languages et outils utilisés</td>
												<td class="blue">PHP, HTML, CSS, SQL, Jquery, Genos (Framework Interne), Bootstrap</td>
											</tr>
										</table>
									</div>
								</div>
				    </div>
				    <div id="onglet-7">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/oikos.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>OÏKOS</h3>
					    		<p>Projet réalisé durant le stage de 2ème année</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Oïkos, est un site d’avocat, développé par les soins de l’équipe VLIS. Le site étant en phase finale de conception, j’avais pour simple mission de gérer l’affichage d’actualités sur la partie front-office du site, ainsi que d’y implémenter un système de recherche en AJAX, afin d’y produire une recherche dynamique sans recharger la page.<br><br>
				    			En complément de cette tache j'ai du faire quelques corrections sur le back-office chargé de la gestion de news, ainsi qu'améliorer certaine mise-en-page des vues sur les fiches des avocats, sur les honoraires, ou encore les compétences du cabinet.<br>
				    			
				    		</div>
					    </div>
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/oikos1.png');">
				    				<a href="img/project/screenproject/oikos1.png" target="_blank">
					    				<p class="op2 text-center">
						    				Rubrique "Droit de la famille"<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/oikos2.png');">
				    				<a href="img/project/screenproject/oikos2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Back-Office - Liste des Actualités<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/oikos3.png');">
				    				<a href="img/project/screenproject/oikos3.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page d'accueil<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/oikos4.png');">
				    				<a href="img/project/screenproject/oikos4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page d'actualités<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
						<div class="row">
								<br><br><hr><br>
									<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
										<table class="project-resume">
											<tr>
												<td>Lien de l'application Web</td>
												<td class="blue"><a href="http://oikos-avocats.fr/" target="_blank">oikos-avocats.fr</a></td>
											</tr>
											<tr>
												<td>Languages et outils utilisés</td>
												<td class="blue">PHP, HTML, CSS, SQL, AJAX, Jquery, Genos (Framework Interne), VueJS, Bootstrap, SASS</td>
											</tr>
										</table>
									</div>
								</div>
				    </div>
				    <div id="onglet-8">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/bioassays.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>BIOASSAYS EARTH</h3>
					    		<p>Projet réalisé durant le stage de 1ère année</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Bioassays est une société qui propose un ensemble de solutions performantes sans pesticides, destinées à la protection des végétaux contre les insectes ravageurs.<br><br>
								Ce site avait été conçu au préalable par deux autres stagiaire, l’un pour la partie « Front » et l’autre pour la partie « Back-office ». Malheureusement ils n’ont pas pu régler les derniers détails du site, faute de temps. Ce fut donc à moi de le prendre en charge. <br><br>

				    		</div>
					    </div>
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bio1.png');">
				    				<a href="img/project/screenproject/bio1.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page d'accueil<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bio2.png');">
				    				<a href="img/project/screenproject/bio2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Rubrique "Fiche d'un insecte"<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bio3.png');">
				    				<a href="img/project/screenproject/bio3.png" target="_blank">
					    				<p class="op2 text-center">
						    				Page de Contact<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/bio4.png');">
				    				<a href="img/project/screenproject/bio4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Rubrique "Nos Solutions"<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
						<div class="row">
						<br><br><hr><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td>Lien de l'application Web</td>
										<td class="blue"><a href="http://www.bioassays.earth" target="_blank">www.bioassays.earth</a></td>
									</tr>
									<tr>
										<td>Languages et outils utilisés</td>
										<td class="blue">PHP, HTML, CSS, SQL, Jquery, Genos (Framework Interne), Bootstrap</td>
									</tr>
								</table>
							</div>
						</div>
				    </div>
				    <div id="onglet-9">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/immo.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>BACK-OFFICE IMMOBILIER UNIVERSEL</h3>
					    		<p>Projet réalisé durant le stage de 2ème année</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Le but de ce projet est simple : créer un back-office universelle, destiné à être intégré à chaque site internet d’immobilier.<br><br>
								Celui-ci a été plutôt simple à réaliser sachant que le code a été repris à partir du module d’actualité du site d’Oïkos. Il était codé en PHP et en Vue JS.
								Il y avait également des graphiques intégrés, utilisant une bibliothèque JavaScript nommé Morris.<br><br>
								Ce back-office devait être capable de gérer toutes les informations concernant un logement, par exemple la surface du sejour, l'année de construction ou encore les éléments disponible à l'interieur du logement (Cheminée, Cuisine équipé, Piscine, etc...).
				    		</div>
					    </div>
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/immo5.png');">
				    				<a href="img/project/screenproject/immo5.png" target="_blank">
					    				<p class="op2 text-center">
						    				Fiche Logement - Onglet "Spécialités"<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/immo2.png');">
				    				<a href="img/project/screenproject/immo2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Liste des catégories de logement<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/immo3.png');">
				    				<a href="img/project/screenproject/immo3.png" target="_blank">
					    				<p class="op2 text-center">
						    				Fiche Logement<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/immo4.png');">
				    				<a href="img/project/screenproject/immo4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Fiche Logement - Onglet "Caractéristiques"<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
						<div class="row">
						<br><br><hr><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td>Lien de l'application Web</td>
										<td class="blue"><i>Non Publié</i></td>
									</tr>
									<tr>
										<td>Languages et outils utilisés</td>
										<td class="blue">PHP, HTML, CSS, SQL, Jquery, Genos (Framework Interne), Bootstrap, VueJS, Ajax, SASS</td>
									</tr>
								</table>
							</div>
						</div>
				    </div>
				    <div id="onglet-a">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/glpi.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>Gestionnaire Libre de Parc Informatique (GLPI)</h3>
					    		<p>Projet de 2ème année</p>
					    	</div>
				    	</div>

				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			GLPI (Gestionnaire Libre de Parc Informatique)est un logiciel libre de gestion des services informatiques et de gestion des services de maintenance et d'assistance aux usagers des Solutions Techniques d'Accès (STA). Cette solution open source est entièrement codé en PHP.<br><br>
				    			La mission ici était de se familiariser avec ce type de logiciel, en l'utilisant dans le contexte de GSB en : 
				    			<ul>
				    				<li>Créant un gabarit (une STA) qui équiperont les visiteurs médicaux</li>
				    				<li>En Attribuant ces gabarits aux visiteurs</li>
				    				<li>En assurant une gestion des incidents (Tickets)</li>
				    			</ul>
				    		</div>
					    </div>
					    <div class="row">
			    			<br><br><hr><br>
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/glpi1.png');">
				    				<a href="img/project/screenproject/glpi1.png" target="_blank">
					    				<p class="op2 text-center">
						    				Ajout d'un Gabarit<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/glpi2.png');">
				    				<a href="img/project/screenproject/glpi2.png" target="_blank">
					    				<p class="op2 text-center">
						    				Enregistrement d'une STA<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    		<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/glpi3.png');">
				    				<a href="img/project/screenproject/glpi3.png" target="_blank">
					    				<p class="op2 text-center">
						    				Création d'un Ticket<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
				    			</div>
				    			<div class="col-md-3 col-sm-6 col-xs-12 screen" style="background-image: url('img/project/screenproject/glpi4.png');">
				    				<a href="img/project/screenproject/glpi4.png" target="_blank">
					    				<p class="op2 text-center">
						    				Gestion et Traitement d'un Ticket<br><b>Cliquez Pour Voir</b>
					    				</p>
				    				</a>
					    		</div>
					    	</div>
						</div>
				    </div>
			    </div>
		    </section>
		    <section id="inter" class="hidden-sm hidden-xs">
				
			    <div class="row" id="cont">
			    	<div class="col-md-12 box-center">
			    		&nbsp;
			    	</div>
			    </div>
		    </section>

		    <section id="xp">
			    <div class="row text-center">
		    		<h4>Mon experience professionnelle</h4>
		    		<hr>
		    	</div>
			    <div class="row" id="project-onglet-bar">
			    	<div class="col-md-12 onglet-bar text-center">
			    	<a href="#" id="btn-xp-onglet-1">
			    		<span class="onglet-link">
			    			Stage de 1ère année
			    		</span>
			    	</a>
			    	<a href="#" id="btn-xp-onglet-2">
			    		<span class="onglet-link">
			    			Stage de 2ème année
			    		</span>
			    	</a>
			    	</div>
			    </div>
			    <div class="row" id="project-container">
				    <div id="xp-onglet-1">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/vlis.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>Stage de 1ère année</h3>
					    		<p>Effectué à <a href="http://vlis-france.com" target="_blank"> VL INVENT SOFT</a></p>
					    	</div>
				    	</div>
				    	<br><br><br>
				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			VL Invent Soft, ou VLIS, est une société de services informatique implantée en plein cœur de Paris, dans le 9ème arrondissement.<br><br>
				    			L’expertise de VLIS s’étend sur <br>
				    			<ul>
				    				<li>la maintenance, l’infogérance et la sécurité  informatique, </li>
				    				<li>la conception de logiciel, </li>
				    				<li>la mise en place de réseau d’entreprise sous plusieurs systèmes d’exploitation possibles, </li>
				    				<li>l’installation et la configuration</li>
				    				<li>support de communication (cartes de visite, flyer…)</li>
				    				<li>conception et développement de sites web.</li>
				    			</ul><br>
				    			La durée de mon stage à été de 5 semaines. J'ai passé la majeure partie de mon temps à travailler sur le projet AvocatVLA (Voir ci-dessus).
				    			Mon stage c'est donc principalement basé sur du développement PHP, HTML, CSS et javascript.<br><br>

				    			Il m'as permis également d'être confronté à de nouvelles methodes et de nouveaux environnement tel que Bootstrap, TinyMCE, POEdit, et GENOS (Framework interne à l'entreprise). <a href="doc/Stage-1.pdf">Voir le rapport de stage</a><br><br>

				    			Le milieu professionnel informatique étant auparavant inconnu pour moi avant ce stage, ce dernier m'as fait prendre conscience du dynamisme et des difficultés présentes dans cet environnent, mais aussi de la bonne cohésions d'équipe et de la qualité des travaux fournis au sein d'une entrerpise d'informatique.<br><br><br><br>
				    		</div>
					    </div>
					    <div class="row">
						<br><br><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td><a href="doc/Stage-1.pdf" alt="Cliquez pour voir le rapport de stage"><img src="img/pdf.png" class="pdf"></a></td>
										<td class="blue"><a href="doc/Stage-1.pdf" alt="Cliquez pour voir le rapport de stage">Rapport de stage</a></td>
									</tr>
									
								</table>
							</div>
						</div>
				    </div>
				    <div id="xp-onglet-2">
			    		<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-4">
				    			<img class="img-responsive img-left" src="img/project/vlis.png"></img>
					    	</div>
					    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-5">
					    		<h3>Stage de 2ème année</h3>
					    		<p>Effectué à <a href="http://vlis-france.com" target="_blank"> VL INVENT SOFT</a></p>
					    	</div>
				    	</div>
				    	<br><br><br>
				    	<div class="row">
				    		<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				    			Effectué au même endroit que la 1ère année, ce stage a duré pendant une période de 8 semaines, me laissant beaucoup plus de temps pour immerger dans des projets plus concrets.<br><br>
				    			C'est d'ailleurs pendant ce stage que j'ai effectué une bonnes parties des projets que j'ai présenté un peu plus haut sur cette page, tel que Oïkos, le back-office immobilier universelle, ou encore Argos-Statistique.<br><br>
				    			A l’issue de ce stage, j’ai donc très bien assimilé les conditions de travail dans l’informatique, notamment le stress, la pression, mais aussi la communication, et l’envie d’en découvrir plus.
								Je suis repartit avec de bons bagages tel que VueJS, Jquery, et AJAX, SASS, MomentJS, et JQuery.<br><br><br><br>

				    		</div>
					    </div>
					    <div class="row">
						<br><br><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td><a href="doc/Stage-1.pdf" alt="Cliquez pour voir le rapport de stage"><img src="img/pdf.png" class="pdf"></a></td>
										<td class="blue"><a href="doc/Stage-2.pdf" alt="Cliquez pour voir le rapport de stage">Rapport de stage</a></td>
									</tr>
									
								</table>
							</div>
						</div>
				    </div>
			    </div>
		    </section>
		    <section id="inter-2" class="hidden-sm hidden-xs">
				
			    <div class="row" id="cont">
			    	<div class="col-md-12 box-center">
			    		&nbsp;
			    	</div>
			    </div>
		    </section>
		    <section id="veille">
			    <div class="row text-center">
				    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
			    		<h4>Veille Technologique</h4>
				    </div>
		    		<hr>
		    	</div>
			    <div class="row" id="project-container">
			    	<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
			    	<div class="col-md-offset-2 col-md-8 hidden-sm hidden-xs">
		    			<img src="img/project/rd.png" class="veille-img" /><br>
			    	</div>
			    	<div class="col-md-12">
			    		<p>
		    			Dans le cadre du BTS, je dois présenter une veille technologique sur un thème bien précisen rapport avec l'informatique de développement<br><br>Il y a encore très peu de temps, nos millions de sites internet se consultaient sur seulement très peu de navigateurs différents. Les écrans sur lesquelles ils étaient diffusés avaient tous une taille presque similaire.<br><br>
						Avec le développement important des technologies, une multitude d’appareil ont fait leurs apparitions dans notre quotidien. En effet, la majorité de ces appareils possèdent des navigateurs internet. C’est depuis ce phénomène que le problème du site web adaptatif s’est posé étant donné que les tailles d’écrans varient de plus en plus, ce qui en fait la préoccupation première lors de la conception d’un site web.<br><br>
						Vous l’auriez peut être compris, ma veille technologique se porte sur le Responsive Design.
						Le Responsive Design (Site Web Adaptatif en français) est une méthode de conception de site Web qui vise à l'élaboration de pages offrant une expérience de consultation et d’interaction pour l'utilisateur optimisé en fonction de l’appareil utilisé (téléphones mobiles, tablettes, télévisions, moniteurs d'ordinateur petit ou grand, montres connectés).
						</p><br><br>
			    	</div>
			    </div>
			    <div class="row">
						<br><br><br>
							<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
								<table class="project-resume">
									<tr>
										<td><a href="doc/Stage-1.pdf" alt="Cliquez pour voir le rapport de stage"><img src="img/pdf.png" class="pdf"></a></td>
										<td class="blue"><a href="" alt="Cliquez pour voir le rapport de Veille Technologique">Rapport de veille technologique momentanément indisponible</a></td>
									</tr>
									
								</table>
							</div>
						</div><br><br><br>
			    </div>

		    </section>
	    </div><!--/.container-->
	    <section id="footer">
	    	<footer>
		    	<div class="col-md-4 hidden-sm hidden-xs">
		    		<ul>
		    			<li><a href="#home-head">Haut de la page</a></li>
		    			<li><a href="#project">Mes projets</a></li>
		    			<li><a href="#xp">Mon experience</a></li>
		    			
		    		</ul>
		    	</div>
		    	<div class="col-md-4 hidden-sm hidden-xs">
		    		<ul>
		    			<li><a href="doc/Stage-1.pdf">Rapport de Stage de 1ère année</a></li>
		    			<li><a href="doc/Stage-2.pdf">Rapport de Stage de 2ème année</a></li>
		    			<li><a href="#veille">Veille Technologique</a></li>
		    		</ul>
		    	</div>
		    	<div class="col-xs-11 col-sm-11 col-md-4">
		    		<ul>
		    			<li><a href="#" id="contact2">Contact</a></li>
		    			<li><a href="#">Mention Légales</a></li>
		    			<br>
		    			<li><p class="text-center">Site Web développé par mes soins - njbts &copy;</p></li>
		    			<br>
		    		</ul>
		    	</div>
		    	<div class="col-md-12 hidden-lg hidden-md">
		    		<div class="col-md-4">
		    			<p class="text-center">Site Web développé par mes soins - njbts &copy;</p>
		    		</div>
		    	</div>
		    	<?php Footer(); ?>
			</footer>
	    </section>
    </div>
  </body>
</html>
