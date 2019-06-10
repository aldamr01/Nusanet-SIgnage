@extends('administrator.template.template')

@section('title')
    Font Setting Panel
@endsection

@section('content')
<div class="main-content">

    <div class="content-view">
        <div class="row">
            {!!form_open('API/FontEdit')!!}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header no-bg b-a-0">
                            Font data
                        </div>
                        <div class="card-block">    
                            <p>
                                Fill these user information field
                            </p>     
                            <fieldset class="form-group">
                                <label for="4">
                                    Name Font
                                </label>
                                <input value="{{$data['font_name']}}" required name="name" type="text" class="form-control" id="4" placeholder="ex : Calibri or etc.."/>
                            </fieldset>                                            
                            <input type="hidden" name="id" hidden="hidden" value="{{$data['id']}}" id="">                                                                         
                        </div>
                    </div>
                </div>            
                
                <div class="card">
                    <div class="col-md-12">                    
                        <p align="center">
                            <button type="submit" class="btn btn-info">Update Font</button>                    
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