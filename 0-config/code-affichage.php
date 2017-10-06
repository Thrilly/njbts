<?php 
function Head($titre){ 
  ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Port-Folio">
    <meta name="author" content="Nicolas JOACHIM">

    <title><?php echo $titre ?></title>
    <link rel="icon" href="./img/nj.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
}

function NavBar(){ 
  ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <div class="col-md-1">
            <a class="navbar-brand hidden-xs hidden-sm" href="index.php">NJ</a>
            <a class="navbar-brand hidden-lg hidden-md" href="index.php">Nicolas JOACHIM</a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="col-md-11">
            <ul class="nav navbar-nav navbar-left">
              <li class=""><a class="hidden-sm hidden-xs" href="#home-head">ACCUEIL</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a class="hidden-sm hidden-xs" href="#name">MON PROFIL</a></li>
              <li><a class="hidden-sm hidden-xs" href="#project">PROJETS</a></li>
              <li><a class="hidden-sm hidden-xs" href="#xp">EXPERIENCES PRO</a></li>
              <li><a class="hidden-sm hidden-xs" href="#veille">VEILLE TECHNO.</a></li>
              <li><a href="#" id="contact">CONTACT</a></li>
            </ul>
          </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <?php
}



function getHeadBody(){
  ?>
  <?php 
}
function modalContact(){
  ?>
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h3>CONTACT</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2627.323121572095!2d2.3902593156824956!3d48.8138959792831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6717fc8723f71%3A0x54aff1a3a33b60bd!2sETNA!5e0!3m2!1sfr!2sfr!4v1507226962647 frameborder="0" style="border:0" allowfullscreen></iframe>
          <hr>
          <p class="text-center">Nicolas JOACHIM</p>
          <!-- <p><?php //var_dump($_POST); ?></p> -->
          <p class="text-center">ETNA, Ecole d'informatique en alternance, 7 Rue Maurice Grandcoing, 94200 Ivry-sur-Seine</p>
          <hr><br>
          <h3 class="text-center red">En raison d'un problème technique, l'envoi de message est indisponible. Veuillez passez par un client messagerie, et envoyer votre message à l'adresse : <a href="mailto:nico.joachim@free.fr">nico.joachim<i class="fa fa-at" aria-hidden="true"></i>free.fr </a></h3>
          <form action="index.php?action=mail" method="POST">
              <div class="col-md-6">

                <div class="row text-center">
                  <!-- <label>Nom</label><br> -->
                  <input class="form-control contact" type="text" name="nom" placeholder="Nom" required>
                </div>
                <div class="row text-center">
                  <!-- <label>Nom</label><br> -->
                  <input class="form-control contact" type="mail" name="email" placeholder="Email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row text-center">
                  <!-- <label>Prénom</label><br> -->
                  <input class="form-control contact" type="text" name="prenom" placeholder="Prénom" required>
                </div>
                <div class="row text-center">
                  <!-- <label>Nom</label><br> -->
                  <input class="form-control contact" type="text" max="10" name="tel" placeholder="Téléphone">
                </div>
              </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row text-center">
                <div class="col-md-offset-1 col-md-10">
                  <textarea class="form-control" type="text" name="msg" placeholder="Votre message ici"></textarea>
                </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-offset-5 col-md-2 text-center">
            <button type="submit" class="btn btn-primary" disabled="true">Envoyer</button>
          </div>
        </div>
      </form>
          
      </div>
        
      </div>
      <div class="modal-footer">
        <p>njbts &copy;</p>
      </div>
    </div>

  </div>
  <?php
}

function getProjets(){
  ?>
  <?php 
}


function Footer(){ ?>
	<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/njbts.js"></script>
<?php
}
