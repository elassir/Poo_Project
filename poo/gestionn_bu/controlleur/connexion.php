<?php
ini_set('display_errors' ,1 );
ini_set('display_startup_errors',1);

error_reporting(E_ALL);

$host='localhost:3306';
$bdd= 'gestion_bu';  // nom ds phpmyafmin
$username ='root';
$password = '';

try{
    $pdo = new PDO('mysql:host='.$host.';dbname='.$bdd, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "connexion établie";
}
catch(PDOException $e)
{
    die ('echec de la connexion ' .$e->getMessage());
}