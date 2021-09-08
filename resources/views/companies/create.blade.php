@extends('adminlte::page')

@section('title', 'Add company')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Add new company</h1>
        <a href="{{route('companies.index')}}" class="btn btn-primary">Back to companies</a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('companies.store') }}" autocomplete="off" class="w-75" enctype="multipart/form-data">
            @csrf
            @include('subforms.company-create-edit')
        </form>
    </div>
</div>
@stop