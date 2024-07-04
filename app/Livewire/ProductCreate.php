<?php

namespace App\Livewire;

use App\Models\Attribute;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

#[Layout('components\layouts\backend')]
#[Title('Add Product')]

class ProductCreate extends Component
{
    public $name;
    public $sku;
    public $code;
    public $description;
    public $images = [];
    public $warranty;
    public $selectedOptions;
    public $price;
    public $unit;
    public $discount;
    public $discountType;
    public $stock;
    public $category = [];
    public $status;
    public $tags = [];


    protected $rules = [
        'name' => 'required',
        'sku' => 'required',
        'code' => 'required|unique:products',
        'description' => 'required',
        'images.*' => 'required|image|max:2048',
        'selectedOptions' => 'required',
        'price' => 'required|numeric',
        'unit' => 'required',
        'discount' => 'required|numeric',
        'discountType' => 'required',
        'stock' => 'required|integer',
        'category' => 'required',
        'status' => 'required',
        'tags' => 'required',
    ];

    public function submitForm()
    {
        // $this->validate();
         dump($this->description);

           // Handle file uploads and store paths in an array
        //    $uploadedImages = [];
        //    foreach ($this->images as $image) {
        //        $imageFileName = Str::random(10) . '.' . time() . '.' . $image->extension();
        //     //    $image->storeAs('productImages', $imageFileName, 'public'); // Store in the productImages folder
        //        $uploadedImages[] = 'productImages/' . $imageFileName; // Add the path to the array
        //    }
   

                // Save the product data to the database
                // dump([
                //     'name' => $this->name,
                //     'sku' => $this->sku,
                //     'code' => $this->code,
                //     'description' => $this->description,
                //     'images' => json_encode($uploadedImages), // Store the image paths as JSON
                //     'selectedOptions' => $this->selectedOptions,
                //     'price' => $this->price,
                //     'unit' => $this->unit,
                //     'discount' => $this->discount,
                //     'discountType' => $this->discountType,
                //     'stock' => $this->stock,
                //     'categores' => json_encode($this->category), // Assuming you have a category_id field
                //     'status' => $this->status,
                //     'tags' => json_encode($this->tags), // Store the tags as JSON
                //     'warranty' => $this->warranty, // Store the warranty
                // ]);
    }
    public function render()
    {
        return view('livewire.backend.product.product-create',[
            'attributes' => Attribute::latest()->get(),
            'categories' => Category::where('status','1')->latest()->get(),
        ]);
    }
}
