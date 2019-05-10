<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();     
        
        $this->load->model('User');
        $this->load->model('Screen_Device');
        $this->load->model('Site');
        $this->load->model('Content');
        $this->load->model('Schedule');
        $this->load->model('Template');
    }

    public function index()
    {
        if(!$this->session->userdata('auth_status'))
			redirect(base_url('Authentication'));
        

        if($this->session->userdata('auth_role')== "Administrator")
        {
            $data['thisuser']   = $this->session->all_userdata();
            echo $this->blade->stream('administrator.home',$data);
        }
        else
        {
            $temp                   =   Site::find($this->session->userdata('auth_site'));        
            $data['site']           =   $temp;
            $data['site_id']        =   $temp['token'];
            $data['thisuser']       =   $this->session->all_userdata();        
            $data['screen']         =   Screen_Device::where('site_id',$this->session->userdata("auth_site"))->get();
            echo $this->blade->stream('administrator.screen.screen_list',$data);
        }
    }

    public function er404()
    {
        $data['thisuser']   = $this->session->all_userdata();
        echo $this->blade->stream('administrator.404',$data);
    }

    function screenView($site_id,$screen_id,$token)
    {
        
        $where              =   array(
            'device_id'     =>  $screen_id,
            'for_date'      =>  $this->amirrule_lib->today()
        );        

        $site               =   Site::find($site_id);
        $screen             =   Screen_Device::find($screen_id);

        $where2             =   array(
            'type'          =>  $screen['type'],
            'site_id'       =>  $site_id
        );

        $data['content']    =   Content::where('device_id',$screen_id)->orderBy('created_at','DESC')->get();
        $data['schedule']   =   Schedule::where($where)->orderBy('start','ASC')->get();
        $data['config']     =   Template::where($where2)->first();

        // header('Content-Type:Application/json');
        // echo json_encode($data)       ;
        // die();
        
        if($site->token == $token)
        {
            if($screen->site_id == $site->id)
            {                                            
                switch ($screen->type) {
                    case '1':
                        echo $this->blade->stream('administrator.signage.template1',$data);
                        break;

                    case '2':                      
                        echo $this->blade->stream('administrator.signage.template2',$data);
                        break;
                    
                    case '3':
                        echo $this->blade->stream('administrator.signage.template3',$data);
                        break;

                    default:
                        # code...
                        break;
                }
                
            }
            else
            {
                echo "x";
               // redirect(base_url('site/show/').$this->input->post('site_id'));
            }
        }
        else
        {
            echo "x2";
            //redirect(base_url('site/show/').$this->input->post('site_id'));
        }

    }
    
}
