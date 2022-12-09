<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");



$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();



if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}


$getname = $_GET['name'];

$mangas = $bdd->prepare('SELECT * FROM mangas WHERE nom = ?');
$mangas->execute(array($getname));
$donnees = $mangas->fetch();

if (isset($_POST['formmodif'])) {
    $nom = htmlspecialchars($_POST['name']);
    $nom_alternatifs = htmlspecialchars($_POST['nom_alternatifs']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $status = htmlspecialchars($_POST['status']);
    $annee = htmlspecialchars($_POST['annee']);
    $genre = htmlspecialchars($_POST['genre']);
    $description = htmlspecialchars($_POST['description']);
    $date_update = date('Y-m-d');

    $dateupdate = $bdd->prepare("UPDATE mangas SET date_update = '$date_update' WHERE nom = '$getname'");
    $dateupdate->execute();

    if (!empty($nom)) {
        $modifname = $bdd->prepare("UPDATE mangas SET nom = '$nom' WHERE nom = '$getname'");
        $modifname->execute();

        if (!empty($nom_alternatifs)) {
            $modifnamealt = $bdd->prepare("UPDATE mangas SET nom_alternatifs = '$nom_alternatifs' WHERE nom = '$nom'");
            $modifnamealt->execute();

        }

        if (!empty($auteur)) {
            $modifauteur = $bdd->prepare("UPDATE mangas SET auteur = '$auteur' WHERE nom = '$nom'");
            $modifauteur->execute();

        }
        if (!empty($artiste)) {
            $modifartiste = $bdd->prepare("UPDATE mangas SET artiste = '$artiste' WHERE nom = '$nom'");
            $modifartiste->execute();
        }
        if (!empty($status)) {
            $modifstatus = $bdd->prepare("UPDATE mangas SET status = '$status' WHERE nom = '$nom'");
            $modifstatus->execute();
        }

        if (!empty($status)) {
            $modifstatus = $bdd->prepare("UPDATE mangas SET status = '$status' WHERE nom = '$nom'");
            $modifstatus->execute();
        }
        if (!empty($annee)) {
            $modifannee = $bdd->prepare("UPDATE mangas SET annee = '$annee' WHERE nom = '$nom'");
            $modifannee->execute();
        }

        if (!empty($genre)) {
            $modifgenre = $bdd->prepare("UPDATE mangas SET genre = '$genre' WHERE nom = '$nom'");
            $modifgenre->execute();
        }

        if (!empty($description)) {
            $modifdescription = $bdd->prepare("UPDATE mangas SET description = '$description' WHERE nom = '$nom'");
            $modifdescription->execute();
        }


    }
    else {

        if (!empty($nom_alternatifs)) {
            $modifnamealt = $bdd->prepare("UPDATE mangas SET nom_alternatifs = '$nom_alternatifs' WHERE nom = '$getname'");
            $modifnamealt->execute();

        }


        if (!empty($auteur)) {
            $modifauteur = $bdd->prepare("UPDATE mangas SET auteur = '$auteur' WHERE nom = '$getname'");
            $modifauteur->execute();

        }

        if (!empty($artiste)) {
            $modifartiste = $bdd->prepare("UPDATE mangas SET artiste = '$artiste' WHERE nom = '$getname'");
            $modifartiste->execute();
        }

        if (!empty($status)) {
            $modifstatus = $bdd->prepare("UPDATE mangas SET status = '$status' WHERE nom = '$getname'");
            $modifstatus->execute();
        }

        if (!empty($annee)) {
            $modifannee = $bdd->prepare("UPDATE mangas SET annee = '$annee' WHERE nom = '$getname'");
            $modifannee->execute();
        }

        if (!empty($genre)) {
            $modifgenre = $bdd->prepare("UPDATE mangas SET genre = '$genre' WHERE nom = '$getname'");
            $modifgenre->execute();
        }

        if (!empty($description)) {
            $modifdescription = $bdd->prepare("UPDATE mangas SET description = '$description' WHERE nom = '$getname'");
            $modifdescription->execute();
        }
    }
    header('Location: select_project.php');
}

?>
<html class="" id="toggle_page">
<head>
    <title>Modification de mangas</title>
    <meta charset="UTF-8 sans BOM">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin/upload.css">



    <script>

        function textareaSize(zoneTexte) {
            if (zoneTexte) {
                nbrLignes=2;longueurDeLigne=2;
                nbrLignesMax=18;longueurDeLigneMax=9;
                lesLignes=escape(zoneTexte.value).split("%0D%0A");
                if (lesLignes) {nbrLignes=lesLignes.length;}
                if (nbrLignes>document.body.clientHeight/nbrLignesMax) {nbrLignes=document.body.clientHeight/nbrLignesMax;}

                if (lesLignes) {
                    for(n=0; n<(lesLignes.length); n++) {
                        if (longueurDeLigne<unescape(lesLignes[n]).length) {longueurDeLigne=unescape(lesLignes[n]).length;}
                        if (longueurDeLigne>document.body.clientWidth/longueurDeLigneMax)
                        {
                            longueurDeLigne=document.body.clientWidth/longueurDeLigneMax;
                            nbrLignes+=unescape(lesLignes[n]).length/(document.body.clientWidth/longueurDeLigneMax);
                        }
                    }
                }
                else {longueurDeLigne=zoneTexte.value.length}
                if (nbrLignes>document.body.clientHeight/nbrLignesMax) {nbrLignes=document.body.clientHeight/nbrLignesMax;}

                zoneTexte.cols=(longueurDeLigne+1);
                zoneTexte.rows=(nbrLignes+1);
            }
        }</script>


</head>

<body>
<?php
if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
}
?>
<div align="center">
    <h3>Veuillez selectionner et remplacer ce que vous voulez remplacer dans la base de donnée</h3>
