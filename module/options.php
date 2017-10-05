<?php
include ('0-config/config.php');
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
        if (isConnectedUser() && getUserConnected()['admin']==1) {
            ?>

            <div class="row ">
                <div class='col-lg-offset-4 col-lg-4 pageLogin'>
                    <div class="row text-center row-head">
                        <p><i class="fa fa-cog" aria-hidden="true"></i> Options</p>
                        <hr class="hr-style1">
                    </div>
                    <form action="index.php?rq=upload-option" method="POST">
                        <fieldset class="form-group">
                            <label for="bg-select">Fond D'écran</label>
                            <select class="form-control" id="bg-select" name="bg-select">
                            <option value="0">Aucun Fond-d'écran</option>
                            <?php 
                            for ($i=1; $i <= countBgBackOfiice(); $i++) { 
                                ?>
                                <option value="<?php echo $i; ?>" <?php if (getOption(1)==$i) echo "selected";?>>Numero <?php echo $i; ?></option>
                                <?php 
                            } 
                            ?>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="nbActu-select">Nombre d'actualités affichées en Page d'Accueil</label>
                            <select class="form-control" id="nbActu-select" name="nbActu-select">
                                <?php 
                                    for ($i=2; $i <= 8; $i++) { 
                                        ?>
                                        <option value="<?php echo $i; ?>" <?php if (getOption(2)==$i) echo "selected";?>><?php echo $i; ?></option>
                                        <?php 
                                        $i++;
                                    }
                                ?>

                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                             <label for="nbActu-select">Adresse Mail De Réception Contact</label><br>
                             <select class="form-control" name="mail">
                                 <?php 
                                 $u = new user;
                                 $req = "SELECT nom, email from USER where actif=1 and suppr=0 and email IS NOT NULL and email <> ''";
                                 $lc = array ('nom', 'email');
                                 $ls = $u->ListeStruct($req, $lc);
                                 foreach ($ls as $key => $user) {
                                     ?>
                                        <option value="<?php echo $user['email'] ?>" <?php if (getOption(3)==$user['email']) echo "selected" ?>><?php echo $user['nom']. " (".$user['email'].")" ?></option>
                                     <?php
                                 }
                                  ?>
                              </select>

                        </fieldset>
                        <fieldset class="form-group">
                            <label for="nbActu-select">Nettoyage Fichier et Base De Données</label><br>
                                &nbsp;&nbsp;<input type="checkbox" name="clear-news" onclick="return confirm('Attention ! Cette opération supprimera toutes les actualités auparavant supprimées. Après cette action, les données seront irrécuperables. Il est conseillé de consulter votre adminitrateur.')" <?php if (getUserConnected()['admin'] != 1) echo 'disabled'; ?>> Nettoyage des actualitées supprimées<br>
                                &nbsp;&nbsp;<input type="checkbox" name="clear-data" <?php if (getUserConnected()['admin'] != 1) echo 'disabled'; ?>> Nettoyage des données supprimées inutilisées<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Images inutilisées et données territoire/activités supprimées)<br><br>
                        </fieldset>
                         <div class='col-md-offset-1 col-md-5 text-center'>
                            <a class="btn btn-blue" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Accueil</a>
                        </div>
                        <div class='col-md-5 text-center'>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            
        <?php } else {
            header('location: index.php');
        }
        ?>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>