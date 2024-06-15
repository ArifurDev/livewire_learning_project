<div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Add a tag"
        wire:model="newTag"
        wire:keydown.enter.prevent="addTag">
        <button class="btn btn-primary" type="button" wire:click="addTag">Add</button>
    </div>

    <div class="mb-3">
        <div class="d-flex flex-wrap gap-2">
            @if ($tags)
              Tags:
            @endif
            @foreach($tags as $index => $tag)
                <span class="badge bg-secondary d-flex align-items-center ml-1">
                    {{ $tag }}
                    <button type="button" class="btn-close m-2" aria-label="Close" wire:click="removeTag({{ $index }})"></button>
                </span>
            @endforeach
        </div>
    </div>
</div>
