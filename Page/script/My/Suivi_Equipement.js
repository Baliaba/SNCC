$(function()
{
    var Element =
    {
        Urls : {Modale: "../Code/Controleur/Fenetre_Modale.php", Suivi : "../Code/Controleur/Suivi_Equipement.php"},
        Btn_Suivi_Equipement_Add : "#Btn_Suivi_Equipement_Add",
        Btn_Suivi_Equipement_Edit : "#Btn_Suivi_Equipement_Edit",
        Btn_Suivi_Equipement_Delete : "#Btn_Suivi_Equipement_Delete",
        Btn_More_Info : ".Detail_Suivi",
        Txt_Search_Code_Erreur : "#Txt_Search_Code_Erreur",
        Btn_Search : "#Btn_Search",
        Table_Suivi : "#Table_Suivi",
        Div_Navigation : "#Div_Navigation",
        Combo_Composant : "#Choix_Composant",
        Combo_Intervenant : "#Choix_Intervenant",
        Choix_Action_Curative : "#Choix_Action_Curative",
        Input_Suivi : {Fonction:"#Txt_Fonction", Nature_Defaillance:"#Txt_Nature_Defaillance", Date_Defaillance:"#Txt_Date_Defaillance", Cause:"#Txt_Cause", 
            Code_Erreur:"#Txt_Code_Erreur", Effet:"#Txt_Effet", Detection:"#Txt_Detection", Date_Remise_En_Service:"#Txt_Date_Remise_En_Service"}
    };
    var Idc = 0, Ids = 0;
    
    function createTrSuivi(data)
    {
        return '<tr data-ids="'+data.idSuiviEquipement+'">'+
                    '<td>'+data.Fonction+'</td>'+
                    '<td>'+data.Date_Defaillance+'</td>'+
                    '<td>'+data.Code_Erreur+'</td>'+
                    '<td>'+data.Nom_de_Intervenant+'</td>'+
                    '<td><span title="Plus d\'infos"  data-id="'+data.idSuiviEquipement+
                    '"class="glyphicon glyphicon-plus-sign Detail_Suivi"></span></td>'+
                    '</tr>';
    }
    
    function chargerSuivi(data)
    {
        if(data !== null)
        {
            var t = data.length;
            for(i = 0; i<t; i++)
            {
                var tr = createTrSuivi(data[i]);
                $(Element.Table_Suivi).append(tr);
            }
        }
    }
    
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].id_composant + '">' + data[i].Nom_Composant + '</option>';
            $(Element.Combo_Composant).append(opt);
        }
    }
    
    function chargerComboUser(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].idUser + '">' + data[i].Nom_user + '</option>';
            $(Element.Combo_Intervenant).append(opt);
        }
    }
    
    function resetLine()
    {
        var trs = $(Element.Table_Suivi+" tr");
                
        var t = trs.length;
        for(i = 1; i<t; i++)
        {
            trs.eq(i).removeClass('actived');
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
    
    /************************************** VERIFICATION DU FORMULAIRE DE SUIVI D'EQUIPEMENT ***********************************/
    function CheckSuivi()
    {
        var cpt = 0; 
        var Seq = Element.Input_Suivi;
        cpt += CheckCombo(Element.Combo_Composant) ? 0 : 1;
        cpt += CheckCombo(Element.Combo_Intervenant) ? 0 : 1;
        cpt += CheckInput(Seq.Fonction) ? 0 : 1;
        cpt += CheckInput(Seq.Nature_Defaillance) ? 0 : 1;
        cpt += CheckInput(Seq.Date_Defaillance) ? 0 : 1;
        cpt += CheckInput(Seq.Cause) ? 0 : 1;
        cpt += CheckInput(Seq.Code_Erreur) ? 0 : 1;
        cpt += CheckInput(Seq.Effet) ? 0 : 1;
        cpt += CheckInput(Seq.Detection) ? 0 : 1;
        cpt += CheckCombo(Element.Choix_Action_Curative) ? 0 : 1;
        cpt += CheckInput(Seq.Date_Remise_En_Service) ? 0 : 1;
        return (cpt > 0) ? false : true;
    }
    
    (function getComposant()
    {
        $.ajax(
        {
            type: 'get',
            url: Element.Urls.Modale,
            data: "get_composant=1",
            dataType: 'html',
            success: function (e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerCombo(data.Composant);
            }
        });
    })();
    
    (function getUtilisateur()
    {
        $.ajax(
        {
            type: 'get',
            url: Element.Urls.Modale,
            data: "get_user=1",
            dataType: 'html',
            success: function (e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerComboUser(data.Users);
            }
        });
    })();
    
    (function()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Suivi,
            data : "search=&idc=0",
			dataType : 'text',
			success : function(e)
            {
                var data = JSON.parse(e);
                chargerSuivi(data.Suivis);
			}
		});
    })();
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul li#m_suivi_equipement").addClass("active");
    
    $(Element.Btn_Suivi_Equipement_Add).click(function(){
        $(Elt.Div_Background+", "+Elt.Dlg_Suivi_Equipement).fadeIn("slow");
    });
    $(Element.Btn_Suivi_Equipement_Edit).click(function()
    {
        if(Ids > 0)
        {
            $.ajax(
            {
                url : Element.Urls.Suivi,
                type : "get",
                data : "get_suv="+Ids,
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    
                    var data = JSON.parse(e);
                    var input = Element.Input_Suivi;
                    $(Element.Combo_Composant).val(parseInt(data.Composant_idComposant));
                    $(Element.Combo_Intervenant).val(parseInt(data.Nom_de_Intervenant));
                    $(Element.Choix_Action_Curative).val(parseInt(data.Action_Curative));
                    $(input.Fonction).val(data.Fonction);
                    $(input.Date_Defaillance).val(data.Date_Defaillance);
                    $(input.Nature_Defaillance).val(data.Nature_Defaillance);
                    $(input.Cause).val(data.Causes);
                    $(input.Effet).val(data.Effets);
                    $(input.Detection).val(data.Detection);
                    $(input.Code_Erreur).val(data.Code_Erreur);
                    $(input.Date_Remise_En_Service).val(data.Date_Remise_Service);
                    $(Elt.Div_Background+", "+Elt.Dlg_Suivi_Equipement).fadeIn("slow");
                }
            });
        }
    });
    $(Element.Btn_More_Info).click(function(){
        $(Elt.Div_Background+", "+Elt.Dlg_Suivi_Equipement).fadeIn("slow");
    });
    $(Elt.Btn_Suivi_Cancel).click(function()
    {
        resetLine();
        Ids = 0;
        $(Elt.Dlg_Suivi_Equipement+" input, "+Elt.Dlg_Suivi_Equipement+" textarea, "+Elt.Dlg_Suivi_Equipement+" select").removeAttr('disabled');
        $(Elt.Div_Background+", "+Elt.Dlg_Suivi_Equipement).fadeOut("slow"); 
    });
    
    $(Element.Btn_Suivi_Equipement_Delete).click(function()
    {
        if(Ids > 0)
        {
            $(Elt.Txt_Delete_Message).text("Voulez vous vraiment supprimer ce suivi ? ");
            $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
        }
    });
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        resetLine();
        Ids = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow"); 
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
         $.ajax(
        {
            url : Element.Urls.Suivi,
            type : "get",
            data : "delete="+Ids,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Suivi+" tr");

                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerSuivi(data.Suivis);
                $(Elt.Btn_Cancel_Deletion).trigger('click');
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Suivi).on('click', Element.Btn_More_Info, function()
    {
        var id_suv = parseInt($(this).attr('data-id'));
        $.ajax(
        {
            url : Element.Urls.Suivi,
            type : "get",
            data : "get_suv="+id_suv,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var input = Element.Input_Suivi;
                $(Element.Combo_Composant).val(parseInt(data.Composant_idComposant));
                $(Element.Combo_Intervenant).val(parseInt(data.Nom_de_Intervenant));
                $(Element.Choix_Action_Curative).val(parseInt(data.Action_Curative));
                $(input.Fonction).val(data.Fonction);
                $(input.Date_Defaillance).val(data.Date_Defaillance);
                $(input.Nature_Defaillance).val(data.Nature_Defaillance);
                $(input.Cause).val(data.Causes);
                $(input.Effet).val(data.Effets);
                $(input.Detection).val(data.Detection);
                $(input.Code_Erreur).val(data.Code_Erreur);
                $(input.Date_Remise_En_Service).val(data.Date_Remise_Service);
                $(Elt.Dlg_Suivi_Equipement+' input[type="text"], '+Elt.Dlg_Suivi_Equipement+' textarea, '
                 +Elt.Dlg_Suivi_Equipement+' input[type="datetime"], '+Elt.Dlg_Suivi_Equipement+' select'+', '
                 +Elt.Btn_Suivi_Save).attr('disabled', 'disabled');
                $(Elt.Div_Background+", "+Elt.Dlg_Suivi_Equipement).fadeIn("slow");
            }
        });
    });
    
    $(Element.Div_Navigation).on('click', 'ul li', function()
    {
       Idc = parseInt($(this).attr('data-composant'));
       $.ajax(
        {
            url : Element.Urls.Suivi,
            type : "get",
            data : "search=&idc="+Idc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Suivi+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerSuivi(data.Suivis);
            }
        });
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        var txt = $(Element.Txt_Search_Code_Erreur).val();
        $.ajax(
        {
            url : Element.Urls.Suivi,
            type : "get",
            data : "search="+txt+"&idc="+Idc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Suivi+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerSuivi(data.Suivis);
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Suivi).on('click', 'tr', function()
    {
        Ids = parseInt($(this).attr('data-ids'));
        resetLine();
       $(this).addClass('actived');
    });
    
    $(Elt.Btn_Suivi_Save).click(function(e)
    {
        var result = CheckSuivi();
       
        if(result)
        {
            var Seq = Element.Input_Suivi;
            var Suivi = 
            {
                Ids : Ids,
                Composant : $(Element.Combo_Composant).val(),
                Intervenant : $(Element.Combo_Intervenant).val(),
                Fonction : $(Seq.Fonction).val(),
                Nature_Defaillance : $(Seq.Nature_Defaillance).val(),
                Date_Defaillance : $(Seq.Date_Defaillance).val(),
                Cause : $(Seq.Cause).val(),
                Code_Erreur : $(Seq.Code_Erreur).val(),
                Effet : $(Seq.Effet).val(),
                Detection : $(Seq.Detection).val(),
                Action_Curative : $(Element.Choix_Action_Curative).val(),
                Date_Remise_En_Service : $(Seq.Date_Remise_En_Service).val()
            };
            
            $.ajax(
            {
                type: 'post',
                url: Element.Urls.Suivi,
                data: "Suivi="+JSON.stringify(Suivi),
                dataType: 'text',
                success: function (e)
                {
                    var data = JSON.parse(e);
                    var trs = $(Element.Table_Suivi+" tr");

                    var t = trs.length;
                    for(i = 1; i<t; i++)
                    {
                        trs[i].remove();
                    }
                    chargerSuivi(data.Suivis);
                    $(Elt.Btn_Suivi_Cancel).trigger('click');
                }
            });
        }
        e.preventDefault();
    });
});