<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.sb_admin.head')        
    </head>
    <body class="sb-nav-fixed">
        @include('layout.sb_admin.header')        
        <div id="layoutSidenav">
            @include('layout.sb_admin.sidebar')        
            <div id="layoutSidenav_content">
                <main>                    
                    @yield('seccion-main')
                </main>
                @include('layout.sb_admin.footer')        
            </div>
        </div>
        @include('layout.sb_admin.scripts')        
        @yield('seccion-scripts')
    </body>
</html>
