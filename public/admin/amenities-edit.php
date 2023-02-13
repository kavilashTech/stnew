<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $record = mysqli_query($connection, "SELECT * FROM amenities WHERE id=$id");

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $id = $n['id'];
        $categoryname = $n['categoryname'];
        $slug = $n['slug'];
        $icon = $n['icon'];
    }
}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $categoryname = $_REQUEST['txtCategoryName'];

    $slug = $_POST['txtSlug'];
    $icon = $_POST['txtIcon'];

    mysqli_query($connection, "UPDATE property_category SET categoryname='$categoryname', slug='$slug' , icon='$icon' WHERE id=$id");
    $_SESSION['message'] = "Record updated!";
    // echo $_SESSION['message'];
    // echo '<meta http-equiv="Refresh" content="0; url=staytypes.php">';
    header('location: staytypes.php');
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
                            <span><strong>Amenities - Edit</strong></span>
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
                                    <input type="text" name="txtCategoryName" id="txtCategoryName" class="form-control" value="<?php echo $name;
                                                                                                                                ?>" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label style="position:relative; top:7px;">Slug</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="txtSlug" id="txtSlug" class="form-control" value="<?php echo $slug;
                                                                                                                ?>">
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
                                <div class="col-3">Property Level</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>     -->
                                        <input class="form-check-input" type="checkbox" id="chkPropertyLevel" >
                                    </div>
                                </div>
                                <div class="col-7">Check this to make the Amenity a Property Level Amenity.<br><span style="font-size:small">(Default is room level)</span></div>
                            </div>
                            <div class="row">
                                <div style="height:10px;"></div>
                                <div class="col-3">Show in Header</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>     -->
                                        <input class="form-check-input" type="checkbox" id="chkShowInHeader" >
                                    </div>
                                </div>
                                <div class="col-7">Check this to show the Amenity in the Property Details page Header Section.</div>
                            </div>

                            <div class="row">
                                <div style="height:10px;"></div>
                                <div class="col-3">Room Block</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>     -->
                                        <input class="form-check-input" type="checkbox" id="chkRoomBlock" checked>
                                    </div>
                                </div>
                                <div class="col-7">Show this amenity in Room Block</div>
                            </div>
                            <div class="row">
                                <div style="height:10px;"></div>
                                <div class="col-3">Show Choices</div>
                                <div class="col-2">
                                    <div class="form-check ">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>     -->
                                        <input class="form-check-input" type="checkbox" id="chkShowChoices" >
                                    </div>
                                </div>
                                <div class="col-7">Show the available choices for the Amenity</div>
                            </div>
                        </div>
                <!-- </div> -->

                <div class="card-footer" style="float:right">
                    <a href="amenities.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
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