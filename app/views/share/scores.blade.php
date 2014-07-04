    @if(isset($scores))
        <div class="row">
            <ul id="matchs_timeline">
            @foreach($scores as $score)
                <li id="match2" class="completed">
                    <div class="team-a"><img src="/ui/img/flags/x32/{{strtolower($score->team_a->country_code)}}.png" alt="{{$score->team_a->name}}" /></div>
                    <div class="match-score">{{$score->score_a}} - {{$score->score_b}}</div>
                    <div class="team-b"><img src="/ui/img/flags/x32/{{strtolower($score->team_b->country_code)}}.png" alt="{{$score->team_b->name}}" /></div>
                </li>
            @endforeach
            </ul>
        </div>
    @endif