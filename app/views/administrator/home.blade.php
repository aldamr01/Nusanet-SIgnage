@extends('administrator.template.template')

@section('title')
	Nusanet-Digital Signage
@endsection

@section('content')
	<!-- main area -->
	<div class="main-content">
		<div class="content-view">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="card card-block">
						<h5 class="m-b-0 v-align-middle text-overflow">							
							<span id="val-cpu2"></span>
						</h5>
						<div class="small text-overflow text-muted">
							Server CPU Usage
						</div>
						<div class="small text-overflow">
							Updated:&nbsp;<span id="timer"></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="card card-block">
						<h5 class="m-b-0 v-align-middle text-overflow">							
							<span id="val-memory2"></span>
						</h5>
						<div class="small text-overflow text-muted">
							Server Memory Usage
						</div>
						<div class="small text-overflow">
							Updated:&nbsp;<span id="timer1"></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="card card-block">
						<h5 class="m-b-0 v-align-middle text-overflow">						
							<span id="val-hdd2"></span>
						</h5>
						<div class="small text-overflow text-muted">
							Server Disk Free
						</div>
						<div class="small text-overflow">
							Updated:&nbsp;<span id="timer2"></span>
						</div>
					</div>
				</div>	
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
