<?php
class Combattants{
    private $nom;
    private $Pouvoir;
    private $pv;
    private $degatsPhysique;
    private $degatsMagique;
    private $defense;

    function __construct($unNom, $unPouvoir, $pv, $degatsPhysique, $defense){
        $this->nom = $unNom;
        $this->Pouvoir = $unPouvoir;
        $this->pv = $pv;
        $this->degatsPhysique = $degatsPhysique;
        $this->defense = $defense;
        $this->degatsMagique = Null;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($unNom){
        $this->nom = $unNom;
    }

    public function getPouvoir(){
        return $this->Pouvoir;
    }
    public function setPouvoir($unPouvoir){
        $this->Pouvoir = $unPouvoir;
    }
    public function getPv(){
        return $this->pv;
    }
    public function setPv($nbPv){   
        $this->pv = $nbPv;
    }
    public function setDegats($adversaire){
        $this->degatsMagique = CalculeDegatsMagique($this, $adversaire);
    }
    public function getDegats(){
        return $this->degatsMagique;
    }
    public function defense($adversaire){
        $adversaire->degatsMagique = $adversaire->setDegats($this) - 10;
    }

    function attaquePhysique($adversaire){
        $adversaire->setPv($adversaire->getPv()-20);
    }

    function attaqueMagique($adversaire){
        $adversaire->setPv($adversaire->getPv() - $this->getDegats());
    }
}

?>