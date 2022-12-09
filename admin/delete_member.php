<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");
$pseudo = $bdd->query('SELECT pseudo FROM team');




$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();



if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}

if (isset($_POST['formdelete'])) {
    $postpseudo = $_POST['delpseudo'];
    foreach ($postpseudo as $delpseudo) {
        unlink("../img/team/" . $delpseudo . ".jpg");
        $deletembr = "DELETE FROM team WHERE pseudo = '$delpseudo'";
        $bdd->exec($deletembr);
    }
    $erreur = "Un membre vient d'être supprimer de la base de donnée, vous aller être rediriger !";
    header("Location: config.php");

}
?>
<html class="" id="toggle_page">
<head>
    <title>Suppression de membres</title>
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
    <h3>Veuillez selectionner les membres que vous voulez supprimer de la base de donnée</h3>
</div>

<div class="choices form">
    <form method="POST">
        <table>
    <?php while ($donnees = $pseudo->fetch()): ?>
    <tr>
        <td>
            <input type="checkbox" name="delpseudo[]" id="delpseudo" value="<?= $donnees['pseudo'] ?>">
        </td>
        <td>
            <label for="delpseudo"><?= $donnees['pseudo'] ?></label>
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
