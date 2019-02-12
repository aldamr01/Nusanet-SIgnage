<html>
    <head>
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
                }
                .container .slide.show {
                opacity: 1;
                }
    
        </style>
    </head>
    <body style="margin:0;">
        <div class="container">                    
            <div class="slide" style="background-image: url('{{base_url("files/").$val["filename"]}}');"></div>                        
        </div>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>        
    </body>
</html>
