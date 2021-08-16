<!DOCTYPE html>
<html lang=“ja”>

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?php echo e(asset('/css/password_register.css')); ?>">
  <title>新規登録</title>
</head>

<body>
  <div class="header">
    <h1 class="page-title">新規登録</h1>
    <a href="<?php echo e(url('/Top')); ?>" class="btn-back">戻る</a>
  </div>

  <form method="POST" action="<?php echo e(route('register')); ?>">
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
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

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
      </label>

      <div class="col-md-6">
        <input id="password" type="password" size=50 class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

      </div>
    </div>

    <div class="center">
      <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('パスワード再確認')); ?></label>

      <div class="col-md-6">
        <input id="password-confirm" type="password" size=50 class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>

    <p class="mb10"></p>


      <div class="center">
        <button type="submit" class="btn-open">
          <?php echo e(__('登録')); ?>

        </button>
      </div>


    <!-- <div class="center">
    メールアドレス：
    <input type="text" id="msg" size="50" name="address">
    <p class="mb3"></p>
    パスワード：
    <input type="text" id="msg" size="50" name="pass">
  </div>

  <p class="mb10"></p>
  <f>
    <div class="center">
      <a href="#" class="btn-open" type="submit">登録</a>
      <input type="submit" value="登録" class="btn-open">
      <a onclick="location.href='./../Top.html'; return false;" type="sumit" class="btn-open">登録</a>
    </div> -->

  </form>

</body>

</html>
<?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>