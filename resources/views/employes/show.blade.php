@extends('adminlte::page')



@section('title')

    Afficher un employé |Laravel Employes App

@endsection

@section('content_header')

   <h3>  Afficher un employé  </h3>

@endsection

@section('content')
    <div class="container">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>{{$employe->fullname}}</h4>
                          {{-- @if(isset($employe))                         
                                <h4>{{$employe->fullname}}</h4>
                            @else
                                <h4>الموظف غير موجود</h4>
                            @endif --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Registration_number</th>
                                <td>{{$employe->registration_number}}</td>
                            </tr>
                            <tr>
                                <th>Nom Complet</th>
                                <td>{{$employe->name}}</td>
                            </tr>
                            <tr>
                                <th>Departement</th>
                                <td>{{$employe->departement->name}}</td>
                            </tr>
                            <tr>
                                <th>Date_Embauche</th>
                                <td>{{$employe->hire_date}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$employe->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$employe->phone}}</td>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td>{{$employe->address}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$employe->city}}</td>
                            </tr>
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('employes.edit', $employe->id) }}"
                                           class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('employes.destroy', $employe->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </table>

                </div>
            </div>
        </div>
    </div>
@endsection
