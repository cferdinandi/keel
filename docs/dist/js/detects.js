/*!
 * keel v6.0.1: A lightweight boilerplate for WordPress developers
 * (c) 2016 Chris Ferdinandi
 * MIT License
 * http://github.com/cferdinandi/keel
 * Open Source Credits: https://github.com/ftlabs/fastclick, https://github.com/toddmotto/fluidvids, http://photoswipe.com, http://masonry.desandro.com, http://imagesloaded.desandro.com
 */

/**
 * Run code after document is ready
 * @param  {Function} fn The function to run
 */
var ready = function ( fn ) {

	// Sanity check
	if ( typeof (fn) !== 'function' ) return;

	// If document is already loaded, run method
	if ( document.readyState === 'interactive' ) {
		return fn();
	}

	// Otherwise, wait until document is loaded
	document.onreadystatechange = function () {
		if ( document.readyState === 'interactive' ) {
			fn();
		}
	};

};
/*!
loadCSS: load a CSS file asynchronously.
[c]2015 @scottjehl, Filament Group, Inc.
Licensed MIT
*/
(function(w){
	"use strict";
	/* exported loadCSS */
	var loadCSS = function( href, before, media ){
		// Arguments explained:
		// `href` [REQUIRED] is the URL for your CSS file.
		// `before` [OPTIONAL] is the element the script should use as a reference for injecting our stylesheet <link> before
			// By default, loadCSS attempts to inject the link after the last stylesheet or script in the DOM. However, you might desire a more specific location in your document.
		// `media` [OPTIONAL] is the media type or query of the stylesheet. By default it will be 'all'
		var doc = w.document;
		var ss = doc.createElement( "link" );
		var ref;
		if( before ){
			ref = before;
		}
		else {
			var refs = ( doc.body || doc.getElementsByTagName( "head" )[ 0 ] ).childNodes;
			ref = refs[ refs.length - 1];
		}

		var sheets = doc.styleSheets;
		ss.rel = "stylesheet";
		ss.href = href;
		// temporarily set media to something inapplicable to ensure it'll fetch without blocking render
		ss.media = "only x";

		// Inject link
			// Note: the ternary preserves the existing behavior of "before" argument, but we could choose to change the argument to "after" in a later release and standardize on ref.nextSibling for all refs
			// Note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
		ref.parentNode.insertBefore( ss, ( before ? ref : ref.nextSibling ) );
		// A method (exposed on return object for external use) that mimics onload by polling until document.styleSheets until it includes the new sheet.
		var onloadcssdefined = function( cb ){
			var resolvedHref = ss.href;
			var i = sheets.length;
			while( i-- ){
				if( sheets[ i ].href === resolvedHref ){
					return cb();
				}
			}
			setTimeout(function() {
				onloadcssdefined( cb );
			});
		};

		// once loaded, set link's media back to `all` so that the stylesheet applies once it loads
		ss.onloadcssdefined = onloadcssdefined;
		onloadcssdefined(function() {
			ss.media = media || "all";
		});
		return ss;
	};
	// commonjs
	if( typeof module !== "undefined" ){
		module.exports = loadCSS;
	}
	else {
		w.loadCSS = loadCSS;
	}
}( typeof global !== "undefined" ? global : this ));
;(function (window, document, undefined) {

    'use strict';

    // SVG feature detection
    var supports = !!document.createElementNS && !!document.createElementNS('http://www.w3.org/2000/svg', 'svg').createSVGRect;

    // Check against Opera Mini (throws a false positive)
    var whitelist = navigator.userAgent.indexOf('Opera Mini') === -1;

    // If SVG is supported, add `.svg` class to <html> element
    if ( supports && whitelist ) {
        document.documentElement.className += (document.documentElement.className ? ' ' : '') + 'svg';
    }

})(window, document);