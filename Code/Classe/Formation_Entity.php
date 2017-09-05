<?php
class Formation_Entity 
{
    private $_Id_form;
    private $_Intitule_form;
    private $_Date_debut_form;
    private $_date_fin_form;
    private $_objet_form;
    private $_Compte_rendu_form;
    private $_id_user;
    
    
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
     
    function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            $method ='set_'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
            
        }
    }
    function get_Id_form() {
        return $this->_Id_form;
    }

    function get_Intitule_form() {
        return $this->_Intitule_form;
    }

    function get_Date_debut_form() {
        return $this->_Date_debut_form;
    }

    function get_date_fin_form() {
        return $this->_date_fin_form;
    }

    function get_objet_form() {
        return $this->_objet_form;
    }

    function get_Compte_rendu_form() {
        return $this->_Compte_rendu_form;
    }

    function get_id_user() {
        return $this->_id_user;
    }

    function set_Id_form($_Id_form) {
        $this->_Id_form = $_Id_form;
    }

    function set_Intitule_form($_Intitule_form) {
        $this->_Intitule_form = $_Intitule_form;
    }

    function set_Date_debut_form($_Date_debut_form) {
        $this->_Date_debut_form = $_Date_debut_form;
    }

    function set_date_fin_form($_date_fin_form) {
        $this->_date_fin_form = $_date_fin_form;
    }

    function set_objet_form($_objet_form) {
        $this->_objet_form = $_objet_form;
    }

    function set_Compte_rendu_form($_Compte_rendu_form) {
        $this->_Compte_rendu_form = $_Compte_rendu_form;
    }

    function set_id_user($_id_user) {
        $this->_id_user = $_id_user;
    }


}
