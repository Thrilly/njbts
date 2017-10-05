<!-- VARIABLE GET PHP : nv1 * rub -> Choiw rubrique (Ajout ou Modif/suppr)
                        nv2 * action -> Choix Action (Show, Modif, Suppr)
                        nv3 * rq -> Appel des requettes d'ajout, de mofif ou de suppression-->

<!DOCTYPE html>
<?php
include ('0-config/config.php');
include ("1-fonction/fonction-news.php");
//Conditions  REQUETES ################################################################################

if (isset($_GET['rq']) && $_GET['rq'] == 'ajt') {
    ajouterNews();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'mdf') {
    modifierNews();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'suppr') {
    supprimerNews();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'suppr_media') {
    supprimerMedia();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'actv') {
    activerNews();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'desactv') {
    desactiverNews();
}
?>
<html lang="fr">
    <head>
        <?php getMeta(); ?>
    </head>
    <body>
    <?php
        ?>
        <div id="loading"><br><br>Chargement En Cours<br><img class="img-load" src="../img/load.gif"></div>
        <?php
        getHead('news');
        if (isConnectedUser()) {
            ?>

           
            <div class="row">
                <div class="col-md-1 sidebar">
                    <?php 
                    getSidebar('news');
                    ?>
                </div>
                <div class="col-md-offset-1 col-md-11 page2">
                    
                <?php

                //Conditions PAGES ################################################################################

                if (isset($_GET['rub']) && $_GET['rub'] == 'ajouter') {
                    PageAJOUT();
                } elseif (isset($_GET['rub']) && $_GET['rub'] == 'modif_suppr') {
                    PageDATAGRID();
                } elseif (isset($_GET['action']) && $_GET['action'] == 1) {
                    PageSHOW();
                } elseif (isset($_GET['action']) && $_GET['action'] == 2) {
                    PageMODIFIER();
                } else if (!isset($_GET['rub'])) {
                    PageACCUEIL();

                }
                ?>
                </div>
            </div>


            <?php
        } else {
            header('location: index.php');
        }
        ?>
    </body>
</html>