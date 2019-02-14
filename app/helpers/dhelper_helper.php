<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('create_captcha'))
{
    function ping_url($url)
    {
        $ch         =    curl_init($url);

        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data       =   curl_exec($ch);
        $httpcode   =   curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if($httpcode>=200 && $httpcode<300)
            return true;
        else
            return false;        
    }
}



