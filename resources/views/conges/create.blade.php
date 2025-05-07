@extends('adminlte::page')

@section('title')
    Créer un congé | Laravel Employes App
@endsection

@section('content_header')
    <h1>Créer un congé</h1>
@endsection

@section('content')
    <div class="container">
        @livewire('conges.create')
    </div>
@endsection
