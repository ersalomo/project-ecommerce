$(function () {
    const header = $(".hidden-this-for-profile");
    const showProfile = $(".hidden-navbar-home.btn");
    const userProfile = $(".user-profile");
    const navbarChangerBg = $("nav.navbar-light.bg-light");
    const textNameShow = $("button.text-name");
    const countCart = $("span.badge.cart");

    if (userProfile.hasClass("user-profile")) {
        header.hide();
        navbarChangerBg.addClass("bg-dark navbar-dark");
        textNameShow.addClass("text-white");
        // countCart.addClass("text-white");
    }
});
