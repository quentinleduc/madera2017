$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );

    

    

} );

function AjoutComposant() {
    console.log("ajout de composant");
        var buttonHtmlString = "  <div class=\"ajout_composant\"> " +
            "<select name=\"composants[]\">" +
              "<option  value=\"1\" >Lisses</option> "+
              "<option  value=\"2\" >Tasseau</option> "+
              "<option  value=\"3\" >Montants verticaux</option>"+
              "<option  value=\"4\" >Contreforts</option>"+
              "<option  value=\"5\" >Sabots d'assemblage</option>"+
              "<option  value=\"6\" >Goujons de fixation</option>"+
              "<option  value=\"7\" >Supports de sol</option>"+
              "<option  value=\"8\" >Boulons</option>"+
              "<option  value=\"9\" >Ardoises</option>"+
              "<option  value=\"10\" >Tuiles</option>"+
              "<option  value=\"11\" >Montants verticaux</option>"+
              "<option  value=\"12\" >Bardage</option>"+
              "<option  value=\"13\" >Pare-pluie</option>"+
              "<option  value=\"14\" >Panneau extérieur</option>"+
              "<option  value=\"15\" >Panneau intérieur</option>"+
              "<option  value=\"16\" >Panneau intermédiaire</option>"+
              "<option  value=\"17\" >Pare-vapeur</option>"+
          "</select>"+
         " <input type=\"number\" name=\"qte[]\"  placeholder=\"Quantité ou longeur ou surface\" >"+
         "</div>"
         ;

        var buttonHtml = $.parseHTML(buttonHtmlString);
        $("#BoxComposant").append(buttonHtml);
    }

function supprimer_module(idModule,idProjet) { 
      alert("coucou");       var box= confirm("êtes-vous sûr de vouloir supprimer ce module ?");
       alert(document.location.href="projet/supprimer_module/" + idModule + '/' + idProjet);  
        if (box==true){
          document.location.href="projet/supprimer_module/" + idModule + '/' + idProjet;
          alert(document.location.href="projet/supprimer_module/" + idModule + '/' + idProjet);
        }
            

        else{
          console.log(document.location.href="projet/supprimer_module/" + idModule + '/' + idProjet);
           return false;
        }
          
            
       
    }

     function supprimer_composant(clickedid) { 
      
       var box= confirm("êtes-vous sûr de vouloir supprimer ce composant ?");
        if (box==true)
            document.location.href="madera/index.php/projet/supprimer_composant/" + clickedid;
        else
           return false;
            
      
    }