@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    @if($participant)

        <?php $tables_participant = $participant->prestations->groupBy('table_id'); ?>

        <div class="fivecol">

            <h1>Prestataire</h1>
            <h2>{{ $participant->etablissement }}</h2>

            <article class="activites prestation">
                <div class="icon"><img src="{{ asset('frontend/images/icons/pin.png') }}" alt="itinéraires équestres" /></div>
                <h4>{!! $participant->name_simple !!}</h4>
                <p>
                    {{ $participant->rue }}<br/>
                    {{ $participant->npa }} {{ $participant->ville }}<br/>
                    Tél. {{ $participant->telephone }}<br/>
                    <?php echo ( $participant->mobile != '' ? 'Mobile. '.$participant->mobile.'<br/>' : '' ); ?>
                    <a href="mailto:{{ $participant->email }}">{{ $participant->email }}</a><br/>
                    <?php echo ($participant->web != '' ? '<a href="'.$participant->web.'">'.$participant->web.'</a>' : ''); ?>
                </p>
            </article>
        </div>
        <div class="sevencol last">

            <div class="map-wrapper">
                <div id="map_canvas_main" style="height: 400px;"></div>
            </div>

            <script>
                var canvas     = document.getElementById('map_canvas_main');
                var latlng     = new google.maps.LatLng(<?php echo $participant->map->latitude; ?> ,<?php echo $participant->map->longitude; ?>);
                var mapOptions = {zoom : 14, center: latlng};
                var map        = new google.maps.Map(canvas, mapOptions);
            </script>

            @include('frontend.partials.carte')

        </div>
        <hr/><p><a href="{{ url('prestataires') }}"> &lt;&lt; Retour à la liste</a></p><hr/>

        <!-- Tables -->
        @if(!empty($tables))
            @foreach($tables as $table)
                <h4 class="pour {{ $table->icon }} marge">{{ $table->titre }}</h4>
                <div class="tableau">
                    <div>
                        <h3 class="icon"></h3>

                        @if(in_array('option_id', $tables_options[$table->id]))
                            <p><strong>Disponible</strong></p>
                        @endif

                        @if(in_array('places', $tables_options[$table->id]))
                            <p><strong>Nombre places</strong></p>
                        @endif

                        @if(in_array('prix', $tables_options[$table->id]))
                            <p><strong>Prix</strong></p>
                        @endif

                        @if(in_array('remarque', $tables_options[$table->id]))
                            <p><strong>Remarque</strong></p>
                        @endif

                    </div>

                    @if(isset($tables_participant[$table->id]))
                        @foreach($tables_participant[$table->id] as $row)
                            <?php $row->load('option','titre'); ?>
                            <div>
                                <h3>{{ $row->titre->titre }}</h3>

                                @if(in_array('option_id', $tables_options[$table->id]))
                                    <p>{{  $row->option ? $row->option->titre  : '' }}</p>
                                @endif

                                @if(in_array('places', $tables_options[$table->id]))
                                    <p>{{  $row->places > 0 ? $row->places  : '-' }}</p>
                                @endif

                                @if(in_array('prix', $tables_options[$table->id]))
                                    <p>{{  $row->prix > 0 ? $row->prix.' CHF'  : '-' }}</p>
                                @endif

                                @if(in_array('remarque', $tables_options[$table->id]))
                                    <p>{!! ($row->remarque != '' ? $row->remarque : '-') !!}</p>
                                @endif

                            </div>
                        @endforeach
                    @endif

                </div>
            @endforeach
        @endif
        <!-- End Tables -->

        <!-- remarques -->
        <div>
            <?php $types = $participant->types->lists('id')->all(); ?>
            @if(in_array(4,$types) && !$participant->remarques->isEmpty())
                <article class="activites prestation">
                    <div class="icon"><img src="{{ asset('frontend/images/icons/home.png') }}" alt="Hébergements" /></div>
                    <h4>Aux alentours</h4>
                    @foreach($participant->remarques as $remarques)
                        <div class="remarques">{!! $remarques->texte !!}</div>
                    @endforeach
                </article>
            @endif
        </div>
        <!-- end remarques -->

    @endif

</section>
@stop