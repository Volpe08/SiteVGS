<?php
require '../function/auth.php';
forcer_utilisateur_connecte();
require_once '../function/compteur.php';
include("../bdd/connection_bdd.php");

$print = $bdd->query('SELECT * FROM team WHERE pseudo = "'.$_SESSION["pseudo"].'"' );
$code = $print->fetch();



if ($_SESSION['poste'] == 1  ){

}

else
{
    header('Location: ../index.php');

}



$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selection && $mois_selection) {
    $vues = nombre_vues_mois($annee_selection, $mois_selection);
    $detail = nombre_vues_detail_mois($annee_selection, $mois_selection);
} else {
    $vues = nombre_vues();
}
$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre',
];
?>

<!DOCTYPE html>
    <html class="" id="toggle_page">
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css">
    <title>Dashboard</title>
    <meta charset="UTF-8">
</head>
<?php require 'nav_admin.php'; ?>
<body>
<div align="center">
    <p>Vous êtes connecté en tant que : <?= $_SESSION['pseudo'] ?></p>
    <p>Il y a eu <?= $vues ?> visite<?php if ($vues > 1): ?>s<?php endif; ?> sur le site au mois du <?= date('m').'/'.date('y') ?></p><br><hr><br>
</div>

<div class="content">
    <div class="annee">
        <?php for($i = 0; $i < 5; $i++): ?>
        <a class="<?= $annee - $i === $annee_selection ? 'annee active' : 'annee';?>" href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
        <?php if($annee - $i === $annee_selection): ?>
    </div><br>
    <div class="mois">
        <?php foreach ($mois as $numero => $nom): ?>
            <a class="<?= $numero === $mois_selection ? 'mois active' : 'mois';?>" href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>">
                <?= $nom ?>
            </a>
        <?php endforeach; ?>
        <?php endif; ?>
        <br>
        <?php endfor ?>

        <?php if (isset($detail)): ?>
        <div class="table">
            <h2>Détails des visites pour le mois</h2>

            <table class="table">
                <thead>
                <tr>
                    <th>Jour&emsp;</th>
                    <th>Nombre de visite</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($detail as $ligne): ?>
                    <tr>
                        <?php if($ligne['jour']%2) { ?>
                            <td class="haut"><?= $ligne['jour'] ?></td>
                            <td class="haut"><?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : ''; ?></td>
                        <?php } else { ?>
                            <td class="bas"><?= $ligne['jour'] ?></td>
                            <td class="bas"><?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : ''; ?></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php endif; ?>
</div>
</body>
</html>
<?php require '../complements/footer.php'; ?>
<script type="text/javascript" src="../js/toogle_theme.js"></script>

