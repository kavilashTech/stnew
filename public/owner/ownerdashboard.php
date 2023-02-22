<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
    exit(0);
}

//Load Properties with Status
//TODO : Bring ownder Id dynamically based on login
$propertyCount = 0;
$pendingCount = 0;
$owner_id = $_SESSION['userId'];
$selectSQL = "select count(id) from properties where status = 1 and owner_id = " . $owner_id;
$result = $connection->query($selectSQL);
$pendingCount = mysqli_num_rows($result);

$selectSQL = "SELECT a.id, a.property_title,a.status, b.categoryname  FROM properties a, property_category b
WHERE b.id = a.category_id
and a.owner_id = " . $owner_id;
// echo $selectSQL;
// exit(0);

$result = mysqli_query($connection, $selectSQL);
$propertyCount = mysqli_num_rows($result);




?>








<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Owner Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

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
                                        <h4 class="card-title card-title-dash">Staytype Status</h4>
                                        <p class="card-subtitle card-subtitle-dash">You have <?php echo $pendingCount ?> pending approvals</p>
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

                                            <!-- <td>
                                                    <div class="form-check form-check-flat mt-0">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                                    </div>
                                                </td> -->
                                            <?php
                                            if ($propertyCount > 0) {
                                                // if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    //echo "nothing";
                                                    $propertyStatus = "";
                                                    if ($row['status'] == 0) {
                                                        $propertyStatus = "In Progress";
                                                        $tagStyle = "background-color:blue";
                                                    } else if ($row['status'] == 1) {
                                                        $propertyStatus = "Pending";
                                                        $tagStyle = "background-color:orange";
                                                    } else if ($row['status'] == 2) {
                                                        $propertyStatus = "Approved";
                                                        $tagStyle = "background-color:green";
                                                    } else if ($row['status'] == 3) {
                                                        $propertyStatus = "Rejected";
                                                        $tagStyle = "background-color:orange";
                                                    }
                                            ?>


                                                    <tr>
                                                        <td>
                                                            <div class="d-flex ">
                                                                <!-- <img src="images/faces/face1.jpg" alt=""> -->
                                                                <div>
                                                                    <h6><?php echo $row['property_title']; ?></h6>
                                                                    <p class="mb-0"><?php echo $row['categoryname']; ?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span style="<?php echo $tagStyle; ?>; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;"><?php echo $propertyStatus; ?></span></td>
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
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                 ?>       
                                                <tr>
                                                <td colspan="3" class="text-danger" style="font-weight:bold;text-align:center;">No Records Found</td>
                                            </tr>
                                            <?php
                                            }



                                            ?>






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
                                        <h4 class="card-title card-title-dash">Notifications</h4>
                                        <p class="card-subtitle card-subtitle-dash">You have 1 new notifications</p>
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
                                                        <!-- <img src="images/faces/face1.jpg" alt=""> -->
                                                        <div>
                                                            <h6>Venkatesh</h6>
                                                            <p class="mb-0">Annanagar, Chennai</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:Green; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Seen</span></td>
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
                                                        <!-- <img src="images/faces/face2.jpg" alt=""> -->
                                                        <div>
                                                            <h6>John Doe</h6>
                                                            <p class="mb-0">Bangalore</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span style="background-color:red; border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">New</span></td>
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