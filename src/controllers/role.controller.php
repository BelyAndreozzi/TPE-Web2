<?php
require_once './src/models/role.model.php';
require_once './src/views/roles.view.php';
require_once './src/controllers/user.controller.php';


class RoleController{
    private $roleModel;
    private $roleView;
    private $verification;

    function __construct(){
        $this->verification = new UserController();
        $this->roleModel= new RoleModel();
        $this->roleView= new RoleView();

    }

    function getRoles(){
        $roles = $this->roleModel->getRoles();

        $this->roleView->showRoles($roles);
    }


    function showAdminRoles(){
        $this->verification->verifyUser();
        $roles = $this->roleModel->getRoles();
        $this->roleView->showAdminRoles($roles);
    }

    function showCreateRole(){
        $this->verification->verifyUser();
        $this->roleView->showFormRoleAdmin(); 
    }

    function showUpdateRole($id){
        $this->verification->verifyUser();
        $role = $this->roleModel->getRoleById($id);
        $this->roleView->showUpdateRole($role);
    }

    function insertRole(){
        $this->verification->verifyUser();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
        $agresivity = $_POST['agresivity'];

        echo var_dump($name, $description, $icon, $agresivity);

        if (empty($name) || empty($description) || empty($icon) || empty($agresivity))
        {
            $this->roleView->showError("Complete todos los campos");
            die();
        }
        
        $id= $this->roleModel->insertRole($name, $description, $icon, $agresivity);

        if($id){
            header('Location: ' . BASE_URL . 'administracion-roles');
        } else {
            $this->roleView->showError("Error al insertar el rol");
        }
    }

    function updateRole($id){
        $this->verification->verifyUser();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
        $agresivity = $_POST['agresivity'];

        $this->roleModel->updateRole($id, $name, $description, $icon, $agresivity);
        header('Location: ' . BASE_URL . 'administracion-roles');    
    }

    function deleteRole($id){
        $this->verification->verifyUser();
        $this->roleModel->deleteRole($id);
        header('Location: ' . BASE_URL . 'administracion-roles');
    }

}