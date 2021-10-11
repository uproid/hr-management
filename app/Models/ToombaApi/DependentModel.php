<?php

namespace App\Models\ToombaApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependentModel extends Model
{
    use HasFactory;
    protected $table = 'dependents';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'relationship',
        'employee_id',
    ];
}
