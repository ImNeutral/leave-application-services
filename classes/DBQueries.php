<?php

require_once ("Connection.php");

class DBQueries {

    public static function getAll() {
        $sql        = "SELECT " . self::tableFieldsString() . " FROM " . static::$table;
        $results    = self::query($sql);
        $return     = array();
        foreach ($results as $result) {
            $return[] = $result;
        }
        return $return;
    }

    public static function getAllWithOrder($orderColumn) {
        $sql        = "SELECT " . self::tableFieldsString() . " FROM " . static::$table;
        $sql        .= " ORDER BY " . $orderColumn;
        $results    = self::query($sql);
        $return     = array();
        foreach ($results as $result) {
            $return[] = $result;
        }
        return $return;
    }

    public static function getById($id) {
        $id         = self::escapeValue($id);
        $sql        = "SELECT " . self::tableFieldsString() . " FROM " . static::$table . " ";
        $sql        .= "WHERE id=" . $id;
        return self::query($sql)->fetch_assoc();
    }

    public static function getByQuery($sql = "") {
        $sql    = self::escapeValue($sql);
        $result = run()->query( $sql);
        return $result;
    }

    public function testAttr() {
        $class = $this->get_class_name();
        return $class;
    }

    private static function query($sql = "") {
        $result = run()->query( $sql);
        return $result;
    }

    public static function tableFieldsString() {
        return join(', ', static::$table_fields);
    }

    public static function escapeValue($val) {
        return strip_tags( stripslashes($val) );
    }


}

