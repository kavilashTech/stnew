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
    $location_id = $_GET['id'];
    // $update = true;

    // $record = mysqli_query($connection, "SELECT id, name FROM area WHERE id=$location_id");
    $selectSQL = "select A.name as location, B.id, B.name from locations A, area B
    where a.id = b.location_id
    and b.location_id=" . $location_id;
    $record = mysqli_query($connection, $selectSQL );

     echo $selectSQL;
    // exit(0);

    if (mysqli_num_rows($record) == 1) {
        $n = mysqli_fetch_array($record);
        // $id = $n['id'];
        $locationname = $n['location'];
        $area_id = $n['id'];
        // $icon = $n['icon'];
    }
else {
    $locationname = "Not available";
}    
}

?>

<style>
.admin-msg{
    width:300px;
    background-color: rgb(1, 73, 1)!important;
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
                        <span><strong>Area List</strong> - <?PHP  echo $locationname;  ?></span>
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
                                <th width="5%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');
                                // $sqlSelect = "SELECT B.id, B.name FROM `area` A, `arealist` B WHERE B.area_id = a.id AND a.id=" . $area_id;
                                $sqlSelect = "SELECT id, name FROM `area` WHERE location_id=" . $location_id;
                                // echo '<td>' . $sqlSelect . '</td>'; 
                                // exit(0);
                                $record = mysqli_query($connection, $sqlSelect);

                                if (mysqli_num_rows($record) > 0) {

                                while ($row = mysqli_fetch_array($record)) {
                                ?>
                                    <tr>
                                        <!-- <td><?php echo $row['id']; ?></td> -->
                                        <td><?php echo $row['name']; ?></td>
                                        <td>
                                            <a href="area-list-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-status-positive btn-rounded btn-icon" title="Edit" ><i class="fas fa-sm fa-edit"></i></a>
                                            <!-- <a href="amenities-list.php?edit=<?php //echo $row['id']; ?>" class="btn btn-primary btn-rounded btn-icon" title="Ameties List" ><i class="fas fa-sm fa-list"></i></a> -->
                                            <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-status-negative btn-rounded btn-icon" title="Delete" ><i class="fas fa-sm fa-times"></i></a>
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
                    <div class="card-footer">
                    <a href="locations.php"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Back</button></a>
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
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="area-list-edit.php">
                    <input type="hidden" name="location_id" value="<?php echo $location_id; ?>">
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Area Name</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="txtName">
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