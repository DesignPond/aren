@extends('frontend.layouts.master')
@section('content')

<div class="sevencol">
    <h1>Bienvenue sur le site de l’aren</h1>

    <h2> {!! $page->title !!}</h2>
    {!! $page->content !!}

    <p class="infoLien"><a href="{{ url('site/presentation') }}"><span></span>En savoir plus</a></p>
</div>
<div class="fivecol last polaroids">
    <p class="etiquette">
        Venez nous soutenir en devenant membre de l’AREN !
        <span class="tape"></span>
        <span class="shadow"></span></p>
    <p class="pola01">
        <img src="{{ asset('frontend/images/pola01.jpg') }}" alt="itinéraires équestres" />
        <span class="tape"></span>
        <span class="shadow"></span>
    </p>
    <p class="pola02">
        <img src="{{ asset('frontend/images/pola02.jpg') }}" alt="Discussion" />
        <span class="tape"></span>
        <span class="shadow"></span>
    </p>
</div>

<hr/>

<p class="spacer"></p>

    <div class="sevencol">

        <h3>Découvrez nos activités</h3>

        @if(!$blocs->isEmpty())
            <?php $i = 1; ?>
            @foreach($blocs as $bloc)
                <article class="activites {{ $i%2 == 0 ? 'last' : '' }}">
                    <div class="icon"><img src="{{ asset('frontend/images/icons/'.$bloc->type) }}" alt="{{ $bloc->titre }}" /></div>
                    <h4>{{ $bloc->titre }}</h4>
                    {!! $bloc->contenu !!}
                </article>
                {!! $i%2 == 0 ? '<hr/>' : '' !!}

                <?php $i++; ?>
            @endforeach
        @endif

    </div>
    <div class="fivecol last">

        <h3>Découvrez un nouveau prestataire</h3>
        <p class="location"><strong>{{ $participant->barn_title }}</strong></p>
        <div class="map-wrapper">
            {{--<div id="map-canvas" data-latitude="47.012724" data-longitude="6.731005" data-zoom="10" style="height: 230px;"></div>--}}
            <div id="map-canvas" data-latitude="{{ $participant->map->latitude  }}" data-longitude="{{ $participant->map->longitude  }}" data-zoom="14" style="height: 230px;"></div>
        </div>

    </div>
    <hr/>

@stop