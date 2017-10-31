<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Survey;
use App\UserSurvey;

class DashboardController extends Controller
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
     * Show the logged in user application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey = $answers = false;
        $user_survey = UserSurvey::where('user_id',\Auth::user()->id)
            ->whereBetween('created_at', [\Carbon\Carbon::today(), \Carbon\Carbon::now()])
            ->first();
        
        if(!$user_survey){
            $survey = Survey::where('name', 'daily')->first();
        }else{
            $answers = $user_survey->answers;
        }
        
        return view('dashboard', ['survey' => $survey, 'answers' => $answers]);
    }
}
