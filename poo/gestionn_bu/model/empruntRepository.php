<?php

class EmpruntRepository
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
      public function save(Emprunt $emprunt)
    {
    try {
        $this->pdo->beginTransaction();

        if ($emprunt->getId_emprunt() == null) {

            $stmt = $this->pdo->prepare("INSERT INTO emprunts ( id_membre , id_exemplaire, date_emprunt, date_retour ) VALUES (?,?,?,?)"); 
            // il faut que ce soit dans la base de données 
            // a regarder sur phpmy admin

            $stmt->execute([ $emprunt->getIdMembre(), $emprunt->getid_Exemplaire(),$emprunt->getDateEmprunt(),$emprunt->getDateRetour()]);
            $emprunt->setId_emprunt($this->pdo->lastInsertId());
        } else {
            $stmt = $this->pdo->prepare("UPDATE emprunts SET id_membre=? , id_exemplaire= ? , date_emprunt = ? , date_retour = ?  WHERE id_exemplaire = ? ");
            $stmt->execute([$emprunt->getIdMembre(), $emprunt->getid_Exemplaire(), $emprunt->getDateEmprunt(),$emprunt->getDateRetour()]);

        }
    
        $this->pdo->commit();
    } catch (Exception $e) {
        $this->pdo->rollBack();
        throw $e;
    }
}
}