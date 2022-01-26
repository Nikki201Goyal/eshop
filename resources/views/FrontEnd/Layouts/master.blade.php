<!DOCTYPE html>

<html lang="eng">

<head>
    @include('FrontEnd.Layouts.Partial.head')
</head>

<body>
    <div>
        @include('FrontEnd.Layouts.Partial.colorPicker')
        @include('FrontEnd.Layouts.Partial.header')

    <div>
        @yield('content')

    </div>
    @include('FrontEnd.Layouts.Partial.footer')

    </div>

    @include('FrontEnd.Layouts.Partial.script')
    @yield('page-scripts')
</body>

</html>
