<!DOCTYPE html>
<html lang=“ja”>
  <head class="header">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./../css/paper_detail.css">
    <!-- 下部にタイトルを動的に適用 -->
    <title>book1</title>

    <!--#に遷移先のURLを指定-->
    <a href="#" class="btn-editbib">編集</a>
    <a href="#" class="btn-editbib">BIB TEX形式</a>
    <a href="./../html/main.php" class="btn-back">戻る</a>
    <a href="./../Top.html" class="btn-logout">ログアウト</a>
    <span class="icon-user"></span>
  </head>

  <?php
    $paperid = $_GET['paperid'];
    $papername;
    $author;
    $journal;
    $paperpdf;
    $yearofpublic;
  ?>
  <?php
  include("./../php/db_paper_detail.php");
  ?>

  <body>
    <div class="detail">
      <!-- 下部にタイトルを動的に適用 -->
      <div class="paper-name"><?php echo $papername; ?></div>

      <input id="detail-check1" class="detail-check" type="checkbox">
      <label class="detail-label" for="detail-check1">詳細</label>
      <div class="detail-content">
        <table border="1">
          <tr>
            <th>論文名</th>
            <td><?php echo $papername; ?></td>
          </tr>
          <tr>
            <th>著者</th>
            <td><?php echo "$author"; ?></td>
          </tr>
          <tr>
            <th>雑誌名</th>
            <td><?php echo "$journal"; ?></td>
          </tr>
          <tr>
            <th>掲載年</th>
            <td><?php echo "$yearofpublic"; ?></td>
          </tr>
        </table>
      </div>
    </div>
    <!--
      PDFの有無による場合分け機構が必要
      PDFの指定を動的にする必要あり
    -->
    <div class="show-pdf">
      <iframe src="test.pdf">
        <p><b>表示されない時の表示</b>: <a href="test.pdf">PDF をダウンロード</a>.</p>
      </iframe>
    </div>

  </body>
</html>
