<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Survey;
use App\Question;
use App\Answer;
use App\UserSurvey;
use App\UserSurveyAnswer;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Save the user's survey answers.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // grab the survey by id 
        $survey = Survey::find($request->request->get('survey_id', null));
        if(!$survey){
            return;
        }
        // get the survey's questions
        $questions = $survey->questions;
        
        //grab the answers submitted by the user
        $answers = $request->request->get('answers',[]);
        
        $user = \Auth::user();
        //check that count on questions is equal to count of answers sent
        if(count($questions) <> count($answers)){
            return;
        }
        
        // check that each answer submitted is connected to the proper question
        foreach($questions as $key => $question){
            if(!collect($question->answers)->pluck('id')->contains($answers[$key]) ){
                return;
            }
        }
        // save the submitted survey instance
        $user_survey = UserSurvey::create([
            'user_id'=> $user->id,
            'survey_id' => $survey->id
        ]);
        
        // save the survey answers
        foreach($answers as $key => $answer_id){
            UserSurveyAnswer::create([
                'user_id' => $user->id,
                'user_survey_id' => $user_survey->id,
                'survey_id' => $survey->id,
                'question_id' => $questions[$key]->id,
                'answer_id' => $answer_id
            ]);
        }
        // send the user back to the dashboard
        return redirect()->route('dashboard');
    }
}
