@extends('layouts.adminapp')
@section('content')

<div class="container create-banner">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Tickets</div>
                <!-- search -->
    <div class="container my-4 search">
        <form action="{{url('/adminsearch')}}" method="get">
            <div class="input-group">
                <input type="search" class="form-control" name="adminsearch" placeholder="Enter Ticket Id and Search...">
                <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary">Search</button></span>
            </div>
        </form>
    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($tickets->isEmpty()) 
    <p> There is no ticket.</p> 
    @else 
    <table class="table table-reflow"> 
        <thead> 
            <tr> 
                <th>Ticket ID</th>
                <th>Title</th> 
                <th>Status</th>
                <th>Email</th>
             </tr> 
        </thead>
        <tbody> 
            @foreach($tickets as $ticket) 
            <tr> 
                <td>{{$ticket->slug}}</td> 
                <td> <a href="{{action('TicketsController@show', $ticket->slug) }}">{{$ticket->title}} </a></td> 
                <td>{{ $ticket->status ? 'Pending' : 'Answered' }}</td>
                <td>{{$ticket->user->email}} </td> 
            </tr> 
            @endforeach 
        </tbody> 
    </table> 
   <div class="paginate-banner">{{$tickets->links()}}</div> 
     @endif
    </div>
</div>
</div>
</div>
</div>
@endsection