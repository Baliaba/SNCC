<?php
class Statistque_Manager {
    private $_db;
    
    function __construct($db) {
        $this->set_db($db);
    }
    
    function getStat()
    {
        $All_Stat=array();
        $req=$this->_db->query("SELECT sous_systeme.Nom_SousSysteme AS 'sous_systeme', count(composant.id_composant) AS 'Defauts'"
                . " FROM sous_systeme Inner join composant on sous_systeme.idSous_Systeme=composant.Sous_Systeme_id"
                . "  Inner join suiviequipement on composant.id_composant=suiviequipement.Composant_idComposant WHERE substring(Date_Defaillance,1,4)=substring(now(),1,4) "
                . "group by sous_systeme.idSous_Systeme");
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Stat[]=$donnes;
        }
        return $All_Stat;
    }
    
    function Search_Stat($annees)
    {
        $All_Stat=array();
        $req=$this->_db->prepare("SELECT sous_systeme.Nom_SousSysteme AS 'sous_systeme', count(composant.id_composant) AS 'Defauts'"
                . " FROM sous_systeme Inner join composant on sous_systeme.idSous_Systeme=composant.Sous_Systeme_id"
                . "  Inner join suiviequipement on composant.id_composant=suiviequipement.Composant_idComposant WHERE substring(Date_Defaillance,1,4)=?"
                . "group by sous_systeme.idSous_Systeme");
        $req->execute(array($annees));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Stat[]=$donnes;
        }
        return $All_Stat;
    }
    function CompoBySousSsyt()
    {
        $all_compo=array();
        $req=$this->_db->query("SELECT sous_systeme.Nom_SousSysteme as 'Sous_systeme',count(composant.Nom_Composant) as 'Nombre_Composant' FROM"
                . " sous_systeme Inner Join composant ON sous_systeme.idSous_Systeme=composant.Sous_Systeme_id"
                . " GROUP BY Sous_Systeme_id");
       while($donnees=$req->fetch(PDO::FETCH_ASSOC))
       {
           $all_compo[]=$donnees;
       }
       return $all_compo;
    }
       public function Search_by_Date($date)
    {
        $All_Stat=array();
        $req=$this->_db->prepare("SELECT sous_systeme.Nom_SousSysteme AS 'sous_systeme', count(composant.id_composant) AS 'Defauts'"
                . " FROM sous_systeme Inner join composant on sous_systeme.idSous_Systeme=composant.Sous_Systeme_id"
                . "  Inner join suiviequipement on composant.id_composant=suiviequipement.Composant_idComposant WHERE substring(Date_Defaillance,1,4)=?"
                . "group by sous_systeme.idSous_Systeme");
        $req->execute(array($date));
        while($donnes=$req->fetch(PDO::FETCH_ASSOC))
        {
            $All_Stat[]=$donnes;
        }
        return $All_Stat;
    }

    function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }


}
