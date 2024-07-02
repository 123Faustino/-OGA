<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PageLike extends Model
{
    use HasFactory;
    protected $fillable=[
        "page_id",
        "user_id",
    ];
     /**
     * Pegar a página que possui a publicação
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page() : BelongsTo {
        
        return $this->belongsTo(Page::class, 'page_id');
    }

     /**
     * Pegar o usuário que gostou da página
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo {
        
        return $this->belongsTo(User::class, 'user_id');
    }
}
