<?php

function getHead($page="defaut"){
    ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="nav-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" ><b><!-- <image class='nav-img logo' src='../img/logo1.png'></image> -->VLA</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php 
                if (isConnectedUser()){
            ?>
          <ul class="nav navbar-nav navbar-left">
            <li class="<?php if ($page=='news') echo "active"; ?>"><a href="news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;NEWS</a></li>
            <li class="<?php if ($page=='territoire') echo "active"; ?>"><a href="territoire.php"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;TERRITOIRES</a></li>
            <li class="<?php if ($page=='activite') echo "active"; ?>"><a href="activite.php"><i class="fa fa-object-group" aria-hidden="true"></i>&nbsp;ACTIVIT&Eacute;S</a></li>
            <li class="<?php if ($page=='user') echo "active"; ?>"><a href="user.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;UTILISATEURS</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li>
                    <image class='nav-img user' src='../img/user.png'></image>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php
                        echo getUserConnected()['nom'] . " " . getUserConnected()['pnom'];
                    ?>
                </a>
              <ul class="dropdown-menu">
                <li><a href="user.php?action=2&id=<?php echo getUserConnected()['id']; ?>">Modifier le compte</a></li>
                <li><a href="index.php?rq=disconnect">Deconnexion</a></li>
              </ul>
            </li>
          </ul>
          <?php 
      }
           ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php
}

function getInfoBar($text, $type=3){
    $icone=$bg=null;
    if ($type==1){
        $icone = "<i class='fa fa-check' aria-hidden='true'></i>";
        $bg= "bg-valid";
    }elseif ($type==2){
        $icone = "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>";
        $bg= "bg-error";
    }elseif ($type==3){
        $icone = "<i class='fa fa-info-circle' aria-hidden='true'></i>";
        $bg= "bg-info-success";
    }elseif ($type==4){
         $icone = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i>&nbsp;&nbsp;";
        $bg= "bg-info-warning";
    }
    ?>
    <nav class="navbar navbar-fixed-top info-bar <?php echo $bg; ?>">
      <div class="nav-container">
        <?php echo $icone; ?><span>&nbsp;<?php echo $text ?></span>
      </div>
    </nav>
    <?php
}

function getMeta(){
    ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>VLA Back-Office</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/style-module.css" rel="stylesheet">
        <script src="../js/jquery-2.2.2.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script src="../js/dropzone/dropzone.js"></script>
        <script src="../js/vla.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <?php
}

function getSidebar($page='defaut'){
    switch ($page) {
        case 'defaut':
            ?>
                <p>Racourci :</p><hr>
                <a href="news.php?rub=ajouter" ><p class="sidebar-menu"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><br>Ajouter Une News</p></a><hr>
                <a href="news.php?rub=modif_suppr" ><p class="sidebar-menu"><i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i><br>Consulter Les News</p></a><hr>
                <a href="../" target="_blank"><p class="sidebar-menu"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i><br>Aller sur le site VL&A</p></a><hr>
                <!-- <a href="activite.php" ><p class="sidebar-menu"><i class="fa fa-object-group fa-2x" aria-hidden="true"></i><br>Voir les <br>Activit&eacute;s</p></a> -->
                <!-- <a href="user.php" ><p class="sidebar-menu"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br>Modifier Les Utilisateurs</p></a> -->
            <?php
            break;
        case 'user':
            ?>
                <a href="index.php" ><p class="sidebar-menu"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br>Accueil<br></p></a><hr>
                <a href="user.php" ><p class="sidebar-menu"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br>Liste Utilisateurs<br></p></a><hr>
                <a href="user.php?action=1" ><p class="sidebar-menu"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><br>Ajouter un Utilisateur</p></a>
            <?php
            break;
        case 'news':
            ?>
                <a href="index.php" ><p class="sidebar-menu"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br>Accueil</p></a><hr>
                <a href="news.php?rub=modif_suppr" ><p class="sidebar-menu"><i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i><br>Liste<br>News<br></p></a><hr>
                <a href="news.php?rub=modif_suppr" id="btn-search"><p class="sidebar-menu"><i class="fa fa-search fa-2x" aria-hidden="true"></i><br>Rechercher une News</p></a><hr>
                <a href="news.php?rub=ajouter" ><p class="sidebar-menu"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><br>Ajouter une News</p></a>
            <?php
            break;
        case 'activite':
            ?>
                <a href="index.php" ><p class="sidebar-menu"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br>Accueil<br></p></a><hr>
                <a href="activite.php" ><p class="sidebar-menu"><i class="fa fa-object-group fa-2x" aria-hidden="true"></i><br>Liste Activit&eacute;s<br></p></a><hr>
                <a href="activite.php?rub=ajouter" ><p class="sidebar-menu"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><br>Ajouter une activit&eacute;</p></a>
            <?php
            break;
        case 'territoire':
            ?>
                <a href="index.php" ><p class="sidebar-menu"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br>Accueil<br></p></a><hr>
                <a href="territoire.php" ><p class="sidebar-menu"><i class="fa fa-object-group fa-2x" aria-hidden="true"></i><br>Liste Territoire<br></p></a><hr>
                <a href="territoire.php?rub=ajouter" ><p class="sidebar-menu"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><br>Ajouter un Territoire</p></a>
            <?php
            break;
    }
    ?>
    
    <?php
}