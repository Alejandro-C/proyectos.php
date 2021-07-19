<?php
class User{
    private $id;
    private $user;
    private $email;
    private $password;

    public function __construct(){
        $this->db = DataBase::connect();
    }

    function setId($id){
        $this->id = $id;
    }

    function setUser($user){
        $this->user = $user;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function setPassword($password){
        $this->password = $password;
    }

    // $typeInput : (email/user) para saber si se intenta logear 
    //              ingresando email o el nombre de usuario.
    // $value : el email que ingreso o el nombre de usuario.
    function getUserToLogin($typeInput, $value, $password){
        $query = "SELECT * FROM users WHERE $typeInput='$value';";
        $user = $this->db->query($query);
        $user = $user->fetch_object();

        // verificar la contraseña
        $verify = password_verify($password, $user->password);

        $response = $verify ? $user : false;

        return $response;
    }

    function getUserbyUser($user){
        $query = "SELECT * FROM users WHERE user='$user';";
        $user = $this->db->query($query);
        $user = $user->fetch_all();

        $response = !empty($user) ? true : false;

        return $response;
    }

    function getUserbyEmail($email){
        $query = "SELECT * FROM users WHERE email='$email';";
        $user = $this->db->query($query);
        $user = $user->fetch_all();

        $response = !empty($user) ? true : false;

        return $response;
    }

    function getUsers(){
        $query = "SELECT * FROM users;";
        $users = $this->db->query($query);
        $users = $users->fetch_all();

        return $users;
    }

    function getUser(){
        $query = "SELECT * FROM users WHERE id=".$this->id.";";
        $users = $this->db->query($query);
        $users = $users->fetch_object();

        return $users;
    }

    function saveUser(){
        $query = "INSERT INTO users VALUES(null, '".$this->user."', '".$this->email."', '".$this->password."');";
        $sql = mysqli_query($this->db, $query);

        return $sql;
    }

     function deleteUser(){
        $query = "DELETE FROM users WHERE id=".$this->id.";";
        $sql = mysqli_query($this->db, $query);

        return $sql;
     }
}