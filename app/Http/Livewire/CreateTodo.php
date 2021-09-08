<?php

namespace App\Http\Livewire;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Livewire\Component;

class CreateTodo extends Component
{
    public $task_name;
    public $completed;

    protected $rules = [
        'task_name' => 'required|min:3',
        'completed' => 'sometimes',
    ];

    public function create()
    {
        $this->validate();

        Todo::create([
            'task_name'=>$this->task_name,
            'completed'=> $this->completed =="true" ? true : false
        ]);

        redirect(route('todos.list'));
    }

    public function render()
    {
        return view('livewire.create-todo');
    }
}
