@extends('adminlte::page')

@section('plugins.Datatables',true)

@section('title')

    liste des employes |Laravel Employes App

@endsection

@section('content_header')

   <h1>liste des employes</h1> 

@endsection

@section('content')
    <div class="container">
        <div class="mt-5 background-color:red">
            <div class="col-md-10 mx-auto">
                <div class="card my-5">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Employes</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom Complet</th>
                                    <th>Departement</th>
                                    <th>Date_embauche</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employes as $key => $employe)
                                <tr>
                                    <td>{{$key+=1}}</th>
                                    <td>{{$employe->fullname}}</td>
                                    <td>{{$employe->departement}}</td>
                                    <td>{{$employe->hire_date}}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('employes.show',$employe->registration_number)}}"
                                             class="btn bt-sm btn-primary">
                                             <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('employes.edit',$employe->registration_number)}}"
                                             class="btn bt-sm btn-warning mx-2">
                                             <i class="fas fa-edit"></i>
                                        </a>
                                          <form id="{{$employe->registration_number}}" action="{{route('employes.destroy',$employe->registration_number)}}" method="post">
                                             @method('DELETE')
                                             @csrf
                                           </form>
                                           <button type="submit"
                                               onclick="deleteEmp({{$employe->registration_number}})"
                                               class="btn bt-sm btn-danger">
                                               <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                dom :'Bfrtip',
                buttons:[
                    'copy','excel','csv','pdf','print','colvis'
                ],
            initComplete:function(){
             $('.dataTables_info')
           .css('text-align','right');
            }    
                

            });

        });
        
        function deleteEmp(id){
            Swal.fire({
               title: "Are you sure?",
               text: "Etes-vous sur de vouloir supprimer cet employé ?",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Yes, delete it!"
            }).then((result) => {
               if (result.isConfirmed) {
                   document.getElementById(id).submit();
                   
                }
           });
        }
    </script>
    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session()->get('success') }}",
            showConfirmButton: false,
            timer: 3000,
            toast: true
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "{{ session()->get('error') }}",
            showConfirmButton: false,
            timer: 3000,
            toast: true
        });
    </script>
@endif
@endsection
