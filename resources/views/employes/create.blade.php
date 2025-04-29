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
                    <div class="card-body">
                         <form action="{{route('employes.store')}}"
                              method="POST" class="mt-3">
                              @csrf
                              <div class="form-group mb-3">
                                <label for="registration_number">Registration_number</label>
                                <input type="text" class="form-control"
                                name="registration_number" placeholder="registration_number"
                                value="{{old('registration_number')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fullname">FullName</label>
                                <input type="text" class="form-control"
                                name="fullname" placeholder="Fullname"
                                value="{{old('fullname')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="departement">Departement</label>
                                <input type="text" class="form-control"
                                name="departement" placeholder="Departement"
                                value="{{old('departement')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="hire_date">Hire_date</label>
                                <input type="date" class="form-control"
                                name="hire_date" placeholder="Hire_date"
                                value="{{old('hire_date')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control"
                                name="phone" placeholder="phone"
                                value="{{old('phone')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control"
                                name="address" placeholder="address"
                                value="{{old('address')}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control"
                                name="city" placeholder="city"
                                value="{{old('city')}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>

                            
                            
                            


                        </form>
                    </div>
                    
                
                </div>
            </div>
        </div>
    </div>
@endsection
