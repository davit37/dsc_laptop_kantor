<?php 

class Mcategory extends CI_Model{
	public function save_new_category($data){
		$this->db->insert('dc_category', $data);
        
   
        if($this->db->affected_rows()>='1'){
			return  true;
		}
		else if($this->db->_error_number()==1062){
			return 'duplicate';
		}
	}

	public function get_category(){
		$this->db->select('*');
		$this->db->from('dc_category');
		$this->db->order_by('id', 'desc');
		return $this->db->get();
	}

	public function save_category_relationships($data) {
		$this->db->insert_batch('dc_category_relationships', $data);
        
        if($this->db->affected_rows()>='1'){
			return  true;
		}
		else{
			return false;
		}
	}

	public function check_category($id){
		$this->db->select('*');
		$this->db->from('dc_category_relationships');
		$this->db->where('post_id', $id);
		return $this->db->get();
	}
	
	public function delete_category_relationships($post_id,$category_id){
		if(!empty($category_id)){
			$this->db->where('category_id', $category_id);
		}
		$this->db->where('post_id', $post_id);
		$this->db->delete('dc_category_relationships');
		if($this->db->affected_rows()>='1'){
			return true;
		}
		else{
			return false;
		}
	}
}