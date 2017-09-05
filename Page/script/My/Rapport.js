$(function()
{
    var Element = 
    {
        Urls: {Modale: "../Code/Controleur/Fenetre_Modale.php", Rapport: "../Code/Controleur/Rapport.php"},
        Onglet_li : '#Div_View ul li',
        Onglet : '#Div_View ul a',
        Btn_Check_List_Sncc_Next : '#Btn_Check_List_Sncc_Next',
        Btn_Check_List_Sncc_New : "#Btn_Check_List_Sncc_New",
        Btn_Check_List_Sncc_Reset : '#Btn_Check_List_Sncc_Reset',
        Btn_Check_List_Aps_Next : "#Btn_Check_List_Aps_Next",
        Btn_Check_List_Aps_New : "#Btn_Check_List_Aps_New",
        Btn_Check_List_Aps_Reset : "#Btn_Check_List_Aps_Reset",
        Combo_Sncc_Composant : "#Choix_Sncc_Composant",
        Combo_Aps_Composant : "#Choix_Aps_Composant",
        Input_Sncc : {Statut:"#Txt_Statut", Etat_Power:"#Txt_Etat_Power", Etat_Battery:"#Txt_Etat_Battery", Etat_Cf9:"#Txt_Etat_Cf9", Etat_Sync:"#Txt_Etat_Sync", Etat_Psu:"#Txt_Sncc_Etat_Psu", Observation:"#Txt_Sncc_Observation"},
        Input_Aps : {Temperature:"#Txt_Temperature", Vcc:"#Txt_Vcc", Vb:"#Txt_Vb", Eld:"#Txt_Eld", Psu:"#Txt_Aps_Etat_Psu", Nb_Forcage:"#Txt_Nb_Forcage", Observation:"#Txt_Aps_Observation"},
        Input_Preventif : {Email_Honeywell:"#Txt_Email_Honeywell", Email_Expediteur:"#Txt_Email_Expediteur", Txt_Objet:"#Txt_Objet", Input_File:"#Input_File", File_Input_Select:"#File_Input_Select", Btn_Choose_File:"#Btn_Choose_File"},
        Btn_Rapport_Preventif_Save : "#Btn_Rapport_Preventif_Save",
        Btn_Rapport_Preventif_Reset : "#Btn_Rapport_Preventif_Reset",
        Sncc_State : "#Sncc_State .badge",
        Aps_State : "#Aps_State .badge",
        Glyphicon_Action : "#Message .glyphicon",
        Form_Rapport_Preventif : "#Form_Rapport_Preventif",
    };
    
    var Action = {Checklist : 0, Rapport : 0, Email : 0};
    var ListOfSncc = new Array();
    var ListOfAps = new Array();
    
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
    
    /************************************** VERIFICATION DU FORMULAIRE DE CHECKLIST SNCC ***********************************/
    function CheckSncc()
    {
        var cpt = 0; 
        var Seq = Element.Input_Sncc;
        cpt += CheckCombo(Element.Combo_Sncc_Composant) ? 0 : 1;
        cpt += CheckInput(Seq.Statut) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Power) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Battery) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Cf9) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Sync) ? 0 : 1;
        cpt += CheckInput(Seq.Etat_Psu) ? 0 : 1;
        cpt += CheckInput(Seq.Observation) ? 0 : 1;
        return (cpt > 0) ? false : true;
    }
    
    /************************************** VERIFICATION DU FORMULAIRE DE CHECKLIST APS ***********************************/
    function CheckAps()
    {
        var cpt = 0; 
        var Seq = Element.Input_Aps;
        cpt += CheckCombo(Element.Combo_Aps_Composant) ? 0 : 1;
        cpt += CheckInput(Seq.Temperature) ? 0 : 1;
        cpt += CheckInput(Seq.Vcc) ? 0 : 1;
        cpt += CheckInput(Seq.Vb) ? 0 : 1;
        cpt += CheckInput(Seq.Eld) ? 0 : 1;
        cpt += CheckInput(Seq.Psu) ? 0 : 1;
        cpt += CheckInput(Seq.Nb_Forcage) ? 0 : 1;
        cpt += CheckInput(Seq.Observation) ? 0 : 1;
        return (cpt > 0) ? false : true;
    }
    
    /************************************** VERIFICATION DU FORMULAIRE DE RAPPORT PREVENTIF ***********************************/
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
    
    /****************************************** CHARGEMENT DU COMBOBOX DE COMPOSANT *****************************************/
    function chargerCombo(data)
    {
        var t = data.length;
        for (i = 0; i < t; i++)
        {
            var opt = '<option value="' + data[i].id_composant + '">' + data[i].Nom_Composant + '</option>';
            $(Element.Combo_Sncc_Composant).append(opt);
            $(Element.Combo_Aps_Composant).append(opt);
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
    
    /*********************************************** PASSER D'UN ONGLET A UN AUTRE *********************************************/
    $(Element.Onglet).click(function(e)
    {
        e.preventDefault();
        $(this).tab("show");
    }); 
    
    /*********************************************** PASSER AU RAPPORT PREVENTIF *********************************************/
    $(Element.Btn_Check_List_Sncc_Next+", "+Element.Btn_Check_List_Aps_Next).click(function(e)
    {
        if(ListOfSncc.length === 0 && ListOfAps.length === 0)
        {
            alert("Veuillez remplir au moins une checklist !");
        }
        else
        {
            SwitchTab(1);
            $(Element.Btn_Check_List_Sncc_Next+", "+Element.Btn_Check_List_Aps_Next+", "+
                Element.Btn_Check_List_Sncc_New+", "+Element.Btn_Check_List_Aps_New).addClass('disabled');
        
        }
        e.preventDefault();
    });
    
    /*********************************************** NOUVELLE CHECKLIST SNCC *********************************************/
    $(Element.Btn_Check_List_Sncc_New).click(function(e)
    {
        var result = CheckSncc();
        var Seq = Element.Input_Sncc;
        
        if(result)
        {
            var sncc = 
            {
                Composant : $(Element.Combo_Sncc_Composant).val(),
                Statut : $(Seq.Statut).val(),
                Etat_Power : $(Seq.Etat_Power).val(),
                Etat_Battery : $(Seq.Etat_Battery).val(),
                Etat_Cf9 : $(Seq.Etat_Cf9).val(),
                Etat_Sync : $(Seq.Etat_Sync).val(),
                Etat_Psu : $(Seq.Etat_Psu).val(),
                Observation : $(Seq.Observation).val()
            };
            ListOfSncc.push(sncc);
            var t = ListOfSncc.length;
            $(Element.Sncc_State).text(t < 10 ? "0"+t : t);
            $(Element.Btn_Check_List_Sncc_Reset).trigger('click');
        }
        e.preventDefault();
    });
    
    /********************************************* REINITIALISER LE FORMULAIRE DE CHECKLIST SNCC ****************************************************/
    $(Element.Btn_Check_List_Sncc_Reset).click(function()
    {
        $('input, select, textarea').parent('div.form-group').removeClass('has-error').removeClass('has-success');
    });
    
    /*********************************************** NOUVELLE CHECKLIST APS *********************************************/
    $(Element.Btn_Check_List_Aps_New).click(function(e)
    {
        var result = CheckAps();
        var Seq = Element.Input_Aps;
        
        if(result)
        {
            var aps = 
            {
                Composant : $(Element.Combo_Aps_Composant).val(),
                Temperature : parseFloat($(Seq.Temperature).val()),
                Vcc : parseFloat($(Seq.Vcc).val()),
                Vb : parseFloat($(Seq.Vb).val()),
                Eld : $(Seq.Eld).val(),
                Etat_Psu : $(Seq.Psu).val(),
                NbForcage : parseInt($(Seq.Nb_Forcage).val()),
                Observation : $(Seq.Observation).val()
            };
            ListOfAps.push(aps);
            var t = ListOfAps.length;
            $(Element.Aps_State).text(t < 10 ? "0"+t : t);
            $(Element.Btn_Check_List_Aps_Reset).trigger('click');
        }
        e.preventDefault();
    });
    
    /********************************************* REINITIALISER LE FORMULAIRE DE CHECKLIST APS ****************************************************/
    $(Element.Btn_Check_List_Aps_Reset).click(function()
    {
        $('input, select, textarea').parent('div.form-group').removeClass('has-error').removeClass('has-success');
    });
    
    /********************************************* FORMULAIRE DU RAPPORT PREVENTIF ****************************************************/
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
    
    $(Element.Btn_Rapport_Preventif_Save).click(function(e)
    {
        if(CheckRapport())
        {
            var Rapport =
            {
                Email_Honeywell : $(Element.Input_Preventif.Email_Honeywell).val(),
                Email_Expediteur : $(Element.Input_Preventif.Email_Expediteur).val(),
                Objet : $(Element.Input_Preventif.Txt_Objet).val()
            };
            //alert(JSON.stringify(ListOfSncc));
            //alert(JSON.stringify(ListOfAps));
            var options = 
			{ 
				url: Element.Urls.Rapport,
                type : "post",
                data : {sncc : JSON.stringify(ListOfSncc), aps : JSON.stringify(ListOfAps), rapport:JSON.stringify(Rapport)},
				success: function(e)
				{
                    alert(e);
					var result = JSON.parse(e);
                    var trs = $('#Message table tr');
                    
                    if(result.Checklist === 1)
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
                    //$(this).addClass('disabled');
				},
				error: function(e){
					alert("Erreur : "+e);
				}
			}; 
			$(Element.Form_Rapport_Preventif).ajaxSubmit(options);
        }
        e.preventDefault();
    });
    
    /********************************************* REINITIALISER LE FORMULAIRE DU RAPPORT PREVENTIF ****************************************************/
    $(Element.Btn_Rapport_Curatif_Reset).click(function()
    {
        $('input, select, textarea').parent('div.form-group').removeClass('has-error').removeClass('has-success');
    });
});