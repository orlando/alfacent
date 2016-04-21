  /****************** function for menu hide and show ***************************/
(function($) {
  var previousScroll = 0, // previous scroll position
  menuOffset = 50, // height of menu (once scroll passed it, menu is hidden)
  detachPoint = 560, // point of detach (after scroll passed it, menu is fixed)
  hideShowOffset = 6; // scrolling value after which triggers hide/show menu
  // on scroll hide/show menu
  $(window).scroll(function() {
    if (!$('#site-nav').hasClass('expanded')) {
      var currentScroll = $(this).scrollTop(), // gets current scroll position
      scrollDifference = Math.abs(currentScroll - previousScroll); // calculates how fast user is scrolling
      // if scrolled past menu
      if (currentScroll > menuOffset) {
        // if scrolled past detach point add class to fix menu
        if (currentScroll > detachPoint) {
          if (!$('#site-nav').hasClass('detached'))
          $('#site-nav').addClass('detached');
        }
        // if scrolling faster than hideShowOffset hide/show menu
        if (scrollDifference >= hideShowOffset) {
          if (currentScroll > previousScroll) {
            // scrolling down; hide menu
            if (!$('#site-nav').hasClass('invisible'))
            $('#site-nav').addClass('invisible');
          } else {
            // scrolling up; show menu
            if ($('#site-nav').hasClass('invisible'))
            $('#site-nav').removeClass('invisible');
          }
        }
      } else {
        // only remove “detached” class if user is at the top of document (menu jump fix)
        if (currentScroll <= 0){
          $('#site-nav').removeClass();
        }
      }
      // if user is at the bottom of document show menu
      if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        $('#site-nav').removeClass('invisible');
      }
      // replace previous scroll position with new one
      previousScroll = currentScroll;
    }
  });
  // shows/hides navigation’s popover if class "expanded"
  $('.mobile-toggle').on('click touchstart', function(event) {
    showHideNav();
    event.preventDefault();
  });
  // clicking anywhere inside navigation or heading won’t close navigation’s popover
  $('#site-nav-mobile').on('click touchstart', function(event){
    event.stopPropagation();
  });
  // checks if navigation’s popover is shown
  function showHideNav() {
    if ($('#site-nav').hasClass('expanded')) {
      hideNav();
    } else {
      showNav();
    }
  }
  // shows the navigation’s popover
  function showNav() {
    $('#site-nav').removeClass('invisible').addClass('expanded');
    $('.mobile-toggle').addClass('is-active'); // menu toggle animation to X
    window.setTimeout(function(){$('body').addClass('no_scroll');}, 200); // Firefox hack. Hides scrollbar as soon as menu animation is done
    }
  // hides the navigation’s popover
  function hideNav() {
    window.setTimeout(function(){$('body').removeClass();}, 10); // allow animations to start before removing class (Firefox)
    $('#site-nav').removeClass('expanded');
    $('.mobile-toggle').removeClass('is-active'); // menu toggle animation to burger icon
  }

  // tabs handler


	$('.soua-tab ul.soua-tabs').addClass('active').find('> li:eq(0)').addClass('current');

	$('.soua-tab ul.soua-tabs li a').click(function (g) {
		var tab = $(this).closest('.soua-tab'),
			index = $(this).closest('li').index();

		tab.find('ul.soua-tabs > li').removeClass('current');
		$(this).closest('li').addClass('current');

		tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
		tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();

		g.preventDefault();
	} );

})(jQuery);
