<?php

namespace App\Livewire;

use App\Models\Attribute as ModelsAttribute;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components\layouts\backend')]
#[Title('Attributes')]

class Attribute extends Component
{
    public $name;
    public $search ='';

    protected $rules = [
        'name' => 'required|unique:attributes',
    ];

    public function submitForm()
    {
        $this->validate();

        ModelsAttribute::create($this->validate());

        //reset input fild
        $this->reset('name');

        // Trigger a success notification
        return $this->dispatch('toast', message: 'Attribute created successfully!', notify:'success' );

    }

    public function delete($attributeId)
    {
         try {
            ModelsAttribute::findOrFail($attributeId)->delete();
            return $this->dispatch('toast', message: 'Attribute delete successfully!', notify:'success' );
         } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Attribute not found!', notify:'error');
         }
    }

    public function render()
    {
        $query = ModelsAttribute::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $attributes = $query->latest()->paginate(10);

        // ModelsAttribute::latest()->paginate(10)
        return view('livewire.backend.attribute',[
            'attributes' => $attributes
        ]);
    }
}
