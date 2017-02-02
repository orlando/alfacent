# Alfacent - Jekyll

## How to use

1. Make sure you have bundler installed (gem install bundler)
2. `bundle install`
3. `rbenv rehash`
4. `jekyll serve --watch` to serve and watch for changes
5. run `jekyll build` when you want to build the site

## SASS

Jekyll compiles SASS when serving/building. Put your partials in the `_sass` folder, and your `main.scss` file in `css` folder. Your `main.scss` file should have the front matter declaration (dashes at the top of the file) to work correctly.

## Gulp

We're using gulp to concat and minify our javascript files.

Watch for javascript changes and automatically build them running:

```
gulp watch-js
```

Be sure to install the npm dependencies before, by running `npm install`.

## Comments

We're using Disqus to add comments to the blog, to configure it you need
to register a new disqus account, and configure the following variables
in the `_config.yml`:

```
url: {{ site url, including protocol, e.g: "http://alfacent-staging.siteleaf.net/" }}
disqus_shortname: {{ the shortname registered for the disqus site }}
```

It is also needed to add the domain to the `trusted domains` section in
disqus > advanced > trusted domains.

# About

![hash labs logo](https://www.hashlabs.com/images/hashlabs_logo_horizontal_02.png)

Alfacent is maintained by [Hash Labs LLC](http://www.hashlabs.com)
