<?php

namespace App\Livewire;

use App\Models\Reel;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class EditReel extends Component
{
    public $reels_title, $description, $reelId;
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

        Flux::modal('edit-reel')->show();

    }

    public function update_reel()
    {
        $this->validate([
            'reels_title' => 'required',
            'description' => 'required'
        ]);

        $reel = Reel::find($this->reelId);
        $reel->reels_title = $this->reels_title;
        $reel->description = $this->description;

        $reel->save();
        Flux::modal('edit-reel')->close();
        $this->dispatch('reloadReels');
    }
}
