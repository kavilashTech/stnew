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
<script type='text/javascript'>
// $("#yourLink").click(function(e){
function myFunc(pid){
    alert(pid);
    document.getElementById("pid").value = pid;
    document.getElementById("formPID").action = "staytypes.php";
    document.getElementById("formPID").method = "GET";
    document.getElementById("formPID").submit();
    return false;
// document.getElementById('currentPID').valu

}
    
//do what ever you want...

</script>


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
                        <span><strong>Staytypes
                                <span style="color:red;font-size:12px;"></span>

                            </strong></span>
                        <!-- <span class="ms-auto"><a href="#addnew" data-bs-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span> -->

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
                                <!-- <th>ID</th> -->
                                <th>Title</th>
                                <th>Location</th>
                                <th>Area</th>
                                <th>Status</th>
                                <th>Vacancy</th>
                                <th width="20%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');
                                // $selectSQL = "select A.property_title, A.status, B.name as Location, C.name as Area from properties A, locations B, area C
                                // where a.location_id = b.id AND
                                // a.area_id = c.id";

                                $selectSQL = "SELECT m.*, COALESCE(f1.name, 'NULL') AS Location, COALESCE(f2.name, 'NULL') AS Area
                                    FROM properties m
                                    LEFT JOIN locations f1
                                    ON m.location_id = f1.id
                                    LEFT JOIN area f2
                                    ON m.area_id = f2.id";

                                $query = mysqli_query($connection, $selectSQL);

                                if (mysqli_num_rows($query) > 0) {

                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <tr>
                                            <!-- <td><input type="text" name="rowpid" id="rowpid" value="<?php //echo $row['id']; ?>"></td> -->
                                            <td><?php echo $row['property_title']; ?></td>
                                            <td><?php echo $row['Location']; ?></td>
                                            <td><?php echo $row['Area']; ?></td>
                                            <?php if ($row['status'] == 2) {
                                                $status = "Approved";
                                            } elseif ($row['status'] == 1) {
                                                $status = "Pending Approval";
                                            } elseif ($row['status'] == 0) {
                                                $status = "In Progress";
                                            } elseif ($row['status'] == 3) {
                                                $status = "Rejected";
                                            } ?>

                                            <td><?php echo $status; ?></td>
                                            <td><a href="" data-toggle="modal" class="btn btn-primary btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Vacancy"><i class="fas fa-sm fa-calendar"></i></a></td>
                                            <td>


                                                <a href="#" onclick=myFunc(<?php echo $row['id']; ?>) class="btn btn-status-positive btn-rounded btn-icon" title="Edit"><i class="fas fa-sm fa-edit"></i></a>
                                                <a href="" data-toggle="modal" class="btn btn-danger btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Delete"><i class="fas fa-sm fa-times"></i></a>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>
                                    <td colspan="5" style="text-align:center;color:red;">No Records Found</td>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                        <form action="" name="formPID" id="formPID">
                            <input type="hidden" name="pid" id="pid">
                        </form>
                    </div> <!-- Card Body End -->


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
                    <h4 class="modal-title" id="myModalLabel">Add New Staytype</h4>
                </center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addnewproperty.php">
                        <div class="row">
                            <label style="padding-left:0px!important;" for="txtStaytypeName" id="lblStayTypeName">Staytype name</label>
                            <input style="padding-left:0px!important;" type="text" name="txtStaytypeName" id="txtStaytypeName" placeholder="" value="" required />
                        </div>
                        <div class="mt-2"></div>
                            <label style="padding-left:0px!important;" for="cmbStaytypeCategory">Category</label>
                            <select  class="" id="cmbStaytypeCategory1" name="cmbStaytypeCategory1" style="width:100%">
                                <option></option>
                                <?php
                                $selectSQL = "SELECT * FROM property_category ORDER BY sortorder";

                                $result = mysqli_query($connection, $selectSQL);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['categoryname']; ?></option>
                                    <?php
                                    }
                                } else { ?>
                                    <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                <?php
                                }
                                ?>
                            </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="btnAddProperty" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
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