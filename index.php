<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="image/favicon.ico">
    <title>KAVIN YÊU VỢ THỎ</title>

    <link rel="stylesheet" href="./renxi/default.css?v=20260624-2">
    <link rel="stylesheet" href="./renxi/scroll.css">

    <!-- Giữ nguyên thứ tự thư viện để tránh ảnh hưởng hiệu ứng Jscex cũ -->
    <script src="./renxi/jquery.min.js"></script>
    <script src="./renxi/jscex.min.js"></script>
    <script src="./renxi/jscex-parser.js"></script>
    <script src="./renxi/jscex-jit.js"></script>
    <script src="./renxi/jscex-builderbase.min.js"></script>
    <script src="./renxi/jscex-async.min.js"></script>
    <script src="./renxi/jscex-async-powerpack.min.js"></script>
    <script src="./renxi/functions.js?v=20260624-3" charset="utf-8"></script>
    <script src="./renxi/love.js" charset="utf-8"></script>

    <style>
        .STYLE1 {
            color: #666666;
        }

        body {
            margin: 0;
            overflow: hidden;
        }

        #music-toggle {
            position: fixed;
            right: 18px;
            bottom: 18px;
            z-index: 9999;
            display: none;
            padding: 9px 14px;
            border: 0;
            border-radius: 20px;
            background: rgba(190, 26, 37, 0.88);
            color: #ffffff;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.25);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        #music-toggle:hover {
            opacity: 0.92;
            transform: translateY(-1px);
        }

        #music-toggle:focus {
            outline: 2px solid #ffffff;
            outline-offset: 2px;
        }

        .love-message {
            color: #3498db;
        }
    </style>
</head>

