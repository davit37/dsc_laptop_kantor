<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Front extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('template');
		$this->load->model('Mslider');
		$this->load->model('Mcategory');
		$this->load->model('Mpost');
		$this->load->model('Msettings');
	}


	public	function index()
	{
		$data['logo']=$this->Msettings->get_logo()->result();
		$data['data']=$this->Mpost->get_all_post()->result();
        $this->template->load_front('front/index',$data);
    }

    public function get_slider_image($id){
		$data=$this->Mslider->get_all_sliderimage($id)->result();
		
        
        echo json_encode($data);

    }


}