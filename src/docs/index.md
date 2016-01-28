# Keel

Keel is a lightweight, mobile-first boilerplate for WordPress theme developers.

<hr>


## What's included

- [Kraken](http://cferdinandi.github.io/kraken/) is now used for a basic styling template that includes a responsive grid, forms, tables, and buttons.
- Accessible, mobile-friendly navigation and dropdown patterns are baked-in, powered by [Astro](https://github.com/cferdinandi/astro) and [Drop](https://github.com/cferdinandi/drop).
- Responsive video and Google Map support via [FluidVids.js](https://github.com/toddmotto/fluidvids).
- Faster mobile tap performance thanks to [FastClick](https://github.com/ftlabs/fastclick).
- [LoadJS](https://github.com/filamentgroup/loadJS) and [loadCSS](https://github.com/filamentgroup/loadCSS) for asynchronous loading of non-critical files for better performance.
- A ton of WordPress-specific features that can be turned on or off with a single line of code (see below).

And the whole thing is [powered by native JavaScript](http://gomakethings.com/ditching-jquery/)&mdash;no jQuery dependencies for anything.

<hr>


## WordPress-specific features

To help accelerate theme development, Keel also includes some WordPress-specific features that you can toggle on or off with a single line of code.

- Beautiful mosaic image galleries.
- A GUI for creating image-driven hero headers.
- The ability to upload a custom logo.
- Shortcodes to create button links and embed inline SVGs.
- Custom page width and layout settings for greater design flexibility.
- An option to disable comments site-wide.
- A GUI for adding a message or call-to-action after every blog post.
- A “Theme Support” page in the Dashboard for your clients.

<hr>


## Ugly on purpose

True to the original vision, Keel is a bit ugly on purpose. It

isn’t supposed to be a finished product. It’s a starting point that you can adapt to any project you’re working on. Add components. Remove components. Tweak the colors and font stack. Make Keel your own.

<hr>


## Built for mobile. Built for performance.

Mobile-first. jQuery-free. Progressively-enhanced. Powered by [Object-Oriented CSS](http://www.slideshare.net/stubbornella/object-oriented-css).

Keel was built to be fast and lightweight, and provide a kickass mobile experience.

<hr>


## Built for developers

Under the hood, Keel is powered by [Gulp.js](http://gulpjs.com/), a build system that minifies and concatenates your [Sass](http://sass-lang.com/) and JavaScript, auto-prefixes your CSS, [runs unit tests](http://jasmine.github.io/) on your scripts, optimizes your SVGs, and creates SVG sprites.

It also includes a style guide generator to help you quickly bring your team or clients up-to-speed.

<hr>


## Browser Compatibility

The web is for everyone, but [support is not the same as optimization](http://bradfrostweb.com/blog/mobile/support-vs-optimization/).

Rather than trying to provide the same level of functionality for older browsers, Keel uses progressive enhancement to serve a basic experience to all browsers (even Netscape and IE 5). Newer browsers that support modern APIs and techniques get a better layout, more visually attractive elements, and an enhanced experience.

Keel works in all browsers, but it's optimized for modern browsers and IE 9+.

### Vendor Prefixing

Keel uses [Autoprefixer](https://github.com/postcss/autoprefixer), and is configured to only add prefixes if required by the last two versions of a browser.

If a feature isn't working (for example, the grid does not work in Firefox 28 and lower), it may simply need a vendor prefix. You can add these manually, or adjust the Autoprefixer settings in `gulpfile.js` if you're working with the source code.

For more details on when support for specific features were added to different browsers, consult [Can I Use](http://caniuse.com/).


<hr>


## Getting started

[Download Keel](https://github.com/cferdinandi/keel/archive/master.zip) or [read the documentation](http://keel.gomakethings.com/documentation).