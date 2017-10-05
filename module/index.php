<?php
include ('0-config/config.php');
if (isset($_POST["login"])){
            if (!is_null(login())) {
                connect(login());
            } else {
                header('Location: index.php?error=1');
            }
        }
        if (isset($_GET["rq"]) && $_GET["rq"]=="disconnect"){
            disconnect();
        }
if (isset($_GET["rq"])&&$_GET["rq"]=="upload-option") {
    updateOption();
    if (isset($_POST["clear-news"])){
        clearNews();
    }
    if (isset($_POST["clear-data"])){
        clearData();
    }
    getInfoBar("Les modifications ont été enregistrées", 1);
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php getMeta(); 
        ?>
    </head>
    <body style="background-image: url('../img/back-office/bg-backoffice-<?php echo getOption(1); ?>.jpg'); ">

        <?php
        getHead();
        if (isConnectedUser()) {
            ?>

            <div class="row">
                <div class="col-md-1 sidebar">
                    <?php getSidebar(); ?>
                </div>
                <div class="col-md-offset-1 col-md-11 page">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8 text-center">
                            <br><br><br>
                            <a class="btn btn-blue btn-home" href="territoire.php">
                                <i class="fa fa-globe fa-3x" aria-hidden="true"></i><br>Gestion Territoires</a>
                            <a class="btn btn-blue btn-home" href="news.php">
                                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i><br>Gestion News</a>
                            <a class="btn btn-blue btn-home" href="activite.php">
                                <i class="fa fa-object-group fa-3x" aria-hidden="true"></i><br>Gestion Activité</a>
                            <a class="btn btn-blue btn-home" href="user.php" 
                            <?php 
                            if (getUserConnected()['admin'] != 1) {
                                echo "disabled";
                            }
                            ?>
                                
                            >
                                <i class="fa fa-user fa-3x" aria-hidden="true"></i><br>&nbsp;Utilisateurs</a>
                            <br><br><br><br><br><br>
                            <a class="btn btn-default pt_btn3" href="options.php" title="Gerer les options du module et du site"
                            <?php 
                            if (getUserConnected()['admin'] != 1) {
                                echo "disabled";
                            }
                            ?>
                            ><i class="fa fa-cog fa-2x" aria-hidden="true"></i>Options</a>&nbsp;
                            <a class="btn btn-danger pt_btn3" href="index.php?rq=disconnect" title="Se déconnecter du module"><i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>

            
        <?php } else {
            ?>

            <div class="row ">
                <?php
                $aide = NULL;
                $auth_error = NULL;
                $disconnect = NULL;
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    $auth_error = "<p class='text-danger text-center text-login-info'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp;Login ou mot de passe incorrect </p>";
                    // $aide = "<small class='text-muted'><i class='fa fa-info' aria-hidden='true'></i>&nbsp;Votre compte à pu être désactivé. Contactez votre administrateur.</small>";
                }
                if (isset($_GET['rq']) && $_GET['rq'] == "disconnect") {
                    $disconnect = "<p class='text-danger text-center text-login-info'><i class='fa fa-info' aria-hidden='true'></i>&nbsp;Vous avez été déconnecté(e)</p>";
                    // $aide = "<small class='text-muted'><i class='fa fa-info' aria-hidden='true'></i>&nbsp;Votre compte à pu être désactivé. Contactez votre administrateur.</small>";
                }
                ?>
                <div class='col-lg-offset-4 col-lg-4 pageLogin'>
                    <div class="row text-center row-head">
                        <p>Espace Administrateurs</p>
                        <hr class="hr-style1">
                    </div>
                    <form action="index.php" method="POST">
                    
                    <label>Veuillez entrer vos informations de connexion :</label>
                    <br><br>
                        <fieldset class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a class="btn btn-blue"><i class="fa fa-user" aria-hidden="true"></i></a>
                                </span>
                                <input type="text" class="form-control" name="login" placeholder="Login" required>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a class="btn btn-blue"><i class="fa fa-key" aria-hidden="true"></i></a>
                                </span>
                                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
                            </div>
                        </fieldset>
                        <br>
                        <?php echo $auth_error.$disconnect; ?>
                        <div class='col-md-offset-4 col-md-4 text-center'>
                            <button type="submit" class="btn btn-blue" title="Valider la connexion">Ok</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
        }
        ?>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>