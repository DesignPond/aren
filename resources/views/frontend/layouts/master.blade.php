<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="@Designpond | Cindy Leschaud">
    <title>AREN | Association Réseau Equestre Nechâtelois</title>
    <meta name="description" content="L'AREN, Association Réseau Equestre Nechâtelois est une association à but non lucratif visant à développer un réseau de randonnées équestres et d'hébergements sur le territoire neuchâtelois.">
    <meta name="_token" content="<?php echo csrf_token(); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/font/stylesheet.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/1140.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/styles.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/form.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/table.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('frontend/css/smallscreen.css');?>">
    <link rel="stylesheet" href="<?php echo asset('css/general.css');?>">
    <link rel="stylesheet" type="text/css" media="only screen and (min-device-width: 768px) and (max-device-width: 1024px)" href="<?php echo asset('frontend/css/ipad.css');?>">
 <script src="https://maps.google.com/maps/api/js?sensor=false"></script> 
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdMKgzvMZIB2ZLyctBXlYpw5pVv_JGBiA&callback=initMap" async defer></script>

</head>

<body>

<div id="bgheader"></div>
<div id="bgshadow"></div>

<div class="container">
    <div class="row" role="main">
        <header>
            <h1 class="mainLogo">
                <a class="logo" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
                </a>
            </h1>
            <nav class="last">
                <ul id="menu">
                    <?php $helper = new App\Helper\Helper(); ?>
                    <?php $pages  = $hierarchy->reject(function ($item) { return $item->hidden; }); ?>

                    @foreach($pages as $page)
                        {!! $helper->renderMenu($page) !!}
                    @endforeach

                </ul>
            </nav>
        </header>
        <section class="contenu">
            <div class="container">

                <!-- Contenu -->
                @yield('content')
                <!-- Fin contenu -->
                <hr/>

            </div>
        </section>

        <p class="spacer"></p>
        <!-- Footer -->
        <footer>
            <div class="sevencol">
                <div class="miniLogo"><a href="index.php"><img src="{{ asset('frontend/images/logo-mini.png') }}" alt="Logo aren" /></a></div>
                <div class="adresse">
                    {!! Registry::get('adresse')!!}
                </div>
            </div>
            <div class="fivecol last">
                <p class="star">{!! Registry::get('soutien')!!}</p>
            </div>
            <hr/>
        </footer>
        <!-- End of Footer -->
    </div>
</div>

 
<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="<?php echo asset('frontend/js/jquery-ui-1.8.16.custom.min.js');?>"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

<!-- Scripts -->
<script type="text/javascript" src="<?php echo asset('frontend/js/isotope.pkgd.min.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('frontend/js/packery-mode.pkgd.min.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('frontend/js/map.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('frontend/js/main.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('frontend/js/jquery.mediaTable.js');?>"></script>

	
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-28180770-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

</body>
</html>