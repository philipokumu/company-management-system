{{-- <x-livewire-tables::table.cell> --}}
{{-- Note: This is a tailwind cell --}}
{{-- For bootstrap 4, use <x-livewire-tables::bs4.table.cell> --}}
{{-- For bootstrap 5, use <x-livewire-tables::bs5.table.cell> --}}
{{-- </x-livewire-tables::table.cell> --}}

<x-livewire-tables::table.cell>
    {{ ucfirst($row->task_name) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->completed ? 'yes' : 'no' }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="d-flex flex-row">
        <div>
            <a href="{{ route('todos.edit', $row->id) }}"> Edit </a> |
        </div>
        <livewire:delete-todo :todo="$row" />
    </div>
</x-livewire-tables::table.cell>
