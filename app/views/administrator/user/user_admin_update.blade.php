@extends('administrator.template.template')

@section('title')
    Edit User Data
@endsection

@section('content')
<div class="main-content">

    <div class="content-view">
        <div class="row">
            {!!form_open('API/UserEdit')!!}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header no-bg b-a-0">
                            User data
                        </div>
                        <div class="card-block">    
                            <p>
                                Fill these user information field
                            </p>     
                            <fieldset class="form-group">
                                <label for="4">
                                    Name
                                </label>
                                <input required name="name_user" type="text" class="form-control" id="4" placeholder="ex : Router Ngagel or etc.." value="{{$data['datauser']['router_name']}}"/>
                            </fieldset>                
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">
                                    Username
                                </label>
                                <input value="{{$data['username']}}" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required />                                
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Password
                                </label>
                                <input value="{{$data['password']}}" name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" required />
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleSelect1">
                                    User Role Access
                                </label>
                                <select class="form-control" id="exampleSelect1" name="role"> 
                                    @if ($data['role']=='administrator')
                                    <option value="user" name="role" >
                                        User
                                    </option>                                
                                    <option value="administrator" name="role" selected>
                                        Administrator
                                    </option>    
                                    @endif                                   

                                    @if ($data['role']=='user')
                                    <option value="user" name="role" selected>
                                        User
                                    </option>                                
                                    <option value="administrator" name="role" >
                                        Administrator
                                    </option>    
                                    @endif
                                    
                                </select>
                            </fieldset>                                                                                                                                 
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header no-bg b-a-0">
                            Router configuration data
                        </div>
                        <div class="card-block">    
                            <p>
                                Fill these user router configuration field
                            </p>                    
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">
                                    Router IP
                                </label>
                                <input value="{{$data['datauser']['router_ip']}}" required name="router_ip" class="form-control" id="exampleInputEmail1" placeholder="Enter IP router" />                                
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Router Username
                                </label>
                                <input value="{{$data['datauser']['router_username']}}" name="router_username" type="text" class="form-control" id="exampleInputPassword1" placeholder="router username" required/>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="2">
                                    Router Password
                                </label>
                                <input value="{{$data['datauser']['router_password']}}" name="router_password" type="password" class="form-control" id="2" placeholder="router password" required/>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="3">
                                    Router Port
                                </label>
                                <input name="router_port" type="text" class="form-control" id="3" placeholder="router port" value="8728" readonly="readonly" required/>
                            </fieldset>                                                    
                        </div>
                    </div>
                </div>            
                <input type="hidden" name="id" value="{{$data['id']}}">
                <div class="card">
                    <div class="col-md-12">                    
                        <p align="center">
                            <button type="submit" class="btn btn-warning">Update User</button>                    
                        </p>                    
                    </div>
                </div>
            </form>
        </div>              

    </div>

    @include('administrator.template.footer')
</div>

@endsection


@section('corejs')
    
@endsection

@section('menu')
    @include('administrator.template.menu')    
@endsection