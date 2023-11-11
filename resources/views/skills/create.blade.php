<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<p class="skill-title">使用言語 / ツール</p>
<br>
<div>
    <p class="skill-level">1: サッと学んだ程度</p><br>
    <p class="skill-level">2: 使用経験あり</p><br>
    <p class="skill-level">3: 半年以上学んだ</p><br>
    <p class="skill-level">4: 実務レベルで使いこなせる</p><br>
</div>

<form action="{{ route('skills.store') }}" method="POST">
    @csrf
    <label>使用言語/ツール</label>
    <input type="text" name="name"><br>
    <label>レベル</label>
    <input type="number" name="level"><br>
    <button type="submit">登録</button>
</form>
    
</body>
</html>
