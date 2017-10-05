<?php

function login() {
    $u = new user;
    $u->login = $_POST["login"];
    $u->mdp = md5($_POST["mdp"]);
    $req = "SELECT id FROM USER WHERE login = '".$_POST["login"]."' AND mdp = '".md5($_POST["mdp"])."' AND actif = 1 AND suppr = 0";
    $res = $u->ListeStruct($req, array("id"));
    if (!empty($res)) {
        
        return $res[0]["id"];
    } else {
        return null;
    }
}

//###############################################################################################################################

function connect($id) {
    $_SESSION['user']['id'] = $id;
    $u = new user;
    $u->id = $id;
    $u->Charger();
    $_SESSION['user']['login'] = $u->login;
    $_SESSION['user']['nom'] = $u->nom;
    $_SESSION['user']['pnom'] = $u->pnom;
    $_SESSION['user']['admin'] = $u->admin;
    getInfoBar("Vous êtes connecté(e) en tant que <i>".$u->login."</i>", 3);
}

//###############################################################################################################################

function getUserConnected() {
    return $_SESSION['user'];
}

//###############################################################################################################################

function isConnectedUser() {
    if (isset($_SESSION['user']['id'])) {
        return TRUE;
    } else {
        return FALSE;
    }
}

//###############################################################################################################################

function disconnect() {
    unset($_SESSION['user']['id']);
}

//###############################################################################################################################

function activerUser() {
    $u = new user;
    $u->id = $_GET['id'];
    $u->Charger();
    $u->Activer();
    getInfoBar("L'utilisateur <i>" . $u->login . "</i> à été Activé !", 1);
    // echo "<div class='col-md-offset-1 col-md-10'><p class='bg-success'><i class='fa fa-check' aria-hidden='true'></i> L'utilisateur <b>" . $u->login . "</b> à été Activée !</p></div>";
    $u = NULL;
}

//############################################################################################################################################

function desactiverUser() {
    $u = new user;
    $u->id = $_GET['id'];
    $u->Charger();
    if ($u->id == 1 || $u->login=='admin'){
       getInfoBar("Erreur ! Impossible de désactiver le compte administrateur.", 2); 
    }elseif($_GET['id']==getUserConnected()["id"]) {
        getInfoBar("Impossible de désactiver votre propre compte. Pour effectuer cette action, utiliser un autre compte administrateur", 4);
    }else{
        $u->Desactiver();
        getInfoBar("L'utilisateur <i>" . $u->login . "</i> à été Désactivé !", 1);
    }
    $u = NULL;
}

//###############################################################################################################################

function ajouterUser() {
    $u = new user;

    if (!empty($_POST['mdp'])) {
        if (!empty($_POST['mdp2'])) {
            if ($_POST['mdp'] == $_POST['mdp2']) {
                unset($_POST['mdp2']);
                $u->ChargerForm();
                $u->mdp = md5($u->mdp);
                $u->nom = strtoupper($u->nom);
                $u->Ajouter();
                getInfoBar("L'utilisateur à été ajouté", 1);
            } else {
                header("Location: user.php?error=3&action=2&id=".$_GET["id"]);
            }
        } else {
            header("Location: user.php?error=2&action=2&id=".$_GET["id"]);
        }
    } else {
        header("Location: user.php?error=1&action=2&id=".$_GET["id"]);
    }
}

function modifierUser() {
    $u = new user;
    $u->id = $_GET['id'];
    $u->Charger();
    $user = getUserConnected();
    if (getUserConnected()['admin']!=1){ //Securité pour eviter toute modif indésirable d'utilisateur
        $_POST['nom']!=$u->nom;
        $_POST['login']!=$u->login;
    }
    if (empty($_POST['mdp']) && !empty($_POST['mdp2'])){
         getInfoBar("Les deux champs de mot de passe doivent être remplis.", 2);
    }else{
        if (!empty($_POST['mdp'])) {
            if (($_POST['mdp']!="") && ($_POST['mdp2']!="")) {
                if ($_POST['mdp'] == $_POST['mdp2']) {
                    $u->ChargerForm();
                    $u->nom = strtoupper($u->nom);
                    $u->mdp = md5($u->mdp);
                    $u->Modifier();
                    getInfoBar("L'utilisateur à été modifié", 1);
                } else {
                    getInfoBar("Les champs de mot de passe doivent être identiques.", 2);
                }
            } else {
                getInfoBar("Les deux champs de mot de passe doivent être remplis.", 2);
            }
        } else {
            $_POST['mdp'] = $u->mdp;
            $u->ChargerForm();
            $u->Modifier();
            getInfoBar("L'utilisateur à été modifié", 1);
        }
    }
}

