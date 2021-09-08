@extends('adminlte::page')

<div class="card">
    <div class="card-body w-75">
        <form wire:submit.prevent="update" method="POST">
            @include('subforms.todo-create-edit')
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>