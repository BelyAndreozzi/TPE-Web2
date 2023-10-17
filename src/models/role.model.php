<?php

require_once 'src/models/Model.php';

class RoleModel extends Model
{

    function getRoles()
    {
        $query = $this->db->prepare('SELECT * FROM role');
        $query->execute();

        $roles = $query->fetchAll(PDO::FETCH_OBJ);

        return $roles;
    }

    function insertRole($name, $description, $icon, $agresivity)
    {
        $query = $this->db->prepare('INSERT INTO role (name, description, icon, agresivity) VALUES(?,?,?,?)');
        $query->execute([$name, $description, $icon, $agresivity]);
        return $this->db->lastInsertId();
    }

    function deleteRole($id_role)
    {
        $query = $this->db->prepare('DELETE FROM role WHERE id_role = ?');
        $query->execute([$id_role]);
    }
    function updateRole($id_role, $name, $description, $icon, $agresivity)
    {
        $query = $this->db->prepare('UPDATE role SET name = ?, description = ?, icon = ?, agresivity = ? WHERE id_role = ?');
        $query->execute([$name, $description, $icon, $agresivity, $id_role]);
    }

    function getRoleById($id_role){
        $query= $this-> db -> prepare('SELECT * FROM role WHERE id_role = ?');
        $query->execute([$id_role]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
