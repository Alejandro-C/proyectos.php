<?php
class User{
    private $id;
    private $user;
    private $email;
    private $password;

    function setUser($user){
        $this->user = $user;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function setPassword($password){
        $this->password = $password;
    }

    public function __construct(){
        $this->db = DataBase::connect();
    }

    function getUsers(){
        $query = "SELECT * FROM users;";
        $users = $this->db->query($query);
        $users = $users->fetch_all();

        return $users;
    }

    function saveUser(){
        $query = "INSERT INTO users VALUES(null, '".$this->user."', '".$this->email."', '".$this->password."');";
        $sql = mysqli_query($this->db, $query);

        return $sql;
    }
}