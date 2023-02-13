<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';



// Check if user has propertly logged in
//Check if we can use generic function

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
    exit(0);
}


if (isset($_REQUEST['pid'])) {

    $propertyId = $_REQUEST['pid'];
    $_SESSION['PROPERTY_ID'] = $propertyId;
} else if (isset($_SESSION['PROPERTY_ID'])) {

    $propertyId = $_SESSION['PROPERTY_ID'];
}

$selectSQL = "select * from properties where id = " . $propertyId;
// echo $selectSQL;
// exit(0);

$result = mysqli_query($connection, $selectSQL);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    //BASIC TAB
    $propertyName = $row['property_title'];
    $category_id = $row['category_id'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $locationId = $row['location_id'];
    $areaId = $row['area_id'];
    $pincode = $row['pincode'];
    $mobile1 = $row['mobile1'];
    $mobile2 = $row['mobile2'];
    $salientFeatures = $row['salient_features'];

    //DESCRIPTION Tab
    $shortDescription = $row['short_description'];
    $description = $row['description'];

$policy = $row['policy'];


} else {
    $_SESSION['message'] = "Could not Load Data. Contact Administrator";
}

?>

<!-- TODO : Bed type should be part of Room Level Amenities and code should be similar to Bathroom and Bathroom List -->

<style>
    .admin-msg {
        width: 300px;
        background-color: rgb(1, 73, 1) !important;
        color: #fff !important;
        text-align: center;
        font-weight: bold;
    }

    .table-time tr td {
        padding: 10px;
        color: black !important;

    }
</style>


<link rel="stylesheet" href="css/multi-form.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.js"></script>


