@extends('administrator.template.template')

@section('title')
Site {{}}
@endsection

@section('content')
<div class="main-content">
    <div class="content-view">
        <div class="row">
            <div class="col-lg-6">                
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>User Client</b>
                       <a href="" data-toggle="modal" data-target=".bd-example-modal"> 
                           <i style="float:right" class='material-icons'>add</i>
                       </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card panel panel-default m-b-xs">
                                <div class="card-header panel-heading" role="tab" id="headingOne">
                                    <h6 class="panel-title m-a-0">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Collapsible Group Item #1
                                        </a>
                                        <a style="float:right" title='Show' href='#'><i class='material-icons'>slideshow</i></a>
                                        <a style="float:right" title='Show' href='#'><i class='material-icons'>slideshow</i></a>
                                        <a style="float:right" title='Show' href='#'><i class='material-icons'>slideshow</i></a>
                                    </h6>
                                </div>
                                <div id="collapseOne" class="card-block panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    
                                    <table class="table table-stripped table bordered">
                                        <tr>
                                            <td>Name</td>
                                            <td>:&nbsp;</td>
                                            <td>user1</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:&nbsp;</td>
                                            <td>santikahotel</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:&nbsp;</td>
                                            <td>santika@hotel.com</td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>:&nbsp;</td>
                                            <td>contoh123</td>
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
                    </div>
                </div>
            </div>
            <div class="col-lg-6">                
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Client Device</b>
                        <a href="" data-toggle="modal" data-target=".bd-example-modal2"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        <div class="col-md-6">
                            <p align="center">
                                <i class='material-icons' style="font-size:70px;">tv</i>                                
                            </p>
                            <h6>Lobby Screen : <span class="tag tag-success">Actived</span></h6>
                        </div>
                        <div class="col-md-6">
                            <p align="center">
                                <i class='material-icons' style="font-size:70px;">tv</i>                                
                            </p>
                            <h6>Lobby Screen : <span class="tag tag-success">Actived</span></h6>
                        </div>
                        <div class="col-md-6">
                            <a href="#">
                                <p align="center">
                                    <i class='material-icons' style="font-size:70px;">tv</i>
                                    
                                </p>
                                <h6>Lobby Screen : <span class="tag tag-danger">Deceased</span></h6>
                            </a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header no-bg b-a-0">
                        <b>Client Content</b>
                        <a href="" data-toggle="modal" data-target=".bd-example-modal3"> 
                            <i style="float:right" class='material-icons'>add</i>
                        </a>
                    </div>
                    <hr>
                    <div class="card-block">
                        <table class="table table-stripped table-bordered">
                            <thead>                                
                                <td>No.</td>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Preview</td>
                                <td>Action</td>                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Promo 1</td>
                                    <td>Images</td>
                                    <td>
                                        <img style="max-height: 150px; max-width:70px" src="https://upload.wikimedia.org/wikipedia/commons/c/cb/Broadway_tower_edit.jpg" alt="">
                                        <video src=""></video>
                                    </td>
                                    <td>

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

<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    id="exampleInputName1" placeholder="id" value="Santika Hotel" disabled="disabled"/>
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
@endsection


@section('corejs')

@endsection

@section('menu')
@include('administrator.template.menu')
@endsection