@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/icon/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Icones pour les points de vue</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;" id="icon-table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-2">Titre</th>
                            <th class="col-sm-1">Image</th>
                            <th class="col-sm-6">Style</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">

                            @if(!$icons->isEmpty())
                                @foreach($icons as $icon)
                                    <tr>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/icon/'.$icon->id) }}">&Eacute;diter</a></td>
                                        <td><strong>{{ $icon->titre }}</strong></td>
                                        <td><img height="30" src="{{ asset('frontend/icons/'.$icon->image) }}" alt="image" /></td>
                                        <td>{!! $icon->style !!}</td>
                                        <td class="text-right">
                                            {!! Form::open(array('route' => array('admin.icon.destroy', $icon->id), 'method' => 'delete')) !!}
                                                <button data-what="supprimer" data-action="icon: {{ $icon->titre }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@stop