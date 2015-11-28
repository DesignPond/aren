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
                    <div class="panel-body event-info">
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

                            <div class="form-group"><label for="message" class="col-sm-12 control-label">&nbsp;</label></div>
                            <div class="form-group"><label for="message" class="col-sm-12 control-label">&nbsp;</label></div>

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
                            <h3>{{ $table->titre }} <a class="btn btn-info btn-sm pull-right" data-toggle="collapse" href="#addPrestation_{{ $table->id }}">Ajouter</a></h3>
                            <table class="table">
                                <thead>
                                    <th>Titre</th><th>Disponible</th><th>Remarque</th>
                                </thead>
                                <tbody>
                                    @if(isset($tables_participant[$table->id]))
                                        @foreach($tables_participant[$table->id] as $row)
                                            <tr>
                                                <?php $row->load('option','titre'); ?>
                                                <td><p><strong>{{ $row->titre->titre }}</strong></p></td>
                                                <td><p>{{ $row->option->titre }}</p> </td>
                                                <td><p>{!! ($row->remarque != '' ? $row->remarque : '-') !!}</p></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <div id="addPrestation_{{ $table->id }}" class="collapse">
                                <form action="{{ url('admin/prestation') }}" method="post">
                                    <div class="form-group">
                                        <label for="message" class="col-sm-3 control-label">Site web</label>
                                        <div class="col-sm-9">
                                            {!! Form::text('option', 'sdvs' , array('class' => 'form-control') ) !!}
                                        </div>
                                    </div>
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

@endif

@stop