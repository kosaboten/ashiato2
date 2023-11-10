<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <div id="header-title">ASHIATO</div>
        <ul>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#works">WORKS</a></li>
            <li><a href="#skills">SKILLS</a></li>
            <li><a href="#contact">CONTACT</a></li>
        </ul>
    </header>
    <div id="contents">
        <div id="advertisements"></div>
        <div id="main-contents">
            <section>
                <a class="section-title" id="about">ABOUT</a>
            </section>
            <section>
                <a class="section-title" id="works">WORKS</a>
                <div class="works-box">
                    <div class="work"></div>
                    <div class="work"></div>
                    <div class="work"></div>
                </div>
            </section>
            <section>
                <a class="section-title" id="skills">SKILLS</a>
                <div id="skills-box">
                    <div class="chart"></div>
                    <div>
                        <p class="skill-title">使用言語 / ツール</p>
                        <p class="skill-body">java</p><br>
                        <p class="skill-title">保有資格</p>
                        <p class="skill-body">ap</p><br>
                        <p class="skill-title">職歴</p>
                        <p class="skill-body">なし</p><br>
                    </div>
                </div>

            </section>
            <section>
                <a class="section-title" id="contact">CONTACT</a><br>
                <div class="contact-icons">
                    <img src="マップ.png" alt="" id="map-icon">岩手県<br>
                </div>
                <div class="contact-icons">
                    <img src="マップ.png" alt="" id="mail-icon">sample@sample.com<br>
                </div>
                <br>
                <div id="sns-icons">
                    <img src="マップ.png" alt="">
                    <img src="マップ.png" alt="">
                    <img src="マップ.png" alt="">
                </div>
            </section>
        </div>
        <aside>
        </aside>
    </div>

</body>

</html>
