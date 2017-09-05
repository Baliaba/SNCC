$(function()
{
    var Objet =
    {
        Url : {Navigation : "../Code/Controleur/Navigation.php"},
        Div_Navigation : "#Div_Navigation",
        Icon : '.icon',
        Parent_Class : '.Sous_Systeme',
        Icon_Plus : 'glyphicon-plus',
        Icon_Minus : 'glyphicon-minus',
        Parent_Etat : 'data-extend',
        Items_State : 'hidden',
        Parent_Value : {'true' : 'true', 'false' : 'false'}
    };
    
    function Create_Sous_Systeme_Item(objet)
    {
        var div = '<div id="Sous_Systeme_'+objet.Sous_Systeme.idSous_Systeme+'" class="Sous_Systeme" data-extend="false">'+
                        '<div>'+
                            '<table border="1" style="width:100%;">'+
                                '<tr>'+
                                    '<td class="Icone_Sous_Systeme"><span class="glyphicon glyphicon-plus icon"></span></td>'+
                                    '<td class="Nom_Sous_Systeme">'+objet.Sous_Systeme.Nom_SousSysteme+'</td>'+
                                '</tr>'+
                            '</table>'+
                        '</div>'+
                        '<ul class="hidden">';
                
                var tc = objet.donnees.length, j = 0;
                for(j = 0; j<tc; j++)
                {
                    var c = objet.donnees[j];
                    div += '<li class="Composant" data-composant="'+c.id_composant+'"><a href="#">'+c.Nom_Composant+'</a></li>';
                }
            div += '</ul></div>';
        return div;
    }
    
    (function getAllComposantBySousSysteme()
    {
        $.ajax(
        {
            url : Objet.Url.Navigation,
            type : "get",
            data : "all=all",
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var result = JSON.parse(e);
                var t = result.length, i = 0;
                for(i = 0; i < t; i++)
                {
                    var item = Create_Sous_Systeme_Item(result[i]);
                    $("#Div_Navigation .panel-body").append(item);
                }
            }
        });
    })();
    
    $(Objet.Div_Navigation).on('click', Objet.Icon, function()
    {
       var Parent = $(this).parents(Objet.Parent_Class);
       var Etat = Parent.attr(Objet.Parent_Etat);
       var Items = Parent.children('ul');

       if(Etat === Objet.Parent_Value.true)
       {
           Items.addClass(Objet.Items_State);
           $(this).removeClass(Objet.Icon_Minus).addClass(Objet.Icon_Plus);
           Parent.attr(Objet.Parent_Etat, Objet.Parent_Value.false);
       }
       else
       {
           Items.removeClass(Objet.Items_State);
           $(this).removeClass(Objet.Icon_Plus).addClass(Objet.Icon_Minus);
           Parent.attr(Objet.Parent_Etat, Objet.Parent_Value.true);
       }
    });
});