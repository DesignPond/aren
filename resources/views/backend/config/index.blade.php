@extends('backend.layouts.master')
@section('content')

<div ng-app="upload"><!-- App -->
    <form action="{{ url('admin/config') }}" method="POST" class="form">
         {!! csrf_field() !!}

        <div class="row">
            <div class="col-md-6">
                <div class="panel-heading">
                    <h4><i class="fa fa-cogs"></i> Configuration</h4>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="form-group">
                            <label><strong>Adresse</strong></label>
                            <textarea name="adresse" class="form-control redactorSimple">{!! Registry::get('adresse')!!}</textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-info pull-right">Mettre à jour</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </form>
</div><!-- App end -->

@stop