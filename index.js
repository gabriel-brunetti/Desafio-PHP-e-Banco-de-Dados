$(document).ready(function(){
    var navbar = $('.navbar');
    var navbarTextInner = $(navbar).find(".text-inner");
    var headerSection = $("section.header");
    var imngContainer = $(headerSection).find("img-container");
    var headerSectionTextInner = $(headerSection).find(".text-inner")

    var headerTimeline = new TimelineMax({paused: true});
    var animateSpeed = 0.75;
    var easeIn = Circ.easeIn;
    var easeOut = Circ.easeOut;

    headerTimeline.fromTo(
        headerSection,
        animateSpeed,
        {
            y: "1500",
            opacity: 0,
            ease: easeIn
        },
        {
            y: '0',
            opacity: 1,
            ease: easeOut,
            onComplete:function () {}
        }
    );

    headerTimeLine.play();
});