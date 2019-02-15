@extends('administrator.template.template')

@section('title')
	List User
@endsection

@section('content')
<!-- main area -->
    <div class="main-content">
        <div class="content-view">
            <div class="card">            
                <div class="card-block">                
                    @if ($screen['url'])
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$screen['url']}}" allowfullscreen></iframe>
                        </div>
                    @else
                        <i>please set device controller url....</i>
                    @endif                
                </div>
            </div>
        </div>
        <!-- bottom footer -->
        <div class="content-footer">
        <nav class="footer-right">
            <ul class="nav">
            <li>
                <a href="javascript:;">Feedback</a>
            </li>
            </ul>
        </nav>
        <nav class="footer-left">
            <ul class="nav">
            <li>
                <a href="javascript:;">
                <span>Copyright</span>
                &copy; 2016 Your App
                </a>
            </li>
            <li class="hidden-md-down">
                <a href="javascript:;">Privacy</a>
            </li>
            <li class="hidden-md-down">
                <a href="javascript:;">Terms</a>
            </li>
            <li class="hidden-md-down">
                <a href="javascript:;">help</a>
            </li>
            </ul>
        </nav>
        </div>
        <!-- /bottom footer -->
    </div>
<!-- /main area -->
@endsection

@section('corejs')
    
    <!-- end initialize page scripts -->
@endsection

@section('menu')
    @include('administrator.template.menu')    
@endsection
