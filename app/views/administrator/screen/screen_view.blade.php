@extends('administrator.template.template')


@section('title')
	{{$screen_url['name']}} Panel
@endsection

@section('content')




<div class="main-content">
    
	<div class="content-view">
        
        <a class="btn btn-info" href="" data-toggle="modal" data-target=".confgx">
            <i style="float:left" class='material-icons'>settings</i>
            Screen Configuration
        </a>        
		<div class="card">   
			<div class="card-header no-bg b-a-0">
				<b>Device Screen Controller</b>				
			</div>
            <hr>                     
			<div class="card-block">                
				@if ($screen_url['url'] && ping_url($screen_url['url']) )
					<div class="embed-responsive embed-responsive-21by9">
						<iframe class="embed-responsive-item" src="{{'http://'.$screen_url['url']}}" allowfullscreen></iframe>
					</div>
				@else
					<i>cant reach device url , please check device controller url / make sure device ip is correct....</i>
				@endif                
			</div>
		</div>
	</div>
    <div class="content-view">
                    
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Client Schedule</b>
                        <a href="" data-toggle="modal" data-target=".addschedule"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        <table class="table table-stripped table-bordered datatable">
                            <thead align="center">   
                                <tr>
                                    <th>No.</th>
                                    <th>Group</th>
                                    <th>Event</th>
                                    <th>Room</th>
                                    <th>Start</th>
                                    <th>Finish</th>
                                    <th>Display at</th>
                                    <th>Action</th>
                                </tr>                                                                                             
                            </thead>
                            <tbody align="center">
                                <?php $loop=1;?>
                                @foreach ($schedule as $val)                                                                    
                                    <tr>
                                        <td>{{$loop}}</td>
                                        <td>{{$val['title']}}</td>
                                        <td>{{$val['description']}}</td>
                                        <td>{{$val['room']}}</td>
                                        <td>{{$val['start']}}</td>
                                        <td>{{$val['end']}}</td>                                        
                                        <td>{{$val['for_date']}}</td>
                                        <td>
                                            <a  class="btn btn-danger" title='Drop' href='{{base_url("API/ScheduleDrop/").$val["id"]."/".$site["id"]}}' onclick="return confirm('Want to Delete it ?')"><i class='material-icons'>delete</i></a>
                                        </td>
                                    </tr>
                                    <?php $loop++?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Client Content</b>
                        <a href="" data-toggle="modal" data-target=".addcontent"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        <table class="table  table-bordered datatable">
                            <thead align="center">   
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Screen Target</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>                                                                                             
                            </thead>
                            <tbody align="center">
                                <?php $loop=1;?>
                                @foreach ($content as $val)                                                                    
                                    <tr>
                                        <td>{{$loop}}</td>
                                        <td>{{$val['name']}}</td>
                                        <td>{{$val['screen']}}</td>
                                        <td>    
                                            @if ($val['type']=='video')
                                            <video width="150" height="75" controls>
                                                <source src="{{base_url('files/').$val['filename']}}" type="video/mp4">                                                
                                                Your browser does not support the video tag.
                                            </video> 
                                            @else
                                                <img style="max-height: 150px; max-width:70px" src="{{base_url('files/').$val['filename']}}" alt="">                                            
                                            @endif                                        
                                        </td>
                                        <td>
                                            <a  class="btn btn-danger" title='Drop' href='{{base_url("API/ContentDrop/").$val["id"]."/".$site["id"]}}' onclick="return confirm('Want to Delete it ?')"><i class='material-icons'>delete</i></a>
                                        </td>
                                    </tr>
                                    <?php $loop++?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @include('administrator.template.footer')
</div>



