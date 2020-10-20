<?php
class Utils{
    public static function deleteSession($name){
        if (isset($_SESSION[$name])){
            $_SESSION[$name] = null;
        }
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("location:".base_url);
        } else {
            return true;
        }
    }
}