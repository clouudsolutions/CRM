@extends('layouts.login_register')
@section('content')
        <div class="container">
                <div class="rounded-3" style="background-color: #e4dedeee;">
                    <div class="container-fluid p-4 my-3">
                        <h1 class="display-5 fw-bold" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                            Live Html File Editor
                        </h1>
                        <p class="col-md-8 fs-4" style="font-family:'Times New Roman', Times, serif">
                            Hey Guys, this is the simple Html file editor project for
                            practicing laravel. In this project you can write html code and see the
                            result of your output at the same time like the live server. I hope you will like
                            this project. Have a good coding day.
                        </p>
                        <a href="{{ Route('register') }}" class="btn btn-primary">
                            Register
                        </a>
                        <a href="{{ Route('login') }}" class="btn btn-primary mx-1">
                            Login
                        </a>
                    </div>
                </div>
        </div>
@endsection
