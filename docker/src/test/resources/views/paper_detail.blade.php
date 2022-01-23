<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/paper_detail.css') }}">
  <!-- bootstrap -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/icon.js') }}"></script>
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <!-- 下部にタイトルを動的に適用 -->
  <title>paper</title>
</head>


<body>
  <div class="header">
    <!--#に遷移先のURLを指定-->
    <!-- <a href="#" class="btn-edit">編集</a> -->
    <a href="#" class="btn-edit" data-toggle="modal" data-target="#modal1">
      編集
    </a>
    <a href=" #" class="btn-bibtex" value="0" id="Bib">BIB TEX形式</a>
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

  <!-- モーダル・ダイアログ -->
  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalLabelId">編集</h3>
        </div>
        <form role="form" id="form_edit">
          <div class="modal-body">
            @csrf
            <div class="form-group modal-paper">
              <label for="title-text" class="col-form-label">論文名</label>
              <span class="text-danger" id="papernameError"></span>
              <input type="text" class="form-control" id="mdl-papername">
            </div>
            <div class="form-group modal-author">
              <label for="title-text" class="col-form-label">著者 </label>
              <span class="text-danger" id="authorError"></span>
              <input type="text" class="form-control" id="mdl-author">
            </div>
            <div class="form-group modal-journal">
              <label for="title-text" class="col-form-label">雑誌名</label>
              <span class="text-danger" id="journalError"></span>
              <input type="text" class="form-control" id="mdl-journal">
            </div>
            <div class="form-group modal-year">
              <label for="title-text" class="col-form-label">掲載年</label>
              <span class="text-danger" id="yearError"></span>
              <input type="text" class="form-control" id="mdl-year">
            </div>
            <div class="form-group modal-volume">
              <label for="title-text" class="col-form-label">掲載巻</label>
              <span class="text-danger" id="volumeError"></span>
              <input type="text" class="form-control" id="mdl-volume">
            </div>
            <div class="form-group modal-number">
              <label for="title-text" class="col-form-label">掲載号</label>
              <span class="text-danger" id="numberError"></span>
              <input type="text" class="form-control" id="mdl-number">
            </div>
            <div class="form-group modal-pages">
              <label for="title-text" class="col-form-label">掲載ページ</label>
              <span class="text-danger" id="pagesError"></span>
              <input type="text" class="form-control" id="mdl-pages">
            </div>
            <div class="form-group modal-publisher">
              <label for="title-text" class="col-form-label">出版社</label>
              <span class="text-danger" id="publisherError"></span>
              <input type="text" class="form-control" id="mdl-publisher">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            <button type="button" id="mdl-save" class="btn btn-primary">編集</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="detail">
    <!-- 下部にタイトルを動的に適用 -->
    <div class="paper-name" id='title-papername'>{{$data->papername}}</div>

    <input id="detail-check1" class="detail-check" type="checkbox">
    <label class="detail-label" for="detail-check1">詳細</label>
    <div id="detail-content" class="detail-content">
      <table border="1">
        <tr>
          <th>論文名</th>
          <td id='td-papername'>{{$data->papername}}</td>
        </tr>
        <tr>
          <th>著者</th>
          <td id='td-author'>{{$data->author}}</td>
        </tr>
        <tr>
          <th>雑誌名</th>
          <td id='td-journal'>{{$data->journal}}</td>
        </tr>
        <tr>
          <th>掲載年</th>
          <td id='td-year'>{{$data->yearofpublic}}</td>
        </tr>
        <tr>
          <th>掲載巻</th>
          <td id='td-volume'>{{$data->volume}}</td>
        </tr>
        <tr>
          <th>掲載号</th>
          <td id='td-number'>{{$data->number}}</td>
        </tr>
        <tr>
          <th>掲載ページ</th>
          <td id='td-pages'>{{$data->pages}}</td>
        </tr>
        <tr>
          <th>出版社</th>
          <td id='td-publisher'>{{$data->publisher}}</td>
        </tr>
      </table>
    </div>
  </div>
  <script>
    document.getElementById("Bib").onclick = function() {
      var paper_title = '{{$data->papername}}';
      var author_name = '{{$data->author}}';
      var journal_title = '{{$data->journal}}';
      var publisher = '{{$data->publisher}}';
      var yearofpublic = '{{$data->yearofpublic}}';
      var pages = '{{$data->pages}}';
      var volume = '{{$data->volume}}';
      var number = '{{$data->number}}';

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

      if (!paper_title || !author_name || !journal_title || !yearofpublic) {
        alert('必須項目が入力されていません．')
      } else {
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
          BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "pages={" + pages + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "publisher={" + publisher + "}<br>\n" + "}</p></body></html>");
        }
        if (volume && !pages && !publisher && number) {
          BibWindow.document.write("<html><head><title>BibTeX形式</title></head><body><p>@article{" + document_reference_name + "<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "title={" + paper_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "author={" + author_name + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "journal={" + journal_title + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "volume={" + volume + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "number={" + number + "},<br>\n" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + "year={" + yearofpublic + "}<br>\n" + "}</p></body></html>");
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

    // modal
    window.onload = function() {
      $('#modal1').on('show.bs.modal', function(event) {
        // let paper_title = '{{$data->papername}}';
        // let author_name = '{{$data->author}}';
        // let journal_title = '{{$data->journal}}';
        // let yearofpublic = '{{$data->yearofpublic}}';
        // let volume = '{{$data->volume}}';
        // let number = '{{$data->number}}';
        // let pages = '{{$data->pages}}';
        // let publisher = '{{$data->publisher}}';
        let paper_title = $('#td-papername').text();
        let author_name = $('#td-author').text();
        let journal_title = $('#td-journal').text();
        let yearofpublic = $('#td-year').text();
        let volume = $('#td-volume').text();
        let number = $('#td-number').text();
        let pages = $('#td-pages').text();
        let publisher = $('#td-publisher').text();

        //Ajax
        var modal = $(this) //モーダルを取得
        modal.find('.modal-paper input').val(paper_title);
        modal.find('.modal-author input').val(author_name);
        modal.find('.modal-journal input').val(journal_title);
        modal.find('.modal-year input').val(yearofpublic);
        modal.find('.modal-volume input').val(volume);
        modal.find('.modal-number input').val(number);
        modal.find('.modal-pages input').val(pages);
        modal.find('.modal-publisher input').val(publisher);
      });

      $('#mdl-save').on('click', function() {
        console.log('click');
        resetErrorText();
        let paperid = '{{$data->paperid}}';
        let paper_title = $('#mdl-papername').val();
        let author_name = $('#mdl-author').val();
        let journal_title = $('#mdl-journal').val();
        let yearofpublic = $('#mdl-year').val();
        let volume = $('#mdl-volume').val();
        let number = $('#mdl-number').val();
        let pages = $('#mdl-pages').val();
        let publisher = $('#mdl-publisher').val();
        $.ajax({
          url: '/api/paper_detail/' + paperid, // 送信先 URL
          headers: {
            // POSTのときはトークンの記述がないと"419 (unknown status)"になるので注意
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          // dataType: "text",
          data: { // 送信するデータ
            paperid: paperid,
            papername: paper_title,
            author: author_name,
            journal: journal_title,
            yearofpublic: yearofpublic,
            volume: volume,
            number: number,
            pages: pages,
            publisher: publisher
          },
          success: function(response) {
            console.log(response);
            resetErrorText();
            updateText(paper_title, author_name, journal_title, yearofpublic, volume, number, pages, publisher);
            $("#modal1").modal('hide'); // モーダルを閉じる
          },
          error: function(response) {
            $('#papernameError').text(response.responseJSON.errors.papername);
            $('#authorError').text(response.responseJSON.errors.author);
            $('#journalError').text(response.responseJSON.errors.journal);
            $('#yearError').text(response.responseJSON.errors.yearofpublic);
            $('#volumeError').text(response.responseJSON.errors.volume);
            $('#numberError').text(response.responseJSON.errors.number);
            $('#pagesError').text(response.responseJSON.errors.pages);
            $('#publisherError').text(response.responseJSON.errors.publisher);
            console.log(response.responseJSON.errors.papername);
          }
        });
      })
      // .done(function(res) {
      //   // 通信成功時の処理
      //   // PHP から返ってきた値（メッセージ）を p タグにセット
      //   console.log('success');
      //   console.log(res);
      //   // $('#mess').text(res);
      // }).fail(function(res) {
      //   // 通信失敗時の処理
      //   console.dir(res);
      //   console.log("ajax通信に失敗しました");
      // }).always(function(res) {
      //   // 常に実行する処理
      //   // $("#modal1").modal('hide'); // モーダルを閉じる
      // });
      // });
      function resetErrorText() {
        $('#papernameError').text('');
        $('#authorError').text('');
        $('#journalError').text('');
        $('#yearError').text('');
        $('#volumeError').text('');
        $('#numberError').text('');
        $('#pagesError').text('');
        $('#publisherError').text('');
        console.log('reset text');
      }

      function updateText(papername, author, journal, year, volume, number, pages, publisher) {
        $('#title-papername').text(papername);
        $('#td-papername').text(papername);
        $('#td-author').text(author);
        $('#td-journal').text(journal);
        $('#td-year').text(year);
        $('#td-volume').text(volume);
        $('#td-number').text(number);
        $('#td-pages').text(pages);
        $('#td-publisher').text(publisher);
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
