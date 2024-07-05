<?php

namespace App\Livewire;

use App\Models\Attribute;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

#[Layout('components\layouts\backend')]
#[Title('Add Product')]

class ProductCreate extends Component
{
    use WithFileUploads;

    public $name , $sku , $code , $description , $images = [] , $warranty , $price , $unit , $discount , $discountType , $stock , $category = [] , $status , $tags , $variantes , $subProductVariates ;

    protected $rules = [
        'name' => 'required|unique:products',
        'sku' => 'required|unique:products',
        'code' => 'required|unique:products',
        'description' => 'required',
        'images.*' => 'required|image|max:2048',
        'warranty' => 'required|string',

        'price' => 'numeric',
        'unit' => 'string',
        'discount' => 'numeric',
        'discountType' => 'string',
        'stock' => 'integer',
        'category' => 'required|array',
        'status' => 'required',
        'tags' => 'required|array',
    ];



    protected $listeners = [
        'getTags' => 'setTags',
        'getVariantes' => 'setVariantes',
        'getSubVariantes' => 'setSubVariantes',
    ];

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function setVariantes($variantes)
    {
        $this->variantes = $variantes;
    }

    public function setSubVariantes($subProductVariates)
    {
        $this->subProductVariates = $subProductVariates;
    }

    public function submitForm()
    {
        // $this->validate();
        dump($this->variantes);

        //    // Handle file uploads and store paths in an array
        //    $uploadedImages = [];
        //    foreach ($this->images as $image) {
        //        $imageFileName = Str::random(10) . '.' . time() . '.' . $image->extension();
        //     //    $image->storeAs('productImages', $imageFileName, 'public'); // Store in the productImages folder
        //        $uploadedImages[] =  $imageFileName; // Add the path to the array
        //    }
   

        //         // Save the product data to the database
        //         dump([
        //             'name' => $this->name,
        //             'sku' => $this->sku,
        //             'code' => $this->code,
        //             'description' => $this->description,
        //             'images' => json_encode($uploadedImages), // Store the image paths as JSON
        //             'price' => $this->price,
        //             'unit' => $this->unit,
        //             'discount' => $this->discount,
        //             'discountType' => $this->discountType,
        //             'categores' => json_encode($this->category), // Assuming you have a category_id field
        //             'status' => $this->status,
        //             'tags' => json_encode($this->tags), // Store the tags as JSON
        //             'warranty' => $this->warranty, // Store the warranty
        //         ]);
    }
    public function render()
    {
        return view('livewire.backend.product.product-create',[
            'attributes' => Attribute::latest()->get(),
            'categories' => Category::where('status','1')->latest()->get(),
        ]);
    }
}
