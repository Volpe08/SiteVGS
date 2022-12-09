<?php

date_default_timezone_set('Europe/Paris');



include("../bdd/connection_bdd.php");

$id = $_GET['id'];
$getname = $_GET['proj'];

$sup =  $bdd->query('DELETE FROM commentaire WHERE id = "'. $id .'"');
header('Location: ../projet.php?name=' . $getname);

