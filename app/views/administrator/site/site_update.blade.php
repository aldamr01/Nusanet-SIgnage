@extends('administrator.template.template')

@section('title')
    Site Setting Panel
@endsection

@section('content')
<div class="main-content">

    <div class="content-view">
        <div class="row">
            {!!form_open('API/SiteEdit')!!}
                <div class="col-lg-12">
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
                                    Name Site
                                </label>
                                <input value="{{$data['name']}}" required name="name" type="text" class="form-control" id="4" placeholder="ex : Hotel Santika or etc.."/>
                            </fieldset>                
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">
                                    Location
                                </label>
                                <input value="{{$data['location']}}" name="location" class="form-control" id="exampleInputEmail1" placeholder="Location Address" required />                                
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Email
                                </label>
                                <input value="{{$data['email']}}" name="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="email" required />
                            </fieldset>  
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Phone
                                </label>
                                <input value="{{$data['phone']}}" name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="phone" required />
                            </fieldset>   
                            <input type="hidden" name="id" hidden="hidden" value="{{$data['id']}}" id="">                                                                         
                        </div>
                    </div>
                </div>            
                
                <div class="card">
                    <div class="col-md-12">                    
                        <p align="center">
                            <button type="submit" class="btn btn-info">Update Site</button>                    
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