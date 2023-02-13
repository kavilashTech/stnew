<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';

// Check if user has propertly logged in
// TODO : once login is created, remove comments from below block

$id = "";

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
	exit(0);
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $record = mysqli_query($connection, "SELECT * FROM property_category WHERE id=$id");

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $id = $n['id'];
        $categoryname = $n['categoryname'];
        $sortorder = $n['sortorder'];
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $categoryname = $_REQUEST['txtCategoryName'];

    $sortorder = $_POST['txtSortOrder'];

    mysqli_query($connection, "UPDATE property_category SET categoryname='$categoryname', sortorder='$sortorder' WHERE id=$id");
    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: staytypes.php');
}

if (isset($_POST['Add'])) {


    // echo "Add New Record";
    // exit(0);
    // $name = $_POST['id'];
    $categoryname = $_REQUEST['txtName'];

    $sortorder = $_POST['txtSortOrder'];

    $insertSql = "INSERT into property_category (categoryname, sortorder) VALUES ('" . $categoryname . "'," . $sortorder . ");";

    // echo $insertSql;
    // exit(0);
    mysqli_query($connection, $insertSql);

    $id = mysqli_insert_id($connection);
    
    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    // header('location: staytypes.php');
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
                            <span><strong>Manage Staytypes - Edit</strong></span>
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
                                    <label style="position:relative; top:7px;">Category Name<span style="color:red">*</span></label>
                                </div>

                                <div class="col-lg-10">
                                    <input type="text" name="txtCategoryName" id="txtCategoryName" class="form-control" value="<?php echo $categoryname;
                                                                                                    ?>" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Sort Order</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="txtSortOrder" id="txtSortOrder" class="form-control" value="<?php echo $sortorder;
                                                                                                    ?>">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer" style="float:right">
                            <a href="staytypes.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
                            <button type="submit" name="update" id="update" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </main>
</div>
</div>