# Keel [![Build Status](https://travis-ci.org/cferdinandi/keel.svg)](https://travis-ci.org/cferdinandi/keel)

A lightweight boilerplate for WordPress theme developers. Keel includes just the essentials:

* Common template files with HTML5 semantic markup.
* An (almost) empty stylesheet with just a few WordPress-specific classes.
* A small set of custom utility methods that make development easier.
* Fully internationalized and translation-ready.
* A pre-configured (optional) Gulp workflow.

[Download Keel](https://github.com/cferdinandi/keel/archive/master.zip)


**In This Documentation**

1. [Getting Started](#getting-started)
2. [File Structure](#file-structure)
3. [Utility Methods](#utility-methods)
4. [Working with the Source Files](#working-with-the-source-files)
5. [Generating Documentation](#generating-documentation)
6. [What's new in version 5?](#whats-new-in-version-5)
7. [WordPress Theme Development Resources](#wordpress-theme-development-resources)
8. [How to Contribute](#how-to-contribute)
9. [License](#license)
10. [Changelog](#changelog)
11. [Older Docs](#older-docs)



## Getting Started

Out-of-the-box, Keel includes semantic markup but (almost) no styling. Style and structure as desired.

1. Upload Keel to your site via FTP or the WordPress theme installer.
2. Activate Keel in the WordPress theme dashboard.
3. Add style and structure.



## File Structure

Compiled and production-ready code can be found in the `dist` directory. The `src` directory contains development code. Unit test placeholders are located in the `test` directory.

```
keel/
|—— dist/
|   |—— css/
|   |   |—— main.css
|   |   |—— main.min.css
|   |—— js/
|   |   |—— classList.js
|   |   |—— classList.min.js
|   |   |—— main.js
|   |   |—— main.min.js
|   |—— svg/
|   |   |—— icons.svg
|   |—— # static assets
|—— docs/
|   |—— assets/
|   |—— dist/
|   |—— index.html
|   |—— # other docs
|—— src/
|   |—— docs/
|   |   |—— _templates/
|   |   |   |—— _header.html
|   |   |   |—— _footer.html
|   |   |—— assets/
|   |   |   |—— # doc-specific assets
|   |   |—— index.html
|   |   |—— # other docs
|   |—— js/
|   |   |—— main/
|   |   |   |—— scripts.js
|   |—— sass/
|   |   |—— components/
|   |   |   |—— _wordpress-images.scss
|   |   |—— _config.scss
|   |   |—— _mixins.scss
|   |   |—— main.scss
|   |—— svg/
|   |   |—— # svgs
|   |—— static/
|   |   |—— # static assets
|—— test/
|   |—— coverage/
|   |   |—— various files
|   |—— results/
|   |   |—— unit-tests.html
|   |—— spec/
|   |   |—— spec-myplugin.js
|—— .travis.yml
|—— 404.php
|—— archive.php
|—— comments.php
|—— content.php
|—— footer.php
|—— functions.php
|—— gulpfile.js
|—— header.php
|—— index.php
|—— nav-main.php
|—— nav-page.php
|—— no-posts.php
|—— package.json
|—— page-plain.php
|—— page.php
|—— README.md
|—— search.php
|—— searchform.php
|—— single.php
|—— style.css
```

### Template Files and Folders Explained

* `dist` - All of the CSS, JavaScript, and other non-PHP files used by the theme.
* `docs` - Theme documentation (useful for client or team projects).
* `src` - The pre-processed JavaScript, Sass files, etc.
* `test` - A placeholder for JS unit tests.
* `.travis.yml` - Continuous integration configuration file for use with Travis CI.
* `404.php` - Template for 404 errors.
* `author.php` - Template for posts by author.
* `archive.php` - Template for blog archives.
* `comments.php` - Template for blog comments.
* `content.php` - Shared template for all content sections on pages, posts, archives, etc.
* `footer.php` - Template for the footer.
* `functions.php` - Core WordPress functionality overrides and helper utilities.
* `gulpfile.js` - GulpJS configuration (optional).
* `header.php` - Template for the header.
* `index.php` - Template for the list of all blog posts.
* `nav-main.php` - Template for main site navigation.
* `nav-page.php` - Template for next/previous page navigation.
* `no-posts.php` - Template for when no posts are found.
* `package.json` - Node configuration file (optional).
* `page-plain.php` - Template for style-free pages.
* `page.php` - Template for pages.
* `README.md` - This file.
* `search.php` - Template for search results.
* `searchform.php` - Template for search form.
* `single.php` - Template for individual blog posts.
* `style.css` - Theme header only. Styles for the theme are located in the `dist` folder.



## Utility Methods

Keel includes a handful of utility methods in the `functions.php` file that make WordPress development easier.

* `keel_load_theme_files()` - Registers your theme styles and scripts and loads them in the markup.
* `keel_initialize_theme_detects()` - Includes your feature detections scripts inline in the `<head>`.
* `keel_initialize_theme_scripts()` - Includes your script `init` methods inline in the footer.
* `keel_wpsearch()` - Creates a shortcode for the searchform.
* `keel_post_password_form()` - Replaces the default password-protected post messaging with custom language.
* `keel_pretty_wp_title()` - Makes the `wp_title()` function more useful.
* `keel_excerpt_length()` - Adjust default length of `the_excerpt()` content.
* `keel_excerpt_more()` - Adjust default "read more" text for `the_excerpt()`.
* `$content_width` - Sets a large maximum content width to avoid weird pixelation.
* `keel_register_menus()` - Registers navigation menus for use with `wp_nav_menu()` function.
* `add_theme_support( 'post-thumbnails' )` - Adds support for featured post images.
* `keel_remove_wpautop()` - Optionally disables automatic addition of paragraphs and break tags to your content. Off by default.
* `keel_get_all_posts()` - Optionally remove pagination from The Loop and get all matching posts. Off by default.
* `keel_comment_layout()` - A custom comment callback for `wp_list_comments()` used in `comments.php`.
* `keel_comment_form()` - A custom implementation of `comment_form()`.
* `wp_enqueue_script( 'comment-reply' )` - Adds script for threaded comments if enabled.
* `keel_dequeue_devicepx()` - Deregisters Jetpack's devicepx.js script.
* `add_filter( 'jetpack_implode_frontend_css', '__return_false' )` - Patch fix to prevent overzealous Jetpack CSS injection (temporary).
* `keel_just_comments_count()` - Gets the number of comments for a post (without trackbacks or pings).
* `keel_trackbacks_count()` - Gets the number of trackbacks for a post.
* `keel_pings_count()` - Gets the number of pings for a post.
* `keel_is_paginated()` - Check if more than one page of content exists.
* `keel_is_last_post()` - Check if a post is the last one in a set.
* `keel_print_a()` - Print a pre formatted array to the browser (useful for debugging).
* `keel_get_page_id_from_path()` - Pass in a path and get back the page ID.

***Note:*** *For some reason, the folks at WordPress [insist there's no need to allow for customizable classes on forms](https://core.trac.wordpress.org/ticket/15015). In order to style the comment form submit button, you (yuck) need to use an ID. It uses the `#submit` ID, but if you want to prevent it from impacting other forms, you might instead use `#commentform #submit`.*



## Working with the Source Files

If you would prefer, you can work with the development code in the `src` directory using the included [Gulp build system](http://gulpjs.com/). This compiles, lints, and minifies code, and runs unit tests.

It's the same build system that's used by [Kraken](http://cferdinandi.github.io/kraken/), but includes an extra task for generating your theme's `style.css` file with theme headers. **If you're using Keel with Kraken, use Keel's `gulpfile.js`.**

### Dependencies
Make sure these are installed first.

* [Node.js](http://nodejs.org)
* [Ruby Sass](http://sass-lang.com/install)
* [Gulp](http://gulpjs.com) `sudo npm install -g gulp`

### Quick Start

1. In bash/terminal/command line, `cd` into your project directory.
2. Run `npm install` to install required files.
3. When it's done installing, run one of the task runners to get going:
	* `gulp` manually compiles files.
	* `gulp watch` automatically compiles files and applies changes using [LiveReload](http://livereload.com/).

### Sass

Sass files are located in `src` > `sass`. Gulp generates minified and unminified CSS files. It also includes [autoprefixer](https://github.com/postcss/autoprefixer), which adds vendor prefixes for you if required by the last two versions of a browser.

### JavaScript

JavaScript files are located in the `src` > `js` directory.

Files placed directly in the js folder will compile directly to `dist` > `js` as both minified and unminified files. Files placed in subdirectories will also be concatenated into a single file. For example, files in `js/detects` will compile into `detects.js`. Files directly under `js` will compile individually.

#### Unit Testing

Gulp Boilerplate is set up for unit testing with [Jasmine](http://jasmine.github.io/2.0/introduction.html). Add your tests to `test/spec/spec-myplugin.js`. Adjust filenames and references as needed.

Unit test results are printed in terminal, but you can also view them in a browser under `test/results/unit-tests.html`. Get a report of how much of your scripts is covered by testing under `test/coverage`.

### SVGs

SVG files placed in the `src` > `svg` directory will be compiled into a single SVG sprite called `icons.svg` in the `dist` > `svg` directory.



## Generating Documentation

Keel ships with a simple documentation generator powered by [Gulp.js](http://gulpjs.com/). This feature requires you to work with the source files.

Documentation files can be found under `src` > `docs`, and compile to `docs`.

### How to Create Docs

Add HTML or markdown (`.md` or `.markdown`) files to your `docs` folder in `src`.

The `_templates` directory in `src` contains the `_header.html` and `_footer.html` templates. These are automatically added to the beginning and end of each documentation page. You can also add your own templates to the `_templates` directory. Include template files in your docs by writing `@@include('path-to-file')` on its own line in your markup (or markdown).

Files placed in the `assets` directory will be moved over as-is to the `docs` directory. Keel will also add a copy of your `dist` files so you can use them in your documentation.

When you're ready, run one of the task runners to get going:

* `gulp docs` manually compiles files and generates docs.
* `gulp watch:docs` automatically compiles files and generates docs when changes are made.
* `gulp reload:docs` automatically compiles files, generates docs, and applies changes using [LiveReload](http://livereload.com/).



## What's new in version 5?

Keel is now powered by [GulpJS](http://gulpjs.com/), and now includes a documentation generator for client and team projects. It's finally been converted over to customized implementations of the new WordPress commenting functions (`wp_list_comments()` and `comment_form()`). And it includes a handful of new utility methods to make development faster and easier.

Prior to version 4, Keel was known as Kraken for WordPress. A lot of people expected it to be a full port of the [Kraken boilerplate](http://cferdinandi.github.io/kraken/), which it wasn't, so the project was renamed to make things a bit more clear.



## WordPress Theme Development Resources

The [WordPress Codex](http://codex.wordpress.org/Theme_Development) has a lot of great information. You can also find a ton of great resources on [StackOverflow](http://stackoverflow.com/).



## How to Contribute

In lieu of a formal style guide, take care to maintain the existing coding style. Don't forget to update the version number, the changelog (in the `readme.md` file), and when applicable, the documentation.



## License

Keel is licensed under the [MIT License](http://gomakethings.com/mit/).



## Changelog

Keel uses [semantic versioning](http://semver.org/).

* v5.2.0 - November 21, 2014
	* Updated SVG build task to create multiple files if desired.
* v5.1.1 - November 20, 2014
	* Fixed `gulp watch` bug.
* v5.1.0 - November 12, 2014
	* Moved all script and style loading to `functions.php`.
	* Added option to inline feature detection in the `<head>`.
	* Added comment type to `wp_list_comments()` function in `comments.php`.
	* Updated Sass structure for WP image styling.
	* Added option to disable `wpautop`.
	* Added option to remove loop pagination.
	* Switched from `echo` to `?> content <?php` for echoing in `functions.php`.
	* Updated `_config.scss` to match the version that ships with Kraken.
	* Added helper methods to customize `the_excerpt()`.
	* Added temporary fix for overzealous CSS injection by Jetpack.
	* Removed some unused/unneeded classes from custom comment walker method.
	* Added `.screen-reader-focusable` class to skip nav link.
	* Renamed `keel.scss` to `main.scss`.
	* Changed `#main` from `<section>` to `<main>`.
* v5.0.0 - October 20, 2014
	* Updated Gulp workflow.
	* Renamed JS and CSS files to `main`.
	* Removed HTML5 shim and IE-specific classes.
	* Added feature detected for SVG and icon font support.
* v4.1.1 - September 29, 2014
	* Fixed JS concatenation bug.
* v4.1.0 - September 26, 2014
	* Degregister Jetpack's devicepx.js script.
* v4.0.0 - August 29, 2014
	* Renamed project from `Kraken for WordPress` to `Keel`.
	* Added semantic versioning.
	* Converted to Gulp.js workflow.
	* Added PHPDoc documentation.
	* Added `print_a` and `get_page_id_from_path` functions from [Starkers](https://github.com/viewportindustries/starkers/).
	* Added custom WP comments callbacks and functions.
	* Added `$content_width` variable.
	* Added featured image support.
	* Added named navigation menus.
	* Added `author.php` template.
	* Added `keel_` prefix to all utility methods.
	* Added inline documentation throughout template files.
* v3.3 - March 15, 2014
	* Added `is_paginated()` and `is_last_post()` to `functions.php`.
	* Added `content.php` file to make content pages more DRY.
	* Added skiplink to `header.php`.
	* Fixed rendering issues with `search.php`.
* v3.2 - December 6, 2013
	* Added Sass support.
	* Removed all styles from `style.css` file.
	* Moved front-end styles to `css` folder.
* v3.1 - October 18, 2013
	* Replaced `echo sprintf()` with `printf()`.
* v3.0 - October 17, 2013
	* Add i18n everywhere.
	* Updated several functions to be more aligned with WordPress best practices.
	* Moved various functions to [standalone plugins](http://cferdinandi.github.io/kraken/addons.html).
	* Converted from spaces to tabs.
	* Added customized "password protected post" messaging.
* v2.0 - September 1, 2013
	* Added templates for:
		* Main navigation
		* Next/previous page navigation
		* "No posts found" message
		* Search form
	* Removed search form function (replaced with WordPress standard `searchform.php` template).
	* Cleaned up  code and removed some unused snippets.
	* Added `get_template_directory()` to `require_once` in `functions.php`.
* v1.4 - July 29, 2013
	* Removed the canonical link from `header.php` (served no purpose).
	* Split theme JS and jQuery into two separate functions.
	* Function now calls CDN-hosted jQuery with local fallback.
* v1.3 - June 7, 2013
	* Switched to MIT license.
* v1.3 - June 7, 2013
	* Added more flexible way to link stylesheet in header.
* v1.2 - February 19, 2013
	* Added `no-self-pings.php` to the `functions.php` file.
* v1.1 - February 15, 2013
	* Removed `media="screen"` from `header.php` to allow for print styles in main CSS file.
* v1.0 - February 10, 2013
	* Initial release.



## Older Docs

* [Version 3](https://github.com/cferdinandi/kraken-for-wordpress/tree/archive-v3)