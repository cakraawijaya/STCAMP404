@include('partials.header')
@include('partials.navbar')

<div class="container flex-grow-1 p-4 p-md-5">
    @yield('container')
</div>

<div class="footercontainer">
    @include('partials.footer')
</div>