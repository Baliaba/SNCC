<?php
class Poste_entity 
{
    private $_id_Poste;
    private $_titre_poste;
    
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
    function get_id_Poste() {
        return $this->_id_Poste;
    }

    function get_titre_poste() {
        return $this->_titre_poste;
    }

    function set_id_Poste($_id_Poste) {
        $this->_id_Poste = $_id_Poste;
    }

    function set_titre_poste($_titre_poste) {
        $this->_titre_poste = $_titre_poste;
    }


}
