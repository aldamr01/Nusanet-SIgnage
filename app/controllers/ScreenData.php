<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScreenData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Screen_Device');
        $this->load->model('Content');
    }

    function screenCreate()
    {
        $this->form_validation->set_rules('site_id', 'id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        $register_screen      =   new Screen_Device;                
        
        $register_screen->site_id           =  $this->input->post('site_id');
        $register_screen->status            =  $this->input->post('status');
        $register_screen->name              =  $this->input->post('name');
        $register_screen->description       =  $this->input->post('description');
        
                
        if ($this->form_validation->run())
            if($register_screen->save())        
                redirect(base_url('site/show/').$this->input->post('site_id'));
            else
                redirect(base_url('site/show/').$this->input->post('site_id'));
        else    
            redirect(base_url('site/show/').$this->input->post('site_id'));
    
    }
}
