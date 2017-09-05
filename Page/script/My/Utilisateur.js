$(function()
{
    var Element =
    {
        Urls : {User : "../Code/Controleur/Utilisateur.php"},
        Txt_Search_User : "#Txt_Search_User",
        Btn_Search : "#Btn_Search",
        Table_User : "#Table_Utilisateur", 
        Table_Poste : "#Table_Poste", 
        Table_Groupe : "#Table_Groupe",
        Btn_Add_Poste : "#Btn_Add_Poste",
        Btn_Add_groupe : "#Btn_Add_Groupe",
        Txt_Poste : "#Txt_Poste",
        Txt_Intitule : "#Txt_Intitule",
        Txt_Chaine_Password : "#Txt_Chaine_Password",
        State : {Id : -1, Name : ""},
        value : ["Poste", "Groupe", "User"]
    };
    var Idg = 0;
    
    function createTrPoste(data)
    {
        return '<tr><td style="width:90%">'+data.titre_poste+'</td>' +
                  '<td><span title="Supprimer le poste" data-poste="'+data.id_Poste+'" class="glyphicon glyphicon-remove Delete_Poste"></span></td>'
                   +'</tr>';
    }
    
    function chargerPoste(data)
    {
        var t = data.length;
        for(i = 0; i<t; i++)
        {
            var tr = createTrPoste(data[i]);
            $(Element.Table_Poste).append(tr);
        }
    }
    
    function createTrGroupe(data)
    {
        return '<tr data-groupe="'+data.Id_groupe+'">'+
                      '<td style="width:50%">'+data.Intitule_groupe+'</td>'+
                      '<td>'+data.Caractere_Masquer_groupe+'</td>'+
                      '<td><span title="Supprimer le groupe" data-groupe="'+data.Id_groupe+'"'+
                      'class="glyphicon glyphicon-remove Delete_Groupe"></span></td></tr>';
    }
    
    function chargerGroupe(data)
    {
        var t = data.length;
        for(i = 0; i<t; i++)
        {
            var tr = createTrGroupe(data[i]);
            $(Element.Table_Groupe).append(tr);
        }
    }
    
    function createTrUtilisateur(data)
    {
        return '<tr>'+
                      '<td>'+data.Nom_user+'</td>'+
                      '<td>'+data.Poste_id+'</td>'+
                      '<td>'+data.Login+'</td>'+
                      '<td>'+data.Groupe_Id_+'</td>'+
                      '<td><span title="Supprimer l\'utilisateur" data-user="'+data.idUser+'" class="glyphicon glyphicon-remove Delete_User"></span></td>'+
                      '</tr>';
    }
    
    function chargerUtilisateur(data)
    {
        if(data !== null)
        {
            var t = data.length;
            for(i = 0; i<t; i++)
            {
                var tr = createTrUtilisateur(data[i]);
                $(Element.Table_User).append(tr);
            }
        }
    }
    
     function showDialog(Name)
    {
        if(Name === Element.value[0]){
            $(Elt.Txt_Delete_Message).text("Voulez vraiment supprimer ce poste ?");
        }else if(Name === Element.value[1])
        {
            $(Elt.Txt_Delete_Message).text("Voulez vraiment supprimer ce groupe ?");
        }else{
            $(Elt.Txt_Delete_Message).text("Voulez vraiment supprimer cet utilisateur ?");
        }
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeIn("slow");
    }
    
    function clearItems(Table)
    {
        var trs = $(Table).children('tbody').children('tr');
        var t = trs.length;
        for(i=1; i<t; i++){
            trs[i].remove();
        }
    }
    
    //CHARGEMENT DES LISTES
    (function getAllList()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.User,
			dataType : 'text',
			success : function(e)
            {
                var data = JSON.parse(e);
                chargerPoste(data.Postes);
                chargerGroupe(data.Groupes);
                chargerUtilisateur(data.Users);
			}
		});
    })();
    
    $(Elt.Btn_Cancel_Deletion).click(function()
    {
        Element.State.Id = -1;
        Element.State.Name = "";
       $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow"); 
    });
    
    $(Element.Btn_Add_Poste).click(function(e)
    {
        var poste = $(Element.Txt_Poste).val();
        if(poste.length !== 0)
        {
            $.ajax(
            {
                type : 'post',
                url: Element.Urls.User,
                data:"Txt_Poste="+poste,
                dataType : 'text',
                success : function(e)
                {
                    if(!isNaN(e))
                    {
                        var obj = {id_Poste : parseInt(e), titre_poste : poste};
                        $(Element.Table_Poste).append(createTrPoste(obj));
                    }
                    $(Element.Txt_Poste).val("");
                }
            });
        }
        e.preventDefault();
    });
    
    $(Element.Btn_Add_groupe).click(function(e)
    {
        var intitule = $(Element.Txt_Intitule).val();
        var chaine = $(Element.Txt_Chaine_Password).val();
        if(intitule.length !== 0 && chaine.length !== 0)
        {
            if(Idg > 0)
            {
                $.ajax(
                {
                    type : 'post',
                    url: Element.Urls.User,
                    data:"Txt_Intitule="+intitule+"&Txt_Chaine_Password="+chaine+"&Idg="+Idg,
                    dataType : 'text',
                    success : function(e)
                    {
                        var data = JSON.parse(e);
                        clearItems(Element.Table_Groupe);
                        chargerGroupe(data.Groupes);
                        $(Element.Txt_Intitule).val("").prop('disabled', false);
                        $(Element.Txt_Chaine_Password).val("");
                        Idg = 0;
                    }
                });
            }
            else
            {
                $.ajax(
                {
                    type : 'post',
                    url: Element.Urls.User,
                    data:"Txt_Intitule="+intitule+"&Txt_Chaine_Password="+chaine,
                    dataType : 'text',
                    success : function(e)
                    {
                        if(!isNaN(e))
                        {
                            var obj = {Id_groupe : parseInt(e), Intitule_groupe : intitule, Caractere_Masquer_groupe : chaine};
                            $(Element.Table_Groupe).append(createTrGroupe(obj));
                            $(Element.Txt_Intitule).val("");
                            $(Element.Txt_Chaine_Password).val("");
                        }
                    }
                });
            }
        }
        e.preventDefault();
    });
    
    $(Element.Table_Poste).on('click', '.Delete_Poste', function()
    {
       var id = parseInt($(this).attr('data-poste'));
       Element.State.Id = id;
       Element.State.Name = Element.value[0];
       showDialog(Element.State.Name);
    });
    
    $(Element.Table_Groupe).on('click', '.Delete_Groupe', function()
    {
       var id = parseInt($(this).attr('data-groupe'));
       Element.State.Id = id;
       Element.State.Name = Element.value[1];
       showDialog(Element.State.Name);
    });
    
    $(Element.Table_Groupe).on('click', 'tr', function()
    {
       Idg = parseInt($(this).attr('data-groupe'));
     
       var tds = $(this).children('td');
       $(Element.Txt_Intitule).val(tds.eq(0).text()).prop('disabled', true);
       $(Element.Txt_Chaine_Password).val(tds.eq(1).text());
       
    });
    
    $(Element.Table_User).on('click', '.Delete_User', function()
    {
       var id = parseInt($(this).attr('data-user'));
       Element.State.Id = id;
       Element.State.Name = Element.value[2];
       showDialog(Element.State.Name);
    });
    
    $(Elt.Btn_Confirm_Deletion).click(function(e)
    {
        if(Element.State.Id > 0 && Element.State.Name.length !== 0)
        {
            var name = Element.State.Name;
            $.ajax(
            {
                type : 'post',
                url: Element.Urls.User,
                data : 'Delete_'+Element.State.Name+"="+Element.State.Id,
                dataType : 'text',
                success : function(e)
                {
                    //alert(e);
                    var data = JSON.parse(e);
                    
                    if(name === Element.value[0])
                    {
                        clearItems(Element.Table_Poste);
                        chargerPoste(data.Postes);
                    }
                    else if(name === Element.value[1])
                    {
                        clearItems(Element.Table_Groupe);
                        chargerGroupe(data.Groupes);
                    }
                    else if(name === Element.value[2]){
                        clearItems(Element.Table_User);
                        chargerUtilisateur(data.Users);
                    }
                }
            });
        }
        Element.State.Id = -1;
        Element.State.Name = "";
        $(Elt.Div_Background+", "+Elt.Dlg_Confirm_Delete).fadeOut("slow");  
        e.preventDefault();
    });
    
    $(Element.Btn_Search).click(function(e)
    {
        var txt = $(Element.Txt_Search_User).val();
         $.ajax(
        {
            url : Element.Urls.User,
            type : "get",
            data : "search="+txt,
            dataType : "text",
            success : function(e)
            {
                var data = JSON.parse(e);
                var trs = $(Element.Table_User+" tr");
                
                var t = trs.length;
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerUtilisateur(data.Users);
            }
        });
        e.preventDefault();
    });
});