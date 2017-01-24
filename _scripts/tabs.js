var tabbableContent = {
  init: function () {
    showFirstTab();

    $('.tabs li').click(function (e) {
      if (!$(this).hasClass('active')) {
        var tabNum = $(this).index();
        var nthChild = tabNum + 1;

        $('.tabs li.active').removeClass('active');
        $(this).addClass('active');
        $('.tab-containers li.active-tab').removeClass('active-tab').fadeOut({
          duration: 200,
          done: function () {
            $('.tab-containers li:nth-child(' + nthChild + ')').addClass('active-tab').fadeIn(200);
          }
        });
      }
    });
  }
};

function showFirstTab() {
  $('.tab-containers li:nth-child(1)').show();
}
