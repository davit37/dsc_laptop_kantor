<?php

class Mslider Extends CI_Model{
    

	public function save_new_slider($data){
		$this->db->insert('dc_slider', $data);
        
   
        if($this->db->affected_rows()>='1'){
			return  true;
		}
		else if($this->db->_error_number()==1062){
			return 'duplicate';
		}
	}

	public function get_all_slider(){
		$this->db->select('*');
		$this->db->from('dc_slider');
		$this->db->where('delete_at', NULL);
		return $this->db->get();
	}

	public function get_all_sliderimage($id){
		$this->db->select('*');
		$this->db->from('dc_slider_image');
		$this->db->where('id_slider', $id);
		return $this->db->get();
	}

	public function save_new_sliderimage($data){
		$this->db->insert('dc_slider_image', $data);
        
   
        if($this->db->affected_rows()>='1'){
			return  true;
		}
		else if($this->db->_error_number()==1062){
			return 'duplicate';
		}
	}

	public function delete_slider($id,$data){
		$this->db->where('id', $id);
		$this->db->update('dc_slider', $data);
		$message=$this->db;
        if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_slider($id){
		$this->db->select('*');
		$this->db->from('dc_slider');
		$this->db->where('id', $id);
		return $this->db->get();
	}

	public function save_edit_slider($id,$data){
		$this->db->where('id', $id);
		$this->db->update('dc_slider', $data);
		$message=$this->db;
        if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete_sliderimage($id){
		$this->db->where('id', $id);
		$this->db->delete('dc_slider_image');
		if($this->db->affected_rows()>='1'){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_sliderimage($id){
		$this->db->select('*');
		$this->db->from('dc_slider_image');
		$this->db->where('id', $id);
		return $this->db->get();
	}

	public function save_edit_sliderimage($id,$data){
		$this->db->where('id', $id);
		$this->db->update('dc_slider_image', $data);
		$message=$this->db;
        if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}

}