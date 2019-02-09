<html class="no-js" lang="en">\
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Fullscreen Background Image Slideshow with CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
        <style type="text/css">
            html,body{
                overflow-x:hidden;
                overflow-y:hidden;
            }
        </style>
    </head>
    <body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span><div></div></li>
            <li><span>Image 02</span><div></div></li>
            <li><span>Image 03</span><div></div></li>
            <li><span>Image 04</span><div></div></li>           
        </ul>
        
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
                }, 2000);
            };
             
            // Document Ready.
            $(function () {
                cycleBackgrounds();
            });
       </script>
    </body>
</html>