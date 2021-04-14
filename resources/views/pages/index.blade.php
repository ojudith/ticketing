@extends('layouts.app')

@section('content')
@section('title', 'Home')
<div class="container">
        <h1 class="editcontent">
            Welcome To Ojay Online Ticket Support
        </h1>
        <h5 class="edit_subcontent">
            where we customer satisfaction is our priority
        </h5>
</div>

<section id="banner">
    <div class="container">
        <div class="banner-body">
            <div class="banner-content">
                <img src="{{asset('images/login.png')}}" height="150px" width="200px" alt="">
                <header>
                <h3>Login/Register</h3> 
                </header>
                <div class="banner_sub-body">
                    <p>To send a ticket, kindly login into your account, navigate to the ticket page,
                    enter information and send. Have no account, kindly create a new 
                    account by registering.</p>
                </div>
            </div>

            <div class="banner-content">
               <img src="{{asset('images/message.png')}}" height="150px" width="200px"  alt="">
                <header>
                <h3>Send a Ticket</h3>
                </header>
                <div class="banner_sub-body">
                     <p>Having complains , need to ask questions, kindly send a ticket as we will get back to you as soon as possible.</p>
                </div>
            </div>

            <div class="banner-content">
                <img src="{{asset('images/response.png')}}" height="150px" width="200px"  alt="">
                <header>
                <h3>Get responses</h3> 
                </header>
                <div class="banner_sub-body">
                    <p>Our customer care representative have been assigned to take your ticket and attend to them for your satisifaction.</<p></p>
                </div>
            </div>

            <div class="banner-content">
              <img src="{{asset('images/dashboard.png')}}" height="150px" width="200px"  alt="">
                <header>
                <h3>Manage tickets</h3> 
                </header>
                <div class="banner_sub-body">
                    <p>Your can manage your ticket history and profile</<p>              
                </div>
            </div>


    </div>
</div>
</section>



<footer>
    <p>&copy; 2019 O. Judith</p>
</footer>
@endsection
