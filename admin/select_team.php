<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");
$mangas = $bdd->query('SELECT * FROM team');


$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();



if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}


if (isset($_POST['formmodif'])) {
    $_SESSION['name'] = $_POST['selectmangas'];
    header("Location: modif_team.php?name=".$_SESSION['name']);
}

?>

<html class="" id="toggle_page">
<head>
    <title>Selection de mangas</title>
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
    <h3>Veuillez selectionner le manga que vous voulez modifier</h3>
</div>

<div class="choices form">
    <form method="POST">
        <table>
            <?php while ($donnees = $mangas->fetch()): ?>
                <tr>
                    <td>
                        <input type="radio" name="selectmangas" id="selectmangas" value="<?= $donnees['pseudo'] ?>">
                    </td>
                    <td>
                        <label for="selectmangas"><?= $donnees['pseudo'] ?></label>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formmodif" value="Modifier !">
    </form>
</div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>

