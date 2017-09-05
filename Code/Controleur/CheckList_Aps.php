<?php
session_start();

require '../Include/connect.php';
require '../Classe/ChechListAps_Entity.php';
require '../Classe/Composant_Entity.php';
require '../Classe/User_Entity.php';
require '../Manager/Checklist_APS_Manager.php';
require '../Manager/Composant_Manager.php';
require '../Manager/User_Manager.php';

$apsDal = new Checklist_APS_Manager($db);
$cpsDal = new Composant_Manager($db);
$userDal = new User_Manager($db);

if(isset($_GET['search'], $_GET['idc']))
{
    $search = $_GET['search'];
    $idc = intval($_GET['idc']);
    $apss = NULL;
    
    if($idc > 0)
    {
        $apss = $apsDal->Search_by_id($idc);
    }
    else 
    {
        if(empty($search))
        {
            $apss = $apsDal->Get_AllasArray();
        }
        else
        {
            $apss = $apsDal->Search_by_Composant($search);
        }
    }
    for($i=0; $i<sizeof($apss); $i++) 
    {
        $apss[$i]['User_idUser'] = $userDal->Get_Single(intval($apss[$i]['User_idUser']))->get_Nom_user();
    }
    $data = array('Apss' => $apss);
    echo json_encode($data);
}
else if(isset($_GET['get_aps']))
{
    $ida = intval($_GET['get_aps']);
    $apss = NULL; $data = NULL;
    
    $apss = $apsDal->Get_AllasArray();
    
    for($i=0; $i<sizeof($apss); $i++) 
    {
        if(intval($apss[$i]['Id_check']) == $ida){
            $data = $apss[$i];
            break;
        }
    }
    
    echo json_encode($data);
}
else if(isset($_POST['Aps']))
{
    $value = json_decode($_POST['Aps'], true);
    
    $apsDal->Update(new ChechListAps_Entity(array(
                                                'Id_check' => $value['Id'],
                                                'id_composant' => $value['Composant'],
                                                'Temperature' => $value['Temperature'],
                                                'Vcc' => $value['Vcc'],
                                                'Vb' => $value['Vb'],
                                                'Eld' => $value['Eld'],
                                                'Psu' => $value['Etat_Psu'],
                                                'Nbre_Forcage' => $value['NbForcage'],
                                                'Observations' => $value['Observation'],
                                                'User_idUser' => $_SESSION['Id'],
                                            )));
    $apss = $apsDal->Get_AllasArray();
    for($i=0; $i<sizeof($apss); $i++) 
    {
        $apss[$i]['User_idUser'] = $userDal->Get_Single(intval($apss[$i]['User_idUser']))->get_Nom_user();
    }
    $data = array('Apss' => $apss);
    echo json_encode($data);
}
else if(isset($_GET['delete']))
{
    $idca = intval($_GET['delete']);
    
    $apsDal->Delete(new ChechListAps_Entity(array( 'Id_check' => $idca)));
    $apss = $apsDal->Get_AllasArray();
    for($i=0; $i<sizeof($apss); $i++) 
    {
        $apss[$i]['User_idUser'] = $userDal->Get_Single(intval($apss[$i]['User_idUser']))->get_Nom_user();
    }
    $data = array('Apss' => $apss);
    echo json_encode($data);
}