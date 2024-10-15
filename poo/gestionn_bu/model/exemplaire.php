<?php

class Exemplaire
{
    private $id;
    private $LivreID;
    private $etat;

    public function __construct($id, $LivreID, $etat = 'disponible' )
    {
        $this->id = $id;
        $this->LivreID = $LivreID;
        $this->etat = $etat;

    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getLivreID()
    {
        return $this->LivreID;
    }
    public function setLivreID($LivreID)
    {
        $this->LivreID = $LivreID;
    }
    public function getEtat()
    {
        return $this->etat;
    }
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

}