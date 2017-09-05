<?php
class Poste_Manager 
{
    private $_db;
    function __construct($db) {
        $this->set_db($db);
    }
    function Add(Poste_entity $poste)
    {
        $req=$this->_db->prepare('INSERT INTO poste (titre_poste) VALUES (?)');
        $req->execute(array($poste->get_titre_poste()));
    }
    function getAllAsObject()
    {
        $All_Poste=array();
        $req=$this->_db->query('SELECT *FROM poste');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Poste[] = new Poste_entity($donnees);
        }
        return $All_Poste;
    }
    function getAllAsArray()
    {
        $All_Poste=array();
        $req=$this->_db->query('SELECT *FROM poste');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Poste[] = $donnees;
        }
        return $All_Poste;
    }
    function getSingle($id)
    {
        $req=$this->_db->prepare('SELECT *FROM poste WHERE id_Poste=?');
        $req->execute(array($id));
        $donnees=$req->fetch(PDO::FETCH_ASSOC);
        return new Poste_entity($donnees);
    }
    function Delete(Poste_entity $poste)
    {
        $req=$this->_db->prepare('DELETE FROM poste WHERE id_Poste=?');
        $req->execute(array($poste->get_id_Poste()));
    }
    function Update(Poste_entity $poste)
    {
        $req=$this->_db->prepare('UPDATE poste SET titre_poste=? WHERE id_poste=?');
        $req->execute(array($poste->get_titre_poste(),$poste->get_id_Poste()));
    }
            
    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }
}
