var SearchBar = function (config) {
  var inputElement = $(config.inputElement),
    triggerElement = $(config.triggerElement),
    navbarLinksWrapper = $(config.navbarLinksWrapper);

  var that = this;

  this.init = function () {
    initializeSearchInput();
  };

  function initializeSearchInput() {
    triggerElement.on('click', function (event) {
      event.stopPropagation();

      if (!$(this).hasClass('active')) {
        $(this).addClass('active');
        inputElement.addClass('active');
        navbarLinksWrapper.hide();
      }
    });

    $(document).on('click', function (event) {
      if (event.target.id !== inputElement[0].id && inputElement.hasClass('active')) {
        inputElement.removeClass('active').val('');
        triggerElement.removeClass('active');
        navbarLinksWrapper.show();
      }
    });
  }
};
