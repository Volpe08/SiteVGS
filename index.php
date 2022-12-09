<?php
include("./bdd/connection_bdd.php");

$mangas = $bdd->query('SELECT nom FROM mangas ORDER BY date_update DESC');
$mangas->execute();

//$chap = $bdd->query('SELECT nb_chap FROM mangas WHERE nom = ?');
//$chap->execute(array($donnees['nom']));
//$number = $chap->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Volp'Gang - Accueil</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="img/vgs.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/mangas.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>




        /*$(document).bind("contextmenu",function(e) {
            e.preventDefault();
        });

        $(document).keydown(function(e){
            if(e.which === 123){
                return false;
            }
        });
*/



    </script>
</head>
<body>

	<?php include 'complements/header.php' ?>

    <div align="center">

        <p class="title_container">Actualités</p>

        <div class="announces">
            <p><u>Création du site de la VGS !</u></p>
        </div>
    </div>

    <div align="center">
        <p class="title_container">Dernières sorties</p>
    </div>
        <div align="center">

            <?php
            $affiche = 5;
            $count = 0;
            while ($donnees = $mangas->fetch() and $count < $affiche):
            $count += 1;

            $last_Chap = $bdd->prepare('SELECT * FROM Chapitre WHERE projet = ? ORDER BY nb_chap DESC LIMIT 1');
            $last_Chap->execute([$donnees['nom']]);

            $count = $last_Chap->rowCount();

            if($count != 0) {

                foreach ($last_Chap as $row) {
                    $chapitre = $row['nb_chap'];
                    //echo $donnees['nom'];
                }


                ?>
                <div class="solo">
                <a href="main.php?name=<?= $donnees['nom'] ?>&chap=<?= str_replace('.', '-', $chapitre) ?>">
                    <img class="image_solo" src="img/mangas/<?= $donnees['nom'] ?>.jpg">
                    <p class="name"><?= $donnees['nom'] ?></p>
                    <p class="name">Chapitre <?= $chapitre ?></p>
                </a>
                </div><?php
            }
            endwhile; ?>
            <iframe src="https://ptb.discord.com/widget?id=527784324989190154&theme=dark" align="right" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

        </div>

</body>
    <?php include 'complements/footer.php' ?>
<script type="text/javascript" src="js/toogle_theme.js"></script>
</html>

