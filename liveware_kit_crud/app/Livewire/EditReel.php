<?php

namespace App\Livewire;

use App\Models\Reel;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditReel extends Component
{
    use WithFileUploads;
    public $reels_title, $description, $reelId, $newImage, $extstingImage;
    public function render()
    {
        return view('livewire.edit-reel');
    }

    #[On('reelEdit')]
    public function reelEdit($id)
    {
        $reel = Reel::find($id);
        $this->reelId = $id;
        $this->reels_title = $reel->reels_title;
        $this->description = $reel->description;
        $this->extstingImage = $reel->image_path;

        Flux::modal('edit-reel')->show();

    }

    public function update_reel()
    {
        $this->validate([
            'reels_title' => 'required',
            'description' => 'required',
            'newImage' => 'nullable|image|max:2048'
        ]);

        $reel = Reel::find($this->reelId);
        if ($this->newImage) {
            if ($reel->image_path && Storage::disk('public')->exists($reel->image_path)) {
                Storage::disk('public')->delete($reel->image_path);
            }
            $imagePath = $this->newImage->store('reels_image', 'public');
            $reel->image_path = $imagePath;
        }
        $reel->reels_title = $this->reels_title;
        $reel->description = $this->description;

        $reel->save();
        Flux::modal('edit-reel')->close();
        $this->dispatch('reloadReels');
    }
}
