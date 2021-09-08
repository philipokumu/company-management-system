@extends('adminlte::page')

@section('title', 'Add Employee')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Add new employee</h1>
        <a href="{{route('employees.index',$company)}}" class="btn btn-primary">Back to employees</a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('employees.store',$company) }}" autocomplete="off" class="w-75">
            @csrf
            @include('subforms.employee-create-edit')
        </form>
    </div>
</div>
@stop