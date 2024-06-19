<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "countries";
    public $fillable = ['name', 'description', 'is_active', 'deleted_at'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
