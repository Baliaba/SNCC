<?php

class Checklist_APS_Manager 
{   
    private $_db;
    function __construct($db) {
       $this->set_db($db);
    } 
    function Add(ChechListAps_Entity $check)
    {
        $req=$this->_db->prepare("INSERT INTO check_list_aps(Vcc,Vb,Eld,Nbre_Forcage,Observations,Temperature,User_idUser,id_composant,Psu) VALUES(?,?,?,?,?,?,?,?,?)");
        $req->execute(array($check->get_Vcc(),$check->get_Vb(),$check->get_Eld(),$check->get_Nbre_Forcage(),$check->get_Observations(),$check->get_Temperature(),$check->get_User_idUser(),$check->get_id_composant(),$check->get_Psu()));     
    }
     function Delete(ChechListAps_Entity $check) {
        $req_delete=$this->_db->prepare('DELETE FROM check_list_aps WHERE Id_check=?');
        $req_delete->execute(array($check->get_Id_check()));
    }
    function Get_AllasObject()
    {
        $All_check_Sncc=array();
        $req_select1=$this->_db->query('SELECT *FROM  check_list_aps');
     while($donnees=$req_select1->fetch())
    {
          $All_check_Sncc[]=new Checklist_Entity($donnees);
    }
    return  $All_check_Sncc;
    }
    
    function Get_AllasArray()
    {
        $All_check_Sncc=array();
        $req_select1=$this->_db->query('SELECT *FROM  check_list_aps');
        while($donnees=$req_select1->fetch())
       {
             $All_check_Sncc[]=$donnees;
       }
       return  $All_check_Sncc;
    }
    
     public function Search_by_Composant($code)
    {
        $All_Sncc=array();
        $req=$this->_db->prepare('SELECT check_list_aps.*, composant.Nom_Composant FROM check_list_aps
                                    JOIN composant ON check_list_aps.id_composant = composant.id_composant
                                    WHERE composant.Nom_Composant LIKE ?');
        $req->execute(array('%'.$code.'%'));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Sncc[]=$donnes; 
        }
        return $All_Sncc;
    }   
    
    public function Search_by_id($idc)
    {
        $All_Sncc=array();
        $req=$this->_db->prepare('SELECT * FROM check_list_aps WHERE id_composant = ?');
        $req->execute(array($idc));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Sncc[]=$donnes; 
        }
        return $All_Sncc;
    }   
    
    function GetSingle($id)
    {
        $req_select2=$this->_db->prepare('SELECT *FROM check_list_aps WHERE Id_check=?');
        $req_select2->execute(array($id));
        $donnees = $req_select2->fetch( PDO :: FETCH_ASSOC );
        return new CheckList_SNCC_Manager($donnees);
    }
    function Update(ChechListAps_Entity $check)
    {
        $req_update= $this->_db->prepare('UPDATE check_list_aps SET Vcc=?,Vb=?,Eld=?,Nbre_Forcage=?,Observations=?,Temperature=?,User_idUser=?,id_composant=?,Psu=? WHERE Id_check=?');
        $req_update->execute(array($check->get_Vcc(),$check->get_Vb(),$check->get_Eld(),$check->get_Nbre_Forcage(),$check->get_Observations(),$check->get_Temperature(),$check->get_User_idUser(),$check->get_id_composant(),$check->get_Psu(),$check->get_Id_check()));
    }       
    function get_db() {
        return $this->_db;
    }
    function set_db($db) {
        $this->_db = $db;
    }
}