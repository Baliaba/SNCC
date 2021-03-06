<!DOCTYPE html>
<html lang="fr">
<head>
    <title>RAPPORT PREVENTIF</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Navigation.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Fenetre_Modal.css"/>
    <link rel="stylesheet" type="text/css" href="style/Rapport_Preventif.css"/>
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
                                <input type="text" name="Txt_Date" class="form-control" id="Txt_Search_Date" autocomplete="off" placeholder="Entrez une date"/>
                            </div>
                            <div class="col-md-offset-1 col-md-1" style="padding-right: 0px;">
                                <button type="button" class="btn btn-success pull-right" style="font-weight: bold;" id="Btn_Search">Rechercher</button>
                            </div>
                        </div>
                        
                        <div class="row" id="Table_Zone">
                            <div class="col-md-12">
                                <table class="table" id="Table_Preventif">
                                    <tr>
                                        <th>DATE</th>
                                        <th>OBJET</th>
                                        <th>FICHIER</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row bottom" id="Action_Zone">
                            <div class="col-md-12">
                                <?php 
                                    if((strcmp($_SESSION['Group_Id'],'1')==0 ||strcmp($_SESSION['Group_Id'],'4')==0))
                                    {
                                        echo '
                                        <table>
                                        <tr>
                                        <td><button type="button" class="btn btn-primary" id="Btn_Rapport_Preventif_Edit">MODIFIER</button></td>
                                        <td><button type="button" class="btn btn-danger" id="Btn_Rapport_Preventif_Delete">SUPPRIMER</button></td>
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
    <script type="text/javascript" src="script/My/Rapport_Preventif.js"></script>
</body>
</html>