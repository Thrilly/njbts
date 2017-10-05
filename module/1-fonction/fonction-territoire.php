<?php

//########################################################################################################################################

function ajouterTerritoire() {
    if (strlen($_POST['territoire']) >= 4) {

        $t = new territoire; // Ajoute l'objet News a la BDD
        $t->ChargerForm();
        if (!isset($_POST['topo']) || $_POST['topo'] == "<p class='text'></p>") {
            $t->topo = NULL;
        }
        $t->Ajouter();

        $terr = new territoire; // Obtention de l'id de la News précédemment saisi a partir de la BDD.
        $rq = "SELECT * FROM TERRITOIRE where suppr=0 order by id desc";
        $lt = $terr->ListeChamps();
        $ls = $terr->ListeStruct($rq, $lt);

        if (isset($_POST['id_activite'])) { // Affecte tout les relations entre la News et les activités
            foreach ($_POST['id_activite'] as $idAct) {
                $na = new territoire_activite;
                $na->id_territoire = $ls[0]['id'];
                $na->id_activite = $idAct;
                $na->Ajouter();
                $na = NULL;
            }
        }
        unset($_SESSION['post']);
        header('Location: territoire.php?success=1');
    } else {
        getInfoBar("Nom de Territoire Trop Court", 2);
    }
}

//########################################################################################################################################


function modifierTerritoire() {

    if (strlen($_POST['territoire']) > 2) {

        $t = new territoire; // Ajoute l'objet Territoire a la BDD
        $t->id = $_GET['id'];
        $t->Charger();
        $t->ChargerForm();
        if (!isset($_POST['topo']) || $_POST['topo'] == "<p class='text'></p>") {
            $t->topo = NULL;
        }
        $t->Modifier();

        $terr = new territoire; // Obtention de l'id du Territoire précédemment saisi a partir de la BDD.
        $rq = "SELECT * FROM TERRITOIRE where suppr=0 order by id desc";
        $lt = $terr->ListeChamps();
        $ls = $terr->ListeStruct($rq, $lt);

        if (isset($_POST['id_activite'])) { // Supprime tout les relations entre le Territoire et les activités
            $terr_act = new territoire_activite;
            $rq = 'SELECT * FROM TERRITOIRE_ACTIVITE where suppr=0 and id_territoire=' . $t->id;
            $lt_1 = $terr_act->ListeChamps();
            $ls_1 = $terr_act->ListeStruct($rq, $lt_1);
            foreach ($ls_1 as $act) {
                $terr_act_2 = new territoire_activite;
                $terr_act_2->id = $act['id'];
                $terr_act_2->Charger();
                $terr_act_2->Supprimer();
            }
        }

        if (isset($_POST['id_activite'])) { // Affecte tout les relations entre le Territoire et les activités
            foreach ($_POST['id_activite'] as $idAct) {
                $na = new territoire_activite;
                $na->id_territoire = $t->id;
                $na->id_activite = $idAct;
                $na->Ajouter();
                $na = NULL;
            }
        }
        unset($_SESSION['post']);
        header('Location: territoire.php?action=1&success=1&id=' . $t->id . '&territoire=' . $t->territoire);
    } else {
        getInfoBar("Nom de Territoire Trop Court", 2);
    }
}

//########################################################################################################################################



function supprimerTerritoire() {
    $t = new territoire;
    $t->id = $_GET['id'];
    $t->Charger();
    $t->Supprimer();
    getInfoBar(" Le Territoire <i>" . $t->territoire . "</i> à été Supprimé !", 1);
}

//############################################################################################################################################

function activerTerritoire() {
    $t = new territoire;
    $t->id = $_GET['id'];
    $t->Charger();
    $t->Activer();
    getInfoBar(" Le Territoire <i>" . $t->territoire . "</i> à été Activé !", 1);
}

//############################################################################################################################################

function desactiverTerritoire() {
    $t = new territoire;
    $t->id = $_GET['id'];
    $t->Charger();
    $t->Desactiver();
    getInfoBar(" Le Territoire <i>" . $t->territoire . "</i> à été Désactivé !", 1);
}

//########################################################################################################################################




