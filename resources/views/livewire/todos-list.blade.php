@extends('adminlte::page')

@section('title', 'Todos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Todos</h1>
    <a href="{{route('todos.create')}}" class="btn btn-primary">Add new todo</a>
</div>
@stop

@section('content')
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
    <div class="pl-6 pr-6">
            <livewire:todo-table />
    </div>
</div>
@stop