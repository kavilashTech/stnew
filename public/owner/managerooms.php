<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';


$propertyTitle = "";
// Check if user has propertly logged in
//Check if we can use generic function

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
    exit(0);
}

//set Property Title
$propertyTitle = $_SESSION['PROPERTY_TITLE'];
//Property Id
if (isset($_REQUEST['pid'])) {

    $propertyId = $_REQUEST['pid'];
    $_SESSION['PROPERTY_ID'] = $propertyId;
} else if (isset($_SESSION['PROPERTY_ID'])) {

    $propertyId = $_SESSION['PROPERTY_ID'];
}
//Room Id
if (isset($_REQUEST['rid'])) {
    $rId = $_REQUEST['rid'];
    $_SESSION['ROOM_ID'] = $rId;
    $MODE = "EDIT";
} else {
    //RESET Session Variables;

    $_SESSION['ROOM_ID'] = "";


    $MODE = "NEW";
    $rId = "";
}


if ($MODE == "NEW") {

    //NEW MODE

    //Initialize Room Details
    $roomName = "";
    $roomDescription = "";
    $roomType = "";
    // $dormitoryBedCount = $row[''];
    $bedType = "";
    $noOfRooms = "";

    $price = "";
    $deposit = "";
    $refundable = 0;
} elseif ($MODE == "EDIT") {
    // EDIT Mode 


    $selectSQL = "SELECT a.*, b.name as roomtype, a.price_per_month, a.deposit FROM property_rooms a, room_types b
    WHERE a.room_type = b.id
    and a.property_id=" . $propertyId .
        " and a.id =" . $rId;

    // echo $selectSQL;
    // exit(0);

    $result = mysqli_query($connection, $selectSQL);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        //Room Details for this property
        $roomName = $row['name'];
        $roomDescription = $row['description'];
        $roomType = $row['room_type'];
        // $dormitoryBedCount = $row[''];
        $bedType = $row['bed_type'];
        $noOfRooms = $row['no_of_rooms'];

        $price = $row['price_per_month'];
        $deposit = $row['deposit'];
        $refundable = $row['refundable'];

        // echo ($roomName . ":" . $roomDescription . ":" . $roomType . ":" . $bedType . ":" . $noOfRooms . ":" . $price . ":" . $deposit . ":" . $refundable);
        // exit(0);



    } else {
        $_SESSION['message'] = "Could not Load Data. Contact Administrator";
    }
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
<script>
function onSaveValidate(saveMode) {
    if (saveMode == '1') {
        alert('NEW Room');

    } else if (saveMode == '2') {
        alert('UPDATE Room');
    }
    alert('None');

}
</script>


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
            <!-- <div class="container-fluid px-4 mt-5"> -->
            <div class="card" style="width:100%;">
                <div class="card-header d-flex" style="font-size:25px; color:grey">
                    <span><strong>Manage Rooms - <?php echo $propertyTitle; ?></strong></span>
                </div>
                <div>
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
                    <!-- Start ----- Add Step form in this space -->

                    <!-- MultiStep Form -->
                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 text-center p-0 mt-3 mb-2">
                                <!-- <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"> -->
                                <div class="card">
                                    <!-- <div class="card px-0 pt-4 pb-0 mt-3 mb-3"> -->
                                    <!-- <h2><strong>Sign Up Your User Account</strong></h2>
                    <p>Fill all form field to go to next step</p> -->
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <!-- <form id="msform"> -->
                                            <section>
                                                <!-- progressbar -->
                                                <div id="formbasicsuccess">
                                                    <script>

                                                    </script>
                                                </div>
                                                <!-- fieldsets -->

                                                <fieldset>
                                                    <form action="" method="Post" id="formRoomInfo" name="formRoomInfo">
                                                        <div class="form-card">
                                                            <h4 class="fs-title">Manage Rooms</h4>
                                                            <div class="mt-5"></div>
                                                            <div class="row mb-2">
                                                                <!-- Room Id  -->
                                                                <input type="hidden" value="<?php echo $rId; ?>" name="txtRoomId" id="txtRoomId">
                                                                <div class="col-4">
                                                                    <label for="txtRoomName">Room Name</label>
                                                                    <input type="text" id="txtRoomName" name="txtRoomName" placeholder="" value="<?php echo $roomName; ?>">
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="cmbRoomType">Room Type</label>
                                                                    <select class="list-dt" id="cmbRoomType" name="cmbRoomType">
                                                                        <option></option>
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
                                                                <div class="col-2" id="addBedCount" style="visibility:hidden">
                                                                    <label for="txtDormitoryBedCount">Dormitory Bed Count</label>
                                                                    <input type="text" id="txtDormitoryBedCount" name="txtDormitoryBedCount">
                                                                </div>
                                                                <div class="col-2">
                                                                    <label for="cmbBedType">Bed Type</label>
                                                                    <select class="list-dt" id="cmbBedType" name="cmbBedType">
                                                                        <option></option>
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
                                                                    <label for="txtRoomPrice">Monthly Price</label>
                                                                    <input type="text" id="txtRoomPrice" name="txtRoomPrice" value="<?php echo $price; ?>">
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="txtRoomDeposit">Deposit</label>
                                                                    <input type="text" id="txtRoomDeposit" name="txtRoomDeposit" value="<?php echo $deposit; ?>">
                                                                </div>
                                                                <div class="col-2 mt-auto">
                                                                    <input class="form-check-input" type="checkbox" value="" id="chkRoomDepositRefundable" name="chkRoomDepositRefundable" <?php echo ($refundable == 1) ? 'checked' : ''; ?>>

                                                                    <label class="form-check-label" for="chkRoomDepositRefundable">
                                                                        Refundable
                                                                    </label>
                                                                </div>
                                                                <div class="col-2">
                                                                    <label for="txtRoomCount">No. of Rooms</label>
                                                                    <input type="text" id="txtRoomCount" name="txtRoomCount" value="<?php echo $noOfRooms; ?>">
                                                                </div>
                                                            </div>
                                                            <hr>

                                                            <div class="row" id="roomAmenityRow" name="roomAmenityRow">
                                                                <div class="col-3">
                                                                    <label for="cmbRoomAmenity">Amenity</label>
                                                                    <select class="list-dt" id="cmbRoomAmenity" name="cmbRoomAmenity">
                                                                        <option selected value="0">Select Amenity ...</option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM amenities where level=1";

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
                                                                <div class="col-3">
                                                                    <label for="cmbRoomAmenityList">Amenity List</label>
                                                                    <select class="list-dt" id="cmbRoomAmenityList" name="cmbRoomAmenityList">
                                                                        <option value="0" selected>Select List ...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-3" id="addRoomAmenityValue" style="visibility:hidden">
                                                                    <label for="txtRoomAmenityValue">Value</label>
                                                                    <input type="text" name="txtRoomAmenityValue" id="txtRoomAmenityValue" placeholder="" />
                                                                </div>
                                                                <div class="col-2 mt-auto">
                                                                    <input type="button" class="btn btn-primary" id="addRoomAmenity" name="addRoomAmenity" style="width:50px!important" value="Add">
                                                                    <!-- <input type="button" class="btn btn-primary" id="addRoomAmenityTest" name="addRoomAmenityTest" style="width:50px!important" value="Add"> -->
                                                                    <!-- <span class="ms-auto"><a href="#addnew" data-bs-toggle="modal" class="btn btn-primary" id="addRoomAmenityTest" name="addRoomAmenityTest"><span class="glyphicon glyphicon-plus"></span> Add New</a></span> -->
                                                                </div>
                                                            </div>
                                                            <div class="row" id="roomAmenitiesTableRow" name="roomAmenitiesTableRow">
                                                                <!-- Paging test Start ---------------------------  -->
                                                                <style>
                                                                    /* body{width:600px;font-family:"Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;font-size:14px;} */
                                                                    .link {
                                                                        padding: 10px 15px;
                                                                        background: transparent;
                                                                        border: #bccfd8 1px solid;
                                                                        border-left: 0px;
                                                                        cursor: pointer;
                                                                        color: #607d8b
                                                                    }

                                                                    .disabled {
                                                                        cursor: not-allowed;
                                                                        color: #bccfd8;
                                                                    }

                                                                    .current {
                                                                        background: #bccfd8;
                                                                    }

                                                                    .first {
                                                                        border-left: #bccfd8 1px solid;
                                                                    }

                                                                    /* .question {font-weight:bold;border:1px solid red;} */
                                                                    .tblData {
                                                                        width: 50%;
                                                                        position: relative;
                                                                    }

                                                                    /* .tblData {background-color: yellow;} */
                                                                    .answer {
                                                                        padding-top: 10px;
                                                                        border: 1px solid red;
                                                                    }

                                                                    #pagination {
                                                                        margin-top: 20px;
                                                                        padding-top: 30px;
                                                                        border-top: #F0F0F0 1px solid;
                                                                    }

                                                                    .dot {
                                                                        padding: 10px 15px;
                                                                        background: transparent;
                                                                        border-right: #bccfd8 1px solid;
                                                                    }

                                                                    #overlay {
                                                                        background-color: rgba(0, 0, 0, 0.6);
                                                                        z-index: 999;
                                                                        position: absolute;
                                                                        left: 0;
                                                                        top: 0;
                                                                        width: 100%;
                                                                        height: 100%;
                                                                        display: none;
                                                                    }

                                                                    #overlay div {
                                                                        position: absolute;
                                                                        left: 50%;
                                                                        top: 50%;
                                                                        margin-top: -32px;
                                                                        margin-left: -32px;
                                                                    }

                                                                    .page-content {
                                                                        padding: 20px;
                                                                        margin: 0 auto;
                                                                    }

                                                                    .pagination-setting {
                                                                        padding: 10px;
                                                                        margin: 5px 0px 10px;
                                                                        border: #bccfd8 1px solid;
                                                                        color: #607d8b;
                                                                    }
                                                                </style>
                                                                <script>
                                                                    function getresult(url) {
                                                                        $.ajax({
                                                                            url: url,
                                                                            type: "GET",
                                                                            data: {
                                                                                rowcount: $("#rowcount").val(),
                                                                                "pagination_setting": $("#pagination-setting").val()
                                                                            },
                                                                            beforeSend: function() {
                                                                                $("#overlay").show();
                                                                            },
                                                                            success: function(data) {
                                                                                $("#pagination-result").html(data);
                                                                                setInterval(function() {
                                                                                    $("#overlay").hide();
                                                                                }, 500);
                                                                            },
                                                                            error: function() {}
                                                                        });
                                                                    }

                                                                    function changePagination(option) {
                                                                        if (option != "") {
                                                                            getresult("getroomresult.php");
                                                                        }
                                                                    }
                                                                </script>
                                                                <!-- <div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div> -->
                                                                <div class="page-content">
                                                                    <!-- <div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
	Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
	<option value="all-links">Display All Page Link</option>
	<option value="prev-next">Display Prev Next Only</option>
	</select>
	</div> -->

                                                                    <div id="pagination-result">
                                                                        <input type="hidden" name="rowcount" id="rowcount" />
                                                                    </div>
                                                                </div>


                                                                <script>
                                                                    <?php if ($_SESSION['ROOM_ID'] != "") { ?>
                                                                        getresult("getroomresult.php");
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </script>


                                                                <!-- Paging test End ---------------------------  -->
                                                            </div>


                                                        </div>
                                                        <input type="hidden" id="manageRooms" name="manageRooms">

                                                        <button class="save action-button-save ml-auto" id="btnRoomSave" name="btnRoomSave" onclick:onSaveValidate('1');>Save</button>
                                                        <a href="propertyrooms.php" class="save action-button-cancel ml-auto" id="btnRoomBack" name="btnRoomBack" style="text-decoration:none">Back</a>
                                                        <script>
                                                            jQuery(window).on("load", function() {
                                                                setTimeout(function() {
                                                                    $('#cmbRoomType')
                                                                        .val(<?php echo $roomType ?>)
                                                                        .trigger('change');
                                                                    $('#cmbBedType')
                                                                        .val(<?php echo $bedType ?>)
                                                                        .trigger('change');


                                                                }, 100);


                                                            });
                                                        </script>

                                                    </form>
                                                </fieldset>




                                            </section>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End ----- Add Step form in this space -->
                </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </main>
    </div>
</div>


<?php
include 'includes/footer.php';
?>