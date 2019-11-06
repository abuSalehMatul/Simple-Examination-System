<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCode extends Model
{
    public function question(){
        return $this->hasMany('App\Question','question_code');
    }
}
