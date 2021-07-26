<!DOCTYPE html>
<html lang=“ja”>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('/css/password_register.css') }}">
  <title>パスワード再登録</title>
</head>

<body>
  <div class="header">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a href="{{ url('/Top') }}" class="btn-back">戻る</a>
  </div>
  <h1 class="page-title">パスワードを再登録</h1>

  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
          </button>
        </div>
      </div>
<!--
    <div class="center">
      メールアドレス：
      <input type="text" id="msg" size="50">
      <p class="mb3"></p>
      パスワード：
      <input type="text" id="msg" size="50">
    </div>

    <p class="mb10"></p>
    <form>
      <div class="center">
        <a href="#" class="btn-open">ログイン</a>
      </div> -->
    </form>
</body>

</html>
