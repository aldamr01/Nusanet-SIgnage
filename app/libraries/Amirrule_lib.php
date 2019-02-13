<?php
if(!DEFINED('BASEPATH')) exit('No Direct Script Allowed!');

class Amirrule_lib
{

    public function randomizer($limit)
    {
        $karakter= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKL1234567890';
        $string = '';
        for ($i = 0; $i < $limit; $i++)
        {
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos}; 
        }
       return $string; 
    }
    
    function filecheck($param)
    {
        $path   =   "files/".$param;

        if(file_exists($path.".jpg"))
            return  $param.".jpg";
        elseif(file_exists($path.".png"))
            return  $param.".png";
        elseif(file_exists($path.".jpeg"))
            return  $param.".jpeg";
        elseif(file_exists($path.".gif"))
            return  $param.".gif";
        elseif(file_exists($path.".mkv"))
            return  $param.".mkv";
        elseif(file_exists($path.".mp4"))
            return  $param.".mp4";
        elseif(file_exists($path.".3gp"))
            return  $param.".3gp";
        elseif(file_exists($path.".flv"))
            return  $param.".flv";
        elseif(file_exists($path.".mpeg"))
            return  $param.".mpeg";
        else
            return  false;
   
    }
    
    function today()
    {
        return date("Y-m-d");
    }

    function formatfile($param)
    {
        $path   =   "files/".$param;

        if(file_exists($path.".jpg"))
            return "images";
        elseif(file_exists($path.".png"))
          return "images";
        elseif(file_exists($path.".jpeg"))
            return "images";
        elseif(file_exists($path.".gif"))
             return "images";
        elseif(file_exists($path.".mkv"))
           return "video";
        elseif(file_exists($path.".mp4"))
           return "video";
        elseif(file_exists($path.".3gp"))
            return "video";
        elseif(file_exists($path.".flv"))
            return "video";
        elseif(file_exists($path.".mpeg"))
            return "video";
        else
            return  false;
   
    }

    function time_converter($time)
    {
        return date("h:i a", strtotime($time));
    }

}