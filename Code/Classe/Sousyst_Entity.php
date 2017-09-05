<?php
class Sousyst_Entity 
{
    private $_idSous_Systeme;
    private $_Nom_SousSysteme;
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
    
    function get_idSous_Systeme() {
        return $this->_idSous_Systeme;
    }

    function get_Nom_SousSysteme() {
        return $this->_Nom_SousSysteme;
    }

    function set_idSous_Systeme($_idSous_Systeme) {
        $this->_idSous_Systeme = $_idSous_Systeme;
    }

    function set_Nom_SousSysteme($_Nom_SousSysteme) {
        $this->_Nom_SousSysteme = $_Nom_SousSysteme;
    }
}
