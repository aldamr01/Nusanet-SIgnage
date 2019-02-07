<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');        
    }

    public function login()
    {
        if($this->session->userdata('auth_status'))
            redirect(base_url());
        else
            echo $this->blade->stream('default.login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("Authentication"));
    }

    public function checkUser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run())
        {
            $where = array(
                'username' => $this->input->post('username',TRUE),
                'password' => $this->input->post('password',TRUE)
            );

            $auth   = User::where($where)->first();
            $check  = FALSE;

            if(count($auth)>=1){
                $Udata    = User::with('datauser')->find($auth->id);
                $Newdata  = array(
                  'auth_id'                 => $Udata['id'],
                  'auth_username'           => $Udata['username'],
                  'auth_password'           => $Udata['password'],
                  'auth_role'               => $Udata['role'],
                  'auth_status'             => TRUE,
                  'auth_router_ip'          => $Udata['datauser']['router_ip'],
                  'auth_router_username'    => $Udata['datauser']['router_username'],
                  'auth_router_password'    => $Udata['datauser']['router_password'],
                  'auth_router_name'        => $Udata['datauser']['router_name'],                
                  'auth_router_interval'    => $Udata['datauser']['interface_interval']
                );
            
                $this->session->set_userdata($Newdata);
                $check  = TRUE;
            }
        
            if($check ==TRUE)
            {
                redirect(base_url());
            }
            else
            {
                redirect(base_url("Authentication"));
            }   
        }
        else
        {
            redirect(base_url('Authentication'));
        }
    }
}
