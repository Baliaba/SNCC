<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SUIVI D'EQUIPEMENT</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Navigation.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Fenetre_Modal.css"/>
    <link rel="stylesheet" type="text/css" href="style/Suivi_Equipement.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <?php require_once 'include/Entete.php'; ?>
                <br/>
                <?php require_once 'include/Menu.php'; ?>
                
                <div class="row" id="Div_Content">
                    <?php require_once 'include/Navigation.php'; ?>
                    
                    <div class="col-md-8" id="Div_View">
                        <div class="row" id="Search_Zone">
                            <div class="col-md-offset-4 col-md-6" style="padding-right: 0px;">
                                <input type="text" name="Txt_Search_Code_Erreur" class="form-control" id="Txt_Search_Code_Erreur" autocomplete="off" placeholder="Recherchez par code d'erreur"/>
                            </div>
                            <div class="col-md-offset-1 col-md-1" style="padding-right: 0px;">
                                <button type="button" class="btn btn-success pull-right" id="Btn_Search" style="font-weight: bold">Rechercher</button>
                            </div>
                        </div>
                        
                        <div class="row" id="Table_Zone">
                            <div class="col-md-12">
                                <table class="table" id="Table_Suivi">
                                    <tr>
                                        <th>FONCTION</th>
                                        <th>DATE DEFAILLANCE</th>
                                        <th>CODE D'ERREUR</th>
                                        <th>INTERVENANT</th>
                                        <th>...</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row bottom" id="Action_Zone">
                            <div class="col-md-12">
                                <?php 
                                    if((strcmp($_SESSION['Group_Id'],'1')==0 ||strcmp($_SESSION['Group_Id'],'4')==0))
                                    {
                                        echo
                                        '<table>
                                        <tr>
                                        <td><button type="button" class="btn btn-primary" id="Btn_Suivi_Equipement_Edit">MODIFIER</button></td>
                                        <td><button type="button" class="btn btn-danger" id="Btn_Suivi_Equipement_Delete">SUPPRIMER</button></td>
                                        </tr>
                                        </table>';
                                    }    
                                ?>
                            </div>
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
    <script type="text/javascript" src="include/script/Navigation.js"></script>
    <script type="text/javascript" src="script/My/Fenetre_Modal.js"></script>
    <script type="text/javascript" src="script/My/Suivi_Equipement.js"></script>
</body>
</html>