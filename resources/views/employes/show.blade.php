@extends('adminlte::page')



@section('title')

    Afficher un employé |Laravel Employes App

@endsection

@section('content_header')

   <h3>Afficher un employe </h3> 

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
                        </div>
                    </div>
                    <div class="card-body">
                              <div class="form-group mb-3">
                                <label for="registration_number">Registration_number</label>
                                <input type="text" disabled class="form-control rounded-0"
                                name="registration_number" placeholder="registration_number"
                                value="{{$employe->registration_number}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fullname">Nom Complet</label>
                                <input type="text" disabled class="form-control rounded-0"
                                name="fullname" placeholder="Nom Complet"
                                value="{{$employe->fullname}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="departement">Departement</label>
                                <input type="text" disabled class="form-control rounded-0"
                                name="departement" placeholder="Departement"
                                value="{{$employe->departement}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="hire_date">Date_embauche</label>
                                <input type="date" disabled class="form-control rounded-0"
                                name="hire_date" placeholder="Date_embauche"
                                value="{{$employe->hire_date}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" disabled class="form-control rounded-0"
                                name="phone" placeholder="phone"
                                value="{{$employe->phone}}">
                                {{--
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" disabled class="form-control rounded-0"
                                name="address" placeholder="address"
                                value="{{$employe->address}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">City</label>
                                <input type="text" disabled class="form-control rounded-0"
                                name="city" placeholder="city"
                                value="{{$employe->city}}">
                            </div>
                            
                        --}}
                
                </div>
            </div>
        </div>
    </div>
@endsection
