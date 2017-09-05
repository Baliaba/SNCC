$(function()
{
    var Element =
    {
        Urls : {Formation : "../Code/Controleur/Formation.php"},
        Btn_Formation_Add : "#Btn_Formation_Add",
        Btn_Formation_Edit : "#Btn_Formation_Edit",
        Btn_Formation_Delete : "#Btn_Formation_Delete",
        Btn_More_Info : ".Detail_Formation",
        Txt_Search_Intitule : "#Txt_Search_Intitule",
        Btn_Search : "#Btn_Search",
        Table_Formation : "#Table_Formation",
        Div_Table : "#Div_Table"
    };
    show_info = false, Idf = 0, formation = null;
    
    function resetLine()
    {
        var trs = $(Element.Table_Formation+" tr");
                
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
    
    (function()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Formation,
            data : "search=",
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                chargerFormation(data.Forms);
			}
		});
    })();
    
    $(Element.Table_Formation).on('click', '.dwnld', function()
    {
        //alert($(this).attr('data-url'));
        window.open($(this).attr('data-url'));
    });
    
    $(Element.Table_Formation).on('click', Element.Btn_More_Info, function()
    {
        var id_form = parseInt($(this).attr('data-id'));
        $.ajax(
        {
            url : Element.Urls.Formation,
            type : "get",
            data : "get_formation="+id_form,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var input = Elt.Input_Formation;
                $(input.Txt_Intitule).val(data.Intitule_form).attr('disabled', 'disabled');
                $(input.Txt_Date_Debut).val(transform_date(data.Date_debut_form)).attr('disabled', 'disabled');
                $(input.Txt_Date_Fin).val(transform_date(data.date_fin_form)).attr('disabled', 'disabled');
                $(input.Txt_Compte_Rendu).val(data.Compte_rendu_form).attr('disabled', 'disabled');
                $(input.File_Input_Select).val(data.objet_form).attr('disabled', 'disabled');
                $(input.Btn_Choose_File).attr('disabled', 'disabled');
                $(Elt.Btn_Formation_Save).attr('disabled', 'disabled');
                $(Elt.Div_Background+", "+Elt.Dlg_Formation).fadeIn("slow");
                show_info = true;
            }
        });
    });
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul li#m_formation").addClass("active"); 
    
    $(Element.Btn_Formation_Add).click(function(){
        show_info = false;
        $(Elt.Div_Background+", "+Elt.Dlg_Formation).fadeIn("slow");
    });
    
    $(Element.Btn_Formation_Edit).click(function()
    {
        if(Idf > 0)
        {
            $.ajax(
            {
                url : Element.Urls.Formation,
                type : "get",
                data : "get_formation="+Idf,
                dataType : "text",
                success : function(e)
                {
                    //alert(e);
                    formation = JSON.parse(e);
                    var input = Elt.Input_Formation;
                    $(input.Txt_Intitule).val(formation.Intitule_form);
                    $(input.Txt_Date_Debut).val(transform_date(formation.Date_debut_form));
                    $(input.Txt_Date_Fin).val(transform_date(formation.date_fin_form));
                    $(input.Txt_Compte_Rendu).val(formation.Compte_rendu_form);
                    $(input.File_Input_Select).val(formation.objet_form);
                    $(input.Btn_Choose_File);
                    $(Elt.Div_Background+", "+Elt.Dlg_Formation).fadeIn("slow");
                    show_info = true;
                }
            });
        }
    });
    $(Elt.Btn_Formation_Cancel).click(function()
    {
        if(show_info)
        {
            $(Elt.Dlg_Formation+" input, "+Elt.Dlg_Formation+" textarea").removeAttr('disabled');
            show_info = false;
        }
        resetLine();
        Idf = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Formation).fadeOut("slow"); 
    });
    
    $(Element.Btn_Formation_Delete).click(function()
    {
        if(Idf > 0)
        {
            $(Elt.Txt_Delete_Message).text("Voulez vous vraiment supprimer cette formation ? ");
            $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
        }
    });
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        resetLine();
        Idf = 0;
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow"); 
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
        $.ajax(
        {
            url : Element.Urls.Formation,
            type : "get",
            data : "delete="+Idf,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Formation+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerFormation(data.Forms);
                $(Elt.Btn_Cancel_Deletion).trigger('click');
            }
        });
        e.preventDefault();
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        var txt = $(Element.Txt_Search_Intitule).val();
        $.ajax(
        {
            url : Element.Urls.Formation,
            type : "get",
            data : "search="+txt,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                var trs = $(Element.Table_Formation+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerFormation(data.Forms);
            }
        });
        e.preventDefault();
    });
    
    $(Element.Table_Formation).on('click', 'tr', function()
    {
        Idf = parseInt($(this).attr('data-id'));
        resetLine();
        $(this).addClass('actived');
    });
    
    $(Elt.Btn_Formation_Save).click(function(e)
    {
        if(show_info)
        {
            var cpt = 0; 
            cpt += CheckInput(Elt.Input_Formation.Txt_Intitule) ? 0 : 1;
            cpt += CheckInput(Elt.Input_Formation.Txt_Date_Debut) ? 0 : 1;
            cpt += CheckInput(Elt.Input_Formation.Txt_Date_Fin ) ? 0 : 1;
            cpt += CheckInput(Elt.Input_Formation.Txt_Compte_Rendu) ? 0 : 1;
            cpt += CheckInput(Elt.Input_Formation.File_Input_Select) ? 0 : 1;

            if(cpt === 0)
            {
                var Formation =
                {
                    Id : formation.Id_form,
                    Intitule : $(Elt.Input_Formation.Txt_Intitule).val(),
                    Debut : $(Elt.Input_Formation.Txt_Date_Debut).val(),
                    Fin : $(Elt.Input_Formation.Txt_Date_Fin).val(),
                    Compte : $(Elt.Input_Formation.Txt_Compte_Rendu).val(),
                    FileName : formation.objet_form
                };

                var options = 
                { 
                    url: Elt.Urls.Formation,
                    type : "post",
                    data : {Formation : JSON.stringify(Formation), Edit : 1},
                    success: function(e)
                    {
                        var data = JSON.parse(e);
                        var trs = $(Element.Table_Formation+" tr");

                        var t = trs.length;
                        for(i = 1; i<t; i++)
                        {
                            trs[i].remove();
                        }
                        chargerFormation(data.Forms);
                        formation = null;
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