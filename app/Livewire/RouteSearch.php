<?php

namespace App\Livewire;

use App\Models\routes;
use Livewire\Component;

class RouteSearch extends Component
{
    public $routeSearching;
    public $routes = '';

    public function render()
    {
        if ($this->routeSearching) {
            $this->routes = routes::search($this->routeSearching)->latest()->get();
        }
        return view('livewire.backend.routes.route-search');
    }
}
