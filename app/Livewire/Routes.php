<?php

namespace App\Livewire;

use App\Models\routes as ModelsRoutes;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components\layouts\backend')]
#[Title('Route Management')]
class Routes extends Component
{
    use WithPagination;

    public $name;
    public $url;

    public $editID;
    public $editName;
    public $editUrl;

    #[Url()]
    public $search = '';

    protected $rules = [
        'name' => 'required|string|min:3|unique:routes',
        'url' => 'required|unique:routes',
    ];
    public function submitForm()
    {
        $this->validate();

        ModelsRoutes::create([
            'name' => $this->name,
            'url' => $this->url,
        ]);

        // Reset create properties
        $this->reset(['name', 'url']);
        return $this->dispatch('toast', message: 'Route setup successfully!', notify: 'success');
    }

    public function edit($id)
    {
        try {
            $this->editID = $id;
            $editRoute = ModelsRoutes::findOrFail($id);
            $this->editName = $editRoute->name;
            $this->editUrl = $editRoute->url;
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Route list not found!', notify: 'error');
        }
    }

    public function update()
    {
        try {
            $editRoute = ModelsRoutes::findOrFail($this->editID);
            $editRoute->name = $this->editName;
            $editRoute->url = $this->editUrl;
            $editRoute->save();
            // Reset edit properties
            $this->reset(['editID', 'editName','editUrl']);
            return $this->dispatch('toast', message: 'Route List Update successfully!', notify: 'success');
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Route list not found!', notify: 'error');
        }
    }

    public function delete($id)
    {
        try {
            $routeList = ModelsRoutes::findOrFail($id);
            //delete Route List
            $routeList->delete();
            return $this->dispatch('toast', message: 'Route list Delete successfully.!', notify: 'success');
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Route list not found!', notify: 'error');
        }
    }
    public function render()
    {
        // $query = ModelsRoutes::query();

        // if ($this->search) {
        //     $query->whereAny(['name','url'], 'like', '%' . $this->search . '%');
        // }

        // $routes = $query->latest()->paginate(10);
        $routes = ModelsRoutes::search($this->search)->latest()->paginate(10);

        return view('livewire.backend.routes.routes', [
            'routes' => $routes,
        ]);
    }
}
