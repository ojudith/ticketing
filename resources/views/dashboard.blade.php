@extends('layouts.app')
@section('content')
<div class="container">
    <div class="dash-head">
        <!-- <h3>welcome <span>{{strtoupper(auth::user()->name)}}</span> </h3> -->
    </div>
</div>
<!-- search functionality -->
@if(!auth()->user()->isAdmin == 1)
<div class="container my-4 search">
    <form action="{{url('/search')}}" method="get">
        <div class="input-group">
            <input type="search" class="form-control" name="search" placeholder="Enter Ticket Id and Search...">
            <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button></span>
        </div>
    </form>
</div>
@endif
<!-- end here -->
    @if(auth()->user()->isAdmin == 1)
    <div class="admin-banner">
    <div class="col-md-12">
        <div class="admin-banner2">
       <h4> welcome to admin area <span>{{strtoupper(auth::user()->name)}}</span></h4>
        <!-- admin view -->
        <div class="container">
                     <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card card-body bg-warning admin-card">
                        <!-- <h3 class="text-white">Admin area</h3> -->
                      <h3 class="text-white nav-link"><a href="{{url('admin/routes')}}">Admin<i class="fa fa-user"></i></a></h3>  
                    </div>
                </div>
                 <div class="col-md-6 text-center pull-right">
                    <div class="card card-body bg-primary admin-card">
                        <!-- <h3 class="text-white">Admin area</h3> -->
                      <h3 class="text-white nav-link"><a href="{{ route('login') }}">Sign-in<i class="fa fa-sign-in"></i></a></h3>  
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>

        <!-- ends here -->
        @else
<div class="client-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">View Tickets</div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                    @if ($tickets->isEmpty()) 
                             <p> There is no ticket.</p> 
    @else 
 <div class="table-content col-md-12">
    <table class="table table-reflow"> 
        <thead> 
            <tr> 
                <th>ID</th> 
                <th>Title</th> 
                <th>Status</th>
                <th>Ticket ID</th>
             </tr> 
        </thead>
        <tbody> 
            @foreach($tickets as $ticket) 
            <tr> 
                <td>{{$ticket->id}} </td> 
                <td> <a href="{{action('TicketsController@show', $ticket->slug) }}" class="nav-link nav-color">{{$ticket->title}} </a></td> 
                <td>{{ $ticket->status ? 'Pending' : 'Answered' }}</td>
                <td>{{$ticket->slug}} </td> 
            </tr> 
            @endforeach 
        </tbody> 
    </table> 
 </div>
   @endif   
</div>
</div>
</div>
</div>

     @endif 
@endsection