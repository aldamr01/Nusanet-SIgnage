<html>
    <head>
        {{--  <meta http-equiv="refresh" content="10" >  --}}
        <style>
                body{
                    /* background-color: black; */
                    background-image: url("blob:https://web.whatsapp.com/275ef24a-340c-4a15-937b-4c501ab562ea");
                }
                .container {
                    width: 100%;
                    height: 100%;
                    position: relative;
                }

                .video-container {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    width: 100%;
                    height: 100%; 
                    overflow: hidden;
                }
                .video-container video {
                    /* Make video to at least 100% wide and tall */
                    min-width: 100%; 
                    min-height: 100%; 

                    /* Setting width & height to auto prevents the browser from stretching or squishing the video */
                    width: auto;
                    height: auto;

                    /* Center the video */
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%,-50%);
                }
               
                .container .slide {
                    z-index: 1;
                    position: absolute;
                    width: 100%;
                    top: 0;
                    left: 0;
                    height: 100%;
                    transition: opacity 1s ease-in-out;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    opacity: 0;
                    animation: fade in 2s;
                    -webkit-transition: opacity 1s ease-in-out;
                    -moz-transition: opacity 1s ease-in-out;
                    -o-transition: opacity 1s ease-in-out;

                }
                .container .slide.show {
                opacity: 1;
                animation: fade in 2s;
                transition: 1s ease-in-out;
                -webkit-transition: opacity 1s ease-in-out;
                -moz-transition: opacity 1s ease-in-out;
                -o-transition: opacity 1s ease-in-out;
                }
    
        </style>
    </head>
    <body style="margin:0;">
        <div class="container">        
            <?php
             $loop = 0;   
            ?>
            @foreach ($content as $val)
                @if ($loop!=0)
                    @if ($val['type']!='video')
                        <div class="slide show" style="background-image: url('{{base_url("files/").$val["filename"]}}');"></div>                            
                    @endif                    
                @else
                    @if ($val['type']!='video')
                        <div class="slide show" style="background-image: url('{{base_url("files/").$val["filename"]}}');"></div>
                    @endif                    
                @endif
                <?php $loop++ ?>
            @endforeach
        </div>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script>
            var myvid = document.getElementById('myvideo');

            myvid.addEventListener('ended', function(e) {
            // get the active source and the next video source.
            // I set it so if there's no next, it loops to the first one
            var activesource = document.querySelector("#myvideo source.active");
            var nextsource = document.querySelector("#myvideo source.active + source") || document.querySelector("#myvideo source:first-child");
            
            // deactivate current source, and activate next one
            activesource.className = "";
            nextsource.className = "active";
            
            // update the video source and play
            myvid.src = nextsource.src;
            myvid.play();
            });
        </script>
        <script>
            function cycleBackgrounds() {
                var index = 0;
            
                $imageEls = $('.container .slide'); // Get the images to be cycled.
            
                setInterval(function () {
                    // Get the next index.  If at end, restart to the beginning.
                    index = index + 1 < $imageEls.length ? index + 1 : 0;
                    
                    // Show the next
                    $imageEls.eq(index).addClass('show');
                    
                    // Hide the previous
                    $imageEls.eq(index - 1).removeClass('show');
                }, 10000);
            };
            
            // Document Ready.
            $(function () {
                cycleBackgrounds();
            });
        </script>
    </body>
</html>
