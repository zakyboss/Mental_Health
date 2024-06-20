//inbuilt function
//alert('There is hope.');

//DOM

//Events
// - User
// - Network
// - Broswer

//Get element of interest
//Variable declaration done with var keyword
//case sensitive
//var joinButton = document.getElementById('join-button');

//DOM - Document Object Model (document)
//in js this is an object
//console.log(joinButton);
//console.log(document);

//joinButton.addEventListener('mouseover', function(){
//console.log('Someone is thinking of joining');
//});
// Slideshow functionality
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
showSlides(slideIndex += n);
}

function currentSlide(n) {
showSlides(slideIndex = n);
}
function showSlides(n) {
var i;
var slides = document.getElementsByClassName('slide');
var dots = document.getElementsByClassName('dot');
if (n >slides.length) { slideIndex = 1 }
if (n < 1) { slideIndex = slides.length }
for (i = 0; i < slides.length; i++) {
slides[i].style.display = 'none';
}
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace('active', '');
}
slides[slideIndex - 1].style.display = 'block';
dots[slideIndex - 1].className += 'active';
}
