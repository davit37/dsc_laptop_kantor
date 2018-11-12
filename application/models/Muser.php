<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model {

    public function __construct()
	{
		parent::__construct();

    }

    

	public function save_new_user($data){
		$this->db->insert('dc_users', $data);
        
   
        if($this->db->affected_rows()>='1'){
			return  true;
		}
		else if($this->db->_error_number()==1062){
			return 'duplicate';
		}
	}

	

	public function get_all_user(){

		$this->db->select('*');
		$this->db->from('dc_users');

		$this->db->order_by('id', 'desc');
		return $this->db->get();
	}

	public function get_user($id){
		
		$this->db->select('*');
		$this->db->from('dc_users');
		$this->db->where('id',$id);
		return $this->db->get();
	}

	public function save_edit_user($id, $data){
		$this->db->where('id', $id);
		$this->db->update('dc_users', $data);
        if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete_user($id){
		$this->db->where('id', $id);
		$this->db->delete('dc_users');
		if($this->db->affected_rows()>='1'){
			return true;
		}
		else{
			return false;
		}
	}
}