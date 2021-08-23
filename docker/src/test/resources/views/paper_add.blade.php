<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('/css/paper_add.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}"> -->

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <!-- <script type="text/javascript" src="{{ asset('/js/dropzone.js') }}"></script> -->
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
  <!-- <script type="module">
        @yield('script')
    </script> -->

  <!-- 下部にタイトルを動的に適用 -->
  <title>文献追加</title>
</head>

<body>
  <div class="header">
    <h1 class="page-title">論文追加</h1>
    <a href="{{ url('/main') }}" class="btn-back">戻る</a>
    <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
      {{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
    <span class="icon-user"></span>
  </div>
  <div class="add-form">
    <form method="POST" action="{{ route('paper_add') }}" id="my-awesome-dropzone" enctype="multipart/form-data">
      @csrf
      <br>
      <p>論文名:
        @if($errors->has('papername'))
        {{ $errors->first('papername') }}<br>
        @endif
        <input type="text" name="papername" size="50" form="my-awesome-dropzone">
      </p>
      <p>著者名:
        @if($errors->has('author'))
        {{ $errors->first('author') }}<br>
        @endif
        <input type="text" name="author" size="50" form="my-awesome-dropzone">
      </p>
      <p>雑誌名:
        @if($errors->has('journal'))
        {{ $errors->first('journal') }}<br>
        @endif
        <input type="text" name="journal" size="50" form="my-awesome-dropzone">
      </p>
      <p>掲載年:
        @if($errors->has('yearofpublic'))
        {{ $errors->first('yearofpublic') }}<br>
        @endif
        <input type="text" name="yearofpublic" size="50" form="my-awesome-dropzone">
      </p>
      <br>
      <p>PDFをドラッグ&ドロップ</p>

      <!--
          とりあえず dropzone.jsを採用（dropzone.css、dropzone.jsを使用）
          詳しくはhttps://www.dropzonejs.com など参照
          データの扱い方によってここのフォームは変えるべき
        -->
      <!--
      <div class="dragdrop">
        <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
      </div>
      -->

      @if($errors->has('file'))
      {{ $errors->first('file') }}<br>
      @endif
      <input type="file" name="file" form="my-awesome-dropzone" accept=".pdf">
      <!-- <input type="text" name="paperpdf" size="50" form="my-awesome-dropzone"> -->

      <p>
        <input type="submit" value="追加" class="btn-submit" form="my-awesome-dropzone">
      </p>

      </from>
  </div>
</body>


</html>
