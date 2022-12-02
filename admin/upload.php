<?php
$bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=vgs', 'root', '');

$mangas = $bdd->query('SELECT nom FROM mangas ORDER BY nom');


$dev = $bdd->prepare('SELECT pseudo FROM team WHERE grade = "Développeur"');
$leader = $bdd->prepare('SELECT pseudo FROM team WHERE grade = "Leader"');
$chef = $bdd->prepare('SELECT pseudo FROM team WHERE grade LIKE ("Chef%") OR ("Cheffe%")');

$dev->execute();
$leader->execute();
$chef->execute();

$authdev = $dev->fetch();
$authleader = $leader->fetch();
$authchef = $chef->fetch();

session_start();

if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}


require 'nav_admin.php';

$visible = 'visible form';
$invisible = 'invisible';
$focus = 'focus';
$upload = '';
$create = '';
$supp = '';

$input_create = $invisible;
$input_upload = $invisible;
$input_supp = $invisible;


if (isset($_POST['create'])) {
    $create = $focus;
    $input_create = $visible;
    $input_upload = $invisible;
    $input_supp = $invisible;

}

if (isset($_POST['upload'])) {
    $upload = $focus;
    $input_create = $invisible;
    $input_upload = $visible;
    $input_supp = $invisible;

}

if (isset($_POST['supp'])) {
    $supp = $focus;
    $input_create = $invisible;
    $input_upload = $invisible;
    $input_supp = $visible;
}

//Création d'un projet

