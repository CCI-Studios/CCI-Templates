var ap, AjaxPager;

AjaxPager = new Class({
	Implements: Options,
	Binds: ['insert', '_updateMenus', '_updateTitle', '_getHash'],

	fragments: null,
	toggle: null,

	options: {
		container: 'component',
		menu_selector: '.moduletable.menu li',
		title: 'Get The Ball Rolling | '
	},

	initialize: function(options) {
		this.setOptions(options);

		this.container = $(this.options.container);
		this.toggle = new Fx.Morph(this.container, {
			duration: 'short'
		});
		this.fragments = new Hash();

		this.setupLinks();

		this.route();
	},

	setupLinks: function() {
		var that = this;

		$(document.body).addEvent('click:relay(a)', function (e) {
			if (this.getProperty('href').indexOf('mailto:') == 0)
				return;

			var hash = that._getHash(this, false);

			if (hash === false) return;

			window.location.hash = hash;
			e.preventDefault();
		});
	},

	route: function() {
		this.toggle.set({opacity: 0});
		if (location.hash !== '') {
			this.loadPage(location.hash);
		} else {
			this.toggle.start({opacity: 1});
		}
	},

	loadPage: function(hash) {
		var that = this;

		// load saved fragment;
		if (this.fragments.has(hash)) {
			this.insert(hash);
			this._updateMenus(hash);
			this._updateTitle(hash);
			return;
		}

		this.request = new Request({
			url: this._convert(hash),
			onSuccess: function(text) {
				that.fragments.set(hash, text);
				that.insert(hash);
				that._updateMenus(hash);
				that._updateTitle(hash);
			},
			onFailure: function() {
				that.content = "Error: Page fail";
				that.insert();
			}
		}).send();

		return this;
	},

	insert: function(hash) {
		var that;

		that = this;

		this.toggle.start({
			opacity: 0
		}).chain(function() {
			that.container.set('html', that.fragments.get(hash));
			this.start({
				opacity: 1
			});
		});

		return this;
	},

	_convert: function(hash, suffix) {
		var url;

		url = '/';
		if (hash === '#home') {
		} else {
			url = url + hash.substr(1);

			if (hash.slice(0, -1) !== '/') {
				url = url + '.html';
			}
		}

		if (suffix !== false) {
			url = url + "?tmpl=component";
		}

		return url;
	},

	_updateMenus: function(hash) {
		var previous, next, that;
		previous = next = new Array();

		$$(this.options.menu_selector).each(function(el) {
			var anchor = el.getElement('a');
			if (!anchor) return;

			if (hash !== this._getHash(anchor))
				el.removeClass('active');
			else
				el.addClass('active');

		}, this);
	},

	_updateTitle: function (hash) {
		var title = hash.replace('#', '');
		title = title.charAt(0).toUpperCase() + title.slice(1);

		document.title = this.options.title + title;
	},

	_getHash: function (anchor, pound) {
		var href, hash;

		href = anchor.get('href');
		if (!(href.substring(0,1) === '/') && href.indexOf(document.domain) === -1)
			return false;


		if (href === location.protocol + '//' + location.host + '/')
			hash = 'home';
		if (href.substr(0,1) === '/')
			hash = href.substr(1).replace('.html', '');

		if (pound !== false)
			hash = '#' + hash
		return hash;
	}
});

window.addEvent('load', function() {
	ap = new AjaxPager();

	window.addEvent('hashchange', function(hash) {
			ap.loadPage(hash);
	});
});
