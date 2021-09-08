<?php

namespace Tests\Feature\Mine;

use App\Http\Livewire\CreateTodo;
use App\Http\Livewire\DeleteTodo;
use App\Http\Livewire\TodosList;
use App\Http\Livewire\UpdateTodo;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_new_Todo()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateTodo::class)
            ->set('task_name', 'Write email')
            ->set('completed', false)
            ->call('create')
            ->assertRedirect(route('todos.list'));

        $todo = Todo::first();
        $this->assertNotNull($todo);
        
        $this->assertEquals($todo->task_name, 'Write email');
        $this->assertEquals($todo->completed, false);

        $this->assertDatabaseCount('todos',1);
        
    }





    public function test_user_can_view_all_todos()
    {
        $todos = Todo::factory(2)->create();

        Livewire::actingAs(User::factory()->create())
            ->test(TodosList::class)
            ->call('index')
            ->assertOk();
        
    }


    public function test_user_can_update_todo_details()
    {

        $todo = Todo::factory()->create();

        Livewire::actingAs(User::factory()->create())
            ->test(UpdateTodo::class,['todo' => $todo])
            ->set('task_name', 'Email sent')
            ->set('completed', true)
            ->call('update',$todo->id)
            ->assertRedirect(route('todos.list'));

        $updatedTodo = Todo::first();

        $this->assertEquals($todo->id, $updatedTodo->id);
        $this->assertEquals($updatedTodo->task_name, 'Email sent');
        $this->assertEquals($updatedTodo->completed, true);
    }


    public function test_user_can_delete_todo()
    {

        $todo = Todo::factory()->create();
        $this->assertDatabaseCount('todos',1);

        Livewire::actingAs(User::factory()->create())
            ->test(DeleteTodo::class,['todo'=>$todo])
            ->call('destroy',$todo->id);

            $deletedTodo = Todo::first();
    
            $this->assertNull($deletedTodo);
    }
}
