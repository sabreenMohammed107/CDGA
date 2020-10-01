@include('web.webLayout.head')

<body>

    @include('web.webLayout.header', ['courseCategories' => $courseCategories])

    <!-- container -->
    @yield('content')





    @include('web.webLayout.footer')

    @include('web.webLayout.footerScripts')