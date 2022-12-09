<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");
$getname = $_GET['name'];

if(isset($_GET['error']))
{

    if($_GET['error'] == "pseudouse") {
        $erreur = "Le pseudo que vous souhaitez prendre est déjà utilisé";
    }
    if($_GET['error'] == "imgsup") {
        $erreur = "Votre image de profil a bien été supprimer";
    }
    if ($_GET['error'] == "imgup"){
        $erreur = "Votre nouvelle image de profil a été mis en ligne ";

    }
    if($_GET['error'] == "pseudochange")
    {
        $erreur = "Votre pseudo a été changer !!";

    }
    if($_GET['error'] == "pseudochangemdp"){
        $erreur = "Votre pseudo et mot de passe a été changer";

    }
    if($_GET['error'] == "pseudochangemdperrorconf"){
        $erreur = "Votre pseudo a été changer mais votre nouveau mot de passe ne correspond pas a votre mot de passe de confirmation";

    }
    if($_GET['error'] == "pseudochangemdperrorid"){
        $erreur = "Votre pseudo a été changer mais votre ancien mot de passe n'est pas identique";

    }
    if($_GET['error'] == "pseudochangemdperror"){
        $erreur = "Votre pseudo a été changer mais un des champs pour le mot de passe a mal été remplis";

    }



    //erreur normal

    if($_GET['error'] == "mdpchange1"){
        $erreur = "Votre mot de passe vient d'être mis a jour";

    }
    if($_GET['error'] == "mdpchange2"){
        $erreur = "Votre nouveau mot de passe ne correspond pas a votre mot de passe de confirmation";

    }
    if($_GET['error'] == "mdpchange3"){
        $erreur = "Votre ancien mot de passe n'est pas identique";

    }


}



$mangas = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
$mangas->execute(array($getname));
$donnees = $mangas->fetch();


$chemin_suivant = "../img/membres/" . $_SESSION['pseudo'] . ".jpg";
$existe = file_exists($chemin_suivant);

//echo $_SESSION['pseudo'];


if (isset($_POST['formsup']))
{
    $uploaddir = '../img/membres/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    if($existe){
        unlink($chemin_suivant);
        header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=imgsup");
    }else {
        $erreur = "Vous n'avez pas d'image de profil";
    }
}


