$(document).ready(function () {

    var nextSlide = $("#slides img:first-child");
    var nextCaption;
    var nextSource;

    timer1 = setInterval(function () {

        $("#caption").hide(1000);
        $("#slide").slideUp(2000, function () {
            if (nextSlide.next().length == 0) {
                nextSlide = $("#slide img:first-child");
            }
            else {
                nextSlide = nextSlide.next();
            }

            nextCaption = nextSlide.attr("alt");
            nextSource = nextSlide.attr("src");
            $("#caption").text(nextCaption).show(1000);
            $("#slide").attr("src", nextSource).slideDown(2000);
        });
    }, 5000);
});