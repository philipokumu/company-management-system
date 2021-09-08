<div class="box-body">
    <div class="form-group">
        <label for="task_name">Task</label>
        <input type="name" class="form-control" wire:model="task_name"  id="task_name" name="task_name" placeholder="Enter task..." value="{{ old('task_name', isset($todo) ? $todo->task_name : '' ) }}">
        @if ($errors->has('task_name'))
            <span id="task_name-error" class="error text-danger" for="input-task_name">{{ $errors->first('task_name') }}</span>
        @endif
    </div>
    <select 
        wire:model="completed"
        class="block appearance-none w-full bg-gray-200 border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option>-Select-</option>
        <option value="false" {{--@if (isset($completed) && !$completed) selected @endif--}}>No</option>
        <option value="true" {{--@if (isset($completed) && $completed) selected @endif--}}>Yes</option>
    </select>

    </div>
    </div>
    <!-- /.box-body -->