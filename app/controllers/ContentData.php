<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContentData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Screen_Device');
        $this->load->model('Content');
    }

    
}