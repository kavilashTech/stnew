
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion thm-bg" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fa   fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa   fa-columns"></i></div>
                        Masters
                        <div class="sb-sidenav-collapse-arrow"><i class="fa  fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('admin.properties-categories.index')}}">Staytype Categories</a>
                                <a class="nav-link" href="{{route('admin.locations.index')}}">Locations</a>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#amenitesCollapseAuth" aria-expanded="true" aria-controls="pagesCollapseAuth">
                                        Amenities
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa  fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="amenitesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="">Property Level</a>
                                            <a class="nav-link" href="">Room Level</a>
                                        </nav>
                                    </div>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                        <div class="sb-nav-link-icon"><i class="fa   fa-columns"></i></div>
                        settings
                        <div class="sb-sidenav-collapse-arrow"><i class="fa  fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('admin.company')}}">Company</a>
                            <a class="nav-link" href="#">Site Settings</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                        <div class="sb-nav-link-icon"><i class="fa   fa-columns"></i></div>
                        Amenities
                        <div class="sb-sidenav-collapse-arrow"><i class="fa  fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('admin.amenities',['level'=>'property'])}}">Property level</a>
                            <a class="nav-link" href="{{route('admin.amenities',['level'=>'room'])}}">Room Level</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer" style="color:white">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>

