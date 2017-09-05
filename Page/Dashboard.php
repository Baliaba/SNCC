<?php
echo  '<html lang="fr">
<head>
    <title>DASHBOARD</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="style/Dashboard.css"/>
 </head>
    <body>
    <div class="container">';
     require_once 'include/Entete.php';
               if(isset($_SESSION['Group_Id'])){
                 if(strcmp($_SESSION['Group_Id'],'1')==0)
                 {
                 echo '
        <div class="row">
            <div class="col-md-12" id="Main">
              <div class="row" id="Div_Content">
                    
                    <div class="col-md-12" id="Div_Dashboard">
                        <table>
                            <tr>
                                <td>
                                    <a href="Defaillance.php">
                                        <div class="item">
                                            <img src="Image/Defaillance.png" title="Défaillance" alt="Image défaillance"/>
                                        </div>
                                        <div class="title">DECLARER UNE DEFAILLANCE</div>
                                    </a>
                                </td>
                                <td>
                                    <a href="Rapport.php">
                                        <div class="item">
                                            <img src="Image/Rapport_Preventif.png" title="Rapport Préventif" alt="Rapport Préventif"/>
                                        </div>
                                        <div class="title">EFFECTUER UN RAPPORT PREVENTIF</div>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="Welcome.php">
                                        <div class="item">
                                            <img src="Image/Archives.png" title="Consulter les archives" alt="Consulter les archives"/>
                                        </div>
                                        <div class="title">CONSULTER LES ARCHIVES</div>
                                    </a>
                                </td>
                                <td>
                                    <a href="Utilisateur.php">
                                        <div class="item">
                                            <img src="Image/Utilisateur.png" title="Gestion des utilisateurs" alt="Gestion des utilisateurs"/>
                                        </div>
                                        <div class="title">GESTION DES UTILISATEURS</div>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>';
                    require_once 'include/Pied.php';
               echo '</div>
            </div>
        </div>
    </div>';
    }
    else if(strcmp($_SESSION['Group_Id'],'4')==0)
    {
       echo '
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
              <div class="row" id="Div_Content">
                    
                    <div class="col-md-12" id="Div_Dashboard">
                        <table>
                            <tr>
                                <td>
                                    <a href="Defaillance.php">
                                        <div class="item">
                                            <img src="Image/Defaillance.png" title="Défaillance" alt="Image défaillance"/>
                                        </div>
                                        <div class="title">DECLARER UNE DEFAILLANCE</div>
                                    </a>
                                </td>
                                <td>
                                    <a href="Rapport.php">
                                        <div class="item">
                                            <img src="Image/Rapport_Preventif.png" title="Rapport Préventif" alt="Rapport Préventif"/>
                                        </div>
                                        <div class="title">EFFECTUER UN RAPPORT PREVENTIF</div>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="Welcome.php">
                                        <div class="item">
                                            <img src="Image/Archives.png" title="Consulter les archives" alt="Consulter les archives"/>
                                        </div>
                                        <div class="title">CONSULTER LES ARCHIVES</div>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>';
                    require_once 'include/Pied.php';
               echo '</div>
            </div>
        </div>
    </div>';
    }
    else
    {
        header('location:Welcome.php');
    }
  }
    ?>
    <script type="text/javascript" src="script/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="script/jquery-ui-1.9.2.js"></script>
    <script type="text/javascript" src="script/datepicker.js"></script>
    <script type="text/javascript" src="script/My/Dashboard.js"></script>
</body>
</html>
