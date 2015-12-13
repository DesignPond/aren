@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/troncon/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>
    </div>
</div>

@if(!$maps->isEmpty())

    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-midnightblue">
                <div class="panel-heading"><h4><i class="fa fa-tasks"></i> &nbsp;Tronçons</h4></div>
                <div class="panel-body">

                    <?php
                        $troncons = $maps->filter(function ($item) {
                            return $item->type == 'troncon';
                        });
                    ?>

                    @foreach($troncons as $troncon)

                       @include('backend.troncons.partials.carte',['carte' => $troncon])

                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="panel panel-green">
                <div class="panel-heading"><h4><i class="fa fa-tasks"></i> &nbsp;Points de vue</h4></div>
                <div class="panel-body">

                    <?php
                        $pois = $maps->filter(function ($item) {
                            return $item->type == 'poi';
                        });
                    ?>

                    @foreach($pois as $poi)

                        @include('backend.troncons.partials.carte',['carte' => $poi])

                    @endforeach

                </div>
            </div>

        </div>
    </div>

@endif

@stop