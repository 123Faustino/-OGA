<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        "post_id",
        "user_id",
        "comment",
        "status",
    ];
    /**
     * ....
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo {
        
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * ....
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post() : BelongsTo {
        
        return $this->belongsTo(Post::class);
    }


}
