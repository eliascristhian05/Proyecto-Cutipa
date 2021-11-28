<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{

    public $categories = [];
    public $nombre = "Crear Categoria";
    public $id_categoria;

    public function obtenerCategorias()
    {
        $this->categories = Category::all();
    }

    
    public function render()
    {
        $this->obtenerCategorias();
        return view('livewire.category-component');
    }

    public function edit($id)
    {
        $this->nombre = "Editar Categoria";
    }

    public function top()
    {
        $this->render();
    }
}
