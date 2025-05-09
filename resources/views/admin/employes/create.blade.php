@extends('adminlte::page')



@section('title')

    Ajouter un employé |Laravel Employes App

@endsection

@section('content_header')

   <h1>Ajouter un employe</h1> 

@endsection

@section('content')
    <div class="container">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Ajouter un employe</h4>
                        </div>
                    </div>
                    <livewire:employees.create />
                    
                
                </div>
            </div>
        </div>
    </div>
@endsection
