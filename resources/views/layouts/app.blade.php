<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('include.head')
    <body class="font-sans antialiased">
        
        @include('include.header2')

       

        @yield('content')

        @include('include.footer')

        @include('include.script')
    </body>
</html>
