<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('/css/paper_detail.css') }}">
  <!-- 下部にタイトルを動的に適用 -->
  <title>book1</title>
</head>


<body>
  <div class="header">
    <!--#に遷移先のURLを指定-->
    <a href="#" class="btn-editbib">編集</a>
    <a href="#" class="btn-bibtex">BIB TEX形式</a>
    <a href="{{ url('/main') }}" class="btn-back">戻る</a>
    <a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
    <span class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">{{substr($email,0,1)}}</span>
      <p class="name-user">{{mb_strstr($email,'@',true)}}@******</p>
  </div> 

  <div class="detail">
    <!-- 下部にタイトルを動的に適用 -->
    <div class="paper-name">{{$data->papername}}</div>

    <input id="detail-check1" class="detail-check" type="checkbox">
    <label class="detail-label" for="detail-check1">詳細</label>
    <div class="detail-content">
      <table border="1">
        <tr>
          <th>論文名</th>
          <td>{{$data->papername}}</td>
        </tr>
        <tr>
          <th>著者</th>
          <td>{{$data->author}}</td>
        </tr>
        <tr>
          <th>雑誌名</th>
          <td>{{$data->journal}}</td>
        </tr>
        <tr>
          <th>掲載年</th>
          <td>{{$data->yearofpublic}}</td>
        </tr>
      </table>
    </div>
  </div>
  <!--
      PDFの有無による場合分け機構が必要
      PDFの指定を動的にする必要あり
    -->
  <div class="show-pdf">
    <iframe src="{{ asset('storage/pdf/' . $data->paperpdf) }}" width="100%" height="500px">
      <!-- pdfがないときは404 not found　が表示
    -->
    </iframe>
  </div>

</body>

</html>
