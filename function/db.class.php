<?php
$host = 'localhost';
$port = '3308';
$dbname = 'vgs';
$utilisateur = 'root';
$motdepasse = '';

//====================================================================//

// Connexion avec la base de données
try{
    $bdd = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname.';charset=utf8', ''.$utilisateur.'', ''.$motdepasse.'');
}catch (Exception $e){
// Signalement en cas d'erreur lors de la connexion
    die('[GRAPH_PLUGIN_UBRAIN] ERROR (PDO_ERR)');
}
// Suppression sécurisée des données de connexions pour éviter une récupération
$host = NULL;
$port = NULL;
$dbname = NULL;
$utilisateur = NULL;
$notdepasse = NULL;