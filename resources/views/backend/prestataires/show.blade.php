@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/prestataire') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>

@if (!empty($prestataire) )

    <!-- start row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-midnightblue">
                <form action="{{ url('admin/prestataire/'.$prestataire->id) }}" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                    <input type="hidden" name="_method" value="PUT">
                    {!! csrf_field() !!}

                    <div class="panel-heading">
                        <h4>&Eacute;diter {{ $prestataire->name_simple }}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">N° Participant</label>
                                <div class="col-sm-2">
                                    {!! Form::text('noParticipant', $prestataire->noParticipant , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Actif</label>
                                <div class="col-sm-5">
                                    <label class="radio-inline">
                                        <input type="radio" value="1" {{ $prestataire->actif ? 'checked' : '' }} name="actif"> Oui
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" {{ !$prestataire->actif ? 'checked' : '' }} name="actif"> Non
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Établissement</label>
                                <div class="col-sm-9">
                                    {!! Form::text('etablissement', $prestataire->etablissement , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Civilité</label>
                                <div class="col-sm-9">
                                    {!! Form::text('civilite', $prestataire->civilite , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Prénom</label>
                                <div class="col-sm-9">
                                    {!! Form::text('prenom', $prestataire->prenom , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Nom</label>
                                <div class="col-sm-9">
                                    {!! Form::text('nom', $prestataire->nom , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Rue</label>
                                <div class="col-sm-9">
                                    {!! Form::text('rue', $prestataire->rue , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">NPA/Ville</label>
                                <div class="col-sm-3">
                                    {!! Form::text('npa', $prestataire->npa , array('class' => 'form-control required') ) !!}
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::text('ville', $prestataire->ville , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">District</label>
                                <div class="col-sm-9">
                                    {!! Form::text('district', $prestataire->district , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Téléphone</label>
                                <div class="col-sm-9">
                                    {!! Form::text('telephone', $prestataire->telephone , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Mobile</label>
                                <div class="col-sm-9">
                                    {!! Form::text('mobile', $prestataire->mobile , array('class' => 'form-control') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Fax</label>
                                <div class="col-sm-9">
                                    {!! Form::text('fax', $prestataire->fax , array('class' => 'form-control') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">E-mail</label>
                                <div class="col-sm-9">
                                    {!! Form::text('email', $prestataire->email , array('class' => 'form-control required') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Site web</label>
                                <div class="col-sm-9">
                                    {!! Form::text('web', $prestataire->web , array('class' => 'form-control') ) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Coordonnées</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Lat.</span>
                                        <input type="text" class="form-control" value="{{ ($prestataire->map ? $prestataire->map->latitude : '') }}" name="map[latitude]">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Lon.</span>
                                        <input type="text" class="form-control" value="{{ ($prestataire->map ? $prestataire->map->longitude : '') }}" name="map[longitude]">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="col-sm-3"> {!! Form::hidden('id', $prestataire->id ) !!}</div>
                        <div class="col-sm-9 text-right"><button class="btn btn-primary" type="submit">Envoyer</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

    <?php $tables_participant = $prestataire->prestations->groupBy('table_id'); ?>

    <!-- Tables -->
    @if(!empty($tables))
        <?php $cols = $tables->chunk(2); ?>

        @foreach($cols as $col)
            <div class="row"><!-- row -->
                @foreach($col as $table)
                    <div class="col-md-6"><!-- col -->
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <h3>{{ $table->titre }} <a class="btn btn-primary btn-sm pull-right" data-toggle="collapse" href="#addPrestation_{{ $table->id }}">Ajouter</a></h3>
                            <table class="table">
                                <thead>
                                    <th>Titre</th><th>Disponible</th><th>Prix</th><th>Places</th><th>Remarque</th><th></th>
                                </thead>
                                <tbody>
                                    @if(isset($tables_participant[$table->id]))
                                        @foreach($tables_participant[$table->id] as $row)
                                            <tr>
                                                <?php $row->load('option','titre'); ?>
                                                <td><strong class="text-info">{{ $row->titre->titre }}</strong></td>
                                                <td>{{ isset($row->option) ? $row->option->titre : '' }}</td>
                                                <td>{{ $row->prix   ? $row->prix.' CHF' : '' }}</td>
                                                <td>{{ $row->places ? $row->places : '' }}</td>
                                                <td>{!! ($row->remarque != '' ? $row->remarque : '-') !!}</td>
                                                <td class="text-right">
                                                    {!! Form::open(array('route' => array('admin.prestation.destroy', $row->id), 'method' => 'delete')) !!}
                                                    <button data-what="supprimer" data-action="Section: {{ $row->titre->titre }}" class="btn btn-danger btn-xs deleteAction">x</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <div id="addPrestation_{{ $table->id }}" class="collapse addPrestation">
                                <h4>Nouvelle section</h4>
                                <form action="{{ url('admin/prestation') }}" method="post"> {!! csrf_field() !!}
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <label class="control-label"><strong>Titre</strong></label>
                                            <select name="titre_id" class="form-control">
                                                @if(isset($titres[$table->id]))
                                                    @foreach($titres[$table->id] as  $titre)
                                                        <option value="{{ $titre->id}}">{{ $titre->titre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        @if(in_array('option_id',$tables_options[$table->id]))
                                            <div class="col-sm-3">
                                                <label class="control-label"><strong>Disponible</strong></label>
                                                <select name="option_id" class="form-control">
                                                    <option value="">Choix</option>
                                                    @if(!empty($options))
                                                        @foreach($options as $option_id => $option)
                                                            <option value="{{ $option_id }}">{{ $option }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        @endif
                                        @if(in_array('places',$tables_options[$table->id]))
                                            <div class="col-sm-2">
                                                <label class="control-label"><strong>Places</strong></label>
                                                <input type="text" name="places" value="" class="form-control">
                                            </div>
                                        @endif

                                        @if(in_array('prix',$tables_options[$table->id]))
                                            <div class="col-sm-3">
                                                <label class="control-label"><strong>Prix</strong></label>
                                                <div class="input-group">
                                                    <input type="text" name="prix" value="" class="form-control">
                                                    <span class="input-group-addon">CHF</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if(in_array('remarque',$tables_options[$table->id]))
                                        <div class="row margeUp">
                                            <div class="col-sm-12">
                                                <label class="control-label"><strong>Remarque</strong></label>
                                                <textarea name="remarque" class="form-control redactor"></textarea>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row margeUp">
                                        <div class="col-sm-12 text-right">
                                            <button class="btn btn-info btn-sm" type="submit">OK</button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="table_id" value="{{ $table->id }}">
                                    <input type="hidden" name="prestataire_id" value="{{ $prestataire->id }}">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- end row -->
        @endforeach
    @endif
    <!-- End Tables -->

    <!-- start row -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-midnightblue">
                <form action="{{ url('admin/remarque') }}" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                    <input type="hidden" name="prestataire_id" value="{{ $prestataire->id }}">
                    {!! csrf_field() !!}
                    <div class="panel-body">
                        <h3>Remarques</h3>
                        <textarea name="remarque" class="form-control redactor"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endif

@stop