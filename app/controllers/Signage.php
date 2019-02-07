<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // if(!$this->session->userdata('auth_status')){
		// 	redirect(base_url('Authentication'));
        // }
        
        $this->load->model('User');
    }

    public function index()
    {
        echo $this->blade->stream('administrator.home');
    }
}
