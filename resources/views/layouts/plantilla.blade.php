@include('layouts.sb_admin.role')        

<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.sb_admin.head')        
    </head>
    <body class="sb-nav-fixed">
        @include('layouts.sb_admin.header')        
        <div id="layoutSidenav">
            @include('layouts.sb_admin.sidebar')        
            <div id="layoutSidenav_content">
                <main>
                    @yield('seccion-main')
                </main>
                @include('layouts.sb_admin.footer')        
            </div>
        </div>
        @include('layouts.sb_admin.scripts')        
        @yield('seccion-scripts')
    </body>
</html>
