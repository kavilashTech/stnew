<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="company.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Company Information
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMasters" aria-expanded="false" aria-controls="collapseMasters">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Masters
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseMasters" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="staytypes.php">Stay Types</a>
                            <a class="nav-link" href="locations.php">Location</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="preferences.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Preferences
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAmenities" aria-expanded="false" aria-controls="collapseAmenities">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Amenities
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAmenities" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="propertyamenities.php">Property Level</a>
                            <a class="nav-link" href="roomamenities.php">Room Level</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Stayteller Admin
            </div>
        </nav>
    </div>
</div>