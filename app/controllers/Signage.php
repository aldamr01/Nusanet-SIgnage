<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // if(!$this->session->userdata('auth_status')){
		// 	redirect(base_url('Authentication'));
        // }
        
        $this->load->model('User');
        $this->load->model('Screen_Device');
        $this->load->model('Site');
        $this->load->model('Content');
    }

    public function index()
    {
        echo $this->blade->stream('administrator.home');
    }

    function screenView($site_id,$screen_id,$token)
    {
        $site       =   Site::find($site_id);
        $screen     =   Screen_Device::find($screen_id);
        $content    =   Content::where('device_id',$screen_id)->orderBy('created_at','DESC')->get();
        header('Content-Type:Application/json');
        

        if($site->token == $token)
        {
            if($screen->site_id == $site->id)
            {
                echo json_encode($content);
                die();
                $data['content']    =   1;

                echo $this->blade->stream('administrator.signage.template3',$data);                                
            }
            else
            {
                redirect(base_url('site/show/').$this->input->post('site_id'));
            }
        }
        else
        {
            redirect(base_url('site/show/').$this->input->post('site_id'));
        }

    }
}
