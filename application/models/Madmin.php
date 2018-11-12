<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model {

    public function __construct()
	{
		parent::__construct();

    }
    
    


	

	public function save_seo($data){
		$this->db->insert('dc_seo', $data);
        
   
        if($this->db->affected_rows()>='1'){
			return  true;
		}
		else if($this->db->_error_number()==1062){
			return 'duplicate';
		}
	}

	public function get_seo(){
		$this->db->select('*');
		$this->db->from('dc_seo');
	
		return $this->db->get();
	}

	public function delete_seo($id){
		$this->db->where('id', $id);
		$this->db->delete('dc_seo');
		if($this->db->affected_rows()>='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function edit_seo($data){
		$this->db->update_batch('dc_seo', $data, 'id');
		
		if($this->db->affected_rows()>='1'){
			return true;
		}
		else{
			return false;
		}
	}
}

