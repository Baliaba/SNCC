<?php
session_start();

define("URL_FICHIER", "../Upload/");

require '../Include/connect.php';
require '../Classe/Checklist_Entity.php';
require '../Classe/ChechListAps_Entity.php';
require '../Classe/Rpreventif_Entity.php';
require '../Manager/CheckList_SNCC_Manager.php';
require '../Manager/Checklist_APS_Manager.php';
require '../Manager/RapportP_Manager.php';

$Sncc_Man = new CheckList_SNCC_Manager($db);
$Aps_Man = new Checklist_APS_Manager($db);
$Rp_Man = new RapportP_Manager($db);

$action = array('Checklist' => 0, 'Rapport' => 0, 'Email' => 0);
        
if(isset($_POST['sncc'], $_POST['aps'], $_POST['rapport'], $_FILES['Input_File']))
{
    $sncc = json_decode($_POST['sncc'], true);
    $aps = json_decode($_POST['aps'], true);
    $rapport = json_decode($_POST['rapport'], true);
    
    $fichier = $_FILES["Input_File"]["tmp_name"];
    $nom = $_FILES["Input_File"]["name"];
    $taille = $_FILES['Input_File']['size'];
    $type = $_FILES['Input_File']['type'];
    
    //echo sizeof($sncc).'---'.sizeof($aps).'---'.$nom.'---'.sizeof($rapport);
    
    try
    {
        if(sizeof($sncc) > 0)
        {
            foreach ($sncc as $value) 
            {
                $Sncc_Man->Add(new Checklist_Entity(array(
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
            }
        }
        if(sizeof($aps) > 0)
        {
            foreach ($aps as $value) 
            {
                $Aps_Man->Add(new ChechListAps_Entity(array(
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
            }
        }
        $action['Checklist'] = 1;
    }catch(Exception $e)
    {
        $action['Checklist'] = 0;
    }
    
    $Rp = $Rp_Man->getAllAsArray();
    $last_id = sizeof($Rp); //(sizeof($Rp) === 0) ? 1 : $Rp[sizeof($Rp)-1]['idRapport_Prev']+1;
    
    $tab = explode('.', $nom);
    $extension = end($tab);
    $final_name = "rp_".md5($nom."".$last_id).".".$extension;
    $destination = URL_FICHIER.$final_name;
    move_uploaded_file($fichier, $destination);
    
    //Envoi d'email ici
    $email_envoye = 1;
    
    $action['Email'] = $email_envoye;
    
    $Rp_Man->Add(new Rpreventif(array(
                                      'Objet_Rapport_Prev' => $rapport['Objet'],
                                      'Email_Honeywell' => $rapport['Email_Honeywell'],
                                      'Email_Expedit' => $rapport['Email_Expediteur'],
                                      'Status' => $email_envoye,
                                      'Chemin' => $final_name
                                    )));
    $action['Rapport'] = 1;
    
    echo json_encode($action);
}