@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Companies</h1>
        <a href="{{route('companies.create')}}" class="btn btn-primary">Add new company</a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <table id="companies" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->website}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                                @if(isset($company->logo))
                                    <img src="{{asset('/storage/logos/'.$company->logo)}}" alt="logo" height="100" width="100">
                                @else
                                    <small> Not provided</small>
                                @endif
                            </td>
                            <td> 
                                <div class="d-flex flex-row">
                                    <div>
                                        <a href="{{route('employees.index',$company)}}">View Employees </a> &nbsp; | &nbsp;   
                                    </div> 
                                    <div>
                                        <a href="{{route('companies.edit',$company)}}"> Edit </a> |
                                    </div>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST">
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
            $('#companies').DataTable();
        } );
    </script>
@stop
