<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }

        $this->load->model('Template');                
        $this->load->library('upload');
    }


    function templateUpdate()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('site_id', 'sid', 'required');
             
        if ($this->input->post('weather',TRUE))         
             $a = $this->input->post('weather',TRUE);        
        else 
             $a = NULL;        
        
        if ($this->input->post('table',TRUE))         
             $b = $this->input->post('table',TRUE);        
        else 
             $b = NULL;
        

                
        if($this->form_validation->run()== FALSE)
        {                     
            redirect(base_url('site/show/').$this->input->post('site_id')); 
        }
        else
        {              
            $update_template                =   Template::find($this->input->post('id',TRUE));
            $update_template->weather       =   $a;
            $update_template->tabel         =   $b;
            

            if (isset($_FILES['background']) && $_FILES['background']['name'] != '')
            {
                $extb           =   pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
                $fbackground    =   "file_background".$this->input->post('id',TRUE)."_".md5($this->input->post('id',TRUE));
                $background     =   $this->ngupload($fbackground,'background');
                $nbackground    =   $fbackground.".".$extb;
            }
            else
            {
                $nbackground    =   $update_template->background;
            }
            
            if (isset($_FILES['logo']) && $_FILES['logo']['name'] != '')
            {
                $extl           =   pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $flogo          =   "file_logo".$this->input->post('id',TRUE)."_".md5($this->input->post('id',TRUE));
                $logo           =   $this->ngupload($flogo,'logo');
                $nlogo          =   $flogo.".".$extl;
            }
            else 
            {
                $nlogo          =   $update_template->logo;                
            }  

            $update_template->background   =   $nbackground;
            $update_template->logo         =   $nlogo;

            if ($update_template->save()) 
            {
                redirect(base_url('site/show/').$this->input->post('site_id')); 
            }    
            else 
            {
                redirect(base_url('site/show/').$this->input->post('site_id')); 
            }    
            
        }
    
    }

    function ngupload($name,$file)
    {
        $config = [
            'upload_path'   => 'files/',
            'file_name'     => $name,
            'allowed_types' => 'gif|jpg|png|jpeg|mp4|mkv|flv|mpeg|3gp|jpeg|JPG|',
            'max_size'      => 1024000,
            'overwrite'     => TRUE,              
        ];

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($file)) 
        {
            return false;        
        } 
        else 
        {
            return true ;//$this->amirrule_lib->filecheck($name);        
        }
    }
    
}

