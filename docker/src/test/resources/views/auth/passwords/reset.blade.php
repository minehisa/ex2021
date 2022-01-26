<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/password_message.css') }}">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <title>パスワード再登録</title>
</head>

<body>
  <!-- grid -->
  <nav>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
          <h1 class="page-title">パスワードを再登録</h1>
        </div>
        <div class="col-3 text-center text-lg-start">
          <!-- <button type="button" class="btn-back" onClick="history.back()">戻る</button> -->
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div col-6 class="pass-text mb-5">
      <p class="text-center">パスワードを再設定します．</p>
      <p class="text-center">新しいパスワードを入力してください．</p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
      <!-- class="auth_login" -->
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group col-md-6">
        <label for="email" class="col-form-label">{{ __('メールアドレス') }}</label>

        <div class="input-group">
          <span class="input-group-addon">
            <i class="fas fa-envelope-square"></i>
          </span>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="E-mail Address" required autocomplete="email" autofocus readonly>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group col-md-6">
        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="input-group">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autocomplete="new-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group col-md-6">
        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="input-group">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="(Re)New Password" required autocomplete="new-password">
        </div>
      </div>


      <div class="row justify-content-center">
        <button type="submit" class="col-2 btn-login btn-open">
          {{ __('パスワード再設定') }}
        </button>
      </div>

    </form>
  </div>
</body>

</html>
