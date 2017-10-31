<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSurveyAnswer extends Model
{
    protected $guarded = array();
    public $timestamps = false;
    
    
    /**
     * Get the UserSurveyAnswer's User.
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
    /**
     * Get the UserSurveyAnswer's UserSurvey.
     *
     * @return \App\UserSurvey
     */
    public function user_survey()
    {
        return $this->belongsTo(UserSurvey::class, 'id', 'user_survey_id');
    }
    
    /**
     * Get the UserSurveyAnswer's Survey.
     *
     * @return \App\Survey
     */
    public function survey()
    {
        return $this->hasOne(Survey::class, 'id', 'survey_id');
    }
    
    /**
     * Get the UserSurveyAnswer's Question.
     *
     * @return \App\Question
     */
    public function question()
    {
        return $this->hasOne(Question::class, 'id', 'question_id');
    }
    
    /**
     * Get the UserSurveyAnswer's Answer.
     *
     * @return \App\Answer
     */
    public function answer()
    {
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }
}
