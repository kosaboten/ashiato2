<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolios-show.css') }}">
</head>

<body>
    <header>
        <div id="header-title"><a href="{{ route('jobs.index') }}">ASHIATO</a></div>
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
                <a class="section-title" id="about">ABOUT</a><br>
                <img src="{{ $portfolio->image_url() }}" alt="イメージ" style="height: 200px; width: 200px; object-fit: cover; border-radius: 100px;">
                {{ $portfolio->user->name }}<br>
                {{ $portfolio->self_introduction }}
            </section>
            <section>
                <a class="section-title" id="works" href="{{ route('works.show', $portfolio) }}">works.show</a>
                <div class="works-box">
                    <div class="work"></div>
                    <div class="work"></div>
                    <div class="work"></div>
                </div>
            </section>
            <section>
                <a class="section-title" id="skills">SKILLS</a>
                <div id="skills-box">
                    @if (count($skills) > 4)
                        <div class="chart"></div>
                        <div style="position:relative;height: 400px; width: 400px;">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                    @endif

                    <div>
                        <p class="skill-title">使用言語 / ツール</p>
                        <ul>
                            @foreach ($skills as $skill)
                                <li>{{ $skill->name }}/レベル{{ $skill->level }}</li>
                            @endforeach
                        </ul>
                        <br>
                        <p class="skill-title">保有資格</p>
                        基本情報<br>
                        応用情報<br>
                        Linucレベル1<br>
                        <br>
                        <p class="skill-title">職歴</p>
                        <p class="skill-body">{{ $portfolio->work_experience }}</p><br>
                    </div>
                </div>

            </section>
            <section>
                <a class="section-title" id="contact">CONTACT</a><br>
                <div class="contact-icons">
                    地域:{{ $portfolio->region }}<br>
                </div>
                <div class="contact-icons">
                    mail:{{ $portfolio->user->email }}<br>
                </div>
                <br>
                <div id="sns-icons">
                    Twitter : {{ $portfolio->twitter }}<br>
                    Facebook:{{ $portfolio->facebook }}<br>
                    Instagram:{{ $portfolio->instagram }}<br>
                </div>
            </section>
        </div>
        <aside>
        </aside>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    @if (count($skills) > 4)
        <script>
            let ctx = document.getElementById("myChart");
            ctx.width = 400;
            ctx.height = 400;
            let name1 = '{{ $skills[0]->name }}';
            let name2 = '{{ $skills[1]->name }}';
            let name3 = '{{ $skills[2]->name }}';
            let name4 = '{{ $skills[3]->name }}';
            let name5 = '{{ $skills[4]->name }}';

            let level1 = {{ $skills[0]->level }};
            let level2 = {{ $skills[1]->level }};
            let level3 = {{ $skills[2]->level }};
            let level4 = {{ $skills[3]->level }};
            let level5 = {{ $skills[4]->level }};

            console.log(name1)
            let myChart = new Chart(ctx, {
                //グラフの種類
                type: 'radar',

                //データの設定
                data: {
                    //データ項目のラベル
                    labels: [name1, name2, name3, name4, name5],
                    //データセット
                    datasets: [{
                        label: "スキル分析",
                        //背景色
                        backgroundColor: "rgba(51,255,51,0.5)",
                        //枠線の色
                        borderColor: "rgba(51,255,51,1)",
                        //結合点の背景色
                        pointBackgroundColor: "rgba(51,255,51,1)",
                        //結合点の枠線の色
                        pointBorderColor: "#fff",
                        //結合点の背景色（ホバ時）
                        pointHoverBackgroundColor: "#fff",
                        //結合点の枠線の色（ホバー時）
                        pointHoverBorderColor: "rgba(51,255,51,1)",
                        //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
                        hitRadius: 5,
                        //グラフのデータ
                        data: [level1, level2, level3, level4, level5],
                    }]
                },
                //オプションの設定
                options: {
                    // レスポンシブ指定
                    responsive: true,
                    maintainAspectRatio: false,
                    scale: {
                        ticks: {
                            // 最小値の値を0指定
                            beginAtZero: true,
                            min: 0,
                            stepSize: 1,
                            // 最大値を指定
                            max: 4,
                        },
                        pointLabels: {
                            fontSize: 10
                        }
                    },
                    //ラベル非表示
                    legend: {
                        // display: false
                        fontSize: 10,
                        labels: {
                            // このフォント設定はグローバルプロパティを上書きします。
                            fontSize: 14,
                        }
                    }

                }
            });
            myChart.canvas.parentNode.height = '128px';
            myChart.canvas.parentNode.width = '128px';
        </script>
    @endif
</body>

</html>
