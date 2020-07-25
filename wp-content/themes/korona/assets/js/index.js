!function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? e(exports) : "function" == typeof define && define.amd ? define(
        "GOVUKFrontend",
        ["exports"],
        e) : e(t.GOVUKFrontend = {})
}(this, function (t) {
    "use strict";

    function r(t, e) {
        if (window.NodeList.prototype.forEach) return t.forEach(e);
        for (var n = 0; n < t.length; n++) e.call(window, t[n], n, t)
    }

    function n(t) {
        this.$module = t, this.moduleId = t.getAttribute("id"), this.$sections = t.querySelectorAll(
            ".govuk-accordion__section"), this.$openAllButton = "", this.browserSupportsSessionStorage = e.checkForSessionStorage(), this.controlsClass = "govuk-accordion__controls", this.openAllClass = "govuk-accordion__open-all", this.iconClass = "govuk-accordion__icon", this.sectionHeaderClass = "govuk-accordion__section-header", this.sectionHeaderFocusedClass = "govuk-accordion__section-header--focused", this.sectionHeadingClass = "govuk-accordion__section-heading", this.sectionSummaryClass = "govuk-accordion__section-summary", this.sectionButtonClass = "govuk-accordion__section-button", this.sectionExpandedClass = "govuk-accordion__section--expanded"
    }

    (function (t) {
        var a, c, l, u;
        "defineProperty" in Object && function () {
            try {
                return Object.defineProperty({}, "test", {value: 42}), !0
            } catch (t) {
                return !1
            }
        }() || (a = Object.defineProperty, c = Object.prototype.hasOwnProperty("__defineGetter__"), l = "Getters & setters cannot be defined on this javascript engine", u = "A property cannot both have accessors and be writable or have a value", Object.defineProperty = function (t, e, n) {
            if (a && (t === window || t === document || t === Element.prototype || t instanceof Element)) return a(t,
                e,
                n);
            if (null === t || !(t instanceof Object || "object" == typeof t)) throw new TypeError(
                "Object.defineProperty called on non-object");
            if (!(n instanceof Object)) throw new TypeError("Property description must be an object");
            var o = String(e), i = "value" in n || "writable" in n, r = "get" in n && typeof n.get,
                s = "set" in n && typeof n.set;
            if (r) {
                if ("function" !== r) throw new TypeError("Getter must be a function");
                if (!c) throw new TypeError(l);
                if (i) throw new TypeError(u);
                Object.__defineGetter__.call(t, o, n.get)
            } else t[o] = n.value;
            if (s) {
                if ("function" !== s) throw new TypeError("Setter must be a function");
                if (!c) throw new TypeError(l);
                if (i) throw new TypeError(u);
                Object.__defineSetter__.call(t, o, n.set)
            }
            return "value" in n && (t[o] = n.value), t
        })
    }).call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (t) {
        "bind" in Function.prototype || Object.defineProperty(Function.prototype, "bind", {
            value: function (e) {
                var n, t = Array, o = Object, i = o.prototype, r = t.prototype, s = function s() {
                    }, a = i.toString, c = "function" == typeof Symbol && "symbol" == typeof Symbol.toStringTag,
                    l = Function.prototype.toString, u = function u(t) {
                        try {
                            return l.call(t), !0
                        } catch (e) {
                            return !1
                        }
                    };
                n = function n(t) {
                    if ("function" != typeof t) return !1;
                    if (c) return u(t);
                    var e = a.call(t);
                    return "[object Function]" === e || "[object GeneratorFunction]" === e
                };
                var d = r.slice, p = r.concat, h = r.push, f = Math.max, b = this;
                if (!n(b)) throw new TypeError("Function.prototype.bind called on incompatible " + b);
                for (var m, y = d.call(arguments, 1), v = f(0,
                    b.length - y.length), g = [], w = 0; w < v; w++) h.call(g, "$" + w);
                return m = Function("binder",
                    "return function (" + g.join(",") + "){ return binder.apply(this, arguments); }")(
                    function () {
                        if (this instanceof m) {
                            var t = b.apply(this, p.call(y, d.call(arguments)));
                            return o(t) === t ? t : this
                        }
                        return b.apply(e, p.call(y, d.call(arguments)))
                    }), b.prototype && (s.prototype = b.prototype, m.prototype = new s, s.prototype = null), m
            }
        })
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (o) {
        var t, e, n;
        "DOMTokenList" in this && (!("classList" in (t = document.createElement("x"))) || !t.classList.toggle("x",
            !1) && !t.className) || ("DOMTokenList" in (e = this) && e.DOMTokenList && (!document.createElementNS || !document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg") || document.createElementNS("http://www.w3.org/2000/svg",
            "svg").classList instanceof DOMTokenList) || (e.DOMTokenList = function () {
            var i = !0, n = function (t, e, n, o) {
                Object.defineProperty ? Object.defineProperty(t,
                    e,
                    {
                        configurable: !1 === i || !!o,
                        get: n
                    }) : t.__defineGetter__(e, n)
            };
            try {
                n({}, "support")
            } catch (t) {
                i = !1
            }
            return function (i, r) {
                var s = this, a = [], c = {}, l = 0, t = 0, e = function (t) {
                    n(s, t, function () {
                        return d(), a[t]
                    }, !1)
                }, u = function () {
                    if (t <= l) for (; t < l; ++t) e(t)
                }, d = function () {
                    var t, e, n = arguments, o = /\s+/;
                    if (n.length) for (e = 0; e < n.length; ++e) if (o.test(n[e])) throw(t = new SyntaxError('String "' + n[e] + '" contains an invalid character')).code = 5, t.name = "InvalidCharacterError", t;
                    for ("" === (a = "object" == typeof i[r] ? ("" + i[r].baseVal).replace(/^\s+|\s+$/g,
                        "").split(o) : ("" + i[r]).replace(/^\s+|\s+$/g,
                        "").split(o))[0] && (a = []), c = {}, e = 0; e < a.length; ++e) c[a[e]] = !0;
                    l = a.length, u()
                };
                return d(), n(s, "length", function () {
                    return d(), l
                }), s.toLocaleString = s.toString = function () {
                    return d(), a.join(" ")
                }, s.item = function (t) {
                    return d(), a[t]
                }, s.contains = function (t) {
                    return d(), !!c[t]
                }, s.add = function () {
                    d.apply(s, t = arguments);
                    for (var t, e, n = 0, o = t.length; n < o; ++n) c[e = t[n]] || (a.push(e), c[e] = !0);
                    l !== a.length && (l = a.length >>> 0, "object" == typeof i[r] ? i[r].baseVal = a.join(" ") : i[r] = a.join(
                        " "), u())
                }, s.remove = function () {
                    d.apply(s, t = arguments);
                    for (var t, e = {}, n = 0, o = []; n < t.length; ++n) e[t[n]] = !0, delete c[t[n]];
                    for (n = 0; n < a.length; ++n) e[a[n]] || o.push(a[n]);
                    l = (a = o).length >>> 0, "object" == typeof i[r] ? i[r].baseVal = a.join(" ") : i[r] = a.join(" "), u()
                }, s.toggle = function (t, e) {
                    return d.apply(s,
                        [t]), o !== e ? e ? (s.add(t), !0) : (s.remove(t), !1) : c[t] ? (s.remove(t), !1) : (s.add(t), !0)
                }, s
            }
        }()), "classList" in (n = document.createElement("span")) && (n.classList.toggle("x", !1), n.classList.contains(
            "x") && (n.classList.constructor.prototype.toggle = function (t) {
            var e = arguments[1];
            if (e !== o) return this[(e = !!e) ? "add" : "remove"](t), e;
            var n = !this.contains(t);
            return this[n ? "add" : "remove"](t), n
        })), function () {
            var t = document.createElement("span");
            if ("classList" in t && (t.classList.add("a", "b"), !t.classList.contains("b"))) {
                var o = t.classList.constructor.prototype.add;
                t.classList.constructor.prototype.add = function () {
                    for (var t = arguments, e = arguments.length, n = 0; n < e; n++) o.call(this, t[n])
                }
            }
        }(), function () {
            var t = document.createElement("span");
            if ("classList" in t && (t.classList.add("a"), t.classList.add("b"), t.classList.remove("a",
                "b"), t.classList.contains("b"))) {
                var o = t.classList.constructor.prototype.remove;
                t.classList.constructor.prototype.remove = function () {
                    for (var t = arguments, e = arguments.length, n = 0; n < e; n++) o.call(this, t[n])
                }
            }
        }())
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (t) {
        "Document" in this || "undefined" == typeof WorkerGlobalScope && "function" != typeof importScripts && (this.HTMLDocument ? this.Document = this.HTMLDocument : (this.Document = this.HTMLDocument = document.constructor = new Function(
            "return function Document() {}")(), this.Document.prototype = document))
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (t) {
        "Element" in this && "HTMLElement" in this || function () {
            if (!window.Element || window.HTMLElement) {
                window.Element = window.HTMLElement = new Function("return function Element() {}")();
                var t, e = document.appendChild(document.createElement("body")),
                    n = e.appendChild(document.createElement("iframe")).contentWindow.document,
                    a = Element.prototype = n.appendChild(n.createElement("*")), c = {}, l = function (t, e) {
                        var n, o, i, r = t.childNodes || [], s = -1;
                        if (1 === t.nodeType && t.constructor !== Element) for (n in t.constructor = Element, c) o = c[n], t[n] = o;
                        for (; i = e && r[++s];) l(i, e);
                        return t
                    }, u = document.getElementsByTagName("*"), o = document.createElement, i = 100;
                a.attachEvent("onpropertychange", function (t) {
                    for (var e, n = t.propertyName, o = !c.hasOwnProperty(n), i = a[n], r = c[n], s = -1; e = u[++s];) 1 === e.nodeType && (!o && e[n] !== r || (e[n] = i));
                    c[n] = i
                }), a.constructor = Element, a.hasAttribute || (a.hasAttribute = function (t) {
                    return null !== this.getAttribute(t)
                }), r() || (document.onreadystatechange = r, t = setInterval(r,
                    25)), document.createElement = function (t) {
                    var e = o(String(t).toLowerCase());
                    return l(e)
                }, document.removeChild(e)
            } else window.HTMLElement = window.Element;

            function r() {
                return i-- || clearTimeout(t), !(!document.body || document.body.prototype || !/(complete|interactive)/.test(
                    document.readyState)) && (l(document,
                    !0), t && document.body.prototype && clearTimeout(t), !!document.body.prototype)
            }
        }()
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (t) {
        var e;
        "document" in this && "classList" in document.documentElement && "Element" in this && "classList" in Element.prototype && ((e = document.createElement(
            "span")).classList.add("a", "b"), e.classList.contains("b")) || function (t) {
            var u = !0, d = function (t, e, n, o) {
                Object.defineProperty ? Object.defineProperty(t,
                    e,
                    {
                        configurable: !1 === u || !!o,
                        get: n
                    }) : t.__defineGetter__(e, n)
            };
            try {
                d({}, "support")
            } catch (e) {
                u = !1
            }
            var p = function (t, c, l) {
                d(t.prototype, c, function () {
                    var t, e = this, n = "__defineGetter__DEFINE_PROPERTY" + c;
                    if (e[n]) return t;
                    if (!(e[n] = !0) === u) {
                        for (var o, i = p.mirror || document.createElement("div"), r = i.childNodes, s = r.length, a = 0; a < s; ++a) if (r[a]._R === e) {
                            o = r[a];
                            break
                        }
                        o = o || i.appendChild(document.createElement("div")), t = DOMTokenList.call(o, e, l)
                    } else t = new DOMTokenList(e, l);
                    return d(e, c, function () {
                        return t
                    }), delete e[n], t
                }, !0)
            };
            p(t.Element, "classList", "className"), p(t.HTMLElement, "classList", "className"), p(t.HTMLLinkElement,
                "relList",
                "rel"), p(t.HTMLAnchorElement, "relList", "rel"), p(t.HTMLAreaElement, "relList", "rel")
        }(this)
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), n.prototype.init = function () {
        if (this.$module) {
            this.initControls(), this.initSectionHeaders();
            var t = this.checkIfAllSectionsOpen();
            this.updateOpenAllButton(t)
        }
    }, n.prototype.initControls = function () {
        this.$openAllButton = document.createElement("button"), this.$openAllButton.setAttribute("type",
            "button"), this.$openAllButton.innerHTML = 'Open all <span class="govuk-visually-hidden">sections</span>', this.$openAllButton.setAttribute(
            "class",
            this.openAllClass), this.$openAllButton.setAttribute("aria-expanded",
            "false"), this.$openAllButton.setAttribute("type", "button");
        var t = document.createElement("div");
        t.setAttribute("class", this.controlsClass), t.appendChild(this.$openAllButton), this.$module.insertBefore(t,
            this.$module.firstChild), this.$openAllButton.addEventListener("click",
            this.onOpenOrCloseAllToggle.bind(this))
    }, n.prototype.initSectionHeaders = function () {
        r(this.$sections, function (t, e) {
            var n = t.querySelector("." + this.sectionHeaderClass);
            this.initHeaderAttributes(n, e), this.setExpanded(this.isExpanded(t), t), n.addEventListener("click",
                this.onSectionToggle.bind(this, t)), this.setInitialState(t)
        }.bind(this))
    }, n.prototype.initHeaderAttributes = function (e, t) {
        var n = this, o = e.querySelector("." + this.sectionButtonClass),
            i = e.querySelector("." + this.sectionHeadingClass), r = e.querySelector("." + this.sectionSummaryClass),
            s = document.createElement("button");
        s.setAttribute("type", "button"), s.setAttribute("id", this.moduleId + "-heading-" + (t + 1)), s.setAttribute(
            "aria-controls",
            this.moduleId + "-content-" + (t + 1));
        for (var a = 0; a < o.attributes.length; a++) {
            var c = o.attributes.item(a);
            s.setAttribute(c.nodeName, c.nodeValue)
        }
        s.addEventListener("focusin", function (t) {
            e.classList.contains(n.sectionHeaderFocusedClass) || (e.className += " " + n.sectionHeaderFocusedClass)
        }), s.addEventListener("blur", function (t) {
            e.classList.remove(n.sectionHeaderFocusedClass)
        }), null != r && s.setAttribute("aria-describedby",
            this.moduleId + "-summary-" + (t + 1)), s.innerHTML = o.innerHTML, i.removeChild(o), i.appendChild(s);
        var l = document.createElement("span");
        l.className = this.iconClass, l.setAttribute("aria-hidden", "true"), i.appendChild(l)
    }, n.prototype.onSectionToggle = function (t) {
        var e = this.isExpanded(t);
        this.setExpanded(!e, t), this.storeState(t)
    }, n.prototype.onOpenOrCloseAllToggle = function () {
        var e = this, t = this.$sections, n = !this.checkIfAllSectionsOpen();
        r(t, function (t) {
            e.setExpanded(n, t), e.storeState(t)
        }), e.updateOpenAllButton(n)
    }, n.prototype.setExpanded = function (t, e) {
        e.querySelector("." + this.sectionButtonClass).setAttribute("aria-expanded",
            t), t ? e.classList.add(this.sectionExpandedClass) : e.classList.remove(this.sectionExpandedClass);
        var n = this.checkIfAllSectionsOpen();
        this.updateOpenAllButton(n)
    }, n.prototype.isExpanded = function (t) {
        return t.classList.contains(this.sectionExpandedClass)
    }, n.prototype.checkIfAllSectionsOpen = function () {
        return this.$sections.length === this.$module.querySelectorAll("." + this.sectionExpandedClass).length
    }, n.prototype.updateOpenAllButton = function (t) {
        var e = t ? "Close all" : "Open all";
        e += '<span class="govuk-visually-hidden"> sections</span>', this.$openAllButton.setAttribute("aria-expanded",
            t), this.$openAllButton.innerHTML = e
    };
    var e = {
        checkForSessionStorage: function () {
            var t, e = "this is the test string";
            try {
                return window.sessionStorage.setItem(e,
                    e), t = window.sessionStorage.getItem(e) === e.toString(), window.sessionStorage.removeItem(e), t
            } catch (n) {
                "undefined" != typeof console && "undefined" != typeof console.log || console.log(
                    "Notice: sessionStorage not available.")
            }
        }
    };
    n.prototype.storeState = function (t) {
        if (this.browserSupportsSessionStorage) {
            var e = t.querySelector("." + this.sectionButtonClass);
            if (e) {
                var n = e.getAttribute("aria-controls"), o = e.getAttribute("aria-expanded");
                void 0 !== n || "undefined" != typeof console && "undefined" != typeof console.log || console.error(new Error(
                    "No aria controls present in accordion section heading.")), void 0 !== o || "undefined" != typeof console && "undefined" != typeof console.log || console.error(
                    new Error("No aria expanded present in accordion section heading.")), n && o && window.sessionStorage.setItem(
                    n,
                    o)
            }
        }
    }, n.prototype.setInitialState = function (t) {
        if (this.browserSupportsSessionStorage) {
            var e = t.querySelector("." + this.sectionButtonClass);
            if (e) {
                var n = e.getAttribute("aria-controls"), o = n ? window.sessionStorage.getItem(n) : null;
                null !== o && this.setExpanded("true" === o, t)
            }
        }
    }, function (t) {
        "Window" in this || "undefined" == typeof WorkerGlobalScope && "function" != typeof importScripts && function (t) {
            t.constructor ? t.Window = t.constructor : (t.Window = t.constructor = new Function(
                "return function Window() {}")()).prototype = this
        }(this)
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (r) {
        !function (t) {
            if (!("Event" in t)) return !1;
            if ("function" == typeof t.Event) return !0;
            try {
                return new Event("click"), !0
            } catch (e) {
                return !1
            }
        }(this) && function () {
            var n = {
                click: 1,
                dblclick: 1,
                keyup: 1,
                keypress: 1,
                keydown: 1,
                mousedown: 1,
                mouseup: 1,
                mousemove: 1,
                mouseover: 1,
                mouseenter: 1,
                mouseleave: 1,
                mouseout: 1,
                storage: 1,
                storagecommit: 1,
                textinput: 1
            };
            if ("undefined" != typeof document && "undefined" != typeof window) {
                var t = window.Event && window.Event.prototype || null;
                window.Event = Window.prototype.Event = function (t, e) {
                    if (!t) throw new Error("Not enough arguments");
                    var n;
                    if ("createEvent" in document) {
                        n = document.createEvent("Event");
                        var o = !(!e || e.bubbles === r) && e.bubbles, i = !(!e || e.cancelable === r) && e.cancelable;
                        return n.initEvent(t, o, i), n
                    }
                    return (n = document.createEventObject()).type = t, n.bubbles = !(!e || e.bubbles === r) && e.bubbles, n.cancelable = !(!e || e.cancelable === r) && e.cancelable, n
                }, t && Object.defineProperty(window.Event,
                    "prototype",
                    {
                        configurable: !1,
                        enumerable: !1,
                        writable: !0,
                        value: t
                    }), "createEvent" in document || (window.addEventListener = Window.prototype.addEventListener = Document.prototype.addEventListener = Element.prototype.addEventListener = function () {
                    var s = this, t = arguments[0], e = arguments[1];
                    if (s === window && t in n) throw new Error("In IE8 the event: " + t + " is not available on the window object. Please see https://github.com/Financial-Times/polyfill-service/issues/317 for more information.");
                    s._events || (s._events = {}), s._events[t] || (s._events[t] = function (t) {
                        var e, n = s._events[t.type].list, o = n.slice(), i = -1, r = o.length;
                        for (t.preventDefault = function () {
                            !1 !== t.cancelable && (t.returnValue = !1)
                        }, t.stopPropagation = function () {
                            t.cancelBubble = !0
                        }, t.stopImmediatePropagation = function () {
                            t.cancelBubble = !0, t.cancelImmediate = !0
                        }, t.currentTarget = s, t.relatedTarget = t.fromElement || null, t.target = t.target || t.srcElement || s, t.timeStamp = (new Date).getTime(), t.clientX && (t.pageX = t.clientX + document.documentElement.scrollLeft, t.pageY = t.clientY + document.documentElement.scrollTop); ++i < r && !t.cancelImmediate;) i in o && -1 !== a(
                            n,
                            e = o[i]) && "function" == typeof e && e.call(s, t)
                    }, s._events[t].list = [], s.attachEvent && s.attachEvent("on" + t,
                        s._events[t])), s._events[t].list.push(e)
                }, window.removeEventListener = Window.prototype.removeEventListener = Document.prototype.removeEventListener = Element.prototype.removeEventListener = function () {
                    var t, e = this, n = arguments[0], o = arguments[1];
                    e._events && e._events[n] && e._events[n].list && -1 !== (t = a(e._events[n].list,
                        o)) && (e._events[n].list.splice(t,
                        1), e._events[n].list.length || (e.detachEvent && e.detachEvent("on" + n,
                        e._events[n]), delete e._events[n]))
                }, window.dispatchEvent = Window.prototype.dispatchEvent = Document.prototype.dispatchEvent = Element.prototype.dispatchEvent = function (t) {
                    if (!arguments.length) throw new Error("Not enough arguments");
                    if (!t || "string" != typeof t.type) throw new Error("DOM Events Exception 0");
                    var e = this, n = t.type;
                    try {
                        if (!t.bubbles) {
                            t.cancelBubble = !0;
                            var o = function (t) {
                                t.cancelBubble = !0, (e || window).detachEvent("on" + n, o)
                            };
                            this.attachEvent("on" + n, o)
                        }
                        this.fireEvent("on" + n, t)
                    } catch (i) {
                        for (t.target = e; "_events" in (t.currentTarget = e) && "function" == typeof e._events[n] && e._events[n].call(
                            e,
                            t), "function" == typeof e["on" + n] && e["on" + n].call(e,
                            t), (e = 9 === e.nodeType ? e.parentWindow : e.parentNode) && !t.cancelBubble;) ;
                    }
                    return !0
                }, document.attachEvent("onreadystatechange", function () {
                    "complete" === document.readyState && document.dispatchEvent(new Event("DOMContentLoaded",
                        {bubbles: !0}))
                }))
            }

            function a(t, e) {
                for (var n = -1, o = t.length; ++n < o;) if (n in t && t[n] === e) return n;
                return -1
            }
        }()
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {});

    function o(t) {
        this.$module = t, this.debounceFormSubmitTimer = null
    }

    o.prototype.handleKeyDown = function (t) {
        var e = t.target;
        "button" === e.getAttribute("role") && 32 === t.keyCode && (t.preventDefault(), e.click())
    }, o.prototype.debounce = function (t) {
        if ("true" === t.target.getAttribute("data-prevent-double-click")) return this.debounceFormSubmitTimer ? (t.preventDefault(), !1) : void (this.debounceFormSubmitTimer = setTimeout(
            function () {
                this.debounceFormSubmitTimer = null
            }.bind(this),
            1e3))
    }, o.prototype.init = function () {
        this.$module.addEventListener("keydown", this.handleKeyDown), this.$module.addEventListener("click",
            this.debounce)
    };
    var s = "boolean" == typeof document.createElement("details").open;

    function i(t) {
        this.$module = t
    }

    function a(t) {
        this.$module = t, this.$textarea = t.querySelector(".govuk-js-character-count")
    }

    function c(t) {
        this.$module = t, this.$inputs = t.querySelectorAll('input[type="checkbox"]')
    }

    function l(t) {
        this.$module = t
    }

    function u(t) {
        this.$module = t
    }

    function d(t) {
        this.$module = t
    }

    function p(t) {
        this.$module = t, this.$tabs = t.querySelectorAll(".govuk-tabs__tab"), this.keys = {
            left: 37,
            right: 39,
            up: 38,
            down: 40
        }, this.jsHiddenClass = "govuk-tabs__panel--hidden"
    }

    i.prototype.handleInputs = function (t, n) {
        t.addEventListener("keypress", function (t) {
            var e = t.target;
            13 !== t.keyCode && 32 !== t.keyCode || "summary" === e.nodeName.toLowerCase() && (t.preventDefault(), e.click ? e.click() : n(
                t))
        }), t.addEventListener("keyup", function (t) {
            var e = t.target;
            32 === t.keyCode && "summary" === e.nodeName.toLowerCase() && t.preventDefault()
        }), t.addEventListener("click", n)
    }, i.prototype.init = function () {
        var t = this.$module;
        if (t) {
            var e = this.$summary = t.getElementsByTagName("summary").item(0),
                n = this.$content = t.getElementsByTagName("div").item(0);
            if (e && n) n.id || (n.id = "details-content-" + function o() {
                var n = (new Date).getTime();
                return "undefined" != typeof window.performance && "function" == typeof window.performance.now && (n += window.performance.now()), "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(
                    /[xy]/g,
                    function (t) {
                        var e = (n + 16 * Math.random()) % 16 | 0;
                        return n = Math.floor(n / 16), ("x" === t ? e : 3 & e | 8).toString(16)
                    })
            }()), t.setAttribute("role", "group"), e.setAttribute("role", "button"), e.setAttribute("aria-controls",
                n.id), s || (e.tabIndex = 0), !0 == (null !== t.getAttribute("open")) ? (e.setAttribute("aria-expanded",
                "true"), n.setAttribute("aria-hidden", "false")) : (e.setAttribute("aria-expanded",
                "false"), n.setAttribute("aria-hidden", "true"), s || (n.style.display = "none")), this.handleInputs(e,
                this.setAttributes.bind(this))
        }
    }, i.prototype.setAttributes = function () {
        var t = this.$module, e = this.$summary, n = this.$content, o = "true" === e.getAttribute("aria-expanded"),
            i = "true" === n.getAttribute("aria-hidden");
        e.setAttribute("aria-expanded", o ? "false" : "true"), n.setAttribute("aria-hidden",
            i ? "false" : "true"), s || (n.style.display = o ? "none" : "", null !== t.getAttribute("open") ? t.removeAttribute(
            "open") : t.setAttribute("open", "open"));
        return !0
    }, i.prototype.destroy = function (t) {
        t.removeEventListener("keypress"), t.removeEventListener("keyup"), t.removeEventListener("click")
    }, a.prototype.defaults = {
        characterCountAttribute: "data-maxlength",
        wordCountAttribute: "data-maxwords"
    }, a.prototype.init = function () {
        var t = this.$module;
        if (this.$textarea) {
            this.options = this.getDataset(t);
            var e = this.defaults.characterCountAttribute;
            if (this.options.maxwords && (e = this.defaults.wordCountAttribute), this.maxLength = t.getAttribute(e), this.maxLength) {
                var n = this.createCountMessage.bind(this);
                if (this.countMessage = n(), this.countMessage) t.removeAttribute("maxlength"), this.bindChangeEvents.bind(
                    this)(), this.updateCountMessage.bind(this)()
            }
        }
    }, a.prototype.getDataset = function (t) {
        var e = {}, n = t.attributes;
        if (n) for (var o = 0; o < n.length; o++) {
            var i = n[o], r = i.name.match(/^data-(.+)/);
            r && (e[r[1]] = i.value)
        }
        return e
    }, a.prototype.count = function (t) {
        var e;
        this.options.maxwords ? e = (t.match(/\S+/g) || []).length : e = t.length;
        return e
    }, a.prototype.createCountMessage = function () {
        var t = this.$textarea, e = t.id, n = document.getElementById(e + "-info");
        return e && !n ? (t.insertAdjacentHTML("afterend",
            '<span id="' + e + '-info" class="govuk-hint govuk-character-count__message" aria-live="polite"></span>'), this.describedBy = t.getAttribute(
            "aria-describedby"), this.describedByInfo = this.describedBy + " " + e + "-info", t.setAttribute(
            "aria-describedby",
            this.describedByInfo), n = document.getElementById(e + "-info")) : t.insertAdjacentElement("afterend", n), n
    }, a.prototype.bindChangeEvents = function () {
        var t = this.$textarea;
        t.addEventListener("keyup", this.checkIfValueChanged.bind(this)), t.addEventListener("focus",
            this.handleFocus.bind(this)), t.addEventListener("blur", this.handleBlur.bind(this))
    }, a.prototype.checkIfValueChanged = function () {
        this.$textarea.oldValue || (this.$textarea.oldValue = ""), this.$textarea.value !== this.$textarea.oldValue && (this.$textarea.oldValue = this.$textarea.value, this.updateCountMessage.bind(
            this)())
    }, a.prototype.updateCountMessage = function () {
        var t = this.$textarea, e = this.options, n = this.countMessage, o = this.count(t.value), i = this.maxLength,
            r = i - o;
        o < i * (e.threshold ? e.threshold : 0) / 100 ? (n.classList.add("govuk-character-count__message--disabled"), n.setAttribute(
            "aria-hidden",
            !0)) : (n.classList.remove("govuk-character-count__message--disabled"), n.removeAttribute("aria-hidden")), r < 0 ? (t.classList.add(
            "govuk-textarea--error"), n.classList.remove("govuk-hint"), n.classList.add("govuk-error-message")) : (t.classList.remove(
            "govuk-textarea--error"), n.classList.remove("govuk-error-message"), n.classList.add("govuk-hint"));
        var s, a, c = "character";
        e.maxwords && (c = "word"), c += -1 == r || 1 == r ? "" : "s", s = r < 0 ? "too many" : "remaining", a = Math.abs(
            r), n.innerHTML = "You have " + a + " " + c + " " + s
    }, a.prototype.handleFocus = function () {
        this.valueChecker = setInterval(this.checkIfValueChanged.bind(this), 1e3)
    }, a.prototype.handleBlur = function () {
        clearInterval(this.valueChecker)
    }, c.prototype.init = function () {
        var n = this.$module;
        r(this.$inputs, function (t) {
            var e = t.getAttribute("data-aria-controls");
            e && n.querySelector("#" + e) && (t.setAttribute("aria-controls",
                e), t.removeAttribute("data-aria-controls"), this.setAttributes(t))
        }.bind(this)), n.addEventListener("click", this.handleClick.bind(this))
    }, c.prototype.setAttributes = function (t) {
        var e = t.checked;
        t.setAttribute("aria-expanded", e);
        var n = this.$module.querySelector("#" + t.getAttribute("aria-controls"));
        n && n.classList.toggle("govuk-checkboxes__conditional--hidden", !e)
    }, c.prototype.handleClick = function (t) {
        var e = t.target, n = "checkbox" === e.getAttribute("type"), o = e.getAttribute("aria-controls");
        n && o && this.setAttributes(e)
    }, function (t) {
        "document" in this && "matches" in document.documentElement || (Element.prototype.matches = Element.prototype.webkitMatchesSelector || Element.prototype.oMatchesSelector || Element.prototype.msMatchesSelector || Element.prototype.mozMatchesSelector || function (t) {
            for (var e = (this.document || this.ownerDocument).querySelectorAll(t), n = 0; e[n] && e[n] !== this;) ++n;
            return !!e[n]
        })
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (t) {
        "document" in this && "closest" in document.documentElement || (Element.prototype.closest = function (t) {
            for (var e = this; e;) {
                if (e.matches(t)) return e;
                e = "SVGElement" in window && e instanceof SVGElement ? e.parentNode : e.parentElement
            }
            return null
        })
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), l.prototype.init = function () {
        var t = this.$module;
        t && (t.focus(), t.addEventListener("click", this.handleClick.bind(this)))
    }, l.prototype.handleClick = function (t) {
        var e = t.target;
        this.focusTarget(e) && t.preventDefault()
    }, l.prototype.focusTarget = function (t) {
        if ("A" !== t.tagName || !1 === t.href) return !1;
        var e = this.getFragmentFromUrl(t.href), n = document.getElementById(e);
        if (!n) return !1;
        var o = this.getAssociatedLegendOrLabel(n);
        return !!o && (o.scrollIntoView(), n.focus({preventScroll: !0}), !0)
    }, l.prototype.getFragmentFromUrl = function (t) {
        return -1 !== t.indexOf("#") && t.split("#").pop()
    }, l.prototype.getAssociatedLegendOrLabel = function (t) {
        var e = t.closest("fieldset");
        if (e) {
            var n = e.getElementsByTagName("legend");
            if (n.length) return n[0]
        }
        return document.querySelector("label[for='" + t.getAttribute("id") + "']") || t.closest("label")
    }, u.prototype.init = function () {
        var t = this.$module;
        if (t) {
            var e = t.querySelector(".govuk-js-header-toggle");
            e && e.addEventListener("click", this.handleClick.bind(this))
        }
    }, u.prototype.toggleClass = function (t, e) {
        0 < t.className.indexOf(e) ? t.className = t.className.replace(" " + e, "") : t.className += " " + e
    }, u.prototype.handleClick = function (t) {
        var e = this.$module, n = t.target || t.srcElement, o = e.querySelector("#" + n.getAttribute("aria-controls"));
        n && o && (this.toggleClass(o, "govuk-header__navigation--open"), this.toggleClass(n,
            "govuk-header__menu-button--open"), n.setAttribute("aria-expanded",
            "true" !== n.getAttribute("aria-expanded")), o.setAttribute("aria-hidden",
            "false" === o.getAttribute("aria-hidden")))
    }, d.prototype.init = function () {
        var n = this.$module;
        r(n.querySelectorAll('input[type="radio"]'), function (t) {
            var e = t.getAttribute("data-aria-controls");
            e && n.querySelector("#" + e) && (t.setAttribute("aria-controls",
                e), t.removeAttribute("data-aria-controls"), this.setAttributes(t))
        }.bind(this)), n.addEventListener("click", this.handleClick.bind(this))
    }, d.prototype.setAttributes = function (t) {
        var e = document.querySelector("#" + t.getAttribute("aria-controls"));
        if (e && e.classList.contains("govuk-radios__conditional")) {
            var n = t.checked;
            t.setAttribute("aria-expanded", n), e.classList.toggle("govuk-radios__conditional--hidden", !n)
        }
    }, d.prototype.handleClick = function (t) {
        var n = t.target;
        "radio" === n.type && r(document.querySelectorAll('input[type="radio"][aria-controls]'), function (t) {
            var e = t.form === n.form;
            t.name === n.name && e && this.setAttributes(t)
        }.bind(this))
    }, function (t) {
        "Element" in this && "nextElementSibling" in document.documentElement || Object.defineProperty(Element.prototype,
            "nextElementSibling",
            {
                get: function () {
                    for (var t = this.nextSibling; t && 1 !== t.nodeType;) t = t.nextSibling;
                    return 1 === t.nodeType ? t : null
                }
            })
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), function (t) {
        "Element" in this && "previousElementSibling" in document.documentElement || Object.defineProperty(Element.prototype,
            "previousElementSibling",
            {
                get: function () {
                    for (var t = this.previousSibling; t && 1 !== t.nodeType;) t = t.previousSibling;
                    return 1 === t.nodeType ? t : null
                }
            })
    }.call("object" == typeof window && window || "object" == typeof self && self || "object" == typeof global && global || {}), p.prototype.init = function () {
        "function" == typeof window.matchMedia ? this.setupResponsiveChecks() : this.setup()
    }, p.prototype.setupResponsiveChecks = function () {
        this.mql = window.matchMedia("(min-width: 40.0625em)"), this.mql.addListener(this.checkMode.bind(this)), this.checkMode()
    }, p.prototype.checkMode = function () {
        this.mql.matches ? this.setup() : this.teardown()
    }, p.prototype.setup = function () {
        var t = this.$module, e = this.$tabs, n = t.querySelector(".govuk-tabs__list"),
            o = t.querySelectorAll(".govuk-tabs__list-item");
        if (e && n && o) {
            n.setAttribute("role", "tablist"), r(o, function (t) {
                t.setAttribute("role", "presentation")
            }), r(e, function (t) {
                this.setAttributes(t), t.boundTabClick = this.onTabClick.bind(this), t.boundTabKeydown = this.onTabKeydown.bind(
                    this), t.addEventListener("click", t.boundTabClick, !0), t.addEventListener("keydown",
                    t.boundTabKeydown,
                    !0), this.hideTab(t)
            }.bind(this));
            var i = this.getTab(window.location.hash) || this.$tabs[0];
            this.showTab(i), t.boundOnHashChange = this.onHashChange.bind(this), window.addEventListener("hashchange",
                t.boundOnHashChange,
                !0)
        }
    }, p.prototype.teardown = function () {
        var t = this.$module, e = this.$tabs, n = t.querySelector(".govuk-tabs__list"),
            o = t.querySelectorAll(".govuk-tabs__list-item");
        e && n && o && (n.removeAttribute("role"), r(o, function (t) {
            t.removeAttribute("role", "presentation")
        }), r(e, function (t) {
            t.removeEventListener("click", t.boundTabClick, !0), t.removeEventListener("keydown",
                t.boundTabKeydown,
                !0), this.unsetAttributes(t)
        }.bind(this)), window.removeEventListener("hashchange", t.boundOnHashChange, !0))
    }, p.prototype.onHashChange = function (t) {
        var e = window.location.hash, n = this.getTab(e);
        if (n) if (this.changingHash) this.changingHash = !1; else {
            var o = this.getCurrentTab();
            this.hideTab(o), this.showTab(n), n.focus()
        }
    }, p.prototype.hideTab = function (t) {
        this.unhighlightTab(t), this.hidePanel(t)
    }, p.prototype.showTab = function (t) {
        this.highlightTab(t), this.showPanel(t)
    }, p.prototype.getTab = function (t) {
        return this.$module.querySelector('.govuk-tabs__tab[href="' + t + '"]')
    }, p.prototype.setAttributes = function (t) {
        var e = this.getHref(t).slice(1);
        t.setAttribute("id", "tab_" + e), t.setAttribute("role", "tab"), t.setAttribute("aria-controls",
            e), t.setAttribute("aria-selected", "false"), t.setAttribute("tabindex", "-1");
        var n = this.getPanel(t);
        n.setAttribute("role", "tabpanel"), n.setAttribute("aria-labelledby", t.id), n.classList.add(this.jsHiddenClass)
    }, p.prototype.unsetAttributes = function (t) {
        t.removeAttribute("id"), t.removeAttribute("role"), t.removeAttribute("aria-controls"), t.removeAttribute(
            "aria-selected"), t.removeAttribute("tabindex");
        var e = this.getPanel(t);
        e.removeAttribute("role"), e.removeAttribute("aria-labelledby"), e.classList.remove(this.jsHiddenClass)
    }, p.prototype.onTabClick = function (t) {
        if (!t.target.classList.contains("govuk-tabs__tab")) return !1;
        t.preventDefault();
        var e = t.target, n = this.getCurrentTab();
        this.hideTab(n), this.showTab(e), this.createHistoryEntry(e)
    }, p.prototype.createHistoryEntry = function (t) {
        var e = this.getPanel(t), n = e.id;
        e.id = "", this.changingHash = !0, window.location.hash = this.getHref(t).slice(1), e.id = n
    }, p.prototype.onTabKeydown = function (t) {
        switch (t.keyCode) {
            case this.keys.left:
            case this.keys.up:
                this.activatePreviousTab(), t.preventDefault();
                break;
            case this.keys.right:
            case this.keys.down:
                this.activateNextTab(), t.preventDefault()
        }
    }, p.prototype.activateNextTab = function () {
        var t = this.getCurrentTab(), e = t.parentNode.nextElementSibling;
        if (e) var n = e.querySelector(".govuk-tabs__tab");
        n && (this.hideTab(t), this.showTab(n), n.focus(), this.createHistoryEntry(n))
    }, p.prototype.activatePreviousTab = function () {
        var t = this.getCurrentTab(), e = t.parentNode.previousElementSibling;
        if (e) var n = e.querySelector(".govuk-tabs__tab");
        n && (this.hideTab(t), this.showTab(n), n.focus(), this.createHistoryEntry(n))
    }, p.prototype.getPanel = function (t) {
        return this.$module.querySelector(this.getHref(t))
    }, p.prototype.showPanel = function (t) {
        this.getPanel(t).classList.remove(this.jsHiddenClass)
    }, p.prototype.hidePanel = function (t) {
        this.getPanel(t).classList.add(this.jsHiddenClass)
    }, p.prototype.unhighlightTab = function (t) {
        t.setAttribute("aria-selected",
            "false"), t.parentNode.classList.remove("govuk-tabs__list-item--selected"), t.setAttribute("tabindex", "-1")
    }, p.prototype.highlightTab = function (t) {
        t.setAttribute("aria-selected",
            "true"), t.parentNode.classList.add("govuk-tabs__list-item--selected"), t.setAttribute("tabindex", "0")
    }, p.prototype.getCurrentTab = function () {
        return this.$module.querySelector(".govuk-tabs__list-item--selected .govuk-tabs__tab")
    }, p.prototype.getHref = function (t) {
        var e = t.getAttribute("href");
        return e.slice(e.indexOf("#"), e.length)
    }, t.initAll = function h(t) {
        var e = "undefined" != typeof (t = void 0 !== t ? t : {}).scope ? t.scope : document;
        r(e.querySelectorAll('[data-module="govuk-button"]'), function (t) {
            new o(t).init()
        }), r(e.querySelectorAll('[data-module="govuk-accordion"]'), function (t) {
            new n(t).init()
        }), r(e.querySelectorAll('[data-module="govuk-details"]'), function (t) {
            new i(t).init()
        }), r(e.querySelectorAll('[data-module="govuk-character-count"]'), function (t) {
            new a(t).init()
        }), r(e.querySelectorAll('[data-module="govuk-checkboxes"]'), function (t) {
            new c(t).init()
        }), new l(e.querySelector('[data-module="govuk-error-summary"]')).init(), new u(e.querySelector(
            '[data-module="govuk-header"]')).init(), r(e.querySelectorAll('[data-module="govuk-radios"]'),
            function (t) {
                new d(t).init()
            }), r(e.querySelectorAll('[data-module="govuk-tabs"]'), function (t) {
            new p(t).init()
        })
    }, t.Accordion = n, t.Button = o, t.Details = i, t.CharacterCount = a, t.Checkboxes = c, t.ErrorSummary = l, t.Header = u, t.Radios = d, t.Tabs = p
});