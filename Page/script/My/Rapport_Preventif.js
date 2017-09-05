$(function()
{
    var Element =
    {
        Urls : {Preventif : "../Code/Controleur/Rapport_Preventif.php", Rapport: "../Code/Controleur/Rapport.php"},
        Btn_Rapport_Preventif_Add : "#Btn_Rapport_Preventif_Add",
        Btn_Rapport_Preventif_Edit : "#Btn_Rapport_Preventif_Edit",
        Btn_Rapport_Preventif_Delete : "#Btn_Rapport_Preventif_Delete",
        Txt_Search_Date : "#Txt_Search_Date",
        Btn_Search : "#Btn_Search",
        Table_Preventif : "#Table_Preventif",
        Div_Navigation : "#Div_Navigation",
        Input_Preventif : {Email_Honeywell:"#Email_Honeywell", Email_Expediteur:"#Email_Expediteur", Txt_Objet:"#Objet", Input_File:"#Input_File_Prev", File_Input_Select:"#File_Input_Select_Prev", Btn_Choose_File:"#Btn_Choose_File_Prev"}
        ,Form_Rapport_Preventif : "#Form_Rapport_Preventif"
    };
    var idp = 0, rapport = null;
    
    function createTrPreventif(data)
    {
        return '<tr data-id="'+data.idRapport_Prev+'">'+
                    '<td>'+data.Date_Rapport_Prev+'</td>'+
                    '<td>'+data.Objet_Rapport_Prev+'</td>'+
                    '<td><a href="#" data-url="../Code/Upload/'+data.Chemin+'" class="dwnld">'+
                    '<span class="glyphicon glyphicon-download-alt">'+
                    '</span> Télécharger</a></td>'+
                '</tr>';
    }
    
    function chargerPreventif(data)
    {
        if(data !== null)
        {
            var t = data.length;
            for(i = 0; i<t; i++)
            {
                var tr = createTrPreventif(data[i]);
                $(Element.Table_Preventif).append(tr);
            }
        }
    }
    
    function resetLine()
    {
        var trs = $(Element.Table_Preventif+" tr");
                
        var t = trs.length;
        for(i = 1; i<t; i++)
        {
            trs.eq(i).removeClass('actived');
        }
    }
    
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
    
    function CheckRapport()
    {
        var cpt = 0; 
        var Rapport = Element.Input_Preventif;
        cpt += CheckInput(Rapport.Email_Honeywell) ? 0 : 1;
        cpt += CheckInput(Rapport.Email_Expediteur) ? 0 : 1;
        cpt += CheckInput(Rapport.Txt_Objet) ? 0 : 1;
        cpt += CheckInput(Rapport.File_Input_Select) ? 0 : 1;
        
        return (cpt > 0) ? false : true;
    }
    
    (function()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Preventif,
            data : "search=",
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerPreventif(data.Prevs);
			}
		});
    })();
    
    $(Element.Table_Preventif).on('click', '.dwnld', function()
    {
        //alert($(this).attr('data-url'));
        window.open($(this).attr('data-url'));
    });
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul lim_rapport").addClass("active"); 
    
    $(Element.Btn_Rapport_Preventif_Add).click(function(){
        $(Elt.Div_Background+", "+Elt.Dlg_Rapport_Preventif).fadeIn("slow");
    });
    $(Element.Btn_Rapport_Preventif_Edit).click(function()
    {
        if(idp > 0)
        {
            $.ajax(
            {
                url : Element.Urls.Preventif,
                type : "get",
                data : "get_rp="+idp,
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    rapport = JSON.parse(e);
                    var input = Element.Input_Preventif;
                    $(input.Email_Honeywell).val(rapport.Email_Honeywell);
                    $(input.Email_Expediteur).val(rapport.Email_Expedit);
                    $(input.Txt_Objet).val(rapport.Objet_Rapport_Prev);
                    $(input.File_Input_Select).val(rapport.Chemin);
                }
            });
            $(Elt.Div_Background+", "+Elt.Dlg_Rapport_Preventif).fadeIn("slow");
        }
    });
    $(Elt.Btn_Rapport_Preventif_Cancel).click(function()
    {
        resetLine();
        idp = 0;
        $(Elt.Dlg_Rapport_Preventif+" input, "+Elt.Dlg_Rapport_Preventif+" textarea").removeAttr('disabled');
        $(Elt.Div_Background+", "+Elt.Dlg_Rapport_Preventif).fadeOut("slow"); 
    });
    
    $(Element.Btn_Rapport_Preventif_Delete).click(function()
    {
        if(idp > 0)
        {
            $(Elt.Txt_Delete_Message).text("Voulez vous vraiment supprimer ce rapport préventif ? ");
            $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
        }
    });
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        resetLine();
        idp = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow"); 
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
        $.ajax(
        {
            url : Element.Urls.Preventif,
            type : "get",
            data : "delete="+idp,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Preventif+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerPreventif(data.Prevs);
                $(Elt.Btn_Cancel_Deletion).trigger('click');
            }
        });
        e.preventDefault();
    });
    
    $(Element.Input_Preventif.Btn_Choose_File).click(function(){
        $(Element.Input_Preventif.Input_File).trigger('click'); 
    });
   
    $(Element.Input_Preventif.Input_File).change(function(){
        $(Element.Input_Preventif.File_Input_Select).val($(this).val());
    });
    
    $(Element.Input_Preventif.File_Input_Select).keydown(function(e)
    {
        e.preventDefault();
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        var txt = $(Element.Txt_Search_Date).val();
        $.ajax(
        {
            url : Element.Urls.Preventif,
            type : "get",
            data : "search="+txt,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Preventif+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerPreventif(data.Prevs);
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Preventif).on('click', 'tr', function()
    {
        idp = parseInt($(this).attr('data-id'));
        resetLine();
       $(this).addClass('actived');
    });
    
    $(Elt.Btn_Rapport_Preventif_Save).click(function(e)
    {
        if(CheckRapport())
        {
            var Rapport =
            {
                Id : idp,
                Email_Honeywell : $(Element.Input_Preventif.Email_Honeywell).val(),
                Email_Expediteur : $(Element.Input_Preventif.Email_Expediteur).val(),
                Objet : $(Element.Input_Preventif.Txt_Objet).val(),
                Statut : rapport.Status,
                Filename : rapport.Chemin
            };
            var options = 
            { 
                url: Element.Urls.Preventif,
                type : "post",
                data : {Rapport : JSON.stringify(Rapport), Edit : 1},
                success: function(e)
                {
                    //alert(e);
                    var data = JSON.parse(e);
                    var trs = $(Element.Table_Preventif+" tr");

                    var t = trs.length;
                    for(i = 1; i<t; i++)
                    {
                        trs[i].remove();
                    }
                    chargerPreventif(data.Prevs);
                    rapport = null;
                    $(Elt.Btn_Rapport_Preventif_Cancel).trigger('click');
                },
                error: function(e){
                    alert("Erreur : "+e);
                }
            }; 
            $(Element.Form_Rapport_Preventif).ajaxSubmit(options);
        }
      
        e.preventDefault();
    });
});