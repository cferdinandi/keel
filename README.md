# Keel [![Build Status](https://travis-ci.org/cferdinandi/keel.svg)](https://travis-ci.org/cferdinandi/keel)

A lightweight boilerplate for WordPress theme developers. Keel includes just the essentials:

* Common template files with HTML5 semantic markup.
* An (almost) empty stylesheet with just a few WordPress-specific classes.
* A small set of custom utility methods that make development easier.
* HTML5 Shim, friendly "old browser" messaging, and an IE-conditional styling class.
* Fully internationalized and translation-ready.
* A pre-configured (optional) Gulp workflow.

[Download Keel](https://github.com/cferdinandi/keel/archive/master.zip)


**In This Documentation**

1. [Getting Started](#getting-started)
2. [File Structure](#file-structure)
3. [Utility Methods](#utility-methods)
4. [Working with Source Files](#working-with-source-files)
5. [What's new in version 4?](#whats-new-in-version-4)
6. [WordPress Theme Development Resources](#wordpress-theme-development-resources)
7. [How to Contribute](#how-to-contribute)
8. [License](#license)
9. [Changelog](#changelog)
10. [Older Docs](#older-docs)



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
|   |   |—— keel.css
|   |   |—— keel.min.css
|   |—— fonts/
|   |—— img/
|   |—— js/
|   |   |—— html5.js
|   |   |—— html5.min.js
|—— src/
|   |—— js/
|   |   |—— main/
|   |   |   |—— scripts.js
|   |   |—— html5.js
|   |—— sass/
|   |   |—— components/
|   |   |   |—— _wordpress-images.scss
|   |   |—— _config.scss
|   |   |—— _mixins.scss
|   |   |—— keel.scss
|   |—— static/
|   |   |—— fonts/
|   |   |—— img/
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

* `keel_load_theme_js()` - Registers your theme JavaScript files and loads them in the footer.
* `keel_initialize_theme_js()` - Includes any script `init` methods in the footer (after the files).
* `keel_wpsearch()` - Creates a shortcode for the searchform.
* `keel_post_password_form()` - Replaces the default password-protected post messaging with custom language.
* `keel_pretty_wp_title()` - Makes the `wp_title()` function more useful.
* `$content_width` - Sets a large maximum content width to avoid weird pixelation.
* `keel_register_menus()` - Registers navigation menus for use with `wp_nav_menu()` function.
* `add_theme_support( 'post-thumbnails' )` - Adds support for featured post images.
* `keel_comment_layout()` - A custom comment callback for `wp_list_comments()` used in `comments.php`.
* `keel_comment_form()` - A custom implementation of `comment_form()`.
* `wp_enqueue_script( 'comment-reply' )` - Adds script for threaded comments if enabled.
* `keel_just_comments_count()` - Gets the number of comments for a post (without trackbacks or pings).
* `keel_trackbacks_count()` - Gets the number of trackbacks for a post.
* `keel_pings_count()` - Gets the number of pings for a post.
* `keel_is_paginated()` - Check if more than one page of content exists.
* `keel_is_last_post()` - Check if a post is the last one in a set.
* `keel_print_a()` - Print a pre formatted array to the browser (useful for debugging).
* `keel_get_page_id_from_path()` - Pass in a path and get back the page ID.

***Note:*** *For some reason, the folks at WordPress [insist there's no need to allow for customizable classes on forms](https://core.trac.wordpress.org/ticket/15015). In order to style the comment form submit button, you (yuck) need to use an ID. It uses the `#submit` ID, but if you want to prevent it from impacting other forms, you might instead use `#commentform #submit`.*



## Working with Source Files

Keel comes with a build-in Gulp workflow based on [Gulp Boilerplate](https://github.com/cferdinandi/gulp-boilerplate) to speed up site development.

### Dependencies

Make sure these are installed first.

* [Node.js](http://nodejs.org/)
* [Ruby Sass](http://sass-lang.com/install)
* [Gulp](http://gulpjs.com/) `sudo npm install -g gulp`
* [PhantomJS](http://phantomjs.org/)

### Quick Start

1. In bash/terminal/command line, cd into your project directory.
2. Run `npm install` to install required files.
3. When it's done installing, run `gulp` to get going.

Every time you want to run your tasks, run `gulp`.

### Making Changes

Add your files to the appropriate `src` subdirectories. Gulp will process and and compile them into `dist`. Content in subdirectories under the `js` folder will be concatenated. (For example, files in `dist/js/detects` will compile into `src/js/detects.js`.) Files directly under `js` will compile individually.

The `src/style.css` file is intentionally blank. Gulp will generate a `style.css` file in the root directory based on the details of your `package.json` file.



## What's new in version 4?

Keel is now powered by [GulpJS](http://gulpjs.com/). It's finally been converted over to customized implementationsn of the new WordPress commenting functions (`wp_list_comments()` and `comment_form()`). And it includes a handful of new utility methods to make development faster and easier.

Prior to version 4, Keel was known as Kraken for WordPress. A lot of people expected it to be a full port of the [Kraken boilerplate](http://cferdinandi.github.io/kraken/), which it wasn't, so the project was renamed to make things a bit more clear.



## WordPress Theme Development Resources

The [WordPress Codex](http://codex.wordpress.org/Theme_Development) has a lot of great information. You can also find a ton of great resources on [StackOverflow](http://stackoverflow.com/).



## How to Contribute

In lieu of a formal style guide, take care to maintain the existing coding style. Don't forget to update the version number, the changelog (in the `readme.md` file), and when applicable, the documentation.



## License

Keel is licensed under the [MIT License](http://gomakethings.com/mit/).



## Changelog

Keel uses [semantic versioning](http://semver.org/).

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

* [Version 3](https://github.com/cferdinandi/keel/tree/archive-v3)