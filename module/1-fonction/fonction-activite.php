<?php

//########################################################################################################################################

function ajouterActivite() {
    if (strlen($_POST['activite']) > 2) {

        $a = new activite; // Ajoute l'objet News a la BDD
        $a->ChargerForm();
        $a->Ajouter();

        header('Location: activite.php?success=1');
    } else {
        header('Location: activite.php?error=1#0');
    }
    $a = NULL;
}

//########################################################################################################################################


function modifierActivite() {

    if (strlen($_POST['activite']) > 2) {

        $a = new activite; // Ajoute l'objet Activite a la BDD
        $a->id = $_GET['id'];
        $a->Charger;
        $a->ChargerForm();
        $a->Modifier();

        header('Location: activite.php?success=2&activite=' . $a->activite . "#" . ($a->id + 6));
    } else {
        header('Location: activite.php?error=1#0');
    }
    $a = NULL;
}

//########################################################################################################################################



function supprimerActivite() {
    $a = new activite;
    $a->id = $_GET['id'];
    $a->Charger();
    $a->Supprimer();
    echo "<div class='col-md-offset-1 col-md-10'><p class='bg-success'><i class='fa fa-check' aria-hidden='true'></i> L'activité <b>" . $a->activite . "</b> à été supprimée !</p></div>";
    $a = NULL;
}

//############################################################################################################################################

function activerActivite() {
    $a = new activite;
    $a->id = $_GET['id'];
    $a->Charger();
    $a->Activer();
    echo "<div class='col-md-offset-1 col-md-10'><p class='bg-success'><i class='fa fa-check' aria-hidden='true'></i> L'activité <b>" . $a->activite . "</b> à été Activée !</p></div>";
    $a = NULL;
}

//############################################################################################################################################

function desactiverActivite() {
    $a = new activite;
    $a->id = $_GET['id'];
    $a->Charger();
    $a->Desactiver();
    echo "<div class='col-md-offset-1 col-md-10'><p class='bg-success'><i class='fa fa-check' aria-hidden='true'></i> L'activité <b>" . $a->activite . "</b> à été Désactivée !</p></div>";
    $a = NULL;
}

//########################################################################################################################################


