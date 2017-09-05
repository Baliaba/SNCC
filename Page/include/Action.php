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
            <form method="post" id="Form_Embed_Sous_Systeme">
                <div class="form-group">
                    <label for="Sous_Sys_Embed_Name">Nom du sous système : </label>
                    <input type="text" name="Txt_Sous_Sys_Embed_Name" id="Txt_Sous_Sys_Embed_Name" class="form-control input-sm" autocomplete="off"/>
                </div>
                <input type="submit" class="btn btn-primary" id="Btn_SousSys_Embed_Save" value="ENREGISTRER"/>
                <input type="reset" class="btn btn-danger pull-right" id="Btn_SousSys_Embed_Cancel" value="ANNULER"/>
            </form>
            
            <form class="" id="Form_Composant" method="post">
                <label for="Sous_Sys_Val">Choix du sous-système : </label>
                <table border="0" style="width:100%; margin-bottom: 10px;">
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <select id="Sous_Sys_Val" name="Sous_Sys_Val" class="form-control input-sm">
                                    <option value="0">Choisir un sous système</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div id="Icon_Add_Sys" title="Ajouter un sous système">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                            </div>
                        </td>
                    </tr>
                </table>   
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