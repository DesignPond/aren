@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1>Liste des prestataires</h1>

    @if(!$prestataires->isEmpty())
        <?php $districts = $prestataires->sortBy('district')->groupBy('district'); ?>
        @foreach($districts as $nom => $district)

            <hr/><h2 class="district">{{ $nom }}</h2>
            <?php $i = 1; ?>
            @foreach($district as $item)
                <article class="prestataire">
                    <span><img src="{{ asset('frontend/images/icons/bigPin.png') }}" alt="Manège" /></span>
                    <div>
                        <h1>{{ $item->ville }}</h1>
                        <h2><a href="{{ url('participant/'.$item->id) }}">{{ $item->barn_title }}</a></h2>
                        {!! $item->name_title !!}
                    </div>
                    <p class="numero">n° {{ $item->noParticipant }}</p>
                </article>
                <?php echo ($i%3 == 0 ? '<div class="clearfix"></div>' : ''); ?>
                <?php $i++; ?>
            @endforeach

        @endforeach
    @endif

</section>
@stop