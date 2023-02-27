<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';

//Check if user has propertly logged in
// TODO : once login is created, remove comments from below block
// if (!isset($_SESSION["uid"])) {
// 	echo '<meta http-equiv="Refresh" content="0; url=index.php">';
// 	exit(0);
// }

if (isset($_GET['id'])) {
    $amenity_id = $_GET['id'];
    // $update = true;
    $selectSQL = "SELECT id, name FROM amenities WHERE id=" . $amenity_id;
    // echo $selectSQL;
    // exit(0);
    $record = mysqli_query($connection, $selectSQL);

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $main_amenity_id = $n['id'];
        $amenity_name = $n['name'];
        $_SESSION['MAIN_AMENITY_ID'] = $main_amenity_id;
    }
} else if(isset($_SESSION['MAIN_AMENITY_ID']))
{
    // echo $_SESSION['MAIN_AMENITY_ID'];
    $main_amenity_id = $_SESSION['MAIN_AMENITY_ID'];

    $selectSQL = "SELECT id, name FROM amenities WHERE id=" . $main_amenity_id;
    $record = mysqli_query($connection, $selectSQL);
    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        $main_amenity_id = $n['id'];
        $amenity_name = $n['name'];
        $_SESSION['MAIN_AMENITY_ID'] = $main_amenity_id;
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
</style>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5">
                <div class="card" style="width:60%;">
                    <div class="card-header d-flex" style="font-size:25px; color:grey">
                        <span><strong>Manage Amenities List</strong> - <?PHP echo $amenity_name;  ?></span>
                        <span class="ms-auto"><a href="#addnew" data-bs-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
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
                        <table class="table table-striped table-bordered table-hover table-crud">
                            <thead>
                                <!-- <th>Id</th> -->
                                <th width="20%">Name</th>
                                <th width="5%">Value</th>
                                <th width="5%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');
                                $sqlSelect = "SELECT B.id, B.name, B.value FROM `amenities` A, `amenities_list` B WHERE B.amenity_id = A.id AND A.id=" . $main_amenity_id;
                                // echo '<td>' . $sqlSelect . '</td>'; 
                                // exit(0);
                                $query = mysqli_query($connection, $sqlSelect);
                                
                                if (mysqli_num_rows($query) > 0) {

                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <!-- <td><?php echo $row['id']; ?></td> -->
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo ($row['value'] == 1) ? 'Yes' : 'No'; ?></td>
                                        <td>
                                            <a href="propertyamenities-list-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-status-positive btn-rounded btn-icon" title="Edit"><i class="fas fa-sm fa-edit"></i></a>
                                            <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-status-negative btn-rounded btn-icon" title="Delete"><i class="fas fa-sm fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }else { ?>
                                <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                <?php
                            }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="propertyamenities.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Back</button></a>
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
                    <form method="POST" action="propertyamenities-list-edit.php">
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
                            <div style="height:10px;"></div>
                            <!-- <div class="col-3">Multiple Selection</div> -->
                            <div class="col-5">Value Allowed</div>
                            <div class="col-2">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="chkValue" id="chkValue">
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