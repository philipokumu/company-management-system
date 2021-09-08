<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class DeleteTodo extends Component
{
    public $todo;

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
    }
    
    public function destroy()
    {
        $this->todo->delete();

    }

    public function render()
    {
        return view('livewire.delete-todo');
    }
}