function supprimerUser() {
    $u = new user;
    $u->id = $_GET['id'];
    $u->Charger();
    if ($u->login == 'admin' || $u->id == 1) {
        getInfoBar("Impossible de supprimer le compte administrateur", 2);
        return;
    } elseif($_GET['id']==getUserConnected()["id"]) {
        getInfoBar("Impossible de supprimer votre propre compte. Pour effectuer cette action, utiliser un autre compte administrateur", 4);
    } else {
        $u->Supprimer();
        getInfoBar("L'utilisateur' " . $_GET['id'] . " à été supprimée !", 1);
    }
}

//###############################################################################################################################


function PageAJOUT_MODIF() {
    if (isset($_GET['action']) && $_GET['action'] == 2) {
        $action = 2;
        $user = new user;
        $user->id = $_GET['id'];
        $user->Charger();
    } else {
        $action = NULL;
    }
    ?>
        <div class="col-md-offset-2 col-md-8">
    <?php 

    if (isset($_GET['error']) && $_GET['error'] == 1) {
        getInfoBar("Le champs 'Mot de passe''doit être rempli.", 2);
    }elseif (isset($_GET['error']) && $_GET['error'] == 2) {
        getInfoBar("Le champs 'Repetez mot de passe' doit être rempli.", 2);
    }elseif (isset($_GET['error']) && $_GET['error'] == 3) {
        getInfoBar("Les champs de mot de passe doivent être identiques.", 2);
    }
    ?>
    
        <div class='row'>
            <div class='col-md-12 warning'>
                <h3> 
                <?php 
                    if ($action == 2) {
                        echo "<i class='fa fa-pencil' aria-hidden='true'></i> Modification d'utilisateur";
                    } else {
                        echo "<i class='fa fa-plus' aria-hidden='true'></i> Nouvel d'utilisateur";
                    } 
                ?>
                </h3>
                <hr>
            </div>
        </div>
        <form action="<?php
        if (getUserConnected()['admin'] == 1){
            if ($action == 2) {
                echo 'user.php?rq=mdf&id=' . $user->id;
            } else {
                echo 'user.php?rq=ajt';
            } 
        }else{
            echo 'user.php?action=2&rq=mdf&id=' . $user->id;;
        }
        
        ?>" method="post">

            <div class='row'>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Nom *</label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom..." value="<?php if ($action == 2) echo $user->nom; ?>" <?php if ($action == 2 && ($user->login == 'admin' || getUserConnected()['admin']!=1)) echo 'disabled'; ?> required>
                    </fieldset>
                </div>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Prénom *</label>
                        <input type="text" class="form-control" name="pnom" placeholder="Prénom..." value="<?php if ($action == 2) echo $user->pnom; ?>" <?php if ($action == 2 && getUserConnected()['admin']!=1) echo 'disabled'; ?> required>
                    </fieldset>
                </div>
            </div>
            <hr>
            <div class='row'>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Adresse Mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Email..." value="<?php if ($action == 2) echo $user->email; ?>">
                    </fieldset>
                </div>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Login *</label>
                        <input type="text" class="form-control" name="login" placeholder="Login de connexion..." value="<?php if ($action == 2) echo $user->login; ?>" <?php if ($action == 2 && ($user->login == 'admin' || getUserConnected()['admin']!=1)) echo 'disabled'; ?> required>
                    </fieldset>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Mot de passe *</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe..." <?php if ($action != 2) echo 'required'; ?>>
    <?php if ($action == 2) echo "<small class='text-muted'><i class='fa fa-info' aria-hidden='true'></i>&nbsp;Ne rien mettre si vous ne souhaitez pas modifier le mot de passe</small>"; ?>
                    </fieldset>
                </div>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Repetez Mot de passe *</label>
                        <input type="password" class="form-control" id="mdp2" name="mdp2" placeholder="Répétez le précédent mot de passe..." <?php if ($action != 2) echo 'required'; ?>>
    <?php if ($action == 2) echo "<small class='text-muted'><i class='fa fa-info' aria-hidden='true'></i>&nbsp;Laisser vide si le champs 'mot de passe' n'est pas rempli</small>"; ?>
                    </fieldset>
                </div>
            </div>
            <?php 
            if (getUserConnected()['admin']==1 && getUserConnected()['id']!=$_GET['id'] && $_GET['id']!=1){
                ?>
                <div class='row'>
                    <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Attribution de tout les droits</label><br>
                        <input type="radio" name="admin" value="0" checked> NON<br>
                        <input type="radio" name="admin" value="1" <?php if($action == 2 && $user->admin==1) echo "checked" ?>> OUI

                    </fieldset>
                </div>
                </div>
                <?php
            }
             ?>
            

            <hr>
            <div class='row'>
                <div class='col-md-offset-3 col-md-3 text-center'>
                    <a class="btn btn-danger" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Annuler</a>
                </div>
                <div class='col-md-3 text-center'>
                    <button type="submit" class="btn btn-blue"><i class="fa fa-save" aria-hidden="true"></i>&nbsp; Enregistrer</button>
                </div>
            </div>

        </form>

        <?php
    }

