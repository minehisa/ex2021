<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./../css/main.css">
        <title>メイン画面</title>
  </head>
  
  <?php
    $id = $_GET['id'];
  ?>

  <form id="delete" action="./../php/db_main_delete.php?id=<?php echo $id;?>" method="post"></form>
  <form id="paperadd" action="./../html/paper_add.php?id=<?php echo $id;?>" method="post"></form>

  <body>
    <div class="header">
      <a href="./../Top.html" class="btn-logout">ログアウト</a>
      <span class="icon-user"></span>
    </div>
    <h1 class="page-title">論文追加</h1>
    <div>
      <!--<a href="./paper_add.html" class="btn-register">+ 　新規登録　</a>-->
      <input type="submit" value="+ 　新規登録" class="btn-register" form="paperadd">
    </div>
    <div>
      <!-- <a href="#" class="btn-delete">- 登録論文削除</a> -->
      <input type="submit" value="- 登録論文削除" class="btn-delete" form="delete">
    </div>

    <table border="1" style="border-collapse: collapse">
      <tr>
        <th bgcolor="#cccccc"> </th>
        <th bgcolor="#cccccc">論文名</th>
        <th bgcolor="#cccccc">最終更新日</th>
        <th bgcolor="#cccccc">登録日時</th>
      </tr>

      <?php
        include("./../php/db_main_select.php");
      ?>

    </table>
  </body>
</html>
