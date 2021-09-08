<div>
        <form wire:submit.prevent="destroy">
            <button type="submit" class="btn btn-link mt-0 pt-0" data-original-title="" title="Delete" onclick="confirm('{{ __("Are you sure?") }}') ? this.parentElement.submit() : ''">
            <span class="text-danger">Delete</span>
            </button>
        </form>
</div>
