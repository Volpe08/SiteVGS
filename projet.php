<?php
include 'complements/header.php';

date_default_timezone_set('Europe/Paris');



$bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=vgs', 'root', '');

$sortie = $bdd->query('SELECT * FROM mangas WHERE nom = "' . $_GET['name'] . '"');

if (empty($_SESSION["pseudo"]) )
{
    $_SESSION['poste'] = 0;
}





$comment = $bdd->query('SELECT * FROM commentaire WHERE projet = "' . $_GET['name'] . '" ORDER BY date_data DESC' );



if(isset($_POST['valider'])){
    $com = htmlspecialchars($_POST['Com']);
    $date_update = date('Y-m-d H:i:s');
    $getname = $_GET['name'];
    $pseudo = $_SESSION["pseudo"];



    if(!empty($_POST['Com'])){


        $insertmbr = $bdd->prepare("INSERT INTO commentaire(pseudo, commentaires, projet, date_data) VALUES(?, ?, ?, ?)");
        $insertmbr->execute(array($pseudo, $com, $getname,$date_update));
        //$erreur = $insertmbr->fetch();
        if ($insertmbr){
            //$erreur = 'Votre manga a bien été rentrer dans la base de donnée !';
            //echo $insertmbr;
            //echo print_r($insertmbr);
            header('Location: projet.php?name=' . $getname);
        }



        //echo "cela vient d'être enregister :  " . $pseudo . " ". $com . " ". $getname . " ". $date_update . " ";


        //header('Location: projet.php?name=' . $_GET['name']);



    }
}



?>
<html class="" id="toggle_page" xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<link rel="stylesheet" type="text/css" href="css/mangas.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/admin/upload.css">

<script>

function textareaSize(zoneTexte) {
 if (zoneTexte) {
  nbrLignes=2;longueurDeLigne=2;
  nbrLignesMax=18;longueurDeLigneMax=9;
  lesLignes=escape(zoneTexte.value).split("%0D%0A");
  if (lesLignes) {nbrLignes=lesLignes.length;}
  if (nbrLignes>document.body.clientHeight/nbrLignesMax) {nbrLignes=document.body.clientHeight/nbrLignesMax;}

  if (lesLignes) {
   for(n=0; n<(lesLignes.length); n++) {
    if (longueurDeLigne<unescape(lesLignes[n]).length) {longueurDeLigne=unescape(lesLignes[n]).length;}
    if (longueurDeLigne>document.body.clientWidth/longueurDeLigneMax)
	 {
	 longueurDeLigne=document.body.clientWidth/longueurDeLigneMax;
	 nbrLignes+=unescape(lesLignes[n]).length/(document.body.clientWidth/longueurDeLigneMax);
	 }
   }
  }
  else {longueurDeLigne=zoneTexte.value.length}
  if (nbrLignes>document.body.clientHeight/nbrLignesMax) {nbrLignes=document.body.clientHeight/nbrLignesMax;}

  zoneTexte.cols=(longueurDeLigne+1);
  zoneTexte.rows=(nbrLignes+1);
 }
}</script>


<link rel="icon" type="image/png" href="img/vgs.png">



<title><?= $_GET['name'] ?></title>

