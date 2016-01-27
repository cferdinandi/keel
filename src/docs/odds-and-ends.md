# Odds & Ends

## Generating Documentation

Kraken ships with a simple documentation generator powered by [Gulp.js](http://gulpjs.com). This feature requires you to [work with the source files](working-with-the-source-files.html).

Documentation files can be found under `src` > `docs`, and compile to `docs`.

### How to Create Docs

Add HTML or markdown (`.md` or `.markdown`) files to your `docs` folder in `src`.

The `_templates` directory in `src` contains the `_header.html` and `_footer.html` templates. These are automatically added to the beginning and end of each documentation page. You can also add your own templates to the `_templates` directory. Include template files in your docs by writing <code>&commat;&commat;include('path-to-file')</code> on its own line in your markup (or markdown).

Files placed in the `assets` directory will be moved over as-is to the `docs` directory. Kraken will also add a copy of your `dist` files so you can use them in your documentation.

Documentation is automatically created when you [run of the Gulp tasks](setup.html#working-with-the-source-files).

### Creating a table of contents

The build system includes `toc.js`, a custom script for dynamically generating tables of contents based on page headers. It's already configured for use in the `_footer.html` template.

1. Add an empty `div` with the `.js-toc` class wherever you want your table of contents to get generated.
2. Add the `.js-toc-content` class to the section you want to generate a table of contents from. By default, the script grabs any `h2` with an `id` and creates a link to it.
3. Initialize the script to create your table of contents, and to pass in your own options.

**Markup**

```markup
<div data-toc></div>
<div data-toc-content>
	<h1>Page Title</h1>
	<h2>Section</h2>
	...
	<h2>Another Section</h2>
	...
</div>
```

**JavaScript**

```javascript
tableOfContents.init({
	container: '[data-toc]', // The selector for the table of contents (uses document.querySelector)
	selectors: '[data-toc-content] h2',  // The selector for the section headers (uses document.querySelectorAll)
	heading: 'Contents', // The heading for the table of contents
	headingType: 'h2', // The heading type for the table of contents
	headingClass: '', // The class(es) to add to the table of contents heading
	navClass: '', // The class(es) to add to the navigation <ul> element
	linkClass: '', // The class(es) to add to the navigation <a> elements
	initClass: 'js-table-of-contents', // The class(es) to add to the <html> element on init
	callback: function () {} // A callback to run after the table of contents is rendered
});
```


### Automatically highlighting the active navigation link

The build system includes `highlight-active-nav.js`, a custom script for dynamically highlighting the active link in the navigation. It's already configured for use in the `_footer.html` template.

Simply add the `.js-nav-highlight` class to the navigation list, and initialize the script. You can pass in your own options and settings.

**Markup**

```markup
<ul data-nav-highlight>
	<li><a href="link1.html">Link 1</a></li>
	<li><a href="link2.html">Link 2</a></li>
	<li><a href="link3.html">Link 3</a></li>
</ul>
```

**JavaScript**

```javascript
highlightActiveNav.init({
	selector: '[data-nav-highlight]', // The selector for the nav (uses document.querySelector)
	activeClass: 'nav-active', // Class(es) to add to the active navigation link
	urlPrefix: null, // If the base domain isn't root, add the prefix
	callback: function () {} // Callback to run after the nav is highlighted
});
```


### Why not use an existing documentation tool?

There are a ton of great CSS and JS documentation tools available. I explored using [KSS](http://warpspire.com/kss/), [Hologram](http://trulia.github.io/hologram/), and a few others.

I found myself frustrated by the lack of control over the layout, the clutter added to the stylesheet, and the complexity in getting setup.

I decided creating my own documentation tool was a better fit for my needs. Obviously, feel free to use the documentation tool that best fits your needs.

<hr>


## Built with Keel

Build a site with Keel? <a href="mailto:&#104;&#101;llo&#64;&#103;om&#97;ke&#116;h&#105;&#110;&#103;s.&#99;o&#109;">Let me know!</a>

- [Harvard Business School Digital Initiative](https://digital.hbs.edu/)
- [Go Make Things](http://gomakethings.com/)
- [PAWS New England](http://www.pawsnewengland.com/)
- [Harbor](http://harbor.gomakethings.com/)
- [Forte Accounting](http://forteaccounting.com/)