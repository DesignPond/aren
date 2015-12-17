@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/image') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    @if (!empty($image) )

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
                        <label for="message" class="col-sm-3 control-label">Affiché sur la page</label>
                        <div class="col-sm-4">
                            @if(!$pages->isEmpty())
                                <select class="form-control" name="page_id">
                                    @foreach($pages as $page)
                                       <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>

                    @if(!empty($image->image ))
                        <div class="form-group">
                            <label for="file" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-3">
                                <div class="list-group">
                                    <div class="list-group-item text-center">
                                        <a href="#"><img height="32" src="{!! asset('frontend/images/'.$image->image) !!}" alt="imagee" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="file" class="col-sm-3 control-label">Changer l'image</label>
                        <div class="col-sm-7">
                            <div class="list-group">
                                <div class="list-group-item">
                                    {!! Form::file('file') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="col-sm-3"> {!! Form::hidden('id', $image->id ) !!}</div>
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