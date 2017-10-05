<?php

function ajouterNews() {
    $error1 = $error2 = NULL;
    if (strlen($_POST['texte']) > 0) {
        if (strlen($_POST['texte']) > 20) { // Si le texte est assez long.
            if (!isset($_POST['auteur']) || $_POST['auteur'] == '') { //Si aucun auteur n'est saisi
                $_POST['auteur'] = 'VELUT &AMP; ASSOCI&Eacute;S';
            }

            if (isset($_FILES['img_upload']) && $_FILES['img_upload']['name'] != '') {

                $type_file = $_FILES['img_upload']['type'];
                if (strstr($type_file, 'jpg') || strstr($type_file, 'jpeg') || strstr($type_file, 'png') || strstr($type_file, 'gif') || strstr($type_file, 'bmp')) { // Si son extension est bonne
                    $dossier = __DIR__ . "/../../upload/";
                    $_FILES['img_upload']['name'] = date("YmdHis") . "_" . $_FILES['img_upload']['name'];
                    $fichier = basename($_FILES['img_upload']['name']);

                    if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $dossier . $fichier)) { // Si le transfert s'est fait correctement
                        $_POST['img'] = $_FILES['img_upload']['name'];
                    } else {
                        $_FILES = NULL;
                        $error1 = '&upld_error=1';
                    }
                } else {
                    $_SESSION['post'] = $_POST;
                    header('Location: news.php?ext_error=1&rub=ajouter');
                    return;
                }
            } else {
                $_POST['img'] = 'logo_info.jpg';
            }


            $n = new news; // Ajoute l'objet News a la BDD
            $n->ChargerForm();
            $n->date_maj = '0000-00-00';
            $n->actif = 0;
            $n->auteur_crea = $_SESSION['user']['login'];
            $n->auteur_maj = NULL;
            $n->Ajouter();

            $news = new news; // Obtention de l'id de la News précédemment saisi a partir de la BDD.
            $rq = "SELECT * FROM NEWS where suppr=0 order by id desc";
            $lt = $news->ListeChamps();
            $ls = $news->ListeStruct($rq, $lt);


            if (isset($_POST['id_activite'])) { // Affecte tout les relations entre la News et les activités
                foreach ($_POST['id_activite'] as $idAct) {
                    $na = new news_activite;
                    $na->id_news = $ls[0]['id'];
                    $na->id_activite = $idAct;
                    $na->Ajouter();
                    $na = NULL;
                }
            }

            if (isset($_POST['id_territoire'])) { // Affecte tout les relations entre la News et les territoires
                foreach ($_POST['id_territoire'] as $idTerr) {
                    $tr = new news_territoire;
                    $tr->id_news = $ls[0]['id'];
                    $tr->id_territoire = $idTerr;
                    $tr->Ajouter();
                    $tr = NULL;
                }
            }

            if (isset($_FILES['upload_multiple']) && $_FILES['upload_multiple']['name'][0] != '') {
                $files = reArrayFiles($_FILES['upload_multiple']);
                foreach ($files as $file) {
                    $up = new upload;
                    $up->id_news = $ls[0]['id'];
                    $type_file = $file['type'];
                    if (strstr($type_file, 'jpg') || strstr($type_file, 'jpeg') || strstr($type_file, 'png') || strstr($type_file, 'gif') || strstr($type_file, 'bmp') || strstr($type_file, 'mp4')) { // Si son extension est bonne
                        $dossier = __DIR__ . "/../../upload/";
                        $file['name'] = date("YmdHis") . "_" . $file['name'];
                        $fichier = basename($file['name']);

                        if (move_uploaded_file($file['tmp_name'], $dossier . $fichier)) { // Si le transfert s'est fait correctement
                            $up->file = $file['name'];
                        } else {
                             $error1 = '&upld_error=1';
                        }
                        $up->Ajouter();
                    } else {
                        $error2 = '&ext_error=1';
                    }
                }
            }

            unset($_SESSION['post']);
            header('Location: news.php?id=' . $ls[0]['id'] . '&success=1' . $error1.$error2 .'&action=1');
            return;
        } else {
            header('Location: news.php?lenght_error=1&rub=ajouter');
            $_SESSION['post'] = $_POST; // Sauvegarde des données saisies en cas d'errreur
        }
    } else {
        header('Location: news.php?lenght_error=2&rub=ajouter');
        $_SESSION['post'] = $_POST; // Sauvegarde des données saisies en cas d'errreur
    }
}

