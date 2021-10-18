<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/icon.js') }}"></script>
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

  <title>Main画面</title>
</head>


<form method="GET" action="{{ route('main') }}" id="delete">
  @csrf
</form>

<body>

  <!-- grid -->
  <nav>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-3">
        </div>
        <div class="col-6">
          <h1 class="page-title">Main画面</h1>
        </div>
        <div class="col-3 text-center text-lg-start">
          <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          <!-- <span class="icon-user"></span> -->
          <span class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">{{substr($email,0,1)}}</span>
          <p class="name-user">{{mb_strstr($email,'@',true)}}@******</p>
          <p class="name-user">{{mb_strstr($email,'@',true)}}@******</p>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="text-left">
      <a href="{{ url('/paper_add') }}" class="btn-register">+ 新規登録</a>
    </div>
    <div class="text-left">
      <a href="" class=" btn-delete">- 登録論文削除</a>
      <!-- <input type="submit" value="登録論文削除" class="btn-delete" form="delete"> -->
      <!-- <button type="button" class="btn-delete">論文削除</button> -->
    </div>

  </div>

  <div class="container" id="app">
    <vue-bootstrap4-table />
  </div>

</body>

</html>
