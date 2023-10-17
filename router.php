<?php 
require_once './src/controllers/agent.controller.php';
require_once './src/controllers/role.controller.php';
require_once './src/controllers/user.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'agents';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'agents':
        $controller = new AgentController();
        $controller->getAgents();
        break;
    case 'agente':
        $controller = new AgentController();
        $controller->getAgentById($params[1]);
        break;
    case 'roles':
        $controller = new RoleController();
        $controller->getRoles();
        break;
    case 'rol':
        $controller = new AgentController();
        $controller->getAgentsByRol($params[1]);
        break;
    case 'administracion-agentes':
        $controller = new AgentController();
        $controller->showAdminAgents();
        break;
    case 'agregar-agente':
        $controller = new AgentController();
        $controller->showCreateAgent();
        break;
    case 'addAgent':
        $controller = new AgentController();
        $controller->insertAgent();
        break;
    case 'deleteAgent':
        $controller = new AgentController();
        $controller->deleteAgent($params[1]);
        break;
    case 'editar-agente':
        $controller = new AgentController();
        $controller->showUpdateAgent($params[1]);
        break;
    case 'editAgent':
        $controller = new AgentController();
        $controller->updateAgent($params[1]); 
        break;
    case 'iniciar-sesion':
        $controller = new UserController();
        $controller-> showLogin();
        break;
    case 'login':
        $controller = new UserController();
        $controller-> login();
        break;
    case 'cerrar-sesion':
        $controller = new UserController();
        $controller-> logout();
        break;
    case 'administracion-roles':
        $controller = new RoleController();
        $controller->showAdminRoles();
        break;
    case 'agregar-rol':
        $controller=new RoleController();
        $controller-> showCreateRole();
        break;
    case 'addRole':
        $controller = new RoleController();
        $controller->insertRole();
        break;
    case 'deleteRole':
            $controller = new RoleController();
            $controller->deleteRole($params[1]);
            break;
    case 'editar-rol':
            $controller = new RoleController();
            $controller->showUpdateRole($params[1]);
            break;
    case 'editRole':
            $controller = new RoleController();
            $controller->updateRole($params[1]); 
            break;
    default:
        echo '404';
        break;

}