@extends('administrator.template.template')

@section('title')
	{{$site['name']}} Template Panel
@endsection

@section('content')
    <!-- main area -->
    <div class="alert alert-info alert-dismissable fade in ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><u>Template Information </u></p>
        <strong>Type 1 :</strong> Template Schedule <br>
        <strong>Type 2 :</strong> Template Schedule with Promotion Video<br>
        <strong>Type 3 :</strong> Template Image Slideshow <br>
        <strong>Type 4 :</strong> Template Video
    </div>
	<div class="main-content">
		<div class="content-view">
		    <div class="row">
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Template Available</b>    
                        <a href="" data-toggle="modal" data-target=".addtemplate"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>                    
                    </div>
                    <hr>
                    <div class="card-block">                                                                   
                        @foreach ($template as $val)                                    
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        {{$val['name']}}
                                    </div>
                                    <div class="card-block">                        
                                        <div class="col-md-4" style="item-align">
                                            <i  class='material-icons' style="font-size:50px;">tv</i> 
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <a  data-toggle="modal" data-target=".template{{$val['id']}}" href="#" class="col-md-12 bg-warning" style="text-align:center">Template Detail</a>
                                            </div>                                                                                             
                                        </div>                            
                                    </div>
                                    <div class="card-footer">
                                        Template {{$val['type']}}                      
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                </div>
                
            </div>
		</div>
		@include('administrator.template.footer')
	</div>
    <!-- /main area -->
    
    {!!form_open('API/TemplateNew')!!}
    <div class="modal fade addtemplate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add a Template</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName1">Site</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="id" value="{{$site['name']}}" disabled="disabled"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="name" name="name" required/>
                </div>                
                <div class="form-group">
                    <label for="name1">Template Type</label>
                    <select class="form-control" name="type" id="">
                        @foreach ($type as $val)
                            <option value="{{$val['type']}}">Type {{$val['type']}} : Template {{$val['title']}}</option>
                        @endforeach
                    </select>
                </div>
                                    
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create a New One</button>
            </div>
            </div>
        </div>
    </div>
</form>

