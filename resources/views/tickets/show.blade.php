@extends('layouts.app') 
@section('title', 'View a ticket') 
@section('content')
<div class="container col-md-8 col-md-offset-2"> 
    <div class="card my-3"> 
        <div class="card-body content"> 
            <a href="{{url ('/dashboard')}}" class="btn btn-dark mb-4">Go back</a>
            <h2 class="header">{{$ticket->title}}</h2>
             <p> <strong>Status</strong>: {{ $ticket->status ? 'Pending' : 'Answered' }}</p>
              <p> {{$ticket->content }} </p> </div>
              @if(auth()->user()->isAdmin)
              <div class="col-md-2">
               <a href="{{ action('TicketsController@edit', $ticket->slug) }}" class="text-white btn btn-info">Edit</a>
               </div>
                <form method="post" action="{{ action('TicketsController@destroy', $ticket->slug) }}"> 
                    <input type="hidden" name="_token" value="{{csrf_token() }}"> 
                    <div class="form-group"> 
                        <div> 
                        <button type="submit" class="btn btn-warning my-3 ml-3">Delete</button> 

                        </div>
                     </div>
                     </form> 
                    @endif
                     <div class="clearfix"></div>
            </div>
            <!-- reply -output -->
            @foreach($comments as $comment) 
                <div class="card px-3 my-4"> 
                    <div class="content"> {{ $comment->content }} </div> 
                </div> 
                @endforeach
            <!-- start of reply form -->
            @if(auth()->user()->isAdmin)
            <div class="card my-4"> 
                <div class="card-body py-5">
                 <form class="form-horizontal" method="POST"  action="{{url('/comment')}}">
                        @foreach($errors->all() as $error) 
                             <p class="alert alert-danger">{{ $error }}</p> 
                        @endforeach

                        @if(session('status')) 
                            <div class="alert alert-success"> {{ session('status') }} </div> 
                        @endif
                 <input type="hidden" name="_method" value="POST"> 
                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                <input type="hidden" name="post_id" value="{{$ticket->id}}">
                <input type="hidden" name="user_id" value="{{$ticket->user_id}}">
        <fieldset> 
        <legend>Reply</legend> 
            <div class="form-group"> 
                <div class="col-lg-12"> 
                    <textarea class="form-control" rows="3" id="content" name="content"></textarea> 
                </div> 
            </div>
        <div class="form-group"> 
            <div class="col-lg-10 col-lg-offset-2"> 
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Post</button>
            </div> 
            </div>
        </fieldset> 
    </form> 
    </div>
    @endif
</div>
    </div>
@endsection
