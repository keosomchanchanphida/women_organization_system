<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content_path',
        'type',
        'major_id'
    ];

    public function images()
    {
        return $this->hasMany(ActivityImage::class);
    }
}
