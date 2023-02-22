<?php
session_start();
include('includes/connection.php');


//BASIC FORM SUBMITTED

if (isset($_POST['tabBasic'])) {

    // echo '<script>console.log("Tab Basic!"); </script>';
    if (isset($_POST['txtStaytypeName'])) {

        $propertyid = $_POST['txtStaytypeId'];

        $propertyTitle = $dblink -> real_escape_string($_POST['txtStaytypeName']);
        
        // $propertyTitle = $_POST['txtStaytypeName'];
        $category_id = $_POST['cmbStaytypeCategory'];
        //Optional Fields - Enter Default if not provided
        // $address1 = $_POST['txtAddress1'] ?: "NULL";
        $address1 = $dblink -> real_escape_string($_POST['txtAddress1']);
        // $address2 = $_POST['txtAddress2'] ?: "NULL";
        $address2 = $dblink -> real_escape_string($_POST['txtAddress2']);
        $location_id = $_POST['cmbLocation'] ?: "NULL";
        $area_id = $_POST['cmbArea'] ?: "NULL";
        $pincode = $_POST['txtPincode'] ?: "NULL";
        $mobile1 = $_POST['txtPhone'] ?: "NULL";
        $mobile2 = $_POST['txtAlternatePhone'] ?: "NULL";
        $exclusivity_id = $_POST['cmbExclusivity'] ?: "0";

        $salientFeatures = $dblink -> real_escape_string($_POST['tareaSalientFeatures']);
        // $salientFeatures = $_POST['tareaSalientFeatures'] ?: "NULL";


        $active = 1;
        //0:inprogress, 1:pending,2:approved,3:rejected
        $status = 0;
        $frmName = $_POST['tabBasic'];

        $updateSQL = "UPDATE properties set category_id = " . $category_id . ", property_title = '" . $propertyTitle . "', " .
        "address1 = '" . $address1 . "', address2 = '" . $address2 . "', location_id = " . $location_id . ", area_id = " . $area_id . ", pincode = " . $pincode . "," .
        "mobile1 = " . $mobile1 . ", mobile2 = " . $mobile2 . ", exclusivity_id = " . $exclusivity_id . ", salient_features = '" . $salientFeatures . "', active = " . $active . ", status = " . $status .  
        " where id = " . $propertyid;

        // echo $updateSQL;

        if (mysqli_query($connection, $updateSQL)) {
            // $_SESSION['message'] = "Record inserted successfully ";
            
            echo "Record Updated successfully ";
        }
        mysqli_close($connection);
    }
}

//DESCRIPTION FORM SUBMITTED
if (isset($_POST['tabDesc'])) {
    // echo $_SESSION['property_id'];


    $propertyId = $_SESSION["PROPERTY_ID"];
    // $propertyId = $_SESSION["favcolor"];

    //Optional Fields - Enter Default if not provided
    // $shortDesc = $_POST["tareaShortDescription"] ?: "NULL";
    // $longDesc = $_POST["tareaLongDescription"] ?: "NULL";

    $shortDesc = $dblink -> real_escape_string($_POST['tareaShortDescription']);
    $longDesc = $dblink -> real_escape_string($_POST['tareaLongDescription']);

    $updateSQL = "Update properties Set short_description='" . $shortDesc . "', description='" . $longDesc . "' WHERE id=" . $propertyId;

// echo $updateSQL;
// exit(0);

    if (mysqli_query($connection, $updateSQL)) {
        
        echo "Record inserted successfully ";
        
    } else {

        echo "Could not insert record: " . mysqli_error($connection) . " : " . $updateSQL;
    }
}

    //TERMS FORM SUBMITTED

    if (isset($_POST['tabTerms'])) {
        // echo $_SESSION['property_id'];
    
    
        $propertyId = $_SESSION["PROPERTY_ID"];
    
        //Optional Fields - Enter Default if not provided
        $policy = $_POST["tareaTerms"] ?: "NULL";
    
        $updateSQL = "Update properties Set policy='" . $policy . "' WHERE id=" . $propertyId;
    
    // echo $updateSQL;
    // exit(0);
    
        if (mysqli_query($connection, $updateSQL)) {
            // $last_id = mysqli_insert_id($connection);
            // $_SESSION['property_id'] = $last_id ;
    
            
            echo "Record inserted successfully ";
            
        } else {
    
            echo "Could not insert record: " . mysqli_error($connection) . " : " . $updateSQL;
        }

    mysqli_close($connection);


}


// Fetching Area data
// $location_id = !empty($_POST['location_id']) ? $_POST['location_id'] : '';
// if (!empty($location_id)) {

//     $areaData = $connection->prepare("SELECT id, name from area WHERE location_id=?");
//     $areaData->bind_param('i', $location_id);
//     $areaData->execute();
//     $result = $areaData->get_result();

//     if ($result->num_rows > 0) {
//         echo "<option value='0' selected>Select Area</option>";
//         while ($row = $result->fetch_assoc()) {
//             echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option><br>";
//         }
//     }
// }


// //Fetching Property Level Amenity Data
// $amenity_id = !empty($_POST['amenity_id']) ? $_POST['amenity_id'] : '';
// if (!empty($amenity_id)) {


//     $query = mysqli_query($connection, "SELECT id, name, value from amenities_list WHERE amenity_id=" . $amenity_id);

//     if (mysqli_num_rows($query) > 0) {

//         while ($row = mysqli_fetch_array($query)) {
//             echo "<option value='" . $row['id'] . "' is-multiple='" . $row['value'] . "'>" . $row['name'] . "</option><br>";
//         }
//     }
// }
