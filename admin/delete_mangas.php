<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");
$mangas = $bdd->query('SELECT nom FROM mangas');




$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();



if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}

if (isset($_POST['formdelete'])) {
    $postmangas = $_POST['delmangas'];
    foreach ($postmangas as $delmangas) {
        unlink("../img/mangas/" . $delmangas . ".jpg");
        $deletembr = "DELETE FROM mangas WHERE nom = '$delmangas'";
        $bdd->exec($deletembr);
    }
    $erreur = "Un mangas vient d'être supprimer de la base de donnée, vous aller être rediriger !";
    header("Location: config.php");

}
?>
<html class="" id="toggle_page">
<head>
    <title>Suppression de mangas</title>
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
<div align="center">
    <h3>Veuillez selectionner les mangas que vous voulez supprimer de la base de donnée</h3>
</div>

<div class="choices form">
    <form method="POST">
        <table>
            <?php while ($donnees = $mangas->fetch()): ?>
                <tr>
                    <td>
                        <input type="checkbox" name="delmangas[]" id="delmangas" value="<?= $donnees['nom'] ?>">
                    </td>
                    <td>
                        <label for="delmangas"><?= $donnees['nom'] ?></label>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formdelete" value="Supprimer !">
    </form>
</div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>
