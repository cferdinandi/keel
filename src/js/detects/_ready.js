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