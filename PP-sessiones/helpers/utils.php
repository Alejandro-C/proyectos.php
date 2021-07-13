<?php
class Utils{
    public static function putClass($errors, $field){
        
        if(count($errors) != 0){
            $class = 'border-success';

            if(isset($errors[$field])){
                $class = 'border-danger';
            }

            return $class;
        }
    }
}