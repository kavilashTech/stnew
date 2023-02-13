<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';
?>

<body class="sb-nav-fixed  ">
    <nav class="sb-topnav navbar navbar-expand sb-sidenav-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><img src="assets/img/stlogo.png" alt=""></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-5">
                    <div class="row justify-content-start">
                        <div class="col-lg-9">
                            <div class="card mb-4">
                                <div class="card-header ">
                                    <div class="tex">
                                        <i class="fas fa-table me-1"></i>
                                        Nearby Places
                                        <button class="btn btn-primary btn-sm text-white mb-0 me-0 float-end" type="button"><i class="mdi mdi-account-plus"></i>Add New</button>
                                    </div>
                                    <div>

                                    </div>
                                    <div class="card-body">
                                    <table id="" class="responsive table-bordered table-CRUD">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th class="text-center" width="10%"">Sort Order</th>
                                                <th class=" text-center" width="15%">Action</th>

                                                </tr>
                                            </thead>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Sort Order</th>
                                                    <th class=" text-center" width="15%">Action</th>
                                                </tr>
                                            </tfoot> -->
                                            <tbody>
                                                <tr>
                                                    <td><a href=" #">NP001</a></td>
                                                    <td>Shankar IAS Academy</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">
                                                        <!-- <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-eye"></i>
                                                        </button> -->
                                                        <button title="Edit" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-edit"></i>
                                                        </button>
                                                        <button title="Reject" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">NP002</td>
                                                    <td>Restaurents</td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">
                                                        <!-- <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-eye"></i>
                                                        </button> -->
                                                        <button title="Edit" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-edit"></i>
                                                        </button>
                                                        <button title="Delete" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-times"></i>
                                                        </button>
                                                    </td>

                                                <tr>
                                                    <td><a href="#">NP003</td>
                                                    <td>Railway Station</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">
                                                        <!-- <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-eye"></i>
                                                        </button> -->
                                                        <button title="Edit" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-edit"></i>
                                                        </button>
                                                        <button title="Delete" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">NP004</td>
                                                    <td>Auto Stand</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">
                                                        <!-- <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-eye"></i>
                                                        </button> -->
                                                        <button title="Edit" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-edit"></i>
                                                        </button>
                                                        <button title="Delete" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">NP005</td>
                                                    <td>Ram's Study Center</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">
                                                        <!-- <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-eye"></i>
                                                        </button> -->
                                                        <button title="Edit" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-edit"></i>
                                                        </button>
                                                        <button title="Delete" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">NP005</td>
                                                    <td>Browsing Centre and Xerox Shop</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">
                                                        <!-- <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-eye"></i>
                                                        </button> -->
                                                        <button title="Edit" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-edit"></i>
                                                        </button>
                                                        <button title="Delete" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                            <i class="fas fa-sm fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <!-- footer -->
            <?php
            include 'includes/footer.php';
            ?>