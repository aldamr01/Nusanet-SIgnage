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
                                <div class="col-md-6">
                                    <a href="#" data-toggle="modal" data-target=".screen{{$val['id']}}">
                                        <p align="center">
                                            <i class='material-icons' style="font-size:70px;">tv</i>                                    
                                        </p>
                                        
                                        @if ($val['status'])
                                            <h6>{{$val['name']}} : <span class="tag tag-success">Alive</span></h6>
                                        @else
                                            <h6>{{$val['name']}} : <span class="tag tag-danger">Deceased</span></h6>
                                        @endif
                                        
                                        
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
                        <b>Client Content</b>
                        <a href="" data-toggle="modal" data-target=".addcontent"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        <table class="table table-stripped table-bordered">
                            <thead align="center">                                
                                <td>No.</td>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Preview</td>
                                <td>Action</td>                                
                            </thead>
                            <tbody align="center">
                                <tr>
                                    <td>1</td>
                                    <td>Promo 1</td>
                                    <td>Images</td>
                                    <td>    
                                        <img style="max-height: 150px; max-width:70px" src="https://upload.wikimedia.org/wikipedia/commons/c/cb/Broadway_tower_edit.jpg" alt="">                                        
                                    </td>
                                    <td>
                                        <a  class="btn btn-danger" title='Drop' href='#'><i class='material-icons'>delete</i></a>
                                        <a  class="btn btn-warning" title='Change' href='#'><i class='material-icons'>edit</i></a>                                                                                
                                    </td>
                                </tr>
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

{!!form_open('API/ScreenEdit')!!}
    @foreach ($screen as $val)    
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
                            id="exampleInputName1" placeholder="id" value="{{$val['name']}}" />
                    </div>            
                    <div class="form-group">
                        <label for="exampleInputName1">Screen Url</label>
                        <input type="text" class="form-control"
                            id="exampleInputName1" placeholder="Name" readonly="readonly" value="file:///home/leii/Documents/Web/Template/milestoneadmin/milestoneadmin/html/app/ui-material.html"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Screen Status</label><br>
                        <select name="status" class="form-control" id="">
                            @if ($val['status'])
                                <option value="1" selected>Alive</option>
                                <option value="0">Deceased</option>
                            @else
                                <option value="1">Alive</option>
                                <option value="0" selected>Deceased</option>
                            @endif
                        </select>                    
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description</label>
                        <textarea type="text" class="form-control" id="exampleInputUsername1" placeholder="Description" required> {{$val['description']}}</textarea>
                    </div>                                            
                </div>
                <div class="modal-footer">
                    <a style="float:left" class="btn btn-danger" title='Drop' href='#'><i class='material-icons'>delete</i>Drop</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Change</button>
                </div>
                </div>
            </div>
        </div>
    @endforeach
</form>

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
                    id="exampleInputName1" placeholder="id" value="Santika Hotel" disabled="disabled"/>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">
                    Screen Device
                </label>
                <select class="form-control" id="exampleSelect1"> 
                    <option value="1">1</option>                  
                    <option value="2">2</option>  
                    <option value="3">3</option>  
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control"
                    id="exampleInputName1" placeholder="Name" required/>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Username</label>
                <input type="text" class="form-control"
                    id="exampleInputUsername1" placeholder="Username" required/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control"
                id="exampleInputEmail1" placeholder="Enter email" required/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control"
                    id="exampleInputPassword1" placeholder="Password" required/>
            </div>                                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Create a New One</button>
        </div>
        </div>
    </div>
</div>
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
{!!form_open('API/UserEdit')!!}
    @foreach ($user as $val)            
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
    @endforeach
</form>
@endsection


@section('corejs')

@endsection

@section('menu')
@include('administrator.template.menu')
@endsection