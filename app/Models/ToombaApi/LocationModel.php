<?php

namespace App\Models\ToombaApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = [
        'id',
        'street_address',
        'postal_code',
        'city',
        'state_province',
        'country_id',
    ];
}
