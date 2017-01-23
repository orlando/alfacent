(function () {
  $(document).ready(function () {
    var navbarHeader = $("#site-nav");
    var teehanNav = new TeehanLax(navbarHeader, {
      menuOffset: 100,
      hideShowOffset: 6,
      detachPoint: 500,
      classes: {
        detached: "header-detached",
        hidden: "header-hidden"
      }
    });

    teehanNav.init();
    tabbableContent.init();

    autosize($('textarea'));

    $('.mobile-toggle').on('click touchstart', function (event) {
      showHideNav();
      event.preventDefault();
    });

    $('#site-nav-mobile').on('click touchstart', function (event){
      event.stopPropagation();
    });

    function showHideNav() {
      if ($('#site-nav-mobile').hasClass('expanded')) {
        hideNav();
      } else {
        showNav();
      }
    }

    function showNav() {
      $('#site-nav-mobile').addClass('expanded');
      $('.mobile-toggle').addClass('is-active');
      $('body').addClass('no_scroll');
    }

    function hideNav() {
      $('#site-nav-mobile').removeClass('expanded');
      $('.mobile-toggle').removeClass('is-active');
      $('body').removeClass('no_scroll');
    }
  });
} ());
