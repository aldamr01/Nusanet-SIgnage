@extends('administrator.template.template')

@section('title')
	{{$site['name']}} Signage Panel
@endsection

@section('content')
	<!-- main area -->
	<div class="main-content">
		<div class="content-view">
		    <div class="row">
            @foreach ($screen as $val)                                    
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
                                <a  href="{{base_url('screen/MyScreen/').$val['id'].'/'.$site_id}}" class="col-md-12 bg-warning" style="text-align:center">Screen Controller</a>
                            </div>
                            <br>
                            <div class="row">
                                @if ($val['url'] && ping_url($val['url']))
                                    <a target="_blank" href="{{base_url('screen/').$thisuser['auth_site'].'/'.$val['id'].'/'.$site_id}}/0" class="col-md-12 bg-info" style="text-align:center">View Screen</a>
                                @else
                                    <a class="col-md-12 bg-default text-muted" style="text-align:center">View Screen</a>
                                @endif
                            </div>
                            <br>

                            @if($val['type'] == 2 )      
                                <div class="row">
                                    <a target="_blank" href="{{base_url('screen2/').$thisuser['auth_site'].'/'.$val['id'].'/'.$site_id}}/0" class="col-md-12 bg-info" style="text-align:center">View Screen Without Events</a>
                                </div> <br>                                                        
                                <div class="row">
                                    <select name="" id="" class="col-md-12 bg-success" onchange="window.location.href=this.value;">                                        
                                        <option value="">Get data from another screen</option>
                                        @foreach ($screen as $valz)
                                            @if($vals['type'] == 1)
                                                @if ($valz['id'] != $val['id'])
                                                    <option value="{{base_url().'screen/'.$site['id'].'/'.$val['id'].'/'.$site['token'].'/'.$valz['id']}}">Get Data From Screen {{$valz['name']}}</option>                                                
                                                @endif   
                                            @endif                                            
                                        @endforeach                                        
                                    </select>
                                </div>                                         
                            @endif
                        </div>                            
                      </div>
                      <div class="card-footer">
                        Status : &nbsp; 
                        @if (ping_url($val['url']))
                            <span style="color:seagreen">Alive</span>    
                        @else
                            <span style="color:crimson">Unreachable</span>
                        @endif                        
                      </div>
                    </div>
                </div>
            @endforeach
            </div>
		</div>
		@include('administrator.template.footer')
	</div>
	<!-- /main area -->
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
