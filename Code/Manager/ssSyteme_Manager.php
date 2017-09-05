<?php
class ssSyteme_Manager 
{
    private $_db;

    function __construct($db) {
        $this->set_db($db);
    }
    public function Add(Sousyst_Entity $ssyst) {
        $req_insert=$this->_db->prepare("INSERT INTO sous_systeme (Nom_SousSysteme) VALUES (?)");
        $req_insert->execute(array($ssyst->get_Nom_SousSysteme()));
    }

    public function Delete(Sousyst_Entity $ssyst) {
        $req_delete = $this->_db->prepare('DELETE FROM sous_systeme WHERE idSous_Systeme=?');
        $req_delete->execute(array($ssyst->get_idSous_Systeme()));
    }

    public function Get_AllAsobject() {
        $All_SousSyst=array();
        $req_select = $this->_db->query('SELECT * FROM sous_systeme');
        while($donnees = $req_select->fetch())
        {   
            $All_SousSyst[]=new Sousyst_Entity($donnees);
        }
          return $All_SousSyst;
    }
    public function Get_AllAsArray()
    {
        $All_SousSyst=array();
        $req_select = $this->_db->query('SELECT * FROM sous_systeme');
        while($donnees = $req_select->fetch(PDO::FETCH_ASSOC))
        {   
            $All_SousSyst[]= $donnees;
        }
        return $All_SousSyst;
    }
    public function Get_Single($id) {
        $req_select2 = $this->_db->prepare('SELECT *FROM sous_systeme WHERE idSous_Systeme=?');
        $req_select2->execute(array($id));
        $donnees = $req_select2->fetch(PDO :: FETCH_ASSOC);
        return new Sousyst_Entity($donnees);
    }
    public function Update(Sousyst_Entity $ssyst) {
        $req_update = $this->db->prepare('UPDATE sous_systeme SET Nom_Sous_Systeme=?  WHERE idSous-Systeme=?');
        $req_update->execute(array($ssyst->get_nom(),$ssyst->get_idSous_Systeme()));
    }
    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }
}