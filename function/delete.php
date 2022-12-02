<?php

date_default_timezone_set('Europe/Paris');



$bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=vgs', 'root', '');

$id = $_GET['id'];
$getname = $_GET['proj'];

$sup =  $bdd->query('DELETE FROM commentaire WHERE id = "'. $id .'"');
header('Location: ../projet.php?name=' . $getname);

