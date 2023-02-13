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
    setTimeout(function() {
        //your datatable code 
        $('#amenitiesTable').DataTable({
            scrollY: '200px',
            scrollCollapse: true,
            paging: true,
            searching:false,
        });
     }, 1600);


    //  $('#roomAmenitiesTable').DataTable().columns.adjust();
    //  $($.fn.dataTable.tables(true)).DataTable('#amenitiesTable')
    //  .columns.adjust()

    //  $($.fn.dataTable.tables(true)).DataTable('#roomAmenitiesTable')
    //  .columns.adjust();


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
    // console.log(locationId);
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
    if (amenityId) {

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
        $('#cmbAmenityList').html('<option value="">Amenity List</option>');
    }
});

//TODO : Property Level Amenity : Show Value Input based on Amenity List Selected. Only for single selection.

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


    //     if(roomAmenityListId){

    //         var none = $(this).find('option:selected').length;
    //         if (none > 1){
    // alert("more than one selected");
    //         }

    //     }else{
    //         // $('#cmbRoomAmenityList').html('<option value="">Amenity List</option>');
    //     }
});






// ajax script for getting Room Level Amenity List
$(document).on('change', '#cmbRoomAmenity', function () {
    var roomAmenityId = $(this).val();
    // console.log(locationId);
    if (roomAmenityId) {

        $.ajax({
            type: 'POST',
            url: 'dependantcombo.php',
            data: { 'room_amenity_id': roomAmenityId },
            success: function (result) {
                // TODO : Set multi select based on Room Amenity Selected
                $('#cmbRoomAmenityList').html(result);
                // console.log(location_id);


            }
        });

    } else {
        $('#cmbRoomAmenityList').html('<option value="">Amenity List</option>');
    }
});











// ajax script for getting  city data
//  $(document).on('change','#state', function(){
//     var stateID = $(this).val();
//     if(stateID){
//         $.ajax({
//             type:'POST',
//             url:'backend-script.php',
//             data:{'state_id':stateID},
//             success:function(result){
//                 $('#city').html(result);

//             }
//         }); 
//     }else{
//         $('#city').html('<option value="">City</option>');

//     }
// });


// Upload multiple images using jqueryForm.form.js Start


// $(document).ready(function(){
$(function () {
    $('#uploadForm').ajaxForm({
        target: '#imagesPreview',
        beforeSubmit: function () {
            // $('#uploadStatus').html('<img src="css/uploading.gif"/>');
        },
        success: function () {
            $('#images').val('');
            $('#uploadStatus').html('');
        },
        error: function () {
            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
        }
    });
});



// Upload multiple images using jqueryForm.form.js Start
