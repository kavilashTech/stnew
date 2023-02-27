<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';

//Explitly set Level to room. Field default is 0 zero.
$roomlevel = 1;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;


    $selectSQL = "SELECT * FROM amenities WHERE level=" . $roomlevel . " and id=" . $id;
    // echo $selectSQL;
    // exit(0);
    $record = mysqli_query($connection, $selectSQL);

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $id = $n['id'];
        $amenityname = $n['name'];
        $type = $n['type'];
        $showindetail = $n['show_in_detail'];
        $icon = $n['icon'];
    } else {
        $_SESSION['errmessage'] = "Error during Amenities Edit";
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $amenityname = $_REQUEST['txtAmenityName'];

    if (isset($_REQUEST['chkType'])) {
        $type = 1;
    } else {
        $type = 0;
    }

    if (isset($_REQUEST['chkShowInDetail'])) {
        $showindetail = 1;
    } else {
        $showindetail = 0;
    }
    // $type = $_REQUEST['chkType'];
    // $level = $_REQUEST['chkLevel'];


    // $slug = $_POST['txtSlug'];
    $icon = $_POST['txtIcon'];
    $updateSQL = "UPDATE amenities SET name='" . $amenityname . "', type=" . $type . ", show_in_detail=" . $showindetail . ", icon='" . $icon . "' WHERE id=" . $id;
    // echo($updateSQL);
    // exit(0);
    mysqli_query($connection, $updateSQL);

    //TODO : Check mysqli_query alternative style coding

    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: roomamenities.php');
}


if (isset($_POST['Add'])) {


    // echo "Add New Record";
    // exit(0);
    // $name = $_POST['id'];
    $amenityname = $_REQUEST['txtName'];
    $icon = $_POST['txtIcon'];

    if (isset($_REQUEST['chkShowInDetail'])) {
        $showindetail = 1;
    } else {
        $showindetail = 0;
    }

    if (isset($_REQUEST['chkType'])) {
        $type = 1;
    } else {
        $type = 0;
    }

    // $showindetail = 

    
    

    $insertSql = "INSERT into amenities (name, level, icon, show_in_detail, type ) VALUES ('" . $amenityname .  "'," . $roomlevel .  ", '" . $icon . "'," . $showindetail . ", " . $type . ");";

    // echo $insertSql;
    // exit(0);
    mysqli_query($connection, $insertSql);

    $id = mysqli_insert_id($connection);

    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: roomamenities.php');
}

?>


<!-- Edit -->
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5">
                <div class="card" style="width:60%;">
                    <form method="POST">
                        <div class="card-header" style="font-size:25px; color:grey">
                            <span><strong>Room Amenities - Edit</strong></span>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id" id="id" value="<?php echo $id;
                                                                            ?>">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Amenity Name<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="txtAmenityName" id="txtAmenityName" class="form-control" value="<?php echo $amenityname;
                                                                                                                                ?>" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Icon</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="txtIcon" id="txtIcon" class="form-control" value="<?php echo $icon;
                                                                                                                ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div style="height:10px;"></div>
                                <div class="col-3">Show in Property Detail</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="chkShowInDetail" id="chkShowInDetail" <?php echo (($showindetail == 1) ? "checked" : "") ?>>
                                    </div>
                                </div>
                                <div class="col-7">Check this to show the Amenity in the Property Details page Header Section.</div>
                            </div>

                            <div class="row">
                                <div style="height:10px;"></div>
                                <div class="col-3">Multiple Selection</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="chkType" id="chkType" <?php echo (($type == 1) ? "checked" : "") ?>>
                                    </div>
                                </div>
                                <div class="col-7">Owner can select multiple options</div>
                            </div>
                        </div>

                        <div class="card-footer" style="float:right">
                            <a href="roomamenities.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
                            <button type="submit" name="update" id="update" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
</main>
</div>
</div>