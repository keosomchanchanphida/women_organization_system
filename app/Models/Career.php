<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'career'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
