<?php

namespace App\Livewire;

use App\Models\Reel;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateReels extends Component
{
    use WithFileUploads;
    public $reels_title, $description, $image_path;
    public function render()
    {
        return view('livewire.create-reels');
    }

    public function created_reel()
    {
        $this->validate([
            'reels_title' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|image|max:2048'
        ]);
        // dd($this->description);

        $imagePath = null;
        if ($this->image_path) {
            $imagePath = $this->image_path->store('reels_image', 'public');
        }

        Reel::create([
            'reels_title' => $this->reels_title,
            'description' => $this->description,
            'image_path' => $imagePath
        ]);

        $this->resetReelForm();
        session()->flash('message', 'Reel created successfully!');
        Flux::modal('create-reel')->close();

        $this->dispatch('reloadReels');
    }

    public function resetReelForm()
    {
        $this->reset(['reels_title', 'description', 'image_path']);
    }
}
