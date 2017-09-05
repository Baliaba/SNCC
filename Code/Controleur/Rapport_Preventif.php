<?php
define("URL_FICHIER", "../Upload/");

require '../Include/connect.php';
require '../Classe/Rpreventif_Entity.php';
require '../Manager/RapportP_Manager.php';

$rp = new RapportP_Manager($db);

if(isset($_POST['Rapport'], $_POST['Edit']))
{
    $rapport = json_decode($_POST['Rapport'], true); 
    $final_name = $rapport['Filename'];
    $tb = explode('.', $final_name);
    $ext = end($tb);
        
    if(isset($_FILES['Input_File_Prev']) && !empty($_FILES['Input_File_Prev']))
    {
        $fichier = $_FILES["Input_File_Prev"]["tmp_name"];
        $nom = $_FILES["Input_File_Prev"]["name"];
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
    
    $rp->Update(new Rpreventif(array(
                                    'idRapport_Prev' => $rapport['Id'],
                                    'Objet_Rapport_Prev' => $rapport['Objet'],
                                    'Email_Honeywell' => $rapport['Email_Honeywell'],
                                    'Email_Expedit' => $rapport['Email_Expediteur'],
                                    'Status' => $rapport['Statut'],
                                    'Chemin' => $final_name
                                    )));
    
    $prevs = $rp->getAllAsArray();
    $data = array('Prevs' => $prevs);
    echo json_encode($data);
}
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $prevs = NULL;
    
    if(empty($search))
    {
        $prevs = $rp->getAllAsArray();
    }
    else
    {
        $prevs = $rp->Search_by_Code($search);
    }
    
    $data = array('Prevs' => $prevs);
    echo json_encode($data);
}
else if(isset($_GET['get_rp']))
{
    $idp = intval($_GET['get_rp']);
    $rps = NULL; $data = NULL;
    
    $rps = $rp->getAllAsArray();
    
    for($i=0; $i<sizeof($rps); $i++) 
    {
        if(intval($rps[$i]['idRapport_Prev']) == $idp){
            $data = $rps[$i];
            break;
        }
    }
    
    echo json_encode($data);
}
else if(isset($_GET['delete']))
{
    $idp = intval($_GET['delete']);
    $prev = $rp->getSingle($idp);
    
    if(file_exists(URL_FICHIER."".$prev->get_Chemin())){
        unlink(URL_FICHIER."".$prev->get_Chemin());
    }
    $rp->Delete(new Rpreventif(array('idRapport_Prev' => $idp)));
    
    $prevs = $rp->getAllAsArray();
    $data = array('Prevs' => $prevs);
    echo json_encode($data);
}

function reverse($chaine)
{
    return substr($chaine,6,10).substr($chaine,2,3). '/'.substr($chaine,0,2);
}

