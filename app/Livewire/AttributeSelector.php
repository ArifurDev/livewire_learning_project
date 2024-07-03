<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attribute;

class AttributeSelector extends Component
{ 

    public $selectedOptions = [];
    public $variante = [];
    // Store data in arrays
    public $variantes = [];


    // Arrays to hold exploded values
    public $explodedVariantes = [];
    public $combinations = [];

    public $subVariante = [];
    public $subVarianteStock = [];

    public $subProductVariates = [];

    public function clearCombinations()
    {
        $this->explodedVariantes = [];
        $this->combinations = [];
        $this->subVariante = [];
        $this->subVarianteStock = [];
        $this->subProductVariates = [];
    }

    public function add()
    {
        // Loop through selected options and explode respective variant and stock values
        foreach ($this->selectedOptions as $index => $value) {
                if (isset($this->variante[$value]) && !empty($this->variante[$value])) {
                    $this->explodedVariantes[$value] = explode(',', $this->variante[$value]);
                    // Store variantes
                    $this->variantes[] = [
                        'attribute' => $value,
                        'variant' => $this->variante[$value] ?? '0',
                        ];
                }else{
                   // If any option is empty, clear all combinations
                    $this->clearCombinations();
                    return; // Exit early since combinations are cleared
                }
            }

        // Generate all combinations of the exploded variants
        $this->combinations = $this->generateCombinations($this->explodedVariantes);
    }


    public function generateCombinations($arrays)
    {
        $result = [[]];

        foreach ($arrays as $property => $propertyValues) {
            $temp = [];
            foreach ($result as $resultItem) {
                foreach ($propertyValues as $propertyValue) {
                    $temp[] = array_merge($resultItem, [$property => $propertyValue]);
                }
            }
            $result = $temp;
        }

        return $result;
    }
    
    public function subVariater()
    {
        foreach ($this->combinations as $combination) {
            $key = implode('-', $combination);
            $subVariante = $this->subVariante[$key] ?? '';
            $subVarianteStock = $this->subVarianteStock[$key] ?? 0;

            $decodedCombination = json_decode(json_encode($combination), true); 

            foreach ($decodedCombination as $attributeKey => $attributeValue) {
                $sub_attribute = strtolower($attributeKey); 
                $sub_variant = $attributeValue; 
            }
                $this->subProductVariates[] = [
                    'sub_attribure' => $sub_attribute,
                    'sub_variante' => $sub_variant,
                    'sub_variante_price' => $subVariante,
                    'sub_variante_stock' => $subVarianteStock,
                ];   
            }    
    }

    public function render()
    {
        return view('livewire.backend.product.attribute-selector',[
            'attributes' => Attribute::latest()->get(),
        ]);
    }
}

