(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
      $('#content').toggleClass('active');
      // $('.topnav').toggleClass('active');
  });

  // Toggle the side navigation
  $('#close').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

  // Toggle the side navigation
  $('.custom-menu').on('click', function () {
      $('#sidebar').toggleClass('active');
      $('#content').toggleClass('active');
      // $('.topnav').toggleClass('active');
      $('.custom-menu').toggleClass('active');
      // $('#product').remove(); /*remove option from sidebar*/
  });

  //selected li
    $("#sidebar ul li").on("click", function() {
      $("#sidebar ul li").removeClass("active");
      $(this).addClass("active");
    });

  // // Close any open menu accordions when window is resized below 768px
  // $(window).resize(function() {
  //   if ($(window).width() < 768) {
  //     $('.sidebar .collapse').collapse('hide');
  //   };
  // });

  // // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  // $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
  //   if ($(window).width() > 768) {
  //     var e0 = e.originalEvent,
  //       delta = e0.wheelDelta || -e0.detail;
  //     this.scrollTop += (delta < 0 ? 1 : -1) * 30;
  //     e.preventDefault();
  //   }
  // });

  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict
