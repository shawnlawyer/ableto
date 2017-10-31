<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    public $timestamps = false;
    
    /**
     * Get the Question's Survey.
     *
     * @return \App\Survey
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'id', 'survey_id');
    }
    
    /**
     * Get the Question's Answers.
     *
     * @return array \App\Answer
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
    
}
