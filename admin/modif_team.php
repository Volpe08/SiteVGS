<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require 'nav_admin.php';
include("../bdd/connection_bdd.php");
$getname = $_GET['name'];

$mangas = $bdd->prepare('SELECT * FROM team WHERE pseudo = ?');
$mangas->execute(array($getname));
$donnees = $mangas->fetch();

if (isset($_POST['formmodif'])) {
    $role = $_POST['role'];
    $grade = $_POST['grade'];
    $admin = $_POST['admin'];



    if (!empty($role)) {
        $modifannee = $bdd->prepare("UPDATE team SET role ='$role' WHERE pseudo = '$getname'");
        $modifannee->execute();
    }

    if (!empty($grade)) {
        $modifgenre = $bdd->prepare("UPDATE team SET grade = '$grade' WHERE pseudo = '$getname'");
        $modifgenre->execute();
    }

    if (!empty($admin)) {
        $modifdescription = $bdd->prepare("UPDATE team SET Admin = '$admin' WHERE pseudo = '$getname'");
        $modifdescription->execute();
    }
    if ($admin == 0) {
        $modifdescription = $bdd->prepare("UPDATE team SET Admin = '$admin' WHERE pseudo = '$getname'");
        $modifdescription->execute();
    }
    header('Location: select_team.php');

}

?>
<html class="" id="toggle_page">
<head>
    <title>Modification de mangas</title>
    <meta charset="UTF-8 sans BOM">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin/upload.css">
    <script>
        console.log(<?php echo $getname; ?>)
    </script>
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
                    <label>Pseudo : </label>
                </td>
                <td>
                    <label><?= $donnees['pseudo'] ?></label>
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Role : </label>
                </td>
                <td>
                    <label><?= $donnees['role'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="role">Role(s) : </label>
                </td>
                <td>
                    <input class="text" type="text" name="role" id="role">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Grades : </label>
                </td>
                <td>
                    <label><?= $donnees['grade'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="grade">Nouvel auteur : </label>
                </td>
                <td>
                    <input class="text" type="text" name="grade" id="grade">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr>
                <td>
                    <label>Admin ou non : </label>
                </td>
                <td>
                    <label><?= $donnees['Admin'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="admin">Choix admin (0 = non, 1 = oui) : </label>
                </td>
                <td>
                    <input class="text" type="text" name="admin" id="admin">
                </td>
            </tr>

            <tr><td></td></tr>
            <tr><td></td></tr>


        </table>
        <input class="input-select formchoice" type="submit" formmethod="post" name="formmodif" value="Modifier !">
    </form>
</div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>
