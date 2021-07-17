<?php
require_once 'models/user.php';

class UserController{
    public function index(){
        require_once 'views/home.php';
    }

    // Otras funciones

    public function delete(){
        if(isset($_GET['id'])){
            $userId = $_GET['id'];
            $userModel = new User();
            $userModel->setId($userId);

            $delete = $userModel->deleteUser();

            header('Location:'.base_url);
        }
    }

    public function getUsers(){
        $userModel = new User();
        $users = $userModel->getUsers();

        return $users;
    }

    // Funciones para el registro

    public function signIn(){
        require_once 'views/signIn.php';
    }

    public function validatingSignIn($userData){
        $userModel = new User();
        $errors = array();

        // validar el nombre de usuario
        if(!empty($userData['user']) && !is_numeric($userData['user'])){
            if(strlen($userData['user']) > 25){
                $errors['user'] = "El nombre de usuario debe de contener menos de 25 caracteres";
            }

            if($userModel->getUserbyUser($userData['user'])){
                $errors['user'] = "El nombre de usuario ya existe, prueba con otro.";
            }
        } else {
            $errors['user'] = "El nombre de usuario no es valido";
        }

        // validar el email
        if(!empty($userData['email']) && filter_var($userData['email'], FILTER_VALIDATE_EMAIL)){
            if($userModel->getUserbyEmail($userData['email'])){
                $errors['email'] = "Este email ya esta registrado, prueba con otro.";
            }
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

    // Funciones para iniciar sesion

    public function login(){
        require_once 'views/login.php';
    }

    public function validatingLogin($userData){
        $userModel = new User();
        $errors = array();
        $user = '';

        // validar el nombre de usuario/email
        if(!empty($userData['user'])){
            // validar si es email o nombre de usuario
            if(filter_var($userData['user'], FILTER_VALIDATE_EMAIL)){
                if(!$userModel->getUserbyEmail($userData['user'])){
                    $errors['user'] = "Este email no esta registrado.";
                } else {
                    $user = 'email';
                }
            } else {
                if (!$userModel->getUserbyUser($userData['user'])){
                    $errors['user'] = "Este usuario no esta registrado.";
                } else {
                    $user = 'user';
                }
            }
        } else {
            $errors['user'] = "Este campo esta vacio.";
        }

        // validar la contraseña
        if(!empty($userData['password'])){
            if(strlen($userData['password']) < 8 || strlen($userData['password']) > 15){
                $errors['password'] = "La contraseña debe contener entre 8 a 15 caracteres";
            }
        } else {
            $errors['password'] = "La contraseña esta vacia";
        }

        // validar usuario/email y contraseña
        if(($user == 'email' || $user == 'user') && ($userModel->getUserToLogin($user, $userData['user'], $userData['password']))){
            // se inicia sesion
            echo "Todo bien todo correcto";
            die();
        } else {
            $errors['password'] = "Contraseña incorrecta";  
        }

        return $errors;
    }
}