$(document).ready(function () {
    $("#image_rollovers img").each(function () {
        var uml1 = $(this).attr("src");
        var uml2 = $(this).attr("id");

        $(this).mouseover(function () {
            $(this).attr("src", uml2);
        });
        $(this).mouseout(function () {
            $(this).attr("src", uml1);
        });

    });
});