function PageDATAGRID() {

    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<div class='col-md-offset-1 col-md-10'>
<p class='bg-success'><i class='fa fa-check' aria-hidden='true'></i> L'activité' à été enregistré avec succès.</p></div>";
    }
    if (isset($_GET['success']) && $_GET['success'] == 2) {
        echo "<div class='col-md-offset-1 col-md-10'>
<p class='bg-success'><i class='fa fa-check' aria-hidden='true'></i> L'activité <b>" . $_GET['activite'] . "</b> à été modifier avec succès.</p></div>";
    }
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<div class='col-md-offset-1 col-md-10'>
<p class='bg-danger'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Nom de l'Activite Trop Court</p></div>";
    }
    ?>
    <div>
        <div class='row'>
            <div class='col-md-offset-1 col-md-2'>
                <a class="btn btn-blue" href="?rub=ajouter"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une Activité</a><br><br>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-offset-1 col-md-10'>
                <table class="table table-striped">
                    <tr>
                        <th>Actif</th>
                        <th>id</th>
                        <th>Activité</th>
                        <th>Traduction ENG</th>
                        <th>Action</th>
                    </tr>


                    <?php
                    if (isset($_GET['rub']) && $_GET['rub'] == 'ajouter') {
                        ?>
                        <tr>
                        <form method="post" action='?rq=ajt'>
                            <td class="ajt">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </td>
                            <td class="ajt">
                            </td>
                            <td class="ajt">
                                <input type="text" class="form-control text-center" name="activite" placeholder="Nom de l'activité" required autofocus>
                            </td>
                            <td class="ajt">
                                <input type="text" class="form-control text-center" name="en_activite" placeholder="Traduction de l'activité" required>
                            </td>
                            <td class="ajt">
                                <a class="btn btn-danger pt_btn" href='activite.php'><i class="fa fa-times" aria-hidden="true"></i></a>
                                <button type="submit" class="btn btn-success pt_btn"><i class="fa fa-plus" aria-hidden="true"></i></boutton>
                            </td>
                        </form>
                        <?php
                    }

                    $a = new activite;
                    $rq = 'SELECT * FROM ACTIVITE WHERE suppr=0 order by activite ; ';
                    $lt = $a->ListeChamps();
                    $ls = $a->ListeStruct($rq, $lt);

                    $c_row = 1;
                    foreach ($ls as $activite) {

                        if (isset($_GET['rub']) && $_GET['rub'] == 'modif' && $activite['id'] == $_GET['id']) {
                            ?> 
                            <tr id="<?php echo $c_row ?>" >
                            <form action="?rq=mdf&AMP;id=<?php echo $activite['id'] . '#' . ($activite['id'] + 6); ?>" method="post">
                                <td class="mdf">
                                    <i class='fa fa-pencil' aria-hidden='true'></i>
                                </td >
                                <td class="mdf">
                                    <?php echo $activite['id'] ?>
                                </td>
                                <td class="mdf">
                                    <input class="form-control text-center" type="text" name="activite" value="<?php echo $activite['activite']; ?>" required autofocus>
                                </td>
                                <td class="mdf">
                                    <input class="form-control text-center" type="text" name="en_activite" value="<?php echo $activite['en_activite']; ?>" required>
                                </td>
                                <td class="mdf">
                                    <div class='row'>
                                        <a class="btn btn-danger pt_btn" href='activite.php'><i class="fa fa-times" aria-hidden="true"></i></a>
                                        <button type="submit" class="btn btn-success pt_btn"><i class="fa fa-save" aria-hidden="true"></i></button>
                                    </div>
                                </td>
                            </form>
                            </tr> 
                            <?php
                        } else {
                            ?> 
                            <tr id="<?php echo $c_row ?>">
                                <td><?php if ($activite['actif']) {
                                ?>
                                        <a onclick="return confirm('Voulez-vous désactiver cette Activité ?')" href="?rub=modif_suppr&rq=desactv&id=<?php echo $activite['id'] ?>" alt='Désactiver' style='color:green' title='Cliquez pour Désactiver'><i class='fa fa-check' aria-hidden='true'></i></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a onclick="return confirm('Souhaitez-vous activer cette Activité ?')" href='?rub=modif_suppr&rq=actv&id=<?php echo $activite['id'] ?>' alt='Activer' style='color:red' title='Cliquez pour Activer'><i class='fa fa-times' aria-hidden='true'></i></a>
                                    <?php }
                                    ?></td>
                                <td><?php echo $activite['id']; ?></td>
                                <td><?php echo $activite['activite']; ?></td>
                                <td><?php echo $activite['en_activite']; ?></td>
                                <td>
                                    <div class='row'>
                                        <span class="dropdown">
                                            <a class="dropdown-toggle btn btn-primary pt_btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true" title='Voir le(s) pays concerné(s)'></i>&nbsp;&nbsp;<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-header">Pays Concerné(s)</li>
                                                <?php
                                                $t = new territoire;
                                                $rq = "SELECT * FROM TERRITOIRE join TERRITOIRE_ACTIVITE on territoire.id = id_territoire where territoire_activite.suppr=0 and id_activite=" . $activite['id'];
                                                $lt = $t->ListeChamps();
                                                $ls = $t->ListeStruct($rq, $lt);
                                                if ($ls) {
                                                    foreach ($ls as $terr) {
                                                        ?>
                                                        <li id='menu' >&nbsp;&nbsp;&nbsp;<?php echo $terr['territoire'] ?></li>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Aucun";
                                                }
                                                ?>

                                            </ul>
                                        </span>
                                        <a class="btn btn-warning pt_btn-2" href="?rub=modif&AMP;id=<?php echo $activite['id']; ?>"  title='Modifier'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger pt_btn-2" onclick="return confirm('Confirmer la suppression ?')" href="?rub=modif_suppr&AMP;rq=suppr&AMP;id=<?php echo $activite['id']; ?>" title='Supprimer'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>

                            </tr> 
                            <?php
                            $c_row++;
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

    <?php
    $a = NULL;
}

//########################################################################################################################################

