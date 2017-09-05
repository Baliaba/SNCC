<?php
    require '../Include/connect.php';
    require '../Classe/User_Entity.php';
    require '../Classe/Groupe_Entity.php';
    require '../Classe/Poste_entity.php';
    require '../Manager/User_Manager.php';
    require '../Manager/Groupe_Manager.php';
    require '../Manager/Poste_Manager.php';
    
    $groupe_DAL=new Groupe_Manager($db);
    $poste_DAL=new Poste_Manager($db);
    $user_DAL=new User_Manager($db);
    
    //insert Groupe
    if((isset($_POST['Txt_Intitule'],$_POST['Txt_Chaine_Password'], $_POST['Idg'])))
    {
        if((is_string($_POST['Txt_Intitule']))&&(is_string($_POST['Txt_Chaine_Password'])))
        {
            $intitule=$_POST['Txt_Intitule'];
            $chaine=$_POST['Txt_Chaine_Password'];
            $Idg = $_POST['Idg'];
            
            $groupe_DAL->Update(new Groupe_Entity(array('Id_groupe' => $Idg, 'Intitule_groupe' =>$intitule,'Caractere_Masquer_groupe'=>$chaine)));
            $groupes = $groupe_DAL->Get_AllAsArray();
            $data = array('Groupes' => $groupes);
            echo json_encode($data);
        }
        else
        {
            echo 'Veuillez remplir convenablement ces champs !';
        }
    }
    else if((isset($_POST['Txt_Intitule'],$_POST['Txt_Chaine_Password'])))
    {
        if((is_string($_POST['Txt_Intitule']))&&(is_string($_POST['Txt_Chaine_Password'])))
        {
            $intitule=$_POST['Txt_Intitule'];
            $chaine=$_POST['Txt_Chaine_Password'];
            $groupe_DAL->Add(new Groupe_Entity(array('Intitule_groupe' =>$intitule,'Caractere_Masquer_groupe'=>$chaine)));
            $groupes = $groupe_DAL->Get_AllAsArray();
            echo $groupes[sizeof($groupes)-1]['Id_groupe'];
        }
        else
        {
            echo 'Veuillez remplir convenablement ces champs !';
        }
    }
    else if(isset($_POST['Txt_Poste'])) //Insert poste
    {
        $poste=$_POST['Txt_Poste'];
        $poste_DAL->Add(new Poste_entity(array('titre_poste'=>$poste)));
        $postes = $poste_DAL->getAllAsArray();
        echo $postes[sizeof($postes)-1]['id_Poste'];
    }
    else if(isset($_GET['search']))
    { 
        $users = NULL;
        $name = $_GET['search'];
        
        if(empty($_GET['search'])){
            $users = $user_DAL->Get_AllAsArray();
        }
        else{
            $users = $user_DAL->Search_User_By_Name($name);
        }
        for($i=0; $i<sizeof($users); $i++) 
        {
            $users[$i]['Groupe_Id_'] = $groupe_DAL->Get_Single(intval($users[$i]['Groupe_Id_']))->get_Intitule_groupe();
            $users[$i]['Poste_id'] = $poste_DAL->getSingle(intval($users[$i]['Poste_id']))->get_titre_poste();
        }
        $data = array('Users' => $users);
        echo json_encode($data);
    } 
    else if(isset($_POST['Delete_Poste']))
    {
        $poste = $poste_DAL->getSingle(intval($_POST['Delete_Poste']));
        $poste_DAL->Delete($poste);
        $postes = $poste_DAL->getAllAsArray();
        $data = array('Postes' => $postes);
        echo json_encode($data);
    }
    else if(isset($_POST['Delete_Groupe']))
    {
        $groupe = $groupe_DAL->Get_Single(intval($_POST['Delete_Groupe']));
        $groupe_DAL->Delete($groupe);
        $groupes = $groupe_DAL->Get_AllAsArray();
        $data = array('Groupes' => $groupes);
        echo json_encode($data);
    }
    else if(isset($_POST['Delete_User']))
    {
        $user = $user_DAL->Get_Single(intval($_POST['Delete_User']));
        $user_DAL->Delete($user);
        $users = $user_DAL->Get_AllAsArray();
        for($i=0; $i<sizeof($users); $i++) 
        {
            $users[$i]['Groupe_Id_'] = $groupe_DAL->Get_Single(intval($users[$i]['Groupe_Id_']))->get_Intitule_groupe();
            $users[$i]['Poste_id'] = $poste_DAL->getSingle(intval($users[$i]['Poste_id']))->get_titre_poste();
        }
        $data = array('Users' => $users);
        echo json_encode($data);
    }
    else
    {
       $users = $user_DAL->Get_AllAsArray();
       $postes = $poste_DAL->getAllAsArray();
       $groupes = $groupe_DAL->Get_AllAsArray();
       
        for($i=0; $i<sizeof($users); $i++) 
        {
            $users[$i]['Groupe_Id_'] = $groupe_DAL->Get_Single(intval($users[$i]['Groupe_Id_']))->get_Intitule_groupe();
            $users[$i]['Poste_id'] = $poste_DAL->getSingle(intval($users[$i]['Poste_id']))->get_titre_poste();
        }
        
       $data = array('Users' => $users, 'Postes' => $postes, 'Groupes' => $groupes);
       echo json_encode($data);
    }
?>

