@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>{{$company->name}} employees</h1>
        <a href="{{route('employees.create',$company)}}" class="btn btn-primary">Add new employee</a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <table id="employees" class="display">
                <thead>
                    <tr>
                        <th>Names</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone}}</td>
                            <td> 
                                <div class="d-flex flex-row">
                                    <div>
                                        <a href="{{ route('employees.edit', ['company'=>$company->id,'employee'=>$employee->id]) }}"> Edit </a> |
                                    </div>
                                    <form action="{{ route('employees.destroy', ['company'=>$company->id,'employee'=>$employee->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    
                                        <button type="button" class="btn btn-link mt-0 pt-0" data-original-title="" title="Delete" onclick="confirm('{{ __("Are you sure?") }}') ? this.parentElement.submit() : ''">
                                        <span class="text-danger">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.1/datatables.min.css"/>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.1/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#employees').DataTable();
        } );
    </script>
@stop
