<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCHIVEZ</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>landingpage/img/archivezLogo1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/animated-headline.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>landingpage/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script nonce="f29f8463-67b8-417d-84d8-122ce2a7532e">
        (function(w, d) {
            ! function(bb, bc, bd, be) {
                bb[bd] = bb[bd] || {};
                bb[bd].executed = [];
                bb.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bb.zaraz.q = [];
                bb.zaraz._f = function(bf) {
                    return async function() {
                        var bg = Array.prototype.slice.call(arguments);
                        bb.zaraz.q.push({
                            m: bf,
                            a: bg
                        })
                    }
                };
                for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh);
                bb.zaraz.init = () => {
                    var bi = bc.getElementsByTagName(be)[0],
                        bj = bc.createElement(be),
                        bk = bc.getElementsByTagName("title")[0];
                    bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text);
                    bb[bd].x = Math.random();
                    bb[bd].w = bb.screen.width;
                    bb[bd].h = bb.screen.height;
                    bb[bd].j = bb.innerHeight;
                    bb[bd].e = bb.innerWidth;
                    bb[bd].l = bb.location.href;
                    bb[bd].r = bc.referrer;
                    bb[bd].k = bb.screen.colorDepth;
                    bb[bd].n = bc.characterSet;
                    bb[bd].o = (new Date).getTimezoneOffset();
                    if (bb.dataLayer)
                        for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({
                                ...bp[1],
                                ...bq[1]
                            })), {}))) zaraz.set(bo[0], bo[1], {
                            scope: "page"
                        });
                    bb[bd].q = [];
                    for (; bb.zaraz.q.length;) {
                        const br = bb.zaraz.q.shift();
                        bb[bd].q.push(br)
                    }
                    bj.defer = !0;
                    for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => {
                        try {
                            bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt))
                        } catch {
                            bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt)
                        }
                    }));
                    bj.referrerPolicy = "origin";
                    bj.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd])));
                    bi.parentNode.insertBefore(bj, bi)
                };
                ["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

</head>

<body>

</body>

</html>