{!!form_open_multipart('API/ContentNew')!!}
    <div class="modal fade addcontent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Content</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName1">Site</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="id" value="{{$site['name']}}" disabled="disabled"/>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">
                        Screen Device
                    </label>
                    <select class="form-control" id="exampleSelect1" name="screen_id"> 
                        <option name="screen_id" value="{{$screen['id']}}">{{$screen['name']}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Content Name</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="Content Name" name="name" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Description</label>
                    <input type="text" class="form-control"
                        id="exampleInputUsername1" placeholder="Description" name="desc" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image / Video</label>
                    <input type="file" class="form-control"
                    id="exampleInputEmail1" placeholder="input file here.." name="file" required/>
                </div>
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                <input type="hidden" name="screen{{$screen['id']}}"  value="{{$screen['name']}}" hidden="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create a New One</button>
            </div>
            </div>
        </div>
    </div>
</form>

{!!form_open_multipart('API/ScheduleNew')!!}
    <div class="modal fade addschedule" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Schedule</h4>
            </div>
            <div class="modal-body">                               
                <div class="form-group">
                    <label for="exampleInputName1">Group</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="Group" name="title" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Event</label>
                    <input type="text" class="form-control"
                        id="exampleInputUsername1" placeholder="Event Name" name="description" required/>
                </div>                                
                <div class="form-group">
                    <label for="exampleInputUsername1">Room</label>
                    <input type="text" class="form-control"
                        id="exampleInputUsername1" placeholder="Room / Location" name="room" required/>
                </div>
                <div class="form-group">                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputUsername1">Start time</label>
                            <input type="time" class="form-control" id="exampleInputUsername1" placeholder="Start time" name="start" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputUsername1">End time</label>
                            <input type="time" class="form-control" id="exampleInputUsername1" placeholder="End time" name="end" required/>
                        </div>      
                    </div>                                      
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Display at</label>
                    <input type="date" class="form-control"
                        id="exampleInputUsername1" placeholder="Display at" name="for_date" required/>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">
                        Screen Device
                    </label>
                    <select class="form-control" id="exampleSelect1" name="screen_id"> 
                        <option name="screen_id" value="{{$screen['id']}}">{{$screen['name']}}</option>                                                        
                    </select>
                </div>
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                <input type="hidden" name="screen{{$screen['id']}}"  value="{{$screen['name']}}" hidden="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create a New One</button>
            </div>
            </div>
        </div>
    </div>
</form>

{!!form_open('API/ScreenEdit')!!}
    <div class="modal fade confgx" id="confgx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">{{$screen['name']}}</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName1">Screen Name</label>
                    <input type="text" class="form-control"
                        name="name1" id="exampleInputName1" placeholder="id" value="{{$screen['name']}}" />
                </div>                            
                <div class="form-group">
                    <label for="exampleInputName1">Device Controller URL</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="Name" value="{{$screen['url']}}" name="url"/>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">
                        Template
                    </label>
                    <select class="form-control" id="exampleSelect1" name="template"> 
                        @foreach ($template as $valx)   
                            @if ($screen['type']==$valx['type'])
                                <option value="{{$valx['type']}}" selected>Template {{$valx['name']}} (Type {{$valx['type']}})</option>
                            @else
                                <option value="{{$valx['type']}}">Template {{$valx['name']}} (Type {{$valx['type']}})</option>                            
                            @endif                                    
                        @endforeach
                    </select>
                </div>              
                <div class="form-group">
                    <label for="exampleInputUsername1">Description</label>
                    <input type="text" class="form-control"
                        name="description" id="exampleInputName1" placeholder="id" value="{{$screen['description']}}" />
                </div> 
                <input type="hidden" name="id" value="{{$screen['id']}}" hidden="hidden">
            </div>
            <div class="modal-footer">
                <a style="float:left" class="btn btn-danger" title='Drop' href='#'><i class='material-icons'>delete</i>Drop</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
            </div>
        </div>
    </div>    
</form>

@endsection


@section('corejs')
    <!-- page scripts -->
        <script src="{{base_url('vendor/datatables/media/js/jquery.dataTables.js')}}"></script>
        <script src="{{base_url('vendor/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
        <script>
                $(document).ready( function () {
                    $('.datatable').DataTable();
                } );
        </script>  

@endsection

@section('menu')
    @include('administrator.template.menu')
@endsection