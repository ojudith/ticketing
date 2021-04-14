@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="container alert alert-danger mt-3 text-center">
        {{$error}}
        </div>   
    @endforeach
@endif

@if(session('success'))
    <div class="container alert alert-success mt-3 text-center">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="container alert alert-danger mt-3 text-center">
        {{session('error')}}
    </div>
@endif