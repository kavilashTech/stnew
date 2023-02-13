<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';
?>
<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <!-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                <!-- <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Enhance your <span class="fw-bold">Campaign</span> for better outreach
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->
                <div class="row ">
                    <div class="col-5 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title card-title-dash">Pending Staytype Approvals</h4>
                                        <p class="card-subtitle card-subtitle-dash">You have 3 pending approvals</p>
                                    </div>
                                    <!-- <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                  </div> -->
                                </div>
                                <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                        <thead>
                                            <tr>
                                                <!-- <th>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </th> -->
                                                <th>Staytype</th>
                                                <!-- <th>Company</th> -->
                                                <!-- <th>Progress</th> -->
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </td> -->
                                                <td>
                                                    <div class="d-flex ">
                                                        <img src="images/faces/face1.jpg" alt="">
                                                        <div>
                                                            <h6>Brandon Washington Sea View Apartment</h6>
                                                            <p class="mb-0">Hostel</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:orange; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Pending</span></td>
                                                <td class="text-center">
                                                    <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-eye"></i>
                                                    </button>
                                                    <button title="Approve" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-check"></i>
                                                    </button>
                                                    <button title="Reject" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-times"></i>
                                                    </button>
                                                </td>
                                                <!-- <td>
                                          <h6>Company name 1</h6>
                                          <p>company type</p>
                                        </td> -->
                                                <!-- <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">79%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td> -->
                                            </tr>
                                            <tr>
                                                <!-- <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </td> -->
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="images/faces/face2.jpg" alt="">
                                                        <div>
                                                            <h6>Stalin's Guest House</h6>
                                                            <p class="mb-0">Hostel</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:orange; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Pending</span></td>
                                                <td class="text-center">
                                                    <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-eye"></i>
                                                    </button>
                                                    <button title="Approve" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-check"></i>
                                                    </button>
                                                    <button title="Reject" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-times"></i>
                                                    </button>
                                                </td>
                                                <!-- <td>
                                          <h6>Company name 1</h6>
                                          <p>company type</p>
                                        </td> -->
                                                <!-- <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td> -->
                                            </tr>
                                            <tr>
                                                <!-- <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </td> -->

                                                <td>
                                                    <div class="d-flex">
                                                        <img src="images/faces/face3.jpg" alt="">
                                                        <div>
                                                            <h6>Park View Mansions</h6>
                                                            <p class="mb-0">Paying Guest</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:orange; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Pending</span></td>
                                                <td  class="text-center">
                                                    <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-eye"></i>
                                                    </button>
                                                    <button title="Approve" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-check"></i>
                                                    </button>
                                                    <button title="Reject" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-times"></i>
                                                    </button>
                                                </td>
                                                <!-- <td>
                                          <h6>Company name 1</h6>
                                          <p>company type</p>
                                        </td> -->
                                                <!-- <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td> -->
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-5 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title card-title-dash">Pending Owner Registrations</h4>
                                        <p class="card-subtitle card-subtitle-dash">You have 2 pending approvals</p>
                                    </div>
                                    <!-- <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                  </div> -->
                                </div>
                                <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                        <thead>
                                            <tr>
                                                <!-- <th>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </th> -->
                                                <th>User</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </td> -->
                                                <td>
                                                    <div class="d-flex ">
                                                        <img src="images/faces/face1.jpg" alt="">
                                                        <div>
                                                            <h6>Venkatesh</h6>
                                                            <p class="mb-0">Annanagar, Chennai</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:orange; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Pending</span></td>
                                                <td class="text-center">
                                                    <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-eye"></i>
                                                    </button>
                                                    <button title="Approve" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-check"></i>
                                                    </button>
                                                    <button title="Reject" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-times"></i>
                                                    </button>
                                                </td>
                                                <!-- <td>
                                          <h6>Company name 1</h6>
                                          <p>company type</p>
                                        </td> -->
                                                <!-- <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">79%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td> -->
                                            </tr>
                                            <tr>
                                                <!-- <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </td> -->
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="images/faces/face2.jpg" alt="">
                                                        <div>
                                                            <h6>John Doe</h6>
                                                            <p class="mb-0">Bangalore</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:orange; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Pending</span></td>
                                                <td class="text-center">
                                                    <button title="View" type="button" class="btn btn-status-neutral btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-eye"></i>
                                                    </button>
                                                    <button title="Approve" type="button" class="btn btn-status-positive btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-check"></i>
                                                    </button>
                                                    <button title="Reject" type="button" class="btn btn-status-negative btn-rounded btn-icon">
                                                        <i class="fas fa-sm fa-times"></i>
                                                    </button>
                                                </td>
                                                <!-- <td>
                                          <h6>Company name 1</h6>
                                          <p>company type</p>
                                        </td> -->
                                                <!-- <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td> -->
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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