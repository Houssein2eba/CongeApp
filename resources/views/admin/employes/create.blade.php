@extends('adminlte::page')

@section('title')
    Ajouter un employé | Laravel Employés App
@endsection

@section('content_header')
    <h1>Ajouter un Employé</h1>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>📝 Ajouter un Employé</h4>
                </div>
                <div class="card-body p-4">
                    @include('layouts.alert')
                    <livewire:employees.create />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection