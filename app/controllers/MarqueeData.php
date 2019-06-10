<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarqueeData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
        
        $this->load->model('RunningText');        
        $this->load->library('upload');
    }

    function marqueeCreate()
    {
        $this->form_validation->set_rules('site_id', 'site_id', 'required');        
        $this->form_validation->set_rules('text', 'name', 'required');        

        $register_marquee   = new RunningText;

        $register_marquee->site_id           =  $this->input->post('site_id');
        $register_marquee->text              =  $this->input->post('text');                    

        if (!$register_marquee->save())
        {
          
            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$this->input->post('site_id'));     
            else
                redirect(base_url());    
        }
        else
        {                     

            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$this->input->post('site_id'));     
            else
                redirect(base_url());    
        }    
    }

    function marqueeUpdate()
    {
        $this->form_validation->set_rules('id', 'id', 'required');        
        $this->form_validation->set_rules('text', 'name', 'required');  
        
        if($this->form_validation->run()== FALSE)
        {     
            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$this->input->post('site_id'));     
            else
                redirect(base_url());                
        }
        else
        {              
            $register_marquee = RunningText::find($this->input->post('id'));
            $register_marquee->text              =  $this->input->post('text');
        
            $register_marquee->save();        

            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$this->input->post('site_id'));     
            else
                redirect(base_url());  
 
        }
    }

    function marqueeDelete($id,$site)
    {
        if(!isset($id) && !isset($site))
            redirect(base_url('site/list'));

        if($this->session->userdata('auth_role')!= "Administrator")
        {
            if($site != $this->session->userdata('auth_status'))
            {
                redirect(base_url('site/list'));  
            }
            else
            {
                $flight     = RunningText::find($id);        

                if($flight->delete())                    
                    redirect(base_url());
                else
                    redirect(base_url());
            }          
        }
        else 
        {
            $flight     = RunningText::find($id);        

            if($flight->delete())
                if($this->session->userdata('auth_role')== "Administrator")
                    redirect(base_url('site/show/').$site);
                else
                    redirect(base_url());
            else
                redirect(base_url('site/show/').$site);
        }
    }
}