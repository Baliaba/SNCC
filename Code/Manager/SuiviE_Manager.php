<?php
class SuiviE_Manager {
    //put your code here
    
    private $_db;
    function __construct($db) {
        $this->set_db($db);
    }
    
    public function Add( Suivi_Equip_Entity $Suiv)
    {
        $req=$this->_db->prepare('INSERT INTO suiviequipement(Fonction,Date_Defaillance,Nature_Defaillance,Causes,Effets,Detection,Code_Erreur,Action_Curative,Nom_de_Intervenant,Composant_idComposant,User_idUser,Date_Remise_Service) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
        $req->execute(array($Suiv->get_function_suiviE(),$Suiv->get_date_defaill_suiviE(),$Suiv->get_nature_deffaill_suivie(),$Suiv->get_cause_defaill_suiviE(),$Suiv->get_effet_suiviE(),$Suiv->get_detection_suiviE(),$Suiv->get_code_erreur_suiviE(),$Suiv->get_action_curative_suiviE(),$Suiv->get_nom_intervenant_suiviE(),$Suiv->get_id_composant_suiviE(),$Suiv->get_id_user_suiviE(),$Suiv->get_date_remise_en_service_suiviE()));  
    }   
    public function GetSingle($id)
    {
      $req=$this->_db->prepare('SELECT *FROM suiviequipement WHERE idSuiviEquipement=?');
      $req->execute(array($id));
              
    }
    public function Delete(Suivi_Equip_Entity $suiv)
    {
        $req=$this->_db->prepare('DELETE FROM suiviequipement WHERE idSuiviEquipement=?');
        $req->execute(array($suiv->get_id_suiviE()));
    }
    public function Get_AllasObject()
    {
      $All_Suiv=array();
     $req_select1=$this->_db->query('SELECT *FROM suiviequipement');
     while ($donnees=$req_select1->fetch(PDO::FETCH_ASSOC)){
         $All_Suiv[]=new User_Entity($donnees);
     }
     return $All_Suiv;
    }
    public function Get_AllassArray()
    {
        $All_Suiv=array();
        $req_select1=$this->_db->query('SELECT *FROM suiviequipement');
        while ($donnees=$req_select1->fetch(PDO::FETCH_ASSOC)){
            $All_Suiv[]=$donnees;
        }
        return $All_Suiv;
    }
    
    public function Update(Suivi_Equip_Entity $suiv)
    {
        $req_update=  $this->_db->prepare('UPDATE suiviequipement SET Fonction=?,Date_Defaillance=?,Nature_Defaillance=?,Causes=?,Effets=?,Detection=?,Code_Erreur=?,Action_Curative=?,Nom_de_Intervenant=?,Composant_idComposant=?,User_idUser=?,Date_Remise_Service=? WHERE idSuiviEquipement=?');
        $req_update->execute(array($suiv->get_function_suiviE(),$suiv->get_date_defaill_suiviE(),$suiv->get_nature_deffaill_suivie(),
            $suiv->get_cause_defaill_suiviE(),$suiv->get_effet_suiviE(),$suiv->get_detection_suiviE(),$suiv->get_code_erreur_suiviE(),
            $suiv->get_action_curative_suiviE(),$suiv->get_nom_intervenant_suiviE(),$suiv->get_id_composant_suiviE(),$suiv->get_id_user_suiviE(),
            $suiv->get_date_remise_en_service_suiviE(),$suiv->get_id_suiviE()));
    }
    
    public function Seach_by_Code($code)
    {
        $All_Suivi=array();
        $req=$this->_db->prepare('SELECT * FROM suiviequipement WHERE Code_Erreur LIKE ?');
        $req->execute(array('%'.$code.'%'));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Suivi[]=$donnes; 
        }
        return $All_Suivi;
    }   
    
    public function Seach_by_Code_And_Composant($idc, $code)
    {
        $All_Suivi=array();
        $req=$this->_db->prepare('SELECT * FROM suiviequipement WHERE Composant_idComposant = ? AND Code_Erreur LIKE ?');
        $req->execute(array($idc, '%'.$code.'%'));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Suivi[]=$donnes; 
        }
        return $All_Suivi;
    }   
    
    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }


}
