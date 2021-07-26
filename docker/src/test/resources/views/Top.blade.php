<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('/css/Top.css') }}">
        <title>Topページ</title>
    </head>

    <body>
        <h1 class="page-title">文献管理システム</h1>
        <p class="mb10"></p>
        <form>
            <div class="center">
                @auth
                  <a href="{{ url('/main') }}" class="btn-open">Main画面</a>
                @else
                  <a href="{{ route('login') }}" class="btn-open">ログイン</a>
                  <a href="{{ route('register') }}" class="btn-open">新規登録</a>
                @endauth
            </div>
        </form>
    </body>
</html>
