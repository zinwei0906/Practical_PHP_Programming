$(document).ready(function () {
    //Q4
    $("#join_list").click(function () {
        var email1 = $("#email_address1").val();
        var email2 = $("#email_address2").val();
        var firstName = $("#first_name").val();
        var checkValid = true;

        if (email1 == "") {
            $("#email_address1").next().text("This field is required");
            checkValid = false;
        }
        else {
            $("#email_address1").next().text("");
        }
        if (email2 == "") {
            $("#email_address2").next().text("This field is required");
            checkValid = false;
        }
        else if (email1 !== email2) {
            $("#email_address2").next().html("<br>The email address entered must be the same.<br>The Email Address and Re-enter Email Address fields contain the same value");
            checkValid = false;
        }
        else {
            $("#email_address2").next().text("");
        }
        if (firstName == "") {
            $("#first_name").next().text("This field is required");
            checkValid = false;
        }
        else {
            $("#first_name").next().text("");
        }
        if (checkValid == true) {
            $("#email_form").submit();
        }
    });

    //Q4c
    $('input:text').focus(function () {
        $(this).css({ 'background-color': '#FFF8C6' });
    });

    $('input:text').blur(function () {
        $(this).css({ 'background-color': '#FFFFFF' });
    });
    $("input:text:visible:first").focus();

    //Q6
    $("#clear_entries").click(function () {
        $('input[type="text"]').val("");
        $('input[type="text"]').next().text("*");
        $("input:text:visible:first").focus();
    });

    //Q7
    $('input[type="text"]').on("dblclick", function () {
        $(this).val("");
    });
});