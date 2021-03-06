<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
