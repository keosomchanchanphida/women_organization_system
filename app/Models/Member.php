<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'date_of_birth',
        'date_joined_women_union',
        'date_joined_youth_union',
        'date_joined_trade_union',
        'date_joined_political_party',
        'place_of_birth_id',
        'living_place_id',
        'tribe_id',
        'religious_id',
        'marjor_id',
        'education_id',
        'career_id',
        'state_position_id',
        'political_position_id',
        'graduated_place_id',
        'status_id',
        'phone_number',
        'duty_id'
    ];

    public function placeOfBirth()
    {
        return $this->belongsTo(Village::class, 'place_of_birth_id');
    }

    public function livingPlace()
    {
        return $this->belongsTo(Village::class, 'living_place_id');
    }

    public function tribe()
    {
        return $this->belongsTo(Tribe::class);
    }

    public function religious()
    {
        return $this->belongsTo(Religious::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function statePosition()
    {
        return $this->belongsTo(StatePosition::class);
    }

    public function politicalPosition()
    {
        return $this->belongsTo(PoliticalPosition::class);
    }

    public function graduatedPlace()
    {
        return $this->belongsTo(GraduatedPlace::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function duty()
    {
        return $this->belongsTo(Duty::class);
    }
}
