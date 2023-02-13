<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';
?>

<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-5">Master Updates</h1>
                <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Masters</li>
                        </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <a href="staytypes.php" style="text-decoration:none;">
                            <div class="card card-shadow bg-light text-black mb-4">
                                <div class="card-body">Stay Types</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <a href="locations.php" style="text-decoration:none;">
                            <div class="card card-shadow bg-light text-black mb-4">
                                <div class="card-body">Locations</div>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6">
                        <a href="exclusivity.php" style="text-decoration:none;">
                            <div class="card card-shadow bg-light text-black mb-4">
                                <div class="card-body">Exclusivity</div>
                            </div>
                        </a>
                    </div> -->
                </div>


            </div>
        </main>


        <!-- footer -->
        <?php
        include 'includes/footer.php';
        ?>