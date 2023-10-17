<?php 

class AgentsView {

    public function showAgents($agents){
        require './templates/agentList.phtml';
    }


    public function showAgentById($agentId){
        require './templates/agentById.phtml';
    }
    
    function showAdminAgents($agents){
        require './templates/adminAgentsList.phtml';
    }

    function showFormAdmin($roles){
        require './templates/addAgentsAdmin.phtml';
    }

    function showUpdateAgent($agent){
        require './templates/updateAgent.phtml';
    }
    function showError($error){
        require './templates/error.phtml';
    }
}