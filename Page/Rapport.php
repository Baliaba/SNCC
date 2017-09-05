<!DOCTYPE html>
<html lang="fr">
<head>
    <title>EFFECTUER UN RAPPORT</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Action.css"/>
    <link rel="stylesheet" type="text/css" href="style/Rapport.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <?php require_once 'include/Entete.php'; ?>
               
                <div class="row" id="Div_Content">
                    <div class="col-md-12" id="Div_View">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#checklist" datatoggle="tab">CHECKLIST</a></li>
                            <li class="hidden"><a href="#rapport" data-toggle="tab">RAPPORT PREVENTIF</a></li>
                            <li class="hidden"><a href="#etat_action" datatoggle="tab">ETAT ACTION</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="checklist">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="Accordeon" class="panel-group col-md-offset-2 col-md-8">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        <a class="accordion-toggle" href="#Div_CheckList_Sncc" data-parent="#Accordeon" data-toggle="collapse"> 
                                                            CHECKLIST SNCC
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="Div_CheckList_Sncc" class="panel-collapse collapse in">
                                                    <div class="panel-body"> 
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                 <form class="" id="Form_CheckList_Sncc" method="post">
                                                                    <table border="0" width="100%">
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <label for="Choix_Sncc_Composant">Choisir un composant : </label>
                                                                                <table border="0" style="width:100%; margin-bottom: 10px;">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="form-group" style="margin-bottom: 0px;">
                                                                                                <select id="Choix_Sncc_Composant" name="Choix_Sncc_Composant" class="form-control input-sm">
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
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Statut">Statut : </label>
                                                                                    <input type="text" name="Txt_Statut" id="Txt_Statut" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Etat_Power">Etat Power : </label>
                                                                                    <input type="text" name="Txt_Etat_Power" id="Txt_Etat_Power" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Etat_Battery">Etat Battery : </label>
                                                                                    <input type="text" name="Txt_Etat_Battery" id="Txt_Etat_Battery" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Etat_Cf9">Etat CF9 : </label>
                                                                                    <input type="text" name="Txt_Etat_Cf9" id="Txt_Etat_Cf9" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Etat_Sync">Etat Sync : </label>
                                                                                    <input type="text" name="Txt_Etat_Sync" id="Txt_Etat_Sync" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Sncc_Etat_Psu">Etat PSU : </label>
                                                                                    <input type="text" name="Txt_Sncc_Etat_Psu" id="Txt_Sncc_Etat_Psu" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Sncc_Observation">Observation : </label>
                                                                                    <textarea name="Txt_Sncc_Observation" id="Txt_Sncc_Observation" class="form-control input-sm"></textarea>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                    <input type="submit" class="btn btn-primary" id="Btn_Check_List_Sncc_Next" value="PASSER AU RAPPORT PREVENTIF"/>
                                                                    <input type="button" class="btn btn-success" id="Btn_Check_List_Sncc_New" value="NOUVELLE CHECKLIST"/>
                                                                    <input type="reset" class="btn btn-danger pull-right" id="Btn_Check_List_Sncc_Reset" value="EFFACER"/>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        <a class="accordion-toggle" href="#Div_CheckList_Aps" data-parent="#Accordeon" data-toggle="collapse"> 
                                                            CHECKLIST APS 
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div id="Div_CheckList_Aps" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form class="" id="Form_CheckList_Aps" method="post">
                                                                    <table border="0" width="100%">
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <label for="Choix_Aps_Composant">Choisir un composant : </label>
                                                                                <table border="0" style="width:100%; margin-bottom: 10px;">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="form-group" style="margin-bottom: 0px;">
                                                                                                <select id="Choix_Aps_Composant" name="Choix_Aps_Composant" class="form-control input-sm">
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
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Temperature">Température : </label>
                                                                                    <input type="text" name="Txt_Temperature" id="Txt_Temperature" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Vcc">VCC : </label>
                                                                                    <input type="text" name="Txt_Vcc" id="Txt_Vcc" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Vb">VB : </label>
                                                                                    <input type="text" name="Txt_Vb" id="Txt_Vb" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Eld">ELD : </label>
                                                                                    <input type="text" name="Txt_Eld" id="Txt_Eld" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Aps_Etat_Psu">Etat PSU : </label>
                                                                                    <input type="text" name="Txt_Aps_Etat_Psu" id="Txt_Aps_Etat_Psu" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Nb_Forcage">Nombre de forçage : </label>
                                                                                    <input type="text" name="Txt_Nb_Forcage" id="Txt_Nb_Forcage" class="form-control input-sm" autocomplete="off"/>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <div class="form-group">
                                                                                    <label for="Txt_Aps_Observation">Observation : </label>
                                                                                    <textarea name="Txt_Aps_Observation" id="Txt_Aps_Observation" class="form-control input-sm"></textarea>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <input type="submit" class="btn btn-primary" id="Btn_Check_List_Aps_Next" value="PASSER AU RAPPORT PREVENTIF"/>
                                                                    <input type="button" class="btn btn-success" id="Btn_Check_List_Aps_New" value="NOUVELLE CHECKLIST"/>
                                                                    <input type="reset" class="btn btn-danger pull-right" id="Btn_Check_List_Aps_Reset" value="EFFACER"/>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<div id="CheckList_State" class="col-md-offset-1 col-md-1">
                                            <div class="state" id="Sncc_State">SNCC : <span class="badge">00</span></div>
                                            <div class="state" id="Aps_State">APS &nbsp;&nbsp;&nbsp;: <span class="badge">00</span></div>
                                        </div>
									</div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="rapport">
                                <div class="row">
                                    <div class=" col-md-offset-3 col-md-6" id="Rapport_Zone">
                                        <form id="Form_Rapport_Preventif" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="Email_Honeywell">Email Honeywell : </label>
                                                <input type="email" name="Txt_Email_Honeywell" id="Txt_Email_Honeywell" class="form-control input-sm" autocomplete="off"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email_Expediteur">Email Expéditeur : </label>
                                                <input type="email" name="Txt_Email_Expediteur" id="Txt_Email_Expediteur" class="form-control input-sm" autocomplete="off"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="Objet">Objet du rapport : </label>
                                                <textarea name="Objet" id="Txt_Objet" class="form-control input-sm" placeholder=""></textarea>
                                            </div>

                                            <input type="file" name="Input_File" id="Input_File" style="display:none;" />
                                            <div class="form-group">
                                                <label for="File_Input_Select">Sélectionner le fichier : </label>
                                                <table border="0" width="100%">
                                                    <tr>
                                                        <td style="width:79%;">
                                                            <input type="text" name="File_Input_Select" id="File_Input_Select" class="form-control input-sm" autocomplete="off"/>
                                                        </td>
                                                        <td style="text-align: right">
                                                            <input type="button" class="btn btn-info" id="Btn_Choose_File" value="Parcourir ..."/>
                                                        </td>
                                                    </tr>
                                                </table>
                                             </div>

                                            <input type="submit" class="btn btn-primary" id="Btn_Rapport_Preventif_Save" value="ENREGISTRER"/>
                                            <input type="reset" class="btn btn-danger pull-right" id="Btn_Rapport_Preventif_Reset" value="ANNULER"/>
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
                                                                        <td>ENREGISTREMENT DE LA CHECKLIST</td>
                                                                        <td><span class="glyphicon glyphicon-remove-sign"></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ENREGISTREMENT DU RAPPORT PREVENTIF</td>
                                                                        <td><span class="glyphicon glyphicon-remove-sign"></span></td>
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
                                        <div id="Check_State" class="col-md-offset-1 col-md-1">
                                            <div class="row">
                                                
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
    <?php require_once 'include/Action.php'; ?>
    
    <script type="text/javascript" src="script/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="script/jquery-ui-1.9.2.js"></script>
    <script type="text/javascript" src="script/jquery.form.min.js"></script>
    <script type="text/javascript" src="script/datepicker.js"></script>
    <script type="text/javascript" src="include/script/Action.js"></script>
    <script type="text/javascript" src="script/My/Rapport.js"></script>
</body>
</html>