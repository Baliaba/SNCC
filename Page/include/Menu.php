<?php if(isset($_SESSION['Group_Id']))
{
     if((strcmp($_SESSION['Group_Id'],'1')==0 ||strcmp($_SESSION['Group_Id'],'4')==0))
     {
         echo ' <div class="row">
    <div class="col-md-12" id="Menu">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li class="active"> <a href="Welcome.php">SNCCARCHI 2.0</a> </li>
                
                <li id="m_action" class="dropdown"> 
                    <a data-toggle="dropdown" href="#">ACTION <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Enregistrement">
                        <li><a href="#" id="Ssm_Sous_Systeme">CR&Eacute;ER UN SOUS SYSTEME</a></li>
                        <li><a href="#" id="Ssm_Composant">AJOUTER COMPOSANT</a></li>
                    </ul>
                </li>
                
                <li id="m_suivi_equipement"> <a href="Suivi_Equipement.php">SUIVI D\'&Eacute;QUIPEMENT</a> </li>
                
                <li id="m_rapport" class="dropdown">
                    <a data-toggle="dropdown" href="#">RAPPORT <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Rapport">
                        <li> <a href="Rapport_Preventif.php">RAPPORT PR&Eacute;VENTIF</a> </li>
                        <li> <a href="Rapport_Curatif.php">RAPPORT CURATIF</a> </li>
                    </ul>
                </li>
                
                <li id="m_checklist" class="dropdown"> 
                    <a data-toggle="dropdown" href="#">CHECKLIST <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Checklist">
                        <li><a href="CheckList_Sncc.php" id="Ssm_Sncc">CHECKLIST SNCC</a></li>
                        <li><a href="CheckList_Aps.php" id="Ssm_Aps">CHECKLIST APS</a></li>
                    </ul>
                </li>
                
                <li id="m_statistique"> <a href="Statistique.php">STATISTIQUE</a> </li>
                
                <li id="m_formation" class="dropdown"> 
                    <a data-toggle="dropdown" href="#">FORMATION <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Formation">
                        <li><a href="#" id="Ssm_Creer_Formation">AJOUTER UNE FORMATION</a></li>
                        <li><a href="Formation.php" id="Ssm_Listing_Formation">LISTING DES FORMATIONS</a></li>
                    </ul>
                </li>
                <li id="m_about" class="dropdown"> 
                    <a data-toggle="dropdown" href="#">ABOUT <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_About">
                        <li><a href="Presentation.php" id="Ssm_About">PR&Eacute;SENTATION</a></li>
                         <li><a href="../Code/Upload/rc_5e6b70597584f4768ee7f92c51664b65.pdf" id="Ssm_Composant">GUIDE D\'UTILISATION</a></li>
                        <li><a href="../Code/Upload/rc_5e6b70597584f4768ee7f92c51664b65.pdf" id="Ssm_Composant">MANUEL DE PROC&Eacute;DURE</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
';
     }
     else
     {
         echo ' <div class="row">
    <div class="col-md-12" id="Menu">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li class="active"> <a href="Welcome.php">SNCCARCHI 2.0</a> </li>               
                <li id="m_suivi_equipement"> <a href="Suivi_Equipement.php">SUIVI D\'&Eacute;QUIPEMENT</a> </li>
                
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#">RAPPORT <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Rapport">
                        <li> <a href="Rapport_Preventif.php">RAPPORT PR&Eacute;VENTIF</a> </li>
                        <li> <a href="Rapport_Curatif.php">RAPPORT CURATIF</a> </li>
                    </ul>
                </li>
                
                <li class="dropdown"> 
                    <a data-toggle="dropdown" href="#">CHECKLIST <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Checklist">
                        <li><a href="CheckList_Sncc.php" id="Ssm_Sncc">CHECKLIST SNCC</a></li>
                        <li><a href="CheckList_Aps.php" id="Ssm_Aps">CHECKLIST APS</a></li>
                    </ul>
                </li>
                
                <li> <a href="Statistique.php">STATISTIQUE</a> </li>
                
                <li class="dropdown"> 
                    <a data-toggle="dropdown" href="#">FORMATION <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_Formation">
                        <li><a href="Formation.php" id="Ssm_Listing_Formation">LISTING DES FORMATIONS</a></li>
                    </ul>
                </li>
                <li class="dropdown"> 
                    <a data-toggle="dropdown" href="#">ABOUT <b><span class="caret"></span></b> </a> 
                    <ul class="dropdown-menu" id="Menu_About">
                        <li><a href="Presentation.php" id="Ssm_About">PR&Eacute;SENTATION</a></li>
                         <li><a href="../Code/Upload/rc_5e6b70597584f4768ee7f92c51664b65.pdf" id="Ssm_Composant">GUIDE D\'UTILISATION</a></li>
                        <li><a href="../Code/Upload/rc_5e6b70597584f4768ee7f92c51664b65.pdf" id="Ssm_Composant">MANUEL DE PROC&Eacute;DURE</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
';
         
     }
                
}
?>
                
                 
