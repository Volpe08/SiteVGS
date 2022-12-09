<?php
include("./bdd/connection_bdd.php");

$scan = $bdd->query('SELECT * FROM mangas');
$chemin = "img/scan/" . $_GET['name'] . "/" . $_GET['chap'] . "/";
$filezip = $chemin . $_GET['name'] . " - " . $_GET['chap'] . '.zip';
$compteur = "img/scan/" . $_GET['name'] . "/";

$files = glob("img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $_GET['chap']) . "/*.*");
$count = count($files);
$count -= 1;
$count2 = count($files);

//
//$selectchapter = $bdd->prepare("SELECT * FROM chapitre WHERE projet = ? ORDER BY nb_chap");
//$selectchapter->execute([$_GET['chap']]);

//
////voir si le dossier existe
//$chap_suivant = $_GET['chap'] + 1;
//$chemin_suivant = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivant) . "/1.jpg";
//
//
//$existe = file_exists($chemin_suivant);
//
//
//$chap_suivant2 = $_GET['chap'] + 0.5;
//$chemin_suivant2 = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivant2) . "/1.jpg";
//$existe2 = file_exists($chemin_suivant2);
//
//
//$chap_suivant1 = $_GET['chap'] + 0.1;
//$chemin_suivant1 = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivant1) . "/1.jpg";
//$existe1 = file_exists($chemin_suivant1);
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/complements.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="icon" type="image/png" href="img/vgs.png">
</head>

<body>

<div align="center" class="container">
    <div align="center" class="text">
        <p><a class="text" href="projet.php?name=<?= $_GET['name'] ?>"><?= $_GET['name'] ?></a> -
            Chapitre <?= $_GET['chap'] ?></p>
    </div>
    <p id='numero_de_page'>numero de page : 1/<?= $count ?></p>

    <img onclick="suivant()" id="page" class="page" src='<?= $chemin . "1.jpg"; ?>'>

    <br>
    <a class="arrow left" onclick="precedent()"><img src="img/previous.png" width="50" height="50"></a>
    <a class="arrow right" onclick="suivant()"><img src="img/next.png" width="50" height="50"></a>

</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let page = 1;

    console.log("page");


    jQuery(document).keydown(function (eventObject) {
        //document.addEventListener("keypress", function(event) {
        key = eventObject;
        if (key == 'ArrowLeft') {
            $('html, body').animate({
                scrollTop: $("div.container").offset().top
            }, 0);
            suivant();
            console.log('page suivante');
        } else if (key == 'ArrowRight') {
            $('html, body').animate({
                scrollTop: $("div.container").offset().top
            }, 0);
            precedent();
            console.log('page précedente');
        }


    });
    jQuery(document).keydown(function (eventObject) {
        if (eventObject.which == 37) { //fleche gauche
            $('html, body').animate(
                {
                    scrollTop: $("div.container").offset().top
                }, 0);
            precedent();
            console.log('page précedente');
        }
        if (eventObject.which == 39) { //fleche droite
            $('html, body').animate(
                {
                    scrollTop: $("div.container").offset().top
                }, 0);
            suivant();
            console.log('page suivante');
        }
    });


    function suivant() {
        if (page == 0) {
            page = 1;
        }
        if (page == <?php echo $count2 ?> ) {
            page == <?php echo $count2 ?>

        } else {
            page += 1
        }

        changer_page(page);
    }

    function precedent() {
        if (page == 0) {
            page = 1;
        }
        if (page == 1) {
            page -= 1
        } else {
            if (page == <?php echo $count2 ?>) {
                page -= 2;
            } else {
                page -= 1;
            }
        }
        changer_page(page);
    }

    function changer_page(page) {
        if (page != <?php echo $count2 ?>) {
            //console.log(page)
            //console.log(<?php //echo $count  ?>//)
            //console.log(<?php //echo $count2  ?>//)

            if (page == <?php echo $count2  ?> ) {
                //console.log(page);
                alert(page);

            } else if (page <= 0) {
                //console.log("Chap précédent");


                <?php
                if(strpos($_GET['chap'], '-') == false){

                for ($i = 9; $i > 0; $i--) {

                $chap_suivant = $_GET['chap'] - 1 . '.' . $i;
                $chemin_suivant = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivant) . "/1.jpg";


                $existe = file_exists($chemin_suivant);
                if($existe){
                ?>
                console.log("L-168")
                document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= str_replace('.', '-', $chap_suivant) ?>"

                <?php }
                else{
                ?>
                //console.log("<?php echo $chemin_suivant; ?>");
                console.log("L-175");
                <?php
                }
                }

                for ($i = 9; $i > 0; $i--) {

                $chap_suivant = $_GET['chap'] - 1 . '.' . $i;
                $chemin_suivant = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivant) . "/1.jpg";


                $existe = file_exists($chemin_suivant);
                if($existe){
                ?>
                console.log("L-189")
                document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= str_replace('.', '-', $chap_suivant) ?>"

                <?php }
                else{
                ?>
                //console.log("<?php echo $chemin_suivant; ?>");
                console.log("L-196");
                <?php
                }
                }

                $chap_suivant = $_GET['chap'] - 1;
                $chemin_c = "img/scan/" . $_GET['name'] . "/" . $chap_suivant . "/1.jpg";
                if(file_exists($chemin_c)){

                ?>
                console.log("L-204")
                setTimeout(() => {
                    document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $chap_suivant ?>";
                }, 100);

                <?php
                }else{
                ?>
                document.location.href = "projet.php?name=<?php echo $_GET['name'] ?>"

                <?php

                }
                }else{
                $chap_suivant = strstr($_GET['chap'], '-');
                $pos = strpos($_GET['chap'], '-');

                for ($i = substr($chap_suivant, 1, 10) - 1; $i > 0;$i--){


                $chap_suivants = substr($_GET['chap'], 0, $pos) . '.' . $i;
                $chemin_suivant = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivants) . "/1.jpg";


                $existe = file_exists($chemin_suivant);
                if($existe){
                ?>
                console.log("L-221")
                //console.log("<?php echo $chap_suivants ?>");
                document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= str_replace('.', '-', $chap_suivants) ?>"

                <?php }
                else{
                ?>
                //console.log("<?php echo $chap_suivants; ?>");
                console.log("L-228");
                document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= substr($_GET['chap'], 0, $pos); ?>"
                <?php
                }
                ?>
                //console.log("<?php echo $chap_suivants; ?>")

                <?php
                }

                $chap_suivant1 = substr($_GET['chap'], 0, $pos);
                $chemin_suivant1 = "img/scan/" . $_GET['name'] . "/" . $chap_suivant1 . "/1.jpg";


                $existe1 = file_exists($chemin_suivant1);

                if($existe1){
                ?>
                console.log("L-247");
                document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $chap_suivant1 ?>"

                <?php
                }else {

                ?>
                document.location.href = "projet.php?name=<?php echo $_GET['name'] ?>"
                console.log("L-255");
                <?php
                }
                }


                ?>
            } else {
                document.getElementById('page').src = '<?php echo $chemin ?>/' + page + '.jpg';
                document.getElementById('numero_de_page').textContent = 'numero de page : ' + page + '/<?php echo $count ?>';
            }
        } else {



            <?php

            if(strpos($_GET['chap'], '-') == false){

            for ($i = 1; $i < 10; $i++) {

            $chap_suivant = $_GET['chap'] . '.' . $i;
            $chemin_suivant = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivant) . "/1.jpg";


            $existe = file_exists($chemin_suivant);
            if($existe){

            $chemin_complet = str_replace('.', '-', $chap_suivant);
            ?>
            console.log("L-283")
            console.log("<?php echo $chemin_suivant; ?>");

            document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $chemin_complet ?>"

            <?php }
            else{
            ?>
            //console.log("<?php echo $chemin_suivant; ?>");
            console.log("L-290");
            <?php
            }
            }
            $chap_suivant_complet = $_GET['chap'] + 1;

            $chemin_suivant = "img/scan/" . $_GET['name'] . "/" . $chap_suivant_complet . "/1.jpg";

            if(file_exists($chemin_suivant)){

            //sleep(2);
            ?>
            console.log("L-297");
            setTimeout(() => {  document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $chap_suivant_complet ?>"; }, 100);

            //document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $chap_suivant_complet ?>"

            //console.log("<?php echo $chap_suivant; ?>")

            <?php
            }else {
            ?>
            document.location.href = "projet.php?name=<?php echo $_GET['name'] ?>"

            <?php
            }
            }else{
            $chap_suivant = strstr($_GET['chap'], '-');
            $pos = strpos($_GET['chap'], '-');

            for ($i = substr($chap_suivant, 1, 10) + 1; $i < 10;$i++){


            $chap_suivants = substr($_GET['chap'], 0, $pos) . '.' . $i;
            $chemin_suivant = "img/scan/" . $_GET['name'] . "/" . str_replace('.', '-', $chap_suivants) . "/1.jpg";


            $existe = file_exists($chemin_suivant);
            if($existe){
            ?>
            console.log("L-317")
            document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= str_replace('.', '-', $chap_suivants) ?>"

            <?php }
            else{
            ?>
            //console.log("<?php echo $chap_suivants; ?>");
            console.log("L-324");


            <?php
            }

            }


            $chap_suivant1 = substr($_GET['chap'], 0, $pos) + 1;
            $chemin_suivant1 = "img/scan/" . $_GET['name'] . "/" . $chap_suivant1 . "/1.jpg";


            $existe1 = file_exists($chemin_suivant1);

            if($existe1){
            ?>
            console.log("L-339");

            document.location.href = "main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $chap_suivant1 ?>"

            <?php
            }else {

            ?>
            document.location.href = "projet.php?name=<?php echo $_GET['name'] ?>"
            console.log("L-348");
            <?php
            }
            }



            ?>

        }
    }

</script>

</html>