<!-- VARIABLE GET PHP : nv1 * rub -> Choiw rubrique (Ajout ou Modif/suppr)
                        nv2 * action -> Choix Action (Show, Modif, Suppr)
                        nv3 * rq -> Appel des requettes d'ajout, de mofif ou de suppression-->

<!DOCTYPE html>
<?php
include ('0-config/config.php');
include ("1-fonction/fonction-territoire.php");

unset($_SESSION['post']);

if (isset($_GET['rq']) && $_GET['rq'] == 'ajt') {
    $_SESSION['post'] = $_POST;
    header("Location : territoire.php?rub=prpt");
}

 //Conditions  REQUETES ################################################################################
if (isset($_GET['rq']) && $_GET['rq'] == 'ajt_all') {
    ajouterTerritoire();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'mdf') {
    modifierTerritoire();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'suppr') {
    supprimerTerritoire();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'actv') {
    activerTerritoire();
} elseif (isset($_GET['rq']) && $_GET['rq'] == 'desactv') {
    desactiverTerritoire();
}
?>

<html lang="fr">
    <head>
        <?php getMeta(); ?>
    </head>
    <body>
        <div class="row">

        <?php
        getHead('territoire');
        if (isConnectedUser()) {
            ?>
                <div class="col-md-1 sidebar">
                    <?php 
                    getSidebar('territoire');
                    ?>
                </div>
                <div class="col-md-offset-1 col-md-11 page2">


                <?php
                //Conditions PAGES ################################################################################
                if (isset($_GET['action']) && $_GET['action'] == 1) {
                    PageSHOW();
                } elseif (isset($_GET['action']) && $_GET['action'] == 2) {
                    PageMODIFIER();
                } elseif (isset($_GET['rub']) && $_GET['rub'] == 'prpt') {
                    PageAJOUT();
                } else {
                    PageDATAGRID();
                }
                ?>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/vla.js"></script>

            <?php
        } else {
            header('location: index.php');
        }
        ?>
        </div>
    </body>
</html>