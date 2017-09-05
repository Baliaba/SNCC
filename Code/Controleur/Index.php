<?php
session_start();

require '../Include/connect.php';
require '../Classe/User_Entity.php';
require '../Classe/Groupe_Entity.php';
require '../Classe/Poste_entity.php';
require '../Manager/User_Manager.php';
require '../Manager/Groupe_Manager.php';
require '../Manager/Poste_Manager.php';
    
$User_Man=new User_Manager($db);
$poste_DAL=new Poste_Manager($db);
$groupe_DAL=new Groupe_Manager($db);
 
    if(isset($_POST['Inscription']))
    {
        $data = json_decode($_POST['Inscription'], true); 
        $User_Man->Add(new User_Entity(array('Nom_user'=>$data['Name'],'Login'=>$data['User'],'mot_de_passe'=>$data['Pasw'],'Groupe_Id_'=>$data['Groupe'],'Poste_id'=>$data['Poste'])));
        echo 'Success';
    }
    else if(isset($_POST['User_Name'],$_POST['Password'], $_POST['Remind']))
    {
        $user_name=$_POST['User_Name'];
        $pass=$_POST['Password'];
        $remind = intval($_POST['Remind']);
        $cpt=0;
        //Recherche du user
        $Current_User=new User_Entity(array());
        $all_users=$User_Man->Get_AllAsObject();
        for($i=0;$i<sizeof($all_users);$i++)
        {
            if(strcmp($user_name, $all_users[$i]->get_Login())==0 && strcmp($pass,$all_users[$i]->get_mot_de_passe())==0)
            {
                $Current_User=new User_Entity(array('idUser'=>$all_users[$i]->get_idUser(),
                    'Login'=>$all_users[$i]->get_Login(),'mot_de_passe'=>$all_users[$i]->get_mot_de_passe(),
                    'Groupe_Id_'=>$all_users[$i]->get_Groupe_Id_(),'Poste_id'=>$all_users[$i]->get_Poste_id(),'Nom_user'=>$all_users[$i]->get_Nom_user()));
            }
        }
        if($Current_User->get_Login()==NULL){
            echo 'Fail';
        }
        else
        {
            $_SESSION['Id'] = $Current_User->get_idUser();
            $_SESSION['Name'] = $Current_User->get_Nom_user();
            $_SESSION['Group_Id']=$Current_User->get_Groupe_Id_();
            
            if($remind === 1)
            {
                setcookie('Login', $user_name, time()*7*24*3600, null, null, false, true);
                setcookie('Password', $pass, time()*7*24*3600, null, null, false, true);
            }
            echo 'Success';  
        }
    }
    else if(isset($_GET['Cookie']))
    {
        if(isset($_COOKIE['Login'], $_COOKIE['Password']))
        {
            echo '{"Login":"'.$_COOKIE['Login'].'", "Password":"'.$_COOKIE['Password'].'"}';
        }
        echo '';
    }
    else 
    {
        $postes = $poste_DAL->getAllAsArray();
        $groupes = $groupe_DAL->Get_AllAsArray();
        $data = array('Postes' => $postes, 'Groupes' => $groupes);
        echo json_encode($data);
    }
    
   
?>
