{{-- <div class="custom-control custom-switch custom-switch-color">
    <input type="checkbox" class="custom-control-input bg-success" id="customSwitch" wire:click="toggle" @if($fieldValue) checked @endif>
    <label class="custom-control-label" for="customSwitch"></label>
</div> --}}

<div>
    <input type="checkbox" wire:click="toggle" @if($fieldValue) checked @endif>
</div>


{{-- <div class="custom-control custom-switch custom-switch-color">
    <input type="checkbox" wire:click="toggle" @if($fieldValue) checked @endif>
</div> --}}

