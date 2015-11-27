@if(!$comites->isEmpty())
    <dl id="comite">
        @foreach($comites as $comite)
            @if($comite->tache)
                <dt><h4>{{ $comite->tache }}</h4></dt>
            @else
                <dt><h4>Membre</h4></dt>
            @endif
            <dd><p>{{ $comite->civilite }} {{ $comite->prenom }} {{ $comite->nom }} <p></dd>
        @endforeach
    </dl>
@endif