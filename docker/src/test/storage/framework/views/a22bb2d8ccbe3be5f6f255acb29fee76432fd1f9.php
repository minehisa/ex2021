<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo e(asset('/css/Top.css')); ?>">
        <title>Topページ</title>
    </head>

    <body>
        <h1 class="page-title">文献管理システム</h1>
        <p class="mb10"></p>
        <form>
            <div class="center">
                <?php if(auth()->guard()->check()): ?>
                  <a href="<?php echo e(url('/main')); ?>" class="btn-open">Main画面</a>
                <?php else: ?>
                  <a href="<?php echo e(route('login')); ?>" class="btn-open">ログイン</a>
                  <a href="<?php echo e(route('register')); ?>" class="btn-open">新規登録</a>
                <?php endif; ?>
            </div>
        </form>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/Top.blade.php ENDPATH**/ ?>