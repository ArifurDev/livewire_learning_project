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

    public $subVariantePrice = []; //inputs filds 
    public $subVarianteStock = []; //inputs filds 

    public $subProductVariates = []; //empty array

    public function clearCombinations()
    {
        $this->explodedVariantes = [];
        $this->combinations = [];
        $this->subVariantePrice = [];
        $this->subVarianteStock = [];
        $this->subProductVariates = [];
        $this->variantes = [];
        $this->variante = [];
    }

    public function add()
    {
        try {
            if (!empty($this->selectedOptions)) {
                // Loop through selected options and explode respective variant and stock values
                foreach ($this->selectedOptions as $index => $value) {
                    if (isset($this->variante[$value]) && !empty($this->variante[$value])) {
                        $this->explodedVariantes[$value] = explode(',', $this->variante[$value]);

                        // Check if the variante already exists
                        $variantEntry = [
                            'variant_type' => $value,
                            'variant_value' => $this->variante[$value] ?? '0',
                        ];
                        if (!in_array($variantEntry, $this->variantes, true)) {
                            // Store variantes if it's not already in the array
                            $this->variantes[] = $variantEntry;
                        }

                    } else {
                        // If any option is empty, clear all combinations
                        $this->clearCombinations();
                        return; // Exit early since combinations are cleared
                    }
                }

                // Generate all combinations of the exploded variants
                $this->combinations = $this->generateCombinations($this->explodedVariantes);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return $this->dispatch('toast', message: 'An unexpected error occurred!', notify: 'error');
        }
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
        try {
            if (!empty($this->combinations)) {
                foreach ($this->combinations as $combination) {
                    $key = implode('-', $combination);
                    $subVariantePrice = $this->subVariantePrice[$key] ?? '';
                    $subVarianteStock = $this->subVarianteStock[$key] ?? 0;

                    $entryExists = false;

                    // Check if an entry with the same key already exists
                    foreach ($this->subProductVariates as &$entry) {
                        if ($entry['variant'] === $key) {
                            // Update existing entry
                            $entry['price'] = $subVariantePrice;
                            $entry['stock'] = $subVarianteStock;
                            $entryExists = true;
                            break;
                        }
                    }
    
                    // If the entry does not exist, add a new one
                    if (!$entryExists) {
                        $this->subProductVariates[] = [
                            'variant' => $key,
                            'price' => $subVariantePrice,
                            'stock' => $subVarianteStock,
                        ];
                    }

                    // $decodedCombination = json_decode(json_encode($combination), true);

                    // foreach ($decodedCombination as $attributeKey => $attributeValue) {
                    //     $sub_attribute = strtolower($attributeKey);
                    //     $sub_variant = $attributeValue;

                        // Check if the variante already exists
                        // $subVariantEntry = [
                        //     'sub_attribure' => $sub_attribute,
                        //     'sub_variante' => $sub_variant,
                        //     'sub_variante_price' => $subVariante,
                        //     'sub_variante_stock' => $subVarianteStock,
                        // ];
                        // if (!in_array($subVariantEntry, $this->subProductVariates, true)) {
                        //     // Store variantes if it's not already in the array
                        //     $this->subProductVariates[] = $subVariantEntry;
                        // }

                        // $this->subProductVariates[] = [
                        //     'sub_attribure' => $sub_attribute,
                        //     'sub_variante' => $sub_variant,
                        //     'sub_variante_price' => $subVariante,
                        //     'sub_variante_stock' => $subVarianteStock,
                        // ];
                    // }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->dispatch('toast', message: 'An unexpected error occurred!', notify: 'error');
        }
    }

    public function render()
    {
        //call method
        $this->add();
        $this->subVariater();

        $this->dispatch('getVariantes', $this->variantes); // Emitting the event with the variantes
        $this->dispatch('getSubVariantes', $this->subProductVariates); // Emitting the event with the subProductVariates

        return view('livewire.backend.product.attribute-selector', [
            'attributes' => Attribute::latest()->get(),
        ]);
    }
}

