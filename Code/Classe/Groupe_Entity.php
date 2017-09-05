<?php

class Groupe_Entity {
    private $_Id_groupe;
    private $_Intitule_groupe;
    private $_Caractere_Masquer_groupe;
    
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
            
    function get_Id_groupe() {
        return $this->_Id_groupe;
    }

    function get_Intitule_groupe() {
        return $this->_Intitule_groupe;
    }

    function get_Caractere_Masquer_groupe() {
        return $this->_Caractere_Masquer_groupe;
    }

    function set_Id_groupe($_Id_groupe) {
        $this->_Id_groupe = $_Id_groupe;
    }

    function set_Intitule_groupe($_Intitule_groupe) {
        $this->_Intitule_groupe = $_Intitule_groupe;
    }

    function set_Caractere_Masquer_groupe($_Caractere_Masquer_groupe) {
        $this->_Caractere_Masquer_groupe = $_Caractere_Masquer_groupe;
    }


}
