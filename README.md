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
|   |—— img/
|   |   |—— # your image files
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
|   |—— img/
|   |   |—— # your image files
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
|   |—— style.css
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
* `keel_remove_empty_p` - Remove empty `<p>` tags added by `wpautop()`.
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
* [Gulp](http://gulpjs.com) `sudo npm install -g gulp`

### Quick Start

1. In bash/terminal/command line, `cd` into your project directory.
2. Run `npm install` to install required files.
3. When it's done installing, run one of the task runners to get going:
	* `gulp` manually compiles files.
	* `gulp watch` automatically compiles files and applies changes using [LiveReload](http://livereload.com/).
	* `gulp test` compiles files and runs unit tests.

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

* `gulp` manually compiles files and generates docs.
* `gulp watch` automatically compiles files and generates docs when changes are made.



## What's new in version 5?

Keel is now powered by [GulpJS](http://gulpjs.com/), and now includes a documentation generator for client and team projects. It's finally been converted over to customized implementations of the new WordPress commenting functions (`wp_list_comments()` and `comment_form()`). And it includes a handful of new utility methods to make development faster and easier.

Prior to version 4, Keel was known as Kraken for WordPress. A lot of people expected it to be a full port of the [Kraken boilerplate](http://cferdinandi.github.io/kraken/), which it wasn't, so the project was renamed to make things a bit more clear.



## WordPress Theme Development Resources

The [WordPress Codex](http://codex.wordpress.org/Theme_Development) has a lot of great information. You can also find a ton of great resources on [StackOverflow](http://stackoverflow.com/).



## How to Contribute

In lieu of a formal style guide, take care to maintain the existing coding style. Please apply fixes to both the development and production code. Don't forget to update the version number, and when applicable, the documentation.



## License

The code is available under the [MIT License](LICENSE.md).
