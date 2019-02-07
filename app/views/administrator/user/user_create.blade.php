@extends('administrator.template.template')

@section('title')
    Create New User
@endsection

@section('content')
<div class="main-content">

    <div class="content-view">
        <div class="row">
            {!!form_open('API/UserNew')!!}
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
                                <input required name="name_user" type="text" class="form-control" id="4" placeholder="ex : Router Ngagel or etc.."/>
                            </fieldset>                
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">
                                    Username
                                </label>
                                <input name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required />                                
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Password
                                </label>
                                <input name="password" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" required />
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleSelect1">
                                    User Role Access
                                </label>
                                <select class="form-control" id="exampleSelect1" name="role">                                    
                                    <option value="User" name="role" required>
                                        User
                                    </option>                                
                                    <option value="Administrator" name="role">
                                        Administrator
                                    </option>
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
                                <input required name="router_ip" class="form-control" id="exampleInputEmail1" placeholder="Enter IP router" />                                
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Router Username
                                </label>
                                <input name="router_username" type="text" class="form-control" id="exampleInputPassword1" placeholder="router username" required/>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="2">
                                    Router Password
                                </label>
                                <input name="router_password" type="password" class="form-control" id="2" placeholder="router password" required/>
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
                
                <div class="card">
                    <div class="col-md-12">                    
                        <p align="center">
                            <button type="submit" class="btn btn-info">Create User</button>                    
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