<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // if(!$this->session->userdata('auth_status')){
		// 	redirect(base_url('Authentication'));
        // }
        
        $this->load->model('Site');
        $this->load->model('User');
        $this->load->model('Screen_Device');
        $this->load->model('Content');
    }

    function siteList()
    {
        header("Content-Type:Application/json");

        $site   =   Site::all(); 
        $loop   =   0;   
        $data;

        foreach ($site as $val) 
        {
            $tmplink            =   "<a  title='Show' href='".base_url('site/show/').$val['id']."'><i class='material-icons'>slideshow</i></a>&nbsp;<a  title='Change' href='".base_url('site/change/').$val['id']."'><i class='material-icons'>update</i></a>"."&nbsp;<a onclick='return confirm()'  title='Delete' href='".base_url('site/drop/').$val['id']."'><i class='material-icons'>delete</i></a>";

            $data[$loop][0]     =   $val['name'];
            $data[$loop][1]     =   $val['location'];
            $data[$loop][2]     =   User::where('site_id',$val['id'])->count();
            $data[$loop][3]     =   Screen_Device::where('site_id',$val['id'])->count();
            $data[$loop][4]     =   Content::where('site_id',$val['id'])->count();
            $data[$loop][5]     =   $tmplink;

            $loop++;
        }

        $final  =   array(
            'data'  => $data
        );

		header("Content-Type:Application/json");
		echo json_encode($final);
    }

    function siteCreate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');        
        
        $register_site      =   new Site;                
        
        $register_site->name            =  $this->input->post('name');
        $register_site->location        =  $this->input->post('location');
        $register_site->email           =  $this->input->post('email');
        $register_site->phone           =  $this->input->post('phone');
                
        if ($this->form_validation->run())
            if($register_site->save())        
                redirect(base_url('site/list'));
            else
                redirect(base_url('site/create'));
        else    
            redirect(base_url('site/create'));
    }

    function siteUpdate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');        
        $this->form_validation->set_rules('id', 'id', 'required');
        
        $update_site      =   Site::find($this->input->post('id',TRUE));                
        
        $update_site->name            =  $this->input->post('name');
        $update_site->location        =  $this->input->post('location');
        $update_site->email           =  $this->input->post('email');
        $update_site->phone           =  $this->input->post('phone');
                
        if ($this->form_validation->run())
            if($update_site->save())        
                redirect(base_url('site/list'));
            else
                redirect(base_url('site/change/').$this->input->post('id',TRUE));
        else    
            redirect(base_url('site/change/').$this->input->post('id',TRUE));
    }

    function siteDelete($id)
    {
        $flight     = Site::find($id);

        if($flight->delete())
            redirect(base_url('site/list'));
        else
            redirect(base_url('site/list'));
    }

    function siteView($id)
    {
        header("Content-Type:Application/json");

        if($id != NULL)
        {
            $data['site']       =   Site::find($id);
            $data['user']       =   User::find($id);
            $data['screen']     =   Screen_Device::find($id);
            $data['content']    =   Content::find($id);            

            $final  =   array(
                'data'  => $data
            );
    
            header("Content-Type:Application/json");
            echo json_encode($final);
        }            
        else        
        {
            redirect(base_url('user/list'));                    
        }
    }
}
