# Alfacent Website

The intent of this document is to serve as documentation on how to
configure the website using the Siteleaf CMS for Jekyll.

## Author

Carlos Martinez - carlos@hashlabs.com

## Configuration

The first step is to create an account at: https://www.siteleaf.com/

When creating a new site it's possible to use **connect existing repo**
to sync the repository with siteleaf.

![img1](http://i.imgur.com/IZ08shz.png)

Next you need to connect to the repository specifying the correct repo
(the site will be created with a 15 days trial, so connection to private
repos is possible):

![img2](http://i.imgur.com/4sdHrWi.png)

After the sync is completed, you should see all the pages and
configuration from the repository already available from the siteleaf
dashboard:

![img3](http://i.imgur.com/APJZ7Jn.png)

### Setting up hosting

**NOTE: After doing any changes to the configuration or anything in the
Siteleaf dashboard you need to press Save and then use the Publish Changes button at the
top-right of the navigation bar. Otherwise, the changes won't get
applied to the live site.**

To configure the hosting with Github Pages we need to go to `Settings >
Hosting` then select Github Pages and connect to the same repository:

![img4](http://i.imgur.com/psCwAOL.png)

Here a custom domain can be added, and siteleaf will add the CNAME file
to the repository for us.

### Site settings

In `Settings > General` we need to configure multiple parameters.

- title: The site title.
- url: The site URL with the specified domain, e.g: http://alfacent-staging.siteleaf.net/ **be sure to use the same format**
- contact_email: This is the email used in the contact form with
  formspree.
- disqus_shortname: The shortname for the disqus site.

#### Configuring formspree

To have the contact form working correctly you need to set the
`contact_email` variable, then you need to send the Contact form once
and click the link formspree sends to that email to verify it.

#### Configuring disqus

To have comments working correctly, create an account at: https://disqus.com/.

Then create a new site at: https://disqus.com/admin/create/

And go to the site admin panel. In the general tab, the site shortname
will be displayed: 

![img5](http://i.imgur.com/vh0XKma.png)

This is the setting to use in the variable `disqus_shortname`.

Next, go to the Advanced tab and add the site domain to the `Trusted
domains` section:

![img6](http://i.imgur.com/tGCAFs6.png)

#### Jekyll SEO Tags

Multiple meta tags can are available to be configured with this plugin,
all tags available can be seen in: https://github.com/jekyll/jekyll-seo-tag#usage

To add metadata use `convert to object` in siteleaf:

![gif123](http://g.recordit.co/zGoI8MMjcR.gif)

## Adding content

### About us

The content for the about us section that is displayed in the tabs for
the front page is also shown within the `Nosotros` page.

This content can be edited in `Information > Company Information`.

### Adding projects

Adding new projects can be done through the projects collection page:

![img10](http://i.imgur.com/2pBA5Us.png)

The `preview_title` and `preview_image` fields are used for the project
preview in other pages:

![img7](http://i.imgur.com/cwsGiFd.png)

### Tagging posts

A new page is created for each tag available, in order to have tags displayed correctly in posts, first create a new tag in the tags collection:

![img8](http://i.imgur.com/TmgUagq.png)

Then you can add it to a post:

![img9](http://i.imgur.com/RiyRL6E.png)

**Note: the autocomplete in post tags only displays tags used in other posts**

### Metadata description

Pages, posts, projects and tags include a `description` field, be sure to fill this field in order to correctly display that page description in search engines. If a page doesn't define the description, then `site.description` will be used
