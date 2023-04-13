<?php
class Pouvoir{
    private $intituler;
    private $degatsMagique;
    private $faiblesse;
    function __construct($unIntituler, $uneFaiblesse){
        $this->intituler = $unIntituler;
        $this->faiblesse = $uneFaiblesse;
    }

    public function getIntituler(){
        return $this->intituler;
    }

    public function getFaiblesse(){
        return $this->faiblesse;
    }

    
    public function getDegats(){
        return $this->degatsMagique;
    }
}

?>