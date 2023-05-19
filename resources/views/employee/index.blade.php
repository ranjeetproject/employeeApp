@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees List
                <div class="col-md-10 offset-md-10">
                                <a href="{{route("employee.create")}}" class="btn btn-primary">
                                    Create Employee
                                </a>

                               
                            </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Eamil</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $key => $employee)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$employee->username}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->gender}}</td>
                                <td>
                                    <a href="{{route("employee.edit",[$employee->id])}}"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp;
                                    <a href="{{route("employee.delete",[$employee->id])}}"><i class="fa-solid fa-trash"></i></a>
                                </td>


                            </tr>
                        @endforeach
                        
                            
                           
                        </tbody>
                       
                    </table>
                     
                </div>
                 <div class="row">
                 {{ $employees->links("pagination::bootstrap-5") }}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
