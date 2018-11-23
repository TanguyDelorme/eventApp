<?php

// DB table to use
$table = 'event';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'nom', 'dt' => 1 ),
    array( 'db' => 'date', 'dt' => 2 ),
    array( 'db' => 'adresse', 'dt' => 3 ),
    array( 'db' => 'region', 'dt' => 4 )
);


$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'event',
    'host' => 'localhost'
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
