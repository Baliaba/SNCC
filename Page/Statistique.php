<!DOCTYPE html>
<html lang="fr">
<head>
    <title>STATISTIQUE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Fenetre_Modal.css"/>
    <link rel="stylesheet" type="text/css" href="style/Statistique.css"/>
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
                            <div class="col-md-offset-5 col-md-4">
                                <input type="text" name="Txt_User" class="form-control" id="Txt_Annee" autocomplete="off" placeholder="Rechercher par année"/>
                            </div>
                            <div class="col-md-1" style="padding-right: 0px;">
                                <button type="button" class="btn btn-success pull-right" id="Btn_Search" style="font-weight: bold">Rechercher</button>
                            </div>
                        </div>
                        <div class="row" id="Table_Zone">
                            <div class="col-md-offset-2 col-md-8">
                                <table class="table" border="0" id="Table_Stat">
                                    <tr> <th>SOUS SYST&Egrave;ME</th> <th>NOMBRE DE COMPOSANT</th> <th>DEFAUT PAR AN</th> </tr>
                                </table>
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
    <script type="text/javascript" src="script/My/Fenetre_Modal.js"></script>
    <script type="text/javascript" src="script/My/Statistique.js"></script>
</body>
</html>