<?php
    session_start();
    
    require '../../Code/Include/connect.php';
    require '../Classe/Sousyst_Entity.php';
    require '../Classe/Composant_Entity.php';
    require '../Classe/Checklist_Entity.php';
    require '../Manager/ssSyteme_Manager.php';
    require '../Manager/Composant_Manager.php';
    require '../Manager/CheckList_SNCC_Manager.php';
    require '../Manager/User_Manager.php';
    
    //$sous_sys=new Sousyst_Entity();
    $SsSys_DAL=new ssSyteme_Manager($db);
    $composant_DAL=new Composant_Manager($db);
    $Chk_SNCC_Dal=new CheckList_SNCC_Manager($db);
    $User_Man = new User_Manager($db);
    
    function reverse($chaine)
    {
        return substr($chaine,6,10).substr($chaine,2,3). '/'.substr($chaine,0,2);
    }
        
    if(isset($_POST['Sous_Sys_Name']))
    {
        $nom=$_POST['Sous_Sys_Name'];
        $SsSys_DAL->Add(new Sousyst_Entity(array('Nom_SousSysteme'=>$nom)));
        echo 'Success';
    }
    else if(isset($_POST['Composant']))
    {
        $data = json_decode($_POST['Composant'], true); 
        $composant_DAL->Add(new Composant_Entity(array('Sous_Systeme_id'=>$data['Sous_Sys'],'Nom_Composant'=>$data['Nom'],'Date_MiseEnService_composant'=>  reverse($data['Date']),'Stock_Initial_composant'=>$data['Stock'])));
        echo "Success";
    }
    else if(isset($_POST['Choix_Composant'],$_POST['Txt_Statut'],$_POST['Txt_Etat_Power'],$_POST['Txt_Etat_Battery'],$_POST['Txt_Etat_Cf9'],$_POST['Txt_Etat_Sync'],$_POST['Txt_Etat_Psu'],$_POST['Txt_Observation']))
    {
         $composant=$_POST['Choix_Composant'];
         $statut=$_POST['Txt_Statut'];
         $power=$_POST['Txt_Etat_Power'];
         $batterie=$_POST['Txt_Etat_Battery'];
         $CF9=$_POST['Txt_Etat_Cf9'];
         $sync=$_POST['Txt_Etat_Sync'];
         $psu=$_POST['Txt_Etat_Psu'];
         $observ=$_POST['Txt_Observation'];
         
         //Rech Id_composant
         
         $Id_composant=0;
         $all_compos=$composant_DAL->Get_All();
         $user_id=2;
         for($i=0;$i<sizeof($all_compos);$i++)
         {
             if(strcmp($all_compos[$i]->get_Nom_Composant(),$composant)==0)
             {
                 $Id_composant=$all_compos[$i]->get_id_composant();
             }
         }
         $Chk_SNCC_Dal->Add(new Checklist_Entity(array('Status'=>$statut,'Etat_Power'=>$power,'Etat_Battery'=>$power,'Etat_CF9'=>$cf9,'Etat_Sync'=>$sync,'Etat_PSU'=>$psu,'Observation'=>$observ,'Composant_id'=>$Id_composant,'User_id'=>$user_id)));
    }
    else if(isset($_GET['get_sous_systeme']))
    {
        $ss = $SsSys_DAL->Get_AllAsArray();
        $data = array('ss' => $ss);
        echo json_encode($data);
    }
    else if(isset($_GET['get_composant']))
    {
        $cps = $composant_DAL->Get_AllAsArray();
        $data = array('Composant' => $cps);
        echo json_encode($data);
    }
    else if(isset($_GET['get_user']))
    {
        $users = $User_Man->Get_AllAsArray();
        $data = array('Users' => $users);
        echo json_encode($data);
    }
    else if(isset($_POST['test_group']))
    {
        if((strcmp($_SESSION['Group_Id'],'1')==0 || strcmp($_SESSION['Group_Id'],'4')==0))
            echo '0';
        else
            echo '1';
    }