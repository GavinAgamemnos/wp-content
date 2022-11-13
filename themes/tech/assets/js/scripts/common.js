// hamburger nav js //

var burger = document.querySelector('.hamburger');
var nav = document.querySelector('.navbar');

burger.addEventListener('click', function() {
  burger.classList.toggle('isactive');
  nav.classList.toggle('active');

});

// end nav js //