//######################################################################################################


function modifierNews() {

    $error1 = NULL;
    if (strlen($_POST['texte']) > 0) {
        if (strlen($_POST['texte']) > 30) { // Si le texte est assez long.
            if (!isset($_POST['auteur']) || $_POST['auteur'] == '') { //Si aucun auteur n'est saisi
                $_POST['auteur'] = 'VELUT &AMP; ASSOCI&Eacute;S';
            }

            if (isset($_FILES['img_upload']) && $_FILES['img_upload']['name'] != '') { // Si une image est uploader
                $type_file = $_FILES['img_upload']['type'];

                if (strstr($type_file, 'jpg') || strstr($type_file, 'jpeg') || strstr($type_file, 'png') || strstr($type_file, 'gif') || strstr($type_file, 'bmp')) { // Si son extension est bonne
                    $dossier = __DIR__ . "/../../upload/";
                    $_FILES['img_upload']['name'] = date("YmdHis") . "_" . $_FILES['img_upload']['name'];
                    $fichier = basename($_FILES['img_upload']['name']);

                    if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $dossier . $fichier)) { // Si le transfert s'est fait correctement
                        $_POST['img'] = $_FILES['img_upload']['name'];
                    } else {
                        $_FILES = NULL;
                        $error1 = '&upld_error=1';
                    }
                } else {
                    $_SESSION['post'] = $_POST;
                    header('Location: news.php?id=' . $_GET['id'] . '&ext_error=1&action=2');
                    return;
                }
            }

            $n = new news; // Modifie l'objet News
            $n->id = $_GET['id'];
            $n->Charger();
            $n->ChargerForm();
            $n->auteur_maj = $_SESSION['user']['login'];
            $n->Modifier();


            $news_act = new news_activite;
            $rq = 'DELETE FROM NEWS_ACTIVITE where id_news=' . $n->id;
            $news_act->Sql($rq);
            if (isset($_POST['id_activite'])) { // Supprime tout les relations entre la News et les activités

                foreach ($_POST['id_activite'] as $idAct) { // Réaffecte tout les relations entre la News et les activités
                    $na = new news_activite;
                    $na->id_news = $n->id;
                    $na->id_activite = $idAct;
                    $na->Ajouter();
                    $na = NULL;
                }
            }

            $news_terr = new news_territoire;
            $rq = 'DELETE FROM NEWS_TERRITOIRE where id_news=' . $n->id;
            $news_terr->Sql($rq);
            if (isset($_POST['id_territoire'])) { // Supprime tout les relations entre la News et les territoires

                foreach ($_POST['id_territoire'] as $idTerr) { // Réaffecte tout les relations entre la News et les territoires
                    $ntr = new news_territoire;
                    $ntr->id_news = $n->id;
                    $ntr->id_territoire = $idTerr;
                    $ntr->Ajouter();
                    $ntr = NULL;
                }
            }
            if (isset($_FILES['upload_multiple']) && $_FILES['upload_multiple']['name'][0] != '') {
                $files = reArrayFiles($_FILES['upload_multiple']);
                foreach ($files as $file) {
                    $up = new upload;
                    $up->id_news = $_GET['id'];
                    $type_file = $file['type'];
                    if (strstr($type_file, 'jpg') || strstr($type_file, 'jpeg') || strstr($type_file, 'png') || strstr($type_file, 'gif') || strstr($type_file, 'bmp') || strstr($type_file, 'mp4')) { // Si son extension est bonne
                        $dossier = __DIR__ . "/../../upload/";
                        $file['name'] = date("YmdHis") . "_" . $file['name'];
                        $fichier = basename($file['name']);

                        if (move_uploaded_file($file['tmp_name'], $dossier . $fichier)) { // Si le transfert s'est fait correctement
                            $up->file = $file['name'];
                        } else {
                            getInfoBar("Echec de l'upload du/des m&eacute;dia(s)", 2);
                        }
                        $up->Ajouter();
                    } else {
                        getInfoBar("Format du/des m&eacute;dia(s) incompatible", 2);
                    }
                }
            }
            getInfoBar("L'article ".$_GET['id']." a &eacute;t&eacute; modifi&eacute;e avec succès", 1);
        } else {
            getInfoBar("Votre champs 'Texte de l'article' est trop court.", 2);
        }
    } else {
        getInfoBar("Votre champs 'Texte de l'article' doit être rempli ", 2);
    }
}

