
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  //show hide password 
  $("#passwordBaru .input-group-append .input-group-text a").on('click', function(event) {
    event.preventDefault();
    if($('#passwordBaru input').attr("type") == "text"){
        $('#passwordBaru input').attr('type', 'password');
        $('#passwordBaru .input-group-append .input-group-text i').addClass( "fa-eye-slash" );
        $('#passwordBaru .input-group-append .input-group-text i').removeClass( "fa-eye" );
    }else if($('#passwordBaru input').attr("type") == "password"){
        $('#passwordBaru input').attr('type', 'text');
        $('#passwordBaru .input-group-append .input-group-text i').removeClass( "fa-eye-slash" );
        $('#passwordBaru .input-group-append .input-group-text i').addClass( "fa-eye" );
    }
  });
  $("#passwordLama .input-group-append .input-group-text a").on('click', function(event) {
    event.preventDefault();
    if($('#passwordLama input').attr("type") == "text"){
        $('#passwordLama input').attr('type', 'password');
        $('#passwordLama .input-group-append .input-group-text i').addClass( "fa-eye-slash" );
        $('#passwordLama .input-group-append .input-group-text i').removeClass( "fa-eye" );
    }else if($('#passwordLama input').attr("type") == "password"){
        $('#passwordLama input').attr('type', 'text');
        $('#passwordLama .input-group-append .input-group-text i').removeClass( "fa-eye-slash" );
        $('#passwordLama .input-group-append .input-group-text i').addClass( "fa-eye" );
    }
  });
});

(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
      
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 768 && !$("body").hasClass("sidebar-toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  if ($(window).width() < 768 && !$("body").hasClass("sidebar-toggled")) {
    $("body").addClass("sidebar-toggled");
    $(".sidebar").addClass("toggled");
    $('.sidebar .collapse').collapse('hide');
  };

  if($('#accordionSidebar')){
  const ps = new PerfectScrollbar('#accordionSidebar');
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });
  }
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

$("#btn-collapse, #btn-hidden").on('click', function(e) {
  $("#form-normal").toggleClass("d-none");
  $("#form-collapse").toggleClass("d-none");
});

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

// Ambil data flash dari elemen
const  flashData = $('.flash-data');
const pesan = flashData.data('pesan');
const tipe = flashData.data('tipe');

// Cek dan tampilkan alert menggunakan SweetAlert
if (pesan && tipe) {
    let iconType;

    // Menentukan tipe ikon berdasarkan tipe pesan
    switch (tipe) {
        case 'success':
            iconType = 'success';
            break;
        case 'error':
            iconType = 'error';
            break;
        case 'warning':
            iconType = 'warning';
            break;
        default:
            iconType = 'info';
    }

    Toast.fire({
      title: pesan,
      icon: iconType,
    });
}



