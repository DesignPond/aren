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
            <form action="{{ url('admin/image/'.$image->id) }}" method="POST" enctype="multipart/form-data" class="validate-form form-horizontal" data-validate="parsley">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Rang</label>
                        <div class="col-sm-2">
                            {!! Form::text('rang', $image->rang , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('titre', $image->titre , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Style</label>
                        <div class="col-sm-4">
                            <select class="form-control required" name="style">
                                <option value="">Choix</option>
                                <option {{ $image->style == 'polaroid' ? 'selected' : '' }} value="polaroid">Polaroid</option>
                                <option {{ $image->style == 'postit' ? 'selected' : '' }} value="postit">Postit</option>
                                <option {{ $image->style == 'text' ? 'selected' : '' }} value="text">Texte</option>
                                <option {{ $image->style == 'popup' ? 'selected' : '' }} value="popup">Popup</option>
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
                                        <option {{ $image->page_id == $page->id ? 'selected' : '' }} value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Lien</label>
                        <div class="col-sm-4">
                            {!! Form::text('url', $image->url , array('class' => 'form-control') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-7">
                            @if($image->image)
                                <p><img src="{{ asset('files/'.$image->image) }}" alt="Image"></p>
                            @endif
                            <div class="list-group">
                                <div class="list-group-item">
                                    {!! Form::file('file')!!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="news" class="col-sm-3 control-label">Texte</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('text', $image->text , array('class' => 'form-control redactorSimple', 'cols' => '50' , 'rows' => '4' )) !!}
                        </div>
                    </div>

                </div>
                <div class="panel-footer mini-footer">
                    <div class="col-sm-3"> {!! Form::hidden('id', $image->id ) !!}</div>
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