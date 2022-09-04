<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class City extends Model
{
    use HasFactory;
    public $fillable = ['name', 'country_id'];

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
    public function Buildings()
    {
        return $this->hasMany(Building::class);
    }
}
