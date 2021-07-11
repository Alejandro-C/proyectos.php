<?php
require_once 'models/user.php';

class UserController{
    public function index(){
        require_once 'views/home.php';
    }

    public function signIn(){
        require_once 'views/signIn.php';
    }

    public function login(){
        require_once 'views/login.php';
    }

    public function getUsers(){
        $userModel = new User();
        $users = $userModel->getUsers();

        return $users;
    }
}