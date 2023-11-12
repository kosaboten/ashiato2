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
        <x-validation-errors :errors="$errors" />

        <div id="main-contents">
            <form id="job-register" action="{{ route('works.store') }}" method="POST"  enctype="multipart/form-data">
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
                    <label for="job_description">使用言語</label><br>
                    <textarea id="job_description" name="job_description" cols="40">{{ old('job_description') }}</textarea>
                </div>
                <div>
                    <label for="region">役割</label><br>
                    <input type="text" name="region" id="region" value="{{ old('region') }}">
                </div>
                <div>
                    <label for="access">アプリのURL</label><br>
                    <input type="text" id="access" name="access" value="{{ old('access') }}">
                </div>
                                <div>
                    <label for="access">GitHubのURL</label><br>
                    <input type="text" id="access" name="access" value="{{ old('access') }}">
                </div>
                <div>
                    <label for="job_description">本文(アプリの説明)</label><br>
                    <textarea id="job_description" name="job_description" cols="40">{{ old('job_description') }}</textarea>
                </div>
                                公開しますか？
                <label class="toggle-button-001">
                    <input type="checkbox" name="public_status" value="1" {{ $portfolio->public_status ? "checked" : "" }}>
                </label><br>
            </form>
            <div>
                <button form="job-register" type="submit">登録する</button>
            </div>
        </div>
</body>
</html>
