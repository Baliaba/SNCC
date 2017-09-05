<?php
require '../Include/connect.php';
require '../Manager/Statistque_Manager.php';

 $Stat_Manager=new Statistque_Manager($db);
 $stat=array();
 $search=array();

 if(isset($_GET['stat']))
{
    $stat['stat_sort']=$Stat_Manager->getStat();
    $stat['stat_count']=$Stat_Manager->CompoBySousSsyt();
    echo json_encode($stat);
}
else if(isset($_GET['annees']))
{
     $ans=$_GET['annees'];
     $search['stat_sort']=$Stat_Manager->Search_by_Date($ans);
     $search['stat_count']=$Stat_Manager->CompoBySousSsyt();
    echo json_encode($search);
}
?>
