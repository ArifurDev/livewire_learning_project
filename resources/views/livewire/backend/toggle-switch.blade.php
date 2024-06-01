{{-- <div>
    <input type="checkbox" wire:model="model.{{ $field }}" wire:click="toggle"
        @if ($model->{$field}) checked @endif>
</div> --}}


{{-- <div class="custom-control custom-switch custom-switch-color">
        <input type="checkbox" class="custom-control-input bg-success" wire:model="model.{{ $field }}" wire:click="toggle"  @if ($model->{$field}) checked @endif>
        <label class="custom-control-label" for="customSwitch{{ $categorie->id }}"></label>
</div> --}}
<div>
    <input type="checkbox" wire:click="toggle" @if($field) checked @endif>
</div>
