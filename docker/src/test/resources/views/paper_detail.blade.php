<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/paper_detail.css') }}">
  <script src="{{ asset('js/icon.js') }}"></script>
  <!-- 下部にタイトルを動的に適用 -->
  <title>book1</title>
</head>


<body>
  <div class="header">
    <!--#に遷移先のURLを指定-->
    <a href="#" class="btn-edit">編集</a>
    <a href="#" class="btn-bibtex" value="0" id="Bib">BIB TEX形式</a>
    <a href="{{ url('/main') }}" class="btn-back">戻る</a>
    <!--<a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>-->
    <!--<span class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">{{substr($email,0,1)}}</span>
    <p class="name-user">{{mb_strstr($email,'@',true)}}@******</p>-->
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

  <div class="detail">
    <!-- 下部にタイトルを動的に適用 -->
    <div class="paper-name">{{$data->papername}}</div>

    <input id="detail-check1" class="detail-check" type="checkbox">
    <label class="detail-label" for="detail-check1">詳細</label>
    <div id="detail-content" class="detail-content">
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
        <tr>
          <th>掲載号</th>
          <td>{{$data->volume}}</td>
        </tr>
        <tr>
          <th>掲載ページ</th>
          <td>{{$data->pages}}</td>
        </tr>
        <tr>
          <th>出版社</th>
          <td>{{$data->publisher}}</td>
        </tr>
      </table>
    </div>
  </div>
  <script>
        document.getElementById("Bib").onclick =function(){        
          var paper_title='{{$data->papername}}';
          var author_name='{{$data->author}}';
          var journal_title='{{$data->journal}}';
          var publisher='{{$data->publisher}}';
          var yearofpublic='{{$data->yearofpublic}}';
          var pages='{{$data->pages}}';
          var volume='{{$data->volume}}';
          author_name = author_name.replace(/(\，|\,)/g," "+"and"+" ");
          var words = [];
          var and_count = 0;
          var tmp;
          words = author_name.split(/\s+/);
          var targetStr = "and"
          var and_count_max =(String(words).match(/and/g)||[]).length;
          var count = 0;
          var remain_count = 0;

          for (let i = 0; i < words.length; ++i){
            if(and_count == and_count_max){
              remain_count++;
              if (remain_count == 2){
                tmp = words[i-1];
                words[i-1] = words[i];
                words[i] = "，" + tmp;
              }
            }
            else{
              if (String(words[i]) != "and"){
              count++;
            }
            else{
              and_count++;
              if (count == 2){
                tmp = words[i-2];
                words[i-2] = words[i-1];
                words[i-1] = "，" + tmp;
              }
              count = 0;
            }
            }
          }

          author_name = words.join(' ')
          BibWindow = window.open("", "myWindow", "width=500,height=500");
          
          if(volume && pages && publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"volume{"+volume+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"pages{"+pages+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"publisher{"+publisher+"}<br>\n"+"}</p>");
          }
          if(volume && pages && !publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"volume{"+volume+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"pages{"+pages+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"}<br>\n"+"}</p>");
          }
          if(volume && !pages && publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"volume{"+volume+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"pages{"+pages+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"publisher{"+publisher+"}<br>\n"+"}</p>");
          }
          if(volume && !pages && !publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"volume{"+volume+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"}<br>\n"+"}</p>");
          }
          if(!volume && pages && publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"pages{"+pages+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"publisher{"+publisher+"}<br>\n"+"}</p>");
          }
          if(!volume && pages && !publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"pages{"+pages+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"}<br>\n"+"}</p>");
          }
          if(!volume && !pages && publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"publisher{"+publisher+"}<br>\n"+"}</p>");
          }
          if(!volume && !pages && !publisher){
            BibWindow.document.write("<p>@article{"+ "<br>\n"+ "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"title{"+paper_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"author{"+author_name+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"journal{"+journal_title+"},<br>\n"+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"year{"+yearofpublic+"}<br>\n"+"}</p>");
          }
        }
    </script>
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
