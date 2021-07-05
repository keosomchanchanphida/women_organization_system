<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'educations';
    protected $fillable = [
        'id',
        'level'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
