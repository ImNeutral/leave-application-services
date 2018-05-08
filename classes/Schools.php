<?php
require_once ("DBQueries.php");

class Schools extends DBQueries {
    public static $table        = "schools";
    public static $table_fields = array('id', 'school_name');


}


//
//
//header('Content-Type: application/json');
//if( isset($_GET['id']) && $_GET['id'] > 0 ) {
//    $id = $_GET['id'];
//
//    echo json_encode( Schools::getById($id));
//} else if ( isset($_GET['id']) && $_GET['id'] == 0 ) {
//    echo json_encode( Schools::getAllWithOrder('school_name') );
//}
//
//

//echo Schools::getAll();