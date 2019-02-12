@extends('administrator.template.template')

@section('title')
Site {{$site['name']}}
@endsection

@section('content')




<div class="main-content">
    <div class="content-view">
        <div class="row">
            <div class="col-lg-6">                
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>User Client</b>
                       <a href="" data-toggle="modal" data-target=".adduser"> 
                           <i style="float:right" class='material-icons'>add</i>
                       </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        
                        @if (count($user)<1)
                            No User Available...
                            <a class="weatherwidget-io" href="https://forecast7.com/en/n7d26112d75/surabaya/" data-label_1="SURABAYA" data-label_2="WEATHER" data-icons="Climacons Animated" data-theme="original" >SURABAYA WEATHER</a>
                            <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                            </script>
                        @else                                                                            
                            @foreach ($user as $val)                                                    
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card panel panel-default m-b-xs">
                                        <div class="card-header panel-heading" role="tab" id="headingOne">
                                            <h6 class="panel-title m-a-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#accor{{$val['id']}}"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    {{$val['name']}}
                                                </a>
                                                <a style="float:right" title='Drop' href='{{base_url('API/UserDrop/').$val['id']."/".$site['id']}}'><i class='material-icons'>delete</i></a>
                                                <a style="float:right" title='Change' href='#' data-toggle="modal" data-target=".edituser{{$val['id']}}"><i class='material-icons'>edit</i></a>                                        
                                            </h6>
                                        </div>
                                        <div id="accor{{$val['id']}}" class="card-block panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            
                                            <table class="table table-stripped table bordered">
                                                <tr>
                                                    <td>Name</td>
                                                    <td>:&nbsp;</td>
                                                    <td>{{$val['name']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>:&nbsp;</td>
                                                    <td>{{$val['username']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:&nbsp;</td>
                                                    <td>{{$val['email']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td>:&nbsp;</td>
                                                    <td>{{$val['password']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:&nbsp;</td>
                                                    <td> <span class="tag tag-success">Actived</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>                            
                                </div>
                            @endforeach
                        @endif                        
                    </div>                    
                </div>

                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Template Available</b>    
                        <a href="" data-toggle="modal" data-target=".adduser"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>                   
                    </div>
                    <hr>
                    <div class="card-block">                                           
                    @foreach ($template as $val)
                        <div class="col-md-6 table-bordered" >
                            <a href="#" data-toggle="modal" data-target=".template{{$val['id']}}">                                        
                                <span style="float:left; margin-top:4px;" class="tag tag-success">Template {{$val['id']}}</span>
                                <br>                                   
                                <p align="center" >
                                    <i  class='material-icons' style="font-size:50px;">photo</i>                                    
                                </p>                                        
                            </a>                            
                        </div>
                    @endforeach
                    </div>                    
                </div>

            </div>
            <div class="col-lg-6">                
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Client Device</b>
                        <a href="" data-toggle="modal" data-target=".addscreen"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        
                        @if (count($screen)<1)
                            No Screen Installed...
                        @else                                                                                
                            @foreach ($screen as $val)                                                    
                                <div class="col-md-6 table-bordered" >
                                    <a href="#" data-toggle="modal" data-target=".screen{{$val['id']}}">                                        
                                        
                                        @if ($val['status'])
                                            <h6>{{$val['name']}}<span style="float:right" class="tag tag-success">Alive</span> </h6>
                                            <br>    
                                        @else
                                            <h6>{{$val['name']}}<span style="float:right" class="tag tag-danger">Deceased</span></h6>
                                            <br>
                                        @endif
                                        <p align="center" >
                                            <i  class='material-icons' style="font-size:50px;">tv</i>                                    
                                        </p>                                        
                                    </a>                            
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>               
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
                                            <a  class="btn btn-danger" title='Drop' href='#'><i class='material-icons'>delete</i></a>
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
                                            <a  class="btn btn-danger" title='Drop' href='#'><i class='material-icons'>delete</i></a>
                                            <a  class="btn btn-warning" title='Change' href='#'><i class='material-icons'>edit</i></a>                                                                                
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


@foreach ($screen as $val)    
    {!!form_open('API/ScreenEdit')!!}
        <div class="modal fade screen{{$val['id']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Screen Name</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Screen Name</label>
                        <input type="text" class="form-control"
                           name="name" id="exampleInputName1" placeholder="id" value="{{$val['name']}}" />
                    </div>            
                    <div class="form-group">
                        <label for="exampleInputName1">Screen Url</label>
                        <input type="text" class="form-control"
                            id="exampleInputName1" placeholder="Name" readonly="readonly" value="{{base_url().$site['id'].'/'.$val['id'].'/'.$site['token']}}"/>                            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Screen Status</label><br>
                        <select name="status" id="" class="form-control">
                            @if (!$val['status'])
                                <option value="0" selected>Deceased</option>
                                <option value="1">Alive</option>    
                            @else
                                <option value="0">Deceased</option>
                                <option value="1" selected>Alive</option>
                            @endif                                                        
                        </select>
                        <input type="hidden" name="id" hidden="hidden" id="" value="{{$val['id']}}">
                        <input type="hidden" name="site_id" hidden="hidden" id="" value="{{$site['id']}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description</label>
                        <input type="text" class="form-control"
                           name="description" id="exampleInputName1" placeholder="id" value="{{$val['description']}}" />
                    </div>                                            
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
@endforeach

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
                        @foreach ($screen as $val)    
                            @if ($val['type']!=1)
                                <option name="screen_id" value="{{$val['id']}}">{{$val['name']}}</option>                            
                            @endif                                                    
                        @endforeach
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
                        id="exampleInputUsername1" placeholder="Username" name="desc" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image / Video</label>
                    <input type="file" class="form-control"
                    id="exampleInputEmail1" placeholder="input file here.." name="file" required/>
                </div>
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                @foreach ($screen as $val)
                    <input type="hidden" name="screen{{$val['id']}}"  value="{{$val['name']}}" hidden="hidden">
                @endforeach
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
                        @foreach ($screen as $val)   
                            @if($val['type']==1)                         
                                <option name="screen_id" value="{{$val['id']}}">{{$val['name']}}</option>                            
                            @endif
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                @foreach ($screen as $val)
                    <input type="hidden" name="screen{{$val['id']}}"  value="{{$val['name']}}" hidden="hidden">
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create a New One</button>
            </div>
            </div>
        </div>
    </div>
</form>

{!!form_open('API/ScreenNew')!!}
    <div class="modal fade addscreen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Screen Device</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName1">Site</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="id" value="{{$site['name']}}" disabled="disabled"/>
                </div>            
                <div class="form-group">
                    <label for="exampleInputName1">Screen Name</label>
                    <input type="text" class="form-control"
                        id="exampleInputName1" placeholder="Name" name="name" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Description</label>
                    <input type="text" class="form-control"
                        id="exampleInputUsername1" placeholder="Description" name="description" required/>
                </div>                                            
                <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                <input type="hidden" name="status" hidden="hidden" value="0">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create a New One</button>
            </div>
            </div>
        </div>
    </div>
</form>

{!!form_open('API/UserNew')!!}
    <div class="modal fade adduser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Create New User</h4>
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
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control"
                        id="exampleInputUsername1" placeholder="Username" name="username" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"
                    id="exampleInputEmail1" placeholder="Enter email" name="email" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control"
                        id="exampleInputPassword1" placeholder="Password" name="password" required/>
                        <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                </div>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create a New One</button>
            </div>
            </div>
        </div>
    </div>
</form>

@foreach ($user as $val)            
    {!!form_open('API/UserEdit')!!}
        <div class="modal fade edituser{{$val['id']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Change {{$val['name']}} info</h4>
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
                            id="exampleInputName1" placeholder="name" name="name" value="{{$val['name']}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control"
                            id="exampleInputUsername1" placeholder="Username" name="username" value="{{$val['name']}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control"
                        id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$val['email']}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Password" name="password" value="{{$val['password']}}" required/>
                            <input type="hidden" name="id" hidden="hidden" value="{{$val['id']}}">
                            <input type="hidden" name="site_id" hidden="hidden" value="{{$site['id']}}">
                    </div>                                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update this One</button>
                </div>
                </div>
            </div>
        </div>    
    </form>
@endforeach

@foreach ($template as $val)
    {!!form_open('API/TemplateEdit')!!}
        <div class="modal fade template{{$val['id']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Template {{$val['id']}}</h4>
                </div>
                <div class="modal-body">

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
@endforeach

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
    <!-- end page scripts -->

@endsection

@section('menu')
    @include('administrator.template.menu')
@endsection