@include('backend.parcials.header')

    @yield('mainContent')

@include('backend.parcials.footer')

@include('backend.parcials.loader')
@stack('script')