function PageAJOUT() {
    $err_text = $err_img = NULL;
    if (isset($_GET['lenght_error']) && $_GET['lenght_error'] == 1) {
        getInfoBar("Votre champs texte est trop court", 2);
        $err_text = "has-warning";
    }
    ?>


    <div class="col-md-offset-2 col-md-8">
        <div class='row'>
            <div class='col-md-12 warning'>
                <h3><i class="fa fa-plus" aria-hidden="true"></i> Ajout de Territoire</h3>
                <hr>
            </div>
        </div>
        <form action="territoire.php?rq=ajt_all" method="post">

            <div class='row'>
                <div class='col-md-5'>
                    <fieldset class="form-group">
                        <label>Territoire *</label>
                        <input type="text" class="form-control" name="territoire" placeholder="Nom du Territoire..." required 
                        <?php
                        if (isset($_SESSION['post']['territoire'])) {
                            echo " value='" . $_SESSION['post']['territoire'] . "'";
                        }
                        ?>
                               >
                    </fieldset>
                </div>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label for="exampleInputEmail1">Union Européenne</label><br>
                        <?php
                        $oui = $non = NULL;
                        if (isset($_SESSION['post']['ue']) && $_SESSION['post']['ue'] == 1) {
                            $oui = 'selected';
                        } else {
                            $non = 'selected';
                        }
                        ?>
                        <select name="ue">
                            <option value="">---------</option>
                            <option value="0" <?php echo $non ?> >Non</option> 
                            <option value="1" <?php echo $oui ?> >Oui</option>
                        </select>
                    </fieldset>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label>Traduction ENG *</label>
                        <input type="text" class="form-control" name="en_territoire" placeholder="Traduction du Territoire..." required 
                        <?php
                        if (isset($_SESSION['post']['en_territoire'])) {
                            echo " value='" . $_SESSION['post']['en_territoire'] . "'";
                        }
                        ?>
                               >
                    </fieldset>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <fieldset class="form-group">
                        <label for="exampleSelect2">Activit&eacute;(s), Concern&eacute;e(s)</label><br>
                        <div class='col-md-4'>
                            <?php
                            $a = new activite;
                            $rq = 'SELECT * FROM ACTIVITE order by activite';
                            $lt = $a->ListeChamps();
                            $ls = $a->ListeStruct($rq, $lt);
                            $colonne = 0;
                            foreach ($ls as $act) {
                                echo "<label class='checkbox-inline'><input type='checkbox' name='id_activite[]' value='" . $act['id'] . "'>" . $act['activite'] . "</label><br>";
                                $colonne++;
                                if ($colonne >= 9) {
                                    echo "<br></div><div class='col-md-4'>";
                                    $colonne = 0;
                                }
                            }
                            ?>
                        </div>
                    </fieldset>
                </div>
            </div>
            <dic class='col-md-12 <?php echo $err_text ?>'>
                <fieldset>
                    <label for="textArea">Topo du territoire</label>
                    <script>
                        tinyMCE.init({
                            selector: 'textarea#topo',
                            theme: 'modern',
                            skin: 'lightgray',
                            menubar: 'format',
                            plugins: 'importcss link',
                            entity_encoding: 'raw',
                            toolbar: ['undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | copy paste cut | bullist numlist | link', ' formatselect | fontselect | fontsizeselect styleprops'],
                            min_height: 350,
                            max_height: 500,
                            max_width: 100,
                            content_css: '../css/tinymce.css',
                        });

                        setTimeout(function () {
                            var txt = tinyMCE.activeEditor.getContent();
                            if (txt.length != 0)
                            {
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                            }
                        }, 10); // Horrible mais obligatoire pour que l'on récupère l'éditeur de texte
                    </script>
                    <textarea id='topo' class="form-control" rows="10" name="topo"><?php
                        if (isset($_SESSION['post']['topo'])) {
                            echo $_SESSION['post']['topo'];
                        } else {
                            echo "<p class='text'></p>";
                        }
                        ?></textarea>
                </fieldset>
                </fieldset>
                <div class='col-md-offset-3 col-md-6 text-center'>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
        </form>

        <?php
    }

