<?php

namespace App\Livewire;

use App\Models\Video;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditVideo extends Component
{
    use WithFileUploads;
    public $title, $description, $vidoeId, $new_image, $existing_image_path;
    public function render()
    {
        return view('livewire.edit-video');
    }

    #[On('editVideo')]

    public function editVideo($id)
    {
        $video = Video::find($id);
        $this->vidoeId = $id;
        $this->title = $video->title;
        $this->description = $video->description;
        $this->existing_image_path = $video->videoImage;

        Flux::modal('edit-video')->show();

    }

    public function update_video()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'new_image' => 'nullable|image|max:2048'
        ]);

        $video = Video::find($this->vidoeId);

        if ($this->new_image) {
            if ($video->videoImage && Storage::disk('public')->exists($video->videoImage)) {
                Storage::disk('public')->delete($video->videoImage);
            }
            $imagePath = $this->new_image->store('videos_image', 'public');
            $video->videoImage = $imagePath;
        }

        $video->title = $this->title;
        $video->description = $this->description;

        $video->save();
        Flux::modal('edit-video')->close();
        $this->dispatch('reloadVideos');
    }
}
