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
                <a class="btn btn-success" href="{{base_url('user/create')}}">Add User</a>
			</div>
			<div class="card-block">
				<table class="table table-bordered datatable">
					<thead>
						<tr>
                            <th>
                                No
                            </th>
							<th>
								Name
							</th>
							<th>
								IP Router
                            </th>							
                            <th>
                                Role
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
	@include('administrator.template.footer')
</div>
<!-- /main area -->
@endsection

@section('corejs')
    <!-- page scripts -->
    <script src="{{base_url('vendor/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{base_url('vendor/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
    <!-- end page scripts -->


    <!-- initialize page scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.14.7/dist/umd/popper.js"></script>
    <script type="text/javascript">
        var table = $('#changeLogTable').DataTable({
            "bLengthChange": false,
            "bPaginate": true,
            "bInfo": false,
            "autoWidth": false, 
            "order": [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "sAjaxSource": "data.js",
             oLanguage: {sProcessing: "<div id='loader'></div>"}
        }); 

        $('.datatable').DataTable({
            'ajax': '<?=base_url("API/UserList")?>'
        });


    </script>
    <!-- end initialize page scripts -->
@endsection

@section('menu')
    @include('administrator.template.menu')    
@endsection
