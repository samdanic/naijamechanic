
$(document).ready(async () => {
    $('.navContainer').on('click', () => {
        $(".navContainer").toggleClass("active-nav");
        $(".harmburger").toggleClass("close");
        $(".harmburger1").toggleClass("off");
        $(".harmburger2").toggleClass("close1");
        $(".menu-container").toggleClass("active");
    })
})


