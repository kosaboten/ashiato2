<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/job-create.css') }}">
</head>

<body>
    <x-header/>
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-2" role="alert">
                <p>
                    <b>{{ count($errors) }}件のエラーがあります。</b>
                </p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="main-contents">
            <form id="job-register" action="{{ route('jobs.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">タイトルを入力してください:</label><br>
                    <input type="text" id="title" name="title" value="{{ old('title') }}">
                </div>
                <div>
                    <!--    このあたりに780*440の画像を表示    -->
                <label for="image">イメージ</label><br>
                <input type="file" name="image">
                </div>
                <div>
                    <label for="region">勤務地</label><br>
                    <input type="text" name="region" id="region" value="{{ old('region') }}">
                </div>
                <div>
                    <label for="access">アクセス</label><br>
                    <input type="text" id="access" name="access" value="{{ old('access') }}">
                </div>
                <div>
                    <label for="job_description">業務内容</label><br>
                    <textarea id="job_description" name="job_description" cols="40">{{ old('job_description') }}</textarea>
                </div>
                <div>
                    <label for="employment_status">雇用形態</label><br>
                    <input type="text" id="employment_status" name="employment_status" value="{{ old('employment_status') }}">
                </div>
                <div>
                    <label for="eligibility">応募資格</label><br>
                    <textarea id="eligibility" name="eligibility">{{ old('eligibility') }}</textarea>
                </div>
                <div>
                    <label for="pay">給与･報酬</label><br>
                    <input type="text" id="pay" name="pay" value="{{ old('pay') }}">
                </div>
                <div>
                    <label for="address">住所</label><br>
                    <input type="text" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div>
                    <label for="contact">お問い合わせ</label><br>
                    <textarea id="contact" name="contact">{{ old('contact') }}</textarea>
                </div>
            </form>
            <div>
                <button form="job-register" type="submit">登録する</button>
            </div>
        </div>
</body>
</html>