//########################################################################################################################################



    function PageDATAGRID() {
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            getInfoBar("Le territoire à été enregistré avec succès.", 1);
        }elseif (isset($_GET['success']) && $_GET['success'] == 2) {
            getInfoBar("Le territoire <b>" . $_GET['territoire'] . "</b> à été modifier avec succès.", 1);
        }
        // elseif (isset($_GET['success']) && $_GET['success'] == 3) {
        //     getInfoBar("Le territoire ".$_GET['id']." à été désactivé", 1);
        // }elseif (isset($_GET['success']) && $_GET['success'] == 4) {
        //     getInfoBar("Le territoire ".$_GET['id']." à été activé", 1);
        // }elseif (isset($_GET['success']) && $_GET['success'] == 5) {
        //     getInfoBar("Le territoire ".$_GET['id']." à été supprimé", 1);
        // }
        ?>
        <div class='row'>
            <div class='col-md-offset-1 col-md-2'>
                <a class="btn btn-blue" href="?rub=ajouter"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un Territoire</a><br><br>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-offset-1 col-md-10'>
                <table class="table table-striped">
                    <tr>
                        <th>Actif</th>
                        <th>id</th>
                        <th>Territoire</th>
                        <th>Traduction ENG</th>
                        <th>Union Européenne</th>
                        <th>Action</th>
                    </tr>


                    <?php
                    if (isset($_GET['rub']) && $_GET['rub'] == 'ajouter') {
                        ?>
                        <tr>
                        <form method="post" action='?rub=prpt&rq=ajt'>
                            <td class="ajt">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </td>
                            <td class="ajt">
                            </td>
                            <td class="ajt">
                                <input type="text" class="form-control text-center" name="territoire" placeholder="Nom du Territoire" required autofocus>
                            </td>
                            <td class="ajt">
                                <input type="text" class="form-control text-center" name="en_territoire" placeholder="Traduction du Territoire" required>
                            </td>
                            <td class="ajt">
                                <select name="ue">
                                    <option value="">---------</option>
                                    <option value="1">Oui</option> 
                                    <option value="0">Non</option>
                                </select>
                            </td>
                            <td class="ajt">
                                <a class="btn btn-danger pt_btn" href="territoire.php">Annuler</a>
                                <button type="submit" class="btn btn-success pt_btn">Suivant</boutton>
                            </td>
                        </form>
                        <?php
                    }

                    $n = new territoire;
                    $rq = 'SELECT * FROM TERRITOIRE WHERE suppr=0 order by territoire ; ';
                    $lt = $n->ListeChamps();
                    $ls = $n->ListeStruct($rq, $lt);

                    foreach ($ls as $territoire) {
                        ?> 
                        <tr>
                            <td><?php if ($territoire['actif']) {
                            ?>
                                    <a onclick="return confirm('Voulez-vous désactiver ce Territoire ?')" href="?rub=modif_suppr&success=3&rq=desactv&id=<?php echo $territoire['id'] ?>" alt='Désactiver' style='color:green'><i class='fa fa-check' aria-hidden='true' title='Cliquez pour désactiver'></i></a>
                                    <?php
                                } else {
                                    ?>
                                    <a onclick="return confirm('Souhaitez-vous activer ce Territoire ?')" href='?rub=modif_suppr&success=4&rq=actv&id=<?php echo $territoire['id'] ?>' alt='Activer' style='color:red'><i class='fa fa-times' aria-hidden='true'  title='Cliquer pour Activer'></i></a>
                                <?php }
                                ?></td>
                            <td><?php echo $territoire['id']; ?></td>
                            <td><?php echo $territoire['territoire']; ?></td>
                            <td><?php echo $territoire['en_territoire']; ?></td>
                            <td><?php
                                if ($territoire['ue'] == 1) {
                                    echo "OUI";
                                } else {
                                    echo "NON";
                                }
                                ?></td>
                            <td>
                                <div class='row'>
                                    <a class="btn btn-primary pt_btn" href="?action=1&AMP;id=<?php echo $territoire['id']; ?> " title='Voir les Relations ou Modifier'><i class='fa fa-eye' aria-hidden='true'></i></a>
                                    <a class="btn btn-danger pt_btn" onclick="return confirm('Confirmer la suppression ?')" href="?rub=modif_suppr&AMP;success=5&AMP;rq=suppr&AMP;id=<?php echo $territoire['id']; ?>" title='Supprimer'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>

                        </tr> 
                        <?php
                    }
                    ?>

                </table>
            </div>
        </div>

        <?php
    }

