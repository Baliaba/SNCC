$(function()
{
    var Element =
    {
        Urls : {Modale: "../Code/Controleur/Fenetre_Modale.php", Aps : "../Code/Controleur/CheckList_Aps.php"},
        Btn_Check_List_Add : "#Btn_Checklist_Aps_Add",
        Btn_Check_List_Edit : "#Btn_Checklist_Aps_Edit",
        Btn_Check_List_Delete : "#Btn_Checklist_Aps_Delete",
        Btn_More_Info : ".Detail_CheckList",
        Txt_Search_Composant : "#Txt_Search_Composant",
        Btn_Search : "#Btn_Search",
        Table_Aps : "#Table_Aps",
        Div_Navigation : "#Div_Navigation",
        Combo_Aps_Composant : "#Choix_Aps_Composant",
        Input_Aps : {Temperature:"#Txt_Temperature", Vcc:"#Txt_Vcc", Vb:"#Txt_Vb", Eld:"#Txt_Eld", Psu:"#Txt_Aps_Etat_Psu", Nb_Forcage:"#Txt_Nb_Forcage", Observation:"#Txt_Aps_Observation"}
        ,Form_CheckList_Aps : "#Form_CheckList_Aps"
    };
    
    var Idc = 0, Idca = 0, aps = null;
    
    function createTrAps(data)
    {
        return '<tr data-id="'+data.Id_check+'">'+
                    '<td>'+data.Temperature+' °C</td>'+
                    '<td>'+data.Vcc+'</td>'+
                    '<td>'+data.Vb+'</td>'+
                    '<td>'+data.Eld+'</td>'+
                    '<td>'+data.Psu+'</td>'+
                    '<td>'+data.User_idUser+'</td>'+
                    '<td><span title="Plus d\'infos" data-id="'+data.Id_check+
                    '" class="glyphicon glyphicon-plus-sign Detail_CheckList"></span></td>'+
                    '</tr>';
    }
    
    function chargerAps(data)
    {
        if(data !== null)
        {
            var t = data.length;
            for(i = 0; i<t; i++)
            {
                var tr = createTrAps(data[i]);
                $(Element.Table_Aps).append(tr);
            }
        }
    }
    
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].id_composant + '">' + data[i].Nom_Composant + '</option>';
            $(Element.Combo_Aps_Composant).append(opt);
        }
    }
    
    function selectValue(combo, id)
    {
        var opts = $(combo+" option");
        var t = opts.length;
        
        for(i=0 ; i<t; i++){ opts.eq(i).removeAttr('selected'); }
        
        for(i=0 ; i<t; i++)
        {
            if(parseInt(opts.eq(i).attr('value')) === id)
            {
                opts.eq(i).attr('selected', 'selected');
            }
        }
    }
    
    function resetLine()
    {
        var trs = $(Element.Table_Aps+" tr");
                
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
    
    /************************************** VERIFICATION DU FORMULAIRE DE CHECKLIST APS ***********************************/
    function CheckAps()
    {
        var cpt = 0; 
        var Seq = Element.Input_Aps;
        cpt += CheckInput(Seq.Temperature) ? 0 : 1;
        cpt += CheckInput(Seq.Vcc) ? 0 : 1;
        cpt += CheckInput(Seq.Vb) ? 0 : 1;
        cpt += CheckInput(Seq.Eld) ? 0 : 1;
        cpt += CheckInput(Seq.Psu) ? 0 : 1;
        cpt += CheckInput(Seq.Nb_Forcage) ? 0 : 1;
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
			url: Element.Urls.Aps,
            data : "search=&idc=0",
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerAps(data.Apss);
			}
		});
    })();
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul li#m_checklist").addClass("active"); 
    
    $(Element.Btn_Check_List_Add).click(function(){
        $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Aps).fadeIn("slow");
    });
    $(Element.Btn_Check_List_Edit).click(function()
    {
        if(Idca > 0)
        {
            $.ajax(
            {
                url : Element.Urls.Aps,
                type : "get",
                data : "get_aps="+Idca,
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    aps = JSON.parse(e);
                    var input = Element.Input_Aps;
                    selectValue(Element.Combo_Aps_Composant, parseInt(aps.id_composant));
                    $(input.Temperature).val(aps.Temperature);
                    $(input.Vcc).val(aps.Vcc);
                    $(input.Vb).val(aps.Vb);
                    $(input.Eld).val(aps.Eld);
                    $(input.Psu).val(aps.Psu);
                    $(input.Nb_Forcage).val(aps.Nbre_Forcage);
                    $(input.Observation).val(aps.Observations);
                    $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Aps).fadeIn("slow");
                }
            });
        }
    });
    
    $(Elt.Btn_Check_List_Aps_Cancel).click(function()
    {
        resetLine();
        Idca = 0;
        $(Elt.Dlg_Check_List_Aps+" input, "+Elt.Dlg_Check_List_Aps+" textarea").removeAttr('disabled');
        $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Aps).fadeOut("slow"); 
    });
    
    $(Element.Btn_Check_List_Delete).click(function()
    {
        if(Idca > 0)
        {
            $(Elt.Txt_Delete_Message).text("Voulez vous vraiment supprimer cette CheckList APS ? ");
            $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
        }
    });
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        resetLine();
        Idca = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow"); 
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
        $.ajax(
        {
            url : Element.Urls.Aps,
            type : "get",
            data : "delete="+Idca,
            dataType : "text",
            success : function(e)
            {
                alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Aps+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerAps(data.Apss);
                $(Elt.Btn_Cancel_Deletion).trigger('click');
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Aps).on('click', Element.Btn_More_Info, function()
    {
        var id_aps = parseInt($(this).attr('data-id'));
        $.ajax(
        {
            url : Element.Urls.Aps,
            type : "get",
            data : "get_aps="+id_aps,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var input = Element.Input_Aps;
                selectValue(Element.Combo_Aps_Composant, parseInt(data.id_composant));
                $(input.Temperature).val(data.Temperature+" °C");
                $(input.Vcc).val(data.Vcc);
                $(input.Vb).val(data.Vb);
                $(input.Eld).val(data.Eld);
                $(input.Psu).val(data.Psu);
                $(input.Nb_Forcage).val(data.Nbre_Forcage);
                $(input.Observation).val(data.Observations);
                
                $(Elt.Dlg_Check_List_Aps+' input[type="text"], '+Elt.Dlg_Check_List_Aps+' textarea, '+Elt.Dlg_Check_List_Aps+' select, '+Elt.Btn_Check_List_Aps_Save).attr('disabled', 'disabled');
                $(Elt.Div_Background+", "+Elt.Dlg_Check_List_Aps).fadeIn("slow");
            }
        });
    });
    
    $(Element.Div_Navigation).on('click', 'ul li', function()
    {
       Idc = parseInt($(this).attr('data-composant'));
       $(Element.Txt_Search_Composant).val("");
       $.ajax(
        {
            url : Element.Urls.Aps,
            type : "get",
            data : "search=&idc="+Idc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Aps+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerAps(data.Apss);
            }
        });
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        Idc = 0;
        var txt = $(Element.Txt_Search_Composant).val();
        $.ajax(
        {
            url : Element.Urls.Aps,
            type : "get",
            data : "search="+txt+"&idc="+Idc,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Aps+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerAps(data.Apss);
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Aps).on('click', 'tr', function()
    {
        Idca = parseInt($(this).attr('data-id'));
        resetLine();
       $(this).addClass('actived');
    });
    
    $(Elt.Btn_Check_List_Aps_Save).click(function(e)
    {
        var result = CheckAps();
        var Seq = Element.Input_Aps;
        
        if(result)
        {
            var Aps = 
            {
                Id : Idca,
                Composant : aps.id_composant,
                Temperature : parseFloat($(Seq.Temperature).val()),
                Vcc : parseFloat($(Seq.Vcc).val()),
                Vb : parseFloat($(Seq.Vb).val()),
                Eld : $(Seq.Eld).val(),
                Etat_Psu : $(Seq.Psu).val(),
                NbForcage : parseInt($(Seq.Nb_Forcage).val()),
                Observation : $(Seq.Observation).val()
            };
            var options = 
            { 
                url: Element.Urls.Aps,
                type : "post",
                data : {Aps : JSON.stringify(Aps)},
                success: function(e)
                {
                    //alert(e);
                    var data = JSON.parse(e);
                    var trs = $(Element.Table_Aps+" tr");

                    var t = trs.length;
                    for(i = 1; i<t; i++)
                    {
                        trs[i].remove();
                    }
                    chargerAps(data.Apss);
                    aps = null;
                    $(Elt.Btn_Check_List_Aps_Cancel).trigger('click');
                },
                error: function(e){
                    alert("Erreur : "+e);
                }
            }; 
            $(Element.Form_CheckList_Aps).ajaxSubmit(options);
        }
        e.preventDefault();
    });
});