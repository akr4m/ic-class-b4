<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TodoForm extends Form
{
    #[Validate('required|string|min:10|max:255')]
    public string $title = '';

    // public function submit()
    // {
    //     $this->validate();
    // }
}
