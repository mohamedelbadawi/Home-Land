<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $fillable = ['name', 'emoji'];
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function buildings()
    {
        return $this->hasMany(Building::class);
    }
}
