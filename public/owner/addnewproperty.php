<?php

session_start();

include 'includes/connection.php';



if (isset($_POST['btnAddProperty'])) {
    echo "reached";

    $owner_id = $_SESSION['userId'];

    $category_id = $_POST['cmbStaytypeCategory1'];
    $propertyTitle = $_POST['txtStaytypeName'];
    // $propertyTitle = $dblink -> real_escape_string($_POST['txtStaytypeName']);
    $active = 1;
    $status = 0;

    $stmt = $connection->prepare("INSERT INTO properties (owner_id, category_id, property_title, active, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisii", $owner_id, $category_id, $propertyTitle, $active, $status);

//     $insertSql = "INSERT INTO properties (owner_id, category_id, property_title,  active, status) VALUES 
//      ($owner_id, $category_id,'$propertyTitle', $active, $status)";
// echo $insertSql;
// exit(0);
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