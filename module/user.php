<!-- VARIABLE GET PHP : nv1 * rub -> Choiw rubrique (Ajout ou Modif/suppr)
                        nv2 * action -> Choix Action (Show, Modif, Suppr)
                        nv3 * rq -> Appel des requettes d'ajout, de mofif ou de suppression-->

<!DOCTYPE html>
<?php
include ('0-config/config.php');
//Conditions  REQUETES ################################################################################
            if (isset($_GET['rq']) && $_GET['rq'] == 'ajt') {
                ajouteruser();
            } elseif (isset($_GET['rq']) && $_GET['rq'] == 'mdf') {
                modifierUser();
            } elseif (isset($_GET['rq']) && $_GET['rq'] == 'suppr') {
                supprimerUser();
            } elseif (isset($_GET['rq']) && $_GET['rq'] == 'actv') {
                activerUser();
            } elseif (isset($_GET['rq']) && $_GET['rq'] == 'desactv') {
                desactiverUser();
            }

?>
<html lang="fr">
    <head>
        <?php 
            getMeta(); 
        ?>
    </head>
    <body style="background-image: url('../img/back-office/bg-backoffice-<?php echo getOption(1); ?>.jpg'); ">
        <div class="row">
        <?php
        getHead('user');
        if (isConnectedUser() && ((getUserConnected()["admin"]==1)||(isset($_GET["id"]) && $_SESSION['user']['id'] == $_GET["id"]))) {
            ?>
            <div class="col-md-1 sidebar">
                    <?php 
                    getSidebar('user');
                    ?>
                </div>
                <div class="col-md-offset-1 col-md-11 page2">
                <?php
                

                //Conditions PAGES ################################################################################

                if (isset($_GET['action']) && ($_GET['action'] == 1||$_GET['action'] == 2)) {
                    PageAJOUT_MODIF();
                } else if (!isset($_GET['rub'])) {
                    PageDATAGRID_USER();
                }
                ?>
                </div>
            </div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/vla.js"></script>

            <?php
        } else {
            ?>
            <div class="row">
                <div class="col-md-12">
                <div class="col-md-1 sidebar">
                    <?php getSidebar(); ?>
                </div>
                <div class="col-md-offset-1 col-md-11">
                    <div class="col-md-offset-4 col-md-4 pageLogin">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4><i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true"></i></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4>ERREUR<br><br>Vous devez être administrateur pour effectuer cette action.</h4><br><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href='index.php' class='btn btn-primary pt_btn'>OK</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
            

            <?php
        }
        ?>
    </div>
    </body>
</html>