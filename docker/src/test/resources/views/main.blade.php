<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <!-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>メイン画面</title>
</head>

<?php
        // include("php/db_main_delete.php");   //論文削除
        //ディレクトリpublicを参照
?>


<form method="GET" action="{{ route('main') }}" id="delete">
    @csrf
</form>

<body>
    <div class="header">
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
        <a href="{{ url('/paper_add') }}" class="btn-register">+ 　新規登録　</a>
    </div>
    <div>
       <!-- <a href="#" class="btn-delete" >- 登録論文削除</a>-->
       <input type="submit" value="登録論文削除" class="btn-delete" form="delete">
    </div>


<!--
    <table border="1" style="border-collapse: collapse">
        <tr>
            <th bgcolor="#cccccc"> </th>
            <th bgcolor="#cccccc">論文名</th>
            <th bgcolor="#cccccc">最終更新日</th>
            <th bgcolor="#cccccc">登録日時</th>
        </tr>
        <?php
            // include("php/db_main_select.php");   //ディレクトリpublicを参照
        ?>

    </table> -->

    <!-- <div id="app">
        <div class="row justify-content-center">
            <main-component></main-component>
        </div>
    </div> -->

    <!-- https://github.com/rubanraj54/vue-bootstrap4-table#17-events -->
    <div class="container" id="app">
        <vue-bootstrap4-table />
    </div>

    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</body>
</html>
