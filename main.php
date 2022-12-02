<?php
$bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=vgs', 'root', '');

$scan = $bdd->query('SELECT * FROM mangas');
$chemin = "img/scan/" . $_GET['name'] . "/" . $_GET['chap'] . "/";
$filezip = $chemin . $_GET['name'] . " - " . $_GET['chap'] . '.zip';
$compteur = "img/scan/" . $_GET['name'] . "/";

$files = glob("img/scan/" . $_GET['name'] . "/" . $_GET['chap'] . "/*.*");
$count = count($files);
$count -= 1;
$count2 = count($files);




//voir si le dossier existe
$chap_suivant = $_GET['chap'] + 1;
$chemin_suivant = "img/scan/" . $_GET['name'] . "/" . $chap_suivant . "/1.jpg";


$existe = file_exists($chemin_suivant);


$chap_suivant2 = $_GET['chap'] + 0.5;
$chemin_suivant2 = "img/scan/" . $_GET['name'] . "/" . $chap_suivant2 . "/1.jpg";
$existe2 = file_exists($chemin_suivant2);



$chap_suivant1 = $_GET['chap'] + 0.1;
$chemin_suivant1 = "img/scan/" . $_GET['name'] . "/" . $chap_suivant1 . "/1.jpg";
$existe1 = file_exists($chemin_suivant1);
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
        <p><a class="text" href="projet.php?name=<?= $_GET['name'] ?>"><?= $_GET['name'] ?></a> - Chapitre <?= $_GET['chap'] ?></p>
    </div>
    <p id='numero_de_page'>numero de page : 1/<?= $count ?></p>

    <img onclick="suivant()" id="page" class="page" src='<?= $chemin ."1.jpg"; ?>'>

    <br>
    <a class="arrow left" onclick="precedent()"><img src="img/previous.png" width="50" height="50"></a>
    <a class="arrow right" onclick="suivant()"><img src="img/next.png" width="50" height="50"></a>

</div>

<?php



?>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let page = 1;



    jQuery(document).keydown(function(eventObject)
    {
    //document.addEventListener("keypress", function(event) {
        key = eventObject;
        if (key == 'ArrowLeft'  )
        {
            $('html, body').animate({
                scrollTop: $("div.container").offset().top
            }, 0);
            suivant();
            console.log('page suivante');
        } else if (key == 'ArrowRight' )
        {
            $('html, body').animate({
                scrollTop: $("div.container").offset().top
            }, 0);
            precedent();
            console.log('page précedente');
        }


    });
    jQuery(document).keydown(function(eventObject)
    {
        if (eventObject.which == 37)
        { //fleche gauche
            $('html, body').animate(
                {
                    scrollTop: $("div.container").offset().top
                }, 0);
            precedent();
            console.log('page précedente');
        }
        if (eventObject.which == 39)
        { //fleche droite
            $('html, body').animate(
                {
                    scrollTop: $("div.container").offset().top
                }, 0);
            suivant();
            console.log('page suivante');
        }
    });


    function suivant() {
        if (page == <?php echo $count2 ?> )
        {
            page == <?php echo $count2 ?>

        }
        else
        {
            page += 1
        }

        changer_page(page);
    }
    function precedent() {
        if (page == 1) {
            page += 0
        } else {
            if (page == <?php echo $count2 ?>)
            {
                page -= 2 ;
            }else {
                page -= 1;
            }
        }
        changer_page(page);
    }
    function changer_page(page) {
        if (page != <?php echo $count2 ?>)
        {
            console.log(page)
            console.log(<?php echo $count  ?>)
            console.log(<?php echo $count2  ?>)

            if (page  == <?php echo $count2  ?> ) {
                console.log(page);
                alert (page);

            }
            else {
                document.getElementById('page').src = '<?php echo $chemin ?>/' + page + '.jpg';
                document.getElementById('numero_de_page').textContent = 'numero de page : ' + page + '/<?php echo $count ?>';
            }
        }
            /*else if (page <= 0 && chapitre != 1)
            {
                document.location.href="main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $_GET['chap'] - 1 ?>"
        }*/
        else
        {



            <?php if ($existe1) {?>

            document.location.href="main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $_GET['chap'] + 0.1 ?>"

            <?php }
            elseif ($existe2){?>

            document.location.href="main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $_GET['chap'] + 0.5 ?>"

            <?php }
            elseif ($existe){?>

            document.location.href="main.php?name=<?php echo $_GET['name'] ?>&chap=<?= $_GET['chap'] + 1 ?>"

            <?php }


                else {?>

            document.location.href="projet.php?name=<?php echo $_GET['name'] ?>";

            <?php } ?>

        }
    }

</script>

</html>