var Elt =
        {
            Urls: {Modale: "../Code/Controleur/Fenetre_Modale.php", Formation : "../Code/Controleur/Formation.php"},
            Div_Background: "#Background",
            Dlg_Sous_Systeme: "#Fen_Sous_Systeme",
            Dlg_Composant: "#Fen_Composant",
            Dlg_Rapport_Curatif: "#Fen_Rapport_Curatif",
            Dlg_Rapport_Preventif: "#Fen_Rapport_Preventif",
            Dlg_Confirm_Delete: "#Fen_Confirm_Delete",
            Dlg_Suivi_Equipement: "#Fen_Suivi_Equipement",
            Dlg_Check_List_Sncc: "#Fen_CheckList_Sncc",
            Dlg_Check_List_Aps: "#Fen_CheckList_Aps",
            Dlg_Formation: "#Fen_Formation",
            Ssm_Sous_Systeme: "#Ssm_Sous_Systeme",
            Ssm_Composant: "#Ssm_Composant",
            Ssm_Creer_Formation: "#Ssm_Creer_Formation",
            Btn_SousSys_Save: "#Btn_SousSys_Save",
            Btn_SousSys_Cancel: "#Btn_SousSys_Cancel",
            Btn_Composant_Save: "#Btn_Composant_Save",
            Btn_Composant_Cancel: "#Btn_Composant_Cancel",
            Btn_Rapport_Curatif_Save: "#Btn_Rapport_Curatif_Save",
            Btn_Rapport_Curatif_Cancel: "#Btn_Rapport_Curatif_Cancel",
            Btn_Rapport_Preventif_Save: "#Btn_Rapport_Preventif_Save",
            Btn_Rapport_Preventif_Cancel: "#Btn_Rapport_Preventif_Cancel",
            Btn_Confirm_Deletion: "#Btn_Confirm_Deletion",
            Btn_Cancel_Deletion: "#Btn_Cancel_Deletion",
            Btn_Suivi_Save: "#Btn_Suivi_Save",
            Btn_Suivi_Cancel: "#Btn_Suivi_Cancel",
            Btn_Check_List_Sncc_Save: "#Btn_Check_List_Sncc_Save",
            Btn_Check_List_Sncc_Cancel: "#Btn_Check_List_Sncc_Cancel",
            Btn_Check_List_Aps_Save: "#Btn_Check_List_Aps_Save",
            Btn_Check_List_Aps_Cancel: "#Btn_Check_List_Aps_Cancel",
            Btn_Formation_Save: "#Btn_Formation_Save",
            Btn_Formation_Cancel: "#Btn_Formation_Cancel",
            Txt_Delete_Message: "#Delete_Message",
            Txt_Sous_Sys_Name: "#Sous_Sys_Name",
            Form_Composant : "#Form_Composant",
            Combo_Sous_Sys_Val: "#Sous_Sys_Val",
            Txt_Composant_Nom : "#Txt_Composant_No",
            Txt_Composant_Date : "#Txt_Composant_Date",
            Txt_Composant_Init_Stock : "#Txt_Composant_Init_Stock",
            Form_Fen_Formation : "#Form_Fen_Formation",
            Input_Formation : {Txt_Intitule : "#Txt_Intitule", Txt_Date_Debut : "#Txt_Date_Debut", Txt_Date_Fin : "#Txt_Date_Fin",
                                Txt_Compte_Rendu : "#Txt_Compte_Rendu", Input_File : "table tr td #Input_File", File_Input_Select : "table tr td #File_Input_Select",
                                Btn_Choose_File : "table tr td #Btn_Choose_File"},
            Table_Formation : "#Table_Formation"
        };
        var show_info = false;
        
        function cut_text(text, length)
        {
            if(text.length < length)
            {
                return text;
            }
            else
            {
                var str = "";
                str = text.substr(0, length-4);
                str += "...";
                return str;
            }
        }
    
        function transform_date(value)
        {
            var tab = value.split('-');
            if(tab.length === 3)
            {
                return tab[2]+"/"+tab[1]+"/"+tab[0];
            }
            return value;
        }

        function createTrFormation(data)
        {
            return '<tr data-id="'+data.Id_form+'">'+
                        '<td title="'+data.Intitule_form+'">'+cut_text(data.Intitule_form, 30)+'</td>'+
                        '<td>'+transform_date(data.Date_debut_form)+'</td>'+
                        '<td>'+transform_date(data.date_fin_form)+'</td>'+
                        '<td title="'+data.Compte_rendu_form+'">'+cut_text(data.Compte_rendu_form, 40)+'</td>'+
                        '<td><a href="#" data-url="../Code/Upload/Formation/'+data.objet_form+'" class="dwnld">'+
                        '<span class="glyphicon glyphicon-download-alt"></span> Télécharger</a></td>'+
                        '<td>'+data.id_user+'</td>'+
                        '<td><span title="Plus d\'infos" data-id="'+data.Id_form+'" class="glyphicon glyphicon-plus-sign Detail_Formation"></span></td>'+
                    '</tr>';
        }

        function chargerFormation(data)
        {
            if(data !== null)
            {
                var t = data.length;
                for(i = 0; i<t; i++)
                {
                    var tr = createTrFormation(data[i]);
                    $(Elt.Table_Formation).append(tr);
                }
            }
        }
    
