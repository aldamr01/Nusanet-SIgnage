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

    function templateCreate()
    {
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('site_id','site_id','required');
        $this->form_validation->set_rules('type','type','required');

        if(!$this->form_validation->run())
            redirect(base_url('site/show').$this->input->post('site_id'));
        
        $template   =   new Template;

        $template->site_id  =   $this->input->post('site_id');
        $template->name     =   $this->input->post('name');
        $template->type     =   $this->input->post('type');

        if($template->save())
            if($this->session->userdata('auth_role')== "Administrator")
                redirect(base_url('site/show/').$this->input->post('site_id')); 
            else 
                redirect(base_url('template/MyTemplate')); 
        else 
            if($this->session->userdata('auth_role')== "Administrator")
                redirect(base_url('site/show/').$this->input->post('site_id')); 
            else 
                redirect(base_url('template/MyTemplate')); 
    }


    function templateUpdate()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('site_id', 'sid', 'required');        
        $update_template                    =   Template::find($this->input->post('id',TRUE));

        if ($this->input->post('weather',TRUE))         
             $weather = $this->input->post('weather',TRUE);        
        else 
             $weather = $update_template->weather;        
        
        if ($this->input->post('table',TRUE))         
             $tabel = $this->input->post('table',TRUE);        
        else 
             $tabel = $update_template->table;
        
        if ($this->input->post('gradient',TRUE))         
             $gradient_color = $this->input->post('gradient',TRUE);        
        else 
             $gradient_color = $update_template->gradient_color;

        if ($this->input->post('center',TRUE))         
             $center_color = $this->input->post('center',TRUE);        
        else 
             $center_color = $update_template->center_color;
        
        if ($this->input->post('font_type_1',TRUE))         
             $font_type_1 = $this->input->post('font_type_1',TRUE);        
        else 
             $font_type_1 = $update_template->font_type_1;

        if ($this->input->post('font_size_1',TRUE))         
             $font_size_1 = $this->input->post('font_size_1',TRUE);        
        else 
             $font_size_1 = $update_template->font_size_1;

        if ($this->input->post('font_color_1',TRUE))         
             $font_color_1 = $this->input->post('font_color_1',TRUE);        
        else 
             $font_color_1 = $update_template->font_color_1;

        if ($this->input->post('font_type_2',TRUE))         
             $font_type_2 = $this->input->post('font_type_2',TRUE);        
        else 
             $font_type_2 = $update_template->font_type_2;

        if ($this->input->post('font_size_2',TRUE))         
             $font_size_2 = $this->input->post('font_size_2',TRUE);        
        else 
             $font_size_2 = $update_template->font_size_2;

        if ($this->input->post('font_color_2',TRUE))         
             $font_color_2 = $this->input->post('font_color_2',TRUE);        
        else 
             $font_color_2 = $update_template->font_color_2;

        if ($this->input->post('background_video',TRUE))         
             $background_video = $this->input->post('background_video',TRUE);        
        else 
             $background_video = $update_template->background_video;

        if ($this->input->post('slider_color',TRUE))         
             $slider_color = $this->input->post('slider_color',TRUE);        
        else 
             $slider_color = $update_template->slider_color;

        if ($this->input->post('background_marquee',TRUE))         
             $background_marquee = $this->input->post('background_marquee',TRUE);        
        else 
             $background_marquee = $update_template->background_marquee;

        if ($this->input->post('border_table_color',TRUE))         
             $border_table_color = $this->input->post('border_table_color',TRUE);        
        else 
             $border_table_color = $update_template->border_table_color;
     
        if ($this->input->post('font_size_1h',TRUE))         
             $font_size_1h = $this->input->post('font_size_1h',TRUE);        
        else 
             $font_size_1h = $update_template->font_size_1h;

        if ($this->input->post('font_color_1h',TRUE))         
             $font_color_1h = $this->input->post('font_color_1h',TRUE);        
        else 
             $font_color_1h = $update_template->font_color_1h;
                
        if($this->form_validation->run()== FALSE)
        {                     
            redirect(base_url('site/show/').$this->input->post('site_id')); 
        }
        else
        {              
            
            $update_template->weather           =   $weather;
            $update_template->tabel             =   $tabel;
            $update_template->gradient_color    =   $gradient_color;
            $update_template->center_color      =   $center_color;
            $update_template->font_type_1       =   $font_type_1;
            $update_template->font_size_1       =   $font_size_1;
            $update_template->font_color_1      =   $font_color_1;
            $update_template->font_type_2       =   $font_type_2;
            $update_template->font_size_2       =   $font_size_2;
            $update_template->font_color_2      =   $font_color_2;
            $update_template->background_video  =   $background_video;
            $update_template->slider_color      =   $slider_color;
            $update_template->background_marquee=   $background_marquee;
            $update_template->border_table_color=   $border_table_color;
            $update_template->font_size_1h      =   $font_size_1h;
            $update_template->font_color_1h      =   $font_color_1h;
            $update_template->name              =   $this->input->post('name',TRUE);
            
            if (isset($_FILES['background_schedule']) && $_FILES['background_schedule']['name'] != '')
            {
                $extbs           =   pathinfo($_FILES['background_schedule']['name'], PATHINFO_EXTENSION);
                $fbackgrounds    =   "file_backgrounds".$this->input->post('id',TRUE)."_".md5($this->input->post('id',TRUE)).date('d-m-Y');
                $backgrounds     =   $this->ngupload($fbackgrounds,'background_schedule');
                $sbackgrounds    =   $fbackgrounds.".".$extbs;
            }
            else
            {
                $sbackgrounds    =   $update_template->background_schedule;
            }

            if (isset($_FILES['background']) && $_FILES['background']['name'] != '')
            {
                $extb           =   pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
                $fbackground    =   "file_background".$this->input->post('id',TRUE)."_".md5($this->input->post('id',TRUE)).date('d-m-Y');
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
                $flogo          =   "file_logo".$this->input->post('id',TRUE)."_".md5($this->input->post('id',TRUE)).date('d-m-Y');
                $logo           =   $this->ngupload($flogo,'logo');
                $nlogo          =   $flogo.".".$extl;                
            }
            else 
            {
                $nlogo          =   $update_template->logo;                
            }  

            $update_template->background            =   $nbackground;
            $update_template->logo                  =   $nlogo;
            $update_template->background_schedule   =   $sbackgrounds;

           
            if ($update_template->save()) 
            {
                if($this->session->userdata('auth_role')!= "Administrator")
                    redirect(base_url('template/MyTemplate')); 
                else                     
                    redirect(base_url('site/show/').$this->input->post('site_id')); 
            }    
            else 
            {
                if($this->session->userdata('auth_role')!= "Administrator")
                    redirect(base_url('template/MyTemplate')); 
                else                     
                    redirect(base_url('site/show/').$this->input->post('site_id')); 
            }    
            
        }
    
    }

    function templateDelete($id,$site)
    {

        if(!isset($id) && !isset($site))
            redirect(base_url('site/show'));

        if($this->session->userdata('auth_role')!= "Administrator")
        {
            if($site != $this->session->userdata('auth_status'))
            {
                redirect(base_url('site/list'));  
            }
            else
            {
                $flight     = Template::find($id);        

                if($flight->delete())                    
                    redirect(base_url('template/MyTemplate'));
                else
                    redirect(base_url('template/MyTemplate'));
            }          
        }
        else 
        {
            $flight     = Template::find($id);        

            if($flight->delete())            
                redirect(base_url('site/show/').$site);                
            else
                redirect(base_url('site/show/').$site);
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

