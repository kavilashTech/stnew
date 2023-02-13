jQuery(function () {


    //ADD AMENITY IN PROPERTY CLICKED
    $("#addPropAmenity").on("click", function (event) {
        // var fs = current_fs = $(this)
        event.preventDefault();

        var propAmenity = $("#cmbAmenity").val();
        var propAmenityList = $("#cmbAmenityList").val();


        var sel = document.getElementById('cmbAmenityList');
        var selected = sel.options[sel.selectedIndex];
        var hasValue = selected.getAttribute('has-value');

        
        var propAmenityValue = 0;

        if (hasValue == 1){
            propAmenityValue = $("#txtAddPropertyAmenityValue").val();
        }


        // alert("flag : " + hasValue + " : " + propAmenityValue);

        // var propAmenityValue = $("#txtAddPropertyAmenityValue").val();
        // alert("a : " + propAmenity + " L : " + propAmenityList);

        functionWithAjaxScript(propAmenity, propAmenityList, hasValue, propAmenityValue);

        // }

    });


    function functionWithAjaxScript(am, amlist, amHasValue, amvalue) {

        //TODO : .done instead of success
        // Check : https://stackoverflow.com/questions/5316697/jquery-return-data-after-ajax-call-success
        $.ajax({
            url: "addAmenities.php",
            type: "POST",
            data: {
                tabPropAmenities: "test",
                propAmenity: am,
                propAmenityList: amlist,
                propHasValue : amHasValue,
                propAmenityValue: amvalue

            },
            // data: $(this).parent().serialize(),
            success: function (response) {
                console.log(response);

                document.getElementById("formbasicsuccess").innerHTML = response;
                document.getElementById("formbasicsuccess").style.color = 'green';
                document.getElementById("formbasicsuccess").style.display = "block";
                var plaintext = "$('#formbasicsuccess').delay(5000).fadeOut(300);";
                const script = document.createElement('script');
                var plaintext2 = "getresult('getresult.php');";
                script.id = 'idForScript'
                script.innerHTML = plaintext + plaintext2;
                document.head.appendChild(script);
            }
        });

    }



    // $(".submit").click(function () {
    //     return false;
    // })

});