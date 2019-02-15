<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserView extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');        

        if(!$this->session->userdata('auth_status'))
            redirect(base_url('Authentication'));   
        else
            if($this->session->userdata('auth_role')!= "Administrator")           
                redirect(base_url('Authentication'));
    }

    public function userList()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.user.user_list',$data);
    }

    public function userUpdate($id)
    {                    
        $data['thisuser']   = $this->session->all_userdata();
        $data['data']   =   User::with('datauser')->where('id',$id)->first();        
        echo $this->blade->stream('administrator.user.user_update',$data);
    }

    public function userCreate()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.user.user_create',$data);
    }
}
