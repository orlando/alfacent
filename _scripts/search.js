var SearchResults = function (config) {
  var items = config.items,
    inputElement = $(config.inputElement),
    contentElement = $(config.contentElement),
    countElement = $(config.countElement);

  function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split('&');

    for (var i = 0; i < vars.length; i++) {
      var pair = vars[i].split('=');

      if (pair[0] === variable) {
        return _.escape(decodeURIComponent(pair[1].replace(/\+/g, '%20')));
      }
    }
  }

  function displayResults(results, query) {
    var template = $('#postTemplate').html();
    var resultIds = results.map(function (i) {
      return i.ref;
    });

    var posts = _.filter(items, function (item) {
      return _.includes(resultIds, item.id);
    });

    posts.forEach(function (post) {
      var rendered = Mustache.render(template, {
        title: post.title,
        excerpt: post.excerpt,
        url: post.url,
        date: post.date
      });

      contentElement.append(rendered);
    });

    countElement.append($('<p>' + results.length + ' resultados para: "' + query + '"</p>'));

    return posts;
  }

  this.init = function () {
    if (inputElement.length == 0 || contentElement.length == 0) {
      return;
    }

    var query = getQueryVariable('query');

    if (!query) {
      countElement.append($('<p>Usa el buscador para encontrar publicaciones.</p>'));
      return;
    }

    inputElement.val(query);

    var idx = lunr(function () {
      this.field('id');
      this.field('title', { boost: 10 });
      this.field('excerpt');
    });

    items.forEach(function (item) {
      idx.add({
        'id': item.id,
        'title': item.title,
        'excerpt': item.excerpt
      });
    });

    var results = idx.search(query);

    return displayResults(results, query);
  };
};
