<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attribute;

class AttributeSelector extends Component
{
    public $selectedOptions = [];
    public $variante = [];
    public $variantes = [];
    public $explodedVariantes = [];
    public $combinations = [];
    public $subVariantePrice = [];
    public $subVarianteStock = [];
    public $subProductVariates = [];

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
        if (!empty($this->selectedOptions)) {
            foreach ($this->selectedOptions as $value) {
                if (isset($this->variante[$value]) && !empty($this->variante[$value])) {
                    $this->explodedVariantes[$value] = explode(',', $this->variante[$value]);

                    // Check if the variante already exists
                    $variantEntry = [
                        'variant_type' => $value,
                        'variant_value' => $this->variante[$value],
                    ];
                    if (!in_array($variantEntry, $this->variantes, true)) {
                        $this->variantes[] = $variantEntry;
                    }
                } else {
                    // If any option is empty, clear all combinations
                    $this->clearCombinations();
                    return;
                }
            }

            // Generate all combinations of the exploded variants
            $this->combinations = $this->generateCombinations($this->explodedVariantes);
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
        if (!empty($this->combinations)) {
            foreach ($this->combinations as $combination) {
                $key = implode('-', $combination);
                $subVariantePrice = $this->subVariantePrice[$key] ?? '';
                $subVarianteStock = $this->subVarianteStock[$key] ?? 0;

                $entryExists = false;

                foreach ($this->subProductVariates as &$entry) {
                    if ($entry['variant'] === $key) {
                        // Update existing entry
                        $entry['price'] = $subVariantePrice;
                        $entry['stock'] = $subVarianteStock;
                        $entryExists = true;
                        break;
                    }
                }

                if (!$entryExists) {
                    $this->subProductVariates[] = [
                        'variant' => $key,
                        'price' => $subVariantePrice,
                        'stock' => $subVarianteStock,
                    ];
                }
            }
        }
    }

    public function updatedSelectedOptions()
    {
        $this->clearCombinations(); // Clear previous combinations when options change
        $this->add();               // Recalculate combinations based on new options
    }

    public function render()
    {
        return view('livewire.backend.product.attribute-selector', [
            'attributes' => Attribute::latest()->get(),
        ]);
    }
}
