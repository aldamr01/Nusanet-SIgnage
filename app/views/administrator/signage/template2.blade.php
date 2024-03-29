<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="{{base_url('styles/snackmarquee.css')}}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" crossorigin="anonymous"></script>
    <script src="{{base_url('scripts/snackmarquee.js')}}"></script>


    <script>
        function deferVideo() {

            //defer html5 video loading
            $("video source").each(function() {
            var sourceFile = $(this).attr("data-src");
            $(this).attr("src", sourceFile);
            var video = this.parentElement;
            video.load();
            // uncomment if video is not autoplay
            //video.play();
            });

        }
        window.onload = deferVideo;
    </script>    
    <script>
        let slider;    
        $(document).ready(function () {
            slider = new SnackMarquee({
                selector: '.slider',
                mode: 'right',
                speed: 50,
                space: 100,
                font: '{{$config["font_type_2"]}}',
                size: {{$config["font_size_2"]}},   
                color: '{{$config["font_color_2"]}}',
                background: '',
                width: 0,                
                height: 0,
                children: [
                    @foreach($running_text as $val)
                        '{{$val["text"]}}',
                    @endforeach
                ]
            });
            slider.start()
        });
        
    </script>
    <style>
        html,body,.maxw{
            padding:0;
            margin:0;
            height:100%;
            width:100%;
            overflow:hidden;
            background:{{$config["background_video"]}};            
        }

        .schedule{
            position: relative;
            overflow: hidden;            
            height:70%;
            min-height:90%;
            background: linear-gradient( {{$config['background_color_schedule']}},{{$config['background_color_schedule']}} ), url({{base_url('files/').$config['background_schedule']}}); /* KURANG IKI TOK , LEK SEMISAL AREP DI TEST , TOLONG IKI DI GAWE DINAMIS*/            
            background-position:center;
            background-size:contain;
            background-repeat:repeat;
            background-attachment:center;
        }

       .rey {
            position: inherit;
            overflow: hidden;
            /* background-color:black; */
            height:93%;
            min-height:93%;
            width:93%;
        }
               
        .rey video {            
            max-width:100%;
            min-height:100%;                        
        }        

        .slider{
            margin-top:-20px;
            size: cover;
            position: relative;
            overflow: hidden;
            background: linear-gradient({{$config["background_marquee"]}},{{$config["background_marquee"]}}),url({{base_url("files/").$config["background_image_marquee"]}});
            background-position:center;
            background-size:contain;
            background-repeat:repeat;
            background-attachment:center;
        }

        .borderless td, .borderless th {
            border: none;                
        }
        .roundedt {
            border: none;
        }
        .roundedt thead th {
            background-color: {{$config['tabel']}};
            border: none;
        }
        .roundedt thead th:first-child {
            border-radius: 10px 0 0 0;
        }
        .roundedt thead th:last-child {
            border-radius: 0 10px 0 0;
        }
        .roundedt tbody td {
            border: none;
            background-color: {{$config['tabel']}};
            /*border-top: solid 1px #957030;*/
        }
        .tdhead{
            border: none;
            background-color: {{$config['tabel']}};
            border-top: solid 1px {{$config['border_table_color']}}/*#957030*/;
        }
        .roundedt tbody tr:last-child td:first-child {
            border-radius: 0 0 0 10px;
        }
        .roundedt tbody tr:last-child td:last-child {
            border-radius: 0 0 10px 0;
        }

        .font1{
            font-family: "{{$config['font_type_1']}}";
            font-size:{{$config['font_size_1']}}px;
            color:{{$config['font_color_1']}};
            vertical-align: middle;
            margin-bottom:0px;
        }
        .fonthead{
            font-family: "{{$config['font_type_1']}}";
            font-size:{{$config['font_size_1h']}}px;
            color:{{$config['font_color_1h']}};
            margin-bottom:0px;
        }        
        
    </style>
</head>
<body> 
    
    <div class="maxw">
        <div class="row" style="padding:0;height:100%;margin:0;">
            <div class="rey col-xs-7" style="padding:0;width:70%;max-width:70%">
                <video autoplay loop poster="https://dummyimage.com/600x400/000/000000">    
                    @foreach ($content as $val)                
                        @if ($val['type']=='video') 
                            <source class="active" src="{{base_url('files/').$val['filename']}}" data-src="{{base_url('files/').$val['filename']}}" type="video/mp4">
                        @endif
                    @endforeach
                </video>
            </div>
            <div class="schedule col-xs-5" style="padding:0;border-left:5px solid {{$config['slider_color']}};max-width:30%;width:30%">
                {{--<div class="row" style="padding:0;margin:0;">
                    <div class="col-md-12"style="padding:0;height:100%;margin:0;">                       
                        <a class="weatherwidget-io" href="https://forecast7.com/en/n7d26112d75/surabaya/" data-label_1="SURABAYA" data-label_2="WEATHER" data-icons="Climacons Animated" data-mode="Current" data-days="3" data-theme="random_grey" data-textcolor="#fdfdfd" >SURABAYA WEATHER</a>
                        <script>
                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                        </script>      
                    </div>                
                </div>---}}
                <br>
                <div class="row" style="max-width:100%;width:100%;margin-left:0px;">
                    <div class="col-md-12"style="padding:0;height:100%;margin:0;">
                        <div class="col-md-10" style="padding:10px;">
                            <p align="center" class="fonthead" style="font-weight:900"><b>TODAY</b></p>
                            <p align="center" class="fonthead">EVENT SCHEDULE</p>
                            
                            @foreach($schedule as $val)
                                <br>
                                <p class="font1" align="center">{{$val['groupevent']}}</p>
                                <p class="font1" align="center">{{$val['timeevent']}}</p>
                                <p class="font1" align="center" style="border-bottom:1px solid {{$config['slider_color']}}; padding-bottom:5px;width:100%;">{{$val['locationevent']}}</p>
                            @endforeach
                            
                            {{--- <table class="table  table-striped borderless roundedt" style="text-align:center;margin:0;font-size:18px;color:white;font-style:bold">
                                <thead >
                                    <th style="text-align:left" class="fonthead">Event</th>
                                    <th style="text-align:left" class="fonthead">Room</th>
                                    <th style="text-align:left" class="fonthead">Time</th>
                                </thead>
                                <tbody>                                   
                                    @foreach ($schedule as $val)                                    
                                        <tr style="border-top:solid 0px white;padding-top:10px;padding-bottom:5px;">
                                            <td style="text-align:left;padding-top:0px;padding-bottom:5px;vertical-align: middle;" class="font1">{{$val['description']}}</td>
                                            <td style="text-align:left;padding-top:0px;padding-bottom:5px;vertical-align: middle;" class="font1">{{$val['room']}}</td>
                                            <td style="text-align:center;padding-top:0px;padding-bottom:5px;" class="font1">{{strtoupper($val['start'])}}<br>{{strtoupper($val['end'])}}</td>
                                        </tr>                                          
                                    @endforeach                                                                
                                </tbody>
                            </table>  ---}}
                        </div>
                    </div>
                </div>
            </div>                            
            <div class="slider" style="width:100%;height:15%;border-top:5px solid {{$config['slider_color']}};z-index:999;"></div>        
        </div>                
    </div>
</body>
</html>