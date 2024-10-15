<?php

class MembreRepository
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function save(membre $membre)
    {
        try {
            $this->pdo->beginTransaction();

            if ($membre->getId() == null) {

                $stmt = $this->pdo->prepare("INSERT INTO membres (nom, mail, adresse, date_inscription) VALUES (?,?,?,?)"); // il faut que ce soit dans la base de données 
                // a regarder sur phpmy admin

                $stmt->execute([$membre->getNom(), $membre->getEmail(), $membre->getAdresse(), $membre->getDateInscription()]);
                $membre->setId($this->pdo->lastInsertId());
            } else {
                $stmt = $this->pdo->prepare("UPDATE membres SET nom =? , mail= ? , adresse= ? , date_inscription = ? WHERE id = ? ");
                $stmt->execute([$membre->getNom(), $membre->getEmail(), $membre->getAdresse(), $membre->getDateInscription(), $membre->getId()]);

            }
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

}