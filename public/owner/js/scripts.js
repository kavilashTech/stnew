/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */

// const jqueryForm = require("../../Temp/js/jquery.form");


// Scripts
// 

$('#cmbStaytypeCategory').select2({
    theme: 'classic',
    width: '100%'
});
$('#cmbLocation').select2({
    theme: 'classic',
    width: '100%'
});
$('#cmbArea').select2({
    theme: 'classic',
    width: '100%'
});
$('#cmbExclusivity').select2({
    theme: 'classic',
    width: '100%'
});
//Property Level Amenity
$('#cmbAmenity').select2({
    theme: 'classic',
    width: '100%',
    // placeholder: "Select Amenity..."
});
$('#cmbAmenityList').select2({
    theme: 'classic',
    width: '100%',
    // placeholder: "Select Amenity List"
});

//Room Type
$('#cmbRoomType').select2({
    theme: 'classic',
    width: '100%',
});

//Bed Types
$('#cmbBedType').select2({
    theme: 'classic',
    width: '100%'
});


//Room Level Amenity
$('#cmbRoomAmenity').select2({
    theme: 'classic',
    width: '100%',
    // placeholder: "Select Amenity..."
});
$('#cmbRoomAmenityList').select2({
    theme: 'classic',
    width: '100%',
    // placeholder: "Select Amenity List"
});


$(function () {
    setTimeout(function () {
        //your datatable code 
        $('#amenitiesTable').DataTable({
            scrollY: '200px',
            scrollCollapse: true,
            paging: true,
            searching: false,
        });
    }, 1600);


});



// =============Temp code START =======================







// =============Temp code END =======================


window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});




// ajax script for getting Location / Area
$(document).on('change', '#cmbLocation', function () {
    var locationId = $(this).val();
    // console.log("Location Changed : " + locationId);
    if (locationId) {

        $.ajax({
            type: 'POST',
            url: 'dependantcombo.php',
            data: { 'location_id': locationId },
            success: function (result) {
                $('#cmbArea').html(result);
                $("#cmbArea").val(0).trigger('change');

            }
        });

    } else {
        $('#cmbArea').html('<option value="">No Records</option>');
    }
});




// ajax script for getting Property Level Amenity List
$(document).on('change', '#cmbAmenity', function () {
    var amenityId = $(this).val();
    // console.log(locationId);
    if (amenityId != 0) {

        $.ajax({
            type: 'POST',
            url: 'dependantcombo.php',
            data: { 'amenity_id': amenityId },
            success: function (result) {

                //Set multiselect based on the Amenity Selected.
                if ($('#cmbAmenity option:selected').attr('is-multiple') == 1) {
                    $('#cmbAmenityList').select2({
                        multiple: true
                    });
                } else {
                    $('#cmbAmenityList').select2({
                        multiple: false
                    });
                }
                $('#cmbAmenityList').html(result);
                $("#cmbAmenityList").val(0).trigger('change');
            }
        });

    } else {
        // $('#cmbAmenityList').html('<option value="">Amenity List</option>');
        // $('#cmbRoomAmenityList').html('<option value="">Amenity List</option>');
        $('#cmbAmenityList').empty();
        $('#cmbAmenityList').val(0);
        $('#cmbAmenityList').select2({
            multiple: false
        });
        $('#cmbAmenityList').trigger('change');
    }
});

//Show value input based on Amenity List - Property Level
$(document).on('change', '#cmbAmenityList', function () {
    var roomAmenityListId = $(this).val();
    // console.log(locationId);

    if ($('#cmbAmenityList option:selected').attr('has-value') == 1) {
        // alert('Value Required');
        document.getElementById("AddPropertyAmenityValue").style.visibility = "visible";
        document.getElementById("txtAddPropertyAmenityValue").required = true;

    } else if ($('#cmbAmenityList option:selected').attr('has-value') == 0) {
        // alert('No Value');
        document.getElementById("AddPropertyAmenityValue").style.visibility = "hidden";
    }



});

// TODO : BED COUNT
//Show value (Bed Count) input based on Room Type Selected - Room
$(document).on('change', '#cmbRoomType', function () {
    var roomAmenityListId = $(this).val();
    // console.log(locationId);

    if ($('#cmbRoomType option:selected').attr('has-value') == 1) {
        // alert('Value Required');
        // document.getElementById("addBedCount").style.visibility = "visible";
        document.getElementById("addBedCount").style.display = "block";
        document.getElementById("txtDormitoryBedCount").required = true;

    } else if ($('#cmbRoomType option:selected').attr('has-value') == 0) {
        // alert('No Value');
        // document.getElementById("addBedCount").style.visibility = "hidden";
        document.getElementById("addBedCount").style.display = "none";
    }

});


