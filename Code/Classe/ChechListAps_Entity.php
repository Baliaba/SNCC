<?php
class ChechListAps_Entity 
{
    private  $_Id_check;
    private $_Vcc;
    private $_Vb;
    private $_Eld;
    private $_Nbre_Forcage;
    private $_Observations;
    private $_Temperature;
    private $_User_idUser;
    private $_id_composant;
    private $_Psu;
    
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
    
    function get_Id_check() {
        return $this->_Id_check;
    }

    function get_Vcc() {
        return $this->_Vcc;
    }

    function get_Vb() {
        return $this->_Vb;
    }

    function get_Eld() {
        return $this->_Eld;
    }

    
    function get_Nbre_Forcage() {
        return $this->_Nbre_Forcage;
    }

    function get_Observations() {
        return $this->_Observations;
    }

    function get_Temperature() {
        return $this->_Temperature;
    }

    function get_User_idUser() {
        return $this->_User_idUser;
    }

    function get_id_composant() {
        return $this->_id_composant;
    }

    function set_Id_check($_Id_check) {
        $this->_Id_check = $_Id_check;
    }

    function set_Vcc($_Vcc) {
        $this->_Vcc = $_Vcc;
    }

    function set_Vb($_Vb) {
        $this->_Vb = $_Vb;
    }
    function set_Eld($_Eld) {
        $this->_Eld = $_Eld;
    }
 
    function set_Nbre_Forcage($_Nbre_Forcage) {
        $this->_Nbre_Forcage = $_Nbre_Forcage;
    }

    function set_Observations($_Observations) {
        $this->_Observations = $_Observations;
    }

    function set_Temperature($_Temperature) {
        $this->_Temperature = $_Temperature;
    }

    function set_User_idUser($_User_idUser) {
        $this->_User_idUser = $_User_idUser;
    }

    function set_id_composant($_id_composant) {
        $this->_id_composant = $_id_composant;
    }
    function get_Psu() {
        return $this->_Psu;
    }

    function set_Psu($_Psu) {
        $this->_Psu = $_Psu;
    }


}