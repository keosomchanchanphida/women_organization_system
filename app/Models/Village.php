<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function membersBorned()
    {
        return $this->hasMany(Member::class, 'place_of_birth_id');
    }

    public function membersLiving()
    {
        return $this->hasMany(Member::class, 'living_place_id');
    }
}
