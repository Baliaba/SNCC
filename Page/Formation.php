<!DOCTYPE html>
<html lang="fr">
<head>
    <title>LISTING DES FORMATIONS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Fenetre_Modal.css"/>
    <link rel="stylesheet" type="text/css" href="style/Formation.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <?php require_once 'include/Entete.php'; ?>
                <br/>
                <?php require_once 'include/Menu.php'; ?>
                
                <div class="row" id="Div_Content">
                    <div class="col-md-12" id="Div_View">
                        <div class="row" id="Search_Zone">
                            <div class="col-md-offset-7 col-md-4">
                                <input type="text" name="Txt_Search_Intitule" class="form-control" id="Txt_Search_Intitule" autocomplete="off" placeholder="Rechercher un intitulé"/>
                            </div>
                            <div class="col-md-1" style="padding-right: 0px;">
                                <button type="button" class="btn btn-success pull-right" id="Btn_Search" style="font-weight: bold">Rechercher</button>
                            </div>
                        </div>
                        
                        <div class="row" id="Table_Zone">
                            <div class="col-md-12" id="Div_Table">
                                <table class="table" border="0" id="Table_Formation">
                                    <tr>
                                        <th>INTITUL&Eacute;</th>
                                        <th>DATE D&Eacute;BUT</th>
                                        <th>DATE FIN</th>
                                        <th>COMPTE RENDU</th>
                                        <th>OBJET</th>
                                        <th>AJOUTE PAR</th>
                                        <th>...</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row bottom" id="Action_Zone">
                            <table>
                                <tr>
                                <?php
                                    if((strcmp($_SESSION['Group_Id'],'1')==0 ||strcmp($_SESSION['Group_Id'],'4')==0))
                                    {
                                        echo '
                                            <td><button type="button" class="btn btn-success" id="Btn_Formation_Add">AJOUTER</button></td>
                                            <td><button type="button" class="btn btn-primary" id="Btn_Formation_Edit">MODIFIER</button></td>
                                            <td><button type="button" class="btn btn-danger" id="Btn_Formation_Delete">SUPPRIMER</button></td>';
                                    }
                                    else
                                    {
                                       echo '
                                            <td><button type="button" class="btn btn-success " id="Btn_Formation_Add">AJOUTER</button></td>
                                        '; 
                                    }
                                ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php require_once 'include/Pied.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'include/Fenetre_Modale.php'; ?>
    
    <script type="text/javascript" src="script/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="script/jquery-ui-1.9.2.js"></script>
    <script type="text/javascript" src="script/jquery.form.min.js"></script>
    <script type="text/javascript" src="script/datepicker.js"></script>
    <script type="text/javascript" src="script/My/Fenetre_Modal.js"></script>
    <script type="text/javascript" src="script/My/Formation.js"></script>
</body>
</html>