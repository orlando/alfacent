jQuery(function($){
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

});
