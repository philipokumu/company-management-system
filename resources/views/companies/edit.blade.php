@extends('adminlte::page')

@section('title', 'Edit company')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Edit company {{$company->id}}</h1>
        <a href="{{route('companies.index')}}" class="btn btn-primary">Back to companies</a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('companies.update',$company) }}" autocomplete="off" class="w-75" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('subforms.company-create-edit')
        </form>
    </div>
</div>
@stop