

$(document).ready(function () {
    $('#email_form').validate({
        rules: {
            email_1: {
                required: true,
                email: true
            },
            email_2: {
                required: true,
                email: true,
                equalTo: "#email_1"
            },
            first_name: "required",
            last_name: "required",
            state: {
                required: true,
                maxlength: 2
            },

            zip: {
                required: true,
                maxlength: 5
            },
        },
        messages: {
            email_1: {
                required: "Please enter a valid email address",
            },
            email_2: {
                required: "Please enter a valid email address",
                equalTo: "Please enter a re-enter email address same with email address"
            },
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            state: {
                required: "Please enter a state",
                maxlength: "Your state must consist of at max 2 characters"
            },
            zip: {
                required: "Please enter a zip",
                maxlength: "Your zip must consist of at max 5 characters"
            }


        }
    });

    $('input:text').focus(function () {
        $(this).css({ 'background-color': '#FFF8C6' });
    });

    $('input:text').blur(function () {
        $(this).css({ 'background-color': '#FFFFFF' });
    });
    $("input:text:visible:first").focus();

    $("#reset").click(function () {
        $('input[type="text"]').val("");
        $('input[type="text"]').next().text("*");
        $("input:text:visible:first").focus();
    });

});