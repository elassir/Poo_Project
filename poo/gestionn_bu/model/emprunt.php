<?php

class Emprunt
{
    private $idEmprunt;
    private $dateEmprunt;
    private $dateRetour;
    private $idExemplaire;
    private $idMembre;

    public function __construct($idExemplaire, $idMembre, $dateEmprunt, $dateRetour  , $idEmprunt= null)
    {
        $this->idEmprunt = $idEmprunt;
        $this->idMembre = $idMembre;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
        $this->idExemplaire = $idExemplaire;
        
 
    }
    public function getId_emprunt() 
    {
        return $this->idEmprunt;
    }
    public function setId_emprunt($idEmprunt)
    {
        $this->idEmprunt = $idEmprunt;
    }
    public function getIdMembre()
    {
        return $this->idMembre;
    }
    public function setIdMembre($idMembre)
    {
        $this->idMembre = $idMembre;
    }
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;

    }
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;
    }
    public function getDateRetour()
    {
        return $this->dateRetour;
    }
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;
    }
    
    public function getid_Exemplaire()
    {
        return $this->idExemplaire;

    }
    public function setIdExemplaire($idExemplaire)
    {
        $this->idExemplaire = $idExemplaire;
    }

}
