<?php

require_once 'src/models/Model.php';

class AgentModel extends Model
{

    function getAgents()
    {
        $query = $this->db->prepare('SELECT agent.*, role.name as role FROM agent JOIN role ON agent.id_role_fk=role.id_role');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insertAgents($alias, $id_role_fk, $description, $agent_img, $age, $nacionality, $race, $is_free, $teamwork)
    {
        $query = $this->db->prepare('INSERT INTO agent (id, alias, id_role_fk, description, agent_img, age, nacionality, race, is_free, teamwork ) VALUES(null,?,?,?,?,?,?,?,?,?)');
        $query->execute([$alias, $id_role_fk, $description, $agent_img, $age, $nacionality, $race, $is_free, $teamwork]);

        return $this->db->lastInsertId();
    }

    function deleteAgent($id)
    {
        $query = $this->db->prepare('DELETE FROM agent WHERE id = ?');
        $query->execute([$id]);
    }

    function updateAgent($id, $alias, $id_role_fk, $description, $agent_img, $age, $nacionality, $race, $is_free, $teamwork)
    {
        $query = $this->db->prepare('UPDATE agent SET alias = ?, id_role_fk = ?, description = ?, agent_img = ?, age = ?, nacionality = ?, race = ?, is_free = ?, teamwork = ? WHERE id = ?');
        $query->execute([$alias, $id_role_fk, $description, $agent_img, $age, $nacionality, $race, $is_free, $teamwork, $id]);
    }
    
    function getAgentByRol ($role_name)
    {
        $query = $this-> db-> prepare('SELECT agent.*, role.name as role FROM agent JOIN role ON agent.id_role_fk=role.id_role WHERE name = ?');
        $query-> execute ([$role_name]);
        return $query-> fetchAll(PDO::FETCH_OBJ);
    }

    function getAgentById ($agentId) {
        $query = $this->db->prepare('SELECT agent.*, role.name as role FROM agent JOIN role ON agent.id_role_fk=role.id_role WHERE id = ?');
        $query->execute([$agentId]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
