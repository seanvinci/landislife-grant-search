// GLOBAL VARIABLES

var $window = $(window);
var $body = $('body');
var $navMain = $('.nav-main');


// FUNCTIONS

// Main nav

// Open and close main navigation
function toggleNav() {
  if ($body.hasClass('nav-open')) {
    $body.removeClass('nav-open clip');
    $hasSubnav.removeClass('nav-active');
    $hasSubnavUl.css('display', '');
  } else {
    $body.addClass('nav-open clip');
  }
}


$(document).ready(function() {

  // Header Navigation

  // Open or close navigation when hamburger is clicked
  $('.nav-icon').click(function() {
    toggleNav();
  });

  // Close navigation when ESC key is used
  $(document).on('keyup', function(e) {
    if (e.keyCode == 27) {
      resetNav();
    }
  });

  // Close navigation when anywhere in the webpage is clicked...
  $('.nav-overlay').click(function() {
    resetNav();
  });

});