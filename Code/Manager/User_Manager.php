<?php
 class User_Manager 
{
    private $_db; //Instance PDO
    
    function __construct($_db) {
        $this->set_db($_db);
    }

    public function Add(User_Entity $user ) 
    {
        $req_insert=$this->_db->prepare('INSERT INTO user(Login, mot_de_passe, Nom_user, Groupe_Id_, Poste_id)VALUES(?,?,?,?,?)');
        $req_insert->execute(array($user->get_Login(),$user->get_mot_de_passe(),$user->get_Nom_user(),$user->get_Groupe_Id_(),$user->get_Poste_id()));
    }

    public function Delete(User_Entity $user) {
        $req_delete=$this->_db->prepare('DELETE FROM user WHERE idUser=?');
        $req_delete->execute(array($user->get_idUser()));
    }

    public function Get_AllAsObject()
    {
         $All_User=array();
     $req_select1=$this->_db->query('SELECT *FROM user');
     while ($donnees=$req_select1->fetch(PDO::FETCH_ASSOC)){
         $All_User[]=new User_Entity($donnees);
     }
     return $All_User;
    }
    
    public function Get_AllAsArray()
    {
         $All_User=array();
        $req_select1=$this->_db->query('SELECT *FROM user');
        while ($donnees=$req_select1->fetch()){
            $All_User[]=$donnees;
        }
        return $All_User;
    }
    
    public function Search_User_By_Name($name)
    {
        $All_User=array();
        $req_select1=$this->_db->prepare('SELECT * FROM user WHERE Nom_user LIKE ?');
        $req_select1->execute(array('%'.$name.'%'));
        while ($donnees=$req_select1->fetch(PDO::FETCH_ASSOC)){
            $All_User[]=$donnees;
        }
        return $All_User;
    }
    
    public function Get_Single($id) {
        $req_select2=$this->_db->prepare('SELECT *FROM user WHERE idUser=?');
        $req_select2->execute(array($id));
        $donnees = $req_select2->fetch (PDO::FETCH_ASSOC);
        return new User_Entity($donnees);
    }

    public function Update(User_Entity $user) {
        $req_update=  $this->db->prepare('UPDATE user SET'
                . 'Login=? ,mot_de_passe=?,Nom_user=?,Groupe_Id=?,Poste_id=? WHERE idUser=?');
        $req_update->execute(array($user->get_login_user(),$user->get_pass_user(),$user->get_Nom_user(),$user->get_groupe_id(),$user->get_poste_id(),$user->get_id_user()));
    }
     function get_db() {
        return $this->_db;
    }

    function set_db($_db) {
        $this->_db = $_db;
    }
}
