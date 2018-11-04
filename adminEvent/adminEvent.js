

$(document).ready(function() {
  //Table to display all the events
  var table = $('#event').DataTable( {
      "colReorder": true,
      "order": [[0, 'asc']],
      "processing": true,
      "serverSide": true,
      "pageLength": 5,
      "ajax": "adminEventData.php",
      "select": {style:'single'},
      "dom": 'lBfrtip',
      "columnDefs": [
        {
          "render" : function(data,type,row){
            var inputadress = row[3];
            return '<a href="https://www.google.com/maps/search/?api=1&query='+inputadress+'" target="_blank">'+inputadress+'</a>'
          },
          "targets" : 3
        },
        {
          "render" : function(data,type,row){
            var inputid = row[0];
            return '<a href="#update'+ inputid +'" data-toggle="modal" style="display: flex;justify-content: space-around;"><button type="button" class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></a>'
          },
          "targets" : 4
        },
        {
          "render" : function(data,type,row){
            var inputid = row[0];
            return '<a href="#delete'+ inputid  +'" data-toggle="modal" style="display: flex;justify-content: space-around;"><button type="button" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i>  </button></a>'
          },
          "targets" : 5
        }
      ],
      language: { search: "" }
  });
  //Search input for each columns
  $('#event tfoot th').each(function() {
    let title = $('#event thead th').eq( $(this).index()).text();
    modif = title.indexOf("Modifier");
    supp = title.indexOf("Supprimer");
    if(modif == -1 && supp == -1){
      $(this).html('<input style="width:100%" type="text" placeholder="Search '+title+'" />');
    }else{
        $(this).html('<div>  </div>');
    }
  });
  // Apply the searchBox filter
  $("#event tfoot input").on('keyup change', function() {
    table
      .column( $(this).parent().index()+':visible' )
      .search( this.value )
      .draw();
  });
  $('#event tfoot tr').appendTo('#event thead');
  //make search placeholder
  $('.dataTables_filter input').attr("placeholder", "SEARCH");

  //Search input for each columns
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

  //Table for subscribed  people to events
  var table2 = $('#inscription').DataTable( {
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
    table2
      .column( $(this).parent().index()+':visible' )
      .search( this.value )
      .draw();
  });
  $('#inscription tfoot tr').appendTo('#inscription thead');
  //make search placeholder
  $('.dataTables_filter input').attr("placeholder", "SEARCH");

  //Hide the jumbotron which contains the person who subscribed to the clicked row
  $('.hideJumbo').hide();

  $('#event tbody').on( 'click', 'tr', function () {
      window.location='#table2';
      //Displays the jumbotron which contains the person who subscribed to the clicked row
      $('.hideJumbo').show();
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        //Select the ID of event (That correspond to the first row and first column)
        var idSelected = table.rows(this).data()[0][0];
        //Displays the personn who have the same idEvent as the id selected
        table2
          .column(3)
          .search(idSelected)
          .draw();
    } );
});
