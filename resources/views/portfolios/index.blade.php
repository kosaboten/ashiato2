<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio-index.css') }}">
</head>

<body>
    <x-header />
    <div id="main-contents">
        <form action="#">
            <div id="search">
                <input type="text" name="keyword" placeholder="キーワードで検索">
                <button type="submit">search</button>
            </div>
            <div id="filter">
                <h2>フィルター検索</h2>
                <div id="dropdown-group">
                    <div class="dropdown">
                        <select name="one" class="dropdown-select">
                            <option value="">業種</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                    <div class="dropdown">
                        <select name="one" class="dropdown-select">
                            <option value="">ポジション</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                    <div class="dropdown">
                        <select name="one" class="dropdown-select">
                            <option value="">雇用形態</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                    <div class="dropdown">
                        <select name="one" class="dropdown-select">
                            <option value="">勤務地</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                    <div class="dropdown">
                        <select name="one" class="dropdown-select">
                            <option value="">新しい順</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        {{-- ここから人材一覧 --}}
        <div id="jinzai">
            <div id="portfolio-list">
                <div class="portfolio">
                    <div class="wrap">
                        <div class="flex-box">
                            <img class="portfolio-img" src="java.jpg" alt="職">
                            <p class="name">山田太郎</p>
                            <div class="like-button">
                                <img src="heart.png" alt=""> 100
                            </div>
                        </div>
                        <p class="self-introduction">
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                            ここにテキストが入ります。ここにテキスト
                        </p>
                    </div>
                </div>

                <div class="job">

                </div>
            </div>
        </div>

    </div>

</body>

</html>
