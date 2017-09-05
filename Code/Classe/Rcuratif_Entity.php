<?php

class Rcuratif_Entity {
    //put your code here
    
    private $_id_Rapport_Curatif;
    private $_Date_Rapport_Cur;
    private $_Objet_Rapport_Cur;
    private $_Chemin_Fichier;
    private $_Email_Honeywell;
    private $_Email_Expedit;
    private $_Status;
    private $_SuiviEquipement_id;
    
    //construct
     function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            $method ='set_'.($key);
            if(method_exists($this, $method)){
                $this->$method($value);  
            }
            
        }
    }   
    function get_id_Rapport_Curatif() {
        return $this->_id_Rapport_Curatif;
    }

    function get_Date_Rapport_Cur() {
        return $this->_Date_Rapport_Cur;
    }

    function get_Objet_Rapport_Cur() {
        return $this->_Objet_Rapport_Cur;
    }

    function get_Chemin_Fichier() {
        return $this->_Chemin_Fichier;
    }

    function get_SuiviEquipement_id() {
        return $this->_SuiviEquipement_id;
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

    function set_id_Rapport_Curatif($_id_Rapport_Curatif) {
        $this->_id_Rapport_Curatif = $_id_Rapport_Curatif;
    }

    function set_Date_Rapport_Cur($_Date_Rapport_Cur) {
        $this->_Date_Rapport_Cur = $_Date_Rapport_Cur;
    }

    function set_Objet_Rapport_Cur($_Objet_Rapport_Cur) {
        $this->_Objet_Rapport_Cur = $_Objet_Rapport_Cur;
    }

    function set_Chemin_Fichier($_Chemin_Fichier) {
        $this->_Chemin_Fichier = $_Chemin_Fichier;
    }

    function set_SuiviEquipement_id($_SuiviEquipement_id) {
        $this->_SuiviEquipement_id = $_SuiviEquipement_id;
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



   
}
