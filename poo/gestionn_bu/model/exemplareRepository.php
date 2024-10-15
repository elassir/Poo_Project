<?php

class exemplaireRepository
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function save(Exemplaire $exemplaire)
    {
        try {
            $this->pdo->beginTransaction();

            if ($exemplaire->getId() == null) {

                $stmt = $this->pdo->prepare("INSERT INTO exemplaire ( id_livre, statut ) VALUES (?,?)"); 
                // il faut que ce soit dans la base de données 
                // a regarder sur phpmy admin

                $stmt->execute([ $exemplaire->getLivreID(), $exemplaire->getEtat()]);
                $exemplaire->setId($this->pdo->lastInsertId());
            } else {
                $stmt = $this->pdo->prepare("UPDATE exemplaire SET id_exemplaire=? , statut= ? , id_livre = ?  WHERE id_exemplaire = ? ");
                $stmt->execute([$exemplaire->getId(), $exemplaire->getEtat(), $exemplaire->getLivreID(), $exemplaire->getId()]);

            }
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

}