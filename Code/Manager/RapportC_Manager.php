<?php
class RapportC_Manager {
    //put your code here
    private $_db;
   
    public function __construct($db) {
        $this->set_db($db);
    }
    
    public function Add(Rcuratif_Entity $Rap)
    {
        $req=$this->_db->prepare("INSERT INTO rapport_curatif (Date_Rapport_Cur,Objet_Rapport_Cur,Chemin_Fichier,Email_Honeywell,Email_Expedit,Status,SuiviEquipement_id) VALUES (NOW(),?,?,?,?,?,?)");
        $req->execute(array($Rap->get_Objet_Rapport_Cur(),$Rap->get_Chemin_Fichier(),$Rap->get_Email_Honeywell(),$Rap->get_Email_Expedit(),$Rap->get_Status(),$Rap->get_SuiviEquipement_id()));
    }
    public function Get_AllasObject()
    {
         $All_Rapport=array();
        $req=$this->_db->query('SELECT *FROM rapport_curatif');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Rapport[]=new Rcuratif_Entity($donnees);
        }
        return $All_Rapport;
    }
    public function Get_AllasArray()
    {
        $All_Rapport=array();
        $req=$this->_db->query('SELECT *FROM rapport_curatif');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Rapport[]=$donnees;
        }
        return $All_Rapport;
    }
    
    public function Search_by_Code($date)
    {
        $All_Curatif=array();
        $req=$this->_db->prepare('SELECT * FROM rapport_curatif WHERE Date_Rapport_Cur LIKE ?');
        $req->execute(array('%'.$date.'%'));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Curatif[]=$donnes; 
        }
        return $All_Curatif;
    }
    
    public function getSingle($id)
    {
        $req=$this->_db->prepare('SELECT *FROM rapport_curatif WHERE id_Rapport_Curatif=?');
        $req->execute(array($id));
        $donnees=$req->fetch(PDO::FETCH_ASSOC);
        return  new Rcuratif_Entity($donnees);
    }
    public function Delete(Rcuratif_Entity $Rapport)
    {
        $req=$this->_db->prepare('DELETE FROM rapport_curatif  WHERE id_Rapport_Curatif=?');
        $req->execute(array($Rapport->get_id_Rapport_Curatif()));
    }
    public function Update(Rcuratif_Entity $Rapport)
    {
        $req=$this->_db->prepare('UPDATE rapport_curatif SET Date_Rapport_Cur=NOW(),Objet_Rapport_Cur=?,Chemin_Fichier=?,Email_Honeywell=?,Email_Expedit=?,Status=?,SuiviEquipement_id=? WHERE id_Rapport_Curatif=?');
        $req->execute(array($Rapport->get_Objet_Rapport_Cur(),$Rapport->get_Chemin_Fichier(),$Rapport->get_Email_Honeywell(),$Rapport->get_Email_Expedit(),$Rapport->get_Status(),$Rapport->get_SuiviEquipement_id(),$Rapport->get_id_Rapport_Curatif()));        
    }
    public function get_db() {
        return $this->_db;
    }

    public function set_db($_db) {
        $this->_db = $_db;
    }   
}
?>
