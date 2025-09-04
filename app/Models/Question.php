<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Question extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'questions';
    protected $fillable = ['exam_id', 'question_text', 'options', 'correct_answer'];
}
