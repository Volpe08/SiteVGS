<?php


try {
    $bdd = new PDO('mysql:host=127.0.0.1;port=3308;dbname=vgs', 'root', '');

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

error_reporting(E_ERROR | E_PARSE);