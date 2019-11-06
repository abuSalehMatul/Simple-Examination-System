<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{
    public function answer(){
        return $this->hasMany('App\Question','question_id');
    }
    public function option(){
        return $this->belongsTo('App\QuestionCode','question_code');
    }
    public static function save_or_edit($data){
        if($data->edit==0){
            $question=find($data->question_id);
        }
        else{
            $question= new Question;
            $question->save();
        }
    }
}
