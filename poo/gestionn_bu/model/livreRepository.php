<?php

class livreRepository
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function save(livre $livre)
    {
        try {
            $this->pdo->beginTransaction();

            if ($livre->getId() == null) {

                $stmt = $this->pdo->prepare("INSERT INTO livre (titre,auteur ,ISBN , date_parution, nb_exemplaire ) VALUES (?,?,?,?,?)"); 
                // il faut que ce soit dans la base de données 
                // a regarder sur phpmy admin

                $stmt->execute([$livre->getTitre(), $livre->getAuteur(), $livre->getISBN(), $livre->getDate_parution(),$livre->getNb_exemplaire()]);
                $livre->setId($this->pdo->lastInsertId());
            } else {
                $stmt = $this->pdo->prepare("UPDATE livre SET titre =? , auteur= ? , ISBN= ? , date_parution = ?, nb_exemplaire = ? WHERE id = ? ");
                $stmt->execute([$livre->getTitre(), $livre->getAuteur(), $livre->getISBN(), $livre->getDate_parution(),$livre->getNb_exemplaire(), $livre->getId()]);

            }
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

}