//######################################################################################################



function supprimerNews() {
    $a = new news;
    $a->id = $_GET['id'];
    $a->Charger();
    $a->auteur_maj = $_SESSION['user']['login'];
    $a->Modifier();//Tracabilité de l'action
    $a->Supprimer();
    getInfoBar("La News " . $_GET['id'] . " à &eacute;t&eacute; supprim&eacute;e !", 1);
}

function supprimerMedia() {
    $a = new upload;
    $a->id = $_GET['idMedia'];
    $a->Charger();
    $a->auteur_maj = $_SESSION['user']['login'];
    $a->Modifier();//Tracabilité de l'action
    $a->Supprimer();
    getInfoBar("Le M&eacute;dia à &eacute;t&eacute; supprim&eacute;e !", 1);
}

function activerNews() {
    $a = new news;
    $a->id = $_GET['id'];
    $a->Charger();
    $a->auteur_maj = $_SESSION['user']['login'];
    $a->Modifier();//Tracabilité de l'action
    $a->Activer();
    getInfoBar("L'article ".$_GET['id']." à &eacute;t&eacute; publi&eacute;.", 1);
}

function desactiverNews() {
    $a = new news;
    $a->id = $_GET['id'];
    $a->Charger();
    $a->auteur_maj = $_SESSION['user']['login'];
    $a->Modifier();//Tracabilité de l'action
    $a->Desactiver();
    getInfoBar("L'article ".$_GET['id']." à &eacute;t&eacute; masqu&eacute;.", 1);
}

//######################################################################################################




