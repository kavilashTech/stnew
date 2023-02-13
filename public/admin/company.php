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

$companyName    = "";
$address1    = "";
$address2    = "";
$state    = "";
$city    = "";
$pincode    = "";
$email1    = "";
$email2    = "";
$mobile1    = "";
$mobile2    = "";
$pan    = "";
$gst    = "";

$flag = "";
$flashmsg = "";

if (!isset($_REQUEST["txtSubmit"])) {

    //User Coming through menu
    //Check if record exists

    $verifySQL = "select * from company";

    $companyRow = mysqli_query($connection, $verifySQL);

    if (mysqli_num_rows($companyRow) > 0) {
        //Record Exists - UPDATE

        $result = mysqli_fetch_assoc($companyRow);

        $companyName    = $result['company_name'];
        $address1    =  $result['address1'];
        $address2    =  $result['address2'];
        $state    =  $result['state'];
        $city    =  $result['city'];
        $pincode    =  $result['pincode'];
        $email1    =  $result['email1'];
        $email2    =  $result['email2'];
        $mobile1    =  $result['mobile1'];
        $mobile2    =  $result['mobile2'];
        $pan    =  $result['pan'];
        $gst    =  $result['gst'];

        $flag = "UPDATE";
    } else {
        //Record DOES NOT Exist - INSERT
        $flag = "INSERT";
    }
} else {
    //Submit Button Clicked.
    // Check value in sFlag
    $flag = $_REQUEST["txtflag"];

    $companyName = trim($_REQUEST["inputCompanyName"]);
    $address1   = trim($_REQUEST["inputAddress1"]);

    if (isset($_REQUEST["inputAddress2"])) {
        $address2        = trim($_REQUEST["inputAddress2"]);
    }
    $state = trim($_REQUEST["inputState"]);
    $city = trim($_REQUEST["inputCity"]);
    $pincode = trim($_REQUEST["inputPincode"]);
    $email1 = trim($_REQUEST["inputEmail1"]);

    if (isset($_REQUEST["inputEmail2"])) {
        $email2 = trim($_REQUEST["inputEmail2"]);
    }

    $mobile1 = trim($_REQUEST["inputMobile1"]);

    if (isset($_REQUEST["inputMobile2"])) {
        $mobile2 = trim($_REQUEST["inputMobile2"]);
    }

    if (isset($_REQUEST["inputMobile2"])) {
        $pan = trim($_REQUEST["inputPan"]);
    }

    if (isset($_REQUEST["inputMobile2"])) {
        $gst = trim($_REQUEST["inputGst"]);
    }

    //INSERT or UPDATE Based on FLag

    if ($flag == 'INSERT') {
        //INSERT
        // echo "<script>alert('Insert Mode');</script>";
        // No data in Database - Create Record
        $insertSQL = 'INSERT INTO `company`(`company_name`, `address1`, `address2`, `state`, `city`, `pincode`, `email1`, `email2`, `mobile1`, `mobile2`, `pan`, `gst`) VALUES ("' . $companyName . '","' . $address1 . '", "' . $address2 . '", "' . $state  . '", "' . $city . '", "' . $pincode  . '", "' . $email1 . '", "' . $email2 . '", "' . $mobile1 . '", "' . $mobile2 . '", "' . $pan . '", "' . $gst . '")';

        if (mysqli_query($connection, $insertSQL) == TRUE) {
            $flashmsg = "SI"; //Successful Insert

        } else {
            //Error in INSERT
            $flashmsg = "EI"; //INSERT - Error
        }
    } else if ($flag == 'UPDATE') {
        //UPDATE
        // echo "<script>alert('Update Mode');</script>";

        $updateSQL = "UPDATE company SET company_name='" . $companyName . "', address1='" . $address1 . "', address2='" . $address2 . "', state='" . $state . "', city='" . $city  . "', pincode='" . $pincode  . "', email1='" . $email1  . "', email2='" . $email2  . "', mobile1='" . $mobile1 . "', mobile2='" . $mobile2  . "', pan='" .  $pan . "', gst='" . $gst . "'";

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
                            <h3 class="text-left font-weight-light my-4">Company Information</h3>
                        </div>
                        <div class="card-body">
                            <form id="form1" action="<?php $_PHP_SELF ?>">
                                <input type="hidden" name="txtflag" value="<?PHP echo $flag ?>">
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                                            <input class="form-control" id="inputCompanyName" name="inputCompanyName" type="text" placeholder="Enter Company name" value="<?php echo $companyName ?>" required />
                                            <label class="label-for-input" for="inputCompanyName">Company Name</label>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating"> -->
                                            <input class="form-control" id="inputAddress1" name="inputAddress1" type="text" placeholder="Enter Address" value="<?php echo $address1 ?>" required />
                                            <label class="label-for-input"  for="inputAddress1">Address 1</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating"> -->
                                            <input class="form-control" id="inputAddress2" name="inputAddress2" type="text" placeholder="Enter Address" value="<?php echo $address2 ?>" />
                                            <label  class="label-for-input" for="inputAddress2">Address 2</label>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                            <input class="form-control" id="inputState" name="inputState" type="text" placeholder="Enter State" value="<?php echo $state ?>" required />
                                            <label  class="label-for-input" for="inputState">State</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                            <input class="form-control" id="inputCity" name="inputCity" type="text" placeholder="Enter City" value="<?php echo $city ?>" required />
                                            <label  class="label-for-input" for="inputCity">City</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="form-floating"> -->
                                            <input class="form-control" id="inputPincode" name="inputPincode" type="text" placeholder="Enter Pincode" value="<?php echo $pincode ?>" required />
                                            <label  class="label-for-input" for="inputPincode">Pincode</label>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating mb-3"> -->
                                            <input class="form-control" id="inputEmail1" name="inputEmail1" type="email" placeholder="name@example.com" value="<?php echo $email1 ?>" required />
                                            <label  class="label-for-input" for="inputEmail1">Email address</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating mb-3"> -->
                                            <input class="form-control" id="inputEmail2" name="inputEmail2" type="email" placeholder="name@example.com" value="<?php echo $email2 ?>" />
                                            <label  class="label-for-input" for="inputEmail2">Email address 2</label>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                                            <input class="form-control" id="inputMobile1" name="inputMobile1" type="text" placeholder="Enter Mobile" value="<?php echo $mobile1 ?>" required />
                                            <label  class="label-for-input" for="inputMobile1">Mobile</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                                            <input class="form-control" id="inputMobile2" name="inputMobile2" type="text" placeholder="Enter Alternate Mobile" value="<?php echo $mobile2 ?>" />
                                            <label  class="label-for-input" for="inputMobile2">Mobile 2</label>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                                            <input class="form-control" id="inputPan" name="inputPan" type="text" placeholder="Enter PAN No" value="<?php echo $pan ?>" />
                                            <label  class="label-for-input" for="inputPan">PAN</label>
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div class="form-floating mb-3 mb-md-0"> -->
                                            <input class="form-control" id="inputGst" name="inputGst" type="text" placeholder="Enter GST No" value="<?php echo $gst ?>" />
                                            <label  class="label-for-input" for="inputGst">GST</label>
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
                                    <input type="submit" class="btn btn-success" value="Save Company">
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