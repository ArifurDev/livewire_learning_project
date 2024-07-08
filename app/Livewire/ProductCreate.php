<?php

namespace App\Livewire;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductSubVariantion;
use App\Models\ProductVariation;
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

    public $name, $sku, $code, $description, $images = [], $warranty, $price, $unit, $discount, $discountType, $stock, $category = [], $status, $tags, $variantes, $subProductVariates;

    protected $rules = [
        'name' => 'required|unique:products',
        'sku' => 'required|unique:products',
        'code' => 'required|unique:products',
        'description' => 'required',
        'images.*' => 'required|image|max:2048',
        'warranty' => 'required|string',

        'price' => 'nullable|numeric',
        'unit' => 'required|string',
        'discount' => 'nullable|numeric',
        'discountType' => 'nullable|string',
        'stock' => 'nullable|integer',
        'category' => 'required|array',
        'status' => 'required|string',
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
        $this->validate();

        // produce a slug based on the activity title
        $slug = Str::slug($this->name);

        //Handle file uploads and store paths in an array
        $uploadedImages = [];
        foreach ($this->images as $image) {
            // Generate an SEO-friendly image file name
            $imageFileName = $slug . '-' . Str::random(5) . time() . '.' . $image->extension();
            // $image->storeAs('productImages', $imageFileName, 'public'); // Store in the productImages folder
            $uploadedImages[] = $imageFileName; // Add the path to the array
        }

        /**
         * summernote image upload start
         */
        $content = $this->description;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        // MIME type to extension mapping
        $mime_to_extension = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            // add more mappings as needed
        ];

        foreach ($imageFile as $item => $image) {
            // Get the image source data
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            // Extract the MIME type
            list(, $mime) = explode(':', $type);

            // Decode the base64 image data
            $imgeData = base64_decode($data);

            // Determine the file extension from MIME type
            $extension = isset($mime_to_extension[$mime]) ? $mime_to_extension[$mime] : 'png';

            // Generate a unique name for the image with the correct extension
            $image_name = "/description/" . Str::random(5) . time() . $item . '.' . $extension;

            // Save the image to the public path
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            // Update the src attribute of the image
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        // Update the description with the new image paths
        $this->description = $dom->saveHTML();

        /**
         * Save the product data to the database 
         */
        // Save the product data to the database and get the product ID
        $product_id = Product::insertGetId([
            'name' => $this->name,
            'slug' => $slug,
            'sku' => $this->sku,
            'code' => $this->code,
            'description' => $this->description,
            'images' => json_encode($uploadedImages), // Store the image paths as JSON
            'warranty' => $this->warranty, // Store the warranty
            'price' => $this->price,
            'unit' => $this->unit,
            'discount' => $this->discount,
            'discountType' => $this->discountType,
            'categories_id' => json_encode($this->category), // Assuming you have a category_id field
            'status' => $this->status,
            'tags' => json_encode($this->tags), // Store the tags as JSON
        ]);

        /**
         * Insert data into the product variations model
         */
        if ($this->variantes) {
            foreach ($this->variantes as $variante) {
                ProductVariation::create([
                    'product_id' => $product_id,
                    'variant_type' => $variante['variant_type'],
                    'variant_value' => $variante['variant_value'],
                ]);
            }
        }

        /**
         * Insert data into the product sub-variations model
         */
        $product_sub_variante_has_stock = [];
        if ($this->subProductVariates) {
            foreach ($this->subProductVariates as $subProductVariate) {
                $sub_variant_id = ProductSubVariantion::insertGetId([
                    'product_id' => $product_id,
                    'variant' => $subProductVariate['variant'],
                    'price' => $subProductVariate['price']
                ]);

                $product_sub_variante_has_stock[] = $subProductVariate['stock'];

                // If product sub-variant has stock, insert data into product stock
                if ($subProductVariate['stock']) {
                    ProductStock::create([
                        'product_id' => $product_id,
                        'sub_variant_id' => $sub_variant_id,
                        'stock' => $subProductVariate['stock'],
                    ]);
                }
            }
        }

        /**
         * Insert data product stock model
         * Handle the case when there is no sub-variant stock but there is a general stock
         */
        if (empty($product_sub_variante_has_stock) && $this->stock != '') {
            // Assuming you want to create a new stock record
            ProductStock::create([
                'product_id' => $product_id,
                'sub_variant_id' => null,
                'stock' => $this->stock,
            ]);
        }

        // Reset all input fields
        $this->resetInputFields();

        // Trigger a success notification
        return $this->dispatch('toast', message: 'Product created successfully!', notify:'success' );
    }
    public function resetInputFields()    
    {
        $this->reset([
            'name', 'sku', 'code', 'warranty', 'price', 'unit', 'discount', 'discountType', 'stock', 'status', 'tags', 'variantes', 'subProductVariates'
        ]);

        $this->description = '';
        $this->category = '';
        $this->tags = '';
        $this->variantes = '';
        $this->subProductVariates = '';
        dump($this->images);
        
    }
    public function render()
    {
        return view('livewire.backend.product.product-create', [
            'attributes' => Attribute::latest()->get(),
            'categories' => Category::where('status', '1')->latest()->get(),
        ]);
    }
}
