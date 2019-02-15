<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScreenView extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        
        $this->load->model('Screen_Device');
        $this->load->model('Content');
        $this->load->model('Schedule');
        $this->load->model('Template');
        $this->load->model('Site');
    }

    function screenMe()
    {
        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
        
        $temp                   =   Site::find($this->session->userdata('auth_site'));        
        $data['site_id']        =   $temp['token'];
        $data['thisuser']       =   $this->session->all_userdata();        
        $data['screen']         =   Screen_Device::where('site_id',$this->session->userdata("auth_site"))->get();
        echo $this->blade->stream('administrator.screen.screen_list',$data);        
    }

    function screenFind($id,$token)
    {
        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
                        
        $data['thisuser']       =   $this->session->all_userdata();        
        $data['screen_url']     =   Screen_Device::find($id);
        $data['screen']         =   Screen_Device::where('site_id',$this->session->userdata('auth_site'))->get();
        $data['schedule']       =   Schedule::where('device_id',$id)->get();
        $data['content']        =   Content::where('device_id',$id)->get();
        $data['site']           =   Site::find($this->session->userdata('auth_site'));
        echo $this->blade->stream('administrator.screen.screen_view',$data); 
    }
}
