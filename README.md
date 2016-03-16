# Hashlabs WordPress Core
## HashCore

### Wordpress Base

- [_underscores](https://github.com/automattic/_s) instead of sage
- SiteOrigin Page Builder
- Remove all SiteOrigin Widgets, create the ones we have missing
- Languages/internationalization
- Theme section, where you can install demos and tweak theme [Grettings](http://take.ms/wpLQz)
- Theme options, where I can modify things like header distribution, logo, social media links [Custom](http://take.ms/DdPEw)
- Responsiveness
- Support for all templates and common variations like (pages with sidebar)
- Support section (help, like "dude esta vaina esta mal que hago?")
- Documentation

## Research
### Menu of theme  
  * Some theme have a custom menu in admin sidebar
  * other use the appearance inside      
  __Best menu ubication is down of dashboard link__

#### Way of handled customization page  
  * Theme X they use a hard UI call Cornerstone with full front-end customization
  * Theme Avada They use Fusion Builder work inside admin page
  * Theme Quasar  they use Rock page builder work inside admin page
  * Theme Total They use Visual Composer have back-end and front-end
  * Theme Neighborhood they use swift page builder inside admin page  
  __The best builder is Cornerstone by with may setting some feel lost__

#### Demo page
  - Theme as Avada and X include a variety of them pre build with all ready to only change some and public site
  - Theme Quasar use template of visual computer by no have demo to install
  - Theme Total no have demo  
  __In this case need some page of demo, this demo have different behavior for the site, They are therefore specialized site__

### Custom widget
  - all theme have multiple of widget to work with integrated page builder  
  __This are:__  

Widget Type      | Counter Theme | Widget Type     | Counter Theme
---------------: | :-------------| ---------------:|:-------------
Titles           | **3**         | Accordion       | **3**
Paragraph        | **5**         | Tab             | **5**
Image            | **4**         | Audio embedded  | 2          
Gap              | **5**         | Video embedded  | 2
Button           | **4**         | Event           | 2
Icon             | **3**         | Social icon     | 2
Icon List        | **3**         | Widget Area     | 2
Author           | **3**         | Gallery type    | 2
Post             | **4**         | Testimonial     | 2
Counter          | **3**         | Card (animate)  | 1
Alert (Animate)  | **3**         | Pie kart        | 1
Skill Bar        | **4**         | Modal           | 1
Slider           | **3**         | Checklist       | 1
Map Google       | **5**         | Count down      | 1
Feature List     | **3**         | Video Player    | 1
Search           | **3**         | Parallax        | 1
Quote            | 1             | Sharing box     | 2
Youtube          | 2             | Tweets *        | 1
Code Snippet     | **4**         |
Toggles          | **3**         |


_*_ oAuth [Twitter Feed Plugin](https://designorbital.com/easy-twitter-feed-widget/)  

## Custom page option  
  * This referred to option can set in admin page of theme  


General                  | Header              | Footer    | Scheme Color   | Font Option
:----------------------- | :------------------ | :-------- | --------------:| :-------------
Layout (*box-size/width*)| Layout (Many)       | on/off    | Import/export  | Body (*standard/Google*)
Favicon (sizes)          | Logo (retina)       | Layout    | By (h1 ~ h6)   | Title (*standard/Google*)
Rss URL                  | Logo size/attributes| Copyright | Background item| Menu (*standard/Google*)
Custom CSS               | Custom some text    | Effects   | -              | Size (h1~h6), Body
Google Analytics         | Header fixed/not    | Background| -              | Line Height (h1~h6), Body
Enable Zoom on mobile    | Background image    | Attributes| -              | Font Weight
-                        | Width is Left/Right | -         | -              | Letter Spacing (h1~h6), Body       
-                        | Mobile Breakpoint   |-|-|-
-                        | Social icons        |-|-|-  

Social Profile | Import / Export | Sidebar | Support Area   | Menu
:------------- | :-------------- |:--------|---------------:|:---------------
Social Account | Backup option   | Config  | Documentation  | Menu attributes
Custom social  | base64          | If Page | Knowledgebase  | Menu mobile
-              | -               | If Blog | Submit A Ticket| Color
-              | -               | Search  | Video Tutorials| Dropdown Style


Background  | Blog           | Blog single Post| System status            | Image Settings
:---------- | :------------- |:----------------|-------------------------:|:-------------  
Outer boxed | Title          | Featured Image  | WP Environment           | Thumbnail
Attributes  | Layout Type    | Pagination      | Server Environment       | Medium
-           | Pagination     | Title           | WP Memory Limit:256 *    | Large
-           | Excerpt/Content| Author          | PHP Time Limit:300 *     | Featured
-           | Excerpt length | Social share    | PHP Max Input Vars:1600* | Style
-           | Strip HTML     | Related Post    |-|-
-           | Featured Image | Comments        |-|-
-           | -              | Meta options    |-|-


_*_ [Increasing memory allocated to PHP](http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP)  
_*_ [Increasing max execution to PHP](http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded)  
_*_ [Increasing max input vars limit](http://sevenspark.com/docs/ubermenu-3/faqs/menu-item-limit)  


Page config       | Toggle Bar |  
:---------------- | :--------- |  
Under Construction| Content    |
404 Error Page    | Visibility |
Login Page Design | Icon       |


## Plugin  

  * [Contact Form 7](http://contactform7.com/)
  * [Regenerate Thumbnails](http://www.viper007bond.com/wordpress-plugins/regenerate-thumbnails/)
  * [Icon List](https://wordpress.org/plugins/icon-list/)
  * [Easy Timer](http://www.kleor.com/easy-timer/en/)
  * [jetpack](http://jetpack.com/support/jetpack-for-developers/)
  * [Crelly Slider](http://fabiorino1.altervista.org/projects/crellyslider/)
  * [MediaElement.js](http://mediaelementjs.com/)
  * [Simple Twitter Tweets](https://wordpress.org/plugins/simple-twitter-tweets/)
  * [TGM Plugin Activation](http://tgmpluginactivation.com/)


## Road Map

1. Basic Structure of Theme (name of theme, prefix, documentation)
2. Build Menu Tree
  * 01- Greeting Page
  * 02- Support Page
  * 03- General Setting
  * 04- Header Setting
  * 05- Footer Setting
  * 06- Font Option
  * 07- Color Scheme
  * 08- Menu Setting
  * 09- SideBar
  * 10- Social Profile
  * 11- Image Setting
  * 12- Blog Page Setting
  * 13- Blog single Setting
  * 14- Background Setting
  * 15- Page config
  * 16- System status
  * 17- Backup Setting
3. Widget
  * 01- Title **3**
  * 02- Paragraph **5**
  * 03- Image **4**
  * 04- Gap (*space between*) **5**
  * 05- Button **4**
  * 06- Icon **3**
  * 07- Icon List **3**
  * 08- Author **3**
  * 09- Post **4**
  * 10- Counter **3**
  * 11- Alert (animate) **3**
  * 12- Skill Bar **4**
  * 13- Slider **3**
  * 14- Map Google **5**
  * 15- Feature List **3**
  * 16- Search **3**
  * 17- Price table **3**
  * 18- Youtube 2
  * 19- Quote 1
4. Implementation of plugin
5. Implementation of menu option

## Assumptions

* WordPress as a Git submodule in `/wp/`
* Custom content directory in `/content/` (cleaner, and also because it can't be in `/wp/`)
* `wp-config.php` in the root (because it can't be in `/wp/`)
* All writable directories are symlinked to similarly named locations under `/shared/`.

# Theme Naming
Is need change name of theme you can edit and run script __replace_string.zsh__

1. Search for `'hashcore'` (inside single quotations) to capture the text domain.
2. Search for `hashcore_` to capture all the function names.
3. Search for `Text Domain: hashcore` in style.css.
4. Search for ` Hashcore` (with a space before it) to capture DocBlocks.
5. Search for `hashcore-` to capture prefixed handles.
6. Search for `hashcore.pot` to change language file.