//########################################################################################################################################




    function PageSHOW() {
        unset($_SESSION['post']);
        if (isset($_GET['success']) && $_GET['success'] == 2) {
            getInfoBar("Le territoire à été enregistré avec succès.", 1);
        }elseif (isset($_GET['success']) && $_GET['success'] == 1) {
            getInfoBar("Le territoire <b>" . $_GET['territoire'] . "</b> à été modifier avec succès.", 1);
        }
        ?>
        <div class='row'>
            <div class='col-md-offset-2 col-md-8'>

                <?php
                $t = new territoire;
                $t->id = $_GET["id"];
                $t->Charger();
                ?>
                <div class='col-md-12'>
                    <div class='row'>
                        <div class='col-md-2'>
                            <a class="btn btn-blue" href="?action=2&AMP;id=<?php echo $t->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i><br>Modifier</a>
                        </div>
                        <div class='col-md-2'>
                            <?php if ($t->actif == 1) {
                                ?>
                                <a class="btn btn-warning" onclick="return confirm('Désactiver Ce Territoire ?')" href="?rub=modif_suppr&AMP;action=1&AMP;rq=desactv&AMP;id=<?php echo $t->id; ?>"><i class="fa fa-times" aria-hidden="true"></i><br>Désactiver</a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-success" onclick="return confirm('Activer Ce Territoire ?')" href="?rub=modif_suppr&AMP;action=1&AMP;rq=actv&AMP;id=<?php echo $t->id; ?>"><i class="fa fa-check" aria-hidden="true"></i><br>Activer</a>
                                <?php
                            }
                            ?>

                        </div>
                        <div class='col-md-2'>
                            <a class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')" href="?rub=modif_suppr&AMP;action=3&AMP;id=<?php echo $t->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i><br>Supprimer</a><br>
                        </div>

                    </div>

                    <div class='row'>
                        <div class="col-md-6">
                            <image width="100%" src="../img/hrs.png"></image>
                        </div>
                    </div>

                </div>
                <div class='col-md-12 text-center'>
                    &nbsp;
                </div>
                <div class='col-md-5'>
                    <h3>Territoire</h3>
                    <p><?php echo $t->territoire; ?></p>
                    <hr>
                    <h3>Traduction Territoire</h3>
                    <p><?php echo $t->en_territoire; ?></p>
                    <hr>
                    <h3>Union Européenne</h3>
                    <p>
                        <?php
                        if ($t->ue) {
                            echo "Oui";
                        } else {
                            echo "Non";
                        }
                        ?>
                    </p>
                </div>
                <div class='col-md-12'>
                    <hr>
                    <h3>Topo</h3>
                    <?php
                    if ($t->topo == NULL) {
                        echo "<a href='?action=2&id=" . $_GET['id'] . "'> En écrire un ... </a>";
                    } else {
                        echo $t->topo;
                    }
                    ?><br>
                    <hr>
                    <h3>Activité(s) Concerné(s)</h3>
                    <p>
                        <?php
                        $ac = new activite;
                        $rq = "SELECT * FROM ACTIVITE join TERRITOIRE_ACTIVITE on activite.id = id_activite where TERRITOIRE_ACTIVITE.suppr=0 and id_territoire=" . $_GET["id"];
                        $lt = $ac->ListeChamps();
                        $ls = $ac->ListeStruct($rq, $lt);
                        if ($ls) {
                            foreach ($ls as $terr) {
                                echo " | " . $terr['activite'];
                            }
                        } else {
                            echo "Aucune";
                        }
                        ?>
                    <p>
                </div>
            </div>
        </div>
        <?php
    }

