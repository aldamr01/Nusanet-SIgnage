<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScreenData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }

        $this->load->model('Screen_Device');
        $this->load->model('Content');
    }

    function screenCreate()
    {
        if($this->session->userdata('auth_role')!= "Administrator")           
            redirect(base_url('Signage'));  

        $this->form_validation->set_rules('site_id', 'id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');


        $register_screen      =   new Screen_Device;                

        $register_screen->url               =   $this->input->post('url');
        $register_screen->site_id           =   $this->input->post('site_id');
        $register_screen->status            =   $this->input->post('status');
        $register_screen->name              =   $this->input->post('name');
        $register_screen->description       =   $this->input->post('description');
        $register_screen->type              =   $this->input->post('type');
        
                
        if ($this->form_validation->run())
            if($register_screen->save())        
                redirect(base_url('site/show/').$this->input->post('site_id'));
            else
                redirect(base_url('site/show/').$this->input->post('site_id'));
        else    
            redirect(base_url('site/show/').$this->input->post('site_id'));
    
    }

    function screenUpdate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');        
        $this->form_validation->set_rules('site_id', 'site_id', 'required');        ;
        $this->form_validation->set_rules('url', 'url', 'required');

        
        $update_screen      =   Screen_Device::find($this->input->post('id',TRUE));                
                
        $update_screen->name            =  $this->input->post('name');
        $update_screen->description     =  $this->input->post('description');
        $update_screen->status          =  $this->input->post('status');     
        $update_screen->url             =  $this->input->post('url');
   
       
        if ($this->form_validation->run())
            if($update_screen->save())        
                redirect(base_url('site/show/').$this->input->post('site_id',TRUE));
            else
                redirect(base_url('site/show/').$this->input->post('site_id',TRUE));
        else    
            redirect(base_url('site/show/').$this->input->post('site_id',TRUE));
    }
}

