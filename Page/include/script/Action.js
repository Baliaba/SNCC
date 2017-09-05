$(function()
{
    var Element = 
    {
        Urls : {Modale : "../Code/Controleur/Fenetre_Modale.php"},
        Div_Background: "#Background",
        Dlg_Composant: "#Fen_Composant",
        Btn_SousSys_Save: "#Btn_SousSys_Embed_Save",
        Btn_SousSys_Cancel: "#Btn_SousSys_Embed_Cancel",
        Btn_Composant_Save: "#Btn_Composant_Save",
        Btn_Composant_Cancel: "#Btn_Composant_Cancel",
        Form_Embed_Sous_Systeme : "#Form_Embed_Sous_Systeme",
        Txt_Sous_Sys_Embed_Name : "#Txt_Sous_Sys_Embed_Name",
        Form_Composant : "#Form_Composant",
        Combo_Sous_Sys_Val: "#Sous_Sys_Val",
        Txt_Composant_Nom : "#Txt_Composant_Nom",
        Txt_Composant_Date : "#Txt_Composant_Date",
        Txt_Composant_Init_Stock : "#Txt_Composant_Init_Stock",
        Icon_Add_Sys : "#Icon_Add_Sys",
        Icon_Add_Composant : ".Icon_Add_Composant",
        Combo_Composant : "#Choix_Composant",
        Combo_Sncc_Composant : "#Choix_Sncc_Composant",
        Combo_Aps_Composant : "#Choix_Aps_Composant"
    };
    
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].idSous_Systeme + '">' + data[i].Nom_SousSysteme + '</option>';
            $(Element.Combo_Sous_Sys_Val).append(opt);
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
    
    function chargerComboComposant(data, combo)
    {
        var trs = $(combo+" option");     
        var ts = trs.length;
        for(i = 1; i<ts; i++)
        {
            trs.eq(i).remove();
        }
        
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].id_composant + '">' + data[i].Nom_Composant + '</option>';
            $(combo).append(opt);
        }
    }
    
    function getComposants(combo)
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
                chargerComboComposant(data.Composant, combo);
            }
        });
    }
    
    function getSousSysteme()
    {
        $.ajax(
        {
            type: 'get',
            url: Element.Urls.Modale,
            data: "get_sous_systeme=1",
            dataType: 'html',
            success: function (e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerCombo(data.ss);
            }
        });
    };
    
    getSousSysteme();
    
    $(Element.Btn_SousSys_Cancel).click(function() 
    {
        $(Element.Form_Embed_Sous_Systeme).fadeOut("slow");
        $(Element.Txt_Sous_Sys_Embed_Name).val("");
    });
    
    $(Element.Icon_Add_Composant).click(function () 
    {
        $(Element.Div_Background + ", " + Element.Dlg_Composant).fadeIn("slow");
    });
    
    $(Element.Btn_Composant_Cancel).click(function () 
    {
        $(Element.Div_Background + ", " + Element.Dlg_Composant).fadeOut("slow");
        $(Element.Btn_SousSys_Cancel).trigger('click');
    });
    
    $(Element.Icon_Add_Sys).click(function()
    {
        $(Element.Form_Embed_Sous_Systeme).fadeIn("slow");
    });
    
    $(Element.Btn_SousSys_Save).click(function (e)
    {
        if ($(Element.Txt_Sous_Sys_Embed_Name).val().length !== 0)
        {
            $.ajax(
            {
                url: Element.Urls.Modale,
                type: "post",
                data: "Sous_Sys_Name=" + $(Element.Txt_Sous_Sys_Embed_Name).val(),
                dataType: "text",
                success: function (e)
                {
                    $(Element.Txt_Sous_Sys_Embed_Name).val("");
                    var trs = $(Element.Combo_Sous_Sys_Val+" option");
                
                    var t = trs.length;
                    for(i = 1; i<t; i++)
                    {
                        trs.eq(i).remove();
                    }
                    getSousSysteme();
                    $(Element.Form_Embed_Sous_Systeme).fadeOut("slow");
                }
            });
        }
        e.preventDefault();
    });
    
    $(Element.Btn_Composant_Save).click(function(e)
    {
        var cpt = 0; 
        cpt += CheckCombo(Element.Combo_Sous_Sys_Val) ? 0 : 1;
        cpt += CheckInput(Element.Txt_Composant_Nom) ? 0 : 1;
        cpt += CheckInput(Element.Txt_Composant_Date) ? 0 : 1;
        cpt += CheckInput(Element.Txt_Composant_Init_Stock ) ? 0 : 1;
        
        if(cpt === 0)
        {
            var Objet =
            {
                Sous_Sys : $(Element.Combo_Sous_Sys_Val).val(),
                Nom : $(Element.Txt_Composant_Nom).val(),
                Date : $(Element.Txt_Composant_Date).val(),
                Stock : parseInt($(Element.Txt_Composant_Init_Stock ).val())
            };
            $.ajax(
            {
                url : Element.Urls.Modale,
                type : "post",
                data : "Composant="+JSON.stringify(Objet),
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    if(e === 'Success')
                    {
                        getComposants(Element.Combo_Composant);
                        getComposants(Element.Combo_Sncc_Composant);
                        getComposants(Element.Combo_Aps_Composant);
                        document.querySelector(Element.Form_Composant).reset();
                        $(Element.Btn_Composant_Cancel).trigger('click');
                    }else{
                        alert("Echec de l'enregistrement ! Une erreur est survenue !");
                    }
                }
            });
        }
        e.preventDefault();
    });
});