//Show value (Bed Count) input based on Room Type Selected - Room
$(document).on('change', '#cmbNewRoomType', function () {
    var roomAmenityListId = $(this).val();
    // console.log(locationId);

    if ($('#cmbNewRoomType option:selected').attr('has-value') == 1) {
        // alert('Value Required');
        // document.getElementById("addBedCount").style.visibility = "visible";
        document.getElementById("newBedCount").style.display = "block";
        document.getElementById("txtNewDormitoryBedCount").required = true;

    } else if ($('#cmbNewRoomType option:selected').attr('has-value') == 0) {
        // alert('No Value');
        // document.getElementById("addBedCount").style.visibility = "hidden";
        document.getElementById("newBedCount").style.display = "none";
    }

});






// ajax script for getting Room Level Amenity List
$(document).on('change', '#cmbRoomAmenity', function () {
    var roomAmenityId = $(this).val();
    // console.log("room Amenity id : " + roomAmenityId);
    if (roomAmenityId != 0) {

        $.ajax({
            type: 'POST',
            url: 'dependantcombo.php',
            data: { 'room_amenity_id': roomAmenityId },
            success: function (result) {
                // TODO : Set multi select based on Room Amenity Selected
                $('#cmbRoomAmenityList').html(result);
                // console.log(location_id);
                $('#cmbRoomAmenityList').val(0);
                $('#cmbRoomAmenityList').trigger('change');
            }
        });

    } else {
        // $('#cmbRoomAmenityList').html('<option value="">Amenity List</option>');
        $('#cmbRoomAmenityList').empty();
        $('#cmbRoomAmenityList').val(0);
        $('#cmbRoomAmenityList').trigger('change');
    }
});

//Show value input based on Amenity List - ROOM Level
$(document).on('change', '#cmbRoomAmenityList', function () {
    var roomAmenityListId = $(this).val();
    // console.log(locationId);

    if ($('#cmbRoomAmenityList option:selected').attr('has-value') == 1) {
        // alert('Value Required');
        document.getElementById("addRoomAmenityValue").style.visibility = "visible";
        document.getElementById("txtRoomAmenityValue").required = true;

    } else if ($('#cmbRoomAmenityList option:selected').attr('has-value') == 0) {
        // alert('No Value');
        document.getElementById("addRoomAmenityValue").style.visibility = "hidden";
    }


});


//IMAGE UPLOAD

//Test Image upload second functoin

// $("#btnImageSave1").on("click", function () {
//     alert("clicked");
//     var x = document.getElementById("images");
//     if ('files' in x) {
//         var file = x.files[0];
//         if ('name' in file){
//         alert(file.name);
//         } else { alert('no name');}
//     }
// });

$(function imgUpload() {

    $('#uploadForm').ajaxForm({

        target: '#imagesPreview',
        beforeSubmit: function () {
            // $('#uploadStatus').html('<img src="css/uploading.gif"/>');
        },
        success: function (response) {
            // alert("inside function");
            // $('#images').val('');
            $('#uploadStatus').html('');
            // console.log("Images click Done");
            // testImage();
console.log('Response : ' + response);
            // $("#btnImageUpload").prop("disabled", true);
        },
        error: function () {
            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
        }
    });
});


// VIDEO UPLOAD

$(function videoUpload() {
    $('#videoUploadForm').ajaxForm({
        target: '#videoPreview',
        beforeSubmit: function () {
            // $('#uploadStatus').html('<img src="css/uploading.gif" />');
        },
        success: function () {
            // alert("inside video upload");
            $('#videoFile').val('');
            $('#uploadStatus').html('');
        },
        error: function () {
            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
        }
    });
});




// Upload multiple images using jqueryForm.form.js End



