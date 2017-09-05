<!DOCTYPE html>
<html lang="fr">
<head>
    <title>GESTION DES UTILISATEURS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Fenetre_Modal.css"/>
    <link rel="stylesheet" type="text/css" href="style/Utilisateur.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <?php require_once 'include/Entete.php'; ?>
                
                <div class="row" id="Div_Content">
                    <div class="col-md-12" id="Div_View">
                        <div class="row" id="Search_Zone">
                            <div class="col-md-offset-6 col-md-2" style="padding: 0px;">
                                <!--<div class="input-group" style="width:100%;">
                                    <select name="Groupe_User" id="Groupe_User" class="form-control">
                                        <option value="">Tous</option>
                                        <option value="">Utilisateur</option>
                                        <option value="">Administrateur</option>
                                    </select>
                                </div>-->
                            </div>
                            <div class="col-md-3" style="padding-left: 3px;">
                                <input type="text" name="Txt_User" class="form-control" id="Txt_Search_User" autocomplete="off" placeholder="Recherchez un utilisateur"/>
                            </div>
                            <div class="col-md-1" style="padding-right: 0px;">
                                <button type="button" class="btn btn-success pull-right" id="Btn_Search" style="font-weight: bold">Rechercher</button>
                            </div>
                        </div>
                        
                        <div class="row" id="Table_Zone">
                            <div class="col-md-12">
                                <table class="table" id="Table_Utilisateur">
                                    <tr>
                                        <th>NOM COMPLET</th>
                                        <th>POSTE</th>
                                        <th>NOM D'UTILISATEUR</th>
                                        <th>GROUPE</th>
                                        <th>...</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="col-md-5" id="Poste_Zone">
                            <div id="Accordeon" class="panel-group col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" href="#Div_Poste" data-parent="#Accordeon"> 
                                                POSTE
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="Div_Poste" class="panel-collapse collapse in">
                                        <div class="panel-body"> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="" id="Form_Poste">
                                                        <div class="form-group">
                                                            <label for="Txt_poste">Nom du poste : </label>
                                                            <input type="text" name="Txt_Poste" id="Txt_Poste" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" id="Btn_Add_Poste" value="ENREGISTRER"/>
                                                        
                                                        <table class="table" id="Table_Poste">
                                                            <tr>
                                                                <th>INTITULE</th>
                                                                <th>...</th>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-7" id="Groupe_Zone">
                            <div id="Accordeon_Groupe" class="panel-group col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" href="#Div_Groupe" data-parent="#Accordeon_Groupe"> 
                                                GROUPE
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="Div_Groupe" class="panel-collapse collapse in">
                                        <div class="panel-body"> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="" id="Form_Groupe">
                                                        <div class="form-group">
                                                            <label for="Txt_groupe">Intitulé : </label>
                                                            <input type="text" name="Txt_Intitule" id="Txt_Intitule" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Txt_Chaine_Password">Chaine de fin de mot de passe : </label>
                                                            <input type="text" name="Txt_Chaine_Password" id="Txt_Chaine_Password" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" id="Btn_Add_Groupe" value="ENREGISTRER"/>
                                                        
                                                        <table class="table" id="Table_Groupe">
                                                            <tr>
                                                                <th>INTITULE</th>
                                                                <th>CHAINE</th>
                                                                <th>...</th>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script type="text/javascript" src="script/My/Fenetre_Modal.js"></script>
    <script type="text/javascript" src="script/My/Utilisateur.js"></script>
</body>
</html>