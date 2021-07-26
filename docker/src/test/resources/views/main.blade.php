<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>メイン画面</title>
</head>

<body>
    <div class="header">
        <!-- <a href="{{ route('logout') }}" class="btn-logout">ログアウト</a> -->
        <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <span class="icon-user"></span>
    </div>
    <h1 class="page-title">論文追加</h1>
    <div>
        <a href="./paper_add.html" class="btn-register">+ 　新規登録　</a>
    </div>
    <div>
        <a href="#" class="btn-delete">- 登録論文削除</a>
    </div>

    <table border="1" style="border-collapse: collapse">
        <tr>
            <th bgcolor="#cccccc"> </th>
            <th bgcolor="#cccccc">論文名</th>
            <th bgcolor="#cccccc">最終更新日</th>
            <th bgcolor="#cccccc">登録日時</th>
        </tr>
    </table>

    <!-- <div id="app"> -->
    <!-- <div class="row justify-content-center"> -->
    <!-- <example-component></example-component> -->
    <!-- <main-table></main-table> -->
    <!-- </div> -->
    <!-- </div> -->


    <!-- vue.js -->
    <!-- <div class="maintable">
        <main-table></main-table>
    </div> -->

    <!-- bootstrap-table -->
    <div class="container">
        このしたにコンポーネント
        <bootstrap-table-component models='@json($models)' />
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
