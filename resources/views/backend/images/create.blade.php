@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/image') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{{ url('admin/image') }}" enctype="multipart/form-data" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>Ajouter une image</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Rang</label>
                        <div class="col-sm-2">
                            {!! Form::text('rang', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('titre', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Style</label>
                        <div class="col-sm-4">
                            <select class="form-control required" name="style">
                                <option value="">Choix</option>
                                <option value="polaroid">Polaroid</option>
                                <option value="postit">Postit</option>
                                <option value="text">Texte</option>
                                <option value="popup">Popup</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Afficher sur page</label>
                        <div class="col-sm-4">

                            <select class="form-control required" name="page_id">
                                <option value="">Choix</option>
                                @if(!empty($pages))
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Lien</label>
                        <div class="col-sm-4">
                            {!! Form::text('url', null , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-7">
                            <div class="list-group">
                                <div class="list-group-item">
                                    {!!  Form::file('file')!!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="news" class="col-sm-3 control-label">Texte</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('text', null, array('class' => 'form-control redactorSimple', 'cols' => '50' , 'rows' => '4' )) !!}
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