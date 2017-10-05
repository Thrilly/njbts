<!-- VARIABLE GET PHP : nv1 * rub -> Choiw rubrique (Ajout ou Modif/suppr)
                        nv2 * action -> Choix Action (Show, Modif, Suppr)
                        nv3 * rq -> Appel des requettes d'ajout, de mofif ou de suppression-->

<!DOCTYPE html>
<?php
include ('0-config/config.php');
include ("1-fonction/fonction-activite.php");
?>
<html lang="fr">
    <head>
        <?php getMeta(); ?>
    </head>
    <body>
        <?php
        getHead('activite');
        if (isConnectedUser()) {
            ?>
            <div class="row">

                <?php
                //Conditions  REQUETES ################################################################################

                if (isset($_GET['rq']) && $_GET['rq'] == 'ajt') {
                    ajouterActivite();
                } elseif (isset($_GET['rq']) && $_GET['rq'] == 'mdf') {
                    modifierActivite();
                } elseif (isset($_GET['rq']) && $_GET['rq'] == 'suppr') {
                    supprimerActivite();
                } elseif (isset($_GET['rq']) && $_GET['rq'] == 'actv') {
                    activerActivite();
                } elseif (isset($_GET['rq']) && $_GET['rq'] == 'desactv') {
                    desactiverActivite();
                }
                ?>
                 <div class="col-md-1 sidebar">
                    <?php 
                    getSidebar('activite');
                    ?>
                </div>
                <div class="col-md-offset-1 col-md-11 page2">
                    <?php 
                    PageDATAGRID();
                    ?>
                </div>
               
                
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="./js/vla.js"></script>
            <?php
        } else {
            header('location: index.php');
        }
        ?>
    </body>
</html>