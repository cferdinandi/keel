# Keel

Keel is a lightweight, mobile-first boilerplate for WordPress theme developers.

<hr>


## What's included?

Designed to be lightweight and style agnostic, Keel includes just the essentials.

### Essential Components

Lightweight, style-agnostic components to kick-start your next project.

- Normalize.css
- A responsive, mobile-first grid
- A well-designed, fluid typographic scale
- CSS buttons
- Form components
- Simple table styling, with pure CSS responsive tables
- Common WordPress template files
- A small set of custom utility methods that make development easier
- Fully internationalized and translation-ready

### WordPress-Specific Features

To help accelerate theme development, Keel also includes some WordPress-specific features that you can toggle on or off with a single line of code.

- Beautiful mosaic image galleries
- A GUI for creating image-driven hero headers
- The ability to upload a custom logo
- Shortcodes to create button links and embed inline SVGs
- Custom page width and layout settings for greater design flexibility
- An option to disable comments site-wide
- A GUI for adding a message or call-to-action after every blog post
- A "Theme Support" page in the Dashboard for your clients

### Developer Tools

Keel is powered by [Gulp.js](http://gulpjs.com/), a build system that minifies and concatenates your [Sass](http://sass-lang.com/) and JavaScript, auto-prefixes your CSS, runs [unit tests](http://jasmine.github.io/) on your scripts, optimizes your SVGs, and creates SVG sprites.

It also includes a style guide generator to help you quickly bring your team or clients up-to-speed.

<hr>


## The Keel Approach

Keel is a lightweight boilerplate for front-end web developers. It's built to be flexible and modular, with performance and accessibility in mind.

### Ugly on purpose

Out-of-the-box, Keel is a bit ugly. That's intentional.

Keel isn't supposed to be a finished product. It's a starting point that you can adapt to any project you're working on. Add components. Remove components. Tweak the colors and font stack. Make Keel your own.


### Mobile-First

Keel is built mobile-first. The base structure is a fully-fluid, single-column layout. It uses `@media (min-width: whatever)` to add a grid-based layout to bigger screens.

Think of it as progressive enhancement for the layout.

Keel also includes feature detection for things like SVG support. Just like the layout, those are served to browsers that support them, while fallback text is supplied to older and less capable browsers.


### Object Oriented CSS

Keel takes an [OOCSS approach](http://www.slideshare.net/stubbornella/object-oriented-css) to web development.

Throughout the stylesheet, you'll see base styles and modifying styles. For example, `.btn` sets the default button styles and behavior, while `.btn-secondary` changes the color and `.btn-large` changes the size. A big button with secondary colors would look like this:

<button class="btn btn-secondary btn-large">A Big Button</button>

```markup
<button class="btn btn-secondary btn-large">A Big Button</button>
```

Classes can be mixed, matched and reused throughout a project.

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