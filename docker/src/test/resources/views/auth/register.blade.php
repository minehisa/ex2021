<!DOCTYPE html>
<html lang=“ja”>

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{ asset('/css/password_register.css') }}">
  <title>新規登録</title>
</head>

<body>
  <div class="header">
    <h1 class="page-title">新規登録</h1>
    <a href="{{ url('/Top') }}" class="btn-back">戻る</a>
  </div>

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="center">
      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

      <div class="col-md-6">
        <input id="email" type="email" size=50 class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="center">
      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </label>

      <div class="col-md-6">
        <input id="password" type="password" size=50 class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      </div>
    </div>

    <div class="center">
      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード再確認') }}</label>

      <div class="col-md-6">
        <input id="password-confirm" type="password" size=50 class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>

    <p class="mb10"></p>


      <div class="center">
        <button type="submit" class="btn-open">
          {{ __('登録') }}
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
