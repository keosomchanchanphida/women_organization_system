<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatePosition extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'position'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
