<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        "uuid",
        "user_id", 
        "content",
        "status",
        "likes",
        "comments",
        "is_page_post",
        "page_id",
        "is_group_post",
        "group_id",
    ];
     /**
     * Pegar o usuário que possui a história
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post() : BelongsTo {
        
        return $this->belongsTo(Post::class, 'post_id');
    }

     /**
     * Pegar o grupo que possui a publicação
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group() : BelongsTo {
        
        return $this->belongsTo(Group::class, 'group_id');
    }

      /**
     * Pegar a página que possui a publicação
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page() : BelongsTo {
        
        return $this->belongsTo(Page::class, 'page_id');
    }
}
