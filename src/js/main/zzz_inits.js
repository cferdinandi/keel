astro.init();
drop.init({
	selector: '.menu-item-has-children',
});
stickyFooter.init();

fluidvids.init({
	selector: ['iframe', 'object'],
	players: ['www.youtube.com', 'player.vimeo.com', 'www.slideshare.net', 'www.google.com/maps']
});

ready(function () {
	FastClick.attach(document.body);
});