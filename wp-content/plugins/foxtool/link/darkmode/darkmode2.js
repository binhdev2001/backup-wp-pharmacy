! function () {
    "use strict";
    var o = {};
    o.setup = {
        config: []
        , init: function () {
            darkmodetg && (this.config = darkmodetg.config, this.addDarkmodeWidget())
        }
        , addDarkmodeWidget: function () {
            var o = this.config
                , t = {
                    bottom: o.bottom
                    , left: o.left
                    , top: o.top
                    , right: o.right
                    , width: o.width
                    , height: o.height
                    , borderRadius: o.borderRadius
                    , fontSize: o.fontSize
                    , time: o.time
                    , mixColor: "#fff"
                    , backgroundColor: o.backgroundColor
                    , buttonColorDark: o.buttonColorDark
                    , buttonColorLight: o.buttonColorLight
                    , buttonColorTDark: o.buttonColorTDark
                    , buttonColorTLight: o.buttonColorTLight
                    , saveInCookies: o.saveInCookies
                    , fixFlick: o.fixFlick
                    , label: o.label
                    , autoMatchOsTheme: o.autoMatchOsTheme
                    , buttonAriaLabel: o.buttonAriaLabel
                }
                , t = (new Darkmode(t)
                    .showWidget(), document.getElementsByClassName("darkmode-toggle")[0].onclick = function () {
                        this.toggleGlobalStyles()
                    }.bind(this), window.localStorage.darkmode)
                , t = (this.config.saveInCookies && "true" === t ? this.toggleGlobalStyles() : this.removeBackground(), ".darkmode-toggle,.darkmode-layer")
                , o = (o.overrideStyles && (t = ".darkmode-toggle"), document.querySelectorAll(t));
            [].forEach.call(o, function (o) {
                o.style.zIndex = "999999"
            }), (this.config.saveInCookies || this.config.autoMatchOsTheme) && this.config.fixFlick && document.documentElement.classList.remove("dmtg-fade")
        }
        , toggleGlobalStyles: function () {
            var o = window.localStorage.darkmode;
            this.config.saveInCookies && "true" === o ? this.addBackground() : this.removeBackground(), (this.config.saveInCookies || this.config.autoMatchOsTheme) && this.config.fixFlick && document.documentElement.classList.remove("dmtg-fade")
        }
        , removeBackground: function () {
            var o = document.getElementsByClassName("darkmode-background")[0];
            o && o.remove()
        }
        , addBackground: function () {
            var o;
            null === document.querySelector(".darkmode-background") && ((o = document.createElement("div"))
                .setAttribute("class", "darkmode-background"), document.body.insertBefore(o, document.body.firstChild))
        }
    };
    var t = function () {
        o.setup.init()
    };
    if ("function" == typeof t) "interactive" === document.readyState || "complete" === document.readyState ? t() : document.addEventListener("DOMContentLoaded", t, !1)
}();
