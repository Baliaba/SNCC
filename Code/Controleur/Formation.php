<?php
session_start();

define("URL_FICHIER", "../Upload/Formation/");
require '../Include/connect.php';
require '../Classe/Formation_Entity.php';
require '../Classe/User_Entity.php';
require '../Manager/Formation_Manager.php';
require '../Manager/User_Manager.php';


$fm = new Formation_Manager($db);
$userDal = new User_Manager($db);

if(isset($_POST['Formation'], $_POST['Edit']))
{
    $formation = json_decode($_POST['Formation'], true); 
    $final_name = $formation['FileName'];
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
    
    $fm->Update(new Formation_Entity(array(
                                        'Id_form' => $formation['Id'],
                                        'Intitule_form' => $formation['Intitule'],
                                        'Date_debut_form' => reverse($formation['Debut']),
                                        'date_fin_form' => reverse($formation['Fin']),
                                        'objet_form' => $final_name,
                                        'Compte_rendu_form' => $formation['Compte'],
                                        'id_user' => $_SESSION['Id'],
    )));
    
    $forms = $fm->Get_AllasArray();
    for($i=0; $i<sizeof($forms); $i++) 
    {
        $forms[$i]['id_user'] = $userDal->Get_Single(intval($forms[$i]['id_user']))->get_Nom_user();
    }
    
    $data = array('Forms' => $forms);
    echo json_encode($data);
}
else if(isset($_POST['Formation'], $_FILES['Input_File']))
{
    $formation = json_decode($_POST['Formation'], true); 
        
    $fichier = $_FILES["Input_File"]["tmp_name"];
    $nom = $_FILES["Input_File"]["name"];
    $taille = $_FILES['Input_File']['size'];
    $type = $_FILES['Input_File']['type'];

    $frms = $fm->Get_AllasArray();
    $last_id = sizeof($frms);

    $tab = explode('.', $nom);
    $extension = end($tab);
    $final_name = "frm_".md5($nom."".$last_id).".".$extension;
    $destination = URL_FICHIER.$final_name;
    move_uploaded_file($fichier, $destination);
    
    $fm->Add(new Formation_Entity(array(
                                        'Intitule_form' => $formation['Intitule'],
                                        'Date_debut_form' => reverse($formation['Debut']),
                                        'date_fin_form' => reverse($formation['Fin']),
                                        'objet_form' => $final_name,
                                        'Compte_rendu_form' => $formation['Compte'],
                                        'id_user' => $_SESSION['Id'],
    )));
    
    $forms = $fm->Get_AllasArray();
    for($i=0; $i<sizeof($forms); $i++) 
    {
        $forms[$i]['id_user'] = $userDal->Get_Single(intval($forms[$i]['id_user']))->get_Nom_user();
    }
    
    $data = array('Forms' => $forms);
    echo json_encode($data);
}
else if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $forms = NULL;
    
    if(empty($search))
    {
        $forms = $fm->Get_AllasArray();
    }
    else
    {
        $forms = $fm->Search_by_Intitule($search);
    }
    
    for($i=0; $i<sizeof($forms); $i++) 
    {
        $forms[$i]['id_user'] = $userDal->Get_Single(intval($forms[$i]['id_user']))->get_Nom_user();
    }
    
    $data = array('Forms' => $forms);
    echo json_encode($data);
}
else if(isset($_GET['get_formation']))
{
    $idf = intval($_GET['get_formation']);
    $forms = NULL; $data = NULL;
    
    $forms = $fm->Get_AllasArray();
    
    for($i=0; $i<sizeof($forms); $i++) 
    {
        if($forms[$i]['Id_form'] == $idf){
            $data = $forms[$i];
            break;
        }
    }
    
    echo json_encode($data);
}
else if(isset($_GET['delete']))
{
    $idf = intval($_GET['delete']);
    $forms = NULL; $data = NULL;
    
    $form = $fm->Get_Single($idf);
    unlink(URL_FICHIER."".$form->get_objet_form());
    $fm->Delete(new Formation_Entity(array('Id_form' => $idf)));
    
    $forms = $fm->Get_AllasArray();
    for($i=0; $i<sizeof($forms); $i++) 
    {
        $forms[$i]['id_user'] = $userDal->Get_Single(intval($forms[$i]['id_user']))->get_Nom_user();
    }
    
    $data = array('Forms' => $forms);
    echo json_encode($data);
}

function reverse($chaine)
{
    return substr($chaine,6,10).substr($chaine,2,3). '/'.substr($chaine,0,2);
}