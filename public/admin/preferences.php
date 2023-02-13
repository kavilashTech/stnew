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


//Initialize variables

$maxImages    = "";
$maxVideos    = "";
$fbLink    = "";
$instaLink    = "";

$flag = "";
$flashmsg = "";

function getSetting($name){

    global $connection;
    $query = "SELECT * FROM preferences WHERE type=" . $name;

	$result = mysqli_query($connection, $query);

	$value = mysqli_fetch_assoc($result);
	return $value;
}

function getUserById($id){
	global $connection;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

if (!isset($_REQUEST["txtSubmit"])) {

    //User Coming through menu
    //Check if record exists

    $verifySQL = "select * from preferences";

    $preferencesRow = mysqli_query($connection, $verifySQL);

    if (mysqli_num_rows($preferencesRow) > 0) {
        //Record Exists - UPDATE
        // echo("UPDATE MODE");
        // exit(0);

        $result = mysqli_fetch_assoc($preferencesRow);

        $maxImages    = $result['max_images'];
        $maxVideos    =  $result['max_videos'];
        $fbLink    =  $result['fb_link'];
        $instaLink    =  $result['insta_link'];

        $flag = "UPDATE";
    } else {
        //Record DOES NOT Exist - INSERT
        $flag = "INSERT";
    }
} else {
    //Submit Button Clicked.
    // Check value in sFlag
    $flag = $_REQUEST["txtflag"];

    if (isset($_REQUEST["txtImages"])) {
        $maxImages = trim($_REQUEST["txtImages"]);
    }

    if (isset($_REQUEST["txtVideos"])) {
        $maxVideos = trim($_REQUEST["txtVideos"]);
    }
    if (isset($_REQUEST["txtFbLink"])) {
        $fbLink = trim($_REQUEST["txtFbLink"]);
    }
    if (isset($_REQUEST["txtInstaLink"])) {
        $instaLink = trim($_REQUEST["txtInstaLink"]);
    }

    //INSERT or UPDATE Based on FLag

    if ($flag == 'INSERT') {
        //INSERT
        // echo "<script>alert('Insert Mode');</script>";
        // No data in Database - Create Record
        $insertSQL = 'INSERT INTO `preferences`(`max_images`, `max_videos`, `fb_link`, `insta_link`) VALUES (' . $maxImages . ',' . $maxVideos . ', "' . $fbLink . '", "' . $instaLink . '")';
// echo $insertSQL;
// exit(0);
        if (mysqli_query($connection, $insertSQL) == TRUE) {
            $flashmsg = "SI"; //Successful Insert

        } else {
            //Error in INSERT
            $flashmsg = "EI"; //INSERT - Error
        }
    } else if ($flag == 'UPDATE') {
        //UPDATE
        //  echo "<script>alert('Update Mode');</script>";

        $updateSQL = "UPDATE preferences SET max_images=" . $maxImages . ", max_videos=" . $maxVideos . ", fb_link='" . $fbLink . "', insta_link='" . $instaLink .  "'";
        // echo $updateSQL;
        // exit(0);

        if (mysqli_query($connection, $updateSQL) == TRUE) {
            //Updated Successfully
            $flashmsg = "SU"; //Successful Update
        } else {
            //Error in Update
            $flashmsg = "EU"; //Update - Error
        }
    }
}



?>
<script>
    function submitform() {
        document.getElementById("txtSubmit").value = "SAVE";
        // document.forms["form1"].action = "company.php";
        document.forms["form1"].method = "POST";
        document.forms["form1"].submit();
    }
</script>

<div id="layoutSidenav_content mt-5">
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-left font-weight-light my-4">Preferences</h3>
                        </div>
                        <div class="card-body">
                            <form id="form1" method="POST" action="<?php $_PHP_SELF ?>">
                                <input type="hidden" name="txtflag" value="<?PHP echo $flag ?>">

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <label>Max Images per property</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <input class="form-control" id="txtImages" name="txtImages" type="text" placeholder="Max Images" value="<?PHP echo $maxImages ?>"  />
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                        <label class="label-for-input" for="txtImages">Enter the number of images allowed per property. Shown in Gallery Images.</label>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <label>Max Videos per property</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <input class="form-control" id="txtVideos" name="txtVideos" type="text" placeholder="Max Videos" value="<?PHP echo $maxVideos ?>"  />
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                        <label class="label-for-input" for="txtVideos">Enter the number of videos allowed per property. Default is 0.</label>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <label>Facebook</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <input class="form-control" id="txtFbLink" name="txtFbLink" type="text" placeholder="Enter Facebook Link" value="<?PHP echo $fbLink ?>"  />
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                        <label class="label-for-input" for="txtFbLink">Provide link for Facebook account</label>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <label>Instagram</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <div class="form-floating"> -->
                                        <input class="form-control" id="txtInstaLink" name="txtInstaLink" type="text" placeholder="Enter Instragram Link" value="<?PHP echo $instaLink ?>"  />
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                        <label class="label-for-input" for="txtInstaLink">Provide link for Instagram Account</label>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="mt-4 mb-0 ">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <h5 id="success" name="success" style="color:green;text-align:center"></h5>
                                        <h5 id="error" name="error" style="color:red;text-align:center"></h5>
                                    </div>
                                    <input type="hidden" id="txtSubmit" name="txtSubmit">
                                    <!-- <div id="btnSave" name="btnSave" class="d-grid  justify-content-center "><a class="btn btn-primary btn-block" onclick="submitform()">Save Company</a></div> -->
                                    <input type="submit" class="btn btn-success" value="Save Preferences">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php

    if ($flashmsg == "SU") {
        echo '<script>document.getElementById("success").innerHTML = "Record Updated Successfully!";</script>';
    } else if ($flashmsg == "SI") {
        echo '<script>document.getElementById("success").innerHTML = "Record Inserted Successfully!";</script>';
    } else if ($flashmsg == "EI") {
        echo '<script>document.getElementById("error").innerHTML = "ERROR - Record Insert Failed. Contact Administrator.";</script>';
    } else if ($flashmsg == "EU") {
        echo '<script>document.getElementById("error").innerHTML = "ERROR - Record Update Failed. Contact Administrator.";</script>';
    }

    // echo '<script>document.getElementById("error").innerHTML = "' . $flag . '";</script>';
    ?>
    <script type="application/javascript">
        $('#success').delay(5000).fadeOut(300);
    </script>
    <!-- footer -->
    <?php
    include 'includes/footer.php';
    ?>