<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template Extends CI_Loader{

        //BackEnd
        public function load($view_file_name,$data_array=[])
        {
                
                $this->view("admin/header");

                $this->view($view_file_name,$data_array);

                $this->view("admin/footer");
        }

        //front end

        public function load_front($view_file_name,$arr=[]){
                $this->view('front/header',$arr);
                $this->view($view_file_name,$arr);
                $this->view('front/footer');
        }
}