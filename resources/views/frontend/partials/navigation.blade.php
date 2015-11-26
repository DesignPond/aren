<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-6">
            <!-- Logo Image -->
            <a href="{{ url('/') }}" class="logo-image logo-">
                <img src="{{ asset('frontend/images/logos/logo-small.svg') }}" alt="logo">
            </a>
            <!-- End of Logo Image -->
            <!-- Languages -->
            <div class="languages languages-light js-languages">
                <span class="language-active js-language-active">English
                    <i class="fa fa-caret-down"></i>
                </span>
                <ul class="languages-list js-languages-list">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Français</a></li>
                </ul>
            </div>
            <!-- End of Languages -->
        </div>
        <div class="col-md-7 col-sm-6 col-xs-6">
            <!-- Menu -->
            <nav class="right helper">
                <ul class="menu sf-menu js-menu menu-light">
                    <li><a href="{{ url('/') }}" title="News">HOME</a></li>
                </ul>
            </nav>
            <!-- End of Menu -->
        </div>
    </div>
</div>