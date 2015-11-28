@extends('backend.layouts.master')
@section('content')

<div class="row"><!-- row -->
    <div class="col-md-12"><!-- col -->
        <p><a class="btn btn-default" href="{{ url('admin/news') }}"><i class="fa fa-reply"></i> &nbsp;Retour à la liste</a></p>
    </div>
</div>
<!-- start row -->
<div class="row">

    @if (!empty($news) )

    <div class="col-md-12">
        <div class="panel panel-midnightblue">

            <!-- form start -->
            <form action="{{ url('admin/news/'.$news->id) }}" method="POST" class="validate-form form-horizontal" data-validate="parsley">
                <input type="hidden" name="_method" value="PUT">
                {!! csrf_field() !!}

                <div class="panel-heading">
                    <h4>&Eacute;diter {{ $news->titre }}</h4>
                </div>
                <div class="panel-body event-info">

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Titre</label>
                        <div class="col-sm-4">
                            {!! Form::text('titre', $news->titre , array('class' => 'form-control required') ) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="news" class="col-sm-3 control-label">News</label>
                        <div class="col-sm-7">
                            {!! Form::textarea('texte', $news->texte , array('class' => 'form-control  redactor required', 'cols' => '50' , 'rows' => '4' )) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="news" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-4">
                            {!! Form::text('dateNews', $news->dateNews->format('Y-m-d') , array('class' => 'form-control required datePicker') ) !!}
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="col-sm-3"> {!! Form::hidden('id', $news->id ) !!}</div>
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