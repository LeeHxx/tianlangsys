! function(e, t) {
    "object" == typeof exports && "undefined" != typeof module ? t() : "function" == typeof define && define.amd ? define(t) : t()
}(0, function() {
    "use strict";

    function e(e, t) {
        for (var a = 0; a < t.length; a++) {
            var r = t[a];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
        }
    }

    function t() {
        return (t = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var a = arguments[t];
                for (var r in a) Object.prototype.hasOwnProperty.call(a, r) && (e[r] = a[r])
            }
            return e
        }).apply(this, arguments)
    }

    function a(e) {
        return e && "object" == typeof e ? o(e) || s(e) ? e : n(e) ? function(e, t) {
            if (e.map) return e.map(t);
            for (var a = [], r = 0; r < e.length; r++) a.push(t(e[r], r));
            return a
        }(e, a) : function(e, t, a) {
            if (e.reduce) return e.reduce(t, a);
            for (var r = 0; r < e.length; r++) a = t(a, e[r], r);
            return a
        }(l(e), function(t, n) {
            return t[r(n)] = a(e[n]), t
        }, {}) : e
    }

    function r(e) {
        return e.replace(/[_.-](\w|$)/g, function(e, t) {
            return t.toUpperCase()
        })
    }
    var n = Array.isArray || function(e) {
            return "[object Array]" === Object.prototype.toString.call(e)
        },
        o = function(e) {
            return "[object Date]" === Object.prototype.toString.call(e)
        },
        s = function(e) {
            return "[object RegExp]" === Object.prototype.toString.call(e)
        },
        i = Object.prototype.hasOwnProperty,
        l = Object.keys || function(e) {
            var t = [];
            for (var a in e) i.call(e, a) && t.push(a);
            return t
        };
    var c, d = function() {
            function t(e) {
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t), this.value = e
            }
            var a, r, n;
            return a = t, (r = [{
                key: "toHex",
                value: function() {
                    return this.value
                }
            }, {
                key: "toRGBA",
                value: function() {
                    var e, t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 1;
                    if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(this.value)) return 3 == (e = this.value.substring(1).split("")).length && (e = [e[0], e[0], e[1], e[1], e[2], e[2]]), "rgba(" + [(e = "0x" + e.join("")) >> 16 & 255, e >> 8 & 255, 255 & e].join(",") + "," + t + ")"
                }
            }]) && e(a.prototype, r), n && e(a, n), t
        }(),
        u = {
            white: new d("#ffffff"),
            gray100: new d("#f8f9fa"),
            gray200: new d("#e9ecef"),
            gray300: new d("#dee2e6"),
            gray400: new d("#ced4da"),
            gray500: new d("#adb5bd"),
            gray600: new d("#868e96"),
            gray700: new d("#495057"),
            gray800: new d("#343a40"),
            gray900: new d("#212529"),
            black: new d("#000")
        },
        f = {
            blueishGrey: new d("#5A6169"),
            blue: new d("#007bff"),
            indigo: new d("#674eec"),
            purple: new d("#8445f7"),
            pink: new d("#ff4169"),
            red: new d("#c4183c"),
            orange: new d("#fb7906"),
            yellow: new d("#ffb400"),
            green: new d("#17c671"),
            teal: new d("#1adba2"),
            cyan: new d("#00b8d8"),
            gray: u.gray600,
            grayDark: u.gray800
        },
        h = {
            fiordBlue: new d("#3D5170"),
            reagentGray: new d("#818EA3"),
            shuttleGray: new d("#5A6169"),
            mischka: new d("#CACEDB"),
            athensGray: new d("#E9ECEF"),
            salmon: new d("#FF4169"),
            royalBlue: new d("#674EEC"),
            java: new d("#1ADBA2")
        },
        p = {
            accent: f.blue,
            primary: f.blue,
            secondary: f.blueishGrey,
            success: f.green,
            info: f.cyan,
            warning: f.yellow,
            danger: f.red,
            light: u.gray200,
            dark: u.gray800
        },
        b = window.ShardsDashboards && window.ShardsDashboards.colors ? window.ShardsDashboards.colors : {};
    if (0 !== Object.keys(b).length && b.constructor === Object)
        for (var y in b)
            if (b.hasOwnProperty(y)) {
                if (!/^#([A-Fa-f0-9]{3}$)|([A-Fa-f0-9]{6}$)/.test(b[y])) throw new Error("Please provide a hexadecimal color value if you are trying to override the Shards Dashboards colors.");
                b[(c = y, "string" == typeof c ? r(c) : a(c))] = new d(b[y])
            } var w = t({}, u, f, h, p, b);
    if ("undefined" == typeof Chart) throw new Error("Shards Dashboards requires the Chart.js library in order to work properly.");
    window.ShardsDashboards = window.ShardsDashboards ? window.ShardsDashboards : {}, window.ShardsDashboards.colors = w, $.extend($.easing, {
        easeOutSine: function(e, t, a, r, n) {
            return r * Math.sin(t / n * (Math.PI / 2)) + a
        }
    }), Chart.defaults.global.defaultFontColor = "#BBBCC1", Chart.defaults.global.elements.point.backgroundColor = "rgba(255, 255, 255, 1)", Chart.defaults.global.elements.point.radius = 4, Chart.defaults.global.elements.point.hoverRadius = 6, Chart.defaults.scale.gridLines.color = "rgba(233, 236 ,239, 1)", Chart.defaults.scale.ticks.autoSkip = !1, Chart.defaults.scale.ticks.minRotation = 0, Chart.defaults.scale.ticks.maxRotation = 0, Chart.defaults.scale.ticks.padding = 10, Chart.defaults.global.elements.point.backgroundColor = w.white.toHex(), Chart.defaults.global.elements.point.radius = 4, Chart.defaults.global.elements.point.hoverRadius = 5, Chart.defaults.global.tooltips.custom = function(e) {
        var t = document.getElementsByClassName("sc-tooltip-" + this._chart.id)[0];
        if (t || ((t = document.createElement("div")).classList.add("sc-tooltip-" + this._chart.id), t.innerHTML = "<table></table>", this._chart.canvas.parentNode.appendChild(t)), 0 !== e.opacity) {
            if (t.classList.remove("above", "below", "no-transform"), e.yAlign ? t.classList.add(e.yAlign) : t.classList.add("no-transform"), e.body) {
                var a = e.title || [],
                    r = e.body.map(function(e) {
                        return e.lines
                    }),
                    n = "<thead>";
                a.forEach(function(e) {
                    n += "<tr><th>" + e + "</th></tr>"
                }), n += "</thead><tbody>", r.forEach(function(t, a) {
                    var r = e.labelColors[a],
                        o = "background:" + r.backgroundColor;
                    o += "; border-color:" + r.borderColor, n += "<tr><td>".concat('<span class="sc-tooltip-key" style="' + (o += "; border-width: 2px") + '"></span>', " ").concat(t, "</td></tr>")
                }), n += "</tbody>", t.querySelector("table").innerHTML = n
            }
            var o = this._chart.canvas.offsetTop,
                s = this._chart.canvas.offsetLeft;
            t.style.opacity = 1, t.style.left = s + e.caretX + "px", t.style.top = o + e.caretY + "px"
        } else t.style.opacity = 0
    }, Chart.defaults.global.legendCallback = function(e) {
        var t = '<ul class="sc-legend-container sc-legend-chart-'.concat(e.id, '">');
        return e.data.datasets.map(function(e) {
            t += '<li class="sc-legend"><span class="sc-legend__label" style="background: '.concat(e.borderColor, ' !important;"></span>').concat(e.label ? e.label : "", "</li>")
        }), t += "</ul>"
    }, Chart.defaults.LineWithLine = Chart.defaults.line, Chart.controllers.LineWithLine = Chart.controllers.line.extend({
        draw: function(e) {
            if (Chart.controllers.line.prototype.draw.call(this, e), this.chart.tooltip._active && this.chart.tooltip._active.length) {
                var t = this.chart.tooltip._active[0],
                    a = this.chart.ctx,
                    r = t.tooltipPosition().x,
                    n = this.chart.scales["y-axis-0"].top,
                    o = this.chart.scales["y-axis-0"].bottom;
                a.save(), a.beginPath(), a.moveTo(r, n), a.lineTo(r, o), a.lineWidth = .5, a.strokeStyle = "#ddd", a.stroke(), a.restore()
            }
        }
    }), $(document).ready(function() {
        var e = {
            duration: 270,
            easing: "easeOutSine"
        };

        function t() {
            var e = $(".nav-wrapper"),
                t = e.height();
            e[0].scrollHeight > t ? e.css("overflowY", "auto") : e.css("overflowY", "none")
        }
        $(":not(.main-sidebar--icons-only) .dropdown").on("show.bs.dropdown", function() {
            $(this).find(".dropdown-menu").first().stop(!0, !0).slideDown(e)
        }), $(":not(.main-sidebar--icons-only) .dropdown").on("hide.bs.dropdown", function() {
            $(this).find(".dropdown-menu").first().stop(!0, !0).slideUp(e)
        }), $(".toggle-sidebar").click(function(e) {
            $(".main-sidebar").toggleClass("open")
        }), $(window).resize(t), t()
    })
});
