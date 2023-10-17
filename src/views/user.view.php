<?php
    class UserView {

        function showLoginForm(){
            require './templates/loginForm.phtml';
        }

        function showError($error){
            require './templates/error.phtml';
        }
    }
?>