$(function()
{
    var Element = 
    {
        Urls : {Modale : "../Code/Controleur/Fenetre_Modale.php", Defaillance : "../Code/Controleur/Defaillance.php"},
        Onglet_li : '#Div_View ul li',
        Onglet : '#Div_View ul a',
        Btn_Suivi_Next_Step : '#Btn_Suivi_Next_Step',
        Btn_Suivi_Reset : '#Btn_Suivi_Reset',
        Btn_Rapport_Curatif_Save : "#Btn_Rapport_Curatif_Save",
        Btn_Rapport_Curatif_Reset : "#Btn_Rapport_Curatif_Reset",
        Combo_Composant : "#Choix_Composant",
        Combo_Intervenant : "#Choix_Intervenant",
        Choix_Action_Curative : "#Choix_Action_Curative",
        Input_Suivi : {Fonction:"#Txt_Fonction", Nature_Defaillance:"#Txt_Nature_Defaillance", Date_Defaillance:"#Txt_Date_Defaillance", Cause:"#Txt_Cause", 
            Code_Erreur:"#Txt_Code_Erreur", Effet:"#Txt_Effet", Detection:"#Txt_Detection", Date_Remise_En_Service:"#Txt_Date_Remise_En_Service"},
        Input_Curatif : {Email_Honeywell:"#Txt_Email_Honeywell", Email_Expediteur:"#Txt_Email_Expediteur", Txt_Objet:"#Txt_Objet",
            Input_File:"#Input_File", File_Input_Select:"#File_Input_Select", Btn_Choose_File:"#Btn_Choose_File"},
        Glyphicon_Action : "#Message .glyphicon",
        Form_Rapport_Curatif : "#Form_Rapport_Curatif"
    };
    var Action = {Suivi : 0, Rapport : 0, Email : 0};
    var Suivi = {};
    
    /***************************************** FONCTION POUR ACTIVER UN ONGLET ****************************************************/
    function SwitchTab(index)
    {
       var li = $(Element.Onglet_li).eq(index);
       li.removeClass('hidden');
       li.children('a').trigger('click');
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
    
    /************************************** VERIFICATION DU FORMULAIRE DE SUIVI D'EQUIPEMENT ***********************************/
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
    
    /****************************************** CHARGEMENT DU COMBOBOX DE COMPOSANT *****************************************/
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
    
    /*********************************************** CHARGEMENT DES COMPOSANTS *********************************************/
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
    
    /*********************************************** PASSER D'UN ONGLET A UN AUTRE *********************************************/
    $(Element.Onglet).click(function(e)
    {
        e.preventDefault();
        $(this).tab("show");
    }); 
   
    /********************************************* ONGLET SUIVI D'EQUIPEMENT ****************************************************/
    $(Element.Btn_Suivi_Next_Step).click(function(e)
    {
        var result = CheckSuivi();
       
        if(result)
        {
            var Seq = Element.Input_Suivi;
            Suivi = 
            {
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
            
            if(parseInt(Suivi.Action_Curative) === 1)
            {
                $(Element.Input_Curatif.Email_Honeywell).attr('disabled', 'disabled');
                $(Element.Input_Curatif.Email_Expediteur).attr('disabled', 'disabled');
            }
            SwitchTab(1);
            $(this).addClass('disabled');
        }
        e.preventDefault();
    });
   
   /********************************************* REINITIALISER LE FORMULAIRE DU SUIVI D'EQUIPEMENT ****************************************************/
   $(Element.Btn_Suivi_Reset).click(function()
   {
       $('input, select, textarea').parent('div.form-group').removeClass('has-error').removeClass('has-success');
   });
   
    /***************************************** ONGLET RAPPORT CURATIF ****************************************************/
    $(Element.Input_Curatif.Btn_Choose_File).click(function(){
        $(Element.Input_Curatif.Input_File).trigger('click'); 
    });
   
    $(Element.Input_Curatif.Input_File).change(function(){
        $(Element.Input_Curatif.File_Input_Select).val($(this).val());
    });
    
    $(Element.Input_Curatif.File_Input_Select).keydown(function(e)
    {
        e.preventDefault();
    });
    
    $(Element.Btn_Rapport_Curatif_Save).click(function(e)
    {
        if(CheckRapport())
        {
            //alert(JSON.stringify(Suivi));
            
            var Rapport =
            {
                Email_Honeywell : $(Element.Input_Curatif.Email_Honeywell).val(),
                Email_Expediteur : $(Element.Input_Curatif.Email_Expediteur).val(),
                Objet : $(Element.Input_Curatif.Txt_Objet).val()
            };
            
            var options = 
			{ 
				url: Element.Urls.Defaillance,
                type : "post",
                data : {Suivi : JSON.stringify(Suivi), Rapport : JSON.stringify(Rapport)},
				success: function(e)
				{
                    //alert(e);
					var result = JSON.parse(e);
                    var trs = $('#Message table tr');
                    
                    if(result.Suivi === 1)
                    {
                        trs.eq(0).children('td').eq(1).children('span').removeClass('glyphicon-remove-sign').addClass('glyphicon-ok-sign');
                    }
                    if(result.Rapport === 1)
                    {
                        trs.eq(1).children('td').eq(1).children('span').removeClass('glyphicon-remove-sign').addClass('glyphicon-ok-sign');
                    }
                    if(result.Email === 1)
                    {
                        trs.eq(2).children('td').eq(1).children('span').removeClass('glyphicon-remove-sign').addClass('glyphicon-ok-sign');
                    }
                    
					SwitchTab(2);
                    $(this).addClass('disabled');
				},
				error: function(e){
					alert("Erreur : "+e);
				}
			}; 
			$(Element.Form_Rapport_Curatif).ajaxSubmit(options);
        }
        e.preventDefault();
    });
   
    /********************************************* REINITIALISER LE FORMULAIRE DU RAPPORT CURATIF ****************************************************/
    $(Element.Btn_Rapport_Curatif_Reset).click(function()
    {
        $('input, select, textarea').parent('div.form-group').removeClass('has-error').removeClass('has-success');
    });
});