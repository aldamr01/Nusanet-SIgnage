<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
        
        $this->load->model('Schedule');
    }


    function scheduleCreate()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('room', 'room', 'required');
        $this->form_validation->set_rules('start', 'start', 'required');
        $this->form_validation->set_rules('end', 'end', 'required');
        $this->form_validation->set_rules('for_date', 'for_data', 'required');        
        $this->form_validation->set_rules('screen_id', 'foscreenr_data', 'required');
        $this->form_validation->set_rules('site_id', 'site', 'required');

        $register_schedule                  =   new Schedule;
        $varx                               =   "screen".$this->input->post('screen_id');  
        
        $register_schedule->title           =  $this->input->post('title');
        $register_schedule->description     =  $this->input->post('description');
        $register_schedule->room            =  $this->input->post('room');
        $register_schedule->start           =  $this->amirrule_lib->time_converter($this->input->post('start'));
        $register_schedule->end             =  $this->amirrule_lib->time_converter($this->input->post('end'));
        $register_schedule->for_date        =  $this->input->post('for_date');        
        $register_schedule->device_id       =  $this->input->post('screen_id');
        $register_schedule->target          =  $varx;
        $register_schedule->site_id         =  $this->input->post('site_id');        

        if ($this->form_validation->run())
            if($register_schedule->save()) 
                if($this->session->userdata('auth_role')== "Administrator")       
                    redirect(base_url('site/show/').$this->input->post('site_id'));
                else
                    redirect(base_url());
            else
                redirect(base_url('site/show/').$this->input->post('site_id'));
        else    
            redirect(base_url('site/show/').$this->input->post('site_id'));
    }

    function scheduleDelete($id,$site)
    {

        if(!isset($id) && !isset($site))
            redirect(base_url('site/list'));

        $flight     = Schedule::find($id);        

        if($flight->delete())
            if($this->session->userdata('auth_role')== "Administrator")
                redirect(base_url('site/show/').$site);
            else
                redirect(base_url());
        else
            redirect(base_url('site/show/').$site);
    }
}

