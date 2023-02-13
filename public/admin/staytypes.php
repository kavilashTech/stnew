<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';



// Check if user has propertly logged in
// TODO : once login is created, remove comments from below block

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
	exit(0);
}


?>

<!-- TODO : Bed type should be part of Room Level Amenities and code should be similar to Bathroom and Bathroom List -->

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
                <div class="card" style="width:80%;">
                    <div class="card-header d-flex" style="font-size:25px; color:grey">
                        <span><strong>Manage Staytype</strong></span>
                        <!-- <span class="ms-auto"><a href="staytypes-edit.php?Add=1"  name="Add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span> -->
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
                        <table class="table ">
                            <thead>
                                <!-- <th>Id</th> -->
                                <th>Name</th>
                                <th>Sort Order</th>
                                <th width="20%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');

                                $query = mysqli_query($connection, "select * from `property_category` ORDER BY sortorder");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <!-- <td><?php echo $row['id']; ?></td> -->
                                        <td><?php echo $row['categoryname']; ?></td>
                                        <td><?php echo $row['sortorder']; ?></td>
                                        <td>
                                            <a href="staytypes-edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-status-positive btn-rounded btn-icon" title="Edit" ><i class="fas fa-sm fa-edit"></i></a>
                                            <a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Delete" ><i class="fas fa-sm fa-times"></i></a>
                                        </td>
                                    </tr>
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
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="staytypes-edit.php">
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
							<label class="control-label" style="position:relative; top:7px;">Sort Order</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="txtSortOrder">
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