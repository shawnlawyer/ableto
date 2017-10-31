<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    
    /**
     * Get the Survey's Questions.
     *
     * @return array \App\Question
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'survey_id');
    }
    
    /**
     * Get the Survey's Answers.
     *
     * @return array \App\Answer
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'survey_id');
    }
}
