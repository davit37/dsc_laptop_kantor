<?php

class Settings Extends CI_Controller{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('template');
		$this->load->library('custom');
		$this->load->model('Msettings');

		$user = ($this->session->userdata['logged_in']['user_login']);
		$login = ($this->session->userdata['logged_in']['loggedin']);
		$id_user = ($this->session->userdata['logged_in']['id']);

		if($login != true){
			redirect(site_url('login'));
		}
	

	}


	public function index(){
		$data['logo']=$this->Msettings->get_logo()->result();
		$data['seo']=$this->Msettings->get_seo()->result();
		$this->template->load("admin/settings/settings",$data);
	}
	public function settings(){
		
	}

	public function save_seo(){
		$data=null;
		foreach($this->input->post('id') as $key => $val){
			$data[]=array(
				'id'=>$_POST['id'][$key],
				'value'=>$_POST['value'][$key],
				
			);
		}

		$result=$this->Msettings->edit_seo($data);

		if($result){
			$this->session->set_flashdata('msg', $this->custom->success_message("Success "));
			redirect(site_url('admin/settings'));
		}
	}

	public function all_settings(){
		$data['seo']=$this->Msettings->get_seo()->result();
		

		$this->template->load('admin/settings/all_settings',$data);
	}
	
	public 	function save_new_logo(){
			$id=$this->input->post('id');
			$data=array(
				
				'path'=>$this->input->post('path'),
				
			);
		

		$result=$this->Msettings->save_logo($id,$data);

		if($result){
			$this->session->set_flashdata('logo', $this->custom->success_message("Success "));
			redirect(site_url('admin/settings'));
		}
	} 
}