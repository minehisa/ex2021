<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('/css/paper_add.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/Bibtex.css') }}">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}"> -->

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <!-- <script type="text/javascript" src="{{ asset('/js/dropzone.js') }}"></script> -->
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
  <!-- <script type="module">
        @yield('script')
  </script> -->
  <script src="{{ asset('js/icon.js') }}"></script>

  <!-- 下部にタイトルを動的に適用 -->
  <title>文献追加</title>
</head>
<body>
  <div class="header">
    <h1 class="page-title">論文追加</h1>
    <a href="{{ url('/main') }}" class="btn-back">戻る</a>
    <!--<a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
      {{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>-->
    <a class="btn-export" id="export">Bibtex</a><!-- Bibtexボタンを追加 -->
    <script>
        document.getElementById("export").onclick =function(){
          var paper_title=document.getElementById("paper_title").value;
          var author_name=document.getElementById("author_name").value;
          var journal_title=document.getElementById("journal_title").value;
          var publisher=document.getElementById("publisher").value;
          var yearofpublic=document.getElementById("yearofpublic").value;
          var pages=document.getElementById("pages").value;
          var volume=document.getElementById("volume").value;
          alert("@article{"+ "\n"+"    title{"+paper_title+"},\n"+"    author{"+author_name+"},\n"+"    journal{"+journal_title+"},\n"+"    volume{"+volume+"},\n"+"    number{"+"},\n"+"    pages{"+pages+"},\n"+"    year{"+yearofpublic+"},\n"+"    publisher{"+publisher+"},\n"+"}");
          
        }
    </script> 
    <button id="icon-user" class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">
      {{substr($email,0,1)}}
    </button>
    <div class="dropdown-body">
      <ul class="dropdown-list">
        <li class="dropdown-username"><a>{{mb_strstr($email,'@',true)}}@******</a></li>
        <li><hr style="border-top: 10px double #000;"/></li>
        <li class="dropdown-item"><a>めにゅーを</a></li>
        <li class="dropdown-item"><a>なにか</a></li>
        <li class="dropdown-item">
          <a class="btn-logout-usermanu" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}
          </a>
        </li>
      </ul>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form> 
  </div>
  <div class="add-form-body">
    <form method="POST" action="{{ route('paper_add') }}" id="my-awesome-dropzone" enctype="multipart/form-data" class="add-form">
      @csrf
      <br>
      <p>論文名(必須):
        @if($errors->has('papername'))
        {{ $errors->first('papername') }}<br>
        @endif
        <input type="text" name="papername" id="paper_title" size="50" form="my-awesome-dropzone">
      </p>
      <p>著者名(必須):
        @if($errors->has('author'))
        {{ $errors->first('author') }}<br>
        @endif
        <input type="text" name="author" id="author_name" size="50" form="my-awesome-dropzone">
      </p>
      <p>雑誌名(必須):
        @if($errors->has('journal'))
        {{ $errors->first('journal') }}<br>
        @endif
        <input type="text" name="journal" id="journal_title" size="50" form="my-awesome-dropzone">
      </p>
      <p>掲載年(必須):
        @if($errors->has('yearofpublic'))
        {{ $errors->first('yearofpublic') }}<br>
        @endif
        <input type="text" name="yearofpublic" id="yearofpublic" size="50" form="my-awesome-dropzone">
      </p>
      <p>雑誌号(任意):
        @if($errors->has('volume'))
        {{ $errors->first('volume') }}<br>
        @endif
        <input type="text" name="volume" id="volume" size="50" form="my-awesome-dropzone">
      </p>
      <p>ページ(任意):
        @if($errors->has('pages'))
        {{ $errors->first('pages') }}<br>
        @endif
        <input type="text" name="pages" id="pages" size="50" form="my-awesome-dropzone">
      </p>
      <p>出版社(任意):
        @if($errors->has('publisher'))
        {{ $errors->first('publisher') }}<br>
        @endif
        <input type="text" name="publisher"  id="publisher" size="50" form="my-awesome-dropzone">
      </p>
      <br>
      <p>PDFをドラッグ&ドロップ(必須)</p>

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
