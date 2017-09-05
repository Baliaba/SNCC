<?php
class Checklist_Entity 
{
    private $_idCheck_List_SNCC;
    private $_Status;
    private $_Etat_Power;
    private $_Etat_Battery;
    private $_Etat_CF9;
    private $_Etat_Sync;
    private $_Etat_PSU;
    private $_Observation;
    private $_Composant_id;
    private $_User_id;
    
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
    function get_idCheck_List_SNCC() {
        return $this->_idCheck_List_SNCC;
    }

    function get_Status() {
        return $this->_Status;
    }

    function get_Etat_Power() {
        return $this->_Etat_Power;
    }

    function get_Etat_Battery() {
        return $this->_Etat_Battery;
    }

    function get_Etat_CF9() {
        return $this->_Etat_CF9;
    }

    function get_Etat_Sync() {
        return $this->_Etat_Sync;
    }

    function get_Etat_PSU() {
        return $this->_Etat_PSU;
    }

    function get_Observation() {
        return $this->_Observation;
    }

    function get_Composant_id() {
        return $this->_Composant_id;
    }

    function get_User_id() {
        return $this->_User_id;
    }

    function set_idCheck_List_SNCC($_idCheck_List_SNCC) {
        $this->_idCheck_List_SNCC = $_idCheck_List_SNCC;
    }

    function set_Status($_Status) {
        $this->_Status = $_Status;
    }

    function set_Etat_Power($_Etat_Power) {
        $this->_Etat_Power = $_Etat_Power;
    }

    function set_Etat_Battery($_Etat_Battery) {
        $this->_Etat_Battery = $_Etat_Battery;
    }

    function set_Etat_CF9($_Etat_CF9) {
        $this->_Etat_CF9 = $_Etat_CF9;
    }

    function set_Etat_Sync($_Etat_Sync) {
        $this->_Etat_Sync = $_Etat_Sync;
    }

    function set_Etat_PSU($_Etat_PSU) {
        $this->_Etat_PSU = $_Etat_PSU;
    }

    function set_Observation($_Observation) {
        $this->_Observation = $_Observation;
    }

    function set_Composant_id($_Composant_id) {
        $this->_Composant_id = $_Composant_id;
    }

    function set_User_id($_User_id) {
        $this->_User_id = $_User_id;
    }
}