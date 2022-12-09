<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);



$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();



if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}


if (isset($_POST['formcreate'])) {
$pseudo = htmlspecialchars($_POST['pseudo']);
$role = htmlspecialchars($_POST['role']);
$grade = htmlspecialchars($_POST['grade']);
$uploaddir = '../img/team/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    if (!empty($_POST['pseudo']) and !empty($_POST['role'])) {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            $insertmbr = $bdd->prepare("INSERT INTO team(pseudo, role, grade) VALUES(?, ?, ?)");
            $insertmbr->execute(array($pseudo, $role, $grade));
            rename($uploadfile, "../img/team/" . $_POST['pseudo'] . ".jpg");
            $erreur = "Un nouveau membre vient d'être ajouter à la base de donnée " . print_r($insertmbr);
        } else {
            $erreur = "L'image n'est malheureusement pas passée, veuillez recommencer svp";
        }
    } else {
        $erreur = "Tout les champs ne sont pas complétés";
    }
}

?>
<html class="" id="toggle_page">
<head>
    <title>Ajout de membres</title>
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
                        <label for="pseudo">Pseudo :</label>
                    </td>
                    <td>
                        <input class="text" type="text" name="pseudo" placeholder="Pseudo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="role">Rôle :</label>
                    </td>
                    <td>
                        <input class="text" type="text" name="role" placeholder="rôle">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p><strong>Note : Les rôles sont : coloriste, clean, edit, check et trad</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="grade">Grade :</label>
                    </td>
                    <td>
                        <input class="text" type="text" name="grade" placeholder="grade">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p><strong>Note : Les grades (optionnel) sont : chef, cheffe, sous-chef et sous-cheffe</strong></p>
                    </td>
                </tr>
            </table>
            <input class="input-select formchoice" type="submit" formmethod="post" name="formcreate" value="Valider !">
        </form>
    </div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>
