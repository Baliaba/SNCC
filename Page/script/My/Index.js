    $(function()
{
    var Element = 
    {
        Urls : {Dashboard: "Page/Dashboard.php", Login : "Code/Controleur/Index.php"},
        User_Name : "#Txt_User_Name",
        Password : "#Txt_Password",
        Remember_Me : "#Remember_Me",
        Btn_Login : "#Btn_Login",
        Ins_Full_Name : "#Txt_Ins_Full_Name",
        Ins_User_Name : "#Txt_Ins_User_Name",
        Ins_Poste_User : "#Combo_Poste_User",
        Ins_Groupe_User : "#Combo_Groupe_User",
        Ins_Password : "#Txt_Ins_Password",
        Ins_Confirm_Password : "#Txt_Confirm_Ins_Password",
        Ins_Btn_Save : "#Btn_Ins_Save",
        Ins_Btn_Cancel : "#Btn_Ins_Cancel",
        Alert : "#Alert_Msg .alert",
        Alert_Text : ".Alert_Text",
        Password_NbLetter : "#Password_NbLetter",
        Confirm_Password_NbLetter : "#Confirm_Password_NbLetter"
    };
    var groupes = null;
    var ajax_event = 1;
    /***************************************** VERIFICATION D'UN CHAMP SELECT ****************************************************/
    function CheckCombo(combo)
    {
        var result = false;
        var parent = $(combo).parent('div.input-group');
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
        var p = $(input).parent('div.input-group');
        
        if($(input).val().length === 0)
        {
            parent.removeClass('has-success').addClass('has-error');
            p.removeClass('has-success').addClass('has-error');
        }
        else{
            parent.removeClass('has-error').addClass('has-success');
            p.removeClass('has-error').addClass('has-success');
            result = true;
        }
        return result;
    }
    
    function checkClass(Elt, className)
    {
        if(Elt.hasClass(className)) { Elt.removeClass(className) };
    }
    
    /***************************************** MESSAGE D'ALERTE ****************************************************/
    function Alert(Message, Error, Time)
    {
        var value = ['Error', 'Success', 'Loading'];
        var Dlg = $(Element.Alert);
        
        $(Element.Alert_Text).text(Message);
        if(Error === value[0])
        {
            checkClass(Dlg, 'alert-success');
            checkClass(Dlg, 'alert-info');
            Dlg.addClass('alert-danger').css({visibility : "visible"});
        }
        else if(Error === value[1])
        {
            checkClass(Dlg, 'alert-danger');
            checkClass(Dlg, 'alert-info');
            Dlg.addClass('alert-success').css({visibility : "visible"});
        }
        else
        {
            checkClass(Dlg, 'alert-danger');
            checkClass(Dlg, 'alert-success');
            Dlg.addClass('alert-info').css({visibility : "visible"});
        }
        
        if(Time > 0){
            setTimeout(function(){ Dlg.css({visibility : "hidden"}); }, Time);
        }
    }
    
    function chargerComboPoste(data)
    {
        var t = data.length;
        for(i = 0; i<t; i++)
        {
            var opt = '<option value="'+data[i].id_Poste+'">'+data[i].titre_poste+'</option>';
            $(Element.Ins_Poste_User).append(opt);
        }
    }
    
    function chargerComboGroupe(data)
    {
        var t = data.length;
        for(i = 0; i<t; i++)
        {
            var opt = '<option value="'+data[i].Id_groupe+'">'+data[i].Intitule_groupe+'</option>';
            $(Element.Ins_Groupe_User).append(opt);
        }
    }
    
    function checkGroupe(ListOfGroup, IdGroupe, password)
    {
        if(ListOfGroup !== null)
        {
            var t = ListOfGroup.length;
            var psize = password.length;
            for(i=0; i<t; i++)
            {
                if(parseInt(ListOfGroup[i].Id_groupe) === IdGroupe)
                {
                    var size = ListOfGroup[i].Caractere_Masquer_groupe.length;
                    var hide_char = password.substr(psize-size, size);
                    
                    if(hide_char === ListOfGroup[i].Caractere_Masquer_groupe){
                        return true;
                    }
                    break;
                }
            }
        }
        return false;
    }
    //RECUPERATION DES COOKIES ET CHARGEMENT DANS LA PAGE
    (function getCookie()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Login,
			data : 'Cookie=1',
			dataType : 'text',
			success : function(e)
            {
				if (e.length > 0) 
                {
                    var obj = JSON.parse(e);
                    $(Element.User_Name).val(obj.Login);
                    $(Element.Password).val(obj.Password);
                    $(Element.Remember_Me).attr("checked", "checked");
                }
			}
		});
    })();
    
    (function chargerCombo()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Login,
			dataType : 'text',
			success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                groupes = data.Groupes;
                chargerComboPoste(data.Postes);
                chargerComboGroupe(groupes);
			}
		});
    })();
    
    $(Element.Btn_Login).click(function(e)
    {
        var compteur = 0;
        compteur += CheckInput(Element.User_Name) ? 1 : 0;
        compteur += CheckInput(Element.Password) ? 1 : 0;
        if(compteur === 0){
            Alert("Veuillez renseigner le nom d'utilisateur et le mot de passe !", 'Error', 5000);
        }
        else
        {
            var remind = $(Element.Remember_Me).is(":checked") ? 1 : 0;
            var username = $(Element.User_Name).val();
            var password = $(Element.Password).val();
            ajax_event = 1;
           $.ajax(
           {
               url : Element.Urls.Login,
               type : "post",
               data : "User_Name="+username+"&Password="+password+"&Remind="+remind,
               dataType : "text",
               success : function(e)
               {
                   //alert(e);
                   if(e === 'Success')
                   {
                       window.location = Element.Urls.Dashboard;
                   }else{
                       Alert("Nom d'utilisateur ou mot de passe incorrect !", "Error", 5000);
                   }
               }
           });
        }
        e.preventDefault();
    });
    
    $(Element.Ins_Btn_Save).click(function(e)
    {
        var compteur = 0;
        compteur += CheckInput(Element.Ins_Full_Name) ? 0 : 1;
        compteur += CheckInput(Element.Ins_User_Name) ? 0 : 1;
        compteur += CheckCombo(Element.Ins_Poste_User) ? 0 : 1;
        compteur += CheckCombo(Element.Ins_Groupe_User) ? 0 : 1;
        compteur += CheckInput(Element.Ins_Password) ? 0 : 1;
        if(compteur === 0)
        {
            if($(Element.Ins_Password).val() !== $(Element.Ins_Confirm_Password).val())
            {
                Alert("Les mots de passe ne sont pas identiques !", "Error", 5000);
            }
            else
            {
                var res = checkGroupe(groupes, parseInt($(Element.Ins_Groupe_User).val()), $(Element.Ins_Confirm_Password).val());
                if(!res)
                {
                    Alert("La chaine de fin de mot de passe ne correspond pas au groupe choisi !", "Error", 5000);
                }
                else
                {
                    var Objet = 
                    {
                        Name : $(Element.Ins_Full_Name).val(),
                        User : $(Element.Ins_User_Name).val(),
                        Poste : $(Element.Ins_Poste_User).val(),
                        Groupe : $(Element.Ins_Groupe_User).val(),
                        Pasw : $(Element.Ins_Password).val()
                    };
                    ajax_event = 2;
                    $.ajax(
                    {
                        url : Element.Urls.Login,
                        type : "post",
                        data : "Inscription="+JSON.stringify(Objet),
                        dataType : "text",
                        success : function(e)
                        {
                            alert(e);
                            if(e === 'Success')
                            {
                                Alert("Inscription réussie ! Vous pouvez vous connecter !", "Success", 5000);
                                $(Element.Ins_Btn_Cancel).trigger('click');
                            }else{
                                Alert("Echec de l'inscription ! Une erreur est survenue !", "Error", 5000);
                            }
                        }
                    });
                }
            }
        }
        else
        {
            Alert("Veuillez renseigner tous les champs !", "Error", 5000);
        }
        e.preventDefault();
    });
    
    $(Element.Ins_Btn_Cancel).click(function()
    {
        $("div.form-group, div.input-group").removeClass('has-error').removeClass('has-success');
        $(Element.Password_NbLetter+", "+Element.Confirm_Password_NbLetter).text("00");
    });
    
    $(Element.Ins_Password).keyup(function()
    {
        var longueur = $(this).val().length;
        $(Element.Password_NbLetter).text((longueur < 10) ? "0"+longueur : longueur);
    });
    
    $(Element.Ins_Confirm_Password).keyup(function()
    {
        var longueur = $(this).val().length;
        $(Element.Confirm_Password_NbLetter).text((longueur < 10) ? "0"+longueur : longueur);
    });
    
    $(document).ajaxStart(function()
    {
        var str = "";
        if(ajax_event === 1){
            str = 'Connexion en cours...';
        }else{
            str = 'Inscription en cours...';
        }
       Alert(str, 'Loading', 0);
    });
});