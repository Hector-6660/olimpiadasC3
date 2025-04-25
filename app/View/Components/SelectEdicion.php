<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Edicion;

class SelectEdicion extends Component
{
    public $ediciones;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->ediciones = Edicion::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-edicion');
    }
}