<?php
while ($donnees = $sortie->fetch()):
    if ($_GET['name'] == $donnees['nom']) {
        ?>
        <h1 class="title_pres"><?= $donnees['nom'] ?></h1>
        <div class="pres">
            <div class="image_pres">
                <img class="image_solo" src="img/mangas/<?= $donnees['nom'] ?>.jpg">
            </div>
            <div class="texte_pres">
                <p>Nom alternatifs : <?= $donnees['nom_alternatifs'] ?></p>
                <p>Auteur(s) : <?= $donnees['auteur'] ?></p>
                <p>Artiste(s) : <?= $donnees['artiste'] ?></p>
                <p>Status : <?= $donnees['status'] ?></p>
                <p>Date de sortie : <?= $donnees['annee'] ?></p>
                <p>Genres : <?= $donnees['genre'] ?></p>
                <p>Description : <?= $donnees['description'] ?></p>
            </div>
        </div>

<div class="link">
    <p><?= $donnees['nom'] ?> - Liste des chapitres :</p>
    <?php
    $fileexist = 'img/scan/' . $donnees['nom'];
    if (file_exists($fileexist)){
    $scandir = scandir('img/scan/' . $donnees['nom']);
    sort($scandir);
        foreach ($scandir as $fichier) {
            if ($fichier == "." or $fichier == "..")
            {
            } elseif ($fichier == "")
            {
            } else {
                ?>
                <a href="main.php?name=<?= $donnees['nom'] ?>&chap=<?= $fichier ?>">Chapitre <?= str_replace('-','.',$fichier) ?></a> <?php
            }
        }
    }


?>
</div>

<form method="post" enctype="multipart/form-data"  >

        <div class="link" >
            <p> Commentaire :</p>
            <div style="margin: 0 auto;
     width: 50%;
">
            <textarea name="Com" id="Com" placeholder="Votre commentaire..." cols="25" onKeyDown="textareaSize(this);" onKeyUp="textareaSize(this);"  spellcheck="true" class="text" onclick=""

                      style="
                      width: 100%;
                      background: transparent;
                      overlay: auto;
                      color: darkgrey;
                      //border: none;
                      outline: none;
                      margin: 0px;
                      padding: 0px;


 resize : none;





<?php echo $pasvuspaspris; ?>
                              "></textarea>
                <hr style="margin: 0px
<?php echo $pasvuspaspris; ?>">
                <input class="input-select formchoice" style="line-height: 10px;

<?php echo $pasvuspaspris; ?>" type="submit" formmethod="post" name="valider" value="Commentez !">




<?php

while($commenta = $comment->fetch()){



    $print = $bdd->query('SELECT * FROM team WHERE pseudo = "' . $commenta['pseudo'] . '"');
    $code = $print->fetch();

    if ($code['Admin'] == 1){
        $color = "red";
    }
    else {
        $color ="white";
    }

$chemin_suivant = "img/membres/" . $commenta['pseudo'] . ".jpg";
$existe = file_exists($chemin_suivant);


$date_update = date('Y-m-d H:i:s', time());
$origine = new DateTime($date_update);
$target = new DateTime($commenta['date_data']);

$interval = $origine -> diff( $target);

/*print_r($target) ;
echo '<br>';
print_r($interval) ;
echo '<br>';
print_r($origine) ;*/

if($interval->format('%d ') > 31)
{
    if($interval->format('%m ') > 12){
        $datecom =  " il y a " . $interval->format('%y ans');
    }else
    {
        $datecom =  " il y a " . $interval->format('%m mois');}
}
elseif($interval->format('%d ') <= 1){


    if($interval->format('%h ') <= 1){

        if($interval->format('%i ') <= 1)
        {

            $datecom =  " il y a " . $interval->format('%s secondes');


        }else{
            $datecom =  " il y a " . $interval->format('%i minutes');

        }

    }
    else {

        $datecom =  " il y a " . $interval->format('%h heures');
    }

}
elseif ($interval->format('%d ') >= 7)
{
    $compteur = 0;
    $numjours = intval( $interval->format('%d ')) ;


    while ($numjours >= 7)
    {
        $numjours = $numjours - 7;
        //$semaine = $numjours - 7 ;
    }
    $datecom =  " il y a " . $numjours . " semaines";

}

else {
    $datecom =  " il y a " . $interval->format('%d jours');
}
//echo $interval->format('%Y-%m-%d ');


?>

<div>

    <?php
                    if ($existe){?>
                        <img style="    overflow:hidden;
    -webkit-border-radius:50px;
    -moz-border-radius:50px;
    border-radius:50px;
    width:50px;
    height:50px;
                    " class="image_solo" src="img/membres/<?=  $commenta['pseudo']; ?>.jpg">
<?php
                    }
                    else { ?>
                        <img style=" overflow:hidden;
    -webkit-border-radius:50px;
    -moz-border-radius:50px;
    border-radius:50px;
    width:50px;
    height:50px;
                    " class="image_solo" src="img/membres/default.jpg">
                        <?php

                    }
                    ?>
 <div>
               <span style="
               margin: 0px;
               color : <?= $color ?>;" id = "<?= $commenta['id']?>" name = "<?= $commenta['id'] ?>"><?= $commenta['pseudo'] ?>   </span><span><?= $datecom ?></span>
                <textarea id = "<?= $commenta['id']?>" name = "<?= $commenta['id'] ?>"  placeholder="Votre commentaire..." cols="25"  class="text" onload="textareaSize(this);" onloadstart="textareaSize(this);" onclick=""

                          style="
                      width: 100%;
                      background: transparent;
                      color: darkgrey;
                      border : none;
                      font-size: 16px;

 resize : none;




" disabled ><?= $commenta['commentaires'] ?></textarea></div></div>

    <a class="input-select formchoice"
       style="
       border: 1px red;
       border-style: solid;
       margin: 0px;
       padding: 0px;
       background-color: red;
       color: black ;
         border-radius: 5px;
         <?php echo $input_upload; ?>

" href="./function/delete.php?id=<?= $commenta['id'] ?>&proj=<?= $commenta['projet'] ?>" >Supprimer le commentaire</a>
<?php

    if ($_SESSION['poste'] == 1){
        echo '<br>';
    }
    else {

    }

 ?>
    <?php
}?>

            </div>

        </div>
</form>

<?php


    }



                    endwhile;



/*<div class="link">
    <p><?= $donnees['nom'] ?> - Liste des chapitres :</p>
    <?php
    if ($handle = opendir('img/scan/' . $donnees['nom'])) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..")
            {
                $fichier = array($file);
                sort($fichier,SORT_NATURAL);
                print_r(str_replace("_"," : ",$fichier)).'<br/>';
                ?>
            <a href="main.php?name=<?= $donnees['nom'] ?>&chap=<?= $fichier ?>">Chapitre <?= $file ?></a><?php
            }
        }
        closedir($handle);
    }

    ?>
</div>

<?php }
endwhile;*/
include 'complements/footer.php'; ?>
<script type="text/javascript" src="js/toogle_theme.js"></script>
</html>