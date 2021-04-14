<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TicketFormRequest;

class TicketsController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth',['except'=>['contact']]);
    // }

    public function index()
    {
        $tickets = Ticket::OrderBy('slug','desc')->paginate(5);
        return view('tickets.index')->with('tickets', $tickets);

    }
      public function create()
    {
        return view('tickets.create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tickets = Ticket::where('slug','like','%'.$search.'%')->orWhere('title','like','%'.$search.'%')->paginate(5);
        return view('/dashboard', ['tickets'=>$tickets]);
    }

     public function adminsearch(Request $request)
    {
        $search = $request->get('adminsearch');
        $tickets = Ticket::where('slug','like','%'.$search.'%')->orWhere('title','like','%'.$search.'%')->paginate(10);
        return view('/admin', ['tickets'=>$tickets]);
    }

    public function store(TicketFormRequest $request) 
    { 

       $ticket = new Ticket;
       $slug = uniqid(); 
       $ticket->title = $request->get('title');
       $ticket->content = $request->get('content');
       $ticket->user_id = auth()->user()->id;
       $ticket->slug = $slug ;
       $ticket->save();

// mail to my support team
        $data = array( 'ticket' => $slug, );
        Mail::send('emails.ticket', $data, function ($message) 
        { 
        $message->from('junik@judithdev.com.ng', 'New ticket!');
        $message->to('judy@admin.com')->subject('There is a new ticket!');
        
        });
// mail to my customer

         $user = auth()->user();
         Mail::send('emails.email', ['user' => $user], function($message) use ($user)
        {
            $message->from('junik@judithdev.com.ng', "New ticket!");
            $message->subject("open ticket by you");
            $message->to($user->email);
        });

  
        return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
      
        // $user = User::findOrFail($slug);
        // $data = array( 'ticket' => $slug, 'user'=>$user);
        // Mail::send('emails.userticket', $data, function ($message) 
        // { 
        // $message->from('junik@judithdev.com.ng', 'User ticket');
        // $message->to($user->email)->subject('Ticket receveived');
        // });
    
     

    }

    public function show($slug)
    { 
        $ticket = Ticket::whereSlug($slug)->firstOrFail(); 
        $comments = $ticket->comments()->get();
        return view('tickets.show')->with([
            'ticket' => $ticket,
            'comments' => $comments
        ]);
    }

    public function edit($slug) 
    { 
        $ticket = Ticket::whereSlug($slug)->firstOrFail(); 
        return view('tickets.edit', compact('ticket')); 
    }

    public function update($slug, TicketFormRequest $request)
     { 
         $ticket = Ticket::whereSlug($slug)->firstOrFail(); 
         $ticket->title = $request->get('title'); 
         $ticket->content = $request->get('content'); 
         if($request->get('status') != null) 
            { $ticket->status = 0; 
            
            } else {
                 $ticket->status = 1;
                 } 
            $ticket->save(); 
            
        return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');

        }
        public function destroy($slug) 
        {
            $ticket = Ticket::whereSlug($slug)->firstOrFail(); 
            $ticket->delete(); 
            return redirect('/')->with('status', 'The ticket '.$slug.' has been deleted!'); 
        }
        
        // public function sendEmailRemainder(TicketFormRequest $request) 
        //     { 
        //     $user = User::findOrFail($slug);                  
        //     Mail::send('emails.userticket', ['user'=>$user], function ($message) 
        //     { 
        //     $message->from('junik@judithdev.com.ng', 'Hello there!');
        //     $message->to($user->email, $user->name)->subject('Ticket received');
        //     });   
        // }
}

