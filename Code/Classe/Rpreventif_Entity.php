<?php

class Rpreventif {
    private $_idRapport_Prev;
    private $_Date_Rapport_Prev;
    private $_Objet_Rapport_Prev;
    private $_Email_Honeywell;
    private $_Email_Expedit;
    private $_Status;
    private $_Chemin;
     //construct
     function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            $method ='set_'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            } 
        }
    }
    
    function get_idRapport_Prev() {
        return $this->_idRapport_Prev;
    }

    function get_Date_Rapport_Prev() {
        return $this->_Date_Rapport_Prev;
    }

    function get_Objet_Rapport_Prev() {
        return $this->_Objet_Rapport_Prev;
    }

    function get_Email_Honeywell() {
        return $this->_Email_Honeywell;
    }

    function get_Email_Expedit() {
        return $this->_Email_Expedit;
    }

    function get_Status() {
        return $this->_Status;
    }

    function get_Chemin() {
        return $this->_Chemin;
    }

    function set_idRapport_Prev($_idRapport_Prev) {
        $this->_idRapport_Prev = $_idRapport_Prev;
    }

    function set_Date_Rapport_Prev($_Date_Rapport_Prev) {
        $this->_Date_Rapport_Prev = $_Date_Rapport_Prev;
    }

    function set_Objet_Rapport_Prev($_Objet_Rapport_Prev) {
        $this->_Objet_Rapport_Prev = $_Objet_Rapport_Prev;
    }

    function set_Email_Honeywell($_Email_Honeywell) {
        $this->_Email_Honeywell = $_Email_Honeywell;
    }

    function set_Email_Expedit($_Email_Expedit) {
        $this->_Email_Expedit = $_Email_Expedit;
    }

    function set_Status($_Status) {
        $this->_Status = $_Status;
    }

    function set_Chemin($_Chemin) {
        $this->_Chemin = $_Chemin;
    }


   }
