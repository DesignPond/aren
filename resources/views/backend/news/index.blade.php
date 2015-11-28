@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;News</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;" id="bloc-table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-2">Titre</th>
                            <th class="col-sm-2">Date</th>
                            <th class="col-sm-6">Contenu</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">

                            @if(!$news->isEmpty())
                                @foreach($news as $new)
                                    <tr>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/news/'.$new->id) }}">&Eacute;diter</a></td>
                                        <td><strong>{{ $new->titre }}</strong></td>
                                        <td>{{ $new->dateNews->formatLocalized('%A %d %B %Y') }}</td>
                                        <td>{!! $new->texte !!}</td>
                                        <td class="text-right">
                                            {!! Form::open(array('route' => array('admin.news.destroy', $new->id), 'method' => 'delete')) !!}
                                                <button data-what="supprimer" data-action="bloc: {{ $new->titre }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
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