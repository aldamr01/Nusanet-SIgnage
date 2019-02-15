<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteView extends CI_Controller
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
        $this->load->model('Schedule');
    }

    function siteList()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.site.site_list',$data);
    }

    function siteCreate()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.site.site_create',$data);
    }

    function siteUpdate($id)
    {
        $data['thisuser']   = $this->session->all_userdata();
        $data['data']   =   Site::find($id);
        echo $this->blade->stream('administrator.site.site_update',$data);
    }

    function siteView($id)
    {
        if($id != NULL)
        {
            $data['site']       =   Site::find($id);
            $data['user']       =   User::where('site_id',$id)->get();
            $data['screen']     =   Screen_Device::where('site_id',$id)->get();
            $data['content']    =   Content::where('site_id',$id)->get();
            $data['template']   =   Template::where('site_id',$id)->get();
            $data['schedule']   =   Schedule::where('site_id',$id)->get();
            $final  =   array(
                'data'  => $data
            );
            $data['thisuser']   = $this->session->all_userdata();
            
            echo $this->blade->stream('administrator.site.site_view',$data);
        }            
        else        
        {
            redirect(base_url('user/list'));                    
        }
    }
}

