<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Answer extends Model
{
    public function question(){
        return $this->belongsTo('App\Question','question_id');
    }
}