//##########################################################################################################


    function PageMODIFIER() {
        ?>
        <div class='row'>
            <?php
            if (isset($_GET['ext_error']) && $_GET['ext_error'] == 1) {
                echo "<div 'row'><div class='col-md-offset-1 col-md-10'><p class='bg-danger'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>  L'extention du fichier téléchargé n'est pas adapté !</p></div></div>";
            }

            $t = new territoire;
            $t->id = $_GET["id"];
            $t->Charger();
            ?>
            <form action="?rq=mdf&AMP;action=1&AMP;id=<?php echo $t->id; ?>" method='post' enctype="multipart/form-data">
                <div class='row'>
                    <div class='col-md-offset-2 col-md-8'>

                        <div class='col-md-12 warning'>
                            <h3><i class="fa fa-pencil" aria-hidden="true"></i> Modification de Territoire</h3>
                            <hr>
                        </div>
                        <div class='col-md-5'>
                            <h3>Territoire</h3>
                            <input type="text" class="form-control" name="territoire" placeholder="Nom du territoire..." required value="<?php echo $t->territoire; ?>">
                            <hr>
                            <h3>Traduction Territoire</h3>
                            <input type="text" class="form-control" name="en_territoire" placeholder="Traduction du..." required value="<?php echo $t->en_territoire; ?>">
                            <hr>
                            <h3>Union Européenne</h3>
                            <fieldset class="form-group">
                                <?php
                                $oui = $non = NULL;
                                if ($t->ue == 1) {
                                    $oui = 'selected';
                                } else {
                                    $non = 'selected';
                                }
                                ?>
                                <select name="ue">
                                    <option value="0" <?php echo $non ?> >Non</option> 
                                    <option value="1" <?php echo $oui ?> >Oui</option>
                                </select>
                            </fieldset>
                            <hr>
                        </div>

                        <div class='col-md-12'>
                            <hr>
                            <h3>Topo</h3>
                            <script>
                        tinyMCE.init({
                            selector: 'textarea#topo',
                            skin: 'lightgray',
                            menubar: 'format',
                            plugins: 'importcss link',
                            entity_encoding: 'raw',
                            toolbar: ['undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | copy paste cut | bullist numlist | link', ' formatselect | fontselect | fontsizeselect styleprops'],
                            min_height: 350,
                            max_height: 500,
                            max_width: 100,
                            content_css: '../css/tinymce.css',
                        });

                        setTimeout(function () {
                            var txt = tinyMCE.activeEditor.getContent();
                            if (txt.length != 0)
                            {
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, "");
                            }
                        }, 10); // Horrible mais obligatoire pour que l'on récupère l'éditeur de texte
                    </script>
                            <textarea id="topo" class="form-control" rows="10" name="topo"><?php
                                if (is_null($t->topo)) {
                                    echo "<p class='text'></p>";
                                } else {
                                    echo $t->topo;
                                }
                                ?></textarea>
                            <hr>

                            <hr>
                            <h3>Activité(s) Concerné(s)</h3>
                            <p>
                            <div class='col-md-4'>
                                <?php
                                $ac = new activite;
                                $rq = 'SELECT * FROM ACTIVITE order by activite';
                                $lt = $ac->ListeChamps();
                                $ls = $ac->ListeStruct($rq, $lt);
                                $colonne = 0;

                                $teract = new territoire_activite;
                                $rq = 'SELECT * FROM TERRITOIRE_ACTIVITE where id_territoire=' . $t->id;
                                $lt_2 = $teract->ListeChamps();
                                $ls_2 = $teract->ListeStruct($rq, $lt_2);

                                foreach ($ls as $act) {
                                    $checked = NULL;

                                    foreach ($ls_2 as $relation) {
                                        if ($act['id'] == $relation['id_activite']) {
                                            $checked = 'checked';
                                        }
                                    }

                                    echo "<label class='checkbox-inline'><input type='checkbox' name='id_activite[]' value='" . $act['id'] . "' " . $checked . ">" . $act['activite'] . "</label><br>";
                                    $colonne++;
                                    if ($colonne >= 9) {
                                        echo "<br></div><div class='col-md-4'>";
                                        $colonne = 0;
                                    }
                                }
                                ?>
                            </div>
                            <p>
                        </div>
                        <div class='col-md-offset-3 col-md-3 text-center'>
                            <a class="btn btn-danger" href="?rub=modif_suppr"><i class='fa fa-times fa-2x' aria-hidden='true'></i><b> Annuler</b></a>
                        </div>
                        <div class='col-md-3 text-center'>
                            <button type="submit" class="btn btn-success"><i class='fa fa-save fa-2x' aria-hidden='true'></i><b> Enregister</b></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }

//##########################################################################################################