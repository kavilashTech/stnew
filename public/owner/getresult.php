<?php

ob_start(); //MUST be at the top of your page
session_start();

include 'includes/connection.php';

// require_once("dbcontroller.php");
require_once("pagination.class.php");

$GLOBALS['$conn']  = $connection;

function runQuery($query) {
	$result = mysqli_query($GLOBALS['$conn'], $query);
	while($row=mysqli_fetch_assoc($result)) {
		$resultset[] = $row;
	}		
	if(!empty($resultset))
		return $resultset;
}

function numRows($query) {
	$result  = mysqli_query($GLOBALS['$conn'],$query);
	$rowcount = mysqli_num_rows($result);
	return $rowcount;	
}




// $db_handle = new DBController();
$perPage = new PerPage();

// $sql = "select  A.name as Amenity, L.name as Amenity_List, L.value from amenities A, amenities_list L where L.amenity_id = A.id AND A.level=0";

$propertyId = $_SESSION['PROPERTY_ID'];


$sql = "select A.name as Amenity, B.name as Amenity_List, C.value as value, C.valuecontent as valuecontent from amenities A, amenities_list B, property_amenities C
where  C.amenity_id = A.id
AND C.amlist_id = B.id
AND C.property_id = " . $propertyId;

// echo $sql;
// exit(0);


// $sql = "SELECT * from amenities";
$paginationlink = "getresult.php?page=";	
$pagination_setting = "all-links";
// $pagination_setting = $_GET["pagination_setting"];
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = numRows($sql);
}


if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
}

//Check for empty value from query;


$output = '';

if ($_GET["rowcount"] > 0){
		
		foreach($faq as $k=>$v) {
		$output .= '<tr><td class="answer"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["Amenity"] . '</td>';
		$output .= '<td class="answer">' . $faq[$k]["Amenity_List"] . '</td>';
		$output .= '<td class="answer">' . $faq[$k]["valuecontent"] . '</td>';
		$output .= '<td class="answer">' . '<span style="Color:red">Remove</span>' . '</td></tr>';

		//  $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["name"] . '</div>';
		//  $output .= '<div class="answer">' . $faq[$k]["code"] . '</div><br>';
		}
} else {
	$output .= '<tr><td class="answer align-center" colspan="4">NO Records Found</td></tr>';
}

$test = '<table class="tblData"><thead><tr><td>Amenities</td><td>Amenities List</td><td>Value</td><td>Action</td></tr></thead><tbody>' . $output;
$output = $test;
$output .= '</tbody></table>';
if(!empty($perpageresult)) {
$output .= '<div id="pagination">' . $perpageresult . '</div>';
}

print $output;
