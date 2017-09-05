<?php
define("URL_FICHIER", "../Upload/");

require '../Include/connect.php';
require '../Classe/Rcuratif_Entity.php';
require '../Classe/Suivi_Equip_Entity.php';
require '../Manager/RapportC_Manager.php';
require '../Manager/SuiviE_Manager.php';

$rc = new RapportC_Manager($db);
$suivi_DAL = new SuiviE_Manager($db);

if(isset($_POST['Rapport'], $_POST['Edit']))
{
    $rapport = json_decode($_POST['Rapport'], true); 
    $final_name = $rapport['Filename'];
    $tb = explode('.', $final_name);
    $ext = end($tb);
        
    if(isset($_FILES['Input_File']) && !empty($_FILES['Input_File']))
    {
        $fichier = $_FILES["Input_File"]["tmp_name"];
        $nom = $_FILES["Input_File"]["name"];
        $tab = explode('.', $nom);
        $extension = end($tab);
        
        if($ext != $extension)
        {
            unlink(URL_FICHIER.$final_name);
            $final_name = $tb[0].".".$extension;
        }
        
        $destination = URL_FICHIER.$final_name;
        move_uploaded_file($fichier, $destination);
    }
    
    $rc->Update(new Rcuratif_Entity(array(
                                            'id_Rapport_Curatif' => $rapport['Id'],
                                            'Objet_Rapport_Cur'=>$rapport['Objet'], 
                                            'Chemin_Fichier'=>$final_name, 
                                            'Email_Honeywell'=>$rapport['Email_Honeywell'], 
                                            'Email_Expedit'=>$rapport['Email_Expediteur'], 
                                            'Status'=>$rapport['Statut'], 
                                            'SuiviEquipement_id'=>$rapport['Id_Suivi'])));
    
    $cures = $rc->Get_AllasArray();
    $data = array('Cures' => $cures);
    echo json_encode($data);
}
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $cures = NULL;
    
    if(empty($search))
    {
        $cures = $rc->Get_AllasArray();
    }
    else
    {
        $cures = $rc->Search_by_Code($search);
    }
    
    $data = array('Cures' => $cures);
    echo json_encode($data);
}
else if(isset($_GET['get_rc']))
{
    $ids = intval($_GET['get_rc']);
    $rcs = NULL; $data = NULL;
    
    $rcs = $rc->Get_AllasArray();
    
    for($i=0; $i<sizeof($rcs); $i++) 
    {
        if(intval($rcs[$i]['id_Rapport_Curatif']) == $ids){
            $data = $rcs[$i];
            break;
        }
    }
    
    echo json_encode($data);
}
else if(isset($_GET['delete']))
{
    $idc = intval($_GET['delete']);
    $cure = $rc->getSingle($idc);
    
    if(file_exists(URL_FICHIER."".$cure->get_Chemin_Fichier())){
        unlink(URL_FICHIER."".$cure->get_Chemin_Fichier());
    }
    $rc->Delete(new Rcuratif_Entity(array('id_Rapport_Curatif' => $idc)));
    $suivi_DAL->Delete(new Suivi_Equip_Entity($cure->get_SuiviEquipement_id(), "", "", "", "", "", "", "", "", "", "", "", ""));
    
    $cures = $rc->Get_AllasArray();
    $data = array('Cures' => $cures);
    echo json_encode($data);
}

function reverse($chaine)
{
    return substr($chaine,6,10).substr($chaine,2,3). '/'.substr($chaine,0,2);
}