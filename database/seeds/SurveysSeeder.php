<?php

use Illuminate\Database\Seeder;
use App\Survey;
use App\Question;
use App\Answer;

class SurveysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(config('surveys'))->each(function($survey) {
            $survey_model = Survey::create([
                "name" => $survey->name,
            ]);
            collect($survey->questions)->each(function($question) use (&$survey_model) {
                $question_model = Question::create([
                    "survey_id" => $survey_model->id,
                    "text" => $question->text,
                ]);
                collect($question->answers)->each(function($answer) use (&$survey_model, &$question_model) {
                    $answer_model = Answer::create([
                        "survey_id" => $survey_model->id,
                        "question_id" => $question_model->id,
                        "text" => $answer->text,
                    ]);
                });
            });
        });
    }
}
