<?php

include_once 'connexion.php';
include_once '../model/membre.php';
include_once '../model/exemplaire.php';
include_once '../model/emprunt.php';
include_once '../model/empruntRepository.php';
include_once '../model/exemplareRepository.php';
// Récupérer les données du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $isbn = $_POST['ISBN'];
    $date_emprunt = $_POST['date_emprunt'];
    $date_retour = $_POST['date_retour'];
    $membre = $_POST['id_membre'];
    

    // Vérifier si le livre existe dans la base de données
    $sql_livre = "SELECT id_livre FROM livre WHERE titre = ? AND auteur = ? AND ISBN = ?";
    $stmt_livre = $pdo->prepare($sql_livre);
   
    $stmt_livre->execute([ $titre, $auteur,$isbn]);

    $stmt_livre->execute();
    $result_livre = $stmt_livre->fetch(PDO::FETCH_ASSOC);
    //print_r($result_livre);
    if ( !empty($result_livre)) {
        // Le livre existe, vérifier si un exemplaire est disponible
       
        $id_livre = $result_livre['id_livre'];
        // Chercher un exemplaire non emprunté

        // Chercher un exemplaire non emprunté
        $sql_exemplaire = "SELECT id_exemplaire, statut FROM exemplaire 
                           WHERE id_livre = ? 
                           AND statut = 'disponible'";
        $stmt_exemplaire = $pdo->prepare($sql_exemplaire);
        //$stmt_exemplaire->bindParam("i", $id_livre);
        $stmt_exemplaire->execute([$id_livre]);
        $result_exemplaire = $stmt_exemplaire->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result_exemplaire);

        if (!empty($result_exemplaire )) { //contient tt les exlemplaire qui sont disponibles
           $ligne_exemplaire = $result_exemplaire[0];
           $id_exemplaire = $ligne_exemplaire['id_exemplaire'];
           // echo $id_exemplaire ;

           $id_membre = 1; 
            $exemplaire = new Exemplaire($id = $id_exemplaire, $id_livre, $etat='emprunte');
            $exemplaireRepository = new exemplaireRepository($pdo);
            $exemplaireRepository -> save($exemplaire);
            
            $emprunt = new Emprunt ($id_exemplaire, $id_membre, $date_emprunt, $date_retour  , $idEmprunt = Null);// Ex: membre connecté (remplacez cette valeur par celle du membre connecté)
           $empruntRepository = new EmpruntRepository($pdo);
           $empruntRepository -> save($emprunt);

            // Un exemplaire est disponible
            //$row_exemplaire = $result_exemplaire->fetch_assoc();
            
            // ID membre : à adapter en fonction de votre logique d'authentification
            

            // // Enregistrer l'emprunt
            // $sql_emprunt = "INSERT INTO emprunt (id_exemplaire, id_membre, date_emprunt, date_retour) 
            //                 VALUES (?, ?, ?, ?)";
            // $stmt_emprunt = $pdo->prepare($sql_emprunt);
            // $stmt_emprunt->bindParam("iiss", $id_exemplaire, $id_membre, $date_emprunt, $date_retour);

            // if ($stmt_emprunt->execute()) {
            //     echo "Le livre a été emprunté avec succès.";
            // } else {
            //     echo "Erreur lors de l'enregistrement de l'emprunt.";
           // }
        } else {
            echo "Aucun exemplaire disponible pour ce livre.";
        }
    } else {
        echo "Le livre n'existe pas dans la base de données.";
    }
}

// Fermer la connexion
//$pdo->close();
?>
