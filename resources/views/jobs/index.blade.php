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
    <link rel="stylesheet" href="{{ asset('css/job-index.css') }}">
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

        <!-- ここから求人情報表示 -->
        <div id="job-list">
            @foreach ($jobs as $job)
                <div class="job">
                    <a href="{{ route('jobs.show', $job->id) }}">
                        <div class="wrap">
                            <p class="company">{{ $job->company->name }}</p>
                            <br>
                            <p class="title">【{{ $job->title }}】</p>
                            <p class="job-description">
                                {{ substr($job->job_description, 0, 48) }}
                            </p>
                            <br>
                            <img class="job-img" src="{{ $job->image_url() }}" alt="職場の画像">
                            <br>
                            <br>
                            <div class="like-button">
                                <img src="{{ asset('images/heart.png') }}" alt="いいね"> 100
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


            <div class="job">

            </div>
        </div>
    </div>

</body>

</html>
