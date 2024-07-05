<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PostMedia;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;


class Creatpost extends Component
{
    use WithFileUploads;
    public $images;
    public $video;
    public $content;
    public function render()
    {
        return view('livewire.creatpost');
    }

    public function creatpost()
    {
        $this->validate([
            "content" => "required|string",
        ]);

        DB::beginTransaction();
        try {
            // creating post
            $post = Post::create([
                "uuid" => Str::uuid(),
                "user_id" => auth()->id(),
                "content" => $this->content,
            ]);

            $images = [];
            // if post his media
            if ($this->images) {
                foreach ($this->images as $image) {
                    $images[] = $image->store("posts/images", "public");
                }
                PostMedia::create([
                    "post_id" => $post->id,
                    "file_type" => "image",
                    "file" => json_encode($images),
                    "position" => "general",
                ]);
            }


            $video_file_name = "";
            if ($this->video) {
                $video_file_name = $this->video->store("posts/video", "public");
                PostMedia::create([
                    "post_id" => $post->id,
                    "file_type" => "video",
                    "file" => $video_file_name,
                    "position" => "general",
                ]);
            }


            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        unset($this->content);
        unset($this->images);
        unset($this->video);
    }
}
