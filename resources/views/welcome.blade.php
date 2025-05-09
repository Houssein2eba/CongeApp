@extends('layouts.app')

@section('title')

    welcome |Laravel Employés App

@endsection

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6 mx-auto">
                <div class="card p-4">
                    <div class="card-header bg-light">
                        <h3 class="p-2"> Bienvenue!</h3>
                    </div>
                    <div class="card-body">
                        @guest
                            <a href="{{url('/login')}}" class="btn btn-outline-primary">
                                Login
                            </a>
                        @endguest
                        @auth
                            //logout
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    Logout
                                </button>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
