<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class import_model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'members';
    }
   public function checkproduct($product_name){
	 return $this->db->get_where('product_manage', ['medicine_name' => $product_name])->row();  
   }
   public function updateproductquan($id, $updata){
	         $this->db->where('id', $id)
                ->update('product_manage', $updata);
        return $this->db->affected_rows();

   }
   public function insertproduct($meddata = array()){
	   if(!empty($meddata)){
			
            $insert = $this->db->insert('product_manage', $meddata);
           
            $lastid = $this->db->insert_id();
			return $lastid;
        }
        return false;
   }
     /*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
    public function insert($data = array()) {
		
        if(!empty($data)){
			
            $insert = $this->db->insert('product', $data);
           
            return $insert?$this->db->insert_id():false;
        }
        return false;
    } 
}