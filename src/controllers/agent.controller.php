<?php
require_once './src/models/agent.model.php';
require_once './src/views/agents.view.php';
require_once './src/models/role.model.php';
require_once './src/controllers/user.controller.php';

class AgentController {
    private $agentModel;
    private $agentView;
    private $roleModel;
    private $verification;

    function __construct(){
        $this->verification = new UserController();
        $this->agentModel = new AgentModel();
        $this->agentView = new AgentsView();
        $this->roleModel = new roleModel();
    }

    function getAgents(){
    
        $agents = $this->agentModel->getAgents();

        $this->agentView->showAgents($agents);
        
        return $agents;
    }

    function getAgentsByRol($role_name){
        $agents = $this->agentModel->getAgentByRol($role_name);

        $this->agentView->showAgents($agents);

    }

    function getAgentById($agentId){
        $agent = $this->agentModel->getAgentById($agentId);

        $this->agentView->showAgentById($agent);
    }


    function showAdminAgents(){
        $this->verification->verifyUser();
        $agents = $this->agentModel->getAgents();
        $this->agentView->showAdminAgents($agents);
    }

    function showCreateAgent(){
        $this->verification->verifyUser();
        $roles = $this->roleModel->getRoles();

        $this->agentView->showFormAdmin($roles); 
    }

    function showUpdateAgent($id){
        $this->verification->verifyUser();
        $agent = $this->agentModel->getAgentById($id);
        $this->agentView->showUpdateAgent($agent);
    }


    function insertAgent(){
        $this->verification->verifyUser();
        $alias = $_POST['alias'];
        $id_role_fk = $_POST['id_role_fk'];
        $description = $_POST['description'];
        $agent_img = $_POST['agent_img'];
        $age = $_POST['age'];
        $nacionality = $_POST['nacionality'];
        $race = $_POST['race'];
        $is_free = $_POST['is_free'];
        $teamwork = $_POST['teamwork'];

        if (empty($alias) || empty($id_role_fk) || empty($description) || empty($agent_img) || empty($age) || empty($nacionality) || empty($race) || empty($teamwork)) {
            $this->agentView->showError("Complete todos los campos");
            die();
        }

        $id = $this->agentModel->insertAgents($alias, $id_role_fk, $description, $agent_img, $age, $nacionality, $race, $is_free, $teamwork);
        
        echo var_dump($id);

        if($id){
            header('Location: ' . BASE_URL);
        } else {
            $this->agentView->showError("Error al insertar el agente");
        }
    }



    function updateAgent($id){
        $this->verification->verifyUser();
        $alias = $_POST['alias'];
        $id_role_fk = $_POST['id_role_fk'];
        $description = $_POST['description'];
        $agent_img = $_POST['agent_img'];
        $age = $_POST['age'];
        $nacionality = $_POST['nacionality'];
        $race = $_POST['race'];
        $is_free = $_POST['is_free'];
        $teamwork = $_POST['teamwork'];

        $this->agentModel->updateAgent($id, $alias, $id_role_fk, $description, $agent_img, $age, $nacionality, $race, $is_free, $teamwork);

        header('Location: ' . BASE_URL . 'administracion-agentes');
    }

    function deleteAgent($id){
        $this->verification->verifyUser();
        $this->agentModel->deleteAgent($id);
        header('Location: ' . BASE_URL . 'administracion-agentes');
    }

}