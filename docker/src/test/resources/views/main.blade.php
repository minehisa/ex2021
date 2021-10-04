<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <title>Main画面</title>
</head>


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
  <h1 class="page-title">Main画面</h1>


  <div>
    <a href="{{ url('/paper_add') }}" class="btn-register">+ 　新規登録　</a>
  </div>
  <div>
    <!-- <a href="#" class="btn-delete" >- 登録論文削除</a>-->
    <input type="submit" value="登録論文削除" class="btn-delete" form="delete">
  </div>

  <div class="container" id="app">
    <vue-bootstrap4-table />
  </div>

</body>

</html>
