$(function()
{
    var Element =
    {
        Urls : {Curatif : "../Code/Controleur/Rapport_Curatif.php", Suivi : "../Code/Controleur/Suivi_Equipement.php"},
        Btn_Rapport_Curatif_Add : "#Btn_Rapport_Curatif_Add",
        Btn_Rapport_Curatif_Edit : "#Btn_Rapport_Curatif_Edit",
        Btn_Rapport_Curatif_Delete : "#Btn_Rapport_Curatif_Delete",
        Txt_Search_Date : "#Txt_Search_Date",
        Btn_Search : "#Btn_Search",
        Table_Curatif : "#Table_Curatif",
        Div_Navigation : "#Div_Navigation",
        Input_Curatif : {Combo_Suivi : "#Suivi_Equipement", Email_Honeywell:"#Txt_Email_Honeywell", Email_Expediteur:"#Txt_Email_Expediteur", 
            Txt_Objet:"#Txt_Objet", Input_File:"#Input_File", File_Input_Select:"#File_Input_Select", Btn_Choose_File:"#Btn_Choose_File"},
        Form_Rapport_Curatif : "#Form_Rapport_Curatif"
    };
    var Idr = 0, rapport = null;
    
    function createTrCuratif(data)
    {
        return '<tr data-id="'+data.id_Rapport_Curatif+'">'+
                    '<td>'+data.Date_Rapport_Cur+'</td>'+
                    '<td>'+data.Objet_Rapport_Cur+'</td>'+
                    '<td><a href="#" data-url="../Code/Upload/'+data.Chemin_Fichier+'" class="dwnld">'+
                    '<span class="glyphicon glyphicon-download-alt">'+
                    '</span> Télécharger</a></td>'+
                '</tr>';
    }
    
    function chargerCuratif(data)
    {
        if(data !== null)
        {
            var t = data.length;
            for(i = 0; i<t; i++)
            {
                var tr = createTrCuratif(data[i]);
                $(Element.Table_Curatif).append(tr);
            }
        }
    }
    
    function resetLine()
    {
        var trs = $(Element.Table_Curatif+" tr");
                
        var t = trs.length;
        for(i = 1; i<t; i++)
        {
            trs.eq(i).removeClass('actived');
        }
    }
    
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].idSuiviEquipement + '">' + data[i].Fonction + '</option>';
            $(Element.Input_Curatif.Combo_Suivi).append(opt);
        }
    }
    
    function CheckRapport(checkEmail)
    {
        var cpt = 0; 
        var Rapport = Element.Input_Curatif;
        if(checkEmail){
            cpt += CheckInput(Rapport.Email_Honeywell) ? 0 : 1;
            cpt += CheckInput(Rapport.Email_Expediteur) ? 0 : 1;
        }
        cpt += CheckInput(Rapport.Txt_Objet) ? 0 : 1;
        cpt += CheckInput(Rapport.File_Input_Select) ? 0 : 1;
        
        return (cpt > 0) ? false : true;
    }
    
    (function()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Curatif,
            data : "search=",
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerCuratif(data.Cures);
			}
		});
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Suivi,
            data : "search=&idc=0",
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerCombo(data.Suivis);
			}
		});
    })();
    
    $(Element.Table_Curatif).on('click', '.dwnld', function()
    {
        //alert($(this).attr('data-url'));
        window.open($(this).attr('data-url'));
    });
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul li#m_rapport").addClass("active"); 
    
    $(Element.Btn_Rapport_Curatif_Add).click(function(){
        $(Elt.Div_Background+", "+Elt.Dlg_Rapport_Curatif).fadeIn("slow");
    });
    $(Element.Btn_Rapport_Curatif_Edit).click(function()
    {
        if(Idr > 0)
        {
            $.ajax(
            {
                url : Element.Urls.Curatif,
                type : "get",
                data : "get_rc="+Idr,
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    rapport = JSON.parse(e);
                    var input = Element.Input_Curatif;
                    $(input.Combo_Suivi).val(parseInt(rapport.SuiviEquipement_id));
                    $(input.Email_Honeywell).val(rapport.Email_Honeywell);
                    $(input.Email_Expediteur).val(rapport.Email_Expedit);
                    $(input.Txt_Objet).val(rapport.Objet_Rapport_Cur);
                    $(input.File_Input_Select).val(rapport.Chemin_Fichier);
                }
            });
            $(Elt.Div_Background+", "+Elt.Dlg_Rapport_Curatif).fadeIn("slow");
        }
    });
    $(Elt.Btn_Rapport_Curatif_Cancel).click(function()
    {
        resetLine();
        Idr = 0;
        $(Elt.Dlg_Rapport_Curatif+" input, "+Elt.Dlg_Rapport_Curatif+" textarea");
        $(Elt.Div_Background+", "+Elt.Dlg_Rapport_Curatif).fadeOut("slow"); 
    });
    
    $(Element.Btn_Rapport_Curatif_Delete).click(function()
    {
        if(Idr > 0)
        {
            $(Elt.Txt_Delete_Message).text("Voulez vous vraiment supprimer ce rapport curatif ? ");
            $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
        }
    });
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        resetLine();
        Idr = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow"); 
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
        $.ajax(
        {
            url : Element.Urls.Curatif,
            type : "get",
            data : "delete="+Idr,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Curatif+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerCuratif(data.Cures);
                $(Elt.Btn_Cancel_Deletion).trigger('click');
            }
        });
        e.preventDefault();
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        var txt = $(Element.Txt_Search_Date).val();
        $.ajax(
        {
            url : Element.Urls.Curatif,
            type : "get",
            data : "search="+txt,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Curatif+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerCuratif(data.Cures);
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Curatif).on('click', 'tr', function()
    {
        Idr = parseInt($(this).attr('data-id'));
        resetLine();
       $(this).addClass('actived');
    });
    
    $(Elt.Btn_Rapport_Curatif_Save).click(function(e)
    {
        var Rapport =
        {
            Id : Idr,
            Id_Suivi : rapport.SuiviEquipement_id,
            Email_Honeywell : $(Element.Input_Curatif.Email_Honeywell).val(),
            Email_Expediteur : $(Element.Input_Curatif.Email_Expediteur).val(),
            Statut : rapport.Status,
            Objet : $(Element.Input_Curatif.Txt_Objet).val(),
            Filename : rapport.Chemin_Fichier
        };
        var options = 
        { 
            url: Element.Urls.Curatif,
            type : "post",
            data : {Rapport : JSON.stringify(Rapport), Edit : 1},
            success: function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Curatif+" tr");

                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerCuratif(data.Cures);
                rapport = null;
                $(Elt.Btn_Rapport_Curatif_Cancel).trigger('click');
            },
            error: function(e){
                alert("Erreur : "+e);
            }
        }; 
        $(Element.Form_Rapport_Curatif).ajaxSubmit(options);
        
        e.preventDefault();
    });
});