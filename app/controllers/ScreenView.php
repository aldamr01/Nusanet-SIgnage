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
                
    }

    function screenFind($id,$token)
    {
        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
                        
        $where                  =   array(
            'site_id'   =>  $this->session->userdata('auth_site'),
            'id'        =>  $id
        );
        $data['thisuser']       =   $this->session->all_userdata();        
        $data['template']       =   Template::where('site_id',$this->session->userdata('auth_site'))->get();
        $data['screen_url']     =   Screen_Device::find($id);
        $data['screen']         =   Screen_Device::where($where)->first();
        $data['schedule']       =   Schedule::where('device_id',$id)->get();
        $data['content']        =   Content::where('device_id',$id)->get();
        $data['site']           =   Site::find($this->session->userdata('auth_site'));
        echo $this->blade->stream('administrator.screen.screen_view',$data); 
    }
}
