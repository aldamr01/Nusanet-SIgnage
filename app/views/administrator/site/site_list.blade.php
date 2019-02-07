@extends('administrator.template.template')

@section('title')
	List User
@endsection

@section('content')
<!-- main area -->
    <div class="main-content">
        <div class="content-view">
        <div class="card">
            <div class="card-header no-bg b-a-0">
                <a class="btn btn-success" href="{{base_url('site/create')}}"><i class='material-icons'>add</i>Add Sites</a>
            </div>
            <div class="card-block">
            <table class="table table-bordered datatable">
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Location
                    </th>
                    <th>
                        User
                    </th>
                    <th>
                        Screen Device
                    </th>
                    <th>
                        Content
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
            </table>
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
    <!-- page scripts -->
    <script src="{{base_url('vendor/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{base_url('vendor/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
    <!-- end page scripts -->
    <script type="text/javascript">
        window.paceOptions = {
          document: true,
          eventLag: true,
          restartOnPushState: true,
          restartOnRequestAfter: true,
          ajax: {
            trackMethods: [ 'POST','GET']
          }
        };
    </script>

    <!-- initialize page scripts -->    
    <script type="text/javascript">       

        $('.datatable').DataTable({
            'ajax': '<?=base_url("API/SiteList")?>'
        });
    </script>
    <!-- end initialize page scripts -->
@endsection

@section('menu')
    @include('administrator.template.menu')    
@endsection