<script type="application/javascript" src="js/multi-form.js"></script>
<script type="application/javascript" src="js/addAmenities.js"></script>
<script type="application/javascript" src="js/jquery.form.js"></script>
<!-- `<script type="application/javascript" src="js/jquery.min.js"></script> -->

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <!-- <div class="container-fluid px-4 mt-5"> -->
            <div class="card" style="width:100%;">
                <div class="card-header d-flex" style="font-size:25px; color:grey">
                    <span><strong>Add Staytype</strong></span>
                </div>
                <div>
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
                    <!-- Start ----- Add Step form in this space -->

                    <!-- MultiStep Form -->
                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 text-center p-0 mt-3 mb-2">
                                <!-- <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"> -->
                                <div class="card">
                                    <!-- <div class="card px-0 pt-4 pb-0 mt-3 mb-3"> -->
                                    <!-- <h2><strong>Sign Up Your User Account</strong></h2>
                    <p>Fill all form field to go to next step</p> -->
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <!-- <form id="msform"> -->
                                            <section>
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Basic</strong></li>
                                                    <li id="Description"><strong>Description</strong></li>
                                                    <li id="Amenities"><strong>Amenities</strong></li>
                                                    <li id="Media"><strong>Media</strong></li>
                                                    <li id="Rooms"><strong>Rooms</strong></li>
                                                    <li id="Worktime"><strong>Work Time</strong></li>
                                                    <li id="Terms"><strong>Terms</strong></li>
                                                    <li id="Acceptance"><strong>Acceptance</strong></li>
                                                    <!-- <li id="confirm"><strong>Finish</strong></li> -->
                                                </ul>
                                                <div id="formbasicsuccess">
                                                    <script> 
                                                
                                                    </script>
                                                </div>
                                                <!-- fieldsets -->
                                                <fieldset id="fsBasic">
                                                    <form action="" method="Post" id="formbasic" name="formbasic">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Basic Information</h2>
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <label for="txtStaytypeName" id="lblStayTypeName">Staytype name</label>
                                                                    <input type="text" name="txtStaytypeName" id="txtStaytypeName" placeholder="" value="<?php echo $propertyName ?>" required />
                                                                    <input type="hidden" name="txtStaytypeId" id="txtStaytypeId" placeholder="" value="<?php echo $propertyId ?>" required />

                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="cmbStaytypeCategory">Category</label>
                                                                    <select class="list-dt" id="cmbStaytypeCategory" name="cmbStaytypeCategory">
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
                                                                    <script>
                                                                        document.getElementById('cmbStaytypeCategory').selectedIndex = <?php echo $category_id ?>
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="txtAddress1">Address</label>
                                                                    <input type="text" name="txtAddress1" placeholder="" value="<?php echo $address1 ?>" />
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="txtAddress2">Address 2</label>
                                                                    <input type="text" name="txtAddress2" placeholder="" value="<?php echo $address2 ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-3">
                                                                    <label for="cmbLocation">Location</label>
                                                                    <select class="list-dt" id="cmbLocation" name="cmbLocation">
                                                                        <option></option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM locations";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Area Dropdown - Dependent on Location Selection -->
                                                                <!-- Area Dropdown - Dependent on Location Selection -->
                                                                <div class="col-3">
                                                                    <label for="cmbArea">Area</label>
                                                                    <select class="list-dt" id="cmbArea" name="cmbArea">
                                                                        <option></option>

                                                                    </select>
                                                                </div>
                                                                <!-- END Area Dropdown - Dependent on Location Selection -->
                                                                <div class="col-3">
                                                                    <label for="txtPincode">Pincode</label>
                                                                    <input type="text" name="txtPincode" placeholder="" value="<?php echo $pincode ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="txtPhone">Phone</label>
                                                                    <input type="text" name="txtPhone" placeholder="" value="<?php echo $mobile1 ?>" />
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="txtAlternatePhone">Alternate Phone</label>
                                                                    <input type="text" name="txtAlternatePhone" placeholder="" value="<?php echo $mobile2 ?>" />
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="cmbExclusivity">Exclusivity</label>
                                                                    <select class="list-dt" id="cmbExclusivity" name="cmbExclusivity">
                                                                        <option></option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM exclusivity";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

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
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <label for="tareaSalientFeatures">Salient Features</label>
                                                                    <textarea name="tareaSalientFeatures" id="tareaSalientFeatures" cols="30" rows="3"><?php echo $salientFeatures ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="tabBasic" name="tabBasic" value="">

                                                        <input type="button" name="next" id="btnBasic" class="next action-button " value="Next Step" />
                                                        <button class="save action-button-save ml-auto" id="save">Save</button>
                                                    </form>
                                                </fieldset>
                                                <fieldset id="fsDesc">
                                                    <form action="" method="Post" id="formDescription" name="formDescription">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Property Description</h2>
                                                            <div class="mt-10">&nbsp;</div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="tareaShortDescription">Short Description of Property</label>
                                                                    <textarea name="tareaShortDescription" id="tareaShortDescription" cols="30" rows="3"><?php echo $shortDescription ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="tareaLongDescription">Full Description of Property</label>
                                                                    <textarea name="tareaLongDescription" id="tareaLongDescription" cols="30" rows="10"><?php echo $description ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="formDescriptionsuccess"></div>
                                                        <input type="hidden" id="tabDesc" name="tabDesc">
                                                        <input type="button" name="previous" class="previous action-button-previous " value="Previous" />
                                                        <input type="button" id="btnDesc" name="next" class="next action-button" value="Next Step" />
                                                        <button class="save action-button-save ml-auto" id="saveDesc">Save</button>
                                                    </form>
                                                </fieldset>
                                                <fieldset>
                                                    <form action="" method="Post" id="formPropFeatures" name="formPropFeatures">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Property Features</h2>
                                                            <div class="row">
                                                                <!-- <div class="col-8"> -->
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <input type="hidden" name="propertyAmenityValue" id="propertyAmenityValue">
                                                                        <label for="cmbAmenity">Select Amenity</label>
                                                                        <select class="list-dt" id="cmbAmenity" name="cmbAmenity" style="width:50%!important">
                                                                            <option></option>
                                                                            <?php
                                                                            $selectSQL = "SELECT * FROM amenities where level=0";

                                                                            $result = mysqli_query($connection, $selectSQL);

                                                                            if (mysqli_num_rows($result) > 0) {

                                                                                while ($row = mysqli_fetch_array($result)) {
                                                                            ?>
                                                                                    <option value="<?php echo $row['id']; ?>" is-multiple="<?php echo $row['type']; ?>"><?php echo $row['name']; ?></option>
                                                                                <?php
                                                                                }
                                                                            } else { ?>
                                                                                <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-4 ">
                                                                        <label for="cmbAmenityList">Select Amenity List</label>
                                                                        <select class="list-dt" id="cmbAmenityList" name="cmbAmenityList" style="width:100%!important">
                                                                            <option></option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <div id="AddPropertyAmenityValue" style="visibility:hidden" >
                                                                            <label for="txtAddPropertyAmenityValue">Enter Value</label>
                                                                            <input type="text" placeholder="" id="txtAddPropertyAmenityValue" name="txtAddPropertyAmenityValue">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 mt-auto">
                                                                        <input type="button" class="btn btn-primary"  id="addPropAmenity"style="width:50px!important" value="Add">
                                                                    </div>
                                                                </div>

                                                            </div> <!-- row -->
                                                            <!-- Paging test Start ---------------------------  -->
                                                            <style>
/* body{width:600px;font-family:"Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;font-size:14px;} */
.link {padding: 10px 15px;background: transparent;border:#bccfd8 1px solid;border-left:0px;cursor:pointer;color:#607d8b}
.disabled {cursor:not-allowed;color: #bccfd8;}
.current {background: #bccfd8;}
.first{border-left:#bccfd8 1px solid;}
/* .question {font-weight:bold;border:1px solid red;} */
.tblData{width:50%;position:relative;}
/* .tblData {background-color: yellow;} */
.answer{padding-top: 10px; border:1px solid red;}
#pagination{margin-top: 20px;padding-top: 30px;border-top: #F0F0F0 1px solid;}
.dot {padding: 10px 15px;background: transparent;border-right: #bccfd8 1px solid;}
#overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
#overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
.page-content {padding: 20px;margin: 0 auto;}
.pagination-setting {padding:10px; margin:5px 0px 10px;border:#bccfd8  1px solid;color:#607d8b;}
</style>
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function() 
		{} 	        
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("getresult.php");
	}
}
</script>
<!-- <div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div> -->
<div class="page-content">
	<!-- <div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
	Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
	<option value="all-links">Display All Page Link</option>
	<option value="prev-next">Display Prev Next Only</option>
	</select>
	</div> -->
	
	<div id="pagination-result">
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
</div>


<script>
getresult("getresult.php");
</script>


                                                            <!-- Paging test End ---------------------------  -->
                                                        </div>
                                                            <input type="hidden" id="tabPropAmenities" name="tabPropAmenities">
                                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                            <input type="button" name="next" id="propertyAmenities" class="next action-button" value="Next Step" />
                                                            <!-- <button class="save action-button-save ml-auto">Save</button> -->
                                                    </form>
                                                </fieldset>


                                                <fieldset>
                                                    <form method="post" id="uploadForm" name="uploadForm" enctype="multipart/form-data" action="img-upload.php">
                                                        <div class="form-card">
                                                            <script>
                                                                $(function() {
                                                                    $('#uploadForm').ajaxForm({
                                                                        target: '#imagesPreview',
                                                                        beforeSubmit: function() {
                                                                            // $('#uploadStatus').html('<img src="css/uploading.gif" />');
                                                                        },
                                                                        success: function() {
                                                                            $('#images').val('');
                                                                            $('#uploadStatus').html('');
                                                                        },
                                                                        error: function() {
                                                                            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                            <!-- TODO : Check whether we can move the style block elsewhere -->
                                                            <style>
                                                                .col-img {
                                                                    /* width:30px; */
                                                                    float: left;
                                                                }

                                                                .col-img img {
                                                                    max-height: 80px;
                                                                    height: 70px;
                                                                    object-fit: contain;
                                                                    padding: 5px;
                                                                    border: 1px solid #d9d9d9;
                                                                }

                                                                .img-wrap {
                                                                    position: relative;
                                                                    display: inline-block;
                                                                    /* border: 1px red solid; */
                                                                    font-size: 0;
                                                                }

                                                                .img-wrap .close {
                                                                    position: absolute;
                                                                    top: 2px;
                                                                    right: 2px;
                                                                    z-index: 100;
                                                                    background-color: red;
                                                                    padding: 2px 3px 5px;
                                                                    color: #000;
                                                                    font-weight: bold;
                                                                    cursor: pointer;
                                                                    opacity: .2;
                                                                    text-align: center;
                                                                    font-size: 22px;
                                                                    line-height: 10px;
                                                                    border-radius: 50%;
                                                                }

                                                                .img-wrap:hover .close {
                                                                    opacity: 1;
                                                                }

                                                                .uploadStatus {
                                                                    font-size: 12px;
                                                                    color: red !important;
                                                                }
                                                            </style>
                                                            <h2 class="fs-title">Media Information</h2>

                                                            Select Image Files to Upload (Max : 5):
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <!-- Upload controls column -->
                                                                    <div class="row">
                                                                        <!-- <div class="col-3"> -->
                                                                        <input type="file" name="images[]" id="images" multiple>
                                                                        <!-- </div> -->
                                                                    </div>
                                                                    <div class="row">
                                                                        <!-- <div class="col-3"> -->
                                                                        <input type="submit" name="btnImageUpload" id="btnImageUpload" value="UPLOAD">
                                                                        <!-- display upload status -->
                                                                        <div id="uploadStatus" style="color:red"></div>
                                                                        <div class="gallery" id="imagesPreview"></div>

                                                                        <!-- </div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-8">

                                                                    <!-- Gallery Column -->
                                                                    <?PHP
                                                                    // Get image data from database
                                                                    $result = $connection->query("SELECT img_file_name FROM property_images ORDER BY id DESC");
                                                                    $noOfImages = $result->num_rows;
                                                                    echo "images : " . $noOfImages;
                                                                    ?>

                                                                    <?php
                                                                    if ($noOfImages > 0) {
                                                                        if ($noOfImages < 6) { ?>
                                                                            <div class="gallery">

                                                                                <?php while ($row = $result->fetch_assoc()) { ?>

                                                                                    <div class="col-img img-wrap">
                                                                                        <span class="close" title="delete">&times;</span>
                                                                                        <img src="<?php echo 'uploads/' . $row['img_file_name']; ?>" />
                                                                                    </div>


                                                                                <?php } ?>

                                                                            </div>
                                                                        <?php } else {
                                                                            //Max image numbers reached.
                                                                            echo "<script>document.getElementById('imageUpload').hidden = true;</script>";
                                                                        }
                                                                    } else { ?>
                                                                        <p class="status error">Image(s) not found...</p>
                                                                    <?php }
                                                                    if ($noOfImages >= 5) {
                                                                        //Max image uploaded. cannot upload more.
                                                                        echo "<script>document.getElementById('imageUpload').hidden = true;</script>";
                                                                        echo "<script>document.getElementById('uploadStatus').innerHTML = 'Max Files Reached';</script>";
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form method="post" id="videoUploadForm" name="videoUploadForm" enctype="multipart/form-data" action="img-upload.php">
                                                        <div class="form-card">
                                                            <script>
                                                                $(function() {
                                                                    $('#videoUploadForm').ajaxForm({
                                                                        target: '#videoPreview',
                                                                        beforeSubmit: function() {
                                                                            // $('#uploadStatus').html('<img src="css/uploading.gif" />');
                                                                        },
                                                                        success: function() {
                                                                            $('#videoFile').val('');
                                                                            $('#uploadStatus').html('');
                                                                        },
                                                                        error: function() {
                                                                            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                            <P class="mb-2"> Select Video Files to Upload (One video only):</P>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="row">
                                                                        <input type="file" accept="video/mp4" name="videoFile" id="videoFile">
                                                                    </div>

                                                                    <div class="row">
                                                                        <input type="submit" name="btnVideoUpload" id="btnVideoUpload" value="UPLOAD">
                                                                    </div>

                                                                </div>
                                                                <div class="col-8 float-start">
                                                                    <div id="uploadStatus" style="color:red"></div>
                                                                    <div class="gallery" id="videoPreview"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" id="btnMedia" class="next action-button" value="Next Step" />
                                                        <button class="save action-button-save ml-auto">Save</button>
                                                    </form>
                                                </fieldset>


                                                <fieldset>
                                                    <form action="">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Room Information</h2>
                                                            <p>Create Rooms</p>
                                                            <div class="row mb-2">
                                                                <div class="col-6">
                                                                    <label for="txtRoomName">Room Name</label>
                                                                    <input type="text" id="txtRoomName" name="txtRoomName" placeholder="">
                                                                </div>
                                                                <div class="col-4">
                                                                    <label for="txtRcmbRoomTypeoomName">Room Type</label>
                                                                    <select class="list-dt" id="cmbRoomType" name="cmbRoomType">
                                                                        <option></option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM room_types";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-2">
                                                                    <label for="txtBedCount">Bed Count</label>
                                                                    <input type="text" id="txtBedCount" name="txtBedCount">
                                                                </div>
                                                            </div>
                                                            <!-- TODO: to move to Modal Pop-up ---- Start -->
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="cmbRoomAmenity">Amenity</label>
                                                                    <select class="list-dt" id="cmbRoomAmenity" name="cmbRoomAmenity">
                                                                        <option selected>Select Amenity ...</option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM amenities where level=1";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="cmbRoomAmenityList">Amenity List</label>
                                                                    <select class="list-dt" id="cmbRoomAmenityList" name="cmbRoomAmenityList">
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <input type="text" name="txtRoomAmenityValue" id="txtRoomAmenityValue" placeholder="Value" hidden />
                                                                </div>
                                                                <div class="col-2">
                                                                    <input type="button" class="btn btn-primary" style="width:50px!important" value="Add">
                                                                </div>
                                                            </div>

                                                            <div class="row ">
                                                                <p>Selected Room Amenities</p>
                                                                <div id="amDataTable">

                                                                    <table id="roomAmenitiesTable" class="display" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Amenity</th>
                                                                                <th>Choices</th>
                                                                                <th>Value</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Nearby Places</td>
                                                                                <td>Railway Station</td>
                                                                                <td></td>
                                                                                <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Nearby Places</td>
                                                                                <td>Restaurant</td>
                                                                                <td></td>
                                                                                <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Parking</td>
                                                                                <td>Bike Parking</td>
                                                                                <td></td>
                                                                                <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Internet</td>
                                                                                <td>Broadband</td>
                                                                                <td>100 Mbps</td>
                                                                                <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Food Packing</td>
                                                                                <td>Lunch Only</td>
                                                                                <td></td>
                                                                                <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- TODO: to move to Modal Pop-up ---- End -->
                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" id="btnRoomInfo" class="next action-button" value="Next Step" />
                                                        <button class="save action-button-save ml-auto">Save</button>
                                                    </form>
                                                </fieldset>

                                                <fieldset>
                                                    <form action="">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Work Timings</h2>
                                                            <table>
                                                                <tr>
                                                                    <td width="50%">Weekday</td>
                                                                    <td>Start Time</td>
                                                                    <td>End Time</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Monday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <!-- <td><input type="time" id="txtMonTime" /></td> -->
                                                                </tr>
                                                                <tr>
                                                                    <td>Tuesday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Wednesday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Thursday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Friday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Saturday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sunday</td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                    <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                </tr>
                                                            </table>


                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" id="btnTiming" class="next action-button" value="Next Step" />
                                                        <button class="save action-button-save ml-auto">Save</button>
                                                    </form>
                                                </fieldset>
                                                <fieldset>
                                                    <form action="" method="Post" id="formTerms" name="formTerms">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Terms</h2>
                                                            <label for="tareaTerms">Enter Property Terms</label>
                                                            <textarea name="tareaTerms" id="tareaTerms" cols="30" rows="10"><?php echo $policy ?></textarea>
                                                        </div>
                                                        <input type="hidden" id="tabTerms" name="tabTerms" value="">
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" id="btnTerms" class="next action-button" value="Next Step" />
                                                        <button class="save action-button-save ml-auto" id="saveTerms">Save</button>
                                                    </form>
                                                </fieldset>

                                                <fieldset>
                                                    <form action="" method="Post" id="formTerms" name="formTerms">
                                                        <div class="form-card text-left">
                                                            <h2 class="fs-title">Acceptance</h2>
                                                            <div class="row">
                                                                <div class="col-1">
                                                                    <input type="checkbox">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="vehicle1">We have read the <a href="uploads/sample.pdf" target="_blank">Terms & Conditions</a> of Stayteller and accept by checking this checkbox.</label><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="tabTerms" name="tabTerms" value="">
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="btnAcceptance" id="btnAcceptance" class="next action-button-final" value="Submit" />
                                                    </form>
                                                </fieldset>
                                                <!-- <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title text-center">Success !</h2>
                                                        <br><br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-3">
                                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-7 text-center">
                                                                <h5>Your Staytype Created. Please wait for Stayteller Approval.</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset> -->
                                            </section>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End ----- Add Step form in this space -->
                </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </main>
    </div>
</div>



<script type="application/javascript">
    // $('#admin-msg').delay(10000).fadeOut(300);
    
        // $('#formbasicsuccess').delay(8000).fadeOut(300);
    


    // function initialSetup() {
//   if (document.getElementById("formbasicsuccess").innerHTML != null) {
//     setTimeout(function() {
//       document.getElementById('formbasicsuccess').style.display = 'block';
//     }, 5000);
//     document.getElementById('formbasicsuccess').style.display = 'none';
//   }
// }

// initialSetup();

//     function toggleDiv() {
//     setTimeout(function () {
//         $("#myDiv").hide();
//         setTimeout(function () {
//             $("#myDiv").show();
//             toggleDiv();
//         }, 30000);
//     }, 10000);
// }
// toggleDiv();


    // $('.timepicker').timepicker({
    //     timeFormat: 'h:mm p',
    //     interval: 60,
    //     minTime: '10',
    //     maxTime: '6:00pm',
    //     defaultTime: '11',
    //     startTime: '10:00',
    //     dynamic: false,
    //     dropdown: true,
    //     scrollbar: true
    // });
</script>

<?php
include 'includes/footer.php';
?>