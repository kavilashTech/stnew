<?php

session_start();

include 'includes/connection.php';



if (isset($_POST['btnAddProperty'])) {
    echo "reached";


    $category_id = $_POST['cmbStaytypeCategory1'];
    $propertyTitle = $_POST['txtStaytypeName'];
    $active = 1;
    $status = 0;

    $stmt = $connection->prepare("INSERT INTO properties (category_id, property_title, gallery_images, active, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issii", $category_id, $propertyTitle, $active, $status);

    // $insertSql = "INSERT INTO properties (category_id, property_title, active, status) VALUES 
    // ($category_id,'$propertyTitle', $active, $active, $status)";

$stmt->execute();
$last_id = mysqli_insert_id($connection);
// echo "$last_id";
$_SESSION['PROPERTY_ID'] = $last_id;

$stmt->close();
$connection->close();


header('location: staytypes.php?pid=' . $last_id);

}else{
    echo "Failed";
}
















?>