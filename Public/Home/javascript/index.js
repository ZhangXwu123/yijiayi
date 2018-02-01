
$(function () {
    new Swiper('.swiper-container', {
        autoplay: 3500,
        loop: true,
        //effect: 'flip',
        slideActiveClass: "on",
        pagination: '.ad-tabs',
        paginationClickable: true,
        bulletActiveClass: 'on',
        paginationElement: 'span',
        autoplayDisableOnInteraction: false,
        uniqueNavElements: false,
        lazyLoading: true,

    });
    new Swiper('.champion_slide', {
        autoplay: 3500,
        loop: true,
        slideActiveClass: "on",
        pagination: '.page-info',
        slidesPerView: 2,
        spaceBetween: 103,
        paginationClickable: true,
        bulletActiveClass: 'on',
        paginationElement: 'span',
        autoplayDisableOnInteraction: false,
        uniqueNavElements: false,

    });
    var box = $(".exampleList");
    var boxheight = box.height()-0+20;
    box.append(box.html());
    (function goUp() {
        var top = box.scrollTop();
        if (top >= boxheight) {
            top = 0;
        }
        box.scrollTop(++top);
        setTimeout(goUp, 10)
    })()
})