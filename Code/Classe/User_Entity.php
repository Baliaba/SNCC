<?php
class User_Entity 
{
    //attributs
    private $_idUser;
    private $_Login;
    private $_mot_de_passe;
    private $_Groupe_Id_;
    private $_Poste_id;
    private $_full_name;
    
    
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
    function get_idUser() {
        return $this->_idUser;
    }

    function get_Login() {
        return $this->_Login;
    }

    function get_mot_de_passe() {
        return $this->_mot_de_passe;
    }

    function get_Poste_id() {
        return $this->_Poste_id;
    }

    function get_Nom_user() {
        return $this->_full_name;
    }

    function set_idUser($_idUser) {
        $this->_idUser = $_idUser;
    }

    function set_Login($_Login) {
        $this->_Login = $_Login;
    }

    function set_mot_de_passe($_mot_de_passe) {
        $this->_mot_de_passe = $_mot_de_passe;
    }
    function set_Poste_id($_Poste_id) {
        $this->_Poste_id = $_Poste_id;
    }

    function set_Nom_user($_full_name) {
        $this->_full_name = $_full_name;
    }
    function get_Groupe_Id_() {
        return $this->_Groupe_Id_;
    }

    function set_Groupe_Id_($_Groupe_Id_) {
        $this->_Groupe_Id_ = $_Groupe_Id_;
    }
}