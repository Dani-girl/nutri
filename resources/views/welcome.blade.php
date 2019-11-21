@extends('layouts.app')

@section('body')
<div class="welcome-header" id="home">
    <div class="row justify-content-center align-items-center">
        <div class="welcome-header-text-holder col-md-8">
            <div class="welcome-header-text">
                <h1>Get fit with us!</h1>
                <p>With our apllication you can easily get your healthy diet and exercise program. Register and start changing your habits to healthier ones!</p>
                <div class="row justify-content-center align-items-center">
                    <a href="{{ route('register') }}" class="btn btn-dark">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div>
            <div class="header-title" id="about-us">About nutri-smart</div>
            <div class="header-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
            </div>
        </div>
        <br>
        <div class="header-title" id="meet-our-team">Meet our team</div>
        <div class="row">
            <div class="col-md-4">
                <div class="header-text">
                    <div class="team-pics"></div>
                    Ime i prezime<br>
                    Opis
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="header-text">
                    <div class="team-pics"></div>
                    Ime i prezime<br>
                    Opis
                </div>
            </div>
            <div class="col-md-4">
                <div class="header-text">
                    <div class="team-pics"></div>
                    Ime i prezime<br>
                    Opis
                </div>
            </div>
            
        </div>
    </div>
</div>
<hr>

<div class="header-title" id="blog">Blog</div>
<div class="row">
    <div class="col-md-5 offset-md-2">
        <div class="header-text">
            Ime posta<br>
            Opis<br>
            <a href="">Read more...</a>
        </div>
    </div>
    <div class="col-md-5 blog-img"></div>
</div>
<br>
<div class="row">
    <div class="col-md-5 blog-img"></div>
    <div class="col-md-5 offset-md-2">
        <div class="header-text">
            Ime posta<br>
           Opis<br>
            <a href="">Read more...</a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-5 offset-md-2">
        <div class="header-text">
            Ime posta<br>
            Opis<br>
            <a href="">Read more...</a>
        </div>
    </div>
    <div class="col-md-5 blog-img"></div>
</div>
<hr>

<div class="header-title" id="testimonials">What our customers say...</div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="testimonial-name">Name: Diane Smith</div>
            <div class="testimonial-text">
                Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-name">Name: Diane Smith</div>
            <div class="testimonial-text">
                Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="testimonial-name">Name: Diane Smith</div>
            <div class="testimonial-text">
                Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-name">Name: Diane Smith</div>
            <div class="testimonial-text">
                Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.
            </div>
        </div>
    </div>

@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection
