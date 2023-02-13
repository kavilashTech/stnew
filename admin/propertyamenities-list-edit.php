<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;


    $selectSQL = "SELECT * FROM amenities_list WHERE id=" . $id;
    // echo $selectSQL;
    // exit(0);
    $record = mysqli_query($connection, $selectSQL);

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $id = $n['id'];
        $amenityname = $n['name'];

        $value = $n['value'];



    } else {
        $_SESSION['errmessage'] = "Error during Amenities Edit";
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $amenityname = $_REQUEST['txtAmenityName'];

    if (isset($_REQUEST['chkValue'])){
        $value = 1;
    }else {
        $value = 0;
    }
    

    // $type = $_REQUEST['chkType'];
    // $level = $_REQUEST['chkLevel'];


    // $slug = $_POST['txtSlug'];
    // $icon = $_POST['txtIcon'];
    $updateSQL = "UPDATE amenities_list SET name='" . $amenityname . "', value='" . $value . "' WHERE id=" . $id;
    // echo($updateSQL);
    // exit(0);
    mysqli_query($connection, $updateSQL);
    
//TODO : Check mysqli_query alternative style coding

    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: propertyamenities-list.php');
}

if (isset($_POST['Add'])) {

    // $name = $_POST['id'];

    if (isset($_SESSION['MAIN_AMENITY_ID'])){
        $mainAmenityId = $_SESSION['MAIN_AMENITY_ID'];
        // echo $mainAmenityId . "  MAIN ID ";
        // exit(0);
    }


    $amenitylistname = $_REQUEST['txtName'];

    if (isset($_REQUEST['chkValue'])) {
        $value = 1;
    } else {
        $value = 0;
    }

    //Explitly set Level to Property. Field default is 0 zero.
    $level = 0;


    $insertSql = "INSERT into amenities_list (name, amenity_id, value ) VALUES ('" . $amenitylistname .  "'," . $mainAmenityId .  ", " . $value . ");";

    // echo $insertSql;
    // exit(0);
    mysqli_query($connection, $insertSql);

    $id = mysqli_insert_id($connection);

    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: propertyamenities-list.php');
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
                            <span><strong>Property Amenities List - Edit</strong></span>
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
                                <div style="height:10px;"></div>
                                <div class="col-3">Value Option</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="chkValue" id="chkValue" <?php echo (($value==1)?"checked":"") ?>>
                                    </div>
                                </div>
                                <div class="col-7">Owner can provide value for this amenity</div>
                            </div>
                        </div>

                        <div class="card-footer" style="float:right">
                            <a href="propertyamenities-list.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
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