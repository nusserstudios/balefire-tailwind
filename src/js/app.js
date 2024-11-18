(() => {
  // assets/js/darkmode.js
  document.addEventListener("DOMContentLoaded", function() {
    const themeToggleBtn = document.getElementById("theme-toggle");
    const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
    function setInitialTheme() {
      if (localStorage.getItem("color-theme") === "dark" || !("color-theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches) {
        document.documentElement.classList.add("dark");
        themeToggleDarkIcon.classList.add("hidden");
        themeToggleLightIcon.classList.remove("hidden");
      } else {
        document.documentElement.classList.remove("dark");
        themeToggleDarkIcon.classList.remove("hidden");
        themeToggleLightIcon.classList.add("hidden");
      }
    }
    function toggleTheme() {
      themeToggleDarkIcon.classList.toggle("hidden");
      themeToggleLightIcon.classList.toggle("hidden");
      if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("color-theme", "light");
      } else {
        document.documentElement.classList.add("dark");
        localStorage.setItem("color-theme", "dark");
      }
    }
    setInitialTheme();
    if (themeToggleBtn) {
      themeToggleBtn.addEventListener("click", toggleTheme);
    }
    window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", ({ matches }) => {
      if (!localStorage.getItem("color-theme")) {
        if (matches) {
          document.documentElement.classList.add("dark");
        } else {
          document.documentElement.classList.remove("dark");
        }
        setInitialTheme();
      }
    });
  });

  // assets/js/mmenu.js
  !function(t) {
    var e = {};
    function n(o) {
      if (e[o])
        return e[o].exports;
      var i = e[o] = { i: o, l: false, exports: {} };
      return t[o].call(i.exports, i, i.exports, n), i.l = true, i.exports;
    }
    n.m = t, n.c = e, n.d = function(t2, e2, o) {
      n.o(t2, e2) || Object.defineProperty(t2, e2, { enumerable: true, get: o });
    }, n.r = function(t2) {
      typeof Symbol != "undefined" && Symbol.toStringTag && Object.defineProperty(t2, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(t2, "__esModule", { value: true });
    }, n.t = function(t2, e2) {
      if (1 & e2 && (t2 = n(t2)), 8 & e2)
        return t2;
      if (4 & e2 && typeof t2 == "object" && t2 && t2.__esModule)
        return t2;
      var o = Object.create(null);
      if (n.r(o), Object.defineProperty(o, "default", { enumerable: true, value: t2 }), 2 & e2 && typeof t2 != "string")
        for (var i in t2)
          n.d(o, i, function(e3) {
            return t2[e3];
          }.bind(null, i));
      return o;
    }, n.n = function(t2) {
      var e2 = t2 && t2.__esModule ? function() {
        return t2.default;
      } : function() {
        return t2;
      };
      return n.d(e2, "a", e2), e2;
    }, n.o = function(t2, e2) {
      return Object.prototype.hasOwnProperty.call(t2, e2);
    }, n.p = "", n(n.s = 0);
  }([function(t, e, n) {
    "use strict";
    n.r(e);
    var o = function() {
      function t2(t3) {
        var e2 = this;
        this.listener = function(t4) {
          (t4.matches ? e2.matchFns : e2.unmatchFns).forEach(function(t5) {
            t5();
          });
        }, this.toggler = window.matchMedia(t3), this.toggler.addListener(this.listener), this.matchFns = [], this.unmatchFns = [];
      }
      return t2.prototype.add = function(t3, e2) {
        this.matchFns.push(t3), this.unmatchFns.push(e2), (this.toggler.matches ? t3 : e2)();
      }, t2;
    }(), i = function(t2) {
      return Array.prototype.slice.call(t2);
    }, r = function(t2, e2) {
      return i((e2 || document).querySelectorAll(t2));
    }, s = ("ontouchstart" in window || navigator.msMaxTouchPoints, navigator.userAgent.indexOf("MSIE") > -1 || navigator.appVersion.indexOf("Trident/") > -1), a = "mm-spn", c = function() {
      function t2(t3, e2, n2, o2, i2) {
        this.node = t3, this.title = e2, this.selectedClass = n2, this.node.classList.add(a), s && (o2 = false), this.node.classList.add(a + "--" + i2), this.node.classList.add(a + "--" + (o2 ? "navbar" : "vertical")), this._setSelectedl(), this._initAnchors();
      }
      return Object.defineProperty(t2.prototype, "prefix", { get: function() {
        return a;
      }, enumerable: true, configurable: true }), t2.prototype.openPanel = function(t3) {
        var e2 = t3.dataset.mmSpnTitle, n2 = t3.parentElement;
        n2 === this.node ? this.node.classList.add(a + "--main") : (this.node.classList.remove(a + "--main"), e2 || i(n2.children).forEach(function(t4) {
          t4.matches("a, span") && (e2 = t4.textContent);
        })), e2 || (e2 = this.title), this.node.dataset.mmSpnTitle = e2, r("." + a + "--open", this.node).forEach(function(t4) {
          t4.classList.remove(a + "--open"), t4.classList.remove(a + "--parent");
        }), t3.classList.add(a + "--open"), t3.classList.remove(a + "--parent");
        for (var o2 = t3.parentElement.closest("ul"); o2; )
          o2.classList.add(a + "--open"), o2.classList.add(a + "--parent"), o2 = o2.parentElement.closest("ul");
      }, t2.prototype._setSelectedl = function() {
        var t3 = r("." + this.selectedClass, this.node), e2 = t3[t3.length - 1], n2 = null;
        e2 && (n2 = e2.closest("ul")), n2 || (n2 = this.node.querySelector("ul")), this.openPanel(n2);
      }, t2.prototype._initAnchors = function() {
        var t3 = this;
        this.node.addEventListener("click", function(e2) {
          var n2 = false;
          n2 = (n2 = (n2 = n2 || function(t4) {
            return !!t4.target.matches("a") && (t4.stopImmediatePropagation(), true);
          }(e2)) || function(e3) {
            var n3, o2 = e3.target;
            return !!(n3 = o2.closest("span") ? o2.parentElement : !!o2.closest("li") && o2) && (i(n3.children).forEach(function(e4) {
              e4.matches("ul") && t3.openPanel(e4);
            }), e3.stopImmediatePropagation(), true);
          }(e2)) || function(e3) {
            var n3 = e3.target, o2 = r("." + a + "--open", n3), i2 = o2[o2.length - 1];
            if (i2) {
              var s2 = i2.parentElement.closest("ul");
              if (s2)
                return t3.openPanel(s2), e3.stopImmediatePropagation(), true;
            }
          }(e2);
        });
      }, t2;
    }(), d = "mm-ocd", u = function() {
      function t2(t3, e2) {
        var n2 = this;
        t3 === void 0 && (t3 = null), this.wrapper = document.createElement("div"), this.wrapper.classList.add("" + d), this.wrapper.classList.add(d + "--" + e2), this.content = document.createElement("div"), this.content.classList.add(d + "__content"), this.wrapper.append(this.content), this.backdrop = document.createElement("div"), this.backdrop.classList.add(d + "__backdrop"), this.wrapper.append(this.backdrop), document.body.append(this.wrapper), t3 && this.content.append(t3);
        var o2 = function(t4) {
          n2.close(), t4.preventDefault(), t4.stopImmediatePropagation();
        };
        this.backdrop.addEventListener("touchstart", o2), this.backdrop.addEventListener("mousedown", o2);
      }
      return Object.defineProperty(t2.prototype, "prefix", { get: function() {
        return d;
      }, enumerable: true, configurable: true }), t2.prototype.open = function() {
        this.wrapper.classList.add(d + "--open"), document.body.classList.add(d + "-opened");
      }, t2.prototype.close = function() {
        this.wrapper.classList.remove(d + "--open"), document.body.classList.remove(d + "-opened");
      }, t2;
    }(), l = function() {
      function t2(t3, e2) {
        e2 === void 0 && (e2 = "all"), this.menu = t3, this.toggler = new o(e2);
      }
      return t2.prototype.navigation = function(t3) {
        var e2 = this;
        if (!this.navigator) {
          var n2 = (t3 = t3 || {}).title, o2 = n2 === void 0 ? "Menu" : n2, i2 = t3.selectedClass, r2 = i2 === void 0 ? "Selected" : i2, s2 = t3.slidingSubmenus, a2 = s2 === void 0 || s2, d2 = t3.theme, u2 = d2 === void 0 ? "light" : d2;
          this.navigator = new c(this.menu, o2, r2, a2, u2), this.toggler.add(function() {
            return e2.menu.classList.add(e2.navigator.prefix);
          }, function() {
            return e2.menu.classList.remove(e2.navigator.prefix);
          });
        }
        return this.navigator;
      }, t2.prototype.offcanvas = function(t3) {
        var e2 = this;
        if (!this.drawer) {
          var n2 = (t3 = t3 || {}).position, o2 = n2 === void 0 ? "left" : n2;
          this.drawer = new u(null, o2);
          var i2 = document.createComment("original menu location");
          this.menu.after(i2), this.toggler.add(function() {
            e2.drawer.content.append(e2.menu);
          }, function() {
            e2.drawer.close(), i2.after(e2.menu);
          });
        }
        return this.drawer;
      }, t2;
    }();
    e.default = l;
    window.MmenuLight = l;
  }]);
  document.addEventListener("DOMContentLoaded", () => {
    const menu = new MmenuLight(document.querySelector("#nav-main"), "(max-width: 1024px)");
    const navigator2 = menu.navigation({
      theme: "dark"
    });
    const drawer = menu.offcanvas();
    document.querySelector('a[href="#main-nav"]').addEventListener("click", (evnt) => {
      evnt.preventDefault();
      drawer.open();
    });
  });

  // assets/js/app.js
  document.addEventListener("DOMContentLoaded", function() {
    console.log("app.js loaded successfully");
  });
})();
/*!
 * mmenu.js light
 * mmenujs.com
 *
 * Copyright (c) Fred Heusschen
 * www.frebsite.nl
 *
 * License: CC-BY-NC-4.0
 * http://creativecommons.org/licenses/by-nc/4.0/
 */
