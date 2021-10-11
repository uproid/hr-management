<?php

namespace App\Models\ToombaApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobModel extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'id',
        'job_title',
        'min_salary',
        'max_salary',
    ];
}
