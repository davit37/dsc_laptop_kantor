<?php 

class Mpost extends CI_Model{
    public function save_new_post($data){
        $this->db->insert('dc_post',$data);
        $insert_id = $this->db->insert_id();
   
        if($this->db->affected_rows()=='1'){
			return  $insert_id;
		}
		else{
			return false;
		}
	} 
	
	public function get_all_post(){
		$this->db->select('dc_post.*');
		$this->db->select('dc_users.display_name');
		$this->db->select('GROUP_CONCAT(dc_category.name SEPARATOR ", ") AS category_name');
		$this->db->from('dc_post');
		$this->db->join('dc_users', 'dc_users.id =dc_post.id_user', 'left');
		$this->db->join('dc_category_relationships', 'dc_post.id = dc_category_relationships.post_id', 'left');
		$this->db->join('dc_category', 'dc_category.id = dc_category_relationships.category_id', 'left');
		$this->db->order_by('create_at','desc');
		$this->db->group_by('id');
		$this->db->where('delete_at', NULL);
		
		return $this->db->get();
	}

	public function get_post(){
		$this->db->select('*');
		$this->db->from('dc_post');
		$this->db->order_by('id', 'desc');
		$this->db->limit(5);
		return $this->db->get();
	}

	public function save_edit_post($id,$data){
		$this->db->where('id', $id);
		$this->db->update('dc_post', $data);
		$message=$this->db;
        if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
    }
    
    public function read_post($id){
		$this->db->select('*');
		$this->db->from('dc_post');
		$this->db->where('id',$id);

		
		return $this->db->get();
	}

	public function delete_post($id,$data){
		$this->db->where('id', $id);
		$this->db->update('dc_post', $data);
		$message=$this->db;
        if($this->db->affected_rows()=='1'){
			return true;
		}
		else{
			return false;
		}
	}
    

}