//SAVE BUTTON IN ADD ROOM POPUP CLICKED
$("#btnAddNewRoom").on("click", function (event) {

    // console.log('Popup Save Clicked');

    //Validations
    // 1. Check for Mandatory values
    // 2. Show Dormitory bed count only if Dormitory is selected.

    var $errorMessage = "";


    if ($('#txtNewRoomName').val() != "") {
        var newRoomName = $('#txtNewRoomName').val();
    } else {
        $errorMessage = $errorMessage + " Room Name is Mandatory.<br>";
    }

    //TODO : Validate Combo box value

    var sel = document.getElementById('cmbNewRoomType');
    var selectedRoomType = sel.options[sel.selectedIndex].value;

    if (selectedRoomType != "0") {
        var newRoomType = selectedRoomType;

        if (selectedRoomType == "7") {
            var newDormitoryBedCount = $('#txtNewDormitoryBedCount').val();
        } else {
            var newDormitoryBedCount = 0;
        }
    } else {

        $errorMessage = $errorMessage + " Room Type is Mandatory.<br>";
    }

    //TODO : Calculate Bed Count   
    // var newBedCount = $('#newBedCount').val();

    var sel = document.getElementById('cmbNewBedType');
    var selectedBedType = sel.options[sel.selectedIndex].value;

    if (selectedBedType != "0") {
        var newBedType = selectedRoomType;
    } else {
        $errorMessage = $errorMessage + " Bed Type is Mandatory.<br>";
    }

    if ($('#txtNewRoomPrice').val() != "") {
        var newRoomPrice = $('#txtNewRoomPrice').val();
    } else {
        $errorMessage = $errorMessage + " Room Price is Mandatory.<br>";
    }

    if ($('#txtNewRoomDeposit').val() != "") {
        var newRoomDeposit = $('#txtNewRoomDeposit').val();
    } else {
        $errorMessage = $errorMessage + " Room Deposit is Mandatory.<br>";
    }

    var newRoomDepositRefundable = $("#chkNewRoomDepositRefundable").is(':checked');

    if ($('#txtNewRoomCount').val() != "") {
        var newRoomCount = $('#txtNewRoomCount').val();
    } else {
        $errorMessage = $errorMessage + " Room Count is Mandatory.<br>";
    }

    console.log($errorMessage + " : " + newRoomDepositRefundable);
    // let el = $('#errmessage')[0];
    // el.innerHTML = "Success";
    document.getElementById('errmessage').innerHTML = $errorMessage;
    document.getElementById('errmessage').style.color = "red";
    document.getElementById('errmessage').style.fontSize = "12px";
    // document.getElementById('errmessage').style.backgroundColor = "#fff";



    if ($errorMessage != "") {

        return false;
    }
    // return false;
    var roomFlag = "NEWROOM"


    var formData = {
        roomFlag: roomFlag,
        roomName: newRoomName,
        roomType: newRoomType,
        dormBedCount: newDormitoryBedCount,
        roomBedType: newBedType,
        roomPrice: newRoomPrice,
        roomDeposit: newRoomDeposit,
        isDepositRefundable: newRoomDepositRefundable,
        noOfRooms: newRoomCount,
    }
    console.log(formData);

    $.ajax({
        url: "addRoom.php",
        type: "POST",
        data: formData,
        success: function (response) {

            $('#addNewRoom').modal('hide');
            window.location.href = "propertyrooms.php";

        }
    });

});


//SAVE BUTTON IN ROOM MANAGEMENT CLICKED
$("#btnRoomSave").on("click", function (event) {
    // var fs = current_fs = $(this)
    event.preventDefault();

    var roomFlag = "saveRoom";
    var formid = jQuery("#formRoomInfo").id;
    var formName = event.target.closest('form').id
    // alert("save button in Room Management");
    // alert("formname : " + formName);


    var roomId = $('#txtRoomId').val();
    // alert("room id : " + roomId);
    var roomName = $("#txtRoomName").val();
    var roomType = $("#cmbRoomType").val();

    var sel = document.getElementById('cmbRoomType');
    var selected = sel.options[sel.selectedIndex];
    var isDormitory = selected.getAttribute('has-value');
    var roomDormitoryBedCount = "";
    if (isDormitory == 1) {
        roomDormitoryBedCount = $("#txtDormitoryBedCount").val();
    }
    var roomBedType = $("#cmbBedType").val();
    var roomPrice = $("#txtRoomPrice").val();
    var roomDeposit = $("#txtRoomDeposit").val();
    var isDepositRefundable = $("#chkRoomDepositRefundable").is(':checked');
    var noOfRooms = $("#txtRoomCount").val();

    var roomAmenity = $("#cmbRoomAmenity").val();
    var roomAmenityList = $("#cmbRoomAmenityList").val();

    var sel = document.getElementById('cmbRoomAmenityList');
    var selected = sel.options[sel.selectedIndex];
    var hasValue = selected.getAttribute('has-value');

    var roomAmenityValue = "";

    if (hasValue == 1) {
        roomAmenityValue = $("#txtRoomAmenityValue").val();
    }

    var formData = {
        roomFlag: roomFlag,
        roomId: roomId,
        roomName: roomName,
        roomType: roomType,
        noOfRooms: noOfRooms,
        roomBedType: roomBedType,
        dormBedCount: roomDormitoryBedCount,
        roomPrice: roomPrice,
        roomDeposit: roomDeposit,
        isDepositRefundable: isDepositRefundable,
        roomAmenity: roomAmenity,
        roomAmenityList: roomAmenityList,
        roomAmenityValue: roomAmenityValue,
    }
    console.log(formData);

    $.ajax({
        url: "addRoom.php",
        type: "POST",
        data: formData,
        success: function (response) {
            // console.log("response : " + response);
            document.getElementById("formbasicsuccess").innerHTML = response;
            document.getElementById("formbasicsuccess").style.color = 'green';
            document.getElementById("formbasicsuccess").style.display = "block";
            var plaintext = "$('#formbasicsuccess').delay(5000).fadeOut(300);";
            const script = document.createElement('script');
            // var plaintext2 = "getresult('getresult.php');";
            script.id = 'idForScript'
            script.innerHTML = plaintext;
            document.head.appendChild(script);
        }
    });

});
