<?php

namespace App\Models\ToombaApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'manager_id',
        'department_id',
    ];
}
