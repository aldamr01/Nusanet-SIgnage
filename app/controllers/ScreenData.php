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
        $this->load->model('Site');
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
        if($this->session->userdata('auth_role')== "Administrator")  
        {
            $this->form_validation->set_rules('name1', 'Name', 'required');
            $this->form_validation->set_rules('id', 'id', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');        
            $this->form_validation->set_rules('site_id', 'site_id', 'required');        ;
            $this->form_validation->set_rules('url', 'url', 'required');
            $this->form_validation->set_rules('template', 'template', 'required');
        }
        else 
        {
            $this->form_validation->set_rules('name1', 'Name', 'required');
            $this->form_validation->set_rules('id', 'id', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');        
            $this->form_validation->set_rules('url', 'url', 'required');
            $this->form_validation->set_rules('template', 'template', 'required');
        }
        
        // header('Content-type:application/json');
        // echo json_encode($this->input->post());
        // die();
        
        $update_screen      =   Screen_Device::find($this->input->post('id',TRUE));                
                
        $update_screen->name            =  $this->input->post('name1');
        $update_screen->description     =  $this->input->post('description');        
        $update_screen->url             =  $this->input->post('url');
        $update_screen->type            =  $this->input->post('template'); 
   
       
        if ($this->form_validation->run())
            if($update_screen->save())        
                if($this->session->userdata('auth_role')!= "Administrator")
                    redirect(base_url(''));
                else
                    redirect(base_url('site/show/').$this->input->post('site_id',TRUE));
            else
                echo "x1";//redirect(base_url('site/show/').$this->input->post('site_id',TRUE));
        else    
            echo validation_errors();//echo "x";//redirect(base_url('site/show/').$this->input->post('site_id',TRUE));
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

    function screenDelete($id,$site)
    {
        if(!isset($id) && !isset($site))
            redirect(base_url('site/list'));

        $flight     = Screen_Device::find($id);        

        if($flight->delete())
            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$site);
            else
                redirect(base_url());                
        else
            redirect(base_url('site/show/').$site); 
    }
}

