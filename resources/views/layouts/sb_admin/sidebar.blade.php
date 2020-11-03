<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion"> <!-- sb-sidenav-dark -->
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- OPCION LARAVEL -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aprendiendoLaravel" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Laravel
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="aprendiendoLaravel" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <!-- OPCION ALMACEN -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#almacen" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Almacen
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="almacen" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if( session('categoria') )
                                    <a class="nav-link" href="{{ route('categoria.index') }}">Categoría</a>
                                @endif
                                @if( session('articulo') )
                                    <a class="nav-link" href="{{ route('articulo.index') }}">Artículo</a>
                                @endif
                            </nav>
                        </div>
                        <!-- CERRAR OPCION ALMACEN -->

                        <!-- OPCION VENTAS -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ventas" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Ventas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="ventas" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if( session('cliente') )
                                    <a class="nav-link" href="{{ route('cliente.index') }}">Cliente</a>
                                @endif
                                {{-- @if( session('venta') )
                                    <a class="nav-link" href="{{ route('venta.index') }}">Venta</a>
                                @endif --}}
                            </nav>
                        </div>
                        <!-- CERRAR OPCION VENTAS -->
                        
                        <!-- OPCION COMPRAS -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#compras" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Compras
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="compras" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if( session('proveedor') )
                                    <a class="nav-link" href="{{ route('proveedor.index') }}">Proveedor</a>
                                @endif
                                @if( session('ingreso') )
                                    <a class="nav-link" href="{{ route('ingreso.index') }}">Ingreso</a>
                                @endif
                            </nav>
                        </div>
                        <!-- CERRAR OPCION COMPRAS -->
                        
                        <!-- OPCION ACCESO -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#acceso" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Acceso
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="acceso" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if( session('usuario') )
                                    <a class="nav-link" href="{{ route('usuario.index') }}">Usuario</a>
                                @endif
                            </nav>
                        </div>
                        <!-- CERRAR OPCION ACCESO -->
                        
                    </nav>
                </div>
                <!-- CERRAR OPCION LARAVEL -->
               
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.php">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.php">Login</a>
                                <a class="nav-link" href="register.php">Register</a>
                                <a class="nav-link" href="password.php">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.php">401 Page</a>
                                <a class="nav-link" href="404.php">404 Page</a>
                                <a class="nav-link" href="500.php">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{-- Start Bootstrap --}}
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>