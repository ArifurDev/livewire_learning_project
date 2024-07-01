<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ToggleSwitch extends Component
{
    public $model;
    public $field;
    public $fieldValue;
    public $categoryID;

    public function mount($model, $field ,$categoryID)
    {
        $this->model = $model;
        $this->field = $field;
        $this->fieldValue = $this->model->{$this->field};
        $this->categoryID = $categoryID;
    }

    public function toggle()
    {
        $this->fieldValue = !$this->fieldValue;
        $this->model->{$this->field} = $this->fieldValue;
        $this->model->save();

        return $this->dispatch('toast', message: 'Category status updated successfully.!', notify:'success' );
    }

    public function render()
    {
        return view('livewire.backend.category.toggle-switch');
    }
}
