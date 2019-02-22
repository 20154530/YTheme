/* Live2D 看板娘 v1.4.2 / 2018.11.12 / FGHRSH */
function empty(a) {
    return void 0 === a || null == a || "" == a
}

function getRandText(a) {
    return Array.isArray(a) ? a[Math.floor(Math.random() * a.length + 1) - 1] : a
}

function showMessage(a, c, e) {
    (e || "" === sessionStorage.getItem("waifu-text") || null === sessionStorage.getItem("waifu-text")) && (Array.isArray(a) && (a = a[Math.floor(Math.random() * a.length + 1) - 1]), live2d_settings.showF12Message && console.log("[Message]", a.replace(/<[^<>]+>/g, "")), e && sessionStorage.setItem("waifu-text", a), $(".waifu-tips").stop(), $(".waifu-tips").html(a).fadeTo(200, 1), void 0 === c && (c = 5E3), hideMessage(c))
}

function hideMessage(a) {
    $(".waifu-tips").stop().css("opacity", 1);
    void 0 === a && (a = 5E3);
    window.setTimeout(function () {
        sessionStorage.removeItem("waifu-text")
    }, a);
    $(".waifu-tips").delay(a).fadeTo(200, 0)
}

function initModel(a, c) {
    console.log(" ");
    console.log("\u304f__,.\u30d8\u30fd.\u3000\u3000\u3000\u3000/\u3000,\u30fc\uff64 \u3009\n\u3000\u3000\u3000\u3000\u3000\uff3c ', !-\u2500\u2010-i\u3000/\u3000/\u00b4\n\u3000\u3000\u3000 \u3000 \uff0f\uff40\uff70'\u3000\u3000\u3000 L/\uff0f\uff40\u30fd\uff64\n\u3000\u3000 \u3000 /\u3000 \uff0f,\u3000 /|\u3000 ,\u3000 ,\u3000\u3000\u3000 ',\n\u3000\u3000\u3000\uff72 \u3000/ /-\u2010/\u3000\uff49\u3000L_ \uff8a \u30fd!\u3000 i\n\u3000\u3000\u3000 \uff9a \uff8d 7\uff72\uff40\uff84\u3000 \uff9a'\uff67-\uff84\uff64!\u30cf|\u3000 |\n\u3000\u3000\u3000\u3000 !,/7 '0'\u3000\u3000 \u00b40i\u30bd| \u3000 |\u3000\u3000\u3000\n\u3000\u3000\u3000\u3000 |.\u4ece\"\u3000\u3000_\u3000\u3000 ,,,, / |./ \u3000 |\n\u3000\u3000\u3000\u3000 \uff9a'| i\uff1e.\uff64,,__\u3000_,.\u30a4 / \u3000.i \u3000|\n\u3000\u3000\u3000\u3000\u3000 \uff9a'| | / k_\uff17_/\uff9a'\u30fd,\u3000\uff8a.\u3000|\n\u3000\u3000\u3000\u3000\u3000\u3000 | |/i \u3008|/\u3000 i\u3000,.\uff8d |\u3000i\u3000|\n\u3000\u3000\u3000\u3000\u3000\u3000.|/ /\u3000\uff49\uff1a \u3000 \uff8d!\u3000\u3000\uff3c\u3000|\n\u3000\u3000\u3000 \u3000 \u3000 k\u30fd>\uff64\uff8a \u3000 _,.\uff8d\uff64 \u3000 /\uff64!\n\u3000\u3000\u3000\u3000\u3000\u3000 !'\u3008//\uff40\uff34\u00b4', \uff3c \uff40'7'\uff70r'\n\u3000\u3000\u3000\u3000\u3000\u3000 \uff9a'\u30fdL__|___i,___,\u30f3\uff9a|\u30ce\n\u3000\u3000\u3000\u3000\u3000 \u3000\u3000\u3000\uff84-,/\u3000|___./\n\u3000\u3000\u3000\u3000\u3000 \u3000\u3000\u3000'\uff70'\u3000\u3000!_,.:\nLive2D \u770b\u677f\u5a18 v" + live2d_settings.l2dVersion + " / FGHRSH " + live2d_settings.l2dVerDate);
    console.log(" ");
    "function" != typeof $.ajax && ("function" == typeof jQuery.ajax ? window.$ = jQuery : console.log("[Error] JQuery is not defined."));
    live2d_settings.waifuSize = live2d_settings.waifuSize.split("x");
    live2d_settings.waifuTipsSize = live2d_settings.waifuTipsSize.split("x");
    live2d_settings.waifuEdgeSide = live2d_settings.waifuEdgeSide.split(":");
    $("#live2d").attr("width", live2d_settings.waifuSize[0]);
    $("#live2d").attr("height", live2d_settings.waifuSize[1]);
    $(".waifu-tips").width(live2d_settings.waifuTipsSize[0]);
    $(".waifu-tips").height(live2d_settings.waifuTipsSize[1]);
    $(".waifu-tips").css("top", live2d_settings.waifuToolTop);
    $(".waifu-tips").css("font-size", live2d_settings.waifuFontSize);
    $(".waifu-tool").css("font-size", live2d_settings.waifuToolFont);
    $(".waifu-tool span").css("line-height", live2d_settings.waifuToolLine);
    "left" == live2d_settings.waifuEdgeSide[0] ? $(".waifu").css("left", live2d_settings.waifuEdgeSide[1] + "px") : "right" == live2d_settings.waifuEdgeSide[0] && $(".waifu").css("right", live2d_settings.waifuEdgeSide[1] + "px");
    window.waifuResize = function () {
        $(window).width() <= Number(live2d_settings.waifuMinWidth.replace("px", "")) ? $(".waifu").hide() : $(".waifu").show()
    };
    "disable" != live2d_settings.waifuMinWidth && (waifuResize(), $(window).resize(function () {
        waifuResize()
    }));
    try {
        "axis-x" == live2d_settings.waifuDraggable ? $(".waifu").draggable({
            axis: "x",
            revert: live2d_settings.waifuDraggableRevert
        }) : "unlimited" == live2d_settings.waifuDraggable ? $(".waifu").draggable({
            revert: live2d_settings.waifuDraggableRevert
        }) : $(".waifu").css("transition", "all .3s ease-in-out")
    } catch (e) {
        console.log("[Error] JQuery UI is not defined.")
    }
    "auto" == live2d_settings.homePageUrl ? (window.location.protocol, window.location.hostname) : live2d_settings.homePageUrl;
    "file:" == window.location.protocol && "//" == live2d_settings.modelAPI.substr(0, 2) && (live2d_settings.modelAPI = "http:" + live2d_settings.modelAPI);
    $(".waifu-tool .fui-home").click(function () {
        window.location = live2d_settings.homePageUrl
    });
    $(".waifu-tool .fui-info-circle").click(function () {
        window.open(live2d_settings.aboutPageUrl)
    });
    "object" == (void 0 === a ? "undefined" : _typeof(a)) ? loadTipsMessage(a): $.ajax({
        cache: !0,
        url: "" == a ? live2d_settings.tipsMessage : "waifu-tips.json" == a.substr(a.length - 15) ? a : a + "waifu-tips.json",
        dataType: "json",
        success: function (a) {
            loadTipsMessage(a)
        }
    });
    live2d_settings.showToolMenu || $(".waifu-tool").hide();
    live2d_settings.canCloseLive2d || $(".waifu-tool .fui-cross").hide();
    live2d_settings.canSwitchModel || $(".waifu-tool .fui-eye").hide();
    live2d_settings.canSwitchTextures || $(".waifu-tool .fui-user").hide();
    live2d_settings.canSwitchHitokoto || $(".waifu-tool .fui-chat").hide();
    live2d_settings.canTakeScreenshot || $(".waifu-tool .fui-photo").hide();
    live2d_settings.canTurnToHomePage || $(".waifu-tool .fui-home").hide();
    live2d_settings.canTurnToAboutPage || $(".waifu-tool .fui-info-circle").hide();
    void 0 === a && (a = "");
    a = localStorage.getItem("modelId");
    c = localStorage.getItem("modelTexturesId");
    live2d_settings.modelStorage && null != a || (a = live2d_settings.modelId, c = live2d_settings.modelTexturesId);
    loadModel(a, c)
}

