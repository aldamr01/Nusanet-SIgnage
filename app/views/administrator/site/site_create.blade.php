@extends('administrator.template.template')

@section('title')
    Create New Site
@endsection

@section('content')
<div class="main-content">

    <div class="content-view">
        <div class="row">
            {!!form_open('API/SiteNew')!!}
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
                                <input required name="name" type="text" class="form-control" id="4" placeholder="ex : Hotel Santika or etc.."/>
                            </fieldset>                
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">
                                    Location
                                </label>
                                <input name="location" class="form-control" id="exampleInputEmail1" placeholder="Location Address" required />                                
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Email
                                </label>
                                <input name="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="email" required />
                            </fieldset>  
                            <fieldset class="form-group">
                                <label for="exampleInputPassword1">
                                    Phone
                                </label>
                                <input name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="phone" required />
                            </fieldset>                                                                            
                        </div>
                    </div>
                </div>            
                
                <div class="card">
                    <div class="col-md-12">                    
                        <p align="center">
                            <button type="submit" class="btn btn-info">Create Site</button>                    
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