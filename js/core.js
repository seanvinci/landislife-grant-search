// GLOBAL VARIABLES

var $window = $(window);
var $body = $('body');
var $navMain = $('.nav-main');
var $pageSubnav = $('.page-subnav');
var $purchaseDetail = $('.purchase-detail');
var $eventDetail = $('.event-detail');
var $courseSubnav = $('.course-subnav');
var $modal = $('.modal-overlay');
var viewport_width = $window.outerWidth(true);
var $hasSubnav = $('.has-subnav');
var $hasSubnavAnchor = $('> a', $hasSubnav);
var $hasSubnavUl = $hasSubnavAnchor.next('ul');


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

function resetNav() {
  $body.removeClass('nav-open clip');
  $hasSubnav.removeClass('nav-active');
  $hasSubnavUl.css('display', '');
}

// Check if user has scrolled more than 200px
// If so add class of 'nav-small' to body tag
function smallNav() {
  var scroll_top = $window.scrollTop();
  var viewport_width = $window.outerWidth(true);
  if (viewport_width > 768) {
    if (scroll_top > 130) {
      $body.addClass('nav-small');
    } else {
      $body.removeClass('nav-small');
    }
  } else {
    $body.removeClass('nav-small');
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

  // show and hide sub navigation on mobile and tablet
  $('.nav-main nav .has-subnav > a').click(function(e) {
    if (viewport_width < 1024) {
      e.preventDefault();
      $(this).closest('.has-subnav').toggleClass('nav-active');
      $(this).next('ul').slideToggle(200);
    }
  });

});