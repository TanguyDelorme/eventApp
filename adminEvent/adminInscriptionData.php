<?php


// DB table to use
$table = 'inscription';

// Table's primary key
$primaryKey = 'idEvent';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'nom', 'dt' => 0 ),
    array( 'db' => 'prenom', 'dt' => 1 ),
    array( 'db' => 'mail', 'dt' => 2 ),
    array( 'db' => 'idEvent', 'dt' => 3 )
);


$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'event',
    'host' => 'localhost'
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table,$primaryKey, $columns )
);
