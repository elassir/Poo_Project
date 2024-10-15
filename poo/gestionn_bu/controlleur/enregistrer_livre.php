<?php 
include_once 'connexion.php';
include_once '../model/livreRepository.php';
include_once '../model/livre.php';
include_once '../model/exemplaire.php';
include_once '../model/exemplareRepository.php';

if ($_SERVER['REQUEST_METHOD']== 'POST')
{
    $titre = $_POST['titre'];
    $auteur=$_POST['auteur'];
    $date_parution = $_POST['date_parution'];
    $isbn=$_POST['ISBN'];
    $nb_exemplaire=$_POST['nb_exemplaire'];

    $livre = new livre ($id = null, $titre , $auteur , $isbn, $date_parution, $nb_exemplaire);
    $livreRepository = new livreRepository($pdo);
    $livreRepository -> save($livre);

    for ($i = 0 ; $i <$nb_exemplaire ; $i++)
    {
        $exemplaire = new Exemplaire($id = null, $livre->getId(), $etat='disponible');
        $exemplaireRepository = new exemplaireRepository($pdo);
        $exemplaireRepository -> save($exemplaire);


    }
        echo " le livre a été ajouter avec succes . ID :" . $livre ->getID();
}