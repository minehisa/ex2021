<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
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
          <!--<a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>-->
          <!-- <span class="icon-user"></span>
          <span class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">{{substr($email,0,1)}}</span>
          <p class="name-user">{{mb_strstr($email,'@',true)}}@******</p> -->
          <button id="icon-user" class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">
            {{substr($email,0,1)}}
          </button>
            <div class="dropdown-body">
              <ul class="dropdown-list">
                <li class="dropdown-username"><a>{{mb_strstr($email,'@',true)}}@******</a></li>
                <li><hr style="border-top: 10px double #000;"/></li>
                <li class="dropdown-item"><a>なにか</a></li>
                <li class="dropdown-item"><a>めにゅーを</a></li>
                <li class="dropdown-item">
                  <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                  </a>
                </li>
              </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form> 
        </div>
      </div>
    </div>
  </nav>

  <!-- <div class="container">
    <div class="text-left">
      <a href="{{ url('/paper_add') }}" class="btn-register">+ 新規登録</a>
    </div>
    <div class="text-left">
      <a v-on:click="deletePapers" class=" btn-delete">- 登録論文削除</a> -->
  <!-- <input type="submit" value="登録論文削除" class="btn-delete" form="delete"> -->
  <!-- <button v-on:click="deletePapers" type="button" class="btn-delete">論文削除</button>
    </div>

  </div> -->
  <div class="book-table">
    <div class="container" id="app">
      <vue-bootstrap4-table></vue-bootstrap4-table>
      <!-- <vue-bootstrap4-table /> -->
    </div>
</div>

  <!-- <script src="{{ mix('js/app.js') }}"></script> -->

</body>

</html>
