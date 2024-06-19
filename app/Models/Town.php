<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
    use HasFactory, SoftDeletes;
    public $table = "towns";
    public $fillable = ['country_id', 'state_id', 'district_id', 'name', 'description', 'is_active', 'deleted_at'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }
}
