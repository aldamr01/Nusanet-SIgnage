<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContentData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status')){
			redirect(base_url('Authentication'));
        }
        
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
        
        $fimage =   "file_".$this->input->post('site_id',TRUE)."_".$this->input->post('screen_id',TRUE)."_".md5($this->input->post('name',TRUE));
             
        
        if($this->form_validation->run()== FALSE)
        {     
            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$this->input->post('site_id'));     
            else
                redirect(base_url());                
        }
        else
        {              
            $varx   =   "screen".$this->input->post('screen_id');  
            $register_content = new Content;

            $register_content->site_id           =  $this->input->post('site_id');
            $register_content->device_id         =  $this->input->post('screen_id');
            $register_content->name              =  $this->input->post('name');
            $register_content->screen            =  $this->input->post($varx);
            $register_content->description       =  $this->input->post('desc');

            $config = [
                'upload_path'   => 'files/',
                'file_name'     => $fimage,
                'allowed_types' => 'gif|jpg|png|jpeg|mp4|mkv|flv|mpeg|3gp|jpeg|JPG|',
                'max_size'      => 1024000,
                'overwrite'     => TRUE,              
            ];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file'))
            {
                $error = array(
                    'error' => $this->upload->display_errors()
                );

                if($this->session->userdata('auth_role')== "Administrator") 
                    redirect(base_url('site/show/').$this->input->post('site_id'));     
                else
                    redirect(base_url());    
            }
            else
            {
                $register_content->filename     =   $this->amirrule_lib->filecheck($fimage);                
                $register_content->type         =   $this->amirrule_lib->formatfile($fimage);
                $register_content->save();        

                if($this->session->userdata('auth_role')== "Administrator") 
                    redirect(base_url('site/show/').$this->input->post('site_id'));     
                else
                    redirect(base_url());    
            }
        }
    }

    function contentUpdate()
    {
        $this->form_validation->set_rules('site_id', 'site_id', 'required');
        $this->form_validation->set_rules('screen_id', 'screen_id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('ctid', 'name', 'required');
        $this->form_validation->set_rules('desc', 'description', 'required');
        $fimage =   "file_".$this->input->post('site_id',TRUE)."_".$this->input->post('screen_id',TRUE)."_".md5($this->input->post('name',TRUE));

        $config = [
            'upload_path'   => 'files/',
            'file_name'     => $fimage,
            'allowed_types' => 'gif|jpg|png|jpeg|mp4|mkv|flv|mpeg|3gp|jpeg|JPG|',
            'max_size'      => 1024000,
            'overwrite'     => TRUE,              
        ];

        $this->upload->initialize($config);

        
             
        
        if($this->form_validation->run()== FALSE)
        {     
            if($this->session->userdata('auth_role')== "Administrator") 
                redirect(base_url('site/show/').$this->input->post('site_id'));     
            else
                redirect(base_url());                
        }
        else
        {              
            $varx   =   "screen".$this->input->post('screen_id');  
            $register_content = Content::find($this->input->post('ctid'));

            $register_content->site_id           =  $this->input->post('site_id');
            $register_content->device_id         =  $this->input->post('screen_id');
            $register_content->name              =  $this->input->post('name');
            $register_content->screen            =  $this->input->post($varx);
            $register_content->description       =  $this->input->post('desc');
            

            if (isset($_FILES['file']) && $_FILES['file']['name'] != '')
            {
                if (!$this->upload->do_upload('file'))
                {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );

                    if($this->session->userdata('auth_role')== "Administrator") 
                        redirect(base_url('site/show/').$this->input->post('site_id'));     
                    else
                        redirect(base_url());    
                }
                else
                {
                    $register_content->filename     =   $this->amirrule_lib->filecheck($fimage);                
                    $register_content->type         =   $this->amirrule_lib->formatfile($fimage);
                    $register_content->save();        

                    if($this->session->userdata('auth_role')== "Administrator") 
                        redirect(base_url('site/show/').$this->input->post('site_id'));     
                    else
                        redirect(base_url());    
                }
            }
            else 
            {
                $register_content->save();        

                if($this->session->userdata('auth_role')== "Administrator") 
                    redirect(base_url('site/show/').$this->input->post('site_id'));     
                else
                    redirect(base_url());  
            }  


            
        }
    }

    function contentDelete($id,$site)
    {
        if(!isset($id) && !isset($site))
        redirect(base_url('site/list'));

        if($this->session->userdata('auth_role')!= "Administrator")
        {
            if($site != $this->session->userdata('auth_status'))
            {
                redirect(base_url('site/list'));  
            }
            else
            {
                $flight     = Content::find($id);        

                if($flight->delete())                    
                    redirect(base_url());
                else
                    redirect(base_url());
            }          
        }
        else 
        {
            $flight     = Content::find($id);        

            if($flight->delete())
                if($this->session->userdata('auth_role')== "Administrator")
                    redirect(base_url('site/show/').$site);
                else
                    redirect(base_url());
            else
                redirect(base_url('site/show/').$site);
        }
    }
}