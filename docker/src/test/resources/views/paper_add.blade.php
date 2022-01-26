<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-language" content="ja">
  <link rel="stylesheet" href="{{ asset('/css/paper_add.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('/css/Bibtex.css') }}"> -->
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
  <script src="{{ asset('js/add_input.js') }}"></script>

  <!-- 下部にタイトルを動的に適用 -->
  <title>文献追加</title>
</head>

<body>
  <div class="header">
    <h1 class="page-title">論文追加</h1>
    <a class="btn-export" id="export">Bibtex</a><!-- Bibtexボタンを追加 -->
    <a href="{{ url('/main') }}" class="btn-back">戻る</a>
    <!--<a class="btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
      {{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>-->
    <script>
      document.getElementById("export").onclick = function() {
        var paper_title = document.getElementById("paper_title").value;
        var author_name = document.getElementById("author_name").value;
        var journal_title = document.getElementById("journal_title").value;
        var publisher = document.getElementById("publisher").value;
        var yearofpublic = document.getElementById("yearofpublic").value;
        var pages = document.getElementById("pages").value;
        var volume = document.getElementById("volume").value;
        var number = document.getElementById("number").value;

        author_name = author_name.replace(/(\，|\,)/g, " " + "and" + " ");
        var words = [];
        var and_count = 0;
        var tmp;
        words = author_name.split(/\s+/);
        var targetStr = "and"
        var and_count_max = (String(words).match(/and/g) || []).length;
        var count = 0;
        var remain_count = 0;
        var flag_count = 0;

        for (let i = 0; i < words.length; ++i) {
          if (and_count == and_count_max) {
            remain_count++;
            if (remain_count == 2 && words.length - 1 == i) {
              tmp = words[i - 1];
              words[i - 1] = words[i];
              words[i] = "，" + tmp;
            }
            if (remain_count == 3 && words.length - 1 == i) {
              tmp = '，' + words[i - 2];
              words[i - 2] = words[i];
              words[i] = words[i - 1];
              words[i - 1] = tmp;
            }
          } else {
            if (String(words[i]) != "and") {
              count++;
            } else {
              and_count++;
              if (count == 2) {
                tmp = words[i - 2];
                words[i - 2] = words[i - 1];
                words[i - 1] = "，" + tmp;
              }
              if (count == 3) {
                tmp = '，' + words[i - 3];
                words[i - 3] = words[i - 1];
                words[i - 1] = words[i - 2];
                words[i - 2] = tmp;
              }
              count = 0;
            }
            flag_count++;
          }
        }

        author_name = words.join(' ')

        var div_paper_title = paper_title.split(/\s+/);
        for (let i = 0; i < div_paper_title.length; ++i) {
          if (String(div_paper_title[i]) !== 'A' && String(div_paper_title[i]) !== 'a' && String(div_paper_title[i]) !== 'An' && String(div_paper_title[i]) !== 'an') {
            div_paper_title[i] = ((String(div_paper_title[i])).replace(/[^0-9a-zA-Z]/gi, "")).toLowerCase() + '，';
            var document_reference_name = (String(words[0])).toLowerCase() + String(yearofpublic) + div_paper_title[i];
            break;
          }
        }

        //論文名で先頭の文字だけを大文字にする
        paper_title = paper_title.charAt(0).toUpperCase() + paper_title.slice(1).toLowerCase();        

        if (!paper_title || !author_name || !journal_title || !yearofpublic){
          alert('必須項目が入力されていません．')
        }
        else{
          var BibWindow = window.open("", "Bibwindow", "width=500,height=500");
          BibWindow.document.open();
          BibWindow.document.clear();
          if (volume && pages && publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && !pages && publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && pages && !publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && pages && publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n"  + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && !pages && !publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" +  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && pages && !publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && !pages && publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (volume && !pages && !publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "}<br>\n" + "}</p>");
          }
          if (!volume && pages && publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && !pages && publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && pages && !publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && pages && publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && !pages && !publisher && number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && !pages && publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && pages && !publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "}<br>\n" + "}</p></body></html>");
          }
          if (!volume && !pages && !publisher && !number) {
            BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "}<br>\n" + "}</p></body></html>");
          }
          BibWindow.document.close();
        }
      }
    </script>
    <button id="icon-user" class="icon-user" style="background:hsl({{$colorBackground}},80%,75%); color:{{$colorChar}};">
      {{substr($email,0,1)}}
    </button>
    <div class="dropdown-body">
      <ul class="dropdown-list">
        <li class="dropdown-username"><a>{{mb_strstr($email,'@',true)}}@******</a></li>
        <li>
          <hr style="border-top: 10px double #000;" />
        </li>
        <li class="dropdown-item"><a href="{{ route('password.form')}}">パスワード変更</a></li>
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
      <div>
        <label for="paper_title" id="l_paper_title">論文名(必須):</label>
        <div class="error-mes">
          @if($errors->has('papername'))
          {{ $errors->first('papername') }}<br>
          @endif
        </div>
        <input type="text" name="papername" id="paper_title" class="add_paper_info" size="50" form="my-awesome-dropzone" placeholder="(例)Deep Learningを用いた猫の個体識別に関する研究">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="author_name" id="l_author_name">著者名(必須):</label>
        <div class="error-mes">
          @if($errors->has('author'))
          {{ $errors->first('author') }}<br>
          @endif
        </div>
        <input type="text" name="author" id="author_name" class="add_paper_info" size="50" form="my-awesome-dropzone" placeholder="(例)Joho Taro    ※Last nameとFirst nameの間にspace">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="journal_title" id="l_journal_title">雑誌名(必須):</label>
        <div class="error-mes">
          @if($errors->has('journal'))
          {{ $errors->first('journal') }}<br>
          @endif
        </div>
        <input type="text" name="journal" id="journal_title" size="50" class="add_paper_info" form="my-awesome-dropzone" placeholder="(例)Journal of ehime">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="yearofpublic" id="l_yearofpublic">掲載年(必須):</label>
        <div class="error-mes">
          @if($errors->has('yearofpublic'))
          {{ $errors->first('yearofpublic') }}<br>
          @endif
        </div>
        <input type="text" name="yearofpublic" id="yearofpublic" size="50" class="add_paper_info" form="my-awesome-dropzone" placeholder="(例)2021     ※半角数字のみ">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="volume" id="l_volume">雑誌巻(任意):</label>
        <div class="error-mes">
          @if($errors->has('volume'))
          {{ $errors->first('volume') }}<br>
          @endif
        </div>
        <input type="text" name="volume" id="volume" size="50" class="add_paper_info" form="my-awesome-dropzone" placeholder="(例) 3         ※半角数字のみ">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="number" id="l_number">雑誌号(任意):</label>
        <div class="error-mes">
          @if($errors->has('number'))
          {{ $errors->first('number') }}<br>
          @endif
        </div>
        <input type="text" name="number" id="number" size="50" class="add_paper_info" form="my-awesome-dropzone" placeholder="(例) 2         ※半角数字のみ">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="pages" id="l_pages">ページ(任意):</label>
        <div class="error-mes">
          @if($errors->has('pages'))
          {{ $errors->first('pages') }}<br>
          @endif
        </div>
        <input type="text" name="pages" id="pages" size="50" class="add_paper_info" form="my-awesome-dropzone" placeholder="(例) 14-15      ※半角数字,'-'のみ">
        <div class="text_underline"></div>
      </div><br>
      <div>
        <label for="publisher" id="l_publisher">出版社(任意):</label>
        <div class="error-mes">
          @if($errors->has('publisher'))
          {{ $errors->first('publisher') }}<br>
          @endif
        </div>
        <input type="text" name="publisher" id="publisher" size="50" class="add_paper_info" form="my-awesome-dropzone" placeholder="">
        <div class="text_underline"></div>
      </div>
      <br>
      <div>
        <label for="pdffile" id="l_pdffile">PDFをドラッグ&ドロップ(必須):</label><br>
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
        <div class="error-mes">
          @if($errors->has('file'))
          {{ $errors->first('file') }}<br>
          @endif
        </div>
        <input type="file" name="file" id="pdffile" form="my-awesome-dropzone" accept=".pdf">
        <!-- <input type="text" name="paperpdf" size="50" form="my-awesome-dropzone"> -->
      </div>
      <div class="submit-area">
        <!-- <input type="submit" value="追加" class="btn-submit" form="my-awesome-dropzone"> -->
        <button type="submit" class="btn-submit" form="my-awesome-dropzone">
          追加
        </button>
      </div>

      </from>
  </div>
</body>


</html>
