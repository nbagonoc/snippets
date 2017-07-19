/*animate.css animation controller*/
jQuery(document).ready(function() {
    jQuery('.post').addClass("hideAnimation").viewportChecker({
        classToAdd: 'viewAnimation animated fadeIn',
        offset: 200
       });
});


//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});


//sidebar menu
//closes the sidebar menu
$("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});
//opens the sidebar menu
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});


document.getElementById('');
document.getElementsByClassName('');
document.getElementsByName('');
document.getElementsByTagName('');
document.getElementsByTagNameNS('');
document.getSelection('');
document.write('');

.addEventListener('click',functionName);

.length

this

.innerHTML

.innerHTML += //append something

.classList.add('className');

.classList.remove('className');

+ //concatinate

document.getElementById('meow').innerHTML = 'this is a test.';

document.getElementsByTagName('h3')[3].style.color='red';













