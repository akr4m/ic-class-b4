<?php

use App\Models\Todo;
use Livewire\Component;

new class extends Component
{
    public Todo $todo;

    public bool $isEditing = false;

    public string $newTitle = '';

    public function mount()
    {
        $this->newTitle = $this->todo->title;
    }

    public function markAsDone()
    {
        $this->todo->update([
            'is_done' => true,
        ]);
    }

    public function deleteTodo($id)
    {
        $this->todo->delete();
    }

    public function updateTodo()
    {
        $this->validate([
            'newTitle' => 'required|string|min:10|max:255',
        ]);

        $this->todo->update([
            'title' => $this->newTitle,
        ]);

        $this->isEditing = false;
    }
};
?>

<div class="flex items-center gap-3 p-4 bg-white rounded-lg shadow">
    <input type="checkbox" class="w-5 h-5 text-blue-600 rounded cursor-pointer" @if($todo->is_done) checked @endif />

    @if(!$isEditing)
    <span
        @class([ 'flex-1' , 'text-gray-800'=> !$todo->is_done,
        'line-through text-gray-400'=> $todo->is_done,
        ])
        >{{ $todo->title }}</span>
    @else
    <form wire:submit="updateTodo" class="w-full flex gap-2">
        <input wire:model.live.blur="newTitle" type="text" placeholder="Add a new todo..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />

        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium" wire:loading.attr="disabled" wire:loading.class="opacity-50">Save</button>
    </form>
    @endif

    @unless($todo->is_done)
    <button type="button"
        wire:click="markAsDone"
        wire:confirm="Are you sure you want to mark this todo as done?"
        class="text-blue-500 hover:text-blue-700 text-sm font-medium">
        Done
    </button>
    @endunless

    <button type="button"
        wire:click="$toggle('isEditing')"
        class="text-green-500 hover:text-green-700 text-sm font-medium">
        {{ $isEditing ? 'Cancel Edit' : 'Edit' }}
    </button>

    <button type="button"
        wire:click="deleteTodo"
        wire:confirm="Are you sure you want to delete this todo?"
        class="text-red-500 hover:text-red-700 text-sm font-medium">
        Delete
    </button>
</div>
