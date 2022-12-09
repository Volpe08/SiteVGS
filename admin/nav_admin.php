<?php
require_once '../function/auth.php';
forcer_utilisateur_connecte();
require_once '../function/compteur.php';

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

/*
$bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=vgs', 'root', '');


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
if ($_SESSION['pseudo'] != $authdev['pseudo']) {
    if ($_SESSION['pseudo'] != $authleader['pseudo']) {
        if ($_SESSION['pseudo'] != $authchef['pseudo']) {
            header('Location: ../index.php');
            $input_upload = 'display: none;';
        }
    }
}
*/
?>

<html>
<head>
    <link rel="icon" type="image/jpg" href="../img/vgs.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/complements.css">
</head>

<body>
<header class="header normal" id="toggle_header">

    <div id="header">
        <nav class="a_header" id="toggle_nav">
            <ul>
                <li>
                    <a href="../index.php">Accueil du site</a>
                </li>
                <li style="<?php echo $input_upload ?>" >
                    <a href="dashboard.php" >Dashboard</a>
                </li>
                <li style="<?php echo $input_upload ?>" >
                    <a href="upload.php" >Upload</a>
                </li>
                <li style="<?php echo $input_upload ?>" >
                    <a href="config.php" >Config</a>
                </li>
                <li>
                    <a href="profil.php?name=<?php echo $_SESSION['pseudo']; ?>">Profil</a>
                </li>
                <li>
                    <a href="../deconnexion.php">Deconnexion</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="button_top">
        <li>
            <a href="#header"><img class="top-arrow" src="../img/top-arrow.png"></a>
        </li>
    </div>

</header>

</body>
</html>
