@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/image/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Postits/Polaroids</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;" id="image-table">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-4">Titre</th>
                            <th class="col-sm-1">Image</th>
                            <th class="col-sm-1">Style</th>
                            <th class="col-sm-4">Page</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">

                            @if(!$images->isEmpty())
                                @foreach($images as $image)
                                    <tr>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/image/'.$image->id) }}">&Eacute;diter</a></td>
                                        <td><strong>{{ $image->titre }}</strong></td>
                                        <td>
                                            @if($image->image)
                                                <img height="30" src="{{ asset('files/'.$image->image) }}" alt="image" />
                                            @endif
                                        </td>
                                        <td>{!! $image->style !!}</td>
                                        <td>{!! $image->page->title !!}</td>
                                        <td class="text-right">
                                            {!! Form::open(array('route' => array('admin.image.destroy', $image->id), 'method' => 'delete')) !!}
                                                <button data-what="supprimer" data-action="image: {{ $image->titre }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
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