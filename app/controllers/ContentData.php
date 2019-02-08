<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContentData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Screen_Device');
        $this->load->model('Content');
        $this->load->library('upload');
    }

    function contentCreate()
    {
        $this->form_validation->set_rules('site_id', 'site_id', 'required');
        $this->form_validation->set_rules('screen_id', 'screen_id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('desc', 'description', 'required');

        $fimage =   "img_".$this->input->post('site_id',TRUE)."_".$this->input->post('screen_id',TRUE)."_".$this->input->post('name',TRUE);

        if($this->form_validation->run()== FALSE)
        {
            echo "xxa";
            die();
            redirect(base_url('site/show/').$this->input->post('site_id')); 
        }
        else
        {   
            $register_content = new Content;

            $register_content->site_id           =  $this->input->post('site_id');
            $register_content->device_id         =  $this->input->post('screen_id');
            $register_content->name              =  $this->input->post('name');
            $register_content->description       =  $this->input->post('desc');

            $config = [
                'upload_path'   => 'files/',
                'file_name'     => $fimage,
                'allowed_types' => 'gif|jpg|png|jpeg|mp4|mkv|flv|mpeg|3gp',
                'max_size'      => 100000,
                'max_width'     => 4000,
                'max_height'    => 4000
            ];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file'))
            {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                echo json_encode($error);
                die();
                redirect(base_url('site/show/').$this->input->post('site_id')); 
            }
            else
            {
                $register_content->filename           = $this->amirrule_lib->filecheck($fimage);                
                $register_content->save();        
                redirect(base_url('site/show/').$this->input->post('site_id')); 
            }
        }
    }
}