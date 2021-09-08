@extends('adminlte::page')

@section('title', 'Edit Employee')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Edit Employee #{{$company->id}}</h1>
        <a href="{{route('employees.index',$company)}}" class="btn btn-primary">Back to Employees</a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('employees.update', ['company'=>$company->id,'employee'=>$employee->id]) }}" autocomplete="off" class="w-75">
            @csrf
            @method('patch')
            @include('subforms.employee-create-edit')
        </form>
    </div>
</div>
@stop