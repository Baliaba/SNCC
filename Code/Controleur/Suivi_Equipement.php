<?php
session_start();

require '../Include/connect.php';
require '../Classe/Suivi_Equip_Entity.php';
require '../Classe/User_Entity.php';
require '../Manager/SuiviE_Manager.php';
require '../Manager/User_Manager.php';

$suivi_DAL = new SuiviE_Manager($db);
$user_DAL = new User_Manager($db);

if(isset($_GET['search'], $_GET['idc']))
{
    $search = $_GET['search'];
    $idc = intval($_GET['idc']);
    $suivis = NULL;
    
    if($idc > 0)
    {
        if(empty($search))
        {
            $suivis = $suivi_DAL->Seach_by_Code_And_Composant($idc, '');
        }
        else
        {
            $suivis = $suivi_DAL->Seach_by_Code_And_Composant($idc, $search);
        }
    }
    else 
    {
        if(empty($search))
        {
            $suivis = $suivi_DAL->Get_AllassArray();
        }
        else
        {
            $suivis = $suivi_DAL->Seach_by_Code($search);
        }
    }
    for($i=0; $i<sizeof($suivis); $i++) 
    {
        $suivis[$i]['Nom_de_Intervenant'] = $user_DAL->Get_Single(intval($suivis[$i]['Nom_de_Intervenant']))->get_Nom_user();
    }
    $data = array('Suivis' => $suivis);
    echo json_encode($data);
}
else if(isset($_GET['get_suv']))
{
    $ids = intval($_GET['get_suv']);
    $suvs = NULL; $data = NULL;
    
    $suvs = $suivi_DAL->Get_AllassArray();
    
    for($i=0; $i<sizeof($suvs); $i++) 
    {
        if(intval($suvs[$i]['idSuiviEquipement']) == $ids){
            $data = $suvs[$i];
            break;
        }
    }
    
    echo json_encode($data);
}
else if(isset($_POST['Suivi']))
{
    $suivi = json_decode($_POST['Suivi'], true); 
    
    $suivi_DAL->Update(new Suivi_Equip_Entity($suivi['Ids'], $suivi['Fonction'],$suivi['Date_Defaillance'],
                                                $suivi['Nature_Defaillance'], $suivi['Cause'], $suivi['Effet'],$suivi['Detection'],
                                                $suivi['Code_Erreur'],$suivi['Action_Curative'],$suivi['Intervenant'],
                                                $suivi['Composant'], $_SESSION['Id'],$suivi['Date_Remise_En_Service']));
    $suivis = $suivi_DAL->Get_AllassArray();
    for($i=0; $i<sizeof($suivis); $i++) 
    {
        $suivis[$i]['Nom_de_Intervenant'] = $user_DAL->Get_Single(intval($suivis[$i]['Nom_de_Intervenant']))->get_Nom_user();
    }
    $data = array('Suivis' => $suivis);
    echo json_encode($data);
}
else if(isset($_GET['delete']))
{
    $ids = intval($_GET['delete']);
    
    $form = $suivi_DAL->GetSingle($ids);
    $suivi_DAL->Delete(new Suivi_Equip_Entity($ids, "", "", "", "", "", "", "", "", "", "", "", ""));
    
    $suivis = $suivi_DAL->Get_AllassArray();
    for($i=0; $i<sizeof($suivis); $i++) 
    {
        $suivis[$i]['Nom_de_Intervenant'] = $user_DAL->Get_Single(intval($suivis[$i]['Nom_de_Intervenant']))->get_Nom_user();
    }
    $data = array('Suivis' => $suivis);
    echo json_encode($data);
}
