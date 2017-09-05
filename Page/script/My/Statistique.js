$(function()
{
    var Element =
    {
        Urls : {Stat : "../Code/Controleur/Statistique.php"},
        Txt_Annee : "#Txt_Annee",
        Btn_Search : "#Btn_Search",
        Table_Stat : "#Table_Stat"
    };
    
    $("#Menu ul li:first-child").removeClass("active"); 
    $("#Menu ul li#m_statistique").addClass("active");
    
    function createTrStatistique(nom, nbre, data_fault)
    {
        return '<tr>'+
                    '<td>'+nom.toUpperCase()+'</td>'+
                    '<td>'+((parseInt(nbre) < 10) ? "0"+nbre : nbre)+'</td>'+
                    '<td>'+((parseInt(data_fault) < 10) ? "0"+data_fault : data_fault)+'</td>'+
                '</tr>';
    }
    
    function chargerStatistique(data)
    {
        if(data !== null)
        {
            var t_nbre = data.stat_count, t_deft = data.stat_sort;
            var tn = t_nbre.length, td = t_deft.length;
            
            for(i = 0; i<tn; i++)
            {
                var n = 0;
                for(j = 0; j<td; j++)
                {
                    if(t_deft[j].sous_systeme === t_nbre[i].Sous_systeme)
                    {
                        n = parseInt(t_deft[j].Defauts);
                        break;
                    }
                }
                
                var tr = createTrStatistique(t_nbre[i].Sous_systeme, t_nbre[i].Nombre_Composant, n);
                $(Element.Table_Stat).append(tr);
            }
        }
    }
    
    (function()
    {
        $.ajax(
        {
			type : 'get',
			url: Element.Urls.Stat,
            data : "stat=",
			dataType : 'text',
			success : function(e)
            {
                var data = JSON.parse(e);
                chargerStatistique(data);
			}
		});
    })();
    
    $(Element.Btn_Search).click(function(e)
    {
        var txt = $(Element.Txt_Annee).val();
        $.ajax(
        {
            url : Element.Urls.Stat,
            type : "get",
            data : "annees="+txt,
            dataType : "text",
            success : function(e)
            {
                //alert(e);
                var data = JSON.parse(e);
                
                var trs = $(Element.Table_Stat+" tr");
                var t = trs.length;
                
                for(i = 1; i<t; i++)
                {
                    trs[i].remove();
                }
                chargerStatistique(data);
            }
        });
        e.preventDefault();
    });
});