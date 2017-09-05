<?php
class Groupe_Manager  
{
    private $_db;
    
    function __construct($db) {
        $this->set_db($db);
    }
    public function Add(Groupe_Entity $groupe ) {
        $req_insert=$this->_db->prepare('INSERT INTO groupe (Intitule_groupe,Caractere_Masquer_groupe)'
                . 'VALUES (?,?)');
        $req_insert->execute(array($groupe->get_Intitule_groupe(),$groupe->get_Caractere_Masquer_groupe()));
    }

    public function Delete(Groupe_Entity $groupe) {
        $req_delete=$this->_db->prepare('DELETE FROM groupe WHERE Id_groupe=?');
        $req_delete->execute(array($groupe->get_Id_groupe()));
    }

    public function Get_AllAsObject(){
        $All_Group=array();
     $req_select1=$this->_db->query('SELECT *FROM groupe');
     while ($donnees=$req_select1->fetch()){
         $All_Group[]= new Groupe_Entity($donnees);
     }
     return $All_Group;
    }

    public function Get_AllAsArray()
    {
        $All_Group=array();
     $req_select1=$this->_db->query('SELECT *FROM groupe');
     while ($donnees=$req_select1->fetch()){
         $All_Group[] = $donnees;
     }
     return $All_Group;
    }
    public function Get_Single($id) {
        $req_select2=$this->_db->prepare('SELECT *FROM groupe WHERE Id_groupe=?');
        $req_select2->execute(array($id));
        $donnees = $req_select2->fetch ( PDO :: FETCH_ASSOC );
        return new Groupe_Entity($donnees);
    }

    public function Update(Groupe_Entity $group) {
        $req_update=  $this->_db->prepare('UPDATE groupe SET Intitule_groupe=?, '
                . 'Caractere_Masquer_groupe=? WHERE Id_groupe=?' );
        $req_update->execute(array($group->get_Intitule_groupe(),$group->get_Caractere_Masquer_groupe(),$group->get_Id_groupe()));
    }
    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }


}
