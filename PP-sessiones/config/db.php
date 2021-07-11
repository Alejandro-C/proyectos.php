<?php

class DataBase {
    public static function connect() {
        $db = new mysqli('localhost', 'root', '', 'users', 3308);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}