# Setup

## Download

There are three ways to use Keel on your project:

1. [Download Keel](https://github.com/cferdinandi/keel/archive/master.zip) directly from GitHub.
2. Clone Keel from GitHub: `git@github.com:cferdinandi/keel.git`
3. Install Keel using your favorite package manager:
	- [NPM](https://www.npmjs.org/): `npm install cferdinandi/keel`
	- [Bower](http://bower.io/): `bower install https://github.com/cferdinandi/keel.git`
	- [Component](http://component.io/): `component install cferdinandi/keel`

<hr>


## File Structure

Compiled and production-ready code can be found in the `dist` directory. The `src` directory contains development code. Compiled documentation is in the `docs` directory. Unit tests are located in the `test` directory.

```
keel
|—— dist/
|   |—— css/
|   |   |—— main.css
|   |   |—— main.min.{{version #}}.css
|   |—— img/
|   |   |—— # Your image files
|   |—— js/
|   |   |—— detects.js
|   |   |—— detects.min.{{version #}}.js
|   |   |—— loadJS.js
|   |   |—— loadJS.min.{{version #}}.js
|   |   |—— main.js
|   |   |—— main.min.{{version #}}.js
|   |   |—— photoswipe.js
|   |   |—— photoswipe.min.{{version #}}.js
|   |—— svg/
|   |   |—— # Your SVGs
|—— docs/
|   |—— assets/
|   |   |—— # Your documentation assets
|   |—— dist/
|   |   |—— # Your distribution files
|   |—— index.html
|   |—— # Your other documentation files
|—— includes/
|   |—— keel-options/
|   |   |—— keel-post-options.php
|   |   |—— keel-theme-support.php
|   |—— keel-page-hero/
|   |   |—— keel-page-hero-render.php
|   |   |—— keel-page-hero.js
|   |   |—— keel-page-hero.php
|   |—— keel-photoswipe/
|   |   |—— assets/
|   |   |   |—— default-skin.png
|   |   |   |—— default-skin.svg
|   |   |   |—— masonry.min.js
|   |   |   |—— preloader.gif
|   |   |—— keel-photoswipe-options.php
|   |   |—— keel-photoswipe.php
|   |—— keel-shortcodes/
|   |   |—— keel-button-shortcode.php
|   |   |—— keel-svg-shortcode.php
|   |—— keel-custom-logo.php
|   |—— keel-set-page-width.php
|—— src/
|   |—— docs/
|   |   |—— _templates
|   |   |   |—— _header.html
|   |   |   |—— _footer.html
|   |   |   |—— # Your template files
|   |   |—— assets
|   |   |   |—— # Your documentation-specific assets
|   |   |—— index.md
|   |   |—— # Your documentation files
|   |—— img/
|   |   |—— # Your images
|   |—— js/
|   |   |—— detects/
|   |   |   |—— _ready.js
|   |   |   |—— loadCSS.js
|   |   |   |—— svg.js
|   |   |   |—— # Your feature detection scripts
|   |   |—— main/
|   |   |   |—— _focus-polyfill.js
|   |   |   |—— _imagesLoaded.js
|   |   |   |—— astro.js
|   |   |   |—— drop.js
|   |   |   |—— fastclick.js
|   |   |   |—— fluidvids.js
|   |   |   |—— sticky-footer.js
|   |   |   |—— zzz_inits.js
|   |   |   |—— # Your JavaScript plugins
|   |   |—— photoswipe/
|   |   |   |—— _imagesLoaded.js
|   |   |   |—— masonry.js
|   |   |   |—— photoswipe-ui-default.js
|   |   |   |—— photoswipe.js
|   |   |   |—— zzz_init.js
|   |   |—— loadJS.js
|   |—— sass/
|   |   |—— components/
|   |   |   |—— _astro-navbar.scss
|   |   |   |—— _buttons.scss
|   |   |   |—— _code.scss
|   |   |   |—— _drop.scss
|   |   |   |—— _forms.scss
|   |   |   |—— _grid.scss
|   |   |   |—— _normalize.scss
|   |   |   |—— _overrides.scss
|   |   |   |—— _photoswipe-default-skin.scss
|   |   |   |—— _photoswipe.scss
|   |   |   |—— _print.scss
|   |   |   |—— _svg.scss
|   |   |   |—— _tables.scss
|   |   |   |—— _typography.scss
|   |   |   |—— _wordpress-forms.scss
|   |   |   |—— _wordpress-images.scss
|   |   |—— _config.scss
|   |   |—— _mixins.scss
|   |   |—— main.scss
|   |—— static/
|   |   |—— # Static files and folders
|   |—— style.css
|—— test/
|   |—— coverage/
|   |   |—— # various files
|   |—— results/
|   |   |—— unit-tests.html
|   |—— spec/
|   |   |—— spec-myplugin.js
|   |   |—— # Your Jasmine JS unit tests
|—— .travis.yml
|—— gulpfile.js
|—— 404.php
|—— archive.php
|—— author.php
|—— comments.php
|—— content-none.php
|—— content-page.php
|—— content-search.php
|—— content.php
|—— footer.php
|—— functions.php
|—— gulpfile.js
|—— header.php
|—— index.php
|—— LICENSE.md
|—— nav-main.php
|—— nav-page.php
|—— nav-secondary.php
|—— package.json
|—— page.php
|—— README.md
|—— screenshot.png
|—— search.php
|—— searchform.php
|—— single.php
|—— style.css
```

<hr>


## Utility Methods

Keel includes a handful of utility methods in the `functions.php` file that make WordPress development easier.

- `keel_developer_options()` - Easily toggle functionality on or off.
- `keel_load_theme_files()` - Registers your theme styles and scripts and loads them in the markup.
- `keel_load_inline_header()` - Load inline content in the `<head>`.
- `keel_load_inline_footer()` - Load inlinen content in the footer.
- `keel_wpsearch()` - Creates a shortcode for the searchform.
- `keel_post_password_form()` - Replaces the default password-protected post messaging with custom language.
- `keel_pretty_wp_title()` - Makes the `wp_title()` function more useful.
- `keel_excerpt_length()` - Adjust default length of `the_excerpt()` content.
- `keel_excerpt_more()` - Adjust default "read more" text for `the_excerpt()`.
- `$content_width` - Sets a large maximum content width to avoid weird pixelation.
- `keel_register_menus()` - Registers navigation menus for use with `wp_nav_menu()` function.
- `add_theme_support( 'post-thumbnails' )` - Adds support for featured post images.
- `keel_remove_wpautop()` - Optionally disables automatic addition of paragraphs and break tags to your content. Off by default.
- `keel_get_all_posts()` - Optionally remove pagination from The Loop and get all matching posts. Off by default.
- `keel_comment_layout()` - A custom comment callback for `wp_list_comments()` used in `comments.php`.
- `keel_comment_form()` - A custom implementation of `comment_form()`.
- `wp_enqueue_script( 'comment-reply' )` - Adds script for threaded comments if enabled.
- `keel_dequeue_devicepx()` - Deregisters Jetpack's devicepx.js script.
- `add_filter( 'jetpack_implode_frontend_css', '__return_false' )` - Patch fix to prevent overzealous Jetpack CSS injection (temporary).
- `keel_remove_empty_p` - Remove empty `<p>` tags added by `wpautop()`.
- `$allowedposttags['svg'][*]` - Allow SVGs in the content editor.
- `keel_allow_svg_mime_type` - Allow SVGs to be uploaded to the Media Library.
- `keel_update_image_default_link_type` - Unlink images by default.
- `keel_just_comments_count()` - Gets the number of comments for a post (without trackbacks or pings).
- `keel_trackbacks_count()` - Gets the number of trackbacks for a post.
- `keel_pings_count()` - Gets the number of pings for a post.
- `keel_is_paginated()` - Check if more than one page of content exists.
- `keel_is_last_post()` - Check if a post is the last one in a set.
- `keel_print_a()` - Print a pre formatted array to the browser (useful for debugging).
- `keel_get_page_id_from_path()` - Pass in a path and get back the page ID.

<hr>


## Working with the Source Files

Working with the development code in the `src` directory allows you to take advantage of the powerful features included in Keel's [Gulp.js](http://gulpjs.com) build system.


### Dependencies

Make sure these are installed first.

- [Node.js](http://nodejs.org/)
- [Gulp](http://gulpjs.com/)</a> `sudo npm install -g gulp`


### Quick Start

- In bash/terminal/command line, `cd` into the `keel` directory.
- Run `npm install` to install the required files.
- When it's done installing, run one of the task runners to get going:
	- `gulp` manually compiles files.
	- `gulp watch` automatically compiles files and applies changes using <a href="">[LiveReload](http://livereload.com/).
	- `gulp test` compiles files and runs unit tests.


### Working with Sass

Keel's Sass files are located in `src` > `sass`. Keel's build system generates minified and unminified CSS files. It also includes [autoprefixer](https://github.com/postcss/autoprefixer), which adds vendor prefixes for you if required by the last two versions of a browser (you can configure browser support in `gulpfile.js`).

#### `_config.scss`

The `_config.scss` file contains variables for all of the colors, font stacks, breakpoints, and sizing used in Keel. It also contains settings for the grid.

```scss
// Colors
$color-primary: #0088cc;
$color-black: #272727;
$color-white: #ffffff;

$color-info: #0088cc; // Blue
$color-success: #377f31; // Green
$color-danger: #880e14; // Red
$color-warning: #dba909; // Yellow
$color-code: #dd1144;

$color-gray-dark: #808080;
$color-gray-light: #e5e5e5;

$color-twitter: #41b7d8;
$color-facebook: #3b5997;
$color-google: #d64937;
$color-linkedin: #0073b2;
$color-pinterest: #cb2027;
$color-github: #3a3838;
$color-vk: #5e82a8;
$color-xing: #175e60;
$color-tumblr: #35465c;
$color-reddit: #ff5700;
$color-instagram: #125688;
$color-flickr: #f91881;


// Font Stacks
$font-primary: "Helvetica Neue", Arial, sans-serif;
$font-secondary: Georgia, Times, serif;
$font-monospace: Menlo, Monaco, "Courier New", monospace;


// Breakpoints
$bp-xsmall: 20em;
$bp-small: 30em;
$bp-medium: 40em;
$bp-large: 60em;
$bp-xlarge: 80em;


// Sizing
$font-size: 100%;
$spacing: 1.5625em;
$container-width: 88%;
$container-max-width: $bp-medium;
$container-large-max-width: $bp-xlarge;


// Grid
$grid-margins: 1.4%;
$grid-sizes: (
	// Grid width options
	// Add/remove grid's as needed
	// $name: $width
	// $name - {string} class suffix
	// $width - {string} width of the grid
	fourth: 25%,
	third: 33.33333333333%,
	half: 50%,
	two-thirds: 66.666666666667%,
	three-fourths: 75%,
	full: 100%
);
$grid-breakpoints: (
	// Breakpoints at which to activate grid
	// Add/remove breakpoints as needed
	// ($breakpoint, $prefix-class, $include-offsets)
	// $breakpoint - {string|variable} the breakpoint
	// $prefix-class - {string|optional} class to be used with `.row` to activate grid
	// $include-offsets - {boolean} if true, include offset classes at this breakpoint
	($bp-xsmall, ".row-start-xsmall", false),
	($bp-large, null, true),
);
$grid-dynamic: (
	// Create grid classes that vary in size at different breakpoints
	// Add/remove classes, breakpoints, and sizes as needed
	// ($class, $breakpoint, $width)
	// $class - {string} the grid class
	// $breakpoint - {string|variable} the breakpoint
	// $width - {string|variable} width of the grid at the breakpoint

	(".grid-dynamic", $bp-xsmall, map-get($grid-sizes, half))
	(".grid-dynamic", $bp-medium, map-get($grid-sizes, third))
	// (".grid-dynamic", $bp-xlarge, map-get($grid-sizes, fourth))
);
```

#### `_mixins.scss`

The `_mixins.scss` file contains just a handful of mixins and functions to speed up development.

* `font-face` adds the `@font-face` property.
* `strip-unit` removes units (px, em, etc.) from numbers.
* `calc-em` converts pixels to ems.

`font-face` was forked from [Bourbon](http://bourbon.io/), the world's best Sass library.


#### Components

The `components` folder contains all of the Keel components: the grid, button and form styling, and so on. The `main.scss` file imports `_config.scss`, `_mixins.scss`, and the components for processing into a CSS file.


### Working with SVG

SVG files placed in the `src` > `svg` directory will be optimized and compiled into the `dist` > `svg` directory. SVG files placed in a subdirectory of `src` > `svg` will be compiled into a single SVG sprite named after the subdirectory.

For example, SVGs placed in `svg` > `portfolio` would compile into `portfolio.svg` in the `dist` > `svg` directory.


### Working with Images

Image files placed in the `src` > `img` directory will be copied as-is into the `dist` > `img` directory. While you can add image optimization processes to Gulp, I find that tools like [ImageOptim](https://imageoptim.com/) and [b64.io](http://b64.io/) do a better job.


### Working with JavaScript

Keel's JavaScript files are located in the `src` > `js` directory.

Files placed directly in the `js` folder will compile directly to `dist` > `js` as both minified and unminified files. Files placed in subdirectories will also be concatenated into a single file.

For example, `detects` > `flexbox.js` and `detects` > `svg.js` would compile into `detects.js` in the `dist` > `js` directory.

### Working with Static Files

Files and folders placed in the `src` > `static` directory will be copied as-is into the `dist` directory.

#### Unit Testing

If you've written [Jasmine unit tests](http://jasmine.github.io/) for any of your scripts, place them in the `test` > `spec` directory and they will automatically run on compile.

Results are displayed in both the terminal window and `test` > `results`. You can see how much coverage each unit test provides in the `test` > `coverage` directory.


### Continous Integration

Keel includes a configuration file for [Travis CI](http://docs.travis-ci.com/user/getting-started/), a continuous integration service for GitHub.

If you sign-up and activate it for your repository, Travis CI will run your build and execute any processes to make sure everything is working as expected. This is particularly useful when working with a team or managing open source projects with multiple contributors.

The `.travis.yml` file is pre-configured for Keel's build system. Even if you add files or update the Gulp tasks, you shouldn't need to change anything for it to work.


### GUI Source Compilers

If you would like the benefits of working with the source files, but aren't comfortable using terminal and command line code, there are a few GUIs that can help.

[CodeKit](https://incident57.com/codekit/) and [Hammer](http://hammerformac.com/) are two powerful Mac-only products that I used for some time. On Windows, I hear [Prepos](http://alphapixels.com/prepros/) is both beautiful and delightful to use.</p>

These tools can't replicate all of the features of the Gulp.js build system, but they come close.

<hr>


## Working with CSS

If you're more comfortable working in CSS, you can modify the `main.css` stylesheet in the `dist` > `css` directory.

### Adjusting Settings

<dl>
	<dt>Page Width</dt>
	<dd>The <code>.container</code> class sets the width for page content. Adjust the <code>max-width</code> property to set the maximum width of the page.</dd>

	<dt>Font Stack</dt>
	<dd>The <code>body</code> element sets the typeface for the entire set. By default, the font stack is Helvetica Neue, Arial, and sans-serif. The two exceptions are <code>pre</code> and <code>code</code> elements, which use a monospace stack. Adjust as desired.</dd>

	<dt>Typographic Scale</dt>
	<dd>Keel uses a <a href="http://lamb.cc/typograph/">fluid typographic scale</a>. You can scale the size of all site elements proportionately by adjusting the <code>font-size</code> property on the body element, which is set to 100% by default (and 125% on screens above 80em).</dd>

	<dt>Colors (used throughout)</dt>
	<dd>Primary: <code style="color: #ffffff; background-color: #0088cc;">#0088cc</code><br>
	Black: <code style="color: #ffffff; background-color: #272727;">#272727</code><br>
	White: <code style="color: #272727; background-color: #ffffff;">#ffffff</code><br>
	Dark Gray: <code style="color: #ffffff; background-color: #808080;">#808080</code><br>
	Light Gray: <code style="color: #272727; background-color:#e5e5e5 ;">#e5e5e5</code></dd>

	<dt>Breakpoints (used throughout)</dt>
	<dd>Extra Small: 20em<br>
	Small: 30em<br>
	Medium: 40em<br>
	Large: 60em<br>
	Extra Large: 80em</dd>
</dl>