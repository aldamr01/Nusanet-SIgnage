<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteView extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // if(!$this->session->userdata('auth_status')){
		// 	redirect(base_url('Authentication'));
        // }
        
        $this->load->model('User');
        $this->load->model('Site');
        $this->load->model('Screen_Device');
        $this->load->model('Content');
    }

    function siteList()
    {
        echo $this->blade->stream('administrator.site.site_list');
    }

    function siteCreate()
    {
        echo $this->blade->stream('administrator.site.site_create');
    }

    function siteUpdate($id)
    {
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
            
            $final  =   array(
                'data'  => $data
            );
    
            echo $this->blade->stream('administrator.site.site_view',$data);
        }            
        else        
        {
            redirect(base_url('user/list'));                    
        }
    }
}
