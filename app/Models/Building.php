<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function agent()
    {
        return $this->belongsTo(User::class);
    }
    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
