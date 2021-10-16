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
          <button type="button" class="btn-back" onClick="history.back()">戻る</button>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div col-6 class="pass-text mb-5">
      <p class="text-center">メールアドレスを入力してください．</p>
      <p class="text-center">パスワード再設定用のURLをメールで送信します</p>
    </div>

    @if (session('status'))
    <div class="row justify-content-center">
      <div class="alert alert-success col-md-6" role="alert">
        {{ session('status') }}
      </div>
    </div>
    @endif

    <form method="POST" action="{{ route('password.email', app()->getLocale()) }}">
      <!-- class="auth_login" -->

      @csrf

      <div class="form-group col-md-6 mb-5">
        <label for="email" class="col-form-label">{{ __('メールアドレス') }}</label>

        <div class="input-group">
          <span class="input-group-addon">
            <i class="fas fa-envelope-square"></i>
          </span>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autocomplete="email" autofocus>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

      </div>


      <div class="row justify-content-center">
        <button type="submit" class="col-2 btn-login btn-open">
          {{ __('再設定') }}
        </button>
      </div>

    </form>
  </div>
</body>

</html>
