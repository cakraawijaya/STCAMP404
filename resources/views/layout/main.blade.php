@include('partials.header')
@include('partials.navbar')

<div class="container flex-grow-1 p-3 p-md-3 p-xl-5">
    @yield('container')
</div>

<div class="footercontainer">
    @include('partials.footer')
</div>