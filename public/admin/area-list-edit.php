<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';

// global $location_id;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $record = mysqli_query($connection, "SELECT * FROM area WHERE id=$id");

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $id = $n['id'];
        $areaname = $n['name'];
        $status = $n['status'];
        $location_id = $n['location_id'];
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $areaname = $_REQUEST['txtName'];

    // $icon = $_POST['txtIcon'];
$updateSQL = "UPDATE area SET name='$areaname' WHERE id=" . $id;
// echo $updateSQL;
    mysqli_query($connection, $updateSQL);
    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: area-list.php?id='. $location_id );
}

if (isset($_POST['Add'])) {


    // echo "Add New Record";
    // exit(0);
    // $name = $_POST['id'];
    $areaname = $_REQUEST['txtName'];

    $location_id = $_POST['location_id'];

    $insertSql = "INSERT into area (location_id, name) VALUES (" . $location_id . ", '". $areaname . "');";
    // echo $insertSql;
    // exit(0);
    mysqli_query($connection, $insertSql);
    
    $id = mysqli_insert_id($connection);

    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=area-list.php">';
    header('location: area-list.php?id='. $location_id );
}

?>
 

<!-- Edit -->
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5">
                <!-- <div class="container"> -->
                <!-- <div style="height:50px;"></div> -->
                <div class="card" style="width:60%;">
                    <form method="POST">
                        <div class="card-header" style="font-size:25px; color:grey">
                            <span><strong>Manage Area - Edit</strong></span>
                            <!-- <span class="ms-auto"><a href="#addnew" data-toggle="modal" class="btn btn-primary btn-crud"><span class="glyphicon glyphicon-plus"></span> Add New</a></span> -->
                        </div>
                        <!-- <div style="height:10px;"></div> -->
                        <?php
                        // $edit = mysqli_query($connection, "select * from property_category where id='" . $row['id'] . "'");
                        // $erow = mysqli_fetch_array($edit);
                        ?>
                        <div class="card-body">

                            <input type="hidden" name="id" id="id" value="<?php echo $id;
                                                                            ?>">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Area Name<span style="color:red">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="txtName" id="txtName" class="form-control" value="<?php echo $areaname;
                                                                                                    ?>" required>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer" style="float:right">
                            <a href="area-list.php?id=1"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
                            <button type="submit" name="update" id="update" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </main>
</div>
</div>