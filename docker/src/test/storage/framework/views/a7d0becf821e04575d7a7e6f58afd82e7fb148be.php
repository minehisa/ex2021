<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/main.css')); ?>">
    <!-- <link rel="stylesheet" href="<?php echo e(mix('/css/app.css')); ?>"> -->

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <title>メイン画面</title>
</head>

<?php
        // include("php/db_main_delete.php");   //論文削除
        //ディレクトリpublicを参照
?>


<form method="GET" action="<?php echo e(route('main')); ?>" id="delete">
    <?php echo csrf_field(); ?>
</form>

<body>
    <div class="header">
        <a class="btn-logout" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
            <?php echo e(__('ログアウト')); ?>

        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
        <span class="icon-user"></span>
    </div>
    <h1 class="page-title">論文追加</h1>
    <div>
        <a href="<?php echo e(url('/paper_add')); ?>" class="btn-register">+ 　新規登録　</a>
    </div>
    <div>
       <!-- <a href="#" class="btn-delete" >- 登録論文削除</a>-->
       <input type="submit" value="登録論文削除" class="btn-delete" form="delete">
    </div>


<!--
    <table border="1" style="border-collapse: collapse">
        <tr>
            <th bgcolor="#cccccc"> </th>
            <th bgcolor="#cccccc">論文名</th>
            <th bgcolor="#cccccc">最終更新日</th>
            <th bgcolor="#cccccc">登録日時</th>
        </tr>
        <?php
            // include("php/db_main_select.php");   //ディレクトリpublicを参照
        ?>

    </table> -->

    <!-- <div id="app">
        <div class="row justify-content-center">
            <main-component></main-component>
        </div>
    </div> -->

    <!-- https://github.com/rubanraj54/vue-bootstrap4-table#17-events -->
    <div class="container" id="app">
        <vue-bootstrap4-table />
    </div>

    <!-- <script src="<?php echo e(mix('js/app.js')); ?>"></script> -->
</body>
</html>
<?php /**PATH /var/www/html/resources/views/main.blade.php ENDPATH**/ ?>