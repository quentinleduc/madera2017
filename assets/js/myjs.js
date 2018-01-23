$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );

    function cTrig(clickedid) { 
      
       var box= confirm("êtes-vous sûr de vouloir supprimer cet article?");
        if (box==true)
            document.location.href="index.php?suppArt=" + clickedid;
        else
           return false;
            
      
    }

} );