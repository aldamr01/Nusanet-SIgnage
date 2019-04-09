<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateView extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        
        $this->load->model('Screen_Device');
        $this->load->model('Content');
        $this->load->model('Schedule');
        $this->load->model('Template');
        $this->load->model('TemplateType');
        $this->load->model('Site');
    }

    function screenMe()
    {
                
    }

    function templateFind()
    {
        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
                               
        $data['thisuser']       =   $this->session->all_userdata();        
        $data['template']       =   Template::where('site_id',$this->session->userdata('auth_site'))->get();
        $data['type']           =   TemplateType::all();
        $data['site']           =   Site::find($this->session->userdata('auth_site'));
        
        echo $this->blade->stream('administrator.screen.template_view',$data); 
    }
}