if (isset($_POST['formcreate'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);



    $uploaddir = '../img/membres/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    if (!empty($_POST['pseudo'])) {




        $reqpseudo = $bdd->query("SELECT pseudo FROM membres WHERE pseudo = '$pseudo'");


        $donnees = $reqpseudo->fetch();
        $min = strtolower($donnees['pseudo']);
        $pseudomin = strtolower($pseudo);

        if ($pseudomin === $min) {

            //header('Location: profil.php?name=' . $_SESSION['pseudo']);
            header('Location: profil.php?name=' . $_SESSION['pseudo'] . '&error=pseudouse');
            //$erreur = "Votre image de profil a été changer ";

            //echo $pseudo . " est égal a " . $min;


        }

        else {
            if($existe){
                rename($chemin_suivant, "../img/membres/" . $pseudo . ".jpg");

            }

                $modifpseudo = $bdd->prepare("UPDATE membres SET pseudo ='$pseudo' WHERE pseudo = '$getname'");
            $modifpseudo->execute();
            $modifcom = $bdd->prepare("UPDATE commentaire SET pseudo ='$pseudo' WHERE pseudo = '$getname'");
            $modifcom->execute();


            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                unlink($chemin_suivant);
                rename($uploadfile, "../img/membres/" . $pseudo . ".jpg");
                header('Location: profil.php?name=' . $pseudo . '&error=imgup');

            }

            if (!empty($_POST['oldmdp']) && !empty($_POST['newmdp']) && !empty($_POST['newmdp2']))
            {
                $ancienmdp = md5($_POST['oldmdp']);
                $nouveaumdp = md5($_POST['newmdp']);
                $confirmdp = md5($_POST['newmdp2']);


                $reqmdp = $bdd->query("SELECT motdepasse FROM membres WHERE pseudo = '$pseudo'");


                $monmdp = $reqmdp->fetch();

                if ($ancienmdp === $monmdp['motdepasse'])
                {
                    if ($nouveaumdp=== $confirmdp)
                    {
                        $modifmdp = $bdd->prepare("UPDATE membres SET motdepasse ='$nouveaumdp' WHERE pseudo = '$pseudo'");
                        $modifmdp->execute();
                        header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=pseudochangemdp");


                    }
                    else {
                        header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=pseudochangemdperrorconf");

                    }
                }
                else{
                    //$erreur = "Votre ancien mot de passe n'est pas identique";
                    header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=pseudochangemdperrorid");

                }
                header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=pseudochangemdperrorid");


            }
            else  {
                //$erreur = "Un des champs a mal été remplis";
                header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=pseudochangemdperror");

            }

            $_SESSION['pseudo'] = $pseudo;
            header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=pseudochange");
        }



    }
    else {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            if ($existe) {
                unlink($chemin_suivant);
                rename($uploadfile, "../img/membres/" . $_SESSION['pseudo'] . ".jpg");
                header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=imgup");
            } else {
                rename($uploadfile, "../img/membres/" . $_SESSION['pseudo'] . ".jpg");
                header('Location: profil.php?name=' . $_SESSION['pseudo'] . "&error=imgup");
            }

        } else {
            $erreur = "Une erreur est survenu lors de l'upload";
        }
        if (!empty($_POST['oldmdp']) && !empty($_POST['newmdp']) && !empty($_POST['newmdp2']))
        {
            $ancienmdp = md5($_POST['oldmdp']);
            $nouveaumdp = md5($_POST['newmdp']);
            $confirmdp = md5($_POST['newmdp2']);


            $reqmdp = $bdd->query("SELECT motdepasse FROM membres WHERE pseudo = '$getname'");


            $monmdp = $reqmdp->fetch();

            if ($ancienmdp === $monmdp['motdepasse'])
            {
                if ($nouveaumdp=== $confirmdp)
                {
                    $modifmdp = $bdd->prepare("UPDATE membres SET motdepasse ='$nouveaumdp' WHERE pseudo = '$getname'");
                    $modifmdp->execute();
                    header('Location: profil.php?name=' . $_SESSION['pseudo'] . '&error=mdpchange1');

                }
                else {
                    header('Location: profil.php?name=' . $_SESSION['pseudo'] . '&error=mdpchange2');

                }
            }
            else{
                header('Location: profil.php?name=' . $_SESSION['pseudo'] . '&error=mdpchange3');

            }


        }
    }

}




?>
<html class="" id="toggle_page">
<head>
    <title>Profil</title>
    <meta charset="UTF-8 sans BOM">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin/upload.css">
</head>

<body>
<?php
if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
}
?>
<div class="choices form">
    <form method="post" class="projet" enctype="multipart/form-data">
        <table>



            <tr>
                <td>
                    <label> Votre image de profil actuel : </label>
                </td>
                <td>
                    <?php
                    if ($existe){?>
                        <img style="    width: 100px;
    height: 100px;
    padding: 5px;;
                    " class="image_solo" src="../img/membres/<?=  $_SESSION['pseudo']; ?>.jpg">
                        <?php
                    }
                    else { ?>
                        <img style="    width: 100px;
    height: 100px;
    padding: 5px;;
                    " class="image_solo" src="../img/membres/default.jpg">
                        <?php

                    }
                    ?>
                </td>
            </tr>


            <tr>
                <td>
                    <label for="fileUpload">Image :</label>
                </td>
                <td>
                    <input class="filup" type="file" name="userfile" id="fileUpload">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <p><strong>Note : La dimension minimum est de 350x250px</strong></p>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Pseudo actuel : </label>
                </td>
                <td>
                    <label><?= $donnees['pseudo'] ?></label>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="pseudo">Nouveau pseudo :</label>
                </td>
                <td>
                    <input class="text" type="text" name="pseudo" placeholder="Pseudo">
                </td>
            </tr>





            <tr>
                <td>
                    <label for="pseudo">Ancien mot de passe :</label>
                </td>
                <td>
                    <input class="text" type="password" name="oldmdp" placeholder="Mot de passe">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Nouveau mot de passe :</label>
                </td>
                <td>
                    <input class="text" type="password" name="newmdp" placeholder="Mot de passe">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pseudo">Confirmation du mot de passe :</label>
                </td>
                <td>
                    <input class="text" type="password" name="newmdp2" placeholder="Mot de passe">
                </td>
            </tr>

        </table>
        <input class="input-select" type="submit" formmethod="post" name="formcreate" value="Valider !">
        <input class="input-select" type="submit" formmethod="post" name="formsup" value="Supprimer ma photo de profil">
    </form>
</div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>
