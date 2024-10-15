<?php

class livre
{

    private $id;
    private $titre;
    private $auteur;
    private $isbn;
    
    private $date_parution;
    private $nb_exemplaire;

    public function __construct($id, $titre, $auteur, $isbn, $date_parution ,$nb_exemplaire)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->isbn = $isbn;
        $this->date_parution = $date_parution;
        $this->nb_exemplaire = $nb_exemplaire;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getAuteur()
    {
        return $this->auteur;
    }
    public function getISBN()
    {
        return $this->isbn;
    }
    public function getDate_parution()
    {
        return $this->date_parution;
    }
    public function getNb_exemplaire()
    {
        return $this->nb_exemplaire;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;

    }
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }
    public function setISBN($isbn)
    {
        $this->isbn = $isbn;
    }
    public function setDate_parution($date_parution)
    {
        $this->date_parution = $date_parution;
    } 
    public function setNb_exemplaire($nb_exemplaire)
    {
        $this->nb_exemplaire = $nb_exemplaire;
    }
}