<?php
    session_start();

    define("URL_FICHIER", "../Upload/");
    require '../../Code/Include/connect.php';
    require '../Classe/Composant_Entity.php';
    require '../Classe/Suivi_Equip_Entity.php';
    require '../Classe/User_Entity.php';
    require '../Classe/Rcuratif_Entity.php';
    require '../Manager/SuiviE_Manager.php'; 
    require '../Manager/User_Manager.php';
    require '../Manager/RapportC_Manager.php';

    $Suiv_DAL=new SuiviE_Manager($db);
    $RC_DAL=new RapportC_Manager($db);
    
    $action = array('Suivi' => 0, 'Rapport' => 0, 'Email' => 0);
    //------------------------------------ REVERSE DATE ------------------------------------------
    function reverse($chaine)
    {
        return $years=substr($chaine,6,10).
        $month=substr($chaine,2,3).
        '/'.$day=substr($chaine,0,2);
    }
        
    if(isset($_POST['Suivi'], $_POST['Rapport'], $_FILES['Input_File']))
    {
        $suivi = json_decode($_POST['Suivi'], true); 
        $rapport=  json_decode($_POST['Rapport'], true);
        
        $fichier = $_FILES["Input_File"]["tmp_name"];
        $nom = $_FILES["Input_File"]["name"];
        $taille = $_FILES['Input_File']['size'];
        $type = $_FILES['Input_File']['type'];
        
        $Suiv_DAL->Add(new Suivi_Equip_Entity(-1, $suivi['Fonction'],reverse($suivi['Date_Defaillance']),
                                                $suivi['Nature_Defaillance'], $suivi['Cause'], $suivi['Effet'],$suivi['Detection'],
                                                $suivi['Code_Erreur'],$suivi['Action_Curative'],$suivi['Intervenant'],
                                                $suivi['Composant'], $_SESSION['Id'],reverse($suivi['Date_Remise_En_Service'])));
        $action['Suivi'] = 1;
        $suivis = $Suiv_DAL->Get_AllassArray();
        $last_equipement = $suivis[sizeof($suivis)-1]['idSuiviEquipement'];
        
        $Rp = $RC_DAL->Get_AllasArray();
        $last_id = sizeof($Rp);
    
        $tab = explode('.', $nom);
        $extension = end($tab);
        $final_name = "rc_".md5($nom."".$last_id).".".$extension;
        $destination = URL_FICHIER.$final_name;
        move_uploaded_file($fichier, $destination);
    
        if($suivi['Action_Curative'] === 1)
        {
            $RC_DAL->Add(new Rcuratif_Entity(array('Objet_Rapport_Cur'=>$rapport['Objet'], 'Chemin_Fichier'=>$final_name, 'SuiviEquipement_id'=>$last_equipement)));
        }  
        else 
        {
            $email_envoye = 1;
            $action['Email'] = $email_envoye;
            
            $RC_DAL->Add(new Rcuratif_Entity(array('Objet_Rapport_Cur'=>$rapport['Objet'], 'Chemin_Fichier'=>$final_name, 'Email_Honeywell'=>$rapport['Email_Honeywell'], 'Email_Expedit'=>$rapport['Email_Expediteur'], 'Status'=>$email_envoye, 'SuiviEquipement_id'=>$last_equipement)));
            $action['Rapport'] = 1;
        }
        echo json_encode($action);
    }

