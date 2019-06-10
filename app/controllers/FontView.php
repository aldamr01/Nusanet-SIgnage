<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FontView extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status'))
            redirect(base_url('Authentication'));   
        else
            if($this->session->userdata('auth_role')!= "Administrator")           
                redirect(base_url('Authentication')); 
        
        $this->load->model('User');
        $this->load->model('Site');
        $this->load->model('Screen_Device');
        $this->load->model('Content');
        $this->load->model('Template');
        $this->load->model('TemplateType');
        $this->load->model('Fonts');
        $this->load->model('Schedule');
    }

    function fontList()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.font.font_list',$data);
    }

    function fontCreate()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.font.font_create',$data);
    }

    function fontUpdate($id)
    {
        $data['thisuser']   = $this->session->all_userdata();
        $data['data']       = Fonts::find($id);
        echo $this->blade->stream('administrator.font.font_update',$data);
    }
    
}

