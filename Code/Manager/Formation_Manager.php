<?php
class Formation_Manager {
    
    private $_db;
    
    public function __construct($_db) {
        $this->set_db($_db);
    }
    public function Add(Formation_Entity $form)
    {
        $req=$this->_db->prepare("INSERT INTO formation (Intitule_form,Date_debut_form,date_fin_form,objet_form,Compte_rendu_form,id_user)VALUES(?,?,?,?,?,?)");
        $req->execute(array($form->get_Intitule_form(),$form->get_Date_debut_form(),$form->get_date_fin_form(),$form->get_objet_form(),$form->get_Compte_rendu_form(),$form->get_id_user())); 
    }
    public function Get_AllasArray()
    {
        $All_Formations=array();
        $req=$this->_db->query('SELECT * FROM formation');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Formations[]=$donnees;
        }
        return $All_Formations;  
    }
    
    public function Get_AllasObject()
    {
          $All_Formations=array();
        $req=$this->_db->query('SELECT *FROM formation');
        while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Formations[]=new Formation_Entity($donnees);
        }
        return $All_Formations;  
    }
    
    public function Search_by_Intitule($intitule)
    {
        $All_Formation=array();
        $req=$this->_db->prepare('SELECT * FROM formation WHERE Intitule_form LIKE ?');
        $req->execute(array('%'.$intitule.'%'));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
           $All_Formation[]=$donnes; 
        }
        return $All_Formation;
    }
    
    public function Get_Single($id)
    {
        $req=$this->_db->prepare("SELECT * FROM formation WHERE Id_form=?");
        $req->execute(array($id));
        $donnees=$req->fetch(PDO::FETCH_ASSOC);
        return new Formation_Entity($donnees);
    }
    public function Delete(Formation_Entity $form)
    {
        $req=$this->_db->prepare('DELETE FROM formation WHERE Id_form=?');
        $req->execute(array($form->get_Id_form()));
    }
    public function Update(Formation_Entity $form)
    {
        $req=$this->_db->prepare('UPDATE formation SET Intitule_form=?,Date_debut_form=?,date_fin_form=?,objet_form=?,Compte_rendu_form=?,id_user=? WHERE Id_form=?');
        $req->execute(array($form->get_Intitule_form(),$form->get_Date_debut_form(),$form->get_date_fin_form(),$form->get_objet_form(),$form->get_Compte_rendu_form(),$form->get_id_user(), $form->get_Id_form()));
    }
        function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }


}
