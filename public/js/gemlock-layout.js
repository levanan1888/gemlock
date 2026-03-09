WebFont.load({
    google: {
        families: [
            "IBM Plex Sans:100,200,300,regular,500,600,700",
            "IBM Plex Serif:100,200,300,regular,500,600,700"
        ]
    }
});

!function (o, c) {
    var n = c.documentElement, t = " w-mod-";
    n.className += t + "js";
    if ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) {
        n.className += t + "touch";
    }
}(window, document);
