@extends('layouts.app')
@section('title', 'Contact')

@section('content')
<div class="container col-md-8 col-md-offset-2 create-banner">

    @foreach ($errors->all() as $error) 
    <p class="alert alert-danger">{{ $error }}</p> 
    @endforeach

    @if (session('status')) 
    <div class="alert alert-success"> {{ session('status') }} 
    </div>
     @endif
    @if(!Auth::check())
    <p>You have to login to submit a ticket, if you dont have an account, kindly register!!! 
    <i class="fa fa-sign-in text-danger"></i>
    </p>
    @else
    <div class="card">
        <legend class="py-2 ml-2">Submit a ticket</legend>
            <form method ="post" class="form-horizontal" >
            @csrf
            <div class="form-group col-lg-10">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for ="title" class="col-lg-2 control-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="form-group col-lg-10">
                <label for ="content" class="col-lg-2 control-label">Content</label>
            <textarea name="content" class="form-control" placeholder="enter your content here"></textarea>           
            <span class="help-block">Feel free to ask us any question.</span>
            <span class="help-block">Kindly register to send a ticket.</span>
            </div>
           
            <div class="form-group"> <div class="col-lg-10 col-lg-offset-2"> 
               <a href="{{url('/')}}" class="btn btn-dark mt-3 mb-3">Go Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
         
            </div>
            </form>
            
    </div>
    @endif
</div>


@endsection