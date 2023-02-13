<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';


// The Property based files will handle only Property level amenities with the value level = 0 in amenities table.


//Check if user has propertly logged in
// TODO : once login is created, remove comments from below block
// if (!isset($_SESSION["uid"])) {
// 	echo '<meta http-equiv="Refresh" content="0; url=index.php">';
// 	exit(0);
// }

// id, name, level, show_in_detail, type, icon

?>

<style>
    .admin-msg {
        width: 300px;
        background-color: rgb(1, 73, 1) !important;
        color: #fff !important;
        text-align: center;
        font-weight: bold;
    }
</style>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5">
                <div class="card" style="width:80%;">
                    <div class="card-header d-flex" style="font-size:25px; color:grey">
                        <span><strong>Amenities - Property Level</strong></span>
                        <span class="ms-auto"><a href="#addnew" data-bs-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
                    </div>
                    <div style="height:50px;">
                        <!-- //Show success Mesage -->
                        <?php if (isset($_SESSION['message'])) : ?>
                            <div class="admin-msg mx-auto" id="admin-msg" style="color:green">
                                <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <!-- //Show error Mesage -->
                    <div>
                        <?php if (isset($_SESSION['errmessage'])) : ?>
                            <div class="admin-msg mx-auto" id="admin-msg" style="color:red">
                                <?php
                                echo $_SESSION['errmessage'];
                                unset($_SESSION['errmessage']);
                                ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-crud">
                            <thead>
                                <!-- <th>Id</th> -->
                                <th width="20%">Name</th>
                                <th>Show in Detail<BR><Span style="font-size:10px;">Show in Property Detail</Span></th>
                                <th>Type<BR><Span style="font-size:10px;">Single or Multiple</Span></th>
                                <th width="10%">Icon</th>
                                <th width="20%">Action</th>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="color:red;font-size:12px;">
                                        Note : The Type will decide whether the Owner can select single or multiple options
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                // Show only property level amenities
                                $query = "select * from `amenities` where level=0";
                                 $result = mysqli_query($connection, $query);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <tr>
                                            <!-- <td><?php //echo $row['id']; 
                                                        ?></td> -->
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo ($row['show_in_detail'] == 1 ? 'Yes' : 'No'); ?></td>
                                            <td><?php echo ($row['type'] == 0 ? 'Single' : 'Multiple'); ?></td>
                                            <td><img src="assets/img/icons8-image-96.png" width="40px"></td>
                                            <!-- <td><?php //echo $row['icon']; 
                                                        ?></td> -->
                                            <td>
                                                <a href="propertyamenities-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-status-positive btn-rounded btn-icon" title="Edit"><i class="fas fa-sm fa-edit"></i></a>
                                                <a href="propertyamenities-list.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-rounded btn-icon" title="Amenities List"><i class="fas fa-sm fa-list"></i></a>
                                                <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Delete"><i class="fas fa-sm fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>
                                    <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </main>
    </div>
</div>
<!-- Modal Dialogue boxes start -->
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New</h4>
                </center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="propertyamenities-edit.php">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="control-label" style="position:relative; top:7px;">Name</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="txtName">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="control-label" style="position:relative; top:7px;">Icon</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="txtIcon">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div style="height:10px;"></div>
                            <!-- <div class="col-3">Multiple Selection</div> -->
                            <div class="col-5">Show in Detail</div>
                            <div class="col-2">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="chkShowInDetail" id="chkShowInDetail">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div style="height:10px;"></div>
                            <!-- <div class="col-3">Multiple Selection</div> -->
                            <div class="col-5">Multiple Choice</div>
                            <div class="col-2">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="chkType" id="chkType">
                                </div>
                            </div>

                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="Add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal Dialogue boxes end -->

<script type="application/javascript">
    $('#admin-msg').delay(5000).fadeOut(300);
</script>

<?php
include 'includes/footer.php';
?>