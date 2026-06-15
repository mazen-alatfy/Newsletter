<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'image',
        'video',
        'link',
        'position',
        'placement',
        'orientation',
        'is_active',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where(function ($query) {
                         $query->whereNull('start_date')
                               ->orWhere('start_date', '<=', now());
                     })
                     ->where(function ($query) {
                         $query->whereNull('end_date')
                               ->orWhere('end_date', '>=', now());
                     });
    }

}






