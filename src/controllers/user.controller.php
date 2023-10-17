<?php
require_once './src/models/user.model.php';
require_once './src/views/user.view.php';

class UserController {
    private $userModel;
    private $userView;

    function __construct(){
        $this->userModel = new UserModel();
        $this->userView = new UserView();
    }

    function showLogin(){
        $this-> userView->showLoginForm();
    }

    function initializeSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function login(){
        $username= $_POST['username'];
        $password= $_POST['password'];

        if(empty($username)||empty($password)){
            $this->userView->showError("Debe completar los campos");
            return;
        }

        $user = $this->userModel->getUser($username);
        
        if ($user && password_verify($password, $user->password)){
            $this->initializeSession();
            $_SESSION['id'] = $user->id;
            $_SESSION['user'] = $user->username;
            header('Location: ' . BASE_URL . 'administracion-agentes');
        } else {
            $this->userView->showError("Datos incorrectos");
        }
    }

    function logout(){
        $this->initializeSession();
        session_destroy();
        header('Location: ' . BASE_URL);
    }

    function verifyUser(){
        $this->initializeSession();
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'iniciar-sesion');
            die();
        }
    }

    /* function isLoggedIn(){
        $this->initializeSession();
        if(isset($_SESSION['user'])) {
            $logged = true;
        } else {
            $logged = false;
        }

        require_once './templates/header.phtml';
    }  CAMBIAR PARA HEADER? */
}
?>
