<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class comment extends Model
{
    use HasFactory, SoftDeletes;
        /**
        * The attributes that are mass assignable.
        *
        * @var list<string>
        */
        protected $fillable = [
            'content',
            'user_id',
            'post_id',
            'is_active',
        ];
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    
       
        public function post(): BelongsTo
        {
            return $this->belongsTo(Post::class);
        }
}
