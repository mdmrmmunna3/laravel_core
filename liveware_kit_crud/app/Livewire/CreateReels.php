<?php

namespace App\Livewire;

use App\Models\Reel;
use Flux\Flux;
use Livewire\Component;

class CreateReels extends Component
{
    public $reels_title, $description;
    public function render()
    {
        return view('livewire.create-reels');
    }

    public function created_reel()
    {
        $this->validate([
            'reels_title' => 'required',
            'description' => 'required'
        ]);
        // dd($this->description);

        Reel::create([
            'reels_title' => $this->reels_title,
            'description' => $this->description
        ]);

        $this->resetReelForm();
        session()->flash('message', 'Reel created successfully!');
        Flux::modal('create-reel')->close();

        $this->dispatch('reloadReels');
    }

    public function resetReelForm()
    {
        $this->reset(['reels_title', 'description']);
    }
}
