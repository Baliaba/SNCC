<?php
class RapportP_Manager 
{
     private $_db;
    function __construct($db) {
        $this->set_db($db);
    }
    function Add(Rpreventif $Rprev)
    {
        $req=$this->_db->prepare('INSERT INTO rapport_preventif (Date_Rapport_Prev,Objet_Rapport_Prev,Email_Honeywell,Email_Expedit,Status,Chemin) VALUES (NOW(),?,?,?,?,?)');
        $req->execute(array($Rprev->get_Objet_Rapport_Prev(),$Rprev->get_Email_Honeywell(),$Rprev->get_Email_Expedit(),$Rprev->get_Status(),$Rprev->get_Chemin()));
    }
    function getAllAsObject()
    {
        $All_Rapport=array();
        $req=$this->_db->query('SELECT *FROM rapport_preventif');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Rapport[]=new Rpreventif($donnees);
        }
        return $All_Rapport;
    }
    function getAllAsArray()
    {
        $All_Rapport=array();
        $req=$this->_db->query('SELECT *FROM rapport_preventif');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Rapport[]=$donnees;
        }
        return $All_Rapport;
    }
    
    public function Search_by_Code($date)
    {
        $All_Preventif=array();
        $req=$this->_db->prepare('SELECT * FROM rapport_preventif WHERE Date_Rapport_Prev LIKE ?');
        $req->execute(array('%'.$date.'%'));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Preventif[]=$donnes; 
        }
        return $All_Preventif;
    }
    
    function getSingle($id)
    {
        $req=$this->_db->prepare('SELECT *FROM rapport_preventif WHERE idRapport_Prev=?');
        $req->execute(array($id));
        $donnees=$req->fetch(PDO::FETCH_ASSOC);
        return  new Rpreventif($donnees);
    }
    function Delete(Rpreventif $Rapport)
    {
        $req=$this->_db->prepare('DELETE FROM rapport_preventif WHERE idRapport_Prev=?');
        $req->execute(array($Rapport->get_idRapport_Prev()));
    }
    function Update(Rpreventif $Rapport)
    {
        $req=$this->_db->prepare('UPDATE rapport_preventif SET Date_Rapport_Prev=NOW(),Objet_Rapport_Prev=?,Email_Honeywell=?,Email_Expedit=?,Status=?,Chemin=? WHERE idRapport_Prev=?');
        $req->execute(array($Rapport->get_Objet_Rapport_Prev(),$Rapport->get_Email_Honeywell(),$Rapport->get_Email_Expedit(),$Rapport->get_Status(),$Rapport->get_Chemin(),$Rapport->get_idRapport_Prev()));
    }
            
    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }
}
