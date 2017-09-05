<!DOCTYPE html>
<html lang="fr">
<head>
    <title>DECLARER UNE DEFAILLANCE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Action.css"/>
    <link rel="stylesheet" type="text/css" href="style/Defaillance.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <?php require_once 'include/Entete.php'; ?>
               
                <div class="row" id="Div_Content">
                    <div class="col-md-12" id="Div_View">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#suivi" datatoggle="tab">SUIVI D'EQUIPEMENT</a></li>
                            <li class="hidden"><a href="#rapport" data-toggle="tab">RAPPORT CURATIF</a></li>
                            <li class="hidden"><a href="#etat_action" datatoggle="tab">ETAT ACTION</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="suivi">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-8" id="Suivi_Zone">
                                        <form class="" id="Form_Suivi_Equipement" method="post">
                                            <table border="0" width="100%">
                                                <tr>
                                                    <td>
                                                        <label for="Choix_Composant">Choisir un composant : </label>
                                                        <table border="0" style="width:95%; margin-bottom: 10px;">
                                                            <tr>
                                                                <td style="width:80%;">
                                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                                        <select style="margin-right: 0px;" id="Choix_Composant" name="Choix_Composant" class="form-control input-sm">
                                                                            <option value="0">Choisir un composant</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="Icon_Add_Composant" title="Ajouter un composant">
                                                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <label for="Choix_Intervenant">Sélectionner l'intervenant : </label>
                                                        <div class="form-group">
                                                            <select id="Choix_Intervenant" name="Choix_Intervenant" class="form-control input-sm">
                                                                <option value="0">Sélectionner l'intervenant</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Fonction">Fonction : </label>
                                                            <input type="text" name="Txt_Fonction" id="Txt_Fonction" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Nature_Defaillance">Nature de la défaillance : </label>
                                                            <input type="text" name="Txt_Nature_Defaillance" id="Txt_Nature_Defaillance" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Date_Defaillance">Date de défaillance : </label>
                                                            <input type="datetime" name="Txt_Date_Defaillance" id="Txt_Date_Defaillance" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Code_Erreur">Code d'erreur : </label>
                                                            <input type="text" name="Txt_Code_Erreur" id="Txt_Code_Erreur" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Cause">Causes : </label>
                                                            <textarea name="Txt_Cause" id="Txt_Cause" class="form-control input-sm"></textarea>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Effet">Effets : </label>
                                                            <textarea name="Txt_Effet" id="Txt_Effet" class="form-control input-sm"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Txt_Detection">Détection : </label>
                                                            <textarea name="Txt_Detection" id="Txt_Detection" class="form-control input-sm"></textarea>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="Action_Curative">Action curative : </label>
                                                        <div class="form-group">
                                                            <select id="Choix_Action_Curative" name="Choix_Action_Curative" class="form-control input-sm">
                                                                <option value="0">Sélectionner une action</option>
                                                                <option value="1">Composant réparé</option>
                                                                <option value="2">Changement du composant</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="Date_Remise_En_Service">Date de remise en service : </label>
                                                            <input type="datetime" name="Txt_Date_Remise_En_Service" id="Txt_Date_Remise_En_Service" class="form-control input-sm" autocomplete="off"/>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>

                                            <input type="submit" class="btn btn-primary" id="Btn_Suivi_Next_Step" value="PASSER AU RAPPORT CURATIF"/>
                                            <input type="reset" class="btn btn-danger pull-right" id="Btn_Suivi_Reset" value="EFFACER"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="rapport">
                                <div class="row">
                                    <div class=" col-md-offset-3 col-md-6" id="Rapport_Zone">
                                        <form id="Form_Rapport_Curatif" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="Suivi_Equipement">Choisissez un suivi d'équipement :</label>
                                                <select disabled id="Suivi_Equipement" name="Suivi_Equipement" class="form-control input-sm">
                                                    <option value="0">Choisir un suivi d'équipement</option>
                                                    <option value="1">Programmation</option>
                                                    <option value="2">Réseautique</option>
                                                    <option value="3">Tronc commun</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email_Honeywell">Email Honeywell : </label>
                                                <input type="email" name="Txt_Email_Honeywell" id="Txt_Email_Honeywell" class="form-control input-sm" autocomplete="off"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email_Expediteur">Email Expéditeur : </label>
                                                <input type="email" name="Txt_Email_Expediteur" id="Txt_Email_Expediteur" class="form-control" autocomplete="off"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="Objet">Objet du rapport : </label>
                                                <textarea name="Txt_Objet" id="Txt_Objet" class="form-control input-sm" placeholder=""></textarea>
                                                <!--<span class="glyphicon glyphicon-remove form-control-feedback"></span>-->
                                            </div>

                                            <input type="file" name="Input_File" id="Input_File" style="display:none;" />
                                            <div class="form-group">
                                                <label for="File_Input_Select">Sélectionner le fichier : </label>
                                                <table border="0" width="100%">
                                                    <tr>
                                                        <td style="width:79%;">
                                                            <div class="form-group">
                                                                <input type="text" name="File_Input_Select" id="File_Input_Select" class="form-control input-sm" autocomplete="off"/>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right">
                                                            <div class="form-group">
                                                                <input type="button" class="btn btn-info" id="Btn_Choose_File" value="Parcourir ..."/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                             </div>

                                            <input type="submit" class="btn btn-primary" id="Btn_Rapport_Curatif_Save" value="ENREGISTRER"/>
                                            <input type="reset" class="btn btn-danger pull-right" id="Btn_Rapport_Curatif_Reset" value="EFFACER"/>
                                        </form>
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="tab-pane" id="etat_action">
                                <div class="row">
                                    <div class="panel-group col-md-offset-2 col-md-8" id="Message_Zone">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        <a class="accordion-toggle" href="#Message" data-parent="#Message_Zone"> 
                                                            <br/>
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="Message" class="panel-collapse collapse in">
                                                    <div class="panel-body"> 
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table>
                                                                    <tr>
                                                                        <td>ENREGISTREMENT DU SUIVI D'EQUIPEMENT</td>
                                                                        <td><span class="glyphicon glyphicon-ok-sign"></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ENREGISTREMENT DU RAPPORT CURATIF</td>
                                                                        <td><span class="glyphicon glyphicon-ok-sign"></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ENVOI DU RAPPORT PAR MAIL</td>
                                                                        <td><span class="glyphicon glyphicon-remove-sign"></span></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
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
    <?php require_once './include/Action.php'; ?>
    <script type="text/javascript" src="script/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="script/jquery-ui-1.9.2.js"></script>
    <script type="text/javascript" src="script/jquery.form.min.js"></script>
    <script type="text/javascript" src="script/datepicker.js"></script>
    <script type="text/javascript" src="include/script/Action.js"></script>
    <script type="text/javascript" src="script/My/Defaillance.js"></script>
</body>
</html>