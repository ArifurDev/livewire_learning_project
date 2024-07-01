<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
         <!--all css file-->
         @include('backend.layouts.header')
    </head>
    <body>
        {{ $slot }}
        <!--all js file-->
        @include('backend.layouts.footer')
    </body>
</html>
