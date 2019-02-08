<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        
        // if(!$this->session->userdata('auth_status'))
        //     redirect(base_url('Authentication'));   
        // else
        //     if($this->session->userdata('auth_role')!= "Administrator")           
        //         redirect(base_url('Authentication'));    
        
		
    }

    public function userCreate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('site_id', 'Role User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');        

        $register_user      =   new User;
        
        
        $register_user->username            =  $this->input->post('username');
        $register_user->name                =  $this->input->post('name');
        $register_user->password            =  $this->input->post('password');
        $register_user->email               =  $this->input->post('email');
        $register_user->site_id             =  $this->input->post('site_id');        
        
        

        if ($this->form_validation->run())
            if($register_user->save())        
                redirect(base_url('site/show/').$this->input->post('site_id'));
            else
                redirect(base_url('site/show/').$this->input->post('site_id'));
        else    
            redirect(base_url('site/show/').$this->input->post('site_id'));

    }

    public function userDelete($id,$site)
    {
        $flight     = User::find($id);        

        if($flight->delete())
            redirect(base_url('site/show/').$site);
        else
            redirect(base_url('site/show/').$site);    
    }


    public function userUpdate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id', 'Role User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required'); 
        $this->form_validation->set_rules('site_id', 'Email', 'required');

        
        $update_user      =   User::find($this->input->post('id'));       

        $update_user->username              =  $this->input->post('username');
        $update_user->password              =  $this->input->post('password');
        $update_user->name                  =  $this->input->post('name');
        $update_user->email                 =  $this->input->post('email');        
        
        

        if ($this->form_validation->run())
        {
            if($update_user->save())     
            {                
                redirect(base_url('site/show/').$this->input->post('site_id'));
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

    public function userList()
    {
        header("Content-Type:Application/json");

        $tmp    =   User::with('datauser')->get();
        $loop   =   0;
        $data;

        foreach ($tmp as $val) 
        {
            if($val['role']=='User')
            {
                $templink       =   "<p align='center'><a  class='' href='".base_url('user/change/').$val['id']."'>Update</a>
           
                <a class='btn btn-danger' onclick='return confirm();' href='".base_url('user/drop/').$val['id']."' >Drop</a></p>";
                $data[$loop][0] =   $val['datauser']['id'];
                $data[$loop][1] =   $val['datauser']['router_name'];
                $data[$loop][2] =   $val['datauser']['router_ip'];
                $data[$loop][3] =   $val['role'];
                $data[$loop][4] =   $templink;
                $loop++;
            }            
        }

        $final  =   array(
            'data'  => $data
        );

		header("Content-Type:Application/json");
		echo json_encode($final);
        
        
    }
    
    public function userView($id)
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
