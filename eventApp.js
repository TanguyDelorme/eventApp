$(()=> {
  $('#example tfoot th').each(function() {
    let title = $('#example thead th').eq( $(this).index()).text();
    $(this).html('<input type="text" placeholder="Search '+title+'" />');
  });
  const table = $('#example').DataTable( {
      "colReorder": true,
      "order": [[0, 'desc']],
      "processing": true,
      "serverSide": true,
      "pageLength": 10,
    //  "ajax": "test.php",
      "select": {style:'single'},
      "dom": 'lBfrtip',
        //hide search sign
      language: { search: "" }
  });
  // Apply the searchBox filter
  $("#example tfoot input").on('keyup change', function() {
    table
      .column( $(this).parent().index()+':visible' )
      .search( this.value )
      .draw();
  });
  $('#example tfoot tr').appendTo('#example thead');
  //make search placeholder
  $('.dataTables_filter input').attr("placeholder", "SEARCH");
});
