<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('/css/login.css')); ?>">
  <title>ログイン画面</title>
</head>

<body>
  <div class="header">
    <a href="<?php echo e(url('/Top')); ?>" class="btn-back">戻る</a>
  </div>
  <h1 class="page-title">ログイン画面</h1>

  <p class="mb3"></p>

  <div class="center">
    <p class="pad5">
      <a href="<?php echo e(route('password.request')); ?>" target="_blank">パスワードを忘れた方へ</a>
    </p>
  </div>

  <!-- <div class="card-header"><?php echo e(__('Login')); ?></div> -->
  <form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <div class="center">
      <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('メールアドレス')); ?></label>

      <div class="col-md-6">
        <input id="email" type="email" size=50 class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
          <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>

    <div class="center">
      <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('パスワード')); ?>

      </label>
      <div class="col-md-6">
        <input id="password" type="password" size=50 class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
          <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>

    <!-- <div class="center">
            メールアドレス：
            <input type="email" id="msg" size="50" name="address">
            <p class="mb3"></p>
            パスワード：
            <input type="password" id="msg" size="50" name="pass">
        </div> -->

    <p class="mb10"></p>

    <div class="center">
      <button type="submit" class="btn-open">
        <?php echo e(__('Login')); ?>

      </button>
      <!-- <input type="submit" value="ログイン" class="btn-open"> -->
      <!--<a onclick="location.href='./main.html'; return false;" type="submit" class="btn-open">ログイン</a>  -->
      <!--                    <a href="#" class="btn-open">ログイン</a>    -->
    </div>
  </form>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>