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
                speed: 100,
                space: 100,
                font: '{{$config["font_type_2"]}}',
                size: {{$config["font_size_2"]}},   
                color: '{{$config["font_color_2"]}}',
                background: '{{$config["background_marquee"]}}',
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
            height:98%;
            width:100%;
            overflow:hidden;
            background:{{$config["background_video"]}};
            
        }

        .schedule{
            position: relative;
            overflow: hidden;
            background-size:cover;
            height:70%;
            min-height:90%;
            background: url({{base_url('rep.png')}}); // KURANG IKI TOK , LEK SEMISAL AREP DI TEST , TOLONG IKI DI GAWE DINAMIS
            background-position:center;
            background-size:cover;
            background-repeat:repeat;
            background-attachment:center;  
        }

       .rey {
            position: inherit;
            overflow: hidden;
            /* background-color:black; */
            height:97%;
            min-height:97%;
            width:90%;
        }
               
        .rey video {            
            max-width:100%;
            min-height:100%;                        
        }        

        .slider{
            margin-top:-30px;
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
            border-top: solid 1px #957030;
        }
        .roundedt tbody tr:last-child td:first-child {
            border-radius: 0 0 0 10px;
        }
        .roundedt tbody tr:last-child td:last-child {
            border-radius: 0 0 10px 0;
        }

        .font1{
            font-family: "{{$config['font_type_1']}}";
            font-size:{{$config['font_size_1']}};
            color:{{$config['font_color_1']}};
        }        

    </style>
</head>
<body>
    
    <div class="maxw">
        <div class="row" style="padding:0;height:100%;margin:0;">
            <div class="rey col-md-12" style="padding:0">
                <video autoplay muted loop poster="https://dummyimage.com/900x400/000/fff">    
                    @foreach ($content as $val)                
                        @if ($val['type']=='video') 
                            <source class="active" src="{{base_url('files/').$val['filename']}}" data-src="{{base_url('files/').$val['filename']}}" type="video/mp4">
                        @endif
                    @endforeach
                </video>
            </div>                                      
            <div class="slider" style="width:100%;height:15%;border-top:10px solid {{$config['slider_color']}};z-index:999;"></div>        
        </div>                
    </div>
</body>
</html>