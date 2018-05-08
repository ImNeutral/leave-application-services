<?php
require_once ("DBQueries.php");

class Employees extends DBQueries {
    public static $table        = "employees";
    public static $table_fields = array('id', 'school_id', 'first_name', 'middle_name', 'last_name' );

    public $id = 201316927;

    public static function searchByName ($firstName, $lastName) {
        $firstName = self::escapeValue($firstName);
        $lastName = self::escapeValue($lastName);
        $sql        = "SELECT " . self::tableFieldsString() . " FROM " . static::$table;
        $sql        .= " WHERE first_name='" . $firstName . "' AND last_name='" . $lastName . "'";

        $result  = self::getByQuery($sql);
        $result = $result->fetch_assoc();
        return $result;
    }
}

header('Content-Type: application/json');

//if (isset($_GET['id']) && count($_GET['id']) > 1) {
//    $idCount = count($_GET['id']);
//    $result = array();
//    for ($roll = 0; $roll < $idCount; $roll++) {
//        $result[] = Employees::getById($_GET['id'][$roll]);
//    }
//
//    echo json_encode($result);
//} else {

if( isset($_GET['searchType']) && $_GET['searchType'] == 'name' && isset($_GET['first_name']) && isset($_GET['last_name']) ) {
    echo json_encode( Employees::searchByName($_GET['first_name'], $_GET['last_name']) );
} else {
    if( isset($_GET['id']) && $_GET['id'] > 0 ) {
        $id = $_GET['id'];

        echo json_encode( Employees::getById($id) );
    }
}




//}