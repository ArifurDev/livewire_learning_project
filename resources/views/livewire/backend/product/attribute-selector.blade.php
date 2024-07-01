<div>
    <div class="form-group" wire:ignore>
            <label for="options">Select Attributes:</label>
            <select class="form-control mb-3 js-example-basic-multiple" multiple id="options">
                @foreach ($attributes as $attribute)
                    <option value="{{ $attribute->name }}">{{ $attribute->name }}</option>
                @endforeach
            </select>
    </div>

    @foreach ($selectedOptions as $index => $value)
        <div class="row">
            <div class="col-md-4">
                <div class="form-group ">
                    <span  class="form-control">{{ $value }}</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group ">
                    <input type="text" class="form-control product-variante-inpute" placeholder="Enter product Variante" wire:model.lazy="variante.{{ $value }}" wire:keydown.enter.prevent="add">
                </div>
            </div>
        </div>
    @endforeach
    <div>
            @foreach($combinations as $combination)
                <div class="row mb-2 p-1" wire:key="{{ implode('-', $combination) }}">
                    <div class="col-md-3">
                        <div class="form-group">
                            <span class="form-control">
                                @foreach($combination as $attribute => $value)
                                    @if (!$loop->first) - @endif
                                    {{ $value }}
                                @endforeach
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter product price" wire:model.lazy="subVariante.{{ implode('-', $combination) }}" wire:keydown.enter.prevent="subVariater">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" min="0" class="form-control" placeholder="stock" wire:model.lazy="subVarianteStock.{{ implode('-', $combination) }}">
                        </div>
                    </div>
                </div>
            @endforeach
    </div>




</div>


@script

<script>
    $(document).ready(function() {
        $('#options').on('change', function(e) {
            let selectedValues = $(this).val();
            $wire.$set('selectedOptions', selectedValues);
        });

    });
</script>

@endscript

