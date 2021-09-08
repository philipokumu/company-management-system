<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodosList extends Component
{
    public $todos;

    public function index()
    {
        $this->todos = Todo::all();
    }
    
    public function render()
    {
        return view('livewire.todos-list');
    }
}
