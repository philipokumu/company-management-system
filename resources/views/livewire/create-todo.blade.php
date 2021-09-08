@extends('adminlte::page')

{{-- @section('title', 'Add todo')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Add new todo</h1>
        <a href="{{route('todos.list')}}" class="btn btn-primary">Back to todos</a>
    </div>
@stop

@section('content') --}}
<div class="card">
    <div class="card-body w-75">
        <form wire:submit.prevent="create" method="POST">
            @include('subforms.todo-create-edit')
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
{{-- @stop --}}