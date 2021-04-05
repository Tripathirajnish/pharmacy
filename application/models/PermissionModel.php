<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermissionModel extends CI_model
{
    public function getPermissionByRoleId($id)
    {
        return $this->db->get_where('permission', array('role_id' => $id))->result();
    }

    public function updatePermission($where, $data){
            $this->db
                ->where($where)
                ->update('permission', $data);
        return $this->db->affected_rows();
    }
}
