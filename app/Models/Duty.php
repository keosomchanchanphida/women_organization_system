<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;

    protected $table = 'member_duties';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'duty'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
