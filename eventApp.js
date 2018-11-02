$(()=> {
  $('#example tfoot th').each(function() {
    let title = $('#example thead th').eq( $(this).index()).text();
    $(this).html('<input type="text" placeholder="Search '+title+'" />');
  });
  const table = $('#example').DataTable( {
      "colReorder": true,
      "order": [[0, 'asc']],
      "processing": true,
      "serverSide": true,
      "pageLength": 10,
      "ajax": "loadData.php",
      "select": {style:'single'},
      "dom": 'lBfrtip',
    /*  "columnDefs": [
        {
          "render" : function(data,type,row){
            var inputid = row[0];
            var inid = "1";
            return '<a class="portfolio-item d-block mx-auto btn btn-primary btn-lg rounded-pill" href="#'+inputid+'Modifier" style="width:60px"><i class="far fa-plus-square fa-1x "></i></a><div class="portfolio-modal mfp-hide" id="<?php echo $donnees["id"] ?>Modifier">              <div class="portfolio-modal-dialog bg-white">                <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">                  <i class="fa fa-3x fa-times"></i>                </a>                <div class="container text-center">                  <div class="row">                    <div class="col-lg-8 mx-auto">                      <h2 class="text-secondary text-uppercase mb-0">Modification de levent <?php echo $donnees["nom"]  ?></h2>                      <hr class="star-dark mb-5">             <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">                                      <i class="fa fa-close"></i>Annuler</a>                    </div>                  </div>                </div>              </div>            </div>'
          },
          "targets" : 4
        }
      ],*/
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