<body>
    <!--
        autoplay được giữ để thử phát ngay khi trình duyệt cho phép.
        Tuy nhiên Chrome/Edge/Safari hiện nay có thể chặn autoplay có tiếng.
    -->
    <audio id="bg-music" autoplay loop preload="auto">
        <source src="music/ido.mp3" type="audio/mpeg">
        Trình duyệt của bạn không hỗ trợ phát nhạc.
    </audio>

    <button id="music-toggle" type="button" aria-label="Bật hoặc tắt nhạc nền">
        ▶ Bật nhạc
    </button>

    <div id="main">
        <div id="error">
            Trình duyệt của bạn không được hỗ trợ.
            Dùng
            <a href="https://www.google.com/chrome/" target="_blank" rel="noopener noreferrer">Chrome</a>
            hoặc
            <a href="https://www.mozilla.org/firefox/new/" target="_blank" rel="noopener noreferrer">Firefox</a>.
        </div>

        <div id="wrap">
            <div id="text">
                <div id="code" class="love-message">
                    <span class="say"><strong>Vợ Thỏ ơi,</strong></span><br>
                    <span class="say">&nbsp;</span><br>
                    <span class="say">Duyên trời dẫn lối đôi ta</span><br>
                    <span class="say">Hữu duyên hồng trần kiếp này</span><br>
                    <span class="say">Hẹn thề mình bên nhau dẫu trăm ngàn bể dâu...</span><br>
                    <span class="say">Em có biết bao đêm anh nằm thao thức vì em</span><br>
                    <span class="say">Nụ cười ánh mắt ngây thơ khiến trái tim anh thẫn thờ</span><br>
                    <span class="say">Trên có muôn ngàn mây theo gió bốn phương trời đó đây</span><br>
                    <span class="say">Mặt hồ nước long lanh, trăng soi bóng in hình đôi ta...</span><br>
                    <span class="say">&nbsp;</span><br>

                    <span class="say">
                        <span class="space"></span><strong>
                        -- Kavin Tùng ❤ Thanh Thỏa --
                    </strong></span>

                    <br><br><br><br>

                    <span class="say"><strong>© 2021 Information</strong></span><br>
                    <span class="say"><strong>Facebook:</strong> FB.com/KavinTung.HR</span><br>
                    <span class="say"><strong>Motify by:</strong> Kavin Tùng</span><br>
                    <span class="say">
                        <strong>Tải code:</strong>
                        <a href="https://github.com/KavinTung/TheHeartTree/" target="_blank" rel="noopener noreferrer" style="font-weight: bold;">
                            Github/TheHeartTree
                        </a>
                    </span><br>
                </div>
            </div>

            <div id="clock-box">
                <span class="STYLE1"></span><br>
                <span style="color: #FF0000;font-size: 28px">Kavin Tùng ❤ Thanh Thỏa</span>
                <span class="STYLE1"> trong:</span><br>
                <div id="clock"></div>
            </div>

            <canvas
                id="canvas"
                width="1100"
                height="680"
                aria-label="Hiệu ứng cây tình yêu">
            </canvas>
        </div>
    </div>

    <div style="text-align:center; margin:0; font:normal 14px/24px 'Microsoft YaHei', Arial, sans-serif;">
        <p>© 2021 Mãi Yêu 4T</p>
    </div>

    <script>
        (function () {
            var music = document.getElementById("bg-music");
            var musicButton = document.getElementById("music-toggle");

            if (!music || !musicButton) {
                return;
            }

            function updateMusicButton() {
                if (music.paused) {
                    musicButton.textContent = "▶ Bật nhạc";
                    musicButton.style.display = "block";
                } else {
                    musicButton.textContent = "❚❚ Tắt nhạc";
                    musicButton.style.display = "block";
                }
            }

            function playMusic() {
                var playPromise = music.play();

                if (playPromise !== undefined) {
                    playPromise
                        .then(function () {
                            updateMusicButton();
                        })
                        .catch(function () {
                            /*
                             * Trình duyệt chặn autoplay có tiếng.
                             * Khi đó nút bật nhạc sẽ hiện ra để người dùng tự bấm.
                             */
                            musicButton.textContent = "▶ Bật nhạc";
                            musicButton.style.display = "block";
                        });
                }
            }

            function toggleMusic() {
                if (music.paused) {
                    playMusic();
                } else {
                    music.pause();
                    updateMusicButton();
                }
            }

            musicButton.addEventListener("click", function (event) {
                event.stopPropagation();
                toggleMusic();
            });

            music.addEventListener("play", updateMusicButton);
            music.addEventListener("pause", updateMusicButton);

            /*
             * Thử autoplay ngay khi tải trang.
             * Nếu trình duyệt chặn, nhạc sẽ chạy ở lần click/chạm đầu tiên trên trang.
             */
            window.addEventListener("load", function () {
                playMusic();
            });

            document.addEventListener("pointerdown", function startMusicOnFirstInteraction() {
                if (music.paused) {
                    playMusic();
                }

                document.removeEventListener("pointerdown", startMusicOnFirstInteraction);
            }, { once: true });
        })();
    </script>

    <script>
        (function () {
            var canvas = $("#canvas");

            if (!canvas[0] || !canvas[0].getContext) {
                $("#error").show();
                return false;
            }

            var width = canvas.width();
            var height = canvas.height();

            canvas.attr("width", width);
            canvas.attr("height", height);

            var opts = {
                seed: {
                    x: width / 2 - 20,
                    color: "rgb(190, 26, 37)",
                    scale: 2
                },

                branch: [
                    [
                        535, 680, 570, 250, 500, 200, 30, 100,
                        [
                            [
                                540, 500, 455, 417, 340, 400, 13, 100,
                                [
                                    [450, 435, 434, 430, 394, 395, 2, 40]
                                ]
                            ],
                            [
                                550, 445, 600, 356, 680, 345, 12, 100,
                                [
                                    [578, 400, 648, 409, 661, 426, 3, 80]
                                ]
                            ],
                            [539, 281, 537, 248, 534, 217, 3, 40],
                            [
                                546, 397, 413, 247, 328, 244, 9, 80,
                                [
                                    [427, 286, 383, 253, 371, 205, 2, 40],
                                    [498, 345, 435, 315, 395, 330, 4, 60]
                                ]
                            ],
                            [
                                546, 357, 608, 252, 678, 221, 6, 100,
                                [
                                    [590, 293, 646, 277, 648, 271, 2, 80]
                                ]
                            ]
                        ]
                    ]
                ],

                bloom: {
                    num: 700,
                    width: 1080,
                    height: 650
                },

                footer: {
                    width: 1200,
                    height: 5,
                    speed: 10
                }
            };

            var tree = new Tree(canvas[0], width, height, opts);
            var seed = tree.seed;
            var foot = tree.footer;
            var hold = 1;

            canvas
                .on("click", function (event) {
                    var offset = canvas.offset();
                    var x = event.pageX - offset.left;
                    var y = event.pageY - offset.top;

                    if (seed.hover(x, y)) {
                        hold = 0;
                        canvas.off("click mousemove");
                        canvas.removeClass("hand");
                    }
                })
                .on("mousemove", function (event) {
                    var offset = canvas.offset();
                    var x = event.pageX - offset.left;
                    var y = event.pageY - offset.top;

                    canvas.toggleClass("hand", seed.hover(x, y));
                });

            var seedAnimate = eval(Jscex.compile("async", function () {
                seed.draw();

                while (hold) {
                    $await(Jscex.Async.sleep(10));
                }

                while (seed.canScale()) {
                    seed.scale(0.95);
                    $await(Jscex.Async.sleep(10));
                }

                while (seed.canMove()) {
                    seed.move(0, 2);
                    foot.draw();
                    $await(Jscex.Async.sleep(10));
                }
            }));

            var growAnimate = eval(Jscex.compile("async", function () {
                do {
                    tree.grow();
                    $await(Jscex.Async.sleep(10));
                } while (tree.canGrow());
            }));

            var flowAnimate = eval(Jscex.compile("async", function () {
                do {
                    tree.flower(2);
                    $await(Jscex.Async.sleep(10));
                } while (tree.canFlower());
            }));

            var moveAnimate = eval(Jscex.compile("async", function () {
                tree.snapshot("p1", 240, 0, 610, 680);

                while (tree.move("p1", 500, 0)) {
                    foot.draw();
                    $await(Jscex.Async.sleep(10));
                }

                foot.draw();
                tree.snapshot("p2", 500, 0, 610, 680);

                canvas.parent().css(
                    "background",
                    "url(" + tree.toDataURL("image/png") + ")"
                );

                canvas.css("background", "#ffe");
                $await(Jscex.Async.sleep(300));
                canvas.css("background", "none");
            }));

            var jumpAnimate = eval(Jscex.compile("async", function () {
                while (true) {
                    tree.ctx.clearRect(0, 0, width, height);
                    tree.jump();
                    foot.draw();
                    $await(Jscex.Async.sleep(25));
                }
            }));

            var textAnimate = eval(Jscex.compile("async", function () {
                var together = new Date();

                /*
                 * Giữ nguyên mốc cũ:
                 * setFullYear(2017, 10, 20) = ngày 20/11/2017
                 * Tháng trong JavaScript bắt đầu từ 0.
                 */
                together.setFullYear(2017, 10, 20);
                together.setHours(0);
                together.setMinutes(0);
                together.setSeconds(0);
                together.setMilliseconds(0);

                $("#code").show().typewriter();
                $("#clock-box").fadeIn(500);

                while (true) {
                    timeElapse(together);
                    $await(Jscex.Async.sleep(1000));
                }
            }));

            var runAsync = eval(Jscex.compile("async", function () {
                $await(seedAnimate());
                $await(growAnimate());
                $await(flowAnimate());
                $await(moveAnimate());

                textAnimate().start();

                $await(jumpAnimate());
            }));

            runAsync().start();
        })();
    </script>
</body>
</html>
