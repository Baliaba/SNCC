<?php
require '../../Code/Include/connect.php';
require '../Classe/Sousyst_Entity.php';
require '../Classe/Composant_Entity.php';
require '../Manager/ssSyteme_Manager.php';
require '../Manager/Composant_Manager.php';
    
$SsSys_DAL = new ssSyteme_Manager($db);
$composant_DAL = new Composant_Manager($db);

function get_Composants($db, $idss)
{
    $Compo=array();
    $req = $db->prepare('SELECT * FROM composant WHERE Sous_Systeme_id = ?');
    $req->execute(array($idss));
    while($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
        $Compo[] = $donnees;
    }
    return $Compo;
}

if(isset($_GET['all']))
{
    $data=array();
    $req=$db->query('SELECT * FROM sous_systeme');
    
    while($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
        $ss = array();
        
        $ss['Sous_Systeme'] = $donnees;
        $ss['donnees'] = get_Composants($db, $donnees['idSous_Systeme']);
        $data[] = $ss;
    }
    echo json_encode($data);
}