@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            @if($survey)
                <h2>Tell me about your day, {{Auth::user()->name}}</h2>
            @else
                <h2>Here were you answers for today, {{Auth::user()->name}}</h2>
                <h3>Come back tomorrow to log your again, {{Auth::user()->name}}</h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            @if($survey)
               @include('components/survey', ['survey' => $survey])
            @else
               @include('components/user_answers', ['answers' => $answers])
            @endif
        </div>
    </div>
</div>
@endsection