$(function ()
{
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].idSous_Systeme + '">' + data[i].Nom_SousSysteme + '</option>';
            $(Elt.Combo_Sous_Sys_Val).append(opt);
        }
    }
    
    
    /***************************************** VERIFICATION D'UN CHAMP SELECT ****************************************************/
    function CheckCombo(combo)
    {
        var result = false;
        var parent = $(combo).parent('div.form-group');
        if(parseInt($(combo).val()) === 0)
        {
            parent.removeClass('has-success').addClass('has-error');
        }
        else{
            parent.removeClass('has-error').addClass('has-success');
            result = true;
        }
        return result;
    }
    
    /***************************************** VERIFICATION D'UN CHAMP INPUT ****************************************************/
    function CheckInput(input)
    {
        var result = false;
        var parent = $(input).parent('div.form-group');
        if($(input).val().length === 0)
        {
            parent.removeClass('has-success').addClass('has-error');
        }
        else{
            parent.removeClass('has-error').addClass('has-success');
            result = true;
        }
        return result;
    }
    
    (function test_privileges()
    {
        $.ajax(
        {
            type : 'post',
            url: Elt.Urls.Modale,
            data : "test_group=1",
            dataType : 'text',
            success : function(e)
            {
                if(parseInt(e)===1) $('.Dialog .btn-primary').addClass('hidden');
                $(Elt.Btn_Formation_Save).removeClass('hidden');
            }
        });
    
    })();
    
    (function getSousSysteme()
    {
        $.ajax(
        {
            type: 'get',
            url: Elt.Urls.Modale,
            data: "get_sous_systeme=1",
            dataType: 'html',
            success: function (e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerCombo(data.ss);
            }
        });
    })();

    $(Elt.Ssm_Sous_Systeme).click(function () {
        $(Elt.Div_Background + ", " + Elt.Dlg_Sous_Systeme).fadeIn("slow");
    });
    $(Elt.Btn_SousSys_Cancel).click(function () {
        $(Elt.Div_Background + ", " + Elt.Dlg_Sous_Systeme).fadeOut("slow");
    });
    $(Elt.Ssm_Composant).click(function () {
        $(Elt.Div_Background + ", " + Elt.Dlg_Composant).fadeIn("slow");
    });
    $(Elt.Btn_Composant_Cancel).click(function () {
        $(Elt.Div_Background + ", " + Elt.Dlg_Composant).fadeOut("slow");
    });

    $(Elt.Ssm_Creer_Formation).click(function () {
        show_info = false;
        $(Elt.Div_Background + ", " + Elt.Dlg_Formation).fadeIn("slow");
    });
    $(Elt.Btn_Formation_Cancel).click(function () {
        $(Elt.Div_Background + ", " + Elt.Dlg_Formation).fadeOut("slow");
    });

    $(Elt.Btn_SousSys_Save).click(function (e)
    {
        if ($(Elt.Txt_Sous_Sys_Name).val().length !== 0)
        {
            $.ajax(
            {
                url: Elt.Urls.Modale,
                type: "post",
                data: "Sous_Sys_Name=" + $(Elt.Txt_Sous_Sys_Name).val(),
                dataType: "text",
                success: function (e)
                {
                    //alert(e);
                    $(Elt.Txt_Sous_Sys_Name).val("");
                }
            });
        }
        e.preventDefault();
    });

    $(Elt.Btn_SousSys_Cancel).click(function (e)
    {
        $(Elt.Txt_Sous_Sys_Name).val("");
        e.preventDefault();
    });
    
    $(Elt.Btn_Composant_Save).click(function(e)
    {
        var cpt = 0; 
        cpt += CheckCombo(Elt.Combo_Sous_Sys_Val) ? 0 : 1;
        cpt += CheckInput(Elt.Txt_Composant_Nom) ? 0 : 1;
        cpt += CheckInput(Elt.Txt_Composant_Date) ? 0 : 1;
        cpt += CheckInput(Elt.Txt_Composant_Init_Stock ) ? 0 : 1;
        
        if(cpt === 0)
        {
            var Objet =
            {
                Sous_Sys : $(Elt.Combo_Sous_Sys_Val).val(),
                Nom : $(Elt.Txt_Composant_Nom).val(),
                Date : $(Elt.Txt_Composant_Date).val(),
                Stock : parseInt($(Elt.Txt_Composant_Init_Stock ).val())
            }
            $.ajax(
            {
                url : Elt.Urls.Modale,
                type : "post",
                data : "Composant="+JSON.stringify(Objet),
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    if(e === 'Success')
                    {
                        document.querySelector(Elt.Form_Composant).reset();
                    }else{
                        alert("Echec de l'enregistrement ! Une erreur est survenue !");
                    }
                }
            });
        }
        e.preventDefault();
    });
    
    $(Elt.Input_Formation.Btn_Choose_File).click(function(){
        $(Elt.Input_Formation.Input_File).trigger('click'); 
    });
   
    $(Elt.Input_Formation.Input_File).change(function(){
        $(Elt.Input_Formation.File_Input_Select).val($(this).val());
    });
    
    $(Elt.Input_Formation.File_Input_Select).keydown(function(e)
    {
        e.preventDefault();
    });
    
    $(Elt.Btn_Formation_Save).click(function(e)
    {
        var cpt = 0; 
        cpt += CheckInput(Elt.Input_Formation.Txt_Intitule) ? 0 : 1;
        cpt += CheckInput(Elt.Input_Formation.Txt_Date_Debut) ? 0 : 1;
        cpt += CheckInput(Elt.Input_Formation.Txt_Date_Fin ) ? 0 : 1;
        cpt += CheckInput(Elt.Input_Formation.Txt_Compte_Rendu) ? 0 : 1;
        cpt += CheckInput(Elt.Input_Formation.File_Input_Select) ? 0 : 1;
        
        if(!show_info)
        {
            if(cpt === 0)
            {
                var Formation =
                {
                    Intitule : $(Elt.Input_Formation.Txt_Intitule).val(),
                    Debut : $(Elt.Input_Formation.Txt_Date_Debut).val(),
                    Fin : $(Elt.Input_Formation.Txt_Date_Fin).val(),
                    Compte : $(Elt.Input_Formation.Txt_Compte_Rendu).val()
                };

                var options = 
                { 
                    url: Elt.Urls.Formation,
                    type : "post",
                    data : {Formation : JSON.stringify(Formation)},
                    success: function(e)
                    {
                        if($(Elt.Table_Formation) !== undefined)
                        {
                            var data = JSON.parse(e);
                            var trs = $(Elt.Table_Formation+" tr");

                            var t = trs.length;
                            for(i = 1; i<t; i++)
                            {
                                trs[i].remove();
                            }
                            chargerFormation(data.Forms);
                        }
                        $(Elt.Btn_Formation_Cancel).trigger('click');
                    },
                    error: function(e){
                        alert("Erreur : "+e);
                    }
                }; 
                $(Elt.Form_Fen_Formation).ajaxSubmit(options);
            }
        }
        e.preventDefault();
    });
});