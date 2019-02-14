@section('template1')
    {{$val}}    
    <div class="form-group">
        <label for="exampleInputPassword1">Weather Widget Color</label>
        <input class="form-control" type="color" value="" id="example-color-input" name="weather">
    </div>    
    <div class="form-group">
        <label for="exampleInputPassword1">Screen Background</label>
        <input class="form-control" type="file" value="" id="example-file-input" name="background">
        <img src="s" alt="" class="img-rounded" style="width:10%;geight:10%;">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Screen Logo</label>
        <input class="form-control" type="file" value="" id="example-color-input" name="logo">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Table Widget Color</label>
        <input class="form-control" type="color" value="" id="example-color-input" name="table">
    </div>
@endsection

@section('template2')
    {{$val}}    
    <div class="form-group">
        <label for="exampleInputPassword1">Weather Widget Color</label>
        <input class="form-control" type="color" value="" id="example-color-input" name="weather">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Screen Background</label>       
        <input class="form-control" type="file" value="" id="example-file-input" name="background">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Screen Logo</label>
        <input class="form-control" type="file" value="" id="example-color-input" name="logo">
    </div>    
@endsection

@section('template3')
    no configuration needed...
@endsection