function PageAJOUT() {
    $err_text = $err_img = NULL;
    if (isset($_GET['lenght_error']) && $_GET['lenght_error'] == 1) {
        getInfoBar("Votre champs 'Texte de l'article' est trop court.", 2);
        $err_text = "has-warning";
    }
    if (isset($_GET['lenght_error']) && $_GET['lenght_error'] == 2) {
        getInfoBar("Votre champs 'Texte de l'article' doit être rempli.", 2);
        $err_text = "has-warning";
    }
    if (isset($_GET['ext_error']) && $_GET['ext_error'] == 1) {
        getInfoBar("L'extention d'un ou plusieurs fichiers t&eacute;l&eacute;charg&eacute;s n'est pas compatible !", 2);
    }
    ?>


    <div class="col-md-offset-2 col-md-8">
        <div class='row'>
            <div class='col-md-12 warning'>
                <h3><i class="fa fa-plus" aria-hidden="true"></i> Ajout de News</h3>
                <hr>
            </div>
        </div>
        <form action="news.php?rub=modif_suppr&AMP;rq=ajt" method="post" enctype="multipart/form-data">

            <div class='row'>
                <div class='col-md-5'>
                    <fieldset class="form-group">
                        <label>Titre *</label>
                        <input type="text" class="form-control" maxlength="300" name="titre" placeholder="Titre de la news..." required  
                        <?php
                        if (isset($_SESSION['post']['titre'])) {
                            echo " value='" . $_SESSION['post']['titre'] . "'";
                        }
                        ?>
                               >
                        <small class="text-muted"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Titre affich&eacute; en gros</small>
                    </fieldset>
                </div>
                <div class='col-md-6'>
                    <fieldset class="form-group">
                        <label for="exampleInputEmail1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur de la news..." 
                        <?php
                        if (isset($_SESSION['post']['auteur'])) {
                            echo " value='" . $_SESSION['post']['auteur'] . "'";
                        }
                        ?>>
                        <small class="text-muted"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Par d&eacute;faut : VELUT & ASSOCIES</small>
                    </fieldset>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-5'>
                    <label for="exampleSelect2">Territoire(s) concern&eacute;(s)</label>
                    <select multiple class="form-control" name='id_territoire[]' id="exampleSelect2">
                        <?php
                        $a = new territoire;
                        $rq = 'SELECT * FROM TERRITOIRE WHERE suppr=0 and actif=1 order by territoire';
                        $lt = $a->ListeChamps();
                        $ls = $a->ListeStruct($rq, $lt);
                        foreach ($ls as $terr) {
                            echo "<option value='" . $terr['id'] . "'>" . $terr['territoire'] . "</option>";
                        }
                        ?>
                    </select>
                    <small class="text-muted"><i class="fa fa-question" aria-hidden="true"></i>
                        &nbsp;CTRL+Clic pour selection multiple</small>
                </div>
                <div class="col-md-6">
                    <label for="InputFile">Photo d'Illustration Principale</label>
                    <input type="file" name='img_upload' id="InputFile">
                    <div class="gallery"></div>
                    <small class="text-muted"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        &nbsp;Extensions possibles : .jpg, .jpeg, .png, .gif, .bpm</small>
                </div> 
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <fieldset class="form-group">
                        <label for="exampleSelect2">Activit&eacute;(s), Concern&eacute;e(s)</label><br>
                        <div class='col-md-4'>
                            <?php
                            $a = new activite;
                            $rq = 'SELECT * FROM ACTIVITE WHERE suppr=0 and actif=1 order by activite';
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
            <div class='col-md-12'>
                <fieldset>
                    <label for="textArea">Texte De l'Article *</label>
                    <script>
                        tinyMCE.init({
                            selector: 'textarea#texte',
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
                    <textarea id="texte" class="form-control" rows="10" name="texte" ><?php
                        if (isset($_SESSION['post']['texte']) && $_SESSION['post']['texte'] != '') {
                            echo $_SESSION['post']['texte'];
                        }
                        ?></textarea>
                </fieldset><br><br>
            </div>

            <div class='col-md-12'>
                <label for="exampleSelect2">Ressources Compl&eacute;mentaires</label>
                <input type="file" name='upload_multiple[]' id="InputFiles" multiple>
                <div class="gallery2"></div>
                <small class="text-muted"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    &nbsp;Extensions possibles :<b>IMAGE</b>: .jpg, .jpeg, .png, .gif, .bpm | <b>VIDEO</b>: .mp4</small><br><br>
            </div>

            

            <div class='col-md-offset-3 col-md-6 text-center'>
                <button type="submit" class="btn btn-success" id="save">Enregistrer</button>
            </div>
        </form>

        <?php
    }

//######################################################################################################



    function PageDATAGRID() {

        if (isset($_POST['actif']) && $_POST['actif'] != 2) {
            $actif = "AND actif=" . $_POST['actif'] . "";
        } else {
            $actif = NULL;
        }

        if (isset($_POST['search']) && $_POST['search'] != NULL) {
            $search = "AND " . $_POST['data'] . " like '%" . $_POST['search'] . "%'";
        } else {
            $search = NULL;
        }

        $n = new news;
        $rq = 'SELECT * FROM NEWS WHERE suppr=0 ' . $search . ' ' . $actif . ' order by id desc ; ';
        $lt = $n->ListeChamps();
        $ls = $n->ListeStruct($rq, $lt);
        ?>
        <div class='row'>
            <div class='col-md-offset-1 col-md-2'>
                <a class="btn btn-blue" href="?rub=ajouter"><i class="fa fa-plus" aria-hidden="true"></i> Nouvelle News</a><br><br>
            </div>
        </div>
        <div class='row'>

            <div class='col-md-offset-1 col-md-5'>
                <p><?php echo count($ls) . " resulat(s) trouv&eacute;(s)"; ?></p>
            </div>

            <form action="?rub=modif_suppr" method="post">
                <div class='col-md-2'>
                    <div class="input-group pull-right">
                        <select name="actif" class="form-control">
                            <option value="1">Seulement les actif</option> 
                            <option value="0">Seulement les inactif</option>
                            <option value="2" selected>Afficher Tout</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" title="Rechercher">Ok</button>
                        </span>
                    </div>
                </div>

                <div class='col-md-3'>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <select name="data" class="form-control search-filter">
                                <option value="id">Par ID</option> 
                                <option value="date_crea">Par Date</option>
                                <option value="date_maj">Par Date de MAJ</option>
                                <option value="auteur_crea">Par Login Auteur</option>
                                <option value="auteur_maj">Par Login Auteur MAJ</option>
                                <option value="titre" selected>Par Titre</option>
                            </select>
                        </span>
                        <input type="text" class="form-control" name="search" id="input-search" placeholder="Recherche..." >
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" title="Rechercher">Go!</button>
                        </span>
                    </div>  
                </div>
            </form>

        </div>
        <div class='row'>
            <div class='col-md-offset-1 col-md-10'>
                <table class="table table-striped">
                    <tr>
                        <th>Publiée</th>
                        <th>id</th>
                        <th>Titre</th>
                        <th>Date de Cr&eacute;ation</th>
                        <th>Dernière modification</th>
                        <th>Cr&eacute;ateur</th>
                        <th>Modifi&eacute; par</th>
                        <th class="td-action">Action</th>
                    </tr>

                    <?php
                    if (count($ls) > 0) {

                        foreach ($ls as $news) {
                            ?> 

                            <tr>
                                
                                <td><?php if ($news['actif']) {
                                ?>
                                        <a onclick="return confirm('Voulez-vous d&eacute;sactiver cette News ?')" href="?rub=modif_suppr&rq=desactv&id=<?php echo $news['id'] ?>" alt='D&eacute;sactiver' style='color:green' title='Cliquer pour D&eacute;sactiver'><i class='fa fa-check' aria-hidden='true'></i></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a onclick="return confirm('Souhaitez-vous activer cette News ?')" href='?rub=modif_suppr&rq=actv&id=<?php echo $news['id'] ?>' alt='Activer' style='color:red' title='Cliquer pour Activer'><i class='fa fa-times' aria-hidden='true'></i></a>
                                    <?php }
                                    ?></td>
                                <td><?php echo $news['id']; ?></td>
                                <td><a href="?id=<?php echo $news['id']; ?>&AMP;action=1"><?php echo Cesure($news['titre'],40); ?></a></td>
                                <td><?php echo convDateAffichage($news['date_crea']); ?></td>
                                <td><?php
                                    if ($news['date_maj'] == '0000-00-00' || $news['date_maj'] == NULL || $news['date_maj'] == '') {
                                        echo 'N/D';
                                    } else {
                                        echo convDateAffichage($news['date_maj']);
                                    }
                                    ?>
                                </td>
                                <td><?php echo $news['auteur_crea']; ?></td>
                                <td><?php echo $news['auteur_maj']; ?></td>
                                <td>
                                    <div class='row'>
                                        <a class="btn btn-success pt_btn-3" href="?id=<?php echo $news['id']; ?>&AMP;action=1 "><i class="fa fa-eye" aria-hidden="true" title="Voir"></i></a>
                                        <a class="btn btn-primary pt_btn-3" href="?&AMP;id=<?php echo $news['id']; ?>&AMP;action=2"><i class="fa fa-pencil" aria-hidden="true" title="Modifer"></i></a>
                                        <a class="btn btn-danger pt_btn-3" onclick="return confirm('Confirmer la suppression ?')" href="?rub=modif_suppr&AMP;rq=suppr&AMP;id=<?php echo $news['id']; ?>" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr> 


                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'><p class='publish text-center'>Aucun Resultat...</p></td></tr>";
                    }
                    ?>

                </table>
            </div>
        </div>

        <?php
    }

//######################################################################################################




    function PageSHOW() {
        unset($_SESSION['post']);
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            getInfoBar("L'article à &eacute;t&eacute; enregistr&eacute; avec succès. Afin qu'il soit visible sur le site, veuillez la publier ci-dessous.", 1);
        }
        if (isset($_GET['upld_error']) && $_GET['upld_error'] == 1) {
            getInfoBar("L'article à été ajouté/modifié, mais une erreur s'est produite. L'upload d'une ou plusieurs images sur le serveur à échoué!", 4);
        }
        if (isset($_GET['ext_error']) && $_GET['ext_error'] == 1) {
            getInfoBar("L'article à été ajouté/modifié, mais une erreur s'est produite : Certaines extentions de fichiers téléchargés sont incompatibles", 4);
        }
        ?>
        <div class='row'>
            <div class='col-md-offset-2 col-md-8'>

                <?php
                $a = new news;
                $a->id = $_GET["id"];
                $a->Charger();
                ?>
                <div class='col-md-12'>
                    <div class='row'>
                        <div class='col-md-2'>
                            <a class="btn btn-blue" href="news.php?rub=modif_suppr"><i class="fa fa-arrow-left" aria-hidden="true"></i><br>Retour</a>
                        </div>
                        <div class='col-md-2'>
                            <a class="btn btn-blue" href="../news.php?id=<?php echo $a->id; ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i><br>Voir sur le Site</a>
                        </div>
                        <div class='col-md-2'>
                            <a class="btn btn-blue" href="?id=<?php echo $a->id; ?>&AMP;action=2"><i class="fa fa-pencil" aria-hidden="true"></i><br>Modifier</a>
                        </div>
                        <div class='col-md-2'>
                            <?php if ($a->actif == 1) {
                                ?>
                                <a class="btn btn-warning" onclick="return confirm('Masquer Cette News ?')" href="?rq=desactv&AMP;id=<?php echo $a->id; ?>&AMP;action=1"><i class="fa fa-times" aria-hidden="true"></i><br>Masquer</a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-success" onclick="return confirm('Publier Cette News ?')" href="?rq=actv&AMP;id=<?php echo $a->id; ?>&AMP;action=1"><i class="fa fa-check" aria-hidden="true"></i><br>Publier</a>
                                <?php
                            }
                            ?>

                        </div>
                        <div class='col-md-2'>
                            <a class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')" href="?rub=modif_suppr&AMP;rq=suppr&AMP;id=<?php echo $a->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i><br>Supprimer</a>
                        </div>
                        <div class='col-md-2 text-right'>
                            <span><b>N°</b> : <?php echo $a->id ?></span>
                            <br>
                            <span>
                            <?php if ($a->actif == 1) {
                                ?>
                                <b>Etat : </b><span class="text-success">Publiée</span>
                                <?php
                            } else {
                                ?>
                                <b>Etat : </b><span class="text-danger">Masquée</span>
                                <?php
                            }
                            ?>
                            </span>

                        </div>
                    </div>
                </div>
                <div class='col-md-12 text-center'>
                    &nbsp;
                </div>
                <div class='col-md-5'>
                    <span class="dataname">Titre</span>
                    <p><?php echo $a->titre; ?></p>
                    <hr>
                    <span class="dataname">Auteur</span>
                    <p><?php echo $a->auteur; ?></p>
                    <hr>
                    <span class="dataname">Date de Cr&eacute;ation</span>
                    <p><?php echo convDateAffichage($a->date_crea); ?></p>
                    <hr>
                    <span class="dataname">Dernière modification</span>
                    <p>
                        <?php
                        if ($a->date_maj == '0000-00-00' || $a->date_maj == NULL || $a->date_maj == '') {
                            echo 'Pas de Mise à Jour';
                        } else {
                            echo convDateAffichage($a->date_maj);
                        }
                        ?>
                    </p>
                </div>
                <div class='col-md-6 pull-right'>
                    <image class='img-thumbnail' width=100% src="<?php echo "../upload/" . $a->img; ?>" >
                </div>
                <div class='col-md-12'>
                    <hr>
                    <span class="dataname">Texte</span>
                    <?php echo $a->texte; ?><br>
                    <hr>
                    <span class="dataname">Territoire(s) Concern&eacute;(s)</span>
                    <p>
                        <?php
                        $t = new territoire;
                        $rq = "SELECT * FROM TERRITOIRE join NEWS_TERRITOIRE on territoire.id = id_territoire where news_territoire.suppr=0 and id_news=" . $_GET["id"];
                        $lt = $t->ListeChamps();
                        $ls = $t->ListeStruct($rq, $lt);
                        if ($ls) {
                            foreach ($ls as $terr) {
                                echo " | " . $terr['territoire'];
                            }
                        } else {
                            echo "Aucun";
                        }
                        ?>
                    <p>
                    <hr>
                    <span class="dataname">Activit&eacute;(s) Concern&eacute;(s)</span>
                    <p>
                        <?php
                        $ac = new activite;
                        $rq = "SELECT * FROM ACTIVITE join NEWS_ACTIVITE on activite.id = id_activite where news_activite.suppr=0 and id_news=" . $_GET["id"];
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

                <div class='col-md-12'>
                    <hr>
                    <p><span class="dataname">Ressources Compl&eacute;mentaires</span><p><?php
                    $up = new upload;
                    $rq = 'SELECT * FROM UPLOAD WHERE suppr=0 and id_news=' . $_GET['id'];
                    $lt = $up->ListeChamps();
                    $ls = $up->ListeStruct($rq, $lt);
                    if (count($ls) > 0) {
                        foreach ($ls as $file) {
                            ?>
                            <div id="img-row-full" class="col-lg-3" >
                                <?php
                                if (preg_match("#.mp4$#", $file['file'])) {
                                    ?>
                                    <a href="news.php?vid=<?php echo $file['id'] ?>"><video class='vid-responsive' src="../upload/<?php echo $file['file'] ?>" class="video-preview" controls></video></a>
                                    <?php
                                } else {
                                    ?>
                                    <image id='img-row-full' class='img-responsive'  src="../upload/<?php echo $file['file'] ?>" href="upload/<?php echo $file['file'] ?>"></image>
                                    <?php
                                }
                                ?>     

                            </div>
                            <?php
                        }
                    } else {
                        echo "<p class='text-center publish'>Aucune ressources compl&eacute;mentaire</p>";
                    }
                    ?>

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
                getInfoBar("L'extention du/des fichier(s) t&eacute;l&eacute;charg&eacute;(s) n'est pas adapt&eacute; !", 2);
            }
            $a = new news;
            $a->id = $_GET["id"];
            $a->Charger();
            ?>
            <form action="?id=<?php echo $a->id; ?>&AMP;rq=mdf&AMP;action=1" method='post' enctype="multipart/form-data">
                <div class='row'>
                    <div class='col-md-offset-2 col-md-8'>

                        <div class='col-md-12 warning'>
                            <h3><i class="fa fa-pencil" aria-hidden="true"></i> Modification de News</h3>
                            <hr>
                        </div>
                        <div class='col-md-5'>
                            <h3>Titre</h3>
                            <input type="text" class="form-control" name="titre" maxlength="300" placeholder="Titre de la news..." required value="<?php echo $a->titre; ?>">
                            <hr>
                            <h3>Auteur</h3>
                            <input type="text" class="form-control" name="auteur" placeholder="Auteur de la news..." value="<?php echo $a->auteur; ?>">
                            <small class="text-muted"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;Par d&eacute;faut : VELUT & ASSOCIES</small>
                            <hr>
                            <h3>Photographie Princale</h3>
                            <p>
                                <input type="file" name='img_upload' id="InputFile">
                                <div class="gallery"></div>
                                <small class="text-muted"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    &nbsp;Extensions possibles : .jpg, .jpeg, .png, .gif, .bpm</small>
                            </p>
                            <h3>Territoire(s) Concern&eacute;(s)</h3>
                            <p>
                            <div class='col-md-12'>
                                <select multiple class="form-control" name='id_territoire[]' id="exampleSelect2">
                                    <?php
                                    $terr = new territoire;
                                    $rq = 'SELECT * FROM TERRITOIRE WHERE suppr=0 and actif=1 order by territoire';
                                    $lt_1 = $terr->ListeChamps();
                                    $ls_1 = $terr->ListeStruct($rq, $lt_1);

                                    $nwtr = new news_territoire;
                                    $rq = 'SELECT * FROM NEWS_TERRITOIRE WHERE suppr=0 and id_news=' . $a->id;
                                    $lt_3 = $nwtr->ListeChamps();
                                    $ls_3 = $nwtr->ListeStruct($rq, $lt_3);

                                    foreach ($ls_1 as $unTerr) {
                                        $selected = NULL;

                                        foreach ($ls_3 as $relation) {
                                            if ($unTerr['id'] == $relation['id_territoire']) {
                                                $selected = 'selected';
                                            }
                                        }

                                        echo "<option value='" . $unTerr['id'] . "'" . $selected . ">" . $unTerr['territoire'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <small class="text-muted"><i class="fa fa-question" aria-hidden="true"></i>
                                    &nbsp;CTRL+Clic pour selection multiple</small>
                            </div>
                            <p>
                        </div>
                        <div class='col-md-6 pull-right'>
                            <image class='img-thumbnail' width=100% src="<?php echo "../upload/" . $a->img; ?>" >
                        </div>
                        <div class='col-md-12'>
                            <hr>
                            <h3>Texte</h3>
                            <script>
                                tinyMCE.init({
                                    selector: 'textarea#texte',
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
                            <textarea id='texte' class="form-control" rows="10" name="texte" required><?php echo $a->texte; ?></textarea>
                            <hr>


                            <h3>Activit&eacute;(s) Concern&eacute;(s)</h3>
                            <p>
                            <div class='col-md-4'>
                                <?php
                                $ac = new activite;
                                $rq = 'SELECT * FROM ACTIVITE order by activite';
                                $lt = $ac->ListeChamps();
                                $ls = $ac->ListeStruct($rq, $lt);
                                $colonne = 0;

                                $nwac = new news_activite;
                                $rq = 'SELECT * FROM NEWS_ACTIVITE WHERE suppr=0 and id_news=' . $a->id;
                                $lt_2 = $nwac->ListeChamps();
                                $ls_2 = $nwac->ListeStruct($rq, $lt_2);

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

                        <div class='col-md-12'>
                            <hr>
                            <h3>Ressources Compl&eacute;mentaires</h3><?php
                            $up = new upload;
                            $rq = 'SELECT * FROM UPLOAD WHERE suppr=0 and id_news=' . $_GET['id'];
                            $lt = $up->ListeChamps();
                            $ls = $up->ListeStruct($rq, $lt);
                            if (count($ls) > 0) {
                                foreach ($ls as $file) {
                                    ?>
                                    <div class="col-lg-3 text-center" id="img-row-full">
                                        <?php
                                        if (preg_match("#.mp4$#", $file['file'])) {
                                            ?>
                                            <a href="news.php?vid=<?php echo $file['id'] ?>"><video class='vid-responsive' src="../upload/<?php echo $file['file'] ?>" class="video-preview" controls></video></a>
                                            <?php
                                        } else {
                                            ?>
                                            <image id='img-row-full' class='img-responsive'  src="../upload/<?php echo $file['file'] ?>" href="upload/<?php echo $file['file'] ?>"></image>
                                            <?php
                                        }
                                        ?>     
                                        <a class='btn btn-danger pt_btn text-center' onclick="return confirm('Confirmer la suppression du m&eacute;dia ?')" href="?rq=suppr_media&id=<?php echo $_GET['id'] ?>&idMedia=<?php echo $file['id'] ?>&action=2"><i class='fa fa-times' aria-hidden='true'></i></a>
                                    </div>

                                    <?php
                                }
                            }
                            ?>

                            <div class="col-lg-4 thumbnail text-center">
                                <p><b>Ajouter des fichier ci dessous</b></p>
                                <input type="file" name='upload_multiple[]' id="InputFiles" multiple><br>
                                <div class="gallery2"></div>
                                <small class="text-muted"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    &nbsp;Extensions possibles :<b>IMAGE</b>: .jpg, .jpeg, .png, .gif, .bpm | <b>VIDEO</b>: .mp4</small><br><br>
                            </div>
                            <div class='row '>
                                <div class='col-md-12 margin-3p'>
                                    <div class='col-md-offset-3 col-md-3 text-center'>
                                        <a class="btn btn-danger" href="?rub=modif_suppr"><i class='fa fa-times fa-2x' aria-hidden='true'></i><b> Annuler</b></a>
                                    </div>
                                    <div class='col-md-3 text-center'>
                                        <button type="submit" class="btn btn-success" id="save"><i class='fa fa-save fa-2x' aria-hidden='true'></i><b> Enregister</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <?php
    }

//##########################################################################################################



    function PageACCUEIL() {
        ?>
        <div class="col-lg-offset-4 col-lg-4 text-center" id="home">
            <p><b>Choississez une action:<b><p><br>
            <a class="btn btn-blue" href="?rub=ajouter"><i class="fa fa-plus fa-2x" aria-hidden="true"></i><br><b>Ajouter</b></a><br><br>
            <a class="btn btn-blue" href="?rub=modif_suppr"><i class="fa fa-list fa-2x" aria-hidden="true"></i><br><b>Liste / Modifier / Supprimer</b></a><br><br>
        </div>
        <?php
    }
    