<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Exam extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exams';
    protected $fillable = ['name', 'description'];
}
