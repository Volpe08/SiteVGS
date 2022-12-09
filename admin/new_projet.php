<?php
require 'nav_admin.php';


include("../bdd/connection_bdd.php");
$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();
$_SESSION['poste'] = $code['Admin'];

if ($_SESSION['poste'] == 1  ){
    $input_upload = 'display: ;';

}

else
{
    $input_upload = 'display: none;';

}


?>

<html class="" id="toggle_page">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
<h1 class="title_pres"><?= $_GET['name'] ?></h1>
<div class="pres">
    <div class="image_pres">
        <img src="img/mangas/<?= $_GET['name'] ?>.jpg">
    </div>
    <div class="texte_pres">
        <p>Auteur(s) : Hudie Lan Man You Yinli</p>
        <p>Artiste(s) : Man You Yinli</p>
        <p>Statut : En Cours</p>
        <p>Date de sortie : 2018</p>
        <p>Genres :  Action ,  Aventure ,  Fantastique ,  Arts Martiaux</p>
        <p>Description :
            Break the World est un MMORPG manhua. Nous suivons le voyage de Feng Xiao dans sa quête d'essayer simplement d'explorer le jeu. Mais il doit faire face à tous les problèmes supplémentaires qui accompagnent la lecture d'un jeu vidéo en première. Le jeu fonctionnera-t-il jamais ? Découvrez-le dans Break The World.
        </p>
    </div>
</div>
<div class="link">
    <p><?= $_GET['name'] ?> - Liste des chapitres :</p>
</div>

<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>
</body>
</html>
