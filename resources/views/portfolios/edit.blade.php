<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolios-edit.css') }}">
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
    <x-validation-errors :errors="$errors" />

    <div id="contents">
        {{-- 右側の空白部分 --}}
        <div id="advertisements"></div>

        {{-- メインコンテンツ --}}
        <div id="main-contents">
            <h2>編集画面</h2>
            <form action="{{ route('portfolios.update', $portfolio) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <section>'
                    <a class="section-title" id="about">ABOUT</a><br>
                    <label>アイコン画像をアップロード</label><br>
                    <img style="width: 300px;" src="{{ $portfolio->image_url() }}" alt="" class="mb-4 md:w-2/5 sm:auto"><br>
                    <input type="file" name="image" class="border-gray-300"><br>
                    <br>
                    名前:{{ $portfolio->user->name }}<br><br>
                    <label>所属</label><br>
                    <input type="text" name="affiliation" value="{{ old('affiliation', $portfolio->affiliation) }}"><br>
                    <label>自己紹介</label><br>
                    <textarea name="self_introduction" cols="40">{{ old('self_introduction', $portfolio->self_introduction) }}</textarea>
                </section>
                <section>
                    <a class="section-title" id="works">WORKS</a>
                    <div class="works-box">
                        <a href="#">
                            <div class="work"></div>
                        </a>
                    </div>
                </section>
                <section>
                    <a class="section-title" id="skills">SKILLS</a>
                    <div id="skills-box">
                        <div>
                            <a href="{{ route('skills.create', $portfolio) }}"><p class="skill-title">使用言語 / ツール</p></a>
                            <ul>
                                @foreach ($skills as $skill)
                                    {{ $skill->name }}/レベル{{ $skill->level }}
                                @endforeach
                            </ul>
                            <div>
                                <p class="skill-title">保有資格</p>
                                <p class="work_experience">職歴</p>
                                <textarea name="work_experience" cols="30" rows="8">{{ old('work_experience', $portfolio->work_experience) }}</textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <a class="section-title" id="contact">CONTACT</a><br>
                    <div class="contact-icons">
                        住んでいる地域<input type="text" name="region" value="{{ old('region', $portfolio->region) }}"><br>
                    </div>
                    Twitter<input type="text" name="twitter" value="{{ old('region', $portfolio->twitter) }}"><br>
                    Facebook<input type="text" name="facebook" value="{{ old('region', $portfolio->facebook) }}"><br>
                    Instagram<input type="text" name="instagram" value="{{ old('region', $portfolio->instagram) }}"><br>
                </section>

                公開しますか？
                <label class="toggle-button-001">
                    <input type="checkbox" name="public_status" value="1" {{ $portfolio->public_status ? "checked" : "" }}>
                </label><br>

                <button type="submit">変更</button>
            </form>
        </div>
    </div>

</body>

</html>
