@extends('adminlte::page')

@section('title')
    modifier  |Laravel Employes App
@endsection

@section('content_header')
   <h1>Modifier un employe</h1>
@endsection

@section('content')
    <div class="container">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Modifier un employe</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(isset($employe))
                            <form action="{{ route('admin.employe.update', $employe->id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="registration_number">Registration Number</label>
                                    <input type="text" class="form-control"
                                    name="registration_number" placeholder="Registration number"
                                    value="{{ old('registration_number', $employe->registration_number) }}">
                                    <span class="text-danger">{{ $errors->first('registration_number') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control"
                                    name="name" placeholder="Full name"
                                    value="{{ old('name', $employe->name) }}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="departement">Departement</label>
                                    <select name="departement_id" class="form-control">
                                        @foreach ($departements as $departement)
                                            <option value="{{ $departement->id }}"
                                                @if($employe->departement->id == $departement->id) selected @endif>
                                                {{ $departement->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('departement_id') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="hire_date">Hire Date</label>
                                    <input type="date" class="form-control"
                                    name="hire_date"
                                    value="{{ old('hire_date', $employe->hire_date) }}">
                                    <span class="text-danger">{{ $errors->first('hire_date') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control"
                                    name="phone" placeholder="Phone"
                                    value="{{ old('phone', $employe->phone) }}">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control"
                                    name="address" placeholder="Address"
                                    value="{{ old('address', $employe->address) }}">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control"
                                    name="city" placeholder="City"
                                    value="{{ old('city', $employe->city) }}">
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Modifier
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-danger text-center">Employee not found</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