</div>

<div class="form">
    <form method="POST">
        <table>
            <tr>
                <td>
                    <label>Nom Actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['nom'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Nouveau nom : </label>
                </td>
                <td>
                    <input class="text" type="text" name="name" id="name">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Nom(s) alterniatif(s) actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['nom_alternatifs'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom_alternatifs">Nouveau nom(s) alternatif(s) : </label>
                </td>
                <td>
                    <input class="text" type="text" name="nom_alternatifs" id="nom_alternatifs">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Auteur actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['auteur'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="auteur">Nouvel auteur : </label>
                </td>
                <td>
                    <input class="text" type="text" name="auteur" id="auteur">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Artiste(s) actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['artiste'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="artiste">Nouvel artiste(e) : </label>
                </td>
                <td>
                    <input class="text" type="text" name="artiste" id="artiste">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Status actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['status'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">Nouveau status : </label>
                </td>
                <td>
                    <!--<input class="text" type="text" name="status" id="status">-->
                    <select name="status" id="status">
                        <?php if ($donnees['status'] == "en cours"){?>
                            <option> <?php echo $donnees['status']  ?> </option>
                            <option>en pause</option>
                            <option>termines</option>
                        <?php
                        }
                        elseif ($donnees['status'] == "en pause"){?>
                        <option> <?php echo $donnees['status']  ?> </option>
                        <option>en cours</option>
                        <option>termines</option>
                        <?php }
                        elseif (utf8_encode($donnees['status']) == "en termines"){?>
                            <option> <?php echo $donnees['status']  ?> </option>
                            <option>en cours</option>
                            <option>en pause</option>
                        <?php } ?>


                    </select>
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Année actuelle : </label>
                </td>
                <td>
                    <label><?= $donnees['annee'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="annee">Nouvelle année : </label>
                </td>
                <td>
                    <input class="text" type="number" name="annee" id="annee">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Genre(s) actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['genre'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="genre">Nouveau(x) genre : </label>
                </td>
                <td>
                    <input class="text" type="text" name="genre" id="genre">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Description actuelle : </label>
                </td>
                <td>
                    <label><?= $donnees['description'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Nouvelle description : </label>
                </td>
                <td>
                     <textarea name="description" id="description" placeholder="Nouvelle description" cols="25" onKeyDown="textareaSize(this);" onKeyUp="textareaSize(this);"  spellcheck="true" class="text"

                               style="
                                       width: 100%;
                                       background: transparent;
                                       overlay: auto;
                                       color: darkgrey;
                                       //border: none;
                                       outline: none;
                                       margin: 0px;
                                       padding: 0px;


                                       resize : none;





                                       "></textarea>
                    <!--<input class="text" type="text" name="description" id="description">-->
                </td>
            </tr>
        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formmodif" value="Modifier !">
    </form>
</div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>
