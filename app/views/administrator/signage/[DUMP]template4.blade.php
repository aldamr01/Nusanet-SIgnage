<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{base_url('vendor/bootstrap/dist/css/bootstrap.css')}}" />    
    <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Felipa" rel="stylesheet">
    <script src="{{base_url('vendor/jquery/dist/jquery.js')}}"></script>
    <script src="{{base_url('/scripts/timer.js')}}"></script>
    <script src="{{base_url('vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
    <style>
        html {
            height: 100%;
        }
        * { padding: 0; margin: 0; }
        html, body, #fullheight {
            min-height: 100% !important;
            height: 100%;
            padding:0;
            margin:0;
        }     
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
          }
          .headerx {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1;
            width: 100%;
            color: white;
            text-align: center;
          }
        .row{
            margin:0;
        }      
    </style>
    
</head>
<body >
    <div class="row" style="height:20%">        
        <div class="col-md-2" style="padding-top:30px;height:100%;">
            <h5 style="overflow:hidden;text-align:right;border-right:black 2px solid;padding-right:10px;font-family: 'Raleway', sans-serif;">
                Hotel Santika
                <br>
                Atlantis Ballroom
                <br>
                Schedule
            </h5>          
        </div>
        <div class="col-md-6" style="height:100%">
            <img class="img-rounded" src="https://www.sascleanindonesia.com/wp-content/uploads/2015/10/logo-hotel-santika.png" style="width:150px;height100px;padding-top:20px;" alt="">
        </div>
        <div class="col-md-3" style="height:100%">
            <p align="center">
                <a style="color:springgreen" class="weatherwidget-io" href="https://forecast7.com/en/n7d26112d75/surabaya/" data-label_1="SURABAYA" data-label_2="INDONESIA" data-icons="Climacons Animated" data-mode="Current" data-days="3" data-textcolor="{{$config['weather']}}">SURABAYA INDONESIA</a>
                <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                </script>
            </p>   
        </div>
    </div>        
    <div style="padding:0;margin:0;height: 73%;">        
        <div style="background:#f7f7f7;height:100%;"  class="col-md-8">
            <div class="col-md-8 offset-md-2" style="padding-top:20px;">
                <table class="table  table-striped borderless roundedt" style="text-align:center;margin:0">
                    <thead >
                        <th style="text-align:center">Group / Event</th>
                        <th style="text-align:center">Room</th>
                        <th style="text-align:center">Start / End</th>
                    </thead>
                    <tbody>
                        <?php $var="heads"; ?>
                        @foreach ($schedule as $val)
                        <?php
                            
                            if($var!=$val['title'])
                            {                                        
                                $temp="head";
                            }
                            else
                            {
                                $temp="nohead";
                            }
                            $var = $val['title'];
                            
                        ?>
                            @if ($temp=='head')
                                <tr class="tdhead">
                                    <td colspan="3" style="text-align:left;">
                                        <b style="margin-left:37px">{{$val['title']}}</b>
                                    </td>
                                </tr> 
                                <tr style="border-top:solid 0px white;">
                                    <td style="text-align:left;margin-left:37px">{{$val['description']}}</td>
                                    <td style="text-align:left;margin-left:37px">{{$val['room']}}</td>
                                    <td style="text-align:left;margin-left:37px">{{$val['start']}} - {{$val['end']}}</td>
                                </tr>       
                            @else
                                <tr style="border-top:solid 0px white;">
                                    <td style="text-align:left;margin-left:37px">{{$val['description']}}</td>
                                    <td style="text-align:left;margin-left:37px">{{$val['room']}}</td>
                                    <td style="text-align:left;margin-left:37px">{{$val['start']}} - {{$val['end']}}</td>
                                </tr>  
                            @endif
                        @endforeach                                                                
                    </tbody>
                </table>  
            </div>
        </div>                        
        <div style="background:#f7f1dc;height:100%;padding:0"   class="col-md-4">
            <div class="row" style="padding:0;margin:0;">
               <img style="img-round;max-width:100%;height:10%" src="https://media-api.xogrp.com/images/e76957a9-acae-4c9b-b019-9e8db2647b37~rs_768.h" alt="">
            </div>
            <div class="row" style="text-align:center;padding-top:10px;">
                <i>Atlantis Ballroom</i>                
            </div>
            <div class="row" style="padding:10px 40px 20px 40px;font-family: 'Felipa', cursive;">
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Id sed harum optio magnam porro, facilis deserunt aliquam architecto quia. Similique necessitatibus quia expedita dolorem. Eligendi temporibus asperiores inventore consectetur laborum"
            </div>
        </div>
    </div>
    
    <div style="height:7%;padding:0;margin:0;background:#d6d6d6">        
        <div class="col-md-9" >
            <p style="margin:0;padding-top:10px;">
                <b>Welcome to Hotel Santika Jemursari </b>
            </p>
        </div>
        <div class="col-md-3" style="height:100%;position:relative;border-left:black 2px solid">
            <b><p id="timer" style="position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)"></p></b>
        </div>
    </div>    
    
    <script>
        window.onload = date_time('timer');
    </script>
</body>
</html>