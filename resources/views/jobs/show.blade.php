<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/job-show.css') }}">
</head>

<body>
    <x-header />

    <div id="main-contents">
        <div>
        </div>
        <div id="about">
            <h1>{{ $job->title }}</h1>
            <!--   ここに画像を挿入   -->
            <img id=job-img src="{{ Storage::url('images/jobs/' . $job->image) }}" alt="">
            <div id="detail">
                <div>
                    <h3>勤務地</h3>
                    <p>{{ $job->region }}</p>
                    <p>{{ $job->access }}</p>
                </div>
                <div>
                    <h3>勤務時間</h3>
                    <p>月曜日〜金曜日 9:00 - 17:00 (休憩1時間)</p>
                </div>
                <div>
                    <h3>仕事内容</h3>
                    <p>{!! nl2br(e($job->job_description)) !!}</p>
                </div>
                <div>
                    <h3>雇用形態</h3>
                    <p>{{ $job->employment_status }}</p>
                </div>
                <div>
                    <h3>給与・報酬</h3>
                    <p>{{ $job->eligibility }}</p>
                </div>
                <div>
                    <h3>応募条件</h3>
                    <p>{!! nl2br(e($job->eligibility)) !!}</p>
                </div>
                <div>
                    <h3>住所</h3>
                    <p>{{ $job->address }}-2-3</p>
                </div>
                <div id="contact">
                    <h3>お問い合わせ</h3>
                    <p>{!! nl2br(e($job->contact)) !!}</p>
                </div>
            </div>
        </div>
        <div id="contact-form">
            <div>
                <h3>お問い合わせ</h3>
                <p>TEL: 1234-56-7890</p>
                <p>Email: example@gmail.com</p>
                <br>
                <button type="button">応募する</button>
            </div>
        </div>
    </div>
</body>

</html>
