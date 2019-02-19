<html>
    <head>
        <meta http-equiv="refresh" content="5" >
        <style>
            .container {
                width: 100%;
                height: 100%;
                position: relative;
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
                        <div class="slide" style="background-image: url('{{base_url("files/").$val["filename"]}}');"></div>        
                    @else
                        
                    @endif                    
                @else
                    @if ($val['type']!='video')
                        <div class="slide show" style="background-image: url('{{base_url("files/").$val["filename"]}}');"></div>        
                    @else
                        
                    @endif                    
                @endif
                <?php $loop++ ?>
            @endforeach            
        </div>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
                }, 5000);
            };
            
            // Document Ready.
            $(function () {
                cycleBackgrounds();
            });
        </script>
    </body>
</html>
