<html>
    <head>
        {{--  <meta http-equiv="refresh" content="10" >  --}}
        <style>
                body{
                    /* background-color: black; */
                    background-image: url("blob:https://web.whatsapp.com/275ef24a-340c-4a15-937b-4c501ab562ea");
                }
        
                #myVideo {
                    position: fixed;
                    top:0;
                    right: 0;
                    bottom: 0;
                    min-width: 100%;
                    min-height: 100%;
                }
    
        </style>
    </head>
    <body style="margin:0;">
        @foreach ($content as $val)                
            @if ($val['type']=='video')                        
                <video  id="myvideo" autoplay muted loop  poster="#ffffff">    
                    <source class="active" src="{{base_url('files/').$val['filename']}}" data-src="{{base_url('files/').$val['filename']}}" type="video/mp4">
                </video>
            @endif                                    
        @endforeach            
    </body>
</html>
