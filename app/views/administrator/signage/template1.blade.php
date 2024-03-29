<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <link rel="stylesheet" href="{{base_url('vendor/bootstrap/dist/css/bootstrap.css')}}" />
        <style>
            body {
                z-index: 0;            
                height: 96%;
                width: 98%;
                margin:1%;
                padding:0;
                border: 5px 5px 5px 5px;
                border-color: white;
                border-style: solid;
                position:absolute;
                background: url('{{base_url("files/").$config["background"]}}') no-repeat center center fixed;    
                background-size: cover;                           
            }                        
            
            .borderless td, .borderless th {
                border: none;
                
            }
            .roundedt {
                border: none;
            }
            .roundedt thead th {
                padding-top:40px;
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
                padding-bottom:60px;            
            }

            .footer {
                position: fixed;                
                width: 96%;                
                bottom: 0;                
                margin:1% 1% 1% 1%;
                padding-bottom: 1%;
                padding-right: 0.5%;
                color: white;
                text-align: center;
                overflow: hidden;
                
              }

              .bgfoot{
                background: linear-gradient(to bottom,
                 {{$config['gradient_color']}} 0%,                 
                 {{$config['center_color']}} 9%, 
                 {{$config['center_color']}} 88%, 
                 {{$config['gradient_color']}} 100%);
              }

              .font1{
                  font-family: "{{$config['font_type_1']}}";
                  font-size:{{$config['font_size_1']}};
                  color:{{$config['font_color_1']}};
              }
            </head>

        </style>
    </head>
    <body>
        <div class="container">                    
            <div class="row">
                <div class="col-lg-12" style="margin-top:20px;margin-bottom:40px">
                    <p align="center">                        
                        <img src="{{base_url('files/').$config['logo']}}" alt="" style="width:100px;height:100px">
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">                    
                    <div class="col-md-12 " style="padding:0;">
                        <table class="table  table-striped borderless roundedt" style="text-align:center;margin:0">
                            <thead >
                                <th style="text-align:center" class="font1">Group / Event</th>
                                <th style="text-align:center" class="font1">Room</th>
                                <th style="text-align:center" class="font1">Start / End</th>
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
                                        <tr class="tdhead" >
                                            <td  style="text-align:center;padding-top:40px;">
                                                <b class="font1">{{$val['title']}}</b>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr style="border-top:solid 0px white;">
                                            <td style="text-align:center" class="font1">{{$val['description']}}</td>
                                            <td style="text-align:center" class="font1">{{$val['room']}}</td>
                                            <td style="text-align:center" class="font1">{{$val['start']}} - {{$val['end']}}</td>
                                        </tr>       
                                    @else
                                        <tr style="border-top:solid 0px white;">
                                            <td style="text-align:center" class="font1">{{$val['description']}}</td>
                                            <td style="text-align:center" class="font1">{{$val['room']}}</td>
                                            <td style="text-align:center" class="font1">{{$val['start']}} - {{$val['end']}}</td>
                                        </tr>  
                                    @endif
                                @endforeach                                                                
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>           
            
        </div>    

        <div class="footer">
                <div class="col-md-12 bgfoot">                    
                    <div class="col-md-6 offset-3" style="padding-top:10px;">
                        <p align="center">
                            <a style="color:springgreen" class="weatherwidget-io" href="https://forecast7.com/en/n7d26112d75/surabaya/" data-label_1="SURABAYA" data-label_2="INDONESIA" data-icons="Climacons Animated" data-mode="Current" data-days="3" data-textcolor="{{$config['weather']}}">SURABAYA INDONESIA</a>
                            <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                            </script>
                        </p>   
                    </div>
                </div>
        </div>        
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>      
    </body>
</html>
