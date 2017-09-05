<?php
session_start();

require '../Include/connect.php';
require '../Classe/Checklist_Entity.php';
require '../Classe/Composant_Entity.php';
require '../Classe/User_Entity.php';
require '../Manager/CheckList_SNCC_Manager.php';
require '../Manager/Composant_Manager.php';
require '../Manager/User_Manager.php';

$snccDal = new CheckList_SNCC_Manager($db);
$cpsDal = new Composant_Manager($db);
$userDal = new User_Manager($db);

if(isset($_GET['search'], $_GET['idc']))
{
    $search = $_GET['search'];
    $idc = intval($_GET['idc']);
    $snccs = NULL;
    
    if($idc > 0)
    {
        $snccs = $snccDal->Search_by_id($idc);
    }
    else 
    {
        if(empty($search))
        {
            $snccs = $snccDal->Get_AllAsArray();
        }
        else
        {
            $snccs = $snccDal->Search_by_Composant($search);
        }
    }
    for($i=0; $i<sizeof($snccs); $i++) 
    {
        $snccs[$i]['User_id'] = $userDal->Get_Single(intval($snccs[$i]['User_id']))->get_Nom_user();
    }
    $data = array('Snccs' => $snccs);
    echo json_encode($data);
}
else if(isset($_GET['get_sncc']))
{
    $ids = intval($_GET['get_sncc']);
    $snccs = NULL; $data = NULL;
    
    $snccs = $snccDal->Get_AllAsArray();
    
    for($i=0; $i<sizeof($snccs); $i++) 
    {
        if(intval($snccs[$i]['idCheck_List_SNCC']) == $ids){
            $data = $snccs[$i];
            break;
        }
    }
    
    echo json_encode($data);
}
else if(isset($_POST['Sncc']))
{
    $value = json_decode($_POST['Sncc'], true);
    
    $snccDal->Update(new Checklist_Entity(array(
                                                'idCheck_List_SNCC' => $value['Id'],
                                                'Composant_id' => $value['Composant'],
                                                'Status' => $value['Statut'],
                                                'Etat_Power' => $value['Etat_Power'],
                                                'Etat_Battery' => $value['Etat_Battery'],
                                                'Etat_CF9' => $value['Etat_Cf9'],
                                                'Etat_Sync' => $value['Etat_Sync'],
                                                'Etat_PSU' => $value['Etat_Psu'],
                                                'Observation' => $value['Observation'],
                                                'User_id' => $_SESSION['Id'],
                                            )));
    $snccs = $snccDal->Get_AllAsArray();
    for($i=0; $i<sizeof($snccs); $i++) 
    {
        $snccs[$i]['User_id'] = $userDal->Get_Single(intval($snccs[$i]['User_id']))->get_Nom_user();
    }
    $data = array('Snccs' => $snccs);
    echo json_encode($data);
}
else if(isset($_GET['delete']))
{
    $idcs = intval($_GET['delete']);
    
    $snccDal->Delete(new Checklist_Entity(array( 'idCheck_List_SNCC' => $idcs)));
    $snccs = $snccDal->Get_AllAsArray();
    for($i=0; $i<sizeof($snccs); $i++) 
    {
        $snccs[$i]['User_id'] = $userDal->Get_Single(intval($snccs[$i]['User_id']))->get_Nom_user();
    }
    $data = array('Snccs' => $snccs);
    echo json_encode($data);
}