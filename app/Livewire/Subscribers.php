<?php

namespace App\Livewire;

use App\Models\Subscribe;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components\layouts\backend')]
#[Title('Subscribers List')]
class Subscribers extends Component
{
    use WithPagination;

    public $editID;
    public $editName;
    public $editEmail;
    public $editStatus;
    public $search;

    public $modelSubscribe;

    public function mount()
    {
        $this->modelSubscribe = new Subscribe;
    }

    public function edit($id)
    {
        try {
            $this->editID = $id;
            $editSubscribe = Subscribe::findOrFail($id);
            $this->editName = $editSubscribe->name;
            $this->editEmail = $editSubscribe->email;
            $this->editStatus = $editSubscribe->status;
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Subscriber not found!', notify: 'error');
        }
    }

    public function update()
    {
        try {
            $editSubscribe = Subscribe::findOrFail($this->editID);

            $editSubscribe->name = $this->editName;
            $editSubscribe->email = $this->editEmail;
            $editSubscribe->status = $this->editStatus;

            $editSubscribe->save();
            // Reset edit properties
            $this->reset(['editID', 'editName', 'editEmail', 'editStatus']);
            return $this->dispatch('toast', message: 'Subscriber Update successfully!', notify: 'success');
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Subscriber not found!', notify: 'error');
        }
    }
    public function render()
    {
        $subscribers = Subscribe::search($this->search)->latest()->paginate(10);
        return view('livewire.backend.subscribers.subscribers', [
            'subscribers' => $subscribers,
        ]);
    }
}
