<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends CI_model
{
    public function submitRole($role)
    {
        $this->db->insert('role',$role);
        $insert_id = $this->db->insert_id();
        $this->addPermission($insert_id);
        return $insert_id;
    }
    public function getRole()
    {
       $result = $this->db->get('role');
       return $result->result();
    }
    public function deleteRole($id)
    {
       $this->db->delete('role', array('id' => $id));
       return $this->db->affected_rows();
    }
    public function getRoleById($id)
    {
        $query = $this->db
                            ->select('*')
                            ->from('role')
                            ->where('id', $id)
                            ->get();
        return $query->row();
    }
    public function updateRole($id, $update_data){
    	$this->db
                ->where('id', $id)
                ->update('role', $update_data);
        return $this->db->affected_rows();
    }
    public function addPermission($id){
        $menus = $this->db->get('menus')->result();
        $batch = array();
        foreach ($menus as $menu) {
            $batch[] = array(
                            'role_id' => $id,
                            'tab_id'  => $menu->id,
                            'add_permission' => 0,
                            'edit_permission' => 0,
                            'view_permission' => 0,
                            'delete_permission' => 0
                        );
        }
        return $this->db->insert_batch('permission', $batch);
    }
    public function getRoleByGroupId($id){
        $query = $this->db
                            ->select('*')
                            ->from('role')
                            ->where('id', $id)
                            ->get();
        return $query->result();
    }
}