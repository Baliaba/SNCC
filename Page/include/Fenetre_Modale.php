<div id="Background"></div>

<div class="Dialog" id="Fen_Sous_Systeme">
    <div class="Dialog_Title">AJOUTER UN SOUS SYSTEME</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form class="" id="Form_Sous_Systeme" method="post">
                <div class="form-group">
                    <label for="Sous_Sys_Name">Nom du sous système : </label>
                    <input type="text" name="Sous_Sys_Name" id="Sous_Sys_Name" class="form-control input-sm" autocomplete="off"/>
                </div>
                <input type="submit" class="btn btn-primary" id="Btn_SousSys_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_SousSys_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_Composant">
    <div class="Dialog_Title">AJOUTER UN COMPOSANT</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form class="" id="Form_Composant" method="post">
                <label for="Sous_Sys_Val">Choix du sous-système : </label>
                <div class="form-group">
                    <select id="Sous_Sys_Val" name="Sous_Sys_Val" class="form-control input-sm">
                        <option value="0">Choisir un composant</option>
                    </select>
                </div>
                               
                <div class="form-group">
                    <label for="Txt_Composant_Nom">Nom du composant : </label>
                    <input type="text" name="Txt_Composant_Nom" id="Txt_Composant_Nom" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="Txt_Composant_Date">Date de mise en service : </label>
                    <input type="datetime" name="Txt_Composant_Date" id="Txt_Composant_Date" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="Txt_Composant_Init_Stock">Stock initial : </label>
                    <input type="number" name="Txt_Composant_Init_Stock" id="Txt_Composant_Init_Stock" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <!--<div class="form-group">
                    <label for="Composant_Left_Stock">Stock restant : </label>
                    <input type="number" name="Composant_Left_Stock" id="Composant_Left_Stock" class="form-control input-sm" disabled="disabled" autocomplete="off"/>
                </div>-->
                
                <input type="submit" class="btn btn-primary" id="Btn_Composant_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Composant_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_Rapport_Curatif">
    <div class="Dialog_Title">AJOUTER UN RAPPORT CURATIF</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form id="Form_Rapport_Curatif" method="post">
                <div class="form-group">
                    <label for="Suivi_Equipement">Choisissez un suivi d'équipement :</label>
                    <select id="Suivi_Equipement" name="Suivi_Equipement" class="form-control input-sm">
                        <option value="0">Choisir un suivi d'équipement</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="Txt_Email_Honeywell">Email Honeywell : </label>
                    <input type="email" name="Txt_Email_Honeywell" id="Txt_Email_Honeywell" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="Txt_Email_Expediteur">Email Expéditeur : </label>
                    <input type="email" name="Txt_Email_Expediteur" id="Txt_Email_Expediteur" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="Txt_Objet">Objet du rapport : </label>
                    <textarea name="Txt_Objet" id="Txt_Objet" class="form-control input-sm" placeholder=""></textarea>
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
                        
                <input type="submit" class="btn btn-primary" id="Btn_Rapport_Curatif_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Rapport_Curatif_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_Rapport_Preventif">
    <div class="Dialog_Title">AJOUTER UN RAPPORT PR&Eacute;VENTIF</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form id="Form_Rapport_Preventif" method="post">
                <div class="form-group">
                    <label for="Email_Honeywell">Email Honeywell : </label>
                    <input type="email" name="Email_Honeywell" id="Email_Honeywell" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="Email_Expediteur">Email Expéditeur : </label>
                    <input type="email" name="Email_Expediteur" id="Email_Expediteur" class="form-control input-sm" autocomplete="off"/>
                </div>
                
                <div class="form-group">
                    <label for="Objet">Objet du rapport : </label>
                    <textarea name="Objet" id="Objet" class="form-control input-sm" placeholder=""></textarea>
                </div>
                        
                <input type="file" name="Input_File_Prev" id="Input_File_Prev" style="display:none;" />
                <div class="form-group">
                    <label for="File_Input_Select_Prev">Sélectionner le fichier : </label>
                    <table border="0" width="100%">
                        <tr>
                            <td style="width:79%;">
                                <input type="text" name="File_Input_Select_Prev" id="File_Input_Select_Prev" class="form-control input-sm" autocomplete="off"/>
                            </td>
                            <td style="text-align: right">
                                <input type="button" class="btn btn-info" id="Btn_Choose_File_Prev" value="Parcourir ..."/>
                            </td>
                        </tr>
                    </table>
                 </div>
                        
                <input type="submit" class="btn btn-primary" id="Btn_Rapport_Preventif_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Rapport_Preventif_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_Confirm_Delete">
    <div class="Dialog_Title">CONFIRMATION DE SUPPRESSION</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form id="Form_Delete" method="post">
                <div class="form-group" id="Delete_Message">
                    Voulez vraiment supprimer ce rapport préventif ou ce rapport curatif ?
                </div>
                        
                <input type="submit" class="btn btn-primary" id="Btn_Confirm_Deletion" value="CONTINUER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Cancel_Deletion" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_Suivi_Equipement">
    <div class="Dialog_Title">INFORMATION SUIVI D'EQUIPEMENT</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form class="" id="Form_Suivi_Equipement" method="post">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <label for="Choix_Composant">Choisir un composant : </label>
                            <div class="form-group">
                                <select id="Choix_Composant" name="Choix_Composant" class="form-control input-sm">
                                    <option value="0">Choisir un composant</option>
                                </select>
                            </div>
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
                            <label for="Txt_Action_Curative">Action curative : </label>
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
                                <label for="Txt_Date_Remise_En_Service">Date de remise en service : </label>
                                <input type="datetime" name="Txt_Date_Remise_En_Service" id="Txt_Date_Remise_En_Service" class="form-control input-sm" autocomplete="off"/>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </table>
                        
                <input type="submit" class="btn btn-primary" id="Btn_Suivi_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Suivi_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_CheckList_Sncc">
    <div class="Dialog_Title">INFORMATION CHECKLIST SNCC</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form class="" id="Form_CheckList_Sncc" method="post">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2">
                            <label for="Choix_Sncc_Composant">Choisir un composant : </label>
                            <div class="form-group">
                                <select disabled="disabled" id="Choix_Sncc_Composant" name="Choix_Sncc_Composant" class="form-control input-sm">
                                    <option value="0">Choisir un composant</option>
                                </select>
                            </div>
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
                                <label for="Txt_Etat_Psu">Etat PSU : </label>
                                <input type="text" name="Txt_Etat_Psu" id="Txt_Sncc_Etat_Psu" class="form-control input-sm" autocomplete="off"/>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="Txt_Observation">Observation : </label>
                                <textarea name="Txt_Observation" id="Txt_Sncc_Observation" class="form-control input-sm"></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
                        
                <input type="submit" class="btn btn-primary" id="Btn_Check_List_Sncc_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Check_List_Sncc_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_CheckList_Aps">
    <div class="Dialog_Title">INFORMATION CHECKLIST APS</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form class="" id="Form_CheckList_Aps" method="post">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2">
                            <label for="Choix_Aps_Composant">Choisir un composant : </label>
                            <div class="form-group">
                                <select disabled="disabled" id="Choix_Aps_Composant" name="Choix_Aps_Composant" class="form-control input-sm">
                                    <option value="0">Choisir un composant</option>
                                </select>
                            </div>
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
                        
                <input type="submit" class="btn btn-primary" id="Btn_Check_List_Aps_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Check_List_Aps_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>

<div class="Dialog" id="Fen_Formation">
    <div class="Dialog_Title">AJOUTER UNE FORMATION</div>
    <div class="row" style="padding : 10px;">
        <div class="col-sm-12">
            <form class="" id="Form_Fen_Formation" method="post" enctype="multipart/form-data">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="Txt_Intitule">Intitulé de la formation : </label>
                                <input type="text" name="Txt_Intitule" id="Txt_Intitule" class="form-control input-sm" autocomplete="off"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="Txt_Date_Debut">Date de début : </label>
                                <input type="datetime" name="Txt_Date_Debut" id="Txt_Date_Debut" class="form-control input-sm" autocomplete="off"/>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="Txt_Date_Fin">Date de fin : </label>
                                <input type="datetime" name="Txt_Date_Fin" id="Txt_Date_Fin" class="form-control input-sm" autocomplete="off"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="Txt_Compte_Rendu">Compte rendu : </label>
                                <textarea name="Txt_Compte_Rendu" id="Txt_Compte_Rendu" class="form-control input-sm"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
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
                        </td>
                    </tr>
                </table>
                        
                <input type="submit" class="btn btn-primary" id="Btn_Formation_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_Formation_Cancel" value="ANNULER"/>
            </form>
        </div>
    </div>
</div>