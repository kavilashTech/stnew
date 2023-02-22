<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';



// Check if user has propertly logged in
//Check if we can use generic function

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
    exit(0);
}


if (isset($_REQUEST['pid'])) {

    $propertyId = $_REQUEST['pid'];
    $_SESSION['PROPERTY_ID'] = $propertyId;
} else if (isset($_SESSION['PROPERTY_ID'])) {

    $propertyId = $_SESSION['PROPERTY_ID'];
}





$selectSQL = "select * from properties where id = " . $propertyId;
// echo $selectSQL;
// exit(0);

$result = mysqli_query($connection, $selectSQL);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    $propertyName = $row['property_title'];
    $_SESSION['PROPERTY_TITLE'] = $propertyName;


    $policy = $row['policy'];
} else {
    $_SESSION['message'] = "Could not Load Data. Contact Administrator";
}

?>

<style>
    .admin-msg {
        width: 300px;
        background-color: rgb(1, 73, 1) !important;
        color: #fff !important;
        text-align: center;
        font-weight: bold;
    }

    .table-time tr td {
        padding: 10px;
        color: black !important;

    }
</style>


<link rel="stylesheet" href="css/multi-form.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.js"></script>


<script type="application/javascript" src="js/multi-form.js"></script>
<script type="application/javascript" src="js/addAmenities.js"></script>
<script type="application/javascript" src="js/jquery.form.js"></script>
<!-- `<script type="application/javascript" src="js/jquery.min.js"></script> -->

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <fieldset>
            <!-- <div class="container-fluid px-4 mt-5"> -->
            <div class="container-fluid px-4 mt-5">
                <div class="card" style="width:80%;">
                    <div class="card-header d-flex" style="font-size:25px; color:grey">
                        <span><strong>Manage Rooms - <?php echo $propertyName; ?>
                                <span style="color:red;font-size:12px;"></span>

                            </strong></span>
                        <!-- <span class="ms-auto"><a href="#addnew" data-bs-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span> -->

                        <span class="ms-auto"><a href="#addNewRoom" data-bs-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New</a></span>
                        <!-- <span class="ms-auto"><a href="#addnew" data-bs-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span> -->
                    </div>
                    <div style="height:50px;">
                        <!-- //Show error Mesage -->
                        <?php if (isset($_SESSION['message'])) : ?>
                            <div class="admin-msg mx-auto" id="admin-msg" style="color:green">
                                <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <table class="table ">
                            <thead>
                                <!-- <th>ID</th> -->
                                <th>Room Name</th>
                                <th>Room Type</th>
                                <th>Price</th>
                                <th>Deposit</th>
                                <!-- <th>Amenities</th> -->
                                <!-- <th>Vacancy</th> -->
                                <th width="20%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');
                                // $selectSQL = "select A.property_title, A.status, B.name as Location, C.name as Area from properties A, locations B, area C
                                // where a.location_id = b.id AND
                                // a.area_id = c.id";

                                $selectSQL = "SELECT a.id as room_id, a.name, b.name as roomtype, a.price_per_month, a.deposit FROM property_rooms a, room_types b
                                WHERE a.room_type = b.id
                                and a.property_id=" . $propertyId;

                                $query = mysqli_query($connection, $selectSQL);

                                if (mysqli_num_rows($query) > 0) {

                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <tr>
                                            <input type="hidden" name="rowroomid" id="rowroomid" value="<?php echo $row['room_id']; ?>">
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['roomtype']; ?></td>
                                            <td><?php echo $row['price_per_month']; ?></td>
                                            <td><?php echo $row['deposit']; ?></td>
                                            <!-- <td><a style="text-decoration:none!important;" href="" title="Rooms"><span style="background-color:#4863A0;border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Amenities</span></a></td> -->
                                            <!-- <td><a style="text-decoration:none!important;" href="" data-toggle="modal" title="Vacancy"><span style="background-color:#36454F;border-radius:5px;padding:3px;font-size:12px;text-transform:uppercase;color:white;">Vacancy</span></a></td> -->
                                            <!-- <td><a href="" data-toggle="modal" class="btn btn-primary btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Vacancy"><i class="fas fa-sm fa-calendar"></i></a></td> -->
                                            <td>


                                                <a href="managerooms.php?rid=<?php echo $row['room_id']; ?>" class="btn btn-status-positive btn-rounded btn-icon" title="Edit"><i class="fas fa-sm fa-edit"></i></a>
                                                <a href="" data-toggle="modal" class="btn btn-danger btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Delete"><i class="fas fa-sm fa-times"></i></a>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>
                                    <td colspan="5" style="text-align:center;color:red;">No Records Found</td>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                        <a href="ownerstaytypes.php" class="btn save action-button-cancel ml-auto" id="btnRoomBack" name="btnRoomBack" style="text-decoration:none">Back</a>
                        <form action="" name="formPID" id="formPID">
                            <input type="hidden" name="pid" id="pid">
                        </form>
                    </div> <!-- Card Body End -->


                </div>
                <!-- </div> -->
            </div>
            <!-- </div> -->
            <!-- </div> -->
            </fieldset>
        </main>
    </div>
</div>



<!-- Modal Dialogue boxes start  -->
<!-- Add New -->
<div class="modal fade" id="addNewRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <style>
                .select2-container {
                    z-index: 9999 !important;
                }
            </style>
            <script>

            </script>
            <div class="modal-header">

                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New Room</h4>
                </center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="">
                        <div class="row">
                            <!-- <label style="padding-left:0px!important;" for="txtStaytypeName" id="lblStayTypeName">Add New Room</label> -->
                            <!-- <input style="padding-left:0px!important;" type="text" name="txtStaytypeName" id="txtStaytypeName" placeholder="" value="" required /> -->
                        </div>
                        <div class="mt-2"></div>
                        <div class="row mb-2">
                            <!-- Room Id  -->
                            <input type="hidden" name="txtNewRoomId" id="txtNewRoomId">
                            <div class="col-3">
                                <label for="txtNewRoomName">Room Name<span class="text-danger">*</span></label><br>
                                <input type="text" id="txtNewRoomName" name="txtNewRoomName" placeholder="">
                            </div>
                            <div class="col-3">
                                <label for="cmbNewRoomType">Room Type<span class="text-danger">*</span></label>
                                <select class="list-dt" id="cmbNewRoomType" name="cmbNewRoomType">
                                    <option value="0">Select...</option>
                                    <?php
                                    $selectSQL = "SELECT * FROM room_types";

                                    $result = mysqli_query($connection, $selectSQL);

                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <option value="<?php echo $row['id']; ?>" has-value=<?php echo $row['value']; ?>><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                    } else { ?>
                                        <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-3" id="newBedCount" style="display:none">
                                <label for="txtNewDormitoryBedCount">Dormitory Bed Count<span class="text-danger">*</span></label>
                                <input type="text" id="txtNewDormitoryBedCount" name="txtNewDormitoryBedCount">
                            </div>
                            <div class="col-3">
                                <label for="cmbNewBedType">Bed Type<span class="text-danger">*</span></label>
                                <select class="list-dt" id="cmbNewBedType" name="cmbNewBedType">
                                <option value="0">Select...</option>
                                    <?php
                                    $selectSQL = "SELECT * FROM bed_types";

                                    $result = mysqli_query($connection, $selectSQL);

                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                    } else { ?>
                                        <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> <!-- End of Row -->
                        <div class="row">
                            <div class="col-3">
                                <label for="txtNewRoomPrice">Monthly Price<span class="text-danger">*</span></label>
                                <input type="text" id="txtNewRoomPrice" name="txtNewRoomPrice">
                            </div>
                            <div class="col-3">
                                <label for="txtNewRoomDeposit">Deposit<span class="text-danger">*</span></label>
                                <input type="text" id="txtNewRoomDeposit" name="txtNewRoomDeposit">
                            </div>
                            <div class="col-2 mt-auto">
                                <input class="form-check-input" type="checkbox" value="" id="chkNewRoomDepositRefundable" name="chkNewRoomDepositRefundable">

                                <label class="form-check-label" for="chkNewRoomDepositRefundable">
                                    Refundable<span class="text-danger">*</span>
                                </label>
                            </div>
                            <div class="col-2">
                                <label for="txtNewRoomCount">No. of Rooms<span class="text-danger">*</span></label>
                                <input type="text" id="txtNewRoomCount" name="txtNewRoomCount" value="">
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <div id="errmessage" class="mx-auto"></div>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" name="btnAddNewRoom" id="btnAddNewRoom" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal Dialogue boxes end -->

<?php
include 'includes/footer.php';
?>