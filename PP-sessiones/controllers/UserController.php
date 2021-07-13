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

    public function validatingSignIn($userData){
        $errors = array();

        // validar el nombre de usuario
        if(!empty($userData['user']) && !is_numeric($userData['user'])){
            if(strlen($userData['user']) > 25){
                $errors['user'] = "El nombre de usuario debe de contener menos de 25 caracteres";
            }
        } else {
            $errors['user'] = "El nombre de usuario no es valido";
        }

        // validar el email
        if(!empty($userData['email']) && filter_var($userData['email'], FILTER_VALIDATE_EMAIL)){
            $validatedEmail = true;
        } else {
            $validatedEmail = false;
            $errors['email'] = "El email no es valido";
        }

        // validar la contraseña
        if(!empty($userData['password'])){
            if(strlen($userData['password']) < 8 || strlen($userData['password']) > 15){
                $errors['password'] = "La contraseña debe contener entre 8 a 15 caracteres";
            }
        } else {
            $errors['password'] = "La contraseña esta vacia";
        }

        return $errors;
    }

    public function saveUser($userData){
        $userModel = new User();

        // cifrar la contraseña
        $securePassword = password_hash($userData['password'], PASSWORD_BCRYPT, ['const'=>4]);

        // enviar los datos al objeto Usuario
        $userModel->setUser($userData['user']);
        $userModel->setEmail($userData['email']);
        $userModel->setPassword($securePassword);

        // guardar el usuario
        $save = $userModel->saveUser();

        return $save;
    }
}