<?php

class membre
{

    private $id;
    private $nom;
    private $email;
    private $adresse;
    private $dateInscription;

    public function __construct($id, $nom, $email, $adresse, $dateInscription)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->dateInscription = $dateInscription;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getDateInscription()
    {
        return $this->dateInscription;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    } 
}