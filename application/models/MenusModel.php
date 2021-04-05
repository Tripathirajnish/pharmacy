<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenusModel extends CI_model
{
    public function getAllMenus()
    {
    	$result = $this->db->get('menus');
       	return $result->result();
    }

    public function menuTree(){
    	$menus = $this->db->get('menus')->result();
    	foreach ($menus as $menu) {
  			if($menu->parent_id == 0) {
  			    $menu_array[] = array(
  									'id'=> $menu->id,
  									'menu_name' => $menu->name,
                    'route' => $menu->route,
  									'child' => $this->subMenu($menu->id)
  								);
  		    }
  		}
  		return $menu_array;
    }
    public function subMenu($sub_id){
    	$sub_menu   =$this->db->where('parent_id', $sub_id)->get('menus')->result();
    	$smenu_array =  array();
    	foreach ($sub_menu as $smenu) {
  			    $smenu_array[] = array(
  								'id'=> $smenu->id,
  								'menu_name' => $smenu->name,
                  'route' =>  $smenu->route,
  								);
  		}
  		return $smenu_array;
    }
}