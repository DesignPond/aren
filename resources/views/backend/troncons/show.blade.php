@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/troncon') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    @if (!empty($troncon) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{{ url('admin/troncon/'.$troncon->id) }}" method="POST" enctype="multipart/form-data" class="validate-form form-horizontal" data-validate="parsley">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter {{ $troncon->name }}</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('name', $troncon->name , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Couleur si tronçon</label>
                        <div class="col-sm-3">
                            {!! Form::text('color',  $troncon->color_hex , array('class' => 'form-control colorpicker') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Fichier KML</label>
                        <div class="col-sm-6">
                            <input type="file" name="kml">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Type de tracé</label>
                        <div class="col-sm-3">
                            <select class="form-control" required name="type">
                                <option value="">Choix</option>
                                <option {{ $troncon->type == 'poi' ? 'selected' : '' }} value="poi">Points de vue</option>
                                <option {{ $troncon->type == 'troncon' ? 'selected' : '' }} value="troncon">Tronçon</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="col-sm-3"> {!! Form::hidden('id', $troncon->id ) !!}</div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Envoyer </button>
                    </div>
                </div>
           </form>
        </div>
    </div>

    @endif

</div>
<!-- end row -->

@stop