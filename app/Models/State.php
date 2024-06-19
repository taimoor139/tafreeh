<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $table = "states";
    public $fillable = ['country_id', 'name', 'description', 'is_active', 'deleted_at'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