if (isset($_POST['formcreate'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $nom_alternatifs = htmlspecialchars($_POST['nom_alternatifs']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $status = htmlspecialchars($_POST['status']);
    $annee = htmlspecialchars($_POST['annee']);
    $genre = htmlspecialchars($_POST['genre']);
    $description = htmlspecialchars($_POST['description']);
    $date_update = date('Y-m-d');

    if (!empty($_POST['nom']) and !empty($_POST['nom_alternatifs']) and !empty($_POST['auteur']) and !empty($_POST['artiste']) and !empty($_POST['status']) and !empty($_POST['annee']) and !empty($_POST['genre']) and !empty($_POST['description'])) {
        $uploaddir = '../img/mangas/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            rename($uploadfile, "../img/mangas/" . $_POST['nom'] . ".jpg");
            $insertmbr = $bdd->prepare("INSERT INTO mangas(nom, nom_alternatifs, auteur, artiste, status, annee, genre, description, date_update) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $insertmbr->execute(array($nom, $nom_alternatifs, $auteur, $artiste, $status, $annee, $genre, $description, $date_update));
            $erreur = 'Votre manga a bien été rentrer dans la base de donnée !';
        } else {
            $erreur =  "Image non-insérer ou incorect";
        }
    } else {
        $erreur = "Il y a une erreur dans la matrice : erreur 666 ! (tout les champs ne sont pas remplis)";
    }
}

//Création d'un chapitre

if (isset($_POST['formchap'])) {

        $number = $_POST['number'];
        $exist = '../img/scan/' . $_POST['name'] . "/" . $_POST['number'];
        $cible = $_POST['name'];
        $date_update = date('Y-m-d H:i:s');
        $sortie = $bdd->query('SELECT * FROM mangas WHERE nom = "' . $cible . '"');
        $nombrechap = $sortie->fetch();
    if (file_exists($exist)){

        $files = glob($exist . '/*'); // get all file names
        foreach($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
        rmdir($exist);
    }
    if (!file_exists('../img/scan/' . $_POST['name'] . "/" . $_POST['number'] . "/")) {
        mkdir('../img/scan/' . $_POST['name'] . "/" . $_POST['number'] . "/", 0777, true);
    }
    if (!empty($_POST['number']) AND !empty($_POST['name'] )) {
        $uploaddir = '../img/scan/' . $_POST['name'] . "/" . $_POST['number'] . "/";
        $uploadfile =  $uploaddir . basename($_FILES['file_zip']['name']);
        rename($_FILES['file_zip']['tmp_name'], $uploaddir . $cible . " - " . $number . ".zip");
        $zip = new ZipArchive();
        $zip->open($uploaddir . $cible . " - " . $number . ".zip",ZipArchive::CREATE);




        $i = 0;
        $nameindex = 1;
        $count = $zip->numFiles;
        while ($count > $i) {
            $zip->renameIndex($i, $nameindex . '.jpg');
            $i += 1;
            $nameindex += 1;
        }

        $i = 0;
        $nameindex = 1;
        while ($count > $i) {
            $zip->extractTo($uploaddir, $nameindex . '.jpg');
            $nameindex += 1;
            $i += 1;
        }
        $zip->close();


        /*$insertchap = $bdd->prepare("UPDATE mangas SET nb_chap = '" . $number . "', date_update ='" . $date_update . "'WHERE nom = '" . $cible . "'");
        $insertchap->execute(array());*/

        /*$insertchap = $bdd->prepare("UPDATE chapites SET nb_chap = '" . $number . "', date_data ='" . $date_update . "', projet = '" . $cible . "'" );
        $insertchap->execute(array());*/


        $insertchap = $bdd->prepare("INSERT INTO chapites (projet, nb_chap, data_date) VALUES(?, ?, ?)");
        $insertchap->execute(array($cible, $number, $date_update));

        $erreur = "Votre chapitre a bien été upload ! ";

    } else {
        $erreur = "Un des champs n'est pas rempli !";
        //echo "oui1";

    }

}






if (isset($_POST['id_produit'])) {
    $req = $bdd->prepare("SELECT * FROM `mangas` WHERE nom = :id");
    $req->bindParam('id', $_POST['id_produit']);
    $req->execute();
    $result = $req->fetch();
    //je renvoie le résultat en json
    echo json_encode($result);
    exit;
}


$stmt = $bdd->query('SELECT * FROM mangas ORDER BY nom');
$stmt->execute();
$lesresult = $stmt->fetchAll();


?>
<html class="" id="toggle_page">
<head>
    <title>Upload</title>
    <meta charset="UTF-8 sans BOM">
    <link rel="stylesheet" type="text/css" href="../css/admin/upload.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>

        var NumberChapterDelete = document.getElementById('Projet');


        function Delete_Chapter(Name_Projet)
        {




            console.log(Name_Projet);



        }
    </script>




</head>

<body>
<?php
if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
}
?>
<form method="POST" class="form_choice">
    <input class="input-select <?= $upload ?>" formmethod="post" value="Upload un Chapitre" type="submit" id="uplaod" name="upload">
    <input class="input-select <?= $create ?>" formmethod="post" value="Créer un projet" type="submit" id="create" name="create">
    <input class="input-select <?= $supp ?>" formmethod="post" value="Supprimer un Chapitre" type="submit" id="supp" name="supp">

</form>

<!--création de projet (manga)-->
<div class="<?= $input_create ?>">
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="fileUpload">Image :</label>
                </td>
                <td>
                    <input class="filup" type="file" name="userfile" id="fileUpload">
                    <p class="note"><strong>Note : La dimension minimum est de 350x250px</strong></p>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom">Nom Complet :</label>
                </td>
                <td>
                    <input class="text" type="text" name="nom" placeholder="Nom complet" id="nom">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="other_name">Noms alternatifs :</label>
                </td>
                <td>
                    <input type="text" class="text" id="nom_alternatifs" name="nom_alternatifs" placeholder="Nom(s) Alternatif(s)">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="auteur">Auteur(s) :</label>
                </td>
                <td>
                    <input class="text" id="auteur" name="auteur" type="text" placeholder="Auteur(s)">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="artiste">Artiste(s) :</label>
                </td>
                <td>
                    <input class="text" id="artiste" name="artiste" type="text" placeholder="Artiste(s)">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">Status :</label>
                </td>
                <td>
                    <input class="text" type="text" id="status" name="status" placeholder="status">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="annee">Année :</label>
                </td>
                <td>
                    <input class="text" type="number" formmethod="post" name="annee" placeholder="Année" id="annee">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="genre">Genre :</label>
                </td>
                <td>
                    <input class="text genre" formmethod="post" name="genre" placeholder="genre(s) : Action, Ecchi,..." id="genre">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description :</label>
                </td>
                <td>
                    <input class="text" formmethod="post" id="description" name="description" type="text" placeholder="description">
                </td>
            </tr>
        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formcreate" value="Valider !">
    </form>
</div>

<!--upload de chapitre-->
<div class="<?= $input_upload ?>">
    <form method="post" enctype="multipart/form-data">
        <table>
            <div align="center">
                <h3 >Choisissez le projet :</h3>
            </div>

            <label for="name">Choisissez le projet :</label>

                <input list="Projet" class="text" name="name" id="name" />

                <datalist id="Projet">
                    <?php
                    while ($donnees = $mangas->fetch()):
                    echo '<option value="'.$donnees['nom'].'">';


                    ?>

            <?php endwhile; ?>
                </datalist>
        </table>
        <br>
        <table>
            <tr>
                <td>
                    <label for="file_zip">Fichier du chapitre :</label>
                </td>
                <td>

                    <input class="filup" type="file" accept="application/zip" name="file_zip" id="file_zip">

                </td>
            </tr>
            <tr>
                <td>
                    <label for="number">numéro du chapitre :</label>
                </td>
                <td>
                    <input type="number" class="text" name="number" id="number" step="0.1" >
                </td>
            </tr>
        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formchap" value="Valider !">
    </form>
</div>


<!--supp de chapitre-->
<div class="<?= $input_supp ?>">
    <form method="post" enctype="multipart/form-data">
        <table>
            <div align="center">
                <h3 >Choisissez le projet :</h3>
            </div>
            <label for="name">Choisissez le projet :</label>
            <input list="Projet" class="text" name="name" id="name" onchange="Delete_Chapter(this.value)" />

            <datalist id="Projet">
                <?php
                foreach ($lesresult as $leresult) {
                    echo '<option value="'.$leresult['nom'].'" >';

                }


                ?>
            </datalist>
        </table>


        <table>
            <tr>
                <td>

                    <label for="number">numéro du chapitre :</label>
                </td>
                <td>
                    <select name="Number_Chapter" id="number" class="text">
                        <input list="Chapter" class="text" name="Number_Chapter" id="Number_Chapter"  />

                        <datalist id="Chapter">
                            <option value="">Selectionnez un chapitre</option>

                        </datalist>


                </td>


            </tr>
        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formsup" value="Supprimer !">
    </form>
</div>


<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>

</body>
</html>
