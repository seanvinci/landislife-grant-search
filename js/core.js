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


// Initialize Select2 Plugin
$('select').chosen({
  disable_search: true,
  single_backstroke_delete: true,
  inherit_select_classes: true,
  placeholder_text_multiple: ' ',
  width: '100%'
});


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

  // Check if nav and subnav item will be out of viewport
  // if it is add class to change position
  $(".nav-main nav li").on('mouseenter mouseleave', function(e) {
    if ($(window).outerWidth(true) >= 1024) {
      if ($('ul.level-2', this).length) {
        var parentElm = $('ul.level-2', this);
        // var childElm = $('ul.level-3', this);
        var off = parentElm.offset();
        var l = off.left;
        var w = parentElm.width();
        var docW = $('.nav-main').width();

        var isEntirelyVisible = (l + w <= docW);

        if (!isEntirelyVisible) {
          $(this).addClass('left-subnav');
        } else {
          $(this).removeClass('left-subnav');
        }
      }
    }
  });

  $('.grant-number').each(function () {
    $(this).prop('Counter',0).animate({
      Counter: $(this).text()
    }, {
      duration: 1500,
      easing: 'linear',
      step: function (now) {
        $(this).text(Math.ceil(now));
      }
    });
  });

});