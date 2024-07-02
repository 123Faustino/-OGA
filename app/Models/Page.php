<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany; 

class Page extends Model
{
    use HasFactory;
    protected $fillable=[
        "uuid",
        "user_id", 
        "icon",
        "thumbnail",
        "description",
        "name",
        "location",
        "type",
        "members",
        "is_private",
    ];
     /**
     * Pegar a página que possui a publicação
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page() : BelongsTo {
        
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Pegar a página que possui a publicação
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany     */
    public function posts() : HasMany {
        
        return $this->hasMany(Post::class);
    }

    
}
