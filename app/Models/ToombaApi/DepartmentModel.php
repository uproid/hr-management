<?php

namespace App\Models\ToombaApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'id',
        'department_name',
        'location_id',
    ];
}
