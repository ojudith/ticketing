@extends('layouts.app')
@section('title', 'Edit ticket')

@section('content')
<div class="container col-md-8 col-md-offset-2">

    @foreach ($errors->all() as $error) 
    <p class="alert alert-danger">{{ $error }}</p> 
    @endforeach

    @if (session('status')) 
    <div class="alert alert-success"> {{ session('status') }} 
    </div>
     @endif

    <div class="card">
        <legend class="py-2 ml-2">Submit a ticket</legend>
            <form method ="post" class="form-horizontal" >
            @csrf
            <div class="form-group col-lg-10">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for ="title" class="col-lg-2 control-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$ticket->title}}">
                </div>
                <div class="form-group col-lg-10">      
            <textarea class="form-control"  style ="height:150px" name="content" id="">{{$ticket->content}}</textarea>
            <div class="form-group"> <label> <input type="checkbox" name="status" {{ $ticket->status ?"":"checked" }} > Close this ticket? </label> 
            </div>
            </div>
           <div class="form-group"> 
               <div class="col-lg-10 col-lg-offset-2">
               <a href="{{url('/ticket/'.$ticket->slug)}}" class="btn btn-dark mt-3 mb-3">Go Back</a>
               <button type="submit" class="btn btn-primary">Update</button>
    </div>
 </div> 
            </form>
    </div>
</div>


@endsection