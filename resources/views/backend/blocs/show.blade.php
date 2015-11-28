@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/bloc') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    @if (!empty($bloc) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{{ url('admin/bloc/'.$bloc->id) }}" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter {{ $bloc->titre }}</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('titre', $bloc->titre , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bloc" class="col-sm-3 control-label">Bloc</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('contenu', $bloc->contenu , array('class' => 'form-control  redactor required', 'cols' => '50' , 'rows' => '4' )) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-3 col-xs-6">

                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="pin.png" {{ $bloc->type == 'pin.png' ? 'checked' : '' }}>
                                    <img src="{{ asset('frontend/images/icons/pin.png') }}" alt="icon" />
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="home.png" {{ $bloc->type == 'home.png' ? 'checked' : '' }}>
                                    <img src="{{ asset('frontend/images/icons/home.png') }}" alt="icon" />
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="star.png" {{ $bloc->type == 'star.png' ? 'checked' : '' }}>
                                    <img src="{{ asset('frontend/images/icons/star.png') }}" alt="icon" />
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="talk.png" {{ $bloc->type == 'talk.png' ? 'checked' : '' }}>
                                    <img src="{{ asset('frontend/images/icons/talk.png') }}" alt="icon" />
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="col-sm-3"> {!! Form::hidden('id', $bloc->id ) !!}</div>
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