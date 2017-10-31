<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    protected $guarded = [];
    
    /**
     * Get the UserSurvey's User.
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    
    /**
     * Get the UserSurvey's Survey.
     *
     * @return \App\Survey
     */
    public function survey()
    {
        return $this->hasOne(Survey::class, 'id', 'survey_id');
    }
    
    /**
     * Get the UserSurvey's UserSurveyAnswers.
     *
     * @return array \App\UserSurveyAnswer
     */
    public function answers()
    {
        return $this->hasMany(UserSurveyAnswer::class, 'user_survey_id', 'id');
    }
}