@foreach ($template as $val)
    {!!form_open_multipart('API/TemplateEdit')!!}
        <div class="modal fade template{{$val['id']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Template type {{$val['type']}} : {{$val['name']}} </h4>
                </div>

                {{--  TEMPLATE MENU PART  --}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Template Name</label>
                        <input type="text" class="form-control" name="name" required value="{{$val['name']}}">
                    </div>
                    @if ($val['type']==1)
                        <div class="form-group">
                            <label for="exampleInputPassword1">Weather Widget Color</label>                            
                            <input value="{{$val['weather']}}" name="weather" class="full form-control" type='text' id="full"/>                            
                        </div>    
                        <div class="form-group">
                            <label for="exampleInputPassword1">Screen Background</label><br>
                            @if (!$val['background'])
                                <input class="form-control" type="file" value="{{$val['background']}}" id="example-file-input" name="background">                                
                            @else
                                <img src="{{base_url('/files/').$val['background']}}" alt="" class="img-rounded" style="width:10%;geight:10%;">
                                <input class="form-control" type="file" value="{{$val['background']}}" id="example-file-input" name="background">
                            @endif                                                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Screen Logo</label><br>
                            @if (!$val['logo'])
                                <input class="form-control" type="file" value="{{$val['logo']}}" id="example-file-input" name="logo">                                
                            @else
                                <img src="{{base_url('/files/').$val['logo']}}" alt="" class="img-rounded" style="width:10%;geight:10%;">
                                <input class="form-control" type="file" value="{{$val['logo']}}" id="example-file-input" name="logo">
                            @endif          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Table Widget Color</label>
                            <input value="{{$val['tabel']}}" name="table" class="full form-control" type='text' id="full"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gradient Weather Background Color</label>
                            <input value="{{$val['gradient_color']}}" name="gradient" class="full form-control" type='text' id="full"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Weather Background Color</label>
                            <input value="{{$val['center_color']}}" name="center" class="full form-control" type='text' id="full"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-family:'{{$val['font_type_1']}}'">Font Type</label>
                            <select name="font_type_1" id="" class="form-control">
                                @foreach ($fonts as $vals)
                                    @if ($vals['font_name'] == $val['font_type_1'])
                                        <option value="{{$vals['font_name']}}" style="font-family:'{{$vals['font_name']}}'" selected>{{$vals['font_name']}}</option>
                                    @else
                                        <option value="{{$vals['font_name']}}" style="font-family:'{{$vals['font_name']}}'">{{$vals['font_name']}}</option>    
                                    @endif                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Font Size</label>
                            <input value="{{$val['font_size_1']}}" name="font_size_1" class="form-control" type='number'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Font Color</label>
                            <input value="{{$val['font_color_1']}}" name="font_color_1" class="form-control" type='color'/>
                        </div>
                    @elseif ($val['type']==2)                        
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-family:'{{$val['font_type_1']}}'">Schedule font type</label>
                            <select name="font_type_1" id="" class="form-control">
                                @foreach ($fonts as $vals)
                                    @if ($vals['font_name'] == $val['font_type_1'])
                                        <option value="{{$vals['font_name']}}" style="font-family:'{{$vals['font_name']}}'" selected>{{$vals['font_name']}}</option>
                                    @else
                                        <option value="{{$vals['font_name']}}" style="font-family:'{{$vals['font_name']}}'">{{$vals['font_name']}}</option>    
                                    @endif                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Schedule background image</label><br>
                            @if (!$val['background_schedule'])
                                <input class="form-control" type="file" value="{{$val['background_schedule']}}" id="example-file-input" name="background_schedule">                                
                            @else
                                <img src="{{base_url('/files/').$val['background_schedule']}}" alt="" class="img-rounded" style="width:10%;geight:10%;">
                                <input class="form-control" type="file" value="{{$val['background_schedule']}}" id="example-file-input" name="background_schedule">
                            @endif                                                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Schedule border color</label>
                            <input value="{{$val['border_table_color']}}" name="border_table_color" class="full form-control" type='text' id="full"/>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Schedule-title font Size</label>
                                    <input value="{{$val['font_size_1h']}}" name="font_size_1h" class="form-control" type='number'/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Schedule font size</label>
                                    <input value="{{$val['font_size_1']}}" name="font_size_1" class="form-control" type='number'/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Schedule-title font color</label>
                                    <input value="{{$val['font_color_1h']}}" name="font_color_1h" class="form-control" type='color'/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Schedule font color</label>
                                    <input value="{{$val['font_color_1']}}" name="font_color_1" class="form-control" type='color'/>
                                </div>
                            </div>                            
                        </div>                                                                 
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-family:'{{$val['font_type_2']}}'">Marquee font type</label>
                            <select name="font_type_2" id="" class="form-control">
                                @foreach ($fonts as $vals)
                                    @if ($vals['font_name'] == $val['font_type_2'])
                                        <option value="{{$vals['font_name']}}" style="font-family:'{{$vals['font_name']}}'" selected>{{$vals['font_name']}}</option>
                                    @else
                                        <option value="{{$vals['font_name']}}" style="font-family:'{{$vals['font_name']}}'">{{$vals['font_name']}}</option>    
                                    @endif                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Marquee font size</label>
                            <input value="{{$val['font_size_2']}}" name="font_size_2" class="form-control" type='number'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Marquee font color</label>
                            <input value="{{$val['font_color_2']}}" name="font_color_2" class="form-control" type='color'/>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Marquee background color</label>
                            <input value="{{$val['background_marquee']}}" name="background_marquee" class="full form-control" type='text' id="full"/>                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Video background color</label>
                            <input value="{{$val['background_video']}}" name="background_video" class="full form-control" type='text' id="full"/>                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Margin color</label>
                            <input value="{{$val['slider_color']}}" name="slider_color" class="full form-control" type='text' id="full"/>                            
                        </div>
                        
                        
                    @elseif ($val['type']==3 || $val['type']==4)
                        no configuration needed...
                    @endif                        
                </div>
                {{--  END MENU TEMPLATE  --}}
                <input type="hidden" name="id" value="{{$val['id']}}" hidden="hidden">
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                <div class="modal-footer">
                    <a onclick="return confirm('delete ?')" style="float:left" class="btn btn-danger" title='Drop' href='{{base_url("API/TemplateDrop/").$val["id"]."/".$site["id"]}}'><i class='material-icons'>delete</i>Drop</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
                </div>
            </div>
        </div>    
    </form>    
@endforeach
<script>
    var x = document.getElementsByClassName("full")

    for (i = 0; i < x.length; i++) {
        $(x[i]).spectrum({            
            showInput: true,
            className: "full-spectrum",
            showInitial: false,
            showPalette: true,
            showSelectionPalette: true,
            maxSelectionSize: 10,
            preferredFormat: "rgb",
            showAlpha:true,
            localStorageKey: "spectrum.demo" ,                
            change: true,                           
        });            
    }     
</script>
@endsection

@section('corejs')
	<!-- page scripts -->
	<script src="{{base_url('vendor/flot/jquery.flot.js')}}"></script>
	<script src="{{base_url('vendor/flot/jquery.flot.resize.js')}}"></script>
	<script src="{{base_url('vendor/flot/jquery.flot.categories.js')}}"></script>
	<script src="{{base_url('vendor/flot/jquery.flot.stack.js')}}"></script>
	<script src="{{base_url('vendor/flot/jquery.flot.time.js')}}"></script>
	<script src="{{base_url('vendor/flot/jquery.flot.pie.js')}}"></script>
	<script src="{{base_url('vendor/flot-spline/js/jquery.flot.spline.js')}}"></script>
	<script src="{{base_url('vendor/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
	<!-- end page scripts -->

	<script>
		window.onload = date_time('timer');
		window.onload = date_time('timer1');
		window.onload = date_time('timer2');
	</script>
	<script src="{{base_url('scripts/nusanet.js')}}"></script>

	<!-- initialize page scripts -->
	<script src="{{base_url('scripts/charts/flot.js')}}"></script>
	<!-- end initialize page scripts -->
@endsection

@section('menu')
	@include('administrator.template.menu')	
@endsection
