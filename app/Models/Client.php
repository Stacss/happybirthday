<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'city_id', 'birthdate',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
