!function(e, t, n, r) {
    function i(e, t) {
        return typeof e === t
    }
    function o(e) {
        var t = C.className
          , n = b._config.classPrefix || "";
        if (T && (t = t.baseVal),
        b._config.enableJSClass) {
            var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
            t = t.replace(r, "$1" + n + "js$2")
        }
        b._config.enableClasses && (e.length > 0 && (t += " " + n + e.join(" " + n)),
        T ? C.className.baseVal = t : C.className = t)
    }
    function s(e, t) {
        if ("object" == typeof e)
            for (var n in e)
                E(e, n) && s(n, e[n]);
        else {
            var r = (e = e.toLowerCase()).split(".")
              , i = b[r[0]];
            if (2 === r.length && (i = i[r[1]]),
            void 0 !== i)
                return b;
            t = "function" == typeof t ? t() : t,
            1 === r.length ? b[r[0]] = t : (!b[r[0]] || b[r[0]]instanceof Boolean || (b[r[0]] = new Boolean(b[r[0]])),
            b[r[0]][r[1]] = t),
            o([(t && !1 !== t ? "" : "no-") + r.join("-")]),
            b._trigger(e, t)
        }
        return b
    }
    function a() {
        return "function" != typeof n.createElement ? n.createElement(arguments[0]) : T ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments)
    }
    function u(e, t, r, i) {
        var o, s, u, l, c = "modernizr", f = a("div"), p = function() {
            var e = n.body;
            return e || ((e = a(T ? "svg" : "body")).fake = !0),
            e
        }();
        if (parseInt(r, 10))
            for (; r--; )
                (u = a("div")).id = i ? i[r] : c + (r + 1),
                f.appendChild(u);
        return (o = a("style")).type = "text/css",
        o.id = "s" + c,
        (p.fake ? p : f).appendChild(o),
        p.appendChild(f),
        o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(n.createTextNode(e)),
        f.id = c,
        p.fake && (p.style.background = "",
        p.style.overflow = "hidden",
        l = C.style.overflow,
        C.style.overflow = "hidden",
        C.appendChild(p)),
        s = t(f, e),
        p.fake ? (p.parentNode.removeChild(p),
        C.style.overflow = l,
        C.offsetHeight) : f.parentNode.removeChild(f),
        !!s
    }
    function l(e, n, r) {
        var i;
        if ("getComputedStyle"in t) {
            i = getComputedStyle.call(t, e, n);
            var o = t.console;
            if (null !== i)
                r && (i = i.getPropertyValue(r));
            else if (o) {
                o[o.error ? "error" : "log"].call(o, "getComputedStyle returning null, its possible modernizr test results are inaccurate")
            }
        } else
            i = !n && e.currentStyle && e.currentStyle[r];
        return i
    }
    function c(e, t) {
        return !!~("" + e).indexOf(t)
    }
    function f(e) {
        return e.replace(/([A-Z])/g, (function(e, t) {
            return "-" + t.toLowerCase()
        }
        )).replace(/^ms-/, "-ms-")
    }
    function p(e, n) {
        var i = e.length;
        if ("CSS"in t && "supports"in t.CSS) {
            for (; i--; )
                if (t.CSS.supports(f(e[i]), n))
                    return !0;
            return !1
        }
        if ("CSSSupportsRule"in t) {
            for (var o = []; i--; )
                o.push("(" + f(e[i]) + ":" + n + ")");
            return u("@supports (" + (o = o.join(" or ")) + ") { #modernizr { position: absolute; } }", (function(e) {
                return "absolute" === l(e, null, "position")
            }
            ))
        }
        return r
    }
    function d(e) {
        return e.replace(/([a-z])-([a-z])/g, (function(e, t, n) {
            return t + n.toUpperCase()
        }
        )).replace(/^-/, "")
    }
    function h(e, t, n, o) {
        function s() {
            l && (delete q.style,
            delete q.modElem)
        }
        if (o = !i(o, "undefined") && o,
        !i(n, "undefined")) {
            var u = p(e, n);
            if (!i(u, "undefined"))
                return u
        }
        for (var l, f, h, g, v, m = ["modernizr", "tspan", "samp"]; !q.style && m.length; )
            l = !0,
            q.modElem = a(m.shift()),
            q.style = q.modElem.style;
        for (h = e.length,
        f = 0; f < h; f++)
            if (g = e[f],
            v = q.style[g],
            c(g, "-") && (g = d(g)),
            q.style[g] !== r) {
                if (o || i(n, "undefined"))
                    return s(),
                    "pfx" !== t || g;
                try {
                    q.style[g] = n
                } catch (e) {}
                if (q.style[g] !== v)
                    return s(),
                    "pfx" !== t || g
            }
        return s(),
        !1
    }
    function g(e, t) {
        return function() {
            return e.apply(t, arguments)
        }
    }
    function v(e, t, n, r, o) {
        var s = e.charAt(0).toUpperCase() + e.slice(1)
          , a = (e + " " + D.join(s + " ") + s).split(" ");
        return i(t, "string") || i(t, "undefined") ? h(a, t, r, o) : function(e, t, n) {
            var r;
            for (var o in e)
                if (e[o]in t)
                    return !1 === n ? e[o] : i(r = t[e[o]], "function") ? g(r, n || t) : r;
            return !1
        }(a = (e + " " + S.join(s + " ") + s).split(" "), t, n)
    }
    function m(e, t, n) {
        return v(e, r, r, t, n)
    }
    var y = []
      , x = {
        _version: "3.11.2",
        _config: {
            classPrefix: "",
            enableClasses: !0,
            enableJSClass: !0,
            usePrefixes: !0
        },
        _q: [],
        on: function(e, t) {
            var n = this;
            setTimeout((function() {
                t(n[e])
            }
            ), 0)
        },
        addTest: function(e, t, n) {
            y.push({
                name: e,
                fn: t,
                options: n
            })
        },
        addAsyncTest: function(e) {
            y.push({
                name: null,
                fn: e
            })
        }
    }
      , b = function() {};
    b.prototype = x,
    b = new b;
    var w = []
      , C = n.documentElement
      , T = "svg" === C.nodeName.toLowerCase()
      , A = "Moz O ms Webkit"
      , S = x._config.usePrefixes ? A.toLowerCase().split(" ") : [];
    x._domPrefixes = S;
    var E, k = x._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
    x._prefixes = k,
    function() {
        var e = {}.hasOwnProperty;
        E = i(e, "undefined") || i(e.call, "undefined") ? function(e, t) {
            return t in e && i(e.constructor.prototype[t], "undefined")
        }
        : function(t, n) {
            return e.call(t, n)
        }
    }(),
    x._l = {},
    x.on = function(e, t) {
        this._l[e] || (this._l[e] = []),
        this._l[e].push(t),
        b.hasOwnProperty(e) && setTimeout((function() {
            b._trigger(e, b[e])
        }
        ), 0)
    }
    ,
    x._trigger = function(e, t) {
        if (this._l[e]) {
            var n = this._l[e];
            setTimeout((function() {
                var e;
                for (e = 0; e < n.length; e++)
                    (0,
                    n[e])(t)
            }
            ), 0),
            delete this._l[e]
        }
    }
    ,
    b._q.push((function() {
        x.addTest = s
    }
    ));
    var N = function() {
        var e = !("onblur"in C);
        return function(t, n) {
            var i;
            return !!t && (n && "string" != typeof n || (n = a(n || "div")),
            !(i = (t = "on" + t)in n) && e && (n.setAttribute || (n = a("div")),
            n.setAttribute(t, ""),
            i = "function" == typeof n[t],
            n[t] !== r && (n[t] = r),
            n.removeAttribute(t)),
            i)
        }
    }();
    x.hasEvent = N;
    var j = function() {
        var e = t.matchMedia || t.msMatchMedia;
        return e ? function(t) {
            var n = e(t);
            return n && n.matches || !1
        }
        : function(e) {
            var t = !1;
            return u("@media " + e + " { #modernizr { position: absolute; } }", (function(e) {
                t = "absolute" === l(e, null, "position")
            }
            )),
            t
        }
    }();
    x.mq = j;
    x.prefixedCSSValue = function(e, t) {
        var n = !1
          , r = a("div").style;
        if (e in r) {
            var i = S.length;
            for (r[e] = t,
            n = r[e]; i-- && !n; )
                r[e] = "-" + S[i] + "-" + t,
                n = r[e]
        }
        return "" === n && (n = !1),
        n
    }
    ;
    var D = x._config.usePrefixes ? A.split(" ") : [];
    x._cssomPrefixes = D;
    var L = {
        elem: a("modernizr")
    };
    b._q.push((function() {
        delete L.elem
    }
    ));
    var q = {
        style: L.elem.style
    };
    b._q.unshift((function() {
        delete q.style
    }
    )),
    x.testAllProps = v,
    x.testAllProps = m,
    x.testProp = function(e, t, n) {
        return h([e], r, t, n)
    }
    ,
    x.testStyles = u,
    b.addTest("customelements", "customElements"in t),
    b.addTest("history", (function() {
        var e = navigator.userAgent;
        return !!e && (-1 === e.indexOf("Android 2.") && -1 === e.indexOf("Android 4.0") || -1 === e.indexOf("Mobile Safari") || -1 !== e.indexOf("Chrome") || -1 !== e.indexOf("Windows Phone") || "file:" === location.protocol) && t.history && "pushState"in t.history
    }
    ));
    var P = [""].concat(S);
    x._domPrefixesAll = P,
    b.addTest("pointerevents", (function() {
        for (var e = 0, t = P.length; e < t; e++)
            if (N(P[e] + "pointerdown"))
                return !0;
        return !1
    }
    ));
    var O = !0;
    try {
        t.postMessage({
            toString: function() {
                O = !1
            }
        }, "*")
    } catch (e) {}
    b.addTest("postmessage", new Boolean("postMessage"in t)),
    b.addTest("postmessage.structuredclones", O),
    b.addTest("webgl", (function() {
        return "WebGLRenderingContext"in t
    }
    ));
    var H = !1;
    try {
        H = "WebSocket"in t && 2 === t.WebSocket.CLOSING
    } catch (e) {}
    b.addTest("websockets", H),
    b.addTest("cssanimations", m("animationName", "a", !0)),
    function() {
        b.addTest("csscolumns", (function() {
            var e = !1
              , t = m("columnCount");
            try {
                (e = !!t) && (e = new Boolean(e))
            } catch (e) {}
            return e
        }
        ));
        for (var e, t, n = ["Width", "Span", "Fill", "Gap", "Rule", "RuleColor", "RuleStyle", "RuleWidth", "BreakBefore", "BreakAfter", "BreakInside"], r = 0; r < n.length; r++)
            e = n[r].toLowerCase(),
            t = m("column" + n[r]),
            "breakbefore" !== e && "breakafter" !== e && "breakinside" !== e || (t = t || m(n[r])),
            b.addTest("csscolumns." + e, t)
    }(),
    b.addTest("flexbox", m("flexBasis", "1px", !0)),
    b.addTest("picture", "HTMLPictureElement"in t),
    b.addAsyncTest((function() {
        var e, t, n = a("img"), r = "sizes"in n;
        !r && "srcset"in n ? ("data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw==",
        e = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",
        t = function() {
            s("sizes", 2 === n.width)
        }
        ,
        n.onload = t,
        n.onerror = t,
        n.setAttribute("sizes", "9px"),
        n.srcset = e + " 1w,data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw== 8w",
        n.src = e) : s("sizes", r)
    }
    )),
    b.addTest("srcset", "srcset"in a("img")),
    b.addTest("webworkers", "Worker"in t),
    function() {
        var e, t, n, r, o, s;
        for (var a in y)
            if (y.hasOwnProperty(a)) {
                if (e = [],
                (t = y[a]).name && (e.push(t.name.toLowerCase()),
                t.options && t.options.aliases && t.options.aliases.length))
                    for (n = 0; n < t.options.aliases.length; n++)
                        e.push(t.options.aliases[n].toLowerCase());
                for (r = i(t.fn, "function") ? t.fn() : t.fn,
                o = 0; o < e.length; o++)
                    1 === (s = e[o].split(".")).length ? b[s[0]] = r : (b[s[0]] && (!b[s[0]] || b[s[0]]instanceof Boolean) || (b[s[0]] = new Boolean(b[s[0]])),
                    b[s[0]][s[1]] = r),
                    w.push((r ? "" : "no-") + s.join("-"))
            }
    }(),
    o(w),
    delete x.addTest,
    delete x.addAsyncTest;
    for (var R = 0; R < b._q.length; R++)
        b._q[R]();
    e.Modernizr = b
}(window, window, document),
function(e, t) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
        if (!e.document)
            throw new Error("jQuery requires a window with a document");
        return t(e)
    }
    : t(e)
}("undefined" != typeof window ? window : this, (function(e, t) {
    "use strict";
    var n = []
      , r = Object.getPrototypeOf
      , i = n.slice
      , o = n.flat ? function(e) {
        return n.flat.call(e)
    }
    : function(e) {
        return n.concat.apply([], e)
    }
      , s = n.push
      , a = n.indexOf
      , u = {}
      , l = u.toString
      , c = u.hasOwnProperty
      , f = c.toString
      , p = f.call(Object)
      , d = {}
      , h = function(e) {
        return "function" == typeof e && "number" != typeof e.nodeType && "function" != typeof e.item
    }
      , g = function(e) {
        return null != e && e === e.window
    }
      , v = e.document
      , m = {
        type: !0,
        src: !0,
        nonce: !0,
        noModule: !0
    };
    function y(e, t, n) {
        var r, i, o = (n = n || v).createElement("script");
        if (o.text = e,
        t)
            for (r in m)
                (i = t[r] || t.getAttribute && t.getAttribute(r)) && o.setAttribute(r, i);
        n.head.appendChild(o).parentNode.removeChild(o)
    }
    function x(e) {
        return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? u[l.call(e)] || "object" : typeof e
    }
    var b = "3.6.0"
      , w = function(e, t) {
        return new w.fn.init(e,t)
    };
    function C(e) {
        var t = !!e && "length"in e && e.length
          , n = x(e);
        return !h(e) && !g(e) && ("array" === n || 0 === t || "number" == typeof t && 0 < t && t - 1 in e)
    }
    w.fn = w.prototype = {
        jquery: b,
        constructor: w,
        length: 0,
        toArray: function() {
            return i.call(this)
        },
        get: function(e) {
            return null == e ? i.call(this) : e < 0 ? this[e + this.length] : this[e]
        },
        pushStack: function(e) {
            var t = w.merge(this.constructor(), e);
            return t.prevObject = this,
            t
        },
        each: function(e) {
            return w.each(this, e)
        },
        map: function(e) {
            return this.pushStack(w.map(this, (function(t, n) {
                return e.call(t, n, t)
            }
            )))
        },
        slice: function() {
            return this.pushStack(i.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        even: function() {
            return this.pushStack(w.grep(this, (function(e, t) {
                return (t + 1) % 2
            }
            )))
        },
        odd: function() {
            return this.pushStack(w.grep(this, (function(e, t) {
                return t % 2
            }
            )))
        },
        eq: function(e) {
            var t = this.length
              , n = +e + (e < 0 ? t : 0);
            return this.pushStack(0 <= n && n < t ? [this[n]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor()
        },
        push: s,
        sort: n.sort,
        splice: n.splice
    },
    w.extend = w.fn.extend = function() {
        var e, t, n, r, i, o, s = arguments[0] || {}, a = 1, u = arguments.length, l = !1;
        for ("boolean" == typeof s && (l = s,
        s = arguments[a] || {},
        a++),
        "object" == typeof s || h(s) || (s = {}),
        a === u && (s = this,
        a--); a < u; a++)
            if (null != (e = arguments[a]))
                for (t in e)
                    r = e[t],
                    "__proto__" !== t && s !== r && (l && r && (w.isPlainObject(r) || (i = Array.isArray(r))) ? (n = s[t],
                    o = i && !Array.isArray(n) ? [] : i || w.isPlainObject(n) ? n : {},
                    i = !1,
                    s[t] = w.extend(l, o, r)) : void 0 !== r && (s[t] = r));
        return s
    }
    ,
    w.extend({
        expando: "jQuery" + (b + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(e) {
            throw new Error(e)
        },
        noop: function() {},
        isPlainObject: function(e) {
            var t, n;
            return !(!e || "[object Object]" !== l.call(e) || (t = r(e)) && ("function" != typeof (n = c.call(t, "constructor") && t.constructor) || f.call(n) !== p))
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e)
                return !1;
            return !0
        },
        globalEval: function(e, t, n) {
            y(e, {
                nonce: t && t.nonce
            }, n)
        },
        each: function(e, t) {
            var n, r = 0;
            if (C(e))
                for (n = e.length; r < n && !1 !== t.call(e[r], r, e[r]); r++)
                    ;
            else
                for (r in e)
                    if (!1 === t.call(e[r], r, e[r]))
                        break;
            return e
        },
        makeArray: function(e, t) {
            var n = t || [];
            return null != e && (C(Object(e)) ? w.merge(n, "string" == typeof e ? [e] : e) : s.call(n, e)),
            n
        },
        inArray: function(e, t, n) {
            return null == t ? -1 : a.call(t, e, n)
        },
        merge: function(e, t) {
            for (var n = +t.length, r = 0, i = e.length; r < n; r++)
                e[i++] = t[r];
            return e.length = i,
            e
        },
        grep: function(e, t, n) {
            for (var r = [], i = 0, o = e.length, s = !n; i < o; i++)
                !t(e[i], i) !== s && r.push(e[i]);
            return r
        },
        map: function(e, t, n) {
            var r, i, s = 0, a = [];
            if (C(e))
                for (r = e.length; s < r; s++)
                    null != (i = t(e[s], s, n)) && a.push(i);
            else
                for (s in e)
                    null != (i = t(e[s], s, n)) && a.push(i);
            return o(a)
        },
        guid: 1,
        support: d
    }),
    "function" == typeof Symbol && (w.fn[Symbol.iterator] = n[Symbol.iterator]),
    w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), (function(e, t) {
        u["[object " + t + "]"] = t.toLowerCase()
    }
    ));
    var T = function(e) {
        var t, n, r, i, o, s, a, u, l, c, f, p, d, h, g, v, m, y, x, b = "sizzle" + 1 * new Date, w = e.document, C = 0, T = 0, A = ue(), S = ue(), E = ue(), k = ue(), N = function(e, t) {
            return e === t && (f = !0),
            0
        }, j = {}.hasOwnProperty, D = [], L = D.pop, q = D.push, P = D.push, O = D.slice, H = function(e, t) {
            for (var n = 0, r = e.length; n < r; n++)
                if (e[n] === t)
                    return n;
            return -1
        }, R = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", M = "[\\x20\\t\\r\\n\\f]", B = "(?:\\\\[\\da-fA-F]{1,6}" + M + "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+", I = "\\[" + M + "*(" + B + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + B + "))|)" + M + "*\\]", _ = ":(" + B + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + I + ")*)|.*)\\)|)", W = new RegExp(M + "+","g"), F = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$","g"), $ = new RegExp("^" + M + "*," + M + "*"), z = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"), U = new RegExp(M + "|>"), X = new RegExp(_), V = new RegExp("^" + B + "$"), G = {
            ID: new RegExp("^#(" + B + ")"),
            CLASS: new RegExp("^\\.(" + B + ")"),
            TAG: new RegExp("^(" + B + "|[*])"),
            ATTR: new RegExp("^" + I),
            PSEUDO: new RegExp("^" + _),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)","i"),
            bool: new RegExp("^(?:" + R + ")$","i"),
            needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)","i")
        }, Y = /HTML$/i, Q = /^(?:input|select|textarea|button)$/i, J = /^h\d$/i, K = /^[^{]+\{\s*\[native \w/, Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, ee = /[+~]/, te = new RegExp("\\\\[\\da-fA-F]{1,6}" + M + "?|\\\\([^\\r\\n\\f])","g"), ne = function(e, t) {
            var n = "0x" + e.slice(1) - 65536;
            return t || (n < 0 ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320))
        }, re = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, ie = function(e, t) {
            return t ? "\0" === e ? "�" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
        }, oe = function() {
            p()
        }, se = be((function(e) {
            return !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase()
        }
        ), {
            dir: "parentNode",
            next: "legend"
        });
        try {
            P.apply(D = O.call(w.childNodes), w.childNodes),
            D[w.childNodes.length].nodeType
        } catch (t) {
            P = {
                apply: D.length ? function(e, t) {
                    q.apply(e, O.call(t))
                }
                : function(e, t) {
                    for (var n = e.length, r = 0; e[n++] = t[r++]; )
                        ;
                    e.length = n - 1
                }
            }
        }
        function ae(e, t, r, i) {
            var o, a, l, c, f, h, m, y = t && t.ownerDocument, w = t ? t.nodeType : 9;
            if (r = r || [],
            "string" != typeof e || !e || 1 !== w && 9 !== w && 11 !== w)
                return r;
            if (!i && (p(t),
            t = t || d,
            g)) {
                if (11 !== w && (f = Z.exec(e)))
                    if (o = f[1]) {
                        if (9 === w) {
                            if (!(l = t.getElementById(o)))
                                return r;
                            if (l.id === o)
                                return r.push(l),
                                r
                        } else if (y && (l = y.getElementById(o)) && x(t, l) && l.id === o)
                            return r.push(l),
                            r
                    } else {
                        if (f[2])
                            return P.apply(r, t.getElementsByTagName(e)),
                            r;
                        if ((o = f[3]) && n.getElementsByClassName && t.getElementsByClassName)
                            return P.apply(r, t.getElementsByClassName(o)),
                            r
                    }
                if (n.qsa && !k[e + " "] && (!v || !v.test(e)) && (1 !== w || "object" !== t.nodeName.toLowerCase())) {
                    if (m = e,
                    y = t,
                    1 === w && (U.test(e) || z.test(e))) {
                        for ((y = ee.test(e) && me(t.parentNode) || t) === t && n.scope || ((c = t.getAttribute("id")) ? c = c.replace(re, ie) : t.setAttribute("id", c = b)),
                        a = (h = s(e)).length; a--; )
                            h[a] = (c ? "#" + c : ":scope") + " " + xe(h[a]);
                        m = h.join(",")
                    }
                    try {
                        return P.apply(r, y.querySelectorAll(m)),
                        r
                    } catch (t) {
                        k(e, !0)
                    } finally {
                        c === b && t.removeAttribute("id")
                    }
                }
            }
            return u(e.replace(F, "$1"), t, r, i)
        }
        function ue() {
            var e = [];
            return function t(n, i) {
                return e.push(n + " ") > r.cacheLength && delete t[e.shift()],
                t[n + " "] = i
            }
        }
        function le(e) {
            return e[b] = !0,
            e
        }
        function ce(e) {
            var t = d.createElement("fieldset");
            try {
                return !!e(t)
            } catch (e) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t),
                t = null
            }
        }
        function fe(e, t) {
            for (var n = e.split("|"), i = n.length; i--; )
                r.attrHandle[n[i]] = t
        }
        function pe(e, t) {
            var n = t && e
              , r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
            if (r)
                return r;
            if (n)
                for (; n = n.nextSibling; )
                    if (n === t)
                        return -1;
            return e ? 1 : -1
        }
        function de(e) {
            return function(t) {
                return "input" === t.nodeName.toLowerCase() && t.type === e
            }
        }
        function he(e) {
            return function(t) {
                var n = t.nodeName.toLowerCase();
                return ("input" === n || "button" === n) && t.type === e
            }
        }
        function ge(e) {
            return function(t) {
                return "form"in t ? t.parentNode && !1 === t.disabled ? "label"in t ? "label"in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && se(t) === e : t.disabled === e : "label"in t && t.disabled === e
            }
        }
        function ve(e) {
            return le((function(t) {
                return t = +t,
                le((function(n, r) {
                    for (var i, o = e([], n.length, t), s = o.length; s--; )
                        n[i = o[s]] && (n[i] = !(r[i] = n[i]))
                }
                ))
            }
            ))
        }
        function me(e) {
            return e && void 0 !== e.getElementsByTagName && e
        }
        for (t in n = ae.support = {},
        o = ae.isXML = function(e) {
            var t = e && e.namespaceURI
              , n = e && (e.ownerDocument || e).documentElement;
            return !Y.test(t || n && n.nodeName || "HTML")
        }
        ,
        p = ae.setDocument = function(e) {
            var t, i, s = e ? e.ownerDocument || e : w;
            return s != d && 9 === s.nodeType && s.documentElement && (h = (d = s).documentElement,
            g = !o(d),
            w != d && (i = d.defaultView) && i.top !== i && (i.addEventListener ? i.addEventListener("unload", oe, !1) : i.attachEvent && i.attachEvent("onunload", oe)),
            n.scope = ce((function(e) {
                return h.appendChild(e).appendChild(d.createElement("div")),
                void 0 !== e.querySelectorAll && !e.querySelectorAll(":scope fieldset div").length
            }
            )),
            n.attributes = ce((function(e) {
                return e.className = "i",
                !e.getAttribute("className")
            }
            )),
            n.getElementsByTagName = ce((function(e) {
                return e.appendChild(d.createComment("")),
                !e.getElementsByTagName("*").length
            }
            )),
            n.getElementsByClassName = K.test(d.getElementsByClassName),
            n.getById = ce((function(e) {
                return h.appendChild(e).id = b,
                !d.getElementsByName || !d.getElementsByName(b).length
            }
            )),
            n.getById ? (r.filter.ID = function(e) {
                var t = e.replace(te, ne);
                return function(e) {
                    return e.getAttribute("id") === t
                }
            }
            ,
            r.find.ID = function(e, t) {
                if (void 0 !== t.getElementById && g) {
                    var n = t.getElementById(e);
                    return n ? [n] : []
                }
            }
            ) : (r.filter.ID = function(e) {
                var t = e.replace(te, ne);
                return function(e) {
                    var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                    return n && n.value === t
                }
            }
            ,
            r.find.ID = function(e, t) {
                if (void 0 !== t.getElementById && g) {
                    var n, r, i, o = t.getElementById(e);
                    if (o) {
                        if ((n = o.getAttributeNode("id")) && n.value === e)
                            return [o];
                        for (i = t.getElementsByName(e),
                        r = 0; o = i[r++]; )
                            if ((n = o.getAttributeNode("id")) && n.value === e)
                                return [o]
                    }
                    return []
                }
            }
            ),
            r.find.TAG = n.getElementsByTagName ? function(e, t) {
                return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
            }
            : function(e, t) {
                var n, r = [], i = 0, o = t.getElementsByTagName(e);
                if ("*" === e) {
                    for (; n = o[i++]; )
                        1 === n.nodeType && r.push(n);
                    return r
                }
                return o
            }
            ,
            r.find.CLASS = n.getElementsByClassName && function(e, t) {
                if (void 0 !== t.getElementsByClassName && g)
                    return t.getElementsByClassName(e)
            }
            ,
            m = [],
            v = [],
            (n.qsa = K.test(d.querySelectorAll)) && (ce((function(e) {
                var t;
                h.appendChild(e).innerHTML = "<a id='" + b + "'></a><select id='" + b + "-\r\\' msallowcapture=''><option selected=''></option></select>",
                e.querySelectorAll("[msallowcapture^='']").length && v.push("[*^$]=" + M + "*(?:''|\"\")"),
                e.querySelectorAll("[selected]").length || v.push("\\[" + M + "*(?:value|" + R + ")"),
                e.querySelectorAll("[id~=" + b + "-]").length || v.push("~="),
                (t = d.createElement("input")).setAttribute("name", ""),
                e.appendChild(t),
                e.querySelectorAll("[name='']").length || v.push("\\[" + M + "*name" + M + "*=" + M + "*(?:''|\"\")"),
                e.querySelectorAll(":checked").length || v.push(":checked"),
                e.querySelectorAll("a#" + b + "+*").length || v.push(".#.+[+~]"),
                e.querySelectorAll("\\\f"),
                v.push("[\\r\\n\\f]")
            }
            )),
            ce((function(e) {
                e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                var t = d.createElement("input");
                t.setAttribute("type", "hidden"),
                e.appendChild(t).setAttribute("name", "D"),
                e.querySelectorAll("[name=d]").length && v.push("name" + M + "*[*^$|!~]?="),
                2 !== e.querySelectorAll(":enabled").length && v.push(":enabled", ":disabled"),
                h.appendChild(e).disabled = !0,
                2 !== e.querySelectorAll(":disabled").length && v.push(":enabled", ":disabled"),
                e.querySelectorAll("*,:x"),
                v.push(",.*:")
            }
            ))),
            (n.matchesSelector = K.test(y = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && ce((function(e) {
                n.disconnectedMatch = y.call(e, "*"),
                y.call(e, "[s!='']:x"),
                m.push("!=", _)
            }
            )),
            v = v.length && new RegExp(v.join("|")),
            m = m.length && new RegExp(m.join("|")),
            t = K.test(h.compareDocumentPosition),
            x = t || K.test(h.contains) ? function(e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e
                  , r = t && t.parentNode;
                return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
            }
            : function(e, t) {
                if (t)
                    for (; t = t.parentNode; )
                        if (t === e)
                            return !0;
                return !1
            }
            ,
            N = t ? function(e, t) {
                if (e === t)
                    return f = !0,
                    0;
                var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return r || (1 & (r = (e.ownerDocument || e) == (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === r ? e == d || e.ownerDocument == w && x(w, e) ? -1 : t == d || t.ownerDocument == w && x(w, t) ? 1 : c ? H(c, e) - H(c, t) : 0 : 4 & r ? -1 : 1)
            }
            : function(e, t) {
                if (e === t)
                    return f = !0,
                    0;
                var n, r = 0, i = e.parentNode, o = t.parentNode, s = [e], a = [t];
                if (!i || !o)
                    return e == d ? -1 : t == d ? 1 : i ? -1 : o ? 1 : c ? H(c, e) - H(c, t) : 0;
                if (i === o)
                    return pe(e, t);
                for (n = e; n = n.parentNode; )
                    s.unshift(n);
                for (n = t; n = n.parentNode; )
                    a.unshift(n);
                for (; s[r] === a[r]; )
                    r++;
                return r ? pe(s[r], a[r]) : s[r] == w ? -1 : a[r] == w ? 1 : 0
            }
            ),
            d
        }
        ,
        ae.matches = function(e, t) {
            return ae(e, null, null, t)
        }
        ,
        ae.matchesSelector = function(e, t) {
            if (p(e),
            n.matchesSelector && g && !k[t + " "] && (!m || !m.test(t)) && (!v || !v.test(t)))
                try {
                    var r = y.call(e, t);
                    if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType)
                        return r
                } catch (e) {
                    k(t, !0)
                }
            return 0 < ae(t, d, null, [e]).length
        }
        ,
        ae.contains = function(e, t) {
            return (e.ownerDocument || e) != d && p(e),
            x(e, t)
        }
        ,
        ae.attr = function(e, t) {
            (e.ownerDocument || e) != d && p(e);
            var i = r.attrHandle[t.toLowerCase()]
              , o = i && j.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !g) : void 0;
            return void 0 !== o ? o : n.attributes || !g ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null
        }
        ,
        ae.escape = function(e) {
            return (e + "").replace(re, ie)
        }
        ,
        ae.error = function(e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }
        ,
        ae.uniqueSort = function(e) {
            var t, r = [], i = 0, o = 0;
            if (f = !n.detectDuplicates,
            c = !n.sortStable && e.slice(0),
            e.sort(N),
            f) {
                for (; t = e[o++]; )
                    t === e[o] && (i = r.push(o));
                for (; i--; )
                    e.splice(r[i], 1)
            }
            return c = null,
            e
        }
        ,
        i = ae.getText = function(e) {
            var t, n = "", r = 0, o = e.nodeType;
            if (o) {
                if (1 === o || 9 === o || 11 === o) {
                    if ("string" == typeof e.textContent)
                        return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling)
                        n += i(e)
                } else if (3 === o || 4 === o)
                    return e.nodeValue
            } else
                for (; t = e[r++]; )
                    n += i(t);
            return n
        }
        ,
        (r = ae.selectors = {
            cacheLength: 50,
            createPseudo: le,
            match: G,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(e) {
                    return e[1] = e[1].replace(te, ne),
                    e[3] = (e[3] || e[4] || e[5] || "").replace(te, ne),
                    "~=" === e[2] && (e[3] = " " + e[3] + " "),
                    e.slice(0, 4)
                },
                CHILD: function(e) {
                    return e[1] = e[1].toLowerCase(),
                    "nth" === e[1].slice(0, 3) ? (e[3] || ae.error(e[0]),
                    e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])),
                    e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && ae.error(e[0]),
                    e
                },
                PSEUDO: function(e) {
                    var t, n = !e[6] && e[2];
                    return G.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && X.test(n) && (t = s(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t),
                    e[2] = n.slice(0, t)),
                    e.slice(0, 3))
                }
            },
            filter: {
                TAG: function(e) {
                    var t = e.replace(te, ne).toLowerCase();
                    return "*" === e ? function() {
                        return !0
                    }
                    : function(e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                },
                CLASS: function(e) {
                    var t = A[e + " "];
                    return t || (t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) && A(e, (function(e) {
                        return t.test("string" == typeof e.className && e.className || void 0 !== e.getAttribute && e.getAttribute("class") || "")
                    }
                    ))
                },
                ATTR: function(e, t, n) {
                    return function(r) {
                        var i = ae.attr(r, e);
                        return null == i ? "!=" === t : !t || (i += "",
                        "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && -1 < i.indexOf(n) : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? -1 < (" " + i.replace(W, " ") + " ").indexOf(n) : "|=" === t && (i === n || i.slice(0, n.length + 1) === n + "-"))
                    }
                },
                CHILD: function(e, t, n, r, i) {
                    var o = "nth" !== e.slice(0, 3)
                      , s = "last" !== e.slice(-4)
                      , a = "of-type" === t;
                    return 1 === r && 0 === i ? function(e) {
                        return !!e.parentNode
                    }
                    : function(t, n, u) {
                        var l, c, f, p, d, h, g = o !== s ? "nextSibling" : "previousSibling", v = t.parentNode, m = a && t.nodeName.toLowerCase(), y = !u && !a, x = !1;
                        if (v) {
                            if (o) {
                                for (; g; ) {
                                    for (p = t; p = p[g]; )
                                        if (a ? p.nodeName.toLowerCase() === m : 1 === p.nodeType)
                                            return !1;
                                    h = g = "only" === e && !h && "nextSibling"
                                }
                                return !0
                            }
                            if (h = [s ? v.firstChild : v.lastChild],
                            s && y) {
                                for (x = (d = (l = (c = (f = (p = v)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === C && l[1]) && l[2],
                                p = d && v.childNodes[d]; p = ++d && p && p[g] || (x = d = 0) || h.pop(); )
                                    if (1 === p.nodeType && ++x && p === t) {
                                        c[e] = [C, d, x];
                                        break
                                    }
                            } else if (y && (x = d = (l = (c = (f = (p = t)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === C && l[1]),
                            !1 === x)
                                for (; (p = ++d && p && p[g] || (x = d = 0) || h.pop()) && ((a ? p.nodeName.toLowerCase() !== m : 1 !== p.nodeType) || !++x || (y && ((c = (f = p[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] = [C, x]),
                                p !== t)); )
                                    ;
                            return (x -= i) === r || x % r == 0 && 0 <= x / r
                        }
                    }
                },
                PSEUDO: function(e, t) {
                    var n, i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || ae.error("unsupported pseudo: " + e);
                    return i[b] ? i(t) : 1 < i.length ? (n = [e, e, "", t],
                    r.setFilters.hasOwnProperty(e.toLowerCase()) ? le((function(e, n) {
                        for (var r, o = i(e, t), s = o.length; s--; )
                            e[r = H(e, o[s])] = !(n[r] = o[s])
                    }
                    )) : function(e) {
                        return i(e, 0, n)
                    }
                    ) : i
                }
            },
            pseudos: {
                not: le((function(e) {
                    var t = []
                      , n = []
                      , r = a(e.replace(F, "$1"));
                    return r[b] ? le((function(e, t, n, i) {
                        for (var o, s = r(e, null, i, []), a = e.length; a--; )
                            (o = s[a]) && (e[a] = !(t[a] = o))
                    }
                    )) : function(e, i, o) {
                        return t[0] = e,
                        r(t, null, o, n),
                        t[0] = null,
                        !n.pop()
                    }
                }
                )),
                has: le((function(e) {
                    return function(t) {
                        return 0 < ae(e, t).length
                    }
                }
                )),
                contains: le((function(e) {
                    return e = e.replace(te, ne),
                    function(t) {
                        return -1 < (t.textContent || i(t)).indexOf(e)
                    }
                }
                )),
                lang: le((function(e) {
                    return V.test(e || "") || ae.error("unsupported lang: " + e),
                    e = e.replace(te, ne).toLowerCase(),
                    function(t) {
                        var n;
                        do {
                            if (n = g ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))
                                return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                        } while ((t = t.parentNode) && 1 === t.nodeType);
                        return !1
                    }
                }
                )),
                target: function(t) {
                    var n = e.location && e.location.hash;
                    return n && n.slice(1) === t.id
                },
                root: function(e) {
                    return e === h
                },
                focus: function(e) {
                    return e === d.activeElement && (!d.hasFocus || d.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                },
                enabled: ge(!1),
                disabled: ge(!0),
                checked: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                },
                selected: function(e) {
                    return e.parentNode && e.parentNode.selectedIndex,
                    !0 === e.selected
                },
                empty: function(e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                        if (e.nodeType < 6)
                            return !1;
                    return !0
                },
                parent: function(e) {
                    return !r.pseudos.empty(e)
                },
                header: function(e) {
                    return J.test(e.nodeName)
                },
                input: function(e) {
                    return Q.test(e.nodeName)
                },
                button: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                },
                text: function(e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                },
                first: ve((function() {
                    return [0]
                }
                )),
                last: ve((function(e, t) {
                    return [t - 1]
                }
                )),
                eq: ve((function(e, t, n) {
                    return [n < 0 ? n + t : n]
                }
                )),
                even: ve((function(e, t) {
                    for (var n = 0; n < t; n += 2)
                        e.push(n);
                    return e
                }
                )),
                odd: ve((function(e, t) {
                    for (var n = 1; n < t; n += 2)
                        e.push(n);
                    return e
                }
                )),
                lt: ve((function(e, t, n) {
                    for (var r = n < 0 ? n + t : t < n ? t : n; 0 <= --r; )
                        e.push(r);
                    return e
                }
                )),
                gt: ve((function(e, t, n) {
                    for (var r = n < 0 ? n + t : n; ++r < t; )
                        e.push(r);
                    return e
                }
                ))
            }
        }).pseudos.nth = r.pseudos.eq,
        {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        })
            r.pseudos[t] = de(t);
        for (t in {
            submit: !0,
            reset: !0
        })
            r.pseudos[t] = he(t);
        function ye() {}
        function xe(e) {
            for (var t = 0, n = e.length, r = ""; t < n; t++)
                r += e[t].value;
            return r
        }
        function be(e, t, n) {
            var r = t.dir
              , i = t.next
              , o = i || r
              , s = n && "parentNode" === o
              , a = T++;
            return t.first ? function(t, n, i) {
                for (; t = t[r]; )
                    if (1 === t.nodeType || s)
                        return e(t, n, i);
                return !1
            }
            : function(t, n, u) {
                var l, c, f, p = [C, a];
                if (u) {
                    for (; t = t[r]; )
                        if ((1 === t.nodeType || s) && e(t, n, u))
                            return !0
                } else
                    for (; t = t[r]; )
                        if (1 === t.nodeType || s)
                            if (c = (f = t[b] || (t[b] = {}))[t.uniqueID] || (f[t.uniqueID] = {}),
                            i && i === t.nodeName.toLowerCase())
                                t = t[r] || t;
                            else {
                                if ((l = c[o]) && l[0] === C && l[1] === a)
                                    return p[2] = l[2];
                                if ((c[o] = p)[2] = e(t, n, u))
                                    return !0
                            }
                return !1
            }
        }
        function we(e) {
            return 1 < e.length ? function(t, n, r) {
                for (var i = e.length; i--; )
                    if (!e[i](t, n, r))
                        return !1;
                return !0
            }
            : e[0]
        }
        function Ce(e, t, n, r, i) {
            for (var o, s = [], a = 0, u = e.length, l = null != t; a < u; a++)
                (o = e[a]) && (n && !n(o, r, i) || (s.push(o),
                l && t.push(a)));
            return s
        }
        function Te(e, t, n, r, i, o) {
            return r && !r[b] && (r = Te(r)),
            i && !i[b] && (i = Te(i, o)),
            le((function(o, s, a, u) {
                var l, c, f, p = [], d = [], h = s.length, g = o || function(e, t, n) {
                    for (var r = 0, i = t.length; r < i; r++)
                        ae(e, t[r], n);
                    return n
                }(t || "*", a.nodeType ? [a] : a, []), v = !e || !o && t ? g : Ce(g, p, e, a, u), m = n ? i || (o ? e : h || r) ? [] : s : v;
                if (n && n(v, m, a, u),
                r)
                    for (l = Ce(m, d),
                    r(l, [], a, u),
                    c = l.length; c--; )
                        (f = l[c]) && (m[d[c]] = !(v[d[c]] = f));
                if (o) {
                    if (i || e) {
                        if (i) {
                            for (l = [],
                            c = m.length; c--; )
                                (f = m[c]) && l.push(v[c] = f);
                            i(null, m = [], l, u)
                        }
                        for (c = m.length; c--; )
                            (f = m[c]) && -1 < (l = i ? H(o, f) : p[c]) && (o[l] = !(s[l] = f))
                    }
                } else
                    m = Ce(m === s ? m.splice(h, m.length) : m),
                    i ? i(null, s, m, u) : P.apply(s, m)
            }
            ))
        }
        function Ae(e) {
            for (var t, n, i, o = e.length, s = r.relative[e[0].type], a = s || r.relative[" "], u = s ? 1 : 0, c = be((function(e) {
                return e === t
            }
            ), a, !0), f = be((function(e) {
                return -1 < H(t, e)
            }
            ), a, !0), p = [function(e, n, r) {
                var i = !s && (r || n !== l) || ((t = n).nodeType ? c(e, n, r) : f(e, n, r));
                return t = null,
                i
            }
            ]; u < o; u++)
                if (n = r.relative[e[u].type])
                    p = [be(we(p), n)];
                else {
                    if ((n = r.filter[e[u].type].apply(null, e[u].matches))[b]) {
                        for (i = ++u; i < o && !r.relative[e[i].type]; i++)
                            ;
                        return Te(1 < u && we(p), 1 < u && xe(e.slice(0, u - 1).concat({
                            value: " " === e[u - 2].type ? "*" : ""
                        })).replace(F, "$1"), n, u < i && Ae(e.slice(u, i)), i < o && Ae(e = e.slice(i)), i < o && xe(e))
                    }
                    p.push(n)
                }
            return we(p)
        }
        return ye.prototype = r.filters = r.pseudos,
        r.setFilters = new ye,
        s = ae.tokenize = function(e, t) {
            var n, i, o, s, a, u, l, c = S[e + " "];
            if (c)
                return t ? 0 : c.slice(0);
            for (a = e,
            u = [],
            l = r.preFilter; a; ) {
                for (s in n && !(i = $.exec(a)) || (i && (a = a.slice(i[0].length) || a),
                u.push(o = [])),
                n = !1,
                (i = z.exec(a)) && (n = i.shift(),
                o.push({
                    value: n,
                    type: i[0].replace(F, " ")
                }),
                a = a.slice(n.length)),
                r.filter)
                    !(i = G[s].exec(a)) || l[s] && !(i = l[s](i)) || (n = i.shift(),
                    o.push({
                        value: n,
                        type: s,
                        matches: i
                    }),
                    a = a.slice(n.length));
                if (!n)
                    break
            }
            return t ? a.length : a ? ae.error(e) : S(e, u).slice(0)
        }
        ,
        a = ae.compile = function(e, t) {
            var n, i, o, a, u, c, f = [], h = [], v = E[e + " "];
            if (!v) {
                for (t || (t = s(e)),
                n = t.length; n--; )
                    (v = Ae(t[n]))[b] ? f.push(v) : h.push(v);
                (v = E(e, (i = h,
                a = 0 < (o = f).length,
                u = 0 < i.length,
                c = function(e, t, n, s, c) {
                    var f, h, v, m = 0, y = "0", x = e && [], b = [], w = l, T = e || u && r.find.TAG("*", c), A = C += null == w ? 1 : Math.random() || .1, S = T.length;
                    for (c && (l = t == d || t || c); y !== S && null != (f = T[y]); y++) {
                        if (u && f) {
                            for (h = 0,
                            t || f.ownerDocument == d || (p(f),
                            n = !g); v = i[h++]; )
                                if (v(f, t || d, n)) {
                                    s.push(f);
                                    break
                                }
                            c && (C = A)
                        }
                        a && ((f = !v && f) && m--,
                        e && x.push(f))
                    }
                    if (m += y,
                    a && y !== m) {
                        for (h = 0; v = o[h++]; )
                            v(x, b, t, n);
                        if (e) {
                            if (0 < m)
                                for (; y--; )
                                    x[y] || b[y] || (b[y] = L.call(s));
                            b = Ce(b)
                        }
                        P.apply(s, b),
                        c && !e && 0 < b.length && 1 < m + o.length && ae.uniqueSort(s)
                    }
                    return c && (C = A,
                    l = w),
                    x
                }
                ,
                a ? le(c) : c))).selector = e
            }
            return v
        }
        ,
        u = ae.select = function(e, t, n, i) {
            var o, u, l, c, f, p = "function" == typeof e && e, d = !i && s(e = p.selector || e);
            if (n = n || [],
            1 === d.length) {
                if (2 < (u = d[0] = d[0].slice(0)).length && "ID" === (l = u[0]).type && 9 === t.nodeType && g && r.relative[u[1].type]) {
                    if (!(t = (r.find.ID(l.matches[0].replace(te, ne), t) || [])[0]))
                        return n;
                    p && (t = t.parentNode),
                    e = e.slice(u.shift().value.length)
                }
                for (o = G.needsContext.test(e) ? 0 : u.length; o-- && (l = u[o],
                !r.relative[c = l.type]); )
                    if ((f = r.find[c]) && (i = f(l.matches[0].replace(te, ne), ee.test(u[0].type) && me(t.parentNode) || t))) {
                        if (u.splice(o, 1),
                        !(e = i.length && xe(u)))
                            return P.apply(n, i),
                            n;
                        break
                    }
            }
            return (p || a(e, d))(i, t, !g, n, !t || ee.test(e) && me(t.parentNode) || t),
            n
        }
        ,
        n.sortStable = b.split("").sort(N).join("") === b,
        n.detectDuplicates = !!f,
        p(),
        n.sortDetached = ce((function(e) {
            return 1 & e.compareDocumentPosition(d.createElement("fieldset"))
        }
        )),
        ce((function(e) {
            return e.innerHTML = "<a href='#'></a>",
            "#" === e.firstChild.getAttribute("href")
        }
        )) || fe("type|href|height|width", (function(e, t, n) {
            if (!n)
                return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }
        )),
        n.attributes && ce((function(e) {
            return e.innerHTML = "<input/>",
            e.firstChild.setAttribute("value", ""),
            "" === e.firstChild.getAttribute("value")
        }
        )) || fe("value", (function(e, t, n) {
            if (!n && "input" === e.nodeName.toLowerCase())
                return e.defaultValue
        }
        )),
        ce((function(e) {
            return null == e.getAttribute("disabled")
        }
        )) || fe(R, (function(e, t, n) {
            var r;
            if (!n)
                return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
        }
        )),
        ae
    }(e);
    w.find = T,
    w.expr = T.selectors,
    w.expr[":"] = w.expr.pseudos,
    w.uniqueSort = w.unique = T.uniqueSort,
    w.text = T.getText,
    w.isXMLDoc = T.isXML,
    w.contains = T.contains,
    w.escapeSelector = T.escape;
    var A = function(e, t, n) {
        for (var r = [], i = void 0 !== n; (e = e[t]) && 9 !== e.nodeType; )
            if (1 === e.nodeType) {
                if (i && w(e).is(n))
                    break;
                r.push(e)
            }
        return r
    }
      , S = function(e, t) {
        for (var n = []; e; e = e.nextSibling)
            1 === e.nodeType && e !== t && n.push(e);
        return n
    }
      , E = w.expr.match.needsContext;
    function k(e, t) {
        return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
    }
    var N = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
    function j(e, t, n) {
        return h(t) ? w.grep(e, (function(e, r) {
            return !!t.call(e, r, e) !== n
        }
        )) : t.nodeType ? w.grep(e, (function(e) {
            return e === t !== n
        }
        )) : "string" != typeof t ? w.grep(e, (function(e) {
            return -1 < a.call(t, e) !== n
        }
        )) : w.filter(t, e, n)
    }
    w.filter = function(e, t, n) {
        var r = t[0];
        return n && (e = ":not(" + e + ")"),
        1 === t.length && 1 === r.nodeType ? w.find.matchesSelector(r, e) ? [r] : [] : w.find.matches(e, w.grep(t, (function(e) {
            return 1 === e.nodeType
        }
        )))
    }
    ,
    w.fn.extend({
        find: function(e) {
            var t, n, r = this.length, i = this;
            if ("string" != typeof e)
                return this.pushStack(w(e).filter((function() {
                    for (t = 0; t < r; t++)
                        if (w.contains(i[t], this))
                            return !0
                }
                )));
            for (n = this.pushStack([]),
            t = 0; t < r; t++)
                w.find(e, i[t], n);
            return 1 < r ? w.uniqueSort(n) : n
        },
        filter: function(e) {
            return this.pushStack(j(this, e || [], !1))
        },
        not: function(e) {
            return this.pushStack(j(this, e || [], !0))
        },
        is: function(e) {
            return !!j(this, "string" == typeof e && E.test(e) ? w(e) : e || [], !1).length
        }
    });
    var D, L = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
    (w.fn.init = function(e, t, n) {
        var r, i;
        if (!e)
            return this;
        if (n = n || D,
        "string" == typeof e) {
            if (!(r = "<" === e[0] && ">" === e[e.length - 1] && 3 <= e.length ? [null, e, null] : L.exec(e)) || !r[1] && t)
                return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
            if (r[1]) {
                if (t = t instanceof w ? t[0] : t,
                w.merge(this, w.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : v, !0)),
                N.test(r[1]) && w.isPlainObject(t))
                    for (r in t)
                        h(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                return this
            }
            return (i = v.getElementById(r[2])) && (this[0] = i,
            this.length = 1),
            this
        }
        return e.nodeType ? (this[0] = e,
        this.length = 1,
        this) : h(e) ? void 0 !== n.ready ? n.ready(e) : e(w) : w.makeArray(e, this)
    }
    ).prototype = w.fn,
    D = w(v);
    var q = /^(?:parents|prev(?:Until|All))/
      , P = {
        children: !0,
        contents: !0,
        next: !0,
        prev: !0
    };
    function O(e, t) {
        for (; (e = e[t]) && 1 !== e.nodeType; )
            ;
        return e
    }
    w.fn.extend({
        has: function(e) {
            var t = w(e, this)
              , n = t.length;
            return this.filter((function() {
                for (var e = 0; e < n; e++)
                    if (w.contains(this, t[e]))
                        return !0
            }
            ))
        },
        closest: function(e, t) {
            var n, r = 0, i = this.length, o = [], s = "string" != typeof e && w(e);
            if (!E.test(e))
                for (; r < i; r++)
                    for (n = this[r]; n && n !== t; n = n.parentNode)
                        if (n.nodeType < 11 && (s ? -1 < s.index(n) : 1 === n.nodeType && w.find.matchesSelector(n, e))) {
                            o.push(n);
                            break
                        }
            return this.pushStack(1 < o.length ? w.uniqueSort(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? a.call(w(e), this[0]) : a.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            return this.pushStack(w.uniqueSort(w.merge(this.get(), w(e, t))))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }),
    w.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return A(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return A(e, "parentNode", n)
        },
        next: function(e) {
            return O(e, "nextSibling")
        },
        prev: function(e) {
            return O(e, "previousSibling")
        },
        nextAll: function(e) {
            return A(e, "nextSibling")
        },
        prevAll: function(e) {
            return A(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return A(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return A(e, "previousSibling", n)
        },
        siblings: function(e) {
            return S((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return S(e.firstChild)
        },
        contents: function(e) {
            return null != e.contentDocument && r(e.contentDocument) ? e.contentDocument : (k(e, "template") && (e = e.content || e),
            w.merge([], e.childNodes))
        }
    }, (function(e, t) {
        w.fn[e] = function(n, r) {
            var i = w.map(this, t, n);
            return "Until" !== e.slice(-5) && (r = n),
            r && "string" == typeof r && (i = w.filter(r, i)),
            1 < this.length && (P[e] || w.uniqueSort(i),
            q.test(e) && i.reverse()),
            this.pushStack(i)
        }
    }
    ));
    var H = /[^\x20\t\r\n\f]+/g;
    function R(e) {
        return e
    }
    function M(e) {
        throw e
    }
    function B(e, t, n, r) {
        var i;
        try {
            e && h(i = e.promise) ? i.call(e).done(t).fail(n) : e && h(i = e.then) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r))
        } catch (e) {
            n.apply(void 0, [e])
        }
    }
    w.Callbacks = function(e) {
        var t, n;
        e = "string" == typeof e ? (t = e,
        n = {},
        w.each(t.match(H) || [], (function(e, t) {
            n[t] = !0
        }
        )),
        n) : w.extend({}, e);
        var r, i, o, s, a = [], u = [], l = -1, c = function() {
            for (s = s || e.once,
            o = r = !0; u.length; l = -1)
                for (i = u.shift(); ++l < a.length; )
                    !1 === a[l].apply(i[0], i[1]) && e.stopOnFalse && (l = a.length,
                    i = !1);
            e.memory || (i = !1),
            r = !1,
            s && (a = i ? [] : "")
        }, f = {
            add: function() {
                return a && (i && !r && (l = a.length - 1,
                u.push(i)),
                function t(n) {
                    w.each(n, (function(n, r) {
                        h(r) ? e.unique && f.has(r) || a.push(r) : r && r.length && "string" !== x(r) && t(r)
                    }
                    ))
                }(arguments),
                i && !r && c()),
                this
            },
            remove: function() {
                return w.each(arguments, (function(e, t) {
                    for (var n; -1 < (n = w.inArray(t, a, n)); )
                        a.splice(n, 1),
                        n <= l && l--
                }
                )),
                this
            },
            has: function(e) {
                return e ? -1 < w.inArray(e, a) : 0 < a.length
            },
            empty: function() {
                return a && (a = []),
                this
            },
            disable: function() {
                return s = u = [],
                a = i = "",
                this
            },
            disabled: function() {
                return !a
            },
            lock: function() {
                return s = u = [],
                i || r || (a = i = ""),
                this
            },
            locked: function() {
                return !!s
            },
            fireWith: function(e, t) {
                return s || (t = [e, (t = t || []).slice ? t.slice() : t],
                u.push(t),
                r || c()),
                this
            },
            fire: function() {
                return f.fireWith(this, arguments),
                this
            },
            fired: function() {
                return !!o
            }
        };
        return f
    }
    ,
    w.extend({
        Deferred: function(t) {
            var n = [["notify", "progress", w.Callbacks("memory"), w.Callbacks("memory"), 2], ["resolve", "done", w.Callbacks("once memory"), w.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", w.Callbacks("once memory"), w.Callbacks("once memory"), 1, "rejected"]]
              , r = "pending"
              , i = {
                state: function() {
                    return r
                },
                always: function() {
                    return o.done(arguments).fail(arguments),
                    this
                },
                catch: function(e) {
                    return i.then(null, e)
                },
                pipe: function() {
                    var e = arguments;
                    return w.Deferred((function(t) {
                        w.each(n, (function(n, r) {
                            var i = h(e[r[4]]) && e[r[4]];
                            o[r[1]]((function() {
                                var e = i && i.apply(this, arguments);
                                e && h(e.promise) ? e.promise().progress(t.notify).done(t.resolve).fail(t.reject) : t[r[0] + "With"](this, i ? [e] : arguments)
                            }
                            ))
                        }
                        )),
                        e = null
                    }
                    )).promise()
                },
                then: function(t, r, i) {
                    var o = 0;
                    function s(t, n, r, i) {
                        return function() {
                            var a = this
                              , u = arguments
                              , l = function() {
                                var e, l;
                                if (!(t < o)) {
                                    if ((e = r.apply(a, u)) === n.promise())
                                        throw new TypeError("Thenable self-resolution");
                                    l = e && ("object" == typeof e || "function" == typeof e) && e.then,
                                    h(l) ? i ? l.call(e, s(o, n, R, i), s(o, n, M, i)) : (o++,
                                    l.call(e, s(o, n, R, i), s(o, n, M, i), s(o, n, R, n.notifyWith))) : (r !== R && (a = void 0,
                                    u = [e]),
                                    (i || n.resolveWith)(a, u))
                                }
                            }
                              , c = i ? l : function() {
                                try {
                                    l()
                                } catch (e) {
                                    w.Deferred.exceptionHook && w.Deferred.exceptionHook(e, c.stackTrace),
                                    o <= t + 1 && (r !== M && (a = void 0,
                                    u = [e]),
                                    n.rejectWith(a, u))
                                }
                            }
                            ;
                            t ? c() : (w.Deferred.getStackHook && (c.stackTrace = w.Deferred.getStackHook()),
                            e.setTimeout(c))
                        }
                    }
                    return w.Deferred((function(e) {
                        n[0][3].add(s(0, e, h(i) ? i : R, e.notifyWith)),
                        n[1][3].add(s(0, e, h(t) ? t : R)),
                        n[2][3].add(s(0, e, h(r) ? r : M))
                    }
                    )).promise()
                },
                promise: function(e) {
                    return null != e ? w.extend(e, i) : i
                }
            }
              , o = {};
            return w.each(n, (function(e, t) {
                var s = t[2]
                  , a = t[5];
                i[t[1]] = s.add,
                a && s.add((function() {
                    r = a
                }
                ), n[3 - e][2].disable, n[3 - e][3].disable, n[0][2].lock, n[0][3].lock),
                s.add(t[3].fire),
                o[t[0]] = function() {
                    return o[t[0] + "With"](this === o ? void 0 : this, arguments),
                    this
                }
                ,
                o[t[0] + "With"] = s.fireWith
            }
            )),
            i.promise(o),
            t && t.call(o, o),
            o
        },
        when: function(e) {
            var t = arguments.length
              , n = t
              , r = Array(n)
              , o = i.call(arguments)
              , s = w.Deferred()
              , a = function(e) {
                return function(n) {
                    r[e] = this,
                    o[e] = 1 < arguments.length ? i.call(arguments) : n,
                    --t || s.resolveWith(r, o)
                }
            };
            if (t <= 1 && (B(e, s.done(a(n)).resolve, s.reject, !t),
            "pending" === s.state() || h(o[n] && o[n].then)))
                return s.then();
            for (; n--; )
                B(o[n], a(n), s.reject);
            return s.promise()
        }
    });
    var I = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
    w.Deferred.exceptionHook = function(t, n) {
        e.console && e.console.warn && t && I.test(t.name) && e.console.warn("jQuery.Deferred exception: " + t.message, t.stack, n)
    }
    ,
    w.readyException = function(t) {
        e.setTimeout((function() {
            throw t
        }
        ))
    }
    ;
    var _ = w.Deferred();
    function W() {
        v.removeEventListener("DOMContentLoaded", W),
        e.removeEventListener("load", W),
        w.ready()
    }
    w.fn.ready = function(e) {
        return _.then(e).catch((function(e) {
            w.readyException(e)
        }
        )),
        this
    }
    ,
    w.extend({
        isReady: !1,
        readyWait: 1,
        ready: function(e) {
            (!0 === e ? --w.readyWait : w.isReady) || (w.isReady = !0) !== e && 0 < --w.readyWait || _.resolveWith(v, [w])
        }
    }),
    w.ready.then = _.then,
    "complete" === v.readyState || "loading" !== v.readyState && !v.documentElement.doScroll ? e.setTimeout(w.ready) : (v.addEventListener("DOMContentLoaded", W),
    e.addEventListener("load", W));
    var F = function(e, t, n, r, i, o, s) {
        var a = 0
          , u = e.length
          , l = null == n;
        if ("object" === x(n))
            for (a in i = !0,
            n)
                F(e, t, a, n[a], !0, o, s);
        else if (void 0 !== r && (i = !0,
        h(r) || (s = !0),
        l && (s ? (t.call(e, r),
        t = null) : (l = t,
        t = function(e, t, n) {
            return l.call(w(e), n)
        }
        )),
        t))
            for (; a < u; a++)
                t(e[a], n, s ? r : r.call(e[a], a, t(e[a], n)));
        return i ? e : l ? t.call(e) : u ? t(e[0], n) : o
    }
      , $ = /^-ms-/
      , z = /-([a-z])/g;
    function U(e, t) {
        return t.toUpperCase()
    }
    function X(e) {
        return e.replace($, "ms-").replace(z, U)
    }
    var V = function(e) {
        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
    };
    function G() {
        this.expando = w.expando + G.uid++
    }
    G.uid = 1,
    G.prototype = {
        cache: function(e) {
            var t = e[this.expando];
            return t || (t = {},
            V(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                value: t,
                configurable: !0
            }))),
            t
        },
        set: function(e, t, n) {
            var r, i = this.cache(e);
            if ("string" == typeof t)
                i[X(t)] = n;
            else
                for (r in t)
                    i[X(r)] = t[r];
            return i
        },
        get: function(e, t) {
            return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][X(t)]
        },
        access: function(e, t, n) {
            return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n),
            void 0 !== n ? n : t)
        },
        remove: function(e, t) {
            var n, r = e[this.expando];
            if (void 0 !== r) {
                if (void 0 !== t) {
                    n = (t = Array.isArray(t) ? t.map(X) : (t = X(t))in r ? [t] : t.match(H) || []).length;
                    for (; n--; )
                        delete r[t[n]]
                }
                (void 0 === t || w.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
            }
        },
        hasData: function(e) {
            var t = e[this.expando];
            return void 0 !== t && !w.isEmptyObject(t)
        }
    };
    var Y = new G
      , Q = new G
      , J = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/
      , K = /[A-Z]/g;
    function Z(e, t, n) {
        var r, i;
        if (void 0 === n && 1 === e.nodeType)
            if (r = "data-" + t.replace(K, "-$&").toLowerCase(),
            "string" == typeof (n = e.getAttribute(r))) {
                try {
                    n = "true" === (i = n) || "false" !== i && ("null" === i ? null : i === +i + "" ? +i : J.test(i) ? JSON.parse(i) : i)
                } catch (e) {}
                Q.set(e, t, n)
            } else
                n = void 0;
        return n
    }
    w.extend({
        hasData: function(e) {
            return Q.hasData(e) || Y.hasData(e)
        },
        data: function(e, t, n) {
            return Q.access(e, t, n)
        },
        removeData: function(e, t) {
            Q.remove(e, t)
        },
        _data: function(e, t, n) {
            return Y.access(e, t, n)
        },
        _removeData: function(e, t) {
            Y.remove(e, t)
        }
    }),
    w.fn.extend({
        data: function(e, t) {
            var n, r, i, o = this[0], s = o && o.attributes;
            if (void 0 === e) {
                if (this.length && (i = Q.get(o),
                1 === o.nodeType && !Y.get(o, "hasDataAttrs"))) {
                    for (n = s.length; n--; )
                        s[n] && 0 === (r = s[n].name).indexOf("data-") && (r = X(r.slice(5)),
                        Z(o, r, i[r]));
                    Y.set(o, "hasDataAttrs", !0)
                }
                return i
            }
            return "object" == typeof e ? this.each((function() {
                Q.set(this, e)
            }
            )) : F(this, (function(t) {
                var n;
                if (o && void 0 === t)
                    return void 0 !== (n = Q.get(o, e)) || void 0 !== (n = Z(o, e)) ? n : void 0;
                this.each((function() {
                    Q.set(this, e, t)
                }
                ))
            }
            ), null, t, 1 < arguments.length, null, !0)
        },
        removeData: function(e) {
            return this.each((function() {
                Q.remove(this, e)
            }
            ))
        }
    }),
    w.extend({
        queue: function(e, t, n) {
            var r;
            if (e)
                return t = (t || "fx") + "queue",
                r = Y.get(e, t),
                n && (!r || Array.isArray(n) ? r = Y.access(e, t, w.makeArray(n)) : r.push(n)),
                r || []
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = w.queue(e, t)
              , r = n.length
              , i = n.shift()
              , o = w._queueHooks(e, t);
            "inprogress" === i && (i = n.shift(),
            r--),
            i && ("fx" === t && n.unshift("inprogress"),
            delete o.stop,
            i.call(e, (function() {
                w.dequeue(e, t)
            }
            ), o)),
            !r && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return Y.get(e, n) || Y.access(e, n, {
                empty: w.Callbacks("once memory").add((function() {
                    Y.remove(e, [t + "queue", n])
                }
                ))
            })
        }
    }),
    w.fn.extend({
        queue: function(e, t) {
            var n = 2;
            return "string" != typeof e && (t = e,
            e = "fx",
            n--),
            arguments.length < n ? w.queue(this[0], e) : void 0 === t ? this : this.each((function() {
                var n = w.queue(this, e, t);
                w._queueHooks(this, e),
                "fx" === e && "inprogress" !== n[0] && w.dequeue(this, e)
            }
            ))
        },
        dequeue: function(e) {
            return this.each((function() {
                w.dequeue(this, e)
            }
            ))
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, t) {
            var n, r = 1, i = w.Deferred(), o = this, s = this.length, a = function() {
                --r || i.resolveWith(o, [o])
            };
            for ("string" != typeof e && (t = e,
            e = void 0),
            e = e || "fx"; s--; )
                (n = Y.get(o[s], e + "queueHooks")) && n.empty && (r++,
                n.empty.add(a));
            return a(),
            i.promise(t)
        }
    });
    var ee = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source
      , te = new RegExp("^(?:([+-])=|)(" + ee + ")([a-z%]*)$","i")
      , ne = ["Top", "Right", "Bottom", "Left"]
      , re = v.documentElement
      , ie = function(e) {
        return w.contains(e.ownerDocument, e)
    }
      , oe = {
        composed: !0
    };
    re.getRootNode && (ie = function(e) {
        return w.contains(e.ownerDocument, e) || e.getRootNode(oe) === e.ownerDocument
    }
    );
    var se = function(e, t) {
        return "none" === (e = t || e).style.display || "" === e.style.display && ie(e) && "none" === w.css(e, "display")
    };
    function ae(e, t, n, r) {
        var i, o, s = 20, a = r ? function() {
            return r.cur()
        }
        : function() {
            return w.css(e, t, "")
        }
        , u = a(), l = n && n[3] || (w.cssNumber[t] ? "" : "px"), c = e.nodeType && (w.cssNumber[t] || "px" !== l && +u) && te.exec(w.css(e, t));
        if (c && c[3] !== l) {
            for (u /= 2,
            l = l || c[3],
            c = +u || 1; s--; )
                w.style(e, t, c + l),
                (1 - o) * (1 - (o = a() / u || .5)) <= 0 && (s = 0),
                c /= o;
            c *= 2,
            w.style(e, t, c + l),
            n = n || []
        }
        return n && (c = +c || +u || 0,
        i = n[1] ? c + (n[1] + 1) * n[2] : +n[2],
        r && (r.unit = l,
        r.start = c,
        r.end = i)),
        i
    }
    var ue = {};
    function le(e, t) {
        for (var n, r, i, o, s, a, u, l = [], c = 0, f = e.length; c < f; c++)
            (r = e[c]).style && (n = r.style.display,
            t ? ("none" === n && (l[c] = Y.get(r, "display") || null,
            l[c] || (r.style.display = "")),
            "" === r.style.display && se(r) && (l[c] = (u = s = o = void 0,
            s = (i = r).ownerDocument,
            a = i.nodeName,
            (u = ue[a]) || (o = s.body.appendChild(s.createElement(a)),
            u = w.css(o, "display"),
            o.parentNode.removeChild(o),
            "none" === u && (u = "block"),
            ue[a] = u)))) : "none" !== n && (l[c] = "none",
            Y.set(r, "display", n)));
        for (c = 0; c < f; c++)
            null != l[c] && (e[c].style.display = l[c]);
        return e
    }
    w.fn.extend({
        show: function() {
            return le(this, !0)
        },
        hide: function() {
            return le(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each((function() {
                se(this) ? w(this).show() : w(this).hide()
            }
            ))
        }
    });
    var ce, fe, pe = /^(?:checkbox|radio)$/i, de = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i, he = /^$|^module$|\/(?:java|ecma)script/i;
    ce = v.createDocumentFragment().appendChild(v.createElement("div")),
    (fe = v.createElement("input")).setAttribute("type", "radio"),
    fe.setAttribute("checked", "checked"),
    fe.setAttribute("name", "t"),
    ce.appendChild(fe),
    d.checkClone = ce.cloneNode(!0).cloneNode(!0).lastChild.checked,
    ce.innerHTML = "<textarea>x</textarea>",
    d.noCloneChecked = !!ce.cloneNode(!0).lastChild.defaultValue,
    ce.innerHTML = "<option></option>",
    d.option = !!ce.lastChild;
    var ge = {
        thead: [1, "<table>", "</table>"],
        col: [2, "<table><colgroup>", "</colgroup></table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: [0, "", ""]
    };
    function ve(e, t) {
        var n;
        return n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : [],
        void 0 === t || t && k(e, t) ? w.merge([e], n) : n
    }
    function me(e, t) {
        for (var n = 0, r = e.length; n < r; n++)
            Y.set(e[n], "globalEval", !t || Y.get(t[n], "globalEval"))
    }
    ge.tbody = ge.tfoot = ge.colgroup = ge.caption = ge.thead,
    ge.th = ge.td,
    d.option || (ge.optgroup = ge.option = [1, "<select multiple='multiple'>", "</select>"]);
    var ye = /<|&#?\w+;/;
    function xe(e, t, n, r, i) {
        for (var o, s, a, u, l, c, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++)
            if ((o = e[d]) || 0 === o)
                if ("object" === x(o))
                    w.merge(p, o.nodeType ? [o] : o);
                else if (ye.test(o)) {
                    for (s = s || f.appendChild(t.createElement("div")),
                    a = (de.exec(o) || ["", ""])[1].toLowerCase(),
                    u = ge[a] || ge._default,
                    s.innerHTML = u[1] + w.htmlPrefilter(o) + u[2],
                    c = u[0]; c--; )
                        s = s.lastChild;
                    w.merge(p, s.childNodes),
                    (s = f.firstChild).textContent = ""
                } else
                    p.push(t.createTextNode(o));
        for (f.textContent = "",
        d = 0; o = p[d++]; )
            if (r && -1 < w.inArray(o, r))
                i && i.push(o);
            else if (l = ie(o),
            s = ve(f.appendChild(o), "script"),
            l && me(s),
            n)
                for (c = 0; o = s[c++]; )
                    he.test(o.type || "") && n.push(o);
        return f
    }
    var be = /^([^.]*)(?:\.(.+)|)/;
    function we() {
        return !0
    }
    function Ce() {
        return !1
    }
    function Te(e, t) {
        return e === function() {
            try {
                return v.activeElement
            } catch (e) {}
        }() == ("focus" === t)
    }
    function Ae(e, t, n, r, i, o) {
        var s, a;
        if ("object" == typeof t) {
            for (a in "string" != typeof n && (r = r || n,
            n = void 0),
            t)
                Ae(e, a, n, r, t[a], o);
            return e
        }
        if (null == r && null == i ? (i = n,
        r = n = void 0) : null == i && ("string" == typeof n ? (i = r,
        r = void 0) : (i = r,
        r = n,
        n = void 0)),
        !1 === i)
            i = Ce;
        else if (!i)
            return e;
        return 1 === o && (s = i,
        (i = function(e) {
            return w().off(e),
            s.apply(this, arguments)
        }
        ).guid = s.guid || (s.guid = w.guid++)),
        e.each((function() {
            w.event.add(this, t, i, r, n)
        }
        ))
    }
    function Se(e, t, n) {
        n ? (Y.set(e, t, !1),
        w.event.add(e, t, {
            namespace: !1,
            handler: function(e) {
                var r, o, s = Y.get(this, t);
                if (1 & e.isTrigger && this[t]) {
                    if (s.length)
                        (w.event.special[t] || {}).delegateType && e.stopPropagation();
                    else if (s = i.call(arguments),
                    Y.set(this, t, s),
                    r = n(this, t),
                    this[t](),
                    s !== (o = Y.get(this, t)) || r ? Y.set(this, t, !1) : o = {},
                    s !== o)
                        return e.stopImmediatePropagation(),
                        e.preventDefault(),
                        o && o.value
                } else
                    s.length && (Y.set(this, t, {
                        value: w.event.trigger(w.extend(s[0], w.Event.prototype), s.slice(1), this)
                    }),
                    e.stopImmediatePropagation())
            }
        })) : void 0 === Y.get(e, t) && w.event.add(e, t, we)
    }
    w.event = {
        global: {},
        add: function(e, t, n, r, i) {
            var o, s, a, u, l, c, f, p, d, h, g, v = Y.get(e);
            if (V(e))
                for (n.handler && (n = (o = n).handler,
                i = o.selector),
                i && w.find.matchesSelector(re, i),
                n.guid || (n.guid = w.guid++),
                (u = v.events) || (u = v.events = Object.create(null)),
                (s = v.handle) || (s = v.handle = function(t) {
                    return void 0 !== w && w.event.triggered !== t.type ? w.event.dispatch.apply(e, arguments) : void 0
                }
                ),
                l = (t = (t || "").match(H) || [""]).length; l--; )
                    d = g = (a = be.exec(t[l]) || [])[1],
                    h = (a[2] || "").split(".").sort(),
                    d && (f = w.event.special[d] || {},
                    d = (i ? f.delegateType : f.bindType) || d,
                    f = w.event.special[d] || {},
                    c = w.extend({
                        type: d,
                        origType: g,
                        data: r,
                        handler: n,
                        guid: n.guid,
                        selector: i,
                        needsContext: i && w.expr.match.needsContext.test(i),
                        namespace: h.join(".")
                    }, o),
                    (p = u[d]) || ((p = u[d] = []).delegateCount = 0,
                    f.setup && !1 !== f.setup.call(e, r, h, s) || e.addEventListener && e.addEventListener(d, s)),
                    f.add && (f.add.call(e, c),
                    c.handler.guid || (c.handler.guid = n.guid)),
                    i ? p.splice(p.delegateCount++, 0, c) : p.push(c),
                    w.event.global[d] = !0)
        },
        remove: function(e, t, n, r, i) {
            var o, s, a, u, l, c, f, p, d, h, g, v = Y.hasData(e) && Y.get(e);
            if (v && (u = v.events)) {
                for (l = (t = (t || "").match(H) || [""]).length; l--; )
                    if (d = g = (a = be.exec(t[l]) || [])[1],
                    h = (a[2] || "").split(".").sort(),
                    d) {
                        for (f = w.event.special[d] || {},
                        p = u[d = (r ? f.delegateType : f.bindType) || d] || [],
                        a = a[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"),
                        s = o = p.length; o--; )
                            c = p[o],
                            !i && g !== c.origType || n && n.guid !== c.guid || a && !a.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (p.splice(o, 1),
                            c.selector && p.delegateCount--,
                            f.remove && f.remove.call(e, c));
                        s && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, v.handle) || w.removeEvent(e, d, v.handle),
                        delete u[d])
                    } else
                        for (d in u)
                            w.event.remove(e, d + t[l], n, r, !0);
                w.isEmptyObject(u) && Y.remove(e, "handle events")
            }
        },
        dispatch: function(e) {
            var t, n, r, i, o, s, a = new Array(arguments.length), u = w.event.fix(e), l = (Y.get(this, "events") || Object.create(null))[u.type] || [], c = w.event.special[u.type] || {};
            for (a[0] = u,
            t = 1; t < arguments.length; t++)
                a[t] = arguments[t];
            if (u.delegateTarget = this,
            !c.preDispatch || !1 !== c.preDispatch.call(this, u)) {
                for (s = w.event.handlers.call(this, u, l),
                t = 0; (i = s[t++]) && !u.isPropagationStopped(); )
                    for (u.currentTarget = i.elem,
                    n = 0; (o = i.handlers[n++]) && !u.isImmediatePropagationStopped(); )
                        u.rnamespace && !1 !== o.namespace && !u.rnamespace.test(o.namespace) || (u.handleObj = o,
                        u.data = o.data,
                        void 0 !== (r = ((w.event.special[o.origType] || {}).handle || o.handler).apply(i.elem, a)) && !1 === (u.result = r) && (u.preventDefault(),
                        u.stopPropagation()));
                return c.postDispatch && c.postDispatch.call(this, u),
                u.result
            }
        },
        handlers: function(e, t) {
            var n, r, i, o, s, a = [], u = t.delegateCount, l = e.target;
            if (u && l.nodeType && !("click" === e.type && 1 <= e.button))
                for (; l !== this; l = l.parentNode || this)
                    if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
                        for (o = [],
                        s = {},
                        n = 0; n < u; n++)
                            void 0 === s[i = (r = t[n]).selector + " "] && (s[i] = r.needsContext ? -1 < w(i, this).index(l) : w.find(i, this, null, [l]).length),
                            s[i] && o.push(r);
                        o.length && a.push({
                            elem: l,
                            handlers: o
                        })
                    }
            return l = this,
            u < t.length && a.push({
                elem: l,
                handlers: t.slice(u)
            }),
            a
        },
        addProp: function(e, t) {
            Object.defineProperty(w.Event.prototype, e, {
                enumerable: !0,
                configurable: !0,
                get: h(t) ? function() {
                    if (this.originalEvent)
                        return t(this.originalEvent)
                }
                : function() {
                    if (this.originalEvent)
                        return this.originalEvent[e]
                }
                ,
                set: function(t) {
                    Object.defineProperty(this, e, {
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                        value: t
                    })
                }
            })
        },
        fix: function(e) {
            return e[w.expando] ? e : new w.Event(e)
        },
        special: {
            load: {
                noBubble: !0
            },
            click: {
                setup: function(e) {
                    var t = this || e;
                    return pe.test(t.type) && t.click && k(t, "input") && Se(t, "click", we),
                    !1
                },
                trigger: function(e) {
                    var t = this || e;
                    return pe.test(t.type) && t.click && k(t, "input") && Se(t, "click"),
                    !0
                },
                _default: function(e) {
                    var t = e.target;
                    return pe.test(t.type) && t.click && k(t, "input") && Y.get(t, "click") || k(t, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                }
            }
        }
    },
    w.removeEvent = function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n)
    }
    ,
    w.Event = function(e, t) {
        if (!(this instanceof w.Event))
            return new w.Event(e,t);
        e && e.type ? (this.originalEvent = e,
        this.type = e.type,
        this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? we : Ce,
        this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target,
        this.currentTarget = e.currentTarget,
        this.relatedTarget = e.relatedTarget) : this.type = e,
        t && w.extend(this, t),
        this.timeStamp = e && e.timeStamp || Date.now(),
        this[w.expando] = !0
    }
    ,
    w.Event.prototype = {
        constructor: w.Event,
        isDefaultPrevented: Ce,
        isPropagationStopped: Ce,
        isImmediatePropagationStopped: Ce,
        isSimulated: !1,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = we,
            e && !this.isSimulated && e.preventDefault()
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = we,
            e && !this.isSimulated && e.stopPropagation()
        },
        stopImmediatePropagation: function() {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = we,
            e && !this.isSimulated && e.stopImmediatePropagation(),
            this.stopPropagation()
        }
    },
    w.each({
        altKey: !0,
        bubbles: !0,
        cancelable: !0,
        changedTouches: !0,
        ctrlKey: !0,
        detail: !0,
        eventPhase: !0,
        metaKey: !0,
        pageX: !0,
        pageY: !0,
        shiftKey: !0,
        view: !0,
        char: !0,
        code: !0,
        charCode: !0,
        key: !0,
        keyCode: !0,
        button: !0,
        buttons: !0,
        clientX: !0,
        clientY: !0,
        offsetX: !0,
        offsetY: !0,
        pointerId: !0,
        pointerType: !0,
        screenX: !0,
        screenY: !0,
        targetTouches: !0,
        toElement: !0,
        touches: !0,
        which: !0
    }, w.event.addProp),
    w.each({
        focus: "focusin",
        blur: "focusout"
    }, (function(e, t) {
        w.event.special[e] = {
            setup: function() {
                return Se(this, e, Te),
                !1
            },
            trigger: function() {
                return Se(this, e),
                !0
            },
            _default: function() {
                return !0
            },
            delegateType: t
        }
    }
    )),
    w.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, (function(e, t) {
        w.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, r = e.relatedTarget, i = e.handleObj;
                return r && (r === this || w.contains(this, r)) || (e.type = i.origType,
                n = i.handler.apply(this, arguments),
                e.type = t),
                n
            }
        }
    }
    )),
    w.fn.extend({
        on: function(e, t, n, r) {
            return Ae(this, e, t, n, r)
        },
        one: function(e, t, n, r) {
            return Ae(this, e, t, n, r, 1)
        },
        off: function(e, t, n) {
            var r, i;
            if (e && e.preventDefault && e.handleObj)
                return r = e.handleObj,
                w(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler),
                this;
            if ("object" == typeof e) {
                for (i in e)
                    this.off(i, t, e[i]);
                return this
            }
            return !1 !== t && "function" != typeof t || (n = t,
            t = void 0),
            !1 === n && (n = Ce),
            this.each((function() {
                w.event.remove(this, e, n, t)
            }
            ))
        }
    });
    var Ee = /<script|<style|<link/i
      , ke = /checked\s*(?:[^=]|=\s*.checked.)/i
      , Ne = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
    function je(e, t) {
        return k(e, "table") && k(11 !== t.nodeType ? t : t.firstChild, "tr") && w(e).children("tbody")[0] || e
    }
    function De(e) {
        return e.type = (null !== e.getAttribute("type")) + "/" + e.type,
        e
    }
    function Le(e) {
        return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"),
        e
    }
    function qe(e, t) {
        var n, r, i, o, s, a;
        if (1 === t.nodeType) {
            if (Y.hasData(e) && (a = Y.get(e).events))
                for (i in Y.remove(t, "handle events"),
                a)
                    for (n = 0,
                    r = a[i].length; n < r; n++)
                        w.event.add(t, i, a[i][n]);
            Q.hasData(e) && (o = Q.access(e),
            s = w.extend({}, o),
            Q.set(t, s))
        }
    }
    function Pe(e, t, n, r) {
        t = o(t);
        var i, s, a, u, l, c, f = 0, p = e.length, g = p - 1, v = t[0], m = h(v);
        if (m || 1 < p && "string" == typeof v && !d.checkClone && ke.test(v))
            return e.each((function(i) {
                var o = e.eq(i);
                m && (t[0] = v.call(this, i, o.html())),
                Pe(o, t, n, r)
            }
            ));
        if (p && (s = (i = xe(t, e[0].ownerDocument, !1, e, r)).firstChild,
        1 === i.childNodes.length && (i = s),
        s || r)) {
            for (u = (a = w.map(ve(i, "script"), De)).length; f < p; f++)
                l = i,
                f !== g && (l = w.clone(l, !0, !0),
                u && w.merge(a, ve(l, "script"))),
                n.call(e[f], l, f);
            if (u)
                for (c = a[a.length - 1].ownerDocument,
                w.map(a, Le),
                f = 0; f < u; f++)
                    l = a[f],
                    he.test(l.type || "") && !Y.access(l, "globalEval") && w.contains(c, l) && (l.src && "module" !== (l.type || "").toLowerCase() ? w._evalUrl && !l.noModule && w._evalUrl(l.src, {
                        nonce: l.nonce || l.getAttribute("nonce")
                    }, c) : y(l.textContent.replace(Ne, ""), l, c))
        }
        return e
    }
    function Oe(e, t, n) {
        for (var r, i = t ? w.filter(t, e) : e, o = 0; null != (r = i[o]); o++)
            n || 1 !== r.nodeType || w.cleanData(ve(r)),
            r.parentNode && (n && ie(r) && me(ve(r, "script")),
            r.parentNode.removeChild(r));
        return e
    }
    w.extend({
        htmlPrefilter: function(e) {
            return e
        },
        clone: function(e, t, n) {
            var r, i, o, s, a, u, l, c = e.cloneNode(!0), f = ie(e);
            if (!(d.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || w.isXMLDoc(e)))
                for (s = ve(c),
                r = 0,
                i = (o = ve(e)).length; r < i; r++)
                    a = o[r],
                    "input" === (l = (u = s[r]).nodeName.toLowerCase()) && pe.test(a.type) ? u.checked = a.checked : "input" !== l && "textarea" !== l || (u.defaultValue = a.defaultValue);
            if (t)
                if (n)
                    for (o = o || ve(e),
                    s = s || ve(c),
                    r = 0,
                    i = o.length; r < i; r++)
                        qe(o[r], s[r]);
                else
                    qe(e, c);
            return 0 < (s = ve(c, "script")).length && me(s, !f && ve(e, "script")),
            c
        },
        cleanData: function(e) {
            for (var t, n, r, i = w.event.special, o = 0; void 0 !== (n = e[o]); o++)
                if (V(n)) {
                    if (t = n[Y.expando]) {
                        if (t.events)
                            for (r in t.events)
                                i[r] ? w.event.remove(n, r) : w.removeEvent(n, r, t.handle);
                        n[Y.expando] = void 0
                    }
                    n[Q.expando] && (n[Q.expando] = void 0)
                }
        }
    }),
    w.fn.extend({
        detach: function(e) {
            return Oe(this, e, !0)
        },
        remove: function(e) {
            return Oe(this, e)
        },
        text: function(e) {
            return F(this, (function(e) {
                return void 0 === e ? w.text(this) : this.empty().each((function() {
                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                }
                ))
            }
            ), null, e, arguments.length)
        },
        append: function() {
            return Pe(this, arguments, (function(e) {
                1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || je(this, e).appendChild(e)
            }
            ))
        },
        prepend: function() {
            return Pe(this, arguments, (function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = je(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            }
            ))
        },
        before: function() {
            return Pe(this, arguments, (function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            }
            ))
        },
        after: function() {
            return Pe(this, arguments, (function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            }
            ))
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++)
                1 === e.nodeType && (w.cleanData(ve(e, !1)),
                e.textContent = "");
            return this
        },
        clone: function(e, t) {
            return e = null != e && e,
            t = null == t ? e : t,
            this.map((function() {
                return w.clone(this, e, t)
            }
            ))
        },
        html: function(e) {
            return F(this, (function(e) {
                var t = this[0] || {}
                  , n = 0
                  , r = this.length;
                if (void 0 === e && 1 === t.nodeType)
                    return t.innerHTML;
                if ("string" == typeof e && !Ee.test(e) && !ge[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
                    e = w.htmlPrefilter(e);
                    try {
                        for (; n < r; n++)
                            1 === (t = this[n] || {}).nodeType && (w.cleanData(ve(t, !1)),
                            t.innerHTML = e);
                        t = 0
                    } catch (e) {}
                }
                t && this.empty().append(e)
            }
            ), null, e, arguments.length)
        },
        replaceWith: function() {
            var e = [];
            return Pe(this, arguments, (function(t) {
                var n = this.parentNode;
                w.inArray(this, e) < 0 && (w.cleanData(ve(this)),
                n && n.replaceChild(t, this))
            }
            ), e)
        }
    }),
    w.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, (function(e, t) {
        w.fn[e] = function(e) {
            for (var n, r = [], i = w(e), o = i.length - 1, a = 0; a <= o; a++)
                n = a === o ? this : this.clone(!0),
                w(i[a])[t](n),
                s.apply(r, n.get());
            return this.pushStack(r)
        }
    }
    ));
    var He = new RegExp("^(" + ee + ")(?!px)[a-z%]+$","i")
      , Re = function(t) {
        var n = t.ownerDocument.defaultView;
        return n && n.opener || (n = e),
        n.getComputedStyle(t)
    }
      , Me = function(e, t, n) {
        var r, i, o = {};
        for (i in t)
            o[i] = e.style[i],
            e.style[i] = t[i];
        for (i in r = n.call(e),
        t)
            e.style[i] = o[i];
        return r
    }
      , Be = new RegExp(ne.join("|"),"i");
    function Ie(e, t, n) {
        var r, i, o, s, a = e.style;
        return (n = n || Re(e)) && ("" !== (s = n.getPropertyValue(t) || n[t]) || ie(e) || (s = w.style(e, t)),
        !d.pixelBoxStyles() && He.test(s) && Be.test(t) && (r = a.width,
        i = a.minWidth,
        o = a.maxWidth,
        a.minWidth = a.maxWidth = a.width = s,
        s = n.width,
        a.width = r,
        a.minWidth = i,
        a.maxWidth = o)),
        void 0 !== s ? s + "" : s
    }
    function _e(e, t) {
        return {
            get: function() {
                if (!e())
                    return (this.get = t).apply(this, arguments);
                delete this.get
            }
        }
    }
    !function() {
        function t() {
            if (c) {
                l.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",
                c.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",
                re.appendChild(l).appendChild(c);
                var t = e.getComputedStyle(c);
                r = "1%" !== t.top,
                u = 12 === n(t.marginLeft),
                c.style.right = "60%",
                s = 36 === n(t.right),
                i = 36 === n(t.width),
                c.style.position = "absolute",
                o = 12 === n(c.offsetWidth / 3),
                re.removeChild(l),
                c = null
            }
        }
        function n(e) {
            return Math.round(parseFloat(e))
        }
        var r, i, o, s, a, u, l = v.createElement("div"), c = v.createElement("div");
        c.style && (c.style.backgroundClip = "content-box",
        c.cloneNode(!0).style.backgroundClip = "",
        d.clearCloneStyle = "content-box" === c.style.backgroundClip,
        w.extend(d, {
            boxSizingReliable: function() {
                return t(),
                i
            },
            pixelBoxStyles: function() {
                return t(),
                s
            },
            pixelPosition: function() {
                return t(),
                r
            },
            reliableMarginLeft: function() {
                return t(),
                u
            },
            scrollboxSize: function() {
                return t(),
                o
            },
            reliableTrDimensions: function() {
                var t, n, r, i;
                return null == a && (t = v.createElement("table"),
                n = v.createElement("tr"),
                r = v.createElement("div"),
                t.style.cssText = "position:absolute;left:-11111px;border-collapse:separate",
                n.style.cssText = "border:1px solid",
                n.style.height = "1px",
                r.style.height = "9px",
                r.style.display = "block",
                re.appendChild(t).appendChild(n).appendChild(r),
                i = e.getComputedStyle(n),
                a = parseInt(i.height, 10) + parseInt(i.borderTopWidth, 10) + parseInt(i.borderBottomWidth, 10) === n.offsetHeight,
                re.removeChild(t)),
                a
            }
        }))
    }();
    var We = ["Webkit", "Moz", "ms"]
      , Fe = v.createElement("div").style
      , $e = {};
    function ze(e) {
        return w.cssProps[e] || $e[e] || (e in Fe ? e : $e[e] = function(e) {
            for (var t = e[0].toUpperCase() + e.slice(1), n = We.length; n--; )
                if ((e = We[n] + t)in Fe)
                    return e
        }(e) || e)
    }
    var Ue = /^(none|table(?!-c[ea]).+)/
      , Xe = /^--/
      , Ve = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }
      , Ge = {
        letterSpacing: "0",
        fontWeight: "400"
    };
    function Ye(e, t, n) {
        var r = te.exec(t);
        return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t
    }
    function Qe(e, t, n, r, i, o) {
        var s = "width" === t ? 1 : 0
          , a = 0
          , u = 0;
        if (n === (r ? "border" : "content"))
            return 0;
        for (; s < 4; s += 2)
            "margin" === n && (u += w.css(e, n + ne[s], !0, i)),
            r ? ("content" === n && (u -= w.css(e, "padding" + ne[s], !0, i)),
            "margin" !== n && (u -= w.css(e, "border" + ne[s] + "Width", !0, i))) : (u += w.css(e, "padding" + ne[s], !0, i),
            "padding" !== n ? u += w.css(e, "border" + ne[s] + "Width", !0, i) : a += w.css(e, "border" + ne[s] + "Width", !0, i));
        return !r && 0 <= o && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - a - .5)) || 0),
        u
    }
    function Je(e, t, n) {
        var r = Re(e)
          , i = (!d.boxSizingReliable() || n) && "border-box" === w.css(e, "boxSizing", !1, r)
          , o = i
          , s = Ie(e, t, r)
          , a = "offset" + t[0].toUpperCase() + t.slice(1);
        if (He.test(s)) {
            if (!n)
                return s;
            s = "auto"
        }
        return (!d.boxSizingReliable() && i || !d.reliableTrDimensions() && k(e, "tr") || "auto" === s || !parseFloat(s) && "inline" === w.css(e, "display", !1, r)) && e.getClientRects().length && (i = "border-box" === w.css(e, "boxSizing", !1, r),
        (o = a in e) && (s = e[a])),
        (s = parseFloat(s) || 0) + Qe(e, t, n || (i ? "border" : "content"), o, r, s) + "px"
    }
    function Ke(e, t, n, r, i) {
        return new Ke.prototype.init(e,t,n,r,i)
    }
    w.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Ie(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            gridArea: !0,
            gridColumn: !0,
            gridColumnEnd: !0,
            gridColumnStart: !0,
            gridRow: !0,
            gridRowEnd: !0,
            gridRowStart: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {},
        style: function(e, t, n, r) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var i, o, s, a = X(t), u = Xe.test(t), l = e.style;
                if (u || (t = ze(a)),
                s = w.cssHooks[t] || w.cssHooks[a],
                void 0 === n)
                    return s && "get"in s && void 0 !== (i = s.get(e, !1, r)) ? i : l[t];
                "string" == (o = typeof n) && (i = te.exec(n)) && i[1] && (n = ae(e, t, i),
                o = "number"),
                null != n && n == n && ("number" !== o || u || (n += i && i[3] || (w.cssNumber[a] ? "" : "px")),
                d.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"),
                s && "set"in s && void 0 === (n = s.set(e, n, r)) || (u ? l.setProperty(t, n) : l[t] = n))
            }
        },
        css: function(e, t, n, r) {
            var i, o, s, a = X(t);
            return Xe.test(t) || (t = ze(a)),
            (s = w.cssHooks[t] || w.cssHooks[a]) && "get"in s && (i = s.get(e, !0, n)),
            void 0 === i && (i = Ie(e, t, r)),
            "normal" === i && t in Ge && (i = Ge[t]),
            "" === n || n ? (o = parseFloat(i),
            !0 === n || isFinite(o) ? o || 0 : i) : i
        }
    }),
    w.each(["height", "width"], (function(e, t) {
        w.cssHooks[t] = {
            get: function(e, n, r) {
                if (n)
                    return !Ue.test(w.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? Je(e, t, r) : Me(e, Ve, (function() {
                        return Je(e, t, r)
                    }
                    ))
            },
            set: function(e, n, r) {
                var i, o = Re(e), s = !d.scrollboxSize() && "absolute" === o.position, a = (s || r) && "border-box" === w.css(e, "boxSizing", !1, o), u = r ? Qe(e, t, r, a, o) : 0;
                return a && s && (u -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(o[t]) - Qe(e, t, "border", !1, o) - .5)),
                u && (i = te.exec(n)) && "px" !== (i[3] || "px") && (e.style[t] = n,
                n = w.css(e, t)),
                Ye(0, n, u)
            }
        }
    }
    )),
    w.cssHooks.marginLeft = _e(d.reliableMarginLeft, (function(e, t) {
        if (t)
            return (parseFloat(Ie(e, "marginLeft")) || e.getBoundingClientRect().left - Me(e, {
                marginLeft: 0
            }, (function() {
                return e.getBoundingClientRect().left
            }
            ))) + "px"
    }
    )),
    w.each({
        margin: "",
        padding: "",
        border: "Width"
    }, (function(e, t) {
        w.cssHooks[e + t] = {
            expand: function(n) {
                for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++)
                    i[e + ne[r] + t] = o[r] || o[r - 2] || o[0];
                return i
            }
        },
        "margin" !== e && (w.cssHooks[e + t].set = Ye)
    }
    )),
    w.fn.extend({
        css: function(e, t) {
            return F(this, (function(e, t, n) {
                var r, i, o = {}, s = 0;
                if (Array.isArray(t)) {
                    for (r = Re(e),
                    i = t.length; s < i; s++)
                        o[t[s]] = w.css(e, t[s], !1, r);
                    return o
                }
                return void 0 !== n ? w.style(e, t, n) : w.css(e, t)
            }
            ), e, t, 1 < arguments.length)
        }
    }),
    ((w.Tween = Ke).prototype = {
        constructor: Ke,
        init: function(e, t, n, r, i, o) {
            this.elem = e,
            this.prop = n,
            this.easing = i || w.easing._default,
            this.options = t,
            this.start = this.now = this.cur(),
            this.end = r,
            this.unit = o || (w.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = Ke.propHooks[this.prop];
            return e && e.get ? e.get(this) : Ke.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = Ke.propHooks[this.prop];
            return this.options.duration ? this.pos = t = w.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e,
            this.now = (this.end - this.start) * t + this.start,
            this.options.step && this.options.step.call(this.elem, this.now, this),
            n && n.set ? n.set(this) : Ke.propHooks._default.set(this),
            this
        }
    }).init.prototype = Ke.prototype,
    (Ke.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = w.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0
            },
            set: function(e) {
                w.fx.step[e.prop] ? w.fx.step[e.prop](e) : 1 !== e.elem.nodeType || !w.cssHooks[e.prop] && null == e.elem.style[ze(e.prop)] ? e.elem[e.prop] = e.now : w.style(e.elem, e.prop, e.now + e.unit)
            }
        }
    }).scrollTop = Ke.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    },
    w.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        },
        _default: "swing"
    },
    w.fx = Ke.prototype.init,
    w.fx.step = {};
    var Ze, et, tt, nt, rt = /^(?:toggle|show|hide)$/, it = /queueHooks$/;
    function ot() {
        et && (!1 === v.hidden && e.requestAnimationFrame ? e.requestAnimationFrame(ot) : e.setTimeout(ot, w.fx.interval),
        w.fx.tick())
    }
    function st() {
        return e.setTimeout((function() {
            Ze = void 0
        }
        )),
        Ze = Date.now()
    }
    function at(e, t) {
        var n, r = 0, i = {
            height: e
        };
        for (t = t ? 1 : 0; r < 4; r += 2 - t)
            i["margin" + (n = ne[r])] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e),
        i
    }
    function ut(e, t, n) {
        for (var r, i = (lt.tweeners[t] || []).concat(lt.tweeners["*"]), o = 0, s = i.length; o < s; o++)
            if (r = i[o].call(n, t, e))
                return r
    }
    function lt(e, t, n) {
        var r, i, o = 0, s = lt.prefilters.length, a = w.Deferred().always((function() {
            delete u.elem
        }
        )), u = function() {
            if (i)
                return !1;
            for (var t = Ze || st(), n = Math.max(0, l.startTime + l.duration - t), r = 1 - (n / l.duration || 0), o = 0, s = l.tweens.length; o < s; o++)
                l.tweens[o].run(r);
            return a.notifyWith(e, [l, r, n]),
            r < 1 && s ? n : (s || a.notifyWith(e, [l, 1, 0]),
            a.resolveWith(e, [l]),
            !1)
        }, l = a.promise({
            elem: e,
            props: w.extend({}, t),
            opts: w.extend(!0, {
                specialEasing: {},
                easing: w.easing._default
            }, n),
            originalProperties: t,
            originalOptions: n,
            startTime: Ze || st(),
            duration: n.duration,
            tweens: [],
            createTween: function(t, n) {
                var r = w.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
                return l.tweens.push(r),
                r
            },
            stop: function(t) {
                var n = 0
                  , r = t ? l.tweens.length : 0;
                if (i)
                    return this;
                for (i = !0; n < r; n++)
                    l.tweens[n].run(1);
                return t ? (a.notifyWith(e, [l, 1, 0]),
                a.resolveWith(e, [l, t])) : a.rejectWith(e, [l, t]),
                this
            }
        }), c = l.props;
        for (function(e, t) {
            var n, r, i, o, s;
            for (n in e)
                if (i = t[r = X(n)],
                o = e[n],
                Array.isArray(o) && (i = o[1],
                o = e[n] = o[0]),
                n !== r && (e[r] = o,
                delete e[n]),
                (s = w.cssHooks[r]) && "expand"in s)
                    for (n in o = s.expand(o),
                    delete e[r],
                    o)
                        n in e || (e[n] = o[n],
                        t[n] = i);
                else
                    t[r] = i
        }(c, l.opts.specialEasing); o < s; o++)
            if (r = lt.prefilters[o].call(l, e, c, l.opts))
                return h(r.stop) && (w._queueHooks(l.elem, l.opts.queue).stop = r.stop.bind(r)),
                r;
        return w.map(c, ut, l),
        h(l.opts.start) && l.opts.start.call(e, l),
        l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always),
        w.fx.timer(w.extend(u, {
            elem: e,
            anim: l,
            queue: l.opts.queue
        })),
        l
    }
    w.Animation = w.extend(lt, {
        tweeners: {
            "*": [function(e, t) {
                var n = this.createTween(e, t);
                return ae(n.elem, e, te.exec(t), n),
                n
            }
            ]
        },
        tweener: function(e, t) {
            h(e) ? (t = e,
            e = ["*"]) : e = e.match(H);
            for (var n, r = 0, i = e.length; r < i; r++)
                n = e[r],
                lt.tweeners[n] = lt.tweeners[n] || [],
                lt.tweeners[n].unshift(t)
        },
        prefilters: [function(e, t, n) {
            var r, i, o, s, a, u, l, c, f = "width"in t || "height"in t, p = this, d = {}, h = e.style, g = e.nodeType && se(e), v = Y.get(e, "fxshow");
            for (r in n.queue || (null == (s = w._queueHooks(e, "fx")).unqueued && (s.unqueued = 0,
            a = s.empty.fire,
            s.empty.fire = function() {
                s.unqueued || a()
            }
            ),
            s.unqueued++,
            p.always((function() {
                p.always((function() {
                    s.unqueued--,
                    w.queue(e, "fx").length || s.empty.fire()
                }
                ))
            }
            ))),
            t)
                if (i = t[r],
                rt.test(i)) {
                    if (delete t[r],
                    o = o || "toggle" === i,
                    i === (g ? "hide" : "show")) {
                        if ("show" !== i || !v || void 0 === v[r])
                            continue;
                        g = !0
                    }
                    d[r] = v && v[r] || w.style(e, r)
                }
            if ((u = !w.isEmptyObject(t)) || !w.isEmptyObject(d))
                for (r in f && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY],
                null == (l = v && v.display) && (l = Y.get(e, "display")),
                "none" === (c = w.css(e, "display")) && (l ? c = l : (le([e], !0),
                l = e.style.display || l,
                c = w.css(e, "display"),
                le([e]))),
                ("inline" === c || "inline-block" === c && null != l) && "none" === w.css(e, "float") && (u || (p.done((function() {
                    h.display = l
                }
                )),
                null == l && (c = h.display,
                l = "none" === c ? "" : c)),
                h.display = "inline-block")),
                n.overflow && (h.overflow = "hidden",
                p.always((function() {
                    h.overflow = n.overflow[0],
                    h.overflowX = n.overflow[1],
                    h.overflowY = n.overflow[2]
                }
                ))),
                u = !1,
                d)
                    u || (v ? "hidden"in v && (g = v.hidden) : v = Y.access(e, "fxshow", {
                        display: l
                    }),
                    o && (v.hidden = !g),
                    g && le([e], !0),
                    p.done((function() {
                        for (r in g || le([e]),
                        Y.remove(e, "fxshow"),
                        d)
                            w.style(e, r, d[r])
                    }
                    ))),
                    u = ut(g ? v[r] : 0, r, p),
                    r in v || (v[r] = u.start,
                    g && (u.end = u.start,
                    u.start = 0))
        }
        ],
        prefilter: function(e, t) {
            t ? lt.prefilters.unshift(e) : lt.prefilters.push(e)
        }
    }),
    w.speed = function(e, t, n) {
        var r = e && "object" == typeof e ? w.extend({}, e) : {
            complete: n || !n && t || h(e) && e,
            duration: e,
            easing: n && t || t && !h(t) && t
        };
        return w.fx.off ? r.duration = 0 : "number" != typeof r.duration && (r.duration in w.fx.speeds ? r.duration = w.fx.speeds[r.duration] : r.duration = w.fx.speeds._default),
        null != r.queue && !0 !== r.queue || (r.queue = "fx"),
        r.old = r.complete,
        r.complete = function() {
            h(r.old) && r.old.call(this),
            r.queue && w.dequeue(this, r.queue)
        }
        ,
        r
    }
    ,
    w.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(se).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = w.isEmptyObject(e)
              , o = w.speed(t, n, r)
              , s = function() {
                var t = lt(this, w.extend({}, e), o);
                (i || Y.get(this, "finish")) && t.stop(!0)
            };
            return s.finish = s,
            i || !1 === o.queue ? this.each(s) : this.queue(o.queue, s)
        },
        stop: function(e, t, n) {
            var r = function(e) {
                var t = e.stop;
                delete e.stop,
                t(n)
            };
            return "string" != typeof e && (n = t,
            t = e,
            e = void 0),
            t && this.queue(e || "fx", []),
            this.each((function() {
                var t = !0
                  , i = null != e && e + "queueHooks"
                  , o = w.timers
                  , s = Y.get(this);
                if (i)
                    s[i] && s[i].stop && r(s[i]);
                else
                    for (i in s)
                        s[i] && s[i].stop && it.test(i) && r(s[i]);
                for (i = o.length; i--; )
                    o[i].elem !== this || null != e && o[i].queue !== e || (o[i].anim.stop(n),
                    t = !1,
                    o.splice(i, 1));
                !t && n || w.dequeue(this, e)
            }
            ))
        },
        finish: function(e) {
            return !1 !== e && (e = e || "fx"),
            this.each((function() {
                var t, n = Y.get(this), r = n[e + "queue"], i = n[e + "queueHooks"], o = w.timers, s = r ? r.length : 0;
                for (n.finish = !0,
                w.queue(this, e, []),
                i && i.stop && i.stop.call(this, !0),
                t = o.length; t--; )
                    o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0),
                    o.splice(t, 1));
                for (t = 0; t < s; t++)
                    r[t] && r[t].finish && r[t].finish.call(this);
                delete n.finish
            }
            ))
        }
    }),
    w.each(["toggle", "show", "hide"], (function(e, t) {
        var n = w.fn[t];
        w.fn[t] = function(e, r, i) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(at(t, !0), e, r, i)
        }
    }
    )),
    w.each({
        slideDown: at("show"),
        slideUp: at("hide"),
        slideToggle: at("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, (function(e, t) {
        w.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }
    )),
    w.timers = [],
    w.fx.tick = function() {
        var e, t = 0, n = w.timers;
        for (Ze = Date.now(); t < n.length; t++)
            (e = n[t])() || n[t] !== e || n.splice(t--, 1);
        n.length || w.fx.stop(),
        Ze = void 0
    }
    ,
    w.fx.timer = function(e) {
        w.timers.push(e),
        w.fx.start()
    }
    ,
    w.fx.interval = 13,
    w.fx.start = function() {
        et || (et = !0,
        ot())
    }
    ,
    w.fx.stop = function() {
        et = null
    }
    ,
    w.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    },
    w.fn.delay = function(t, n) {
        return t = w.fx && w.fx.speeds[t] || t,
        n = n || "fx",
        this.queue(n, (function(n, r) {
            var i = e.setTimeout(n, t);
            r.stop = function() {
                e.clearTimeout(i)
            }
        }
        ))
    }
    ,
    tt = v.createElement("input"),
    nt = v.createElement("select").appendChild(v.createElement("option")),
    tt.type = "checkbox",
    d.checkOn = "" !== tt.value,
    d.optSelected = nt.selected,
    (tt = v.createElement("input")).value = "t",
    tt.type = "radio",
    d.radioValue = "t" === tt.value;
    var ct, ft = w.expr.attrHandle;
    w.fn.extend({
        attr: function(e, t) {
            return F(this, w.attr, e, t, 1 < arguments.length)
        },
        removeAttr: function(e) {
            return this.each((function() {
                w.removeAttr(this, e)
            }
            ))
        }
    }),
    w.extend({
        attr: function(e, t, n) {
            var r, i, o = e.nodeType;
            if (3 !== o && 8 !== o && 2 !== o)
                return void 0 === e.getAttribute ? w.prop(e, t, n) : (1 === o && w.isXMLDoc(e) || (i = w.attrHooks[t.toLowerCase()] || (w.expr.match.bool.test(t) ? ct : void 0)),
                void 0 !== n ? null === n ? void w.removeAttr(e, t) : i && "set"in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""),
                n) : i && "get"in i && null !== (r = i.get(e, t)) ? r : null == (r = w.find.attr(e, t)) ? void 0 : r)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!d.radioValue && "radio" === t && k(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t),
                        n && (e.value = n),
                        t
                    }
                }
            }
        },
        removeAttr: function(e, t) {
            var n, r = 0, i = t && t.match(H);
            if (i && 1 === e.nodeType)
                for (; n = i[r++]; )
                    e.removeAttribute(n)
        }
    }),
    ct = {
        set: function(e, t, n) {
            return !1 === t ? w.removeAttr(e, n) : e.setAttribute(n, n),
            n
        }
    },
    w.each(w.expr.match.bool.source.match(/\w+/g), (function(e, t) {
        var n = ft[t] || w.find.attr;
        ft[t] = function(e, t, r) {
            var i, o, s = t.toLowerCase();
            return r || (o = ft[s],
            ft[s] = i,
            i = null != n(e, t, r) ? s : null,
            ft[s] = o),
            i
        }
    }
    ));
    var pt = /^(?:input|select|textarea|button)$/i
      , dt = /^(?:a|area)$/i;
    function ht(e) {
        return (e.match(H) || []).join(" ")
    }
    function gt(e) {
        return e.getAttribute && e.getAttribute("class") || ""
    }
    function vt(e) {
        return Array.isArray(e) ? e : "string" == typeof e && e.match(H) || []
    }
    w.fn.extend({
        prop: function(e, t) {
            return F(this, w.prop, e, t, 1 < arguments.length)
        },
        removeProp: function(e) {
            return this.each((function() {
                delete this[w.propFix[e] || e]
            }
            ))
        }
    }),
    w.extend({
        prop: function(e, t, n) {
            var r, i, o = e.nodeType;
            if (3 !== o && 8 !== o && 2 !== o)
                return 1 === o && w.isXMLDoc(e) || (t = w.propFix[t] || t,
                i = w.propHooks[t]),
                void 0 !== n ? i && "set"in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get"in i && null !== (r = i.get(e, t)) ? r : e[t]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = w.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : pt.test(e.nodeName) || dt.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        },
        propFix: {
            for: "htmlFor",
            class: "className"
        }
    }),
    d.optSelected || (w.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex,
            null
        },
        set: function(e) {
            var t = e.parentNode;
            t && (t.selectedIndex,
            t.parentNode && t.parentNode.selectedIndex)
        }
    }),
    w.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], (function() {
        w.propFix[this.toLowerCase()] = this
    }
    )),
    w.fn.extend({
        addClass: function(e) {
            var t, n, r, i, o, s, a, u = 0;
            if (h(e))
                return this.each((function(t) {
                    w(this).addClass(e.call(this, t, gt(this)))
                }
                ));
            if ((t = vt(e)).length)
                for (; n = this[u++]; )
                    if (i = gt(n),
                    r = 1 === n.nodeType && " " + ht(i) + " ") {
                        for (s = 0; o = t[s++]; )
                            r.indexOf(" " + o + " ") < 0 && (r += o + " ");
                        i !== (a = ht(r)) && n.setAttribute("class", a)
                    }
            return this
        },
        removeClass: function(e) {
            var t, n, r, i, o, s, a, u = 0;
            if (h(e))
                return this.each((function(t) {
                    w(this).removeClass(e.call(this, t, gt(this)))
                }
                ));
            if (!arguments.length)
                return this.attr("class", "");
            if ((t = vt(e)).length)
                for (; n = this[u++]; )
                    if (i = gt(n),
                    r = 1 === n.nodeType && " " + ht(i) + " ") {
                        for (s = 0; o = t[s++]; )
                            for (; -1 < r.indexOf(" " + o + " "); )
                                r = r.replace(" " + o + " ", " ");
                        i !== (a = ht(r)) && n.setAttribute("class", a)
                    }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e
              , r = "string" === n || Array.isArray(e);
            return "boolean" == typeof t && r ? t ? this.addClass(e) : this.removeClass(e) : h(e) ? this.each((function(n) {
                w(this).toggleClass(e.call(this, n, gt(this), t), t)
            }
            )) : this.each((function() {
                var t, i, o, s;
                if (r)
                    for (i = 0,
                    o = w(this),
                    s = vt(e); t = s[i++]; )
                        o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                else
                    void 0 !== e && "boolean" !== n || ((t = gt(this)) && Y.set(this, "__className__", t),
                    this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : Y.get(this, "__className__") || ""))
            }
            ))
        },
        hasClass: function(e) {
            var t, n, r = 0;
            for (t = " " + e + " "; n = this[r++]; )
                if (1 === n.nodeType && -1 < (" " + ht(gt(n)) + " ").indexOf(t))
                    return !0;
            return !1
        }
    });
    var mt = /\r/g;
    w.fn.extend({
        val: function(e) {
            var t, n, r, i = this[0];
            return arguments.length ? (r = h(e),
            this.each((function(n) {
                var i;
                1 === this.nodeType && (null == (i = r ? e.call(this, n, w(this).val()) : e) ? i = "" : "number" == typeof i ? i += "" : Array.isArray(i) && (i = w.map(i, (function(e) {
                    return null == e ? "" : e + ""
                }
                ))),
                (t = w.valHooks[this.type] || w.valHooks[this.nodeName.toLowerCase()]) && "set"in t && void 0 !== t.set(this, i, "value") || (this.value = i))
            }
            ))) : i ? (t = w.valHooks[i.type] || w.valHooks[i.nodeName.toLowerCase()]) && "get"in t && void 0 !== (n = t.get(i, "value")) ? n : "string" == typeof (n = i.value) ? n.replace(mt, "") : null == n ? "" : n : void 0
        }
    }),
    w.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = w.find.attr(e, "value");
                    return null != t ? t : ht(w.text(e))
                }
            },
            select: {
                get: function(e) {
                    var t, n, r, i = e.options, o = e.selectedIndex, s = "select-one" === e.type, a = s ? null : [], u = s ? o + 1 : i.length;
                    for (r = o < 0 ? u : s ? o : 0; r < u; r++)
                        if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !k(n.parentNode, "optgroup"))) {
                            if (t = w(n).val(),
                            s)
                                return t;
                            a.push(t)
                        }
                    return a
                },
                set: function(e, t) {
                    for (var n, r, i = e.options, o = w.makeArray(t), s = i.length; s--; )
                        ((r = i[s]).selected = -1 < w.inArray(w.valHooks.option.get(r), o)) && (n = !0);
                    return n || (e.selectedIndex = -1),
                    o
                }
            }
        }
    }),
    w.each(["radio", "checkbox"], (function() {
        w.valHooks[this] = {
            set: function(e, t) {
                if (Array.isArray(t))
                    return e.checked = -1 < w.inArray(w(e).val(), t)
            }
        },
        d.checkOn || (w.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        }
        )
    }
    )),
    d.focusin = "onfocusin"in e;
    var yt = /^(?:focusinfocus|focusoutblur)$/
      , xt = function(e) {
        e.stopPropagation()
    };
    w.extend(w.event, {
        trigger: function(t, n, r, i) {
            var o, s, a, u, l, f, p, d, m = [r || v], y = c.call(t, "type") ? t.type : t, x = c.call(t, "namespace") ? t.namespace.split(".") : [];
            if (s = d = a = r = r || v,
            3 !== r.nodeType && 8 !== r.nodeType && !yt.test(y + w.event.triggered) && (-1 < y.indexOf(".") && (y = (x = y.split(".")).shift(),
            x.sort()),
            l = y.indexOf(":") < 0 && "on" + y,
            (t = t[w.expando] ? t : new w.Event(y,"object" == typeof t && t)).isTrigger = i ? 2 : 3,
            t.namespace = x.join("."),
            t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + x.join("\\.(?:.*\\.|)") + "(\\.|$)") : null,
            t.result = void 0,
            t.target || (t.target = r),
            n = null == n ? [t] : w.makeArray(n, [t]),
            p = w.event.special[y] || {},
            i || !p.trigger || !1 !== p.trigger.apply(r, n))) {
                if (!i && !p.noBubble && !g(r)) {
                    for (u = p.delegateType || y,
                    yt.test(u + y) || (s = s.parentNode); s; s = s.parentNode)
                        m.push(s),
                        a = s;
                    a === (r.ownerDocument || v) && m.push(a.defaultView || a.parentWindow || e)
                }
                for (o = 0; (s = m[o++]) && !t.isPropagationStopped(); )
                    d = s,
                    t.type = 1 < o ? u : p.bindType || y,
                    (f = (Y.get(s, "events") || Object.create(null))[t.type] && Y.get(s, "handle")) && f.apply(s, n),
                    (f = l && s[l]) && f.apply && V(s) && (t.result = f.apply(s, n),
                    !1 === t.result && t.preventDefault());
                return t.type = y,
                i || t.isDefaultPrevented() || p._default && !1 !== p._default.apply(m.pop(), n) || !V(r) || l && h(r[y]) && !g(r) && ((a = r[l]) && (r[l] = null),
                w.event.triggered = y,
                t.isPropagationStopped() && d.addEventListener(y, xt),
                r[y](),
                t.isPropagationStopped() && d.removeEventListener(y, xt),
                w.event.triggered = void 0,
                a && (r[l] = a)),
                t.result
            }
        },
        simulate: function(e, t, n) {
            var r = w.extend(new w.Event, n, {
                type: e,
                isSimulated: !0
            });
            w.event.trigger(r, null, t)
        }
    }),
    w.fn.extend({
        trigger: function(e, t) {
            return this.each((function() {
                w.event.trigger(e, t, this)
            }
            ))
        },
        triggerHandler: function(e, t) {
            var n = this[0];
            if (n)
                return w.event.trigger(e, t, n, !0)
        }
    }),
    d.focusin || w.each({
        focus: "focusin",
        blur: "focusout"
    }, (function(e, t) {
        var n = function(e) {
            w.event.simulate(t, e.target, w.event.fix(e))
        };
        w.event.special[t] = {
            setup: function() {
                var r = this.ownerDocument || this.document || this
                  , i = Y.access(r, t);
                i || r.addEventListener(e, n, !0),
                Y.access(r, t, (i || 0) + 1)
            },
            teardown: function() {
                var r = this.ownerDocument || this.document || this
                  , i = Y.access(r, t) - 1;
                i ? Y.access(r, t, i) : (r.removeEventListener(e, n, !0),
                Y.remove(r, t))
            }
        }
    }
    ));
    var bt = e.location
      , wt = {
        guid: Date.now()
    }
      , Ct = /\?/;
    w.parseXML = function(t) {
        var n, r;
        if (!t || "string" != typeof t)
            return null;
        try {
            n = (new e.DOMParser).parseFromString(t, "text/xml")
        } catch (t) {}
        return r = n && n.getElementsByTagName("parsererror")[0],
        n && !r || w.error("Invalid XML: " + (r ? w.map(r.childNodes, (function(e) {
            return e.textContent
        }
        )).join("\n") : t)),
        n
    }
    ;
    var Tt = /\[\]$/
      , At = /\r?\n/g
      , St = /^(?:submit|button|image|reset|file)$/i
      , Et = /^(?:input|select|textarea|keygen)/i;
    function kt(e, t, n, r) {
        var i;
        if (Array.isArray(t))
            w.each(t, (function(t, i) {
                n || Tt.test(e) ? r(e, i) : kt(e + "[" + ("object" == typeof i && null != i ? t : "") + "]", i, n, r)
            }
            ));
        else if (n || "object" !== x(t))
            r(e, t);
        else
            for (i in t)
                kt(e + "[" + i + "]", t[i], n, r)
    }
    w.param = function(e, t) {
        var n, r = [], i = function(e, t) {
            var n = h(t) ? t() : t;
            r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
        };
        if (null == e)
            return "";
        if (Array.isArray(e) || e.jquery && !w.isPlainObject(e))
            w.each(e, (function() {
                i(this.name, this.value)
            }
            ));
        else
            for (n in e)
                kt(n, e[n], t, i);
        return r.join("&")
    }
    ,
    w.fn.extend({
        serialize: function() {
            return w.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map((function() {
                var e = w.prop(this, "elements");
                return e ? w.makeArray(e) : this
            }
            )).filter((function() {
                var e = this.type;
                return this.name && !w(this).is(":disabled") && Et.test(this.nodeName) && !St.test(e) && (this.checked || !pe.test(e))
            }
            )).map((function(e, t) {
                var n = w(this).val();
                return null == n ? null : Array.isArray(n) ? w.map(n, (function(e) {
                    return {
                        name: t.name,
                        value: e.replace(At, "\r\n")
                    }
                }
                )) : {
                    name: t.name,
                    value: n.replace(At, "\r\n")
                }
            }
            )).get()
        }
    });
    var Nt = /%20/g
      , jt = /#.*$/
      , Dt = /([?&])_=[^&]*/
      , Lt = /^(.*?):[ \t]*([^\r\n]*)$/gm
      , qt = /^(?:GET|HEAD)$/
      , Pt = /^\/\//
      , Ot = {}
      , Ht = {}
      , Rt = "*/".concat("*")
      , Mt = v.createElement("a");
    function Bt(e) {
        return function(t, n) {
            "string" != typeof t && (n = t,
            t = "*");
            var r, i = 0, o = t.toLowerCase().match(H) || [];
            if (h(n))
                for (; r = o[i++]; )
                    "+" === r[0] ? (r = r.slice(1) || "*",
                    (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
        }
    }
    function It(e, t, n, r) {
        var i = {}
          , o = e === Ht;
        function s(a) {
            var u;
            return i[a] = !0,
            w.each(e[a] || [], (function(e, a) {
                var l = a(t, n, r);
                return "string" != typeof l || o || i[l] ? o ? !(u = l) : void 0 : (t.dataTypes.unshift(l),
                s(l),
                !1)
            }
            )),
            u
        }
        return s(t.dataTypes[0]) || !i["*"] && s("*")
    }
    function _t(e, t) {
        var n, r, i = w.ajaxSettings.flatOptions || {};
        for (n in t)
            void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
        return r && w.extend(!0, e, r),
        e
    }
    Mt.href = bt.href,
    w.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: bt.href,
            type: "GET",
            isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(bt.protocol),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Rt,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /\bxml\b/,
                html: /\bhtml/,
                json: /\bjson\b/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": JSON.parse,
                "text xml": w.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? _t(_t(e, w.ajaxSettings), t) : _t(w.ajaxSettings, e)
        },
        ajaxPrefilter: Bt(Ot),
        ajaxTransport: Bt(Ht),
        ajax: function(t, n) {
            "object" == typeof t && (n = t,
            t = void 0),
            n = n || {};
            var r, i, o, s, a, u, l, c, f, p, d = w.ajaxSetup({}, n), h = d.context || d, g = d.context && (h.nodeType || h.jquery) ? w(h) : w.event, m = w.Deferred(), y = w.Callbacks("once memory"), x = d.statusCode || {}, b = {}, C = {}, T = "canceled", A = {
                readyState: 0,
                getResponseHeader: function(e) {
                    var t;
                    if (l) {
                        if (!s)
                            for (s = {}; t = Lt.exec(o); )
                                s[t[1].toLowerCase() + " "] = (s[t[1].toLowerCase() + " "] || []).concat(t[2]);
                        t = s[e.toLowerCase() + " "]
                    }
                    return null == t ? null : t.join(", ")
                },
                getAllResponseHeaders: function() {
                    return l ? o : null
                },
                setRequestHeader: function(e, t) {
                    return null == l && (e = C[e.toLowerCase()] = C[e.toLowerCase()] || e,
                    b[e] = t),
                    this
                },
                overrideMimeType: function(e) {
                    return null == l && (d.mimeType = e),
                    this
                },
                statusCode: function(e) {
                    var t;
                    if (e)
                        if (l)
                            A.always(e[A.status]);
                        else
                            for (t in e)
                                x[t] = [x[t], e[t]];
                    return this
                },
                abort: function(e) {
                    var t = e || T;
                    return r && r.abort(t),
                    S(0, t),
                    this
                }
            };
            if (m.promise(A),
            d.url = ((t || d.url || bt.href) + "").replace(Pt, bt.protocol + "//"),
            d.type = n.method || n.type || d.method || d.type,
            d.dataTypes = (d.dataType || "*").toLowerCase().match(H) || [""],
            null == d.crossDomain) {
                u = v.createElement("a");
                try {
                    u.href = d.url,
                    u.href = u.href,
                    d.crossDomain = Mt.protocol + "//" + Mt.host != u.protocol + "//" + u.host
                } catch (t) {
                    d.crossDomain = !0
                }
            }
            if (d.data && d.processData && "string" != typeof d.data && (d.data = w.param(d.data, d.traditional)),
            It(Ot, d, n, A),
            l)
                return A;
            for (f in (c = w.event && d.global) && 0 == w.active++ && w.event.trigger("ajaxStart"),
            d.type = d.type.toUpperCase(),
            d.hasContent = !qt.test(d.type),
            i = d.url.replace(jt, ""),
            d.hasContent ? d.data && d.processData && 0 === (d.contentType || "").indexOf("application/x-www-form-urlencoded") && (d.data = d.data.replace(Nt, "+")) : (p = d.url.slice(i.length),
            d.data && (d.processData || "string" == typeof d.data) && (i += (Ct.test(i) ? "&" : "?") + d.data,
            delete d.data),
            !1 === d.cache && (i = i.replace(Dt, "$1"),
            p = (Ct.test(i) ? "&" : "?") + "_=" + wt.guid++ + p),
            d.url = i + p),
            d.ifModified && (w.lastModified[i] && A.setRequestHeader("If-Modified-Since", w.lastModified[i]),
            w.etag[i] && A.setRequestHeader("If-None-Match", w.etag[i])),
            (d.data && d.hasContent && !1 !== d.contentType || n.contentType) && A.setRequestHeader("Content-Type", d.contentType),
            A.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + Rt + "; q=0.01" : "") : d.accepts["*"]),
            d.headers)
                A.setRequestHeader(f, d.headers[f]);
            if (d.beforeSend && (!1 === d.beforeSend.call(h, A, d) || l))
                return A.abort();
            if (T = "abort",
            y.add(d.complete),
            A.done(d.success),
            A.fail(d.error),
            r = It(Ht, d, n, A)) {
                if (A.readyState = 1,
                c && g.trigger("ajaxSend", [A, d]),
                l)
                    return A;
                d.async && 0 < d.timeout && (a = e.setTimeout((function() {
                    A.abort("timeout")
                }
                ), d.timeout));
                try {
                    l = !1,
                    r.send(b, S)
                } catch (t) {
                    if (l)
                        throw t;
                    S(-1, t)
                }
            } else
                S(-1, "No Transport");
            function S(t, n, s, u) {
                var f, p, v, b, C, T = n;
                l || (l = !0,
                a && e.clearTimeout(a),
                r = void 0,
                o = u || "",
                A.readyState = 0 < t ? 4 : 0,
                f = 200 <= t && t < 300 || 304 === t,
                s && (b = function(e, t, n) {
                    for (var r, i, o, s, a = e.contents, u = e.dataTypes; "*" === u[0]; )
                        u.shift(),
                        void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
                    if (r)
                        for (i in a)
                            if (a[i] && a[i].test(r)) {
                                u.unshift(i);
                                break
                            }
                    if (u[0]in n)
                        o = u[0];
                    else {
                        for (i in n) {
                            if (!u[0] || e.converters[i + " " + u[0]]) {
                                o = i;
                                break
                            }
                            s || (s = i)
                        }
                        o = o || s
                    }
                    if (o)
                        return o !== u[0] && u.unshift(o),
                        n[o]
                }(d, A, s)),
                !f && -1 < w.inArray("script", d.dataTypes) && w.inArray("json", d.dataTypes) < 0 && (d.converters["text script"] = function() {}
                ),
                b = function(e, t, n, r) {
                    var i, o, s, a, u, l = {}, c = e.dataTypes.slice();
                    if (c[1])
                        for (s in e.converters)
                            l[s.toLowerCase()] = e.converters[s];
                    for (o = c.shift(); o; )
                        if (e.responseFields[o] && (n[e.responseFields[o]] = t),
                        !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)),
                        u = o,
                        o = c.shift())
                            if ("*" === o)
                                o = u;
                            else if ("*" !== u && u !== o) {
                                if (!(s = l[u + " " + o] || l["* " + o]))
                                    for (i in l)
                                        if ((a = i.split(" "))[1] === o && (s = l[u + " " + a[0]] || l["* " + a[0]])) {
                                            !0 === s ? s = l[i] : !0 !== l[i] && (o = a[0],
                                            c.unshift(a[1]));
                                            break
                                        }
                                if (!0 !== s)
                                    if (s && e.throws)
                                        t = s(t);
                                    else
                                        try {
                                            t = s(t)
                                        } catch (e) {
                                            return {
                                                state: "parsererror",
                                                error: s ? e : "No conversion from " + u + " to " + o
                                            }
                                        }
                            }
                    return {
                        state: "success",
                        data: t
                    }
                }(d, b, A, f),
                f ? (d.ifModified && ((C = A.getResponseHeader("Last-Modified")) && (w.lastModified[i] = C),
                (C = A.getResponseHeader("etag")) && (w.etag[i] = C)),
                204 === t || "HEAD" === d.type ? T = "nocontent" : 304 === t ? T = "notmodified" : (T = b.state,
                p = b.data,
                f = !(v = b.error))) : (v = T,
                !t && T || (T = "error",
                t < 0 && (t = 0))),
                A.status = t,
                A.statusText = (n || T) + "",
                f ? m.resolveWith(h, [p, T, A]) : m.rejectWith(h, [A, T, v]),
                A.statusCode(x),
                x = void 0,
                c && g.trigger(f ? "ajaxSuccess" : "ajaxError", [A, d, f ? p : v]),
                y.fireWith(h, [A, T]),
                c && (g.trigger("ajaxComplete", [A, d]),
                --w.active || w.event.trigger("ajaxStop")))
            }
            return A
        },
        getJSON: function(e, t, n) {
            return w.get(e, t, n, "json")
        },
        getScript: function(e, t) {
            return w.get(e, void 0, t, "script")
        }
    }),
    w.each(["get", "post"], (function(e, t) {
        w[t] = function(e, n, r, i) {
            return h(n) && (i = i || r,
            r = n,
            n = void 0),
            w.ajax(w.extend({
                url: e,
                type: t,
                dataType: i,
                data: n,
                success: r
            }, w.isPlainObject(e) && e))
        }
    }
    )),
    w.ajaxPrefilter((function(e) {
        var t;
        for (t in e.headers)
            "content-type" === t.toLowerCase() && (e.contentType = e.headers[t] || "")
    }
    )),
    w._evalUrl = function(e, t, n) {
        return w.ajax({
            url: e,
            type: "GET",
            dataType: "script",
            cache: !0,
            async: !1,
            global: !1,
            converters: {
                "text script": function() {}
            },
            dataFilter: function(e) {
                w.globalEval(e, t, n)
            }
        })
    }
    ,
    w.fn.extend({
        wrapAll: function(e) {
            var t;
            return this[0] && (h(e) && (e = e.call(this[0])),
            t = w(e, this[0].ownerDocument).eq(0).clone(!0),
            this[0].parentNode && t.insertBefore(this[0]),
            t.map((function() {
                for (var e = this; e.firstElementChild; )
                    e = e.firstElementChild;
                return e
            }
            )).append(this)),
            this
        },
        wrapInner: function(e) {
            return h(e) ? this.each((function(t) {
                w(this).wrapInner(e.call(this, t))
            }
            )) : this.each((function() {
                var t = w(this)
                  , n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            }
            ))
        },
        wrap: function(e) {
            var t = h(e);
            return this.each((function(n) {
                w(this).wrapAll(t ? e.call(this, n) : e)
            }
            ))
        },
        unwrap: function(e) {
            return this.parent(e).not("body").each((function() {
                w(this).replaceWith(this.childNodes)
            }
            )),
            this
        }
    }),
    w.expr.pseudos.hidden = function(e) {
        return !w.expr.pseudos.visible(e)
    }
    ,
    w.expr.pseudos.visible = function(e) {
        return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
    }
    ,
    w.ajaxSettings.xhr = function() {
        try {
            return new e.XMLHttpRequest
        } catch (e) {}
    }
    ;
    var Wt = {
        0: 200,
        1223: 204
    }
      , Ft = w.ajaxSettings.xhr();
    d.cors = !!Ft && "withCredentials"in Ft,
    d.ajax = Ft = !!Ft,
    w.ajaxTransport((function(t) {
        var n, r;
        if (d.cors || Ft && !t.crossDomain)
            return {
                send: function(i, o) {
                    var s, a = t.xhr();
                    if (a.open(t.type, t.url, t.async, t.username, t.password),
                    t.xhrFields)
                        for (s in t.xhrFields)
                            a[s] = t.xhrFields[s];
                    for (s in t.mimeType && a.overrideMimeType && a.overrideMimeType(t.mimeType),
                    t.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest"),
                    i)
                        a.setRequestHeader(s, i[s]);
                    n = function(e) {
                        return function() {
                            n && (n = r = a.onload = a.onerror = a.onabort = a.ontimeout = a.onreadystatechange = null,
                            "abort" === e ? a.abort() : "error" === e ? "number" != typeof a.status ? o(0, "error") : o(a.status, a.statusText) : o(Wt[a.status] || a.status, a.statusText, "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? {
                                binary: a.response
                            } : {
                                text: a.responseText
                            }, a.getAllResponseHeaders()))
                        }
                    }
                    ,
                    a.onload = n(),
                    r = a.onerror = a.ontimeout = n("error"),
                    void 0 !== a.onabort ? a.onabort = r : a.onreadystatechange = function() {
                        4 === a.readyState && e.setTimeout((function() {
                            n && r()
                        }
                        ))
                    }
                    ,
                    n = n("abort");
                    try {
                        a.send(t.hasContent && t.data || null)
                    } catch (i) {
                        if (n)
                            throw i
                    }
                },
                abort: function() {
                    n && n()
                }
            }
    }
    )),
    w.ajaxPrefilter((function(e) {
        e.crossDomain && (e.contents.script = !1)
    }
    )),
    w.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /\b(?:java|ecma)script\b/
        },
        converters: {
            "text script": function(e) {
                return w.globalEval(e),
                e
            }
        }
    }),
    w.ajaxPrefilter("script", (function(e) {
        void 0 === e.cache && (e.cache = !1),
        e.crossDomain && (e.type = "GET")
    }
    )),
    w.ajaxTransport("script", (function(e) {
        var t, n;
        if (e.crossDomain || e.scriptAttrs)
            return {
                send: function(r, i) {
                    t = w("<script>").attr(e.scriptAttrs || {}).prop({
                        charset: e.scriptCharset,
                        src: e.url
                    }).on("load error", n = function(e) {
                        t.remove(),
                        n = null,
                        e && i("error" === e.type ? 404 : 200, e.type)
                    }
                    ),
                    v.head.appendChild(t[0])
                },
                abort: function() {
                    n && n()
                }
            }
    }
    ));
    var $t, zt = [], Ut = /(=)\?(?=&|$)|\?\?/;
    w.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = zt.pop() || w.expando + "_" + wt.guid++;
            return this[e] = !0,
            e
        }
    }),
    w.ajaxPrefilter("json jsonp", (function(t, n, r) {
        var i, o, s, a = !1 !== t.jsonp && (Ut.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Ut.test(t.data) && "data");
        if (a || "jsonp" === t.dataTypes[0])
            return i = t.jsonpCallback = h(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback,
            a ? t[a] = t[a].replace(Ut, "$1" + i) : !1 !== t.jsonp && (t.url += (Ct.test(t.url) ? "&" : "?") + t.jsonp + "=" + i),
            t.converters["script json"] = function() {
                return s || w.error(i + " was not called"),
                s[0]
            }
            ,
            t.dataTypes[0] = "json",
            o = e[i],
            e[i] = function() {
                s = arguments
            }
            ,
            r.always((function() {
                void 0 === o ? w(e).removeProp(i) : e[i] = o,
                t[i] && (t.jsonpCallback = n.jsonpCallback,
                zt.push(i)),
                s && h(o) && o(s[0]),
                s = o = void 0
            }
            )),
            "script"
    }
    )),
    d.createHTMLDocument = (($t = v.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>",
    2 === $t.childNodes.length),
    w.parseHTML = function(e, t, n) {
        return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t,
        t = !1),
        t || (d.createHTMLDocument ? ((r = (t = v.implementation.createHTMLDocument("")).createElement("base")).href = v.location.href,
        t.head.appendChild(r)) : t = v),
        o = !n && [],
        (i = N.exec(e)) ? [t.createElement(i[1])] : (i = xe([e], t, o),
        o && o.length && w(o).remove(),
        w.merge([], i.childNodes)));
        var r, i, o
    }
    ,
    w.fn.load = function(e, t, n) {
        var r, i, o, s = this, a = e.indexOf(" ");
        return -1 < a && (r = ht(e.slice(a)),
        e = e.slice(0, a)),
        h(t) ? (n = t,
        t = void 0) : t && "object" == typeof t && (i = "POST"),
        0 < s.length && w.ajax({
            url: e,
            type: i || "GET",
            dataType: "html",
            data: t
        }).done((function(e) {
            o = arguments,
            s.html(r ? w("<div>").append(w.parseHTML(e)).find(r) : e)
        }
        )).always(n && function(e, t) {
            s.each((function() {
                n.apply(this, o || [e.responseText, t, e])
            }
            ))
        }
        ),
        this
    }
    ,
    w.expr.pseudos.animated = function(e) {
        return w.grep(w.timers, (function(t) {
            return e === t.elem
        }
        )).length
    }
    ,
    w.offset = {
        setOffset: function(e, t, n) {
            var r, i, o, s, a, u, l = w.css(e, "position"), c = w(e), f = {};
            "static" === l && (e.style.position = "relative"),
            a = c.offset(),
            o = w.css(e, "top"),
            u = w.css(e, "left"),
            ("absolute" === l || "fixed" === l) && -1 < (o + u).indexOf("auto") ? (s = (r = c.position()).top,
            i = r.left) : (s = parseFloat(o) || 0,
            i = parseFloat(u) || 0),
            h(t) && (t = t.call(e, n, w.extend({}, a))),
            null != t.top && (f.top = t.top - a.top + s),
            null != t.left && (f.left = t.left - a.left + i),
            "using"in t ? t.using.call(e, f) : c.css(f)
        }
    },
    w.fn.extend({
        offset: function(e) {
            if (arguments.length)
                return void 0 === e ? this : this.each((function(t) {
                    w.offset.setOffset(this, e, t)
                }
                ));
            var t, n, r = this[0];
            return r ? r.getClientRects().length ? (t = r.getBoundingClientRect(),
            n = r.ownerDocument.defaultView,
            {
                top: t.top + n.pageYOffset,
                left: t.left + n.pageXOffset
            }) : {
                top: 0,
                left: 0
            } : void 0
        },
        position: function() {
            if (this[0]) {
                var e, t, n, r = this[0], i = {
                    top: 0,
                    left: 0
                };
                if ("fixed" === w.css(r, "position"))
                    t = r.getBoundingClientRect();
                else {
                    for (t = this.offset(),
                    n = r.ownerDocument,
                    e = r.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === w.css(e, "position"); )
                        e = e.parentNode;
                    e && e !== r && 1 === e.nodeType && ((i = w(e).offset()).top += w.css(e, "borderTopWidth", !0),
                    i.left += w.css(e, "borderLeftWidth", !0))
                }
                return {
                    top: t.top - i.top - w.css(r, "marginTop", !0),
                    left: t.left - i.left - w.css(r, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map((function() {
                for (var e = this.offsetParent; e && "static" === w.css(e, "position"); )
                    e = e.offsetParent;
                return e || re
            }
            ))
        }
    }),
    w.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, (function(e, t) {
        var n = "pageYOffset" === t;
        w.fn[e] = function(r) {
            return F(this, (function(e, r, i) {
                var o;
                if (g(e) ? o = e : 9 === e.nodeType && (o = e.defaultView),
                void 0 === i)
                    return o ? o[t] : e[r];
                o ? o.scrollTo(n ? o.pageXOffset : i, n ? i : o.pageYOffset) : e[r] = i
            }
            ), e, r, arguments.length)
        }
    }
    )),
    w.each(["top", "left"], (function(e, t) {
        w.cssHooks[t] = _e(d.pixelPosition, (function(e, n) {
            if (n)
                return n = Ie(e, t),
                He.test(n) ? w(e).position()[t] + "px" : n
        }
        ))
    }
    )),
    w.each({
        Height: "height",
        Width: "width"
    }, (function(e, t) {
        w.each({
            padding: "inner" + e,
            content: t,
            "": "outer" + e
        }, (function(n, r) {
            w.fn[r] = function(i, o) {
                var s = arguments.length && (n || "boolean" != typeof i)
                  , a = n || (!0 === i || !0 === o ? "margin" : "border");
                return F(this, (function(t, n, i) {
                    var o;
                    return g(t) ? 0 === r.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement,
                    Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? w.css(t, n, a) : w.style(t, n, i, a)
                }
                ), t, s ? i : void 0, s)
            }
        }
        ))
    }
    )),
    w.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], (function(e, t) {
        w.fn[t] = function(e) {
            return this.on(t, e)
        }
    }
    )),
    w.fn.extend({
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, r) {
            return this.on(t, e, n, r)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        },
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        }
    }),
    w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), (function(e, t) {
        w.fn[t] = function(e, n) {
            return 0 < arguments.length ? this.on(t, null, e, n) : this.trigger(t)
        }
    }
    ));
    var Xt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
    w.proxy = function(e, t) {
        var n, r, o;
        if ("string" == typeof t && (n = e[t],
        t = e,
        e = n),
        h(e))
            return r = i.call(arguments, 2),
            (o = function() {
                return e.apply(t || this, r.concat(i.call(arguments)))
            }
            ).guid = e.guid = e.guid || w.guid++,
            o
    }
    ,
    w.holdReady = function(e) {
        e ? w.readyWait++ : w.ready(!0)
    }
    ,
    w.isArray = Array.isArray,
    w.parseJSON = JSON.parse,
    w.nodeName = k,
    w.isFunction = h,
    w.isWindow = g,
    w.camelCase = X,
    w.type = x,
    w.now = Date.now,
    w.isNumeric = function(e) {
        var t = w.type(e);
        return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
    }
    ,
    w.trim = function(e) {
        return null == e ? "" : (e + "").replace(Xt, "")
    }
    ,
    "function" == typeof define && define.amd && define("jquery", [], (function() {
        return w
    }
    ));
    var Vt = e.jQuery
      , Gt = e.$;
    return w.noConflict = function(t) {
        return e.$ === w && (e.$ = Gt),
        t && e.jQuery === w && (e.jQuery = Vt),
        w
    }
    ,
    void 0 === t && (e.jQuery = e.$ = w),
    w
}
)),
function(e) {
    "use strict";
    e(window);
    var t, n, r, i, o, s = e("body");
    function a(e) {
        let t = e.currentTarget
          , n = document.createElement("span")
          , r = Math.max(t.clientWidth, t.clientHeight)
          , i = r / 2;
        n.style.width = n.style.height = `${r}px`,
        n.style.left = e.clientX - t.offsetLeft - i + "px",
        n.style.top = e.clientY - t.offsetTop - i + "px",
        n.classList.add("ripple");
        let o = t.getElementsByClassName("ripple")[0];
        o && o.remove(),
        t.appendChild(n)
    }
    e(window).on("scroll", (function() {
        0 > e(window).scrollTop() ? e(".user-event-area").removeClass("sticky") : e(".user-event-area").addClass("sticky")
    }
    )),
    n = e(".offcanvas-toggle"),
    r = e(".offcanvas"),
    i = e(".offcanvas-overlay"),
    o = e(".mobile-menu-toggle"),
    n.on("click", (function(t) {
        t.preventDefault();
        var n = e(this)
          , r = n.attr("href");
        s.addClass("offcanvas-open"),
        e(r).addClass("offcanvas-open"),
        i.fadeIn(),
        n.parent().hasClass("mobile-menu-toggle") && n.addClass("close")
    }
    )),
    e(".offcanvas-close, .offcanvas-overlay").on("click", (function(e) {
        e.preventDefault(),
        s.removeClass("offcanvas-open"),
        r.removeClass("offcanvas-open"),
        i.fadeOut(),
        o.find("a").removeClass("close")
    }
    )),
    (t = e(".offcanvas-menu")).find(".mobile-sub-menu").parent().prepend('<div class="offcanvas-menu-expand"></div>'),
    t.on("click", "li a, .offcanvas-menu-expand", (function(t) {
        var n = e(this);
        ("#" === n.attr("href") || n.hasClass("offcanvas-menu-expand")) && (t.preventDefault(),
        n.siblings("ul:visible").length ? (n.parent("li").removeClass("active"),
        n.siblings("ul").slideUp(),
        n.parent("li").find("li").removeClass("active"),
        n.parent("li").find("ul:visible").slideUp()) : (n.parent("li").addClass("active"),
        n.closest("li").siblings("li").removeClass("active").find("li").removeClass("active"),
        n.closest("li").siblings("li").find("ul:visible").slideUp(),
        n.siblings("ul").slideDown()))
    }
    ));
    let u = document.querySelectorAll(".btn");
    for (let e of u)
        e.addEventListener("click", a);
    new Swiper(".hero-slider-active .swiper",{
        slidesPerView: 1,
        speed: 1500,
        watchSlidesProgress: !0,
        loop: !0,
        spaceBetween: 5,
        pagination: {
            el: ".swiper-pagination",
            clickable: !0
        }
    }),
    new Swiper(".catagories-nav-1 .swiper",{
        slidesPerView: "auto",
        spaceBetween: 12,
        speed: 1500,
        loop: !1
    }),
    new Swiper(".catagories-nav-2 .swiper",{
        slidesPerView: "auto",
        spaceBetween: 8,
        speed: 1500,
        loop: !0
    }),
    e(".num-in span").click((function() {
        var t = e(this).parents(".num-block").find("input.in-num");
        if (e(this).hasClass("minus")) {
            (n = (n = parseFloat(t.val()) - 1) < 1 ? 1 : n) < 2 ? e(this).addClass("dis") : e(this).removeClass("dis"),
            t.val(n)
        } else {
            var n = parseFloat(t.val()) + 1;
            t.val(n),
            n > 1 && e(this).parents(".num-block").find(".minus").removeClass("dis")
        }
        return t.change(),
        !1
    }
    )),
    e("#filter-trigger").on("click", (function(t) {
        t.stopPropagation(),
        e("#shop-filter-menu").slideToggle()
    }
    )),
    e("#shop-filter-slideup").on("click", (function(t) {
        t.stopPropagation(),
        e("#shop-filter-menu").slideUp()
    }
    )),
    e.fn.elExists = function() {
        return this.length > 0
    }
    ,
    e("#price-range-slider").elExists() && e("#price-range-slider").ionRangeSlider({
        type: "double",
        skin: "round",
        hide_min_max: !0,
        min: 0,
        max: 500,
        from: 50,
        to: 440
    }),
    new Swiper(".product-gallery-image .swiper",{
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 1500,
        loop: !0,
        pagination: {
            el: ".swiper-pagination",
            clickable: !0
        }
    });
    var l = new Swiper(".product-thumb-image .swiper",{
        slidesPerView: 3,
        spaceBetween: 0,
        watchSlidesProgress: !0
    });
    new Swiper(".product-gallery-large .swiper",{
        spaceBetween: 10,
        thumbs: {
            swiper: l
        },
        navigation: {
            nextEl: ".text-button-next",
            prevEl: ".text-button-prev"
        }
    }),
    e(".short-btn").click((function() {
        e(".short-section").slideToggle("slow")
    }
    )),
    document.querySelectorAll(".single-product-item").forEach((function(e) {
        e.addEventListener("touchstart", p, !1)
    }
    )),
    document.querySelectorAll(".single-product-item").forEach((function(e) {
        e.addEventListener("touchmove", d, !1)
    }
    ));
    var c = null
      , f = null;
    function p(e) {
        var t;
        let n = ((t = e).touches || t.originalEvent.touches)[0];
        c = n.clientX,
        f = n.clientY
    }
    function d(t) {
        if (c && f) {
            var n = t.touches[0].clientX
              , r = t.touches[0].clientY
              , i = c - n
              , o = f - r;
            console.log(i),
            Math.abs(i) > Math.abs(o) && i > 0 && (e(this)[0].classList.add("active"),
            window.on,
            setTimeout((()=>{
                e(this)[0].classList.remove("active")
            }
            ), 3e3)),
            c = null,
            f = null
        }
    }
}(jQuery);
