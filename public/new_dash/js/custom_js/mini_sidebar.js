"use strict";
$(document).ready(function() {
    //leftmenu init
    if ($(window).width() >= 992) {
        $(".sidebar-toggle").on("click", function(e) {
            e.preventDefault();
            if ($("body").hasClass("mini")) {
                $("body").removeClass("mini");
                $("#menu").find("li").has("ul").children("a").off("click");
                $("#menu").find("li").has("ul").children("a").on("click", function(e) {
                    e.preventDefault();
                    $(this).parent("li").toggleClass("active").children("ul").collapse("toggle");
                    $(this).parent("li").siblings().removeClass("active").children("ul.active").collapse("hide");
                });
            }
            else {
                $("body").addClass("mini");
                $(".sub-menu").css("height", "auto");
                $('.menu-dropdown>a').off("click").on("click", function(e) {
                    e.preventDefault();
                });
                $("#menu").find('ul>.menu-dropdown').hover(function() {
                    var sideoffset = $(".sidebar").offset();
                    var submenuoffset = $(this).children("ul").offset();
                    if (sideoffset.top + $(".sidebar").height() < submenuoffset.top + $(this).children("ul").height()) {
                        $(this).children("ul").addClass("sidebarbottom");
                    }
                    $("#menu").find("li").has("ul").children("a").off("click");
                    $("#menu").find("li").has("ul").children("a").on("click", function(e) {
                        e.preventDefault();
                        $(this).parent("li").toggleClass("active").children("ul").collapse("toggle");
                        $(this).parent("li").siblings().removeClass("active").children("ul.active").collapse("hide");
                    });

                });
            }
        });
    }

});
