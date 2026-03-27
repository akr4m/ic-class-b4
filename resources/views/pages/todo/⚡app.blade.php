<?php

use App\Livewire\Forms\TodoForm;
use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    public TodoForm $form;

    #[Computed()]
    public function todos()
    {
        $todos = Todo::query()->latest()->get();

        return $todos;
    }

    public function addTodo()
    {
        $this->form->validate();
        sleep(5);
        // validation
        // $this->validate([
        //     'newTitle' => 'required|string|min:10|max:255',
        // ]);
        // create a new todo
        Todo::create([
            'title' => $this->form->title,
            'is_done' => false,
        ]);

        // add the new todo to the list of todos
        // reset the new title input
        // $this->newTitle = '';

        // reset validation errors
        $this->resetValidation('newTitle');
    }
};
?>

<div class=" max-w-3xl w-full mx-auto mt-10 py-12 px-6 bg-gray-100 shadow-2xs">
    <h1 class="text-2xl">Livewire TO-DO CRUD</h1>
    <div class="mt-4 text-gray-500">
        No refresh, Pure PHP actions, and real UX!
    </div>

    <div>
        <form wire:submit="addTodo" class="mt-6">
            <div class=" flex gap-2">
                <input wire:model.live.blur="form.title" type="text" placeholder="Add a new todo..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" />

                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium" wire:loading.attr="disabled" wire:loading.class="opacity-50">Save</button>
            </div>

            <div>
                @error('form.title')
                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div wire:loading>
                <svg class="mr-3 -ml-1 size-5 animate-spin text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Saving todo...
            </div>
        </form>
    </div>

    <div>
        <div class="mt-8 space-y-3">
            @foreach ($this->todos as $todo)
            <livewire:todo.item wire:key="{{ $todo->id }}" :todo="$todo" />
            @endforeach
        </div>
    </div>
</div>
