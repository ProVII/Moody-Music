(function(e, t) {
	"object" == typeof exports ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.IubSpinner = t()
})(this, function() {
	"use strict";
	function e(e, t) {
		var i,
		    n = document.createElement(e || "div");
		for (i in t)
		n[i] = t[i];
		return n
	}

	function t(e) {
		for (var t = 1,
		    i = arguments.length; i > t; t++)
			e.appendChild(arguments[t]);
		return e
	}

	function i(e, t, i, n) {
		var r = ["opacity", t, ~~(100 * e), i, n].join("-"),
		    a = .01 + 100 * (i / n),
		    o = Math.max(1 - (1 - e) / t * (100 - a), e),
		    s = u.substring(0, u.indexOf("Animation")).toLowerCase(),
		    l = s && "-" + s + "-" || "";
		return p[r] || (f.insertRule("@" + l + "keyframes " + r + "{" + "0%{opacity:" + o + "}" + a + "%{opacity:" + e + "}" + (a + .01) + "%{opacity:1}" + (a + t) % 100 + "%{opacity:" + e + "}" + "100%{opacity:" + o + "}" + "}", f.cssRules.length), p[r] = 1), r
	}

	function n(e, t) {
		var i,
		    n,
		    r = e.style;
		for ( t = t.charAt(0).toUpperCase() + t.slice(1),
		n = 0; n < c.length; n++)
			if ( i = c[n] + t, r[i] !==
				void 0)
				return i;
		return r[t] !==
		void 0 ? t :
		void 0
	}

	function r(e, t) {
		for (var i in t)
		e.style[n(e, i) || i] = t[i];
		return e
	}

	function a(e) {
		for (var t = 1; t < arguments.length; t++) {
			var i = arguments[t];
			for (var n in i)e[n] ===
			void 0 && (e[n] = i[n])
		}
		return e
	}

	function o(e) {
		for (var t = {
			x : e.offsetLeft,
			y : e.offsetTop
		}; e = e.offsetParent; )
			t.x += e.offsetLeft, t.y += e.offsetTop;
		return t
	}

	function s(e, t) {
		return "string" == typeof e ? e : e[t % e.length]
	}

	function l(e) {
		return "undefined" == typeof this ? new l(e) : (this.opts = a(e || {}, l.defaults, h),
		void 0)
	}

	function d() {
		function i(t, i) {
			return e("<" + t + ' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">', i)
		}
		f.addRule(".spin-vml", "behavior:url(#default#VML)"), l.prototype.lines = function(e, n) {
			function a() {
				return r(i("group", {
					coordsize : u + " " + u,
					coordorigin : -d + " " + -d
				}), {
					width : u,
					height : u
				})
			}

			function o(e, o, l) {
				t(p, t(r(a(), {
					rotation : 360 / n.lines * e + "deg",
					left : ~~o
				}), t(r(i("roundrect", {
					arcsize : n.corners
				}), {
					width : d,
					height : n.width,
					left : n.radius,
					top : -n.width >> 1,
					filter : l
				}), i("fill", {
					color : s(n.color, e),
					opacity : n.opacity
				}), i("stroke", {
					opacity : 0
				}))))
			}

			var l,
			    d = n.length + n.width,
			    u = 2 * d,
			    c = -(n.width + n.length) * 2 + "px",
			    p = r(a(), {
				position : "absolute",
				top : c,
				left : c
			});
			if (n.shadow)
				for ( l = 1; l <= n.lines; l++)
					o(l, -2, "progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");
			for ( l = 1; l <= n.lines; l++)
				o(l);
			return t(e, p)
		}, l.prototype.opacity = function(e, t, i, n) {
			var r = e.firstChild;
			n = n.shadow && n.lines || 0, r && t + n < r.childNodes.length && ( r = r.childNodes[t + n],
			r = r && r.firstChild,
			r = r && r.firstChild, r && (r.opacity = i))
		}
	}

	var u,
	    c = ["webkit", "Moz", "ms", "O"],
	    p = {},
	    f = function() {
		var i = e("style", {
			type : "text/css"
		});
		return t(document.getElementsByTagName("head")[0], i), i.sheet || i.styleSheet
	}(),
	    h = {
		lines : 12,
		length : 7,
		width : 5,
		radius : 10,
		rotate : 0,
		corners : 1,
		color : "#000",
		direction : 1,
		speed : 1,
		trail : 100,
		opacity : .25,
		fps : 20,
		zIndex : 2e9,
		className : "spinner",
		top : "auto",
		left : "auto",
		position : "relative"
	};
	l.defaults = {}, a(l.prototype, {
		spin : function(t) {
			this.stop();
			var i,
			    n,
			    a = this,
			    s = a.opts,
			    l = a.el = r(e(0, {
				className : s.className
			}), {
				position : s.position,
				width : 0,
				zIndex : s.zIndex
			}),
			    d = s.radius + s.length + s.width;
			if (t && (t.insertBefore(l, t.firstChild || null),
			n = o(t),
			i = o(l), r(l, {
				left : (s.left == "auto" ? n.x - i.x + (t.offsetWidth >> 1) : parseInt(s.left, 10) + d) + "px",
				top : (s.top == "auto" ? n.y - i.y + (t.offsetHeight >> 1) : parseInt(s.top, 10) + d) + "px"
			})), l.setAttribute("role", "progressbar"), a.lines(l, a.opts), !u) {
				var c,
				    p = 0,
				    f = (s.lines - 1) * (1 - s.direction) / 2,
				    h = s.fps,
				    b = h / s.speed,
				    g = (1 - s.opacity) / (b * s.trail / 100),
				    m = b / s.lines;
				(function y() {
					p++;
					for (var e = 0; e < s.lines; e++)
						c = Math.max(1 - (p + (s.lines - e) * m) % b * g, s.opacity), a.opacity(l, e * s.direction + f, c, s);
					a.timeout = a.el && setTimeout(y, ~~(1e3 / h))
				})()
			}
			return a
		},
		stop : function() {
			var e = this.el;
			return e && (clearTimeout(this.timeout), e.parentNode && e.parentNode.removeChild(e), this.el =
			void 0), this
		},
		lines : function(n, a) {
			function o(t, i) {
				return r(e(), {
					position : "absolute",
					width : a.length + a.width + "px",
					height : a.width + "px",
					background : t,
					boxShadow : i,
					transformOrigin : "left",
					transform : "rotate(" + ~~(360 / a.lines * d + a.rotate) + "deg) translate(" + a.radius + "px" + ",0)",
					borderRadius : (a.corners * a.width >> 1) + "px"
				})
			}

			for (var l,
			    d = 0,
			    c = (a.lines - 1) * (1 - a.direction) / 2; d < a.lines; d++)
				l = r(e(), {
					position : "absolute",
					top : 1 + ~(a.width / 2) + "px",
					transform : a.hwaccel ? "translate3d(0,0,0)" : "",
					opacity : a.opacity,
					animation : u && i(a.opacity, a.trail, c + d * a.direction, a.lines) + " " + 1 / a.speed + "s linear infinite"
				}), a.shadow && t(l, r(o("#000", "0 0 4px #000"), {
					top : "2px"
				})), t(n, t(l, o(s(a.color, d), "0 0 1px rgba(0,0,0,.1)")));
			return n
		},
		opacity : function(e, t, i) {
			t < e.childNodes.length && (e.childNodes[t].style.opacity = i)
		}
	});
	var b = r(e("group"), {
		behavior : "url(#default#VML)"
	});
	return !n(b, "transform") && b.adj ? d() : u = n(b, "animation"), l
}), function() {
	typeof String.prototype.trim != "function" && (String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, "")
	})
}();
var _iub = _iub || [];
_iub.badges = _iub.badges || [], _iub.embedBs = _iub.embedBs || [], function(e, t) {
	function i() {
		return _
	}

	function n() {
		var e = x("iubenda-embed", t);
		if (e.length == 0) {
			var i = t.getElementById("iubenda-embed");
			i && r(i)
		} else
			for (var n = 0; n < e.length; n++) {
				var a = e[n],
				    o = {
					ppId : A(a.getAttribute("href")),
					isLegal : k(a)
				};
				m(a.className.split(" "), "iub-body-embed") != -1 ? B({
					linkA : a,
					embedB : !0
				}) || (o.index = Math.floor(Math.random() * 1e10), o.linkA = r(a, o.index), _iub.embedBs.push(o)) : B({
					linkA : a
				}) || (o.linkA = r(a), _iub.badges.push(o))
			}
	}

	function r(e, i) {
		var n = e,
		    r = !1,
		    d = !1,
		    u = !1,
		    c = !1,
		    p = !1,
		    f = !1,
		    h = "iubenda-white",
		    g = e.getAttribute("href"),
		    x = A(g),
		    N = "//",
		    k = parseInt(e.getAttribute("data-iub-z-index")) || null,
		    B = e.className.split(" ");
		v(B, "no-brand") && ( r = !0), v(B, "skip-track") && ( d = !0), v(B, "iub-body-embed") && ( u = !0), v(B, "iub-legal-only") && ( c = !0), v(B, "iub-anchor") && ( p = !0), v(B, "iub-no-markup") && ( f = !0), e.getAttribute("href").indexOf("http://") != -1 ? N = "http://" : e.getAttribute("href").indexOf("https://") != -1 && ( N = "https://");
		var _ = w(I, N),
		    M = w(C, N),
		    T = w(E, N),
		    S = w(L, N);
		if (m(B, "iubenda-no-icon") != -1 ? h = "iubenda-nostyle" : ( h = y(["iubenda-green", "iubenda-green-m", "iubenda-green-s", "iubenda-green-xs", "iubenda-lowgray", "iubenda-lowgray-m", "iubenda-lowgray-s", "iubenda-lowgray-xs", "iubenda-midgray", "iubenda-midgray-m", "iubenda-midgray-s", "iubenda-midgray-xs", "iubenda-darkgray", "iubenda-darkgray-m", "iubenda-darkgray-s", "iubenda-darkgray-xs", "iubenda-white", "iubenda-black", "iubenda-nostyle"], B), -1 == h && ( h = "iubenda-white")), "iubenda-nostyle" != h && (e.style.outline = "0px", e.style.border = "0px", e.style.textDecoration = "none", e.style.display = "inline-block", e.style.background = "none"), u)
			n = l(e, S, c, f, N, i);
		else if (m(["iubenda-white", "iubenda-black"], h) != -1)
			n = s(e, h, null, null, x, r, _, M, T, d, c, p, N, k);
		else {
			if (c && (e.href = e.href + "/full-legal"), "iubenda-nostyle" != h) {
				var O = 116,
				    P = 25,
				    j = ".gif";
				(h.indexOf("-m") != -1 && h.indexOf("-mid") == -1 || h.indexOf("midgray-m") != -1) && ( O = 81,
				P = 21), (h.indexOf("-s") != -1 || h.indexOf("-xs") != -1) && ( O = 82,
				P = 17,
				j = ".png"), e.style.width = O + "px", e.style.height = P + "px", h += j, a(e, _ + h, O, P)
			}
			b(M, e, {
				onLoadCallB : function() {
					_iub.ifr.iubendaStartBadge({
						linkA : e,
						embedP : t.getElementsByTagName("body")[0],
						iFrUrl : e.href,
						cdnBaseUrl : _,
						useProtocol : N,
						zIndex : k
					})
				}
			}), d || o(e, x),
			n =
			e
		}
		return "undefined" != typeof editLinkA && null != editLinkA && ( editLinkA = null), n
	}

	function a(e, t, i, n) {
		f(e.id, t, 100, i, n)
	}

	function o() {
	}

	function s(e, i, n, r, a, s, l, d, u, c, f, h, b, g) {
		e.style.display = "none";
		var m = e.innerHTML.trim() || "Privacy Policy",
		    y = e.getAttribute("title") || "Privacy Policy",
		    b = b || "//",
		    v = {
			"Informativa Privacy" : 136,
			"Datenschutzerklärung" : 154,
			"Política de privacidad" : 146,
			"Politique de confidentialité" : 178
		},
		    x = n || v[m] || 105,
		    N = r || 22,
		    A = t.createElement("IFRAME"),
		    k = h ? "iubenda-ibadge iubenda-iframe-anchor" : "iubenda-ibadge";
		A.setAttribute("class", k), A.setAttribute("scrolling", "no"), A.setAttribute("frameBorder", "0"), A.setAttribute("allowtransparency", "true");
		var B = "width:" + x + "px; height:" + N + "px;";
		h && (B += " z-index:9998; position:fixed; bottom:0px; right:0px;"), p(A, B), e.parentNode.insertBefore(A, e.nextSibling), e.parentNode.removeChild(e);
		var _ = A.contentWindow.document;
		_.open(), _.write();
		var I = f ? e.href + "/full-legal" : e.href;
		I = w(I, b);
		var C = null,
		    E = '<html><head><title>iubenda badge</title><meta name="viewport" content="width=device-width"><link type="text/css" rel="stylesheet" href="' + u + '" media="screen" />' + '<script type="text/javascript" src="' + d + '"></script></head>' + '<body onload="try{_iub.ifr.iubendaStartBadge({' + ( C ? "iFrUrl:'" + C + "'," : "") + "useProtocol:'" + b + "',zIndex:'" + g + "'});}catch(exc){console.log('IUBENDA: error while loading [iubendaStartBadge]. Please contact info@iubenda.com for support and troubleshooting.')}\"><a href=\"" + I + '" class="' + i + " " + ( s ? "no-brand" : "") + " " + ( h ? "iub-anchor" : "") + '" id="i_badge-link" title="' + y + '" target="_parent" >' + m + "</a></body></html>";
		return _.write(E), _.close(), c || o(A, a), A
	}

	function l(e, t, i, n, r, a) {
		var r = r || "//";
		n || d(t);
		var o = e.href + ( n ? "/embed-no-markup.json" : i ? "/embed-legal.json" : "/embed.json") + "?i=" + a;
		if ( o = w(o, r), "undefined" != typeof IubSpinner) {
			var s = {
				lines : 8,
				length : 2,
				width : 2,
				radius : 2,
				color : "#696969",
				speed : 1.2,
				trail : 60,
				shadow : !1
			},
			    l = new IubSpinner(s).spin();
			l.el.className = "_iub-pp-loading-alert", p(l.el, "position:relative; display:inline-block; padding: 6px;"), e.parentNode.insertBefore(l.el, e)
		}
		return e.style.display = "none", b(o, e, {
			tries : 1
		}), e
	}

	function d(e) {
		var i = t.createElement("link");
		i.type = "text/css", i.rel = "stylesheet", i.href =
		e, t.getElementsByTagName("head")[0].appendChild(i)
	}

	function u(e) {
		try {
			var i = null;
			if (e.i && e.i != null ? ( i = B({
				index : parseInt(e.i),
				embedB : !0,
				inDom : !0
			}), i || ( i = B({
				ppId : parseInt(e.pp_id),
				isLegal : e.is_legal,
				embedB : !0,
				inDom : !0
			}))) : i = B({
				ppId : parseInt(e.pp_id),
				isLegal : e.is_legal,
				embedB : !0,
				inDom : !0
			}), i && i.linkA) {
				var n = i.linkA,
				    r = t.createElement("div");
				r.setAttribute("id", "iub-pp-container"), r.innerHTML = e.content, n.parentNode.insertBefore(r, n.nextSibling);
				var a = n.previousSibling;
				a.className == "_iub-pp-loading-alert" && a.parentNode.removeChild(a), n.parentNode.removeChild(n), c(r)
			}
		} catch(o) {
			console.log("IUBENDA: Error while loading [ " + o.message + " ]. Please contact info@iubenda.com for support and troubleshooting.")
		}
	}

	function c(e) {
		function i(e, t) {
			return e.nodeName && e.nodeName.toUpperCase() === t.toUpperCase()
		}

		function n(e) {
			var i = e.text || e.textContent || e.innerHTML || "",
			    n = t.getElementsByTagName("head")[0] || t.documentElement,
			    r = t.createElement("script");
			r.type = "text/javascript";
			try {
				r.appendChild(t.createTextNode(i))
			} catch(a) {
				r.text = i
			}
			n.insertBefore(r, n.firstChild), n.removeChild(r)
		}

		function r(e, t, i) {
			var n = i + 1;
			if (n <= Math.max(1, d)) {
				t.push(e);
				for (var a = e.childNodes,
				    o = 0; o < a.length; o++)
					a[o].nodeType == 1 && r(a[o], t, n)
			}
		}

		for (var a,
		    o,
		    s = [],
		    l = [],
		    d = 8,
		    u = e.childNodes,
		    c = 0; c < u.length; c++)
			u[c].nodeType == 1 && r(u[c], l, 1);
		for (var c = 0; l[c]; c++)
			o = l[c], !i(o, "script") || o.type && o.type.toLowerCase() !== "text/javascript" || s.push(o);
		for (var c = 0; s[c]; c++)
			a = s[c], a.parentNode && a.parentNode.removeChild(a), n(s[c])
	}

	function p(e, t) {
		var i = h();
		-1 != i && 8 > i ? e.style.cssText = t : e.setAttribute("style", t)
	}

	function f(e, i, n, r, a) {
		if (!(0 >= n)) {
			var o = t.getElementById(e),
			    s = t.createElement("img");
			s.src = i, s.style.width = r + "px", s.style.height = a + "px", s.style.border = "0px", o && s.width ? (s.alt = o.firstChild.nodeValue, s.title = o.firstChild.nodeValue, o.replaceChild(s, o.firstChild)) : setTimeout("_iub.imageFastReplace('" + e + "','" + i + "'," + --n + "," + r + "," + a + ");", 150)
		}
	}

	function h() {
		var e = -1;
		if (navigator.appName == "Microsoft Internet Explorer") {
			var t = navigator.userAgent,
			    i = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
			i.exec(t) != null && ( e = parseFloat(RegExp.$1))
		}
		return e
	}

	function b(e, i, n) {
		var n = n || {},
		    r =
		    e,
		    a =
		    i,
		    o = n.onLoadCallB,
		    s = n.tries,
		    l = t.createElement("script");
		l.setAttribute("type", "text/javascript"), l.setAttribute("src", e), i.parentNode.insertBefore(l, i.nextSibling), "function" == typeof o && g(l, o), l.onerror = function() {
			s > 0 && b(N(r, "t", s), a, {
				onLoadCallB : o,
				tries : s - 1
			})
		}
	}

	function g(e, t) {
		var i = h();
		-1 != i && 9 > i ? e.onreadystatechange = function() {
			(this.readyState == "loaded" || this.readyState == "complete") && t()
		} : e.onload = function() {
			t()
		}
	}

	function m(e, t) {
		var i = Object(e),
		    n = i.length >>> 0;
		if (0 === n)
			return -1;
		var r = 0;
		if (arguments.length > 0 && ( r = Number(arguments[1]), r !== r ? r = 0 : 0 !== r && r !== 1 / 0 && r !== -(1 / 0) && ( r = (r > 0 || -1) * Math.floor(Math.abs(r)))), r >= n)
			return -1;
		for (var a = r >= 0 ? r : Math.max(n - Math.abs(r), 0); n > a; a++)
			if ( a in i && i[a] === t)
				return a;
		return -1
	}

	function y(e, t) {
		var i = Object(e),
		    n = i.length >>> 0;
		if (0 === n)
			return -1;
		for (var r = 0; r < t.length; r++)
			if (m(i, t[r]) != -1)
				return t[r];
		return -1
	}

	function v(e, t) {
		return m(e, t) != -1 ? (e.splice(m(e, t), 1), !0) : !1
	}

	function x(e, i) {
		i || ( i = t.getElementsByTagName("body")[0]);
		for (var n = [],
		    r = new RegExp("\\b" + e + "\\b"),
		    a = i.getElementsByTagName("*"),
		    o = 0,
		    s = a.length; s > o; o++)
			r.test(a[o].className) && n.push(a[o]);
		return n
	}

	function w(e, t) {
		var i = e.indexOf("//") != -1 ? e.split("//")[1] : e;
		return t.concat(i)
	}

	function N(e, t, i) {
		if (i) {
			var n = e.split("#")[0],
			    r = e.split("#")[1];
			return n += (n.indexOf("?") != -1 ? "&" : "?") + t + "=" + i, r ? n + "#" + r : n
		}
		return e
	}

	function A(e) {
		for (var t = e.split("/"),
		    i = t.length - 1; i > -1; i--)
			if (!isNaN(parseInt(t[i])))
				return parseInt(t[i]);
		return null
	}

	function k(e) {
		return e.getAttribute("href").indexOf("/legal") != -1 || e.getAttribute("href").indexOf("/full-legal") != -1 || m(e.className.split(" "), "iub-legal-only") != -1 || m(e.className.split(" "), "iub-no-markup") != -1
	}

	function B(e) {
		for (var e = e || {},
		    i = e.embedB ? _iub.embedBs : _iub.badges,
		    n = e.inDom == 1,
		    r = 0; r < i.length; r++)
			if (e.index) {
				if (i[r].index == e.index && (!n || t.body.contains(i[r].linkA)))
					return i[r]
			} else if (e.linkA) {
				if (i[r].linkA == e.linkA && (!n || t.body.contains(i[r].linkA)))
					return i[r]
			} else if (i[r].ppId == e.ppId && i[r].isLegal === e.isLegal && (!n || t.body.contains(i[r].linkA)))
				return i[r];
		return null
	}

	var _ = "1.0.1",
	    I = "https://cdn.iubenda.com/",
	    C = "https://cdn.iubenda.com/iubenda_i_badge.js",
	    E = "https://cdn.iubenda.com/iubenda_i_badge.css",
	    L = "https://www.iubenda.com/assets/privacy_policy.css";
	(function() {
		try {
			n()
		} catch(e) {
			console.log("Error while loading [ " + e.message + " ]. Please contact info@MoodyMusic.com for support and troubleshooting.")
		}
	})(), e._iub.setStyle = function(e, t) {
		p(e, t)
	}, e._iub.onLoadCall = function(e, t) {
		g(e, t)
	}, e._iub.imageFastReplace = function(e, t, i, n, r) {
		f(e, t, i, n, r)
	}, e._iub.getElementsByClassName = function(e, t) {
		return x(e, t)
	}, e._iub.loadPPContent = function(e) {
		u(e)
	}, e._iub.version = function() {
		return i()
	}
}(window, document); 
