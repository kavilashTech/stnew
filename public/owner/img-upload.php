<?php

// Start Image Upload -------------------- 
if (isset($_POST['imageUpload'])) {
    // File upload configuration 
    //   echo "<script>alert(" . $_FILES['images']['name']. ");</script>";

    $targetDir = "uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    
    $images_arr = array();

    if(!isset($_FILES['images']['name']) && $_FILES['images']['name'] = ''){
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
            }
        }
        // print_r ($images_arr);
    }
}

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
        ?>
        <script>document.getElementById("sav").style.display = "block";</script>

    </ul>
<?php }

?>


<!-- Start -- Save into Database -->
<?php

// include_once 'includes/connection.php';

// TODO : Save images into Database


if (isset($_POST['btnSaveImage'])) {
    echo "<script>alert('save');</script>";
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

    $targetDir = "uploads/";
    $allowTypes = array('mp4');
    
    $images_arr = array();
    // print_r($_FILES);
    // if(!isset($_FILES['videoFile']['name']) && $_FILES['videoFile']['name'] = ''){
    if(!isset($_FILES['videoFile']['name'])){
        echo "<script>alert('No Video Found');</script>";
        exit(0);
    }


    // foreach ($_FILES['videoFile']['name'] as $key => $val) {
        $image_name = $_FILES['videoFile']['name'];
        $tmp_name     = $_FILES['videoFile']['tmp_name'];
        $size         = $_FILES['videoFile']['size'];
        $type         = $_FILES['videoFile']['type'];
        $error         = $_FILES['videoFile']['error'];

        
        // File upload path 
        $fileName = basename($_FILES['videoFile']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);



        if (in_array($fileType, $allowTypes)) {
            // Store images on the server 
            if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $targetFilePath)) {
            $video_arr[] = $targetFilePath;
            }
        }
        // print_r ($images_arr);
    // }
}
if (!empty($video_arr)) { 
    ?>

    <video src='<?php echo $video_arr[0]; ?>' controls width='320px' height='220px'></video>

<?php
}
?>

<!-- // End Video Upload --------------------  -->
