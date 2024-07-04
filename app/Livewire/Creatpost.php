<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class Creatpost extends Component
{
    public $content;
    public function render()
    {
        return view('livewire.creatpost');
    }

    public function creatpost()
    {
        $this->validate([
            "content" => "required|string"
        ]);
        //creating post
        echo "tas bom rato";
        Post::create([
            "uuid" => Str::uuid(),
            "user_id" => auth()->id(),
            "content" => $this->content

        ]);
        unset($this->content);
        $this->dispatchBrowserEvent('alert', [
            "type" => "success", "message" => "your post will be published shortly."
        ]);
    }
}
