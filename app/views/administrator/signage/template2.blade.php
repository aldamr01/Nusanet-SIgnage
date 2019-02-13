<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <link rel="stylesheet" href="{{base_url('vendor/bootstrap/dist/css/bootstrap.css')}}" />
        <style>
            body {
                z-index: 0;
                background: url('{{base_url('files/file_3_1_a215bd257a49a94c536adb3e40b78ca0.jpg')}}');
                background-size: cover;
                position: relative;                             
            }                        
            
            .borderless td, .borderless th {
                border: none;
                
            }
            .roundedt {
                border: none;
            }
            .roundedt thead th {
                background-color: #CFAD70;
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
                background-color: #CFAD70;
                border-top: solid 1px #957030;
            }
            .roundedt tbody tr:last-child td:first-child {
                border-radius: 0 0 0 10px;
            }
            .roundedt tbody tr:last-child td:last-child {
                border-radius: 0 0 10px 0;
            }

            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                color: white;
                text-align: center;
              }
        </style>
    </head>
    <body style="margin:0;">
        <div class="container">                    
            <div class="row">
                <div class="col-lg-12" style="margin-top:20px;margin-bottom:15px">
                    <p align="center">
                        <img src="{{base_url('files/x.png')}}" alt="" style="width:100px;height:100px">
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">                    
                    <div class="col-md-12" style="padding:0;overflow:hidden">
                        <img style="width:100%;height:80%" src="{{base_url('files/file_3_2_cf81178ac899ad8d28df7253134bfa7b.jpg')}}" class="img-responsive img-rounded " alt="">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="col-md-6 offset-3">
                        <p align="center">
                            <a style="color:springgreen" class="weatherwidget-io" href="https://forecast7.com/en/n7d26112d75/surabaya/" data-label_1="SURABAYA" data-label_2="INDONESIA" data-icons="Climacons Animated" data-mode="Current" data-days="3" data-textcolor="#FBCE45">SURABAYA INDONESIA</a>
                            <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                            </script>
                        </p>   
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>      
    </body>
</html>
