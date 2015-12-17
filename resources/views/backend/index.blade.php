@extends('backend.layouts.master')
@section('content')

    <div class="row">

        <div class="col-md-3">
            <a class="shortcut-tiles tiles-info" href="{{ url('admin/page') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-file"></i></div>
                </div>
                <div class="tiles-footer"><h3>Pages</h3></div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="shortcut-tiles tiles-midnightblue" href="{{ url('admin/bloc') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-star"></i></div>
                </div>
                <div class="tiles-footer"><h3>Blocs accueil</h3></div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="shortcut-tiles tiles-primary" href="{{ url('admin/news') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-paperclip"></i></div>
                </div>
                <div class="tiles-footer"><h3>News</h3></div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="shortcut-tiles tiles-green" href="{{ url('admin/config') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-cog"></i></div>
                </div>
                <div class="tiles-footer"><h3>Configurations</h3></div>
            </a>
        </div>

    </div>

    <div class="row">

        <div class="col-md-3">
            <a class="shortcut-tiles tiles-orange" href="{{ url('admin/troncon') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-map"></i></div>
                </div>
                <div class="tiles-footer"><h3>Tronçons</h3></div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="shortcut-tiles tiles-indigo" href="{{ url('admin/icon') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-map-marker"></i></div>
                </div>
                <div class="tiles-footer"><h3>Icones sur cartes</h3></div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="shortcut-tiles tiles-inverse" href="{{ url('admin/prestataire') }}">
                <div class="tiles-body">
                    <div class="text-center"><i class="fa fa-users"></i></div>
                </div>
                <div class="tiles-footer"><h3>Prestataires</h3></div>
            </a>
        </div>

    </div>

@stop