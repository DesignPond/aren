@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/prestataire/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Prestataires</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    @if(!$prestataires->isEmpty())

                        <?php
                            $actifs    = $prestataires->reject(function ($item) { return !$item->actif; })->sortBy('nom');
                            $nonactifs = $prestataires->reject(function ($item) { return $item->actif; })->sortBy('nom');
                        ?>

                        <h3>Actifs</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-sm-1">Action</th>
                                <th class="col-sm-3">Prénom</th>
                                <th class="col-sm-3">Nom</th>
                                <th class="col-sm-3">Établissement</th>
                                <th class="col-sm-2">District</th>
                                <th class="col-sm-2">Ville</th>
                                <th class="col-sm-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!$actifs->isEmpty())
                                    @foreach($actifs as $prestataire)
                                        <tr {!! !$prestataire->actif ? 'class="nonactif"' : '' !!}>
                                            <td><a class="btn btn-sky btn-sm" href="{{ url('admin/prestataire/'.$prestataire->id) }}">&Eacute;diter</a></td>
                                            <td><strong>{{ $prestataire->prenom }}</strong></td>
                                            <td><strong>{{ $prestataire->nom }}</strong></td>
                                            <td>{{ $prestataire->etablissement }}</td>
                                            <td>{{ $prestataire->district }}</td>
                                            <td>{{ $prestataire->ville }}</td>
                                            <td class="text-right">
                                                {!! Form::open(array('route' => array('admin.prestataire.destroy', $prestataire->id), 'method' => 'delete')) !!}
                                                    <button data-what="supprimer" data-action="prestataire: {{ $prestataire->name_simple }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <hr/>
                        <h3>Non Actifs</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-sm-1">Action</th>
                                <th class="col-sm-3">Prénom</th>
                                <th class="col-sm-3">Nom</th>
                                <th class="col-sm-3">Établissement</th>
                                <th class="col-sm-2">District</th>
                                <th class="col-sm-2">Ville</th>
                                <th class="col-sm-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$nonactifs->isEmpty())
                                @foreach($nonactifs as $prestataire)
                                    <tr {!! !$prestataire->actif ? 'class="nonactif"' : '' !!}>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/prestataire/'.$prestataire->id) }}">&Eacute;diter</a></td>
                                        <td><strong>{{ $prestataire->prenom }}</strong></td>
                                        <td><strong>{{ $prestataire->nom }}</strong></td>
                                        <td>{{ $prestataire->etablissement }}</td>
                                        <td>{{ $prestataire->district }}</td>
                                        <td>{{ $prestataire->ville }}</td>
                                        <td class="text-right">
                                            {!! Form::open(array('route' => array('admin.prestataire.destroy', $prestataire->id), 'method' => 'delete')) !!}
                                            <button data-what="supprimer" data-action="prestataire: {{ $prestataire->name_simple }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>


                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@stop