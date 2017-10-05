<?php
include ('0-config/config.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php getMeta(); ?>
    </head>
    <body>
        <?php
        getHead();
        if (!is_null(login())) {
            connect(login());
        } else {
            header('Location: index.php?error=1');
        }
        ?>
        <div class="row ss_head_index shadow-bottom">
            <div class="col-lg-12 text-center">
                <h4>ESPACE RESERV&Eacute; AUX ADMINISTRATEURS</h4>
            </div>
        </div>

        <div class="row text-center">
            <div class='col-lg-offset-4 col-lg-4'>
                <image src='../img/loading-circle.gif'></image><br>
                <h2>Connexion</h2>
            </div>
        </div>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>