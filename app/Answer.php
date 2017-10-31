<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    
    public $timestamps = false;
    
     /**
     * Get the Answer's Survey.
     *
     * @return \App\Survey
     */
    public function survey()
    {
        return $this->hasOne(Survey::class, 'id', 'survey_id');
    }
    
     /**
     * Get the Answer's Question.
     *
     * @return \App\Question
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'id', 'question_id');
    }
    
}