//###############################################################################################################################

    function PageDATAGRID_USER() {
        ?>
        <div class='row'>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                getInfoBar("Action annulé", 4);
            }

            ?>
            <div class='row'>
                <div class='col-md-offset-1 col-md-2'>
                    <a class="btn btn-blue" href="?action=1"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un Utilisateur</a><br><br>
                </div>
            </div>
            <div class="row">
            <div class='col-md-offset-1 col-md-10'>
                <table class="table table-striped">
                    <tr>
                        <th>Actif</th>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Droits</th>
                        <th>Date de création</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $u = new user;
                    $rq = 'SELECT * FROM USER WHERE suppr=0 order by id ; ';
                    $lt = $u->ListeChamps();
                    $ls = $u->ListeStruct($rq, $lt);

                    foreach ($ls as $user) {
                        ?> 

                        <tr>
                            <td><?php
                        if ($user['actif']) {
                            if ($user['login'] == 'admin' || $user['id'] == 1) {
                                ?>
                                        <a onclick="return alert('ERREUR ! Vous ne pouver pas désactivé le compte administrateur !')" href="?error=1" ><i class='fa fa-check' aria-hidden='true'></i></a>
                                    <?php } else { ?>
                                        <a onclick="return confirm('Voulez-vous désactiver cet utilisateur ?')" href="?rq=desactv&success=3&id=<?php echo $user['id'] ?>" alt='Désactiver' style='color:green'><i class='fa fa-check' aria-hidden='true'></i></a>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a onclick="return confirm('Souhaitez-vous activer cet Utilisateur ?')" href='?rq=actv&success=4&id=<?php echo $user['id'] ?>' alt='Activer' style='color:red'><i class='fa fa-times' aria-hidden='true'></i></a>
        <?php }
        ?></td>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['nom']; ?></td>
                            <td><?php echo $user['pnom']; ?></td>
                            <td><b><?php echo $user['login']; ?></b></td>
                            <td><?php if ($user['email']!=""||$user['email']!=null){echo $user['email'];}else{echo "N/D";} ?></td>
                            <td><?php if ($user['admin']==1){echo "<b>OUI</b>";}else{echo "NON";} ?></td>
                            <td><?php echo convDateAffichage($user['date_crea']) ?></td>
                            <td>
                                <div class='row'>
                                    <a class="btn btn-primary pt_btn" href="?action=2&AMP;id=<?php echo $user['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <?php if ($user['login'] == 'admin') { ?>
                                        <a class="btn btn-default pt_btn"><i class="fa fa-trash" aria-hidden="true" disabled></i></a>
                                        <?php } else { ?>
                                        <a class="btn btn-danger pt_btn" onclick="return confirm('Confirmer la suppression ?')" href="?rq=suppr&AMP;id=<?php echo $user['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
            <?php
        }
        ?>
                                </div>
                            </td>
                        </tr> 

        <?php
    }
    ?>

                </table>
            </div>
            </div>
        </div>

    <?php
}
