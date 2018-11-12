<?php

class User Extends CI_Controller{

    public

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('template');
		$this->load->model('Muser');

		$user = ($this->session->userdata['logged_in']['user_login']);
		$login = ($this->session->userdata['logged_in']['loggedin']);
		$id_user = ($this->session->userdata['logged_in']['id']);

		if($login != true){
			redirect(site_url('login'));
		}
	

	}

	public function new_user(){
		$this->template->load('admin/user/new_user');
	}

	public function save_new_user(){
		$this->form_validation->set_rules('user_login', 'user_login', 'required');
		$this->form_validation->set_rules('display_name', 'display_name', 'required');
		$this->form_validation->set_rules('user_password', 'user_password', 'required');
		$this->form_validation->set_rules('user_email', 'email', 'required');
	


		if ($this->form_validation->run() == FALSE) {
		
			$this->template->load('admin/user/new_user');
		}
		else {

			$options = [
				'cost' => 12,
			];
		
			$password=password_hash($this->input->post('user_password') , PASSWORD_BCRYPT, $options);
			$data=array(
				'user_login' => $this->input->post('user_login') ,
				'user_password'=>$password,
				'display_name' => $this->input->post('display_name') ,
				'user_email'=>$this->input->post('user_email'),
				
			);

			$result = $this->Muser->save_new_user($data);

			if($result){
				redirect('admin/user/all_user');
			}
			
		}
	}



	public function all_user()
	{
		$data['data']=$this->Muser->get_all_user()->result();

		$this->template->load('admin/user/all_user',$data);
	}

	public function edit_user($id=null){
		
		if(empty($id)){
			$url=site_url('admin/user/all_user');
			echo "
			<script> 
			alert('ID Not Found');
			location.href='$url'
			</script>
			
			";

		}else{
			$data['data']=$this->Muser->get_user($id)->result();
			$array_length=count($data['data']);
			if($array_length <= 0){
				$url=site_url('admin/user/all_user');
					echo "
					<script> 
					alert('Wrong ID');
					location.href='$url'
					</script>
					";
			}else{
				$this->template->load('admin/user/edit_user',$data);
			}

		}
	
	}

	public function save_edit_user(){

		$id=$this->input->post('id');

		if(empty($this->input->post('user_password'))){
			$data=array(
				'user_login' => $this->input->post('user_login') ,
				'display_name' => $this->input->post('display_name') ,
				'user_email'=>$this->input->post('user_email'),
				
			);
		}else{
			$options = [
				'cost' => 12,
			];
		
			$password=password_hash($this->input->post('user_password') , PASSWORD_BCRYPT, $options);
			$data=array(
				'user_login' => $this->input->post('user_login') ,
				'user_password'=>$password,
				'display_name' => $this->input->post('display_name') ,
				'user_email'=>$this->input->post('user_email'),
				
			);
		}
		

		$result = $this->Muser->save_edit_user($id,$data);

		if($result){
			redirect('admin/user/all_user');
		}
	}

	
	public function delete_user($id){
		
		$result = $this->Muser->delete_user($id);

		if($result){
			echo "true";
		}
	}



	

	public function change_password($id){

		$this->template->load('admin/user/change_password');
	}

}