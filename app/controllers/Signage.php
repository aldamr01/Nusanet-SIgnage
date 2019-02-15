<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
        
        $this->load->model('User');
        $this->load->model('Screen_Device');
        $this->load->model('Site');
        $this->load->model('Content');
        $this->load->model('Schedule');
        $this->load->model('Template');
    }

    public function index()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.home',$data);
    }

    public function er404()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.404',$data);
    }

    function screenView($site_id,$screen_id,$token)
    {
        
        $where              =   array(
            'device_id'     =>  $screen_id,
            'for_date'      =>  $this->amirrule_lib->today()
        );        

        $site               =   Site::find($site_id);
        $screen             =   Screen_Device::find($screen_id);

        $where2             =   array(
            'type'          =>  $screen['type'],
            'site_id'       =>  $site_id
        );

        $data['content']    =   Content::where('device_id',$screen_id)->orderBy('created_at','DESC')->get();
        $data['schedule']   =   Schedule::where($where)->orderBy('start','ASC')->get();
        $data['config']     =   Template::where($where2)->first();

        // header('Content-Type:Application/json');
        // echo json_encode($data)       ;
        // die();
        
        if($site->token == $token)
        {
            if($screen->site_id == $site->id)
            {                                              
                switch ($screen->type) {
                    case '1':
                        echo $this->blade->stream('administrator.signage.template1',$data);
                        break;

                    case '2':
                        echo $this->blade->stream('administrator.signage.template2',$data);
                        break;
                    
                    case '3':
                        echo $this->blade->stream('administrator.signage.template3',$data);
                        break;

                    default:
                        # code...
                        break;
                }
                
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

    function screenController($site_id,$screen_id,$token)
    {
        $site               =   Site::find($site_id);
        $screen             =   Screen_Device::find($screen_id);
        $data['screen']     =   Screen_Device::where('id',$screen_id)->first();
        $data['thisuser']   =   $this->session->all_userdata();
        

        if($site->token == $token)
        {
            if($screen->site_id == $site->id)
            {                                 
                echo $this->blade->stream('administrator.screen.screen_controller',$data);
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
