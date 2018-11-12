<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('template');
		$this->load->model('Mpost');
		$this->load->model('Mcategory');

		$user = ($this->session->userdata['logged_in']['user_login']);
		$login = ($this->session->userdata['logged_in']['loggedin']);
		$id_user = ($this->session->userdata['logged_in']['id']);

		if($login != true){
			redirect(site_url('login'));
		}
	

	}


	public	function index()
	{
		$id=$this->input->get('id');
		if(empty($id)){
			$data['data']=$this->Mcategory->get_category()->result();

			$this->template->load("admin/post/new_post",$data);
			

		}else{
			$data['post']=$this->Mpost->read_post($id)->result();

			if(count($data['post']) <=0 ){
				$url=site_url('admin/post/all_post');
				echo "
				<script> 
				alert('Wrong ID');
				location.href='$url'
				</script>
				";
			}else{
				$data['data']=$this->Mcategory->get_category()->result();
				$data['check_category']=$this->Mcategory->check_category($id)->result();
				
				$this->template->load('admin/post/edit_post',$data);
			}
			
			
		}
	}

	public function all_post(){
		$data['data']=$this->Mpost->get_all_post()->result();
		

		$this->template->load('admin/post/all_post',$data);
	
	}



	//save to db
    public function save_new_post(){
		$this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('editor1', 'editor1', 'required');

		if ($this->form_validation->run() == FALSE) {
		
			$this->template->load('admin/post/new_post');
		}
		else {
			$data=array(
				'title' => $this->input->post('title') ,
				'content'=>$this->input->post('editor1'),
				'image'=>$this->input->post('image'),
				'id_user'=>$this->session->userdata['logged_in']['id'],
				'create_at'=>date("Y-m-d H:i:s")

			);

			$result = $this->Mpost->save_new_post($data);
			$data=null;
			if(!empty($this->input->post('category'))){
				if($result != false){
					$id_category=$this->input->post('category'); 
					$data=array();
					foreach($id_category as $key => $val){
						$data[]=array(
							'category_id'=>$_POST['category'][$key],
							'post_id'=>$result,
							
						);
					}
					
				}


			}else{
				$data[]=array(
					'category_id'=>1,
					'post_id'=>$result,
					
				);
			}

			$result=$this->Mcategory->save_category_relationships($data);
			if($result){
				echo "true";
			}
			
			
		}
	}

	public function save_edit_post(){
		$i=0;
		$data_category;
		$result =true;

		
		$id=$this->input->post('id');
		$data=array(
			'title' => $this->input->post('title') ,
			'content'=>$this->input->post('editor1'),
			'image'=>$this->input->post('image'),
			'modify_at'=>date("Y-m-d H:i:s"),
		
		);

		$this->Mpost->save_edit_post($id,$data);


		$data=$this->Mcategory->check_category($id)->result();

		if(!empty($this->input->post('category'))){
			foreach($data as $obj){
				$category_id=$obj->category_id;
	
				if ( !in_array($category_id, $this->input->post('category'))){
					$this->Mcategory->delete_category_relationships($id,$category_id);
				}
			}
			foreach($this->input->post('category') as $obj){
				$str=$obj;
	
				if ( !in_array($str, array_column($data, 'category_id'))){
					
					$data_category[]=array(
						'category_id'=>$str,
						'post_id'=>$id,

					);
				}
			}
		}else{
			$this->Mcategory->delete_category_relationships($id,null);
			$data_category[]=array(
				'category_id'=>1,
				'post_id'=>$id,
				
			);
		}
		

		if(!empty($data_category)){
			$result=$this->Mcategory->save_category_relationships($data_category);
		}

		
		if($result){
			echo "true";
		}
				

	}

	public function new_post(){

		$data['data']=$this->Mcategory->get_category()->result();
		$this->template->load('admin/post/new_post',$data);
	}

	public function save_new_category(){
		$data=array(
			'name'=>$this->input->post('name')
		);
		$result = $this->Mcategory->save_new_category($data);

		if($result){
			$data=$this->Mcategory->get_category()->result();

			echo json_encode($data);
		}

	}

	

	public function edit_post($id){
		
	}

	public function delete_post($id){
		
		$data=array(
			'delete_at' =>date("Y-m-d H:i:s") ,
			
		);
		$result = $this->Mpost->delete_post($id,$data);

		if($result){
			echo "true";
		}
	}

}