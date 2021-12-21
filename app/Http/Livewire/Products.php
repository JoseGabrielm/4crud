<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class Products extends Component
{

    public $editedProductIndex = null;
    public $editedProductField = null;
    public $products = [];

    protected $rules = [
        'products.*.name' => ['required', 'min:5'],
        'products.*.price' => ['required', 'numeric'],
    ];

    protected $validationAttributes = [
        'products.*.name' => 'name',
        'products.*.price' => 'price',
    ];

    public function mount()
    {
        $this->products = Product::all()->toArray();
        
    }

    public function render()
    {
        return view('livewire.products', ['products' => $this->products]);
    }

    public function editProduct($productIndex)
    {
        $this->editedProductIndex = $productIndex;
    }

    public function editProductField($productIndex, $fieldName)
    {
        $this->editedProductField = $productIndex . '.' . $fieldName;
    }

    public function saveProduct($productIndex)
    {
        $this->validate();

        $product = $this->products[$productIndex] ?? NULL;
        if(!is_null($product)){
            $editedProduct = Product::find($product['id']);
            if($editedProduct){
                $editedProduct->update($product);
            }
           //optional(Product::find($product['id']))->update($product);
        }
        $this->editedProductIndex = null;
        $this->editedProductField = null;
    }

}
