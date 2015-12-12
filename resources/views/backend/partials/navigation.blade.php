<!-- BEGIN SIDEBAR -->
<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">
        <!-- Recherche globale -->
       <!-- @include('backend.partials.search')-->

        <li class="divider"></li>
        <li class="<?php echo (Request::is('admin') ? 'active' : '' ); ?>"><a href="{{ url('admin') }}">
             <i class="fa fa-home"></i> <span>Accueil</span></a>
        </li>
        <li class="<?php echo (Request::is('page') || Request::is('page/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/page') }}">
                <i class="fa fa-file"></i> <span>Pages</span></a>
        </li>
        <li class="<?php echo (Request::is('bloc') || Request::is('bloc/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/bloc') }}">
                <i class="fa fa-star"></i> <span>Blocs accueil</span></a>
        </li>
        <li class="<?php echo (Request::is('news') || Request::is('news/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/news') }}">
                <i class="fa fa-paperclip"></i> <span>News</span></a>
        </li>
        <li class="divider"></li>
        <li class="<?php echo (Request::is('prestataire') || Request::is('prestataire/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/prestataire') }}">
                <i class="fa fa-users"></i> <span>Prestataires</span></a>
        </li>
        <li class="<?php echo (Request::is('troncon') || Request::is('troncon/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/troncon') }}">
                <i class="fa fa-map"></i> <span>Tronçons</span></a>
        </li>
        <li class="<?php echo (Request::is('icon') || Request::is('icon/*') ? 'active' : '' ); ?>"><a href="{{ url('admin/icon') }}">
                <i class="fa fa-map-marker"></i> <span>Icones sur cartes</span></a>
        </li>
        <li class="divider"></li>
        <li class="<?php echo (Request::is('admin/config') ? 'active' : ''); ?>">
            <a href="{{ url('admin/config') }}"><i class="fa fa-cog"></i><span>Configurations</span></a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</nav>