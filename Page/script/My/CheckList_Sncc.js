$(function()
{
    var Element =
    {
        Urls : {Modale: "../Code/Controleur/Fenetre_Modale.php", Sncc : "../Code/Controleur/CheckList_SNCC.php"},
        Btn_Check_List_Add : "#Btn_Checklist_Sncc_Add",
        Btn_Check_List_Edit : "#Btn_Checklist_Sncc_Edit",
        Btn_Check_List_Delete : "#Btn_Checklist_Sncc_Delete",
        Btn_More_Info : ".Detail_CheckList",
        Txt_Search_Composant : "#Txt_Search_Composant",
        Btn_Search : "#Btn_Search",
        Table_Sncc : "#Table_SNCC",
        Div_Navigation : "#Div_Navigation",
        Combo_Sncc_Composant : "#Choix_Sncc_Composant",
        Input_Sncc : {Statut:"#Txt_Statut", Etat_Power:"#Txt_Etat_Power", Etat_Battery:"#Txt_Etat_Battery", Etat_Cf9:"#Txt_Etat_Cf9", Etat_Sync:"#Txt_Etat_Sync", Etat_Psu:"#Txt_Sncc_Etat_Psu", Observation:"#Txt_Sncc_Observation"},
        Form_CheckList_Sncc : "#Form_CheckList_Sncc"
    };
    
    var Idc = 0, Idcs = 0, sncc = null;
    
    function createTrSncc(data)
    {
        return '<tr data-id="'+data.idCheck_List_SNCC+'">'+
                    '<td>'+data.Status+'</td>'+
                    '<td>'+data.Etat_Power+'</td>'+
                    '<td>'+data.Etat_Battery+'</td>'+
                    '<td>'+data.User_id+'</td>'+
                    '<td><span title="Plus d\'infos" data-id="'+data.idCheck_List_SNCC+'"'+
                    'class="glyphicon glyphicon-plus-sign Detail_CheckList"></span></td>'+
                    '</tr>';
    }
    
    function chargerSncc(data)
    {
        if(data !== null)
        {
            var t = data.length;
            for(i = 0; i<t; i++)
            {
                var tr = createTrSncc(data[i]);
                $(Element.Table_Sncc).append(tr);
            }
        }
    }
    
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].id_composant + '">' + data[i].Nom_Composant + '</option>';
            $(Element.Combo_Sncc_Composant).append(opt);
        }
    }
    
    function resetLine()
    {
        var trs = $(Element.Table_Sncc+" tr");
                
        var t = trs.length;
        for(i = 1; i<t; i++)
        {
            trs.eq(i).removeClass('actived');
        }
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
    
    /************************************** VERIFICATION DU FORMULAIRE DE CHECKLIST SNCC ***********************************/
    function CheckSncc()
    {
        var cpt = 0; 
        var Seq = Element.Input_Sncc;
        cpt += CheckInput(Seq.Statut) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Power) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Battery) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Cf9) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Sync) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Psu) ? 0 : 1;
        cpt += CheckInput(Seq.Observation) ? 0 : 1;
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
    
    (function()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Sncc,
            data : "search=&idc=0",
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerSncc(data.Snccs);
			}
		});
    })();
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul li#m_checklist").addClass("active"); 
    
    $(Element.Btn_Check_List_Add).click(function(){
        $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Sncc).fadeIn("slow");
    });
    $(Element.Btn_Check_List_Edit).click(function()
    {
        if(Idcs > 0)
        {
            $.ajax(
            {
                url : Element.Urls.Sncc,
                type : "get",
                data : "get_sncc="+Idcs,
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    sncc = JSON.parse(e);
                    var input = Element.Input_Sncc;
                    $(Element.Combo_Sncc_Composant).val(parseInt(sncc.Composant_id));
                    $(input.Statut).val(sncc.Status);
                    $(input.Etat_Power).val(sncc.Etat_Power);
                    $(input.Etat_Battery).val(sncc.Etat_Battery);
                    $(input.Etat_Cf9).val(sncc.Etat_CF9);
                    $(input.Etat_Sync).val(sncc.Etat_Sync);
                    $(input.Etat_Psu).val(sncc.Etat_PSU);
                    $(input.Observation).val(sncc.Observation);
                    $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Sncc).fadeIn("slow");
                }
            });
        }
    });
    $(Elt.Btn_Check_List_Sncc_Cancel).click(function()
    {
        resetLine();
        Idcs = 0;
        $(Elt.Dlg_Check_List_Sncc+" input, "+Elt.Dlg_Check_List_Sncc+" textarea").removeAttr('disabled');
        $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Sncc).fadeOut("slow"); 
    });
    
    $(Element.Btn_Check_List_Delete).click(function()
    {
        if(Idcs > 0)
        {
            $(Elt.Txt_Delete_Message).text("Voulez vous vraiment supprimer cette CheckList SNCC ? ");
            $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
        }
    });
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        resetLine();
        Idcs = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow");
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
        $.ajax(
        {
            url : Element.Urls.Sncc,
            type : "get",
            data : "delete="+Idcs,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Sncc+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerSncc(data.Snccs);
                $(Elt.Btn_Cancel_Deletion).trigger('click');
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Sncc).on('click', Element.Btn_More_Info, function()
    {
        var id_sncc = parseInt($(this).attr('data-id'));
        $.ajax(
        {
            url : Element.Urls.Sncc,
            type : "get",
            data : "get_sncc="+id_sncc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var input = Element.Input_Sncc;
                $(Element.Combo_Sncc_Composant).val(parseInt(data.Composant_id));
                $(input.Statut).val(data.Status);
                $(input.Etat_Power).val(data.Etat_Power);
                $(input.Etat_Battery).val(data.Etat_Battery);
                $(input.Etat_Cf9).val(data.Etat_CF9);
                $(input.Etat_Sync).val(data.Etat_Sync);
                $(input.Etat_Psu).val(data.Etat_PSU);
                $(input.Observation).val(data.Observation);
                
                $(Elt.Dlg_Check_List_Sncc+' input[type="text"], '+Elt.Dlg_Check_List_Sncc+' textarea, '+Elt.Dlg_Check_List_Sncc+' select, '+Elt.Btn_Check_List_Sncc_Save).attr('disabled', 'disabled');
                $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Sncc).fadeIn("slow");
            }
        });
    });
    
    $(Element.Div_Navigation).on('click', 'ul li', function()
    {
       Idc = parseInt($(this).attr('data-composant'));
       $(Element.Txt_Search_Composant).val("");
       $.ajax(
        {
            url : Element.Urls.Sncc,
            type : "get",
            data : "search=&idc="+Idc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Sncc+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerSncc(data.Snccs);
            }
        });
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        Idc = 0;
        var txt = $(Element.Txt_Search_Composant).val();
        $.ajax(
        {
            url : Element.Urls.Sncc,
            type : "get",
            data : "search="+txt+"&idc="+Idc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Sncc+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerSncc(data.Snccs);
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Sncc).on('click', 'tr', function()
    {
        Idcs = parseInt($(this).attr('data-id'));
        resetLine();
       $(this).addClass('actived');
    });
    
    $(Elt.Btn_Check_List_Sncc_Save).click(function(e)
    {
        var result = CheckSncc();
        var Seq = Element.Input_Sncc;
        
        if(result)
        {
            var Sncc = 
            {
                Id : Idcs,
                Composant : sncc.Composant_id,
                Statut : $(Seq.Statut).val(),
                Etat_Power : $(Seq.Etat_Power).val(),
                Etat_Battery : $(Seq.Etat_Battery).val(),
                Etat_Cf9 : $(Seq.Etat_Cf9).val(),
                Etat_Sync : $(Seq.Etat_Sync).val(),
                Etat_Psu : $(Seq.Etat_Psu).val(),
                Observation : $(Seq.Observation).val()
            };
            var options = 
            { 
                url: Element.Urls.Sncc,
                type : "post",
                data : {Sncc : JSON.stringify(Sncc)},
                success: function(e)
                {
                    //alert(e);
                    var data = JSON.parse(e);
                    var trs = $(Element.Table_Sncc+" tr");

                    var t = trs.length;
                    for(i = 1; i<t; i++)
                    {
                        trs[i].remove();
                    }
                    chargerSncc(data.Snccs);
                    sncc = null;
                    $(Elt.Btn_Check_List_Sncc_Cancel).trigger('click');
                },
                error: function(e){
                    alert("Erreur : "+e);
                }
            }; 
        $(Element.Form_CheckList_Sncc).ajaxSubmit(options);
        }
        e.preventDefault();
    });
});