<form role="form" method="POST" action="{{ route('save') }}">
    {{ csrf_field() }}
    @foreach($survey->questions as $key => $question)
        <div class="form-group">
           <h4>{{$question->text}}</h4>
            @foreach($question->answers as $answer)
                <div class="radio">
                    <label>
                        <input type="radio" value="{{ $answer->id }}" name="answers[{{ $key }}]"> {{$answer->text}}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
    <input type="hidden" name="survey_id" value="{{ $survey->id }}">                
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>
