<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('RouterConfig');
        
        if(!$this->session->userdata('auth_status'))
            redirect(base_url('Authentication'));   
        else
            if($this->session->userdata('auth_role')!= "Administrator")           
                redirect(base_url('Authentication'));    
        
		
    }

    public function userCreate()
    {
        $this->form_validation->set_rules('name_user', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');        

        $counter_user       =   User::count()+1;
        $register_user      =   new User;
        $register_router    =   new RouterConfig;

        
        
        $register_user->username            =  $this->input->post('username');
        $register_user->password            =  $this->input->post('password');
        $register_user->role                =  $this->input->post('role');
        $register_router->router_name       =  $this->input->post('name_user');
        $register_router->user_id           =  $counter_user;
        $register_router->router_ip         =  $this->input->post('router_ip');            
        $register_router->router_username   =  $this->input->post('router_username');
        $register_router->router_password   =  $this->input->post('router_password');
        $register_router->router_port       =  $this->input->post('router_port');
        
        

        if ($this->form_validation->run())
            if($register_router->save() && $register_user->save())        
                redirect(base_url('user/list'));
            else
                redirect(base_url('user/create'));
        else    
            redirect(base_url('user/create'));

    }

    public function userDelete($id)
    {
        $flight     = User::find($id);
        $flight2    = RouterConfig::find($id);

        if($flight->delete() && $flight2->delete())
            redirect(base_url('user/list'));
        else
            redirect(base_url('user/list'));
    }


    public function userUpdate()
    {
        $this->form_validation->set_rules('name_user', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role User', 'required');
        $this->form_validation->set_rules('router_ip', 'IP ROuter', 'required');
        $this->form_validation->set_rules('router_username', 'Username Router', 'required');
        $this->form_validation->set_rules('router_password', 'Password ROuter', 'required');
        $this->form_validation->set_rules('router_port', 'Port Router', 'required');
        $this->form_validation->set_rules('id', 'id', 'required');

        
        $register_user      =   User::find($this->input->post('id'));
        $register_router    =   RouterConfig::find($this->input->post('id'));        
        $id                 =   $this->input->post('id');

        $register_user->username            =  $this->input->post('username');
        $register_user->password            =  $this->input->post('password');
        $register_user->role                =  $this->input->post('role');
        $register_router->router_name       =  $this->input->post('name_user');        
        $register_router->router_ip         =  $this->input->post('router_ip');            
        $register_router->router_username   =  $this->input->post('router_username');
        $register_router->router_password   =  $this->input->post('router_password');
        $register_router->router_port       =  $this->input->post('router_port');
        $temp   =   array(            
            'auth_username'           => $this->input->post('username'),
            'auth_password'           => $this->input->post('password'),
            'auth_role'               => $this->input->post('role'),            
            'auth_router_ip'          => $this->input->post('router_ip'),
            'auth_router_username'    => $this->input->post('router_username'),
            'auth_router_password'    => $this->input->post('router_password'),
            'auth_router_name'        => $this->input->post('router_name')
        );

        if ($this->form_validation->run())
        {
            if($register_router->save() && $register_user->save())     
            {
                $this->session->set_userdata($temp);
                redirect(base_url('user/change/').$id);
            }                   
            else
            {
                redirect(base_url('user/change/').$id);
            }                
        }
        else    
        {
            redirect(base_url('user/change/').$id);
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
