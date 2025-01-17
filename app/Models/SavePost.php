<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavePost extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "post_id",

    ];

    /**
     * Pegar o usuário que possui a história
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo {
        
        return $this->belongsTo(User::class, 'user_id');
    }
}
