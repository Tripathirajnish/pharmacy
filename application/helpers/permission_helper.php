<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_permission'))
{
    function check_permission($role, $tab, $value)
    {
    	$CI = get_instance();
    	$CI->load->model('PermissionModel');
    	$permissions = $CI->PermissionModel->getPermissionByRoleId($role);

    	foreach ($permissions as $permission) {
    		if($permission->tab_id == $tab){
    			if($value == 'add' && $permission->add_permission == 1){
    				return true;
    			}
    			if($value == 'edit' && $permission->edit_permission == 1){
    				return true;
    			}
    			if($value == 'view' && $permission->view_permission == 1){
    				return true;
    			}
    			if($value == 'delete' && $permission->delete_permission == 1){
    				return true;
    			}
    		}
    		
    	}
    }   
}