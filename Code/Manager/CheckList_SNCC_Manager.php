<?php
class CheckList_SNCC_Manager 
{
    private $_db;
    function __construct($db) {
       $this->set_db($db);
    }
    
    function Add(Checklist_Entity $check)
    {
        $req=$this->_db->prepare("INSERT INTO check_list_sncc(Status,Etat_Power,Etat_Battery,Etat_CF9,Etat_Sync,Etat_PSU,Observation,Composant_id,User_id) VALUES(?,?,?,?,?,?,?,?,?)");
        $req->execute(array($check->get_Status(),$check->get_Etat_Power(),$check->get_Etat_Battery(),$check->get_Etat_CF9(),$check->get_Etat_Sync(),$check->get_Etat_PSU(),$check->get_Observation(),$check->get_Composant_id(),$check->get_User_id()));     
    }
     function Delete(Checklist_Entity $check) {
        $req_delete=$this->_db->prepare('DELETE FROM check_list_sncc WHERE idCheck_List_SNCC=?');
        $req_delete->execute(array($check->get_idCheck_List_SNCC()));
    }
    function Get_AllAsObject()
    {
        $All_check_Sncc=array();
        $req_select1=$this->_db->query('SELECT *FROM check_list_sncc');
        while($donnees=$req_select1->fetch())
       {
             $All_check_Sncc[] =new Checklist_Entity($donnees);
       }
       return  $All_check_Sncc;
    }
    
    function Get_AllAsArray()
    {
        $All_check_Sncc=array();
        $req_select1=$this->_db->query('SELECT *  FROM check_list_sncc');
        while($donnees=$req_select1->fetch())
       {
             $All_check_Sncc[] = $donnees;
       }
       return  $All_check_Sncc;
    }
    
    public function Search_by_Composant($code)
    {
        $All_Sncc=array();
        $req=$this->_db->prepare('SELECT check_list_sncc.*, composant.Nom_Composant FROM check_list_sncc 
                                    JOIN composant ON check_list_sncc.Composant_id = composant.id_composant
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
        $req=$this->_db->prepare('SELECT * FROM check_list_sncc WHERE Composant_id = ?');
        $req->execute(array($idc));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Sncc[]=$donnes; 
        }
        return $All_Sncc;
    }   
    
    function GetSingle($id)
    {
        $req_select2=$this->_db->prepare('SELECT *FROM check_list_sncc WHERE idCheck_List_SNCC=?');
        $req_select2->execute(array($id));
        $donnees = $req_select2->fetch( PDO :: FETCH_ASSOC );
        return new CheckList_SNCC_Manager($donnees);
    }
    function Update(Checklist_Entity $check)
    {
        $req_update= $this->_db->prepare('UPDATE check_list_sncc SET Status=?,Etat_Power=?,Etat_Battery=?,Etat_CF9=?,Etat_Sync=?,Etat_PSU=?,Observation=?,Composant_id=?,User_id=? WHERE idCheck_List_SNCC=?');
        $req_update->execute(array($check->get_Status(),$check->get_Etat_Power(),$check->get_Etat_Battery(),$check->get_Etat_CF9(),$check->get_Etat_Sync(),$check->get_Etat_PSU(),$check->get_Observation(),$check->get_Composant_id(),$check->get_User_id(),$check->get_idCheck_List_SNCC()));
    }
            
    function get_db() {
        return $this->_db;
    }
    function set_db($db) {
        $this->_db = $db;
    }
}