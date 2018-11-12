<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends CI_Controller

{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('template');
		$this->load->model('Mslider');
		

		$user = ($this->session->userdata['logged_in']['user_login']);
		$login = ($this->session->userdata['logged_in']['loggedin']);
		$id_user = ($this->session->userdata['logged_in']['id']);

		if($login != true){
			redirect(site_url('login'));
		}
	

	}
	//slider 
	
	public function index(){
		$data['data']=$this->Mslider->get_all_slider()->result();

		$this->template->load('admin/slider/all_slider',$data);
	}

	public function new_slider(){
		$this->template->load('admin/slider/new_slider');
	}

	public function save_new_slider(){
		
		$publish=1;
		if(empty($this->input->post('publish'))){
			$publish=0;
		}
		
		$data=array(
			'name'=>$this->input->post('name'),
			'slug'=>$this->input->post('slug'),
			'publish'=>$publish,
			'create_at'=>date("Y-m-d H:i:s")
			
		);

		$result = $this->Mslider->save_new_slider($data);

		if($result){
			redirect('admin/slider');
		}
	}

	public function all_slider(){
		
	}

	public function all_slide($id){
		$data['data']=$this->Mslider->get_all_sliderimage($id)->result();
		$data['id']=$id;
		$this->template->load('admin/slider/all_slide',$data);
	}

	public function new_slider_image(){
		$this->template->load('admin/slider/new_slider_image');
	}

	

	public function delete_slider($id){
		$data=array(
			'delete_at' =>date("Y-m-d H:i:s") ,
			
		);
		$result = $this->Mslider->delete_slider($id,$data);

		if($result){
			echo "true";
		}
	}
	
	public function edit_slider($id=null){

		if(empty($id)){
			$url=site_url('admin/slider');
			echo "
			<script> 
			alert('ID Not Found');
			location.href='$url'
			</script>
			
			";

		}else{
			$data['data']=$this->Mslider->get_slider($id)->result();
			$array_length=count($data['data']);
			if($array_length <= 0){
				$url=site_url('admin/slider');
					echo "
					<script> 
					alert('Wrong ID');
					location.href='$url'
					</script>
					";
			}else{
				$this->template->load('admin/slider/edit_slider',$data);
			}
		}
		
		

		
	}

	public function save_edit_slider(){
		$id=$this->input->post('id');
		
		$publish=1;
		if(empty($this->input->post('publish'))){
			$publish=0;
		}
		
		$data=array(
			'name'=>$this->input->post('name'),
			'slug'=>$this->input->post('slug'),
			'publish'=>$publish,
			'modify_at'=>date("Y-m-d H:i:s")
		);

		$result=$this->Mslider->save_edit_slider($id,$data);

		if($result){
			redirect('admin/slider');
		}
	}

	public function delete_sliderimage($id){
		
		$result = $this->Mslider->delete_sliderimage($id);

		if($result){
			echo "true";
		}
	}

	public function edit_sliderimage($id=null){

		if(empty($id)){
			$url=site_url('admin/slider');
			echo "
			<script> 
			alert('ID Not Found');
			location.href='$url'
			</script>
			
			";

		}else{
			$data['data']=$this->Mslider->get_sliderimage($id)->result();
			$array_length=count($data['data']);
			if($array_length <= 0){
				$url=site_url('admin/slider');
					echo "
					<script> 
					alert('Wrong ID');
					location.href='$url'
					</script>
					";
			}else{
				$this->template->load('admin/slider/edit_sliderimage',$data);
			}
		}

		
	
		
	}

	public function save_new_sliderimage(){
		
		
		$data=array(
			'title'=>$this->input->post('title'),
			'image'=>$this->input->post('image'),
			'id_slider'=>$this->input->post('id_slider'),
			
			
		);

		$result = $this->Mslider->save_new_sliderimage($data);

		if($result){
			redirect('admin/slider/all_slide/'.$this->input->post('id_slider'));
		}
	}

	public function save_edit_sliderimage(){
		$id=$this->input->post('id');
		
		
		$data=array(
			'title'=>$this->input->post('title'),
			'image'=>$this->input->post('image'),
		);

		$result=$this->Mslider->save_edit_sliderimage($id,$data);

		if($result){
			redirect('admin/slider/slider/all_slide/'.$this->input->post('id_slider'));
		}
	}


}