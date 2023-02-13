<?php

use function PHPUnit\Framework\isEmpty;

session_start();
include('includes/connection.php');


//TERMS FORM SUBMITTED

if (isset($_POST['tabPropAmenities'])) {
    // echo $_SESSION['property_id'];

    $propertyId = $_SESSION["PROPERTY_ID"];

    $amenity = $_POST["propAmenity"];
    $amenityList = $_POST["propAmenityList"] ?: "NULL";
    $amenityListHasValue = $_POST["propHasValue"];

    $amenityValue = $_POST["propAmenityValue"] ?: NULL;


    // Check whether propertyid and Amenity id is avaiable in database = Update.
    // if not available = insert

    $selectSQL = "select * from property_amenities WHERE property_id = " . $propertyId . " and amenity_id = " . $amenity;

    // if query returns value then update mode.
    // if query is empty, then insert mode.


    $result = mysqli_query($connection, $selectSQL);

    $updateSQL = "";
    if (mysqli_num_rows($result) > 0) {
        $MODE = "UPDATE";

        $updateSQL = "Update property_amenities set ";

        if ($amenityListHasValue == 0) {
            if (is_array($amenityList)) {

                $updateSQL = $updateSQL .  " amlist_id = '" . implode(",", $amenityList) . "'";
                $updateSQL = $updateSQL .  ", value = " . $amenityListHasValue;
                $updateSQL = $updateSQL .  ", valuecontent =" . "NULL";
            } else {
                $updateSQL = $updateSQL .  "amlist_id = '" . $amenityList . "'";
                $updateSQL = $updateSQL .  ", value = " . $amenityListHasValue;
                $updateSQL = $updateSQL .  ", valuecontent =" . "NULL";
            }
        } else {
            $updateSQL = $updateSQL .  "amlist_id = '" . $amenityList . "'";
            $updateSQL = $updateSQL .  ", value = " . $amenityListHasValue;
            $updateSQL = $updateSQL .  ", valuecontent = '" . $amenityValue . "'";
        }
        $updateSQL = $updateSQL .  " Where property_id = " . $propertyId . " AND amenity_id = " . $amenity; 

        if (mysqli_query($connection, $updateSQL)) {
            // $last_id = mysqli_insert_id($connection);
            // $_SESSION['property_id'] = $last_id ;
    
            echo "Record Updated successfully ";
        } else {
    
            echo "Could not Update record: " . mysqli_error($connection); // . " : " . $updateSQL;
        }


    } else {
        $MODE = "INSERT";

        $insertSQL = "Insert into property_amenities (property_id, amenity_id, amlist_id, value";

        if ($amenityListHasValue == 0) {
            //Amenity list value is not required
            //Possible multiple values
    
            if (is_array($amenityList)) {
                $insertSQL = $insertSQL . ") values  (" . $propertyId . "," .  $amenity . ",'" .  implode(",", $amenityList) . "'," .  $amenityListHasValue . ");";
            } else {
                $insertSQL = $insertSQL . ") values  (" . $propertyId . "," .  $amenity . ",'" .  $amenityList . "'," .  $amenityListHasValue . ");";
            }
        } else {
    
            $insertSQL = $insertSQL . ", valuecontent) Values (" . $propertyId . "," .  $amenity . ",'" .  $amenityList . "'," .  $amenityListHasValue . ",'" .  $amenityValue . "');";
        }
    
        // echo $insertSQL . " : " . $amenityValue . " isnull : " . is_null($amenityValue);
        // exit(0);
    
        if (mysqli_query($connection, $insertSQL)) {
            // $last_id = mysqli_insert_id($connection);
            // $_SESSION['property_id'] = $last_id ;
    
            echo "Record Added successfully ";
        } else {
    
            echo "Could not Add record: " . mysqli_error($connection); //. " : " . $insertSQL;
        }

    } 
    

    mysqli_close($connection);
}
