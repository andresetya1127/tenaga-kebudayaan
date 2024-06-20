$(window).on('scroll',function(){
    let about = $('.about'),
        point = $('.point'),
        navbar = $('nav.navbar')

// if ($(this).scrollTop() >= 10) {
//     navbar.addClass('bg-info');
// }else{
//     navbar.removeClass('bg-info');
// }

if ($(this).scrollTop() > 100 && $(this).scrollTop() < 900) {
    about.addClass('animate__animated animate__fadeInLeft');
}else{
    about.removeClass('animate__animated animate__fadeInLeft');
}

if ($(this).scrollTop() > 600 && $(this).scrollTop() < 1586) {
    point.addClass('animate__animated animate__fadeInLeft');
}else{
    point.removeClass('animate__animated animate__fadeInLeft');
}

})
