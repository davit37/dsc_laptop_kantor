<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller

{
			
		

	public

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('Madmin');

		$user = ($this->session->userdata['logged_in']['user_login']);
		$login = ($this->session->userdata['logged_in']['loggedin']);
		$id_user = ($this->session->userdata['logged_in']['id']);

		if($login != true){
			redirect(site_url('login'));
		}
	

	}

	public

	function index()
	{
		$this->load->view('admin/index');
	}
}
