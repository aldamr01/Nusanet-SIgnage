@extends('administrator.template.template')

@section('title')
	{{$site['name']}} Template Panel
@endsection

@section('content')
	<!-- main area -->
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
                            <option value="{{$val['type']}}">Template Type {{$val['type']}}</option>
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
                    <h4 class="modal-title" id="myModalLabel">{{$val['name']}} template-{{$val['type']}}</h4>
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
                            <input class="form-control full" type="text" value="{{$val['weather']}}" id="full" name="weather">
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
                            <input class="form-control full" type="text" value="{{$val['tabel']}}" id="full" name="table">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gradient Weather Background Color</label>
                            <input class="form-control full" type="text" value="{{$val['gradient_color']}}" id="full" name="gradient">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Weather Background Color</label>
                            <input class="form-control full" type="text" value="{{$val['center_color']}}" id="full" name="center">
                        </div>
                    @elseif ($val['type']==2)                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Weather Widget Color</label>
                            <input class="form-control full" type="text" value="{{$val['weather']}}" id="full" name="weather">
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
                    @elseif ($val['type']==3)
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
