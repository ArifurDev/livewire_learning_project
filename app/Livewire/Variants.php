<?php

namespace App\Livewire;

use App\Models\Variant;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components\layouts\backend')]
#[Title('Attributes')]

class Variants extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|unique:variants',
    ];

    public function submitForm()
    {
        $this->validate();

        Variant::create($this->validate());

        //reset input fild
        $this->reset('name');

        // Trigger a success notification
        return $this->dispatch('toast', message: 'Variant created successfully!', notify:'success' );

    }

    public function render()
    {
        return view('livewire.backend.variants.variants',[
            'variants' => Variant::latest()->paginate(10),
        ]);
    }
}
