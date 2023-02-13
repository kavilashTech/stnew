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
                <div class="card" style="width:80%;">
                    <div class="card-header d-flex" style="font-size:25px; color:grey">
                        <span><strong>Bed Types</strong></span>
                        <span class="ms-auto"><a href="#addnew" data-toggle="modal" class="btn btn-primary btn-crud"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>icon</th>
                                <th width="20%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');

                                $query = mysqli_query($connection, "select * from `am`");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['categoryname']; ?></td>
                                        <td><?php echo $row['icon']; ?></td>
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


<script type="application/javascript">
$('#admin-msg').delay(5000).fadeOut(300);
    </script>

<?php
include 'includes/footer.php';
?>