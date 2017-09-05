<?php
class Composant_Manager 
{
    //put your code here
     private $_db;
    function __construct($db) {
       $this->set_db($db);
    }
    
    function Add(Composant_Entity $compo)
    {
        $req=$this->_db->prepare("INSERT INTO composant(Nom_Composant,Date_MiseEnService_composant,Stock_Initial_composant,Sous_Systeme_id) VALUES(?,?,?,?)");
        $req->execute(array($compo->get_Nom_Composant(),$compo->get_Date_MiseEnService_composant(),$compo->get_Stock_Initial_composant(),$compo->get_Sous_Systeme_id()));     
    }
     function Delete(Composant_Entity $compo) {
        $req_delete=$this->_db->prepare('DELETE FROM composant WHERE id_composant=?');
        $req_delete->execute(array($compo->get_id_composant()));
    }
    function Get_AllAsObject()
    {
        $All_Composant=array();
        $req_select1=$this->_db->query('SELECT *FROM composant');
     while($donnees=$req_select1->fetch())
    {
         $All_Composant[]=new Composant_Entity($donnees);
    }
    return $All_Composant;
    }
    
    function Get_AllAsArray()
    {
        $All_Composant=array();
        $req_select1=$this->_db->query('SELECT *FROM composant');
        while($donnees=$req_select1->fetch(PDO::FETCH_ASSOC))
        {
            $All_Composant[]= $donnees;
        }
        return $All_Composant;
    }
    
    function GetSingle($id)
    {
        $req_select2=$this->_db->prepare('SELECT *FROM composant WHERE id_composant=?');
        $req_select2->execute(array($id));
        $donnees = $req_select2->fetch( PDO :: FETCH_ASSOC );
        return new Composant_Entity($donnees);
    }
    function Update(Composant_Entity $compo)
    {
        $req_update= $this->db->prepare('UPDATE composant SET Nom_Composant=?,Date_MiseEnService_composant=?,Stock_Initial_composant=? '
                . 'Sous_Systeme_id=? WHERE id_composant=?' );
        $req_update->execute(array($compo->get_Nom_Composant(),$compo->get_Date_MiseEnService_composant(),$compo->get_Stock_Initial_composant(),$compo->get_Sous_Systeme_id(),$compo->get_id_composant()));
    }
            
    function get_db() {
        return $this->_db;
    }
    function set_db($db) {
        $this->_db = $db;
    }
  }
?>