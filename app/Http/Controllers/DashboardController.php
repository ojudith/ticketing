<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {   
       $user_id = auth()->user()->id;
       $user = User::find($user_id);
        return view('dashboard')->with('tickets', $user->tickets);
    }

    public function admin()
    {
        $tickets = Ticket::OrderBy('slug','desc')->paginate(5);
        return view('admin', compact('tickets'));

        $user_id = auth()->user()->id;
         $user = User::find($user_id);
         return view('admin', compact('tickets'));
    }
}
