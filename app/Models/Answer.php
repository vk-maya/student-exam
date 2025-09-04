<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Answer extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'answers';
    protected $fillable = ['student_id','exam_id','question_id','selected_option'];
}
