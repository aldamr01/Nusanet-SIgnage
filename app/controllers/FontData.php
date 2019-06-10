<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FontData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('auth_status'))
            redirect(base_url('Authentication'));   
        else
            if($this->session->userdata('auth_role')!= "Administrator")           
                redirect(base_url('Authentication'));   
        
        $this->load->model('Fonts');     
    }

    function fontList()
    {
        header("Content-Type:Application/json");

        $font   =   Fonts::all(); 
        $loop   =   0;   
        $data ;

        foreach ($font as $val) 
        {            
            $tmplink            =   "<a  title='Delete' href='".base_url('font/drop/').$val['id']."'><i class='material-icons'>delete</i></a>&nbsp;<a  title='Change' href='".base_url('font/change/').$val['id']."'><i class='material-icons'>update</i></a>"."&nbsp;";
            $data[$loop][0]     =   $val['font_name'];
            $data[$loop][1]     =   json_encode($val['created_at']);
            $data[$loop][2]     =   $tmplink;
            $loop++;
        }

        $final  =   array(
            'data'  => $data
        );

		header("Content-Type:Application/json");
		echo json_encode($final);
    }

    function fontCreate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');          
        
        $register_font                  =   new Fonts;          
                
        $register_font->font_name       =   $this->input->post('name');      
                
        if ($this->form_validation->run())        
            if($register_font->save())     
            {                               
                redirect(base_url('font/list'));
            }
            else
            {
                redirect(base_url('font/create'));
            }        
        else    
            redirect(base_url('font/create'));
    }

    function fontUpdate()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');              
        $this->form_validation->set_rules('id', 'id', 'required');
        
        $update_font      =   Fonts::find($this->input->post('id',TRUE));                
        
        $update_font->font_name            =  $this->input->post('name');  
                
        if ($this->form_validation->run())
            if($update_font->save())        
                redirect(base_url('font/list'));
            else
                redirect(base_url('font/change/').$this->input->post('id',TRUE));
        else    
            redirect(base_url('font/change/').$this->input->post('id',TRUE));
    }

    function fontDelete($id)
    {
        $flight     = Fonts::find($id);

        if($flight->delete())
            redirect(base_url('font/list'));
        else
            redirect(base_url('font/list'));
    }
    
}
