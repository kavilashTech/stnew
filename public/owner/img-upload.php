<?php
include 'includes/header.php';
// function console_log($output, $with_script_tags = true) {
//     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
// ');';
//     if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     }
//     echo $js_code;
// }


// console_log('test from php');
// Start Image Upload -------------------- 
$propertyId = $_SESSION['PROPERTY_ID'];
$images_filename = [];
// echo("Inside Image Upload");
// exit(0);

if (isset($_POST['btnImageUpload'])) {
    // File upload configuration 
    // console_log('test from php button pressed');
    //   echo "<script>alert(" . json_encode($_FILES['images']). ");</script>";
    // $targetDir = "uploads/";
    $targetDir = '../images/property/gallery/';
    $allowTypes = array('jpg', 'png');

    $images_arr = array();

    if (!isset($_FILES['images']['name']) && $_FILES['images']['name'] = '') {
        echo "<script>alert('No Image Found');</script>";
        exit(0);
    }


    foreach ($_FILES['images']['name'] as $key => $val) {
        $image_name = $_FILES['images']['name'][$key];
        $tmp_name     = $_FILES['images']['tmp_name'][$key];
        $size         = $_FILES['images']['size'][$key];
        $type         = $_FILES['images']['type'][$key];
        $error         = $_FILES['images']['error'][$key];


        // File upload path 
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);



        if (in_array($fileType, $allowTypes)) {
            // Store images on the server 
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                $images_arr[] = $targetFilePath;
                $images_filename[] = basename($_FILES['images']['name'][$key]);
            }
        }
        //  echo($images_arr);
    }

    // Insert into Database
    $imageSet = json_encode($images_filename);
    $updateSQL = "Update properties set  gallery_images=JSON_ARRAY_APPEND(gallery_images,";
    foreach ($images_filename as $img) {
        $updateSQL = $updateSQL . " '$', '" . $img . "',";
    }
    $updateSQL = rtrim($updateSQL, ",");
    $updateSQL = $updateSQL . ") where id=" . $propertyId;



    if (mysqli_query($connection, $updateSQL)) {
        echo "success";
    } else {
        die("error " . mysqli_error($connection));
    }
    $connection->close();
}
// $stmt->close();

// 






// Generate gallery view of the images 
if (!empty($images_arr)) { ?>
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
    </style>
    <ul>
        <!-- echo "inside gallery"; -->
        <?php foreach ($images_arr as $image_src) {
        ?>

            <div class="col-img">
                <img src="<?php echo $image_src; ?>" />
            </div>

        <?php  }

        foreach ($images_filename as $image_fname) {
        ?>

            <!-- <div class="col-img">
                <p><?php // echo $image_fname; 
                    ?> </p>
            </div> -->

        <?php

        }

        ?>
        <!-- <script>document.getElementById("#save").style.display = "block";</script> -->

    </ul>
<?php }

?>


<!-- Start -- Save into Database -->
<?php

// include_once 'includes/connection.php';

// TODO : Save images into Database


if (isset($_POST['btnMediaSave'])) {
    echo "<script>alert('save in php');</script>";
}
?>

<!-- End -- Save into Database -->



<!-- ===================================================================================== -->
<!-- // End Image Upload --------------------  -->

<!-- // Start Video Upload --------------------  -->
<?php
if (isset($_POST['btnVideoUpload'])) {
    // File upload configuration 
    //   echo "<script>alert(" . $_FILES['images']['name']. ");</script>";

    $targetDir = "../images/property/video/";
    $allowTypes = array('mp4');

    if (!isset($_FILES['videoFile']['name'])) {
        echo "<script>alert('No Video Found');</script>";
        exit(0);
    }


    // foreach ($_FILES['videoFile']['name'] as $key => $val) {
    $video_name = $_FILES['videoFile']['name'];
    $tmp_name     = $_FILES['videoFile']['tmp_name'];
    $size         = $_FILES['videoFile']['size'];
    $type         = $_FILES['videoFile']['type'];
    $error         = $_FILES['videoFile']['error'];

    //TODO : Check and limit Filesize


    // File upload path 
    $videofileName = basename($_FILES['videoFile']['name']);
    $videotargetFilePath = $targetDir . $videofileName;

    // Check whether file type is valid 
    $fileType = pathinfo($videotargetFilePath, PATHINFO_EXTENSION);


    // echo $videofileName;
    if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $videotargetFilePath)) {


        // echo "successfully moved file";

        //Update Database

        $updateSQL = "Update properties set  property_video = '" . $videofileName . "' where id=" . $propertyId;

        // echo $updateSQL;

        if (mysqli_query($connection, $updateSQL)) {

            if ($videotargetFilePath != '') {
?>

                <video src='<?php echo $videotargetFilePath; ?>' controls width='320px' height='220px'></video>

<?php
            }


            // echo "success";
        } else {
            die("error " . mysqli_error($connection));
        }
    }

    $connection->close();
}

?>



<!-- // End Video Upload --------------------  -->