jQuery(function () {


    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var successname = ""
    var formData;

//DESCRIPTION TAB SAVE CLICKED
    $("#saveDesc").on("click", function (event) {
        var fs = current_fs = $(this)
        event.preventDefault();
        alert(event.target.parentNode.id);
        // alert(event.target.id);

        if (event.target.parentNode.id == 'formDescription') {

            //Initialize variables
            var child = event.target;
            var formName = child.parentNode.id;
            successname = formName;
            document.getElementById('tabDesc').value = formName;
            formData = $(this).parent().serialize();

            var shortDesc = document.getElementById('tareaShortDescription').value;
            var LongDesc = document.getElementById("tareaLongDescription").value;


            functionWithAjaxScript(formData);
        }

    });


    //BASIC TAB SAVE CLICKED
    $("#save").on("click", function (event) {
        var fs = current_fs = $(this)
        event.preventDefault();
        alert(event.target.parentNode.id);
        alert(event.target.id);

        //BASIC Tab
        //Target.id is the Button Name

        if (event.target.parentNode.id == 'formbasic') {

            var child = event.target;
            var formName = child.parentNode.id;
            successname = formName;
            document.getElementById('tabBasic').value = formName;
            formData = $(this).parent().serialize();

            var StayName = document.getElementById('txtStaytypeName').value;
            var StayCategory = document.getElementById("cmbStaytypeCategory").value;

            if (!StayName || !StayCategory) {
                // alert('Name : ' + StayName + " Cat : " + StayCategory);
                document.getElementById("formbasicsuccess").innerHTML = 'Staytype Name and Category is Required';
                document.getElementById("formbasicsuccess").style.color = 'red';
                return false;
            }

            functionWithAjaxScript(formData);

        }

    });

    
//DESCRIPTION TAB SAVE CLICKED
$("#saveTerms").on("click", function (event) {
    var fs = current_fs = $(this)
    event.preventDefault();
    alert(event.target.parentNode.id);
    alert(event.target.id);

    if (event.target.parentNode.id == 'formTerms') {

        //Initialize variables
        var child = event.target;
        var formName = child.parentNode.id;
        successname = formName;
        document.getElementById('tabTerms').value = formName;
        formData = $(this).parent().serialize();

        var Terms = document.getElementById('tareaTerms').value;


        functionWithAjaxScript(formData);
    }

});


    function functionWithAjaxScript(formData) {

        //TODO : .done instead of success
        // Check : https://stackoverflow.com/questions/5316697/jquery-return-data-after-ajax-call-success
        $.ajax({
            url: "addproperty.php",
            type: "POST",
            data: formData,
            // data: $(this).parent().serialize(),
            success: function (data) {
                // console.log(data);
                //Identify the Tab from which the submit is done. Handle it in addproperty.php
                // alert(data);
                // console.log('successname : ' + successname + ' - ');
                document.getElementById("formbasicsuccess").innerHTML = data;
                document.getElementById("formbasicsuccess").style.color = 'green';
                document.getElementById("formbasicsuccess").style.display = "block";
                var plaintext = "$('#formbasicsuccess').delay(5000).fadeOut(300);";
                const script = document.createElement('script');
                script.id = 'idForScript'
                script.innerHTML = plaintext;
                document.head.appendChild(script);;
            }
        });

    }


    $(".next").on("click", function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        current_fs = $(this).parent().parent();
        // current_fs = fs.parent().parent();

        // console.log($(this).parent());
        $form1 = $(this).parent();
        // $form1.submit();
        // $('#progressbar li').eq($("fieldset").index(2)).addClass("active");

        // next_fs = fs.parent().parent().next();
        next_fs = $(this).parent().parent().next();
        // current_fs = $(this);
        // next_fs = $(this).next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

    $(".previous").on('click', function () {

        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function () {
        return false;
    })

});