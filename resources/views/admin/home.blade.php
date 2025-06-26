@extends('adminlte::page')

@section('title')

    Home |Laravel Employes App

@endsection

@section('content_header')

   <h1>Tableau de bord</h1>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$stats['total_employees']}}</h3>
                        <p>Employes</p>
                    </div>
                    <div class="icon">
                         <i class="fas fa-users"></i>

                    </div>
                    <a href="{{url('admin/employes')}}" class="small-box-footer">
                        Voir plus <i class="fas fa-arrow-circle-right"></i>

                    </a>


                </div>

            </div>
            <div class="col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$stats['total_departments']}}</h3>
                        <p>Departements</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calender"></i>

                    </div>
                    <a href="{{route('admin.departement.index')}}" class="small-box-footer">
                        Voir plus <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
           {{-- <div class="col-md-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$stats['total_conges']}}</h3>
                        <p>Departements</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building"></i>

                    </div>
                    <a href="{{url('admin/conges')}}" class="small-box-footer">
                        Voir plus <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div> --}}

                
            </div>

        </div>
        
    </div>
    <!-- Main Footer -->
    <footer class="main-footer fixed-bottom text-center p-3">
        <div class="float-right d-none d-sm-inline">
            Employee Portal
        </div>
        <strong>Copyright &copy; {{ date('Y') }} CongeApp.</strong> All rights reserved.
    </footer>
@endsection

