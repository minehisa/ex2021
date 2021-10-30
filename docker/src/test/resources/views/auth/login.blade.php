<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
  <!-- <script src="{{ mix('/js/app.js') }}" defer></script> -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <title>ログイン画面</title>
</head>

<body>
  <!-- grid -->
  <nav>
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
          <h1 class="page-title">ログイン画面</h1>
        </div>
        <div class="col-3 text-center text-lg-start">
          <button type="button" class="btn-back" onClick="history.back()">戻る</button>
        </div>
      </div>
    </div>
  </nav>


  <div class="container">
    <p class="col-md-6 pass-text">
      <a href="{{ route('register') }}">新規登録</a>
    </p>
    <p class="col-md-6 pass-text">
      <a href="{{ route('password.request') }}" target="_blank" rel="noopener noreferrer">パスワードを忘れた方</a>
    </p>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group col-md-6">
        <label for="email" class="col-form-label">{{ __('メールアドレス') }}</label>
        <div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fas fa-envelope-square"></i>
          </span>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autocomplete="email" autofocus>
        </div>
      </div>


      <div class="form-group col-md-6">
        <div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <label for="password" class="col-form-label">{{ __('パスワード') }}
        </label>
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fas fa-lock"></i>
          </span>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
        </div>
      </div>

      <div class="row justify-content-center">
        <button type="submit" class="col-2 btn-login btn-open">
          {{ __('Login') }}
        </button>
      </div>

    </form>
  </div>
</body>

</html>
