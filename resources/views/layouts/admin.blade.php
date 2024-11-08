<!doctype html>
    <html>
    <head>
        @include('includes.admin.head')
    </head>
    <body>
        <header id="header" class="fixed-top d-flex align-items-center">
            @include('includes.admin.headerA')
        </header>

        <div id="main">

                @yield('content')

        </div>

        <footer id="footer">
            @include('includes.footer')
        </footer>
        @include('includes.js-includes')
    
    </body>
    </html>