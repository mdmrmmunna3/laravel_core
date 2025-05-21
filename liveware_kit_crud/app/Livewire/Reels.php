<?php

namespace App\Livewire;

use App\Models\Reel;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;


class Reels extends Component
{
    public $reels, $reelId;
    public function render()
    {
        return view('livewire.reels');
    }

    public function mount()
    {
        $this->reels = Reel::all();
    }

    #[On('reloadReels')]
    public function reloadReels()
    {
        $this->reels = Reel::all();
    }

    public function edit($id)
    {
        // dd('editReel', $id);
        $this->dispatch('reelEdit', $id);
    }

    public function delete($id)
    {
        // dd($id);
        $this->reelId = $id;
        Flux::modal('delete-reel')->show();
    }

    public function destroy_reel()
    {
        Reel::find($this->reelId)->delete();
        Flux::modal('delete-reel')->close();
        $this->dispatch('reloadReels');
    }
}
