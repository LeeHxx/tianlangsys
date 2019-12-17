var SharrrePlatform = SharrrePlatform ||
function() {
	var a = {};
	return {
		register: function(b, c) {
			a[b] = c
		},
		get: function(b, c) {
			return a[b] ? new a[b](c) : (console.error("Sharrre - No platform found for " + b), !1)
		}
	}
} ();
SharrrePlatform.register("delicious",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		layout: "1",
		count: !0,
		popup: {
			width: 550,
			height: 550
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return "http://feeds.delicious.com/v2/json/urlinfo/data?url={url}&callback=?"
		},
		trackingAction: {
			site: "delicious",
			action: "add"
		},
		load: function(a) {
			if ("tall" == a.options.buttons.delicious.size) var b = "width:50px;",
			c = "height:35px;width:50px;font-size:15px;line-height:35px;",
			d = "height:18px;line-height:18px;margin-top:3px;";
			else var b = "width:93px;",
			c = "float:right;padding:0 3px;height:20px;width:26px;line-height:20px;",
			d = "float:left;height:20px;line-height:20px;";
			var e = a.shorterTotal(a.options.count.delicious);
			"undefined" == typeof e && (e = 0),
			$(a.element).find(".buttons").append('<div class="button delicious"><div style="' + b + 'font:12px Arial,Helvetica,sans-serif;cursor:pointer;color:#666666;display:inline-block;float:none;height:20px;line-height:normal;margin:0;padding:0;text-indent:0;vertical-align:baseline;"><div style="' + c + 'background-color:#fff;margin-bottom:5px;overflow:hidden;text-align:center;border:1px solid #ccc;border-radius:3px;">' + e + '</div><div style="' + d + 'display:block;padding:0;text-align:center;text-decoration:none;width:50px;background-color:#7EACEE;border:1px solid #40679C;border-radius:3px;color:#fff;"><img src="https://www.delicious.com/static/img/delicious.small.gif" height="10" width="10" alt="Delicious" /> Add</div></div></div>'),
			$(a.element).find(".delicious").on("click",
			function() {
				a.openPopup("delicious")
			})
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://www.delicious.com/save?v=5&noui&jump=close&url=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url) + "&title=" + a.text, "delicious", "toolbar=no,width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("digg",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		type: "DiggCompact",
		count: !0,
		popup: {
			width: 650,
			height: 360
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return "http://services.digg.com/2.0/story.getInfo?links={url}&type=javascript&callback=?"
		},
		trackingAction: {
			site: "digg",
			action: "add"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button digg"><a class="DiggThisButton ' + b.type + '" rel="nofollow external" href="http://digg.com/submit?url=' + encodeURIComponent("" !== b.url ? b.url: a.options.url) + '"></a></div>');
			var c = 0;
			"undefined" == typeof __DBW && 0 == c && (c = 1,
			function() {
				var a = document.createElement("SCRIPT"),
				b = document.getElementsByTagName("SCRIPT")[0];
				a.type = "text/javascript",
				a.async = !0,
				a.src = "http://widgets.digg.com/buttons.js",
				b.parentNode.insertBefore(a, b)
			} ())
		},
		tracking: function() {},
		popup: function(a) {
			window.open("http://digg.com/tools/diggthis/submit?url=" + encodeURIComponent("" !== a.buttons.digg.url ? a.buttons.digg.url: a.url) + "&title=" + a.text + "&related=true&style=true", "", "toolbar=0, status=0, width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("facebook",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		action: "like",
		layout: "button_count",
		count: !0,
		width: "",
		send: "false",
		faces: "false",
		colorscheme: "",
		font: "",
		lang: "en_US",
		share: "",
		appId: "",
		popup: {
			width: 900,
			height: 500
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return "https://graph.facebook.com/fql?q=SELECT%20url,%20normalized_url,%20share_count,%20like_count,%20comment_count,%20total_count,commentsbox_count,%20comments_fbid,%20click_count%20FROM%20link_stat%20WHERE%20url=%27{url}%27&callback=?"
		},
		trackingAction: {
			site: "facebook",
			action: "like"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button facebook"><div id="fb-root"></div><div class="fb-like" data-href="' + ("" !== b.url ? b.url: a.options.url) + '" data-send="' + b.send + '" data-layout="' + b.layout + '" data-width="' + b.width + '" data-show-faces="' + b.faces + '" data-action="' + b.action + '" data-colorscheme="' + b.colorscheme + '" data-font="' + b.font + '" data-via="' + b.via + '" data-share="' + b.share + '"></div></div>');
			var c = 0;
			"undefined" == typeof FB && 0 == c ? (c = 1,
			function(a, c, d) {
				var e, f = a.getElementsByTagName(c)[0];
				a.getElementById(d) || (e = a.createElement(c), e.id = d, e.src = "https://connect.facebook.net/" + b.lang + "/all.js#xfbml=1", b.appId && (e.src += "&appId=" + b.appId), f.parentNode.insertBefore(e, f))
			} (document, "script", "facebook-jssdk")) : FB.XFBML.parse()
		},
		tracking: function() {
			fb = window.setInterval(function() {
				"undefined" != typeof FB && (FB.Event.subscribe("edge.create",
				function(a) {
					_gaq.push(["_trackSocial", "facebook", "like", a])
				}), FB.Event.subscribe("edge.remove",
				function(a) {
					_gaq.push(["_trackSocial", "facebook", "unlike", a])
				}), FB.Event.subscribe("message.send",
				function(a) {
					_gaq.push(["_trackSocial", "facebook", "send", a])
				}), clearInterval(fb))
			},
			1e3)
		},
		popup: function(a) {
			window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url) + "&t=" + a.text, "", "toolbar=0, status=0, width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("googlePlus",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		size: "medium",
		lang: "en-US",
		annotation: "",
		count: !0,
		popup: {
			width: 900,
			height: 500
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return a + "?url={url}&type=googlePlus"
		},
		trackingAction: {
			site: "Google",
			action: "+1"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button googleplus"><div class="g-plusone" data-size="' + b.size + '" data-href="' + ("" !== b.url ? b.url: a.options.url) + '" data-annotation="' + b.annotation + '"></div></div>'),
			window.___gcfg = {
				lang: b.lang
			};
			var c = 0;
			"undefined" != typeof gapi && "undefined" != typeof gapi.plusone || 0 != c ? gapi.plusone.go() : (c = 1,
			function() {
				var a = document.createElement("script");
				a.type = "text/javascript",
				a.async = !0,
				a.src = "https://apis.google.com/js/plusone.js";
				var b = document.getElementsByTagName("script")[0];
				b.parentNode.insertBefore(a, b)
			} ())
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://plus.google.com/share?hl=" + this.settings.lang + "&url=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url), "", "toolbar=0, status=0, width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("linkedin",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		counter: "",
		count: !0,
		popup: {
			width: 550,
			height: 550
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return "https://www.linkedin.com/countserv/count/share?format=jsonp&url={url}&callback=?"
		},
		trackingAction: {
			site: "linkedin",
			action: "share"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button linkedin"><script type="IN/share" data-url="' + ("" !== b.url ? b.url: a.options.url) + '" data-counter="' + b.counter + '"></script></div>');
			var c = 0;
			"undefined" == typeof window.IN && 0 == c ? (c = 1,
			function() {
				var a = document.createElement("script");
				a.type = "text/javascript",
				a.async = !0,
				a.src = "https://platform.linkedin.com/in.js";
				var b = document.getElementsByTagName("script")[0];
				b.parentNode.insertBefore(a, b)
			} ()) : "undefined" != typeof window.IN && window.IN.parse && IN.parse(document)
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://www.linkedin.com/cws/share?url=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url) + "&token=&isFramed=true", "linkedin", "toolbar=no, width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("pinterest",
function(a) {
	return defaultSettings = {
		url: "",
		media: "",
		description: "",
		layout: "horizontal",
		popup: {
			width: 700,
			height: 300
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return "https://api.pinterest.com/v1/urls/count.json?url={url}&callback=?"
		},
		trackingAction: {
			site: "pinterest",
			action: "pin"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button pinterest"><a href="https://www.pinterest.com/pin/create/button/?url=' + ("" !== b.url ? b.url: a.options.url) + "&media=" + b.media + "&description=" + b.description + '" data-pin-do="buttonBookmark" count-layout="' + b.layout + '">Pin It</a></div>'),
			function() {
				var a = document.createElement("script");
				a.type = "text/javascript",
				a.async = !0,
				a.src = "https://assets.pinterest.com/js/pinit.js",
				a.setAttribute("data-pin-build", "parsePinBtns");
				var b = document.getElementsByTagName("script")[0];
				b.parentNode.insertBefore(a, b)
			} (),
			window.parsePinBtns && window.parsePinBtns(),
			$(a.element).find(".pinterest").on("click",
			function() {
				a.openPopup("pinterest")
			})
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://pinterest.com/pin/create/button/?url=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url) + "&media=" + encodeURIComponent(this.settings.media) + "&description=" + this.settings.description, "pinterest", "toolbar=no,width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("reddit",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		count: !1,
		popup: {
			width: 900,
			height: 550
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		trackingAction: {
			site: "reddit",
			action: "share"
		},
		url: function(a) {
			return ""
		},
		load: function(a) {
			var b = this.settings,
			c = this;
			$(a.element).find(".buttons").append('<div class="button reddit"><a href="https://www.reddit.com/submit?url=' + ("" !== b.url ? b.url: a.options.url) + '"><img src="https://www.redditstatic.com/spreddit7.gif" alt="submit to reddit" border="0" /></a></div>'),
			$(a.element).find(".reddit").on("click",
			function() {
				c.popup(a.options)
			})
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://www.reddit.com/submit?url=" + encodeURIComponent("" !== this.settings.url ? this.setting.url: a.url), "", "toolbar=0, status=0,width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("stumbleupon",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		size: "medium",
		count: !0,
		popup: {
			width: 550,
			height: 550
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return a + "?url={url}&type=stumbleupon"
		},
		trackingAction: {
			site: "stumbleupon",
			action: "add"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button stumbleupon"><su:badge layout="' + b.layout + '" location="' + ("" !== b.url ? b.url: a.options.url) + '"></su:badge></div>');
			var c = 0;
			"undefined" == typeof STMBLPN && 0 == c ? (c = 1,
			function() {
				var a = document.createElement("script");
				a.type = "text/javascript",
				a.async = !0,
				a.src = "https://platform.stumbleupon.com/1/widgets.js";
				var b = document.getElementsByTagName("script")[0];
				b.parentNode.insertBefore(a, b)
			} (), s = window.setTimeout(function() {
				"undefined" != typeof STMBLPN && (STMBLPN.processWidgets(), clearInterval(s))
			},
			500)) : (STMBLPN.wasProcessLoaded = !1, STMBLPN.processWidgets())
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://www.stumbleupon.com/badge/?url=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url), "stumbleupon", "toolbar=no, width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("tumblr",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		description: "",
		name: "",
		count: !1,
		title: "Share on Tumblr",
		color: "blue",
		notes: "none",
		popup: {
			width: 900,
			height: 500
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		url: function(a) {
			return ""
		},
		trackingAction: {
			site: "tumblr",
			action: "share"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div title="' + b.title + '" class="button tumblr"><a class="tumblr-share-button" data-color="' + b.color + '" data-notes="' + b.notes + '" data-href="' + ("" !== b.url ? b.url: a.options.url) + '"  href="https://www.tumblr.com/share">' + b.title + "</a></div>");
			var c = 0;
			"undefined" == typeof Tumblr && 0 == c ? (c = 1,
			function() {
				var a = document.createElement("script"),
				b = document.getElementsByTagName("script")[0];
				a.src = "https://secure.assets.tumblr.com/share-button.js",
				b.parentNode.insertBefore(a, b)
			} ()) : Tumblr.activate_share_on_tumblr_buttons()
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://www.tumblr.com/share/link?canonicalUrl=" + encodeURIComponent("" !== this.settings.url ? this.settings.url: a.url) + "&name=" + encodeURIComponent(this.settings.name) + "&description=" + encodeURIComponent(this.settings.description), "", "toolbar=0, status=0, width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("twitter",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		count: !1,
		hashtags: "",
		via: "",
		related: "",
		lang: "en",
		popup: {
			width: 650,
			height: 360
		}
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		trackingAction: {
			site: "twitter",
			action: "tweet"
		},
		url: function(a) {
			return "https://opensharecount.com/count.json?url={url}"
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' + ("" !== b.url ? b.url: a.options.url) + '" data-count="' + b.count + '" data-text="' + a.options.text + '" data-via="' + b.via + '" data-hashtags="' + b.hashtags + '" data-related="' + b.related + '" data-lang="' + b.lang + '">Tweet</a></div>');
			var c = 0;
			"undefined" == typeof twttr && 0 == c ? (c = 1,
			function() {
				var a = document.createElement("script");
				a.type = "text/javascript",
				a.async = !0,
				a.src = "https://platform.twitter.com/widgets.js";
				var b = document.getElementsByTagName("script")[0];
				b.parentNode.insertBefore(a, b)
			} ()) : $.ajax({
				url: "https://platform.twitter.com/widgets.js",
				dataType: "script",
				cache: !0
			})
		},
		tracking: function() {
			tw = window.setInterval(function() {
				"undefined" != typeof twttr && (twttr.events.bind("tweet",
				function(a) {
					a && _gaq.push(["_trackSocial", "twitter", "tweet"])
				}), clearInterval(tw))
			},
			1e3)
		},
		popup: function(a) {
			window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(a.text) + "&url=" + encodeURIComponent("" !== this.settings.url ? this.setting.url: a.url) + ("" !== this.settings.via ? "&via=" + this.settings.via: ""), "", "toolbar=0, status=0,width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
SharrrePlatform.register("twitterFollow",
function(a) {
	return defaultSettings = {
		url: "",
		urlCount: !1,
		count: !0,
		display: "horizontal",
		lang: "en",
		popup: {
			width: 650,
			height: 360
		},
		user: "",
		size: "default",
		showCount: "false"
	},
	defaultSettings = $.extend(!0, {},
	defaultSettings, a),
	{
		settings: defaultSettings,
		trackingAction: {
			site: "twitter",
			action: "follow"
		},
		url: function(a) {
			return ""
		},
		load: function(a) {
			var b = this.settings;
			$(a.element).find(".buttons").append('<div class="button twitterFollow"><a href="https://twitter.com/' + b.user + '" class="twitter-follow-button"" data-size="' + b.size + '" data-show-count="' + b.showCount + '" data-lang="' + b.lang + '">Follow @' + b.user + "</a></div>");
			var c = 0;
			"undefined" == typeof twttr && 0 == c ? (c = 1,
			function() {
				var a = document.createElement("script");
				a.type = "text/javascript",
				a.async = !0,
				a.src = "https://platform.twitter.com/widgets.js";
				var b = document.getElementsByTagName("script")[0];
				b.parentNode.insertBefore(a, b)
			} ()) : $.ajax({
				url: "https://platform.twitter.com/widgets.js",
				dataType: "script",
				cache: !0
			})
		},
		tracking: function() {},
		popup: function(a) {
			window.open("https://twitter.com/intent/follow?screen_name=" + encodeURIComponent(this.settings.user), "", "toolbar=0, status=0, ,width=" + this.settings.popup.width + ", height=" + this.settings.popup.height)
		}
	}
}),
/*!
 *  Sharrre.com - Make your sharing widget!
 *  Version: 2.0.1
 *  Author: Julien Hany
 *  License: MIT http://en.wikipedia.org/wiki/MIT_License or GPLv2 http://en.wikipedia.org/wiki/GNU_General_Public_License
 */
function(a, b, c, d) {
	function f(b, c) {
		this.element = b,
		this.options = a.extend(!0, {},
		h, c),
		this.options.share = c.share,
		this._defaults = h,
		this._name = g,
		this.platforms = {},
		this.init()
	}
	var g = "sharrre",
	h = {
		className: "sharrre",
		share: {},
		shareTotal: 0,
		template: "",
		title: "",
		url: c.location.href,
		text: c.title,
		urlCurl: "sharrre.php",
		count: {},
		total: 0,
		shorterTotal: !0,
		enableHover: !0,
		enableCounter: !0,
		enableTracking: !1,
		defaultUrl: "javascript:void(0);",
		popup: {
			width: 900,
			height: 500
		},
		hover: function() {},
		hide: function() {},
		click: function() {},
		render: function() {}
	};
	f.prototype.init = function() {
		var b = this;
		a.each(b.options.share,
		function(a, c) {
			c === !0 && (b.platforms[a] = SharrrePlatform.get(a, b.options.buttons[a]))
		}),
		a(this.element).addClass(this.options.className),
		"undefined" != typeof a(this.element).data("title") && (this.options.title = a(this.element).attr("data-title")),
		"undefined" != typeof a(this.element).data("url") && (this.options.url = a(this.element).data("url")),
		"undefined" != typeof a(this.element).data("text") && (this.options.text = a(this.element).data("text")),
		a.each(this.options.share,
		function(a, c) {
			c === !0 && b.options.shareTotal++
		}),
		b.options.enableCounter === !0 ? a.each(this.options.share,
		function(a, c) {
			if (c === !0) try {
				b.getSocialJson(a)
			} catch(d) {}
		}) : "" !== b.options.template && (b.renderer(), b.options.count[name] = 0, b.rendererPerso()),
		"" !== b.options.template ? this.options.render(this, this.options) : this.loadButtons(),
		a(this.element).on("mouseenter",
		function() {
			0 === a(this).find(".buttons").length && b.options.enableHover === !0 && b.loadButtons(),
			b.options.hover(b, b.options)
		}).on("mouseleave",
		function() {
			b.options.hide(b, b.options)
		}),
		a(this.element).click(function(a) {
			return a.preventDefault(),
			b.options.click(b, b.options),
			!1
		})
	},
	f.prototype.loadButtons = function() {
		var b = this;
		a(this.element).append('<div class="buttons"></div>'),
		a.each(b.options.share,
		function(a, c) {
			1 == c && (b.platforms[a].load(b), b.options.enableTracking === !0 && b.platforms[a].tracking())
		})
	},
	f.prototype.getSocialJson = function(b) {
		var c = this,
		d = 0,
		e = c.platforms[b].settings,
		f = c.platforms[b].url(this.options.urlCurl),
		g = encodeURIComponent(this.options.url);
		e.url.length && (f = e.url),
		e.urlCount === !0 && "" !== f && (g = f),
		e.count === !1 && (f = ""),
		url = f.replace("{url}", g),
		"" != url ? a.getJSON(url,
		function(a) {
			if ("undefined" != typeof a.count) {
				var e = a.count + "";
				e = e.replace("Â ", ""),
				d += parseInt(e, 10)
			} else a.data && a.data.length > 0 && "undefined" != typeof a.data[0].total_count ? d += parseInt(a.data[0].total_count, 10) : "undefined" != typeof a[0] ? d += parseInt(a[0].total_posts, 10) : "undefined" != typeof a[0];
			c.options.count[b] = d,
			c.options.total += d,
			c.renderer(),
			c.rendererPerso()
		}).error(function() {
			c.options.count[b] = 0,
			c.rendererPerso()
		}) : (c.renderer(), c.options.count[b] = 0, c.rendererPerso())
	},
	f.prototype.rendererPerso = function() {
		var a = 0;
		for (e in this.options.count) a++;
		a === this.options.shareTotal && this.options.render(this, this.options)
	},
	f.prototype.renderer = function() {
		var b = this.options.total,
		c = this.options.template;
		this.options.shorterTotal === !0 && (b = this.shorterTotal(b)),
		"" !== c ? (c = c.replace("{total}", b), a(this.element).html(c)) : a(this.element).html('<div class="box"><a class="count" href="' + this.options.defaultUrl + '">' + b + "</a>" + ("" !== this.options.title ? '<a class="share" href="' + this.options.defaultUrl + '">' + this.options.title + "</a>": "") + "</div>")
	},
	f.prototype.shorterTotal = function(a) {
		return a >= 1e6 ? a = (a / 1e6).toFixed(2) + "M": a >= 1e3 && (a = (a / 1e3).toFixed(1) + "k"),
		a
	},
	f.prototype.openPopup = function(a) {
		this.platforms[a].popup(this.options),
		this.options.enableTracking === !0 && (infos = this.platforms[a].trackingAction, _gaq.push(["_trackSocial", infos.site, infos.action]))
	},
	f.prototype.simulateClick = function() {
		var b = a(this.element).html();
		a(this.element).html(b.replace(this.options.total, this.options.total + 1))
	},
	f.prototype.update = function(a, b) {
		"" !== a && (this.options.url = a),
		"" !== b && (this.options.text = b)
	},
	a.fn[g] = function(b) {
		var c = arguments;
		return b === d || "object" == typeof b ? this.each(function() {
			a(this).data("plugin_" + g) || a(this).data("plugin_" + g, new f(this, b))
		}) : "string" == typeof b && "_" !== b[0] && "init" !== b ? this.each(function() {
			var d = a(this).data("plugin_" + g);
			d instanceof f && "function" == typeof d[b] && d[b].apply(d, Array.prototype.slice.call(c, 1))
		}) : void 0
	}
} (window.jQuery || window.Zepto, window, document);