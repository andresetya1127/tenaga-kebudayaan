let slide = 0;
let nextButton = $(".bnt-next");
let prevButton = $(".bnt-prev");

prevButton.hide();

nextButton.on("click", function (e) {
    e.preventDefault();
    slide++;

    prevButton.show();

    let slide_panel = $(".slide-panel.active");
    let next = slide_panel.removeClass("active").addClass("d-none");
    next.next().addClass("active").removeClass("d-none");

    if (slide >= $(".slide-panel").length - 1) {
        nextButton.hide();
    }
});

prevButton.on("click", function (e) {
    e.preventDefault();
    slide--;

    nextButton.show();

    let slide_panel = $(".slide-panel.active");
    let prev = slide_panel.removeClass("active").addClass("d-none");

    prev.prev().addClass("active").removeClass("d-none");

    if (slide <= 0) {
        prevButton.hide();
    }
});