function loadModel(a) {
    var c = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : 0;
    live2d_settings.modelStorage ? (localStorage.setItem("modelId", a), localStorage.setItem("modelTexturesId", c)) : (sessionStorage.setItem("modelId", a), sessionStorage.setItem("modelTexturesId", c));
    loadlive2d("live2d", live2d_settings.modelAPI + "get/?id=" + a + "-" + c, live2d_settings.showF12Status ? console.log("[Status]", "live2d", "\u6a21\u578b", a + "-" + c, "\u52a0\u8f7d\u5b8c\u6210") : null)
}

function loadTipsMessage(a) {
    function c() {
        var a = g("modelId"),
            b = live2d_settings.modelRandMode;
        $.ajax({
            cache: "switch" == b,
            url: live2d_settings.modelAPI + b + "/?id=" + a,
            dataType: "json",
            success: function (a) {
                loadModel(a.model.id);
                var b = a.model.message;
                $.each(f.model_message, function (l, d) {
                    l == a.model.id && (b = getRandText(d))
                });
                showMessage(b, 3E3, !0)
            }
        })
    }

    function e() {
        var a = g("modelId"),
            b = g("modelTexturesId"),
            d = live2d_settings.modelTexturesRandMode;
        $.ajax({
            cache: "switch" == d,
            url: live2d_settings.modelAPI + d + "_textures/?id=" + a + "-" + b,
            dataType: "json",
            success: function (l) {
                1 != l.textures.id || 1 != b && 0 != b ? showMessage(f.load_rand_textures[1], 3E3, !0) : showMessage(f.load_rand_textures[0], 3E3, !0);
                loadModel(a, l.textures.id)
            }
        })
    }

    function g(a) {
        return live2d_settings.modelStorage ? localStorage.getItem(a) : sessionStorage.getItem(a)
    }

    function h() {
        "visible" == $(document)[0].visibilityState && k()
    }

    function k() {
        switch (live2d_settings.hitokotoAPI) {
        case "lwl12.com":
            $.getJSON("https://api.lwl12.com/hitokoto/v1?encode=realjson", function (a) {
                if (!empty(a.source)) {
                    var b = f.hitokoto_api_message["lwl12.com"][0];
                    empty(a.author) || (b += f.hitokoto_api_message["lwl12.com"][1]);
                    b = b.render({
                        source: a.source,
                        creator: a.author
                    });
                    window.setTimeout(function () {
                        showMessage(b + f.hitokoto_api_message["lwl12.com"][2], 3E3, !0)
                    }, 5E3)
                }
                showMessage(a.text, 5E3, !0)
            });
            break;
        case "fghrsh.net":
            $.getJSON("https://api.fghrsh.net/hitokoto/rand/?encode=jsc&uid=3335", function (a) {
                if (!empty(a.source)) {
                    var b = f.hitokoto_api_message["fghrsh.net"][0];
                    b = b.render({
                        source: a.source,
                        date: a.date
                    });
                    window.setTimeout(function () {
                        showMessage(b, 3E3, !0)
                    }, 5E3);
                    showMessage(a.hitokoto, 5E3, !0)
                }
            });
            break;
        case "jinrishici.com":
            $.ajax({
                url: "https://v2.jinrishici.com/one.json",
                xhrFields: {
                    withCredentials: !0
                },
                success: function (a, b) {
                    if (!empty(a.data.origin.title)) {
                        var d = f.hitokoto_api_message["jinrishici.com"][0];
                        d = d.render({
                            title: a.data.origin.title,
                            dynasty: a.data.origin.dynasty,
                            author: a.data.origin.author
                        });
                        window.setTimeout(function () {
                            showMessage(d, 3E3, !0)
                        }, 5E3)
                    }
                    showMessage(a.data.content, 5E3, !0)
                }
            });
            break;
        default:
            $.getJSON("https://v1.hitokoto.cn", function (a) {
                if (!empty(a.from)) {
                    var b = f.hitokoto_api_message["hitokoto.cn"][0];
                    b = b.render({
                        source: a.from,
                        creator: a.creator
                    });
                    window.setTimeout(function () {
                        showMessage(b, 3E3, !0)
                    }, 5E3)
                }
                showMessage(a.hitokoto, 5E3, !0)
            })
        }
    }
    window.waifu_tips = a;
    $.each(a.mouseover, function (a, b) {
        $(document).on("mouseover", b.selector, function () {
            var a = getRandText(b.text);
            a = a.render({
                text: $(this).text()
            });
            showMessage(a, 3E3)
        })
    });
    $.each(a.click, function (a, b) {
        $(document).on("click", b.selector, function () {
            var a = getRandText(b.text);
            a = a.render({
                text: $(this).text()
            });
            showMessage(a, 3E3, !0)
        })
    });
    $.each(a.seasons, function (a, b) {
        a = new Date;
        var d = b.date.split("-")[0],
            c = b.date.split("-")[1] || d;
        d.split("/")[0] <= a.getMonth() + 1 && a.getMonth() + 1 <= c.split("/")[0] && d.split("/")[1] <= a.getDate() && a.getDate() <= c.split("/")[1] && (b = getRandText(b.text), b = b.render({
            year: a.getFullYear()
        }), showMessage(b, 6E3, !0))
    });
    live2d_settings.showF12OpenMsg && (re.toString = function () {
        return showMessage(getRandText(a.waifu.console_open_msg), 5E3, !0), ""
    });
    live2d_settings.showCopyMessage && $(document).on("copy", function () {
        showMessage(getRandText(a.waifu.copy_message), 5E3, !0)
    });
    $(".waifu-tool .fui-photo").click(function () {
        showMessage(getRandText(a.waifu.screenshot_message), 5E3, !0);
        window.Live2D.captureName = live2d_settings.screenshotCaptureName;
        window.Live2D.captureFrame = !0
    });
    $(".waifu-tool .fui-cross").click(function () {
        sessionStorage.setItem("waifu-dsiplay", "none");
        showMessage(getRandText(a.waifu.hidden_message), 1300, !0);
        window.setTimeout(function () {
            $(".waifu").hide()
        }, 1300)
    });
    window.showWelcomeMessage = function (a) {
        if (window.location.href == live2d_settings.homePageUrl) {
            var b = (new Date).getHours();
            b = getRandText(23 < b || 5 >= b ? a.waifu.hour_tips.t23 - 5 : 5 < b && 7 >= b ? a.waifu.hour_tips.t5 - 7 : 7 < b && 11 >= b ? a.waifu.hour_tips.t7 - 11 : 11 < b && 14 >= b ? a.waifu.hour_tips.t11 - 14 : 14 < b && 17 >= b ? a.waifu.hour_tips.t14 - 17 : 17 < b && 19 >= b ? a.waifu.hour_tips.t17 - 19 : 19 < b && 21 >= b ? a.waifu.hour_tips.t19 - 21 : 21 < b && 23 >= b ? a.waifu.hour_tips.t21 - 23 : a.waifu.hour_tips.default)
        } else {
            var d = a.waifu.referrer_message;
            if ("" !== document.referrer) {
                var c = document.createElement("a");
                c.href = document.referrer;
                var e = c.hostname.split(".")[1];
                window.location.hostname == c.hostname ? b = d.localhost[0] + document.title.split(d.localhost[2])[0] + d.localhost[1] : "baidu" == e ? b = d.baidu[0] + c.search.split("&wd=")[1].split("&")[0] + d.baidu[1] : "so" == e ? b = d.so[0] + c.search.split("&q=")[1].split("&")[0] + d.so[1] : "google" == e ? b = d.google[0] + document.title.split(d.google[2])[0] + d.google[1] : ($.each(a.waifu.referrer_hostname, function (a, b) {
                    a == c.hostname && (c.hostname = getRandText(b))
                }), b = d.default[0] + c.hostname + d.default[1])
            } else b = d.none[0] + document.title.split(d.none[2])[0] + d.none[1]
        }
        showMessage(b, 6E3)
    };
    live2d_settings.showWelcomeMessage && showWelcomeMessage(a);
    var f = a.waifu;
    live2d_settings.showHitokoto && (window.getActed = !1, window.hitokotoTimer = 0, window.hitokotoInterval = !1, $(document).mousemove(function (a) {
        getActed = !0
    }).keydown(function () {
        getActed = !0
    }), setInterval(function () {
        getActed ? (getActed = hitokotoInterval = !1, window.clearInterval(hitokotoTimer)) : hitokotoInterval || (hitokotoInterval = !0, hitokotoTimer = window.setInterval(h, 3E4))
    }, 1E3));
    $(".waifu-tool .fui-eye").click(function () {
        c()
    });
    $(".waifu-tool .fui-user").click(function () {
        e()
    });
    $(".waifu-tool .fui-chat").click(function () {
        k()
    })
}
var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (a) {
    return typeof a
} : function (a) {
    return a && "function" == typeof Symbol && a.constructor === Symbol && a !== Symbol.prototype ? "symbol" : typeof a
};
window.live2d_settings = [];
live2d_settings.modelAPI = "//live2d.y-theta.com/live2d_web_api/";
live2d_settings.tipsMessage = "waifu-tips.json";
live2d_settings.hitokotoAPI = "lwl12.com";
live2d_settings.modelId = 1;
live2d_settings.modelTexturesId = 53;
live2d_settings.showToolMenu = !0;
live2d_settings.canCloseLive2d = !0;
live2d_settings.canSwitchModel = !0;
live2d_settings.canSwitchTextures = !0;
live2d_settings.canSwitchHitokoto = !0;
live2d_settings.canTakeScreenshot = !0;
live2d_settings.canTurnToHomePage = !0;
live2d_settings.canTurnToAboutPage = !0;
live2d_settings.modelStorage = !0;
live2d_settings.modelRandMode = "switch";
live2d_settings.modelTexturesRandMode = "rand";
live2d_settings.showHitokoto = !0;
live2d_settings.showF12Status = !0;
live2d_settings.showF12Message = !1;
live2d_settings.showF12OpenMsg = !0;
live2d_settings.showCopyMessage = !0;
live2d_settings.showWelcomeMessage = !0;
live2d_settings.waifuSize = "280x250";
live2d_settings.waifuTipsSize = "250x70";
live2d_settings.waifuFontSize = "12px";
live2d_settings.waifuToolFont = "14px";
live2d_settings.waifuToolLine = "20px";
live2d_settings.waifuToolTop = "0px";
live2d_settings.waifuMinWidth = "768px";
live2d_settings.waifuEdgeSide = "left:0";
live2d_settings.waifuDraggable = "disable";
live2d_settings.waifuDraggableRevert = !0;
live2d_settings.l2dVersion = "1.4.2";
live2d_settings.l2dVerDate = "2018.11.12";
live2d_settings.homePageUrl = "auto";
live2d_settings.aboutPageUrl = "http://www.y-theta.com/";
live2d_settings.screenshotCaptureName = "live2d.png";
String.prototype.render = function (a) {
    return this.replace(/(\\)?\{([^\{\}\\]+)(\\)?\}/g, function (c, e, g, h) {
        if (e || h) return c.replace("\\", "");
        var k;
        g = g.replace(/\s/g, "").split(".");
        h = a;
        c = 0;
        for (e = g.length; c < e; ++c)
            if (k = g[c], void 0 === (h = h[k]) || null === h) return "";
        return h
    })
};
var re = /x/;
console.log(re);