<?php

class RoleView
{
    public function showRoles($roles)
    {
        require './templates/rolesList.phtml';
    }

    public function showAdminRoles($roles){
        require './templates/AdminRolesList.phtml';
    }

    function showFormRoleAdmin(){
        require './templates/addRoleAdmin.phtml'; 
    }
    function showUpdateRole($role){
        require './templates/updateRole.phtml'; 
    }
    function showError($error){
        require './templates/error.phtml';
    }

}
