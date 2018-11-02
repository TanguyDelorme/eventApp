

$(document).ready(function() {
  $('#inscription tfoot th').each(function() {
    let title = $('#inscription thead th').eq( $(this).index()).text();
    modif = title.indexOf("Modifier");
    supp = title.indexOf("Supprimer");
    if(modif == -1 && supp == -1){
      $(this).html('<input style="width:100%" type="text" placeholder="Search '+title+'" />');
    }else{
        $(this).html('<div>  </div>');
    }
  });

  var table = $('#inscription').DataTable( {
      "colReorder": true,
      "order": [[0, 'asc']],
      "processing": true,
      "serverSide": true,
      "pageLength": 5,
      "ajax": "adminInscriptionData.php",
      "select": {style:'single'},
      "dom": 'lBfrtip',
      language: { search: "" }
  });
  // Apply the searchBox filter
  $("#inscription tfoot input").on('keyup change', function() {
    table
      .column( $(this).parent().index()+':visible' )
      .search( this.value )
      .draw();
  });
  $('#inscription tfoot tr').appendTo('#inscription thead');
  //make search placeholder
  $('.dataTables_filter input').attr("placeholder", "SEARCH");
  $('#inscription_wrapper').hide();

});
