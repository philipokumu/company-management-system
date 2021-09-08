<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Todo;

class TodoTable extends DataTableComponent
{

    public function columns(): array
    {
        // return [
        //     Column::make('Column Name'),
        // ];
        return [
            Column::make('task_name')
                ->sortable()
                ->searchable(),
            Column::make('completed', 'Completed')
                ->sortable()
                ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Todo::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.todo_table';
    }
}
