<?php 
include_once 'connexion.php';
include_once '../model/membre.php';
include_once '../model/membreRepository.php';

if ($_SERVER['REQUEST_METHOD']== 'POST')
{
    $nom = $_POST['nom'];
    $adresse=$_POST['adresse'];
    $email = $_POST['email'];
    $dateInscription=$_POST['date_inscription'];

    $membre = new membre ($id=null, $nom, $email, $adresse, $dateInscription);
    $MembreRepository = new MembreRepository($pdo);
    $MembreRepository -> save($membre);

    echo " le membre a été ajouter avec succes . ID :" . $membre ->getID();
}
