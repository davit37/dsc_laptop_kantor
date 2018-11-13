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
	
	public function do_upload()
        {
                $config['upload_path']          = './assets/file/front';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = "4048000";
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name']		= true;

		


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

              
                $return=$this->upload->do_upload('file');
              
                if ( !  $return)
                {
                    
                        echo json_encode($this->upload->display_errors());
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        echo json_encode('true');
                }
        }


}