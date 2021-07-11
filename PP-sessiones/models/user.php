<?php
class User{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct(){
        $this->db = DataBase::connect();
    }

    function getUsers(){
        $query = "SELECT * FROM users;";
        $users = $this->db->query($query);
        $users = $users->fetch_all();

        return $users;
    }
}