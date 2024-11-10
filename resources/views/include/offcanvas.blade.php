<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets') }}/img/logo.png" height="50px" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="{{ route('login') }}" target="_blank">Login</a>
        <a href="{{ route('register') }}" target="_blank">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->
