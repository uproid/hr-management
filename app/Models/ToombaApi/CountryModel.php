<?php

namespace App\Models\ToombaApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = [
        'id',
        'country_name',
        'region_id'
    ];

}
