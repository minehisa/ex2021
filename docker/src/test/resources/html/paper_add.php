<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./../css/paper_add.css">
  <link rel="stylesheet" href="./../css/dropzone.css">
  <script type="text/javascript" src="./../js/dropzone.js"></script>
  <!-- 下部にタイトルを動的に適用 -->
  <title>文献追加</title>
</head>

<?php
  $id = $_GET['id'];
?>

<body>
  <div class="header">
    <h1 class="page-title">論文追加</h1>
    <a href="./main.php?id=<?php echo $id;?>" class="btn-back">戻る</a>
    <a href="./../Top.html" class="btn-logout">ログアウト</a>
    <span class="icon-user"></span>
  </div>
  <div class="add-form">
    <from>
      <form action="./../php/db_paper_add.php?id=<?php echo $id;?>" method="post" id="my-awesome-dropzone" enctype="multipart/form-data">
      </form>
      <br>
      <p>論文名:
        <input type="text" name="title" size="50" form="my-awesome-dropzone">
      </p>
      <p>著者名:
        <input type="text" name="author" size="50" form="my-awesome-dropzone">
      </p>
      <p>雑誌名:
        <input type="text" name="journal" size="50" form="my-awesome-dropzone">
      </p>
      <p>掲載年:
        <input type="text" name="year" size="50" form="my-awesome-dropzone">
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

      <input type="file" name="file" form="my-awesome-dropzone" accept=".pdf">
      <p>
        <input type="submit" value="追加" class="btn-submit" form="my-awesome-dropzone">
      </p>

      <!--
      <p>
        <a type="submit" class="btn-submit">追加</a>
      </p>
       -->
    </from>
  </div>
</body>

</html>