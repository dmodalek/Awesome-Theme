/**
 * Dev Tools
 */

(function () {

	var addDebugBadges = function () {

		var $ctx = $('body'),
			$badgeContainer = $('<div class="awesome-debug"></div>'),
			badgeNames = ['Grid', 'Mod'];

		$ctx.prepend($badgeContainer);

		$.each(badgeNames, function (index, element) {

			var $badge = $('<a href="#' + element.toLowerCase() + '" class="badge badge-' + element.toLowerCase() + '">' + element + '</a>');
			$badgeContainer.append($badge);
		});

		// Add viewport info
		$badgeContainer.append('<span class="viewport-info">@</span>');
	};

	var onBadgeClick = function() {

		var $badges = $('.badge');

		$badges.on('click', function(e) {

			var $badge = $(e.target),
				type = $badge.attr('href').replace('#','');

			e.preventDefault();

			toggleState($badge);

			// Toggle Hash
			toggleHash(type);

			// Update Mod Outlines
			updateModOutline();
		});
	};

	var activateBadges = function() {

		var self = this,
			$ctx = $('body'),
			currHash = window.location.hash,
			$badge,
			types;

		if(currHash.length !== 0) {

			types = currHash.replace('#','').split('+');

			$.each(types, function(index, type) {
				$badge = $('.badge-'+type, $ctx);

				// proceed if there a badge with this class
				if($badge.length) {
					toggleState($badge);
				}
			});
		}
	};

	var onResize = function() {

		$(window).resize(function() {
			updateModOutline();
		});
	};

	///////////////////////////////////////////////////////////

	var toggleState = function($badge) {

		var $html = $('html'),
			$ctx = $('body'),
			type = $badge.attr('href').replace('#','');

		// Toggle active class on badge
		$badge.toggleClass('active');

		// Toggle debug-type class on html / body
		if(type == 'va') {
			$ctx.toggleClass('debug-' + type );
		}
		if(type == 'mod') {
			$html.toggleClass('debug-' + type );
			addModOutline();
		}
		if(type == 'grid') {
			$html.toggleClass('debug-' + type );
		}
	};

	var toggleHash = function(type) {

		var currHash = window.location.hash,
			newHash;

		// Add Hash
		if(currHash.indexOf(type) === -1) {

			if(currHash.length === 0) {
				newHash = type;
			} else {
				newHash = currHash + '+' + type;
			}

		// Remove Hash
		} else {

			var pos = currHash.indexOf(type);

			if(currHash.charAt(pos-1) == '+') {
				newHash = currHash.replace('+' + type, '');
			}

			if(currHash.charAt(pos-1) == '#' && currHash.length !== type.length) {
				newHash = currHash.replace(type + '+', '');
			}

			if(currHash.charAt(pos-1) == '#' && currHash.length == type.length + 1) {
				newHash = '';
			}
		}

		window.location.hash = newHash;
	};

	///////////////////////////////////////////////////////////

	var addModOutline = function () {

		var $ctx = $('html');

		if ($ctx.hasClass('debug-mod')) {

			$('.mod:not(.mod-layout):visible').each(function () {

				var $this = $(this),
					position = $this.offset(),
					dimension = {
						height: $this.outerHeight(),
						width: $this.outerWidth()
					}, positioning = $this.css('position'),
					classes = $this.attr('class').split(' '),
					name = '';
				if (classes.length > 1) {
					for (var i = 0, len = classes.length; i < len; i++) {
						var part = $.trim(classes[i]);
						if (part.indexOf('mod') === 0 && part.length > 3) {
							name = part.substr(4);
						}
					}
				}
				if (positioning == 'static' || positioning == 'relative') {
					positioning = 'absolute';
				}

				var $overlay = $('<span class="terrific-module">' + name + '</span>').css({
					'width': dimension.width,
					'height': dimension.height,
					'top': position.top,
					'left': position.left
				});
				$('body').append($overlay);
			});
		} else {
			$('.terrific-module').remove();
		}
	};

	///////////////////////////////////////////////////////////

	var updateModOutline = function () {
		$('.terrific-module').remove();
		addModOutline();
	};

	if($('body').hasClass('layout-dev')) {

		// Insert debug badges into page
		addDebugBadges();

		// Click on a badge
		onBadgeClick();

		// Activate a badge on page load
		activateBadges();

		// Resize
		onResize();
	}

	///////////////////////////////////////////////////////////

})(Tc.$);
