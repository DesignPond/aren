@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/bloc') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{{ url('admin/bloc') }}" enctype="multipart/form-data" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>Ajouter un bloc</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('titre', null , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bloc" class="col-sm-3 control-label">Bloc</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('contenu', null, array('class' => 'form-control  redactor required', 'cols' => '50' , 'rows' => '4' )) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-3 col-xs-6">

                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="pin.png" checked>
                                    <img src="{{ asset('frontend/images/icons/home.png') }}" alt="icon" />
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="home.png">
                                    <img src="{{ asset('frontend/images/icons/home.png') }}" alt="icon" />
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="star.png">
                                    <img src="{{ asset('frontend/images/icons/star.png') }}" alt="icon" />
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input required type="radio" name="type" value="talk.png">
                                    <img src="{{ asset('frontend/images/icons/talk.png') }}" alt="icon" />
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer mini-footer ">
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