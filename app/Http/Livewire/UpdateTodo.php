<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class UpdateTodo extends Component
{
    public $task_name;
    public $completed;
    public $todo;

    protected $rules = [
        'task_name' => 'required|min:3',
        'completed' => 'sometimes',
    ];

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
        $this->task_name = $todo->task_name;
        $this->completed = $todo->completed;
    }

    public function update()
    {
        $this->validate();

        $this->todo->update([
            'task_name'=>$this->task_name,
            'completed'=>$this->completed,
        ]);

        redirect(route('todos.list'));
    }

    public function render()
    {
        return view('livewire.update-todo');
    }
}
