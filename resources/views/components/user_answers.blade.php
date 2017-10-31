@foreach($answers as $answer)
    <div>
        <h3>Q: {{$answer->question->text}}</h3>
        <h3>A: {{$answer->answer->text}}</h3>
    </div>
@endforeach