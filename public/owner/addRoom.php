<?php

session_start();

include 'includes/connection.php';

$roomId = "";
$MODE = "";

if (isset($_POST['roomFlag'])) {

    echo "roomFlag" . $_POST['roomFlag'] ;
    $roomFlag = $_POST['roomFlag'];

    if ($roomFlag == "NEWROOM"){
        $MODE = "INSERT";
    }
    else{
        $MODE = "UPDATE";

    }
    

}
$DORMITORY = 7;
$responseArr = [];

// if ((isset($_POST['roomFlag'])) and ($_POST['roomFlag'] != "NEWROOM")) {
    if($MODE == "UPDATE"){

    echo "inside Update Section";
     exit(0);

    //TODO : Check flag and set INSTE / UPDATE Mode
    //Save Into Property Rooms Table
    //Update Room Amenities Table and set status = 1 for all the amenities.
    //UPDATE ROOM INFO & AMENITIES

    if (isset($_POST['roomId'])) {
        $roomId = $_POST['roomId'];

    } 

}

    if ($MODE == "UPDATE") {

        //UPDATE ROOM INFO

        echo "inside Update Section";
        exit(0);

        //ROOM UPDATE MODE
        $currentUser = $_SESSION["user"];
        $propertyId = $_SESSION["PROPERTY_ID"];

        $roomName = $_POST['roomName'];
        $description = "";
        $room_type = $_POST['roomType'];
        $numberOfRooms = $_POST['noOfRooms'];
        $bed_type = $_POST['roomBedType'];
        $totalBedCount = $_POST['dormBedCount']; //Dormitory bed count
        $roomImage = "";
        $pricePerMonth = $_POST['roomPrice'];
        $deposit = $_POST['roomDeposit'];
        $refundable = ($_POST['isDepositRefundable'] ? 1 : 0);

        $status = 1;
        // $createdBy = $currentUser;
        $modifiedBy = $currentUser;

        $updateSQL = "UPDATE property_rooms SET name = '" . $roomName . "', "
            . "room_type =" . $room_type . ", "
            . "no_of_rooms =" . $numberOfRooms . ", "
            . "bed_type =" . $bed_type . ", ";

        if ($room_type == $DORMITORY) {
            $updateSQL = $updateSQL . "total_bed_count =" . $totalBedCount . ", ";
        }

        $updateSQL = $updateSQL . "price_per_month =" . $pricePerMonth . ", "
            . "deposit =" . $deposit . ", "
            . "refundable =" . $refundable . ", "
            . "status =" . $status . ", "
            . "modified_by =" . $currentUser .
            " where id =" . $roomId . " and property_id =" . $propertyId;

        // echo $updateSQL;
        // exit(0);

        if (mysqli_query($connection, $updateSQL)) {
            // $last_id = mysqli_insert_id($connection);
            // $_SESSION['property_id'] = $last_id ;

            //UPDATE Room Amenities
            //TODO

            $updateSQL = "UPDATE room_amenities set status = 1 where room_id=" . $roomId . " AND property_id=" . $propertyId;

            if (mysqli_query($connection, $updateSQL)) {
                $message = "Amenities Updated Successfully";
            } else {
                $message = "Error in Amenities Update. Contact Administrator";
            }

            $message = $message . "<br>Record Updated successfully ";
        } else {

            $message = $message . "<br>Could not Update record: " . mysqli_error($connection); // . " : " . $updateSQL;
        }
    }


    if ($MODE == "INSERT") {

        // echo "inside INSERT Section";
        // exit(0);


        //NEW ROOM INSERT MODE
        $currentUser = $_SESSION["user"];
        $propertyId = $_SESSION["PROPERTY_ID"];

        $roomName = $_POST['roomName'];
        $description = "";
        $room_type = $_POST['roomType'];
        $numberOfRooms = $_POST['noOfRooms'];
        $bed_type = $_POST['roomBedType'];
        $totalBedCount = $_POST['dormBedCount']; //Dormitory bed count
        $roomImage = "";
        $pricePerMonth = $_POST['roomPrice'];
        $deposit = $_POST['roomDeposit'];
        $refundable = $_POST['isDepositRefundable'];
        $status = 1;
        $createdBy = $currentUser;
        $modifiedBy = $currentUser;
        // $createdDate =
        // $updatedDate =


        //TODO : UPDATE Amenity status to 1 for this room AFTER INSERT OF ROOM

        $sql = "INSERT INTO property_rooms (property_id, name, description, room_type, no_of_rooms, bed_type, total_bed_count, price_per_month, deposit, refundable, status, created_by, modified_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
// echo $sql;
// exit(0);
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("issiiiiiiiiii", $propertyId, $roomName, $description, $room_type, $numberOfRooms, $bed_type, $totalBedCount, $pricePerMonth, $deposit, $refundable, $status, $createdBy, $modifiedBy);

        // $insertSql = "INSERT INTO properties (category_id, property_title, active, status) VALUES 
        // ($category_id,'$propertyTitle', $active, $active, $status)";

        $stmt->execute();
        $last_id = mysqli_insert_id($connection);
        // echo "$last_id";
        // $_SESSION['ROOM_ID'] = $last_id;

        $stmt->close();
        $connection->close();


        header('location: managerooms.php?rid=' . $last_id);

        echo "Successfully Inserted";
    }

