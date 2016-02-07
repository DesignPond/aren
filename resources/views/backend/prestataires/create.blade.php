@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/prestataire') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{{ url('admin/prestataire') }}" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>Ajouter un prestataire</h4>
                </div>
                <div class="panel-body event-info">

                    <h4>Informations principales</h4>
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">N° Participant</label>
                        <div class="col-sm-2">
                            {!! Form::text('noParticipant', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Établissement</label>
                        <div class="col-sm-4">
                            {!! Form::text('etablissement', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Civilité</label>
                        <div class="col-sm-4">
                            {!! Form::text('civilite', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Prénom</label>
                        <div class="col-sm-4">
                            {!! Form::text('prenom', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-4">
                            {!! Form::text('nom', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Rue</label>
                        <div class="col-sm-4">
                            {!! Form::text('rue', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">NPA</label>
                        <div class="col-sm-4">
                            {!! Form::text('npa', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Ville</label>
                        <div class="col-sm-4">
                            {!! Form::text('ville', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">District</label>
                        <div class="col-sm-4">
                            {!! Form::text('district', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Téléphone</label>
                        <div class="col-sm-4">
                            {!! Form::text('telephone', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-4">
                            {!! Form::text('mobile', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-4">
                            {!! Form::text('fax', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">E-mail</label>
                        <div class="col-sm-4">
                            {!! Form::text('email', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Site web</label>
                        <div class="col-sm-4">
                            {!! Form::text('web', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                </div>
                <div class="panel-footer mini-footer">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- end row -->

@stop