<?php

namespace App\Livewire;

use Livewire\Component;

class TagsInput extends Component
{
    public $tags = [];
    public $newTag = '';

    public function addTag()
    {
        try {
            $tag = $this->newTag;
            // Perform validation
            if ($tag !== '' && is_string($tag) && !preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'"\\|,.<>\/?`~]/', $tag)) {
                if (!in_array($tag, $this->tags)) {
                    $this->tags[] = $tag;
                    $this->reset('newTag');
                } else {
                    $this->reset('newTag');
                    return $this->dispatch('toast', message: 'Duplicate tag!', notify: 'error');
                }
            } else {
                $this->reset('newTag');
                return $this->dispatch('toast', message: 'Invalid tag!', notify: 'error');
            }

        } catch (\Throwable $th) {
            //throw $th;
            $this->reset('newTag');
            return $this->dispatch('toast', message: 'An unexpected error occurred!', notify:'error');
        }
    }

    public function removeTag($index)
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags); // Reindex the array
    }


    public function render()
    {
        $this->dispatch('getTags', $this->tags); // Emitting the event with the tags
        return view('livewire.backend.product.tags-input');
    }
}
